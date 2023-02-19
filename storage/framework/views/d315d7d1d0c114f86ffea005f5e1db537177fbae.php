
    <!-- Header Start -->
    <div class="header  mb-3 shadow">
        <div class="container-fluid pt-1">
            <div class="row align-items-center">
                <!--logo & title start-->
                
                <div class="col-md-6">
                    <a class="d-flex align-items-center logo" href="<?php echo e(route('admin')); ?>">
                        <!-- <img class="logo" src="img/Logo.png" alt="Logo"> -->
                        <img class="logo" src="<?php echo e(asset ('assets/img/reflex_logo.png')); ?>" alt="Logo">

                        <!-- <h2 class="ms-3 mb-0 logo-title">
                            Dental Office Management System
                        </h2> -->
                    </a>
                </div>
                <!--logo & title end-->

                <!--nav start-->
                <?php if(Session::has('loginId')): ?>
                <!--info Bar start-->
                <div class="col-md-6 ">
                    <nav class="navbar navbar-expand-lg navbar-light p-0 ">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                                    
                            </div>
                        </div>
                    </nav>
                </div>
                <?php endif; ?>
                <!--info Bar end-->
            </div>
        </div>
    </div>
    <!-- Header end -->
    <script>
        // var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        // var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        // return new bootstrap.Tooltip(tooltipTriggerEl)
        // })

        // var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        // var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        // return new bootstrap.Popover(popoverTriggerEl)
        // })
    </script><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/include/adminheader.blade.php ENDPATH**/ ?>