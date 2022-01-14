@extends('admin_layouts.app')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
             <div class="card-text">
                    @if ($message = Session::get('error'))
                      <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                        <span class="alert-icon"><i class="la la-warning"></i></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <strong>{{ $message }}</strong>
                      </div>
                    @endif

                    @if (session('alert'))
                      <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                        <span class="alert-icon"><i class="la la-warning"></i></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                        <strong>{{ session('alert') }}</strong>
                      </div>
                    @endif
                      
              </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <b><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Zindawork!</b>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif

              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <div class="p-1">
                      <img src="{{ asset('app-assets/images/logo/logo.png') }}" alt="branding logo">
                    </div>
                  </div>
                  <h3 class="text-center">We have sent verification code to {{ Auth::guard('admin')->user()->email  }}</h3>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal form-simple" method="post" action="{{route('verify.admin')}}" novalidate>
                        @csrf
                      <fieldset class="form-group position-relative has-icon-left mb-0">
                        <input type="number" name="verification_code" class="form-control form-control-lg input-lg @error('email') is-invalid @enderror"  placeholder="Enter Verification Code"
                        required>
                        <div class="form-control-position">
                          <i class="ft-unlock"></i>
                        </div>
                      </fieldset>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      <div class="form-group row">
                        <div class="col-md-6 col-12 text-center text-md-left">
                          
                        </div>
                        <div class="col-md-6 col-12 text-center text-md-right">
                        </div>
                        </div>
                      <button type="submit" class="btn my-1 btn-info btn-lg btn-block"> Verify</button>
                    </form>

                     <a class="btn btn-danger btn-lg btn-block" href="javascript:;" onclick="event.preventDefault();
                     document.getElementById('logout-form-admin').submit();" >Logout</a>
                     <form id="logout-form-admin" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                      </form>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

@endsection
