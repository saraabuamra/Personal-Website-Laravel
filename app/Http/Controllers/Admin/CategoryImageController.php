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

class CategoryImageController extends Controller
{
    public function categoryimages(): View
    {
        Session::put('page','categoryimages');
        $categoryimages = CategoryImage::get()->toArray();
        return view('admin.categoryimages.categoryimages')->with(compact('categoryimages'));
    }

    public function deleteCategoryimages($id){
        //Get Imagetable Image
        $gallaryImage = CategoryImage::where('id',$id)->first();
        
        //Get Imagetable Image Path
        $gallary_image_path = 'admin/images/category_images/';

        //Delete Image if exists in Folder
        if(file_exists($gallary_image_path.$gallaryImage->image)){
           @unlink($gallary_image_path.$gallaryImage->image);
        }else{
            $imageName = $gallaryImage->image;
        }
        //Delete  Image from images table
        CategoryImage::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف تصنيف الصورة بنجاح');
      }

      public function addEditCategoryimage(Request $request,$id=null){
       Session::put('page','categoryimages');
       if($id==""){
       $title = "إضافة تصنيف صورة";
       $image = new CategoryImage;
       $message = "تم إضافة تصنيف الصورة بنجاح";
       }else{
           $title = "تعديل تصنيف صورة";
           $image = CategoryImage::find($id);
           $message = "تم تعديل تصنيف الصورة بنجاح"; 
       }

    
       if($request->isMethod('post')){
           $data = $request->all();
            $this->validate($request, [
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
                    'title'=>'unique:categoryimages',
            ],[
                'title.unique'=>'تصنيف الصورة موجود مسبقا',
                'image.image'=>'يجب أن يكون الملف عبارة عن صورة',
                'image.mimes'=>'يجب أن يكون حقل الصورة ملفًا من النوع: jpeg، png، jpg، gif، svg.',

            ]);

           //upload  image
           if($request->hasFile('image')){
               $image_tmp = $request->file('image');
               if($image_tmp->isValid()){
                   //Get Image Extention
                   $extention = $image_tmp->getClientOriginalExtension();
                   //Generate New Image Name
                   $imageName = rand(111,99999).'.'.$extention;
                   $imagePath = 'admin/images/category_images/'.$imageName;
                   //upload the image
                   Image::make($image_tmp)->resize(1000,1000)->save($imagePath);

                   $image->image = $imageName;
               }
           }
           $image->title = $request->title;
           $image->save();
           return redirect('admin/uplodeCategoryimages')->with('status',$message);
       }
       return view('admin.categoryimages.add_edit_categoryimage')->with(compact('title','image','message'));
      }
}
