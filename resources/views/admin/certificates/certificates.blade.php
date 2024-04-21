@extends('dashboard.layouts.layout')

@section('title','الشهادات')


@section('style')
    
@endsection

@section('content')
        <div class="col-lg-12 grid-margin stretch-card" style="position:relative;top:10px">
          <div class="card">
            <div class="card-body">
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <a style="background-color: #007DFE;border-color: #007DFE; float: right; width:150px" class="btn btn-primary" href="{{url('admin/add-edit-certificate')}}">إضافة شهادة</a>
              <br/>
              <br/>
              <div class="table-responsive-md">
                <table id="certificates" class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>
                         رقم المتسلسل
                      </th>
                      <th>
                        اسم الشهادة
                      </th>
                      <th>
                        الجهة المسؤولة
                      </th>
                      <th>
                         تاريخ الشهادة
                      </th>
                      <th>
                         الإعدادات
                     </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($certificates as $certificate )
                    <tr>
                      <td>
                        {{$certificate['id']}}
                      </td>
                      <td>
                        {{$certificate['name']}}
                      </td>
                      <td>
                        {{$certificate['theside']}}
                      </td>
                      <td>
                        {{$certificate['certificate_date']}}
                      </td>
                      <td>
                       <a href="{{url('admin/add-edit-certificate/'.$certificate['id'])}}">
                        <i style="font-size: 25px ;color:#007DFE;"
                        class="nav-icon fas fa-edit"></i> </a>
                            <a href="javascript:void(0)" module="certificate" categ="الشهادة" class="confirmDelete" moduleid="{{$certificate['id']}}">
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