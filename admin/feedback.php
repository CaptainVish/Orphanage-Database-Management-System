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
                <h1>Feed Back</h1>
                
                <table class="ui celled table">
                    <thead>
                        <tr>
                            <th>Feed ID</th>
                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $sql = "SELECT * FROM feedback";
                            $result = $conn->query($sql);
    
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                        ?>

                        <tr>
                            <td><?php echo $row['feed_id']; ?></td>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['full_address']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['comment']; ?></td>
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