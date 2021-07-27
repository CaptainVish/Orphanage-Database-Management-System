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
                <h1>Child Registration Form</h1>


                <?php

                    if(isset($_POST['submit_child'])) {
                        $child_name = $_POST['child_name'];
                        $child_dob = $_POST['child_dob'];
                        $child_yoe = $_POST['child_yoe'];
                        $child_class = $_POST['child_class'];
                        $child_story_behind = $_POST['child_story_behind'];
                        $child_pic = $_POST['child_pic'];

                        $sql = "INSERT INTO children (cname, cdob, cyoe, cclass, cstory, cphoto) VALUES ('$child_name', '$child_dob', '$child_yoe', '$child_class', '$child_story_behind', '$child_pic')";

                        if ($conn->query($sql) === TRUE) {
                            echo "<script> alert('New record created successfully'); </script>";
                        } else {
                            echo "<script> alert('Error in Insertion'); </script>";
                        }
                        
                        $conn->close();

                    }

                ?>

                
                <form action="<?php $_PHP_SELF ?>" method="post" class="ui form">
                    <div class="seven wide field">
                        <label>Child Name</label>
                        <input type="text" name="child_name" placeholder="Child's Name" required>
                    </div>
                    <div class="seven wide field">
                        <label>Date of Birth</label>
                        <input type="date" name="child_dob" required>
                    </div>
                    <div class="seven wide field">
                        <label>Year of Enroll</label>
                        <input type="number" min="1900" max="2200" name="child_yoe" required>
                    </div>
                    <div class="seven wide field">
                        <label>Class / Grade</label>
                        <input type="number" min="1" max="12" name="child_class" required>
                    </div>
                    <div class="field">
                        <label>Story Behind</label>
                        <textarea name="child_story_behind" rows="2" required></textarea>
                    </div>
                    <div class="field">
                        <label>Upload Child Image</label>
                        <input type="file" name="child_pic" accept="image/*">
                    </div>
                    <button name="submit_child" type="submit" class="ui primary button">Submit</button>
                    <button type="reset" class="ui button">Reset</button>
                </form>

                
            </div>

        </div>

    </div>
    
<?php include './admin_components/admin_footer.php' ?>