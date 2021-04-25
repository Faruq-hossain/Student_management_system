<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <style type="text/css">
    	#header{
    		height: 10%;
    		width: 100%;
    		top: 2%;
    		background-color: #6C3483;
    		position: fixed;
    		color: black;

    	}
    	#left_side_bar{
    		height: 75%;
    		width: 15%;
    		top: 10%;
    		position: fixed;

    	}
    	#right_side_bar{
    		height: 75%;
    		width: 80%;
    		background-color: #797D7F;
    		position: fixed;
    		left: 17%;
    		top: 21%;
    		color: #ABEBC6;
    		border: solid 1px black;
    	}
    	#top_span{
    		top: 15%;
    		width: 80%;
    		left: 17%;
    		position: fixed;
    	} 
    	#td{
    		border: solid 1px black;
    		padding-left: 2px;
    		text-align: left;
    		width: 200%;
    		 

    	}

    </style>
    <?php
        session_start();#ata holo email name database fatch kore dekhabe tar jonno nice email er okhane php use korbo dynamic vabe dekhabe email name

        #query onnect
        $connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"sms");

        #6 no logout er kaj korbo logout korar por admin e cole jabe#
    ?>
</head>
<body>
	
	<div id="header">
		<center><br><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Management System &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Email: <?php  echo $_SESSION['email'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name: <?php  echo $_SESSION['name'];?>
			<a href="logout.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Logout</a>
		</center>
	</div>
	<span id="top_span"><marquee>Admin Student Information</marquee></span>
	<div id="left_side_bar"><br><br><br><br>
		
		<form action="" method="post">
			<table>
				
				<tr>
					<td>
						<input type="submit" name="search_student" value="Search Student">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="edit_student" value="Edit Student">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="add_new_student" value="Add New Student">
					</td>
				</tr>

				<tr>
					<td>
						<input type="submit" name="delete_student" value="Delete Student">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="show_teachers" value="Show Teachers">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="right_side_bar"><br><br>
		<div id="demo">
			<?php
			    #search button er kar korbo tr code korbo
			#same if isset use kore or vitor post korbo Search Student click korbe tokon jabe
			    if(isset($_POST['search_student'])){
			    	#search box lagbe tar jonno html lagbe tai php off kore dibo ata dis
			    	?>
			    	<center>
			    		<form action="" method="post">
			    			Enter Roll No:
			    			<input type="text" name="roll_no">
			    			<input type="submit" name="search_by_roll_no_for_search" value="Search">
			    			
			    		</form>
			    	</center>
			    	<?php
			    }
			    	#akhane search button er kaj korbo roll number click korar por search hobe tr kaj korbo

			    	    if(isset($_POST['search_by_roll_no_for_search']))
			    	    {
			    	    	#ata click hole ki hobe abar database er sathe connect hoa tr por oi roll number er student  er detail fatch kora lagbe tar jonno database connictivity korbo

			    	    	#1st connection er jonno tar jonno top e akber e define kore dibo connectionjate bar bar na kora lage
			    	    	$query = "select * from students where roll_no = '$_POST[roll_no]'";
		                    $query_run = mysqli_query($connection,$query);
		    	#datbase theke query fatch er maddhome asbe array er vitore dibe .$query_run ai parameter nibe
		                    while ($row = mysqli_fetch_assoc($query_run)){
		                    	#search korar jonno detail show korar jonno 2 bar form creat korbo<form action="" method="post"></form> ata dorkar lage akhane amra aia nibona karon simple table er from nibo
		                    	?>
		                    	<table>
		                    		<tr>
		                    			<td><b>Roll No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" value="<?php echo $row['roll_no'];?>"disabled>
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    			<td><b>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" value="<?php echo $row['name'];?>"disabled>
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    			<td><b>Farher Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" value="<?php echo $row['father_name'];?>"disabled>
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    			<td><b>Class:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" value="<?php echo $row['class'];?>"disabled>
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    			<td><b>Mobile:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" value="<?php echo $row['mobile'];?>"disabled>
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    			<td><b>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" value="<?php echo $row['email'];?>"disabled>
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    			<td><b>Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" value="<?php echo $row['password'];?>"disabled>
		                    			</td>
		                    		</tr>
		                    		
		                    		<tr>
		                    			<td><b>Remark&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<textarea rows="3" cols="40" disabled><?php echo $row['remark'];?></textarea>
		                    			</td>
		                    		</tr>
		                    	</table>
		                    	<?php
		                    	#edit button er kaj korbo akhane search er moto s aki
		                    }
		                }
			?>
			<?php
			    #search button er kar korbo tr code korbo
			#same if isset use kore or vitor post korbo Search Student
			    if(isset($_POST['edit_student'])){
			    	#search box lagbe tar jonno html lagbe tai php off kore dibo ata dis
			    	?>
			    	<center>
			    		<form action="" method="post">
			    			Enter Roll No:
			    			<input type="text" name="roll_no">
			    			<input type="submit" name="search_by_roll_no_for_edit" value="Search">
			    			
			    		</form>
			    	</center>
			<?php
			    }
			    	#akhane edit button er kaj korbo roll number click korar por search hobe tr kaj korbo

			    	    if(isset($_POST['search_by_roll_no_for_edit']))
			    	    {
			    	    	#ata click hole ki hobe abar database er sathe connect hoa tr por oi roll number er student  er detail fatch kora lagbe tar jonno database connictivity korbo

			    	    	#1st connection er jonno tar jonno top e akber e define kore dibo connectionjate bar bar na kora lage
			    	    	$query = "select * from students where roll_no = '$_POST[roll_no]'";
		                    $query_run = mysqli_query($connection,$query);
		    	#datbase theke query fatch er maddhome asbe array er vitore dibe .$query_run ai parameter nibe
		                    while ($row = mysqli_fetch_assoc($query_run)){
		                    	#search korar jonno detail show korar jonno 2 bar form creat korbo<form action="" method="post"></form> ata dorkar lage akhane amra aia nibona karon simple table er from nibo
		                    	?>
		                    	<form action="admin_edit_student.php" method="post">
		                    		<table>
		                    		<tr>
		                    			<td><b>Roll No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" name="roll_no" value="<?php echo $row['roll_no'];?>">
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    		<tr>
		                    			<td><b>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" name="name" value="<?php echo $row['name'];?>">
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    			<td><b>Farher Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" name="father_name" value="<?php echo $row['father_name'];?>">
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    			<td><b>Class:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" name="class" value="<?php echo $row['class'];?>">
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    			<td><b>MObile:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" name="mobile" value="<?php echo $row['mobile'];?>">
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    			<td><b>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" name="email" value="<?php echo $row['email'];?>">
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    			<td><b>Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<input type="tect" name="password" value="<?php echo $row['password'];?>">
		                    			</td>
		                    		</tr>
		                    		<tr>
		                    			<td><b>Remark&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></td>
		                    			<td>
		                    				<textarea rows="3" cols="40" name="remark" ><?php echo $row['remark'];
		                    				#edit korar por nice ?></textarea>
		                    			</td>
		                    		</tr><br><br>
		                    		<tr>
		                    			<td></td>
		                    			<td><input type="submit" name="edit" value="Save"></td>
		                    		</tr>

		                    	</table>
		                    	</form>
		                    	<?php
		                    	#edit button er kaj korbo akhane search er moto s aki

		                    	#edit korar por nice save button add korbo
		                    	#4  akhane database uptate tabler er data edit kore upddate korbo tar code korbo
		                    }
		                }
			?>
			
			<?php
                if(isset($_POST['add_new_student'])){
                	?>
                	<center><h4>File the given details:</h4></center>
                	<form action="add_student.php" method="post">
                		<table>
                			<tr>
                				<td>Roll No:</td>
                				<td>
                					<input type="text" name="roll_no" required>
                				</td>
                			</tr>
                			<tr>
                				<td>Name:</td>
                				<td>
                					<input type="text" name="name" required>
                				</td>
                			</tr>
                			<tr>
                				<td>Father Name:</td>
                				<td>
                					<input type="text" name="father_name" required>
                				</td>
                			</tr>
                			<tr>
                				<td>Class:</td>
                				<td>
                					<input type="text" name="class" required>
                				</td>
                			</tr>
                			<tr>
                				<td>Mobile:</td>
                				<td>
                					<input type="text" name="mobile" required>
                				</td>
                			</tr>
                			<tr>
                				<td>Email:</td>
                				<td>
                					<input type="text" name="email" required>
                				</td>
                			</tr>
                			<tr>
                				<td>Password:</td>
                				<td>
                					<input type="text" nam  e="password" required>
                				</td>
                			</tr>
                			
                			<tr>
                				<td>Remark:</td>
                				<td>
                					<textarea rows="3" cols="40" name="remark"></textarea>
                				</td>
                			</tr>
                			<td></td>
                			<td><input type="submit" name="add" value="Add Student"></td>
                		</table>
                	</form>
                	<?php
                }
			?>

			<?php
                if(isset($_POST['delete_student'])){
                	?>
                	<center>
                		<h4>Enter Roll No For Delete Student</h4><br>
                		<form action="delete_student.php" method="post">
                			Roll No: &nbsp;&nbsp;
                			<input type="text" name="roll_no">
                			<input type="submit" name="search_by_roll_no_for_delete" value="Delete Student">
                		</form>
                	</center>
                	<?php
                }
			?>

			<?php
			    if(isset($_POST['show_teachers'])){
			    	?>
			    	<center>
			    		<h5>Teacher's Details</h5>
			    		<table style="border-collapse: collapse; border: 1px solid black;">
			    			<tr>
			    				<td id="id"><b>ID</b></td>
			    				<td id="id"><b>Name</b></td>
			    				<td id="id"><b>Mobile</b></td>
			    				<td id="id"><b>Course</b></td>
			    				<td id="id"><b>View Detail</b></td>
			    			</tr>
			    		</table>
			    	</center>
			    	<?php
			    	    $connection = mysqli_connect("localhost","root","");
                        $db = mysqli_select_db($connection,"sms");
                        $query = "select * from teachers";
                        $query_run = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($query_run)){


                        	?>
                        	<center>
                        		<table style="border-collapse: collapse; border: 1px solid black;">

                        			<tr>
                        				<td id="td"><?php echo $row['t_id'];?></td>
                        				<td id="td"><?php echo $row['name'];?></td>

                        				<td id="td"><?php echo $row['mobile'];?></td>

                        				<td id="td"><?php echo $row['course'];?></td>

                        				<td id="td"><a href="#">View Detail</a></td>

                        			</tr>

                        		</table>

                        	</center>

                        	<?php

                        }

                    }

                    ?>
                    

		</div>
		
	</div>

</body>
</html>
