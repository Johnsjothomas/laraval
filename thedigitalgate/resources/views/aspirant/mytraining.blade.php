@include('header') @include('aspirant.navigation') @include('aspirant.submenu')
<style>
.trainingtype_block_css .bluebtn
{
	padding: 10px 20px;	
}
.card-body .bluebtn
{
	line-height: 1;
	padding: 10px 10px !important;
}
.bookmark_this_module_css
{
	font-size: 25px;
	cursor:pointer;
}
.card-title {
    margin-bottom: 0.75rem;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.card .card-header span.card-description {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    display: inline-block;
    width: 100%;
}
.card-body .gotocart {
    display: inline-block;
    padding: 12px 10px !important;
}
.filter_bar_css
{
	display: flex;
	cursor: pointer;
}
.filter_bar_css li
{
	padding: 5px;
	border-radius: 4px;
	background: #e34c1afa;
	color: #fff;
	list-style: none;
	width: auto;
	margin: 2px 10px;
}
.filter_bar_css li span.text_filter_name_css
{
	padding: 5px;
	border-radius: 4px;
	background: #e34c1afa;
	color: #fff;
	list-style: none;
	width: auto;
	margin: 2px 10px;
}
@media only screen and (max-width: 992px){
	.scrollable_table {
		overflow-x: auto;
		width: 100%;
	}
	.scrollable_table table {
		width: 850px !important;
	}
}
</style>
<div class="container justify-content-center align-center pt-5">
	<img class="img-fluid " style="width: 100%" src="{{ asset('talent/assets/img/myprofile.png') }}" />
	<div class="row" style=" position: relative; top: -70px; left: 45px; ">
        <div class="col-sm-2">
          <div class="profile-pic-wrapper pt-3">
            <div class="pic-holder">
              <!-- uploaded pic shown here -->
              <img id="profilePic" class="pic" src="{{setProfilePic(@$aspirantData['profile_pic'])}}">
            </div>
          </div>
        </div>
        <div class="col-sm-6" style="top: 74px;">
          <h3>{{session()->get('FirstName')}}</h3>
          <h6>{{repalceWithMentorRole(session()->get('Role'))}}</h6>
      </div>
    </div>
	<br /><br />
	<div class="row">
		<div class="col-12 mb_15 trainingtype_block_css trainingtype_block_js">
			<span class=" pr-2">
				<button class="trainingtype_btn_js" data-start="0" data-type="recommended" id="ReccoTrainingBtn" >Recommended Test & Training</button>
			</span>
			<span class=" ">
				<button class="trainingtype_btn_js" data-start="0" data-type="saved" id="SavedTrainingBtn">Saved Test & Training</button>
			</span>
			<span class=" ">
				<button class="trainingtype_btn_js" data-start="0" data-type="applied" id="AppliedTrainingBtn">Applied Test & Training</button>
			</span>
			<span class=" ">
				<button type="" id="CompletedTrainingBtn">Completed Test & Training</button>
			</span>
			<!-- <span class=" ">
				<button class="whitebtn">Certification</button>
			</span> -->
		</div>

		<div class="col-12">
			<!-- <a href="#" class="card-link" style="color:#15284c;">Open for All</a>
                <a href="#" class="card-link">Complulsary Training to apply for job</a> -->

		</div>
	</div>

	<br /><br />

	<div id="Fin_Recco_ModulesDiv" >
		@php
			$greenBlockArray = array(
				"healthCare"	=> "Health Care",
				"finance"		=> "Finance",
				"cyber"			=> "Cyber Security",
				"aiMl"			=> "AI/ML/Web 3",
				"industry"		=> "Industrial",
				"legalSkill"	=> "Legal",
				"softSkill"		=> "Softskills"
			);
			$parentSkill = @$aspirantData['parent_skill'] ? @$greenBlockArray[$aspirantData['parent_skill']] : '';
		@endphp
		<h2 class="pt-5 pb-3">Modules by {{$parentSkill}}</h2>
		<div class="row">
			@if($aspirantData['skills'])
			@php 
				$selected_skill = $aspirantData['skills'];
				$selected_skill_ar = explode(",",$selected_skill);
				$selected_skill_ar =  array_filter($selected_skill_ar);
				$selected_skill_ar =  array_slice($selected_skill_ar, 0, 3);
			@endphp
			@foreach($selected_skill_ar as $singleSkill)
				<div class="col-md-4 pt-3 pb-3">
					<div style="    box-shadow: 0px 0px 5px 3px #cbc2c2;border-radius: 5px !important;">
						<div class="card remove_br">
							<div class="card-header p-0">
								<img src="{{ asset('talent/assets/img/myprofile.png ') }}" width="100%">
								<h6 class="card-title p-3">Modules by {{$singleSkill}}</h6>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@endif
			<!-- <div class="col-md-4 pt-3 pb-3">
				<div class="card remove_br">
					<div class="card-header p-0">
						<img src="{{ asset('talent/assets/img/myprofile.png ') }}" width="100%">
						<h6 class="card-title p-3">Modules by category</h6>
					</div>
				</div>
			</div>
			<div class="col-md-4 pt-3 pb-3">
				<div class="card remove_br">
					<div class="card-header p-0">
						<img src="{{ asset('talent/assets/img/myprofile.png ') }}" width="100%">
						<h6 class="card-title p-3">Modules by category</h6>
					</div>
				</div>
			</div> -->
		</div><br>

		<!-- <h2 class="pb-3">Hands on Training-An effective way to learn</h2> -->
		
		<div class="row Moduletypebtndiv">
			<div class="col-sm-2">
				<span class="bold recommended_module_btn" data-subtype="technical" style="padding:15px; border-radius: 5px; cursor:pointer;border: 1px solid grey;display:inline-block;" id="TechnicalBtn">Technical</span>
			</div>
			<div class="col-sm-2">
				<span class="bold recommended_module_btn" data-subtype="softskill"  style="padding:15px; border-radius: 5px; cursor:pointer;border: 1px solid grey;display:inline-block;" id="SoftskillsBtn">Soft-skill</span>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="mt-4">
					<ul class="filter_bar_css filter_bar_jss"></ul>
				</div>
			</div>
		</div>

		<h2 class="pb-3">Recommended Modules</h2>
		<div class="row mt-4 recommended_block_js">
			{{-- <div class="row mt-4" id="TechnicalCard1" >
				@if($moduleinfoforAspirantTechnical->count())
				@foreach($moduleinfoforAspirantTechnical as $mtech)
				<div class="col-md-4">
					<div class="card remove_br">
						<div class="card-header p-0 ">
							<img src="/talent/trainer/assets/img/myprofile.png" width="100%" style="height: 150px;">
							<div class="p-3">
								<div class="row">
									<div class="col-10">
										<h4 class="card-title">{{$mtech->moduleTitle}}</h4>
									</div>
									<div class="col-2 bookmarkSave" id="bookmarkSave" >
										<i class="pt-1 fa fa-bookmark right" aria-hidden="true"></i>
									</div>
								</div>
								{{$mtech->moduleDescription}}
							</div>
						</div>
						<div class="card-body">
							<h6>First Session on</h6>
							<div class="row">
								<div class="col-md-6"><i class="fa fa-briefcase" aria-hidden="true"></i> {{$mtech->startDate}}</div>
								<div class="col-md-6"><i class="fa fa-users" aria-hidden="true"></i> {{$mtech->maxParticipantPerModule}} Seats remaining</div>
							</div>
							<br />
							<h6>Next Session on</h6>
							<div class="row">
								<div class="col-md-6">Start Time</div>
								<div class="col-md-6">End Time</div>
							</div>
							<div class="row">
								<div class="col-md-6">{{date("h:i a",strtotime($mtech->startDate))}}</div>
								<div class="col-md-6">{{date("h:i a",strtotime($mtech->endDateTime))}}</div>
							</div>
							<div class="row">
								<div class="col-12">
									<br />
									<!-- <button type="button" value="{{$mtech->module_Id}}" class="bluebtn mr-2" id="editOnModal">View more details</button> -->
									<!-- <a class="bluebtn mr-2" href="/moduleinfo/{{$mtech->module_Id}}" id="editOnModal">View more details</a> -->
									<a class="bluebtn mr-2" href="{{url('aspirant/moduleinfo/')}}/{{$mtech->module_Id}}" id="editOnModal">View more details</a>
									<a class="bluebtn mr-2" href="" id="">btn text here</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@else
				<div class="alert alert-warning">No Technical Module found...</div>
				@endif
			</div>

			<div class="row mt-4" id="SpokenEnglishCard">
				@if($moduleinfoforAspirantSoftskill->count())
				@foreach($moduleinfoforAspirantSoftskill as $mskills)
				<div class="col-md-4">
					<div class="card remove_br">
						<div class="card-header p-0 ">
							<img src="/talent/trainer/assets/img/myprofile.png" width="100%" style="height: 150px;">
							<div class="p-3">
								<div class="row">
									<div class="col-10">
										<h4 class="card-title">{{$mskills->moduleTitle}}</h4>
									</div>
									<div class="col-2">
										<i class="pt-1 fa fa-bookmark right" aria-hidden="true"></i>
									</div>
								</div>
								{{$mskills->moduleDescription}}
							</div>
						</div>
						<div class="card-body">
							<h6>First Session on</h6>
							<div class="row">
								<div class="col-md-6"><i class="fa fa-briefcase" aria-hidden="true"></i> {{$mskills->startDate}}</div>
								<div class="col-md-6"><i class="fa fa-users" aria-hidden="true"></i> {{$mskills->maxParticipantPerModule}} Seats remaining</div>
							</div>
							<br />
							<h6>Next Session on</h6>
							<div class="row">
								<div class="col-md-6">Start Time</div>
								<div class="col-md-6">End Time</div>
							</div>
							<div class="row">
								<div class="col-md-6">{{date("h:i a",strtotime($mskills->startDate))}}</div>
								<div class="col-md-6">{{date("h:i a",strtotime($mskills->endDateTime))}}</div>
							</div>
							<div class="row">
								<div class="col-12">
									<br />
									<!-- <button class="bluebtn mr-2">View more details</button> -->
									<a class="bluebtn mr-2" href="{{url('aspirant/moduleinfo/')}}/{{$mskills->module_Id}}" id="editOnModal">View more details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				@else
				<div class="alert alert-warning">No Soft-Skill Module found...</div>
				@endif
			</div> --}}
		</div>
	</div>


	<div id="SavedModuleDiv">
		<div class="container-fluid">
			<div class="row">
				<div class="mt-4">
					<ul class="filter_bar_css filter_bar_jss"></ul>
				</div>
			</div>
		</div>
		<h2 class="pb-3">Saved Modules</h2>
		<div class="row mt-4 saved_block_js">
		</div>
	</div>


	<!-- for Applied -->
	<div id="AppliedModule">
		<div class="container-fluid">
			<div class="row">
				<div class="mt-4">
					<ul class="filter_bar_css filter_bar_jss"></ul>
				</div>
			</div>
		</div>
		<h2 class="pb-3">Applied Modules</h2>
		<div class="row mt-4 applied_block_js">
			
		</div>
	</div>

	<!-- End Applied-->
	<div id="CompletedModule">
		<h2 class="pb-3">Completed Modules</h2>
		<div class="scrollable_table">
			<table class="mb-5" style="width: 100%">
				<tr>
					<th class="tableborder normalfont1 pinkbackground center p1 bold">ModuleID</th>
					<th class="tableborder normalfont1 pinkbackground center p1 bold">Module Title</th>
					<th class="tableborder normalfont1 pinkbackground center p1 bold">{{repalceWithMentor('Trainer')}} Name</th>
					<th class="tableborder normalfont1 pinkbackground center p1 bold">Type of Module</th>
					<th class="tableborder normalfont1 pinkbackground center p1 bold">Payment Date</th>
					<th class="tableborder normalfont1 pinkbackground center p1 bold">Completion Date</th>
					<th class="tableborder normalfont1 pinkbackground center p1 bold">Amount</th>
					<th class="tableborder normalfont1 pinkbackground center p1 bold">Certificate</th>
				</tr>
				@if ($MayCartData->count())
				@foreach($MayCartData as $crMo)
				<tr style="text-align: center; justify-content: center; align-items: center; line-height: 4; font-weight: bolder;">
					<td>{{$crMo->module_Id}}</td>
					<td>{{$crMo->moduleTitle}}</td>
					<td>{{$crMo->first_name}}</td>
					<td>{{$crMo->trainingClassification}}</td>
					<td>{{(@$crMo->payment_date ? date("d/m/Y",strtotime($crMo->payment_date)) : "")}}</td>
					<td>{{(@$crMo->endDateTime ? date("d/m/Y",strtotime($crMo->endDateTime)) : "")}}</td>
					@if($crMo->currency == 'inr')
						<td style="text-transform: uppercase;">Rs. {{$crMo->amount}}</td>
					@else
						<td style="text-transform: uppercase;">{{$crMo->amount}}  {{$crMo->currency}}</td>
					@endif
					<td>
						@php 
							$disabled_button = 'disabled'; 
							$style_button = 'background-color: #fc6717a8;border-color: #fc67176e;';
						@endphp
						{{--@if(strtotime($crMo->endDateTime) < (strtotime(date("Y-m-d H:i:s"))))--}}
						@if($crMo->issue_certificate_date != "")
							@php 
								$disabled_button = '';
								$style_button = 'background-color:#FC6717;border-color:#FC6717;';
							@endphp

						@endif
							<button type="button" class="btn-sm bluebtn cetificate_view_btn_jss" trainer_id="{{$crMo->trainer_id}}" data_module_id="{{$crMo->module_Id}}" {{$disabled_button}}  style="{{$style_button}}">Download Certificate </button>
					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td>No Data</td>
				</tr>
				@endif

			</table>
		</div>
	</div>

	<div class="p-5 justify-content-center align-center showmoreBtnblock_js" style="text-align:center;">
		<div class="showmoreBtn_js bluebtn p-1 pl-3 pr-3" style="width:auto; display:inline-block; padding:10px 20px;cursor:pointer;line-height:2;">See more modules</div>
	</div> 
</div>

 <!-- Modal -->
 <div class="modal fade" id="certificateModal" tabindex="-1" aria-labelledby="certificateModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="certificateModalLabel">Certificate</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			  <div>
				  <embed src="" type="application/pdf" height="800px" width="100%" class="responsive">
			  </div>
			  <div class="text-right">
				  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			  </div>
		</div>
		
	  </div>
	</div>
  </div>
  <!-- Modal End-->
@include('footer')




<script>
function listModule(start,limit,type,sub_type,$this)
{
	if(sub_type == "" && type == 'recommended')
	{	
		sub_type = $("#Fin_Recco_ModulesDiv .Moduletypebtndiv .recommended_module_btn.bluebtn").attr("data-subtype");
	}
	var training_name = $(".search_tarining_by_aspirant_jss").val();
	jQuery(".loder").show();
	$.ajax({
		url: "/talent/aspirant/listModule",
		method:'POST',
		data: {	"_token": "{{ csrf_token() }}",  
				"skip" : start,
				"limit" : limit,
				"type" : type,
				"sub_type" :sub_type,
				"training_name" : training_name,
		},
		success: function(response) {
			$this.attr("data-start",response.next_start_length);
			if(start == 0)
			{
				$("."+type+"_block_js").html(response.html);

			}
			else
			{
				$("."+type+"_block_js").append(response.html);
			}
			if(response.html == "")
			{
				$(".showmoreBtnblock_js").hide();
			}
			else
			{
				$(".showmoreBtnblock_js").show();
			}
			$(".filter_bar_jss").html(response.return_filter_bar);
			$('.bookmark_this_module_js[title]').tooltip();
			jQuery(".loder").hide();
		}
	});
}

$(document).ready(function() {
		$("body").on("click", ".remove_this_filter_jss", function(e){
      $(".search_tarining_by_aspirant_jss").val("");
    	$(".trainingtype_block_js .trainingtype_btn_js.bluebtn").trigger("click");
			$(this).closest("li").remove();
    });
		$("body").on("click", ".open_new_with_jquery", function(e){
			e.preventDefault();

			var hreff = $(this).attr("href");
			if(hreff && hreff != '')
			{
				// const prefix = 'http://';
				// const prefix2 = 'https://';
				//if (hreff.substr(0, prefix.length) !== prefix || hreff.substr(0, prefix2.length) !== prefix2)
				{
					//hreff = prefix + hreff;
				}
				window.open(hreff, '_blank');
			}
			else
			{
				alert_msg(0, "Link not found.");
			}
    });

		$("body").on("keypress", ".search_tarining_by_aspirant_jss", function(e){
            if (e.which === 13) 
            {
				$(".trainingtype_block_js .trainingtype_btn_js.bluebtn").trigger("click");
            }
        });

		$('#SpokenEnglishCard').hide();
		$('#SavedModuleDiv').hide();
		$('#Fin_Recco_ModulesDiv').show();
		$('#AppliedModule').hide();
		$('#CompletedModule').hide();
		listModule(0,6,'recommended','technical',$(".trainingtype_btn_js[data-type='recommended']"));
		$(document).on('click', '.trainingtype_btn_js', function() {
			var type = $(this).attr("data-type");
			var skip = 0;
			var limit = 6;
			var $this = $(this);
			var sub_type = "";
			listModule(skip,limit,type,sub_type,$this);
		});


		$(document).on('click', '.showmoreBtnblock_js .showmoreBtn_js', function() {
			var skip = $(".trainingtype_btn_js.bluebtn").attr("data-start");
			var type = $(".trainingtype_btn_js.bluebtn").attr("data-type");
			var sub_type = "";
			var limit = 6;
			var $this = $(this);
			listModule(skip,limit,type,sub_type,$(".trainingtype_btn_js.bluebtn"));
		});
		
		$(document).on('click', '#Fin_Recco_ModulesDiv .Moduletypebtndiv .recommended_module_btn', function() {
			var skip = 0;
			var type = $(".trainingtype_btn_js.bluebtn").attr("data-type");
			var sub_type = $(this).attr("data-subtype");
			var limit = 6;
			var $this = $(this);
			listModule(skip,limit,type,sub_type,$(".trainingtype_btn_js.bluebtn"));
		});

		$(document).on('click', '#editOnModal', function() {
			var module_Id = $(this).val();
			// $('#edit-modal').modal('show');

			$.ajax({
				type: "Get",
				// url: "/edit-module/" + module_Id, 
				url: "/aspirant/moduleinfo/" + module_Id,
				success: function(response) {
					//console.log(response.module_Id);
					// document.window.navigate('aspirant/moduleinfo/'+module_Id);
					// $('#module_Id').val(response.Module[0].module_Id);
					// $('#edittrainingType').val(response.Module[0].trainingType);

					// console.log(response.Module[0].moduleTitle);
					// valll = $('#editmoduleTitle').text();
					// console.log(valll);
				}
			});
		});

		$('#ReccoTrainingBtn').addClass("bluebtn");
		$('#SavedTrainingBtn').addClass("whitebtn");
		$('#AppliedTrainingBtn').addClass("whitebtn");
		$('#CompletedTrainingBtn').addClass("whitebtn");


		$(".Moduletypebtndiv span").on("click", function() {
			$(".Moduletypebtndiv span").removeClass("bluebtn");
			$(this).addClass("bluebtn");
		});

		$('#TechnicalBtn').addClass('bluebtn');
		// $('#SoftskillsBtn').addClass('whitebtn');

		$('#SoftskillsBtn').click(function() {
			$('#SpokenEnglishCard').slideDown("slow");
			$('#TechnicalCard1').hide();
			$('#TechnicalCard2').hide();
		});
		$('#TechnicalBtn').click(function() {
			$('#SpokenEnglishCard').hide();
			$('#TechnicalCard1').slideDown("slow");
			$('#TechnicalCard2').slideDown("slow");
		});

		$(document).on('click', '.bookmark_this_module_js', function() {
			var module_id = $(this).attr("data_id");
			var is_saved = $(this).attr("data_is_saved");
			var confirm_mes = 'Are you sure to unsave this training ?';
			var save_action = 0;
			var traing_type = $(".trainingtype_btn_js.bluebtn").attr("data-type");
			$this = $(this);

			if(is_saved == 0)
			{
				confirm_mes = 'Are you sure to save this training ?';
				save_action = 1;
			}
			
			if(confirm(confirm_mes))
			{
				jQuery(".loder").show();
				$.ajax({
					url: "/talent/aspirant/saveModule",
					method:'POST',
					data: {	
						"_token": "{{ csrf_token() }}",  
						"is_saved" : save_action,
						"module_Id" : module_id,	
					},
					success: function(response) {
						alert_msg(response.status, response.msg);
						if(traing_type == 'recommended')
						{
							$this.attr("data_is_saved",save_action);
							if(save_action == 1)
							{
								$this.removeClass("fa-heart-o");
								$this.addClass("fa-heart");
								$this.css("color","red");
								$this.attr("data-original-title",'Click to remove from save');
							}
							else
							{
								$this.removeClass("fa-heart");
								$this.addClass("fa-heart-o");
								$this.css("color","#FC6717");
								$this.attr("data-original-title",'Click to save');
							}
						}
						else
						{
							if(save_action == 0)
							{
								$this.closest(".single_module_card_js").remove();
							}
						}
						
						
						
						jQuery(".loder").hide();
					}
				});
			}
		});
		$("body").on("click", ".cetificate_view_btn_jss", function(e){
            // jQuery(".loder").show();
            //     $("#certificateModal").modal();
            // jQuery(".loder").hide();
            jQuery(".loder").show();

            var trainer_id = $(this).attr("trainer_id");
            var data_module_id = $(this).attr("data_module_id");

            $.ajax({
                url: "{{route('generateCertificateAspirant')}}",
                type: "POST",
                dataType: "json",
                data: {
                    _token: "{{ csrf_token() }}",
                    trainer_id: trainer_id,
                    data_module_id: data_module_id
                },
                success: function(response)
                {
                    jQuery(".loder").hide();
                    if(response.status)
                    {
                        $("#certificateModal").modal();
                        $("#certificateModal embed").attr("src", '{{url("/")}}'+"/certificates/certificate.php?id="+response.id);
                        // window.open('{{url("/")}}'+"/certificates/certificate.php?id="+response.id);
                    }
                    else
                    {
                        alert_msg(0, response.msg);
                    }
                },
                error: function(err)
                {
                    err = err.responseJSON ? err.responseJSON : {};
                    alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
                    jQuery(".loder").hide();
                }
            });
  		});

		$('#SavedTrainingBtn').click(function() {
			$('#SavedModuleDiv').slideDown();
			$('#AppliedModule').hide();
			$('#CompletedModule').hide();
			$('#Fin_Recco_ModulesDiv').hide();
		});

		$('#ReccoTrainingBtn').click(function() {
			$('#SavedModuleDiv').hide();
			$('#AppliedModule').hide();
			$('#CompletedModule').hide();
			$('#Fin_Recco_ModulesDiv').slideDown();
		});

		$('#AppliedTrainingBtn').click(function() {
			$('#SavedModuleDiv').hide();
			$('#Fin_Recco_ModulesDiv').hide();
			$('#CompletedModule').hide();
			$('#AppliedModule').slideDown();
			
		});

		$('#CompletedTrainingBtn').click(function() {
			$('#SavedModuleDiv').hide();
			$('#Fin_Recco_ModulesDiv').hide();
			$('#AppliedModule').hide();
			$('#CompletedModule').slideDown();
			$(".showmoreBtnblock_js").hide();
		});


		$('#ReccoTrainingBtn').click(function() {
			$(this).addClass("bluebtn");
			$(this).removeClass("whitebtn");
			$('#SavedTrainingBtn').removeClass("bluebtn");
			$('#AppliedTrainingBtn').removeClass("bluebtn");
			$('#CompletedTrainingBtn').removeClass("bluebtn");

			$('#SavedTrainingBtn').addClass("whitebtn");
			$('#AppliedTrainingBtn').addClass("whitebtn");
			$('#CompletedTrainingBtn').addClass("whitebtn");
		});
		$('#SavedTrainingBtn').click(function() {
			$(this).addClass("bluebtn");
			$(this).removeClass("whitebtn");
			$('#ReccoTrainingBtn').removeClass("bluebtn");
			$('#AppliedTrainingBtn').removeClass("bluebtn");
			$('#CompletedTrainingBtn').removeClass("bluebtn");

			$('#ReccoTrainingBtn').addClass("whitebtn");
			$('#AppliedTrainingBtn').addClass("whitebtn");
			$('#CompletedTrainingBtn').addClass("whitebtn");
		});
		$('#AppliedTrainingBtn').click(function() {
			$(this).addClass("bluebtn");
			$(this).removeClass("whitebtn");
			$('#SavedTrainingBtn').removeClass("bluebtn");
			$('#ReccoTrainingBtn').removeClass("bluebtn");
			$('#CompletedTrainingBtn').removeClass("bluebtn");

			$('#SavedTrainingBtn').addClass("whitebtn");
			$('#ReccoTrainingBtn').addClass("whitebtn");
			$('#CompletedTrainingBtn').addClass("whitebtn");
		});
		$('#CompletedTrainingBtn').click(function() {
			$(this).addClass("bluebtn");
			$(this).removeClass("whitebtn");
			$('#SavedTrainingBtn').removeClass("bluebtn");
			$('#AppliedTrainingBtn').removeClass("bluebtn");
			$('#ReccoTrainingBtn').removeClass("bluebtn");

			$('#SavedTrainingBtn').addClass("whitebtn");
			$('#AppliedTrainingBtn').addClass("whitebtn");
			$('#ReccoTrainingBtn').addClass("whitebtn");
		});

	});
</script>