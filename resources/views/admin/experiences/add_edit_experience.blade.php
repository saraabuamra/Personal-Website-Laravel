@extends('dashboard.layouts.layout')

@section('title',' إضافة - تعديل الخبرة')


@section('style')
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
                        <form class="forms-sample" @if (empty($experience['id'])) action="{{ url('admin/add-edit-experience') }}"
                            @else action="{{ url('admin/add-edit-experience/'.$experience['id']) }}" @endif  method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">اسم الخبرة</label>
                                <input type="text" class="form-control" id="name"
                                     name="name" placeholder="اكتب اسم الخبرة" @if (!empty($experience['name']))
                                     value="{{ $experience['name'] }}" @else value="{{old('name')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="theside">الجهة المسؤولة</label>
                                <input type="text" class="form-control" id="theside"
                                     name="theside" placeholder="اكتب الجهة المسؤولة" @if (!empty($experience['theside']))
                                     value="{{ $experience['theside'] }}" @else value="{{old('theside')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="from_date">تاريخ بدء الحصول على الخبرة</label>
                                    <div class="input-group date"  id="from_date">
                                        <input type="text" placeholder="أدخل تاريخ بدء الخبرة" class="form-control" id="from_date"
                                        name="from_date"  @if (!empty($experience['from_date']))
                                        value="{{ $experience['from_date'] }}" @else value="{{old('from_date')}}"
                                       @endif>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="to_date">تاريخ الانتهاء من الحصول على الخبرة</label>
                                    <div class="input-group date"  id="to_date">
                                        <input type="text" placeholder="أدخل تاريخ انتهاء الحصول على الخبرة" class="form-control" id="to_date"
                                        name="to_date"  @if (!empty($experience['to_date']))
                                        value="{{ $experience['to_date'] }}" @else value="{{old('to_date')}}"
                                       @endif>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="">الملاحظات</label>
                                <textarea name="notes" placeholder="اكتب ملاحظات"  class="form-control"  rows="8">{{$experience['notes']}}</textarea>
                            </div>
                         
                          
                            <button style="background-color: #007DFE; border-color: #007DFE;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                            <a href="{{route('experience.experiences')}}" style="background-color: #dadee2; border-color: #dadee2;" type="reset" class="btn btn-light">إغلاق</a>
                        </form>
                    </div>
        </div> 

@endsection
@section('script')
@endsection