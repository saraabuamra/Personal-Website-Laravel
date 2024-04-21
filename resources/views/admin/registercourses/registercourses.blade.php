@extends('dashboard.layouts.layout')

@section('title','المسجلين في الدورات')


@section('style')
  
@endsection

@section('content')
        <div class="col-lg-12 grid-margin stretch-card" style="position:relative;top:10px">
          <div class="card">
            <div class="card-body">
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <br/>
              <br/>
              <div class="table-responsive">
                <table id="courses" class="table table-bordered" style="text-align:center;">
                  <thead style=" white-space: nowrap;">
                    <tr>
                      <th>رقم المتسلسل</th>
                      <th>الاسم</th>
                      <th>البريد الالكتروني</th>
                      <th>رقم الجوال</th>
                      <th>الجنس</th>
                      <th>اسم الدورة</th>
                      <th>الإعدادات</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($registercourses as $registercourse )
                    <tr>
                      <td>
                        {{$registercourse['id']}}
                      </td>
                      <td>
                        {{$registercourse['name']}}
                      </td>
                      <td>
                        {{$registercourse['email']}}
                      </td>
                      <td>
                        {{$registercourse['mobile']}}
                      </td>
                      <td>
                        @if ($registercourse['gender'] == 'M')
                          ذكر
                          @else
                          أنثى
                        @endif
                      </td>
                      <td>
                        @if (isset($registercourse['course']['name']))
                        {{$registercourse['course']['name']}}
                       @endif
                      </td>
                      <td>
                            <a href="javascript:void(0)" module="registercourse" categ="المسجل في الدورة" class="confirmDelete" moduleid="{{$registercourse['id']}}">
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