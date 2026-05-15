<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Renu Biome') ?></title>
    <meta name="description" content="<?= htmlspecialchars($meta_description ?? 'Engineering the Future of Regenerative Agriculture') ?>">
    
    <!-- OpenGraph SEO -->
    <meta property="og:title" content="<?= htmlspecialchars($title ?? 'Renu Biome') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($meta_description ?? 'Engineering the Future of Regenerative Agriculture') ?>">
    <meta property="og:type" content="website">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN with High-End Configuration -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'eco-dark': '#0A0A0A',      // Deep Charcoal
                        'eco-darker': '#050505',
                        'eco-green': '#0E8028',     // Brand Green
                        'eco-orange': '#FF6B00',    // Brand Orange
                        'glass': 'rgba(255, 255, 255, 0.02)',
                        'glass-border': 'rgba(255, 255, 255, 0.08)',
                    },
                    fontFamily: {
                        'sans': ['Inter', 'sans-serif'],
                        'display': ['Outfit', 'sans-serif'],
                    },
                    backgroundImage: {
                        'biotech-glow': 'radial-gradient(circle at center, rgba(255, 107, 0, 0.1) 0%, rgba(10, 10, 10, 0) 70%)',
                        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                    },
                    animation: {
                        'blob': 'blob 10s infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Custom CSS Overrides -->
    <style>
        body { background-color: #060B09; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #030504; }
        ::-webkit-scrollbar-thumb { background: rgba(0, 255, 163, 0.2); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(0, 255, 163, 0.5); }
        /* Performance Overrides */
        .glass-panel {
            background: linear-gradient(135deg, rgba(255,255,255,0.03) 0%, rgba(255,255,255,0.01) 100%);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.05);
            box-shadow: 0 4px 16px 0 rgba(0, 0, 0, 0.2);
            transform: translateZ(0);
        }
        .blur-\[200px\], .blur-\[150px\] {
            filter: blur(60px) !important;
            will-change: transform;
        }
        .animate-blob {
            animation: float 10s ease-in-out infinite !important;
        }
        
        /* View Transitions */
        ::view-transition-old(root),
        ::view-transition-new(root) {
            animation-duration: 0.2s;
            animation-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
        ::view-transition-old(root) { animation-name: fade-out; }
        ::view-transition-new(root) { animation-name: fade-in; }
        @keyframes fade-in { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fade-out { from { opacity: 1; transform: translateY(0); } to { opacity: 0; transform: translateY(-5px); } }
        
        /* Smooth Grow Loader Animation */
        @keyframes logo-reveal {
            0% { transform: translateY(80px) scale(0.5); opacity: 0; }
            100% { transform: translateY(0) scale(1.2); opacity: 1; }
        }
        .grow-loader {
            animation: logo-reveal 1.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>
    
    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    
    <!-- Three.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    
    <!-- Lenis for Smooth Scrolling -->
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>
    
    <!-- Fast Response: Speculation Rules for Prerendering -->
    <script type="speculationrules">
    {
      "prerender": [{
        "source": "document",
        "where": {"and": [{"href_matches": "/*"}]},
        "eagerness": "moderate"
      }]
    }
    </script>
</head>
<body class="bg-[#060B09] text-white font-sans overflow-x-hidden antialiased selection:bg-eco-green selection:text-eco-dark">
    
    <!-- Full Page Splash Loader -->
    <div id="page-loader" class="fixed inset-0 z-[99999] bg-[#060B09] flex items-center justify-center transition-opacity duration-700">
        <!-- New Splash Logo with Pulse Animation -->
        <div class="relative grow-loader">
            <div class="absolute inset-0 bg-[#FF6B00] filter blur-[60px] opacity-20 rounded-full animate-pulse"></div>
            <img src="/images/splash-logo.png" alt="Renu Biome Splash Logo" class="relative z-10 w-64 md:w-80 h-auto drop-shadow-2xl object-contain">
        </div>
    </div>
    
    <!-- Inline Loader Logic to completely bypass browser cache -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const loader = document.getElementById('page-loader');
            if (loader) {
                // Minimum time the loader MUST show to complete the animation (1.5s)
                const minShowTime = 1500;
                const startTime = Date.now();

                const hideLoader = () => {
                    const elapsed = Date.now() - startTime;
                    const remaining = Math.max(0, minShowTime - elapsed);
                    
                    setTimeout(() => {
                        if (loader.style.display === 'none') return;
                        loader.style.opacity = '0';
                        setTimeout(() => {
                            loader.style.display = 'none';
                            if (typeof window.triggerHeroAnimations === 'function') {
                                window.triggerHeroAnimations();
                            }
                        }, 700); // Wait for CSS transition
                    }, remaining);
                };
                
                // Ensure it gets hidden if 'load' event doesn't fire
                setTimeout(hideLoader, 3000); 
                window.addEventListener('load', hideLoader);
            }
        });
    </script>


    <!-- Header / Navbar -->
    <header class="fixed w-full top-0 z-40 transition-all duration-300 backdrop-blur-md bg-eco-dark/50 border-b border-glass-border" id="navbar">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center gap-2">
                <img src="https://renu-biome.com/cdn/shop/files/logo-_crop_light_new.png?v=1745557038&width=600" alt="ReNu-Biome Logo" class="h-10 object-contain drop-shadow-[0_0_15px_rgba(0,255,163,0.3)]">
            </a>
            
            <nav class="hidden lg:flex items-center gap-8 text-[13px] font-bold tracking-[0.1em] text-white uppercase">
                <a href="/" class="hover:text-[#FF6B00] transition-colors py-6">Home</a>
                <a href="/shop" class="hover:text-[#FF6B00] transition-colors py-6">Shop</a>
                <a href="/green-chemistry" class="hover:text-[#FF6B00] transition-colors py-6">Green Nitrogen</a>
                <a href="/peptide-nutrition" class="hover:text-[#FF6B00] transition-colors py-6">Peptide Nutrition</a>
                <a href="/biologicals" class="hover:text-[#FF6B00] transition-colors py-6">Fermentation</a>
                
                <!-- Bee Bloom Dropdown -->
                <div class="relative group cursor-pointer py-6">
                    <span class="hover:text-[#FF6B00] transition-colors flex items-center gap-1">
                        Bee Bloom 
                        <svg class="w-3 h-3 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                    <div class="absolute top-full left-1/2 -translate-x-1/2 w-48 bg-eco-dark/95 backdrop-blur-xl border border-glass-border rounded-lg shadow-[0_10px_30px_rgba(0,0,0,0.5)] opacity-0 invisible translate-y-4 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 flex flex-col py-2">
                        <a href="/bee-bloom" class="px-5 py-3 hover:bg-white/5 hover:text-[#FF6B00] transition-colors">Bee Bloom</a>
                        <a href="/pheromones" class="px-5 py-3 hover:bg-white/5 hover:text-[#FF6B00] transition-colors">Pheromones</a>
                    </div>
                </div>

                <!-- Organic Line Dropdown -->
                <div class="relative group cursor-pointer py-6">
                    <span class="hover:text-[#FF6B00] transition-colors flex items-center gap-1">
                        Organic Line 
                        <svg class="w-3 h-3 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                    <div class="absolute top-full left-1/2 -translate-x-1/2 w-56 bg-eco-dark/95 backdrop-blur-xl border border-glass-border rounded-lg shadow-[0_10px_30px_rgba(0,0,0,0.5)] opacity-0 invisible translate-y-4 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 flex flex-col py-2">
                        <a href="/omri" class="px-5 py-3 hover:bg-white/5 hover:text-[#FF6B00] transition-colors">OMRI Approved</a>
                        <a href="/mycorrhizae" class="px-5 py-3 hover:bg-white/5 hover:text-[#FF6B00] transition-colors">Mycorrhizae</a>
                        <a href="/nematade-control" class="px-5 py-3 hover:bg-white/5 hover:text-[#FF6B00] transition-colors">Nematode Control</a>
                    </div>
                </div>

                <!-- Contact Us Dropdown -->
                <div class="relative group cursor-pointer py-6">
                    <span class="hover:text-[#FF6B00] transition-colors flex items-center gap-1">
                        Contact Us 
                        <svg class="w-3 h-3 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </span>
                    <div class="absolute top-full left-1/2 -translate-x-1/2 w-48 bg-eco-dark/95 backdrop-blur-xl border border-glass-border rounded-lg shadow-[0_10px_30px_rgba(0,0,0,0.5)] opacity-0 invisible translate-y-4 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 flex flex-col py-2">
                        <a href="/contact" class="px-5 py-3 hover:bg-white/5 hover:text-[#FF6B00] transition-colors">Support</a>
                        <a href="/about-us" class="px-5 py-3 hover:bg-white/5 hover:text-[#FF6B00] transition-colors">About Us</a>
                        <a href="/sustainability" class="px-5 py-3 hover:bg-white/5 hover:text-[#FF6B00] transition-colors">Sustainability</a>
                        <a href="/circadian-clock" class="px-5 py-3 hover:bg-white/5 hover:text-[#FF6B00] transition-colors">Circadian Clock</a>
                        <a href="/r-and-d" class="px-5 py-3 hover:bg-white/5 hover:text-[#FF6B00] transition-colors">R & D</a>
                        <a href="/partners" class="px-5 py-3 hover:bg-white/5 hover:text-[#FF6B00] transition-colors">Partners</a>
                    </div>
                </div>
            </nav>
            
            <div class="flex items-center gap-5 text-white">
                <!-- User Profile Icon -->
                <a href="/login" class="hover:text-[#FF6B00] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </a>
                <!-- Cart Icon -->
                <a href="/cart" class="relative hover:text-[#FF6B00] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    <span id="cartBadge" class="absolute -top-2 -right-2 w-4 h-4 bg-[#FF6B00] text-[#060B09] rounded-full text-[9px] font-bold flex items-center justify-center scale-0 transition-transform origin-center">0</span>
                </a>
            </div>
            
            <button class="lg:hidden text-white hover:text-[#FF6B00] transition-colors" id="mobile-menu-btn">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

        <!-- Mobile Menu Overlay -->
        <div id="mobile-menu" class="fixed inset-0 bg-[#060B09]/95 backdrop-blur-2xl z-[100] transform translate-x-full transition-transform duration-500 flex flex-col pt-24 px-8 pb-10 overflow-y-auto">
            <button id="close-mobile-menu" class="absolute top-6 right-6 text-white hover:text-[#FF6B00] transition-colors">
                <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            
            <a href="/" class="mb-12">
                <img src="https://renu-biome.com/cdn/shop/files/logo-_crop_light_new.png?v=1745557038&width=600" alt="ReNu-Biome Logo" class="h-10 object-contain drop-shadow-[0_0_15px_rgba(0,255,163,0.3)]">
            </a>

            <nav class="flex flex-col gap-6 text-xl font-bold tracking-widest text-white uppercase">
                <a href="/" class="hover:text-[#FF6B00] transition-colors">Home</a>
                <a href="/shop" class="hover:text-[#FF6B00] transition-colors">Shop</a>
                <a href="/green-chemistry" class="hover:text-[#FF6B00] transition-colors">Green Nitrogen</a>
                <a href="/peptide-nutrition" class="hover:text-[#FF6B00] transition-colors">Peptide Nutrition</a>
                <a href="/biologicals" class="hover:text-[#FF6B00] transition-colors">Fermentation</a>
                
                <div class="border-t border-white/10 my-2 pt-6">
                    <p class="text-[#FF6B00] text-xs mb-4">Bee Bloom</p>
                    <div class="flex flex-col gap-4 text-lg">
                        <a href="/bee-bloom" class="hover:text-[#FF6B00] transition-colors">Bee Bloom</a>
                        <a href="/pheromones" class="hover:text-[#FF6B00] transition-colors">Pheromones</a>
                    </div>
                </div>

                <div class="border-t border-white/10 my-2 pt-6">
                    <p class="text-[#FF6B00] text-xs mb-4">Organic Line</p>
                    <div class="flex flex-col gap-4 text-lg">
                        <a href="/omri" class="hover:text-[#FF6B00] transition-colors">OMRI Approved</a>
                        <a href="/mycorrhizae" class="hover:text-[#FF6B00] transition-colors">Mycorrhizae</a>
                        <a href="/nematade-control" class="hover:text-[#FF6B00] transition-colors">Nematode Control</a>
                    </div>
                </div>

                <div class="border-t border-white/10 my-2 pt-6">
                    <p class="text-[#FF6B00] text-xs mb-4">Contact & Company</p>
                    <div class="flex flex-col gap-4 text-lg">
                        <a href="/contact" class="hover:text-[#FF6B00] transition-colors">Support</a>
                        <a href="/about-us" class="hover:text-[#FF6B00] transition-colors">About Us</a>
                        <a href="/sustainability" class="hover:text-[#FF6B00] transition-colors">Sustainability</a>
                    </div>
                </div>
            </nav>
            
            <div class="mt-auto pt-10 flex gap-6 border-t border-white/10">
                <a href="/login" class="flex items-center gap-2 hover:text-[#FF6B00] transition-colors text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="text-sm font-bold uppercase tracking-widest">Login</span>
                </a>
                <a href="/cart" class="flex items-center gap-2 hover:text-[#FF6B00] transition-colors text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    <span class="text-sm font-bold uppercase tracking-widest">Cart</span>
                </a>
            </div>
        </div>

        <script>
            document.getElementById('mobile-menu-btn').addEventListener('click', () => {
                document.getElementById('mobile-menu').classList.remove('translate-x-full');
            });
            document.getElementById('close-mobile-menu').addEventListener('click', () => {
                document.getElementById('mobile-menu').classList.add('translate-x-full');
            });
        </script>
    </header>

    <!-- Main Content -->
    <main id="smooth-wrapper">
        <div id="smooth-content">
            <?php require $viewFile; ?>
            
            <!-- Footer -->
            <footer class="border-t border-glass-border bg-eco-dark/80 backdrop-blur-sm pt-20 pb-10 mt-32 relative overflow-hidden">
                <div class="absolute inset-0 bg-biotech-glow opacity-30"></div>
                <div class="container mx-auto px-6 relative z-10">
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-12 mb-16">
                        <div>
                            <a href="/" class="mb-6 block">
                                <img src="https://renu-biome.com/cdn/shop/files/logo-_crop_light_new.png?v=1745557038&width=600" alt="ReNu-Biome Logo" class="h-8 object-contain opacity-80 hover:opacity-100 transition-opacity">
                            </a>
                            <p class="text-gray-400 text-sm leading-relaxed">Creating solutions to combat climate change. Based in the United States of America.</p>
                            <a href="mailto:support@ReNu-Biome.com" class="text-[#FF6B00] text-sm mt-4 inline-block hover:underline">support@ReNu-Biome.com</a>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-6 text-white">Company</h4>
                            <ul class="space-y-3 text-sm text-gray-400">
                                <li><a href="/circadian-clock" class="hover:text-[#FF6B00] transition-colors">Circadian Clock</a></li>
                                <li><a href="/green-chemistry" class="hover:text-[#FF6B00] transition-colors">Green Chemistry</a></li>
                                <li><a href="/peptide-nutrition" class="hover:text-[#FF6B00] transition-colors">Peptide Nutrition</a></li>
                                <li><a href="/biologicals" class="hover:text-[#FF6B00] transition-colors">Biologicals</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-6 text-white">Our Journey</h4>
                            <ul class="space-y-3 text-sm text-gray-400">
                                <li><a href="/r-and-d" class="hover:text-[#FF6B00] transition-colors">R & D</a></li>
                                <li><a href="/partners" class="hover:text-[#FF6B00] transition-colors">Partners</a></li>
                                <li><a href="/sustainability" class="hover:text-[#FF6B00] transition-colors">Sustainability</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-6 text-white">Legal & Press</h4>
                            <ul class="space-y-3 text-sm text-gray-400">
                                <li><a href="/privacy" class="hover:text-[#FF6B00] transition-colors">Privacy Policy</a></li>
                                <li><a href="/terms" class="hover:text-[#FF6B00] transition-colors">Terms & Conditions</a></li>
                                <li><a href="/credits" class="hover:text-[#FF6B00] transition-colors">Credits</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-6 text-white">Stay Updated</h4>
                            <p class="text-sm text-gray-400 mb-4">Subscribe to our newsletter for the latest biotech research and product updates.</p>
                            <form action="#" method="POST" class="flex flex-col gap-3" onsubmit="event.preventDefault(); this.querySelector('button').innerText = 'Subscribed!'; this.querySelector('button').classList.add('bg-eco-teal');">
                                <input type="email" required placeholder="Enter your email" class="w-full bg-[#030504]/80 border border-white/10 rounded-lg px-4 py-3 text-sm text-white focus:outline-none focus:border-[#FF6B00] transition-colors">
                                <button type="submit" class="w-full bg-[#FF6B00] text-white font-bold rounded-lg px-4 py-3 text-sm hover:shadow-lg transition-all">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="border-t border-glass-border pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
                        <p>&copy; <?= date('Y') ?> ReNu-Biome. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <!-- Custom Scripts -->
    <script src="/js/main.js?v=<?= time() ?>"></script>
    <script>
        // Global Cart Badge Logic
        function updateCartBadge() {
            const cart = JSON.parse(localStorage.getItem('rb_cart')) || [];
            const badge = document.getElementById('cartBadge');
            if(!badge) return;
            
            const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
            
            if (totalItems > 0) {
                badge.innerText = totalItems;
                badge.classList.remove('scale-0');
                badge.classList.add('scale-100');
            } else {
                badge.classList.remove('scale-100');
                badge.classList.add('scale-0');
            }
        }

        window.addEventListener('cartUpdated', updateCartBadge);
        document.addEventListener('DOMContentLoaded', updateCartBadge);
    </script>
</body>
</html>
