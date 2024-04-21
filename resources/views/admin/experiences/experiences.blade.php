@extends('dashboard.layouts.layout')

@section('title','الخبرات')


@section('style')
  
@endsection

@section('content')
        <div class="col-lg-12 grid-margin stretch-card" style="position:relative;top:10px">
          <div class="card">
            <div class="card-body">
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <a style="background-color: #007DFE;border-color: #007DFE; float: right; width:150px" class="btn btn-primary" href="{{url('admin/add-edit-experience')}}">إضافة خبرة</a>
              <br/>
              <br/>
              <div class="table-responsive">
                <table id="experiences" class="table table-bordered" style="text-align:center;">
                  <thead style=" white-space: nowrap;">
                    <tr>
                      <th>رقم المتسلسل</th>
                      <th>اسم الخبرة</th>
                      <th>الجهة المسؤولة</th>
                      <th>تاريخ البدء</th>
                      <th>تاريخ الانتهاء</th>
                      <th>ملاحظات</th>
                      <th>الإعدادات</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($experiences as $experience )
                    <tr>
                      <td>
                        {{$experience['id']}}
                      </td>
                      <td>
                        {{$experience['name']}}
                      </td>
                      <td>
                        {{$experience['theside']}}
                      </td>
                      <td>
                        {{$experience['from_date']}}
                      </td>
                      <td>
                        {{$experience['to_date']}}
                      </td>
                      <td>
                        {{$experience['notes']}}
                      </td>
                      <td>
                       <a href="{{url('admin/add-edit-experience/'.$experience['id'])}}">
                        <i style="font-size: 25px ;color:#007DFE;"
                        class="nav-icon fas fa-edit"></i> </a>
                            <a href="javascript:void(0)" module="experience" categ="الخبرة" class="confirmDelete" moduleid="{{$experience['id']}}">
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