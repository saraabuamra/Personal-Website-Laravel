@extends('dashboard.layouts.layout')

@section('title',' إضافة - تعديل تصميم')


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
                        <form class="forms-sample" @if (empty($design['id'])) action="{{ url('admin/add-edit-design') }}"
                            @else action="{{ url('admin/add-edit-design/'.$design['id']) }}" @endif  method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان التصميم</label>
                                <input type="text" class="form-control" id="title"
                                     name="title" placeholder="اكتب عنوان التصميم" @if (!empty($design['title']))
                                     value="{{ $design['title'] }}" @else value="{{old('title')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="design_date">تاريخ التصميم</label>
                                    <div class="input-group date"  id="designdatepicker">
                                        <input type="text" placeholder="أدخل تاريخ التصميم" class="form-control" id="design_date"
                                        name="design_date"  @if (!empty($design['design_date']))
                                        value="{{ $design['design_date'] }}" @else value="{{old('design_date')}}"
                                       @endif>
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="theside">الجهة المسؤولة عن التصميم</label>
                                <input type="text" class="form-control" id="theside"
                                     name="theside" placeholder="اكتب الجهة المسؤولة عن التصميم" @if (!empty($design['theside']))
                                     value="{{ $design['theside'] }}" @else value="{{old('theside')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label  for="image">صورة التصميم</label>
                                <input type="file" class="form-control"  id="image" hidden
                                 name="image">
                                 @if (!empty($design['image']))
                                 <br>
                                     <img  src="{{url('admin/images/design_images/'.$design['image'])}}" width="430px" height="200px"/>
                                 @endif
                            </div>
                            <div class="input-group mb-3" >
                                <span style="cursor: pointer" class="input-group-text" id="text_input_span_id">قم بإضافة صورة</span>
                                <input type="text" id='text_input_id'  class="form-control"  placeholder="صورة التصميم" >
                              </div>
                          
                            <button style="background-color: #007DFE; border-color: #007DFE;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                            <a href="{{route('design.designs')}}"  style="background-color: #dadee2; border-color: #dadee2;" type="reset" class="btn btn-light">إغلاق</a>
                        </form>
                    </div>
        </div> 

@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection