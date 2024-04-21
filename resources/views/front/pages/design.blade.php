@extends('front.pages.cv')

@section('cv_content')
<section id="designs" class="portfolio">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>ألبوم التصاميم</h2>
      </div>
      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @foreach ($designs as $design)
        <div class="col-lg-4 col-md-6 portfolio-item filter-{{$design['id']}}">
          <div class="portfolio-img"><img @if (isset($design['image'])) src="{{asset('admin/images/design_images/'.$design['image'])}}" @endif class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>@if (isset($design['title'])) {{$design['title']}}  @endif</h4>
            <p>@if (isset($design['design_date'])) {{$design['design_date']}} @endif</p>
            <p>@if (isset($design['theside'])) {{$design['theside']}} @endif</p>
          </div>
        </div>
        @endforeach

      </div>

    </div>
  </section>     
@endsection
