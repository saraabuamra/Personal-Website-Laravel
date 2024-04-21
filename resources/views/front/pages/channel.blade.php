@extends('front.pages.cv')
@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">   
@endsection
@section('cv_content')
<h4>شاهد محمد العتيبي</h4>
   <section id="channel" class="channel">
    <div class="container" data-aos="fade-up">
      <div class="row channel-container" data-aos="fade-up" data-aos-delay="200">
        @foreach ($channels as $channel)
        <div class="col-lg-6 col-md-6 channel-item filter-{{$channel['id']}}">
            <div class="channel-img">
                <iframe  height="315" @if($channel['url']) src="{{$channel['url']}}" @endif frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          <div class="channel-info">
            <h4>@if (isset($channel['title'])) {{$channel['title']}}  @endif</h4>
            <br/>
            <a href="{{$channel['url']}}" target="_blank" style="display: inline-block; border-radius: 50%; background-color: rgb(71,178,228); padding: 15px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" class="bi bi-play-circle" viewBox="0 0 16 16">
                    <path d="M7.445 10L5.691 8.051a.5.5 0 0 1 0-.918L7.445 6A.5.5 0 0 1 8 6.5v3a.5.5 0 0 1-.555.498z"/>
                    <path fill-rule="evenodd" d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm0 1a7 7 0 1 1 0 14A7 7 0 0 1 8 1z"/>
                </svg>
            </a> 
            <br/>
            <br/>                   
            <p>@if (isset($channel['description'])) {{$channel['description']}}  @endif</p>
            <br/>
            <p>@if (isset($channel['notes'])) {{$channel['notes']}}  @endif</p>

          </div>
        </div>
        @endforeach

      </div>

    </div>
</section>  
@endsection
