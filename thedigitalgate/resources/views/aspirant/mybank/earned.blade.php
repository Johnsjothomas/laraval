@include('header') @include('aspirant.navigation') @include('aspirant.submenu')
<style>
.tableborder {
	border-top: 0.5px solid rgba(82, 82, 82, 0.5);
	border-bottom: 0.5px solid rgba(82, 82, 82, 0.5);
	border-left: 0px;
	border-right: 0px;
	padding-top: 25px;
	padding-bottom: 25px;
}

table {
	border: 0.5px solid rgba(82, 82, 82, 0.5);
}

.tableborder.normalfont1 {
	font-size: 16px;
}

.my_responsive_table th {
	position: sticky;
	top: 0;
}
.my_responsive_table td {
    vertical-align: middle;
}
@media only screen and (max-width: 767px) {
	.my_responsive_table th {
		font-size: 12px !important;
		padding: 3px !important;
	}
	.my_responsive_table td {
		font-size: 12px !important;
		padding: 3px !important;
	}
	.my_responsive_table td .btn {
		font-size: 12px !important;
	}
	.mediumfont {
		font-size: 26px;
	}
}
</style>
<div class="container pt-5 pb-5">
	<div class="row">
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="background: white;">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-5 col-xs-12 pb-5">
					<div class="mediumfont bold">My Bank</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-5 col-xs-12">
					@if ($message = Session::get('failed'))
					<div class="alert alert-danger alert-dismissible fade {{ Session::has('failed') ? 'show' : 'in' }}" style="margin-bottom: 15px;" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Error!</strong> {{ $message }}
					</div>
				@endif

				@if ($message = Session::get('success'))
					<div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" style="margin-bottom: 15px;"
						role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						<strong>Success!</strong> {{ $message }}
						<?php echo '<script>
						setTimeout(() => {
							$("#AccountBtn").trigger("click");
						}, "1000");
						</script>'; ?>
					</div>
				@endif
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 myBankTabs">
					<span class="bold" style="padding:8px; border-radius: 5px; cursor:pointer;" id="MyCartBtn">My Cart</span>&nbsp; &nbsp;
					<span class="bold" style="padding:8px; border-radius: 5px; cursor:pointer;" id="AccountBtn"> Account Statement</span>
				</div>
			</div>
			<br />
			<div class="cartdiv_js my_responsive_table table-responsive" style="overflow-y: auto; height: 90vh;" id="CartDiv">
				<table class="a table" style="width:100%;min-width: 635px;">
					<thead>
						<tr>
							<th class="tableborder normalfont1 pinkbackground center p1 bold">Module Title</th>
							<th class="tableborder normalfont1 pinkbackground center p1 bold">{{repalceWithMentor('Trainer')}} Name</th>
							<th class="tableborder normalfont1 pinkbackground center p1 bold">Type of Module</th>
							<th class="tableborder normalfont1 pinkbackground center p1 bold">Payment Date</th>
							<th class="tableborder normalfont1 pinkbackground center p1 bold">Amount</th>
							<th class="tableborder normalfont1 pinkbackground center p1 bold">ModuleID</th>
							<th class="tableborder normalfont1 pinkbackground center p1 bold">Checkout</th>
							<th class="tableborder normalfont1 pinkbackground center p1 bold"></th>
						</tr>
					</thead>
					<tbody>
						@if ($MayCartData->count())
						@foreach($MayCartData as $crMo)
								
						@if(strtotime($crMo->endDateTime) >= time())
					
						<tr style="text-align: center; justify-content: center; align-items: center; line-height: 4; font-weight: bolder;">
							<td>{{$crMo->moduleTitle}}</td>
							<td>{{$crMo->first_name}}</td>
							<td>{{$crMo->trainingClassification}}</td>
							<td>{{date("Y-m-d",strtotime($crMo->endDateTime))}}</td>
							@if($crMo->currency == 'inr')
								<td style="text-transform: uppercase;">Rs. {{$crMo->amount}}</td>
							@else
								<td style="text-transform: uppercase;">{{$crMo->amount}}  {{$crMo->currency}}</td>
							@endif
							<td>{{$crMo->module_Id}}</td>
							<td>

								<form method="POST" action="{{route('razorpay.payment.store')}}">
								@csrf
									<input type="hidden" name="amount" value="{{$crMo->amount}}" />
									<input type="hidden" name="aspirant_email" value="{{$crMo->ame}}" />
									<input type="hidden" name="aspirant_mobile" value="{{$crMo->amm}}" />
									<input type="hidden" name="aspirant_name" value="{{$crMo->afn}}" />
									<input type="hidden" name="aspirant_id" value="{{$crMo->aspirant_id}}" />
									<input type="hidden" name="module_id" value="{{$crMo->module_Id}}" />
									<input type="hidden" name="currency" value="{{$crMo->currency}}" /> 
									<button type="submit" class="btn-sm bluebtn">Check-Out</button>
								</form>
								
							</td>
							<td><button type="button" class="btn-sm btn-danger remove_cart_btn_js" data-id="{{$crMo->cart_id}}"><span class="fa fa-trash" ></span></button></td>
						</tr>
						@endif
						@endforeach
						@else
						<tr>
							<td>No Data</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		
			<div class="my_responsive_table table-responsive" style="overflow-y: auto; height: 90vh;" id="AccountView">
				<table class="a table" style="width:100%;min-width: 870px;">
					<thead>
						<tr>
							<th class="tableborder normalfont1 pinkbackground center p1 bold">Module Title</th>
							<th class="tableborder normalfont1 pinkbackground center p1 bold">{{repalceWithMentor('Trainer')}} Name</th>
							<th class="tableborder normalfont1 pinkbackground center p1 bold">Type of Module</th>
							<th class="tableborder normalfont1 pinkbackground center p1 bold">Payment Date</th>
							<th class="tableborder normalfont1 pinkbackground center p1 bold">Amount</th>
							{{--<th class="tableborder normalfont1 pinkbackground center p1 bold">Invoice Number</th>
							<th class="tableborder normalfont1 pinkbackground center p1 bold">Certificate Download</th>--}}
							<th class="tableborder normalfont1 pinkbackground center p1 bold">Payment Status</th>
						</tr>
					</thead>
					<tbody>
						@if ($accountstatment->count())
						@foreach($accountstatment as $as)
						<tr>
							<td class="tableborder bold normalfont1 center ">{{$as->modtitle}}
								<!-- <div class="normalfont3 center">Mile stone 1</div> -->
							</td>
							<td class="tableborder center">{{$as->fname}} {{$as->sname}}</td>
							<td class="tableborder center" style="text-transform: capitalize;">{{$as->typeofmod}}</td>
							<td class="tableborder center">{{ date("Y-m-d",strtotime($as->payment_date)) }}</td>
							@if($as->mcurr == "inr")
								<td class="tableborder center">Rs. {{$as->mamt}}</td>
							@else
								<td class="tableborder center">{{$as->mamt}} <span style="text-transform: uppercase;">{{$as->mcurr}}</span></td>
							@endif
							{{--<td class="tableborder center">NOT #1232345</td>
							<td class="tableborder center"><a href="#">NOT Click here to Download</a></td>--}}
							<td class="tableborder center">
								@if($as->status == "Pending")
									<span class="btn btn-warning">{{$as->status}}</span>
								@endif
								@if($as->status == 'Paid')
									<span class="btn btn-success">{{$as->status}}</span>
								@endif
								@if($as->status == 'Failed')
									<span class="btn btn-danger">{{$as->status}}</span>
								@endif
							</td>
						</tr>
						@endforeach
						@endif
						@if ($MayCartData->count())
						@foreach($MayCartData as $crMo)
								
						@if(strtotime($crMo->endDateTime) < time())
					
						<tr>
							<td class="tableborder bold normalfont1 center">{{$crMo->moduleTitle}}</td>
							<td class="tableborder center">{{$crMo->first_name}}</td>
							<td class="tableborder center">{{$crMo->trainingClassification}}</td>
							<td class="tableborder center">{{date("Y-m-d",strtotime($crMo->endDateTime))}}</td>
							@if($crMo->currency == 'inr')
								<td class="tableborder center" style="text-transform: uppercase;">Rs. {{$crMo->amount}}</td>
							@else
								<td class="tableborder center" style="text-transform: uppercase;">{{$crMo->amount}}  {{$crMo->currency}}</td>
							@endif
							<td class="tableborder center">
								<span class="btn btn-warning">Pending</span>
							</td>
						</tr>
						@endif
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
	</div>
</div>
@include('footer')



<script>
	$(document).ready(function() {

		$('#AccountView').hide();
		$('#CartDiv').slideDown();
		$('#MyCartBtn').addClass("bluebtn");

		$('#MyCartBtn').click(function() {
			$('#AccountView').hide();
			$('#CartDiv').slideDown();
		});
		$('#AccountBtn').click(function() {
			$('#AccountView').slideDown();
			$('#CartDiv').hide();
		});



		$(".myBankTabs span").on("click", function() {
			$(".myBankTabs span").removeClass("bluebtn");
			$(this).addClass("bluebtn");
		});

		
		$("body").on("click", ".cartdiv_js .remove_cart_btn_js", function(e){
			e.preventDefault();
			if(confirm('Are You sure to remove this training from your cart..??'))
			{
				jQuery(".loder").show();
				var recorId = $(this).attr("data-id");
				$this = $(this);
				$.ajax({
				url: "{{route('trainingRemoveFromCart')}}",
				type: "POST",
				dataType: "json",
				data: {
					recorId : recorId,
					_token: "{{ csrf_token() }}",
				},
				success: function(response)
				{
					if(response.status)
					{
						alert_msg(1, response.msg);
						$this.closest("tr").remove();
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
			}
		});
});
</script>