<?php if (isset($component)) { $__componentOriginalb1cfbe1e9d23a21913b92721c7c5480f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb1cfbe1e9d23a21913b92721c7c5480f = $attributes; } ?>
<?php $component = App\View\Components\CustomerLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('customer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\CustomerLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="mb-10">
        <h1 class="text-3xl font-black text-slate-800">
            Hello, <span class="text-orange-500"><?php echo e(Auth::user()->name); ?></span> ! 👋
        </h1>
        <p class="text-slate-500 mt-2">Prêt pour le meilleur burger de Dakar ?</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2 space-y-6">
            <h2 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                <span>🔔</span> Commande en cours
            </h2>

            <?php if($latestOrder && in_array($latestOrder->status, ['en_attente', 'en_preparation', 'prete'])): ?>
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-orange-100 overflow-hidden relative">
                    <div class="absolute -right-4 -top-4 text-8xl opacity-5 grayscale">🍔</div>

                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <div>
                            <span class="text-xs font-black uppercase tracking-widest text-orange-500">N° <?php echo e($latestOrder->numero_commande); ?></span>
                            <h3 class="text-lg font-bold text-slate-800">
                                <?php if($latestOrder->status == 'en_attente'): ?>
                                    On a bien reçu ta commande !
                                <?php elseif($latestOrder->status == 'en_preparation'): ?>
                                    Le chef est aux fourneaux...
                                <?php else: ?>
                                    C'est prêt ! Viens vite ! 🏃💨
                                <?php endif; ?>
                            </h3>
                        </div>
                        <div class="bg-orange-50 px-4 py-2 rounded-2xl border border-orange-100">
                            <span class="text-orange-600 font-bold capitalize"><?php echo e(str_replace('_', ' ', $latestOrder->status)); ?></span>
                        </div>
                    </div>

                    <div class="mt-8 relative">
                        <div class="h-2 w-full bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-orange-500 transition-all duration-1000"
                                 style="width: <?php echo e($latestOrder->status == 'en_attente' ? '33' : ($latestOrder->status == 'en_preparation' ? '66' : '100')); ?>%">
                            </div>
                        </div>
                        <div class="flex justify-between mt-3 text-[10px] font-bold uppercase text-slate-400">
                            <span class="<?php echo e($latestOrder->status == 'en_attente' ? 'text-orange-600' : ''); ?>">Validée</span>
                            <span class="<?php echo e($latestOrder->status == 'en_preparation' ? 'text-orange-600' : ''); ?>">Cuisine</span>
                            <span class="<?php echo e($latestOrder->status == 'prete' ? 'text-orange-600' : ''); ?>">Prête</span>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="bg-slate-50 border-2 border-dashed border-slate-200 rounded-3xl p-10 text-center">
                    <div class="text-4xl mb-4">😶‍🌫️</div>
                    <p class="text-slate-500 font-medium">Pas de commande active pour le moment.</p>
                    <a href="/catalogue" class="mt-4 inline-block bg-slate-900 text-white px-6 py-3 rounded-2xl font-bold hover:bg-orange-600 transition shadow-lg shadow-slate-200">
                        Commander maintenant
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <div class="space-y-6">
            <div class="bg-slate-900 rounded-3xl p-6 text-white shadow-xl relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="font-bold text-lg mb-4">Mon Compte</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center opacity-80">
                            <span class="text-sm">Total dépensé</span>
                            <span class="font-bold"><?php echo e(number_format($totalSpent, 0, ',', ' ')); ?> F</span>
                        </div>
                        <div class="flex justify-between items-center opacity-80">
                            <span class="text-sm">Burgers dégustés</span>
                            <span class="font-bold"><?php echo e($burgersCount); ?> 🍔</span>
                        </div>
                    </div>
                    <hr class="my-4 border-slate-700">
                    <a href="<?php echo e(route('customer.orders.index')); ?>" class="block text-center text-sm font-bold text-orange-400 hover:text-orange-300">
                        Voir tout l'historique →
                    </a>
                </div>
                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-orange-500 rounded-full blur-3xl opacity-20"></div>
            </div>
        </div>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb1cfbe1e9d23a21913b92721c7c5480f)): ?>
<?php $attributes = $__attributesOriginalb1cfbe1e9d23a21913b92721c7c5480f; ?>
<?php unset($__attributesOriginalb1cfbe1e9d23a21913b92721c7c5480f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb1cfbe1e9d23a21913b92721c7c5480f)): ?>
<?php $component = $__componentOriginalb1cfbe1e9d23a21913b92721c7c5480f; ?>
<?php unset($__componentOriginalb1cfbe1e9d23a21913b92721c7c5480f); ?>
<?php endif; ?>
<?php /**PATH C:\Users\fafad\Herd\isi-burger\resources\views/customer/dashboard.blade.php ENDPATH**/ ?>