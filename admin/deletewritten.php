<?php //Create new user
    $repid = $_GET['id'];

    include "../includes/connection.php";

    $sql = "DELETE FROM writtenrep WHERE repID='$repid' ";

    if(mysqli_query($con, $sql)){
        ?>
<script type="text/javascript"> 
alert("Document successfully deleted"); 
window.location.href = "tempreps.php";
</script>
<?php

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
     
    // Close connection
    mysqli_close($con);
?>
?>