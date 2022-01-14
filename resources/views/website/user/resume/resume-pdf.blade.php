<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
            list-style:none;
            box-sizing:border-box;
        }
        .leftSection,
        .RightSection{
            position:relative;
            padding:5px;
            height:640px;
            width:500px;
            margin-top:100px;
            margin-left:35px;
            /* border:1px solid; */
            display:inline-block
        }
        .RightSection{
        }
        .heading_ele,
        .heading_ele_contact{
            display:block;
            padding:3px;
            padding-left:5px;
            border:1px solid;
            background-color:lightgray;
            width:370px;
        }
        .heading_ele_contact{
            width:482px;
        }
        .date{
            position:relative;
            width:380px;
        }
        .user_name,
        .user_birth,
        .user_gender{
            padding:5px;
            border:1px solid;
            height:21px;
            width:368px;
            display:block;
        }
        .user_birth{
            width:257px;
        }
        .user_gender{
            position:absolute;
            top:0px;
            right:0px;
            width:100px;
        }
        .user_image{
            border:1px solid;
            display:block;
            height:110px;
            width:100px;
            position:absolute;
            right:0px;
            top:2%;
        }
        .blocks{
            position:absolute;
            height:100px;
            width:492px;
            /* border:1px solid;  */
        }
        .leftSection > .basic_info{
            border:none;
            height:130px;
        }
        .leftSection > .basic_info{
            height:130px;
        }
        .leftSection > .contactInfo{
            top:20%;
        }
        .address_detail,
        .email_detail,
        .phone_detail{
            position:absolute;
            padding:5px;
            top:4.3%;
            width:270px;
            border:1px solid;
        }
        .address_detail{
            height:70px;
        }
        .phone_detail{
            right:0px;
            height:30px;
            width:199px;
        }
        .email_detail{
            top:11.6%;
            right:0px;
            height:30px;
            width:199px;
        }
        .leftSection > .introduction{
            position:relative;
            height:120px;
            top:38%;
        }
        .Yourself{
            top:5.9%;
            height:83px;
            padding:5px;
            display:block;
            width:300px;
            border:1px solid;
        }
        .Hobbies{
            position:absolute;
            border:1px solid;
            display:block;
            padding:5px;
            height:83px;
            width:169px;
            top:5.9%;
            right:0px;
        }
        .leftSection > .career{
            height:125px;
            top:58%;
        }
        .leftSection > .company{
            height:110px;
            top:79%;
        }
        .company_name{
            height:18px;
            top:5%;
            border:1px solid;
        }
        .job_description{
            display:block;
            height:70px;
            width:480px;
            padding:5px;
            border:1px solid;
        }
        .comp_des{
            height:70px;
            padding:4px;
            width:482px;
            border:1px solid;
            display:block;
        }
        /* rightsection */
        .RightSection > .education_background{
            height:130px;
        }
        .heading_qualification{
        border:1px solid;
        }
        .qualification{
            margin-top:3px;
            display:inline-block;
            border:1px solid;
            width:110px;
        }
        .first_sec{
            height:104px;
            width:91px;
        }
        .first_sec>small{
            padding:5px;
            display:block;
            height:20px;
            border:1px solid;
        }
        .second_sec{
            position:absolute;
            top:3.6%;
            left:18.5%;
            height:106px;
            width:311px;
        }
        .second_sec>small{
            padding:5px;
            display:block;
            height:20px;
            border:1px solid;
        }
        .third_sec{
            position:absolute;
            top:3.6%;
            right:0px;
            height:107px;
            width:90px;
        }
        .person{
            margin-top:1%;
        }
        .skills_sec>small,
        .future_goals>small,
        .further_info>small,
        .skills_personal>small{
            padding:5px;
            display:block;
            height:15px;
            border:1px solid;
        }
        .skills_sec>small{
            width:47.8%;
        }
        .skills_personal>small{
            /* height:15.50px; */
        }
        .skills_personal{
            position:absolute;
            left:50%;
            top:5.9%;
            width:50%;
        }
        .further_info>small{
            height:18px;
        }
        .third_sec>small{
            padding:5px;
            display:block;
            height:20px;
            border:1px solid;
        }
        .first_sec>small:nth-child(1),
        .second_sec>small:nth-child(1),
        .third_sec>small:nth-child(1){
            padding:3px;
            height:15px;
            font-size:12px
        }
        .personal{
            top:4.6%;
        }
        .RightSection > .personal_background{
            top:22%;
        }
        .RightSection > .prof_skills{
            top:40%;
            height:120px;
        }
        .RightSection > .future_goals{
            height:110px;
            top:61%;
        }
        .RightSection > .further_info{
            top:78%;
        }
        .image{
            position:absolute;
            height:40px;
            width:200px;
            left:3.6%;
            bottom:10px;
        }
        .water-mark{
            position:fixed;
            color:lightgrey;
            opacity:0.5;
            top:27%;
            left:15%;
            z-index:-1;
            transform:rotate(-40deg);
            font-size:11rem;
        }
        .user_image > img {
            height:110px;
            width:100px;
        }
    </style>
</head>

<body>
    <!-- LeftScetion Start -->
    <section class="leftSection">
        <div class="blocks basic_info">
        <li><b>Curriculum Vitae</b> <small style="margin-left:90px"></small></li>
            <div class="user_image">
                <img src="{{ public_path('storage/user_image/'.$user->image)}}" alt="alt" >
            </div>
            <b class="heading_ele" style="margin-top:15px;"><small>BasicInfo</small></b>
            <small class="user_name">{{ $user->name }}</small>
            <li class="date">
                <small class="user_birth">{{ $user->date_of_birth }}</small>
                <small class="user_gender">{{ $user->gender }}</small>
            </li>
        </div>
        <!--  -->
        <div class="blocks contactInfo">
        <b class="heading_ele_contact"><small>Conatct Information</small></b>
        <div class="address_detail">
            <small>{{ $user->location }}</small>
        </div>
        <div class="phone_detail">
            <small>{{ $user->phone }}</small>
        </div>
        <div class="email_detail">
            <small>{{ $user->email }}</small>
        </div>
        </div>
        <!--  -->
        <div class="blocks introduction">
        <b class="heading_ele_contact"><small>Introduction</small></b>
        <small class="Yourself">{{$user->about}}</small>
        <div class="Hobbies"><small></small></div>
        </div>
        <!--  -->
        <div class="blocks career">
        <b class="heading_ele_contact"><small>Career Information</small></b>
        @foreach($careerBackgrounds as $careerBackground)
        <small style="display:block;padding-left:5px;height:23px;border:1px solid"><b>{{ $careerBackground->job_title}}</b> - {{$careerBackground->company}}</small>
        <small class="job_description"> From {{$careerBackground->start_date}} to {{$careerBackground->end_date}}</small>
        @endforeach
        </div>
        <!--  -->
      <!--  -->
    </section>
    <!-- RightSection Start -->
    <section class="RightSection">
<div class="blocks education_background">
<b class="heading_ele_contact"><small>Education Background</small></b>
<div class="first_sec">
<small>Qualification</small>
@foreach($qualifications as $qualification)
<small>{{ $qualification->degree }}</small>
@endforeach
</div>
<div class="second_sec">
<small>School / Establishment</small>
@foreach($qualifications as $qualification)
<small>{{ $qualification->school_name }}</small>
@endforeach
</div>
<div class="third_sec">
<small>Year</small>
@foreach($qualifications as $qualification)
<small>{{ $qualification->school_end_date }}</small>
@endforeach
</div>
</div>
<div class="blocks personal_background">
<b class="heading_ele_contact"><small>Personal Background</small></b>
<div class="first_sec">
<small>Qualification</small>
@foreach($personalizedBackgrounds as $personalizedBackground)
<small>{{$personalizedBackground->qualification}}</small>
@endforeach
</div>
<div class="second_sec personal">
<small>Certified</small>
@foreach($personalizedBackgrounds as $personalizedBackground)
<small>{{$personalizedBackground->institution}}</small>
@endforeach
</div>
<div class="third_sec person">
<small>Year</small>
@foreach($personalizedBackgrounds as $personalizedBackground)
<small>{{$personalizedBackground->end_date}}</small>
@endforeach
</div>
</div>
</div>
<div class="blocks prof_skills">
<b class="heading_ele_contact"><small>Professional Skills</small><small style="margin-left:27%;">InterPersonal Skills</small></b>
<div class="skills_sec">
@foreach($professional_skills as $row)
<small>{{$row}}</small>
@endforeach


</div>
<div class="skills_personal">
@foreach($interpersonal_skills as $row)
<small>{{$row}}</small>
@endforeach
</div>
</div>
<div class="blocks future_goals">
<b class="heading_ele_contact"><small>Future Goals</small></b>
<div class="future_goals">
<small>{{ $user->future_goals }}</small>
</div>
</div>
<div class="blocks further_info">
<b class="heading_ele_contact"><small>Further Information</small></b>
<div class="further_info">
<small> <b>English Level</b> - {{$user->english_level}}</small>
<small><b>Current Employment Status</b> -  @if($user->employment_status == 1) Employeed @else Unemployeed @endif  </small>
<small><b>CNIC</b> - {{$user->cnic}}</small>
</div>
</div>
    </section>
    <div class="image">
    <!-- <img src="../public/Images/logobiz.png" alt="" style="height:40px;width:200px;"> -->
    <h4>Zindawork</h4>
    </div>
    <h1 class="water-mark">Zindawork</h1>
</body>
</html>
