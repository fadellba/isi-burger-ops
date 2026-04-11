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
    <div class="mb-12 text-center pt-8">
        <h1 class="text-4xl md:text-5xl font-black text-slate-900 mb-4">Notre <span class="text-orange-500">Catalogue</span> 🤤</h1>
        <p class="text-slate-500 font-medium">Découvrez nos créations classées par catégories.</p>
    </div>

    <div class="space-y-12">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($category->burgers->count() > 0): ?>
                <section>
                    <div class="flex items-center gap-4 mb-6">
                        <h2 class="text-2xl font-black text-slate-800 uppercase tracking-wide"><?php echo e($category->nom); ?></h2>
                        <div class="h-px bg-slate-100 flex-1"></div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        <?php $__currentLoopData = $category->burgers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $burger): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-white p-4 rounded-3xl shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group flex flex-col">
                                <div class="aspect-square bg-slate-50 rounded-2xl mb-4 overflow-hidden relative flex items-center justify-center">
                                    <?php if($burger->image): ?>
                                        <img src="<?php echo e(asset('storage/' . $burger->image)); ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="<?php echo e($burger->nom); ?>">
                                    <?php else: ?>
                                        <span class="text-6xl group-hover:scale-110 transition duration-500">🍔</span>
                                    <?php endif; ?>

                                    <?php if($burger->stock < 5): ?>
                                        <span class="absolute top-3 right-3 bg-red-500 text-white text-[10px] font-black px-2 py-1 rounded-full animate-pulse">
                                            Plus que <?php echo e($burger->stock); ?> !
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="flex-1">
                                    <h3 class="font-bold text-lg text-slate-900"><?php echo e($burger->nom); ?></h3>
                                    <p class="text-sm text-slate-400 line-clamp-2 mt-1"><?php echo e($burger->description ?? 'Un délice préparé avec soin.'); ?></p>
                                </div>

                                <div class="mt-4 flex items-center justify-between">
                                    <p class="text-orange-600 font-black text-xl"><?php echo e(number_format($burger->unit_price, 0, ',', ' ')); ?> <span class="text-sm">F</span></p>

                                    <form action="<?php echo e(route('customer.cards.add', $burger)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="bg-slate-900 text-white w-10 h-10 rounded-xl font-bold hover:bg-orange-500 transition shadow-lg flex items-center justify-center">
                                            +
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </section>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\Users\fafad\Herd\isi-burger\resources\views/customer/catalogues/index.blade.php ENDPATH**/ ?>