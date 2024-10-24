<?php //Create new user
    $userid = $_GET['id'];

    include "../includes/connection.php";

    $sql = "DELETE FROM users WHERE userID='$userid' ";

    if(mysqli_query($con, $sql)){
        ?>
<script type="text/javascript"> 
alert("User successfully deleted"); 
window.location.href = "users.php";
</script>
<?php

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
     
    // Close connection
    mysqli_close($con);
?>
?>