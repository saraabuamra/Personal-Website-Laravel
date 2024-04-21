@extends('dashboard.layouts.layout')

@section('title','قنوات اليوتيوب')


@section('style')
    
@endsection

@section('content')
        <div class="col-lg-12 grid-margin stretch-card" style="position:relative;top:10px">
          <div class="card">
            <div class="card-body">
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <a style="background-color: #007DFE;border-color: #007DFE; float: right; width:170px" class="btn btn-primary" href="{{url('admin/add-edit-channel')}}">إضافة فيديو يوتيوب</a>
              <br/>
              <br/>
              <div class="table-responsive">
                <table id="channels" class="table table-bordered">
                  <thead style=" white-space: nowrap;">
                    <tr>
                      <th>رقم المتسلسل</th>
                      <th>عنوان فيديو اليوتيوب</th>
                      <th>رابط فيديو اليوتيوب</th>
                      <th>وصف</th>
                      <th>ملاحظات</th>
                      <th>الإعدادات</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($channels as $channel )
                    <tr>
                      <td>
                        {{$channel['id']}}
                      </td>
                      <td>
                        {{$channel['title']}}
                      </td>
                      <td>
                        {{$channel['url']}}
                      </td>
                      <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">
                        {{$channel['description']}}
                      </td>
                      <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">
                        {{$channel['notes']}}
                      </td>
                      <td>
                       <a href="{{url('admin/add-edit-channel/'.$channel['id'])}}">
                        <i style="font-size: 25px ;color:#007DFE;"
                        class="nav-icon fas fa-edit"></i> </a>
                            <a href="javascript:void(0)" module="channel" categ="قناة اليوتيوب" class="confirmDelete" moduleid="{{$channel['id']}}">
                                <i style="font-size: 25px ;color:#007DFE;"
                                class="nav-icon fas fa-trash"></i> </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
       
@endsection

@section('script')
    
@endsection