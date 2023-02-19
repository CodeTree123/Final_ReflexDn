<div class="info-box-patient-col mb-3 pb-1">
    <h6 class="p-2 d-flex justify-content-center bg-blue-grey custom-border-radius">Medical History</h6>
    <div class="Patient-info">
        <div class="row">
            <div class="col-12 text-start text-capitalize"><span class="fw-bolder">BP</span> : {{$patient->bp_high}} / {{$patient->bp_low}}</div>
            <div class="col-12 text-start text-capitalize"><span class="fw-bolder">Heart Disease</span> : {{$patient->Heart_Disease}}</div>
            <div class="col-12 text-start text-capitalize"><span class="fw-bolder">Diabetic</span> : {{$patient->Diabetic}}</div>
            <div class="col-12 text-start text-capitalize"><span class="fw-bolder">Helpatics</span> : {{$patient->Helpatics}}</div>
            <div class="col-12 text-start text-capitalize"><span class="fw-bolder">Bleeding disorder</span> : {{$patient->Bleeding_disorder}}</div>
            <div class="col-12 text-start text-capitalize"><span class="fw-bolder">Allergy</span> : {{$patient->Allergy}}</div>

            @if($patient->gender == "Male")
            <div class="col-12 text-start"> </div>
            @else
            <div class="col-12 text-start text-capitalize"><span class="fw-bolder">Pregnant/Lactating</span> : {{$patient->Pregnant}}</div>
            @endif
            <div class="col-12 text-start text-capitalize"><span class="fw-bolder">Other</span> : {{$patient->other}}</div>
            <!-- <button type="button" class="btn btn-secondary btn-sm">Small button</button> -->
            <!--  a tag trigger modal -->
            @if(Request::routeIs('view_patient'))
            <div class="mt-2 d-flex justify-content-center">
                <a href="" class="btns btn-outline-blue-grey mt-2 text-center" data-bs-toggle="modal" data-bs-target="#UpdatePatient">
                    Add/Edit
                </a>
            </div>
            @endif
        </div>

    </div>
</div>

@if(Request::routeIs('view_patient'))
<div class="info-box-col mb-3 pb-1">
    <h6 class="p-2 d-flex justify-content-center bg-blue-grey custom-border-radius">Previous Prescription</h6>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        @forelse($v_prescriptions as $key=>$v_prescription)
        <div class="accordion-item mb-0">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed d-flex" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo{{$key +1}}" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <p class="me-5">{{$key + 1}}.</p>
                    <p class="ms-5">{{$v_prescription->date}}</p>
                </button>
            </h2>
            <div id="flush-collapseTwo{{$key +1}}" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <h4>Drug List From Prescription</h4>
                    @php
                    $ds = $v_prescription->drug_id_list;
                    $ds = explode(',',$ds);
                    $drug_infos = \App\Models\drugs::find($ds);
                    @endphp
                    <ol class="mt-2">
                        @foreach($drug_infos as $drug_info)
                        <li>
                            <p>
                                {{$drug_info->drug_name}}
                            </p>
                            <p>
                                {{$drug_info->drug_time}} [ {{$drug_info->duration}} day(s) ] {{$drug_info->meal_time}}
                            </p>
                        </li>
                        @endforeach
                    </ol>
                    <a href="{{route('view_prescription',[$doctor_info->id,$patient->id])}}" class="btn rounded-pill btn-outline-blue-grey">View</a>

                    <a href="{{route('send_mail',[$doctor_info->id,$patient->id])}}" class="btn rounded-pill btn-outline-blue-grey">Send Mail</a>

                    <button class="btn rounded-pill btn-outline-blue-grey delete-Prescription" data-prescription-name="{{$v_prescription->date}}" value="{{$v_prescription->id}}" style="font-size:14px ;">
                        Delete
                    </button>
                </div>
            </div>
        </div>
        @empty
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    No Prescription Added Yet.
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <a href="" class="btn btn-black">View</a>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>
<div class="info-box-col mb-3 d-flex flex-column">
    <h6 class="p-2 d-flex justify-content-center bg-blue-grey custom-border-radius">Ad</h6>

    <!-- <button type="button" class="btn btn-outline-info text-dark mt-2 mb-2 btn-lg  ">Post</button> -->
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading1">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapseOne">
                    Notice #1
                </button>
            </h2>
            <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, officiis. Praesentium commodi molestias voluptatibus culpa.</div>
            </div>
        </div>
    </div>
</div>
<div class="shadow  rounded">
    <h6 class="p-2 d-flex justify-content-center bg-blue-grey custom-border-radius">Cost</h6>

    <div class="d-flex justify-content-between align-items-center   p-2">

        <!-- <h4>Treatment Cost</h4>
                        <div>
                        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Cost_Add">
                            <i class="bi bi-plus-circle"></i>
                        </a>
                        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Treatment_Cost">
                            <i class="bi bi-card-list"></i>
                        </a>
                        </div> -->
        <h6 class="estimated-cost-title">Estimated Cost</h6>
        <div>
            <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Estimated_Cost">
                <i class="bi bi-card-list"></i>
            </a>
        </div>
    </div>
</div>
@endif

@if(Request::routeIs('treatments'))
<div class="info-box-col p-2 mb-3">
    <h4 class="d-flex justify-content-center bg-blue-grey custom-border-radius">Previous OT Notes</h4>
    @if($t_steps->isNotEmpty())
    @foreach($t_steps as $key=>$t)
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$key +1}}" aria-expanded="false" aria-controls="flush-collapseOne">
                    <p>{{$key + 1}}. {{$t->date}}</p>
                </button>
            </h2>
            <div id="flush-collapseOne{{$key +1}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ul class="mb-2">
                        <li><span>Steps:</span> {{$t->steps}}</li>
                    </ul>
                    <button class="btn crud-btns t_steps_editbtn" href="" value="{{$t->id}}">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn crud-btns delete-ot_note" href="#" value="{{$t->id}}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Previous Treatment OT Note #1
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <ol>
                        <li>There was no previous steps information.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
<div class="info-box-col p-2 mb-3">
    <h4 class="d-flex justify-content-center bg-blue-grey custom-border-radius">Report</h4>
    <div class="d-flex flex-row justify-content-around align-items-center py-1">
        <a class="crud-btns" href="" data-bs-toggle="modal" data-bs-target="#Report_Add">
            <i class="bi bi-plus-circle"></i>
        </a>
        <h6>Remaining: {{$total_report}}</h6>
    </div>
    <hr class="m-0">
    <div class="accordion accordion-flush" id="accordionFlushExample">

        <div class="accordion-item mb-0">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed d-flex py-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <p class="me-5">Reports</p>
                </button>
            </h2>

            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    @if($reports->isNotEmpty())
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th class="">#</th>
                                <th class="">Images</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $key=>$report)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>
                                    <img src="{{url('public/uploads/report/'.$report->image)}}" onclick="FullView(this.src)">
                                </td>
                                <td>
                                    <button class="btn crud-btns delete-report" href="#" value="{{$report->id}}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h6>There was no report of this patient.</h6>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
<div class="info-box-col p-2 mb-3">
    <h4 class="d-flex justify-content-center bg-blue-grey custom-border-radius">Post to Furums</h4>
    <button type="button" class="btn btn-outline-info text-dark mt-2 mb-2 btn-lg  ">Post</button>
</div>

@endif

@if(Request::routeIs('view_patient'))
<!-- Modal -->
<div class="modal fade " id="UpdatePatient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content ">
            <!--bg-opacity-50-->
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">
                    Edit Patient Info.
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->

            <div class="modal-body">
                <form action="{{route('update_patient',$patient->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <!-- 1 -->
                        <div class="mb-2 col-6">
                            <label for="exampleInputEmail1" class="form-label ">BP</label>
                            <div class="d-flex">
                                <input type="number" name="bp_high" class="form-control custom-form-control me-3" value="{{old('bp_high',$patient->bp_high)}}">
                                <h3 class="m-0">/</h3>
                                <input type="number" name="bp_low" class="form-control custom-form-control ms-3" value="{{old('bp_low',$patient->bp_low)}}">
                            </div>
                            <span class="text-danger">@error('bp_high') {{$message}} @enderror</span>
                            <span class="text-danger">@error('bp_low') {{$message}} @enderror</span>

                            <!-- <div class="form-text"></div> -->
                        </div>
                        <!-- 2 -->
                        <div class="mb-2 col-6">
                            <label for="mName" class="form-label  ">Bleeding discorder</label>
                            <select class="form-select" name="Bleeding_disorder" aria-label="Heart Disease" value="{{$patient->Bleeding_disorder}}">
                                <option selected></option>
                                <option @selected(old('Bleeding_disorder',$patient->Bleeding_disorder) == 'yes') value="yes">Yes</option>
                                <option @selected(old('Bleeding_disorder',$patient->Bleeding_disorder) == 'no') value="no">No</option>
                                <!-- <option value="3">Others</option> -->
                            </select>
                            <span class="text-danger">@error('Bleeding_disorder') {{$message}} @enderror</span>
                        </div>
                        <!-- 3 -->
                        <div class="mb-2 col-6">
                            <label for="mName" class="form-label  ">Heart Disease</label>
                            <select class="form-select" name="Heart_Disease" aria-label="Heart Disease" value="{{$patient->Heart_Disease}}">
                                <option selected></option>
                                <option @selected(old('Heart_Disease',$patient->Heart_Disease) == 'yes') value="yes">Yes</option>
                                <option @selected(old('Heart_Disease',$patient->Heart_Disease) == 'no') value="no">No</option>
                                <!-- <option value="3">Others</option> -->
                            </select>
                            <span class="text-danger">@error('Heart_Disease') {{$message}} @enderror</span>
                        </div>
                        <!-- 4 -->
                        <div class="mb-2 col-6">
                            <label for="mName" class="form-label ">Allergy</label>
                            <select class="form-select" name="Allergy" aria-label="Heart Disease" value="{{$patient->Allergy}}">
                                <option selected></option>
                                <option @selected(old('Allergy',$patient->Allergy) == 'yes') value="yes">Yes</option>
                                <option @selected(old('Allergy',$patient->Allergy) == 'no') value="no">No</option>
                                <!-- <option value="3">Others</option> -->
                            </select>
                            <span class="text-danger">@error('Allergy') {{$message}} @enderror</span>
                        </div>
                        <!-- 5 -->
                        <div class="mb-2 col-6">
                            <label for="mName" class="form-label ">Diabetic</label>
                            <select class="form-select" name="Diabetic" aria-label="Heart Disease" value="{{$patient->Diabetic}}">
                                <option selected></option>
                                <option @selected(old('Diabetic',$patient->Diabetic) == 'yes') value="yes">Yes</option>
                                <option @selected(old('Diabetic',$patient->Diabetic) == 'no') value="no">No</option>
                                <!-- <option value="3">Others</option> -->
                            </select>
                            <span class="text-danger">@error('Diabetic') {{$message}} @enderror</span>
                        </div>
                        <!-- 6 -->

                        @if($patient->gender != "Male")
                        <div class="mb-2 col-6">
                            <label for="mName" class="form-label ">Pregnant/Lactating</label>
                            <select class="form-select" name="Pregnant" aria-label="Heart Disease" value="{{$patient->Pregnant}}">
                                <option selected></option>
                                <option @selected(old('Pregnant',$patient->Pregnant) == 'yes') value="yes">Yes</option>
                                <option @selected(old('Pregnant',$patient->Pregnant) == 'no') value="no">No</option>
                                <!-- <option value="3">Others</option> -->
                            </select>
                            <span class="text-danger">@error('Pregnant') {{$message}} @enderror</span>
                        </div>
                        @endif
                        <!-- 7 -->
                        <div class="mb-2 col-6">
                            <label for="mName" class="form-label ">Helpatics</label>
                            <select class="form-select" name="Helpatics" aria-label="Heart Disease" value="{{$patient->Helpatics}}">
                                <option selected></option>
                                <option @selected(old('Helpatics',$patient->Helpatics) == 'yes') value="yes">Yes</option>
                                <option @selected(old('Helpatics',$patient->Helpatics) == 'no') value="no">No</option>
                                <!-- <option value="3">Others</option> -->
                            </select>
                            <span class="text-danger">@error('Helpatics') {{$message}} @enderror</span>
                        </div>
                        <!-- 8 -->
                        <div class="mb-2 col-6">
                            <label for="exampleInputEmail1" class="form-label ">Other</label>
                            <input type="text" name="other" class="form-control custom-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('other',$patient->other)}}">
                            <span class="text-danger">@error('other') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-outline-blue-grey ">Submit</button>
                    </div>
                </form>
            </div>

            <!-- Modal Body end -->
            <!-- Modal Footer -->

            <!-- Modal Footer end -->
        </div>
    </div>
</div>
<!-- Modal end -->
@endif