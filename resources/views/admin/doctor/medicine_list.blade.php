@extends('admin.master.admin_doc_master')

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <span class="fs-4">Medicine List</span>
    <a class="crud-btns me-2 add_medicine" href="" data-bs-toggle="modal" data-bs-target="#Medicine_Add">
        <i class="bi bi-plus-circle"></i>
    </a>
</div>
<!-- Medicine List-->
<table class="table table-bordered mt-2 text-center align-middle med_list">
    <thead>
        <tr>
            <th class="">Serial No</th>
            <th class="">Medicine Name</th>
            <th class="">Brand Name</th>
            <th class="">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($medicines_lists as $key=>$medicines_list)
        <tr>
            <td class="p-0">{{$key + 1}}</td>
            <td class="p-0">{{$medicines_list->name}}</td>
            <td class="p-0">{{$medicines_list->brand}}</td>
            <td class="d-flex justify-content-around p-0">
                <button type="button" class="btn crud-btns Medicine_editbtn {{"med_".$medicines_list->id}}" value="{{$medicines_list->id}}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button class="btn crud-btns delete-Medicine" data-med-name="{{$medicines_list->name}}" value="{{$medicines_list->id}}">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $medicines_lists ->links() }}
<!--Medicine list end -->
@endsection

@section('page-modals')
<!-- Modal For medicine Add -->
<div class="modal fade " id="Medicine_Add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content new-medicine-modal">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Add New Medicine
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('admin_add_medicine')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter New medicine" name="medicine_name">
                            <span class="text-danger">@error('medicine_name') {{$message}} @enderror</span>
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" placeholder="Enter medicine Brand" name="medicine_brand">
                            <span class="text-danger">@error('medicine_brand') {{$message}} @enderror</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-black">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For Medicine update -->
<div class="modal fade " id="Medicine_Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content edit-medicine-info-modal">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Edit Medicine Info
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('update_medicine')}}" method="post" id="UpdateMedicineForm">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="MedicineId" name="medicine_id" />
                    <div class="modal-body">
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="UMedicine_name" placeholder="Enter Medicine Name" name="medicine_name">
                            <span class="text-danger medicine_name_error"></span>
                        </div>
                        <div class="mb-3 drug-name">
                            <input class="form-control" list="list" id="UMedicine_brand" placeholder="Enter Medicine Brand" name="medicine_brand">
                            <span class="text-danger medicine_brand_error"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Discard</button>
                        <button type="submit" class="btn btn-sm btn-black">Update</button>
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal For Delete Medicine -->
<div class="modal fade " id="del-Medicine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <!-- Modal Header & Close btn -->
            <div class="modal-header">
                <h5 class="modal-title text-dark mb-0" id="exampleModalLabel">
                    Delete Medicine
                </h5>
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#Medicine_List" aria-label="Close"></button>
            </div>
            <!-- Modal Header & Close btn end -->
            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{route('delete_medicine')}}" method="POST" id="DeleteMedicineForm">
                    @csrf
                    @method('delete')
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Are You Sure to Delete This <span id="del_med_name" class="text-black"></span> information?</h5>
                    </div>
                    <input type="hidden" id="del-Medicine-id" name="deletingId">
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#Medicine_List">Close</button>
                        <button type="submit" class="btn btn-outline-blue-grey  btn-sm">Yes,Delete</button>
                        <!-- Modal Footer end -->
                    </div>
                </form>
            </div>
            <!-- Modal Body end -->
        </div>
    </div>
</div>
<!-- Modal end -->
@endsection

@push('page-js')

<script>
    $(document).ready(function() {

        @if(Session::has('invalidMedAdd') && count($errors) > 0)
        $('#Medicine_Add').modal('show');
        @endif

        // script for Medicine update/edit

        $(document).on('click', '.Medicine_editbtn', function() {
            var medicine_id = $(this).val();
            var url = "{{route('edit_medicine',[':med_id'])}}";
            url = url.replace(':med_id', medicine_id);
            // alert(medicine_id);
            $("#Medicine_Update").modal('show');
            $.ajax({
                type: "GET",
                url: url,
                success: function(response) {
                    // console.log(response);
                    $('#MedicineId').val(medicine_id);
                    $('#UMedicine_name').val(response.medicine_info.name);
                    $('#UMedicine_brand').val(response.medicine_info.brand);
                }
            });
        });

        $(document).on('submit', '#UpdateMedicineForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');

            var registerForm = $("#UpdateMedicineForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#Medicine_Update').load(location.href + " #Medicine_Update>*", "");
                        $('.med_list').load(location.href + " .med_list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#Medicine_Update').modal('hide');
                    } else {
                        $.each(data.error, function(key, value) {
                            $('.' + key + '_error').text(value);
                        });
                        $('.med_' + data.id).click();
                    }
                },
            });
        });


        // script for Medicine delete
        $(document).on('click', '.delete-Medicine', function() {
            var deleteMedicineId = $(this).val();
            var dataMedName = $(this).attr("data-med-name");
            // alert(drug_id);
            $("#del-Medicine").modal('show');
            $('#del-Medicine-id').val(deleteMedicineId);
            $('#del_med_name').text(dataMedName);
        });

        $(document).on('submit', '#DeleteMedicineForm', function(e) {
            e.preventDefault();

            var url = $(this).attr('action');

            var registerForm = $("#DeleteMedicineForm");
            var formData = registerForm.serialize();

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function(data) {
                    // console.log(data);
                    if (data.status == 200) {
                        $('#del-Medicine').load(location.href + " #del-Medicine>*", "");
                        $('.med_list').load(location.href + " .med_list>*", "");
                        $(document).sami_Toast_Append({
                            cus_toast_time: 3000,
                            cus_toast_msg: data.msg
                        });

                        $('#del-Medicine').modal('hide');
                    }
                },
            });
        });
    });
</script>
@endpush
