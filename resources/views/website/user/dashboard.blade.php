@extends('website_layouts.master')
@section('content')
<div class="px-3 px-md-0 mt-5 pt-3">

         <div class="mt-3">
            <div class="p-3 bg-white border_radius py-5">

               <h4 class="text-center">User My Page</h4>
            </div>
         </div>

         <div class="p-3 mt-3 bg-white" style="border-radius: 10px;">

            <div class="d-flex search_button mt-2">
               <button class="btn bg_white w-100 mr-2 border_radius_35 mb-2">
                  <a href="{{ route('user.simple.profile')}}">
                     <div class="text-center py-3">
                        <img src="{{ asset('frontend-assets/img/map.svg') }}" class="mb-2" alt="">
                        <div class="line-height-normal">
                           <h6 class="mb-0">Simple Profile</h6>
                        </div>
                     </div>
                  </a>
               </button>
               <button class="btn bg_white w-100 ml-2 border_radius_35 mb-2">
                  <a href="{{ route('user.detail.profile')}}">
                     <div class="text-center py-3">
                        <img src="{{ asset('frontend-assets/img/industry-solid.svg') }}" class="mb-2" alt="">
                        <div class="line-height-normal">
                           <h6 class="mb-0">Detail Profile</h6>
                        </div>
                     </div>
                  </a>
               </button>
            </div>
            <div class="d-flex search_button mt-2">
               <button class="btn bg_white w-100 mr-2 border_radius_35 mb-2">
                  <a href="{{ route('user.resume')}}">
                     <div class="text-center py-3">
                        <img src="{{ asset('frontend-assets/img/map.svg') }}" class="mb-2" alt="">
                        <div class="line-height-normal">
                           <h6 class="mb-0">CV</h6>
                        </div>
                     </div>
                  </a>
               </button>
{{--               <button class="btn bg_white w-100 ml-2 border_radius_35 mb-2">--}}
{{--                  <a href="{{route('user.bookMarkJobs')}}">--}}
{{--                     <div class="text-center py-3">--}}
{{--                         <img src="{{ asset('frontend-assets/img/bookmark.png')}}" class="mb-2" />--}}
{{--                        <div class="line-height-normal">--}}
{{--                           <h6 class="mb-0">Bookmarked Jobs</h6>--}}
{{--                        </div>--}}
{{--                     </div>--}}
{{--                  </a>--}}
{{--               </button>--}}
                <button class="btn bg_white w-100 ml-2 border_radius_35 mb-2">
                    <a href="{{ route('user.detail.profile')}}">
                        <div class="text-center py-3">
                            <img src="{{ asset('frontend-assets/img/industry-solid.svg') }}" class="mb-2" alt="">
                            <div class="line-height-normal">
                                <h6 class="mb-0">Detail Profile</h6>
                            </div>
                        </div>
                    </a>
                </button>

            </div>
         </div>
      </div>
   @endsection
