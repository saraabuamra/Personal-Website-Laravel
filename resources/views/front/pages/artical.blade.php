@extends('front.pages.cv')

@section('cv_content')
@foreach ($articals as $artical)
@foreach ($admins as $admin)
<div>
<h4 style="margin-bottom: 10px;margin-top:5px">@if (isset($artical['name'])) {{$artical['name']}} @endif</h4>
<p style="width: fit-content;font-size:15px;text-wrap: wrap;">
    @if (isset($artical['content'])) {!! $artical['content'] !!} @endif
</p>
<h6 style="text-align: left">@if(isset($admin['name'])) {{$admin['name']}} @endif</h6>    
</div>
@endforeach
@endforeach
@endsection