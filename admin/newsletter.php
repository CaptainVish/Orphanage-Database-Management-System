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
                <h1>Newsletter</h1>

                <?php

                    if(isset($_POST['submit_newsletter'])) {
                        $issue = $_POST['issue'];
                        $story = $_POST['story'];
                        $month = $_POST['month'];

                        $sql = "INSERT INTO newsletter (n_issue, n_story, n_month) 
                                VALUES ('$issue', '$story', '$month')";

                        if ($conn->query($sql) === TRUE) {
                                echo "<script> alert('Newsletter successfully submitted'); </script>";
                        } else {
                            echo "<script> alert('Error in Insertion'); </script>";
                        }
                        $conn->close();

                    }

                ?>


                <form action="<?php $_PHP_SELF ?>" method="post" class="ui form">
                    <div class="seven wide field">
                        <label>Issue</label>
                        <input type="text" name="issue">
                    </div>
                    <div class="field">
                        <label>Story</label>
                        <textarea name="story" rows="2"></textarea>
                    </div>
                    <div class="field">
                        <label>Month</label>
                        <select name="month" class="ui search dropdown">
                            <option value="" disabled selected>Month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                    <button name="submit_newsletter" type="submit" class="ui primary button">Submit</button>
                    <button type="reset" class="ui button">Reset</button>
                </form>

            </div>
        </div>

    </div>
    
<?php include './admin_components/admin_footer.php' ?>