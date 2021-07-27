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
                
                <h1>Child Gallery</h1>
                
                <div class="ui pointing menu">
                    <a class="item active" href="child-gallery-sponsored.php">
                        Sponsored Children
                    </a>
                    <a class="item" href="child-gallery-unsponsored.php">
                        Not Sponsored Children
                    </a>
                </div>

                <?php

                $sql = "SELECT cid, cname, cdob, cyoe, cclass FROM children WHERE sponsored=1";
                

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $dob = $row["cdob"];
                        $age = (date('Y') - date('Y',strtotime($dob)));
                ?>

                <div class="ui segment">
                    <div class="ui divided items">

                        <div class="item">
                            <div class="ui image">
                                <img src="img/defaultimg.png" style="width: 120px;">
                            </div>
                            <div class="content">
                                <div class="meta">
                                    <span><strong>Child Details:</strong></span>
                                </div>
                                <div class="description">
                                    <div class="ui horizontal list">

                                        <div class="item">
                                            <div class="content">
                                                <div>Name:</div> <strong><?php echo $row['cname']; ?></strong>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="content">
                                                <div>Age:</div> <strong><?php echo $age; ?></strong>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="content">
                                            <div>Class:</div> <strong><?php echo $row['cclass']; ?></strong>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="content">
                                            <div>Year of enroll:</div> <strong><?php echo $row['cyoe']; ?></strong>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="extra">
                                    <div class="meta">
                                        <span><strong>Sponsor's Details</strong></span>
                                    </div>

                                    <?php
                                        $cid = $row['cid'];
                                        $sql1 = "SELECT spn_firstname, spn_lastname, spn_email FROM sponsorer WHERE cid='$cid'";

                                        $result1 = $conn->query($sql1);

                                        if ($result1->num_rows > 0) {
                                            // output data of each row
                                            while($rows = $result1->fetch_assoc()) {
                                    ?>

                                    <div class="ui horizontal list">
                                        <div class="item">
                                            <div class="content">
                                                <div>Name:</div> <strong><?php echo $rows['spn_firstname'] . "  " . $rows['spn_lastname'] ?></strong>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="content">
                                                <div>Email ID:</div> <strong><?php echo $rows['spn_email'] ?></strong>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        }
                                        } else {
                                            echo "0 results";
                                        }
                                    ?>



                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <?php
                    }
                    } else {
                        echo "No child is sponsored";
                    }
                ?>

            </div>

            <span class="p-20"></span>
        </div>

    </div>
    
<?php include './components/footer.php'; ?>