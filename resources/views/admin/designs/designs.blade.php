@extends('dashboard.layouts.layout')

@section('title','معرض التصاميم')


@section('style')
    
@endsection

@section('content')
        <div class="col-lg-12 grid-margin stretch-card" style="position:relative;top:10px">
          <div class="card">
            <div class="card-body">
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <a style="background-color: #007DFE;border-color: #007DFE; float: right; width:150px" class="btn btn-primary" href="{{url('admin/add-edit-design')}}">إضافة تصميم</a>
              <br/>
              <br/>
              <div class="table-responsive-md">
                <table id="designs" class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>
                         رقم المتسلسل
                      </th>
                      <th>
                        عنوان التصميم
                      </th>
                      <th>
                         تاريخ التصميم
                      </th>
                      <th>
                        الجهة المسؤولة
                      </th>
                      <th>
                        صورة التصميم
                      </th>
                      <th>
                        الإعدادات
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($designs as $design )
                    <tr>
                      <td>
                        {{$design['id']}}
                      </td>
                      <td>
                        {{$design['title']}}
                      </td>
                      <td>
                        {{$design['design_date']}}
                      </td>
                      <td>
                        {{$design['theside']}}
                      </td>
                       <td>
                        <img style="width: 180px" src="{{asset('admin/images/design_images/'.$design['image'])}}"> 
                      </td>
                      <td>
                       <a href="{{url('admin/add-edit-design/'.$design['id'])}}">
                        <i style="font-size: 25px ;color:#007DFE;"
                        class="nav-icon fas fa-edit"></i> </a>
                            <a href="javascript:void(0)" module="design" categ="التصميم" class="confirmDelete" moduleid="{{$design['id']}}">
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