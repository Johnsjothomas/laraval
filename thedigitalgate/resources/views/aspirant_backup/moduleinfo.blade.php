@include('header')
@include('aspirant.navigation')
@include('aspirant.submenu')

<div class="container justify-content-center align-center pt-5 pb-5">
    <img class="img-fluid " style="width:100%" src = "{{ asset('talent/assets/img/myprofile.png') }}" />
    <h2 class="pt-3 pb-2">About the Modules</h2>
    <div class="bluebtn right">Apply</div>
    <h5 class="pt-3 pb-2">Module Title</h5>
    <h5 class="pt-3 pb-2">Total number of Days<label>2 Days</label></h5>
    <div class="pb-2">
                <table class="table table-bordered">
            <thead class="table-secondary">
            <tr>
                <th>Day</th>
                <th>Topic</th>
                <th>Time(mins)</th>
                <th>Description</th>
                <th>Objective</th>
            </tr>
            <tr>

            </tr>
            </thead>
                <tbody>
                    <tr>
                        <td  rowspan="2">1</td>
                        <td>Introduction</td>
                        <td>60</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet massa elit tristi</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet massa elit tristique</td>
                    </tr>
                    <tr>
                        <td>Introduction to communication
and assessment tool</td>
                        <td>90</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Introduction</td>
                        <td>60</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet massa elit tristique est ultrices tortor, neque, volutpat. Bibendum vitae, egestas ornare accumsan iaculis </td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet massa elit tristique est ultrices tortor, neque, volutpat. Bibendum vitae, egestas ornare accumsan iaculis </td>
                    </tr>
                    </tbody>
            </table>
    </div>

    <h5 class="pt-3 pb-2">Session Type<label>Classroom</label></h5>
    <h5 class="pt-3 pb-2">Preferred Languages<label>English</label></h5>
    <h5 class="pt-3 pb-2">Duration of the module<label class="pr-5">06/02/22</label><label>08/02/22</label></h5>
    <h5 class="pt-3 pb-2">Maximum Participants quorum<label>100 </label></h5>
    <h5 class="pt-3 pb-2">Lesson Requirments from the participants<label>Nothing</label></h5>
    <h5 class="pt-3 pb-2">Trainer Handout<label>Nothing</label></h5>
    <h5 class="pt-3 pb-2">Benchmark Check after X days<label>Nothing</label></h5>

    <h5 class="pt-3 pb-2">About the {{repalceWithMentor('Trainer')}}</h5>
    <div class="row">
        <div class="col-sm-2">
    <img src="{{ asset('talent/assets/img/slider-img-1.jpg ') }}" width="100%"></div>
    <div class="col-sm-10">
    <h5 class="pt-3 pb-2">Khaleel</h5>
    <label class="p-0">UI UX Designer</label>
    <div>4.3</div></div>
    </div>
    <p class="col-sm-6 pt-3">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem nullam adipiscing mattis nunc, praesent at odio hac faucibus. Cursus et ornare aliquam ullamcorper. Ac risus, in vitae quis ut. Amet et diam etiam duis cursus adipiscing. Vitae, gravida mi a vitae viverra tincidunt lectus ligula. Et sed id praesent mattis senectus suspendisse sagittis. Bibendum in orci, sagittis sit praesent. Odio vitae scelerisque ac nibh consectetur tellus viverra. Venenatis nunc eleifend fringilla mattis volutpat nulla massa tellus in. 
    </p>
    </h5>



<!-- SUCCESS -->
<div>
<img src="{{ asset('talent/assets/img/tech_life_communication.png ') }}">
    <h2>Your Application has been submited.
we will get back to you soon </h2>
</div>

</div>




@include('footer')