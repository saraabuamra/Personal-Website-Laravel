<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artical;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class ArticalController extends Controller
{
    public function articals(): View
    {
        Session::put('page','articals');
        $articals = Artical::get()->toArray();
        return view('admin.articals.articals')->with(compact('articals'));
    }

    public function deleteArtical($id){
        //Delete Artical 
        Artical::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف المقالة بنجاح');
      }

      public function addEditArtical(Request $request,$id=null){
       Session::put('page','articals');
       if($id==""){
       $title = "إضافة مقالة";
       $artical = new Artical;
       $message = "تم إضافة المقالة بنجاح";
       }else{
           $title = "تعديل مقالة";
           $artical = Artical::find($id);
           $message = "تم تعديل المقالة بنجاح"; 
       }

    
       if($request->isMethod('post')){
           $data = $request->all();
            $this->validate($request, [
                    'name'=>'required',
                    'content'=>'required'
            ],[
                'name.required'=>'اسم المقالة مطلوب',
                'content.required'=>'نص المقالة مطلوب'
            ]);

        
           $artical->name = $request->name;
           $artical->content = $request->content;
           $artical->save();
           return redirect('admin/articals')->with('status',$message);
       }
       return view('admin.articals.add_edit_artical')->with(compact('title','artical','message'));
      }
}
