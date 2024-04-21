@extends('front.pages.cv')

@section('cv_content')
<h4 style="margin-bottom: 10px;margin-top:5px">الخبرات</h4>
<ul style="line-height: 2rem">
    @foreach ($experiences as $experience)
    <li><i>
      </i>@if (isset($experience['name'])) {{$experience['name']}} @endif 
      @if (isset($experience['theside'])) {{$experience['theside']}} @endif 
      @if (isset($experience['from_date'])) {{$experience['from_date']}} - @endif 
      @if (isset($experience['to_date'])) {{$experience['to_date']}} @endif
    </li>
      @endforeach
</ul>
@endsection