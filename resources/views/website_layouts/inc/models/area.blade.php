<form action="">
    <div class="modal" id="myModalTopPage">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div id="accordion">
                        @foreach($provinces as $province)
                        <div class="card mb-2">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#{{$province->name}}">
{{--                                    Punjab--}}
                                    {{$province->name}}
                                </a>
                            </div>

                            <div id="{{$province->name}}" class="collapse" data-parent="#accordion">
                                <div class="card-body p-3">
                                    <!-- city start punjab -->
                                    <div id="accordioncity">
                                        <div class="card mb-2">
                                            @foreach($province->city as $city)
                                            <div class="card-header">
                                                <a class="card-link" data-toggle="collapse" href="#" onclick="getCityJobs({{$city->id}})">
                                                    {{$city->name}}
                                                </a>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>

                                    <!-- city end punjab -->
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex w-100">
                        <div class="w-25"> <input type="reset" class="btn btn-secondary w-100" value="clear" /></div>
                        <div class="w-75"> <a id="city_id">
                                <button type="button" id="count_jobs" class="btn btn-primary w-100 ml-2">result 0</button>
                            </a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
<script>
    function getCityJobs($id){
        let city_jobs_id=$id;
        $.ajax({
            method: "GET",
            url: "/countCityJobs/" + city_jobs_id,
            success: function(data) {
                console.log(data)
                $("#count_jobs").html("Result: " + data.jobs);
                $('#city_id').attr('href', '{{url('jobListing')}}/'+city_jobs_id);
            }
        });
    }
</script>
