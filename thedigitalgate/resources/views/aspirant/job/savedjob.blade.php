@include('header') @include('aspirant.navigation') @include('aspirant.submenu')
<style>
.ajobs {
  padding-bottom: 50px;
}

.ajobs .fa-briefcase {
  margin-right: 10px;
}

.ajobs .rightlocation {
  margin-left: 20px;
  display: inline-block;
}

.ajobs .whitebackground {
  border-radius: 10px;
  overflow: hidden;
  position: relative;
}



.jobcontainer {
  padding-left: 20px;
}
</style>
<div class="backgray">
  <div class="container ajobs">
    <div class="pt-5 pb-5">
      <div class="row">
        <div class="mediumfont col-12">
          Manage Jobs<br> <br>
        </div>
      </div>
      <form style=" border-radius: 10%;" _lpchecked="1">
        <div class="row" style="padding:0px 0px 0px 15px">
          <div class="col-sm-8 pr-0 icon-input">
            <i class="fa fa-search" aria-hidden="true"></i> <input class="form-control" placeholder="Search for Job" autocomplete="off">
          </div>
          <div class="col-sm-2 pr-0 pl-0">
            <select class="form-control" placeholder="Location">
              <option>Job type</option>
              <option>Training</option>
            </select>
          </div>
          <div class="col-sm-2 pl-0">
            <select class="form-control" placeholder="Job type">
              <option>Job type</option>
              <option>Training</option>
            </select>
          </div>
        </div>
      </form>
    </div>
    <div class="row">
        <div class="mediumfont col-12">
          Recommended for you<br> <br>
        </div>
      </div>
    <div class="row">


      @forelse($jobs as $key=>$val)
      <!--  -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pointer ptd15">
        <div class="whitebackground p3">
          <!-- <div class="ribbon ribbon-top-left">
            <span class="orange">Pending</span>
          </div> -->
          <i class="fa fa-bookmark right" aria-hidden="true"></i>
          <div class="jobcontainer">
            <div class="row">
              <div style="height: 40px; width: 40px; background: pink"></div>
              <a target="_blank" href="{{route('aspirant_jobdetails',[$val->id,$val->fields->Job_ID])}}"><div style="padding-left: 15px" class="normalfont1 bold">
                {{$val->fields->Posted_by_Company->fields->Company_Name}}<br> <span class="normalfont4">{{$val->fields->Job_Title}}</span>
              </div>
            </a>
            </div>
            <div class="row normalfont3">
              <div class="col-12">
                <br> {{$val->fields->Job_Description}}
              </div>
            </div>
            <hr>
            <div class="row normalfont3">
              <div class="col-12">
                <i class="fa fa-briefcase" aria-hidden="true"></i>{{$val->fields->Employment_Type}}
                <div class="rightlocation"> Hyderabad,India</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      @empty
      @endforelse
      
    </div>
  </div>
</div>
@include('footer')
