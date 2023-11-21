@include('header')
@include('employer.navigation')
@include('employer.submenu')
<div class="container justify-content-center align-center pt-5 pb-5">
    <div class="row">
        <div class="col">
        <img class="img-fluid " style="width:100%" src="/talent/assets/img/myprofile.png"></div>
    </div>
    @include('profile_head')

      @include('employer.jobs.job_navigation')

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
    
@if(!empty($data))
            
              
                    <div class="job-card whitebackground rounded2" style="margin-top:20px">
                   
                         <div class="row" style="display:inline-flex;">
                         <div style="height:40px; width:40px;background: pink"></div>
                         <div style="padding-left: 15px" class="normalfont1 bold">{{$data->fields->Posted_by_Company->fields->Company_Name}}<div class="normalfont4">{{$data->fields->Job_Title}}</div></div>
                          </div>
                          <div class="row normalfont3"><br>
                            {{$data->fields->Job_Description}}
                          </div>
                         <hr>
                         <div class="row normalfont3">
                           <div class="col-sm-6 p-0">
                          <i class="fa fa-briefcase pr-2" aria-hidden="true"></i><span>{{$data->fields->Employment_Type}}</span></div>
                          <div class="col-sm-6 pr-0">
                          <div class="right">Hyderabad,India</div></div>
                         </div>
                    
                </div>
              
        
             @endif  



    <form method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$id}}" name="id">
    <div class="pt-4">
        <div class="card">
            <div class="card-body pl-5 pr-5">
<!-- CREATE MODULE -->
           
<!-- MANAGE MODULE -->

            <div class="form-group pt-4">
            <h5>Job title</h5>
            <input class="form-control" type="text" value="{{ old('job_title',(isset($data->fields->Job_Title))? $data->fields->Job_Title : '')}}" name="job_title">
            @error('job_title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group pt-4">
            <h5>Job Description</h5>
            <textarea class="form-control" name="job_description" >{{ old('job_description',(isset($data->fields->Job_Description))? $data->fields->Job_Description : '')}}</textarea>
            @error('job_description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="form-group pt-4">
            <h5>Salary Payment Cycle</h5>
            <select class="form-control" name="payment_cycle">
            <option value="" disabled selected>select the payment cycle</option>
            <option @if((isset($data->fields->Payment_Cycle) && $data->fields->Payment_Cycle=='Hourly') || old('payment_cycle')=='Hourly') selected="selected" @endif value="Hourly">Hourly </option>
            <option @if((isset($data->fields->Payment_Cycle) && $data->fields->Payment_Cycle=='Daily') || old('payment_cycle')=='Daily') selected="selected" @endif value="Daily">Daily</option>
            <option @if((isset($data->fields->Payment_Cycle) && $data->fields->Payment_Cycle=='Weekly') || old('payment_cycle')=='Weekly') selected="selected" @endif value="Weekly">Weekly</option>
            <option @if((isset($data->fields->Payment_Cycle) && $data->fields->Payment_Cycle=='Monthly') || old('payment_cycle')=='Monthly') selected="selected" @endif value="Monthly">Monthly</option>
            <option @if((isset($data->fields->Payment_Cycle) && $data->fields->Payment_Cycle=='Yearly') || old('payment_cycle')=='Yearly') selected="selected" @endif value="Yearly">Yearly</option>
            </select>
            @error('payment_cycle')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group pt-4">
            <h5>Currency</h5>
            <select class="form-control" name="currency">
            <option value="" disabled>select the currency</option>
            <option @if((isset($data->fields->Currency) && $data->fields->Currency=='USD') || old('currency')=='USD') selected="selected" @endif value="USD">USD </option>
            <option @if((isset($data->fields->Currency) && $data->fields->Currency=='INR') || old('currency')=='INR') selected="selected" @endif value="INR">INR</option>
            <option @if((isset($data->fields->Currency) && $data->fields->Currency=='AED') || old('currency')=='AED') selected="selected" @endif value="AED">AED</option>
            </select>
            @error('currency')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group pt-4">
            <h5>Remuneration Amount</h5>
            <input class="form-control" type="text" name="amount" value="{{ old('amount',(isset($data->fields->Remuneration_Amount))? $data->fields->Remuneration_Amount : '')}}">
            @error('amount')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="form-group pt-4 m-0">
            <div class="row">
            <div class="col-3 pl-0"><label> Tentative Start Date*</label></div>
            <div class="col-3"><label> End Date*</label></div></div>

            </div>
            <div class="form-group">
            <div class="row">
            <div class="col-3 pl-0"><input name="start_date" type="date" class="form-control" value="{{ old('start_date',(isset($data->fields->Start_Date))? $data->fields->Start_Date : '')}}">
            @error('start_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="col-3">
                <input name="end_date" type="date" class="form-control" value="{{ old('end_date',(isset($data->fields->End_Date))? $data->fields->End_Date : '')}}">
            @error('end_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>
            </div></div>


            <div class="form-group pt-4">
            <h5>Gender Preference</h5>
            <select class="form-control" name="gender">
            <option value="">Select your option</option>
            <option @if((isset($data->fields->Gender) && $data->fields->Gender=='Male') || old('gender')=='Male') selected="selected" @endif value="Male">Male</option>
            <option @if((isset($data->fields->Gender) && $data->fields->Gender=='Female') || old('gender')=='Female') selected="selected" @endif value="Female">Female</option>
            <option @if((isset($data->fields->Gender) && $data->fields->Gender=='Others') || old('gender')=='Others') selected="selected" @endif value="Others">Others</option>
            <option @if((isset($data->fields->Gender) && $data->fields->Gender=='No Preference') || old('gender')=='No Preference') selected="selected" @endif value="No Preference">No Preference</option>
            </select>
            @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="form-group pt-4" >
            <h5>Type of employment</h5>
            <select class="form-control" name="type_of_employment">
            <option value="">Select your option</option>
            <option @if((isset($data->fields->Employment_Type) && $data->fields->Employment_Type=='Full time') || old('type_of_employment')=='Full time') selected="selected" @endif value="Full time">Full Time</option>
            <option @if((isset($data->fields->Employment_Type) && $data->fields->Employment_Type=='Fixed/Project') || old('type_of_employment')=='Fixed/Project') selected="selected" @endif value="Fixed/Project">Fixed/Project</option>
            <option @if((isset($data->fields->Employment_Type) && $data->fields->Employment_Type=='Gig') || old('type_of_employment')=='Gig') selected="selected" @endif value="Gig">Gig</option>
            </select>
            @error('type_of_employment')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group pt-4" >
            <h5>Job Category</h5>

                <select id="job_category" name="job_category" class="js-states form-control @error('job_category') is-invalid @enderror job_category" id="exampleFormControlSelect1">
                  </select>
                  @error('job_category')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror     
            </div>

            <div class="form-group pt-4" >
            <h5>Add Working Type</h5>
            <select class="form-control" name="working_type">
            <option value="" disabled selected>Select your option</option>
            <option @if((isset($data->fields->Working_Type) && $data->fields->Working_Type=='Online') || old('working_type')=='Online') selected="selected" @endif value="Online">Online</option>
            <option @if((isset($data->fields->Working_Type) && $data->fields->Working_Type=='In Premises') || old('working_type')=='In Premises') selected="selected" @endif value="In Premises">In Premises</option>
            <option @if((isset($data->fields->Working_Type) && $data->fields->Working_Type=='Hybrid') || old('working_type')=='Hybrid') selected="selected" @endif value="Hybrid">Hybrid</option>
            </select>
            @error('working_type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group pt-4" >
            <h5>Country</h5>
            <input type="text" name="country" class="form-control">
            <!-- <select class="form-control" name="country">
            <option value="" disabled selected>Select your option</option>
            </select> -->
            @error('country')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

           <div class="form-group pt-4" >
            <h5>City</h5>
            <input type="text" name="city" class="form-control">
            <!-- <select class="form-control" name="city">
            <option value="" disabled selected>Select your option</option>
            </select> -->
            @error('city')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group pt-4" >
            <h5>Compulsory Training Required</h5>
            <input @if((isset($data->fields->Compulsory_Training_Required) && $data->fields->Compulsory_Training_Required=='Yes') || old('training_required')=='Yes') checked @endif  name="training_required" value="Yes" type="radio">&nbsp;Yes
            <input @if((isset($data->fields->Compulsory_Training_Required) && $data->fields->Compulsory_Training_Required=='No') || old('training_required')=='No') checked @endif name="training_required" value="No" type="radio">&nbsp;No
            @error('training_required')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group pt-4" >
            <h5>Training Module</h5>
            <select class="js-states form-control module" name="training_module">
            <option value="" disabled selected>Select your option</option>
            </select>
            @error('training_module')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="form-group pt-4" >
            <h5>Mandatory Skillset</h5>

                <select id="mandatory_skillset" name="mandatory_skillset[]" class="skillset js-states form-control @error('mandatory_skillset') is-invalid @enderror mandatory_skillset" id="exampleFormControlSelect1" multiple>
                  </select>
                  @error('mandatory_skillset')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
            </div>

            <div class="form-group pt-4" >
            <h5>Optional Skillset</h5>

                <select id="optional_skillset" name="optional_skillset[]" class="skillset js-states form-control @error('optional_skillset') is-invalid @enderror optional_skillset" id="exampleFormControlSelect1" multiple>
                  </select>
                  @error('optional_skillset')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
            
            <div class="form-group pt-4" >
            <h5>Total Experience</h5>
            <select class="form-control" name="total_experience">
            <option value="" disabled>Select your option</option>
            <option @if((isset($data->fields->Total_Experience) && $data->fields->Total_Experience=='Less than 1 year') || old('total_experience')=='Less than 1 year') selected="selected" @endif value="Less than 1 year">Less than 1 year</option>
            <option @if((isset($data->fields->Total_Experience) && $data->fields->Total_Experience=='1 - 3 years') || old('total_experience')=='1 - 3 years') selected="selected" @endif value="1 - 3 years">1 - 3 years</option>
            <option @if((isset($data->fields->Total_Experience) && $data->fields->Total_Experience=='3 - 5 years') || old('total_experience')=='3 - 5 years') selected="selected" @endif value="3 - 5 years">3 - 5 years</option>
            <option @if((isset($data->fields->Total_Experience) && $data->fields->Total_Experience=='5 - 10 years') || old('total_experience')=='5 - 10 years') selected="selected" @endif value="5 - 10 years">5 - 10 years</option>
            <option @if((isset($data->fields->Total_Experience) && $data->fields->Total_Experience=='10+ years') || old('total_experience')=='10+ years') selected="selected" @endif value="10+ years">10+ years</option>
            </select>
            @error('total_experience')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="form-group pt-4" >
            <h5>Relevant Experience</h5>
            <select class="form-control" name="relevant_experience">
            <option value="" disabled>Select your option</option>
            <option @if((isset($data->fields->Relevant_Experience) && $data->fields->Relevant_Experience=='Less than 1 year') || old('relevant_experience')=='Less than 1 year') selected="selected" @endif value="Less than 1 year">Less than 1 year</option>
            <option @if((isset($data->fields->Relevant_Experience) && $data->fields->Relevant_Experience=='1 - 3 years') || old('relevant_experience')=='1 - 3 years') selected="selected" @endif value="1 - 3 years">1 - 3 years</option>
            <option @if((isset($data->fields->Relevant_Experience) && $data->fields->Relevant_Experience=='3 - 5 years') || old('relevant_experience')=='3 - 5 years') selected="selected" @endif value="3 - 5 years">3 - 5 years</option>
            <option @if((isset($data->fields->Relevant_Experience) && $data->fields->Relevant_Experience=='5 - 10 years') || old('relevant_experience')=='5 - 10 years') selected="selected" @endif value="5 - 10 years">5 - 10 years</option>
            <option @if((isset($data->fields->Relevant_Experience) && $data->fields->Relevant_Experience=='10+ years') || old('relevant_experience')=='10+ years') selected="selected" @endif value="10+ years">10+ years</option>
            </select>
            @error('relevant_experience')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="form-group pt-4" >
            <h5>Educational Qualification</h5>
            <textarea rows="5" class="form-control" name="educational_qualification">{{ old('educational_qualification',(isset($data->fields->Educational_Qualification))? $data->fields->Educational_Qualification : '')}}</textarea>
            @error('educational_qualification')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group pt-4" >
            <h5>Perks</h5>
            <input class="form-control" name="perks" value="{{ old('perks',(isset($data->fields->Perks))? $data->fields->Perks : '')}}">
            @error('perks')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="form-group pt-4" >
            <h5>Upload JD </h5>
            <!-- <label for="jd_document"><button type="button" class="btn bluebtn">Upload JD documents</button> </label> -->
            <input id="jd_document" type="file" name="jd_document">
            @error('jd_document')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>


            <div class="text-center p-5" >
             <button type="submit" class="btn bluebtn pl-4 pr-4">Done</button></div>

             
            </div>
        </div>
        </div>
    </form>





    </div>

</div>        

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h5>Are you sure wants to delete</h5>
        <button type="button" class="btn btn bluebtn pl-5 pr-5" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn bluebtn pl-5 pr-5" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h5>Are you sure wants to Pause</h5>
        <button type="button" class="btn btn bluebtn pl-5 pr-5" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn bluebtn pl-5 pr-5" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <h5>Are you sure wants to update</h5>
        <button type="button" class="btn btn bluebtn pl-5 pr-5" data-dismiss="modal">Yes</button>
        <button type="button" class="btn btn bluebtn pl-5 pr-5" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>


<style>
  button{
    padding: 5px !important;
  }
  body{
    background: #f5f5f5;
  }
  </style>


  <script>

    @php if($id){ @endphp

            var newOption = new Option('{{$data->fields->Job_Category}}', '{{$data->fields->Job_Category}}', false, false);
            $('#job_category').append(newOption).trigger('change');


          @php
          }else if($errors->any()){
          @endphp

        

          var newOption = new Option("{{old('job_category')}}", "{{old('job_category')}}", false, false);
          $('#job_category').append(newOption).trigger('change');
            
          

          @php
          }
          @endphp


    $('#job_category').select2({
        placeholder: "Select from the below list",
        allowClear: true,
        ajax: {
            url: "{{route('get_categories')}}",
            data: function (params) {
              var query = { search: params.term,page: params.page || 1 }
              return query;
            },
            processResults: function (data,params) {
              params.page = params.page || 1;
              return {
                results: $.map(data.categories, function (item) {
                  return { text: item.fields.Name,id: item.fields.Name}
                  }),
                  pagination: {more: (params.page * 50) < data.total_count}
                }
            },
            dataType: 'json'
          }
    });

    $('.skillset').select2({
        placeholder: "Select from the below list",
        allowClear: true,
        ajax: {
            url: "{{route('get_skillset')}}",
            data: function (params) {
              var query = { search: params.term,page: params.page || 1 }
              return query;
            },
            processResults: function (data,params) {
              params.page = params.page || 1;
              return {
                results: $.map(data.skillsets, function (item) {
                  return { text: item.fields.Name,id: item.fields.Name}
                  }),
                  pagination: {more: (params.page * 50) < data.total_count}
                }
            },
            dataType: 'json'
          }
    });

    $('.module').select2({
        placeholder: "Select from the below list",
        allowClear: true,
        ajax: {
            url: "{{route('get_modules')}}",
            data: function (params) {
              var query = { search: params.term,page: params.page || 1 }
              return query;
            },
            processResults: function (data,params) {
              params.page = params.page || 1;
              return {
                results: $.map(data.modules, function (item) {
                  return { text: item.fields.Module_Title,id: item.id}
                  }),
                  pagination: {more: (params.page * 50) < data.total_count}
                }
            },
            dataType: 'json'
          }
    });

  </script>
    @include('footer')