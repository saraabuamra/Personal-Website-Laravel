@extends('dashboard.layouts.layout')

@section('title','الفئات')


@section('style')
    
@endsection

@section('content')
        <div class="col-lg-12 grid-margin stretch-card" style="position:relative;top:10px">
          <div class="card">
            <div class="card-body">
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <a style="background-color: #007DFE;border-color: #007DFE; float: right; width:150px" class="btn btn-primary" href="{{url('admin/add-edit-category')}}">إضافة فئة</a>
              <br/>
              <br/>
              <div class="table-responsive-md">
                <table id="categories" class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>
                         رقم المتسلسل
                      </th>
                      <th>
                        اسم الفئة
                      </th>
                      <th>
                        الإعدادات
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category )
                    <tr>
                      <td>
                        {{$category['id']}}
                      </td>
                      <td>
                        {{$category['category_name']}}
                      </td>
                      <td>
                       <a href="{{url('admin/add-edit-category/'.$category['id'])}}">
                        <i style="font-size: 25px ;color:#007DFE;"
                        class="nav-icon fas fa-edit"></i> </a>
                            <a href="javascript:void(0)" module="category" categ="الفئة" class="confirmDelete" moduleid="{{$category['id']}}">
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