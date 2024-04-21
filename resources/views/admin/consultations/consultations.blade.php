@extends('dashboard.layouts.layout')

@section('title','الاستشارات')


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
                      <th>موضوع الرسالة</th>
                      <th>الرسالة</th>
                      <th>الحالة</th>
                      <th>تعديل الحالة</th>
                      <th>الإعدادات</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($consultations as $consultation )
                    <tr>
                      <td>
                        {{$consultation['id']}}
                      </td>
                      <td>
                        {{$consultation['name']}}
                      </td>
                      <td>
                        {{$consultation['email']}}
                      </td>
                      <td>
                        {{$consultation['mobile']}}
                      </td>
                      <td>
                        @if ($consultation['gender'] == 'M')
                          ذكر
                          @else
                          أنثى
                        @endif
                      </td>
                      <td>
                        {{$consultation['subject']}}
                      </td>
                      <td>
                        {{$consultation['message']}}
                      </td>
                      <td>
                        @if ($consultation['status']==1)
                        <a class="updateConsultationStatus" id="state-{{$consultation['id']}}" consultation_id="{{$consultation['id']}}">
                          <span status="Active">مقروءة</span>
                        </a>
                        @else
                        <a class="updateConsultationStatus" id="state-{{$consultation['id']}}" consultation_id="{{$consultation['id']}}">
                          <span status="Inactive">غير مقروءة</span>
                        </a>
                          @endif
                      </td>
                      <td>
                        @if ($consultation['status']==1)
                        <a class="updateConsultationStatus" id="consultation-{{$consultation['id']}}" consultation_id="{{$consultation['id']}}"
                        href="javascript:void(0)"> 
                       <i style="font-size: 25px; color:#007DFE;" class="nav-icon fas fa-check-square" status="Active"></i> 
                       </a>
                       @else
                       <a class="updateConsultationStatus" id="consultation-{{$consultation['id']}}" consultation_id="{{$consultation['id']}}"
                       href="javascript:void(0)"> 
                      <i style="font-size: 25px;color:#007DFE;" class="nav-icon fa fa-square-o" status="Inactive"></i></a>
                      @endif
                      </td>
                      <td>
                            <a href="javascript:void(0)" module="consultation" categ="الاستشارة" class="confirmDelete" moduleid="{{$consultation['id']}}">
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