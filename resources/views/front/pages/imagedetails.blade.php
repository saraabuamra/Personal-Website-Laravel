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
          <h6>&numsp;ألبومات الصور ></h6>
          @if ($imagedetails)
              <h6>&numsp;@if(!empty($imagedetails['title'] )) {{ $imagedetails['title'] }} @endif</h6>
          @endif
        </div>
      </div>
  
    </div>
  </section>
  <br/><br/><br/>
  @if(!empty($imagedetails['images']))
 <section id="galaryImage" class="portfolio">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>ألبوم الصور</h2>
      </div>
      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @if($imagedetails)
        @foreach($imagedetails['images'] as $image)
        <div class="col-lg-4 col-md-6 portfolio-item">
          <div class="portfolio-img"><img @if (isset($image['image'])) src="{{asset('admin/images/gallary_images/'.$image['image'])}}" @endif class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>@if (isset($image['title'])) {{$image['title']}}  @endif</h4>
            <br/>
            <p>@if (isset($image['image_date'])) {{$image['image_date']}} @endif</p>
            <br/>
            <p>@if (isset($image['place'])) {{$image['place']}} @endif</p>
          </div>
        </div>
        @endforeach
        @endif

      </div>

    </div>
</section>
@else
<section id="galaryImage" class="portfolio">
  <div class="container" data-aos="fade-up">
  <h6>لا يوجد صور حاليا</h6>
  </div>
</section>
@endif
@endsection

