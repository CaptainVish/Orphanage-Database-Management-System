<?php include './components/header.php'; ?>

    <div class="ui container">

        <!-- Top Navigation Bar -->
        <?php include './components/top-menu.php'; ?>

        <!-- BODY Content -->
        <div class="ui centered grid">
            <h2 class="pt-4">Sign Up Here</h2>
        </div>

        <div class="ui grid">
            <div class="six wide column centered">

                <?php

                    if (isset($_POST['submit'])) {
                        // Grab the profile data from the POST
                        $username = mysqli_real_escape_string($conn, trim($_POST['username']));
                        $password1 = mysqli_real_escape_string($conn, trim($_POST['password1']));
                        $password2 = mysqli_real_escape_string($conn, trim($_POST['password2']));

                        if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
                        // Make sure someone isn't already registered using this username
                        $query = "SELECT * FROM member WHERE username = '$username'";
                        $data = mysqli_query($conn, $query);
                        if (mysqli_num_rows($data) == 0) {
                            // The username is unique, so insert the data into the database
                            $query = "INSERT INTO member (username, password, join_date) VALUES ('$username', SHA('$password1'), NOW())";
                            mysqli_query($conn, $query);

                            // Confirm success with the user
                            echo '<div class="ui positive message">New account successfully created. Now ready to <a href="login.php">log in</a>.</div>';

                            mysqli_close($conn);
                            exit();
                        }
                        else {
                            // An account already exists for this username, so display an error message
                            echo '<div class="ui warning message">An account already exists for this username.</div>';
                            $username = "";
                        }
                        }
                        else {
                        echo '<div class="ui warning message">Enter all sign-up data, including the desired password twice.</div>';
                        }
                    }

                ?>



                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="ui form">
                    <div class="field">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="User Name">
                    </div>
                    <div class="field">
                        <label for="password1">Password</label>
                        <input type="password" name="password1" id="password1" placeholder="Password">
                    </div>
                    <div class="field">
                        <label for="password2">Password - Retype</label>
                        <input type="password" name="password2" id="password2" placeholder="Retype Password">
                    </div>
                    <div>Already have Account? <a href="login.php">Login</a></div>
                    <button name="submit" class="ui primary button" type="submit">Sign up</button>
                </form>






            </div>
        </div>


    </div>
    
<?php include './components/footer.php'; ?>