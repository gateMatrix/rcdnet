<?php include "includes/head.php"; ?>

    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="index.html"><img src="../assets/images/logo/rcdnetlogo.png" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>

    <?php 
    include "includes/sidebarmenu.php";
    ?>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
              
<div class="page-content">
    <section class="row">
    <div class="page-heading">
    <div class="page-title">
        <div class="row" style="padding-bottom: 10px">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Mail Groups</h3>
            </div>
        </div>
    </div>

       <!-- Hoverable rows start -->
<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-5">
            <button style="margin-bottom: 10px;" type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#NewGroup">
                            New Group
                        </button>
            <div class="card">
                <div class="card-content">
                    <br>
                    <!-- table hover -->
                    <div class="table-responsive" style="padding-right: 20px; padding-left: 20px;">
<?php
include "../includes/connection.php";

$sql = "SELECT * FROM mailgroup"; 
if($result = mysqli_query($con, $sql)){ 
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-striped' id='table5'>";
            echo "<thead>";
             echo "<tr>";
                echo "<th>Group Name</th>";
                echo "<th></th>";
            echo "</tr>";
            echo "</thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . "<a href='#?id=".$row['groupid']."' class='badge bg-success'>Edit</a>
                               <a onclick='return DeleteConfirm()' href='#?id=".$row['groupid']."' class='badge bg-danger' >Trash</a>
                ". "</td>";
            echo "</tr>"; 
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
                        </div>
                    </div>
                </div>
            </div> 


<div class="col-7">
    <button style="margin-bottom: 10px;" type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModalCenter">
                            New Group Member
                        </button>
    <div class="card">
        <div class="card-content">
            <br>
            <!-- table hover -->
            <div class="table-responsive" style="padding-right: 20px; padding-left: 20px;">
<?php
include "../includes/connection.php";

$sql = "SELECT * FROM mailmember INNER JOIN mailgroup on mailmember.groupname=mailgroup.groupid INNER JOIN users ON mailmember.member=users.userID"; 
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table class='table table-striped' id='table5'>";
            echo "<thead>";
             echo "<tr>";
                echo "<th>Group Name</th>";
                echo "<th>Member</th>";
                echo "<th></th>";
            echo "</tr>";
            echo "</thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>" . "
                <a onclick='return DeleteConfirm()' href='#?id=".$row['mmid']."' class='badge bg-danger' >Revoke</a>
                ". "</td>";
            echo "</tr>"; 
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>
                        </div>
                    </div>
                </div>
            </div> 


        </div>
    </section>
    <!-- Hoverable rows end -->
</div>
    </section>
</div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>Created by <a href="http://julybrands.co.ug">JulyBrands Digital</a></p>
            </div>
        </div>
    </footer>
</div>
    </div>

<!-- Modals -->
<!-- New Group -->
<div class="modal fade" id="NewGroup" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">New Mail Group
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST">
            <div class="form-group">
            <label for="basicInput">Group Name</label>
            <input type="text" class="form-control" name="gname" placeholder="Enter group name">
            </div>
            <input type="submit" class="btn btn-primary" name="grouppost" value="Add Now">
        </form>

        </div>
    </div>
</div>
</div>

<!-- New Group Member -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Assign Member
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <div class="modal-body">
        <form method="POST"> 
                            <div class="form-group">
                            <label for="basicInput">Select Group</label>
                            <select class="choices form-select" name="groupname">
                                <?php
                                $sql = "SELECT * FROM mailgroup";
                                if($result = mysqli_query($con, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                                echo '<option value='.$row['groupid'].'>' . $row['name'] . '</option>';
                                        }
                                        mysqli_free_result($result);
                                    } else{
                                        echo "No records found.";
                                    }
                                }
                                ?> 
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="basicInput">Select Member</label>
                            <select class="choices form-select" name="member">
                                <?php
                                include "../includes/connection.php";
                                $sql = "SELECT * FROM users WHERE role!='donor'";
                                if($result = mysqli_query($con, $sql)){
                                    if(mysqli_num_rows($result) > 0){
                                        while($row = mysqli_fetch_array($result)){
                                                echo '<option value='.$row['userID'].'>' . $row['fullname'] . '</option>';
                                        }
                                        mysqli_free_result($result);
                                    } else{
                                        echo "No records found.";
                                    }
                                }
                                ?> 
                            </select>
                        </div>
            <input type="submit" class="btn btn-primary" name="assignmember" value="Assign Member">
        </form>

        </div>
    </div>
</div>
</div>


<?php include "includes/scripts.php"; ?>
</body>
<script type="text/javascript">
    $('#exampleModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

<script>
    // Simple Datatable
    let table5 = document.querySelector('#table5');
    let dataTable = new simpleDatatables.DataTable(table5);
</script>

<script type="text/javascript">
    function DeleteConfirm() {
      return confirm("Are you sure to delete this project");
     }
 </script>
</html>

<?php
//Create new group
if (isset($_POST['grouppost'])){
$name = $_POST['gname'];

include "../includes/connection.php";

$sql = "INSERT INTO mailgroup (name)
VALUES ('$name')";

if(mysqli_query($con, $sql)){
    ?>
<script type="text/javascript"> 
alert("Group successfully created"); 
window.location.href = "groups.php";
</script>
<?php
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    // Close connection
    mysqli_close($con);
}else{
   echo "<p class='text-subtitle text-muted'>".""."</p>";
}
?>


<?php
//Assign member to a group
if (isset($_POST['assignmember'])){
$name = $_POST['member'];
$group = $_POST['groupname'];

include "../includes/connection.php";

$sql = "INSERT INTO mailmember (member, groupname)
VALUES ('$name', '$group')";

if(mysqli_query($con, $sql)){
    ?>
<script type="text/javascript"> 
alert("Group successfully created"); 
window.location.href = "groups.php";
</script>
<?php
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    // Close connection
    mysqli_close($con);
}else{
   echo "<p class='text-subtitle text-muted'>".""."</p>";
}
?>

