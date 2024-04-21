@extends('dashboard.layouts.layout')

@section('title','الملفات')


@section('style')
    
@endsection

@section('content')
        <div class="col-lg-12 grid-margin stretch-card" style="position:relative;top:10px">
          <div class="card">
            <div class="card-body">
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <a style="background-color: #007DFE;border-color: #007DFE; float: right; width:150px" class="btn btn-primary" href="{{url('admin/add-edit-file')}}">إضافة ملف</a>
              <br/>
              <br/>
              <div class="table-responsive-md">
                <table id="files" class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>
                         رقم المتسلسل
                      </th>
                      <th>
                        اسم الملف
                      </th>
                      <th>
                         رابط الملف
                      </th>
                      <th>
                        الحالة 
                      </th>
                      <th>
                        تعديل الحالة 
                      </th>
                      <th>
                        الإعدادات
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($files as $file )
                    <tr>
                      <td>
                        {{$file['id']}}
                      </td>
                      <td>
                        {{$file['name']}}
                      </td>
                      <td>
                        {{$file['file_url']}}
                      </td>
                      <td>
                        @if ($file['status']==1)
                        <a class="updateFileStatus" id="state-{{$file['id']}}" file_id="{{$file['id']}}">
                          <span status="Active">منشورة</span>
                        </a>
                        @else
                        <a class="updateFileStatus" id="state-{{$file['id']}}"  file_id="{{$file['id']}}">
                          <span status="Inactive">غير منشورة</span>
                        </a>
                          @endif
                      </td>
                      <td>
                        @if ($file['status']==1)
                        <a class="updateFileStatus" id="file-{{$file['id']}}" file_id="{{$file['id']}}"
                        href="javascript:void(0)"> 
                       <i style="font-size: 25px; color:#007DFE;" class="nav-icon fas fa-lock-open" status="Active"></i> 
                       </a>
                       @else
                       <a class="updateFileStatus" id="file-{{$file['id']}}" file_id="{{$file['id']}}"
                       href="javascript:void(0)"> 
                      <i style="font-size: 25px;color:#007DFE;" class="nav-icon fas fa-lock" status="Inactive"></i></a>
                      @endif
                      </td>
                      <td>
                       <a href="{{url('admin/add-edit-file/'.$file['id'])}}">
                        <i style="font-size: 25px ;color:#007DFE;"
                        class="nav-icon fas fa-edit"></i> </a>
                            <a href="javascript:void(0)" module="file" categ="الملف" class="confirmDelete" moduleid="{{$file['id']}}">
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