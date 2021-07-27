        <!-- Top Navigation Bar -->
        <div class="ui black inverted menu">
            <div class="header item">
                Orphan Foundation Development
            </div>
            <a class="item" href="index.php">Home</a>
            <div class="right menu">

                <?php
                    if (empty($_SESSION['user_id'])) { 
                ?>
                        <a href="login.php" class="item <?php echo ($_SERVER['PHP_SELF'] == "/orphan/login.php" ? "active" : "");?>">Login</a>
                <?php
                    } else { 
                ?>
                        <a href="admin/index.php" class="item">Admin Panel</a>
                        <a href="logout.php" class="item">Logout</a>
                <?php
                    } 
                ?>

            </div>
        </div>