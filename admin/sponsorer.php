<?php include './admin_components/admin_header.php' ?>

    <div class="ui container">

        <!-- Top Navigation Bar -->
        <?php include './admin_components/admin_top-menu.php' ?>

        <!-- BODY Content -->
        <div class="ui grid">
            <!-- Left menu -->
            <?php include './admin_components/admin_side-menu.php' ?>

            <!-- right content -->
            <div class="twelve wide column">
                <h1>Sponsorers</h1>

                <?php
                    if(isset($_GET['del']) && $_GET['cid']) {
                        $spn_id = $_GET['del'];
                        $cid = $_GET['cid'];

                        $sql = "DELETE FROM sponsorer WHERE spn_id = $spn_id";
                        $del_result = mysqli_query($conn, $sql);

                        $sql2 = "UPDATE children SET sponsored=0 WHERE cid='$cid' ";
                        $update_result = mysqli_query($conn, $sql2);

                    }
                    
                ?>

                <table class="ui celled table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Sponsored Date</th>
                            <th>No of years</th>
                            <th>Email</th>
                            <th>Amount</th>
                            <th>Check No.</th>
                            <th>Children ID</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $sql = "SELECT * FROM sponsorer";
                            $result = $conn->query($sql);
    
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                $unformated = $row['spnd_date'];
                                $formateddate = date("d-m-Y", strtotime($unformated));
                        ?>

                        <tr>
                            <td><?php echo $row['spn_firstname']; ?></td>
                            <td><?php echo $formateddate; ?></td>
                            <td><?php echo $row['spn_noofyears']; ?></td>
                            <td><?php echo $row['spn_email']; ?></td>
                            <td><?php echo $row['spn_amount']; ?></td>
                            <td><?php echo $row['spn_checkno']; ?></td>
                            <td><?php echo $row['cid']; ?></td>
                            <td>
                                <a 
                                    onclick="return confirm('Are you sure you want to delete this post and all its comments?');" 
                                    class="ui red button"
                                    href="sponsorer.php?del=<?php echo $row['spn_id']; ?>&cid=<?php echo $row['cid']; ?>">
                                    Delete
                                </a>
                            </td>
                        </tr>

                        <?php
                                }
                            }
                        ?>

                    </tbody>
                </table>

            </div>
        </div>

    </div>
    
<?php include './admin_components/admin_footer.php' ?>