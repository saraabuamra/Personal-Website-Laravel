@extends('front.layouts.layout')

@section('title','الرئيسية')


@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
           @foreach ($admins as $admin)
           <h5>حياك الله في موقعي</h5>
          <h1>@if (isset($admin['name'])) {{$admin['name']}} @endif</h1>
          <h2>@if (isset($admin['skills'])) {{$admin['skills']}} @endif</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#consultation" class="btn-get-started scrollto">إستشارة</a>
          </div>
          @endforeach
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img @if (isset($admin['image']))  src="{{asset('admin/images/admin_images/'.$admin['image'])}}" @else src="{{asset('front/assets/img/hero-img.png')}}" @endif  class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    {{-- <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Sed ut perspici</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4><a href="">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section --> --}}

    <section id="poem" class="poem">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>قصائدي</h2>
        </div>
        <div class="row poem-container" data-aos="fade-up" data-aos-delay="200">
          @foreach ($poems as $poem)
          <div class="col-lg-4 col-md-6 poem-item">
            <div class="poem-img"><img @if (isset($poem['image'])) src="{{asset('admin/images/poem_images/'.$poem['image'])}}" @endif class="img-fluid" alt=""></div>
            <div class="poem-info">
              <h4>@if (isset($poem['name'])) {{$poem['name']}}  @endif</h4>
              <a href="{{url('cv/poemdetails/'.$poem['id'])}}">قراءة القصيدة </a>
            </div>
          </div>
          @endforeach
  
        </div>
  
      </div>
    </section> 


    

      <!-- ======= Portfolio Section ======= -->
      <section id="program" class="portfolio">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>البرامج التدريبية</h2>
          </div>
  
          <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">الكل</li>
            @foreach ($categories as $category)
            <li data-filter=".filter-{{$category['id']}}">@if (isset($category['category_name'])) {{$category['category_name']}} @endif</li>
            @endforeach
          </ul>
  
          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($categories as $category)
            @if (count($category['program'])>0)
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{$category['id']}}">
              <div class="portfolio-img"><img @if (isset($category['program']['image'])) src="{{asset('admin/images/program_images/'.$category['program']['image'])}}" @endif class="img-fluid" alt=""></div>
              <div class="portfolio-info">
                <h4>@if (isset($category['program']['name'])) {{$category['program']['name']}}  @endif</h4>
                <p>@if (isset($category['program']['hours'])) {{$category['program']['hours']}} ساعة @endif</p>
                <p>@if (isset($category['program']['goal'])) {{$category['program']['goal']}} @endif</p>
              </div>
            </div>
            @endif
            @endforeach
  
          </div>
  
        </div>
      </section><!-- End Portfolio Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="course" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>الدورات التدريبية</h2>
        </div>
        <div class="row">
          @foreach ($courses as $course)
          @if (count($course['program'])>0)
          <div class="text-right col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="box featured">
              <h3>@if (isset($course['name'])){{$course['name']}}@endif</h3>
              <h4><span>@if (isset($course['days'])){{$course['days']}}@endif يوم</span></h4>
              <h4><span>@if (isset($course['start_date'])){{$course['start_date']}}@endif  -  @if (isset($course['end_date'])){{$course['end_date']}}@endif </span></h4>
              <ul>
                <li><i class="bx bx-check"></i>@if (isset($course['program']['name'])){{$course['program']['name']}}@endif</li>
              </ul>
              <p>@if (isset($course['notes'])){{$course['notes']}}@endif</p>
              <br/>
              <a href="{{url('registercourse/'.$course['id'])}}" class="buy-btn">تسجيل</a>
            </div>
            @endif
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Pricing Section -->

    <section id="channel" class="channel">
      <div class="section-title">
        <h2>شاهد محمد العتيبي</h2>
      </div>
      <div class="container" data-aos="fade-up">
        <div class="row channel-container" data-aos="fade-up" data-aos-delay="200">
          @foreach ($channels as $channel)
          <div class="col-lg-4 col-md-6 channel-item filter-{{$channel['id']}}">
              <div class="channel-img">
                  <iframe  height="315" @if($channel['url']) src="{{$channel['url']}}" @endif frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            <div class="channel-info" style="width: 79%;left:68px">
              <h4>@if (isset($channel['title'])) {{$channel['title']}}  @endif</h4>
              <br/>
              <a href="{{$channel['url']}}" target="_blank" style="display: inline-block; border-radius: 50%; background-color: rgb(71,178,228); padding: 15px;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" class="bi bi-play-circle" viewBox="0 0 16 16">
                      <path d="M7.445 10L5.691 8.051a.5.5 0 0 1 0-.918L7.445 6A.5.5 0 0 1 8 6.5v3a.5.5 0 0 1-.555.498z"/>
                      <path fill-rule="evenodd" d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm0 1a7 7 0 1 1 0 14A7 7 0 0 1 8 1z"/>
                  </svg>
              </a> 
              <br/>
              <br/>                   
              <p>@if (isset($channel['description'])) {{$channel['description']}}  @endif</p>
              <br/>
              <p>@if (isset($channel['notes'])) {{$channel['notes']}}  @endif</p>
  
            </div>
          </div>
          @endforeach
  
        </div>
  
      </div>
  </section> 


  </main><!-- End #main -->  
@endsection