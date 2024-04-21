@extends('dashboard.layouts.layout')

@section('title',' إضافة - تعديل فئة')


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

                        <form class="forms-sample" @if (empty($category['id'])) action="{{ url('admin/add-edit-category') }}"
                            @else action="{{ url('admin/add-edit-category/'.$category['id']) }}" @endif  method="post">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">اسم الفئة</label>
                                <input type="text" class="form-control" id="category_name"
                                     name="category_name" placeholder="اكتب اسم الفئة" @if (!empty($category['category_name']))
                                     value="{{ $category['category_name'] }}" @else value="{{old('category_name')}}"
                                    @endif required>
                            </div>
                          
                            <button style="background-color: #007DFE; border-color: #007DFE;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                            <a href="{{route('category.categories')}}"  style="background-color: #dadee2; border-color: #dadee2;" type="reset" class="btn btn-light">إغلاق</a>
                        </form>
                    </div>
        </div> 

@endsection
@section('script')
@endsection