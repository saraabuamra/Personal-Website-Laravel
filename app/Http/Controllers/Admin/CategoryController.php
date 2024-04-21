<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function categories() : View{
        Session::put('page','categories');
        $categories = Category::get()->toArray();
        // dd($categories);
        return view('admin.categories.categories')->with(compact('categories'));
    }

    public function deleteCategory($id){
        //Delete Category 
        Category::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف الفئة بنجاح');
      }

      public function addEditCategory(Request $request,$id=null){
       Session::put('page','categories');
       if($id==""){
       $title = "إضافة فئة";
       $category = new Category;
       $message = "تم إضافة الفئة بنجاح";
       }else{
           $title = "تعديل فئة";
           $category = Category::find($id);
           $message = "تم تعديل الفئة بنجاح"; 
       }

    
       if($request->isMethod('post')){
           $data = $request->all();
            $this->validate($request, [
                    'category_name'=>'required|unique:categories,category_name',
            ],[
                'category_name.required'=>'اسم الفئة مطلوب',
                'category_name.unique'=>'هذه الفئة موجودة مسبقا'
            ]);

        
           $category->category_name = $request->category_name;
           $category->save();
           return redirect('admin/categories')->with('status',$message);
       }
       return view('admin.categories.add_edit_category')->with(compact('title','category','message'));
      }



}
