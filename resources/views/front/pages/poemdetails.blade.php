@extends('front.pages.cv')

@section('cv_content')
@foreach ($admins as $admin)  
@if ($poemdetails)
<div>
<div class="portfolio-img"><img @if (isset($poemdetails['image'])) src="{{asset('admin/images/poem_images/'.$poemdetails['image'])}}" @endif class="img-fluid" alt=""></div>
<h4 style="margin-bottom: 10px;margin-top:5px">@if (isset($poemdetails['name'])) {{$poemdetails['name']}} @endif</h4>
<pre style="width: fit-content;font-size:15px;text-wrap: wrap;color:#7D6E70">
    @if (isset($poemdetails['content'])) {!! $poemdetails['content'] !!} @endif
</pre>
<h6 style="text-align: left">@if(isset($admin['name'])) {{$admin['name']}} @endif</h6>    
</div>
@endif 
@endforeach
@endsection