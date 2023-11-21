@include('header')
@include('employer.navigation')




<div class="">
    @include('employer.submenu')

    <div class="row">
       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 p3">
            <div class="graybackground">
              <center>
              <div class="profile-pic-wrapper pt-3">
                <div class="pic-holder">
                  <!-- uploaded pic shown here -->
                  <div class="logo-profile-wrapper"><img id="" class="pic" src=""></div>

                  <label for="newProfilePhoto" class="upload-file-block">
                    <div class="text-center">
                      <div class="mb-2">
                        <i class="fa fa-camera fa-2x"></i>
                      </div>
                    </div>
                  </label>
                  
                </div>
              </div>

             <h3> {{$data->fields->Select_Superadmin->fields->First_Name ?? ''}} </h3>
             <h6 style="color: #696F79;"> Super Admin </h6>

           
               </center>
             <center>
                       <ul style="padding-inline-end: 40px;">
               <li class="p5  bold" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Company Details</li>
               <!-- <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Skills</li>
               <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Work Experience</li>
               <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Certification</li>
               <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Project</li>
               <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Resume</li>
               <li class="p5" style="list-style: none">Additonal information</li> -->
               <br>

             </ul>
             </center>
           </div>
       </div>
<!--Build your profile start--> 
       <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pd24">
        <br><br>
        <div class="row">

          @if(!Session::has('company_id'))
          <div class="col-9 pb-5">
           <div class="mediumfont bold "> Create Profile </div></div>
           @else
           <div class="col-9 pb-5">
           <div class="mediumfont bold">Overview</div></div>
           <div class="col-3">
             <button class="btn bluebtn" onclick="$('.overview').hide();$('.create_profile').show();">Edit</button>
           </div>
           @endif
           
        </div>

        @if (session('success'))
                          <div class="alert alert-success">
                            {{ session('success') }}
                          </div>
                        @endif
                        @if (session('failed'))
                          <div class="alert alert-danger">
                            {{ session('failed') }}
                          </div>


                        @endif



           <div class="create_profile" @php if(Session::has('company_id')){@endphp style="display:none" @php }@endphp>             
            <form method="POST" enctype="multipart/form-data" class="submit-form">
            @csrf      

            <Input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto" accept="image/*" style="display: none;" onchange="loadFile(event)" />

            
             <div class="card">
               <div class="card-body form-group">

                     <label>Company Name*</label>
                     <input required type="text" name="company_name" value="{{ old('company_name',(isset($data->fields->Company_Name))? $data->fields->Company_Name : '')}}" class="form-control @error('company_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Company Name">
                     @error('company_name')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror


                      <label>Industry Type*</label>
                      <input required type="text" name="industry_type" value="{{ old('industry_type',(isset($data->fields->Type))? $data->fields->Type : '')}}" class="form-control @error('industry_type') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Industry Type">
                     @error('industry_type')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror


                      <label>Website*</label>
                      <input required type="text" name="website" value="{{ old('website',(isset($data->fields->Website_URL))? $data->fields->Website_URL->value : '')}}" class="form-control @error('website') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Website">
                     @error('website')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror


                      <label>Company Profile</label>
                      <textarea name="company_profile" type="text" class="form-control" placeholder="Enter your Company Profile">{{ old('company_profile',(isset($data->fields->Company_Profile))? $data->fields->Company_Profile : '')}}</textarea>
                      @error('website')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror


                      <label>Linkedin*</label>
                      <input type="text" name="linkedin" class="form-control" value="{{ old('linkedin',(isset($data->fields->Linkedin_URL))? $data->fields->Linkedin_URL->value : '')}}" placeholder="Enter your LinkedIn URL">
                      @error('linkedin')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror


                      <label> Company Registration Number*</label>
                      <input type="text" name="registration_no" value="{{ old('registration_no',(isset($data->fields->Company_Registration_Number))? $data->fields->Company_Registration_Number : '')}}" class="form-control" placeholder="Enter your Registration Number">
                      @error('registration_no')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror


                      <label>VAT details*</label>
                      <input type="text" name="vat_details" value="{{ old('vat_details',(isset($data->fields->VAT_details))? $data->fields->VAT_details : '')}}" class="form-control" placeholder="Enter your VAT Details">
                      @error('vat_details')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror

                      <label>Company Size</label>
                      <input type="text" name="company_size" value="{{ old('company_size',(isset($data->fields->Company_Size))? $data->fields->Company_Size : '')}}" class="form-control" placeholder="Enter your Company Size">
                       @error('company_size')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror


                      <!-- <label>Type</label>
                      <input type="text" class="form-control" placeholder="Enter your Website link">
                      <label>Location</label> -->
                      <!-- <div class="row">
                        <div class="col-9">
                      <label>Corporate Headquarters
                      1 Apple Park Way, Cupertino, California 95014, US</label></div>
                      </div>
                      <div class="card">MAP</div> -->
                    
                    <div class="text-center pt-5">
                      <button class="btn bluebtn">Save</button>
                    </div>
               </div>
             </div>
           </form>
         </div>
           




           <div class="overview" @php if(!Session::has('company_id')){@endphp style="display:none" @php }@endphp">             
               
             <div class="card">
               <div class="card-body form-group">

                     <label>Company Name*</label>
                     <p>{{ old('company_name',(isset($data->fields->Company_Name))? $data->fields->Company_Name : '')}}</p>


                      <label>Industry Type*</label>
                      <p>{{ old('industry_type',(isset($data->fields->Type))? $data->fields->Type : '')}}</p>
                      


                      <label>Website*</label>
                      <p>{{ old('website',(isset($data->fields->Website_URL))? $data->fields->Website_URL->value : '')}}</p>
                      


                      <label>Company Profile</label>
                      <p>{{(isset($data->fields->Company_Profile))? $data->fields->Company_Profile : ''}}</p>
                     

                      <label>Linkedin*</label>
                     <p>{{(isset($data->fields->Linkedin_URL))? $data->fields->Linkedin_URL->value : ''}}</p>


                      <label> Company Registration Number*</label>
                      <p>{{(isset($data->fields->Company_Registration_Number))? $data->fields->Company_Registration_Number : ''}}</p>

                      <label>VAT details*</label>
                      <p>{{(isset($data->fields->VAT_details))? $data->fields->VAT_details : ''}}</p>

                      <label>Company Size</label>
                      <p>{{(isset($data->fields->Company_Size))? $data->fields->Company_Size : ''}}</p>
                     


                      <!-- <label>Type</label>
                      <input type="text" class="form-control" placeholder="Enter your Website link">
                      <label>Location</label> -->
                      <!-- <div class="row">
                        <div class="col-9">
                      <label>Corporate Headquarters
                      1 Apple Park Way, Cupertino, California 95014, US</label></div>
                      </div>
                      <div class="card">MAP</div> -->
                    
                  
               </div>
             </div>
         </div>







          
  </div>
    </div>
  </div>
<br><br>

<!--IMAGE UPLOADER-->



<style>
  label{
    color:#696F79 ;
    padding-top: 2%;
    padding-left: 0px;
  }
  .btn whitebtn{
    border-color: #bfbfe9;
  }
</style>

<script>
  var loadFile = function(event) {
    
    var src = URL.createObjectURL(event.target.files[0]);
    console.log(src);
    $(".logo-profile-wrapper").html('<img src="'+src+'">');
  };
</script>

  @include('footer')