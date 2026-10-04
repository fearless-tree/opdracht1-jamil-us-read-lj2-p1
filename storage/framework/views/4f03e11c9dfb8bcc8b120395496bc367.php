<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Overzicht Magazijn Jamin')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <?php if(session('status')): ?>
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="overflow-x-auto"><table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b-2 border-gray-300">
                            <th class="py-2 pr-4">Barcode</th>
                            <th class="py-2 pr-4">Naam</th>
                            <th class="py-2 pr-4">Verpakkingseenheid</th>
                            <th class="py-2 pr-4">Aantal aanwezig</th>
                            <th class="py-2 pr-4 text-center">Allergenen Info</th>
                            <th class="py-2 pr-4 text-center">Leverantie Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $producten; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gray-200">
                                <td class="py-2 pr-4"><?php echo e($product->Barcode); ?></td>
                                <td class="py-2 pr-4"><?php echo e($product->Naam); ?></td>
                                <td class="py-2 pr-4"><?php echo e($product->voorraad->VerpakkingsEenheidinKilogram ?? '-'); ?> kg</td>
                                <td class="py-2 pr-4"><?php echo e($product->voorraad->AantalAanwezig ?? '-'); ?></td>
                                <td class="py-2 pr-4 text-center">
                                    <a href="<?php echo e(route('magazijn.allergenen-info', $product)); ?>" title="Allergenen info">
                                        <span class="text-red-600 font-bold text-lg">&times;</span>
                                    </a>
                                </td>
                                <td class="py-2 pr-4 text-center">
                                    <a href="<?php echo e(route('magazijn.levering-info', $product)); ?>" title="Leverantie info">
                                        <span class="text-blue-600 font-bold text-lg">?</span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table></div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Leerjaar2\US-REA\opdracht1-jamin\resources\views/magazijn/overzicht.blade.php ENDPATH**/ ?>