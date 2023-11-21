@include('header') @include('aspirant.navigation') @include('aspirant.submenu')
<style>
	.feedbackfrm .tableborder{
		border:0px;
	}
	table{
		border:0px;
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
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pb-5 pl-0 ">
					<div class="mediumfont bold">Feedback form for the {{repalceWithMentor('trainer')}} </div>
				</div>
			</div>
			
			<br />
			<div class="row feedbackfrm">
				<table class="a" style="width: 100%">
					<tr>
						<th class="tableborder normalfont1 pinkbackground  p1 ">Overall Course and Content Rating</th>
						<th class="tableborder normalfont1 pinkbackground center p1 ">EXCELLENT</th>
						<th class="tableborder normalfont1 pinkbackground center p1 ">VERY GOOD</th>
						<th class="tableborder normalfont1 pinkbackground center p1 ">GOOD</th>
						<th class="tableborder normalfont1 pinkbackground center p1 ">FAIR</th>
						<th class="tableborder normalfont1 pinkbackground center p1 ">POOR</th>
						
					</tr>
					<tr>
						<td class="tableborder  normalfont1  ">Your Overall Rating for the program</td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
					</tr>
					<tr class="pinkbackground">
						<td class="tableborder  normalfont1  ">Training Content</td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
					</tr>
					<tr>
						<td class="tableborder  normalfont1  ">Flow/Structure and Organization of Content</td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
					</tr>
					<tr class="pinkbackground">
						<td class="tableborder  normalfont1  ">Hand-outs & other Reading Materials</td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
					</tr>
					<tr>
						<td class="tableborder  normalfont1  ">Practical Use/ on-the-Job Application of What you've learnt</td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
					</tr>
					<tr class="pinkbackground">
						<td class="tableborder  normalfont1  ">Overall Course Content Rating</td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
						<td class="tableborder center"><input type="checkbox"  value=""></td>
					</tr>
				</table>
			</div>
		
		</div>
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
	</div>
</div>
@include('footer')
