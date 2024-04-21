@extends('dashboard.layouts.layout')

@section('title',' إضافة - تعديل مقالة')


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
                        <form class="forms-sample" @if (empty($artical['id'])) action="{{ url('admin/add-edit-artical') }}"
                            @else action="{{ url('admin/add-edit-artical/'.$artical['id']) }}" @endif  method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">اسم المقالة</label>
                                <input type="text" class="form-control" id="name"
                                     name="name" placeholder="اكتب اسم المقالة" @if (!empty($artical['name']))
                                     value="{{ $artical['name'] }}" @else value="{{old('name')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="content">نص المقالة</label>
                                <textarea name="content" id="summernoteArtical" placeholder="اكتب نص المقالة"  class="form-control"  rows="8">{{$artical['content']}}</textarea>
                            </div>
                          
                            <button style="background-color: #007DFE; border-color: #007DFE;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                            <a href="{{route('artical.articals')}}" style="background-color: #dadee2; border-color: #dadee2;" type="reset" class="btn btn-light">إغلاق</a>
                        </form>
                    </div>
        </div> 

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection