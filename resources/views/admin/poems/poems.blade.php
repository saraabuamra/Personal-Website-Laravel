@extends('dashboard.layouts.layout')

@section('title','القصائد')


@section('style')
    
@endsection

@section('content')
        <div class="col-lg-12 grid-margin stretch-card" style="position:relative;top:10px">
          <div class="card">
            <div class="card-body">
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <a style="background-color: #007DFE;border-color: #007DFE; float: right; width:150px" class="btn btn-primary" href="{{url('admin/add-edit-poem')}}">إضافة قصيدة</a>
              <br/>
              <br/>
              <div class="table-responsive-md">
                <table id="poems" class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>
                         رقم المتسلسل
                      </th>
                      <th>
                        اسم القصيدة
                      </th>
                      <th>
                        نص القصيدة
                      </th>
                      <th>
                        صورة القصيدة
                      </th>
                      <th>
                        الإعدادات
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($poems as $poem )
                    <tr>
                      <td>
                        {{$poem['id']}}
                      </td>
                      <td>
                        {{$poem['name']}}
                      </td>
                      <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">
                        {{$poem['content']}}
                      </td>
                       <td>
                        <img style="width: 180px" src="{{asset('admin/images/poem_images/'.$poem['image'])}}"> 
                      </td>
                      <td>
                       <a href="{{url('admin/add-edit-poem/'.$poem['id'])}}">
                        <i style="font-size: 25px ;color:#007DFE;"
                        class="nav-icon fas fa-edit"></i> </a>
                            <a href="javascript:void(0)" module="poem" categ="القصيدة" class="confirmDelete" moduleid="{{$poem['id']}}">
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