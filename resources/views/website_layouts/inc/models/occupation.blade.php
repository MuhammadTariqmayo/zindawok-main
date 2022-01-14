      <form action="">
        <div class="modal" id="myModalOccupationTopPage">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
{{--                <div class="d-flex my-3 flex-row-reverse">--}}
{{--                  <div class="btn btn-primary ml-2" style="width: 100px;">search</div>--}}
{{--                  <input type="text" id="myInput" class="w-100 p-2 border input_radius" placeholder="Search occupation">--}}
{{--                </div>--}}
                <div class="p-0 mb-3 col-12">
                  <div class="form-group">
                    <label for="fn">Industry:</label>
                    <select id="industry_id" name="industry_id" class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0">

                        <option value="" selected="" disabled="">Select Industry:</option>
                        @foreach($industries as $industry)
                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                        @endforeach

                    </select>
                  </div>
                </div>
                <div class="p-0 col-12">
                  <div class="form-group">
                    <label for="fn">Occupation</label>
                      <select name="occupation_id" id="occupation_id" class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0" required>

                      </select>
                  </div>
                </div>
                <div class="p-0 col-12">
                  <div class="form-group">
                    <label for="fn">Suboccupation</label>
                      <select name="sub_occupation_id" id="sub_occupation" class="form-control w100 mr-md-2 px-2 mb-2 mb-md-0" required>
                      </select>
                  </div>
                </div>

              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <div class="d-flex w-100">
                  <div class="w-25"> <input type="reset" class="btn btn-secondary w-100" va></button></div>
                  <div class="w-75"> <a id="industry">
                      <button type="button" id="job_count" class="btn btn-primary w-100 ml-2">result 0</button>
                    </a></div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </form>

<script>
  $(document).ready(function() {
      $("#industry_id").on('change', function(){
          $("#occupation_id").empty().append("<option value=''>Select Occupation</option>");
          $("#sub_occupation").empty().append("<option value=''>Select Sub Occupation</option>");
          var industry_id = $("#industry_id").val();
          if(industry_id != "") {
              $.ajax({
                  method: "GET",
                  url: '/getOccupations/' + industry_id,
                  success: function(result) {
                      if(result.status == "success") {
                          console.log(result.occupations);
                          $.each(result.occupations, function(key, value){
                              $("#occupation_id").append(
                                  "<option value=" + value.id +">"+value.name+"</option>"
                              );
                          });
                          $('#job_count').html('result' + result.countIndustyJobs);

                          $('#industry').attr('href','{{url('industryJobs')}}/'+industry_id);
                      }
                  }
              });
          }
      });

  $("#occupation_id").on('change', function(){
      $("#sub_occupation").empty().append("<option value=''>Select Sub Occupation</option>");
      var occupation_id = $("#occupation_id").val();
      var industry_id = $("#industry_id").val();
      if(occupation_id != "" && industry_id != "") {
          $.ajax({
              method: "GET",
              url: '/getSubOccupations/' + occupation_id,
              success: function(result) {
                  if(result.status == "success") {
                      console.log(result.occupations);
                      $.each(result.occupations, function(key, value){
                          $("#sub_occupation").append(
                              "<option value=" + value.id +">"+value.name+"</option>"
                          );
                      });
                      $('#job_count').html('result '  +  result.occupationCount);
                      $('#industry').attr('href','{{url('industryJobs')}}/'+industry_id+'/'+occupation_id);

                  }
              }
          });
      }
  });

  $("#sub_occupation").on('change', function(){
      var sub_occupation = $("#sub_occupation").val();
      var occupation_id = $("#occupation_id").val();
      var industry_id = $("#industry_id").val();
      if(sub_occupation != "" && industry_id != "" && occupation_id != "") {
          $.ajax({
              method: "GET",
              url: '/getSubOccupationsCount/' + sub_occupation,
              success: function(result) {
                  if(result.status == "success") {
                      console.log(result.occupations);
                      $.each(result.occupations, function(key, value){
                          $("#sub_occupation").append(
                              "<option value=" + value.id +">"+value.name+"</option>"
                          );
                      });
                      $('#job_count').html('result ' + result.subOccupationCount)
                      $('#industry').attr('href','{{url('industryJobs')}}/'+industry_id+'/'+occupation_id+'/'+sub_occupation);
                  }
              }
          });
      }
  });
  });

</script>
