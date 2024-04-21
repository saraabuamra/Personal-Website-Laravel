@extends('dashboard.layouts.layout')

@section('title',' إضافة - تعديل شهادة')


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
                        <form class="forms-sample" @if (empty($certificate['id'])) action="{{ url('admin/add-edit-certificate') }}"
                            @else action="{{ url('admin/add-edit-certificate/'.$certificate['id']) }}" @endif  method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">اسم الشهادة</label>
                                <input type="text" class="form-control" id="name"
                                     name="name" placeholder="اكتب اسم الشهادة" @if (!empty($certificate['name']))
                                     value="{{ $certificate['name'] }}" @else value="{{old('name')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="theside">الجهة المسؤولة</label>
                                <input type="text" class="form-control" id="theside"
                                     name="theside" placeholder="اكتب اسم الجهة المسؤولة" @if (!empty($certificate['theside']))
                                     value="{{ $certificate['theside'] }}" @else value="{{old('theside')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="certificate_date">تاريخ الشهادة</label>
                                    <div class="input-group date"  id="datepicker">
                                        <input type="text" placeholder="أدخل تاريخ الشهادة" class="form-control" id="certificate_date"
                                        name="certificate_date"  @if (!empty($certificate['certificate_date']))
                                        value="{{ $certificate['certificate_date'] }}" @else value="{{old('certificate_date')}}"
                                       @endif>
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                            </div>

                          
                            <button style="background-color: #007DFE; border-color: #007DFE;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                            <a href="{{route('certificate.certificates')}}"  style="background-color: #dadee2; border-color: #dadee2;" type="reset" class="btn btn-light">إغلاق</a>
                        </form>
                    </div>
        </div> 

@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection