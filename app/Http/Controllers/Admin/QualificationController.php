<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class QualificationController extends Controller
{
    public function qualifications() : View {
        Session::put('page','qualifications');
        $qualifications = Qualification::get()->toArray();
        return view('admin.qualifications.qualifications')->with(compact('qualifications'));
    }

    public function deleteQualification($id){
        //Delete Qualification 
        Qualification::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف المؤهل العلمي بنجاح');
      }

      public function addEditQualification(Request $request,$id=null){
       Session::put('page','qualifications');
       if($id==""){
       $title = "إضافة مؤهل علمي";
       $qualification = new Qualification;
       $message = "تم إضافة المؤهل العلمي بنجاح";
       }else{
           $title = "تعديل مؤهل علمي";
           $qualification = Qualification::find($id);
           $message = "تم تعديل المؤهل العلمي بنجاح"; 
       }

    
       if($request->isMethod('post')){
           $data = $request->all();
            $this->validate($request, [
                    'name'=>'required',
            ],[
                'name.required'=>'اسم المؤهل العلمي مطلوب',
            ]);

        
           $qualification->name = $request->name;
           $qualification->theside = $request->theside;
           $qualification->qualification_date = $request->qualification_date;
           $qualification->save();
           return redirect('admin/qualifications')->with('status',$message);
       }
       return view('admin.qualifications.add_edit_qualification')->with(compact('title','qualification','message'));
      }
}
