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
    </div>

    <section class="section">  
        <div class="card">
            <div class="card-body">
                <div class="report-wrapper">
                    <h3 style="text-align: center; margin-top: 20px; font-size: 2em;">Rwenzori Community Development<br> Network</h3>
                    <?php
                    $myid = $_SESSION['userid'];
                    $reportid  = $_GET['id'];
 

                    $sql = "SELECT * FROM report INNER JOIN users ON report.manager=users.userID WHERE reportid = '$reportid' "; 
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);  
                    echo '<p class="protitle">'.'Activity Report for '. $row['topic'].' </p>';
                    echo '<p style="text-align: center;">'.'Date: '. $row['date'].' </p>';

                    echo "<table class='table table-striped'>";

                    echo "<tr>"; 
                    echo "<td>"."<strong>Project Objective/Intermediate</strong>"."</td>";
                    echo "<td>". $row['objectives']."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>"."<strong>Relation to Workplan</strong>"."</td>";
                    echo "<td>". $row['workplan']."</td>";
                    echo "</tr>";
                     echo "<tr>";
                    echo "<td>"."<strong>Relevant Indicators</strong>"."</td>";
                    echo "<td>". $row['indicators']."</td>";
                    echo "</tr>";
                     echo "<tr>";
                    echo "<td>"."<strong>Purpose of Activity</strong>"."</td>";
                    echo "<td>". $row['purpose']."</td>";
                    echo "</tr>";
                     echo "<tr>";
                    echo "<td>"."<strong>Summary of Activity Agenda</strong>"."</td>";
                    echo "<td>". $row['summary']."</td>";
                    echo "</tr>";
                     echo "<tr>";
                    echo "<td>"."<strong>Key Successes</strong>"."</td>";
                    echo "<td>". $row['success']."</td>";
                    echo "</tr>";
                     echo "<tr>";
                    echo "<td>"."<strong>Challenges Encountered</strong>"."</td>";
                    echo "<td>". $row['challenges']."</td>";
                    echo "</tr>";
                     echo "<tr>";
                    echo "<td>"."<strong>Outputs Achieved</strong>"."</td>";
                    echo "<td>". $row['outputs']."</td>";
                    echo "</tr>";
                     echo "<tr>";
                    echo "<td>"."<strong>Follow Up Required</strong>"."</td>";
                    echo "<td>". $row['followup']."</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "<div class='actionpoints'>"."<p style='font-weight: 600; text-decoration: underline;'>Action Points</p>"."<p>". $row['actionpoints']."<p>"."</div>";
                    echo "<p> Prepared By ". $row['fullname']."</p>";
                    ?>
                </div>
            </div>
        </div>

    </section>
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
<?php include "includes/scripts.php"; ?>
</body>
<script>
    // Simple Datatable
    let table5 = document.querySelector('#table5');
    let dataTable = new simpleDatatables.DataTable(table5);
</script>
<script>
    function DeleteConfirm() {
      return confirm("Are you sure to delete this beneficiary");
     }
 </script>
</html>
