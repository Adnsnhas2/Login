<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('dbcon.php'); ?>
<?php include('navbar_dasboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
				
				<div class="span3">
					    <ul class="nav nav-tabs nav-stacked">
							<li class="active">
							<a href="#"><i class="icon-pencil icon-large"></i>&nbsp;انشاء حسابt</a>
							</li>
					
						</ul>
						<p><strong>اليوم:</strong></p>
				 <div class="alert alert-success">
                        <i class="icon-calendar icon-large"></i>
                        <?php
                        $Today = date('d:m:y');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?>
                    </div>		
				<div class="alert alert-info">Dr/saud</div>
			<a href="clinic_1.php">
                  <img src="saud.jpg" alt="Description of the image">
                     </a>
						
				
						
							
				<div class="alert alert-info">Dr/Ameerh</div>
				<a href="clinic_2.php">
    <img src="Ameerah.jpg" alt="Description of the image">
</a>
					
					
				<div class="alert alert-info">Dr/Ahmed</div>
				<div class="testimonial_div">
				<a href="clinic_2.php">
    <img src="Ahmed.jpg" alt="Description of the image">
</a>
					</div>		
				</div>
				<div class="span6">
					
					<br>
					<br>
					
				<div class="alert alert-info">أختر تاريخ معاينتك و نوع المعالجة</div>
	
		<!-- reservation -->
		<?php
		if (isset($_POST['sub'])){
		$date = $_POST['date'];
		$service = $_POST['service'];
		
		$query = mysqli_query($conn,"select * from schedule where date = '$date' and member_id = '$session_id' ")or die(mysqli_error($conn));
		$count = mysqli_num_rows($query);
	/* 	echo $count; */
		if ($count  > 0){ ?>
		<script>
		alert('لقد تم بالفعل تحديد  موعدك');
		</script>
		<?php
		}else{
		$equal = $count + 1 ;
		

		?>
		<div class="question">
		<div class="alert alert-success">رقم الموعد <strong><?php echo $equal; ?></strong> client in this date <strong><?php echo  $date; ?></strong></div>
		<form method="POST" action="yes.php">
		<input type="hidden" name="session_id" value="<?php echo $session_id; ?>" >
		<input type="hidden" name="date1" value="<?php echo $date; ?>" >
		<input type="hidden" name="service1" value="<?php echo $service; ?>" >
		<input type="hidden" name="equal" value="<?php echo $equal; ?>" >
		<p>Are you sure you want to set your Appointment on this date?</p>
		<button name="yes" class="btn btn-success"><i class="icon-check icon-large"></i>&nbsp;نعم</button> &nbsp;  <a href="dasboard.php" class="btn"><i class="icon-remove"></i>&nbsp;لا</a>
		</form>
	
		</div>
		<br>
		<br>
		<?php }}   ?>
	<!-- end reservation -->
	
	<form class="form-horizontal" method="POST">
    <div class="control-group">
    <label class="control-label" for="inputEmail">التاريخ</label>
    <div class="controls">
    <input type="text"  class="w8em format-d-m-y highlight-days-67 range-low-today" name="date" id="sd" maxlength="10" style="border: 3px double #CCCCCC;" required/>
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">المعالجة</label>
    <div class="controls">
		<select name="service" required>
			<option></option>
		<?php $query=mysqli_query($conn,"select * from service")or die(mysqli_error($conn));
		while($row=mysqli_fetch_array($query)){
		?>
	
		<option value="<?php echo $row['service_id']; ?>"><?php echo $row['service_offer'] ?></option>
		<?php } ?>
		</select>
    </div>
    </div>
    <div class="control-group">
    <div class="controls">
    <button type="submit" name="sub" class="btn btn-info"><i class="icon-check icon-large"></i>&nbsp;تم</button>
    </div>
    </div>
    </form>
	

	
	
	
				</div>
				<div class="span3">
				
				    <ul class="nav nav-list">
					 <div class="alert alert-danger"><li class="nav-header">ملاحظة</li></div>
						
					
				<?php 
				$note_query = mysqli_query($conn,"select * from note ")or die(mysqli_error($conn));
				$note_count =mysqli_num_rows($note_query);
				while($note_row = mysqli_fetch_array($note_query)){
				if ($note_count > 0){ ?>
				
				<li><i class="icon-stop icon-large"></i>&nbsp;<?php echo $note_row['message'] ?></li>
				<?php
				}  } 
				?>
				</ul>
				<br>
			
				
				<div class="alert alert-info">الخدمات</div>
						<table class="table  table-bordered">
                            
                                <thead>
                                    <tr>
                                        <th>الخدمات</th>
                                        <th>السعر</th>                                 
                                     
                                    </tr>
                                </thead>
                                <tbody>
								 
								<?php $user_query=mysqli_query($conn,"select * from service where user_id='5'")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['service_id']; ?>
									 <tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['service_offer']; ?></td> 
                                    <td><?php echo $row['price']; ?></td>                         
									<?php } ?>
                           
                                </tbody>
                            </table>
				
				</div>
				
			</div>
		</div>
    </div>
<?php include('footer.php') ?>