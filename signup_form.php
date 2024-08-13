<?php
		include('dbcon.php');
		if (isset($_POST['submit'])){
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$middlename=$_POST['middlename'];
		$age=$_POST['age'];
		$gender=$_POST['gender'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$contact_no=$_POST['contact_no'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		
			if($cpassword!=$password){
		$a="Password do not Match";
		}else{
		$a = "";
		}
	}
	?>
<form method="post">	
	<div class="span5">
	<div class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputEmail">الأسم</label>
			<div class="controls">
			<input type="text" name="firstname" value="<?php if (isset($_POST['submit'])){echo $firstname;} ?>" placeholder="Firtname" required> 
			<input type="text" name="lastname"  value="<?php if (isset($_POST['submit'])){echo $lastname;} ?>" placeholder="Lastname" required> 
			<input type="text" name="middlename" value="<?php if (isset($_POST['submit'])){echo $middlename;} ?>" placeholder="Middlename" required> 
			</div>
		</div>
	
		<div class="control-group">
			<label class="control-label" for="inputPassword">الجنس</label>
			<div class="controls">
			<select name="gender" required>
			<option><?php if (isset($_POST['submit'])){echo $gender;} ?></option>
			<option>ذكر</option>
			<option>أنثى</option>
			</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">العمر</label>
			<div class="controls">
			<input name="age" class="span1" type="number"  value="<?php if (isset($_POST['submit'])){echo $age;} ?>" placeholder="Age" required>
			</div>
		</div>
	
		<div class="control-group">
			<label class="control-label" for="inputPassword">أسم المستخدم</label>
			<div class="controls">
			<input type="text" name="username" value="<?php if (isset($_POST['submit'])){echo $username;} ?>" placeholder="Username" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">كلمة السر</label>
			<div class="controls">
			<input type="password" name="password" value="<?php if (isset($_POST['submit'])){echo $password;} ?>" placeholder="Password">
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
			<button name="submit" type="submit" class="btn btn-info"><i class="icon-signin icon-large"></i>&nbsp; تسجيل الدخول</button>
			</div>
		</div>
    </div>
</div>
	
	
	<div class="span6">
	
	
	<div class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputPassword">العنوان</label>
			<div class="controls">
			<input type="text" name="address" value="<?php if (isset($_POST['submit'])){echo $address;} ?>" placeholder="Address" required>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">جهة الاتصال</label>
			<div class="controls">
			<input type="text" name="contact_no" value="<?php if (isset($_POST['submit'])){echo $contact_no;} ?>"placeholder="Contact No" required>
			</div>
		</div>
		
			<div class="control-group">
			<label class="control-label" for="inputPassword">الأيميل</label>
			<div class="controls">
			<input name="email" type="text" value="<?php if (isset($_POST['submit'])){echo $email;} ?>" placeholder="Email Address" required> 
			</div>
		</div>
		
	
	
		    <div class="control-group">
    
    <div class="controls">
   
	
	<?php 

if(isset($_POST['submit']))
{
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$middlename=$_POST['middlename'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$contact_no=$_POST['contact_no'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];	
	if(strcmp($_SESSION['code'], $_POST['code']) != 0)
	{
	?>
	<span class="label label-important">Code Does Not Match</span>
<?php
}else if(strcmp($_SESSION['code'], $_POST['code']) == 0 && $password == $cpassword){ ?>
<?php
	mysqli_query($conn,"insert into members (firstname,lastname,age,gender,address,email,contact_no,username,password)
	values ('$firstname','$lastname','$age','$gender','$address','$email','$contact_no','$username','$password')
	")or die(mysqli_error($conn));?>
<script type="text/javascript">
window.location='success.php';
</script>
<?php
}else{
echo " ";
}}
?>
    </div>
    </div>
	
			<div class="control-group">
			<label class="control-label" for="inputPassword">كلمة السر المطابقة</label>
			<div class="controls">
			<input type="password" name="cpassword" value="<?php if (isset($_POST['submit'])){echo $cpassword;} ?>" placeholder="Confirm Password" required>
					<?php if (isset($_POST['submit'])){?> 	<span class="label label-important"><?php echo $a; ?></span><?php }?>
			</div>

		</div>

		
		
	</div>
		
		</div>	

	
</form>