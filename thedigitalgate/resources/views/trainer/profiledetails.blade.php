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

             <h3 class="form-group"> Demo </h3>
           
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


<form method="POST" enctype="multipart/form-data" class="submit-form" action="{{route('profile')}}">
            @csrf 
<!--about you start--> 
<div class="mb_15"> 
             <div class="mediumfont bold heading1"> Salutation</div>
             <!-- <textarea class="input11" type="text" name="designation" placeholders="Enter your designation" >{{ old('designation',(isset($data->Designation))? $data->Designation : '')}}</textarea>
              @error('designation')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror -->
            <select class="input11">
              <option>Select Salutation</option>
              <option>Mr</option>
              <option>Ms</option>
              <option>Doc</option>
              <option>Eng</option>
            </select>

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
                    <label for="industrial"><span type="button" onclick="$('.radiobtn').removeClass('bluebtn');$(this).toggleClass('bluebtn') " class="radiobtn @if(isset($data->Trainer_Type) && $data->Trainer_Type=='Industrial Trainer') bluebtn @endif mr-2">I’m a Subject {{repalceWithMentor('Trainer')}}</span></label>

                    <input  @if(isset($data->Trainer_Type) && $data->Trainer_Type=='Industrial Trainer')checked="checked"@endif style="display: none" type="radio" id="industrial" name="trainer_type" value="Industrial Trainer" onclick="changedata(this.value)">



                    <label for="softskill"><span type="button" onclick="$('.radiobtn').removeClass('bluebtn');$(this).toggleClass('bluebtn') " class="radiobtn @if(isset($data->Trainer_Type) && $data->Trainer_Type=='Soft Skills Trainer') bluebtn @endif" >I’m a Soft Skills Trainer</span></label>

                    <input @if(isset($data->Trainer_Type) && $data->Trainer_Type=='Soft Skills Trainer')checked="checked"@endif style="display: none" type="radio" id="softskill" name="trainer_type" value="Soft Skills Trainer" onclick="changedata(this.value)">
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
          <!------Trainer wise data start--->
              <div class=''></div>

        <!------Trainer wise data end--->

                <div class="mediumfont bold heading1">* Top three modules that you have trained on</div>
              
 
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
                       
                    <input class="input2" type="text" value="" name="other_modules[]" placeholders="Enter your details" />
                    <input class="input2" type="hidden" value="" name="other_module_id[]"/>    
                      
                    <!---Work experience start-->
                    <div class="normalfont2 mt-3">* Total number of relevant training delivery experience in year</div>
                    <input class="input2" type="text" value="{{ old('delivery_experience',(isset($data->Total_relevant_training_delivery_experience_in_year))? $data->Total_relevant_training_delivery_experience_in_year : '')}}" name="delivery_experience" placeholders="Enter your details" />  

                      <br><br>
                    <div class="normalfont2">Total years of work experience</div>
                    <input class="input2" type="text" value="{{ old('work_experience',(isset($data->Total_years_of_work_experience))? $data->Total_years_of_work_experience : '')}}" name="work_experience" placeholders="Enter your details" /> 
                     

                    <div id="otherModuleWrapper">
                    </div>

                      <br><br>
                    <div class="text-center">
                    <button onclick="addOtherModuleRow()" type="button" class="bluebtn pl-4 pr-4">Add</button></div>
                    <br><br>

                    <!--work experiance end--> 

                    <br><br> <div class="normalfont2">Preferred online platform </div>
                    <div class="row">
                        <div class="col graybackground2 m-2 text-center">
                          <input  type="checkbox" name="equipment[]" value="Laptop">
                          <label> Zoom</label>
                        </div>
                        <div class="col graybackground2 m-2 text-center">
                          <input  type="checkbox" name="equipment[]" value="Camera">
                          <label>  Teams</label>
                        </div>
                        <div class="col graybackground2 m-2 text-center">
                          <input  type="checkbox" name="equipment[]" value="Lighting">
                          <label> G meets</label>
                        </div>
                        <div class="col graybackground2 m-2 text-center">
                          <input  type="checkbox" name="equipment[]" value="Lighting">
                          <label>Skype</label>
                        </div>
                        <div class="col graybackground2 m-2 text-center">
                          <input  type="checkbox" name="equipment[]" value="Lighting">
                          <label> Level 3</label>
                        </div>
                    </div>

                    <br><br> <div class="normalfont2">Current equipment used for online training</div>
                    <div class="row">
                        <div class="col graybackground2 m-2 text-center">
                          <input  type="checkbox" name="equipment[]" value="Laptop">
                          <label> Laptop</label>
                        </div>
                        <div class="col graybackground2 m-2 text-center">
                          <input  type="checkbox" name="equipment[]" value="Camera">
                          <label>  Camera</label>
                        </div>
                        <div class="col graybackground2 m-2 text-center">
                          <input  type="checkbox" name="equipment[]" value="Lighting">
                          <label> Lighting</label>
                        </div>
                        <div class="col graybackground2 m-2 text-center">
                          <input  type="checkbox" name="equipment[]" value="Lighting">
                          <label> Microphone</label>
                        </div>
                        <div class="col graybackground2 m-2 text-center">
                          <input  type="checkbox" name="equipment[]" value="Lighting">
                          <label> Other</label>
                        </div>
                    </div>
                    <br><br> 
                    <div class="normalfont2">Gamification tools used</div>
                    <div class="row mb_30">
                        <div class="col graybackground2 m-2 text-center">
                          <input type="checkbox" name="gamification[]" value="Kahoot">
                          <label> Kahoot</label>
                        </div>
                        <div class="col graybackground2 m-2 text-center">
                          <input  type="checkbox" name="gamification[]" value="Accelium">
                          <label>  Accelium</label>
                        </div>
                        <div class="col graybackground2 m-2 text-center">
                          <input  type="checkbox" name="gamification[]" value="Other"> 
                          <label>   Other</label>
                        </div>
                    </div>
      <div class="">


      <div class="mediumfont bold heading1"> Any additional Specialization </div>
      <div class="normalfont2">Add your specialization</div>

    
      <input class="input2" type="text" value="" name="specialization[]" placeholders="Name" /> <br>  
      <input class="input2" type="hidden" value="" name="specialization_id[]"/>   
      
        

      

      <div id="specializationWrapper">
      </div>


      <br>
      <div class="text-center">
      <button onclick="addSpecializationRow()" type="button" class="bluebtn pl-4 pr-4">Add</button></div>



      <div class="mediumfont bold heading1"> Education</div>

     
        <div class="normalfont2">School or College/University*</div>
      <input class="input2" type="text" name="college_name[]" value="" placeholders="Enter School or Collage/University" />  <br><br>
      <div class="normalfont2">Degree*</div>
      <input class="input2" type="text" name="degree[]" value="" placeholders="Enter Degree" />  <br><br>
      <div class="normalfont2">Specialisation*</div>
      <input class="input2" type="text" name="edu_specialization[]" value="" placeholders="Enter Specialisation" />  <br><br>
      <div class=" row mb_30">
      <br>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="normalfont2">Year of Passing*</div>
      <!-- <input type="date" id="" placeholder="Start" value="" class="form-control" name="start_date[]" > -->
          <select class='form-control' name="start_date[]">
            <?php
              $currently_selected = date('Y');  $earliest_year = 2007; $latest_year = date('Y'); 
              
              foreach ( range( $latest_year, $earliest_year ) as $i )
              {   
            ?>
                <option value="<?=$i?>"><?=$i?></option>
            <?php
              }
            ?>

          </select>
      </div>
       <!-- <div class="col-lg-9 col-md-9"></div>        -->
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 " style='display:none'>
          <div class="normalfont2">End*</div>
          <input type="date" id="" placeholder="End" value="" class="form-control" name="end_date[]" >
        </div>
      </div>  
      
      
     

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

                
                  <div class="normalfont2">* Name of the Certification</div>
                  <input class="input2" type="text" value="" name="certificate_name[]" placeholders="Name" />   <br> <br>
                  <div class="col-12">
                  <div class="row">
                  <br>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pl-0 form-group">
                    <div class="normalfont2">Expiry</div>
                  <input type="date" id="" value="" placeholder="Expiry" class="d form-control" name="cert_expiry_date[]" >
                </div></div>  
                </div>

            <div class="normalfont2">Description</div>
                    <textarea class="input11" type="text" name="cert_description[]" placeholders="Description*" ></textarea>

                    <input type="hidden" name="certificate_id[]" value="">

             
                    <div id="certificationWrapper"></div>

            <div class="text-center mt-3">
                <button onclick="addCertificateRow()" type="button" class="bluebtn pl-4 pr-4">Add</button></div>
    </div>
    <!--Certification end--> 
    
 <br> <br>
 <div class="">
            <div class="mediumfont bold heading1"> Additional informaton</div>
              <div class="normalfont2">* Enter your Date of Birth</div>
              <input class="input2" type="date" value="{{ old('date_of_birth',(isset($data->Date_of_Birth))? $data->Date_of_Birth : '')}}" name="date_of_birth" placeholders="DD/MM/YYYY" /> 
              @error('date_of_birth')
                      <div class="alert alert-danger">{{ $message }}</div>
                     @enderror  <br><br>



  <!-- <div class="normalfont2">* Gender</div>
             <label for="male"><span type="button" class="bluebtn mr-2">Male</span></label>
                    <input  style="display: none" type="radio" id="male" name="gender" value="Male">
                    <label for="female"><span type="button" class="bluebtn">Female</span></label>
                    <input style="display: none" type="radio" id="female" name="gender" value="Female">   <br><br> -->

              <div class="pt-3 mb_15" >  
                    <div class="normalfont2">* Gender</div>
                    <select class='form-control'>
                      <option>Male</option>
                      <option>Female</option>
                    </select>
              </div>



  <div class="normalfont2">Languages known</div>
              <input class="input2" type="text" name="" placeholders="Enter Languages" />   <br><br>
              <!-- <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><div class="p-2 border border-secondary rounded"><input type="checkbox"> beginner</div></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><div class="p-2 border border-secondary rounded"><input type="checkbox">  intermediate </div></div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><div class="p-2 border border-secondary rounded"><input type="checkbox"> advanced</div></div>
              </div> -->
              
    </div>

    <div class="">
      <div class='row'>
        <div class='col-md-6'>
            <div class="mediumfont bold heading1"> Upload your Resume</div>
            

            <div class="form-group">
              <input name="resume" type="file" class="form-control-file text-primary" id="myFile" data-title="Drag & Drop your files here"
              accept="application/msword, application/pdf">
            </div><br>
        </div>

        <div class='col-md-6'>
            <div class="mediumfont bold heading1"> Upload your National Id</div>
            

            <div class="form-group">
              <input name="resume" type="file" class="form-control-file text-primary" id="myFile" data-title="Drag & Drop your files here"
              accept="application/msword, application/pdf">
            </div><br>
        </div>

        <div class='col-md-12'>
            <div class="normalfont2">Upload your Demo/Intro video Link*</div>
                <input class="input2" type="text" value="" name="intro_link" placeholders="Enter your Demo/Intro video Link" />
             </div>
        </div>
        
      </div>  
                    
                      <div class="text-center mt-4">
             <button type="submit" class="bluebtn pl-4 pr-4">Done</button></div>
             <!-- onclick="window.location('trainer/myprofile')" -->
             <!-- <a href="{{ url('/trainer/myprofile') }}" id="infoCode" class="btn btn-info btn-sm">Done</a> -->
                  </div>

                </form>
  </div>
    </div>
  </div>
<br>
</div>

<style>
label
{
  margin: 10px;
}
</style>

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

  // function addEducationRow(){  previous one

  //   var html = '<div class="normalfont2">School or College/University*</div>                                  <input class="input2" type="text" name="college_name[]" placeholders="Enter School or Collage/University" />  <br><br><div class="normalfont2">Degree*</div><input class="input2" type="text" name="degree[]" placeholders="Enter Degree" />  <br><br>                                                <div class="normalfont2">Specialization*</div><input class="input2" type="text" name="specialization[]" placeholders="Enter Specialization" />                                                                  <br><br><div class=" row mb_30"><br><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><div class="normalfont2">Start*</div>                                                                        <input type="date" id="from_m" placeholder="Start" class="d form-control" name="start_date[]" ></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 "><div class="normalfont2">End*</div>           <input type="date" id="to_m" placeholder="End" class="d form-control" name="end_date" ></div></div>'
  //   $("#educationWrapper").append(html);
  // }


  function addEducationRow(){
    var start_year = new Date().getFullYear();



    var html = '<div class="normalfont2">School or College/University*</div>                                  <input class="input2" type="text" name="college_name[]" placeholders="Enter School or Collage/University" />  <br><br><div class="normalfont2">Degree*</div><input class="input2" type="text" name="degree[]" placeholders="Enter Degree" />  <br><br>                                                <div class="normalfont2">Specialization*</div><input class="input2" type="text" name="specialization[]" placeholders="Enter Specialization" />                                                                  <br><br><div class=" row mb_30"><br><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><div class="normalfont2">Year of Passing*</div> <select class="form-control appendselect" name="start_date[]"><option>2022</option><option>2021</option><option>2020</option><option>2019</option><option>2018</option><option>2017</option><option>2016</option><option>2015</option><option>2014</option><option>2013</option><option>2012</option><option>2011</option><option>2010</option><option>2009</option><option>2008</option><option>2007</option></select></div><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 " style="display:none"><div class="normalfont2">End*</div>           <input type="date" id="to_m" placeholder="End" class="d form-control" name="end_date" ></div></div>';

    for (var i = start_year; i > start_year - 10; i--) {
      $('.appendselect').append('<option value="' + i + '">' + i + '</option>');
    }

    $("#educationWrapper").append(html);
}

function addCertificateRow()
{
    var html = '<div class="normalfont2 mt-2">* Name of the Certification</div><input class="input2" type="text" value="" name="certificate_name[]" placeholders="Name" />   <br> <br><div class="col-12"><div class="row"><br><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pl-0 form-group"><div class="normalfont2">Expiry</div><input type="date" id="" value="" placeholder="Expiry" class="d form-control" name="cert_expiry_date[]" ></div></div>  </div><div class="normalfont2">Description</div><textarea class="input11" type="text" name="cert_description[]" placeholders="Description*" ></textarea><input type="hidden" name="certificate_id[]" value="">';

    $("#certificationWrapper").append(html);
}


function changedata(str)
{
  alert(str);
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