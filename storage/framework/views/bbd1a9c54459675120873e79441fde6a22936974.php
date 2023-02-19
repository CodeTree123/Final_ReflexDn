<?php $__env->startPush('page-css'); ?>
    <style>

        .left-one-title, .left-one-text, .event_title, .event_label {
            font-size: 11.5px;
        }

        .left-one-box-first i {
            color: #0cc989;
        }

        .left-one-box-second i {
            color: #e8a555;
        }

        .left-one-box-third i {
            color: #ff6934;
        }

        .bg-orange {
            background-color: #ff6934;
        }

        .bg-light-grey {
            background-color: #d9d9d9;
        }

        .btn-orange {
            background-color: #ff6934 !important;
            color: #fff !important;
        }

        .forum .complete a {
            transition: all linear .2s;
        }

        .forum .complete a:hover {
            background-color: #d6d6d6;
            color: #fff;
        }

        .bg-low-orange {
            background-color: #5a4f43;
        }

        .text-orange {
            color: #b3844d;
        }

        .bg-low-brown {
            background-color: #473e3b;
        }

        .text-bright-orange {
            color: #ed8762;
        }

        .bg-low-blue {
            background-color: #444f5f;
        }

        .text-bright-blue {
            color: #5d95e8;
        }
    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <!-- main start -->
    <div class="container-fluid forum">
        <div class="row">
            <div class="col-md-2 pe-0">
                <div class="profile blue-grey-border-thin">

                    <h6 class="   p-2 mb-1 d-flex justify-content-center bg-blue-grey custom-border-radius">forum's
                        Profile</h6>
                    <div class="complete">
                        <div class=" p-2 ">

                            <a href="" class="d-flex align-items-center p-3 left-one-box-first rounded">
                                <div class="me-1 p-2 border rounded  ">
                                    <i class="fa-solid fa-certificate  "></i>
                                </div>
                                <div class="ms-1">
                                    <p class="left-one-title fw-bold">Newest and Recent</p>
                                    <p class="left-one-text">Find the Latest Update</p>
                                </div>
                            </a>

                            <a href="" class="d-flex align-items-center p-3 left-one-box-second rounded">
                                <div class="me-1 p-2 border rounded  ">
                                    <i class="fa-solid fa-message  "></i>
                                </div>
                                <div class="ms-1">
                                    <p class="left-one-title fw-bold">Popular of the Day</p>
                                    <p class="left-one-text">Shots featured today by curators</p>
                                </div>
                            </a>

                            <a href="" class="d-flex align-items-center p-3 left-one-box-third rounded">
                                <div class="me-1 p-2 border rounded  ">
                                    <i class="fa-solid fa-user  "></i>
                                </div>
                                <div class="mx-1">
                                    <p class="left-one-title fw-bold">My Facourite Post</p>
                                </div>
                                <p class="badge bg-orange">24</p>
                            </a>

                        </div>

                    </div>

                </div>

                <div class="profile blue-grey-border-thin py-2">
                    <!-- <h3>Treatment Plans</h3> -->
                    <div class=" left-second-box">

                        <a href="#" class="d-flex   align-items-center my-1 p-2">
                            <div class="mx-1 bg-low-orange rounded p-3">
                                <i class="fa-solid fa-code fa-xl text-orange"></i>
                            </div>
                            <div class="mx-1 ">
                                <h6>E-Book</h6>
                            </div>
                        </a>

                        <a href="#" class="d-flex   align-items-center my-1 p-2">
                            <div class="align-self-start mx-1 bg-low-brown rounded p-3">
                                <i class="fa-solid fa-dollar-sign fa-xl text-bright-orange"></i>
                            </div>
                            <div class="mx-1 ">
                                <h6>Case Stories</h6>
                            </div>
                        </a>

                        <a href="#" class="d-flex   align-items-center my-1 p-2">
                            <div class="align-self-start mx-1 bg-low-blue rounded p-3">
                                <i class="fa-solid fa-newspaper fa-xl text-bright-blue"></i>
                            </div>
                            <div class="mx-1 ">
                                <h6>Articles</h6>
                            </div>
                        </a>

                        <a href="#" class="d-flex   align-items-center my-1 p-2">
                            <div class="mx-1 bg-low-orange rounded p-3">
                                <i class="fa-solid fa-pencil fa-xl text-bright-orange"></i>
                            </div>
                            <div class="mx-1 ">
                                <h6>Product Review</h6>
                            </div>
                        </a>
                        <a href="#" class="d-flex   align-items-center my-1 p-2">
                            <div class="mx-1 bg-low-orange rounded p-3">
                                <i class="fa-regular fa-circle-play fa-xl text-orange"></i>
                            </div>
                            <div class="mx-1 ">
                                <h6>Reflex Turorial</h6>
                            </div>
                        </a>

                    </div>

                    <!-- <a href="">setting</a>
              <a href="" class="lgout-a">Logout</a> -->
                </div>
            </div>
            <div class="col-md-7 pe-0">
                <div class="blank-sec p-0">
                    <div class="row align-items-center p-3">
                        <div class="col-1">
                            <img src="<?php echo e(asset('assets/img/profile.png')); ?>" class="img-fluid rounded-circle" width="50">
                        </div>
                        <div class="col-8">
                            <input type="text" name="" class="form-control" id=""
                                   placeholder="Let's Share whats going on your mind">
                        </div>
                        <div class="col-3 text-center">
                            <button type="button" class="btn btn-orange">Create Post</button>
                        </div>
                    </div>
                </div>
                <div class="blank-sec p-0">
                    <div class="row align-items-center p-3">
                        <div class="col-3">
                            <img src="<?php echo e(asset('assets/img/Logo.png')); ?>" class="img-fluid rounded shadow" width="150">
                        </div>
                        <div class="col-9 mb-auto">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>Re-RCT of Upper Right first Molar Tooth</p>
                                </div>
                                <div class="bg-light-grey p-2 rounded-circle">
                                    <!-- <i class="fa-solid fa-heart"></i> -->
                                    <i class="fa-regular fa-heart"></i>

                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="d-flex my-2">
                                        <div class="mx-1">
                                            <img src="<?php echo e(asset('assets/img/profile.png')); ?>"
                                                 class="img-fluid rounded-circle" width="50">
                                        </div>
                                        <div class="mx-1">
                                            <p>Dr. Mizan <span class="fs-6"> &middot; </span></p>
                                            <p>3 weeks Ago</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p>651,324 Views</p>
                                        </div>
                                        <div>
                                            <p>651,324 Likes</p>
                                        </div>
                                        <div>
                                            <p>56 comments</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blank-sec p-0">
                    <div class="row align-items-center p-3">
                        <div class="col-3">
                            <img src="<?php echo e(asset('assets/img/Logo.png')); ?>" class="img-fluid rounded shadow" width="100">
                        </div>
                        <div class="col-9 mb-auto">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>Re-RCT of Upper Right first Molar Tooth2</p>
                                </div>
                                <div class="bg-light-grey p-2 rounded-circle">
                                    <i class="fa-solid fa-heart"></i>

                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <div class="d-flex my-2">
                                        <div class="mx-1">
                                            <img src="<?php echo e(asset('assets/img/profile.png')); ?>"
                                                 class="img-fluid rounded-circle" width="50">
                                        </div>
                                        <div class="mx-1">
                                            <p>Dr. Mizan <span class="fs-6"> &middot; </span></p>
                                            <p>3 weeks Ago</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row justify-content-end">
                                <div class="col-8">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p>651,324 Views</p>
                                        </div>
                                        <div>
                                            <p>651,324 Likes</p>
                                        </div>
                                        <div>
                                            <p>56 comments</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Admin Notice,Ad & Events start -->
            <div class="col-md-3 page-home ">

                <div class="info-box-col mb-3 pb-1 pt-3">

                    <div class="d-flex align-items-center m-3">
                        <p class="mx-2">Events</p>
                        <i class="mx-2 fa-solid fa-arrow-right"></i>
                    </div>
                    <div class="row align-items-center m-3">
                        <div class="col-2 p-0">
                            <div class="d-flex flex-column align-items-center bg-light-grey p-3 rounded">
                                <div class="forum_event_month fw-bold">FEB</div>
                                <div class="forum_event_date">7</div>
                            </div>
                        </div>
                        <div class="col-10">
                            <p class="fw-bold event_title mb-1">Hand on by PPT Foundation</p>
                            <div class="d-flex justify-content-start align-items-center  mb-1">
                                <i class="fa-brands fa-bandcamp me-3"></i>
                                <p>Le Méridien Dhaka</p>
                            </div>
                            <div class="d-flex justify-content-between  mb-1">

                                <input type="radio" class="btn-check" name="going_status" id="going" autocomplete="off">
                                <label class="p-1 btn-outline-dark rounded-pill event_label" for="going">Going</label>

                                <input type="radio" class="btn-check" name="going_status" id="not_going"
                                       autocomplete="off">
                                <label class="p-1 btn-outline-dark rounded-pill event_label" for="not_going">Not
                                    Going</label>

                                <input type="radio" class="btn-check" name="going_status" id="maybe" autocomplete="off">
                                <label class="p-1 btn-outline-dark rounded-pill event_label" for="maybe">May Be</label>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center m-3">
                        <div class="col-2 p-0">
                            <div class="d-flex flex-column align-items-center bg-light-grey p-3 rounded">
                                <div class="forum_event_month fw-bold">FEB</div>
                                <div class="forum_event_date">7</div>
                            </div>
                        </div>
                        <div class="col-10">
                            <p class="fw-bold event_title mb-1">Hand on by PPT Foundation</p>
                            <div class="d-flex justify-content-start align-items-center  mb-1">
                                <i class="fa-brands fa-bandcamp me-3"></i>
                                <p>Le Méridien Dhaka</p>
                            </div>
                            <div class="d-flex justify-content-between  mb-1">

                                <input type="radio" class="btn-check" name="going_status" id="going" autocomplete="off">
                                <label class="p-1 btn-outline-dark rounded-pill event_label" for="going">Going</label>

                                <input type="radio" class="btn-check" name="going_status" id="not_going"
                                       autocomplete="off">
                                <label class="p-1 btn-outline-dark rounded-pill event_label" for="not_going">Not
                                    Going</label>

                                <input type="radio" class="btn-check" name="going_status" id="maybe" autocomplete="off">
                                <label class="p-1 btn-outline-dark rounded-pill event_label" for="maybe">May Be</label>
                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <!--  -->
                </div>
                <div class="info-box-col info-box-col-ad py-3 mb-3">

                    <div class="d-flex align-items-center m-3">
                        <p class="mx-2">Pinpoint</p>
                        <i class="mx-2 fa-solid fa-arrow-right"></i>
                    </div>

                    <div class="row align-items-center m-2">
                        <div class="col-3  ">
                            <div class="">
                                <img src="<?php echo e(asset('public/assets/img/Logo.png')); ?>" class="img-fluid rounded shadow"
                                     width="100">
                            </div>
                        </div>
                        <div class="col-7">
                            <p class="fw-bold">Selling a business and scalling another amidst tragedy</p>
                            <p>by Michele Hansen</p>
                        </div>
                        <div class="col-2">
                            <i class="mx-2 fa-solid fa-arrow-right"></i>
                        </div>
                    </div>

                    <div class="row align-items-center m-2">
                        <div class="col-3  ">
                            <div class="">
                                <img src="<?php echo e(asset('public/assets/img/Logo.png')); ?>" class="img-fluid rounded shadow"
                                     width="100">
                            </div>
                        </div>
                        <div class="col-7">
                            <p class="fw-bold">Selling a business and scalling another amidst tragedy</p>
                            <p>by Michele Hansen</p>
                        </div>
                        <div class="col-2">
                            <i class="mx-2 fa-solid fa-arrow-right"></i>
                        </div>
                    </div>

                </div>
                <!-- <div class="info-box-col mb-3">
                    <h6 class="p-2 d-flex justify-content-center bg-blue-grey custom-border-radius">Upcoming Events</h6>

                </div> -->
            </div>
        </div>
    </div>
    <!-- Admin Notice,Ad & Events end -->

    <!-- main end -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page-js'); ?>
    <script>
        // var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        // var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        // return new bootstrap.Tooltip(tooltipTriggerEl)
        // })

        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>


    <script type="text/javascript">

        $('.slide_items_wrapper').slick({
            centerMode: true,
            centerPadding: '30px',
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,

            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1
                    }
                }
            ]
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('master.doc_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna1802\resources\views/forum/forum.blade.php ENDPATH**/ ?>