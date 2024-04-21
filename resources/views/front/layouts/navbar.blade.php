<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 style="position: relative;left:100px" class="logo me-auto"><a href="index.html">محمد العتيبي</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav style="position: relative;left:50px" id="navbar" class="navbar">
        <ul>
          <li><a @if (Session::get('page') == 'index') class="nav-link scrollto active" @endif  href="{{route('index')}}">الرئيسية</a></li>
          <li><a @if (Session::get('page') == 'cv'|| Session::get('page') == 'cv_poem' 
            || Session::get('page') == 'cv_channel' || Session::get('page') == 'cv_qualification'
            || Session::get('page') == 'cv_experience' || Session::get('page') == 'cv_image' 
            || Session::get('page') == 'cv_design' || Session::get('page') == 'cv_file'
            || Session::get('page') == 'cv_artical') class="nav-link scrollto active" @endif  href="{{route('cv')}}">محمد العتيبي</a></li>
           <li><a class="nav-link scrollto" href="#program">البرامج التدريبية</a></li>
           <li><a class="nav-link scrollto" href="#course">الدورات التدريبية</a></li>
           {{-- <li><a class="nav-link scrollto" href="#poems">قصائدي</a></li> --}}
           <li><a class="nav-link scrollto" href="{{route('categoryimage')}}">ألبوم الصور</a></li>
          <li><a class="nav-link scrollto" href="{{route('contact')}}">تواصل معنا</a></li>
          <li><a class="getstarted scrollto" href="#consultation">إستشارة مجانية</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->   