<?php include('header.php'); ?>
<!-- -->
      <div class="navbar navbar-fixed-top navbar-inverse">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="nav-collapse collapse">
					<ul class="nav">
					<li><a rel="tooltip"  data-placement="bottom" title="Home" id="home" href="index.php" class=""><i class="icon-home icon-large"></i>&nbsp;القائمة الرئيسية</a></li>
					<li><a rel="tooltip"  data-placement="bottom" title="Services" id="services" href="services.php" class=""><i class="icon-list icon-large"></i>&nbsp;الخدمات</a></li>
					<li class="active"><a rel="tooltip"  data-placement="bottom" title="About Us" id="aboutus" href="about.php" class=""><i class="icon-info icon-large"></i>&nbsp;حول</a></li>
					<li><a rel="tooltip"  data-placement="bottom" title="Contact Us" id="contactus" href="contact_us.php" class=""><i class="icon-phone icon-large"></i>&nbsp;للأتصال بنا</a></li>
					
					</ul>
					     <form class="navbar-search pull-right">
						 <input type="text" class="search-query" placeholder="بحث">
					 	 </form>
                 
                    </div>
                </div>
            </div>
        </div>
   
<!-- -->
<?php include('dbcon.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
				<div class="span12">
				<style>
				.contact-info {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }
        .contact-item {
            display: flex;
            align-items: center;
        }
        .contact-item img {
            margin-left: 10px;
        }
    </style>
	 <div class="contact-info">
        <div class="contact-item">
            <img src="img/phone-call-507.png" alt="Mobile Icon" width="30">
            <span>الهاتف المحمول: 123-456-7890</span>
        </div>
        <div class="contact-item">
            <img src="img/mail-5714.png" alt="Email Icon" width="30">
            <span>البريد الإلكتروني: info@example.com</span>
        </div>
        <div class="contact-item">
            <img src="img/location-pointer-2961.png" alt="Address Icon" width="30">
            <span>العنوان: شارع المثال، مدينة المثال</span>
        </div>
    </div>
			 
			 
			
				<div class="login_sign_up">
				<a rel="tooltip"  data-placement="left" title="Click Here to Login" id="login" href="login.php"  class="btn btn-info btn-large"><i class="icon-signin icon-large"></i>&nbsp;تسجيل الدخول</a>
				<p><a rel="tooltip"  data-placement="bottom" title="Click Here to Sign UP" id="signup" href="signup.php">ليس لديك حساب؟ اشترك</a></p>
				</div>
				
				<br/>
				<!--- login -->
				<?php include('about_content.php'); ?>
				<!-- end login -->
				</div>
				<div class="span12">
				<div class="caption_index" style="text-align: right;">صحتك تبدا من فمك</div>
				</div>		
				<div class="clearfix"></div>
				<div class="span12">
					<?php include('thumbnail.php'); ?>
				</div>
				<div class="span12">
				<?php include('content1.php'); ?>
				</div>
				<div class="span12">
				<?php include('content2.php'); ?>	
				</div>
			</div>
		</div>
    </div>
<?php include('footer.php') ?>