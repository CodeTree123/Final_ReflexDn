@extends('master.doc_master')

@push('page-css')
<!-- Slick Slider CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/slick_slider.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ asset ('assets/css/slick_slider_theme.css')}}" />
@endpush

@section('content')
@php
$subscription = subscription();
$sub_remain = sub_remain();
$notices = notices();
$total_cost = total_cost();
$total_paid = total_paid();
$total_due = total_due();
@endphp
<!-- main start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 pe-0">
            @include('doctor.include.docLeftSide')
        </div>
        <div class="col-md-7 pe-0">
            <div class="blank-sec ">
                <h6 class="p-2 mb-1 d-flex justify-content-center bg-blue-grey custom-border-radius">
                    Exclusives</h6>
                <!-- slider -->
                <div class="slide_items_wrapper  blue-grey-border mx-3 mb-3">
                    @for($i = 1; $i <= 8; $i++) <div class="slick_slide_items">
                        <div class="card slider-card-body blue-grey-border-thin me-2">

                            <div class="card-body">
                                <h5 class="card-title text-bg-blue-grey">Card title {{$i}}</h5>
                                <p class="card-text">This is a longer card with supporting text below as
                                    a natural lead-in to additional content. This content is a little
                                    bit longer.</p>
                            </div>
                        </div>
                </div>
                @endfor
            </div>
            <!-- Search & New Patient Start -->
            @if($subscription->status == 1)
            @if(auth()->user()->setting_alert == 1)
            <div class="alert alert-danger my-3 mx-3" role="alert">
                <p class="fs-6 fw-bolder">Your System Setting Is Not Setup Yet. Please First Added All Settings Information !</p>
            </div>
            @endif
            <div class="row m-0 justify-content-around">
                <h6 class="   p-2 mb-1 d-flex justify-content-center bg-blue-grey  ">Search</h6>
                <span class="text-danger no-paitent-error">@error('search') {{$message}} @enderror</span>
                <div class="col-md-5 blue-grey-border py-4">
                    {{--<form action="{{route('search',[$doctor_info->id])}}" method="POST">--}}
                    <form action="{{route('doctor')}}" method="GET">
                        <!-- <input type="text" placeholder="Search Old Patient" name="search" class="search-input"> -->
                        <div class="d-flex my-auto">
                            <input class="form-control me-2 custom-form-control blue-grey-border-thin " type="text" placeholder="Search Old Patient" aria-label="default input example" name="search">
                            <button type="submit" class="btn btn-outline-blue-grey" {{auth()->user()->setting_alert == 1 ? 'disabled':''}}>Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 blue-grey-border ">

                    <div class="new-gen-pat">
                        <!--  a tag trigger modal -->
                        <button class="btn btn-outline-blue-grey text-white my-3" data-bs-toggle="modal" data-bs-target="#patitentAdd" {{auth()->user()->setting_alert == 1 ? 'disabled':''}}>New Patient Registration
                        </button>

                    </div>
                </div>
            </div>
            <!-- Search & New Patient end-->
            @if($p_search != 'null')
            @forelse($p_search as $pf)
            <table class="table table-bordered mt-4 text-center align-middle">
                <thead>
                    <tr>
                        <th class="">name</th>
                        <th class="">mobile</th>
                        <th class="">Patient ID:</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td>{{$pf->name}}</td>
                        <td>{{$pf->mobile}}</td>
                        <td>{{$pf->id}}</td>
                        <td class="d-flex justify-content-evenly">
                            <span>
                                <a class="btn btn-sm crud-btns my-0" href="{{route('view_patient',[$doctor_info->id,$pf->id])}}" data-bs-toggle="tooltip" data-bs-placement="top" title="View Patient Info">
                                    <i class="fa-solid fa-file-lines"></i>
                                </a>
                            </span>


                            <span data-bs-toggle="modal" data-bs-target="#patitentUpdate">
                                <button class="btn  btn-sm crud-btns" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Patient Info">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </span>

                            <span data-bs-toggle="modal" data-bs-target="#patitentDelete">
                                <button class="btn btn-sm crud-btns" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Patient Info">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </span>
                            <!--  -->
                        </td>
                    </tr>

                </tbody>

            </table>
            @empty
            <h5 class="mt-2 px-4 text-danger">There was no Information about this Number</h5>
            @endforelse
            @endif
            <!--Search Result For Patient end -->
            <!--Appointment Start  -->
            <div class="Appointment-sec my-3 mx-3 blue-grey-border ">
                <div class="Appointment-h p-2 bg-blue-grey custom-border-radius">
                    <h6 class="m-0">Today we have {{$count_ap}} Appointment</h6>
                </div>
                <!-- Appointment Status -->
                <div class="row p-1">
                    @foreach($appointments as $appointment)
                    <div class="col-md-3">
                        <div class="Appointment-details blue-grey-border-thin    p-2">
                            <div class="d-flex align-items-center">
                                <div class="Appointment-Patient-img me-2">
                                    <!-- <img src="{{ asset('assets/img/profile.png')}}"> -->
                                    @if($appointment->image == null)
                                    <img src="{{ asset('assets/img/profile.png')}}">
                                    @else
                                    <img src="{{url('public/uploads/patient/'.$appointment->image)}}">
                                    @endif
                                </div>
                                <div class="patient-status m-auto my-1">
                                    <a class="btn btn-sm btn-outline-blue-grey m-0" href="{{route('view_patient',[$appointment->d_id,$appointment->p_id])}}" role="button">View</a>
                                </div>
                            </div>

                            <div class="Appointment-Patient-details text-center">
                                <h6 class="m-0">{{$appointment->name}}</h6>
                                <p class="mt-1">{{$appointment->time}}</p>
                                @php
                                $time = Carbon\Carbon::parse($appointment->time)->format('H:i');
                                $now_time = Carbon\Carbon::now()->format('H:i');
                                //echo $time,$now_time;
                                @endphp
                                @if($time > $now_time)
                                <p>Status :<span class="text-success">In Chamber</span></p>
                                @else
                                <p>Status :<span class="text-success">Delayed</span></p>
                                @endif
                            </div>

                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="col-md-3">
                                    <div class="Appointment-details blue-grey-border-thin  d-flex flex-wrap align-items-center p-1">
                                        <div class="Appointment-Patient-img me-2">
                                            <img src="{{ asset('assets/img/profile.png')}}">

                                        </div>
                                        <div class="Appointment-Patient-details">
                                            <h6 class="m-0">Hasan Mahud</h6>
                                            <p class="m-0">05:00pm</p>
                                            <p class="m-0"> Root canal</p>
                                        </div>
                                        <div class="patient-status m-auto my-1">
                                            <h5>Status : <span class="text-info">Pending</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="Appointment-details blue-grey-border-thin  d-flex flex-wrap align-items-center p-1">
                                        <div class="Appointment-Patient-img me-2">
                                            <img src="{{ asset('assets/img/profile.png')}}">

                                        </div>
                                        <div class="Appointment-Patient-details">
                                            <h6 class="m-0">Hasan Mahud</h6>
                                            <p class="m-0">05:00pm</p>
                                            <p class="m-0"> Root canal</p>
                                        </div>
                                        <div class="patient-status m-auto my-1">
                                            <h5>Status : <span class="text-info">Pending</span></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="Appointment-details blue-grey-border-thin  d-flex flex-wrap align-items-center p-1">
                                        <div class="Appointment-Patient-img me-2">
                                            <img src="{{ asset('assets/img/profile.png')}}">

                                        </div>
                                        <div class="Appointment-Patient-details">
                                            <h6 class="m-0">Hasan Mahud</h6>
                                            <p class="m-0">05:00pm</p>
                                            <p class="m-0"> Root canal</p>
                                        </div>
                                        <div class="patient-status m-auto my-1">
                                            <h5>Status : <span class="text-info">Pending</span></h5>
                                        </div>
                                    </div>
                                </div> -->
                </div>
            </div>
            <!--Appointment end  -->
            @else
            <!-- Greetings Section  -->
            <div class="greetings-sec m-3 p-3 blue-grey-border">

                <h3 class="mb-3">Welcome to <span class="fw-bold">Reflex Dental Network.</span></h3>
                <p class="">

                    <span class="fw-bold">ReflexDN</span> is an inclusive and reliable Dental Office
                    Information System. It is developed to offer complete and autonomous solutions for
                    Dental service management. Get our software today! the needs of independent solutions.
                    Now with <span class="fw-bold">ReflexDN</span>, practicians can effortlessly manage all
                    major functions through one intuitive platform.
                    <br><br>

                    <span class="fw-bold">ReflexDN</span> offers cloud-based practice management software to
                    the dental professionals in Bangladesh. Dental offices can use <span class="fw-bold">ReflexDN</span>
                    to schedule, invoice, manage recall, manage Patient's records, chart and more using from
                    anywhere using only a browser and Internet connection. <span class="fw-bold">ReflexDN</span>'s brilliantly designed interface makes it easy for
                    any member of your team to learn and use regardless of their practice management
                    experience.
                    <br><br>

                    With <span class="fw-bold">ReflexDN</span>, you can securely access patient data
                    anywhere, anytime, gain deeper insights into practice production, and help providers
                    spend time on what matters most - <span class="fw-bold">taking care of their patients.</span>
                    <br><br>
                    We welcome you to explore our system and help us to grow together.


                    <br> <br> <br>
                    Team Hospitalin.
                </p>
            </div>
            <!-- Greetings Section End -->
            @endif
            <!-- Search & New Patient end-->


            <!--Patient list Start  -->
            <!-- <div class="patient-list-col  blue-grey-border">
                        <div class="patient-list-h p-2 bg-blue-grey custom-border-radius">
                            <h6 class="m-0">Patient List</h6>
                        </div>
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Day</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Saturday</th>
                                    <td>Tom</td>
                                    <td>Sam</td>
                                    <td>Rafa</td>
                                </tr>
                                <tr>
                                    <th scope="row">Sunday</th>
                                    <td>Tom</td>
                                    <td>Sam</td>
                                </tr>
                                <tr>
                                    <th scope="row">Monday</th>
                                    <td>Tom</td>
                                    <td>Sam</td>
                                    <td>Rafa</td>
                                    <td>Shafi</td>
                                </tr>
                                <tr>
                                    <th scope="row">tuesday</th>
                                    <td>Tom</td>
                                    <td>Sam</td>
                                    <td>Rafa</td>
                                </tr>
                                <tr>
                                    <th scope="row">Wednesday</th>
                                </tr>
                                <tr>
                                    <th scope="row">Thursday</th>
                                    <td>Tom</td>
                                    <td>Sam</td>
                                    <td>Rafa</td>
                                </tr>
                                <tr>
                                    <th scope="row">Friday</th>
                                    <td>Tom</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> -->
            <!-- Appointment list end -->
        </div>
    </div>

    <!-- Admin Notice,Ad & Events start -->
    <div class="col-md-3 page-home">
        @include('doctor.include.docRightSide')
    </div>
</div>
</div>
<!-- Admin Notice,Ad & Events end -->

@push('page-modals')
<!-- Modal For Add Patient Information -->
<div class="modal fade " id="patitentAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    New Patient Registration
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('patient_info',[$doctor_info->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for=" " class="form-label text-dark mb-1">Mobile Number</label>
                        <input type="number" name="mobile" class="form-control" placeholder="Enter Mobile No" value="{{old('mobile')}}">
                        <span class="text-danger">@error('mobile') {{$message}} @enderror</span>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-2">
                                <label for=" " class="form-label text-dark mb-1">Name</label>
                                <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" value="{{old('name')}}">
                                <span class="text-danger">@error('name') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-2">
                                <label for="" class="form-label text-dark mb-1">Date of Birth</label>
                                <input class="form-control dob" name="date" type="date" value="{{old('date')}}" max="{{date('Y-m-d')}}">
                                <span class="text-danger">@error('date') {{$message}} @enderror</span>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <label for=" " class="form-label text-dark mb-1">Age</label>
                                <input type="number" name="age" class="form-control age" id="" aria-describedby="emailHelp" placeholder="Age" value="{{old('age')}}" readonly>
                                <span class="text-danger">@error('age') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label for="mName" class="form-label text-dark mb-1">Gender</label>
                                <select class="form-select" name="gender" aria-label="Gender">
                                    <option selected value="">Select gender</option>
                                    <option value="Male" {{old('gender') == "Male" ? 'selected':''}}>Male</option>
                                    <option value="Female" {{old('gender') == "Female" ? 'selected':''}}>Female</option>
                                    <option value="Other" {{old('gender') == "Other" ? 'selected':''}}>Others</option>
                                </select>
                                <span class="text-danger">@error('gender') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label for="mName" class="form-label text-dark mb-1">Blood Group</label>
                                <select class="form-select" name="Blood_group" aria-label="Blood Group">
                                    <option selected value="">Blood Group</option>
                                    <option value="A+" @selected(old('Blood_group')=="A+" )>A+</option>
                                    <option value="A-" @selected(old('Blood_group')=="A-" )>A-</option>
                                    <option value="B+" @selected(old('Blood_group')=="B+" )>B+</option>
                                    <option value="B-" @selected(old('Blood_group')=="B-" )>B-</option>
                                    <option value="AB+" @selected(old('Blood_group')=="AB+" )>AB+</option>
                                    <option value="AB-" @selected(old('Blood_group')=="AB-" )>AB-</option>
                                    <option value="O+" @selected(old('Blood_group')=="O+" )>O+</option>
                                    <option value="O-" @selected(old('Blood_group')=="O-" )>O-</option>
                                </select>
                            </div>
                            <span class="text-danger">@error('Blood_group') {{$message}} @enderror</span>
                        </div>

                        <div class="col">
                            <div class="mb-2">
                                <label for=" " class="form-label text-dark mb-1">Occupation</label>
                                <input type="text" class="form-control" name="occupation" placeholder="Occupation" value="{{old('occupation')}}">
                                <span class="text-danger">@error('occupation') {{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>


                    <div class="mb-2">
                        <label for="" class="form-label text-dark mb-1">Address</label>
                        <input type="address" class="form-control" name="address" placeholder="Enter Address" value="{{old('address')}}">
                        <span class="text-danger">@error('address') {{$message}} @enderror</span>

                    </div>
                    <div class="row">
                        <div class="col-7 mb-2">
                            <label for="" class="form-label text-dark mb-1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email Address" value="{{old('email')}}">
                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                        </div>
                        <div class="col-5 mb-2">
                            <label for="formFile" class="form-label text-dark mb-1">Drop your image</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                            <span class="text-danger">@error('image') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close
                        </button>
                        <button class="btn btn-outline-blue-grey  btn-sm">Save
                        </button>
                        <!-- Modal Footer end -->
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Update Patient Information-->
<div class="modal fade " id="patitentUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Update Patient Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->

            <div class="modal-body pt-1 pb-0">
                @if($p_search != 'null')
                @foreach($p_search as $pf)
                <form action="{{route('edit.patient',[$doctor_info->id,$pf->id])}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="mb-2">
                        <label for=" " class="form-label text-dark mb-1">Mobile no.</label>
                        <input type="number" name="mobile" class="form-control custom-form-control" placeholder="Mobile No" value="{{$pf->mobile}}">
                        <span class="text-danger">@error('mobile') {{$message}} @enderror</span>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="mb-2">
                                <label for=" " class="form-label text-dark mb-1">Name</label>
                                <input type="name" name="name" class="form-control custom-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" value="{{$pf->name}}">
                                <span class="text-danger">@error('name') {{$message}} @enderror</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="mb-2">
                                <label for="mName" class="form-label text-dark mb-1">Date of Birth</label>
                                <!-- <br> class="msform"-->
                                <input class="form-control custom-form-control dob" name="date" type="date" value="{{$pf->date}}" max="{{date('Y-m-d')}}">
                                <span class="text-danger">@error('date') {{$message}} @enderror</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-2">
                                <label for=" " class="form-label text-dark mb-1">Age</label>
                                <input type="number" name="age" class="form-control custom-form-control age" id=" " aria-describedby="emailHelp" placeholder="Age" value="{{$pf->age}}" readonly>
                                <span class="text-danger">@error('age') {{$message}} @enderror</span>

                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label for="mName" class="form-label text-dark mb-1">Gender</label>
                                <select class="form-select" name="gender" aria-label="Gender">
                                    <option selected>Select gender</option>
                                    <option value="Male" {{$pf->gender == "Male" ? 'selected' : ''}}>Male</option>
                                    <option value="Female" {{$pf->gender == "Female" ? 'selected' : ''}}>Female</option>
                                    <option value="Other" {{$pf->gender == "Other" ? 'selected' : ''}}>Others</option>
                                </select>
                                <span class="text-danger">@error('gender') {{$message}} @enderror</span>
                                {{--<input type="text" name="gender" class="form-control custom-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Gender" value="{{$pf->gender}}">--}}
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label for="mName" class="form-label text-dark mb-1">Blood Group</label>
                                <select class="form-select" name="Blood_group" aria-label="Blood Group">
                                    <option selected> Patient's Blood Group</option>
                                    <option value="A+" {{$pf->Blood_group == "A+" ? 'selected' : ''}}>A+</option>
                                    <option value="A-" {{$pf->Blood_group == "A-" ? 'selected' : ''}}>A-</option>
                                    <option value="B+" {{$pf->Blood_group == "B+" ? 'selected' : ''}}>B+</option>
                                    <option value="B-" {{$pf->Blood_group == "B-" ? 'selected' : ''}}>B-</option>
                                    <option value="AB-" {{$pf->Blood_group == "AB+" ? 'selected' : ''}}>AB+</option>
                                    <option value="AB-" {{$pf->Blood_group == "AB-" ? 'selected' : ''}}>AB-</option>
                                    <option value="O+" {{$pf->Blood_group == "O+" ? 'selected' : ''}}>O+</option>
                                    <option value="O-" {{$pf->Blood_group == "O-" ? 'selected' : ''}}>O-</option>
                                </select>
                                <span class="text-danger">@error('Blood_group') {{$message}} @enderror</span>
                                {{--<input type="text" name="Blood_group" class="form-control custom-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Blood Group" value="{{$pf->Blood_group}}">--}}
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-2">
                                <label for=" " class="form-label text-dark mb-1">Occupation</label>
                                <input type="text" class="form-control custom-form-control" name="occupation" placeholder="Occupation" value="{{$pf->occupation}}">
                                <span class="text-danger">@error('occupation') {{$message}} @enderror</span>
                                <!-- <div class="form-text"></div> -->
                            </div>
                        </div>
                    </div>


                    <div class="mb-2">
                        <label for="" class="form-label text-dark mb-1">Address</label>
                        <input type="address" class="form-control custom-form-control" name="address" placeholder="Address" value="{{$pf->address}}">
                        <span class="text-danger">@error('address') {{$message}} @enderror</span>
                    </div>
                    <div class="">
                        <label for="" class="form-label text-dark mb-1">Email address</label>
                        <input type="email" name="email" class="form-control custom-form-control" id=" " aria-describedby="emailHelp" placeholder="Email address" value="{{$pf->email}}">
                        <span class="text-danger">@error('email') {{$message}} @enderror</span>

                    </div>
                    <div class="mt-2 row   ">
                        <div class="col">
                            <label for="formFile" name="image" class="form-label text-dark mb-1">Drop your
                                image</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                        </div>
                        <div class="col">
                            <p>Last Profile Image</p>
                            <img src="{{url('public/uploads/patient/'.$pf->image)}}" class="mt-2" style="width: 70px; height: 70px;">

                        </div>

                    </div>
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close
                        </button>
                        <button class="btn btn-outline-blue-grey  btn-sm">Update</button>
                        <!-- Modal Footer end -->
                    </div>

                </form>
                @endforeach
                @endif
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->

<!-- Modal For Delete Patient Information-->
<div class="modal fade " id="patitentDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Delete Patient Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->

            <div class="modal-body">
                @if($p_search != 'null')
                @foreach($p_search as $pf)
                <form action="{{route('delete.patient',[$doctor_info->id,$pf->id])}}" method="POST">
                    @method('delete')
                    @csrf

                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete <span class="text-dark">{{$pf->name}}</span> Information</h5>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">Close
                        </button>
                        <button class="btn btn-outline-blue-grey  btn-sm">Delete</button>
                        <!-- Modal Footer end -->
                    </div>

                </form>
                @endforeach
                @endif
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
@endpush


@endsection

@push('page-js')
<script type="text/javascript" src="{{ asset ('assets/js/slick.js')}}"></script>

<script>
    $(document).ready(function() {
        $('.slide_items_wrapper').slick({
            centerMode: true,
            centerPadding: '30px',
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            arrows: false,

            responsive: [{
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

        @if(Session::has('invalidPAdd') && count($errors) > 0)
        $('#patitentAdd').modal('show');
        @endif

        @if(Session::has('invalidUPAdd') && count($errors) > 0)
        $('#patitentUpdate').modal('show');
        @endif

        $(document).on('change', '.dob', function() {
            var dob = $(this).val();
            let url = "{{route('patient_age',[':dob'])}}";
            url = url.replace(':dob', dob);
            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {
                    $('.age').val(response.p_dob);
                }
            });
        });
    });
</script>
@endpush