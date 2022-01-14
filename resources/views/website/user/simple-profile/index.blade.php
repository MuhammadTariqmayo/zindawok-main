@extends('website_layouts.master')
@section('content')
<div class="px-3 px-md-0 mt-5 pt-3">
	<div class="mt-3">
        <div class="bg-white border_radius">
			<div class="container mb-4">
                <div class="row">
                    <div class="col-12 p-0 pb-4">
                        <!-- Account Sidebar-->

	                    <div class="author-card py-3  border_radius">
	                        <div class="author-card-profile mt-3">
	                            <div class="author-card-avatar"><img
	                                    src="{{ asset('storage/user_image/'.Auth::user()->image) }}" alt="{{ Auth::user()->image }}">
	                            </div>
	                            <div class="author-card-details">
	                                 <h5 class="author-card-name text-lg">{{ Auth::user()->name }}</h5>
	                                 <span class="author-card-position">{{ Auth::user()->email }}</span>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="wizard">
	                        <nav class="list-group list-group-flush">
	                            <a class="list-group-item d-flex align-items-center" href="{{ route('user.simple.profile.edit')}}"><i class="fa fa-user text-muted"></i>Profile Edit</a>
	                            <a class="list-group-item d-flex align-items-center" href="#"><i
	                            class="fa fa-phone text-muted"></i>{{ Auth::user()->phone }}</a>
	                            <a class="list-group-item d-flex align-items-center" href="#"><i
	                                    class="fa fa-user text-muted"></i>{{ Auth::user()->gender }}</a>
	                            <a class="list-group-item d-flex align-items-center" href="#"><i
	                                    class="fa fa-calendar text-muted"></i>{{ Auth::user()->date_of_birth }}</a>
	                            <a class="list-group-item d-flex align-items-center" href="#"><i
	                             		class="fa fa-map-marker text-muted"></i>
	                            <p class="mb-0">{{ Auth::user()->location }}</p></a>
	                            <a class="list-group-item d-flex align-items-center" href="{{route('user.profile.setting')}}"><i class="fa fa-cog text-muted"></i>Profile Setting</a>
	                            <a class="list-group-item" href="javascript:;" onclick="event.preventDefault(); document.getElementById('user-logout-form').submit();">
	                            	<div class="d-flex justify-content-between align-items-center">
	                                    <div><i class="fa fa-tag mr-1 text-muted"></i>
	                                        <div class="d-inline-block font-weight-medium">Logout</div>
	                                    </div>
	                                </div>
	                            </a>
				                <form id="user-logout-form" action="{{ route('logout') }}" method="POST">
				                    @csrf
				                </form>
	                        </nav>
	                    </div>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@if(Session::get('success')) 
  <script>
    $(document).ready(function () 
    {
      toastr.success('<?php echo Session::get('success');?>', 'Zindawork Says', {timeOut: 2000})
    });
  </script>
@endif
@endsection