@extends('dashboard.layouts.layout')

@section('title',' إضافة - تعديل ملف')


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
                        <form class="forms-sample" @if (empty($file['id'])) action="{{ url('admin/add-edit-file') }}"
                            @else action="{{ url('admin/add-edit-file/'.$file['id']) }}" @endif  method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">اسم الملف</label>
                                <input type="text" class="form-control" id="name"
                                     name="name" placeholder="اكتب عنوان التصميم" @if (!empty($file['name']))
                                     value="{{ $file['name'] }}" @else value="{{old('name')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label  for="file_url">رابط الملف</label>
                                <input type="file" class="form-control"  id="file_url" hidden
                                 name="file_url">
                                 @if (!empty($file['file_url'])) ({{ $file['name'] }})
                                 @endif
                            </div>
                            <div class="input-group mb-3" >
                                <span style="cursor: pointer" class="input-group-text" id="text_input_span_id">قم بإضافة رابط الملف</span>
                                <input type="text" id='text_input_id'  class="form-control"  placeholder="رابط الملف" >
                              </div>
                          
                            <button style="background-color: #007DFE; border-color: #007DFE;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                            <a href="{{route('file.files')}}"  style="background-color: #dadee2; border-color: #dadee2;" type="reset" class="btn btn-light">إغلاق</a>
                        </form>
                    </div>
        </div> 

@endsection
@section('script')
@endsection