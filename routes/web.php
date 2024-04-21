<?php

use App\Http\Controllers\Admin\ArticalController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryImageController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ChannelController;
use App\Http\Controllers\Admin\ConsultationController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DesignController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\PoemController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\QualificationController;
use App\Http\Controllers\Admin\RegisterCouresontroller;
use App\Http\Controllers\Admin\RegisterCourseController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\ProfileController;
use App\Models\CategoryImageModel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard',[RegisteredUserController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->group(function () {
    // profiles
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // poems
    Route::get('/poems', [PoemController::class, 'poems'])->name('poem.poems');

    //delete poems
    Route::get('delete-poem/{id}',[PoemController::class, 'deletePoem'])->name('poem.deletepoem');

    //add-edit-poem
    Route::match(['get', 'post'],'add-edit-poem/{id?}',[PoemController::class, 'addEditPoem']);


    // articals
    Route::get('/articals', [ArticalController::class, 'articals'])->name('artical.articals');

    //delete artical
    Route::get('delete-artical/{id}',[ArticalController::class, 'deleteArtical'])->name('artical.deleteartical');
  
    //add-edit-artical
    Route::match(['get', 'post'],'add-edit-artical/{id?}',[ArticalController::class, 'addEditArtical']);

     // channels
     Route::get('/channels', [ChannelController::class, 'channels'])->name('channel.channels');

     //delete channel
     Route::get('delete-channel/{id}',[ChannelController::class, 'deleteChannel'])->name('channel.deletechannel');
   
     //add-edit-channel
     Route::match(['get', 'post'],'add-edit-channel/{id?}',[ChannelController::class, 'addEditChannel']);

    // categories
    Route::get('/categories', [CategoryController::class, 'categories'])->name('category.categories');

    //delete category
    Route::get('delete-category/{id}',[CategoryController::class, 'deleteCategory'])->name('category.deletecategory');
       
    //add-edit-category
    Route::match(['get', 'post'],'add-edit-category/{id?}',[CategoryController::class, 'addEditCategory']);

     // programs
     Route::get('/programs', [ProgramController::class, 'programs'])->name('program.programs');

     //delete program
     Route::get('delete-program/{id}',[ProgramController::class, 'deleteProgram'])->name('category.deleteprogram');
        
     //add-edit-program
     Route::match(['get', 'post'],'add-edit-program/{id?}',[ProgramController::class, 'addEditProgram']);

    // courses
    Route::get('/courses', [CourseController::class, 'courses'])->name('course.courses');

    //delete course
    Route::get('delete-course/{id}',[CourseController::class, 'deleteCourse'])->name('course.deletecourse');
         
    //add-edit-course
    Route::match(['get', 'post'],'add-edit-course/{id?}',[CourseController::class, 'addEditCourse']);

    //Update course Status
    Route::post('update-course-status',[CourseController::class, 'updateCourseStatus']);

    // certificates
    Route::get('/certificates', [CertificateController::class, 'certificates'])->name('certificate.certificates');

    //delete certificate
    Route::get('delete-certificate/{id}',[CertificateController::class, 'deleteCertificate'])->name('certificate.deletecertificate');
           
    //add-edit-certificate
    Route::match(['get', 'post'],'add-edit-certificate/{id?}',[CertificateController::class, 'addEditCertificate']);

    //qualifications
    Route::get('/qualifications', [QualificationController::class, 'qualifications'])->name('qualification.qualifications');

    //delete qualification
    Route::get('delete-qualification/{id}',[QualificationController::class, 'deleteQualification'])->name('qualification.deletequalification');
         
    //add-edit-qualification
    Route::match(['get', 'post'],'add-edit-qualification/{id?}',[QualificationController::class, 'addEditQualification']);

    //experiences
    Route::get('/experiences', [ExperienceController::class, 'experiences'])->name('experience.experiences');

    //delete experience
    Route::get('delete-experience/{id}',[ExperienceController::class, 'deleteExperience'])->name('experience.deleteexperience');
            
    //add-edit-experience
    Route::match(['get', 'post'],'add-edit-experience/{id?}',[ExperienceController::class, 'addEditExperience']);

    //designs
    Route::get('/designs', [DesignController::class, 'designs'])->name('design.designs');

    //delete design
    Route::get('delete-design/{id}',[DesignController::class, 'deleteDesign'])->name('design.deletedesign');
             
    //add-edit-design
    Route::match(['get', 'post'],'add-edit-design/{id?}',[DesignController::class, 'addEditDesign']);

    //images
    Route::get('/uplodeImages', [ImageController::class, 'images'])->name('image.images');

    //delete image
    Route::get('delete-image/{id}',[ImageController::class, 'deleteImage'])->name('image.deleteimage');
            
    //add-edit-image
    Route::match(['get', 'post'],'add-edit-image/{id?}',[ImageController::class, 'addEditImage']);


    //categoryimages
    Route::get('/uplodeCategoryimages', [CategoryImageController::class, 'categoryimages'])->name('categoryimage.categoryimages');

    //delete categoryimage
    Route::get('delete-categoryimage/{id}',[CategoryImageController::class, 'deleteCategoryimage'])->name('categoryimage.deletecategoryimage');
               
    //add-edit-categoryimage
    Route::match(['get', 'post'],'add-edit-categoryimage/{id?}',[CategoryImageController::class, 'addEditCategoryimage']);

    //files
    Route::get('/uplodeFiles', [FileController::class, 'files'])->name('file.files');

    //delete file
    Route::get('delete-file/{id}',[FileController::class, 'deleteFile'])->name('file.deletefile');
              
    //add-edit-file
    Route::match(['get', 'post'],'add-edit-file/{id?}',[FileController::class, 'addEditFile']);

    //Update file Status
    Route::post('update-file-status',[FileController::class, 'updateFileStatus']);

     //consultations
     Route::get('/consultations', [ConsultationController::class, 'consultations'])->name('consultation.consultations');

    //delete consultation
    Route::get('delete-consultation/{id}',[ConsultationController::class, 'deleteConsultation'])->name('consultation.deleteconsultation');

    //Update consultation Status
    Route::post('update-consultation-status',[ConsultationController::class, 'updateConsultationStatus']);

    //registercourses
    Route::get('/registercourses', [RegisterCourseController::class, 'registercourses'])->name('registercourse.registercourses');

    //delete registercourse
    Route::get('delete-registercourse/{id}',[RegisterCourseController::class, 'deleteRegistercourse'])->name('registercourse.deleteregistercourse');
});


require __DIR__.'/auth.php';


Route::middleware('web')->group(function () {
    Route::get('/',[FrontController::class, 'index'])->name('index');
    Route::get('/cv',[FrontController::class, 'cv'])->name('cv');
    Route::get('/cv/artical',[FrontController::class, 'cvArtical'])->name('cv.articals');
    Route::get('/cv/poems',[FrontController::class, 'cvPoem'])->name('cv.poems');
    Route::get('/cv/poemdetails/{id?}',[FrontController::class, 'cvPoemDetails'])->name('cv.poemdetails');
    Route::get('/cv/qualification',[FrontController::class, 'cvQualification'])->name('cv.qualifications');
    Route::get('/cv/experience',[FrontController::class, 'cvExperience'])->name('cv.experiences');
    Route::get('/cv/channel',[FrontController::class, 'cvChannel'])->name('cv.channels');
    Route::get('/cv/image',[FrontController::class, 'cvImage'])->name('cv.images');
    Route::get('/cv/design',[FrontController::class, 'cvDesign'])->name('cv.designs');
    Route::get('/cv/file',[FrontController::class, 'cvFile'])->name('cv.files');
    Route::get('/contact',[FrontController::class, 'contact'])->name('contact');
    Route::get('/registercourse/{id}',[FrontController::class, 'registercourses'])->name('registercourse');
    Route::get('/categoryimage',[FrontController::class, 'categoryimage'])->name('categoryimage');
    Route::get('/imagedetails/{id?}',[FrontController::class, 'imagedetails'])->name('imagedetails');
    Route::post('/contact',[FrontController::class, 'saveContact'])->name('save.contact');
    Route::post('/registercourse',[FrontController::class, 'registerCourse'])->name('register.course');
    Route::post('/consultation',[FrontController::class, 'saveConsultation'])->name('save.consultation');
});