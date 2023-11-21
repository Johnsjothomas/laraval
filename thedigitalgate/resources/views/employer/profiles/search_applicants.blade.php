@include('header')
@include('employer.navigation')
@include('employer.submenu')
@include('filter')
<div class="container justify-content-center align-center pt-5 pb-5">
    <div class="row">
        <div class="col">
        <img class="img-fluid " style="width:100%" src="/talent/assets/img/myprofile.png"></div>
    </div>
      @include('profile_head')
        @include('employer.profiles.profile_navigation')

    <div class="pt-4">
   <!--  <input type="text" class="form-control col-3" onchange="search(this.value)" placeholder="Enter Keyword/Skill"> -->
        <div class="mt-4">
            <div class="card-body">

<!-- CREATE MODULE -->
<div class="row">

      @forelse($data as $key=>$val)
        		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ptd15 pointer" >
        			<div class="whitebackground p10" style="height:300px">
                                <div class="dropdown right">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"> Shortlist Profile </a>
                        <a class="dropdown-item" href="#">Schedule Interview</a>
                        <a class="dropdown-item" href="#">Reject Profile</a>
                        <a class="dropdown-item" href="#">Send Offer</a>
                        

                    </div>
                    </div>
                  <br>
                 <div class="" style="display:inline-flex;">
                 <div style="height:40px; width:40px;background: pink"></div>
                 <div style="padding-left: 15px" class="normalfont1 bold">{{$val->fields->First_Name}}<br><span class="normalfont4">Graphic Design intern</span></div>
                  </div>
                  <div class=" normalfont3"><br>
                    Rapido design team is completely focused on taking the right design decision so as a designer you will be expected to take the right steps to solve a problem
                  </div>
                 <hr>
                 <div class="row">
                    <div class="col-sm-6">
                    <!-- <a href="{{asset('uploads/resume/')}}" download><button class="btn bluebtn">Download Resume</button></a> -->
                    </div>
                   <!--  <div class="col-sm-6">
                    <button class="btn bluebtn">Select Job Code</button>
                    </div> -->
                 </div>
              </div>
        		</div>
            @empty
            @endforelse
        	  

            </div>
            </div>
    </div>
</div>
</div>

</div>

<script>
  function search(val){
    var route = ("{{route('search_applicants',[":val"])}}")
    route = route.replace(':val', val);
    location.replace(route);
  }
</script>



<style>
  button{
    padding: 5px !important;
  }
  body{
    background: #f5f5f5;
  }
  </style>
    @include('footer')