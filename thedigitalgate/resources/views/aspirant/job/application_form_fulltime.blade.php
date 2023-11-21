
<!--pagestart-->
<form method="post" action="{{route('submit_application_fulltime')}}">
  @csrf
  <p>
    <input type="hidden" name="job_id" value="{{$uid}}">
    <input type="hidden" name="employment_type" value="{{$job_details->fields->Employment_Type}}">
  </p>
<div class="row">

  <h3> Enter your Details </h3>
              <p>This job application will directly send your CV to the interviewer</p>  <br><br>
     </div>         

<div class="row">
  <div class="form-group">
        <label for="text">What is your notice period*</label>
         <input name="notice_period" value="{{old('notice_period')}}" id="notice_period" required="" type="text" class="form-control">
         @error('notice_period')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
  </div>
</div>

<div class="row">
   <div class="form-group">
        <label for="text">What is your current CTC*</label>
         <input name="current_ctc" value="{{old('current_ctc')}}" id="current_ctc" required="" type="number" class="form-control" aria-describedby="emailHelp" >
         @error('current_ctc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
  </div>
</div>

<div class="row">
   <div class="form-group">
        <label for="text">What is your expected CTC*</label>
         <input name="expected_ctc" value="{{old('expected_ctc')}}" id="expected_ctc" required="" type="number" class="form-control">
         @error('expected_ctc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
  </div>
 </div> 

<div class="row">
   <div class="form-group">
      <label for="text">Upload Different CV*</label>
       <input name="resume" required="" type="file" class="form-control " id="resume" >
       @error('resume')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
  </div>
</div>  

  <div class="form-group">
        <button type="submit" class="input1 white" id="btnSubmit" style="background:#15284C"> Submit</button>
</div>

</div>
  </form>

