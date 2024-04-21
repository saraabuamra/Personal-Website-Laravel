@extends('dashboard.layouts.layout')

@section('title',' إضافة - تعديل الدورة')


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
                        <form class="forms-sample" @if (empty($course['id'])) action="{{ url('admin/add-edit-course') }}"
                            @else action="{{ url('admin/add-edit-course/'.$course['id']) }}" @endif  method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">اسم الدورة</label>
                                <input type="text" class="form-control" id="name"
                                     name="name" placeholder="اكتب اسم الدورة" @if (!empty($course['name']))
                                     value="{{ $course['name'] }}" @else value="{{old('name')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="start_date">تاريخ بدء الدورة</label>
                                    <div class="input-group date"  id="startdatepicker">
                                        <input type="text" placeholder="أدخل تاريخ بدء الدورة" class="form-control" id="start_date"
                                        name="start_date"  @if (!empty($course['start_date']))
                                        value="{{ $course['start_date'] }}" @else value="{{old('start_date')}}"
                                       @endif>
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="end_date">تاريخ انتهاء الدورة</label>
                                    <div class="input-group date"  id="enddatepicker">
                                        <input type="text" placeholder="أدخل تاريخ انتهاء الدورة" class="form-control" id="end_date"
                                        name="end_date"  @if (!empty($course['end_date']))
                                        value="{{ $course['end_date'] }}" @else value="{{old('end_date')}}"
                                       @endif>
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-white d-block">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="days">عدد أيام الدورة</label>
                                <input type="text" class="form-control" id="days"
                                     name="days" placeholder="اكتب عدد أيام الدورة" @if (!empty($course['days']))
                                     value="{{ $course['days'] }}" @else value="{{old('days')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="program_id">اختر البرنامج التدريبي</label>
                                 <select  name="program_id" id="program_id" class="form-select form-select-lg mb-3">
                                     <option  value="">اختر</option>
                                     @foreach ($programs as $program)
                                 <option @if (!empty($course['program_id']==$program['id']))
                                 selected  @endif value="{{$program['id']}}">{{$program['name']}}</option>
                                     @endforeach
                                 </select>
                            </div>
                            <div class="form-group">
                                <label for="">الملاحظات</label>
                                <textarea name="notes" placeholder="اكتب ملاحظات"  class="form-control"  rows="8">{{$course['notes']}}</textarea>
                            </div>
                            <button style="background-color: #007DFE; border-color: #007DFE;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                            <a href="{{route('channel.channels')}}" style="background-color: #dadee2; border-color: #dadee2;" type="reset" class="btn btn-light">إغلاق</a>
                        </form>
                    </div>
        </div> 

@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
@endsection