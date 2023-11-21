@php
if (Request::is('/') && session()->get('sitelang') == 'ar')
{
    $langArr['Contact'] = "اتصال";
    $langArr['About'] = "عن";
    $langArr['Blog'] = "مدونة";
    $langArr['Login'] = "تسجيل الدخول";
    $langArr['Contact us'] = "اتصل بنا";
}
else
{
    $langArr['Contact'] = "Contact";
    $langArr['About'] = "About";
    $langArr['Blog'] = "Blog";
    $langArr['Login'] = "Login";
    $langArr['Contact us'] = "Contact us";
}
@endphp
<style>
.logo img {
    max-width: 220px;
}
/* .arabic_lang_jss {
    display: none;
} */
</style>
<section class="home-sec-1 product-view">
    <header class="header home-pad">
        <div class="container-fluid" style="padding:0 50px">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-8 one third">
                    <div class="header-item-left">
                        <a href="/">
                            <div class="logo">
                                <!-- <img src="{{ asset('talent/assets\img\logo.svg') }}"> -->
                                <!-- <img src="{{ asset('talent/assets\img\logo3.png') }}"> -->
                                <img src="{{ asset('talent/assets\img\logo3.png') }}"
                                    style='width:80%;margin-top:-30px;margin-bottom: -30px;'>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-4 third yellow-pd">
                    <div class="mob-menu">
                        <div class="profile-icon">
                            <a href="{{ route('login') }}"><img src="{{ asset('talent/assets/img/loginicon.png') }}"></a>
                         </div>
                        <button type="button" class="mt-1 dpr-menu btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item bdr-btm-a" href="{{route('contactus')}}"><?=$langArr['Contact'];?></a>
                            <a class="dropdown-item bdr-btm-a" href="{{route('blog')}}"><?=$langArr['Blog'];?></a>
                            <a class="dropdown-item bdr-btm-a" href="{{ url('aboutus') }}"><?=$langArr['About'];?></a>
                            <a class="dropdown-item bdr-btm-a" href="{{ route('login') }}"><?=$langArr['Login'];?></a>

                            {{-- @if (Request::is('/')) --}}
                                @if (session()->get('sitelang') == 'ar')
                                    <a class="dropdown-item arabic_lang_jss" lang_set="en" href="javascript:;">English</a>
                                @else
                                    <a class="dropdown-item arabic_lang_jss" lang_set="ar" href="javascript:;">عربي</a>
                                @endif
                            {{-- @endif --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>
</section>

<script>
$(document).ready(function(){
    $("body").on("click", ".arabic_lang_jss", function(e){
    e.preventDefault();

    jQuery(".loder").show();
    var lang_set = $(this).attr("lang_set");
    $.ajax({
        url: "{{route('changelang')}}",
        type: "POST",
        dataType: "json",
        data: {
            _token: "{{ csrf_token() }}",
            lang_set: lang_set
        },
        success: function(response)
        {
            jQuery(".loder").hide();
            if(response.status)
            {
                <?php 
                if(Request::is('/')) {
                    ?>
                    location.reload();
                    <?php 
                } else {
                ?>
                    location.href = "<?=url('/')?>";
                <?php 
                }
                ?>
            }
        },
        error: function(err)
        {
            err = err.responseJSON ? err.responseJSON : {};
            alert_msg(0, (err.message ? err.message : 'Something went wrong.'));
            jQuery(".loder").hide();
        }
    });
  });
});
</script>