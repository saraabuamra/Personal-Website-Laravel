<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('front/assets/img/logo.svg')}}" rel="icon">
  <link href="{{asset('front/assets/img/logo.svg')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('front/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('front/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('front/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('front/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('front/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('front/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">



  <!-- Template Main CSS File -->
  <link href="{{asset('front/assets/css/style.css')}}" rel="stylesheet">


  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  @yield('style')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('front.layouts.navbar')

  @yield('content')

   <!-- ======= Contact Section ======= -->
   <section id="consultation" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>إستشارة مجانية</h2>
      </div>

      <div class="card">
        <div class="card-header">

        <div class="col-lg-12">
          <x-auth-session-status class="mb-4" :status="session('status')" />
          <x-auth-session-error class="mb-4" :error="session('error')" />
         <form id="consultationForm" class="forms-sample" action="{{route('save.consultation')}}" method="post" >
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
             <button style="background-color: #37517e; border-color: #37517e;" type="submit" onclick="submitForm()"class="btn btn-primary mr-2">حفظ</button>
         </form>
        </div>
        </div>
      </div>

    </div>
  </section><!-- End Contact Section -->

  @include('front.layouts.footer')

  {{-- <div id="preloader"></div> --}}
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('front/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('front/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('front/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('front/assets/vendor/php-email-form/validate.js')}}"></script>
  

  <!-- Template Main JS File -->
  <script src="{{asset('front/assets/js/main.js')}}"></script>

@yield('script')
</body>

</html>