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
							<a href="#"><i class="icon-pencil icon-large"></i>&nbsp;انشلء حساب</a>
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
					
				<div class="alert alert-info">أختار تاريخ  الوعد</div>

		<!-- reservation -->
		<?php if (isset($_POST['yes'])){ 
		$session_id = $_POST['session_id'];
		$date1 = $_POST['date1'];
		$service1 = $_POST['service1'];
		$equal = $_POST['equal'];
		mysqli_query($conn,"insert into schedule (member_id,date,service_id,number,status) values('$session_id','$date1','$service1','$equal','Pending')")or die(mysqli_error($conn));
		?>
		<div class="yes"><h3>موعدك على تاريخ  <?php echo  $date1; ?>. شكرا</h3></div>
		<?php }else{ ?>
		<script>
		alert('error');
		</script>
		<?php } ?>
		<br>
		<br>
	
	<!-- end reservation -->
	


	
	
	
				</div>
				<div class="span3">
				<img src="img/32x32/facebook.png">
				<img src="img/32x32/twitter.png">
				<img src="img/32x32/rss.png">
				<div class="alert alert-info">الخدمات</div>
						<table class="table  table-bordered">
                            
                                <thead>
                                    <tr>
                                        <th>الخدمات</th>
                                        <th>السعر</th>                                 
                                     
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php $user_query=mysqli_query($conn,"select * from service")or die(mysqli_error($conn));
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['service_id']; ?>
									 <tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['service_offer']; ?></td> 
                                    <td><?php echo $row['price']; ?></td>                         
									<?php } ?>
                           
                                </tbody>
                            </table>
				
					<img  class="img img-polaroid" src="images/c.jpg">
				</div>
				
			</div>
		</div>
    </div>
<?php include('footer.php') ?>