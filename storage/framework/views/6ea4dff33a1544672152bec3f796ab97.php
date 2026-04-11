<?php if (isset($component)) { $__componentOriginal0c4e1c46b3081d9b5621c438808fca9f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0c4e1c46b3081d9b5621c438808fca9f = $attributes; } ?>
<?php $component = App\View\Components\ManagerLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('manager-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\ManagerLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex items-center gap-4">
            <a href="<?php echo e(route('manager.burgers.index')); ?>" class="text-slate-400 hover:text-indigo-600 transition bg-white p-2 rounded-lg border border-slate-200 shadow-sm">
                ←
            </a>
            <h2 class="font-bold text-xl text-slate-800">Modifier : <span class="text-indigo-600"><?php echo e($burger->nom); ?></span></h2>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-8">
                <form action="<?php echo e(route('manager.burgers.update', $burger)); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        <div class="w-full md:w-1/3">
                            <label class="block text-sm font-bold text-slate-700 mb-2">Visuel actuel</label>
                            <div class="relative group">
                                <?php if($burger->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $burger->image)); ?>" class="w-full aspect-square object-cover rounded-2xl border-4 border-white shadow-md">
                                <?php else: ?>
                                    <div class="w-full aspect-square bg-slate-100 rounded-2xl flex items-center justify-center text-4xl border-2 border-dashed border-slate-200">🍔</div>
                                <?php endif; ?>
                                <div class="mt-4">
                                    <input type="file" name="image" class="hidden" id="imageInput" accept="image/*">
                                    <label for="imageInput" class="cursor-pointer block text-center py-2 px-4 bg-slate-100 hover:bg-indigo-50 text-indigo-600 rounded-lg text-xs font-bold transition border border-slate-200">
                                        Changer l'image
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="flex-1 w-full space-y-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Nom du burger</label>
                                <input type="text" name="nom" value="<?php echo e(old('nom', $burger->nom)); ?>"
                                       class="w-full border-slate-200 rounded-xl focus:ring-indigo-500 focus:border-indigo-500">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Prix (FCFA)</label>
                                    <input type="number" name="unit_price" value="<?php echo e(old('unit_price', $burger->unit_price)); ?>"
                                           class="w-full border-slate-200 rounded-xl focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Stock</label>
                                    <input type="number" name="stock" value="<?php echo e(old('stock', $burger->stock)); ?>"
                                           class="w-full border-slate-200 rounded-xl focus:ring-indigo-500 focus:border-indigo-500">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Catégorie</label>
                                <select name="category_id" class="w-full border-slate-200 rounded-xl focus:ring-indigo-500 focus:border-indigo-500">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id', $burger->category_id) == $category->id ? 'selected' : ''); ?>>
                                            <?php echo e($category->nom); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-8 border-t border-slate-100">
                        <a href="<?php echo e(route('manager.burgers.index')); ?>" class="text-slate-400 hover:text-slate-600 font-bold transition">Annuler les modifs</a>
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg shadow-emerald-200 transition">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0c4e1c46b3081d9b5621c438808fca9f)): ?>
<?php $attributes = $__attributesOriginal0c4e1c46b3081d9b5621c438808fca9f; ?>
<?php unset($__attributesOriginal0c4e1c46b3081d9b5621c438808fca9f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0c4e1c46b3081d9b5621c438808fca9f)): ?>
<?php $component = $__componentOriginal0c4e1c46b3081d9b5621c438808fca9f; ?>
<?php unset($__componentOriginal0c4e1c46b3081d9b5621c438808fca9f); ?>
<?php endif; ?>
<?php /**PATH C:\Users\fafad\Herd\isi-burger\resources\views/manager/burgers/edit.blade.php ENDPATH**/ ?>