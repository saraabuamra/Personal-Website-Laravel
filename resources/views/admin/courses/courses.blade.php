@extends('dashboard.layouts.layout')

@section('title','الدورات')


@section('style')
  
@endsection

@section('content')
        <div class="col-lg-12 grid-margin stretch-card" style="position:relative;top:10px">
          <div class="card">
            <div class="card-body">
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <a style="background-color: #007DFE;border-color: #007DFE; float: right; width:150px" class="btn btn-primary" href="{{url('admin/add-edit-course')}}">إضافة دورة</a>
              <br/>
              <br/>
              <div class="table-responsive">
                <table id="courses" class="table table-bordered" style="text-align:center;">
                  <thead style=" white-space: nowrap;">
                    <tr>
                      <th>رقم المتسلسل</th>
                      <th>اسم الدورة</th>
                      <th>تاريخ البدء</th>
                      <th>تاريخ الانتهاء</th>
                      <th>عدد الأيام</th>
                      <th>البرنامج التدريبي</th>
                      <th>الحالة</th>
                      <th>تعديل الحالة</th>
                      <th>ملاحظات</th>
                      <th>الإعدادات</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($courses as $course )
                    <tr>
                      <td>
                        {{$course['id']}}
                      </td>
                      <td>
                        {{$course['name']}}
                      </td>
                      <td>
                        {{$course['start_date']}}
                      </td>
                      <td>
                        {{$course['end_date']}}
                      </td>
                      <td>
                        {{$course['days']}}
                      </td>
                      <td>@if (isset($course['program']['name']))
                        {{$course['program']['name']}}
                       @else
                       لا يوجد
                       @endif
                      </td>
                      <td>
                        @if ($course['status']==1)
                        <a class="updateCourseStatus" id="state-{{$course['id']}}" course_id="{{$course['id']}}">
                          <span status="Active">متاح</span>
                        </a>
                        @else
                        <a class="updateCourseStatus" id="state-{{$course['id']}}" course_id="{{$course['id']}}">
                          <span status="Inactive">مغلق</span>
                        </a>
                          @endif
                      </td>
                      <td>
                        @if ($course['status']==1)
                        <a class="updateCourseStatus" id="course-{{$course['id']}}" course_id="{{$course['id']}}"
                        href="javascript:void(0)"> 
                       <i style="font-size: 25px; color:#007DFE;" class="nav-icon fas fa-lock-open" status="Active"></i> 
                       </a>
                       @else
                       <a class="updateCourseStatus" id="course-{{$course['id']}}" course_id="{{$course['id']}}"
                       href="javascript:void(0)"> 
                      <i style="font-size: 25px;color:#007DFE;" class="nav-icon fas fa-lock" status="Inactive"></i></a>
                      @endif
                      </td>
                      <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">
                        {{$course['notes']}}
                      </td>
                      <td>
                       <a href="{{url('admin/add-edit-course/'.$course['id'])}}">
                        <i style="font-size: 25px ;color:#007DFE;"
                        class="nav-icon fas fa-edit"></i> </a>
                            <a href="javascript:void(0)" module="course" categ="الدورة" class="confirmDelete" moduleid="{{$course['id']}}">
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