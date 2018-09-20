@extends('admin_pages/template')

@section('title', env("BEDRIJFSNAAM") . ' | Dashboard')


@section('body')
<div class="admin_container">
  @if(!Auth::user()->verified)
    <div class="info_box danger">
      <i class="fas fa-times info_close"></i>
      <h1>Email niet geverifieerd.</h1>
      <p>Je email is nog niet geverifieerd, doe dit snel!</p>
    </div>
  @endif

  @if(session('errorh1'))
    <div class="info_box danger">
      <i class="fas fa-times info_close"></i>
      <h1>{{session("errorh1")}}</h1>
      <p>{{session("errorp")}}</p>
    </div>
  @endif

  @if(session('successh1'))
    <div class="info_box success">
      <i class="fas fa-times info_close"></i>
      <h1>{{session("successh1")}}</h1>
      <p>{{session("successp")}}</p>
    </div>
  @endif

</div>
@endsection
