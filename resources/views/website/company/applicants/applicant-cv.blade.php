@extends('website_layouts.master')
<style>

    *{
        list-style: none;
    }

    .right p{
        margin-bottom: 0;
    }
    .resume{
        width: 800px;
        background: #fff;
        margin: 25px auto;
        display: flex;
    }

    .left{
        background: #292b2f;
        width: 250px;
        padding: 0 20px;
    }

    .right{
        width: 100%;
    }

    .left .img_holder{
        text-align: center;
        padding: 20px 0;
    }

    .left .img_holder img{
        width: 200px;
        border-radius: 30px;
    }

    .pb{
        padding-bottom: 20px;
    }

    .title{
        font-size: 20px;
        font-weight: 600;
        text-transform: uppercase;
        padding-bottom: 10px;
        color: #3525af;
        position: relative;
    }


    .left .icon{
        font-size: 20px;
        color: #9153c9;
    }

    .left .text{
        color: #9153c9;
        text-transform: uppercase;
        font-size: 13px;
    }

    .contact .li_wrap{
        display: flex;
        align-items: center;
        width: 100%;
        margin-bottom: 15px;
    }

    .contact .li_wrap .icon{
        width: 50px;
        height: 50px;
        background: #fff;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
    }

    .contact .li_wrap .text{
        width: calc(100% - 50px);
        word-break: break-word;
        color: #fff;
    }

    .skills ul,
    .hobbies ul{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .skills .li_wrap,
    .hobbies .li_wrap{
        width: 100px;
        height: 100px;
        margin-bottom: 15px;
        border-radius: 15px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .skills .li_wrap{
        background: #fff;
    }

    .skills .li_wrap .text,
    .hobbies .li_wrap .text{
        margin-top: 5px;
    }

    .hobbies .li_wrap{
        border: 2px solid #fff;
    }

    .hobbies .li_wrap .icon,
    .hobbies .li_wrap .text{
        color: #fff;
    }

    .hobbies .li_wrap:hover{
        background: #fff;
    }

    .hobbies .li_wrap:hover .icon,
    .hobbies .li_wrap:hover .text{
        color: #9153c9;
    }

    .header{
        background: #e4e7e9;
        padding: 15px;
        color: #666;
    }

    .header .name{
        font-size: 20px;
        text-transform: uppercase;
        font-weight: 600;
        color: #3525af;
    }

    .header .role{
        font-weight: 500;
        font-size: 16px;
    }

    .header .about{
        font-size: 14px;
    }

    .right_inner{
        padding: 30px 0;
        color: #292b2f;
    }

    .right_inner .education{
    }

    .right_inner .li_wrap{
        display: flex;
        margin-bottom: 15px;
    }

    .right_inner .li_wrap .date {
        width: 90px;
        color: #9153c9;
        font-size: 12px;
    }

    .right_inner .li_wrap .info{
        width: 100%;
        padding-left: 25px;
        position: relative;
    }

    .right_inner .li_wrap .info_title{
        font-weight: 600;
        color: #9153c9;
    }

    .right_inner .li_wrap .info_com{
        font-weight: 600;
        font-size: 14px;
        margin-top: 3px;
    }

    .right_inner .li_wrap .info_cont{
        font-size: 14px;
    }

    .right_inner .li_wrap .info:before{
        content: "";
        position: absolute;
        top: 3px;
        left: 0;
        width: 10px;
        height: 10px;
        background: #9153c9;
        border-radius: 50%;
    }
    .right_inner .li_wrap .info1:before{
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

    .right_inner .li_wrap .info:after{
        content: "";
        position: absolute;
        top: 10px;
        left: 4px;
        width: 2px;
        height: 90%;
        background: #9153c9;
    }
    .right_inner .li_wrap .info1:after{
        content: "";
        position: absolute;
        top: 10px;
        left: 4px;
        width: 2px;
        height: 0%;
        background: #9153c9;
    }
</style>
@section('content')
    <div class="mt-3">
        <div class="p-3 bg-white border_radius py-5">
            <h4 class="text-center">Curriculum Vitae</h4>
        </div>
    </div>

    <!-- cv start -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

    <div class="mt-3">
        <div class="p-3 bg-white border_radius">
            <div class="right">
                <div class="header">
                    <div class="d-flex">
                        <div class="flex_1">
                            <div class="name_role">
                                <div class="name text-uppercase">
                                    {{$applicantCV->name}}
                                </div>
                                <div class="role text-uppercase">
                                    @foreach($applicantCV->careerBackgrounds as $experience)
                                        {{$experience->job_title ?? ''}} ,
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="">
                            @if($applicantCV->image==null)
                                <div class="author-card-avatar"><img style="height: 50px;border-radius: 50%;margin-left: 12px;" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Daniel Adams"></div>
                            @else
                                <div class="author-card-avatar"><img style="height: 50px;border-radius: 50%;margin-left: 12px;" src="{{asset('/storage/user_image/'.$applicantCV->image)}}" alt="{{$applicantCV->name}}"></div>
                            @endif
                        </div>
                    </div>
                    <div class="about">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta beatae optio, corporis fugit accusantium debitis laborum tenetur, quisquam distinctio nihil quam eum. Laudantium saepe, sunt, esse laboriosam dolores distinctio?
                    </div>
                </div>
                <div class="right_inner">
                    <div class="exp">
                        <div class="title">
                            experience
                        </div>
                        <div class="exp_wrap">
                            @foreach($applicantCV->careerBackgrounds as $experience)
                            <ul class="pl-0">
                                <li>
                                    <div class="li_wrap">
                                        <div class="date">
                                            {{date('F d',strtotime($experience->start_date ?? ''))}} - {{$experience->end_date ?? ''}}
                                        </div>
                                        <div class="info">
                                            <p class="info_title text-uppercase">
                                                {{$experience->job_title ?? ''}}
                                            </p>
                                            <p class="info_com">
                                                {{$experience->company ?? ''}} Inc
                                            </p>
                                            <p class="info_cont">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptatibus consequatur rem nostrum omnis! Architecto.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="education">
                        <div class="title">
                            Education
                        </div>
                        <div class="education_wrap">
                            @foreach($applicantCV->qualifications as $qualification)
                            <ul class="pl-0">
                                <li>
                                    <div class="li_wrap">
                                        <div class="date">
                                            {{\Carbon\Carbon::createFromFormat('Y-m-d', $qualification->school_start_date ?? '')->format('Y')}} - {{\Carbon\Carbon::createFromFormat('Y-m-d', $qualification->school_end_date ?? '')->format('Y')}}
                                        </div>
                                        <div class="info">
                                            <p class="info_title">
                                                {{$qualification->degree ?? ''}}
                                            </p>
                                            <p class="info_com">
                                                {{$qualification->school_name ?? ''}}
                                            </p>
                                            <p class="info_cont">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptatibus consequatur rem nostrum omnis! Architecto.
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="education">
                        <div class="title">
                            Certification
                        </div>
                        <div class="education_wrap">
                            <ul class="pl-0">
                                @foreach($applicantCV->personalizedBackgrounds as $personalizedBackground)
                                <li>
                                    <div class="li_wrap">
                                        <div class="date">
                                            {{$personalizedBackground->start_date ?? ''}} - {{$personalizedBackground->end_date ?? ''}}
                                        </div>
                                        <div class="info">
                                            <p class="info_title">
                                                 {{$personalizedBackground->qualification ?? ''}}
                                            </p>
                                            <p class="info_com">
                                                {{$personalizedBackground->institution ?? ''}}
                                            </p>
                                            <p class="info_cont">
                                                {{$personalizedBackground->institution_address ?? ''}}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
{{--                                <li>--}}
{{--                                    <div class="li_wrap">--}}
{{--                                        <div class="date">--}}
{{--                                            06 Month--}}
{{--                                        </div>--}}
{{--                                        <div class="info">--}}
{{--                                            <p class="info_title">--}}
{{--                                                Database Administration--}}
{{--                                            </p>--}}
{{--                                            <p class="info_com">--}}
{{--                                                EVS--}}
{{--                                            </p>--}}
{{--                                            <p class="info_cont">--}}
{{--                                                Canel road, Street no. 3J, Lahore--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

                            </ul>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="flex_1">
                            <div class="education">
                                <div class="title">
                                    Skill
                                </div>
                                <div class="education_wrap">
                                    <ul class="pl-0">
                                        @foreach($explodeSkills as $skills)
                                        <li>
                                            <div class="li_wrap mb-0">
                                                <div class="info info1">
                                                    {{$skills}}
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
                                    Language
                                </div>
                                <div class="education_wrap">
                                    <ul class="pl-0">
                                        <li>
                                            <div class="li_wrap mb-0">
                                                <div class="info info1">
                                                    English ({{$applicantCV->english_level ?? ''}})
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="li_wrap mb-0">
                                                <div class="info info1">
                                                    Urdu
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="education">
                        <div class="title">
                            Goal
                        </div>
                        <div class="education_wrap">
                            <p class="info_cont mb-3">
                                {{$applicantCV->future_goals ?? ''}}
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
                                            {{$applicantCV->email}}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="li_wrap mb-0">
                                        <div class="info info1">
                                            {{$applicantCV->phone}}
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="li_wrap mb-0">
                                        <div class="info info1">
                                            {{$applicantCV->location ?? ''}}
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

    <div class="mt-3 position-sticky d-md-none" style="bottom: 0">
        <div class="p-3 bg-white border_radius">
            <a href="{{url('company/cv-pdf/'.$applicantCV->id)}}" class="btn btn-info w-100">Download</a>
        </div>
    </div>
    <div class="mt-3 position-sticky d-md-flex d-none" style="bottom: 0">
        <div class="p-3 bg-white border_radius w-100 d-flex">
            <a href="{{url('company/cv-pdf/'.$applicantCV->id)}}" class="w-50 mx-1">
                <button class="btn btn-info w-100 mx-1">Download</button>
            </a>
            <a href="CV.html" class="w-50 mx-1">
                <button class="btn btn-success mx-1 w-100">Preview</button>
            </a>
        </div>
    </div>


@endsection
