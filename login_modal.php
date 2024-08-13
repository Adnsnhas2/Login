   
<div class="alert alert-info"style="text-align: center;">من فضلك املا البيانات</div>
<div class="lgoin_terry">
<form method="post" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputPassword">اسم المستخدم</label>
			<div class="controls">
			<input type="text" name="username"  placeholder="أسم المستخدم" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">كلمة السر</label>
			<div class="controls">
			<input type="password" name="password" placeholder="كلمة السر" required>
			</div>
		</div>
		<div class="control-group">
			
			<div class="controls">
			<div class="please">املا البيانات</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
			<button name="submit1" type="submit" class="btn btn-info"><i class="icon-signin icon-large"></i>&nbsp;تسجيل الدخول</button>
			</div>
		</div>

			<?php
if (isset($_POST['submit1'])){

$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM members WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn,$query)or die(mysqli_error($conn));
$num_row = mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		if( $num_row > 0 ) {		
	$_SESSION['id']=$row['member_id']; ?>
	<script>
	window.location="dasboard.php";
	</script>
	<?php	}
		else{ ?>
		<div class="alert alert-danger"><strong>Login Error!</strong>&nbsp;تأكد من صحة الايميل</div>
	<?php	
	}	
		}
?>		
	</form>
	</div>