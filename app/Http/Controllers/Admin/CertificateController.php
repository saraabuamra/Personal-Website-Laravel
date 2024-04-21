<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class CertificateController extends Controller
{
    public function certificates() : View {
        Session::put('page','certificates');
        $certificates = Certificate::get()->toArray();
        return view('admin.certificates.certificates')->with(compact('certificates'));
    }

    public function deleteCertificate($id){
        //Delete Certificate 
        Certificate::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف الشهادة بنجاح');
      }

      public function addEditCertificate(Request $request,$id=null){
       Session::put('page','certificates');
       if($id==""){
       $title = "إضافة شهادة";
       $certificate = new Certificate;
       $message = "تم إضافة الشهادة بنجاح";
       }else{
           $title = "تعديل شهادة";
           $certificate = Certificate::find($id);
           $message = "تم تعديل الشهادة بنجاح"; 
       }

    
       if($request->isMethod('post')){
           $data = $request->all();
            $this->validate($request, [
                    'name'=>'required',
            ],[
                'name.required'=>'اسم الشهادة مطلوب',
            ]);

        
           $certificate->name = $request->name;
           $certificate->theside = $request->theside;
           $certificate->certificate_date = $request->certificate_date;
           $certificate->save();
           return redirect('admin/certificates')->with('status',$message);
       }
       return view('admin.certificates.add_edit_certificate')->with(compact('title','certificate','message'));
      }
}
