<?php include './components/header.php'; ?>

    <div class="ui container">

        <!-- Top Navigation Bar -->
        <?php include './components/top-menu.php'; ?>

        <!-- BODY Content -->
        <div class="ui centered grid">
            <h2 class="pt-4">Login Here</h2>
        </div>

        <div class="ui grid">
            <div class="six wide column centered">

                <?php
                // Clear the error message
                $error_msg = "";

                // If the user isn't logged in, try to log them in
                if (!isset($_SESSION['user_id'])) {
                    if (isset($_POST['submit'])) {

                    // Grab the user-entered log-in data
                    $user_username = mysqli_real_escape_string($conn, trim($_POST['username']));
                    $user_password = mysqli_real_escape_string($conn, trim($_POST['password']));

                    if (!empty($user_username) && !empty($user_password)) {
                        // Look up the username and password in the database
                        $query = "SELECT user_id, username FROM member WHERE username = '$user_username' AND password = SHA('$user_password')";
                        $data = mysqli_query($conn, $query);

                        if (mysqli_num_rows($data) == 1) {
                        // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
                        $row = mysqli_fetch_array($data);
                        $_SESSION['user_id'] = $row['user_id'];
                        $_SESSION['username'] = $row['username'];
                        setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                        setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                        $admin_page = './admin/index.php';
                        header('Location: ' . $admin_page);
                        }
                        else {
                        // The username/password are incorrect so set an error message
                        $error_msg = '<div class="ui warning message">Invalid Username and Password</div>';
                        }
                    }
                    else {
                        // The username/password weren't entered so set an error message
                        $error_msg = '<div class="ui warning message">Enter Username and Password</div>';
                    }
                    }
                }

                // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
                if (empty($_SESSION['user_id'])) {
                    echo '<p class="error">' . $error_msg . '</p>';
                ?>





                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="ui form">
                    <div class="field">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="User Name">
                    </div>
                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <div>Don't have Account? <a href="signup.php">Sign Up</a></div>
                    <button name="submit" class="ui primary button" type="submit">Login</button>
                </form>

                <?php
                }
                else {
                    // Confirm the successful log-in
                    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
                }
                ?>


            </div>
        </div>


    </div>
    
<?php include './components/footer.php'; ?>