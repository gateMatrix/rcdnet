<div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Welcome <?php echo $_SESSION['name']; ?></li>
            
            <li class="sidebar-item">
                <a href="home.php" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Notice Board</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="./notice-board.php">View Posts</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="./new-post.php">New Post</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="./myposts.php">My Posts</a>
                    </li>
                </ul>
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Chat Application</span>
                </a>
            </li>
            <li
                class="sidebar-item  ">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Direct Message</span>
                </a>
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
                        <a href="./new-project.php">New Project</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="./projects.php">All Projects</a>
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
                        <a href="./projects.php">All Beneficiaries</a>
                    </li>
                </ul>
            </li>
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-file-earmark-medical-fill"></i>
                    <span>Project Reports</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="#">New Report</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="#">My Reports</a>
                    </li>
                </ul>
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