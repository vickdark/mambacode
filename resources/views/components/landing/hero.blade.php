<!-- Hero Section -->
<header class="hero-section animate__animated animate__fadeInUp" id="inicio">
    <!-- Vanta.js Net Background Container - Enterprise Tech Look -->
    <div id="vanta-hero-background" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -2; opacity: 0.4;"></div>
    
    <!-- Dark Gradient Overlay for Readability -->
    <div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; background: linear-gradient(to bottom, rgba(15, 23, 42, 0.3) 0%, rgba(15, 23, 42, 0.8) 100%); pointer-events: none;"></div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-start mb-5 mb-lg-0 position-relative">
                
                <div class="hero-brand-mark mb-4 animate__animated animate__fadeInDown">
                    <img src="{{ asset('img/mambacode-complete-removebg-preview.png') }}" alt="Mamba Code Logo" class="hero-logo-img">
                </div>
                <h1 class="hero-title mb-4">
                    Soluciones Tecnológicas <br>
                    <span>Evolucionamos tu Software</span>
                </h1>
                <p class="hero-subtitle mb-4" style="opacity: 1 !important; color: #fff;">
                    Analizamos la lógica de tu negocio para transformarla en soluciones digitales a medida. Diseñamos plataformas inteligentes para automatizar tus procesos y escalar tu infraestructura.
                </p>
                <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
                    <a href="#caracteristicas" class="btn btn-cyber px-4 py-3">Explorar Soluciones</a>
                    <a href="#contacto" class="btn btn-outline-light px-4 py-3 rounded-pill">Agendar Consultoría</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-cards-wrapper">
                    <div class="animate__animated animate__fadeInRight" style="animation-delay: 0.1s;">
                        <div class="floating-wrapper">
                            <div class="feature-card hero-feature-card">
                                <div class="feature-icon">
                                    <i class="fa-solid fa-microchip fa-2x"></i>
                                </div>
                                <h3 class="feature-title fs-3">Análisis y Consultoría</h3>
                                <p class="feature-desc fs-6" style="opacity: 1 !important; color: #fff;">
                                    Estudiamos profundamente tu lógica de negocio para diseñar la solución tecnológica ideal, construyendo desde cero la infraestructura que necesitas.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="animate__animated animate__fadeInRight" style="animation-delay: 0.3s;">
                        <div class="floating-wrapper second-float">
                            <div class="feature-card hero-feature-card">
                                <div class="feature-icon">
                                    <i class="fa-solid fa-headset fa-2x"></i>
                                </div>
                                <h3 class="feature-title fs-3">Soporte y Disponibilidad</h3>
                                <p class="feature-desc fs-6 mb-0" style="opacity: 1 !important; color: #fff;">
                                    Disponibilidad garantizada y servicio de soporte técnico experto 24/7 para asegurar la continuidad de tu ecosistema tecnológico.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Custom Three.js Multicolor Network Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('vanta-hero-background');
        
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
        const windowHalfX = window.innerWidth / 2;
        const windowHalfY = window.innerHeight / 2;

        document.addEventListener('mousemove', (event) => {
            mouse.x = (event.clientX - container.getBoundingClientRect().left) / container.clientWidth * 2 - 1;
            mouse.y = -((event.clientY - container.getBoundingClientRect().top) / container.clientHeight) * 2 + 1;
            
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
                
                // Mouse Interaction (Repel/Attract)
                // Simple version: just slight movement
                
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
    });
</script>
