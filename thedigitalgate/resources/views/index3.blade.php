@include('header')
@include('navigationindex')

@php
  // session()->put('sitelang', "ar");
  $sitelang = session()->get('sitelang') ? session()->get('sitelang') : 'en';
  $langArr = array();

  if($sitelang == 'ar')
  {
    $langArr['I am a Mentor'] = 'أنا مرشد';
    $langArr['I want to Train'] = 'أريد التدريب والاختبار';
    $langArr['Click to curate a training module to upskill and test our students.'] = 'انقر لتنظيم وحدة تدريبية لتحسين مهارات طلابنا واختبارهم.';
    $langArr['Explore'] = 'يستكشف';
    $langArr['Popular Locations'] = 'المواقع الشعبية';
    $langArr['Popular Training Categories'] = 'فئات التدريب الشعبية';
    $langArr['I am a Student'] = 'أنا طالب';
    $langArr['I want a Job'] = 'اريد عمل';
    $langArr['Click to compete for an Internship by your dream company.'] = 'انقر للتنافس للحصول على تدريب من قبل شركة أحلامك.';
    $langArr['Popular Internship Categories'] = 'فئات التدريب الشعبية';
    $langArr['Curate Training'] = 'الاختبارات والتدريب';
    $langArr['Calling'] = 'الاتصال';
    $langArr['Mentor'] = 'مُرشِد';
    $langArr['Step'] = 'خطوة';
    $langArr['Sign up'] = 'اشتراك';
    $langArr['Create Module'] = 'إنشاء وحدة';
    $langArr['Train Aspirant'] = 'تدريب الطامح';
    $langArr['Test & Publish'] = 'اختبار ونشر';
    $langArr['Healthcare'] = 'الرعاىة الصحية';
    $langArr['View'] = 'منظر';
    $langArr['Finance'] = 'تمويل';
    $langArr['Cybersecurity'] = 'الأمن الإلكتروني';
    $langArr['AI/ML/Web3'] = 'الذكاء الاصطناعي/مل/ويب3';
    $langArr['Industrial'] = 'صناعي';
    $langArr['Softskills'] = 'المهارات الشخصية';
    $langArr["Curate the best industry immersive training with DG's AI module builder and get paid to mentor students"] = "قم بتنظيم أفضل تدريب شامل في الصناعة باستخدام منشئ وحدات الذكاء الاصطناعي التابع لـ DG واحصل على أموال مقابل توجيه الطلاب";

    $langArr['Reem Al Hassan'] = 'ريم الحسن';
    $langArr['Graphic Design Intern'] = 'متدرب التصميم الجرافيكي';

    $langArr['Full time Dubai, United Arab Emirates'] = 'دوام كامل دبي، الإمارات العربية المتحدة';
    $langArr['HCT'] = 'كليات التقنية العليا';
    $langArr['Eng. Danish Al Lawati'] = 'م. دانش اللواتي';
    $langArr['SOC cyber security'] = 'SOC للأمن السيبراني';
    $langArr['Internship  Muscat, Oman'] = 'التدريب مسقط، عمان';
    $langArr['SQU'] = 'جامعة السلطان قابوس';
    $langArr['Qualify for Internship'] = 'التأهل للتدريب';
    $langArr['Aspirant'] = 'الطامح';
    $langArr['Select Module'] = 'حدد الوحدة النمطية';
    $langArr['Pay Checkout'] = 'دفع الخروج';
    $langArr['Complete Assessment'] = 'التقييم الكامل';
    $langArr["Compete for your company's hackathon posted by our mentor with passion and land your first job"] = "تنافس على هاكاثون شركتك الذي نشره مرشدنا بشغف واحصل على وظيفتك الأولى";
    $langArr['Coming soon'] = 'قريباً';


    $langArr['About Us'] = 'معلومات عنا';
    $langArr['Our Vision'] = 'رؤيتنا';
    $langArr['Our Mission'] = 'مهمتنا';
    $langArr['our vision text'] = "تتمثل رؤيتنا في خلق عالم يتوافق فيه شغفك وذوقك بشكل مثالي مع المهارات الوظيفية التي يبحث عنها صاحب العمل. إن إرشادنا المتقدم الممكّن بالذكاء الاصطناعي يُحدث ثورة في الطريقة التي يتم بها تسخير تقارب الطالب الجديد والتحقق منه، مما يجعل قابلية التوظيف ممتعة ومسيرته المهنية مدى الحياة مجزية حقًا.";
    $langArr['our mission text'] = "مهمتنا هي إنشاء أبسط وأفضل سوق ثلاثي لأصحاب المصلحة الثلاثة لدينا:</br>
    1. الطامحين والطلاب</br>
    2. المدربين والموجهين</br>
    3. أصحاب العمل ورجال الأعمال </br>
    بهدف تسهيل الاتصالات وضمان عدم سوء التوظيف أثناء اختيار طالب جديد للتدريب.";
    $langArr['Philosophy'] = "فلسفتنا";

    $langArr['Philosophy text'] = 'فلسفتنا متجذرة في مفهوم أهداف التنمية المستدامة للأمم المتحدة (UNSDGs) فيما يتعلق بـ "مستقبل العمل". نحن نؤمن بأن قابلية التوظيف تبدأ بالتقييم الذاتي، والذي بدوره يؤدي إلى الإلهام الذاتي. يرشد هذا الإلهام الذاتي الفرد في اكتشاف عواطف جديدة، مما يمكّنه من إتقان مهارات قيمة. إن التطبيق العملي لهذه المهارات المكتسبة حديثًا يؤهل الفرد لرحلة تعلم مدى الحياة وتطبيق هذه المعرفة في مكان عمله.';
    $langArr['Our commitment towards employability for all'] = "التزامنا تجاه التوظيف للجميع";
    $langArr['Be updated with the latest skills for "Career 3.0" and future of Employability'] = 'كن على اطلاع بأحدث المهارات الخاصة بـ "Career 3.0" ومستقبل التوظيف';

    $langArr['Get started'] = "البدء";
    $langArr['Email'] = "بريد إلكتروني";
    $langArr['WFH'] = "WFH";
    $langArr['Dehli'] = "دلهي";
    $langArr['Banglore'] = "بنغالور";
    $langArr['Mumbai'] = "مومباي";
    $langArr['Goa'] = "جوا";
    $langArr['Hyderabad'] = "حيدر أباد";
    $langArr['New Delhi'] = "نيو دلهي";
    $langArr['Doha'] = "الدوحة";
    $langArr['Abu Dhabi'] = "أبو ظبي";
    $langArr['Muscat'] = "مسقط";
    $langArr['Sharjah'] = "الشارقة";
    $langArr['Dubai'] = "دبي";
    $langArr['Shopfloor'] = "أرضية المتجر";
    $langArr['Construction'] = "بناء";
    $langArr['Digital'] = "رقمي";
    $langArr['SoftSkills'] = "المهارات الناعمة";
    $langArr['Supply Chain'] = "الموردين";
    $langArr['Industrial Design'] = "التصميم الصناعي";

    $langArr["IT Cybersecurity final Year"] = "تكنولوجيا المعلومات الأمن السيبراني السنة النهائية";
    $langArr["( UTAS - University of Technology and Applied Sciences- Sohar)"] = "( UTAS - الجامعة التقنية والعلوم التطبيقية - صحار)";
    $langArr["Ghayda Al Mamari"] = "غيداء المعمري";
    $langArr["Digitalgate aspirant cloud has truly been a game-changer for me, I saw the opportunity for an internship with a prestigious cybersecurity company specifically for Omani Graduates, on Linkedin. Thanks to the seamless enrollment process and the innovative avatar-based testing. I was able to secure this OJT opportunity (On the Job training & Internship) in record time with absolutely clarity and transparency."] = "لقد غيرت سحابة Digitalgate الطموحة قواعد اللعبة حقًا بالنسبة لي، فقد رأيت فرصة للحصول على تدريب داخلي مع شركة مرموقة في مجال الأمن السيبراني خصيصًا للخريجين العمانيين، على LinkedIn. بفضل عملية التسجيل السلسة والاختبار المبتكر القائم على الصورة الرمزية. لقد تمكنت من تأمين فرصة OJT (التدريب أثناء العمل والتدريب الداخلي) في وقت قياسي بكل وضوح وشفافية.";

    $langArr["Jr. Cloud Engineer Azure"] = "جونيور كلاود إنجينير أزور";
    $langArr["(Zayed University, Abudhabi)"] = "(جامعة زايد، أبوظبي)";
    $langArr["Haitham Al Mazrouei"] = "هيثم المزروعي";
    $langArr["The Digitalgate employability program has equipped me with valuable skills and confidence to navigate the academia to industry induction. The comprehensive testing, verification and placement via the cloud connecting an Emirati student directly to the private sector’s HR is amazing. If you're in the GCC and looking to land your first Job/Internship, Digitalgate aspirant cloud is your only choice."] = "لقد زودني برنامج Digitalgate للتوظيف بمهارات قيّمة وثقة تمكنني من التنقل في الأوساط الأكاديمية إلى التعريف بالصناعة. إن الاختبار الشامل والتحقق والتنسيب عبر السحابة الذي يربط الطالب الإماراتي مباشرة بالموارد البشرية في القطاع الخاص أمر مذهل. إذا كنت في دول مجلس التعاون الخليجي وتتطلع إلى الحصول على أول وظيفة/تدريب داخلي لك، فإن سحابة Digitalgate الطموحة هي خيارك الوحيد.";

    $langArr["New Business Director"] = "مدير الأعمال الجديد";
    $langArr["( Securado Cybersecurity LLC)"] = "(سيكيورادو للأمن السيبراني ذ.م.م)";
    $langArr["Omar Aljarwani"] = "عمر الجرواني";
    $langArr["Digitalgate Mentor Cloud has completely transformed our recruitment process. As a company, we were looking for an efficient way to assess employability, verify skills, and evaluate English proficiency among Omani students and aspirants fresh out of university. Thank you Digitalgate for the comprehensive question bank prepared by industry practitioners, I chose the perfect candidates at the right price. This platform has a large omani talent pool and best suited for large batch intern roles.!"] = "لقد غيرت Digitalgate Mentor Cloud عملية التوظيف لدينا بالكامل. كشركة، كنا نبحث عن طريقة فعالة لتقييم قابلية التوظيف، والتحقق من المهارات، وتقييم إتقان اللغة الإنجليزية بين الطلاب العمانيين والطامحين الجدد خارج الجامعة. شكرًا لك Digitalgate على بنك الأسئلة الشامل الذي أعده الممارسون في هذا المجال، لقد اخترت المرشحين المثاليين بالسعر المناسب. تحتوي هذه المنصة على مجموعة كبيرة من المواهب العمانية وهي الأنسب لأدوار المتدربين الكبيرة.!";

    $langArr["SCM and Warehousing CEO"] = "الرئيس التنفيذي لشركة SCM والمستودعات";
    $langArr["(World link Shipping LLC)"] = "(وورلد لينك للشحن ذ.م.م)";
    $langArr["Ajith"] = "أجيث";
    $langArr["I was contacted by The DigitalGate Mentor Cloud to create multiple-choice quizzes and metaverse-based gamified skill assessments to unearth the skill of emirati SCM graduates. I created the test heading in xcel and word and uploaded it to DG’s AI proctoring/authoring engine and got a 3D and 2D module in chronological order witching minutes, and I got paid also by the employer via Digitalgate."] = "لقد اتصلت بي شركة DigitalGate Mentor Cloud لإنشاء اختبارات متعددة الاختيارات وتقييمات مهارات تعتمد على الألعاب لاكتشاف مهارات خريجي SCM الإماراتيين. لقد قمت بإنشاء عنوان الاختبار في xcel وword وقمت بتحميله على محرك المراقبة/التأليف الخاص بالذكاء الاصطناعي الخاص بـ DG وحصلت على وحدة ثلاثية الأبعاد وثنائية الأبعاد في دقائق ساحرة بترتيب زمني، وحصلت أيضًا على أجر من صاحب العمل عبر Digitalgate.";

  }
  else
  {
    $langArr['I am a Mentor'] = 'I am a Mentor';
    $langArr['I want to Train'] = 'I want to Train and Test';
    $langArr['Click to curate a training module to upskill and test our students.'] = 'Click to curate a training module to upskill and test our students.';
    $langArr['Explore'] = 'Explore';
    $langArr['Popular Locations'] = 'Popular Locations';
    $langArr['Popular Training Categories'] = 'Popular Training Categories';
    $langArr['I am a Student'] = 'I am a Student';
    $langArr['I want a Job'] = 'I want a Job';
    $langArr['Click to compete for an Internship by your dream company.'] = 'Click to compete for an Internship by your dream company.';
    $langArr['Popular Internship Categories'] = 'Popular Internship Categories';
    $langArr['Curate Training'] = 'Curate Tests and Training';
    $langArr['Calling'] = 'Calling';
    $langArr['Mentor'] = 'Mentor';
    $langArr['Step'] = 'Step';
    $langArr['Sign up'] = 'Sign up';
    $langArr['Create Module'] = 'Create Module';
    $langArr['Train Aspirant'] = 'Train Aspirant';
    $langArr['Test & Publish'] = 'Test & Publish';
    $langArr['Healthcare'] = 'Healthcare';
    $langArr['View'] = 'View';
    $langArr['Finance'] = 'Finance';
    $langArr['Cybersecurity'] = 'Cybersecurity';
    $langArr['AI/ML/Web3'] = 'AI/ML/Web3';
    $langArr['Industrial'] = 'Industrial';
    $langArr['Softskills'] = 'Softskills';
    $langArr["Curate the best industry immersive training with DG's AI module builder and get paid to mentor students"] = "Curate the best industry immersive training with DG's AI module builder and get paid to mentor students";

    $langArr['Reem Al Hassan'] = 'Reem Al Hassan';
    $langArr['Graphic Design Intern'] = 'Graphic Design Intern';

    $langArr['Full time Dubai, United Arab Emirates'] = 'Full time Dubai, United Arab Emirates';
    $langArr['HCT'] = 'HCT';
    $langArr['Eng. Danish Al Lawati'] = 'Eng. Danish Al Lawati';
    $langArr['SOC cyber security'] = 'SOC cyber security';
    $langArr['Internship  Muscat, Oman'] = 'Internship  Muscat, Oman';
    $langArr['SQU'] = 'SQU';
    $langArr['Qualify for Internship'] = 'Qualify for Internship';
    $langArr['Aspirant'] = 'Aspirant';
    $langArr['Select Module'] = 'Select Module';
    $langArr['Pay Checkout'] = 'Pay Checkout';
    $langArr['Complete Assessment'] = 'Complete Assessment';
    $langArr["Compete for your company's hackathon posted by our mentor with passion and land your first job"] = "Compete for your company's hackathon posted by our mentor with passion and land your first job";
    $langArr['Coming soon'] = 'Coming soon';


    $langArr['About Us'] = 'About Us';
    $langArr['Our Vision'] = 'Our Vision';
    $langArr['Our Mission'] = 'Our Mission';
    $langArr['our vision text'] = "Our vision is to create a world where your passion and flair align perfectly with the job skills an employer is seeking. Our advanced AI enabled mentorship revolutionize the way a freshman’s affinity is harnessed and verified, thus making employability fun and his lifelong career truly rewarding.";
    $langArr['our mission text'] = "Our mission is to create the simplest and best three-way marketplace for our three stakeholder:</br>
    1. Aspirants and Students</br>
    2. Trainers and Mentors</br>
    3. Employers and Entrepreneurs </br>
    With an aim to facilitate connections and ensure zero mis-hires while selecting a freshman for Internship.";
    $langArr['Philosophy'] = "Our Philosophy";

    $langArr['Philosophy text'] = "Our philosophy is rooted in the concept of the UN Sustainable Development Goals (UNSDGs) concerning the 'Future of Work.' We believe that employability begins with self-evaluation, which, in turn, leads to self-inspiration. This self-inspiration guides an individual in discovering new passions, enabling them to master valuable skills. The practical application of these newly acquired skills prepares the individual for a lifelong journey of learning and applying this knowledge in their workplace.";
    $langArr['Our commitment towards employability for all'] = "Our commitment towards employability for all";
    $langArr['Be updated with the latest skills for "Career 3.0" and future of Employability'] = 'Be updated with the latest skills for "Career 3.0" and future of Employability';

    $langArr['Get started'] = "Get started";
    $langArr['Email'] = "Email";
    $langArr['WFH'] = "WFH";
    $langArr['Dehli'] = "Dehli";
    $langArr['Banglore'] = "Banglore";
    $langArr['Mumbai'] = "Mumbai";
    $langArr['Goa'] = "Goa";
    $langArr['Hyderabad'] = "Hyderabad";
    $langArr['New Delhi'] = "New Delhi";
    $langArr['Doha'] = "Doha";
    $langArr['Abu Dhabi'] = "Abu Dhabi";
    $langArr['Muscat'] = "Muscat";
    $langArr['Sharjah'] = "Sharjah";
    $langArr['Dubai'] = "Dubai";
    $langArr['Shopfloor'] = "Shopfloor";
    $langArr['Construction'] = "Construction";
    $langArr['Digital'] = "Digital";
    $langArr['SoftSkills'] = "SoftSkills";
    $langArr['Supply Chain'] = "Supply Chain";
    $langArr['Industrial Design'] = "Industrial Design";


    $langArr["IT Cybersecurity final Year"] = "IT Cybersecurity final Year";
    $langArr["( UTAS - University of Technology and Applied Sciences- Sohar)"] = "( UTAS - University of Technology and Applied Sciences- Sohar)";
    $langArr["Ghayda Al Mamari"] = "Ghayda Al Mamari";
    $langArr["Digitalgate aspirant cloud has truly been a game-changer for me, I saw the opportunity for an internship with a prestigious cybersecurity company specifically for Omani Graduates, on Linkedin. Thanks to the seamless enrollment process and the innovative avatar-based testing. I was able to secure this OJT opportunity (On the Job training & Internship) in record time with absolutely clarity and transparency."] = "Digitalgate aspirant cloud has truly been a game-changer for me, I saw the opportunity for an internship with a prestigious cybersecurity company specifically for Omani Graduates, on Linkedin. Thanks to the seamless enrollment process and the innovative avatar-based testing. I was able to secure this OJT opportunity (On the Job training & Internship) in record time with absolutely clarity and transparency.";

    $langArr["Jr. Cloud Engineer Azure"] = "Jr. Cloud Engineer Azure";
    $langArr["(Zayed University, Abudhabi)"] = "(Zayed University, Abudhabi)";
    $langArr["Haitham Al Mazrouei"] = "Haitham Al Mazrouei";
    $langArr["The Digitalgate employability program has equipped me with valuable skills and confidence to navigate the academia to industry induction. The comprehensive testing, verification and placement via the cloud connecting an Emirati student directly to the private sector’s HR is amazing. If you're in the GCC and looking to land your first Job/Internship, Digitalgate aspirant cloud is your only choice."] = "The Digitalgate employability program has equipped me with valuable skills and confidence to navigate the academia to industry induction. The comprehensive testing, verification and placement via the cloud connecting an Emirati student directly to the private sector’s HR is amazing. If you're in the GCC and looking to land your first Job/Internship, Digitalgate aspirant cloud is your only choice.";

    $langArr["New Business Director"] = "New Business Director";
    $langArr["( Securado Cybersecurity LLC)"] = "( Securado Cybersecurity LLC)";
    $langArr["Omar Aljarwani"] = "Omar Aljarwani";
    $langArr["Digitalgate Mentor Cloud has completely transformed our recruitment process. As a company, we were looking for an efficient way to assess employability, verify skills, and evaluate English proficiency among Omani students and aspirants fresh out of university. Thank you Digitalgate for the comprehensive question bank prepared by industry practitioners, I chose the perfect candidates at the right price. This platform has a large omani talent pool and best suited for large batch intern roles.!"] = "Digitalgate Mentor Cloud has completely transformed our recruitment process. As a company, we were looking for an efficient way to assess employability, verify skills, and evaluate English proficiency among Omani students and aspirants fresh out of university. Thank you Digitalgate for the comprehensive question bank prepared by industry practitioners, I chose the perfect candidates at the right price. This platform has a large omani talent pool and best suited for large batch intern roles.!";

    $langArr["SCM and Warehousing CEO"] = "SCM and Warehousing CEO";
    $langArr["(World link Shipping LLC)"] = "(World link Shipping LLC)";
    $langArr["Ajith"] = "Ajith";
    $langArr["I was contacted by The DigitalGate Mentor Cloud to create multiple-choice quizzes and metaverse-based gamified skill assessments to unearth the skill of emirati SCM graduates. I created the test heading in xcel and word and uploaded it to DG’s AI proctoring/authoring engine and got a 3D and 2D module in chronological order witching minutes, and I got paid also by the employer via Digitalgate."] = "I was contacted by The DigitalGate Mentor Cloud to create multiple-choice quizzes and metaverse-based gamified skill assessments to unearth the skill of emirati SCM graduates. I created the test heading in xcel and word and uploaded it to DG’s AI proctoring/authoring engine and got a 3D and 2D module in chronological order witching minutes, and I got paid also by the employer via Digitalgate.";

 }
@endphp
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<style>
.top_banner {
  background-image: url({{ asset('talent/assets/img/top-banner-1.svg')}}), url({{ asset('talent/assets/img/top-banner-2.svg')}});
  background-repeat: no-repeat, no-repeat;
  background-size: 50%, 50%;
  background-position: left center, right center;
  padding: 30px;
}
.top_banner .bannerdata {
  display: inline-block;
  width: 100%;
  padding: 120px 30px 80px 30px;
}
.top_banner .bannerdata .banner-title {
  color: #fff;
  font-size: 48px;
  font-weight: 500;
  margin-bottom: 15px;
}
.top_banner .bannerdata .desq {
  color: #fff;
  font-size: 15px;
  font-weight: 500;
  margin-bottom: 30px;
}
.top_banner .bannerdata .btn-explore {
  color: #04043c !important;
  font-size: 17px;
  font-weight: 600;
  border-radius: 13px;
  border: 1px solid #04043c;
  padding: 16px 40px;
  margin-bottom: 25px;
}
.top_banner .bannerdata .btn-green {
  background: #5fbc6b;
}
.top_banner .bannerdata .btn-yellow {
  background: #f9c900;
}
.top_banner .bannerdata .img-fluid {
  margin-left: -15px;
}

.logo_button_sec {
  background: linear-gradient(180deg, #ececec 0%, #c9c9c9 100%);
}
.logo_button_sec .button_div {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}
.logo_button_sec .button_div .img-fluid {
  max-width: 180px;
}
.logo_button_sec .button_div .btn {
  font-size: 17px;
  font-weight: 600;
  border-radius: 0 10px 10px 0;
  border: 1px solid #04043c;
  padding: 60px 70px;
  display: inline-block;
  background: #5fbc6b;
}
.logo_button_sec .button_div .btn-green {
  color: #fff !important;
  background: #5fbc6b;
}
.logo_button_sec .button_div .btn-yellow {
  color: #000 !important;
  background: #f9c900;
}

.curete_sec {
  padding: 40px 0;
  background: linear-gradient(143deg, #04043c 3.01%, #000 100%);
  background-image: url({{ asset('talent/assets/img/curete-bg.svg')}});
  background-repeat: no-repeat;
  background-position: bottom center;
  background-size: cover;
}
.curete_sec .left_div {
  display: inline-block;
  width: 100%;
  margin-bottom: 30px;
}
.curete_sec .left_div .titles {
  color: #fff;
  font-size: 60px;
  font-weight: 700;
  line-height: 1;
  margin-bottom: 80px;
}
.curete_sec .left_div .titles:before {
  content: "";
  width: 60px;
  height: 60px;
  display: inline-block;
  border-radius: 0.5px;
  background: #5fbc6b;
  margin-right: 15px;
  position: relative;
  top: 5px;
}
.curete_sec .left_div .subtitle {
  color: #fff;
  font-size: 30px;
  font-weight: 600;
  margin-bottom: 60px;
}
.curete_sec .left_div .lists {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  color: #fff;
  font-size: 20px;
  font-weight: 500;
}
.curete_sec .left_div .lists .txt1 {
  width: 50%;
  padding: 5px 10px 0 5px;
}
.curete_sec .right_div {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  padding: 15px;
  margin-bottom: 30px;
  border-radius: 13px;
  background: #ececec;
  box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.41);
}
.curete_sec .right_div .boxs {
  width: 31.33%;
  margin: 1%;
  float: left;
  overflow: hidden;
  text-align: center;
  border-radius: 13px;
  background: #ececec;
  box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.41);
}
.curete_sec .right_div .bg {
  height: 120px;
  float: left;
  width: 100%;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
}
.curete_sec .right_div .txt {
  float: left;
  width: 100%;
  color: #fff;
  font-size: 15px;
  font-weight: 500;
  line-height: normal;
  background: #15284c;
  padding: 8px;
}
.curete_sec .right_div .btn {
  float: left;
  width: 100%;
  border-radius: 3px;
  background: #2eb674;
  color: #fff !important;
  font-size: 12px;
  font-weight: 500;
  line-height: normal;
  padding: 8px;
}
.curete_sec .bottom_div {
  display: inline-block;
  width: 100%;
  padding: 30px;
  padding-right: 150px;
  border-radius: 13px;
  background: #5fbc6b;
  box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.41);
  position: relative;
  color: #fcfcfc;
  font-size: 20px;
  font-weight: 500;
}
.curete_sec .bottom_div .btn {
  border-radius: 0px 13px 13px 0px;
  border: 1px solid #5fbc6b;
  background: #04043c;
  color: #fff;
  font-size: 17px;
  font-weight: 600;
  padding: 30px 42px;
  letter-spacing: -0.34px;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
}

.qualify_sec {
  padding: 40px 0;
  background: linear-gradient(143deg, #04043c 3.01%, #000 100%);
  background-image: url({{ asset('talent/assets/img/qualify-bg.svg')}});
  background-repeat: no-repeat;
  background-position: bottom center;
  background-size: cover;
}
.qualify_sec .left_div {
  display: inline-block;
  width: 100%;
  margin-bottom: 30px;
}
.qualify_sec .left_div .titles {
  color: #fff;
  font-size: 50px;
  font-weight: 700;
  margin-bottom: 80px;
}
.qualify_sec .left_div .titles:before {
  content: "";
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: #f9c900;
  margin-right: 15px;
  float: left;
}
.qualify_sec .left_div .subtitle {
  color: #fff;
  font-size: 30px;
  font-weight: 600;
  margin-bottom: 60px;
}
.qualify_sec .left_div .lists {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  color: #fff;
  font-size: 20px;
  font-weight: 500;
}
.qualify_sec .left_div .lists .txt1 {
  width: 50%;
  padding: 5px 10px 0 5px;
}
.qualify_sec .right_div {
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  padding: 15px;
  margin-bottom: 30px;
  border-radius: 13px;
  background: #ececec;
  box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.41);
}
.qualify_sec .right_div .boxs {
  width: 100%;
  margin: 10px 0;
  display: flex;
  align-items: center;
  overflow: hidden;
  padding: 12px;
  border-radius: 9px;
  border: 0.5px solid rgba(158, 158, 158, 0.5);
  background: #fff;
}
.qualify_sec .right_div .div1 {
  width: 18%;
  display: inline-block;
}
.qualify_sec .right_div .div1 img {
  width: 100%;
}
.qualify_sec .right_div .div2 {
  width: 62%;
  display: inline-block;
  padding: 0 10px;
}
.qualify_sec .right_div .div2 h4 {
  color: #000;
  font-size: 18px;
  font-weight: 600;
  line-height: normal;
}
.qualify_sec .right_div .div2 .post {
  color: #404040;
  font-size: 12px;
  font-weight: 400;
  line-height: normal;
  margin-bottom: 15px;
}
.qualify_sec .right_div .div2 .adress {
  color: #4a4a4a;
  font-size: 14px;
  font-weight: 400;
  line-height: normal;
}
.qualify_sec .right_div .div2 .adress img {
  width: 16px;
  margin-right: 6px;
  vertical-align: middle;
}
.qualify_sec .right_div .div3 {
  width: 20%;
  display: inline-block;
  text-align: center;
}
.qualify_sec .right_div .div3 .links {
  padding: 10px 15px;
  border-radius: 12px;
  background: #f9c900;
  box-shadow: 0px 2px 0px 0px #000;
  color: #04043c;
  font-size: 17px;
  font-weight: 500;
  cursor: pointer;
  display: inline-block;
}
.qualify_sec .bottom_div {
  display: inline-block;
  width: 100%;
  padding: 30px;
  padding-right: 150px;
  border-radius: 13px;
  background: #f9c900;
  box-shadow: 0px 4px 21px 0px rgba(0, 0, 0, 0.41);
  position: relative;
  color: #04043c;
  font-size: 20px;
  font-weight: 500;
}
.qualify_sec .bottom_div .btn {
  border-radius: 0px 13px 13px 0px;
  border: 1px solid #f9c900;
  background: #04043c;
  color: #fff;
  font-size: 17px;
  font-weight: 600;
  padding: 30px 42px;
  letter-spacing: -0.34px;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
}
.popular-section {
    display: inline-block;
    width: 100%;
    background-color: #ececec;
    border-radius: 10px;
    padding: 13px 0;
    max-width: 500px;
}
.popular-section-1 {
    display: inline-block;
    width: 100%;
    margin-top: 15px;
    padding: 15px 20px 0;
    border-top: 2px solid #04043C;
}
.popular-section-1:first-child {
    margin-top: 0;
    border-top: 0;
    padding-top: 0;
}
.popular-section-1 h5 {
    font-size: 12px;
    color: #04043C;
}
.popular-section-list {
    padding-left: 0;
    display: flex;
    margin-bottom: 0;
    text-align: center;
    margin-top: 12px;
}
.popular-section-list li {
    margin: 0 2px;
    list-style-type: none;
    width: 16.6666%;
}
.top_banner .bannerdata .popular-section-list .img-fluid {
    margin-left: 0;
    max-width: 42px;
    max-height: 33px;
}
.popular-section-list li p {
    font-size: 9px;
    margin-top: 2px;
    margin-bottom: 0;
    font-weight: 600;
    color: #04043C;
    text-transform: capitalize;
}

.about_sec{
  padding: 100px 0;
  background-color: #160939;
}
.about_sec .titless{
  color: #fff;
  font-size: 70px;
  font-weight: 600;
  margin-bottom: 50px;
}
.about_sec .lines {
  display: inline-block;
  width: 100%;
  border-bottom: 2px solid #D7D9E2;
  position: relative;
}
.about_sec .lines:before {
  content: "";
  background-color: #F9C900;
  width: 60px;
  height: 5px;
  position: absolute;
  left: 40px;
  top: -2px;
}
.about_sec .text_div{
  display: inline-block;
  width: 100%;
  margin: 30px 0;
}
.about_sec .text_div h3{
  color: #fff;
  font-size: 50px;
  margin: 30px 0;
}
.about_sec .text_div p{
  color: #fff;
  font-size: 30px;
  margin: 30px 0;
}

.ourcommit_sec {
  padding: 100px 0;
  background-color: #160939;
  background-image: url(../img/dots.png), url(../img/dots-line.png);
  background-position: left center, center center;
  background-repeat: no-repeat no-repeat;
  background-size: auto auto;
}
.ourcommit_sec .ourcommit1 {
  background-color: rgba(4, 4, 60, 0.5);
}
.ourcommit_sec .text_div {
  padding: 30px;
}
.ourcommit_sec .text_div h3 {
  color: #fff;
  font-size: 60px;
}
.ourcommit_sec .ourcommit2 {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  justify-content: space-between;
  width: 100%;
  margin-top: 60px;
}
.ourcommit_sec .ourcommit2 img {
  max-width: 100%;
  margin: 15px;
}

.chart_section_css {
    width: 80px;
    height: 80px;
    text-align: center;
    word-break: break-word;
    border-radius: 100%;
    line-height: 17px;
    padding-top: 19px;
}
.mentorchart1_section_css {
    border: 4px solid #00d700;
}
.mentorchart2_section_css {
    border: 4px solid #00d700;
}
.mentorchart3_section_css {
    border: 4px solid orange;
}
.mentorchart4_section_css {
    border: 4px solid orange;
}
.section_chart_block_css {
    margin: 20px 0px;
    color: #fff;
    text-align: center;
    min-height: 162px;
}
.section_div_block_css {
    display: flex;
    align-items: center;
    justify-content: center;
}
.section_vertical_line_block_css {
    width: 100px;
}
.mentor_section_vertical_line_block_css1 {
    border-bottom: 4px solid #00d700;
}
.mentor_section_vertical_line_block_css2 {
    border-bottom: 4px solid orange;
}
.mentor_section_vertical_line_block_css3 {
    border-bottom: 4px solid orange;
}

.aspirantchart1_section_css {
    border: 4px solid orange;
}
.aspirantchart2_section_css {
    border: 4px solid orange;
}
.aspirantchart3_section_css {
    border: 4px solid blue;
}
.aspirantchart4_section_css {
    border: 4px solid blue;
}
.aspirant_section_vertical_line_block_css1 {
    border-bottom: 4px solid orange;
}
.aspirant_section_vertical_line_block_css2 {
    border-bottom: 4px solid orange;
}
.aspirant_section_vertical_line_block_css3 {
    border-bottom: 4px solid blue;
}
.common_block_chart {
    position: relative;
}
.common_block_chart .text_chartt {
    position: absolute;
    top: 93px;
    left: 0;
    right: 0;
    text-align: center;
}
.green_block_chart {
    color: #00d700;
}
.orange_block_chart {
    color: orange;
}
.blue_block_chart {
    color: blue;
}
.kayk_divvvv {
  display: flex;
  background-color: #000;
  justify-content: center;
  align-items: center;
  padding: 50px;
}

@media screen and (max-width: 1199px) {
  .top_banner .bannerdata {
    padding: 30px 20px;
  }
  .top_banner .bannerdata .banner-title {
    font-size: 36px;
  }
  .logo_button_sec .button_div .btn {
    padding: 30px 40px;
  }
  .curete_sec .left_div .titles {
    font-size: 40px;
    margin-bottom: 30px;
  }
  .curete_sec .left_div .titles:before {
    width: 40px;
    height: 40px;
  }
  .curete_sec .left_div .subtitle {
    font-size: 20px;
    margin-bottom: 30px;
  }
  .curete_sec .left_div .lists {
    font-size: 16px;
  }
  .curete_sec .right_div .bg {
    height: 80px;
  }
  .qualify_sec .left_div .titles {
    font-size: 40px;
    margin-bottom: 30px;
  }
  .qualify_sec .left_div .subtitle {
    font-size: 20px;
    margin-bottom: 30px;
  }
  .qualify_sec .left_div .lists {
    font-size: 16px;
  }
}
@media screen and (max-width: 991px) {
  .top_banner {
    background-size: cover;
  }
}
@media screen and (max-width: 767px) {
  .top_banner .bannerdata {
    padding: 30px 0;
  }
  .logo_button_sec .button_div .btn {
    padding: 20px 30px;
  }
}
@media screen and (max-width: 640px) {
  .top_banner {
    padding: 10px;
  }
  .top_banner .bannerdata .banner-title {
    font-size: 30px;
  }
  .top_banner .bannerdata .btn-explore {
    font-size: 16px;
    padding: 12px 30px;
  }
  .logo_button_sec .button_div .btn {
    padding: 10px 20px;
  }
  .logo_button_sec .button_div .img-fluid {
    max-width: 140px;
  }
  .curete_sec .left_div .titles {
    font-size: 30px;
  }
  .curete_sec .right_div .boxs {
    width: 48%;
  }
  .curete_sec .bottom_div {
    padding: 20px;
    padding-right: 90px;
    font-size: 16px;
  }
  .curete_sec .bottom_div .btn {
    font-size: 14px;
    padding: 10px 15px;
  }
  .qualify_sec .left_div .titles {
    font-size: 30px;
  }
  .qualify_sec .left_div .titles:before {
    width: 40px;
    height: 40px;
  }
  .qualify_sec .bottom_div {
    padding: 20px;
    padding-right: 90px;
    font-size: 16px;
  }
  .qualify_sec .bottom_div .btn {
    font-size: 14px;
    padding: 10px 15px;
  }
  .qualify_sec .right_div .div2 h4 {
    font-size: 14px;
  }
  .qualify_sec .right_div .div2 .post {
    font-size: 10px;
  }
  .qualify_sec .right_div .div2 .adress {
    font-size: 10px;
  }
  .qualify_sec .right_div .div3 .links {
    padding: 10px 10px;
    font-size: 14px;
  }
  .popular-section-list {
    flex-wrap: wrap;
  }
  .popular-section-list li {
    width: 31%;
  }
  .chart_section_css {
      width: 60px;
      height: 60px;
      line-height: 14px;
      padding-top: 15px;
  }
  .common_block_chart .text_chartt {
      top: 65px;
  }
  .common_block_chart {
      font-size: 10px;
  }
  .section_chart_block_css {
      min-height: 110px;
  }
  .about_sec {
      padding: 20px 0;
  }
  .about_sec .titless {
      font-size: 35px;
  }
  .about_sec img.img-fluid {
      max-width: 150px;
  }
  .about_sec .text_div h3 {
      font-size: 25px;
  }
  .about_sec .text_div p {
      font-size: 18px;
      margin: 0;
      margin-top: 25px;
  }
  .kayk_divvvv {
    padding: 20px;
  }
  .kayk_titleee {
      font-size: 15px;
  }
  .ourcommit_sec .text_div h3 {
      font-size: 20px;
  }
}
.arabic_lang_jss {
    display: block;
}
</style>
@if ($sitelang == 'ar')
<style>
body {
    direction: rtl;
}
.fa-angle-right:before {
    content: "\f104";
}
.mob-menu {
    float: left;
}
.profile-icon {
    float: left;
}
.dpr-menu i {
    margin: 2px 5px 0 10px;
}
.popular-section-list {
    padding-right: 0;
}
.logo_button_sec .button_div .btn {
    border-radius: 10px 0px 0px 10px;
}
.curete_sec .bottom_div {
    padding-right: 30px;
    padding-left: 150px;
}
.curete_sec .bottom_div .btn {
    border-radius: 13px 0px 0px 13px;
    left: 0;
    right: auto;
}
.qualify_sec .left_div .titles:before {
    margin-right: 0;
    float: right;
    margin-left: 15px;
}
.qualify_sec .right_div .div2 .adress img {
    margin-right: 0;
    margin-left: 6px;
}
.qualify_sec .bottom_div {
    padding-right: 30px;
    padding-left: 150px;
}
.qualify_sec .bottom_div .btn {
    border-radius: 13px 0px 0px 13px;
    left: 0;
    right: auto;
}
.about_sec .lines:before {
    right: 40px;
    left: auto;
}
[type=email], [type=file], [type=number], [type=password], [type=tel], [type=url], code, samp, var {
    text-align: right;
    direction: rtl;
}
.slick-slider .slick-track, .slick-slider .slick-list { direction: ltr; }
</style>
@endif
<style>
.slider_card_block_css .card_title_section_css 
{
  background-color:#fff;
}
.slider_card_block_css .card_title_section_css ul
{
  display: flex;
  margin: 0px !important;
  justify-content: space-between;
  align-items: start;
  padding: 14px;
}
.slider_card_block_css .card_title_section_css li
{
  list-style: none;
}
.slider_card_block_css .card_img_section_css img
{
  width: auto;
    height: 210px;
    display: block;
    margin: 0 auto;
    max-width: 100%;
}
.slider_card_block_css .yellow_bg_card
{
  background-color: #f9c900;
  color:#fff;
}
.slider_card_block_css .green_bg_card
{
  background-color: #5fbc6b;
  color:#fff;
}
.slider_card_block_css .purple_bg_card
{
  background-color: #6161f7;
  color:#fff;
}
.slider_card_block_css .orange_bg_card
{
  background-color: #FC6717;
  color:#fff;
}
.slider_card_block_css.slick-slide 
{
  margin-right: 10px;
  margin-left: 10px;
}
.slider_section
{
  background-color: #160939;
  padding: 10px;
}
.slider_card_block_css .card_title_section_css h5
{
  min-height: 45px;
}
.slider_card_block_css .card_title_section_css p
{
  min-height: 40px;
}
.slider_card_block_css .card_desc_section_css p
{
  margin-bottom: 0px;
}
.slider_card_block_css .card_desc_section_css 
{
  min-height: 320px;
}

</style>
@php $imgLazyloadUrl = "data:image/png;base64,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"; @endphp 
<section class="slider_section">
  <div class="container">
  <div class="row">
      <div class="col-12 col-lg-12 col-md-12">
          <div class="slider_section_jss">

            @php
              $common_logo_sl = 'group-1933.png';
              $slider_data = [
                  ["title" => $langArr["IT Cybersecurity final Year"],
                    "sub_title" => $langArr["( UTAS - University of Technology and Applied Sciences- Sohar)"],
                    "bottom_title" => $langArr["Ghayda Al Mamari"],
                    "bottom_description" => $langArr["Digitalgate aspirant cloud has truly been a game-changer for me, I saw the opportunity for an internship with a prestigious cybersecurity company specifically for Omani Graduates, on Linkedin. Thanks to the seamless enrollment process and the innovative avatar-based testing. I was able to secure this OJT opportunity (On the Job training & Internship) in record time with absolutely clarity and transparency."],
                    "img" => "ghayda-sl.png",
                    "logo-img" => "talent/assets/img/".$common_logo_sl,
                    "class" => "green_bg_card",
                  ],
                  ["title" => $langArr["Jr. Cloud Engineer Azure"],
                    "sub_title" => $langArr["(Zayed University, Abudhabi)"],
                    "bottom_title" => $langArr["Haitham Al Mazrouei"],
                    "bottom_description" => $langArr["The Digitalgate employability program has equipped me with valuable skills and confidence to navigate the academia to industry induction. The comprehensive testing, verification and placement via the cloud connecting an Emirati student directly to the private sector’s HR is amazing. If you're in the GCC and looking to land your first Job/Internship, Digitalgate aspirant cloud is your only choice."],
                    "img" => "haitham-sl.png",
                    "logo-img" => "talent/assets/img/".$common_logo_sl,
                    "class" => "yellow_bg_card",
                  ],
                  ["title" => $langArr["New Business Director"],
                    "sub_title" => $langArr["( Securado Cybersecurity LLC)"],
                    "bottom_title" => $langArr["Omar Aljarwani"],
                    "bottom_description" => $langArr["Digitalgate Mentor Cloud has completely transformed our recruitment process. As a company, we were looking for an efficient way to assess employability, verify skills, and evaluate English proficiency among Omani students and aspirants fresh out of university. Thank you Digitalgate for the comprehensive question bank prepared by industry practitioners, I chose the perfect candidates at the right price. This platform has a large omani talent pool and best suited for large batch intern roles.!"],
                    "img" => "omar-profile2.jpeg",
                    "logo-img" => "talent/assets/img/".$common_logo_sl,
                    "class" => "orange_bg_card",
                  ],
                  ["title" => $langArr["SCM and Warehousing CEO"],
                    "sub_title" => $langArr["(World link Shipping LLC)"],
                    "bottom_title" => $langArr["Ajith"],
                    "bottom_description" => $langArr["I was contacted by The DigitalGate Mentor Cloud to create multiple-choice quizzes and metaverse-based gamified skill assessments to unearth the skill of emirati SCM graduates. I created the test heading in xcel and word and uploaded it to DG’s AI proctoring/authoring engine and got a 3D and 2D module in chronological order witching minutes, and I got paid also by the employer via Digitalgate."],
                    "img" => "ajith-sl.png",
                    "logo-img" => "talent/assets/img/".$common_logo_sl,
                    "class" => "purple_bg_card",
                  ],
              ];
             
            @endphp
            @foreach ($slider_data as $key => $value)
                <div class="slider_card_block_css">
                  <!-- title section start -->
                  <div class="card_title_section_css">
                    <ul>
                      <li style="width:70%">
                        <h5>{{$value["title"]}}</h5>
                        <p>{{$value["sub_title"]}}</p>
                      </li>
                      <li style="width:30%">
                        <img src="{{ $value['logo-img'] }}" alt="" style="float: right;" />
                      </li>
                    </ul>
                  </div>
                  <!-- title section end -->

                  <!-- img section start -->
                  <div class="card_img_section_css">
                    <img src="{{asset('talent/assets/img/'.$value['img'])}}" alt="team_img">
                  </div>
                  <!-- img section end -->

                  <!-- description section start -->
                  <div class="card_desc_section_css p5 {{$value['class']}}">
                    <h5>{{$value['bottom_title']}}</h5>
                    <p>{{$value['bottom_description']}}</p>
                  </div>
                  <!-- description section end -->
                </div>
            @endforeach
           
          </div>
      </div>
    </div>
  </div>
</section>
<section class="top_banner">
   <div class="container">
     <div class="row">
       <div class="col-12 col-lg-6">
         <div class="bannerdata">
           <h3 class="banner-title">
             <?=$langArr['I am a Mentor'];?><br />
             & <?=$langArr['I want to Train'];?>
           </h3>
           <div class="desq">
           <?=$langArr['Click to curate a training module to upskill and test our students.'];?>
           </div>
           <a
             href="{{url('/register')}}"
             class="btn btn-explore btn-green"
             ><?=$langArr['Explore'];?> <i class="fa fa-angle-right"></i
           ></a>
           <div class="popular-section">
            <div class="popular-section-1">
              <h5><?=$langArr['Popular Locations'];?>:</h5>
              <ul class="popular-section-list">
                @php
                    $popularLocationArr = array(
                      "Dubai"     => "top-icon-1.png",
                      "Sharjah"   => "top-icon-2.png",
                      "Muscat"    => "top-icon-3.png",
                      "Abu Dhabi" => "top-icon-4.png",
                      "Doha"      => "top-icon-5.png",
                      "New Delhi" => "top-icon-6.png"
                    );
                @endphp
                @foreach ($popularLocationArr as $key => $item)
                  <li>
                    <img
                      class="img-fluid"
                      src="{{ asset('talent/assets/img/'.$item) }}"
                      alt="icon"
                    />
                    <p>{{$langArr[$key]}}</p>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="popular-section-1">
              <h5><?=$langArr['Popular Training Categories'];?>:</h5>
              <ul class="popular-section-list">
                @php
                    $popularLocationArr = array(
                      "Healthcare"    => "top-prod-1.png",
                      "Finance"       => "top-prod-2.png",
                      "Cybersecurity" => "top-prod-3.png",
                      "AI/ML/Web3"    => "top-prod-4.png",
                      "Industrial"    => "top-prod-5.png",
                      "Softskills"    => "top-prod-6.png"
                    );
                @endphp
                @foreach ($popularLocationArr as $key => $item)
                  <li>
                    <img
                      class="img-fluid lazy-load-img-jss" data-src="{{ asset('talent/assets/img/'.$item) }}"
                      src="{{ $imgLazyloadUrl }}"
                      alt="icon"
                    />
                    <p>{{$langArr[$key]}}</p>
                  </li>
                @endforeach
              </ul>
            </div>
           </div>
           {{-- <img
             class="img-fluid"
             src="{{ asset('talent/assets/img/top-banner-11.svg') }}"
             alt="banner"
           /> --}}
         </div>
       </div>
       <div class="col-12 col-lg-6">
         <div class="bannerdata">
           <h3 class="banner-title">
           <?=$langArr['I am a Student'];?><br />
             & <?=$langArr['I want a Job'];?>
           </h3>
           <div class="desq">
           <?=$langArr['Click to compete for an Internship by your dream company.'];?>
           </div>
           <a
             href="{{url('/register')}}"
             class="btn btn-explore btn-yellow"
             ><?=$langArr['Explore'];?> <i class="fa fa-angle-right"></i
           ></a>
           <div class="popular-section">
            <div class="popular-section-1">
              <h5><?=$langArr['Popular Locations'];?>:</h5>
              <ul class="popular-section-list">
                @php
                    $popularLocationArr = array(
                      "WFH"       => "right-icon-1.png",
                      "Dubai"     => "right-icon-2.png",
                      "Banglore"  => "right-icon-3.png",
                      "Muscat"    => "right-icon-4.png",
                      "Hyderabad" => "right-icon-5.png",
                      "Goa"       => "right-icon-6.png"
                    );
                @endphp
                @foreach ($popularLocationArr as $key => $item)
                  <li>
                    <img
                      class="img-fluid"
                      src="{{ asset('talent/assets/img/'.$item) }}"
                      alt="icon"
                    />
                    <p>{{$langArr[$key]}}</p>
                  </li>
                @endforeach
              </ul>
            </div>
            <div class="popular-section-1">
              <h5><?=$langArr['Popular Internship Categories'];?>:</h5>
              <ul class="popular-section-list">
                @php
                    $popularLocationArr = array(
                      "Shopfloor"         => "right-prod-1.png",
                      "Construction"      => "right-prod-2.png",
                      "Digital"           => "right-prod-3.png",
                      "SoftSkills"        => "right-prod-4.png",
                      "Supply Chain"      => "right-prod-5.png",
                      "Industrial Design" => "right-prod-6.png"
                    );
                @endphp
                @foreach ($popularLocationArr as $key => $item)
                  <li>
                    <img
                      class="img-fluid lazy-load-img-jss" data-src="{{ asset('talent/assets/img/'.$item) }}"
                      src="{{$imgLazyloadUrl}}"
                      alt="icon"
                    />
                    <p>{{$langArr[$key]}}</p>
                  </li>
                @endforeach
              </ul>
            </div>
           </div>
           {{-- <img
             class="img-fluid"
             src="{{ asset('talent/assets/img/top-banner-22.svg') }}"
             alt="banner"
           /> --}}
         </div>
       </div>
     </div>
   </div>
 </section>

 <section class="logo_button_sec">
   <div class="container">
     <div class="row">
       <div class="col-12 col-lg-6">
         <div class="button_div">
           <img
             class="img-fluid lazy-load-img-jss" data-src="{{ asset('talent/assets/img/logo-green-mentor.png') }}"
             src="{{$imgLazyloadUrl}}"
             alt="mentor"
           />
           <a href="{{url('/register')}}" class="btn btn-green"
             ><?=$langArr['Explore'];?> <i class="fa fa-angle-right"></i
           ></a>
         </div>
       </div>
       <div class="col-12 col-lg-6">
         <div class="button_div">
           <img
             class="img-fluid lazy-load-img-jss"
             data-src="{{ asset('talent/assets/img/logo-aspirant.png') }}"
             src="{{$imgLazyloadUrl}}"
             alt="aspirant"
           />
           <a href="{{url('/register')}}" class="btn btn-yellow"
             ><?=$langArr['Explore'];?> <i class="fa fa-angle-right"></i
           ></a>
         </div>
       </div>
     </div>
   </div>
 </section>

 <section class="curete_sec">
   <div class="container">
     <div class="row">
       <div class="col-12 col-lg-6">
         <div class="left_div">
           <h3 class="titles"><?=$langArr['Curate Training'];?></h3>
           <div class="subtitle"><?=$langArr['Calling'];?> <span style="color:#5fbc6b"><?=$langArr['Mentor'];?></span></div>
           <div class="lists" style="display:none">
             <div class="txt1">Sign up</div>
             <div class="txt1">Create Module</div>
             <div class="txt1">Train Aspirant</div>
             <div class="txt1">Test and Publish Result</div>
           </div>

           <div class="section_chart_block_css">
						  <div class="section_div_block_css">

							<div class="common_block_chart green_block_chart">
                <div class="mentorchart1_section_css chart_section_css"><?=$langArr['Step'];?> <br/> 1</div>
                <div class="text_chartt"><?=$langArr['Sign up'];?></div>
              </div>

							<div class="section_vertical_line_block_css mentor_section_vertical_line_block_css1"></div>
              <div class="common_block_chart green_block_chart">
  							<div class="mentorchart2_section_css chart_section_css"><?=$langArr['Step'];?> <br/> 2</div>
                <div class="text_chartt"><?=$langArr['Create Module'];?></div>
              </div>

							<div class="section_vertical_line_block_css mentor_section_vertical_line_block_css2"></div>

              <div class="common_block_chart orange_block_chart">
							  <div class="mentorchart3_section_css chart_section_css"><?=$langArr['Step'];?> <br/> 3</div>
                <div class="text_chartt"><?=$langArr['Train Aspirant'];?></div>
              </div>

							<div class="section_vertical_line_block_css mentor_section_vertical_line_block_css3"></div>

              <div class="common_block_chart orange_block_chart">
							  <div class="mentorchart4_section_css chart_section_css"><?=$langArr['Step'];?> <br/> 4</div>
                <div class="text_chartt"><?=$langArr['Test & Publish'];?></div>
              </div>

						</div>
					</div>

         </div>
       </div>
       <div class="col-12 col-lg-6">
         <div class="right_div">
           <div class="boxs">
             <div
               class="bg"
               style="background-image: url({{ asset('talent/assets/img/curete-bg.svg') }})"
             ></div>
             <div class="txt"><?=$langArr['Healthcare'];?></div>
             <a href="javascript:;" class="btn"
               ><?=$langArr['View'];?> <i class="fa fa-angle-right"></i
             ></a>
           </div>
           <div class="boxs">
             <div
               class="bg"
               style="background-image: url({{ asset('talent/assets/img/curete-bg.svg') }})"
             ></div>
             <div class="txt"><?=$langArr['Finance'];?></div>
             <a href="javascript:;" class="btn"
               ><?=$langArr['View'];?> <i class="fa fa-angle-right"></i
             ></a>
           </div>
           <div class="boxs">
             <div
               class="bg"
               style="background-image: url({{ asset('talent/assets/img/curete-bg.svg') }})"
             ></div>
             <div class="txt"><?=$langArr['Cybersecurity'];?></div>
             <a href="javascript:;" class="btn"
               ><?=$langArr['View'];?> <i class="fa fa-angle-right"></i
             ></a>
           </div>
           <div class="boxs">
             <div
               class="bg"
               style="background-image: url({{ asset('talent/assets/img/curete-bg.svg') }})"
             ></div>
             <div class="txt"><?=$langArr['AI/ML/Web3'];?></div>
             <a href="javascript:;" class="btn"
               ><?=$langArr['View'];?> <i class="fa fa-angle-right"></i
             ></a>
           </div>
           <div class="boxs">
             <div
               class="bg"
               style="background-image: url({{ asset('talent/assets/img/curete-bg.svg') }})"
             ></div>
             <div class="txt"><?=$langArr['Industrial'];?></div>
             <a href="javascript:;" class="btn"
               ><?=$langArr['View'];?> <i class="fa fa-angle-right"></i
             ></a>
           </div>
           <div class="boxs">
             <div
               class="bg"
               style="background-image: url({{ asset('talent/assets/img/curete-bg.svg') }})"
             ></div>
             <div class="txt"><?=$langArr['Softskills'];?></div>
             <a href="javascript:;" class="btn"
               ><?=$langArr['View'];?> <i class="fa fa-angle-right"></i
             ></a>
           </div>
         </div>
       </div>
       <div class="col-12 col-lg-12">
         <div class="bottom_div">
         <?=$langArr["Curate the best industry immersive training with DG's AI module builder and get paid to mentor students"];?>
           <a href="javascript:;" class="btn"
             ><?=$langArr['Explore'];?> <i class="fa fa-angle-right"></i
           ></a>
         </div>
       </div>
     </div>
   </div>
 </section>

 <section class="qualify_sec">
   <div class="container">
     <div class="row">
       <div class="col-12 col-lg-6">
         <div class="right_div">
           <div class="boxs">
             <div class="div1">
               <img class="lazy-load-img-jss" data-src="{{ asset('talent/assets/img/log-2.png') }}"  src="{{$imgLazyloadUrl}}" alt="log">
             </div>
             <div class="div2">
               <h4><?=$langArr['Reem Al Hassan'];?></h4>
               <div class="post"><?=$langArr['Graphic Design Intern'];?></div>
               <div class="adress"><img class="lazy-load-img-jss" data-src="{{ asset('talent/assets/img/bag-icon.svg') }}"  src="{{$imgLazyloadUrl}}" alt="bag"> <?=$langArr['Full time Dubai, United Arab Emirates'];?></div>
             </div>
             <div class="div3">
               <a class="links"><?=$langArr['HCT'];?> <i class="fa fa-angle-right"></i></a>
             </div>
           </div>
           <div class="boxs">
             <div class="div1">
               <img class="lazy-load-img-jss" data-src="{{ asset('talent/assets/img/log-1.png') }}"  src="{{$imgLazyloadUrl}}" alt="log">
             </div>
             <div class="div2">
               <h4><?=$langArr['Eng. Danish Al Lawati'];?></h4>
               <div class="post"><?=$langArr['SOC cyber security'];?></div>
               <div class="adress"><img class="lazy-load-img-jss" data-src="{{ asset('talent/assets/img/bag-icon.svg') }}" src="{{$imgLazyloadUrl}}" alt="bag"> <?=$langArr['Internship  Muscat, Oman'];?></div>
             </div>
             <div class="div3">
               <a class="links"><?=$langArr['SQU'];?> <i class="fa fa-angle-right"></i></a>
             </div>
           </div>
         </div>
       </div>
       <div class="col-12 col-lg-6">
         <div class="left_div">
           <h3 class="titles"><?=$langArr['Qualify for Internship'];?></h3>
           <div class="subtitle"><?=$langArr['Calling'];?> <span style="color:#f9c900"><?=$langArr['Aspirant'];?></span></div>
           <div class="lists" style="display:none">
             <div class="txt1">Sign up</div>
             <div class="txt1">Select Module</div>
             <div class="txt1">Pay Checkout</div>
             <div class="txt1">Complete Assessment</div>
           </div>

           <div class="section_chart_block_css">
						  <div class="section_div_block_css">

							<div class="common_block_chart orange_block_chart">
                <div class="aspirantchart1_section_css chart_section_css"><?=$langArr['Step'];?> <br/> 1</div>
                <div class="text_chartt"><?=$langArr['Sign up'];?></div>
              </div>

							<div class="section_vertical_line_block_css aspirant_section_vertical_line_block_css1"></div>
              <div class="common_block_chart orange_block_chart">
  							<div class="aspirantchart2_section_css chart_section_css"><?=$langArr['Step'];?> <br/> 2</div>
                <div class="text_chartt"><?=$langArr['Select Module'];?></div>
              </div>

							<div class="section_vertical_line_block_css aspirant_section_vertical_line_block_css2"></div>

              <div class="common_block_chart">
							  <div class="aspirantchart3_section_css chart_section_css"><?=$langArr['Step'];?> <br/> 3</div>
                <div class="text_chartt"><?=$langArr['Pay Checkout'];?></div>
              </div>

							<div class="section_vertical_line_block_css aspirant_section_vertical_line_block_css3"></div>

              <div class="common_block_chart">
							  <div class="aspirantchart4_section_css chart_section_css"><?=$langArr['Step'];?> <br/> 4</div>
                <div class="text_chartt"><?=$langArr['Complete Assessment'];?></div>
              </div>

						</div>
					</div>

         </div>
       </div>
       <div class="col-12 col-lg-12">
         <div class="bottom_div">
         <?=$langArr["Compete for your company's hackathon posted by our mentor with passion and land your first job"];?>
           <a href="javascript:;" class="btn"
             ><?=$langArr['Explore'];?> <i class="fa fa-angle-right"></i
           ></a>
         </div>
       </div>
     </div>
   </div>
 </section>

 <section class="logo_button_sec">
   <div class="container">
     <div class="row">
       <div class="col-12 col-lg-6">
         <div class="button_div">
           <img
             class="img-fluid lazy-load-img-jss"
             data-src="{{ asset('talent/assets/img/logo-blue-finance.png') }}"
             src="{{$imgLazyloadUrl}}"
             alt="finance"
           />
           <a class="btn" style="background: #6161f7;color: #fff;"><?=$langArr['Coming soon'];?></a>
         </div>
       </div>
       <div class="col-12 col-lg-6">
         <div class="button_div">
           <img
             class="img-fluid lazy-load-img-jss"
             data-src="{{ asset('talent/assets/img/logo-orange-employer.png') }}"
             src="{{$imgLazyloadUrl}}"
             alt="employer"
           />
           <a class="btn" style="background: #FC6717;color: #fff !important;"><?=$langArr['Coming soon'];?></a>
         </div>
       </div>
     </div>
   </div>
 </section>

 <section>
      <img data-src="{{ asset('talent/assets/img/linee.png') }}"  src="{{$imgLazyloadUrl}}" alt="linee" class="w100 lazy-load-img-jss" />
    </section>

    <section class="about_sec">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-12">
            <h3 class="titless"><?=$langArr['About Us'];?></h3>
          </div>
          <div class="col-12 col-lg-6 text-center">
            <img
              class="img-fluid lazy-load-img-jss"
              data-src="{{ asset('talent/assets/img/shape-1.svg') }}"
              src="{{$imgLazyloadUrl}}"
              alt="shape"
            />
          </div>
          <div class="col-12 col-lg-6">
            <div class="text_div">
              <div class="lines"></div>
              <h3><?=$langArr['Our Vision'];?></h3>
              <p>
              <?=$langArr['our vision text'];?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="about_sec">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-12 col-lg-6 text-center">
            <img
              class="img-fluid lazy-load-img-jss"
              data-src="{{ asset('talent/assets/img/shape-2.svg') }}"
              src="{{$imgLazyloadUrl}}"
              alt="shape"
            />
          </div>
          <div class="col-12 col-lg-6">
            <div class="text_div">
              <div class="lines"></div>
              <h3><?=$langArr['Our Mission'];?></h3>
              <p>
                  <?=$langArr['our mission text'];?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="about_sec">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-6 text-center">
            <img
              class="img-fluid lazy-load-img-jss"
              data-src="{{ asset('talent/assets/img/shape-3.svg') }}"
              src="{{$imgLazyloadUrl}}"
              alt="shape"
            />
          </div>
          <div class="col-12 col-lg-6">
            <div class="text_div">
              <div class="lines"></div>
              <h3><?=$langArr['Philosophy'];?></h3>
              <p>
                <?=$langArr['Philosophy text'];?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="ourcommit_sec">
      <div class="container">
        <div class="ourcommit1">
          <div class="row flex-row-reverse align-items-center">
            <div class="col-12 col-lg-6 text-center">
              <img
                class="img-fluid lazy-load-img-jss"
                data-src="{{ asset('talent/assets/img/sdgs-1.png') }}"
                src="{{$imgLazyloadUrl}}"
                alt="shape"
              />
            </div>
            <div class="col-12 col-lg-6 align-items-center">
              <div class="text_div">
                <h3><?=$langArr['Our commitment towards employability for all'];?></h3>
              </div>
            </div>
          </div>
        </div>
        <div class="ourcommit2">
          <img class="lazy-load-img-jss" data-src="{{ asset('talent/assets/img/lists-1.png') }}"  src="{{$imgLazyloadUrl}}" alt="lists" />
          <img class="lazy-load-img-jss" data-src="{{ asset('talent/assets/img/lists-2.png') }}"  src="{{$imgLazyloadUrl}}" alt="lists" />
          <img class="lazy-load-img-jss" data-src="{{ asset('talent/assets/img/lists-3.png') }}"  src="{{$imgLazyloadUrl}}" alt="lists" />
          <img class="lazy-load-img-jss" data-src="{{ asset('talent/assets/img/lists-4.png') }}"  src="{{$imgLazyloadUrl}}" alt="lists" />
          <img class="lazy-load-img-jss" data-src="{{ asset('talent/assets/img/lists-5.png') }}"  src="{{$imgLazyloadUrl}}" alt="lists" />
          <img class="lazy-load-img-jss" data-src="{{ asset('talent/assets/img/lists-6.png') }}"  src="{{$imgLazyloadUrl}}" alt="lists" />
        </div>
      </div>
    </section>

 <section>
   <div>
     <div
       style="background-color: #15284c; padding: 20px 100px"
       class="section_device_css"
     >
       <div class="kayk_divvvv">
         <div style="width: 50%">
           <h2 style="color: white; padding-right: 30px" class="kayk_titleee">
           <?=$langArr['Be updated with the latest skills for "Career 3.0" and future of Employability'];?>
           </h2>

           <div style="border: 1px solid white;border-radius: 5px;display: inline-block;padding: 3px;">
            
              <input type="email" placeholder="<?=$langArr['Email']?>" class="email_address_jss" style="margin-bottom: 3px;height: 37px;padding: 5px;"/>
              <!-- <textarea class="email_text_jss" style="width: 100%;margin-bottom: 3px;height: 100px;" placeholder="Type Message"></textarea> -->
              <button type="button" class="get_started_mail_send_btn_jss" style="border-radius: 3px;background-color: #f9c903;color: white;padding: 3px;"><?=$langArr['Get started'];?></button>
            
           </div>
         </div>
         <div style="width: 50%">
           <img
             class="kayk_imaggeee lazy-load-img-jss"
             data-src="{{ asset('talent/assets/img/lannew12.png') }}"
             src="{{$imgLazyloadUrl}}"
             alt="lannew"
             width="100%"
           />
         </div>
       </div>
     </div>
   </div>
 </section>
<script>
$(document).ready(function(){
  <?php 
  if ($sitelang == 'ar')
  {
    ?>
      $('#bs4css_chage').remove();
      $('title').after('<link rel="stylesheet" href="https://docs.bootstrapper.ir/docs/4.6/dist/css/bootstrap-rtl.min.css">');
    <?php 
  }
  ?>

  $("body").on("click", ".get_started_mail_send_btn_jss", function(e){
    e.preventDefault();
    var email_address = $(".email_address_jss").val();
    //var email_message = $(".email_text_jss").val();
    $(this).prop("disabled",true);
    jQuery(".loder").show();
    $.ajax({
        url: "{{route('get_started_mail_send')}}",
        type: "POST",
        dataType: "json",
        data: {
            _token: "{{ csrf_token() }}",
            email_address: email_address,
          //  email_message: email_message
        },
        success: function(response)
        {
            jQuery(".loder").hide();
            $(".get_started_mail_send_btn_jss").prop("disabled",false);
            if(response.status)
            {
                alert_msg(1, response.msg);
                //$(".email_text_jss").val('');
                $(".email_address_jss").val('');
            }
            else
            {
                alert_msg(0, response.msg);
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

// ===lazyload image code start ===
function loadLazyImage() 
	{
		var lazyImages = $(".lazy-load-img-jss");
		lazyImages.each(function() {
			var img = $(this);
			if (img.isInViewport() && !img.hasClass("loaded")) 
			{
				img.addClass("loaded"); // Mark the image as loaded
				img.removeClass("width-auto"); // Mark the image as loaded
				img.attr("src", img.data("src")); // Set the src attribute to trigger loading
			}
		});
	}

	// Check if an element is in the viewport
	$.fn.isInViewport = function() 
	{
		var elementTop = $(this).offset().top;
		var elementBottom = elementTop + $(this).outerHeight();
		var viewportTop = $(window).scrollTop();
		var viewportBottom = viewportTop + $(window).height();
		return elementBottom > viewportTop && elementTop < viewportBottom;
	};

	$(window).on("scroll", function() {
		loadLazyImage();
	});
  loadLazyImage();
	// ===lazyload image code end ===
  $('.slider_section_jss').slick({
    slidesToShow: 3,
    infinite:true,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: false,
    arrows: false, 
    beforeChange: function(event, slick, currentSlide, nextSlide) {
        // Get the height of the next slide
        var nextSlideHeight = $('.slick-slide[data-slick-index="' + nextSlide + '"]').height();

        // Set the height of all slides to the height of the next slide
        $('.slick-slide').height(nextSlideHeight);
    },
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  

</script>
@include('footer')
