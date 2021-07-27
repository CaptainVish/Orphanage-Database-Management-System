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
                <h1>Create New Programme Details</h1>

                <?php
                    if(isset($_POST['submit_program'])) {
                        $title = $_POST['title'];
                        $desc = $_POST['desc'];

                        $sql = "INSERT INTO programs (program_title, program_desc) VALUES ('$title', '$desc')";
                    

                        if ($conn->query($sql) === TRUE) {
                                echo "<script> alert('New Program created successfully'); </script>";
                        } else {
                            echo "<script> alert('Error in Insertion'); </script>";
                        }
                        $conn->close();

                    }
                ?>
                
                <form action="<?php $_PHP_SELF ?>" method="post" class="ui form">

                    <div class="field">
                        <label>Title</label>
                        <div class="eight wide field">
                            <input type="text" name="title" placeholder="Program Title">
                        </div>
                    </div>

                    <div class="field">
                        <label>Desciption</label>
                        <textarea type="text" name="desc" rows="2"></textarea>
                    </div>

                    <button name="submit_program" type="submit" class="ui primary button">Submit</button>
                    <button type="reset" class="ui button">Reset</button>

                </form>

            </div>
            <span class="p-20"></span>
        </div>

    </div>
    
<?php include './admin_components/admin_footer.php' ?>