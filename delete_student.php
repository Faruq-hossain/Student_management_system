<script type="text/javascript">
    if (confirm("Do You Want To Delete This Student Data ?")) {
        document.write("<?php
                        $connection = mysqli_connect("localhost", "root", "");
                        $db = mysqli_select_db($connection, "sms");
                        $query = "delete form students where roll_no = $_POST[roll_no]";
                        $query_run = mysqli_query($connection, $query);
                        ?>");

        window.location.herf = "admin_dashboard.php";
    } else {
        window.location.herf = "admin_dashboard.php";
    }
</script>