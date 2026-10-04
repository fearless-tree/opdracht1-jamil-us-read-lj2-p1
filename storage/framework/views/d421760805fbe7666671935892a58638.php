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
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <?php echo e(__("You're logged in!")); ?>

                    <p class="mt-2">Ingelogd als <strong><?php echo e(auth()->user()->name); ?></strong> met rol <strong><?php echo e(auth()->user()->role); ?></strong>.</p>

                    <?php if(auth()->user()->hasRole('admin')): ?>
                        <p class="mt-4"><a class="underline text-indigo-600" href="<?php echo e(route('admin.dashboard')); ?>">Ga naar admin-pagina</a></p>
                    <?php elseif(auth()->user()->hasRole('klant')): ?>
                        <p class="mt-4"><a class="underline text-indigo-600" href="<?php echo e(route('klant.dashboard')); ?>">Ga naar klant-pagina</a></p>
                    <?php elseif(auth()->user()->hasRole('magazijn_medewerker')): ?>
                        <p class="mt-4"><a class="underline text-indigo-600" href="<?php echo e(route('magazijn.overzicht')); ?>">Ga naar overzicht magazijn</a></p>
                    <?php endif; ?>
                </div>
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
<?php /**PATH C:\Leerjaar2\US-REA\opdracht1-jamin\resources\views/dashboard.blade.php ENDPATH**/ ?>