<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class ConsultationController extends Controller
{
    public function consultations(): View
    {
        Session::put('page','consultations');
        $consultations = Consultation::get()->toArray();
        return view('admin.consultations.consultations')->with(compact('consultations'));
    }

    public function updateConsultationStatus(Request $request){
        if($request->ajax()){
           $data = $request->all();
           if($data['status']=="Active"){
               $status = 0;
           }else{
               $status = 1;
           }
           Consultation::where('id',$data['consultation_id'])->update(['status'=>$status]);
           return response()->json(['status'=>$status,'consultation_id'=>$data['consultation_id']]);
        }
       }

    public function deleteConsultation($id){
        Consultation::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف الاستشارة بنجاح');
      }
}
