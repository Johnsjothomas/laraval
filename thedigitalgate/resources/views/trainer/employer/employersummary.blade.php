@include('header') @include('trainer.navigation') @include('trainer.submenu')
<div class="container justify-content-center align-center pt-5 pb-5">
	<div class="row">
		<div class="col">
			<img class="img-fluid " style="width: 100%" src="/talent/assets/img/myprofile.png">
		</div>
	</div>
	@include('profile_head')
	@include('trainer.employer.navigation')
	 <div class="row">
            <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                    <tr>
                        <th>Company</th>
                        <th>Training category</th>
                        <th>Module Title</th>
                        <th>Training Status</th>
                        <th>Number of Aspirants</th>
                        <th>Total Amount Received</th>
                        <th>Average Rating</th>
                        <th>Certification Status</th>
                       </tr>
                    </thead>
                    <tbody>
                    	<tr>
                       
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Upcoming/Active/Paused/deleted/Completed</td>
                         <td></td>
                        <td></td>
                        <td>4.5 <a href="#" class="bluebtn btn-sm" style="display: inline-block">Click Here</a></td>
                        <td>Issued/Pending</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            </div>
        </div>
	
</div>
<!-- Modal -->
<div class="modal fade" id="aspiranttrainingcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center mb-4">
				<h5 class="mb-4">Training code Dropdown</h5>
				<div class="col-12  pt-4">
					<input type="text" class="form-control col-12">
				</div>
				<br />
				<button type="button" class="btn bluebtn" data-dismiss="modal">Send</button>
			</div>
		</div>
	</div>
</div>
@include('footer')
