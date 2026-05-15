document.addEventListener("DOMContentLoaded", () => {

    // 1. Initialize Lenis for Smooth Scrolling
    const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        direction: 'vertical',
        gestureDirection: 'vertical',
        smooth: true,
        mouseMultiplier: 1,
        smoothTouch: false,
        touchMultiplier: 2,
        infinite: false,
    });

    // 2. Synchronize Lenis with GSAP ScrollTrigger
    lenis.on('scroll', ScrollTrigger.update);

    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });
    gsap.ticker.lagSmoothing(0);

    gsap.registerPlugin(ScrollTrigger);

    // 3. Smart Navbar (Hide on scroll down, Show on scroll up)
    const navbar = document.getElementById('navbar');
    if (navbar) {
        let lastScrollY = window.scrollY;
        
        lenis.on('scroll', (e) => {
            const currentScrollY = window.scrollY;
            
            if (currentScrollY > 50) {
                navbar.classList.add('shadow-lg', 'bg-eco-dark/90', 'backdrop-blur-xl');
                navbar.classList.remove('bg-eco-dark/50', 'backdrop-blur-md');
                
                // Hide/Show logic
                if (currentScrollY > lastScrollY && currentScrollY > 200) {
                    // Scrolling down
                    gsap.to(navbar, { y: '-100%', duration: 0.4, ease: 'power3.out' });
                } else {
                    // Scrolling up
                    gsap.to(navbar, { y: '0%', duration: 0.4, ease: 'power3.out' });
                }
            } else {
                navbar.classList.add('bg-eco-dark/50', 'backdrop-blur-md');
                navbar.classList.remove('shadow-lg', 'bg-eco-dark/90', 'backdrop-blur-xl');
                gsap.to(navbar, { y: '0%', duration: 0.4, ease: 'power3.out' });
            }
            lastScrollY = currentScrollY;
        });
    }

    // 4. Magnetic Effects for Buttons and Links
    const magneticElements = document.querySelectorAll('.magnetic');
    magneticElements.forEach((elem) => {
        elem.addEventListener('mousemove', (e) => {
            const rect = elem.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            
            gsap.to(elem, {
                x: x * 0.3,
                y: y * 0.3,
                duration: 0.6,
                ease: 'power3.out'
            });
        });

        elem.addEventListener('mouseleave', () => {
            gsap.to(elem, {
                x: 0,
                y: 0,
                duration: 0.6,
                ease: 'elastic.out(1, 0.3)'
            });
        });
    });

    // 5. Universal GSAP Reveals
    const revealUpElements = gsap.utils.toArray('.reveal-up');
    revealUpElements.forEach((elem) => {
        gsap.from(elem, {
            y: 60,
            opacity: 0,
            duration: 1,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: elem,
                start: 'top 85%',
                toggleActions: 'play none none reverse'
            }
        });
    });

    const revealFadeElements = gsap.utils.toArray('.reveal-fade');
    revealFadeElements.forEach((elem) => {
        gsap.from(elem, {
            opacity: 0,
            duration: 1.5,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: elem,
                start: 'top 85%',
                toggleActions: 'play none none reverse'
            }
        });
    });

    // 6. Hero Section Animations
    const tlHero = gsap.timeline();
    tlHero.to('.hero-text-line', {
        y: 0,
        duration: 1.2,
        stagger: 0.15,
        ease: 'power4.out',
        delay: 1.2 // Delayed to accommodate splash loader
    })
    .to('.hero-element', {
        y: 0,
        opacity: 1,
        duration: 1,
        stagger: 0.1,
        ease: 'power3.out'
    }, "-=0.8");

    // 7. Story Section Parallax
    if (document.getElementById('story-section')) {
        gsap.to('.story-image-container', {
            y: -80,
            ease: 'none',
            scrollTrigger: {
                trigger: '#story-section',
                start: 'top bottom',
                end: 'bottom top',
                scrub: 1 // Add smooth scrubbing
            }
        });
    }

    // 8. Product Cards Stagger Reveal
    gsap.from('.product-card', {
        y: 80,
        opacity: 0,
        duration: 1,
        stagger: 0.15,
        ease: 'power3.out',
        scrollTrigger: {
            trigger: '.product-card',
            start: 'top 85%',
            toggleActions: 'play none none reverse'
        }
    });

});
