<div class="px-6 py-8" x-data="cmsEditor()">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-display font-bold text-white mb-1">RB Core CMS</h1>
            <p class="text-gray-400 text-sm">Visual Page Builder & SaaS Management</p>
        </div>
        <div class="flex items-center gap-4">
            <span class="px-3 py-1 bg-eco-green/10 border border-eco-green/20 text-eco-green rounded-full text-xs font-semibold flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-eco-green animate-pulse" x-show="!saving"></span>
                <svg x-show="saving" class="animate-spin h-3 w-3 text-eco-green" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                <span x-text="saving ? 'Saving...' : 'Secured Session'"></span>
            </span>
            <button @click="saveContent" class="bg-gradient-to-r from-eco-green to-eco-teal text-eco-darker px-4 py-2 rounded-lg font-bold hover:shadow-[0_0_15px_rgba(0,255,163,0.4)] transition-all text-sm flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                Publish Changes
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6" x-show="loaded">
        <!-- Sidebar Navigation -->
        <div class="lg:col-span-1 space-y-4">
            <div class="bg-white/5 border border-white/10 rounded-2xl p-4 backdrop-blur-md">
                <h3 class="font-bold text-white text-sm uppercase tracking-wider mb-4">Content Maps</h3>
                
                <button @click="activePage = 'home'" :class="{'bg-eco-green/20 border-eco-green/50 text-white': activePage === 'home', 'border-transparent text-gray-400 hover:bg-white/5 hover:text-white': activePage !== 'home'}" class="w-full text-left px-4 py-3 rounded-xl border transition-all flex items-center justify-between mb-2">
                    <span class="font-medium">Home Page</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
                
                <button @click="activePage = 'shop'" :class="{'bg-eco-green/20 border-eco-green/50 text-white': activePage === 'shop', 'border-transparent text-gray-400 hover:bg-white/5 hover:text-white': activePage !== 'shop'}" class="w-full text-left px-4 py-3 rounded-xl border transition-all flex items-center justify-between mb-2">
                    <span class="font-medium">Shop Page</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>

                <button @click="activePage = 'products'" :class="{'bg-purple-500/20 border-purple-500/50 text-white': activePage === 'products', 'border-transparent text-gray-400 hover:bg-white/5 hover:text-white': activePage !== 'products'}" class="w-full text-left px-4 py-3 rounded-xl border transition-all flex items-center justify-between">
                    <span class="font-medium flex items-center gap-2">
                        <svg class="w-4 h-4 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        Media & Products
                    </span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
            
            <!-- Toast Notification -->
            <div x-show="showToast" x-transition.opacity.duration.500ms class="bg-eco-green/20 border border-eco-green/50 rounded-xl p-4 flex items-start gap-3">
                <div class="text-eco-green mt-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm">Success</h4>
                    <p class="text-gray-400 text-xs">Content securely synced to the live environment.</p>
                </div>
            </div>

            <div x-show="authError" x-transition.opacity.duration.500ms class="bg-red-500/20 border border-red-500/50 rounded-xl p-4 flex items-start gap-3">
                <div class="text-red-500 mt-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm">Security Alert</h4>
                    <p class="text-gray-400 text-xs" x-text="authErrorMsg"></p>
                </div>
            </div>
        </div>

        <!-- Editor Area -->
        <div class="lg:col-span-3 bg-white/5 border border-white/10 rounded-2xl p-8 backdrop-blur-md relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-eco-green/5 rounded-full filter blur-[80px] pointer-events-none"></div>
            
            <h2 class="text-2xl font-bold text-white mb-6" x-text="activePage === 'home' ? 'Editing Home Page' : (activePage === 'shop' ? 'Editing Shop Page' : 'Product & Media Manager')"></h2>

            <!-- Home Page Editor -->
            <div x-show="activePage === 'home'" class="space-y-6 relative z-10" style="display: none;">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2 col-span-2">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Hero Title</label>
                        <input type="text" x-model="cmsData.home.hero_title" class="w-full bg-[#030504]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-eco-green transition-colors font-display text-xl">
                    </div>
                    
                    <div class="space-y-2 col-span-2">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Hero Subtitle</label>
                        <textarea x-model="cmsData.home.hero_subtitle" rows="3" class="w-full bg-[#030504]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-eco-green transition-colors resize-none"></textarea>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Hero Button Text</label>
                        <input type="text" x-model="cmsData.home.hero_button_text" class="w-full bg-[#030504]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-eco-green transition-colors">
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Hero Button Link</label>
                        <input type="text" x-model="cmsData.home.hero_button_link" class="w-full bg-[#030504]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-eco-green transition-colors">
                    </div>
                </div>

                <hr class="border-white/10 my-8">

                <h3 class="text-lg font-bold text-white mb-4">Story Section</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Section Subtitle (Green)</label>
                        <input type="text" x-model="cmsData.home.story_subtitle" class="w-full bg-[#030504]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-eco-green transition-colors">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Main Title</label>
                        <input type="text" x-model="cmsData.home.story_title" class="w-full bg-[#030504]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-eco-green transition-colors">
                    </div>
                </div>
            </div>

            <!-- Shop Page Editor -->
            <div x-show="activePage === 'shop'" class="space-y-6 relative z-10" style="display: none;">
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Shop Header Title</label>
                    <input type="text" x-model="cmsData.shop.title" class="w-full bg-[#030504]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-eco-green transition-colors font-display text-xl">
                </div>
                
                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Shop Subtitle</label>
                    <input type="text" x-model="cmsData.shop.subtitle" class="w-full bg-[#030504]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-eco-green transition-colors">
                </div>

                <div class="space-y-2">
                    <label class="text-xs font-bold text-gray-400 uppercase tracking-wider">Header Badge</label>
                    <input type="text" x-model="cmsData.shop.badge" class="w-full bg-[#030504]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-eco-green transition-colors">
                </div>
            </div>

            <!-- Products Manager -->
            <div x-show="activePage === 'products'" class="space-y-8 relative z-10" style="display: none;">
                <template x-for="(product, index) in cmsData.products" :key="product.id">
                    <div class="p-6 bg-[#030504]/50 border border-white/10 rounded-2xl space-y-4">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="font-bold text-white text-lg flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full" :class="'bg-[' + product.theme + ']'"></span>
                                <span x-text="product.name || 'New Product'"></span>
                            </h4>
                            <button @click="cmsData.products.splice(index, 1)" class="text-red-500 hover:text-red-400 text-sm font-semibold">Remove</button>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-gray-500 uppercase">Product Name</label>
                                <input type="text" x-model="product.name" class="w-full bg-black/50 border border-white/10 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-purple-500 text-sm">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-gray-500 uppercase">Price ($)</label>
                                <input type="text" x-model="product.price" class="w-full bg-black/50 border border-white/10 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-purple-500 text-sm">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-gray-500 uppercase">Image URL (Media)</label>
                                <input type="text" x-model="product.image" class="w-full bg-black/50 border border-white/10 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-purple-500 text-sm">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[10px] font-bold text-gray-500 uppercase">Video URL (Media)</label>
                                <input type="text" x-model="product.video" placeholder="https://youtube.com/..." class="w-full bg-black/50 border border-white/10 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-purple-500 text-sm">
                            </div>
                            <div class="space-y-1 col-span-2">
                                <label class="text-[10px] font-bold text-gray-500 uppercase">Description</label>
                                <input type="text" x-model="product.description" class="w-full bg-black/50 border border-white/10 rounded-lg px-3 py-2 text-white focus:outline-none focus:border-purple-500 text-sm">
                            </div>
                        </div>
                    </div>
                </template>
                
                <button @click="addProduct" class="w-full py-4 border-2 border-dashed border-white/20 rounded-2xl text-gray-400 font-bold hover:border-purple-500 hover:text-purple-400 transition-colors flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Add New Product / Media
                </button>
            </div>
            
        </div>
    </div>
    
    <!-- Loading State -->
    <div x-show="!loaded" class="flex items-center justify-center py-20">
        <svg class="animate-spin h-8 w-8 text-eco-green" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('cmsEditor', () => ({
            loaded: false,
            saving: false,
            showToast: false,
            authError: false,
            authErrorMsg: '',
            activePage: 'home',
            cmsData: {
                home: { hero_title: '', hero_subtitle: '', hero_button_text: '', hero_button_link: '', story_title: '', story_subtitle: '' },
                shop: { title: '', subtitle: '', badge: '' },
                products: []
            },
            
            init() {
                this.loadContent();
            },
            
            addProduct() {
                this.cmsData.products.push({
                    id: 'new-' + Math.random().toString(36).substr(2, 9),
                    name: '',
                    price: '0.00',
                    image: '',
                    video: '',
                    description: '',
                    theme: 'purple-500'
                });
            },
            
            async loadContent() {
                try {
                    const response = await fetch('/api/cms/pages');
                    const result = await response.json();
                    
                    if(response.status === 401) {
                        this.authError = true;
                        this.authErrorMsg = result.message;
                        setTimeout(() => window.location.href = '/login', 2000);
                        return;
                    }
                    
                    if(result.status === 'success') {
                        this.cmsData = { ...this.cmsData, ...result.data };
                    }
                } catch(e) {
                    console.error('Error loading CMS data', e);
                } finally {
                    this.loaded = true;
                }
            },
            
            async saveContent() {
                this.saving = true;
                this.showToast = false;
                this.authError = false;
                
                try {
                    const response = await fetch('/api/cms/pages', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            page: this.activePage,
                            data: this.cmsData[this.activePage]
                        })
                    });
                    
                    const result = await response.json();
                    
                    if(response.status === 401) {
                        this.authError = true;
                        this.authErrorMsg = result.message;
                    } else if (result.status === 'success') {
                        this.showToast = true;
                        setTimeout(() => { this.showToast = false; }, 4000);
                    }
                } catch(e) {
                    console.error('Error saving', e);
                } finally {
                    this.saving = false;
                }
            }
        }));
    });
</script>
