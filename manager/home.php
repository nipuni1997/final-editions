<div id="bodyright">

	<h2>Welcome to  Manager Home Page </h2>

	<h2>Welcome to  admin Home Page </h2>

	<div class="main-section">
		<div class="dashbord">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>Users</small>
				<p>
				<?php
					$conn=new PDO("mysql:host=localhost;dbname=onecart","root","");
					$result=$conn->prepare("SELECT COUNT(u_id) FROM user");
					$result->execute();

					for($i=0;$row=$result->fetch();$i++)
					{
						?>
						<tr>
							<td><label><?php echo $row['COUNT(u_id)'];?></label></td>
						</tr>
						<?php
					}
					?>
				</p>
			</div>
			<div class="detail-section">

			</div>
		</div>
		<div class="dashbord dashbord-green">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>Managers</small>
				<p>
					<?php include("include/managerfunction.php"); echo managerCount(); ?>
				</p>
			</div>
			<div class="detail-section">

			</div>
		</div>

		<div class="dashbord dashbord-skyblue">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>Delivers</small>
				<p>
				<?php
					$conn=new PDO("mysql:host=localhost;dbname=onecart","root","");
					$result=$conn->prepare("SELECT DISTINCT COUNT(d_id) FROM deliver");
					$result->execute();

					for($i=0;$row=$result->fetch();$i++)
					{
						?>
						<tr>
							<td><label><?php echo $row['COUNT(d_id)'];?></label></td>
						</tr>
						<?php
					}
					?>
					</p>
			</div>

		</div>

		<div class="dashbord dashbord-blue">
			<div class="icon-section">
				<i class="fa fa-tasks" aria-hidden="true"></i><br>
				<small>Categories</small>
				<p>
					<?php echo categoryCount(); ?>
 				</p>
			</div>
			<div class="detail-section">

			</div>
		</div>
		<div class="dashbord dashbord-red">
			<div class="icon-section">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i><br>
				<small>Products</small>
				<p>
				<?php
					$conn=new PDO("mysql:host=localhost;dbname=onecart","root","");
					$result=$conn->prepare("SELECT DISTINCT COUNT(pro_id) FROM products");
					$result->execute();

					for($i=0;$row=$result->fetch();$i++)
					{
						?>
						<tr>
							<td><label><?php echo $row['COUNT(pro_id)'];?></label></td>
						</tr>
						<?php
					}
					?>
				</p>
			</div>
			<div class="detail-section">

			</div>
		</div>
		<div class="dashbord dashbord-orange">
			<div class="icon-section">
				<i class="fa fa-bell" aria-hidden="true"></i><br>
				<small>Orders</small>
				<p>
					<?php echo vieworderCount(); ?>
				</p>
			</div>
			<div class="detail-section">

			</div>
		</div>

		<div class="dashbord dashbord-blue">
	<div class="icon-section">
		<i class="fa fa-check" aria-hidden="true"></i><br>
		<small>Delivered Items</small>
		<p>
		<?php
			$conn=new PDO("mysql:host=localhost;dbname=onecart","root","");
			$result=$conn->prepare("SELECT COUNT(user_name) FROM deliverstatus WHERE status='Delivered'");
			$result->execute();

			for($i=0;$row=$result->fetch();$i++)
			{
				?>
				<tr>
					<td><label><?php echo $row['COUNT(user_name)'];?></label></td>
				</tr>
				<?php
			}
			?>
			</p>
	</div>
	<div class="detail-section">

	</div>

</div>

		<div class="dashbord dashbord-skyblue">
			<div class="icon-section">
				<i class="fa fa-reply" aria-hidden="true"></i><br>
				<small>Returned Items</small>
				<p>
				<?php
					$conn=new PDO("mysql:host=localhost;dbname=onecart","root","");
					$result=$conn->prepare("SELECT COUNT(user_name) FROM deliverstatus WHERE status='Returned'");
					$result->execute();

					for($i=0;$row=$result->fetch();$i++)
					{
						?>
						<tr>
							<td><label><?php echo $row['COUNT(user_name)'];?></label></td>
						</tr>
						<?php
					}
					?>
					</p>
			</div>
			<div class="detail-section">

			</div>

</div>

	</div>

</div>
