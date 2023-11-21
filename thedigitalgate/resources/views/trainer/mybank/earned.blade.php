@include('header')
@include('trainer.navigation')
@include('trainer.submenu')

<style>
.my_responsive_table th {
	position: sticky;
	top: 0;
}
.my_responsive_table td {
    vertical-align: middle;
}
@media only screen and (max-width: 767px) {
	.my_responsive_table th {
		font-size: 12px;
	}
	.my_responsive_table td {
		font-size: 12px;
		padding: 3px;
	}
	.my_responsive_table td .btn {
		font-size: 12px;
	}
}
</style>
<div class="container pt-5 pb-5" >
	<div class="row">
		<div class="col-lg-10 col-md-10 offset-lg-1 offset-md-1 col-sm-12 col-xs-12" style="background: white;">
			<div class="mediumfont bold pb-4"> Earned </div> 
			<div class="row" style="display: none;">
				<table class ="a" style="width:100%">
					<tr> 
						<th class ="tableborder normalfont1 pinkbackground center p1 bold">Job title</th>
					<th class ="tableborder normalfont1 pinkbackground center p1 bold">Company name</th>
						<th class ="tableborder normalfont1 pinkbackground center p1 bold">Date</th>
						<th class ="tableborder normalfont1 pinkbackground center p1 bold">Work type</th>
						<th class ="tableborder normalfont1 pinkbackground center p1 bold">Earned</th>
						<th class ="tableborder normalfont1 pinkbackground center p1 bold">Status</th>
					</tr>
						<tr>
							<td class ="tableborder bold normalfont1 center ">Job title 1
								<div class="normalfont3 center">Mile stone 1</div></td>
							<td class ="tableborder center">Comapny Name</td>
							<td class ="tableborder center">Paid on: 2020-04-15</td>
							<td class ="tableborder center">Part time</td>
							<td class ="tableborder center">150$</td>
							<td class ="tableborder center"><i class="fa fa-eye" aria-hidden="true"></i></td>
						</tr>
					<tr>
						<td class ="tableborder bold normalfont1 center ">Job title 1
							<div class="normalfont3 center">Mile stone 1</div></td>
						<td class ="tableborder center ">Comapny Name</td>
						<td class ="tableborder center">Paid on: 2020-04-15</td>
						<td class ="tableborder center">Part time</td>
						<td class ="tableborder center">150$</td>
					<td class ="tableborder center"><i class="fa fa-eye" aria-hidden="true"></i></td>
					</tr>
					<tr>
						<td class ="tableborder bold normalfont1 center ">Job title 1
							<div class="normalfont3 center">Mile stone 1</div></td>
						<td class ="tableborder center">Comapny Name</td>
						<td class ="tableborder center">Paid on: 2020-04-15</td>
						<td class ="tableborder center">Part time</td>
						<td class ="tableborder center">150$</td>
					<td class ="tableborder center"><i class="fa fa-eye" aria-hidden="true"></i></td>
					</tr>
					<tr>
						<td class ="tableborder bold normalfont1 center ">Job title 1
							<div class="normalfont3 center">Mile stone 1</div></td>
						<td class ="tableborder center">Comapny Name</td>
						<td class ="tableborder center">Paid on: 2020-04-15</td>
						<td class ="tableborder center">Part time</td>
						<td class ="tableborder center">150$</td>
					<td class ="tableborder center"><i class="fa fa-eye" aria-hidden="true"></i></td>
					</tr>
				</table>
			</div>

			<div class="">
				<div class="my_responsive_table table-responsive" style="overflow-y: auto; height: 90vh;">
					<table class ="a table" style="width:100%;min-width: 535px;">
						<thead>
							<tr> 
								<th class ="tableborder normalfont1 pinkbackground center p1 bold">Date</th>
							<th class ="tableborder normalfont1 pinkbackground center p1 bold">Aspirant ID </th>
								<th class ="tableborder normalfont1 pinkbackground center p1 bold">Invoice number</th>
								<th class ="tableborder normalfont1 pinkbackground center p1 bold">Training ID </th>
								<th class ="tableborder normalfont1 pinkbackground center p1 bold">Amount</th>
								<th class ="tableborder normalfont1 pinkbackground center p1 bold">Status</th>
							</tr>
						</thead>
						<tbody>
							@if ($accstatment->count())
							@foreach($accstatment as $as)
								<tr>
									<td class ="tableborder bold normalfont1 center ">{{ date("Y-m-d",strtotime($as->paydate)) }}</td>
									<td class ="tableborder center">{{ $as->fname }} {{ $as->sname }}</td>
									<td class ="tableborder center">#1234</td>
									<td class ="tableborder center">T-1</td>
									@if($as->mcurr == "inr")
										<td class="tableborder center">Rs. {{$as->mamt}}</td>
									@else
										<td class="tableborder center">{{$as->mamt}} <span style="text-transform: uppercase;">{{$as->mcurr}}</span></td>
									@endif
									<td class ="tableborder center">
										<!-- <button class="btn btn-success">Completed</button> -->
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
							@else
								<tr>
									<td>No Data</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
</div>
@include('footer')
