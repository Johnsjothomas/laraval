@include('header')
@include('trainer.navigation')
@include('trainer.submenu')
<!----trainer setting page-->
<style>
.accountsettings label 
{
	color: #696F79;
	font-weight: normal;
  padding: 0px;
}
.edit_details_icon_css{
  color: #FC6717;
  font-size: 21px;
  cursor: pointer;
  margin-left: 5px;
}
</style>
<div class="container pt-5 pb-5 ">

<div class="row">
  <div class="col-3 pt-5 pb-5">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Communication and Privacy</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Account</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content accountsettings" id="v-pills-tabContent">
      <div class="tab-pane fade p5 show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
   
      </div>
      <div class="tab-pane fade p5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
          <a href="{{url('trainer/profiledetails')}}" class="bluebtn btn-sm pl-3 pr-3" style="float:right; text-align:center;">Edit</a>
            <h4>Account Settings</h4>
           
            <label>the digital gate would show the recommendations based on your job preferences mentioned in your job profile. Editing it would also change your desired career profile</label>
            <br>
            <br>

            <h6>E-mail Address <i class="fa fa-pencil edit_button edit_details_icon_css" data_type="email_id" title="Change E-mail Address" aria-hidden="true"></i></h6>
            <label>Primary E-mail</label>
            <br>
            <label class="edit_button_show_hide" data_hide="email_id">{{@$loggedInUser[0]['email_id']}}</label>
            <label class="w-100 edit_button_show_hide" data_show="email_id" style="display: none;">
                <input type="email" name="email_id" class="w-50 form-control" value="{{@$loggedInUser[0]['email_id']}}">
                <button type="button" class="btn btn-blue mt-1 profile_details_edit_btn_jss" data-for="email_id">Save</button>
            </label>
            <br>
            <br>

            <h6>Phone Number <i class="fa fa-pencil edit_button edit_details_icon_css" data_type="mobile" title="Change Phone Number" aria-hidden="true"></i></h6>
            <label class="edit_button_show_hide" data_hide="mobile">{{@$loggedInUser[0]['mobile']}}</label>
            <label class="w-100 edit_button_show_hide" data_show="mobile" style="display: none;">
                <input type="tel" name="mobile" class="w-50 form-control" value="{{@$loggedInUser[0]['mobile']}}">
                <button type="button" class="btn btn-blue mt-1 profile_details_edit_btn_jss" data-for="mobile">Save</button>
            </label>
            <br>
            <br>

            <h6>Change Password</h6>
            <label style="cursor: pointer;" data-toggle="modal" data-target="#change_pwd_modal">Change Password</label>
            <br>
            <br>

            {{-- <h4 class="pb-2">Subscription & Payments</h4>
            <br>
            <h6>Upgrade </h6>
            <label>Upgrade your account </label>
            <br>
            <br> --}}

            <h4 class="pb-2">Account Management</h4>
            <br>
            {{-- <h6>Hibernate Account</h6>
            <label>Hibernate Account</label> --}}
            <h6>Close Account</h6>
            <label style="cursor: pointer;" class="close_your_account">Close your account</label> 

      </div>

    </div>
  </div>
</div>

</div>
<div class="modal fade" id="change_pwd_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
  <form action="javascript:;" id="change_pwd_form">
    @csrf
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Change password</h4>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Old password</label>
        <input name="old_pwd" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>New password</label>
        <input name="password" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>Confirm password</label>
        <input name="password_confirmation" type="text" class="form-control">
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success">Submit</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
    </div>
  </form>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  $('.edit_button[title]').tooltip();
  $("body").on("click", ".close_your_account", function(){
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this account data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        jQuery(".loder").show();

        $.ajax({
          url: "{{route('delete_trainer')}}",
          type: "POST",
          dataType: "json",
          data: {
            _token: "{{ csrf_token() }}",  
          },
          success: function(response)
          {
            if(response.status)
            {
              swal({
                title: "Deleted!",
                text: "Your account has been deleted.",
                icon: "success"
              })
              .then((value) => {
                window.location.href = "{{route('logout')}}";
              });
            }
            else
            {
              swal("Error!", response.msg ? response.msg : "Your account has been not deleted. Please try again", "error");
            }
            jQuery(".loder").hide();
          }
        });
      }
    });
  });
  $("body").on("submit", "#change_pwd_form", function(e){
    e.preventDefault();
  
    jQuery(".loder").show();
    
    var data = new FormData(this);
    var $this = $(this);
    $.ajax({
      url: "{{route('changeTrainerPassword')}}",
      type: "POST",
      dataType: "json",
      data: data,
      contentType: false,
      processData: false,
      success: function(response)
      {
        if(response.status)
        {
          alert_msg(1, response.msg);
          $('#change_pwd_modal [type="text"]').val("");
          $("#change_pwd_modal").modal("hide");
        }
        else
        {
          alert_msg(0, response.msg);
        }
        jQuery(".loder").hide();
      },
      error: function(err)
      {
        err = err.responseJSON ? err.responseJSON : {};
        alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
        jQuery(".loder").hide();
      }
    });
  });
  $("body").on("click", ".edit_button", function(e){
    var data_type = $(this).attr("data_type");
    if($('.edit_button_show_hide[data_hide="'+data_type+'"]').is(":visible"))
    {
      $('.edit_button_show_hide[data_hide="'+data_type+'"]').hide();
      $('.edit_button_show_hide[data_show="'+data_type+'"]').slideDown();
    }
    else
    {
      $('.edit_button_show_hide[data_show="'+data_type+'"]').hide();
      $('.edit_button_show_hide[data_hide="'+data_type+'"]').slideDown();
    }
   
  });

  $("body").on("click", ".profile_details_edit_btn_jss", function(e){
    e.preventDefault();
    jQuery(".loder").show();
    var data_type = $(this).attr("data-for");
    var update_value = $(this).closest(".edit_button_show_hide").find("input[name='"+data_type+"']").val();
    $.ajax({
      url: "{{route('profileDetailsUpdateBysetting')}}",
      type: "POST",
      dataType: "json",
      data: {
        update_value : update_value,
        trainer_id : "{{@$loggedInUser[0]['trainer_id']}}",
        data_type : data_type,
        _token: "{{ csrf_token() }}",
      },
      success: function(response)
      {
        if(response.status)
        {
          alert_msg(1, response.msg);
          $('.edit_button_show_hide[data_hide="'+data_type+'"]').text(update_value);
          $('.edit_button_show_hide[data_hide="'+data_type+'"]').slideDown();
          $('.edit_button_show_hide[data_show="'+data_type+'"]').hide();
        }
        else
        {
          alert_msg(0, response.msg);
        }
        jQuery(".loder").hide();
      },
      error: function(err)
      {
        err = err.responseJSON ? err.responseJSON : {};
        alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
        jQuery(".loder").hide();
      }
    });
  });

});
</script>
@include('footer')