<section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">


                    <form method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Select Activity</label>
                                <select class="choices form-select" name="topic">
                                        <?php
                                        include "../includes/connection.php";
                                        $sql = "SELECT * FROM activity";
                                        if($result = mysqli_query($con, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        echo '<option value='.$row['activeID'].'>' . $row['activeName'] . '</option>';
                                                }
                                                mysqli_free_result($result);
                                            } else{
                                                echo "No records found.";
                                            }
                                        }
                                        ?>
                                         
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Duration</label>
                                <input type="text" class="form-control" name="duration" placeholder="Duration">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="basicInput">Select Category</label>
                                <select class="choices form-select" name="category">
                                        <?php
                                        include "../includes/connection.php";
                                        $sql = "SELECT * FROM bencategory";
                                        if($result = mysqli_query($con, $sql)){
                                            if(mysqli_num_rows($result) > 0){
                                                while($row = mysqli_fetch_array($result)){
                                                        echo '<option value='.$row['bid'].'>' . $row['bname'] . '</option>';
                                                }
                                                mysqli_free_result($result);
                                            } else{
                                                echo "No records found.";
                                            }
                                        }
                                        ?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                <label for="basicInput"></label>
                                <input type="number" class="form-control" name="male" placeholder="Male">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label for="basicInput"></label>
                                <input type="number" class="form-control" name="female" placeholder="Female">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <label for="basicInput"></label>
                                <input type="number" class="form-control" name="under17" placeholder="Under 17">
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                
                            </div>

                             <div class="col-md-2">
                                <div class="form-group">
                                <input type="number" class="form-control" name="over18" placeholder="18-29">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input type="number" class="form-control" name="over30" placeholder="30-34">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input type="number" class="form-control" name="over35" placeholder="Above 35">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Project Objectives</label>
                                <textarea class="form-control" id="default"  name="objectives"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Relation to workplan</label>
                                <textarea class="form-control" id="default2"  name="workplan"></textarea>
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Relevant Indicators</label>
                                <textarea class="form-control" id="default3"  name="indicators"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Purpose of Activity</label>
                                <textarea class="form-control" id="default4"  name="purpose"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Summary of Activity Agenda</label>
                                <textarea class="form-control" id="default5"  name="summary"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Activity Expectations</label>
                                <textarea class="form-control" id="default6"  name="expectations"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Key Successes</label>
                                <textarea class="form-control" id="default7"  name="success"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Challenges</label>
                                <textarea class="form-control" id="default8"  name="challenges"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Outputs achieved</label>
                                <textarea class="form-control" id="default9"  name="outputs"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                <label for="basicInput">Follow Up Required</label>
                                <textarea class="form-control" id="default10"  name="followup"></textarea>
                                </div>
                            </div> 
                        </div>
                         <div class="row">
                                <div class="form-group">
                                <label for="basicInput">Record Action Points</label>
                                <textarea class="form-control" id="default11"  name="actionpoints" rows="5"></textarea>
                                </div>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" name="post" value="Submit Report">
                    </form>
                    </div> 
                </div>
            </div>
        </div>
    </section>