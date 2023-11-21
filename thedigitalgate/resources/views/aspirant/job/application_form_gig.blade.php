
<!--pagestart-->
<form method="post" action="{{route('submit_application_gig')}}">
  @csrf
  <p>
    <input type="hidden" name="job_id" value="{{$uid}}">
    <input type="hidden" name="employment_type" value="{{$job_details->fields->Employment_Type}}">
  </p>

  <div class="row">
  <div class="form-group">
        <label for="text">Hourly Rate*</label><br>
        <span>Total Amount the client will see on your proporsal</span>
         <input name="hourly_rate" value="{{old('hourly_rate')}}" id="hourly_rate" required="" type="text" class="form-control">
         @error('hourly_rate')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
  </div>
</div>

  <div class="row">
  <div class="form-group">
        <label for="text">20% Talent Service Fee*</label><br>
        <span>Explain this</span>
  </div>
</div>

  <div class="row">
  <div class="form-group">
        <label for="text">You will Receive</label><br>
         <span>The estimated amount you will receive after service fees</span>
         <input class="input1 p5" type="text" name="" value="$24.00" id="name" required />
  </div>
</div>

  <div class="row">
  <div class="form-group">
        <label for="text">Total Project work Cost*</label><br>
        <span>The estimated amount you will receive after service fees</span>
         <input name="total_cost" value="{{old('total_cost')}}" id="total_cost" required="" type="text" class="form-control">
         @error('total_cost')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
  </div>
</div>

  <div class="row">
  <div class="form-group">
         <label>Total Estimated Hours</label><br>
              <span>The estimated amount you will receive after service fees</span> 
         <input name="estimated_hours" value="{{old('estimated_hours')}}" id="estimated_hours" required="" type="text" class="form-control">
         @error('estimated_hours')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
  </div>
</div>

  <div class="row">
  <div class="form-group">
        <label>Additional Details</label><br>
        <label for="text">Cover Letter</label><br>
        <span>Introduce yourself and explain why you’re a  strong candidate for this job .fee free to suggest any changes to the job details or ask to schedule a video call</span>
         <textarea name="cover_letter" rows="5" class="input11">{{old('cover_letter')}}</textarea>
         @error('cover_letter')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
  </div>
</div>

  <div class="form-group">
        <button type="submit" class="input1 white" id="btnSubmit" style="background:#15284C"> Submit</button>
</div>





