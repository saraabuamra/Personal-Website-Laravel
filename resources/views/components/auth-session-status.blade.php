@props(['status'])

@if ($status)
    <div id="message_id" class="alert alert-success alert-dismissible fade show" role="alert">
         {{ $status }}
      </div>
@endif
