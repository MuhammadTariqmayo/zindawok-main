@extends('website_layouts.master')
@section('content')


<div  id="call_us_on">
    <div class="contact-page-section my-4">
      <div class="row m-0">
        <div class="card ">

                  <div id="contact_message" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body contact-Inner-Accordion-style">
                        <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
                        </div>
                           <div class="wrap">
                             <script type="text/javascript"> function add_chatinline(){var hccid=26495419;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);} add_chatinline(); </script>
                           </div>
                         </div>
                    </div>
                </div>
        <div class="col-md-12 mb-4 p-0">
          <div class="">
            <h3 class="contact-title mb-3">We are here to help!</h3>
            <p class="mb-md-0">Contact us using one of the options below. Our team is quick to respond to help you find the best solution to your problems or queries. </p>
          <div class=" mt-5">
            <div class="row">
             <div class="col-md-12 col-12">
               <div id="accordion">
                <div class="card">
                  <div class="card-header">
                    <div class="">
                     <h4 class="text-center mb-0 p-md-2" style="font-size: 16px;color: #fff">
                       Our team is quick to respond to help you find the best solution to your problems or queries.
                     </h4>
                    </div>
                  </div>
                  <form class="form form-horizontal" method="post" action="{{ route('contact.store') }}">
                    @csrf
                    {{-- @if (count($errors) > 0)
                    <div class="alert alert-success">
                     <ul>
                     @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                     @endforeach
                        </ul>
                        </div>
                    @endif --}}
                  <div class="collapse show" data-parent="">
                    <div class="card-body px-0 pb-0">
                      <div class="d-md-flex align-items-center mb-3">
                         <label style="flex: 1" class="mb-md-0" for="email" class="mr-sm-2">Company name:</label>
                         <input style="flex: 2" type="text" name="company" class="form-control mb-0 mr-sm-2" placeholder="Company name" >
                      </div>
                       <div class="d-md-flex align-items-center mb-3">
                         <label style="flex: 1" class="mb-md-0" for="email" class="mr-sm-2">Username:</label>
                         <input style="flex: 2" type="text" name="uname" class="form-control mb-md-0 mr-sm-2" placeholder="Enter username" >
                      </div>
                       <div class="d-md-flex align-items-center mb-3">
                         <label style="flex: 1" class="mb-md-0" for="email" class="mr-sm-2">Email address:</label>
                         <input style="flex: 2" type="email" name="email" class="form-control mb-md-0 mr-sm-2" placeholder="Enter email" >
                      </div>
                       <div class="d-md-flex align-items-center mb-3">
                         <label style="flex: 1" class="mb-md-0" for="email" class="mr-sm-2">Mobile number:</label>
                         <input style="flex: 2" type="number" name="number" class="form-control mb-md-0 mr-sm-2" placeholder="Mobile number" >
                      </div>
                      <p class="text-left mb-md-0" style="color: #666; font-weight: 400; font-size: 14px;">
                        <span>*</span> Our team is quick to respond to help you find the best solution to your problems or queries.
                      </p>
                      <hr>
                      <div class="d-md-flex align-items-center mb-3">
                         <label style="flex: 1" class="mb-md-0" for="email" class="mr-sm-2">Street address:</label>
                         <input style="flex: 2" type="text" name="address" class="form-control mb-md-0 mr-sm-2" placeholder="Enter street address">
                      </div>
                      <div class="d-md-flex align-items-center mb-3">
                         <label style="flex: 1" class="mb-md-0" for="email" class="mr-sm-2">Content of inquiry:</label>
                         <div style="flex: 2" class="form-control mb-md-0 mr-sm-2" >

                          <textarea style="flex: 2" type="text" name="textarea" class="form-control mb-md-0 mr-sm-2" placeholder="Enter content inquary">


                          </textarea>
                          </div>
                         </div>
                      </div>

                      <p class="text-center mb-4" style="color: #666; font-weight: 400; font-size: 14px;"> Please contact us after agreeing to the <span style="color: #fcae5b">personal information protection policy.</span>
                      </p>

                      <div class="text-center">
                        <button class=" btn-info btn w-100" type="submit">Save</button>
                      </div>
                    </form>



                    </div>
                  </div>
                </div>
              </div>

             </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
