<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\patient_infos;
use App\Models\chife_complaint;
use App\Models\clinical_finding;
use App\Models\investigation;
use App\Models\treatment_plan;
use App\Models\treatment_info;
use App\Models\drugs;
use App\Models\prescription;
use App\Models\medicine;
use App\Models\redeem_code;
use App\Models\subscription;
use App\Models\notice;
use App\Models\shop;
use App\Models\User;
use Carbon\Carbon;
use File;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class AdminController extends Controller
{
    public function admin()
    {
        $varified_doctors = User::where('role','=','0')->where('verification','=','1')->count();
        $unvarified_doctors = User::Join('doctors','users.id','=','doctors.u_id')->where('users.role','=','0')->where('users.verification','=','0')->where('doctors.BMDC','!=','null')->count();
        $lc_cs = chife_complaint::orderBy('id','desc')->paginate(10);
        $lc_fs = clinical_finding::orderBy('id','desc')->get();
        $investigation_lists = investigation::orderBy('id','desc')->get();
        $lt_ps = treatment_plan::orderBy('id','desc')->get();
        $medicines_lists = medicine::orderBy('id','desc')->get();
        $redeems = redeem_code::all();
        // $subscription_lists = subscription::orderBy('id','desc')->get();
        $subscriped = subscription::where('status','=',1)->count();
        $unsubscriped = subscription::where('status','=',0)->count();
        $notices = notice::all();
        // return view('admin_page',compact('varified_doctors','unvarified_doctors','lc_cs','lc_fs','investigation_lists','lt_ps','medicines_lists','redeems','subscription_lists','notices'));
        return view('admin.dashboard',compact('varified_doctors','unvarified_doctors','lc_cs','lc_fs','investigation_lists','lt_ps','medicines_lists','redeems','subscriped','unsubscriped','notices'));
        // compact('doctor_info','patient','c_cs','lc_cs','c_fs','lc_fs','t_ps','lt_ps','treatment_infos','investigations','investigation_lists','notices')
    }

    public function doctor_list(){
        $varified_doctors = User::where('role', '=', '0')->where('verification', '=', '1')->get();
        $unvarified_doctors = User::Join('doctors','users.id','=','doctors.u_id')->where('users.role','=','0')->where('users.verification','=','0')->where('doctors.BMDC','!=','null')->get();
        return view('admin.doctor.doctor_list', compact('varified_doctors', 'unvarified_doctors'));
    }

    public function doctor_add(Request $request){

        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $id = User::where('email','=',$request->email)->first()->id;

        doctor::create([
            'u_id'=>$id
        ]);

        return back()->with('success','Added Successfully! Doctor Need To Login First.');
    }

    public function edit_doctor($id){
        $doctor = User::Join('doctors','users.id','=','doctors.u_id')->where('users.id',$id)->first();
        return response()->json([
            'status'=>200,
            'doctor_info' => $doctor,
        ]);
    }

    public function update_doctor(Request $request){
        $d_id = $request->doctor_id;
        // dd($cc_id);
        $doctor = doctor::find($d_id);
        $doctor->fname = $request->fname;
        $doctor->lname = $request->lname;
        $doctor->email = $request->email;
        $doctor->phone=$request->mobile;
        $doctor->BMDC=$request->BMDC;
        $doctor->chember_name=$request->chember_name;
        $doctor->chember_add=$request->chember_add;
        $res = $doctor->update();
        return back();
    }

    public function delete_doctor(Request $request){
        $del_doctor_id = $request->deletingId;
//         dd($del_doctor_id);
        $del_doctor_info = User::find($del_doctor_id);
        $del_doctor_info->delete();
        return back()->with('success','Doctor Information Deleted Successfully!');
    }

    public function doctor_verification($id){
        $getVerification = User::where('id',$id)->first();
        if($getVerification->verification == 1){
            $verification = 0;
        }else{
            $verification = 1;
        }
        User::where('id',$id)->update(['verification' => $verification]);
        return back()->with('success','Doctor Information Successfully Verified!');
    }

    public function doctor_status($id){
        $getStatus = User::where('id',$id)->first();
        if($getStatus->status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        User::where('id',$id)->update(['status' => $status]);
        return back()->with('success','Doctor Status Update Successfully!');
    }

    public function subscription_list(){
        $subscription_lists = subscription::leftJoin('users', 'subscriptions.d_id', '=', 'users.id')->orderBy('subscriptions.id', 'desc')->get(['subscriptions.*', 'users.fname', 'users.lname']);
        $redeems = redeem_code::all();
        return view('admin.doctor.subscription_list', compact('subscription_lists', 'redeems'));
    }

    public function redeem_add(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'redeem_code' => 'required',
            'duration' => 'required',
            'duration_type' => 'required|in:"Days","Months","Years"',
        ],[
            'redeem_code.required'=>'Redeem Code Fields Is Required',
            'duration.required'=>'Duration Fields Is Required',
            'duration_type.required'=>'Duration Type Number Fields Is Required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidRedeemAdd', 'Invalid Update');
        }else{
            redeem_code::create([
                'redeem_code' => $request->redeem_code,
                'duration' => $request->duration,
                'duration_type' => $request->duration_type,
            ]);
        }
        return back()->with('success','Redeem Code Added Successfully!');
    }

    public function redeem_status($id){
        $getStatus = redeem_code::where('id',$id)->first();
        if($getStatus->status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        redeem_code::where('id',$id)->update(['status' => $status]);
        return back()->with('success','Redeem Code Status Update Successfully!');
    }

    public function delete_redeem(Request $request){
        $del_redeem_id = $request->deletingId;
        // dd($del_drug_id);
        $del_redeem_info = redeem_code::find($del_redeem_id);
        $del_redeem_info->delete();
        return back()->with('success','Redeem Code Delete Successfully!');
    }

    public function subscription_status($id){
        $null = "";
        // $today = Carbon::now()->format('d/m/Y');
        $start = Carbon::now()->format('Y-m-d H:i:s');
        $getStatus = subscription::where('id',$id)->first();
        $getStatusMonth = $getStatus->duration;
        // dd($getStatusMonth);
        if($getStatusMonth <= 1){
            $end = now()->copy()->addMonth($getStatusMonth)->format('Y-m-d H:i:s');
        }else{
            $end = now()->copy()->addMonths($getStatusMonth)->format('Y-m-d H:i:s');
        }
        // dd($end);
        // return $getStatus;
        if($getStatus->status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        if($status == 1){
            subscription::where('id',$id)->update(['status'=>$status,'start'=>$start,'end'=>$end,'pending_status'=>0]);
        }else{
            subscription::where('id',$id)->update(['status'=>$status,'start'=>$null,'end'=>$null]);
        }
        return back()->with('success','Subscription Status Update Successfully!');
    }

    public function delete_subscription(Request $request){
        $del_subscription_id = $request->deletingId;
        // dd($del_drug_id);
        $del_subscription_info = subscription::find($del_subscription_id);
        $del_subscription_info->delete();
        return back();
    }

    public function chief_complaint_list(){
        $lc_cs = chife_complaint::orderBy('id', 'desc')->paginate(10);
        return view('admin.doctor.chief_complaint_list', compact('lc_cs'));
    }

    public function clinical_findings_list(){
        $lc_fs = clinical_finding::orderBy('id', 'desc')->paginate(10);
        return view('admin.doctor.clinical_findings_list', compact('lc_fs'));
    }

    public function investigation_list(){
        $investigation_lists = investigation::orderBy('id', 'desc')->paginate(10);
        return view('admin.doctor.investigation_list', compact('investigation_lists'));
    }

    public function treatment_plans_list(){
        $lt_ps = treatment_plan::orderBy('id', 'desc')->paginate(10);
        return view('admin.doctor.treatment_plans_list', compact('lt_ps'));
    }

    public function medicine_list(){
        $medicines_lists = medicine::orderBy('id', 'desc')->paginate(10);
        return view('admin.doctor.medicine_list', compact('medicines_lists'));
    }

    // public function update_medicine(Request $request){
    //     $medicine_id = $request->medicine_id;
    //     // dd($cc_id);
    //     $medicine = medicine::find($medicine_id);
    //     $medicine->name = $request->medicine_name;
    //     $medicine->brand = $request->medicine_brand;
    //     $res = $medicine->update();
    //     return back();
    // }

    public function notice_list()
    {
        $notices = notice::all();
        return view('admin.doctor.notice_list', compact('notices'));
    }

    public function notice_add(Request $request){
    //      dd($request->all());
        notice::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return back()->with('success','Notice Added Successfully!');
    }

    public function notice_status($id){
        $getStatus = notice::where('id',$id)->first();
        if($getStatus->status == 1){
            $status = 0;
        }else{
            $status = 1;
        }
        notice::where('id',$id)->update(['status' => $status]);
        return back()->with('success','Notice Status Updated Successfully!');
    }

    public function notice_edit($id){
        $notice = notice::find($id);
        return response()->json([
            'status'=>200,
            'notice' => $notice,
        ]);
    }

    public function notice_update(Request $request){
    //        dd($request->all());
        $notice = notice::find($request->notice_id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return back()->with('success','Notice Updated Successfully!');
    }

    public function notice_delete(Request $request){
        $del_notice_id = $request->deletingId;
        // dd($del_drug_id);
        $del_notice_info = notice::find($del_notice_id);
        $del_notice_info->delete();
        return back()->with('success','Notice Deleted Successfully!');
    }


    public function shop_panel(){
        return view('admin.shop.shop_panel');
    }

    public function supplier_list(){
        $shops = User::where('role',2)->orderBy('id', 'desc')->paginate(10);
        return view('admin.shop.supplier_list',compact('shops'));
    }

    public function supplier_add(Request $request){
        $validator = Validator::make($request->all(), [
            's_fname' => 'required',
            's_lname' => 'required',
            's_phone' => 'required',
            's_image' => 'required|image|mimes:jpeg,png,jpg',
            'email' => 'required|email|unique:users',
            's_password' => 'required',
        ],[
            's_fname.required'=>'First Name Fields Is Required',
            's_lname.required'=>'Last Name Fields Is Required',
            's_phone.required'=>'Contact Number Fields Is Required',
            's_image.required|image|mimes:jpeg,png,jpg'=>'Image Fields Is Required',
            's_image.image'=>'Image Must Be Image Format',
            's_image.mimes'=> 'Image Must Be Image Format of jpeg,png,jpg',
            'email.required|email'=>'Email Fields Is Required',
            's_password.required'=>'Password Fields Is Required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->with('invalidSupplierAdd', 'Invalid Update');
        }else{
            $filename = '';
            if ($request->hasFile('s_image')) {
                $file = $request->file('s_image');
                if ($file->isValid()) {
                    $filename = "shop" . date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('shop', $filename);
                }
            }
            User::create([
                'fname' => $request->s_fname,
                'lname' => $request->s_lname,
    //                'shop' => $request->s_shopName,
                'email' => $request->email,
                'password' => $request->s_password,
                'phone' => $request->s_phone,
                'p_image' => $filename,
                'role' => 2,
                'verification' => 1
            ]);

            $id = User::where('email','=',$request->email)->first()->id;
            shop::create([
                'u_id' => $id
            ]);
        }
        return back()->with('success', 'Successfully Supplier Added.');
    }

    public function supplier_status($id)
    {
        $getStatus = User::where('id', $id)->first();
        if ($getStatus->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        User::where('id', $id)->update(['status' => $status]);
        return back()->with('success', 'Successfully Status Changed.');
    }

    public function supplier_delete(Request $request)
    {
        $del_supplier_id = $request->deletingId;

        $del_supplier_info = shop::find($del_supplier_id);
        $destination = 'public/uploads/shop/' . $del_supplier_info->shop_image;

        if (File::exists($destination)) {
            File::delete($destination);
        }

        $del_supplier_info->delete();
        return back()->with('success', 'Successfully Status Deleted.');
    }

}
