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
     <?php $__env->slot('header', null, []); ?> Gestion des Commandes <?php $__env->endSlot(); ?>

    <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-200 mb-6 flex flex-col sm:flex-row justify-between items-center gap-4">
        <form action="<?php echo e(route('manager.orders.index')); ?>" method="GET" class="flex flex-wrap items-center gap-3 w-full sm:w-auto">

            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">🔍</span>
                <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                       placeholder="N° commande ou client..."
                       class="pl-9 pr-4 py-2 border-slate-300 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500 w-full sm:w-64">
            </div>

            <select name="status" class="py-2 border-slate-300 rounded-lg text-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Tous les statuts</option>
                <option value="en_attente" <?php echo e(request('status') == 'en_attente' ? 'selected' : ''); ?>>En attente</option>
                <option value="en_preparation" <?php echo e(request('status') == 'en_preparation' ? 'selected' : ''); ?>>En préparation</option>
                <option value="prete" <?php echo e(request('status') == 'prete' ? 'selected' : ''); ?>>Prête</option>
                <option value="payee" <?php echo e(request('status') == 'payee' ? 'selected' : ''); ?>>Payée</option>
                <option value="annulee" <?php echo e(request('status') == 'annulee' ? 'selected' : ''); ?>>Annulée</option>
            </select>

            <button type="submit" class="bg-slate-800 hover:bg-slate-900 text-white font-semibold px-4 py-2 rounded-lg text-sm transition">
                Filtrer
            </button>

            <?php if(request('search') || request('status')): ?>
                <a href="<?php echo e(route('manager.orders.index')); ?>" class="text-slate-500 hover:text-slate-700 text-sm font-medium underline underline-offset-2">
                    Réinitialiser
                </a>
            <?php endif; ?>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider font-bold border-b border-slate-200">
                    <th class="p-4">Client</th>
                    <th class="p-4">N° Commande</th>
                    <th class="p-4">Montant</th>
                    <th class="p-4">Statut Actuel</th>
                    <th class="p-4">Action Rapide</th>
                    <th class="p-4 text-center">Détails</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-slate-50/80 transition duration-150">
                        <td class="p-4 text-sm font-medium text-slate-800">
                            <?php echo e($order->user->name); ?>

                        </td>
                        <td class="p-4">
                                <span class="bg-slate-100 text-slate-600 font-mono text-xs px-2 py-1 rounded">
                                    <?php echo e($order->numero_commande); ?>

                                </span>
                        </td>
                        <td class="p-4 font-black text-slate-900">
                            <?php echo e(number_format($order->total_amount, 0, ',', ' ')); ?> FCFA
                        </td>
                        <td class="p-4">
                            <?php
                                $badgeColors = [
                                    'en_attente'     => 'bg-amber-100 text-amber-800 border-amber-200',
                                    'en_preparation' => 'bg-orange-100 text-orange-800 border-orange-200',
                                    'prete'          => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                                    'payee'          => 'bg-indigo-100 text-indigo-800 border-indigo-200',
                                    'annulee'        => 'bg-rose-100 text-rose-800 border-rose-200',
                                ];
                                $colorClass = $badgeColors[$order->status] ?? 'bg-slate-100 text-slate-800 border-slate-200';
                                $statusText = ucfirst(str_replace('_', ' ', $order->status));
                            ?>

                            <span class="px-3 py-1 rounded-full text-xs font-bold border <?php echo e($colorClass); ?>">
                                    <?php echo e($statusText); ?>

                                </span>
                        </td>
                        <td class="p-4">
                            <form action="<?php echo e(route('manager.orders.update', $order)); ?>" method="POST" class="flex items-center gap-2">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <select name="status" class="text-xs rounded-md border-slate-300 py-1.5 pl-2 pr-8 focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="en_attente" <?php echo e($order->status == 'en_attente' ? 'selected' : ''); ?>>En attente</option>
                                    <option value="en_preparation" <?php echo e($order->status == 'en_preparation' ? 'selected' : ''); ?>>En préparation</option>
                                    <option value="prete" <?php echo e($order->status == 'prete' ? 'selected' : ''); ?>>Prête</option>
                                    <option value="payee" <?php echo e($order->status == 'payee' ? 'selected' : ''); ?>>Payée</option>
                                    <option value="annulee" <?php echo e($order->status == 'annulee' ? 'selected' : ''); ?>>Annulée</option>
                                </select>
                                <button type="submit" class="bg-indigo-50 hover:bg-indigo-100 text-indigo-600 border border-indigo-200 px-2 py-1.5 rounded-md text-xs font-bold transition">
                                    ✔
                                </button>
                            </form>
                        </td>
                        <td class="p-4 text-center">
                            <a href="<?php echo e(route('manager.orders.show', $order)); ?>"
                               class="inline-flex items-center justify-center p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition"
                               title="Voir les détails">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="p-8 text-center text-slate-500">
                            <div class="text-4xl mb-2">🍽️</div>
                            <p>Aucune commande trouvée.</p>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if($orders->hasPages()): ?>
            <div class="p-4 border-t border-slate-100 bg-slate-50">
                <?php echo e($orders->links()); ?>

            </div>
        <?php endif; ?>
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
<?php /**PATH C:\Users\fafad\Herd\isi-burger\resources\views/manager/orders/index.blade.php ENDPATH**/ ?>