@extends('dashboard.layouts.layout')

@section('title',' إضافة - تعديل قناة اليوتيوب')


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
                        <form class="forms-sample" @if (empty($channel['id'])) action="{{ url('admin/add-edit-channel') }}"
                            @else action="{{ url('admin/add-edit-channel/'.$channel['id']) }}" @endif  method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان فيديو اليوتيوب</label>
                                <input type="text" class="form-control" id="title"
                                     name="title" placeholder="اكتب اسم المقالة" @if (!empty($channel['title']))
                                     value="{{ $channel['title'] }}" @else value="{{old('title')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="title">رابط فيديو اليوتيوب</label>
                                <input type="text" class="form-control" id="url"
                                     name="url" placeholder="اكتب اسم المقالة" @if (!empty($channel['url']))
                                     value="{{ $channel['url'] }}" @else value="{{old('url')}}"
                                    @endif >
                            </div>
                            <div class="form-group">
                                <label for="">الوصف</label>
                                <textarea name="description" placeholder="اكتب  وصف"  class="form-control"  rows="8">{{$channel['description']}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">الملاحظات</label>
                                <textarea name="notes" placeholder="اكتب ملاحظات"  class="form-control"  rows="8">{{$channel['notes']}}</textarea>
                            </div>
                          
                            <button style="background-color: #007DFE; border-color: #007DFE;" type="submit" class="btn btn-primary mr-2">حفظ</button>
                            <a href="{{route('channel.channels')}}" style="background-color: #dadee2; border-color: #dadee2;" type="reset" class="btn btn-light">إغلاق</a>
                        </form>
                    </div>
        </div> 

@endsection
@section('script')
@endsection