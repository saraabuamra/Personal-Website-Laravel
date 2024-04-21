@extends('front.pages.cv')

@section('cv_content')
<section id="poems" class="portfolio">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>قصائدي</h2>
      </div>
      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @foreach ($poems as $poem)
        <div class="col-lg-6 col-md-6 portfolio-item filter-{{$poem['id']}}">
          <div class="portfolio-img"><img @if (isset($poem['image'])) src="{{asset('admin/images/poem_images/'.$poem['image'])}}" @endif class="img-fluid" alt=""></div>
          <div class="portfolio-info">
            <h4>@if (isset($poem['name'])) {{$poem['name']}}  @endif</h4>
            <a href="{{url('cv/poemdetails/'.$poem['id'])}}">قراءة القصيدة </a>
          </div>
        </div>
        @endforeach

      </div>

    </div>
</section> 
@endsection

