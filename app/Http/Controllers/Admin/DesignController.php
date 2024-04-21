<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Design;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class DesignController extends Controller
{
    public function designs(): View
    {
        Session::put('page','designs');
        $designs = Design::get()->toArray();
        return view('admin.designs.designs')->with(compact('designs'));
    }

    public function deleteDesign($id){
        //Get Design Image
        $designImage = Design::where('id',$id)->first();
        
        //Get Design Image Path
        $design_image_path = 'admin/images/design_images/';

        //Delete Design Image if exists in Folder
        if(file_exists($design_image_path.$designImage->image)){
           @unlink($design_image_path.$designImage->image);
        }else{
            $imageName = $designImage->image;
        }
        //Delete Design Image from designs table
        Design::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف التصميم بنجاح');
      }

      public function addEditDesign(Request $request,$id=null){
       Session::put('page','designs');
       if($id==""){
       $title = "إضافة تصميم";
       $design = new Design;
       $message = "تم إضافة التصميم بنجاح";
       }else{
           $title = "تعديل تصميم";
           $design = Design::find($id);
           $message = "تم تعديل التصميم بنجاح"; 
       }

    
       if($request->isMethod('post')){
           $data = $request->all();
            $this->validate($request, [
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
                    'theside'=>'required',
                    'design_date' => 'required|date',
            ],[
                'design_date.required'=>'تاريخ التصميم مطلوب',
                'design_date.date'=>'يجب أن يكون حقل تاريخ التصميم تاريخًا صالحًا.',
                'theside.required'=>'الجهة المسؤولة عن التصميم مطلوب',
                'image.image'=>'يجب أن يكون الملف عبارة عن صورة',
                'image.mimes'=>'يجب أن يكون حقل الصورة ملفًا من النوع: jpeg، png، jpg، gif، svg.',
            ]);

           //upload Design image
           if($request->hasFile('image')){
               $image_tmp = $request->file('image');
               if($image_tmp->isValid()){
                   //Get Image Extention
                   $extention = $image_tmp->getClientOriginalExtension();
                   //Generate New Image Name
                   $imageName = rand(111,99999).'.'.$extention;
                   $imagePath = 'admin/images/design_images/'.$imageName;
                   //upload the image
                   Image::make($image_tmp)->resize(1000,1000)->save($imagePath);

                   $design->image = $imageName;
               }
           }
           $design->title = $request->title;
           $design->theside = $request->theside;
           $design->design_date = $request->design_date;
           $design->save();
           return redirect('admin/designs')->with('status',$message);
       }
       return view('admin.designs.add_edit_design')->with(compact('title','design','message'));
      }
}
