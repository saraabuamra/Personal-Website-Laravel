<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ProgramController extends Controller
{
    public function programs(): View
    {
        Session::put('page','programs');
        $programs = Program::with('category')->get()->toArray();
        //dd($programs);
        return view('admin.programs.programs')->with(compact('programs'));
    }

    public function deleteProgram($id){
        //Get Program Image
        $programImage = Program::where('id',$id)->first();
        
        //Get Program Image Path
        $program_image_path = 'admin/images/program_images/';

        //Delete Program Image if exists in Folder
        if(file_exists($program_image_path.$programImage->image)){
           @unlink($program_image_path.$programImage->image);
        }else{
            $imageName = $programImage->image;
        }
        //Delete Program Image from program table
        Program::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف البرنامج التدريبي بنجاح');
      }

      public function addEditProgram(Request $request,$id=null){
       Session::put('page','programs');
       if($id==""){
       $title = "إضافة برنامج تدريبي";
       $program = new Program;
       $message = "تم إضافة البرنامج التدريبي بنجاح";
       }else{
           $title = "تعديل برنامج تدريبي";
           $program = Program::find($id);
           $message = "تم تعديل البرنامج التدريبي بنجاح"; 
       }

    
       if($request->isMethod('post')){
           $data = $request->all();
            $this->validate($request, [
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
                    'name'=>'required',
                    'hours'=>'required',
                    'category_id'=>'required',
            ],[
                'name.required'=>'اسم البرنامج التدريبي مطلوب',
                'hours.required'=>' عدد ساعات البرنامج التدريبي مطلوبة',
                'image.image'=>'يجب أن يكون الملف عبارة عن صورة',
                'category_id.required'=>'الفئة مطلوبة',
                'image.mimes'=>'يجب أن يكون حقل الصورة ملفًا من النوع: jpeg، png، jpg، gif، svg.',
            ]);

           //upload Program image
           if($request->hasFile('image')){
               $image_tmp = $request->file('image');
               if($image_tmp->isValid()){
                   //Get Image Extention
                   $extention = $image_tmp->getClientOriginalExtension();
                   //Generate New Image Name
                   $imageName = rand(111,99999).'.'.$extention;
                   $imagePath = 'admin/images/program_images/'.$imageName;
                   //upload the image
                   Image::make($image_tmp)->resize(1000,1000)->save($imagePath);

                   $program->image = $imageName;
               }
           }
           $program->name = $request->name;
           $program->hours = $request->hours;
           $program->goal = $request->goal;
           $categoryDetails = Category::find($data['category_id']);
           $program->category_id = $data['category_id'];
           $program->save();
           return redirect('admin/programs')->with('status',$message);
       }
       $categories = Category::get()->toArray();
       //dd($categories);
       return view('admin.programs.add_edit_program')->with(compact('title','categories','program','message'));
      }
}
