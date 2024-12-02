<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?php echo $__env->yieldContent('title', 'SIM Kepegawaian'); ?></title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/simplebar.css')); ?>">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/dataTables.bootstrap4.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/select2.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/uppy.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/jquery.steps.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/jquery.timepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/quill.snow.css')); ?>">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/daterangepicker.css')); ?>">
    <!-- App CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app-light.css')); ?>" id="lightTheme">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app-dark.css')); ?>" id="darkTheme" disabled>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css" />
    <style>
        .active {
            background-color: #ddd;
            color: #fff;
        }
    </style>
</head>

<body class="vertical light">
    <div class="wrapper">
        <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
                <!-- partial:partials/_footer.html -->
            </div> <!-- .container-fluid -->
        </main>
        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->make('layouts.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\kepegawaian-crud-spatie2\resources\views\layouts\main.blade.php ENDPATH**/ ?>