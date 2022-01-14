<div class="modal" id="myModalDetailSearch">
    <div class="modal-dialog">
        <form action="">
            <div class="modal-content">

            <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title"></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h5>Search all together</h5>
                    <div class="form-group">
                        <label class="mb-1">City</label>
                        <select name="city_id" class="w-100 form-control search" id="city_id_search">

                            <option value=""> Select City</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}"> {{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="mb-1">Occupation</label>
                        <select name="occupation_id" class="w-100 form-control search" id="occupation_id_search">

                            <option value=""> Select Occupation</option>
                            @foreach($occupations as $occupation)
                                <option value="{{ $occupation->id }}">{{ $occupation->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mb-1">Salary</label>
                        <select name="salary" class="form-control w-100 search" id="salary_search">

                            <option value=""> Select Salary Range</option>
                            <option value="20000">< 20,000</option>
                            <option value="40000"> 20,000 - 40,000</option>
                            <option value="60000"> 40,000 - 60,000</option>
                            <option value="80000"> 60,000 - 80,000</option>
                            <option value="100000"> 80,000 - 100,000</option>
                            <option value="150000"> 100,000 - 150,000</option>
                            <option value="200000"> > 150,000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mb-1">Contract Type</label>
                        <div>
                    <ul class="ks-cboxtags d-flex">
                    <li class="flex_1 w-100 labeltime">
                      <input type="checkbox"  id="checkboxOne" onclick="shift(event)" value="Part_time">
                      <label for="checkboxOne">Part Time</label>
                    </li>
                    <li class="flex_1 w-100 labeltime">
                        <input type="checkbox" id="checkboxTwo" onclick="shift(event)" value="Full_time">
                        <label for="checkboxTwo">Full Time</label>
                    </li>
                     </ul>
                        </div>
                    </div>
                </div>
                <script>

                </script>

                    <!-- Modal footer -->
                <div class="modal-footer">
                    <div class="d-flex w-100">
                        <div class="w-25"> <input type="reset" class="btn btn-secondary w-100" value="clear" />
                        </div>
                        <div class="w-75">
                            <a id="search">
                                <button type="button" class="btn btn-primary w-100 ml-2" id="result">Results 0</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
