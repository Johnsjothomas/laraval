@include('header')
@include('trainer.navigation')
@include('trainer.submenu')

<div class="container pt-5 pb-5">
    <div class="row">
        <div class="col-md-6 pt-5 pb-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-3">
                    <img src="#"></div>
                    <div class="col-md-9">
                    <h4>{{repalceWithMentor('Trainer')}} Rating</h4>
                    <h6>4/5</h6></div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h2>25</h2>
                <h6>Scheduled Trainings</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h2>25</h2>
                <h6>Total participants</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h2>05</h2>
                <h6>Trainings completed</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h2>23</h2>
                <h6>Deleted/Paused modules</h6>
                </div>
        </div>
        </div>
        <div class="col-md-3 pb-5">
        <div class="card">
                <div class="card-body">
                <h2>75</h2>
                <h6>Certifications</h6>
                </div>
        </div>
        </div>
    </div>
</div>



@include('footer')