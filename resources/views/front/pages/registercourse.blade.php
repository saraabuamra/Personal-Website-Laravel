@extends('front.layouts.layout')

@section('title','التسجيل في الدورة')

@section('style')
<style>
.list-group-item{
background-color: #f8fafa;
color: #70757a;
border-color: #e5eaea;
}
</style>  
@endsection

@section('content')
<section id="cta" class="cta">
    <div class="container">
  
      <div class="row">
        <div class="d-flex col-lg-12 text-right text-lg-end">
          <h1 class="col-lg-4">التسجيل في الدورة</h1>
        </div>
      </div>
  
    </div>
  </section>
  
  <section id="cta1" class="cta1">
    <div class="container">
  
      <div class="row">
        <div class="d-flex text-right text-lg-end">
          <h6>الرئيسية ></h6>
          <h6>&numsp;التسجيل في الدورة ></h6>
          @if ($registerCourses)
          <h6>&numsp;@if(!empty($registerCourses['name'] )) {{ $registerCourses['name'] }} @endif</h6>
         @endif<h6>&numsp;</h6>
        </div>
      </div>
  
    </div>
  </section>
   <br/><br/><br/>
<div class="container">
  <div class="row mt-4 ">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header">
          <h4 style="float: right;font-weight:bold;font-size:20px;color:#37517e" class="card-title">للتسجيل في الدورة  يرجى ملئ البيانات التالية :</h4>
          <div class="card-body">
                      <br/>
                      <br/>
                      {{-- <x-auth-session-error class="mb-4" :error="session('error')" /> --}}
                      <x-auth-session-status class="mb-4" :status="session('status')" />
                      @if (Session::has('error'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                       {{ Session::get('error') }}
                      </div>
                  @endif
                      <form class="forms-sample" action="{{route('register.course')}}" method="post">
                          @csrf
                          <div class="form-group">
                            <input type="hidden" class="form-control" id="course_id"
                            name="course_id" value="{{$registerCourses['id']}}">
                          </div>
                          <div class="form-group">
                              <label for="name">الاسم</label>
                              <input type="text" class="form-control" id="name"
                                   name="name" placeholder="اكتب اسمك" >
                          </div>
                          <br/>
                          <div class="form-group">
                              <label for="email">البريد الإلكتروني</label>
                              <input type="email" class="form-control" id="email"
                                   name="email" placeholder="اكتب بريدك الإلكتروني" >
                          </div>
                          <br/>
                          <div class="form-group" role="group" aria-label="Basic radio toggle button group">
                              <label for="name">الجنس</label>
                              <br/>
                              <input type="radio" class="btn-check" name="gender" id="gender1" value="F" autocomplete="off">
                              <label  class="btn btn-outline-primary" for="gender1">أنثى</label>
                            
                              <input type="radio" class="btn-check" name="gender" id="gender2" value="M"  autocomplete="off">
                              <label class="btn btn-outline-primary" for="gender2">ذكر</label>
                          </div>
                          <br/>
                          <div class="form-group">
                              <label for="mobile">رقم الجوال</label>
                              <input type="text" class="form-control" id="mobile"
                                   name="mobile" placeholder="اكتب رقم جوالك" >
                          </div>
                        <br/>
                          <button style="background-color: #37517e; border-color: #37517e;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                      </form>
                  </div>
      </div>
    </div>
    </div>
    

</div>
  </div>
  </div>

</div>
@endsection

