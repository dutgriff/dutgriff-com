@extends('layout.master')

@section('head-content')
  <link href='css/landing.css' rel='stylesheet' type='text/css'>
@stop

@section('header')
  <div id="landingBody">
    <div class="scrollDown">
      <img src="images/theme/arrow.png"/>
      <img src="images/theme/arrow.png"/>
      <img src="images/theme/arrow.png"/>
    </div>
    <div class="landingContainer">
      <div class="landingContent">
        <div class="landingText">
          <h1 class="landingHeading">DutGRIFF.com</h1>
          Let's build something awesome! <br/>
          <b><a href="mailto:sites@dutgriff.com">sites@dutgriff.com</a></b>
        </div>
      </div>
    </div>
  </div>
@stop

@section('content')
  <h1>Welcome to DutGRIFF.com <span class="h5">(Alpha)</span></h1>
  <p>
    My name is Dustin Griffith and this is my website. I am a freelance software developer with big ambitions and a
    short attention span. I love to build things.
  </p>
  <p>
    This site will tell you just about everything you need to know about me and my work. It may be a while before this
    site becomes what I intend for it to be. I work on it when I can but my clients obviously comes first.
  </p>

  <div class="row container-inlay-container">
    <div class="col-xs-12 container-inlay inverse inverse-warning">
      <h2>Under Construction</h2>
      Although there is a development and local version for testing you may see some unfinished work on this site. This
      is intentional. Normally I wouldn't push incomplete code to a production environment but this site is still in
      the Alpha phase. We are getting there.
    </div>
  </div>

  <h2>Site Agenda</h2>
  <p>
    Here is an outline of some of the features that are on the agenda:
  </p>
  <dl class="dl-horizontal">
    <dt>Browser Support</dt>
    <dd>
      Because the theme and layout is constantly changing I focus only on how it looks in Chrome. Once I get a more
      stable theme I will make it work with the most used browsers and mobile devices.
    </dd>
    <dt>Hire Me Page</dt>
    <dd>
      Here we will get more in depth as to what I do and can do for clients. I will show off some of my work as well as
      give the technical inquirers a rundown of my workflow, languages and capabilities.
    </dd>
    <dt>User Roles</dt>
    <dd>
      Allow users to request and/or be granted specific roles allowing them access to more of the sites features.
    </dd>
    <dt>Time Punch</dt>
    <dd>
      My AngularJS project time tracker. This is how I log my hours. It will allows users with a 'client' role to see
      how much time I spend on a project assigned to them and allow them to see in depth where the time goes.
    </dd>
    <dt>About Me</dt>
    <dd>
      This will be a page telling you more than you care to read about me. It will get a lot more personal than the
      welcome page. I have a huge variety of interests and here I will tell you about a lot of them.
    </dd>
  </dl>

  <h2>Looking to hire?</h2>
  <p>
    If you are here in search of a developer feel free to <a href="mailto:sites@dutgriff.com">email</a> me. Whether you
    are looking for a new site, improvements to an existing one, a sophisticated web app or are just curious how I can
    help you or your business, a simple email is all it takes to get us started.
  </p>

  <h2>Technical Specs</h2>
  <p>
    This site is hosted on an AWS EC2 micro instance running Ubuntu 14.04 LTS. The web server is NGINX serving up PHP 5
    (<a href="//wiki.php.net/rfc/php7timeline">for now</a>) with MySQL as the DBMS. I am using the Laravel PHP
    framework. The theme is custom built off of Twitter Bootstrap compiled from less with every build. I use javascript
    compiled from coffee script and some third party javascript libraries. Git is the version control system. You can
    see <a href="//github.com/dutgriff/dutgriff-com">this repository on Github</a> for most of the code used.
  </p>
@stop

@section('scripts')
  <script src="{{ asset('js/landing.js') }}"></script>
@stop
