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
                <h1>Send a Gift</h1>

                <?php
                    if(isset($_POST['submit_gift'])) {
                        $cid = $_GET['cid'];
                        $gift_type = $_POST['gift_type'];
                        $sending_date = $_POST['sending_date'];
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        // echo $cid . $gift_type . $sending_date . $name . $email . $phone . $address
                        $sql = "INSERT INTO gift (cid, gift_type, sending_date, sender_name, email, phone, sender_address) 
                                    VALUES ('$cid', '$gift_type', '$sending_date', '$name', '$email', '$phone', '$address')";

                        if ($conn->query($sql) === TRUE) {
                            $unsponsored_page = './child-gallery-unsponsored.php';
                            header('Location: ' . $unsponsored_page);
                            echo "<script> alert('New record created successfully'); </script>";
                        } else {
                            echo "<script> alert('Error in Insertion'); </script>";
                        }
                        
                        $conn->close();

                    }

                ?>

                <form action="<?php $_PHP_SELF ?>" method="post" class="ui form">
                    <h4 class="ui dividing header">Child's Details</h4>
                    <?php
                        if(isset($_GET['cid'])) {
                            $cid = $_GET['cid'];
                        }
                        $sql = "SELECT cid, cname, cdob, cyoe, cclass FROM children WHERE cid='$cid' ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $dob = $row["cdob"];
                                $age = (date('Y') - date('Y',strtotime($dob)));
                    ?>

                    <div class="description">
                        <div class="ui horizontal list">
                            <div class="item">
                                <div class="content">
                                    <div>Name:</div> <strong><?php echo $row["cname"]; ?></strong> 
                                </div>
                            </div>
                            <div class="item">
                                <div class="content">
                                    <div>Age:</div> <strong><?php echo $age; ?></strong>
                                </div>
                            </div>
                            <div class="item">
                                <div class="content">
                                <div>Class:</div> <strong><?php echo $row["cclass"]; ?></strong>
                                </div>
                            </div>
                            <div class="item">
                                <div class="content">
                                <div>Year of enroll:</div> <strong><?php echo $row["cyoe"]; ?></strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                            }
                        } else {
                            echo "0 results";
                        }
                    ?>
                    <br>
                    <div class="field">
                        <label>Type of Gift</label>
                        <input type="text" name="gift_type" placeholder="Eg. Dress, Toy,.." required>
                    </div>

                    <div class="field">
                        <label>Sending Date</label>
                        <input type="date" name="sending_date" required>
                    </div>

                    <h4 class="ui dividing header">Personal Information</h4>
                    <div class="field">
                        <label>Full Name</label>
                        <input type="text" name="name" placeholder="Full Name" required>
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="field">
                        <label>Phone no.</label>
                        <input type="tel" name="phone" placeholder="Phone / Mobile" required>
                    </div>
                    <div class="field">
                        <label>Address</label>
                        <input type="text" name="address" placeholder="Address" required>
                    </div>
                    <button name="submit_gift" class="ui primary button" type="submit">Submit</button>
                    <button class="ui button" type="reset">Reset</button>

                    
                    </div>
                </form>

                <span class="p-20"></span>
            </div>
        </div>

    </div>
    
<?php include './components/footer.php'; ?>