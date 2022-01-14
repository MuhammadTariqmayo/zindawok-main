@extends('website_layouts.master')
@section('style')
	<style>
    * {
      list-style: none;
    }

    .right p {
      margin-bottom: 0;
    }

    .resume {
      width: 800px;
      background: #fff;
      margin: 25px auto;
      display: flex;
    }

    .left {
      background: #292b2f;
      width: 250px;
      padding: 0 20px;
    }

    .right {
      width: 100%;
    }

    .left .img_holder {
      text-align: center;
      padding: 20px 0;
    }

    .left .img_holder img {
      width: 200px;
      border-radius: 30px;
    }

    .pb {
      padding-bottom: 20px;
    }

    .title {
      font-size: 20px;
      font-weight: 600;
      text-transform: uppercase;
      padding-bottom: 10px;
      color: #3525af;
      position: relative;
    }


    .left .icon {
      font-size: 20px;
      color: #9153c9;
    }

    .left .text {
      color: #9153c9;
      text-transform: uppercase;
      font-size: 13px;
    }

    .contact .li_wrap {
      display: flex;
      align-items: center;
      width: 100%;
      margin-bottom: 15px;
    }

    .contact .li_wrap .icon {
      width: 50px;
      height: 50px;
      background: #fff;
      border-radius: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 15px;
    }

    .contact .li_wrap .text {
      width: calc(100% - 50px);
      word-break: break-word;
      color: #fff;
    }

    .skills ul,
    .hobbies ul {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .skills .li_wrap,
    .hobbies .li_wrap {
      width: 100px;
      height: 100px;
      margin-bottom: 15px;
      border-radius: 15px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .skills .li_wrap {
      background: #fff;
    }

    .skills .li_wrap .text,
    .hobbies .li_wrap .text {
      margin-top: 5px;
    }

    .hobbies .li_wrap {
      border: 2px solid #fff;
    }

    .hobbies .li_wrap .icon,
    .hobbies .li_wrap .text {
      color: #fff;
    }

    .hobbies .li_wrap:hover {
      background: #fff;
    }

    .hobbies .li_wrap:hover .icon,
    .hobbies .li_wrap:hover .text {
      color: #9153c9;
    }

    .header {
      background: #e4e7e9;
      padding: 15px;
      color: #666;
    }

    .header .name {
      font-size: 20px;
      text-transform: uppercase;
      font-weight: 600;
      color: #3525af;
    }

    .header .role {
      font-weight: 500;
      font-size: 16px;
    }

    .header .about {
      font-size: 14px;
    }

    .right_inner {
      padding: 30px 0;
      color: #292b2f;
    }

    .right_inner .education {}

    .right_inner .li_wrap {
      display: flex;
      margin-bottom: 15px;
    }

    .right_inner .li_wrap .date {
      width: 90px;
      color: #9153c9;
      font-size: 12px;
    }

    .right_inner .li_wrap .info {
      width: 100%;
      padding-left: 25px;
      position: relative;
    }

    .right_inner .li_wrap .info_title {
      font-weight: 600;
      color: #9153c9;
    }

    .right_inner .li_wrap .info_com {
      font-weight: 600;
      font-size: 14px;
      margin-top: 3px;
    }

    .right_inner .li_wrap .info_cont {
      font-size: 14px;
    }

    .right_inner .li_wrap .info:before {
      content: "";
      position: absolute;
      top: 3px;
      left: 0;
      width: 10px;
      height: 10px;
      background: #9153c9;
      border-radius: 50%;
    }

    .right_inner .li_wrap .info1:before {
      content: "";
      position: absolute;
      top: 50%;
      left: 0;
      transform: translate(0%, -25%);
      width: 10px;
      height: 10px;
      background: #9153c9;
      border-radius: 50%;
    }

    .right_inner .li_wrap .info:after {
      content: "";
      position: absolute;
      top: 10px;
      left: 4px;
      width: 2px;
      height: 90%;
      background: #9153c9;
    }

    .right_inner .li_wrap .info1:after {
      content: "";
      position: absolute;
      top: 10px;
      left: 4px;
      width: 2px;
      height: 0%;
      background: #9153c9;
    }
  </style>
@endsection
@section('content')
<div class="px-3 px-md-0 mt-5 pt-3">
    <div class="mt-3">
        <div class="p-3 bg-white border_radius py-5">
          <h4 class="text-center">Curriculum Vitae</h4>
        </div>
    </div>
	<div class="mt-3">
        <div class="p-3 bg-white border_radius">
          <div class="right">
            <div class="header">
              <div class="d-flex">
                <div class="flex_1">
                  <div class="name_role">
                    <div class="name text-uppercase">
                      {{ Auth::guard('web')->user()->name }}
                    </div>
                    <div class="role text-uppercase">

                    </div>
                  </div>
                </div>
                <div class="">

                  <div class="author-card-avatar"><img style="height: 50px;border-radius: 50%;margin-left: 12px;"
                      src="{{ asset('storage/user_image/'.Auth::guard('web')->user()->image) }}" alt="{{ Auth::guard('web')->user()->name }}" height="50px" width="50px">
                  </div>
                </div>
              </div>
              <div class="about">
                {{ Auth::guard('web')->user()->about }}
              </div>
            </div>
            <div class="right_inner">
              <div class="exp">
                <div class="title">
                  experience
                </div>
                <div class="exp_wrap">
                  <ul class="pl-0">
                    <li>
                      <div class="li_wrap">
                        <div class="date">
                          Nov-20 - Present
                        </div>
                        <div class="info">
                          <p class="info_title text-uppercase">
                            Frontend Developer
                          </p>
                          <p class="info_com">
                            Idenbrid Inc
                          </p>
                          <p class="info_cont">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptatibus consequatur rem
                            nostrum omnis! Architecto.
                          </p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="li_wrap">
                        <div class="date">
                          Apr-19 - Oct-20
                        </div>
                        <div class="info">
                          <p class="info_title">
                            Junior Frontend Developer
                          </p>
                          <p class="info_com">
                            Beweb3
                          </p>
                          <p class="info_cont">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptatibus consequatur rem
                            nostrum omnis! Architecto.
                          </p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="li_wrap">
                        <div class="date">
                          Jan-19 - Mar-19
                        </div>
                        <div class="info">
                          <p class="info_title">
                            Junior UI Developer (Internship)
                          </p>
                          <p class="info_com">
                            Coinbitsolutions
                          </p>
                          <p class="info_cont">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptatibus consequatur rem
                            nostrum omnis! Architecto.
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="education">
                <div class="title">
                  Education
                </div>
                <div class="education_wrap">
                  <ul class="pl-0">
                    <li>
                      <div class="li_wrap">
                        <div class="date">
                          2014 - 2018
                        </div>
                        <div class="info">
                          <p class="info_title">
                            Software Engineering
                          </p>
                          <p class="info_com">
                            University of Sargodha
                          </p>
                          <p class="info_cont">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptatibus consequatur rem
                            nostrum omnis! Architecto.
                          </p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="li_wrap">
                        <div class="date">
                          2012 - 2014
                        </div>
                        <div class="info">
                          <p class="info_title">
                            Pre-Engineering
                          </p>
                          <p class="info_com">
                            Punjab Group of College
                          </p>
                          <p class="info_cont">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptatibus consequatur rem
                            nostrum omnis! Architecto.
                          </p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="li_wrap">
                        <div class="date">
                          2010 - 2012
                        </div>
                        <div class="info">
                          <p class="info_title">
                            Matriculation
                          </p>
                          <p class="info_com">
                            Govt Islamia High School
                          </p>
                          <p class="info_cont">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptatibus consequatur rem
                            nostrum omnis! Architecto.
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="education">
                <div class="title">
                  Certification
                </div>
                <div class="education_wrap">
                  <ul class="pl-0">
                    <li>
                      <div class="li_wrap">
                        <div class="date">
                          06 Month
                        </div>
                        <div class="info">
                          <p class="info_title">
                            Graphic Dasigning
                          </p>
                          <p class="info_com">
                            EVS
                          </p>
                          <p class="info_cont">
                            Canel road, Street no. 3J, Lahore
                          </p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="li_wrap">
                        <div class="date">
                          06 Month
                        </div>
                        <div class="info">
                          <p class="info_title">
                            Database Administration
                          </p>
                          <p class="info_com">
                            EVS
                          </p>
                          <p class="info_cont">
                            Canel road, Street no. 3J, Lahore
                          </p>
                        </div>
                      </div>
                    </li>

                  </ul>
                </div>
              </div>

              <div class="d-flex">
                <div class="flex_1">
                  <div class="education">
                    <div class="title">
                      Professional Skills
                    </div>
                    <div class="education_wrap">
                      <ul class="pl-0">
                        @foreach($profSkills as $skill)
                        <li>
                          <div class="li_wrap mb-0">
                            <div class="info info1">
                              {{ $skill }}
                            </div>
                          </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="flex_1">
                  <div class="education">
                    <div class="title">
                      Interpersonal Skills
                    </div>
                    <div class="education_wrap">
                      <ul class="pl-0">
                        @foreach($intpersonalSkills as $skills)
                        <li>
                          <div class="li_wrap mb-0">
                            <div class="info info1">
                              {{ $skills }}
                            </div>
                          </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="education">
                <div class="title">
                  Future Goal
                </div>
                <div class="education_wrap">
                  <p class="info_cont mb-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptatibus consequatur rem nostrum
                    omnis! Architecto.
                  </p>
                </div>
              </div>

              <div class="education">
                <div class="title">
                  Contact
                </div>
                <div class="education_wrap">
                  <ul class="pl-0">
                    <li>
                      <div class="li_wrap mb-0">
                        <div class="info info1">
                          	{{ Auth::guard('web')->user()->email }}
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="li_wrap mb-0">
                        <div class="info info1">
                          	{{ Auth::guard('web')->user()->phone }}
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="li_wrap mb-0">
                        <div class="info info1">
                          	{{ Auth::guard('web')->user()->location }}
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>




            </div>
          </div>
        </div>
      </div>
      <!-- cv end -->

      {{-- <div class="mt-3 position-sticky d-md-none" style="bottom: 0">
        <div class="p-3 bg-white border_radius">
          <button class="btn btn-info w-100">Download</button>
        </div>
      </div> --}}
      <div class="mt-3 position-sticky d-md-flex d-none" style="bottom: 0">
        <div class="p-3 bg-white border_radius w-100 d-flex">
          <a href="{{route('user.resume.pdf')}}" class="w-50 mx-1">
            <button class="btn btn-info w-100 mx-1">Download</button>
          </a>
          <a href="CV.html" class="w-50 mx-1">
            <button class="btn btn-success mx-1 w-100">Preview</button>
          </a>
        </div>
      </div>
</div>
@endsection
@section('script')
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
@endsection
