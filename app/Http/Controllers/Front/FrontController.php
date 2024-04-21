<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Artical;
use App\Models\Category;
use App\Models\CategoryImage;
use App\Models\Certificate;
use App\Models\Channel;
use App\Models\Consultation;
use App\Models\Contact;
use App\Models\Course;
use App\Models\Design;
use Illuminate\Support\Facades\Mail;
use App\Models\Experience;
use App\Models\Image;
use App\Models\Poem;
use App\Models\Program;
use App\Models\Qualification;
use App\Models\RegisterCourse;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;



class FrontController extends Controller
{
    public function index(): View
    {
        Session::put('page','index');
        $admins = User::get()->toArray();
        $qualifications = Qualification::get()->toArray();
        $experiences = Experience::get()->toArray();
        $poems = Poem::get()->toArray();
        $channels = Channel::get()->toArray();
        // dd($poems);
        $categories = Category::with('program')->get()->toArray();
        $courses = Course::with('program')->where('status',1)->get()->toArray();
        //  dd($categories);
        $programs = Program::with('category')->get()->toArray();
        // dd($programs);
        return view('front.pages.index')->with(compact('admins','channels','poems','courses','categories','programs','qualifications','experiences'));
    }

    public function cv(): View
    {
        Session::put('page','cv');
        $articals = Artical::get()->toArray();
        // $poems = Poem::get()->toArray();
        $admins = User::get()->toArray();
        return view('front.pages.artical')->with(compact('articals','admins'));
    }

    public function cvArtical(): View
    {
        Session::put('page','cv_artical');
        $articals = Artical::get()->toArray();
        $admins = User::get()->toArray();
        return view('front.pages.artical')->with(compact('articals','admins'));
    }

    public function cvPoemDetails($id = null)
    {
        Session::put('page','cv_poem');
        $admins = User::get()->toArray();
        $poemdetails = Poem::findOrFail($id);
        // dd($poemdetails);
        return view('front.pages.poemdetails')->with(compact('admins','poemdetails'));
    }

    public function cvPoem()
    {
        Session::put('page','cv_poem');
        $admins = User::get()->toArray();
        $poems = Poem::get()->toArray();
        return view('front.pages.poem')->with(compact('admins','poems'));
    }

    public function cvQualification(): View
    {
        Session::put('page','cv_qualification');
        $qualifications = Qualification::get()->toArray();
        $certificates = Certificate::get()->toArray();
        $admins = User::get()->toArray();
        return view('front.pages.qualification')->with(compact('admins','qualifications','certificates'));
    }
    
    public function cvExperience(): View
    {
        Session::put('page','cv_experience');
        $experiences = Experience::get()->toArray();
        $admins = User::get()->toArray();
        return view('front.pages.experience')->with(compact('admins','experiences'));
    }


    public function cvChannel(): View
    {
        Session::put('page','cv_channel');
        $admins = User::get()->toArray();
        $channels = Channel::get()->toArray();
        return view('front.pages.channel')->with(compact('admins','channels'));
    }

    public function cvImage(): View
    {
        Session::put('page','cv_image');
        $admins = User::get()->toArray();
        return view('front.pages.image')->with(compact('admins'));
    }

    public function cvDesign(): View
    {
        Session::put('page','cv_design');
        $admins = User::get()->toArray();
        $designs = Design::get()->toArray();
        // dd($designs);
        return view('front.pages.design')->with(compact('admins','designs'));
    }

    public function cvFile(): View
    {
        Session::put('page','cv_file');
        $admins = User::get()->toArray();
        return view('front.pages.file')->with(compact('admins'));
    }

    public function contact(): View
    {
        Session::put('page','contact');
        $admins = User::get()->toArray();
        return view('front.pages.contact')->with(compact('admins'));
    }

    public function categoryimage(): View
    {
        Session::put('page','categoryimage');
        $admins = User::get()->toArray();
        $categoryimages = CategoryImage::with('images')->get()->toArray();
        // dd($images);
        return view('front.pages.categoryimage')->with(compact('admins','categoryimages'));
    }
    public function imagedetails($id = null)
    {
        Session::put('page','imagedetails');
        $admins = User::get()->toArray();
        $imagedetails = CategoryImage::with('images')->findOrFail($id)->toArray();
        // dd($imagedetails);
        return view('front.pages.imagedetails')->with(compact('admins','imagedetails'));
    }
    
   

    public function saveContact(Request $request){
       $request->validate([
        'name' => 'required|string|max:100',
        'mobile' => 'required|numeric|digits:10',
        'email' => 'required|email',
        'gender' => 'required',
        'subject' => 'required',
        'message' => 'required'
       ],[
        'name.required'=>'الرجاء ادخال الاسم',
        'mobile.required'=>'الرجاء ادخال رقم الجوال',
        'email.required'=>'الرجاء ادخال البريد الإلكتروني',
        'mobile.numeric'=>'رقم الجوال عبارة عن رقم',
        'mobile.digits'=>'رقم الجوال يتكون من 10 أرقام',
        'email.email'=>'الرجاء ادخال البريد الالكتروني بشكل صحيح',
        'gender.required'=>'الرجاء ادخال الجنس',
        'subject.required'=>'الرجاء ادخال موضوع الرسالة',
        'message.required'=>'الرجاء ادخال الرسالة',
       ]);

       $contact = Contact::create($request->all());

      $admins = User::get(['email'])->pluck('email')->toArray();
      Mail::to($admins)->send(new ContactMail($contact));

      return redirect()->back()->with(['status'=>'شكرا لك على تواصلك معنا سوف نتواصل معك في أقرب وقت .']);
   
    }
         
   
    
    public function saveConsultation(Request $request){

     $consultation =  $request->validate([
        'name' => 'required|string|max:100',
        'mobile' => 'required|numeric|digits:10',
        'email' => 'required|email|max:150',
        'gender' => 'required',
        'subject' => 'required',
        'message' => 'required',
       ],[
        'name.required'=>'الرجاء ادخال الاسم',
        'mobile.required'=>'الرجاء ادخال رقم الجوال',
        'email.required'=>'الرجاء ادخال البريد الإلكتروني',
        'mobile.numeric'=>'رقم الجوال عبارة عن رقم',
        'mobile.digits'=>'رقم الجوال يتكون من 10 أرقام',
        'email.email'=>'الرجاء ادخال البريد الالكتروني بشكل صحيح',
        'gender.required'=>'الرجاء ادخال الجنس',
        'subject.required'=>'الرجاء ادخال موضوع الرسالة',
        'message.required'=>'الرجاء ادخال الرسالة',
       ]);
     

       $consultation['status'] = 0;
       Consultation::create($consultation);

       return redirect()->back()->with(['status'=>'تم إرسال رسالتك بنجاح سنتواصل معك في أقرب وقت .']);
   
    }
    
    public function registercourses($id): View
    {
        Session::put('page','registercourses');
        $admins = User::get()->toArray();
        $registerCourses = Course::findOrFail($id)->toArray();
        // dd($registerCourses);
        return view('front.pages.registercourse')->with(compact('registerCourses','admins'));
    }

    public function registerCourse(Request $request){
        $registerCourse = new RegisterCourse;
        $request->validate([
           'name' => 'required|string|max:100',
           'mobile' => 'required|numeric|digits:10',
           'email' => 'required|email|max:150',
           'gender' => 'required',
           'course_id' => 'required|exists:courses,id',  
          ],[
           'name.required'=>'الرجاء ادخال الاسم',
           'mobile.required'=>'الرجاء ادخال رقم الجوال',
           'email.required'=>'الرجاء ادخال البريد الإلكتروني',
           'mobile.numeric'=>'رقم الجوال عبارة عن رقم',
           'mobile.digits'=>'رقم الجوال يتكون من 10 أرقام',
           'email.email'=>'الرجاء ادخال البريد الالكتروني بشكل صحيح',
           'gender.required'=>'الرجاء ادخال الجنس',
          ]);
          $existingRegistration = RegisterCourse::where('email', $request->email)
          ->where('course_id', $request->course_id)
          ->first();

          if ($existingRegistration) {
             return redirect()->back()->with(['error' => ' لقد قمت بالتسجيل في هذه الدورة بالفعل.']);
          }
          $registerCourse->name = $request->name;
          $registerCourse->email = $request->email;
          $registerCourse->mobile = $request->mobile;
          $registerCourse->gender = $request->gender;
          $registerCourse->course_id = $request->course_id;
          $registerCourse->save();

   
          return redirect()->back()->with(['status'=>'تم التسجيل في الدورة بنجاح سنتواصل معك في أقرب وقت .']);
      
       }

}
    
    

