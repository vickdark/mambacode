import * as THREE from 'three';

const CONNECTION_DISTANCE = 6.5;

const PALETTES = {
    light: [0x2563eb, 0x7c3aed, 0xe11d48],
    dark: [0x0ea5e9, 0xa855f7, 0xff005c],
};

function circleTexture() {
    const canvas = document.createElement('canvas');
    canvas.width = canvas.height = 32;
    const context = canvas.getContext('2d');
    context.beginPath();
    context.arc(16, 16, 15, 0, Math.PI * 2);
    context.fillStyle = 'white';
    context.fill();

    return new THREE.CanvasTexture(canvas);
}

// Renders a drifting particle network into `container`; returns a function that tears it down.
export function startNetwork(container, isLight) {
    const colors = PALETTES[isLight ? 'light' : 'dark'].map((hex) => new THREE.Color(hex));
    const count = window.innerWidth < 768 ? 35 : 60;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    camera.position.z = 20;

    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);

    const positions = new Float32Array(count * 3);
    const pointColors = new Float32Array(count * 3);
    const particles = [];

    for (let i = 0; i < count; i++) {
        positions.set([(Math.random() - 0.5) * 40, (Math.random() - 0.5) * 40, (Math.random() - 0.5) * 20], i * 3);

        const colorIndex = Math.floor(Math.random() * colors.length);
        const { r, g, b } = colors[colorIndex];
        pointColors.set([r, g, b], i * 3);

        particles.push({
            colorIndex,
            velocity: new THREE.Vector3((Math.random() - 0.5) * 0.05, (Math.random() - 0.5) * 0.05, (Math.random() - 0.5) * 0.02),
        });
    }

    const pointsGeometry = new THREE.BufferGeometry();
    pointsGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    pointsGeometry.setAttribute('color', new THREE.BufferAttribute(pointColors, 3));

    const texture = circleTexture();
    const pointsMaterial = new THREE.PointsMaterial({ size: 0.5, vertexColors: true, map: texture, transparent: true, alphaTest: 0.5 });
    scene.add(new THREE.Points(pointsGeometry, pointsMaterial));

    const maxConnections = (count * (count - 1)) / 2;
    const linePositions = new Float32Array(maxConnections * 6);
    const lineColors = new Float32Array(maxConnections * 6);
    const linesGeometry = new THREE.BufferGeometry();
    linesGeometry.setAttribute('position', new THREE.BufferAttribute(linePositions, 3));
    linesGeometry.setAttribute('color', new THREE.BufferAttribute(lineColors, 3));
    linesGeometry.setDrawRange(0, 0);

    const linesMaterial = new THREE.LineBasicMaterial({ vertexColors: true, transparent: true, opacity: 0.6 });
    scene.add(new THREE.LineSegments(linesGeometry, linesMaterial));

    let frame = null;
    let visible = true;

    const tick = () => {
        frame = requestAnimationFrame(tick);
        if (!visible) return;

        let lineIndex = 0;
        let connections = 0;

        for (let i = 0; i < count; i++) {
            const p = i * 3;
            const { velocity } = particles[i];

            positions[p] += velocity.x;
            positions[p + 1] += velocity.y;
            positions[p + 2] += velocity.z;

            if (Math.abs(positions[p]) > 25) velocity.x = -velocity.x;
            if (Math.abs(positions[p + 1]) > 25) velocity.y = -velocity.y;
            if (Math.abs(positions[p + 2]) > 10) velocity.z = -velocity.z;

            for (let j = i + 1; j < count; j++) {
                const q = j * 3;
                const distance = Math.hypot(positions[p] - positions[q], positions[p + 1] - positions[q + 1], positions[p + 2] - positions[q + 2]);

                if (distance < CONNECTION_DISTANCE) {
                    const a = colors[particles[i].colorIndex];
                    const b = colors[particles[j].colorIndex];

                    linePositions.set([positions[p], positions[p + 1], positions[p + 2], positions[q], positions[q + 1], positions[q + 2]], lineIndex);
                    lineColors.set([a.r, a.g, a.b, b.r, b.g, b.b], lineIndex);
                    lineIndex += 6;
                    connections++;
                }
            }
        }

        pointsGeometry.attributes.position.needsUpdate = true;
        linesGeometry.setDrawRange(0, connections * 2);
        linesGeometry.attributes.position.needsUpdate = true;
        linesGeometry.attributes.color.needsUpdate = true;

        scene.rotation.y += 0.001;
        scene.rotation.x += 0.0005;
        renderer.render(scene, camera);
    };

    const resizeObserver = new ResizeObserver(() => {
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    });

    const visibilityObserver = new IntersectionObserver(([entry]) => {
        visible = entry.isIntersecting;
    });

    resizeObserver.observe(container);
    visibilityObserver.observe(container);
    tick();

    return () => {
        cancelAnimationFrame(frame);
        resizeObserver.disconnect();
        visibilityObserver.disconnect();
        [pointsGeometry, linesGeometry, pointsMaterial, linesMaterial, texture, renderer].forEach((item) => item.dispose());
        renderer.domElement.remove();
    };
}
