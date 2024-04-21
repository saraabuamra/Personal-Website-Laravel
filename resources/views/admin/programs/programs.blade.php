@extends('dashboard.layouts.layout')

@section('title','البرامج التدريبية')


@section('style')
    
@endsection

@section('content')
        <div class="col-lg-12 grid-margin stretch-card" style="position:relative;top:10px">
          <div class="card">
            <div class="card-body">
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <a style="background-color: #007DFE;border-color: #007DFE; float: right; width:150px" class="btn btn-primary" href="{{url('admin/add-edit-program')}}">إضافة برنامج</a>
              <br/>
              <br/>
              <div class="table-responsive-md">
                <table id="programs" class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>
                         رقم المتسلسل
                      </th>
                      <th>
                        اسم البرنامج التدريبي
                      </th>
                      <th>
                       الفئة
                      </th>
                      <th>
                         عدد الساعات
                      </th>
                      <th>
                         الهدف
                     </th>
                     <th>
                       الصورة
                   </th>
                      <th>
                        الإعدادات
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($programs as $program )
                    <tr>
                      <td>
                        {{$program['id']}}
                      </td>
                      <td>
                        {{$program['name']}}
                      </td>
                      <td>@if(isset($program['category']['category_name']))
                        {{$program['category']['category_name']}}
                        @else
                        لا يوجد
                      @endif
                      </td>
                      <td>
                        {{$program['hours']}}
                      </td>
                      <td>
                        {{$program['goal']}}
                      </td>
                       <td>
                        <img style="width: 180px" src="{{asset('admin/images/program_images/'.$program['image'])}}"> 
                      </td>
                      <td>
                       <a href="{{url('admin/add-edit-program/'.$program['id'])}}">
                        <i style="font-size: 25px ;color:#007DFE;"
                        class="nav-icon fas fa-edit"></i> </a>
                            <a href="javascript:void(0)" module="program" categ="البرنامج التدريبي" class="confirmDelete" moduleid="{{$program['id']}}">
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