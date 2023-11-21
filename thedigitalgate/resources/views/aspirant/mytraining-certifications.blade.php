@include('header') @include('aspirant.navigation') @include('aspirant.submenu')
<style>
.certifications .pinkbackground{
	color:#15284C;
	background-color: #F6F6F6;
}
.certifications .ashbtn, .certifications .bluebtn{
padding: 5px 15px;
font-size: 12px;}
</style>
<div class="container justify-content-center align-center pt-5">
	<div class="row">
            <div class="col-12 mb_15">
                <span class=" pr-2">
                    <button class="whitebtn">Recommended Training</button>
                </span>
                <span class=" ">
                    <button class="whitebtn">Saved Training</button>
                </span>
                <span class=" ">
                    <button class="whitebtn">Applied Training</button>
                </span>
                <span class=" ">
                    <button class="whitebtn">Completed Training</button>
                </span>
                <span class=" ">
                    <button class="bluebtn">Certification</button>
                </span>
                
            </div>

            <div class="col-12">
                <a href="#" class="card-link" style="color:#15284c;">Open for All</a>
                <a href="#" class="card-link">Complulsary Training to apply for job</a>
                
            </div>
        </div>
	
	<br/><br/>
	
	
	
	<div class="row certifications">
				<table class="a" style="width: 100%" class="">
					<tr>
						<th class="tableborder  pinkbackground center p1 ">Training Topic</th>
						<th class="tableborder  pinkbackground center p1 ">{{repalceWithMentor('Trainer')}}</th>
						<th class="tableborder  pinkbackground center p1 ">Category</th>
						<th class="tableborder  pinkbackground center p1 ">Start Date</th>
						<th class="tableborder  pinkbackground center p1 ">Amount Paid</th>
						<th class="tableborder  pinkbackground center p1 ">Rating</th>
						<th class="tableborder  pinkbackground center p1 ">Download Certificate</th>
					</tr>
					<tr>
						<td class="tableborder   center ">UX Design</td>
						<td class="tableborder center">Khaleel</td>
						<td class="tableborder center">Soft Skills</td>
						<td class="tableborder center">2020-04-15</td>
						<td class="tableborder center">150$</td>
						<td class="tableborder center">4.5 <a href="#" class="bluebtn">Click Here</a></td>
						<td class="tableborder center"><a href="#" class="ashbtn">Download</a></td>
					</tr>
					<tr>
						<td class="tableborder   center ">UX Design</td>
						<td class="tableborder center">Khaleel</td>
						<td class="tableborder center">Soft Skills</td>
						<td class="tableborder center">2020-04-15</td>
						<td class="tableborder center">150$</td>
						<td class="tableborder center">4.5 <a href="#" class="bluebtn">Click Here</a></td>
						<td class="tableborder center"><a href="#" class="ashbtn">Download</a></td>
					</tr>
					<tr>
						<td class="tableborder   center ">UX Design</td>
						<td class="tableborder center">Khaleel</td>
						<td class="tableborder center">Soft Skills</td>
						<td class="tableborder center">2020-04-15</td>
						<td class="tableborder center">150$</td>
						<td class="tableborder center">4.5 <a href="#" class="bluebtn">Click Here</a></td>
						<td class="tableborder center"><a href="#" class="ashbtn">Download</a></td>
					</tr>
				</table>
			</div>
			<br/><br/>
	
</div>
@include('footer')
