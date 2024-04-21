<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryImage;
use App\Models\CategoryImageModel;
use App\Models\Image as ModelsImage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function images(): View
    {
        Session::put('page','images');
        $images = ModelsImage::with('category_images')->get()->toArray();
        // dd($images);
        return view('admin.images.images')->with(compact('images'));
    }

    public function deleteImage($id){
        //Get Imagetable Image
        $gallaryImage = ModelsImage::where('id',$id)->first();
        
        //Get Imagetable Image Path
        $gallary_image_path = 'admin/images/gallary_images/';

        //Delete Image if exists in Folder
        if(file_exists($gallary_image_path.$gallaryImage->image)){
           @unlink($gallary_image_path.$gallaryImage->image);
        }else{
            $imageName = $gallaryImage->image;
        }
        //Delete  Image from images table
        ModelsImage::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف الصورة بنجاح');
      }

      public function addEditImage(Request $request,$id=null){
       Session::put('page','images');
       if($id==""){
       $title = "إضافة صورة";
       $image = new ModelsImage;
       $message = "تم إضافة الصورة بنجاح";
       }else{
           $title = "تعديل صورة";
           $image = ModelsImage::find($id);
           $message = "تم تعديل الصورة بنجاح"; 
       }

    
       if($request->isMethod('post')){
           $data = $request->all();
            $this->validate($request, [
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
                    'place'=>'required',
                    'image_date' => 'required|date',
                    'category_image_id'=>'required',

            ],[
                'image_date.required'=>'تاريخ الصورة مطلوب',
                'image_date.date'=>'يجب أن يكون حقل تاريخ الصورة تاريخًا صالحًا.',
                'place.required'=>'مكان الصورة مطلوب',
                'image.image'=>'يجب أن يكون الملف عبارة عن صورة',
                'image.mimes'=>'يجب أن يكون حقل الصورة ملفًا من النوع: jpeg، png، jpg، gif، svg.',
                'category_image_id.required'=>'تصنيف الصورة مطلوب'

            ]);

           //upload  image
           if($request->hasFile('image')){
               $image_tmp = $request->file('image');
               if($image_tmp->isValid()){
                   //Get Image Extention
                   $extention = $image_tmp->getClientOriginalExtension();
                   //Generate New Image Name
                   $imageName = rand(111,99999).'.'.$extention;
                   $imagePath = 'admin/images/gallary_images/'.$imageName;
                   //upload the image
                   Image::make($image_tmp)->resize(1000,1000)->save($imagePath);

                   $image->image = $imageName;
               }
           }
           $image->title = $request->title;
           $image->place = $request->place;
           $imageDetails = CategoryImage::find($data['category_image_id']);
           $image->category_image_id = $data['category_image_id'];
           $image->image_date = $request->image_date;
           $image->save();
           return redirect('admin/uplodeImages')->with('status',$message);
       }
       $categoryimages = CategoryImage::get()->toArray();
       //dd($categoryimages);
       return view('admin.images.add_edit_image')->with(compact('title','categoryimages','image','message'));
      }
}
