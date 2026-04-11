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
    <div class="max-w-4xl mx-auto pt-8">
        <h1 class="text-3xl font-black text-slate-900 mb-8">Mon Panier 🛒</h1>

        <?php if(count($card) > 0): ?>
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 md:p-8 space-y-6">
                    <?php $__currentLoopData = $card; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="flex items-center justify-between gap-4 pb-6 border-b border-slate-50 last:border-0 last:pb-0">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center text-2xl">
                                    🍔
                                </div>
                                <div>
                                    <h3 class="font-bold text-slate-900"><?php echo e($details['nom']); ?></h3>
                                    <p class="text-slate-500 text-sm"><?php echo e(number_format($details['amount'], 0, ',', ' ')); ?> F x <?php echo e($details['quantity']); ?></p>
                                </div>
                            </div>

                            <div class="flex items-center gap-6">
                                <p class="font-black text-lg text-slate-900"><?php echo e(number_format($details['amount'] * $details['quantity'], 0, ',', ' ')); ?> F</p>
                                <form action="<?php echo e(route('customer.cards.remove', $id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-slate-300 hover:text-red-500 transition p-2 bg-slate-50 rounded-full hover:bg-red-50">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="bg-slate-50 p-6 md:p-8 flex flex-col md:flex-row justify-between items-center gap-6 border-t border-slate-100">
                    <div>
                        <p class="text-slate-500 text-sm font-medium">Total de la commande</p>
                        <p class="text-3xl font-black text-orange-600"><?php echo e(number_format($total, 0, ',', ' ')); ?> FCFA</p>
                    </div>

                    <div class="flex w-full md:w-auto gap-4">
                        <form action="<?php echo e(route('customer.cards.clear')); ?>" method="POST" class="w-1/3 md:w-auto">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="w-full bg-white text-slate-500 px-6 py-4 rounded-2xl font-bold hover:text-red-500 border border-slate-200 transition shadow-sm">
                                Vider
                            </button>
                        </form>

                        <form action="<?php echo e(route('customer.orders.store')); ?>" method="POST" class="flex-1 md:w-auto">
                            <?php echo csrf_field(); ?>
                            <?php $__currentLoopData = $card; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input type="hidden" name="items[<?php echo e($loop->index); ?>][burger_id]" value="<?php echo e($id); ?>">
                                <input type="hidden" name="items[<?php echo e($loop->index); ?>][quantity]" value="<?php echo e($details['quantity']); ?>">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <button type="submit" class="w-full bg-slate-900 text-white px-8 py-4 rounded-2xl font-bold hover:bg-orange-600 transition shadow-lg shadow-slate-200">
                                Confirmer la commande →
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-12 text-center">
                <div class="text-6xl mb-6">🌬️</div>
                <p class="text-slate-900 font-bold text-xl mb-2">Ton panier est vide !</p>
                <p class="text-slate-500 mb-8">Il est temps de se faire plaisir, non ?</p>
                <a href="<?php echo e(route('customer.catalogues.index')); ?>" class="inline-block bg-orange-500 text-white font-bold py-3 px-8 rounded-2xl hover:bg-orange-600 transition shadow-lg shadow-orange-200">
                    Voir la carte
                </a>
            </div>
        <?php endif; ?>
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
<?php /**PATH C:\Users\fafad\Herd\isi-burger\resources\views/customer/cards/index.blade.php ENDPATH**/ ?>