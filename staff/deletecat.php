<?php //Create new user
    $id = $_GET['id'];

    include "../includes/connection.php";

    $sql = "DELETE FROM bencategory WHERE bid='$id' ";

    if(mysqli_query($con, $sql)){
        ?>
<script type="text/javascript"> 
alert("Category successfully deleted"); 
window.location.href = "bencategory.php";
</script>
<?php 

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
     
    // Close connection
    mysqli_close($con);
?>
?>