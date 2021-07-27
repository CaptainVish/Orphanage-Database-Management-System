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
                <h1>Create Member Type</h1>
                <form class="ui form">
                    <div class="fields">
                        <div class="four wide field">
                            <label>Member Type ID</label>
                            <input type="number" placeholder="member type id">
                        </div>
                        <div class="twelve wide field">
                            <label>Member Type Name</label>
                            <input type="text" placeholder="Member Type Name">
                        </div>
                    </div>
                    <div class="field">
                        <label>Description</label>
                        <textarea rows="2"></textarea>
                    </div>
                    <button type="submit" class="ui primary button">Submit</button>
                </form>
            </div>
        </div>

    </div>
    
<?php include './admin_components/admin_footer.php' ?>