<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <title>thedigitalgate.co</title>
    <link rel="stylesheet" id="bs4css_chage" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/talent/assets/css/skin.css">
    <link rel="stylesheet" href="/talent/assets/css/skin_sid.css">
    <link rel="stylesheet" href="/talent/assets/css/newstyles.css">
    <link href="https://www.jqueryscript.net/demo/info-success-error-warning-notification-wnoty/wnoty.css" rel="stylesheet">
    <script src="https://www.jqueryscript.net/demo/info-success-error-warning-notification-wnoty/wnoty.js"></script>
    </head>

    @if(!empty(Session('register_id')))
    <form method="post" action="{{route('logout')}}" id="logout">
                          @csrf
                    </form>
                    @endif
<body>
<style>
.wnoty-notification p {
    margin: 0;
    line-height: 1.3;
    font-size: 14px;
    color: #000;
    font-weight: 400;
}
.loder {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 9999;
    text-align: center;
    background-color: rgba(0, 0, 0, 0.7);
}
.loader_main {
    font-size: 110px;
    color: #F9C900;
    position: absolute;
    left: calc(50% - 50px);
    top: calc(50% - 50px);
    transform: translate(-50%, -50%);
}
</style>
<div class="loder" style="display: none;">
    <div class="loader_main fa fa-spinner fa-spin"></div>
</div>