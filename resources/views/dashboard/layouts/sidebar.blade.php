<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link" >
        <img src="{{ asset('admin/dist/img/logo.svg') }}" alt="blog Logo"
            class="brand-image img-circle elevation-3" style="opacity: .9">
        <span class="brand-text font-weight" style="font-size: 20px;">مدونتي الشخصية</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a @if (Session::get('page') == 'dashboard') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            الرئيسية
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview menu-close" style="margin-top: 5px">
                    <a @if (Session::get('page') == 'update_user' || Session::get('page') == 'update_password') style="background-color:#007BFF !important; 
                    color:white !important;" @endif  href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            نبذة
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a @if (Session::get('page') == 'update_user') style="background-color:#007BFF !important; 
                            color:white !important;" @endif href="{{route('profile.edit')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>السيرة الذاتية</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a @if (Session::get('page') == 'update_password') style="background-color:#007BFF !important; 
                            color:white !important;" @endif href="{{route('password.edit')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>تغيير كلمة المرور</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a @if (Session::get('page') == 'poems') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('poem.poems')}}" class="nav-link">
                        <i class="nav-icon fab fa-adversal"></i>
                        <p>
                            القصائد
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a @if (Session::get('page') == 'articals') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('artical.articals')}}" class="nav-link">
                        <i class="nav-icon fas fa-align-right"></i>
                        <p>
                            المقالات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a @if (Session::get('page') == 'channels') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('channel.channels')}}" class="nav-link">
                      <i class="nav-iconfab fab fa-youtube"></i>
                        <p>
                            فيديوهات اليوتيوب
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a @if (Session::get('page') == 'categories') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('category.categories')}}" class="nav-link">
                      <i class="nav-icon fas fa-clone"></i>
                        <p>
                             الفئات
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a @if (Session::get('page') == 'programs') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('program.programs')}}" class="nav-link">
                      <i class="nav-icon fas fa-bookmark"></i>
                        <p>
                             البرامج التدريبية
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a @if (Session::get('page') == 'courses') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('course.courses')}}" class="nav-link">
                      <i class="nav-icon fas fa-tv"></i>
                        <p>
                             الدورات  
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a @if (Session::get('page') == 'certificates') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('certificate.certificates')}}" class="nav-link">
                      <i class="nav-icon fa fa-graduation-cap"></i>
                        <p>
                             الشهادات  
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a @if (Session::get('page') == 'qualifications') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('qualification.qualifications')}}" class="nav-link">
                      <i class="nav-icon fas fa-award"></i>
                        <p>
                             المؤهلات العلمية  
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a @if (Session::get('page') == 'experiences') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('experience.experiences')}}" class="nav-link">
                      <i class="nav-icon fas fa-border-all"></i>
                        <p>
                              الخبرات  
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a @if (Session::get('page') == 'designs') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('design.designs')}}" class="nav-link">
                      <i class="nav-icon fa fa-heart"></i>
                        <p>
                              معرض التصاميم  
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview menu-close" style="margin-top: 5px">
                    <a @if (Session::get('page') == 'images' || Session::get('page') == 'categoryimages') style="background-color:#007BFF !important; 
                    color:white !important;" @endif  href="#" class="nav-link">
                      <i class="nav-icon fas fa-camera-retro"></i>
                      <p>
                            الصور
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a @if (Session::get('page') == 'images') style="background-color:#007BFF !important; 
                            color:white !important;" @endif href="{{route('image.images')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ألبوم الصور</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a @if (Session::get('page') == 'categoryimages') style="background-color:#007BFF !important; 
                            color:white !important;" @endif href="{{route('categoryimage.categoryimages')}}" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>تصنيف الصور</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a @if (Session::get('page') == 'files') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('file.files')}}" class="nav-link">
                      <i class="nav-icon fas fa-cloud-upload-alt"></i>
                        <p>
                            الملفات  
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a @if (Session::get('page') == 'consultations') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('consultation.consultations')}}" class="nav-link">
                      <i class="nav-icon fa fa-envelope"></i>
                        <p>
                            الاستشارات  
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a @if (Session::get('page') == 'registercourses') style="background-color:#007BFF !important; 
                    color:white !important;" @endif href="{{route('registercourse.registercourses')}}" class="nav-link">
                      <i class="nav-icon fas fa-bell"></i>
                        <p>
                            المسجلين في الدورات  
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>