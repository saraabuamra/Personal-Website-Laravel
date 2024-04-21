@extends('dashboard.layouts.layout')

@section('title','المقالات')


@section('style')
    
@endsection

@section('content')
        <div class="col-lg-12 grid-margin stretch-card" style="position:relative;top:10px">
          <div class="card">
            <div class="card-body">
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <a style="background-color: #007DFE;border-color: #007DFE; float: right; width:150px" class="btn btn-primary" href="{{url('admin/add-edit-artical')}}">إضافة مقالة</a>
              <br/>
              <br/>
              <div class="table-responsive-md">
                <table id="articals" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>رقم المتسلسل</th>
                      <th>اسم المقالة</th>
                      <th>نص المقالة</th>
                      <th>الإعدادات</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($articals as $artical )
                    <tr>
                      <td>
                        {{$artical['id']}}
                      </td>
                      <td>
                        {{$artical['name']}}
                      </td>
                      <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">
                        {{$artical['content']}}
                      </td>
                      <td>
                       <a href="{{url('admin/add-edit-artical/'.$artical['id'])}}">
                        <i style="font-size: 25px ;color:#007DFE;"
                        class="nav-icon fas fa-edit"></i> </a>
                            <a href="javascript:void(0)" module="artical" categ="المقالة" class="confirmDelete" moduleid="{{$artical['id']}}">
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