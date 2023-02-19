<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="<?php echo e(asset ('assets/img/reflex_logo.png')); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- Bootstrap 5.1.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Page CSS -->
    <?php echo $__env->yieldPushContent('page-css'); ?>

    <!-- Sami Package CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/samipackage/css/samipack.css')); ?>">

    <!--Main Style CSS -->
    <link rel="stylesheet" href="<?php echo e(asset ('assets/css/style.css')); ?>">

    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->

    <!-- Prescription CSS -->
    <link rel="stylesheet" href="<?php echo e(asset ('assets/css/prescription_style.css')); ?>">
    <!-- <link rel="stylesheet" href="<?php echo e(asset ('assets/css/tab.css')); ?>"> -->
    <!-- <link rel="stylesheet" href="<?php echo e(asset ('assets/css/multiselect.css')); ?>"> -->

    <style>
        .image_view {
            width: 100px;
            height: 100px;
            cursor: pointer;
        }

        #FullImageView {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            text-align: center;
            z-index: 1200;
        }

        #FullImage {
            padding: 24px;
            max-width: 98%;
            max-height: 98%;
        }

        #CloseBtn {
            position: absolute;
            top: 12px;
            right: 12px;
            font-size: 2rem;
            color: white;
            cursor: pointer;
        }
    </style>
    <!-- <link rel="stylesheet" href="<?php echo e(asset ('assets/css/bs-stepper.css')); ?>"> -->

    <!-- Slick Slider CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('assets/css/slick_slider.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('assets/css/slick_slider_theme.css')); ?>" /> -->
    <title>ReflexDN</title>

</head>

<body>
    <?php if(Route::current()->getName() == 'prescription'): ?>
    <?php elseif(Route::current()->getName() == 'invoice'): ?>
    <?php else: ?>
    <?php echo $__env->make('doctor.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php if(Route::current()->getName() == 'prescription'): ?>
    <?php elseif(Route::current()->getName() == 'invoice'): ?>
    <?php else: ?>
    <?php echo $__env->make('include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('page-modals'); ?>

    <?php echo $__env->make('include.samiPackage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="FullImageView">
        <img id="FullImage" />
        <span id="CloseBtn" onclick="FullViewClose()">&times;</span>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- <script src="<?php echo e(asset ('assets/js/app.js')); ?>"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- <script src="<?php echo e(asset ('assets/js/chosen.jquery.js')); ?>"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

    <!-- Sami Package JS File -->
    <script src="<?php echo e(asset('public/samipackage/js/samipack.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            // $(".multi").select2({
            //     // maximumSelectionLength: 2
            // });
            // window.setTimeout(function() {
            //     $(".test").alert('close');
            // }, 2000);

            //Sami Package For Toast
            $(document).cus_toast_auto({
                cus_toast_time: 3000,
                cus_toast_top: "60px",
                cus_toast_border: "#4e6f8a",
            });
            // $(document).sami_Toast_Append();

            // $(document).on('click', '.delete-Prescription', function() {
            //     var deletePrescriptionId = $(this).val();
            //     // alert(deletePrescriptionId);
            //     $("#del-Prescription").modal('show');
            //     $('#del-Prescription-id').val(deletePrescriptionId);
            // });
        });
    </script>
    <!-- <script src="<?php echo e(asset ('assets/js/bs-stepper.js')); ?>"></script>
    <script src="<?php echo e(asset ('assets/js/custom_stepper.js')); ?>"></script> -->

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>
    <script>
        function FullView(ImgLink) {
            document.getElementById("FullImage").src = ImgLink;
            document.getElementById("FullImageView").style.display = "block";
        }

        function FullViewClose() {
            document.getElementById("FullImageView").style.display = "none";
        }
    </script>


    <!-- <script type="text/javascript" src="<?php echo e(asset ('assets/js/slick.js')); ?>"></script> -->
    <!-- Page js -->
    <?php echo $__env->yieldPushContent('page-js'); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\Reflex_dn_munna1802\resources\views/master/doc_master.blade.php ENDPATH**/ ?>