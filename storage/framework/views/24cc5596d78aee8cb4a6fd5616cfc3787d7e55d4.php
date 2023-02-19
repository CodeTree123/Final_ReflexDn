<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>

    <style type="text/css">
        .calendar {
            display: flex;
            /* position: relative; */
            padding: 16px;
            /* margin: 0 auto; */
            /* max-width: 320px; */
            background: white;
            border-radius: 4px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .month-year {
            position: absolute;
            bottom: 62px;
            right: -27px;
            font-size: 2rem;
            line-height: 1;
            font-weight: 300;
            color: #94A3B8;
            transform: rotate(90deg);
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
        }

        .year {
            margin-left: 4px;
            color: #CBD5E1;
        }

        .days {
            display: flex;
            flex-wrap: wrap;
            flex-grow: 1;
            margin-right: 46px;
        }

        .day-label {
            position: relative;
            flex-basis: calc(14.286% - 2px);
            margin: 1px 1px 12px 1px;
            font-weight: 700;
            font-size: 0.65rem;
            text-transform: uppercase;
            color: #1E293B;
        }

        .day {
            position: relative;
            flex-basis: calc(14.286% - 2px);
            margin: 1px;
            border-radius: 999px;
            cursor: pointer;
            font-weight: 300;
        }

        .day.dull {
            color: #94A3B8;
        }

        .day.today {
            color: #0EA5E9;
            font-weight: 600;
        }

        /* .day::before {
            content: '';
            display: block;
            padding-top: 100%;
        } */

        .day:hover {
            background: #E0F2FE;
        }

        .day .content {
            /* position: absolute; */
            /* top: 0;
            left: 0; */
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

    <div class="container mt-3">


        <div class="calendar">
            <div class="month-year">
                <span class="month"><?php echo e($date->format('M')); ?></span>
                <span class="year"><?php echo e($date->format('Y')); ?></span>
            </div>
            <div class="days">
                <?php $__currentLoopData = $dayLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dayLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="day-label"> <?php echo e($dayLabel); ?> </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $date_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="day 
                    <?php echo e($startOfCalendar1->format('m') != $date->format('m') ? 'dull' : ''); ?> 
                    <?php echo e($startOfCalendar1->format('d') == $date->format('d') ? ' today' : ''); ?>">

                    <span class="content"><?php echo e($date_list); ?></span>
                </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>


    </div>



















    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\Reflex_dn_munna\resources\views/shop_nav.blade.php ENDPATH**/ ?>