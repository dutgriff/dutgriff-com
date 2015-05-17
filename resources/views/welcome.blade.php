@extends('layout.master')

@section('head-content')
  <link href='css/landing.css' rel='stylesheet' type='text/css'>
@stop

@section('prepage-content')
  <div id="landingBody">
    <div class="scrollDown">
      <img src="images/arrow.png" />
      <img src="images/arrow.png" />
      <img src="images/arrow.png" />
    </div>
    <div class="landingContainer">
      <div class="landingContent">
        <div class="landingText">
          <h1 class="landingHeading">DutGRIFF.com</h1>
          Let's build something awesome! <br />
          <b><a href="mailto:sites@dutgriff.com">sites@dutgriff.com</a></b>
        </div>
      </div>
    </div>
  </div>
@stop

@section('content')
  this is the next section<br />
  Here
@stop

@section('scripts')
  <script src="{{ asset('js/landing.js') }}"></script>
@stop
