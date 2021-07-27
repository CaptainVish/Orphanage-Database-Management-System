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
                <h1>Children - Orphan</h1>


                <table class="ui celled table">
                    <thead>
                        <tr>
                            <th>CID</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Year of enrolled</th>
                            <th>Class</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $sql = "SELECT * FROM children";
                            $result = $conn->query($sql);
    
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                $unformated = $row['cdob'];
                                $formateddate = date("d-m-Y", strtotime($unformated));
                        ?>

                        <tr>
                            <td><?php echo $row['cid']; ?></td>
                            <td><?php echo $row['cname']; ?></td>
                            <td><?php echo $formateddate; ?></td>
                            <td><?php echo $row['cyoe']; ?></td>
                            <td><?php echo $row['cclass']; ?></td>
                        </tr>
                        
                        <?php
                                }
                            }
                        ?>

                    </tbody>
                    <tfoot class="full-width">
                        <tr>
                            <th colspan="5">
                                <a class="ui primary button" href="children-add.php"> Add Children </a>
                            </th>
                        </tr>
                    </tfoot>
                </table>


                
            </div>

        </div>

    </div>
    
<?php include './admin_components/admin_footer.php' ?>