<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function courses(): View
    {
        Session::put('page','courses');
        $courses = Course::with('program')->get()->toArray();
        // dd($courses);
        return view('admin.courses.courses')->with(compact('courses'));
    }

    public function updateCourseStatus(Request $request){
        if($request->ajax()){
           $data = $request->all();
           if($data['status']=="Active"){
               $status = 0;
           }else{
               $status = 1;
           }
           Course::where('id',$data['course_id'])->update(['status'=>$status]);
           return response()->json(['status'=>$status,'course_id'=>$data['course_id']]);
        }
       }

    public function deleteCourse($id){
        //Delete Course Image from courses table
        Course::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف الدورة بنجاح');
      }

      public function addEditCourse(Request $request,$id=null){
       Session::put('page','courses');
       if($id==""){
       $title = "إضافة دورة";
       $course = new Course;
       $message = "تم إضافة الدورة بنجاح";
       }else{
           $title = "تعديل دورة";
           $course = Course::find($id);
           $message = "تم تعديل الدورة بنجاح"; 
       }

    
       if($request->isMethod('post')){
           $data = $request->all();
            $this->validate($request, [
                    'name'=>'required',
                    'start_date' => 'required|date|before_or_equal:end_date',
                    'end_date' => 'date|after_or_equal:start_date',
                    'program_id'=>'required',
            ],[
                'name.required'=>'اسم الدورة مطلوب',
                'start_date.required'=>'تاريخ بدء الدورة مطلوب',
                'end_date.date'=>'يجب أن يكون حقل تاريخ الانتهاء تاريخًا صالحًا.',
                'start_date.date'=>'يجب أن يكون حقل تاريخ البدء تاريخًا صالحًا.',
                'end_date.after_or_equal'=>'يجب أن يكون حقل تاريخ الانتهاء تاريخًا بعد تاريخ البدء أو يساويه.',
                'start_date.before_or_equal'=>'يجب أن يكون حقل تاريخ البدء تاريخًا قبل تاريخ الانتهاء أو يساويه.',
                'program_id.required'=>'اسم البرنامج التدريبي مطلوب'
            ]);

           $course->name = $request->name;
           $course->start_date = $request->start_date;
           $course->end_date = $request->end_date;
           $course->days = $request->days;
           $course->notes = $request->notes;
           $programDetails = Program::find($data['program_id']);
           $course->program_id = $data['program_id'];
           $course->status = 0;
           $course->save();
           return redirect('admin/courses')->with('status',$message);
       }
       $programs = Program::get()->toArray();
       //dd($categories);
       return view('admin.courses.add_edit_course')->with(compact('title','programs','course','message'));
      }
}
