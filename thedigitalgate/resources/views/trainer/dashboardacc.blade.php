@include('header')
@include('trainer.navigation')
@include('trainer.submenu')

<style>
    .blueText {
        color: #007bff;
    }

    .hoverCards {
		border-radius: 20px;
		cursor: pointer;
	}

	.hoverCards:hover {
		/* border: 1px solid antiquewhite; */
		/* box-shadow: 10px 10px 5px #e6ecee; */
		box-shadow: 0 0 80px -10px grey;
		left: -5px;
		top: -5px;
	}
</style>
<div class="container pt-5 pb-5">
    <div class="mb_15 trainingTypeDiv">
        <a href="javascript:;" class="card-link heading1" id="individualBtn">Individual</a>
        <a href="javascript:;" class="card-link heading1" id="corporateBtn">Corporate</a>
    </div>
    <div class="row" style="display:none;">
        <div class="col-md-6 pb-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ asset('talent/assets\img\corporateTraining.jfif') }}">
                        </div>
                        <div class="col-md-9">
                            <h4>{{repalceWithMentor('Trainer')}} Rating</h4>
                            <h6>4/5</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="mb_15">
        <a href="javascript:;" class="card-link">Open for all</a>
        <a href="javascript:;" class="card-link bold">Corporate</a>
    </div> --}}

    <div class="row" id="individualDash">
        <div class="col-md-3 pb-5">
            <div class="card hoverCards">
                <div class="card-body">
                    <h2>{{$ActiveModuleCounts}}</h2><small>Real Time</small>
                    <h6>Scheduled Trainings</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-5">
            <div class="card hoverCards">
                <div class="card-body">
                    <h2>{{$participantsCount}}</h2><small>Real Time</small>
                    <h6>Total participants</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-5">
            <div class="card hoverCards">
                <div class="card-body">
                    <h2>{{$pastModuleCounts}}</h2><small>Real Time</small>
                    <h6>Trainings completed</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-5">
            <div class="card hoverCards">
                <div class="card-body">
                    <h2>{{$deletedModuleCounts}}</h2><small>Real Time</small>
                    <h6>Deleted/Paused modules</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-5">
            <div class="card hoverCards">
                <div class="card-body">
                    <h2>{{$issueCertificateIndividualCounts}}</h2><small>Real Time</small>
                    <h6>Certifications</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="corporateDash">  
        <div class="col-md-3 pb-5">
            <div class="card hoverCards">
                <div class="card-body">
                    <h2>{{$ActiveCorporateModuleCounts}}</h2><small>Real Time</small>
                    <h6>Scheduled Trainings</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-5">
            <div class="card hoverCards">
                <div class="card-body">
                    <h2>{{$participantsCorporateCount}}</h2><small>Real Time</small>
                    <h6>Total participants</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-5">
            <div class="card hoverCards">
                <div class="card-body">
                    <h2>{{$pastCorporateModuleCounts}}</h2><small>Real Time</small>
                    <h6>Trainings completed</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-5">
            <div class="card hoverCards">
                <div class="card-body">
                    <h2>{{$deletedCorporateModuleCounts}}</h2><small>Real Time</small>
                    <h6>Deleted/Paused modules</h6>
                </div>
            </div>
        </div>
        <div class="col-md-3 pb-5">
            <div class="card hoverCards">
                <div class="card-body">
                    <h2>{{$issueCertificateCorporateCounts}}</h2><small>>Real Time</small>
                    <h6>Certifications</h6>
                </div>
            </div>
        </div>
    </div>

</div>



@include('footer')



<script>
    $(document).ready(function() {
        $('#individualDash').slideDown();
        $('#corporateDash').hide();
        $('#individualBtn').addClass("blueText");

        $('#individualBtn').click(function(){
            $('#individualDash').slideDown();
            $('#corporateDash').hide();
        });
        
        $('#corporateBtn').click(function(){
            $('#individualDash').hide();
            $('#corporateDash').slideDown();
        });

        $(".trainingTypeDiv a").on("click", function() {
            $(".trainingTypeDiv a").removeClass("blueText");
            $(this).addClass("blueText");
        });
    });
</script>