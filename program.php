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
                <h1>Programs</h1>
                <!-- <p><strong>CCDF</strong> is a non-profit, non-government and voluntary organization committed to the care & development and voluntary organization committed to the care and development of the underprivileged children.</p>
                <p><strong>CCDF is a group</strong> of quanlified, hardworking, dedicated, like-minded people trying to make a difference in the life of the underrepresented, disadvantaged and marginalized sections of the society. It have been established to work as a platform to channelize and make optimum use of the resources and infrastructure available and people's desire to give back to society a bit of what they owe to it.</p>
                <p><strong>It is out effort</strong> at CCDF to guide and motivate people to use their resources in a construction in changing the lives of these street children.</p>                <p><strong>We are working</strong> in the field of education and over all development of the destitute children by providing then with an opportunity to realize their full potentials and lead a dignified and respectable life.</p> -->

                <ol>
                    <?php

                        $sql = "SELECT * FROM programs";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                    ?>
                    
                    <li><?php echo $row['program_title'] ?></li>
                    <p><?php echo $row['program_desc'] ?></p>

                    <?php
                            }
                        }
                    ?>
                    
                </ol>

                <span class="p-20"></span>
            </div>
        </div>

    </div>
    
<?php include './components/footer.php'; ?>