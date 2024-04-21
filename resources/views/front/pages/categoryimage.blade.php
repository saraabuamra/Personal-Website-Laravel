@extends('front.layouts.layout')

@section('title','ألبومات الصور')

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
          <h1 class="col-lg-4">ألبومات الصور</h1>
        </div>
      </div>
  
    </div>
  </section>
  
  <section id="cta1" class="cta1">
    <div class="container">
  
      <div class="row">
        <div class="d-flex text-right text-lg-end">
          <h6>الرئيسية ></h6>
          <h6>&numsp;ألبومات الصور</h6>
        </div>
      </div>
  
    </div>
  </section>
  <br/><br/><br/>
   <section id="galaryImage" class="portfolio">
    <div class="container" data-aos="fade-up">
      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @foreach ($categoryimages as $categoryimage)
        <div class="col-lg-4 col-md-6 portfolio-item filter-{{$categoryimage['id']}}">
          <div class="portfolio-img"><img @if (isset($categoryimage['image'])) src="{{asset('admin/images/category_images/'.$categoryimage['image'])}}" @endif class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>@if (isset($categoryimage['title'])) {{$categoryimage['title']}}  @endif</h4>
            <a href="{{url('imagedetails/'.$categoryimage['id'])}}">مشاهدة الألبوم </a>
          </div>
        </div>
        @endforeach

      </div>

    </div>
</section>  
@endsection

