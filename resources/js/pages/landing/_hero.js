import * as THREE from 'three';

export function initHeroAnimation() {
    const container = document.getElementById('vanta-hero-background');
    
    if (!container) return; // Guard clause if element doesn't exist

    // Scene Setup
    const scene = new THREE.Scene();
    // Match Vanta's background color logic (transparent in Three.js, handled by CSS or separate div)
    // But Vanta.js usually handles background. Here we let the CSS background-color of the container or parent handle it.
    // The container has opacity 0.4, so we want the canvas to be transparent or match the dark theme.
    scene.background = null; // Let CSS handle background color

    const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
    camera.position.z = 20;

    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    container.appendChild(renderer.domElement);

    // Configuration
    const particleCount = 60;
    const connectionDistance = 6.5;
    const brandColors = [
        new THREE.Color(0x0ea5e9), // Cyan
        new THREE.Color(0xa855f7), // Purple
        new THREE.Color(0xff005c)  // Pink
    ];

    // Particles
    const particlesGeometry = new THREE.BufferGeometry();
    const particlesCount = particleCount;
    const posArray = new Float32Array(particlesCount * 3);
    const colorsArray = new Float32Array(particlesCount * 3);
    const particlesData = [];

    for(let i = 0; i < particlesCount; i++) {
        // Random Position
        const x = (Math.random() - 0.5) * 40;
        const y = (Math.random() - 0.5) * 40;
        const z = (Math.random() - 0.5) * 20;
        
        posArray[i*3] = x;
        posArray[i*3+1] = y;
        posArray[i*3+2] = z;

        // Random Velocity
        particlesData.push({
            velocity: new THREE.Vector3(
                (Math.random() - 0.5) * 0.05,
                (Math.random() - 0.5) * 0.05,
                (Math.random() - 0.5) * 0.02
            ),
            colorIndex: Math.floor(Math.random() * brandColors.length)
        });

        // Assign Brand Color
        const color = brandColors[particlesData[i].colorIndex];
        colorsArray[i*3] = color.r;
        colorsArray[i*3+1] = color.g;
        colorsArray[i*3+2] = color.b;
    }

    particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
    particlesGeometry.setAttribute('color', new THREE.BufferAttribute(colorsArray, 3));

    // Particle Material (Circles)
    // Create a circular texture programmatically
    const canvas = document.createElement('canvas');
    canvas.width = 32; canvas.height = 32;
    const context = canvas.getContext('2d');
    context.beginPath();
    context.arc(16, 16, 15, 0, Math.PI * 2);
    context.fillStyle = 'white';
    context.fill();
    const circleTexture = new THREE.CanvasTexture(canvas);

    const particlesMaterial = new THREE.PointsMaterial({
        size: 0.5,
        vertexColors: true,
        map: circleTexture,
        transparent: true,
        alphaTest: 0.5
    });

    const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
    scene.add(particlesMesh);

    // Lines
    const linesMaterial = new THREE.LineBasicMaterial({
        vertexColors: true,
        transparent: true,
        opacity: 0.6,
        linewidth: 1 // Note: Windows WebGL implementation often limits line width to 1
    });

    // We will create a line geometry that can hold max possible connections
    // Max connections = N * (N-1) / 2
    // For 60 particles = 1770 connections. 
    const maxConnections = particlesCount * (particlesCount - 1) / 2;
    const linesGeometry = new THREE.BufferGeometry();
    const linePositions = new Float32Array(maxConnections * 6); // 2 points per line * 3 coords
    const lineColors = new Float32Array(maxConnections * 6); // 2 points per line * 3 RGB

    linesGeometry.setAttribute('position', new THREE.BufferAttribute(linePositions, 3));
    linesGeometry.setAttribute('color', new THREE.BufferAttribute(lineColors, 3));
    linesGeometry.setDrawRange(0, 0);

    const linesMesh = new THREE.LineSegments(linesGeometry, linesMaterial);
    scene.add(linesMesh);

    // Mouse Interaction
    const mouse = new THREE.Vector2(9999, 9999); // Start off-screen

    document.addEventListener('mousemove', (event) => {
        const rect = container.getBoundingClientRect();
        mouse.x = (event.clientX - rect.left) / container.clientWidth * 2 - 1;
        mouse.y = -((event.clientY - rect.top) / container.clientHeight) * 2 + 1;
        
        // Map normalized coordinates to roughly scene coordinates at z=0
        // This is an approximation for interaction
        mouse.sceneX = mouse.x * 20; 
        mouse.sceneY = mouse.y * 20;
    });

    // Animation Loop
    function animate() {
        requestAnimationFrame(animate);

        // Update Particles
        const positions = particlesMesh.geometry.attributes.position.array;
        let vertexIndex = 0;
        let lineVertexIndex = 0;
        let lineColorsIndex = 0;
        let numConnected = 0;

        for (let i = 0; i < particlesCount; i++) {
            // Update position
            positions[i*3] += particlesData[i].velocity.x;
            positions[i*3+1] += particlesData[i].velocity.y;
            positions[i*3+2] += particlesData[i].velocity.z;

            // Bounce off "walls" (Soft limits)
            if (positions[i*3] < -25 || positions[i*3] > 25) particlesData[i].velocity.x = -particlesData[i].velocity.x;
            if (positions[i*3+1] < -25 || positions[i*3+1] > 25) particlesData[i].velocity.y = -particlesData[i].velocity.y;
            if (positions[i*3+2] < -10 || positions[i*3+2] > 10) particlesData[i].velocity.z = -particlesData[i].velocity.z;
            
            // Check Connections
            for (let j = i + 1; j < particlesCount; j++) {
                const dx = positions[i*3] - positions[j*3];
                const dy = positions[i*3+1] - positions[j*3+1];
                const dz = positions[i*3+2] - positions[j*3+2];
                const dist = Math.sqrt(dx*dx + dy*dy + dz*dz);

                if (dist < connectionDistance) {
                    // Add Line Position
                    linePositions[lineVertexIndex++] = positions[i*3];
                    linePositions[lineVertexIndex++] = positions[i*3+1];
                    linePositions[lineVertexIndex++] = positions[i*3+2];

                    linePositions[lineVertexIndex++] = positions[j*3];
                    linePositions[lineVertexIndex++] = positions[j*3+1];
                    linePositions[lineVertexIndex++] = positions[j*3+2];

                    // Add Line Color (Gradient between the two particle colors)
                    const color1 = brandColors[particlesData[i].colorIndex];
                    const color2 = brandColors[particlesData[j].colorIndex];

                    lineColors[lineColorsIndex++] = color1.r;
                    lineColors[lineColorsIndex++] = color1.g;
                    lineColors[lineColorsIndex++] = color1.b;

                    lineColors[lineColorsIndex++] = color2.r;
                    lineColors[lineColorsIndex++] = color2.g;
                    lineColors[lineColorsIndex++] = color2.b;

                    numConnected++;
                }
            }
        }

        particlesMesh.geometry.attributes.position.needsUpdate = true;
        
        linesMesh.geometry.setDrawRange(0, numConnected * 2);
        linesMesh.geometry.attributes.position.needsUpdate = true;
        linesMesh.geometry.attributes.color.needsUpdate = true;

        // Slow Rotation of whole system
        scene.rotation.y += 0.001;
        scene.rotation.x += 0.0005;

        renderer.render(scene, camera);
    }

    animate();

    // Resize Handler
    window.addEventListener('resize', () => {
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    });
}
