@extends('front.layouts.layout')

@section('title','محمد العتيبي')

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
        @foreach ($admins as $admin)
        <h1 class="col-lg-4">@if (isset($admin['name'])) {{$admin['name']}} @endif</h1>
        <p class="col-lg-8">@if (isset($admin['wisdom'])) {{$admin['wisdom']}} @endif</p>
        @endforeach
      </div>
    </div>

  </div>
</section>

<section id="cta1" class="cta1">
  <div class="container">

    <div class="row">
      <div class="d-flex text-right text-lg-end">
        <h6>الرئيسية ></h6>
        <h6>&numsp;محمد العتيبي</h6>
      </div>
    </div>

  </div>
</section>

<div style="margin-top: 100px" class="pi-tabs-vertical pi-responsive-sm">
<div class="container overflow-hidden text-right mx-auto p-10">
        <div class="row">
          <div class="col-lg-4">
            <div class="card" style="width: 18rem;border:none">
                <ul class="list-group list-group-flush">
                  <a href="{{route('cv.articals')}}"><li @if (Session::get('page') == 'cv_artical' || Session::get('page') == 'cv' ) style="background-color:white !important; border-left: 3px solid #37517e;
                    color:#2e343c !important;" @endif  class="list-group-item">كلمات في الحياة</li></a>
                  <a href="{{route('cv.poems')}}"><li @if (Session::get('page') == 'cv_poem') style="background-color:white !important; border-left: 3px solid #37517e;
                    color:#2e343c !important;" @endif  class="list-group-item">قصائدي</li></a>
                  <a href="{{route('cv.qualifications')}}"><li  @if (Session::get('page') == 'cv_qualification') style="background-color:white !important; border-left: 3px solid #37517e;
                    color:#2e343c !important;" @endif class="list-group-item">المؤهلات - الشهادات</li></a>
                  <a href="{{route('cv.experiences')}}"><li @if (Session::get('page') == 'cv_experience') style="background-color:white !important; border-left: 3px solid #37517e;
                    color:#2e343c !important;" @endif class="list-group-item">الخبرات</li></a>
                  <a href="{{route('cv.channels')}}"><li @if (Session::get('page') == 'cv_channel') style="background-color:white !important; border-left: 3px solid #37517e;
                    color:#2e343c !important;" @endif  class="list-group-item">شاهد محمد العتيبي (قناة اليوتيوب)</li></a>
                  <a href="{{route('cv.images')}}"><li @if (Session::get('page') == 'cv_image') style="background-color:white !important; border-left: 3px solid #37517e;
                    color:#2e343c !important;" @endif  class="list-group-item">ألبوم الصور</li></a>
                  <a href="{{route('cv.designs')}}"><li @if (Session::get('page') == 'cv_design') style="background-color:white !important; border-left: 3px solid #37517e;
                    color:#2e343c !important;" @endif  class="list-group-item">ألبوم التصاميم</li></a>
                  <a href="{{route('cv.files')}}"><li @if (Session::get('page') == 'cv_file') style="background-color:white !important; border-left: 3px solid #37517e;
                    color:#2e343c !important;" @endif  class="list-group-item">الملفات</li></a>
                </ul>
            </div>     
         </div>
          <div  class="col-lg-8" >
           @yield('cv_content')
        </div>
        </div>
    </div>
</div>

@endsection

