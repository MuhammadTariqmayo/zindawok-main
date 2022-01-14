@extends('website_layouts.master')
@section('content')
<div class="px-3 px-md-0 mt-5 pt-3">
    <div class="container p-0">
        <div class="mt-3 mb-4">
            <div class="bg-white border_radius">
                <div class="row m-0">
                    <div class="col-12 p-0 pb-4 mt-3">
                        <div class="author-card border_radius  mt-3  pb-3">

                           	<div class="author-card-profile ml-md-5 pt-5 ml-0">
                              	<div class="author-card-avatar"><img
                                    src="{{ asset('storage/company_logo/'.$company->logo) }}" alt="{{ Auth::guard('company')->user()->image }}">
                              	</div>
                              	<div class="author-card-details">
                                 	<h4 class="author-card-name text-lg">{{ $company->name }}</h4>
                                 	<span class="author-card-position">{{ $company->email }}</span>
                              	</div>
                           	</div>
                        </div>
                        <div class="wizard">
                           	<nav class="list-group list-group-flush">
                              	<a class="list-group-item d-flex align-items-center" href="{{ route('company.simple.profile.edit')}}"><i
                                    class="fa fa-user text-muted"></i>Profile Edit</a>
                              	<a class="list-group-item d-flex align-items-center" href="#"><i
                                    class="fa fa-phone text-muted"></i>{{ $company->phone }}</a>
                              	<a class="list-group-item d-flex align-items-center" href="#"><i
                                    class="fa fa-user text-muted"></i>{{ $company->services}}</a>
                              	<a class="list-group-item d-flex align-items-center" href="#"><i
                                    class="fa fa-calendar text-muted"></i>{{ $company->founded}}</a>
                              	<a class="list-group-item d-flex align-items-center" href="#"><i
                                    class="fa fa-users text-muted"></i>{{ $company->employees }}</a>
                              	<a class="list-group-item d-flex align-items-center" href="#"><i
                                    class="fa fa-globe text-muted"></i>{{ $company->website_url }}</a>
                              	<a class="list-group-item d-flex align-items-center" href="#"><i
                                    class="fa fa-map-marker text-muted"></i>
                                 <p class="mb-0">{{ $company->location }}</p>
                              	</a>
                              	<a class="list-group-item d-flex align-items-center" href="{{ route('company.profile.setting')}}"><i class="fa fa-cog text-muted"></i>Setting</a>
                                
                              	<a class="list-group-item d-flex align-items-center" href="javascript:;" onclick="event.preventDefault(); document.getElementById('company-logout-form').submit();"><i class="fa fa-power-off text-muted"></i>Logout</a>
				                <form id="company-logout-form" action="{{ route('company.logout') }}" method="POST">
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