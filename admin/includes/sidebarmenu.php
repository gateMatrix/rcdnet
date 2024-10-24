        <ul class="menu">
            <li style="padding-bottom: -20px !important;" class="sidebar-title">Welcome <?php echo $_SESSION['name']; ?></li>
            
            <li
                class="sidebar-item">
                <a href="home.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li
                class="sidebar-item  ">
                <a href="./notice-board.php" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Notice Board</span>
                </a>
            </li>

            
           <!--  <li
                class="sidebar-item  ">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Chat Application</span>
                </a>
            </li> -->
            <!-- <li
                class="sidebar-item  ">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Direct Message</span>
                </a>
            </li> -->

            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Email</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="compose.php">Compose</a> 
                    </li>
                     <li class="submenu-item ">
                        <a href="group.php">Group Mail</a> 
                    </li>
                    <li class="submenu-item ">
                        <a href="inbox.php">Inbox</a>
                    </li> 
                    <li class="submenu-item ">
                        <a href="sent.php">Sent</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="groups.php">Groups</a>
                    </li> 
                </ul>
            </li>
            <li class="sidebar-title">Projects &amp; Reports</li>
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Projects</span> 
                </a> 
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="./activities.php">Activities</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="./projects.php">All Projects</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="./assignments.php">Projects Assignments</a>
                    </li>
                    
                </ul>
            </li>
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Reporting</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="newreport.php">Activity Report</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="management.php">Management Report</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="upreports.php">Report Upload</a>
                    </li> 
                    <li class="submenu-item ">
                        <a href="reports.php">All Reports</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="myreports.php">My Reports</a>
                    </li>
                </ul>
            </li>
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Beneficiaries</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="./beneficiaries.php">Beneficiaries</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="./bencategory.php">Categories</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="./occupation.php">Occupations</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="./parent.php">Parents</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="./students.php">Students</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="./interests.php">Sponsorship Interests</a>
                    </li>
                </ul>
            </li> 
            <li
                class="sidebar-item ">
                <a href="reports.php" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Reports</span>
                </a>
            </li>
             
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Users</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="./newuser.php">New User</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="./users.php">Manage Users</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="./donors.php">Donors</a>
                    </li>
                </ul>
            </li>

            <li
                class="sidebar-item active ">
                <a href="logout.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>