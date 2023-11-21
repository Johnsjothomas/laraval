@include('header')
@include('aspirant.navigation')
@include('aspirant.submenu')


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
        <div class="row  pb-5">
                <!-- <div class="col-md-2 pb-5">
                        <div class="whitebtn" style="background: #EDEDED">Jobs</div>
                </div> -->
                <div class="col-md-2">
                        <div class=" bluebtn">Training</div>
                </div>
        </div>
        <div class="row">
                <div class="col-md-3 pb-5">
                        <div class="card hoverCards">
                                <div class="card-body">
                                        <h2>{{$ReccomenModules}}</h2><small>Real Time</small>
                                        <h6>Recommended Modules</h6>
                                </div>
                        </div>
                </div>
                <div class="col-md-3 pb-5">
                        <div class="card hoverCards">
                                <div class="card-body">
                                        <h2>{{$savedModules}}</h2><small>Real Time</small>
                                        <h6>Saved Modules</h6>
                                </div>
                        </div>
                </div>
                <div class="col-md-3 pb-5">
                        <div class="card hoverCards">
                                <div class="card-body">
                                        <h2>{{$appliedModules}}</h2><small>Real Time</small>
                                        <h6>Applied Modules</h6>
                                </div>
                        </div>
                </div>
                <div class="col-md-3 pb-5">
                        <div class="card hoverCards">
                                <div class="card-body">
                                        <h2>{{$completedModules}}</h2><small>Real Time</small>
                                        <h6>Modules Completed</h6>
                                </div>
                        </div>
                </div>
                <div class="col-md-3 pb-5">
                        <div class="card hoverCards">
                                <div class="card-body">
                                        <h2>{{$total_download_certificate}}/{{$total_issue_certificate}}</h2><small>Real Time(Download / Issue )</small>
                                        <h6>Certifications</h6>
                                </div>
                        </div>
                </div>
        </div>
</div>

<script>
        $(document).ready(function() {
                $('#individualDash').slideDown();
                $('#corporateDash').hide();
                $('#individualBtn').addClass("blueText");

                $('#individualBtn').click(function() {
                        $('#individualDash').slideDown();
                        $('#corporateDash').hide();
                });

                $('#corporateBtn').click(function() {
                        $('#individualDash').hide();
                        $('#corporateDash').slideDown();
                });

                $(".trainingTypeDiv a").on("click", function() {
                        $(".trainingTypeDiv a").removeClass("blueText");
                        $(this).addClass("blueText");
                });
        });
</script>


@include('footer')