@extends('front.layouts.layout')

@section('title','تواصل معنا')

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
          <h1 class="col-lg-4">تواصل معنا</h1>
        </div>
      </div>
  
    </div>
  </section>
  
  <section id="cta1" class="cta1">
    <div class="container">
  
      <div class="row">
        <div class="d-flex text-right text-lg-end">
          <h6>الرئيسية ></h6>
          <h6>&numsp;الاتصال بمحمد العتيبي</h6>
        </div>
      </div>
  
    </div>
  </section>
   <br/><br/><br/>
<div class="container">
  <div class="row mt-4 ">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h4 style="float: right;font-weight:bold;font-size:20px;color:#37517e" class="card-title">للاتصال مع محمد العتيبي  يرجى ملئ البيانات التالية :</h4>
          <div class="card-body">
                      <br/>
                      <br/>
                      <x-auth-session-error class="mb-4" :error="session('error')" />
                      <x-auth-session-status class="mb-4" :status="session('status')" />
                      <form class="forms-sample" action="{{route('save.contact')}}" method="post">
                          @csrf
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
                          <div class="form-group">
                              <label for="subject">موضوع الرسالة</label>
                              <input type="text" class="form-control" id="subject"
                                   name="subject" placeholder="اكتب موضوع رسالتك" >
                          </div>
                          <br/>
                          <div class="form-group">
                              <label for="message">رسالتكم هنا</label>
                              <textarea name="message" placeholder="اكتب رسالتك هنا"  class="form-control"  rows="8"></textarea>
                          </div>
                        <br/>
                          <button style="background-color: #37517e; border-color: #37517e;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                      </form>
                  </div>
      </div>
    </div>
    </div>
    <div class="col-lg-4">
      @foreach ($admins as $admin)
        
      @endforeach
      <div class="info">
          <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>الفاكس:</h4>
              <p>@if (isset($admin['mobile'])) {{$admin['mobile']}} @endif</p>
          </div>

        <div class="email">
          <i class="bi bi-envelope"></i>
          <h4>الايميل:</h4>
          <p>@if (isset($admin['email'])) {{$admin['email']}} @endif</p>
        </div>

        <div class="phone">
          <i class="bi bi-phone"></i>
          <h4>رقم الجوال:</h4>
          <p>@if (isset($admin['mobile'])) {{$admin['mobile']}} @endif</p>
        </div>

      </div>

    </div>
    

</div>
  </div>
  </div>

</div>
@endsection

