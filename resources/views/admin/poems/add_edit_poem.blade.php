@extends('dashboard.layouts.layout')

@section('title',' إضافة - تعديل قصيدة')


@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                        <form class="forms-sample" @if (empty($poem['id'])) action="{{ url('admin/add-edit-poem') }}"
                            @else action="{{ url('admin/add-edit-poem/'.$poem['id']) }}" @endif  method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">اسم القصيدة</label>
                                <input type="text" class="form-control" id="name"
                                     name="name" placeholder="اكتب اسم القصيدة" @if (!empty($poem['name']))
                                     value="{{ $poem['name'] }}" @else value="{{old('name')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="content">نص القصيدة</label>
                                <textarea name="content" placeholder="اكتب نص القصيدة"  class="form-control" id="summernote" rows="8">{{$poem['content']}}</textarea>
                            </div>
                            <div class="form-group">
                                <label  for="image">صورة القصيدة</label>
                                <input type="file" class="form-control"  id="image" hidden
                                 name="image">
                                 @if (!empty($poem['image']))
                                 <br>
                                     <img  src="{{url('admin/images/poem_images/'.$poem['image'])}}" width="430px" height="200px"/>
                                 @endif
                            </div>
                            <div class="input-group mb-3" >
                                <span style="cursor: pointer" class="input-group-text" id="text_input_span_id">قم بإضافة صورة</span>
                                <input type="text" id='text_input_id'  class="form-control"  placeholder="صورة القصيدة" >
                              </div>
                          
                            <button style="background-color: #007DFE; border-color: #007DFE;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                            <a href="{{route('poem.poems')}}"  style="background-color: #dadee2; border-color: #dadee2;" type="reset" class="btn btn-light">إغلاق</a>
                        </form>
                    </div>
        </div> 

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection