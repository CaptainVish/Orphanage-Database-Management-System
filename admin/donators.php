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
                <h1>Donators</h1>
                

                <table class="ui celled table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Program Name</th>
                            <th>Amount</th>
                            <th>Check No.</th>
                            <th>Bank Name</th>
                            <th>Place</th>
                            <th>Donator's Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $sql = "SELECT * FROM donation";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {

                        ?>
                        <tr>
                            <td data-label="ID"><?php echo $row['d_id']; ?></td>
                            <td data-label="Program"><?php echo $row['program']; ?></td>
                            <td data-label="Amount"><?php echo $row['amount']; ?></td>
                            <td data-label="Check No."><?php echo $row['checkno']; ?></td>
                            <td data-label="Bank Name"><?php echo $row['bank_name']; ?></td>
                            <td data-label="Place"><?php echo $row['place']; ?></td>
                            <td data-label="Donator's Name"><?php echo $row['d_name']; ?></td>
                            <td data-label="Email"><?php echo $row['email']; ?></td>
                            <td data-label="Phone"><?php echo $row['phone']; ?></td>
                            <td data-label="Address"><?php echo $row['d_address']; ?></td>
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