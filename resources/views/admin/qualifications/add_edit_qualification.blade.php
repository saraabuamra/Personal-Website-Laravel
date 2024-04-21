@extends('dashboard.layouts.layout')

@section('title',' إضافة - تعديل مؤهل')


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
                        <form class="forms-sample" @if (empty($qualification['id'])) action="{{ url('admin/add-edit-qualification') }}"
                            @else action="{{ url('admin/add-edit-qualification/'.$qualification['id']) }}" @endif  method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">اسم المؤهل العلمي</label>
                                <input type="text" class="form-control" id="name"
                                     name="name" placeholder="اكتب اسم المؤهل العلمي" @if (!empty($qualification['name']))
                                     value="{{ $qualification['name'] }}" @else value="{{old('name')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="theside">الجهة المسؤولة</label>
                                <input type="text" class="form-control" id="theside"
                                     name="theside" placeholder="اكتب اسم الجهة المسؤولة" @if (!empty($qualification['theside']))
                                     value="{{ $qualification['theside'] }}" @else value="{{old('theside')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="qualification_date">تاريخ المؤهل العلمي</label>
                                    <div class="input-group date"  id="qualification_date">
                                        <input type="text" placeholder="أدخل تاريخ المؤهل العلمي" class="form-control" id="qualification_date"
                                        name="qualification_date"  @if (!empty($qualification['qualification_date']))
                                        value="{{ $qualification['qualification_date'] }}" @else value="{{old('qualification_date')}}"
                                       @endif>
                                    </div>
                            </div>

                          
                            <button style="background-color: #007DFE; border-color: #007DFE;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                            <a href="{{route('qualification.qualifications')}}"  style="background-color: #dadee2; border-color: #dadee2;" type="reset" class="btn btn-light">إغلاق</a>
                        </form>
                    </div>
        </div> 

@endsection
@section('script')
@endsection