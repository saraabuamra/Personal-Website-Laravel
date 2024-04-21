<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\Course;
use App\Models\RegisterCourse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class RegisterCourseController extends Controller
{
    public function registercourses(): View
    {
        Session::put('page','registercourses');
        $registercourses = RegisterCourse::with('course')->get()->toArray();
        // dd($registercourses);
        return view('admin.registercourses.registercourses')->with(compact('registercourses'));
    }

    public function deleteRegistercourse($id){
        RegisterCourse::where('id',$id)->delete();
        return redirect()->back()->with('status','تم حذف المسجل في الدورة بنجاح');
      }
}
