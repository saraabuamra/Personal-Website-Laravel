<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class FileController extends Controller
{
    public function files(): View
    {
        Session::put('page','files');
        $files = File::get()->toArray();
        return view('admin.files.files')->with(compact('files'));
    }


    public function updateFileStatus(Request $request){
        if($request->ajax()){
           $data = $request->all();
           if($data['status']=="Active"){
               $status = 0;
           }else{
               $status = 1;
           }
           File::where('id',$data['file_id'])->update(['status'=>$status]);
           return response()->json(['status'=>$status,'file_id'=>$data['file_id']]);
        }
       }

    public function deleteFile($id){
        $file = File::where('id',$id)->first();
        
        //Get File Path
        $file_path = 'admin/files/file_url/';

        //Delete File if exists in Folder
        if(file_exists($file_path.$file->file_url)){
           @unlink($file_path.$file->file_url);
        }else{
            $imageName = $file->file_url;
        }
        File::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف الملف بنجاح');
      }

      public function addEditFile(Request $request,$id=null){
       Session::put('page','files');
       if($id==""){
       $title = "إضافة ملف";
       $file = new File;
       $message = "تم إضافة الملف بنجاح";
       }else{
           $title = "تعديل ملف";
           $file = File::find($id);
           $message = "تم تعديل الملف بنجاح"; 
       }

    
       if($request->isMethod('post')){
           $data = $request->all();
            $this->validate($request, [
                    'file_url' => 'required|mimetypes:application/pdf,application/vnd.ms-excel,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation',
                    'name'=>'required',
            ],[
                'name.required'=>'اسم الملف مطلوب',
                'file_url.required'=>' الملف مطلوب',
            ]);

              //upload File
           if($request->hasFile('file_url')){
            $file_tmp = $request->file('file_url');
            if($file_tmp->isValid()){
                //Get File Extention
                $extention = $file_tmp->getClientOriginalExtension();
                //Generate New file Name
                $fileName = rand(111,99999).'.'.$extention;
                $filePath = 'admin/files/file_url/'.$fileName;
                //upload the file
                $file_tmp->move($filePath,$fileName);

                $file->file_url = $fileName;
            }
        }
           $file->name = $request->name;
           $file->file_url = $request->file_url;
           $file->status = 0;
           $file->save();
           return redirect('admin/uplodeFiles')->with('status',$message);
       }
       return view('admin.files.add_edit_file')->with(compact('title','file','message'));
      }
}
