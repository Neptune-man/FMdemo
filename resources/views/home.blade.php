@extends('layouts.app')

@section('content')
<div class="container">
  <div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Larafm
        </div>

        <div class="links">
            <a href="{{url("/attendance")}}">Attendance</a>
            <a href="{{url("/archives")}}">Archives</a>
            <a href="{{url("/settings")}}">Settings</a>
            @if(Larafm::Auth()->user()->権限=="管理者")
              <a href="{{url("/admin")}}">Admin</a>
            @endif
        </div>
    </div>
  </div>
</div>
@endsection
