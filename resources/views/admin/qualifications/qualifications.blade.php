@extends('dashboard.layouts.layout')

@section('title','المؤهلات العلمية')


@section('style')
    
@endsection

@section('content')
        <div class="col-lg-12 grid-margin stretch-card" style="position:relative;top:10px">
          <div class="card">
            <div class="card-body">
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <a style="background-color: #007DFE;border-color: #007DFE; float: right; width:180px" class="btn btn-primary" href="{{url('admin/add-edit-qualification')}}">إضافة مؤهل علمي</a>
              <br/>
              <br/>
              <div class="table-responsive-md">
                <table id="qualifications" class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>
                         رقم المتسلسل
                      </th>
                      <th>
                        اسم المؤهل العلمي
                      </th>
                      <th>
                        الجهة المسؤولة
                      </th>
                      <th>
                         تاريخ المؤهل العلمي
                      </th>
                      <th>
                         الإعدادات
                     </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($qualifications as $qualification )
                    <tr>
                      <td>
                        {{$qualification['id']}}
                      </td>
                      <td>
                        {{$qualification['name']}}
                      </td>
                      <td>
                        {{$qualification['theside']}}
                      </td>
                      <td>
                        {{$qualification['qualification_date']}}
                      </td>
                      <td>
                       <a href="{{url('admin/add-edit-qualification/'.$qualification['id'])}}">
                        <i style="font-size: 25px ;color:#007DFE;"
                        class="nav-icon fas fa-edit"></i> </a>
                            <a href="javascript:void(0)" module="qualification" categ="المؤهل العلمي" class="confirmDelete" moduleid="{{$qualification['id']}}">
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