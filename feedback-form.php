<?php include './components/header.php'; ?>

    <div class="ui container">

        <!-- Top Navigation Bar -->
        <?php include './components/top-menu.php'; ?>

        <!-- BODY Content -->
        <div class="ui grid">
            <!-- Left menu -->
            <?php include './components/side-menu.php'; ?>
            
            <!-- right content -->
            <div class="twelve wide column">
                <h1>Feed Back</h1>


                <?php
                    if(isset($_POST['submit_feedback'])) {
                        $name = $_POST['full_name'];
                        $address = $_POST['full_address'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $comment = $_POST['comment'];

                        $sql = "INSERT INTO feedback (full_name, full_address, phone, email, comment) 
                                VALUES ('$name', '$address', '$phone', '$email', '$comment')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<script> alert('Feedback successfully sent'); </script>";
                        } else {
                            echo "<script> alert('Error in Insertion'); </script>";
                        }
                        
                        $conn->close();


                    }

                ?>


                <form action="<?php $_PHP_SELF ?>" method="post" class="ui form">
                    <div class="field">
                        <label>Name</label>
                        <input type="text" name="full_name" placeholder="Full Name" required>
                    </div>
                    <div class="field">
                        <label>Address</label>
                        <div class="field">
                          <div class="sixteen wide field">
                            <input type="text" name="full_address" placeholder="Address" required>
                          </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Phone No.</label>
                        <div class="field">
                          <div class="eight wide field">
                            <input type="tel" name="phone" placeholder="Phone / Mobile" required>
                          </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Email Address</label>
                        <div class="field">
                          <div class="eight wide field">
                            <input type="email" name="email" placeholder="Email ID" required>
                          </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Comments</label>
                        <textarea rows="2" name="comment" required></textarea>
                    </div>
                    <button name="submit_feedback" class="ui primary button" type="submit">Submit</button>
                    <button class="ui button" type="reset">Reset</button>
                </form>

                <span class="p-20"></span>

            </div>
        </div>

    </div>
    
<?php include './components/footer.php'; ?>