<?php //Create new user
    $id = $_GET['id'];
    $table = $_GET['table'];
    $tableid = $_GET['tableid'];
    $url = $_GET['url'];

    include "../includes/connection.php";

    $sql = "DELETE FROM $table WHERE $tableid='$id' ";

    if(mysqli_query($con, $sql)){
        ?>
<script type="text/javascript"> 
alert("Beneficiary successfully deleted"); 
window.history.back();

</script>
<?php 

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
     
    // Close connection
    mysqli_close($con);
?>
