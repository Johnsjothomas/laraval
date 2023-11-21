@extends('layouts.app')

@section('content')

<section class="content">
         <div class="container">
            <div class="profile-box">
               <h2>Profile info</h2>
               <p>Fill in the data for profile. it will take a couple of minutes</p>
           		<form method="POST" class="submit-form" action="/register_profile" enctype="multipart/form-data">
            	@csrf
               <div class="top-mrgn">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputEmail1">City </label>
                           <input type="text" required name="city" value="{{ old('city') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add your city">
                           @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                          <div class="form-group multi-select">
                           <label for="exampleInputEmail1">Office phone number</label>
                           <div class="row">
                            <div class="col-md-6">
                           <select id="office_code" required name="office_code" class="js-states form-control" id="exampleFormControlSelect1">
                             <option value="">Choose Code</option>
                           @foreach($countries as $key=>$val)
                              <option value="{{$val->fields->Phone_Code??''}}">{{$val->fields->Name}}-{{$val->fields->Phone_Code??''}}</option>
                              @endforeach
                            </select>
                            @error('office_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
                           
                         </div>
                         <div class="col-md-6">
                           <input type="text" required name="office_phone" value="{{ old('office_phone') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add your office phone number">
                            </div>
                          </div>
                          @error('office_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                           @error('office_phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                          <div class="form-group">
                           <label for="exampleInputEmail1">Company website</label>
                           <input type="text" required name="company_website" value="{{ old('company_website') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add your company website">
                           @error('company_website')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group multi-select">
                           <label for="exampleInputEmail1">Country</label>
                           <select id="country" required name="country" class="form-control w-50-1 mrgn-r-10 @error('country') is-invalid @enderror" id="exampleFormControlSelect1">
                             <option value="">Choose Country</option>
                              @foreach($countries as $key=>$val)
                              <option value="{{$val->fields->Name??''}}">{{$val->fields->Name??''}}</option>
                              @endforeach
                            </select>
                  @error('country')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                       
                          <div class="form-group">
                           <label for="exampleInputEmail1">Delivery address</label>
                           <input type="text" required name="delivery_address" value="{{ old('delivery_address') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add your delivery address">
                           @error('delivery_address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                           <label for="exampleInputEmail1">Company Registration ID/Trade License</label>
                           <input type="text" required name="company_registration_no" value="{{ old('company_registration_no') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Add your company licende nos">
                           @error('company_registration_no')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                     </div>
                     <div class="col-md-4 text-center">
             

<div class="logo cropme" style="width: 300px; height: 300px;"></div>


<input type="hidden" name="company_logo_blob"  id="company_logo_blob">

<input style="display:none" type="file" name="company_logo" accept="image/*" id="logo" onchange="loadFile(event)">

@error('company_logo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                     </div>
                  
                   
                     <div class="col-md-12">
                        
                       
                        <div class="col-md-12 bottom-create-section">
                           <div class="form-check">
    
  </div>
  <button type="submit" name="submit" value="update_profile" class="btn-blue-btm btn-progress">Save </button>
                        </div>
                        <!-- Minified CSS and JS -->
                       
                     </div>
                  </div>
               </div>
           </form>
            </div>
         </div>
      </section>
      @endsection
      @section('footer-scripts')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script>

    var loadFile = function(event) {
    
    var src = URL.createObjectURL(event.target.files[0]);
    console.log(src);
    $(".company-logo-profile").html('<img src="'+src+'">');
  };



  $( document ).ready(function() {

    // Init Simple Cropper
      $('.cropme').simpleCropper();


      

      $('#office_code').select2({
            placeholder: "Code",
            createTag: function (tag) {

                  // Check if the option is already there
                  var found = false;
                  $("#office_code option").each(function() {
                      if ($.trim(tag.term).toUpperCase() === $.trim($(this).text()).toUpperCase()) {
                          found = true;
                      }
                  });
                  // Show the suggestion only if a match was not found
                  
              }
            });

      $('#country').select2({
            placeholder: "Location",
            createTag: function (tag) {

                  // Check if the option is already there
                  var found = false;
                  $("#country option").each(function() {
                      if ($.trim(tag.term).toUpperCase() === $.trim($(this).text()).toUpperCase()) {
                          found = true;
                      }
                  });
                  // Show the suggestion only if a match was not found
                  
              }
            });


    });

  @php
   if($errors->any()){
  @endphp
            var newOption = new Option('{{old("country")}}', '{{old("country")}}', false, false);
            $('#country').append(newOption).trigger('change');

            var newOption = new Option('{{old("office_code")}}', '{{old("office_code")}}', false, false);
            $('#office_code').append(newOption).trigger('change');
  @php
    }
  @endphp



  </script>
@endsection