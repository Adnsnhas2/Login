<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('dbcon.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
				<div class="span12">
			
				<div class="login_sign_up">
				<a rel="tooltip"  data-placement="left" title="Click Here to Login" id="login" href="login.php"  class="btn btn-info btn-large"><i class="icon-signin icon-large"></i>&nbsp;تسجيل الدخول</a>
				<p><a rel="tooltip"  data-placement="bottom" title="Click Here to Sign UP" id="signup" href="signup.php">ليس لديك حساب ؟ اشترك</a></p>
				</div>
				<!--- login -->
				<?php include('login_modal.php'); ?>
				<!-- end login -->
				</div>
				<div class="span12">
				<div class="caption_index">نوفر خدكات متكاملة </div>
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