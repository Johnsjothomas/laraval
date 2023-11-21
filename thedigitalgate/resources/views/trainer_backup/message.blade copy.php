@include('header')
@include('trainer.navigation')
@include('trainer.submenu')

<div class="container pt-5 pb-5">
    <h2>Messages</h2>
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <input type="text" class="form-control" id="message-search" placeholder="Search for a message...">
            <div class="pt-4">
            <div class="row pt-4">
                <div class="col-md-3">
                    <img src="" style="width: 100%;">
                </div>
                <div class="col-md-9">
                    <h5>Khaleel mohammed</h5>
                    <label>Last seen  Today 10:00PM</label>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
        <div class="container">
        <div class="row">
                <div class="col-md-3">
                    <img src="" style="width: 100%;">
                </div>
                <div class="col-md-9">
                    <h5>Khaleel mohammed</h5>
                    <label>Online</label>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

@include('footer')