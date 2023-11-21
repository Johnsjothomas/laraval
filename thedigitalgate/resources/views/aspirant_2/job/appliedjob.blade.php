@include('../talent.header')
@include('talent.navigation')
@include('talent.submenu')

    <div class="row backgray">
      <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 pt-5 pb-5">
          <div class="mediumfont">Applied Jobs</div><br><br>
            <form class="row" style="    background: white;border-radius: 10%;" _lpchecked="1">
                    <input class="form-control col-sm-8" placeholder="Search for Job" autocomplete="off">
                    <input class="form-control col-sm-2" placeholder="Location">
                    <select class="form-control col-sm-2" placeholder="Job type">
                        <option>Job type</option>
                        <option>Training</option>
                    </select>

                </form>    <br>
          <br><br>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pointer ptd15"  onclick="window.location='/talent/job/jobdetails'" >
              <div class="whitebackground p3" style="height:300px">
              <div class="ribbon ribbon-top-left"><span class="orange">Pending</span></div>
                  <i class="fa fa-bookmark right" aria-hidden="true"></i>
                  <br>
                 <div class="row" style="display:inline-flex;">
                 <div style="height:40px; width:40px;background: pink"></div>
                 <div style="padding-left: 15px" class="normalfont1 bold">Foxpin<br><span class="normalfont4">Graphic Design intern</span></div>
                  </div>
                  <div class="row normalfont3"><br>
                    Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem
                    Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem
                  </div>
                 <hr>
                 <div class="row normalfont3">
                  <i class="fa fa-briefcase" aria-hidden="true"></i>Full Time
                  <div class="right">Hyderabad,India</div>
                 </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pointer ptd15"  onclick="window.location='/talent/job/jobdetails'" >
              <div class="whitebackground p3" style="height:300px">
              <div class="ribbon ribbon-top-left"><span class="red"> Rejected</span></div>
                  <i class="fa fa-bookmark right" aria-hidden="true"></i>
                  <br>
                 <div class="row" style="display:inline-flex;">
                 <div style="height:40px; width:40px;background: pink"></div>
                 <div style="padding-left: 15px" class="normalfont1 bold">Foxpin<br><span class="normalfont4">Graphic Design intern</span></div>
                  </div>
                  <div class="row normalfont3"><br>
                    Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem
                    Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem
                  </div>
                 <hr>
                 <div class="row normalfont3">
                  <i class="fa fa-briefcase" aria-hidden="true"></i>Full Time
                  <div class="right">Hyderabad,India</div>
                 </div>
              </div>
            </div>
          </div>
        </div>
              <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

    </div>
</div>
@include('talent.footer')