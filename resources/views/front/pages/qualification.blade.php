@extends('front.pages.cv')

@section('cv_content')
<h4 style="margin-bottom: 10px;margin-top:5px">المؤهلات</h4>
<ul style="line-height: 2rem">
@foreach ($qualifications as $qualification)
<li><i>
    </i>@if (isset($qualification['name'])) {{$qualification['name']}} @endif -
    @if (isset($qualification['theside'])) {{$qualification['theside']}} @endif
    @if (isset($qualification['qualification_date'])) {{$qualification['qualification_date']}} @endif
</li>
@endforeach
</ul>
<h4 style="margin-bottom: 10px;margin-top:5px">الشهادات</h4>
<ul style="line-height: 2rem">
@foreach ($certificates as $certificate)
<li><i>
    </i>@if (isset($certificate['name'])) {{$certificate['name']}} @endif 
    @if (isset($certificate['theside'])) {{$certificate['theside']}} @endif
    @if (isset($certificate['certificate_date'])) {{$certificate['certificate_date']}} @endif
</li>
@endforeach
</ul>
@endsection