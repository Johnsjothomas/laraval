@include('header') @include('aspirant.navigation') @include('aspirant.submenu')
<style>
	.tableborder{
		border-top:0.5px solid rgba(82, 82, 82, 0.5);
		border-bottom:0.5px solid rgba(82, 82, 82, 0.5);
		border-left:0px;
		border-right:0px;
		padding-top:25px;
		padding-bottom:25px;
	}
	table{
		border:0.5px solid rgba(82, 82, 82, 0.5);
	}
	.tableborder.normalfont1{
		font-size:16px;
	}
</style>
<div class="container pt-5 pb-5">
	<div class="row">
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 pd0" style="background: white;">
			<div class="row">
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 pb-5 pl-0 ">
					<div class="mediumfont bold">My bank</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border ">
					<label class="pointer bold mediumfont1" style="color:#707070;">Earned</label> <label class="pointer mediumfont1 bold pd15" > Spend</label>
				</div>
			</div>
			<br />
			<div class="row">
				<table class="a" style="width: 100%">
					<tr>
						<th class="tableborder normalfont1 pinkbackground center p1 bold">Training Code</th>
						<th class="tableborder normalfont1 pinkbackground center p1 bold">{{repalceWithMentor('Trainer')}}/Company name</th>
						<th class="tableborder normalfont1 pinkbackground center p1 bold">Training Type</th>
						<th class="tableborder normalfont1 pinkbackground center p1 bold">% of Payment</th>
						<th class="tableborder normalfont1 pinkbackground center p1 bold">Payment Date</th>
						<th class="tableborder normalfont1 pinkbackground center p1 bold">Amount</th>
						<th class="tableborder normalfont1 pinkbackground center p1 bold">Invoice Number</th>
						<th class="tableborder normalfont1 pinkbackground center p1 bold">Balance</th>
					</tr>
					<tr>
						<td class="tableborder bold normalfont1 center ">Job title 1
							<div class="normalfont3 center">Mile stone 1</div>
						</td>
						<td class="tableborder center">Comapny Name</td>
						<td class="tableborder center">Gig</td>
						<td class="tableborder center">20%</td>
						<td class="tableborder center">2020-04-15</td>
						<td class="tableborder center">150$</td>
						<td class="tableborder center">12345</td>
						<td class="tableborder center"></td>
					</tr>
					<tr>
						<td class="tableborder bold normalfont1 center ">Job title 1
							<div class="normalfont3 center">Mile stone 1</div>
						</td>
						<td class="tableborder center">Comapny Name</td>
						<td class="tableborder center">Gig</td>
						<td class="tableborder center">20%</td>
						<td class="tableborder center">2020-04-15</td>
						<td class="tableborder center">150$</td>
						<td class="tableborder center">12345</td>
						<td class="tableborder center"></td>
					</tr>
				</table>
			</div>
			<div class="row">
				<table class="a" style="width: 100%; display: none;">
					<tr>
						<th class="tableborder normalfont1 pinkbackground center p1 bold">Date</th>
						<th class="tableborder normalfont1 pinkbackground center p1 bold">To</th>
						<th class="tableborder normalfont1 pinkbackground center p1 bold">Invoice number</th>
						<th class="tableborder normalfont1 pinkbackground center p1 bold">Amount spend</th>
						<th class="tableborder normalfont1 pinkbackground center p1 bold">Status</th>
					</tr>
					<tr>
						<td class="tableborder bold normalfont1 center ">2020-05-20</td>
						<td class="tableborder center">Adith</td>
						<td class="tableborder center">1321.56430354641</td>
						<td class="tableborder center">150$</td>
						<td class="tableborder center"><i class="fa fa-eye" aria-hidden="true"></i></td>
					</tr>
					<tr>
						<td class="tableborder bold normalfont1 center ">2020-05-20</td>
						<td class="tableborder center ">Adith</td>
						<td class="tableborder center">1321.56430354641</td>
						<td class="tableborder center">150$</td>
						<td class="tableborder center"><i class="fa fa-eye" aria-hidden="true"></i></td>
					</tr>
					<tr>
						<td class="tableborder bold normalfont1 center ">2020-05-20</td>
						<td class="tableborder center">Adith</td>
						<td class="tableborder center">1321.56430354641</td>
						<td class="tableborder center">150$</td>
						<td class="tableborder center"><i class="fa fa-eye" aria-hidden="true"></i></td>
					</tr>
					<tr>
						<td class="tableborder bold normalfont1 center ">2020-05-20</td>
						<td class="tableborder center">Adith</td>
						<td class="tableborder center">1321.56430354641</td>
						<td class="tableborder center">150$</td>
						<td class="tableborder center"><i class="fa fa-eye" aria-hidden="true"></i></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
	</div>
</div>
@include('footer')
