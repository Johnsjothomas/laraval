@include('header') @include('trainer.navigation') @include('trainer.submenu2')
<div class="container justify-content-center align-center pt-5 pb-5">
	
	
	 <div class="row">
            <div class="col-12">
            <h3>My bank</h3><br/>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-secondary">
                    <tr>
                        <th>Training Code</th>
                        <th>Training Topic</th>
                        <th>Aspirant Name</th>
                        <th>Training Type</th>
                        <th>% of Payment</th>
                        <th>Payment Date</th>
                        <th>Amount</th>
                        <th>Industreall Commision</th>
                        <th>Invoice Number</th>
                        <th>Balance</th>
                       </tr>
                    </thead>
                    <tbody>
                    	<tr>
                       <td></td>
                        <td></td>
                        <td>Adith</td>
                        
                        <td>Corporate</td>
                        <td>20%</td>
                         <td>2020-04-15</td>
                        <td>1505</td>
                        <td></td>
                        <td></td>
                         <td></td>
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
