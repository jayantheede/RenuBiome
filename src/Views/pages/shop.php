<?php
$cmsData = [];
$dataFile = __DIR__ . '/../../../database/data.json';
if (file_exists($dataFile)) {
    $cmsData = json_decode(file_get_contents($dataFile), true);
}
$shopData = $cmsData['shop'] ?? [];
?>
<section class="min-h-screen pt-32 pb-20 relative overflow-hidden bg-[#060B09]">
    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-[#FF6B00] rounded-full mix-blend-screen filter blur-[200px] opacity-10 animate-pulse"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 hero-element">
            <div>
                <div class="inline-block px-5 py-2 rounded-full border border-[#FF6B00]/30 bg-[#FF6B00]/5 backdrop-blur-md text-xs font-semibold tracking-[0.2em] mb-6 text-[#FF6B00] uppercase">
                    <?= htmlspecialchars($shopData['badge'] ?? 'Direct To Farm') ?>
                </div>
                <h1 class="text-5xl md:text-7xl font-display font-bold text-white drop-shadow-2xl">
                    <?= htmlspecialchars($shopData['title'] ?? 'Biological Shop') ?>
                </h1>
            </div>
            <div class="mt-6 md:mt-0 text-gray-400 font-light flex items-center gap-2">
                <svg class="w-5 h-5 text-[#FF6B00]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <?= htmlspecialchars($shopData['subtitle'] ?? 'Approved in 15+ States') ?>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
            
            <?php 
            $products = $cmsData['products'] ?? [];
            foreach($products as $product): 
                $themeColor = $product['theme'] ?? 'FF6B00';
            ?>
            <div class="glass-panel rounded-[30px] border border-white/5 hover:border-[#<?= htmlspecialchars($themeColor) ?>]/30 transition-all duration-500 group flex flex-col overflow-hidden shop-card reveal-up" data-id="<?= htmlspecialchars($product['id'] ?? '') ?>" data-name="<?= htmlspecialchars($product['name'] ?? '') ?>" data-price="<?= htmlspecialchars($product['price'] ?? '') ?>" data-image="<?= htmlspecialchars($product['image'] ?? '') ?>">
                <div class="h-64 bg-gradient-to-br from-white to-gray-200 relative flex justify-center items-center p-8 border-b border-white/10 overflow-hidden shadow-inner">
                    <div class="absolute inset-0 bg-[#<?= htmlspecialchars($themeColor) ?>] filter blur-[60px] opacity-0 group-hover:opacity-10 transition-opacity duration-700 rounded-full"></div>
                    
                    <?php if(!empty($product['video'])): ?>
                        <!-- Video Media Support (Placeholder for iframe or video tag if you want full SaaS media) -->
                        <div class="absolute inset-0 bg-black/20 flex items-center justify-center z-10 group-hover:bg-black/0 transition-all">
                            <span class="px-3 py-1 bg-black/50 backdrop-blur rounded-full text-xs font-bold uppercase text-white tracking-widest group-hover:opacity-0 transition-opacity">Video Available</span>
                        </div>
                    <?php endif; ?>

                    <img src="<?= htmlspecialchars($product['image'] ?? '') ?>" alt="<?= htmlspecialchars($product['name'] ?? '') ?>" class="h-full object-contain relative z-10 group-hover:scale-110 transition-transform duration-700 drop-shadow-2xl">
                    
                    <?php if(!empty($product['badge'])): ?>
                        <span class="absolute top-4 left-4 px-3 py-1 bg-[#<?= htmlspecialchars($themeColor) ?>]/10 border border-[#<?= htmlspecialchars($themeColor) ?>]/20 text-[#<?= htmlspecialchars($themeColor) ?>] rounded-full text-[10px] font-bold uppercase tracking-widest z-20"><?= htmlspecialchars($product['badge']) ?></span>
                    <?php endif; ?>
                </div>
                <div class="p-8 flex flex-col flex-1">
                    <h3 class="text-2xl font-display font-bold text-white mb-2"><?= htmlspecialchars($product['name'] ?? '') ?></h3>
                    <p class="text-gray-400 font-light text-sm mb-4"><?= htmlspecialchars($product['description'] ?? '') ?></p>
                    
                    <div class="space-y-2 mb-6 flex-1 text-xs text-gray-400">
                        <?php if(!empty($product['rate'])): ?>
                        <div class="flex justify-between border-b border-white/5 pb-2">
                            <span class="text-white/50">Application Rate:</span><span class="text-white font-medium text-right"><?= htmlspecialchars($product['rate']) ?></span>
                        </div>
                        <?php endif; ?>
                        
                        <?php if(!empty($product['benefit'])): ?>
                        <div class="flex justify-between border-b border-white/5 pb-2">
                            <span class="text-white/50">Key Benefit:</span><span class="text-white font-medium text-right"><?= htmlspecialchars($product['benefit']) ?></span>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty($product['ingredients'])): ?>
                        <div class="flex justify-between pb-2">
                            <span class="text-white/50">Ingredients:</span><span class="text-white font-medium text-right"><?= htmlspecialchars($product['ingredients']) ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="flex items-center justify-between mb-6">
                        <?php 
                            $priceParts = explode('.', $product['price'] ?? '0.00');
                        ?>
                        <div class="text-2xl font-bold text-white">$<?= htmlspecialchars($priceParts[0]) ?><span class="text-sm text-gray-500 font-light">.<?= htmlspecialchars($priceParts[1] ?? '00') ?></span></div>
                        <div class="text-xs text-gray-500"><?= htmlspecialchars($product['size'] ?? 'Unit') ?></div>
                    </div>
                    <div class="flex gap-3">
                        <div class="relative w-20">
                            <select class="w-full h-full bg-[#030504]/50 border border-white/10 rounded-xl px-3 py-3 text-white appearance-none text-center outline-none focus:border-[#<?= htmlspecialchars($themeColor) ?>] qty-select">
                                <option value="1">1</option><option value="2">2</option><option value="5">5</option>
                            </select>
                        </div>
                        <button onclick="addToCart(this)" class="magnetic flex-1 py-3 rounded-xl bg-white/5 border border-white/10 text-white font-bold transition-all text-center flex justify-center items-center gap-2 group/btn" style="--tw-hover-bg: #<?= htmlspecialchars($themeColor) ?>; --tw-hover-border: #<?= htmlspecialchars($themeColor) ?>" onmouseover="this.style.backgroundColor='#<?= htmlspecialchars($themeColor) ?>'; this.style.color='#000';" onmouseout="this.style.backgroundColor=''; this.style.color='';">Add to Cart</button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<!-- Cart Notification Toast -->
<div id="cartToast" class="fixed bottom-10 right-10 glass-panel border border-[#FF6B00]/50 p-4 rounded-xl shadow-[0_0_30px_rgba(0,255,163,0.2)] flex items-center gap-4 transform translate-y-20 opacity-0 pointer-events-none transition-all duration-500 z-50">
    <div class="w-10 h-10 rounded-full bg-[#FF6B00]/20 flex items-center justify-center text-[#FF6B00]">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
    </div>
    <div>
        <h4 class="text-white font-bold text-sm">Added to Cart</h4>
        <p class="text-gray-400 text-xs" id="toastMessage">Green Nitrogen (2x)</p>
    </div>
    <a href="/cart" class="ml-4 px-4 py-2 bg-[#FF6B00] text-[#060B09] text-xs font-bold rounded-lg hover:bg-white transition-colors">View</a>
</div>

<script>


    function addToCart(btn) {
        const card = btn.closest('.shop-card');
        const id = card.dataset.id;
        const name = card.dataset.name;
        const price = parseFloat(card.dataset.price);
        const image = card.dataset.image;
        const qty = parseInt(card.querySelector('.qty-select').value);

        let cart = JSON.parse(localStorage.getItem('rb_cart')) || [];
        
        const existing = cart.find(item => item.id === id);
        if(existing) {
            existing.qty += qty;
        } else {
            cart.push({ id, name, price, image, qty });
        }
        
        localStorage.setItem('rb_cart', JSON.stringify(cart));
        window.dispatchEvent(new Event('cartUpdated'));

        // Show Toast
        const toast = document.getElementById('cartToast');
        document.getElementById('toastMessage').innerText = `${name} (${qty}x)`;
        toast.classList.remove('translate-y-20', 'opacity-0', 'pointer-events-none');
        
        // Button animation
        const originalText = btn.innerHTML;
        btn.innerHTML = `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Added`;
        btn.classList.add('bg-[#FF6B00]', 'text-[#060B09]');
        
        setTimeout(() => {
            toast.classList.add('translate-y-20', 'opacity-0', 'pointer-events-none');
            btn.innerHTML = originalText;
            btn.classList.remove('bg-[#FF6B00]', 'text-[#060B09]');
        }, 3000);
    }
</script>
