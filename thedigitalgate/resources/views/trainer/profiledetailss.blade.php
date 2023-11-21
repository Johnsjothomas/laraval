@include('header')
@include('trainer.navigation')
<script src="{{asset('js/jquery.Jcrop.min.js')}}"></script>
   <script src="{{asset('js/jquery.SimpleCropper.js')}}"></script>



<div class="">
    @include('trainer.submenu')

    <div class="container-fluid">
    <div class="row">
       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 p3">
            <div class="graybackground">
              <center>
              <div class="profile-pic-wrapper pt-3">
                <div class="pic-holder">
                  <!-- uploaded pic shown here -->
                  <img id="profilePic" class="pic" src="https://source.unsplash.com/random/150x150">

                  <label for="newProfilePhoto" class="upload-file-block">
                    <div class="text-center">
                      <div class="mb-2">
                        <i class="fa fa-camera fa-2x"></i>
                      </div>
                    </div>
                  </label>
                  <input type="hidden" name="profile_image"  id="company_logo_blob">

<input style="display:none" type="file" name="profile_image" accept="image/*" id="newProfilePhoto" onchange="loadFile(event)">
                </div>
              </div>

             <h3 class="form-group"> {{$data->First_Name}} </h3>
           
               </center>
             <center>
                       <!-- <ul style="padding-inline-end: 40px;">
               <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none;font-size:14px"> Enter your designation</li>
               <li class="p5  bold" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">About you</li>
               <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Skills</li>
               <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Work Experience</li>
               <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Certification</li>
               <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Project</li>
               <li class="p5" style="border-bottom: 0.5px solid rgba(0, 0, 0, 0.2);list-style: none">Resume</li>
               <li class="p5" style="list-style: none">Additonal information</li>
               <br>

             </ul> -->
             </center>
           </div>
       </div>
<!--Build your profile start--> 
       <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pd24 responsive_spaceing">

       


        <br><br>
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
           <div class="mediumfont bold "> Create Profile </div>  <br>
           <div class="progress " style="height:10px">
          <div class="progress-bar" role="progressbar" style="width:85%;background-color: #1F1B45" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
            <span class="progress-bar-number"></span>
          </div>
        </div>
         <br><br>
<!--build your profile end--> 


<form method="POST" enctype="multipart/form-data" class="submit-form">
            @csrf 
<!--about you start--> 
<div class="mb_15"> 
             <div class="mediumfont bold heading1"> Designation</div>
             <textarea class="input11" type="text" name="designation" placeholders="Enter your designation" >{{ old('designation',(isset($data->Designation))? $data->Designation : '')}}</textarea>
              @error('designation')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror

  </div>
           <div class="mb_15"> 
             <div class="mediumfont bold heading1"> About you </div>
                 <div class="normalfont2">Write your profile summary </div>
                <textarea class="input11" type="text" name="profile_summary" placeholders="Name" >{{ old('profile_summary',(isset($data->Profile_Summary))? $data->Profile_Summary : '')}}</textarea>
                 @error('profile_summary')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
            </div>
<!--about you end--> 

<!--add skills start-->          
           <div class="">
             <div class="mb_30">
             <div class="normalfont2">Linkedin*</div>
             <input class="input2" type="text" value="{{ old('linkedin',(isset($data->LinkedIn_URL))? $data->LinkedIn_URL : '')}}" name="linkedin" placeholders="Enter your Linkedin URL" />
             </div>

               <div class="pt-3 mb_15" >  
                    <label for="industrial"><span type="button" onclick="$('.radiobtn').removeClass('bluebtn');$(this).toggleClass('bluebtn')" class="radiobtn @if(isset($data->Trainer_Type) && $data->Trainer_Type=='Industrial Trainer') bluebtn @endif mr-2">I’m an Industrial {{repalceWithMentor('Trainer')}}</span></label>

                    <input  @if(isset($data->Trainer_Type) && $data->Trainer_Type=='Industrial Trainer')checked="checked"@endif style="display: none" type="radio" id="industrial" name="trainer_type" value="Industrial Trainer">



                    <label for="softskill"><span type="button" onclick="$('.radiobtn').removeClass('bluebtn');$(this).toggleClass('bluebtn')" class="radiobtn @if(isset($data->Trainer_Type) && $data->Trainer_Type=='Soft Skills Trainer') bluebtn @endif" >I’m a Soft skills Trainer</span></label>

                    <input @if(isset($data->Trainer_Type) && $data->Trainer_Type=='Soft Skills Trainer')checked="checked"@endif style="display: none" type="radio" id="softskill" name="trainer_type" value="Soft Skills Trainer">
              </div>
               @error('trainer_type')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
<!-- 
 <div class="normalfont2">Add your specialization</div>
              <select name="specialisation" id="specialisation" multiple="multiple">
                <option value="One">One</option>
                <option value="Two">Two</option>
                <option value="Three">Three</option>
                <option value="Four">Four</option>
              </select> <br><br> -->
                <div class="mediumfont bold heading1">Top three modules that you have trained on</div>
              
 
                    <table  class="table table-bordered">
                      <tr style="color: #15284C;background: #F6F6F6;">
                        <th>Name of the Modules</th>
                        <th>Name of the companies delivered at</th>
                        <th>Total number of sessions delivered per module</th>
                      </tr>
                      <tr>
                        <td><input name="module_name[]" value="{{ old('module_name.0',(isset($top_modules[0]->fields->Name_of_Module))? $top_modules[0]->fields->Name_of_Module : '')}}" type="text" class="form-control"></td>
                        <td><input name="company_name[]" value="{{ old('company_name.0',(isset($top_modules[0]->fields->Name_of_Companies_Delivered_At))? $top_modules[0]->fields->Name_of_Companies_Delivered_At : '')}}" type="text" class="form-control"></td>
                        <td><input name="number_of_sessions[]" value="{{ old('number_of_sessions.0',(isset($top_modules[0]->fields->Total_number_of_sessions_delivered_per_module))? $top_modules[0]->fields->Total_number_of_sessions_delivered_per_module : '')}}" type="text" class="form-control">
                           <input type="hidden" name="module_id[]" value="{{(isset($top_modules[0]->id))? $top_modules[0]->id : ''}}">
                        </td>

                      </tr>
                      <tr>
                        <td><input name="module_name[]" value="{{ old('module_name.1',(isset($top_modules[1]->fields->Name_of_Module))? $top_modules[1]->fields->Name_of_Module : '')}}" type="text" class="form-control"></td>
                        <td><input name="company_name[]" value="{{ old('company_name.1',(isset($top_modules[1]->fields->Name_of_Companies_Delivered_At))? $top_modules[1]->fields->Name_of_Companies_Delivered_At : '')}}" type="text" class="form-control"></td>
                        <td><input name="number_of_sessions[]" value="{{ old('number_of_sessions.1',(isset($top_modules[1]->fields->Total_number_of_sessions_delivered_per_module))? $top_modules[1]->fields->Total_number_of_sessions_delivered_per_module : '')}}" type="text" class="form-control">
                          <input type="hidden" name="module_id[]" value="{{(isset($top_modules[1]->id))? $top_modules[0]->id : ''}}">
                        </td>
                      </tr>
                      <tr>
                        <td><input name="module_name[]" value="{{ old('module_name.2',(isset($top_modules[2]->fields->Name_of_Module))? $top_modules[2]->fields->Name_of_Module : '')}}" type="text" class="form-control"></td>
                        <td><input name="company_name[]" value="{{ old('company_name.2',(isset($top_modules[2]->fields->Name_of_Companies_Delivered_At))? $top_modules[2]->fields->Name_of_Companies_Delivered_At : '')}}" type="text" class="form-control"></td>
                        <td><input name="number_of_sessions[]" value="{{ old('number_of_sessions.2',(isset($top_modules[2]->fields->Total_number_of_sessions_delivered_per_module))? $top_modules[2]->fields->Total_number_of_sessions_delivered_per_module : '')}}" type="text" class="form-control">
                          <input type="hidden" name="module_id[]" value="{{(isset($top_modules[2]->id))? $top_modules[0]->id : ''}}">
                        </td>
                      </tr>
                      
                    </table>
                    <br><br>


                    <div class="normalfont2">Details of other modules/topics you would like to deliver (4-20)</div>

               @forelse($other_modules as $key=>$val)     
             <input class="input2" type="text" value="{{ old('other_modules.$key',(isset($other_modules[$key]->fields->Details_of_other_module))? $other_modules[$key]->fields->Details_of_other_module : '')}}" name="other_modules[]" placeholders="Enter your details" />
             <input class="input2" type="hidden" value="{{(isset($other_modules[$key]->id))? $other_modules[$key]->id : ''}}" name="other_module_id[]"/>    
               @empty
               <input class="input2" type="text" name="other_modules[]" placeholders="Enter your details" /> 
               @endforelse

             <div id="otherModuleWrapper">
             </div>

              <br><br>
             <div class="text-center">
             <button onclick="addOtherModuleRow()" type="button" class="bluebtn pl-4 pr-4">Add</button></div>
             <br><br>



             <div class="normalfont2 ">Total number of relevant training delivery experience in year</div>
             <input class="input2" type="text" value="{{ old('delivery_experience',(isset($data->Total_relevant_training_delivery_experience_in_year))? $data->Total_relevant_training_delivery_experience_in_year : '')}}" name="delivery_experience" placeholders="Enter your details" />  

               <br><br>
             <div class="normalfont2">Total years of work experience</div>
             <input class="input2" type="text" value="{{ old('work_experience',(isset($data->Total_years_of_work_experience))? $data->Total_years_of_work_experience : '')}}" name="work_experience" placeholders="Enter your details" />    
            
             <br><br> <div class="normalfont2">Current equipment used for onlie training</div>
             <div class="row">
               <div class="col graybackground2 m-2 text-center">
                 <input @php if(in_array('Laptop',$data->Current_equipment_used_for_online_training)){@endphp checked @php }@endphp type="checkbox" name="equipment[]" value="Laptop">
                 <label> Laptop</label>
               </div>
               <div class="col graybackground2 m-2 text-center">
                 <input @php if(in_array('Camera',$data->Current_equipment_used_for_online_training)){@endphp checked @php }@endphp type="checkbox" name="equipment[]" value="Camera">
                 <label>  Camera</label>
               </div>
               <div class="col graybackground2 m-2 text-center">
                 <input @php if(in_array('Lighting',$data->Current_equipment_used_for_online_training)){@endphp checked @php }@endphp type="checkbox" name="equipment[]" value="Lighting">
                 <label> Lighting</label>
               </div>
             </div>
             <br><br> 
             <div class="normalfont2">Gamification tools used</div>
             <div class="row mb_30">
               <div class="col graybackground2 m-2 text-center">
                 <input @php if(in_array('Kahoot',$data->Current_equipment_used_for_online_training)){@endphp checked @php }@endphp type="checkbox" name="gamification[]" value="Kahoot">
                 <label> Kahoot</label>
               </div>
               <div class="col graybackground2 m-2 text-center">
                 <input @php if(in_array('Accelium',$data->Current_equipment_used_for_online_training)){@endphp checked @php }@endphp type="checkbox" name="gamification[]" value="Accelium">
                 <label>  Accelium</label>
               </div>
               <div class="col graybackground2 m-2 text-center">
                 <input @php if(in_array('Other',$data->Current_equipment_used_for_online_training)){@endphp checked @php }@endphp type="checkbox" name="gamification[]" value="Other"> <br>
                 <label>   Other</label>
               </div>
             </div>
          </div>   
<!--add skills end-->

<!--work experiance start--> 
<div class="">


             <div class="mediumfont bold heading1"> Any additional Specialization </div>
             <div class="normalfont2">Add your specialization</div>

             @forelse($specializations as $key=>$val) 
             <input class="input2" type="text" value="{{ old('specializations.$key',(isset($specializations[$key]->fields->Specialization))? $specializations[$key]->fields->Specialization : '')}}" name="specialization[]" placeholders="Name" /> <br>  
              <input class="input2" type="hidden" value="{{(isset($specializations[$key]->id))? $specializations[$key]->id : ''}}" name="specialization_id[]"/>   
              @empty
               <input class="input2" type="text" name="specialization[]" placeholders="Enter your details" />
            
             @endforelse

             <div id="specializationWrapper">
             </div>


              <br>
             <div class="text-center">
             <button onclick="addSpecializationRow()" type="button" class="bluebtn pl-4 pr-4">Add</button></div>



             <div class="mediumfont bold heading1"> Education</div>

             @forelse($educations as $key=>$val) 
               <div class="normalfont2">School or College/University*</div>
              <input class="input2" type="text" name="college_name[]" value="{{ old('educations.$key',(isset($educations[$key]->fields->School_or_University))? $educations[$key]->fields->School_or_University : '')}}" placeholders="Enter School or Collage/University" />  <br><br>
              <div class="normalfont2">Degree*</div>
              <input class="input2" type="text" name="degree[]" value="{{ old('educations.$key',(isset($educations[$key]->fields->Degree))? $educations[$key]->fields->Degree : '')}}" placeholders="Enter Degree" />  <br><br>
              <div class="normalfont2">Specialisation*</div>
              <input class="input2" type="text" name="edu_specialization[]" value="{{ old('educations.$key',(isset($educations[$key]->fields->Specialisation))? $educations[$key]->fields->Specialisation : '')}}" placeholders="Enter Specialisation" />  <br><br>
              <div class=" row mb_30">
              <br>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                 <div class="normalfont2">Start*</div>
              <input type="date" id="" placeholder="Start" value="{{ old('educations.$key',(isset($educations[$key]->fields->Start_Date))? $educations[$key]->fields->Start_Date : '')}}" class="form-control" name="start_date[]" >
            </div>
         
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                 <div class="normalfont2">End*</div>
                 <input type="date" id="" placeholder="End" value="{{ old('educations.$key',(isset($educations[$key]->fields->End_Date))? $educations[$key]->fields->End_Date : '')}}" class="form-control" name="end_date[]" >
                </div>
            </div>  
            @empty
            <div class="normalfont2">School or College/University*</div>
              <input class="input2" type="text" name="college_name[]" placeholders="Enter School or Collage/University" />  <br><br>
              <div class="normalfont2">Degree*</div>
              <input class="input2" type="text" name="degree[]" placeholders="Enter Degree" />  <br><br>
              <div class="normalfont2">Specialization*</div>
              <input class="input2" type="text" name="edu_specialization[]" placeholders="Enter Specialization" />  <br><br>
              <div class=" row mb_30">
              <br>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                 <div class="normalfont2">Start*</div>
              <input type="date" id="from_m" placeholder="Start" class="d form-control" name="start_date[]" >
            </div>
         
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                 <div class="normalfont2">End*</div>
                 <input type="date" id="to_m" placeholder="End" class="d form-control" name="end_date[]" >
                </div>
            </div>  
            @endforelse

            <div id="educationWrapper">
             </div>

             <br>
             <div class="text-center">
             <button onclick="addEducationRow()" type="button" class="bluebtn pl-4 pr-4">Add</button></div>
</div>
<!--work experiance end--> 

<!--Certification start--> 
<div class="">
             <div class="mediumfont bold heading1"> Certifications</div>

             @forelse($certifications as $key=>$val) 
              <div class="normalfont2">Name of the Certification</div>
              <input class="input2" type="text" value="{{ old('certifications.$key',(isset($certifications[$key]->fields->Name_of_the_Certification))? $certifications[$key]->fields->Name_of_the_Certification : '')}}" name="certificate_name[]" placeholders="Name" />   <br> <br>
              <div class="col-12">
              <div class="row">
              <br>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pl-0 form-group">
                 <div class="normalfont2">Expiry</div>
              <input type="date" id="" value="{{ old('certifications.$key',(isset($certifications[$key]->fields->Expiry_Date))? $certifications[$key]->fields->Expiry_Date : '')}}" placeholder="Expiry" class="d form-control" name="cert_expiry_date[]" >
            </div></div>  
            </div>

         <div class="normalfont2">Description*</div>
                <textarea class="input11" type="text" name="cert_description[]" placeholders="Description*" >{{ old('certifications.$key',(isset($certifications[$key]->fields->Description))? $certifications[$key]->fields->Description : '')}}</textarea>

                 <input type="hidden" name="certificate_id[]" value="{{(isset($certifications[0]->id))? $certifications[$key]->id : ''}}">

              @empty
               <div class="normalfont2">Name of the Certification</div>
              <input class="input2" type="text" name="certificate_name[]" placeholders="Name" />   <br> <br>
              <div class="col-12">
              <div class="row">
              <br>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pl-0 form-group">
                 <div class="normalfont2">Expiry</div>
              <input type="date" id="" placeholder="Expiry" class="d form-control" name="cert_expiry_date[]" >
            </div></div>  
            </div>

         <div class="normalfont2">Description*</div>
                <textarea class="input11" type="text" name="cert_description[]" placeholders="Description*" ></textarea>
              @endforelse  

         <div class="text-center mt-3">
             <button onclick="addCertificateRow()" type="button" class="bluebtn pl-4 pr-4">Add</button></div>
</div>
<!--Certification end--> 



 <br> <br>
 <div class="">
               <div class="mediumfont bold heading1"> Additional informaton</div>
  <div class="normalfont2">Enter your Date of Birth</div>
              <input class="input2" type="date" value="{{ old('date_of_birth',(isset($data->Date_of_Birth))? $data->Date_of_Birth : '')}}" name="date_of_birth" placeholders="DD/MM/YYYY" /> 
              @error('date_of_birth')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror  <br><br>



  <div class="normalfont2">Gender</div>
             <label for="male"><span type="button" class="bluebtn mr-2">Male</span></label>
                    <input  style="display: none" type="radio" id="male" name="gender" value="Male">
                    <label for="female"><span type="button" class="bluebtn">Female</span></label>
                    <input style="display: none" type="radio" id="female" name="gender" value="Female">   <br><br>



  <div class="normalfont2">Languages known</div>
              <input class="input2" type="text" name="" placeholders="Enter Languages" />   <br><br>
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><div class="p-2 border border-secondary rounded"><input type="checkbox"> beginner</div></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><div class="p-2 border border-secondary rounded"><input type="checkbox">  intermediate </div></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><div class="p-2 border border-secondary rounded"><input type="checkbox"> advanced</div></div>
              </div>
              
    </div>

    <div class="">
                    <div class="mediumfont bold heading1"> Upload your Resume</div>
                    <center>

                      <div class="form-group">
                        <input name="resume" type="file" class="form-control-file text-primary" id="myFile" data-title="Drag & Drop your files here"
                        accept="application/msword, application/pdf">
                      </div><br>
                      <div class="text-center">
             <button type="submit" class="bluebtn pl-4 pr-4" onclick="window.location='talent/aspirant/myprofile'">Done</button></div>
                  </div>

                </form>
  </div>
    </div>
  </div>
<br>
</div>

<script>
  $("#specialisation").select2({
    allowClear: false,
});


  var loadFile = function(event) {
    
    var src = URL.createObjectURL(event.target.files[0]);
    console.log(src);
    $("#profilePic").attr("src",src);
  };

  function addOtherModuleRow(){

    var html = '<br><input class="input2" type="text" name="other_modules[]" placeholders="Enter your details" />'
    $("#otherModuleWrapper").append(html);
  }

  function addSpecializationRow(){

    var html = '<br><input class="input2" type="text" name="specialization[]" placeholders="Enter your details" />'
    $("#specializationWrapper").append(html);
  }

  function addEducationRow(){

    var html = '<div class="normalfont2">School or College/University*</div>                                  <input class="input2" type="text" name="college_name[]" placeholders="Enter School or Collage/University" />  <br><br><div class="normalfont2">Degree*</div><input class="input2" type="text" name="degree[]" placeholders="Enter Degree" />  <br><br>                                                <div class="normalfont2">Specialization*</div><input class="input2" type="text" name="specialization[]" placeholders="Enter Specialization" />                                                                  <br><br><div class=" row mb_30"><br><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><div class="normalfont2">Start*</div>                                                                        <input type="date" id="from_m" placeholder="Start" class="d form-control" name="start_date[]" ></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 "><div class="normalfont2">End*</div>           <input type="date" id="to_m" placeholder="End" class="d form-control" name="end_date" ></div></div>'
    $("#educationWrapper").append(html);
  }




</script>
<!--IMAGE UPLOADER-->
<script>
  $(document).on("change", ".uploadProfileInput", function () {
  var triggerInput = this;
  var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
  var holder = $(this).closest(".pic-holder");
  var wrapper = $(this).closest(".profile-pic-wrapper");
  $(wrapper).find('[role="alert"]').remove();
  var files = !!this.files ? this.files : [];
  if (!files.length || !window.FileReader) {
    return;
  }
  if (/^image/.test(files[0].type)) {
    // only image file
    var reader = new FileReader(); // instance of the FileReader
    reader.readAsDataURL(files[0]); // read the local file

    reader.onloadend = function () {
      $(holder).addClass("uploadInProgress");
      $(holder).find(".pic").attr("src", this.result);
      $(holder).append(
        '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
      );

      // Dummy timeout; call API or AJAX below
      setTimeout(() => {
        $(holder).removeClass("uploadInProgress");
        $(holder).find(".upload-loader").remove();
        // If upload successful
        if (Math.random() < 0.9) {
          $(wrapper).append(
            '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
          );

          // Clear input after upload
          $(triggerInput).val("");

          setTimeout(() => {
            $(wrapper).find('[role="alert"]').remove();
          }, 3000);
        } else {
          $(holder).find(".pic").attr("src", currentImg);
          $(wrapper).append(
            '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
          );

          // Clear input after upload
          $(triggerInput).val("");
          setTimeout(() => {
            $(wrapper).find('[role="alert"]').remove();
          }, 3000);
        }
      }, 1500);
    };
  } else {
    $(wrapper).append(
      '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
    );
    setTimeout(() => {
      $(wrapper).find('role="alert"').remove();
    }, 3000);
  }
});

</script>

<!--Datepicker-->
<script>
  /*$('#from_y').datepicker({
    	format: "yyyy",
    	autoclose: true,
   	  	minViewMode: "years"
})    .on('changeDate', function(selected){
        startDate =  $("#from_y").val();
        $('#to_y').datepicker('setStartDate', startDate);
    }); 
;


$('#to_y').datepicker({
    	format: "yyyy",
    	autoclose: true,
   	  	minViewMode: "years"
});

$('#from_m').datepicker({
    	format: "dd MM yyyy",
    	autoclose: true,
   	  //	minViewMode: "months"
})    .on('changeDate', function(selected){
        startDate =  $("#from_m").val();
        $('#to_m').datepicker('setStartDate', startDate);
    }); 
;


$('#to_m').datepicker({
    	format: "dd MM yyyy",
    	autoclose: true,
   	  //	minViewMode: "months"
});*/
</script>



  @include('footer')