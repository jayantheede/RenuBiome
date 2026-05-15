<?php
$cmsData = [];
$dataFile = __DIR__ . '/../../../database/data.json';
if (file_exists($dataFile)) {
    $cmsData = json_decode(file_get_contents($dataFile), true);
}
$homeData = $cmsData['home'] ?? [];
?>
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden bg-[#060B09]">
    <!-- Cinematic Video Background -->
    <div class="absolute inset-0 z-0 overflow-hidden hero-parallax">
        <video autoplay muted loop playsinline class="absolute top-1/2 left-1/2 w-auto min-w-full min-h-full max-w-none transform -translate-x-1/2 -translate-y-1/2 object-cover opacity-100">
            <source src="https://cdn.shopify.com/videos/c/o/v/709ae03004e14d61adb91e2454277ef1.mp4" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-black/40"></div> <!-- Dark overlay for text readability -->
    </div>

    <div class="container mx-auto px-6 relative z-10 text-center flex flex-col items-center">
        <h1 class="text-6xl md:text-8xl lg:text-9xl font-display font-bold tracking-tight mb-8 hero-text drop-shadow-2xl hero-element">
            <span class="text-white"><?= htmlspecialchars($homeData['hero_title'] ?? 'The Power of Microbes') ?></span>
        </h1>
        
        <p class="max-w-3xl text-lg md:text-xl text-gray-300 mb-12 hero-element font-light leading-relaxed drop-shadow-lg">
            <?= htmlspecialchars($homeData['hero_subtitle'] ?? 'We are committed to helping growers improve farm production, resiliency and profitability while sustaining the health of soils and ecosystems.') ?>
        </p>
        
        <div class="flex flex-col sm:flex-row gap-6 hero-element">
            <a href="<?= htmlspecialchars($homeData['hero_button_link'] ?? '/shop') ?>" class="magnetic px-10 py-4 bg-transparent border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-black transition-all duration-300 tracking-wide uppercase shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:shadow-[0_0_30px_rgba(255,255,255,0.4)] inline-block">
                <?= htmlspecialchars($homeData['hero_button_text'] ?? 'Explore Products') ?>
            </a>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-3 opacity-80 hero-element animate-float text-white cursor-pointer" onclick="document.getElementById('scroll-popup').classList.remove('opacity-0', 'pointer-events-none');">
        <span class="text-[10px] uppercase tracking-[0.3em] font-semibold drop-shadow-md">Scroll</span>
        <div class="w-[1px] h-16 bg-gradient-to-b from-white to-transparent"></div>
    </div>
</section>

<!-- Scroll Popup Form Modal -->
<div id="scroll-popup" class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/80 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-500">
    <div class="relative w-full max-w-lg mx-4 glass-panel p-8 md:p-10 rounded-[2rem] bg-[#030504]/90 border border-white/10 shadow-[0_0_50px_rgba(0,0,0,0.8)] transform scale-95 transition-transform duration-500 popup-content">
        
        <!-- Close Button -->
        <button onclick="document.getElementById('scroll-popup').classList.add('opacity-0', 'pointer-events-none'); localStorage.setItem('formDismissed', 'true');" class="absolute top-6 right-6 text-gray-400 hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <!-- Form Glowing Accent -->
        <div class="absolute -top-20 -right-20 w-40 h-40 bg-[#FF6B00] rounded-full blur-[80px] opacity-20 pointer-events-none"></div>
        <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-[#0E8028] rounded-full blur-[80px] opacity-20 pointer-events-none"></div>
        
        <div class="text-center mb-6 relative z-10">
            <h2 class="text-3xl font-bold text-white mb-2">Partner with Us</h2>
            <p class="text-gray-400 text-sm">Discover how our advanced biologicals can transform your yield.</p>
        </div>
        
        <form action="#" method="POST" class="relative z-10 flex flex-col gap-5" id="popup-lead-form" onsubmit="event.preventDefault(); this.innerHTML='<div class=\'text-center py-10\'><h3 class=\'text-2xl font-bold text-[#0E8028] mb-2\'>Thank You!</h3><p class=\'text-gray-400\'>Your consultation request has been received. We will be in touch shortly.</p></div>'; setTimeout(() => document.getElementById('scroll-popup').classList.add('opacity-0', 'pointer-events-none'), 3000);">
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-1">
                    <label for="popFirstName" class="text-xs font-bold text-gray-400 uppercase tracking-wider">First Name <span class="text-[#FF6B00]">*</span></label>
                    <input type="text" id="popFirstName" name="firstName" required class="bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-[#FF6B00] transition-colors w-full" placeholder="John">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="popLastName" class="text-xs font-bold text-gray-400 uppercase tracking-wider">Last Name <span class="text-[#FF6B00]">*</span></label>
                    <input type="text" id="popLastName" name="lastName" required class="bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-[#FF6B00] transition-colors w-full" placeholder="Doe">
                </div>
            </div>

            <div class="flex flex-col gap-1">
                <label for="popEmail" class="text-xs font-bold text-gray-400 uppercase tracking-wider">Business Email <span class="text-[#FF6B00]">*</span></label>
                <input type="email" id="popEmail" name="email" required class="bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-[#FF6B00] transition-colors w-full" placeholder="john@farm.com">
            </div>

            <div class="flex flex-col gap-1">
                <label for="popAcreage" class="text-xs font-bold text-gray-400 uppercase tracking-wider">Farm Acreage</label>
                <select id="popAcreage" name="acreage" class="bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-[#FF6B00] transition-colors w-full appearance-none">
                    <option value="" disabled selected>Select an option</option>
                    <option value="<500">Less than 500 acres</option>
                    <option value="500-2000">500 - 2,000 acres</option>
                    <option value="2000-5000">2,000 - 5,000 acres</option>
                    <option value=">5000">More than 5,000 acres</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-[#FF6B00] text-white font-bold rounded-xl px-4 py-4 text-sm mt-2 hover:bg-white hover:text-black transition-all duration-300 uppercase tracking-widest shadow-[0_0_20px_rgba(255,107,0,0.3)] hover:shadow-[0_0_30px_rgba(255,255,255,0.4)]">
                Get My Free Consultation
            </button>
            
            <p class="text-center text-[10px] text-gray-500 mt-2">By submitting this form, you agree to our privacy policy and terms of service.</p>
        </form>
    </div>
</div>

<!-- Scroll Trigger Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let popupTriggered = false;
        
        // Show popup when scrolling down 300px
        window.addEventListener('scroll', () => {
            if (!popupTriggered && window.scrollY > 300) {
                // Check if user hasn't already dismissed it in this session
                if (!localStorage.getItem('formDismissed')) {
                    const popup = document.getElementById('scroll-popup');
                    if (popup) {
                        popup.classList.remove('opacity-0', 'pointer-events-none');
                        popup.querySelector('.popup-content').classList.remove('scale-95');
                        popup.querySelector('.popup-content').classList.add('scale-100');
                        popupTriggered = true;
                    }
                }
            }
        });
    });
</script>

<!-- Our Approach / Core Pillars -->
<section class="py-40 relative z-10 bg-[#060B09]" id="story-section">
    <div class="container mx-auto px-6">
        <div class="text-center mb-20 section-header reveal-up">
            <div class="text-[#0E8028] font-semibold tracking-widest text-sm uppercase mb-4"><?= htmlspecialchars($homeData['story_subtitle'] ?? 'Our Technology') ?></div>
            <h2 class="text-4xl md:text-6xl font-display font-bold mb-6 text-white"><?= htmlspecialchars($homeData['story_title'] ?? 'Derived From Nature Itself') ?></h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Pillar 1 -->
            <div class="glass-panel p-8 rounded-[30px] group hover:border-[#FF6B00]/30 transition-all duration-500 hover:-translate-y-2 reveal-up">
                <div class="w-14 h-14 rounded-full bg-[#FF6B00]/10 border border-[#FF6B00]/20 flex items-center justify-center mb-6 text-[#FF6B00] group-hover:scale-110 transition-transform shadow-[0_0_20px_rgba(0,255,163,0.1)]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Green Chemistry</h3>
                <p class="text-gray-400 font-light leading-relaxed text-sm">Avoiding wherever possible or minimizing the use of auxiliary substances (e.g. solvents, separation agents) in our formulations.</p>
            </div>

            <!-- Pillar 2 -->
            <div class="glass-panel p-8 rounded-[30px] group hover:border-[#0E8028]/30 transition-all duration-500 hover:-translate-y-2 reveal-up">
                <div class="w-14 h-14 rounded-full bg-[#0E8028]/10 border border-[#0E8028]/20 flex items-center justify-center mb-6 text-[#0E8028] group-hover:scale-110 transition-transform shadow-[0_0_20px_rgba(0,240,255,0.1)]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Phytosterols</h3>
                <p class="text-gray-400 font-light leading-relaxed text-sm">Initiates a cascade of physiological changes that enhance the plant's capacity to withstand and recover from environmental adversity.</p>
            </div>

            <!-- Pillar 3 -->
            <div class="glass-panel p-8 rounded-[30px] group hover:border-gold/30 transition-all duration-500 hover:-translate-y-2 reveal-up">
                <div class="w-14 h-14 rounded-full bg-[#FFB000]/10 border border-[#FFB000]/20 flex items-center justify-center mb-6 text-[#FFB000] group-hover:scale-110 transition-transform shadow-[0_0_20px_rgba(234,179,8,0.1)]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Fermentation Based</h3>
                <p class="text-gray-400 font-light leading-relaxed text-sm">Microbial based fertilizers play a significant role in increasing nutrient availability, suppressing harmful soilborne pathogens and pests.</p>
            </div>

            <!-- Pillar 4 -->
            <div class="glass-panel p-8 rounded-[30px] group hover:border-[#FF6B00]/30 transition-all duration-500 hover:-translate-y-2 reveal-up">
                <div class="w-14 h-14 rounded-full bg-[#FF6B00]/10 border border-[#FF6B00]/20 flex items-center justify-center mb-6 text-[#FF6B00] group-hover:scale-110 transition-transform shadow-[0_0_20px_rgba(0,255,163,0.1)]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-4">Biologicals</h3>
                <p class="text-gray-400 font-light leading-relaxed text-sm">Derived from the nature itself, they boost sustainability in farming by supporting regenerative agriculture frameworks worldwide.</p>
            </div>
        </div>
    </div>
</section>

<!-- Extracted PDF Images Highlights Section -->
<section class="py-32 relative z-10 bg-[#030504] border-t border-white/5 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-transparent to-[#030504] z-0"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row items-end justify-between mb-16 reveal-up">
            <div class="max-w-2xl">
                <div class="text-[#FF6B00] font-bold tracking-widest text-xs uppercase mb-4">Research & Field Data</div>
                <h2 class="text-4xl md:text-5xl font-display font-black text-white">Latest Field <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#0E8028] to-[#FF6B00]">Innovations</span></h2>
            </div>
            <a href="/about-us" class="mt-6 md:mt-0 font-bold text-[#0E8028] hover:text-[#FF6B00] transition-colors flex items-center gap-2">
                View Full Documentation <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="glass-panel rounded-[2.5rem] overflow-hidden shadow-lg shadow-black/50 hover:-translate-y-2 transition-all duration-500">
                <img src="/images/innovation_yield.png" alt="Yield Enhancement Metrics" class="w-full h-64 object-cover">
                <div class="p-10">
                    <h3 class="text-xl font-bold text-white mb-3">Yield Enhancement Metrics</h3>
                    <p class="text-gray-400 font-light leading-relaxed">Our latest formulations have shown significant improvements in crop yield and soil health across diverse environments.</p>
                </div>
            </div>
            <div class="glass-panel rounded-[2.5rem] overflow-hidden shadow-lg shadow-black/50 hover:-translate-y-2 transition-all duration-500 md:-translate-y-8">
                <img src="/images/innovation_lab.png" alt="Laboratory Analysis" class="w-full h-64 object-cover">
                <div class="p-10">
                    <h3 class="text-xl font-bold text-white mb-3">Laboratory Analysis</h3>
                    <p class="text-gray-400 font-light leading-relaxed">State-of-the-art testing guarantees that every batch meets stringent quality and performance standards.</p>
                </div>
            </div>
            <div class="glass-panel rounded-[2.5rem] overflow-hidden shadow-lg shadow-black/50 hover:-translate-y-2 transition-all duration-500">
                <img src="/images/innovation_field.png" alt="Sustainable Field Application" class="w-full h-64 object-cover">
                <div class="p-10">
                    <h3 class="text-xl font-bold text-white mb-3">Sustainable Field Application</h3>
                    <p class="text-gray-400 font-light leading-relaxed">Direct implementation of our green chemistry reduces environmental footprint while maximizing efficiency.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Glass Cards Section -->
<section class="py-40 relative z-10 bg-[#060B09] border-t border-white/5">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#030504] to-[#060B09] z-0"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-24 section-header reveal-up">
            <div class="text-[#FF6B00] font-semibold tracking-widest text-sm uppercase mb-4">ReNu-Biome Catalog</div>
            <h2 class="text-5xl md:text-7xl font-display font-bold mb-8 text-white">Our Product <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#FF6B00] to-[#0E8028]">Lines</span></h2>
            <p class="text-gray-400 text-xl max-w-2xl mx-auto font-light">Approved in ND, TX, OR, AZ, GA, FL, MN, MI, PA, WY, NM, MO, NY & many more states.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Product Card 1 -->
            <div class="product-card group relative p-[1px] rounded-[30px] bg-gradient-to-b from-white/10 to-transparent hover:from-[#FF6B00]/50 transition-colors duration-500">
                <div class="h-full glass-panel bg-[#050806]/80 p-10 rounded-[29px] flex flex-col relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-[#FF6B00] opacity-0 filter blur-[80px] group-hover:opacity-20 transition-opacity duration-700"></div>
                    
                    <div class="mb-12 h-48 flex items-center justify-center relative">
                        <img src="/images/green_nitrogen.png" alt="Green Nitrogen" class="w-full h-full object-cover rounded-[20px] shadow-[0_0_40px_rgba(0,255,163,0.2)] relative z-10 group-hover:scale-105 transition-transform duration-700">
                    </div>
                    
                    <div class="mt-auto relative z-20">
                        <div class="text-xs text-[#FF6B00] font-bold tracking-[0.2em] uppercase mb-3">OMRI Approved</div>
                        <h3 class="text-3xl font-display font-bold mb-4 text-white">Green Nitrogen</h3>
                        <p class="text-gray-400 text-base mb-8 leading-relaxed font-light">Sustainable nitrogen fixation to significantly reduce the need for synthetic N applications.</p>
                        
                        <a href="/shop" class="inline-flex items-center gap-3 text-sm font-bold tracking-wider text-white group-hover:text-[#FF6B00] transition-colors uppercase">
                            View Details 
                            <svg class="w-5 h-5 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="product-card group relative p-[1px] rounded-[30px] bg-gradient-to-b from-white/10 to-transparent hover:from-[#0E8028]/50 transition-colors duration-500 mt-0 md:mt-16">
                <div class="h-full glass-panel bg-[#050806]/80 p-10 rounded-[29px] flex flex-col relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-[#0E8028] opacity-0 filter blur-[80px] group-hover:opacity-20 transition-opacity duration-700"></div>
                    
                    <div class="mb-12 h-48 flex items-center justify-center relative">
                        <img src="/images/peptide_nutrition.png" alt="Peptide Nutrition" class="w-full h-full object-cover rounded-[20px] shadow-[0_0_40px_rgba(0,240,255,0.2)] relative z-10 group-hover:scale-105 transition-transform duration-700">
                    </div>
                    
                    <div class="mt-auto relative z-20">
                        <div class="text-xs text-[#0E8028] font-bold tracking-[0.2em] uppercase mb-3">Plant Nutrition</div>
                        <h3 class="text-3xl font-display font-bold mb-4 text-white">Peptide Nutrition</h3>
                        <p class="text-gray-400 text-base mb-8 leading-relaxed font-light">Targeted peptide formulas designed to enhance plant health and stress tolerance.</p>
                        
                        <a href="/shop" class="inline-flex items-center gap-3 text-sm font-bold tracking-wider text-white group-hover:text-[#0E8028] transition-colors uppercase">
                            View Details 
                            <svg class="w-5 h-5 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="product-card group relative p-[1px] rounded-[30px] bg-gradient-to-b from-white/10 to-transparent hover:from-[#FFB000]/50 transition-colors duration-500 mt-0 md:mt-32">
                <div class="h-full glass-panel bg-[#050806]/80 p-10 rounded-[29px] flex flex-col relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-[#FFB000] opacity-0 filter blur-[80px] group-hover:opacity-15 transition-opacity duration-700"></div>
                    
                    <div class="mb-12 h-48 flex items-center justify-center relative">
                        <img src="/images/bee_bloom.png" alt="Bee Bloom" class="w-full h-full object-cover rounded-[20px] shadow-[0_0_40px_rgba(234,179,8,0.2)] relative z-10 group-hover:scale-105 transition-transform duration-700">
                    </div>
                    
                    <div class="mt-auto relative z-20">
                        <div class="text-xs text-[#FFB000] font-bold tracking-[0.2em] uppercase mb-3">Pollinator Attractant</div>
                        <h3 class="text-3xl font-display font-bold mb-4 text-white">Bee Bloom</h3>
                        <p class="text-gray-400 text-base mb-8 leading-relaxed font-light">Natural pheromones and attractants to drastically improve pollination rates.</p>
                        
                        <a href="/shop" class="inline-flex items-center gap-3 text-sm font-bold tracking-wider text-white group-hover:text-[#FFB000] transition-colors uppercase">
                            View Details 
                            <svg class="w-5 h-5 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-40 relative z-10 overflow-hidden border-t border-white/5">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom,_var(--tw-gradient-stops))] from-[#014A2E]/20 via-[#060B09] to-[#030504]"></div>
    <div class="container mx-auto px-6 relative z-10 text-center reveal-up">
        <h2 class="text-5xl md:text-8xl font-display font-bold mb-8 max-w-5xl mx-auto leading-tight drop-shadow-2xl text-white">Based in the <br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-[#0E8028] to-[#FF6B00]">United States of America</span></h2>
        <p class="text-2xl text-gray-400 mb-16 max-w-3xl mx-auto font-light">Partner with ReNu-Biome to combat climate change while securing the future of your yield.</p>
        <a href="/contact" class="magnetic inline-block px-12 py-6 bg-white text-[#030504] font-bold text-xl rounded-full hover:bg-[#FF6B00] hover:text-white hover:shadow-[0_0_60px_rgba(255,107,0,0.5)] transition-all duration-500 transform hover:scale-110 tracking-wide">
            Contact Us Today
        </a>
    </div>
</section>
