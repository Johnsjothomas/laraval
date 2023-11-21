
@include('header');


<!--pagestart-->
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <img src="{{ asset('talent/assets/img/frame_forgot.svg') }}" width="100%">
            </div>
            <div class="col-sm-6 p-5">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="/talent/register"> < Back </a>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
                <div class="container-fluid" style="width: 80%;">
                    <h2 class="pt-5 pb-5">Forgot password</h2>
                    <div class="pt-5">
                        <form id="myButton">
                            <div class="form-group">
                                <label for="password">Create New password*</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter New password*" required>
                              </div>
                              <div class="form-group">
                                <label for="password">Re enter password*</label>
                                <input type="password" class="form-control" id="password" placeholder="Re enter password*" required>
                              </div>
                            <button type="submit"id="btnSubmit" class="btn btn-primary p-2" style="background: #15284C;width: 100%;">Continue </button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--pageend-->
<script type="text/javascript">
	 $('#myButton').on('submit', function(event){
       	    
        event.preventDefault();
         //disable the submit button
         $("#btnSubmit").attr("disabled", true);
           location.href = "/talent/login";
     });
</script>