<?php
//Create new beneficiary
    $ben = $_GET['id'];

    include "../includes/connection.php";

    $sql = "UPDATE beneficiary SET donor='', donornote='' interest = 'NO' WHERE benid='$ben' ";

    if(mysqli_query($con, $sql)){
        ?>
    <script type="text/javascript"> 
    alert("Awh! Donor interest declined"); 
    window.location.href = "album.php"; 
    </script>
    <?php

        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
         
        // Close connection
        mysqli_close($con);
    ?>