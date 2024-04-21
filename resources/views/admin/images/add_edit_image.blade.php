@extends('dashboard.layouts.layout')

@section('title',' إضافة - تعديل صورة')


@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
            <div class="col-lg-10 grid-margin stretch-card" style="position:relative;top:10px">
                <div class="card">
                    <div class="card-body">
                        <h4 style="float: right;font-weight:bold;font-size:20px;color:#007DFE" class="card-title">{{$title}}</h4>
                        <br/>
                        <br/>
                        <x-auth-session-error class="mb-4" :error="session('error')" />
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form class="forms-sample" @if (empty($image['id'])) action="{{ url('admin/add-edit-image') }}"
                            @else action="{{ url('admin/add-edit-image/'.$image['id']) }}" @endif  method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="category_image_id">اختر تصنيف الصورة</label>
                                 <select  name="category_image_id" id="category_image_id" class="form-select form-select-lg mb-3">
                                     <option  value="">اختر</option>
                                     @foreach ($categoryimages as $categoryimage)
                                 <option @if (!empty($image['category_image_id']==$categoryimage['id']))
                                 selected  @endif value="{{$categoryimage['id']}}">{{$categoryimage['title']}}</option>
                                     @endforeach
                                 </select>
                            </div>
                            <div class="form-group">
                                <label for="title">عنوان الصورة</label>
                                <input type="text" class="form-control" id="title"
                                     name="title" placeholder="اكتب عنوان الصورة" @if (!empty($image['title']))
                                     value="{{ $image['title'] }}" @else value="{{old('title')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="image_date">تاريخ الصورة</label>
                                    <div class="input-group date"  id="imagedatepicker">
                                        <input type="text" placeholder="أدخل تاريخ الصورة" class="form-control" id="image_date"
                                        name="image_date"  @if (!empty($image['image_date']))
                                        value="{{ $image['image_date'] }}" @else value="{{old('image_date')}}"
                                       @endif>
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="place">مكان التقاط الصورة</label>
                                <input type="text" class="form-control" id="place"
                                     name="place" placeholder="اكتب مكان التقاط الصورة" @if (!empty($image['place']))
                                     value="{{ $image['place'] }}" @else value="{{old('place')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label  for="image">ملف الصورة</label>
                                <input type="file" class="form-control"  id="image" hidden
                                 name="image">
                                 @if (!empty($image['image']))
                                 <br>
                                     <img  src="{{url('admin/images/gallary_images/'.$image['image'])}}" width="430px" height="200px"/>
                                 @endif
                            </div>
                            <div class="input-group mb-3" >
                                <span style="cursor: pointer" class="input-group-text" id="text_input_span_id">قم بإضافة ملف الصورة</span>
                                <input type="text" id='text_input_id'  class="form-control"  placeholder="ملف الصورة" >
                              </div>
                          
                            <button style="background-color: #007DFE; border-color: #007DFE;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                            <a href="{{route('image.images')}}"  style="background-color: #dadee2; border-color: #dadee2;" type="reset" class="btn btn-light">إغلاق</a>
                        </form>
                    </div>
        </div> 

@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection