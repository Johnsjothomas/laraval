@php
if (Request::is('/') && session()->get('sitelang') == 'ar')
{
	$langArr['The Digitalgate employability cloud is a consolidated Applicant Tracker of all the graduates in the GCC for the Nationalisation champions in the HR department. We ensure zero mishire with a 4 step talent acquisition methodology'] = "تُعد سحابة Digitalgate للتوظيف بمثابة أداة موحدة لتتبع المتقدمين لجميع الخريجين في دول مجلس التعاون الخليجي لصالح رواد التوطين في قسم الموارد البشرية. نحن نضمن عدم وجود أي مشكلة من خلال منهجية اكتساب المواهب المكونة من 4 خطوات";
    $langArr['Self Aware'] = "علم النفس";
    $langArr['Contact us'] = "اتصل بنا";
    $langArr['Up Skill'] = "أعلى المهارة";
    $langArr['Immersive Lab'] = "مختبر غامرة";
    $langArr['Test & Appoint'] = "اختبار وتعيين";
    $langArr['all in our Metaverse enabled hyper-real class rooms & testing rooms'] = "كل ذلك في غرف الصف وغرف الاختبار فائقة الواقعية التي تعمل على Metaverse";
    $langArr['Home'] = "بيت";
    $langArr['Privacy Policy'] = "سياسة الخصوصية";
    $langArr['Terms of use'] = "شروط الاستخدام";
    $langArr['© The Digitalgate, 2023.'] = "© البوابة الرقمية، 2023.";
	$langArr['Self'] = "الذات";
	$langArr['Aware'] = "واعي";
	$langArr['Up'] = "أعلى";
	$langArr['Skill'] = "مهارة";
	$langArr['Immersive'] = "غامرة";
	$langArr['Lab'] = "مختبر";
	$langArr['About'] = "عن";
}
else
{
	$langArr['The Digitalgate employability cloud is a consolidated Applicant Tracker of all the graduates in the GCC for the Nationalisation champions in the HR department. We ensure zero mishire with a 4 step talent acquisition methodology'] = "The Digitalgate employability cloud is a consolidated Applicant Tracker of all the graduates in the GCC for the Nationalisation champions in the HR department. We ensure zero mishire with a 4 step talent acquisition methodology";
	$langArr['Self Aware'] = "Self Aware";
	$langArr['Contact us'] = "Contact us";
	$langArr['Up Skill'] = "Up Skill";
	$langArr['Immersive Lab'] = "Immersive Lab";
	$langArr['Test & Appoint'] = "Test & Appoint";
	$langArr['all in our Metaverse enabled hyper-real class rooms & testing rooms'] = "all in our Metaverse enabled hyper-real class rooms & testing rooms";
	$langArr['Home'] = "Home";
	$langArr['About'] = "About";
	$langArr['Privacy Policy'] = "Privacy Policy";
	$langArr['Terms of use'] = "Terms of use";
	$langArr['© The Digitalgate, 2023.'] = "© The Digitalgate, 2023.";
	$langArr['Self'] = "Self";
	$langArr['Aware'] = "Aware";
	$langArr['Up'] = "Up";
	$langArr['Skill'] = "Skill";
	$langArr['Immersive'] = "Immersive";
	$langArr['Lab'] = "Lab";
}
@endphp



<style>
.footer_social_link_section_css li
{
	list-style: none;
    display: inline-block;
    font-size: 21px;
    width: 40px;
}
.footer_social_link_section_css li a
{
	color: #fff !important;
	cursor: pointer;
}
.chart_footer_css {
	width: 100px;
    height: 100px;
    text-align: center;
    word-break: break-word;
    border-radius: 100%;
    line-height: 1;
    padding-top: 30px;
}
.chart1_footer_css {
    border: 4px solid green;
}
.chart2_footer_css {
    border: 4px solid yellow;
}
.chart3_footer_css {
    border: 4px solid purple;
}
.chart4_footer_css {
    border: 4px solid orange;
}
.footer_chart_block_css {
    margin: 20px 0px;
}
.footer_div_block_css {
    display: flex;
    align-items: center;
    justify-content: center;
}
.footer_vertical_line_block_css {
    width: 100px;
}
.footer_vertical_line_block_css1 {
    border-bottom: 4px solid green;
}
.footer_vertical_line_block_css2 {
    border-bottom: 4px solid yellow;
}
.footer_vertical_line_block_css3 {
    border-bottom: 4px solid purple;
}
.cus_copytxt {
	text-align: center;
	padding-top: 30px;
	border-top: 1px solid #999;
}
.flogo {
	max-width:200px;
}
.cus_footer {
	/*background: linear-gradient(280.76deg, #03060D 1.71%, #04043C 59.1%, #04043C 91.08%);*/
	color: #FFFFFF;
	background-color: black;
    background-image: linear-gradient(to right, #15284c , #040913);
	padding: 40px;
}

@media screen and (max-width:767px) {
	.cus_footer {
		padding: 20px;
	}
}
@media screen and (max-width: 640px) {
    .footer_vertical_line_block_css {
        width: 12px;
    }
	.chart_footer_css {
		width: 60px;
		height: 60px;
		line-height: 11px;
		padding-top: 13px;
		font-size: 10px;
	}
	.cus_footer {
		padding: 20px 0;
	}
}

</style>
<div class="cus_footer">
    <div class="container text-center">
		<div class="row">
			<div class="col-12 col-md-12 text-center pb-5">
				<div class="pb-5 text-center" style="font-size: 16px; line-height: 1.6">
					<?=$langArr['The Digitalgate employability cloud is a consolidated Applicant Tracker of all the graduates in the GCC for the Nationalisation champions in the HR department. We ensure zero mishire with a 4 step talent acquisition methodology'];?>
					<div class="footer_chart_block_css">
						<div class="footer_div_block_css">
							<div class="chart1_footer_css chart_footer_css"><?=$langArr['Self'];?> <br/> <?=$langArr['Aware'];?></div>
							<div class="footer_vertical_line_block_css footer_vertical_line_block_css1"></div>

							<div class="chart2_footer_css chart_footer_css"><?=$langArr['Up'];?> <br/> <?=$langArr['Skill'];?></div>
							<div class="footer_vertical_line_block_css footer_vertical_line_block_css2"></div>

							<div class="chart3_footer_css chart_footer_css"><?=$langArr['Immersive'];?> <br/> <?=$langArr['Lab'];?></div>
							<div class="footer_vertical_line_block_css footer_vertical_line_block_css3"></div>

							<div class="chart4_footer_css chart_footer_css"><?=$langArr['Test & Appoint'];?></div>
						</div>
					</div>
					<?=$langArr['all in our Metaverse enabled hyper-real class rooms & testing rooms'];?>
				</div>
			</div>
		</div>
		<div class="row footer_social_link_section_css">
			<div class="col-12 col-md-12">
				<ul>
					<li><a href="{{url('https://www.linkedin.com/company/the-digitalgate/')}}"><span class="fa fa-linkedin"></span></a></li> 
					<li><a href="{{url('https://www.facebook.com/profile.php?id=100090651455482&mibextid=LQQJ4d
')}}"><span class="fa fa-facebook"></span></a></li> 
					<li><a href="{{url('https://instagram.com/thedigitalgate?igshid=OGQ5ZDc2ODk2ZA%3D%3D&utm_source=qr')}}"><span class="fa fa-instagram"></span></a></li> 
					<li><a href="{{url('https://www.youtube.com/@thedigitalgatecloud')}}"><span class="fa fa-youtube"></span></a></li> 
					<li><a href="{{url('https://x.com/industreall/status/1716204353768366547?s=46&t=PXJoWV5RChmsRSv4qegH3w')}}"><span class="fa fa-twitter"></span></a></li> 
					<li><a href="{{url('https://chat.whatsapp.com/ECsN6hLYMnb32YRZpI7plV')}}"><span class="fa fa-whatsapp"></span></a></li> 
				</ul>
				
			</div>
		</div>
		<div class="row footer">
			<div class="col-12 col-md-4">
				<a href="{{url('/')}}"><?=$langArr['Home'];?></a><br><br>
				<a href="{{route('aboutus')}}"><?=$langArr['About'];?></a><br><br>
				<a href="{{route('contactus')}}"><?=$langArr['Contact us'];?></a>
			</div>
			<div class="col-12 col-md-4">
				<a href="{{url('/')}}"><img class="flogo" src="{{ asset('talent/assets\img\logo3.png') }}" ></a>
			</div>
			<div class="col-12 col-md-4">
				<br><a href="{{route('privacy_policy')}}"><?=$langArr['Privacy Policy'];?></a><br><br>
				<a href="{{route('termsofuse')}}"><?=$langArr['Terms of use'];?></a>
			</div>
		</div>
    </div>
	<div class="container mt-5">
		<div class="cus_copytxt"><?=$langArr['© The Digitalgate, 2023.'];?> </div>
	</div>
</div>

<script>
function alert_msg(status, msg, timeout=5000)
{
	if(status)
	{
		/*swal(msg, {
			icon: "success",
			timer: timeout
		});*/
		$.wnoty({
			type: 'success',
			message: msg,
			autohideDelay: timeout
		});
		/*$('.alert_msg_s strong').html(msg);
		$('.alert_msg_s').show();*/
	}
	else
	{
		/*swal(msg, {
			icon: "error",
			timer: timeout
		});*/
		$.wnoty({
			type: 'error',
			message: msg,
			autohideDelay: timeout
		});
		/*$('.alert_msg_f strong').html(msg);
		$('.alert_msg_f').show();*/
	}
	//setTimeout(function(){ $('.alert_msg').hide(); }, timeout);
}
</script>
