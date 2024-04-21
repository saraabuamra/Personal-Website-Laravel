<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poem;
use Hamcrest\Core\HasToString;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class PoemController extends Controller
{
    public function poems(): View
    {
        Session::put('page','poems');
        $poems = Poem::get()->toArray();
        return view('admin.poems.poems')->with(compact('poems'));
    }

    public function deletePoem($id){
        //Get Poem Image
        $poemImage = Poem::where('id',$id)->first();
        
        //Get Poem Image Path
        $poem_image_path = 'admin/images/poem_images/';

        //Delete Poem Image if exists in Folder
        if(file_exists($poem_image_path.$poemImage->image)){
           @unlink($poem_image_path.$poemImage->image);
        }else{
            $imageName = $poemImage->image;
        }
        //Delete Poem Image from poems table
        Poem::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف القصيدة بنجاح');
      }

      public function addEditPoem(Request $request,$id=null){
       Session::put('page','poems');
       if($id==""){
       $title = "إضافة قصيدة";
       $poem = new Poem;
       $message = "تم إضافة القصيدة بنجاح";
       }else{
           $title = "تعديل قصيدة";
           $poem = Poem::find($id);
           $message = "تم تعديل القصيدة بنجاح"; 
       }

    
       if($request->isMethod('post')){
           $data = $request->all();
            $this->validate($request, [
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
                    'name'=>'required',
                    'content'=>'required'
            ],[
                'name.required'=>'اسم القصيدة مطلوب',
                'content.required'=>'نص القصيدة مطلوب',
                'image.image'=>'يجب أن يكون الملف عبارة عن صورة',
                'image.mimes'=>'يجب أن يكون حقل الصورة ملفًا من النوع: jpeg، png، jpg، gif، svg.',
            ]);

           //upload Poem image
           if($request->hasFile('image')){
               $image_tmp = $request->file('image');
               if($image_tmp->isValid()){
                   //Get Image Extention
                   $extention = $image_tmp->getClientOriginalExtension();
                   //Generate New Image Name
                   $imageName = rand(111,99999).'.'.$extention;
                   $imagePath = 'admin/images/poem_images/'.$imageName;
                   //upload the image
                   Image::make($image_tmp)->resize(1000,1000)->save($imagePath);

                   $poem->image = $imageName;
               }
           }
           $poem->name = $request->name;
           $poem->content = $request->content;
          $poem->save(); 
           return redirect('admin/poems')->with('status',$message);
       }
       return view('admin.poems.add_edit_poem')->with(compact('title','poem','message'));
      }
}
