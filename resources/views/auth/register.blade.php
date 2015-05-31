@extends('layout.master')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Register</div>
          <div class="panel-body">
            @if (count($errors) > 0)
              <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label class="control-label sr-only">Name</label>

                <div class="col-md-6 col-md-offset-3">
                  <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                         placeholder="Name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label sr-only">E-Mail Address</label>

                <div class="col-md-6 col-md-offset-3">
                  <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                         placeholder="E-Mail Address">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label sr-only">Password</label>

                <div class="col-md-6 col-md-offset-3">
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label sr-only">Confirm Password</label>

                <div class="col-md-6 col-md-offset-3">
                  <input type="password" class="form-control" name="password_confirmation"
                         placeholder="Confirm Password">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-6 col-md-offset-6">
                  <button type="submit" class="btn btn-primary">
                    Register
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
