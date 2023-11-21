{{-- {{$aspirant_id}}
{{$module_id}}
{{$currency}}
{{$aspirant_mobile}}
{{$aspirant_name}}
{{$aspirant_email}}
{{$paymentid}} --}}

<style>
.loder {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 2147483648;
    text-align: center;
    background-color: rgba(0, 0, 0, 0.7);
}
.loder_main {
    width: 48px;
    height: 48px;
    border: 5px solid #FFF;
    border-bottom-color: transparent;
    border-radius: 50%;
    display: inline-block;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
    position: absolute;
    left: calc(50% - 50px);
    top: calc(50% - 50px);
    transform: translate(-50%, -50%);
}

@keyframes rotation {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
<div id="app">
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3 col-md-offset-6">

                    @if ($message = Session::get('failed'))
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Error!</strong> {{ $message }}
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Success!</strong> {{ $message }}
                        </div>
                    @endif

                    <div class="card card-default">
                        <div class="card-header">
                            Razorpay Payment
                        </div>
                        <!-- <input type="text" value="100" name="amount"/>
                            <span class="btn btn-primary" onclick="pay_nanatr()"> Submit </span> -->

                        <div class="card-body text-center">
                            <form action="{{ route('razorpay.payment.store') }}" method="POST">
                                @csrf
                                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('rzp_test_efOaNgaTPytR1v') }}"
                                    data-amount="1000" data-buttontext="Pay 10 INR" data-name="ItSolutionStuff.com" data-description="Rozerpay"
                                    data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png" data-prefill.name="name"
                                    data-prefill.email="email" data-theme.color="#ff7529"></script>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>
@php
    $amountJs = @$amount ? $amount : 0;
    $currencyJs = @$currency ? strtoupper($currency) : 'USD';
@endphp
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    <?php //$url = url('talent/aspirant/mybank/earned?_token='.csrf_token());
    ?>
    <?php $url = route('saverazorpayid', ['_token' => csrf_token()]); ?>
    //var csrf = "<?php //echo csrf_token();
    ?>";


    $(document).ready(function() {
        // var url = "";
        var options = {
            "key": "rzp_test_efOaNgaTPytR1v", // Enter the Key ID generated from the Dashboard
            "amount": "<?php echo $amountJs * 100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "<?php echo $currencyJs; ?>",
            "name": "The DigitalGate",
            "description": "Test Transaction",
            "image": "{{url('/')}}/talent/assets/img/logoOnly.jpg",
            // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function(response) {
                // alert(response.razorpay_payment_id);
                // alert(response.razorpay_order_id);
                // alert(response.razorpay_signature)
                ajaxonres(response);
                //   console.log(response);
                //   console.log(ajaxonres(response));
            },
            "prefill": {
                "name": "<?php echo $aspirant_name; ?>",
                "email": "<?php echo $aspirant_email; ?>",
                "contact": "<?php echo $aspirant_mobile; ?>"
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#03043c",
                "backdrop_color": "#03043c"
            },
            // "redirect": true,
            // "callback_url": "{{ route('myBankAsp') }}",
            // "callback_url": "{{ route('myBankAsp',['_token'=>$url]) }}",
            //   "callback_url": "https://phplaravel-889000-3082416.cloudwaysapps.com/talent/aspirant/mybank/earned",
            //   "callback_url": "",
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        //   e.preventDefault();
        rzp1.on('payment.failed', function(response) {
            console.log(response);
            ajaxonfailed(response);
            //   alert(response.error.code);
            //   alert(response.error.description);
            //   alert(response.error.source);
            //   alert(response.error.step);
            //   alert(response.error.reason);
            //   alert(response.error.metadata.order_id);
            //   alert(response.error.metadata.payment_id);
        });
        document.getElementById('rzp-button1').onclick = function(e) {


        }
    });

    function ajaxonres(res) {
        $(".loder").show();
        var datares = "";
        $.ajax({
            url: "{{ route('saverazorpayid') }}",
            method: 'POST',
            data: {
                res: res,
                "_token": "{{ csrf_token() }}",
                "module_id": "{{ $module_id }}",
                "paymentid": "{{ $paymentid }}"
            }
        }).done(function(data) {
            datares = data;
            $(".loder").hide();
            window.location.href = "{{ route('myBankAsp') }}";
        });
        return datares;
    }

    function ajaxonfailed(res) {
        $(".loder").show();
        $.ajax({
            url: "{{ route('savefailrazorpayid') }}",
            method: 'POST',
            data: {
                res: res,
                "_token": "{{ csrf_token() }}",
                "module_id": "{{ $module_id }}",
                "paymentid": "{{ $paymentid }}"
            }
        }).done(function(data) {
            datares = data;
            $(".loder").hide();
            window.location.href = "{{ route('myBankAsp') }}";
        });
    }

    // function pay_nanatr() {
    //       alert("hiii");
    //       var options = {
    //         "key": "rzp_test_efOaNgaTPytR1v", // Enter the Key ID generated from the Dashboard
    //         "amount": "100", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    //         "currency": "INR",
    //         "name": "The DigitalGate",
    //         "description": "Test Transaction",
    //         "image": "http://phplaravel-889000-3082416.cloudwaysapps.com/talent/assets/img/logo3.png",
    //         // "order_id": "order_IluGWxBm9U8zJ8", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    //         "handler": function (response){
    //           // alert(response.razorpay_payment_id);
    //           // alert(response.razorpay_order_id);
    //           // alert(response.razorpay_signature)

    //           console.log(response);

    //         },     
    //         "prefill": {
    //             "name": "Hitesh Zhambare",
    //             "email": "hitesh.zhambare@tdtl.world",
    //             "contact": "7389084614"
    //           },
    //           "notes": {
    //               "address": "Razorpay Corporate Office"
    //           },
    //           "theme": {
    //               "color": "#3399cc"
    //           }
    //       };
    //       var rzp1 = new Razorpay(options);
    //       rzp1.open();
    //       e.preventDefault();
    //       rzp1.on('payment.failed', function (response){
    //           alert(response.error.code);
    //           alert(response.error.description);
    //           alert(response.error.source);
    //           alert(response.error.step);
    //           alert(response.error.reason);
    //           alert(response.error.metadata.order_id);
    //           alert(response.error.metadata.payment_id);
    //       });
    //       document.getElementById('rzp-button1').onclick = function(e){


    //       }

    //     }
</script>
<div class="loder" style="display: none;">
    <span class="loder_main"></span>
</div>