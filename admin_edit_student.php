<?php
# akhane database uptate tabler er data edit kore upddate korbo tar code korbo
# database connect er aki code lihbo
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "sms");
$query = "update students set name='$_POST[name]',father_name='$_POST[father_name]',class=$_POST[class],mobile='$_POST[mobile]',email='$_POST[email]',password='$_POST[password]',remark='$_POST[remark]' where roll_no = $_POST[roll_no]";
#clange korte parbena student information tai jonno roll nmber e row te roll number set kore dibo

# run kore dibe ai code  e
$query_run = mysqli_query($connection, $query);
# run korar por data update kore admin database e cole jabe tr jonno 
#window.location.herf = "admin_dashboard.php" ata javascript er function redier kore 
?>
<script type="text/javascript">
    alert("Detail Edited Successfully");
    window.location.herf = "admin_dashboard.php";
</script>