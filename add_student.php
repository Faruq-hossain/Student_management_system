<?php
    # akhane database uptate tabler er data edit kore upddate korbo tar code korbo
    # database connect er aki code lihbo
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"sms");
    $query = "insert into students values('',$_POST[roll_no],'$_POST[name]','$_POST[father_name]',$_POST[class],'$_POST[mobile]','$_POST[email]','$_POST[password]','$_POST[remark]')";
    #clange korte parbena student information tai jonno roll nmber e row te roll number set kore dibo
    #echo $query query dekha
    # run kore dibe ai code  e
    $query_run = mysqli_query($connection,$query);
    # run korar por data update kore admin database e cole jabe tr jonno 
    #window.location.herf = "admin_dashboard.php" ata javascript er function redier kore 
?>
<script type="text/javascript">
	alert("Student Added Successfully");
	window.location.herf = "admin_dashboard.php";
</script>

