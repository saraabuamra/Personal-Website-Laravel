@extends('dashboard.layouts.layout')

@section('title',' إضافة - تعديل برنامج')


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
                        <form class="forms-sample" @if (empty($program['id'])) action="{{ url('admin/add-edit-program') }}"
                            @else action="{{ url('admin/add-edit-program/'.$program['id']) }}" @endif  method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">اسم البرنامج التدريبي</label>
                                <input type="text" class="form-control" id="name"
                                     name="name" placeholder="اكتب اسم البرنامج" @if (!empty($program['name']))
                                     value="{{ $program['name'] }}" @else value="{{old('name')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="category_id">اختر فئة</label>
                                 <select  name="category_id" id="category_id" class="form-select form-select-lg mb-3">
                                     <option  value="">اختر</option>
                                     @foreach ($categories as $category)
                                 <option @if (!empty($program['category_id']==$category['id']))
                                 selected  @endif value="{{$category['id']}}">{{$category['category_name']}}</option>
                                     @endforeach
                                 </select>
                            </div>
                            <div class="form-group">
                                <label for="hours">عدد ساعات البرنامج التدريبي</label>
                                <input type="text" class="form-control" id="hours"
                                     name="hours" placeholder="اكتب عدد ساعات البرنامج" @if (!empty($program['hours']))
                                     value="{{ $program['hours'] }}" @else value="{{old('hours')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="goal">الهدف من البرنامج التدريبي</label>
                                <input type="text" class="form-control" id="goal"
                                     name="goal" placeholder="اكتب الهدف من البرنامج" @if (!empty($program['goal']))
                                     value="{{ $program['goal'] }}" @else value="{{old('goal')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label  for="image">صورة البرنامج التدريبي</label>
                                <input type="file" class="form-control"  id="image" hidden
                                 name="image">
                                 @if (!empty($program['image']))
                                 <br>
                                     <img  src="{{url('admin/images/program_images/'.$program['image'])}}" width="430px" height="200px"/>
                                 @endif
                            </div>
                            <div class="input-group mb-3" >
                                <span style="cursor: pointer" class="input-group-text" id="text_input_span_id">قم بإضافة صورة</span>
                                <input type="text" id='text_input_id'  class="form-control"  placeholder="صورة القصيدة" >
                              </div>
                          
                            <button style="background-color: #007DFE; border-color: #007DFE;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                            <a href="{{route('program.programs')}}"  style="background-color: #dadee2; border-color: #dadee2;" type="reset" class="btn btn-light">إغلاق</a>
                        </form>
                    </div>
        </div> 

@endsection
@section('script')
@endsection