@extends('website_layouts.master')
@section('content')

    <div class="container  min-vh-100 p-0">

        <div class="px-3 px-md-0">
            <div class="mt-3">
                <div class="p-3 bg-white border_radius zindasaab">
                    <div class="mb-2 ">
                        <div>It's a job move, nice to meet you!</div>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <div class="p-3 bg-white border_radius">
                    <div class="mb-2">
                        <div>You can apply just by answering the question.</div>
                        <div>First of all, please tell me your name.</div>
                    </div>
                </div>
            </div>
            <style>
                .a2nd, .a3nd, .a4nd{
                    display: none;
                }
            </style>
            <script>
                $(document).ready(function(){
                    $('.a1st').click(function(){
                        $('.a2nd').css('display', 'block');

                    })
                    $('.a2ndbtn').click(function(){
                        $('.a3nd').css('display', 'block');
                    })
                    $('.a3ndBtn').click(function(){
                        $('.a4nd').css('display', 'block');
                    })
                })
                $(".a1st").click(function() {
                    $('.a2nd').animate({
                            scrollTop: $(".a2nd").offset().top},
                        'slow');
                });
            </script>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{url('/saveJobApply')}}" method="POST">
            @csrf
            <div class="mt-3">
                <div class="p-3 bg-white border_radius">
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="fn">First Name:</label>
                            <input type="text" class="form-control p-2 @error('first_name') is-invalid @enderror" name="first_name"  placeholder="Enter first name" id="fn">
                            <input type="text" class="form-control p-2" hidden name="job_id" value="{{$job_id->id}}">
                        </div>
                        <div class="form-group">
                            <label for="ln">Last Name:</label>
                            <input type="text" class="form-control p-2 @error('last_name') is-invalid @enderror" name="last_name" placeholder="Enter last name" id="ln">
                        </div>
                        <div class="w-75 mx-auto">
                            <a class="btn btn-primary p-2 foo border_radius w-100 a1st" onClick="scrollSmoothToBottom()"><b>Proceed to the next</b></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 a2nd" >
                <div class="p-3 bg-white border_radius">
                    <div class="mb-2">
                        <div>next,</div>
                        <div>Please tell me your date of birth, occupation, and gender!</div>
                    </div>
                </div>
            </div>

            <div class="my-3 a2nd">
                <div class="p-3 bg-white border_radius">
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" name="dob" class="form-control p-2 @error('dob') is-invalid @enderror" placeholder="" id="dob">
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="co">Current occupation:</label>--}}
{{--                            <select name="" class="w-100 form-control" id="co">--}}
{{--                                <option value="" selected=""> Select occupation</option>--}}
{{--                                <option value="">Eating and drinking / food all</option>--}}
{{--                                <option value="">Family restaurant</option>--}}
{{--                                <option value="">IT Services</option>--}}
{{--                                <option value="">Kitchen staff </option>--}}
{{--                                <option value="">Waiters</option>--}}
{{--                                <option value="">Bakery</option>--}}
{{--                                <option value="">BBQ house</option>--}}

{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="form-group ">
                            <label for="gender">Gender:</label> <br>
                            <div class="form-control">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" value="male">Male
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" value="female">Female
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="w-75 mx-auto">
                            <a class="btn btn-primary p-2 foo border_radius w-100 a2ndbtn" onClick="scrollSmoothToBottom()"><b>Proceed to the next</b></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 a3nd">
                <div class="p-3 bg-white border_radius">
                    <div class="mb-2">
                        <div>Then next is the third one! </div>
                        <div>Please tell me your contact information.</div>
                    </div>
                </div>
            </div>

            <div class="my-3 a3nd">
                <div class="p-3 bg-white border_radius">
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="pn">Phone Number:</label>
                            <input type="tel" name="phone_number" class="form-control p-2 @error('phone_number') is-invalid @enderror" placeholder="Enter phone number" id="pn">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" name="email" class="form-control p-2 @error('email') is-invalid @enderror" placeholder="Enter email address" id="email">
{{--                            @error('email')--}}
{{--                            <div class="alert alert-danger">{{ $message }}</div>--}}
{{--                            @enderror--}}
                        </div>
                        <div class="form-group">
                            <label for="password" class="w-100">Password: <span
                                    class="float-right"><i class="fa fa-info-circle"></i> </span></label></label>
                            <input type="password" class="form-control p-2" data-placement="top" data-toggle="tooltip"
                                   title="Enter password" name="password" placeholder="Enter password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="cPassword"  class="w-100">Re-type
                                Password:<span class="float-right"><i class="fa fa-info-circle"></i> </span></label></label>
                            <input data-placement="top" data-toggle="tooltip" title="Enter re-type password" type="password" name="password_confirmation"
                                   class="form-control p-2" placeholder="Enter re-type password" id="cPassword">
                        </div>

                        <div class="w-75 mx-auto" data-toggle="modal" data-target="#exampleModalMoreJob">
                            <a class="btn btn-primary foo p-2 border_radius w-100 a3ndBtn" onClick="scrollSmoothToBottom()"><b>Proceed to the next</b></a>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                function toggle(source) {
                    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                    for (var i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i] != source)
                            checkboxes[i].checked = source.checked;
                    }
                }
            </script>

            <!-- model -->
            <div class="modal fade pr-0" id="exampleModalMoreJob" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5>I will apply. Is it OK?</h5>

                            <div class="my-2" style="padding: 10px;background: #e7e6e4;color: #000;">
                                <div class="form-group form-check d-flex">
                                    <input type="checkbox" class="form-check-input" onclick="toggle(this);" id="exampl22">
                                    <label class="form-check-label" for="exampleCheck1">
                                        <div class="ml-2">
                                            <h6 class="text2 mb-0" >Apply all job at the same time</h6>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="my-4 ml-4" id="ss">
                                @foreach($recommendedJob as $job)
                                <div class="form-group form-check d-flex">
                                    <input type="checkbox"  class="form-check-input"  name="recommendedJob[]"  value="{{$job->id}}">
{{--                                    {{$job->id == $job_id->id ? 'checked' : ''}}--}}
                                    <label class="form-check-label" for="exampleCheck1">
                                        <div class="ml-2">
                                            <h6 class="text2 mb-0" >{{$job->city->name}} - {{$job->occupation->name}} - {{$job->company->name}} - {{$job->about}} </h6>
                                        </div>
                                    </label>
                                </div>
                                @endforeach
                            </div>


                        </div>
                        <div class="modal-footer">
                            <div class="d-flex w-100">
                                <div class="w-50"> <input class="btn btn-secondary w-100" type="button" value="Go back & Fix"></div>
                                <div class="w-50"> <a >
                                        <button type="submit" class="btn btn-primary w-100 ml-2">Apply</button>
                                    </a></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </form>

@endsection
