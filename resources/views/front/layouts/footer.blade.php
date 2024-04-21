  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3 style="font-size: 15px">معلومات الإتصال بمحمد العتيبي</h3>
            <p>
              <strong>رقم الجوال:</strong>@if(isset($admin['mobile'])) {{$admin['mobile']}} @endif<br>
              <strong>البريد الإلكتروني:</strong>@if(isset($admin['email'])) {{$admin['email']}} @endif <br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>الروابط</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('index')}}">الرئيسية</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('cv')}}">محمد العتيبي</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('index')}}#program">البرامج التدريبية</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('index')}}#course">الدورات التدريبية</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('categoryimage')}}">ألبوم الصور</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('contact')}}">تواصل معنا</a></li>

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>خدماتي</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('index')}}#program">البرامج التدريبية</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('index')}}#course">الدورات التدريبية</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('cv.poems')}}">قصائدي</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('cv.articals')}}">مقالاتي</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('cv.channels')}}">فيديوهاتي</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>مواقع التواصل الإجتماعي</h4>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; شكرا لك على زيارتك موقعي
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        @if(isset($admin['name'])) {{$admin['name']}} @endif
      </div>
    </div>
  </footer><!-- End Footer -->