@extends('dashboard.layouts.layout')

@section('title','تصنيف الصور')


@section('style')
    
@endsection

@section('content')
        <div class="col-lg-12 grid-margin stretch-card" style="position:relative;top:10px">
          <div class="card">
            <div class="card-body">
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <a style="background-color: #007DFE;border-color: #007DFE; float: right; width:170px" class="btn btn-primary" href="{{url('admin/add-edit-categoryimage')}}">إضافة تصنيف صورة</a>
              <br/>
              <br/>
              <div class="table-responsive-md">
                <table id="images" class="table table-bordered" >
                  <thead>
                    <tr>
                      <th>
                         رقم المتسلسل
                      </th>
                      <th>
                         عنوان الصورة
                      </th>
                      <th>
                        ملف الصورة 
                      </th>
                      <th>
                        الإعدادات
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categoryimages as $categoryimage )
                    <tr>
                      <td>
                        {{$categoryimage['id']}}
                      </td>
                      <td>
                        {{$categoryimage['title']}}
                      </td>
                       <td>
                        <img style="width: 180px" src="{{asset('admin/images/category_images/'.$categoryimage['image'])}}"> 
                      </td>
                      <td>
                       <a href="{{url('admin/add-edit-categoryimage/'.$categoryimage['id'])}}">
                        <i style="font-size: 25px ;color:#007DFE;"
                        class="nav-icon fas fa-edit"></i> </a>
                            <a href="javascript:void(0)" module="categoryimage" categ="تصنيف الصورة" class="confirmDelete" moduleid="{{$categoryimage['id']}}">
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