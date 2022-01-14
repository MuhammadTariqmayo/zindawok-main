
<header class='navbar nav_height bg_light navbar-light py-1 border-bottom fixed-top' id='nav_height'>
      <div class='container p-0'>
        <a class='navbar-brand text-center' href="{{ route('index')}}">
          <img src="{{ asset('frontend-assets/img/newImg/Layer 2.png')}}" class='logooo' />
        </a>

        <div class='form-inline'>
            @if(Auth::guard('web')->check())
          <a href="{{route('user.submitJobAppliedList')}}" class="mr-2 position-relative text-white">
            <span class="badge c_badge">{{Auth::guard('web')->user()->bookMarks()->count()}}</span>
            <img src="{{ asset('frontend-assets/img/bookmark.png')}}" class='header_icon_bookmark ' />
          </a>
            @endif
          <a href='javascript:void(0)' onclick="openNav()">
            <img src="{{ asset('frontend-assets/img/menubar.png')}}" class='header_icon' />
          </a>
        </div>

      </div>
      <div id='myNav' class='overlay d-flex'>
        <div class='ooo flex_1 position-relative' onclick="closeNav()">
        </div>
        <div class='overlay-content flex_3'>
          <div class="">
            <div class="d-flex border border-top-0 border-bottom-0 text-left bg-light px-3 py-2">My List</div>
            @if(Auth::guard('web')->check())
            <div class="border border-top-0 text-left">
              <div id="accordion">
                <div class="border border-top-0">
                  <div class="card-header p-0 border-bottom-0">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
                      <div class="px-3 py-2 border-right-0 d-flex align-items-center">
                        <div style="background-color: #ccc;height: 50px; width:50px; border-radius: 50%">
                          <img src="{{ asset('storage/user_image/'.Auth::guard('web')->user()->image) }}" alt="{{ Auth::guard('web')->user()->name }}" height="50" width="50">
                        </div>
                       <span class="ml-3">{{ Auth::guard('web')->user()->name }}</span>
                      </div>
                    </a>
                  </div>
                  <div id="collapseOne" class="collapse " data-parent="#accordion">
                    <div class="card-body">
                      {{ Auth::guard()->user('web')->email }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @elseif(Auth::guard('company')->check())
            <div class="border border-top-0 text-left">
              <div id="accordion">
                <div class="border border-top-0">
                  <div class="card-header p-0 border-bottom-0">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
                      <div class="px-3 py-2 border-right-0 d-flex align-items-center">
                        <div style="background-color: #ccc;height: 50px; width:50px; border-radius: 50%">
                          <img src="{{ asset('storage/company_logo/'.Auth::guard('company')->user()->logo) }}" alt="{{ Auth::guard('company')->user()->name }}" height="50" width="50">
                        </div>
                       <span class="ml-3">{{ Auth::guard('company')->user()->name }}</span>
                      </div>
                    </a>
                  </div>
                  <div id="collapseOne" class="collapse " data-parent="#accordion">
                    <div class="card-body">
                      {{ Auth::guard('company')->user()->email }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @if(Auth::guard('web')->check())
            <div class="border border-top-0 text-left">
              <div class="px-3 py-2 border-right ">
                <a class="p-0 d-flex align-items-center py-1" href="{{route('user.bookMarkJobs')}}">
                  <span class="d-flex"> Bookmark</span> <span class="badge ml-3 badge-warning">{{Auth::guard('web')->user()->bookMarks()->count()}}</span>
                </a>
              </div>
            </div>
            @endif

            <div class="border border-top-0 text-left">
              <div class="px-3 py-2 border-right ">
                <a class="p-0 d-flex justify-content-start align-items-center py-1" href="SubmitList.html"> Recent
                  History
                </a>
              </div>
            </div>
            @if(Auth::guard('web')->check())
            <div class="border border-top-0 text-left">
              <div class="px-3 py-2 border-right ">
                <a class="p-0 d-flex justify-content-start align-items-center py-1" href="{{route('user.submitJobAppliedList')}}"> Applied List
                </a>
              </div>
            </div>
            @endif
            @if(Auth::guard('web')->check())
            <div class="border border-top-0 text-left">
              <div class="px-3 py-2 border-right ">
                <a class="p-0 d-flex justify-content-start align-items-center py-1" href="{{route('user.dashboard')}}">User My Page
                </a>
              </div>
            </div>
            @endif
            @if(Auth::guard('company')->check())
            <div class="border border-top-0 text-left">
              <div class="px-3 py-2 border-right ">
                <a class="p-0 d-flex justify-content-start align-items-center py-1" href="{{ route('company.dashboard')}}">Company My
                  Page
                </a>
              </div>
            </div>
            @endif
            @if(Auth::check())
            <div class="border border-top-0 text-left">
              <div class="px-3 py-2 border-right ">
                <a class="p-0 d-flex justify-content-start align-items-center py-1" href="{{ route('feed.store')}}"> Feedback
                </a>
              </div>
            </div>
            @endif
            <div class="border border-top-0 text-left">
              <div class="px-3 py-2 border-right ">
                <a class="p-0 d-flex justify-content-start align-items-center py-1" href="{{route('register')}}">
                  Registration
                </a>
              </div>
            </div>
            @if(Auth::guard('web')->check())
            <div class="border border-top-0 text-left">
              <div class="px-3 py-2 border-right ">
                <a class="p-0 d-flex justify-content-start align-items-center py-1" href="javascript:;" onclick="event.preventDefault(); document.getElementById('user-logout-form').submit();"><i class="ft-power"></i> User Logout</a>
                <form id="user-logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
              </div>
            </div>
            @elseif(Auth::guard('company')->check())
            <div class="border border-top-0 text-left">
              <div class="px-3 py-2 border-right ">
                <a class="p-0 d-flex justify-content-start align-items-center py-1" href="javascript:;" onclick="event.preventDefault(); document.getElementById('company-logout-form').submit();"><i class="ft-power"></i> Company Logout</a>
                <form id="company-logout-form" action="{{ route('company.logout') }}" method="POST">
                    @csrf
                </form>
              </div>
            </div>
            @else
            <div class="border border-top-0 text-left">
              <div class="px-3 py-2 border-right">
                <a class="p-0 d-flex justify-content-start align-items-center py-1" href="{{ route('login') }}"> User Login
                </a>
              </div>
            </div>
            <div class="border border-top-0 text-left">
              <div class="px-3 py-2 border-right">
                <a class="p-0 d-flex justify-content-start align-items-center py-1" href="{{ route('company.login') }}"> Company Login
                </a>
              </div>
            </div>
            @endif
            <div class="border border-top-0 text-left">
                <div class="px-3 py-2 border-right">
                  <a class="p-0 d-flex justify-content-start align-items-center py-1" href="{{ route('contact.contactus') }}">Contect Us
                  </a>
                </div>
              </div>

          </div>
        </div>
      </div>

    </header>
