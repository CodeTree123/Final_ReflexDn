<div class="profile blue-grey-border-thin">

    <h6 class="   p-2 mb-1 d-flex justify-content-center bg-blue-grey custom-border-radius">Doctor's Profile</h6>
    <div class="complete">
        <div class="p-header">
            <a href="" class="d-flex m-0 p-0 w-100 justify-content-end" href="" data-bs-toggle="modal" data-bs-target="#total_amount">৳</a>
            <!-- <img src="img/banner.jpg" class="cover"> -->
            @if($doctor_info->p_image == null)
            <img src="{{ asset('assets/img/profile.png')}}" class="doctor-profile mb-4 mt-2">
            @else
            <img src="{{url('public/uploads/doctor/'.$doctor_info->p_image)}}" class="doctor-profile mb-4 mt-2">
            @endif

            <h2 class="mb-2">{{$doctor_info->fname." ".$doctor_info->lname}}</h2>
            <p class="mb-2">{{$doctor_info->doctor->designation}}</p>
            @if($sub_remain != 0)
            <p class="mb-2">Subscription Remain : {{$sub_remain}} Days</p>
            @endif
            <!-- <p class="mb-2">Dental Consulatant of the Royal <br>Dental</p> -->
            <!-- <a href="#_" class="btns btn-outline-blue-grey  mb-2">This Month</a> -->
            <!--<p class="mb-2">Buy SMS : 50</p>-->
        </div>


    </div>

</div>
<div class="profile blue-grey-border-thin">
    <div class="d-flex justify-content-evenly my-2   ">
        <a href="{{route('doctor_profile_setting',[$doctor_info->id])}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Setting">
            <i class="fa-solid fa-gear fa-xl"></i>
        </a>
        <a href="{{route('profile_edit',[$doctor_info->id ?? 0])}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Profile">
            <i class="fa-solid fa-user fa-xl"></i>
        </a>
        <a href="{{route('logout')}}" class="" data-bs-toggle="tooltip" data-bs-placement="top" title="Logout">
            <i class="fa-solid fa-power-off fa-xl"></i>
        </a>
    </div>
</div>
<div class="profile blue-grey-border-thin py-2">
    <!-- <h3>Treatment Plans</h3> -->
    <div class="complete">
        @if($subscription->status == 1)
        <a href="{{route('patient_list',[$doctor_info->id])}}" class="btns btn-outline-blue-grey my-2 {{auth()->user()->setting_alert == 1 ? 'disable_link':''}}">Patient
            List</a>
        <a href="{{route('appointment_list',[$doctor_info->id])}}" class="btns btn-outline-blue-grey my-2 {{auth()->user()->setting_alert == 1 ? 'disable_link':''}}">Appointment</a>
        <a href="{{route('subscription',[$doctor_info->id])}}" class="btns btn-outline-blue-grey my-2">Subscription</a>
        @else
        <!-- <a href="#" class="btns btn-outline-blue-grey my-2">Patient List</a> -->
        <button type="button" class="btns btn-outline-blue-grey my-2 border-0" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Need To Subscribe" data-bs-custom-class="beautifier text-danger">Patient List
        </button>
        <!-- <a href="#" class="btns btn-outline-blue-grey my-2">Appointment</a> -->
        <button type="button" class="btns btn-outline-blue-grey my-2 border-0" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="Need To Subscribe" data-bs-custom-class="beautifier text-danger">Appointment
        </button>
        <!-- <a href="#" class="btns btn-outline-blue-grey my-2">Income/Expence</a> -->
        <a href="{{route('subscription',[$doctor_info->id])}}" class="btns btn-outline-blue-grey my-2">Subscription</a>
        @endif
    </div>

    <!-- <a href="">setting</a>
  <a href="" class="lgout-a">Logout</a> -->
</div>

<!-- Modal For T/P Estimated Cost List -->
<div class="modal fade " id="total_amount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">
                    Earning Information
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <!-- T/P Treatment Cost List-->
                <!-- <table class="table table-bordered mt-3 text-center">
                        <thead>
                            <tr>
                                <th class="">#</th>
                                <th class="">Treatment Plans</th>
                                <th class="">Cost</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table> -->
                <!--T/P Treatment Cost list end -->
                <h5>Total Amount: {{$total_cost}}</h5>
                <h5>Total Income: {{$total_paid}}</h5>
                <h5>Total Due: {{$total_due}}</h5>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
