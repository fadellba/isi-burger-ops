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
        <div class="flex justify-between items-end mb-8">
            <h1 class="text-3xl font-black text-slate-900">Mes Commandes 📜</h1>
        </div>

        <?php if($orders->count() > 0): ?>
            <div class="space-y-4">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="block bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition">
                        <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">

                            <a href="<?php echo e(route('customer.orders.show', $order)); ?>" class="flex-1 group">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="text-xs font-black uppercase tracking-widest text-orange-500">N° <?php echo e($order->numero_commande); ?></span>
                                    <span class="text-xs text-slate-400 font-medium"><?php echo e($order->created_at->format('d M Y • H:i')); ?></span>
                                </div>
                                <p class="text-slate-900 font-bold group-hover:text-orange-600 transition">
                                    <?php echo e($order->burgers->count()); ?> article(s) commandé(s)
                                </p>
                            </a>

                            <div class="flex items-center gap-6 justify-between md:justify-end">

                                <?php if(in_array($order->status, ['prete', 'payee'])): ?>
                                    <a href="<?php echo e(route('customer.orders.download-invoice', $order)); ?>"
                                       class="flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-orange-600 transition-colors group/btn"
                                       title="Télécharger ma facture">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400 group-hover/btn:text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
                                        </svg>
                                        <span class="hidden sm:inline">Facture PDF</span>
                                    </a>
                                <?php endif; ?>

                                <p class="font-black text-lg text-slate-900"><?php echo e(number_format($order->total_amount, 0, ',', ' ')); ?> F</p>

                                <span class="px-4 py-2 inline-flex text-xs font-bold rounded-xl
                                    <?php echo e(in_array($order->status, ['en_attente', 'en_preparation']) ? 'bg-orange-50 text-orange-600 border border-orange-100' : ''); ?>

                                    <?php echo e(in_array($order->status, ['prete', 'payee']) ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' : ''); ?>

                                    <?php echo e($order->status === 'annulee' ? 'bg-red-50 text-red-600 border border-red-100' : ''); ?>">
                                    <?php echo e(ucfirst(str_replace('_', ' ', $order->status))); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mt-8">
                <?php echo e($orders->links()); ?>

            </div>
        <?php else: ?>
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
<?php /**PATH C:\Users\fafad\Herd\isi-burger\resources\views/customer/orders/index.blade.php ENDPATH**/ ?>