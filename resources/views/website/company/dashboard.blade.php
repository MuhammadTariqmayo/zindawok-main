@extends('website_layouts.master')
@section('content')
<div class="px-3 px-md-0 mt-5 pt-3">
    <div class="mt-3 container p-0">
        <div class="p-3 bg-white border_radius py-5">
			<h4 class="text-center">Company My Page</h4>
        </div>
    </div>
    <div class="p-3 mt-3 bg-white container" style="border-radius: 10px;">
		<div class="d-flex search_button mt-2">
            <button class="btn bg_white w-100 mr-2 border_radius_35 mb-2">
                <a href="{{route('company.simple.profile')}}">
                    <div class="text-center py-3">
                        <img src="{{ asset('frontend-assets/img/map.svg')}}" class="mb-2" alt="">
                        <div class="line-height-normal">
                           <h6 class="mb-0">Profile</h6>
                        </div>
                    </div>
                </a>
            </button>
            <button class="btn bg_white w-100 ml-2 border_radius_35 mb-2">
                <a href="{{ route('company.job.create') }}">
                    <div class="text-center py-3">
                        <img src="{{ asset('frontend-assets/img/industry-solid.svg')}}" class="mb-2" alt="">
                        <div class="line-height-normal">
                           <h6 class="mb-0">Job Post</h6>
                        </div>
                    </div>
                </a>
            </button>
        </div>
        <div class="d-flex search_button mt-2">
            <button class="btn bg_white w-100 mr-2 border_radius_35 mb-2">
                <a href="{{ route('company.job.index')}}">
                    <div class="text-center py-3">
                        <img src="{{ asset('frontend-assets/img/map.svg')}}" class="mb-2" alt="">
                        <div class="line-height-normal">
                           <h6 class="mb-0">Job Listing</h6>
                        </div>
                    </div>
                </a>
            </button>
            <button class="btn bg_white w-100 ml-2 border_radius_35 mb-2">
                <a href="{{route('company.job.applicant')}}">
                    <div class="text-center py-3">
                        <img src="{{ asset('frontend-assets/img/industry-solid.svg')}}" class="mb-2" alt="">
                        <div class="line-height-normal">
                           <h6 class="mb-0">Applicant's</h6>
                        </div>
                    </div>
                </a>
            </button>
        </div>
        <div class="d-flex search_button mt-2">
            <button class="btn bg_white w-100 mr-2 border_radius_35 mb-2">
                <a href="{{route('scoutmail.job')}}">
                    <div class="text-center py-3">
                        <img src="{{ asset('frontend-assets/img/map.svg')}}" class="mb-2" alt="">
                        <div class="line-height-normal">
                           <h6 class="mb-0">Scouit Mail</h6>
                        </div>
                     </div>
                </a>
            </button>
            <button class="btn bg_white w-100 ml-2 border_radius_35 mb-2">
                <a href="C_Services.html">
                    <div class="text-center py-3">
                        <img src="{{ asset('frontend-assets/img/industry-solid.svg') }}" class="mb-2" alt="">
                        <div class="line-height-normal">
                           <h6 class="mb-0">Services</h6>
                        </div>
                    </div>
                </a>
            </button>
        </div>
        <div class="d-flex search_button mt-2">
            <button class="btn bg_white w-100 mr-2 border_radius_35 mb-2">
                <a href="C_Advertise.html">
                    <div class="text-center py-3">
                        <img src="{{ asset('frontend-assets/img/map.svg') }}" class="mb-2" alt="">
                        <div class="line-height-normal">
                           <h6 class="mb-0">Advertisement</h6>
                        </div>
                    </div>
                </a>
            </button>
            <button class="btn bg_white w-100 ml-2 border_radius_35 mb-2">
                <a href="C_Setting.html">
                    <div class="text-center py-3">
                        <img src="{{ asset('frontend-assets/img/industry-solid.svg') }}" class="mb-2" alt="">
                        <div class="line-height-normal">
                           <h6 class="mb-0">Settings</h6>
                        </div>
                    </div>
                </a>
            </button>
        </div>
    </div>
</div>
@endsection
