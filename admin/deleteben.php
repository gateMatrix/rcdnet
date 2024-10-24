<?php //Create new user
    $id = $_GET['id'];

    include "../includes/connection.php";

    $sql = "DELETE FROM beneficiary WHERE benid='$id' ";

    if(mysqli_query($con, $sql)){
        ?>
<script type="text/javascript"> 
alert("Beneficiary successfully deleted"); 
window.location.href = "beneficiaries.php";
</script>
<?php 

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
     
    // Close connection
    mysqli_close($con);
?>
?>