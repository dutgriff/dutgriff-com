@extends('layout.master')

@section('head-content')
  <link href='css/landing.css' rel='stylesheet' type='text/css'>
@stop

@section('header')
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
  <h1>Welcome to DutGRIFF.com</h1>
  <p>
    Hello. My name is Dustin Griffith. I am a freelance software developer with big ambitions and a short attention
    span. I love to build things.
  </p>
  <h1>How about some Lorem Ipsum</h1>
  <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
  <h1>And again</h1>
  <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
  <h1>And once more</h1>
  <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
    aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
    sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
@stop

@section('scripts')
  <script src="{{ asset('js/landing.js') }}"></script>
@stop
