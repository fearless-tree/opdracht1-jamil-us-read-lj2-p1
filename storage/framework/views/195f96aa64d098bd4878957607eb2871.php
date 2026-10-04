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
            <?php echo e(__('Levering Informatie')); ?> - <?php echo e($product->Naam); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <?php if($product->voorraad?->AantalAanwezig === null || (int) $product->voorraad->AantalAanwezig === 0): ?>
                    <table class="w-full text-left"><tbody><tr><td class="py-2">Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: 30-04-2023</td></tr></tbody></table>
                    <p class="text-sm text-gray-500 mt-2">Je wordt over 4 seconden teruggestuurd naar het overzicht...</p>

                    <script>
                        setTimeout(function () {
                            window.location.href = "<?php echo e(route('magazijn.overzicht')); ?>";
                        }, 4000);
                    </script>
                <?php elseif($leveringen->isEmpty()): ?>
                    <p>Er zijn geen leveringen geregistreerd voor dit product.</p>
                <?php else: ?>
                    <?php $leverancier = $leveringen->first()->leverancier; ?>

                    <div class="mb-6 grid grid-cols-2 gap-2 max-w-md">
                        <div class="font-semibold">Naam leverancier:</div>
                        <div><?php echo e($leverancier->Naam ?? '-'); ?></div>

                        <div class="font-semibold">Contactpersoon leverancier:</div>
                        <div><?php echo e($leverancier->ContactPersoon ?? '-'); ?></div>

                        <div class="font-semibold">Leveranciernummer:</div>
                        <div><?php echo e($leverancier->LeverancierNummer ?? '-'); ?></div>

                        <div class="font-semibold">Mobiel:</div>
                        <div><?php echo e($leverancier->Mobiel ?? '-'); ?></div>
                    </div>

                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b-2 border-gray-300">
                                <th class="py-2 pr-4">Naam Product</th>
                                <th class="py-2 pr-4">Datum laatste levering</th>
                                <th class="py-2 pr-4">Aantal</th>
                                <th class="py-2 pr-4">Eerstvolgende levering</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $leveringen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $levering): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="border-b border-gray-200">
                                    <td class="py-2 pr-4"><?php echo e($product->Naam); ?></td>
                                    <td class="py-2 pr-4"><?php echo e($levering->DatumLevering->format('d-m-Y')); ?></td>
                                    <td class="py-2 pr-4"><?php echo e($levering->Aantal); ?></td>
                                    <td class="py-2 pr-4"><?php echo e($levering->DatumEerstvolgendeLevering?->format('d-m-Y') ?? '-'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php endif; ?>

                <p class="mt-6"><a class="underline text-indigo-600" href="<?php echo e(route('magazijn.overzicht')); ?>">Terug naar overzicht</a></p>
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
<?php /**PATH C:\Leerjaar2\US-REA\opdracht1-jamin\resources\views/magazijn/levering-info.blade.php ENDPATH**/ ?>