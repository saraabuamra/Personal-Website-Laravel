@extends('dashboard.layouts.layout')

@section('title',' إضافة - تعديل تصنيف صورة')


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
                        <form class="forms-sample" @if (empty($categoryimage['id'])) action="{{ url('admin/add-edit-categoryimage') }}"
                            @else action="{{ url('admin/add-edit-categoryimage/'.$categoryimage['id']) }}" @endif  method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان تصنيف الصورة</label>
                                <input type="text" class="form-control" id="title"
                                     name="title" placeholder="اكتب عنوان تصنيف الصورة" @if (!empty($categoryimage['title']))
                                     value="{{ $categoryimage['title'] }}" @else value="{{old('title')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label  for="image">ملف الصورة</label>
                                <input type="file" class="form-control"  id="image" hidden
                                 name="image">
                                 @if (!empty($categoryimage['image']))
                                 <br>
                                     <img  src="{{url('admin/images/category_images/'.$categoryimage['image'])}}" width="430px" height="200px"/>
                                 @endif
                            </div>
                            <div class="input-group mb-3" >
                                <span style="cursor: pointer" class="input-group-text" id="text_input_span_id">قم بإضافة ملف الصورة</span>
                                <input type="text" id='text_input_id'  class="form-control"  placeholder="ملف الصورة" >
                              </div>
                          
                            <button style="background-color: #007DFE; border-color: #007DFE;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                            <a href="{{route('categoryimage.categoryimages')}}"  style="background-color: #dadee2; border-color: #dadee2;" type="reset" class="btn btn-light">إغلاق</a>
                        </form>
                    </div>
        </div> 

@endsection
@section('script')
@endsection