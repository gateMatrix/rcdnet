<?php //Create new user
    $id = $_GET['id'];
    $table = $_GET['table'];
    $tableid = $_GET['tableid'];

    include "../includes/connection.php";

    $sql = "UPDATE $table SET status='Approved' WHERE $tableid='$id'" ;

    if(mysqli_query($con, $sql)){
        ?>
<script type="text/javascript"> 
alert("Report Approved, Welldone!!"); 
window.history.back();
</script>
<?php

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
     
    // Close connection
    mysqli_close($con);
?>