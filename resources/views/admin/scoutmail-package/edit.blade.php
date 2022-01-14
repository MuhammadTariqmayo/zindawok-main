@extends('admin_layouts.master')
@section('content')
<div class="content-header row">
</div>
<div class="row">
  <div class="col-md-12">
        <div class="card">
            <div class="card-content collpase show">
                <div class="card-body">
                    <form class="form form-horizontal" method="POST" action="{{route('scouitmail-package.update' , $packageedit->id)}}">

                    @csrf
                    <div class="form-body">
                        <h4 class="form-section"><i class="la la-tasks"></i>Edit Package</h4>
                        <div class="row">
                            <div class="col-md-9">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">Package Name</label>
		                            <div class="col-md-9">
		                                <input type="text" id="userinput1" class="form-control border-primary" value="{{$packageedit->name}}"
		                                name="name" required>
		                            </div>
                        		</div>
                     		</div>

                             <div class="col-md-9">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">Package Price</label>
		                            <div class="col-md-9">
		                                <input type="text" id="userinput1" class="form-control border-primary" value="{{$packageedit->price}}"
		                                name="price" required>
		                            </div>
                        		</div>
                     		</div>

                             <div class="col-md-9">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">Message Limit</label>
		                            <div class="col-md-9">
		                                <input type="text" id="userinput1" class="form-control border-primary" value="{{$packageedit->message_limit}}"
		                                name="message_limit" required>
		                            </div>
                        		</div>
                     		</div>

                             <div class="col-md-9">
                            	<div class="form-group row">
	                              	<label class="col-md-3 label-control" for="userinput1">Image</label>
		                            <div class="col-md-9">
                                        <img src="/image/{{ $packageedit->image }}" width="50px">
		                                <input type="file" name="image" class="form-control" placeholder="image">

		                            </div>
                        		</div>
                     		</div>



	                    <div class="form-actions right">
	                        <button type="submit" class="btn btn-primary">
	                          	<i class="la la-check-square-o"></i> Update
	                        </button>
	                    </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
