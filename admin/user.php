<?php include "includes/a_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/a_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            User Management
                            <small>Control user's priviledges</small>
                        </h1>
                    </div>
                    
                    <div class="col-lg-12">
                        <h3 class="page-header">Category Table</h3>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="success">
                                        <th>ID</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Phone number</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
    <!-- Print users from db -->
<?php
    $query = "SELECT * FROM users ORDER BY user_ID ASC;";
    $user_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($user_query)){
        echo "<tr>";
        echo "<td>{$row['user_ID']}</td>";
        echo "<td contenteditable='true' onBlur=".'"'."saveUserChanges(this, 'user_firstname', '{$row['user_ID']}')".';"'.">{$row['user_firstname']}</td>";
        echo "<td contenteditable='true' onBlur=".'"'."saveUserChanges(this, 'user_lastname', '{$row['user_ID']}')".';"'.">{$row['user_lastname']}</td>";
        echo "<td contenteditable='true' onBlur=".'"'."saveUserChanges(this, 'user_phone_no', '{$row['user_ID']}')".';"'.">{$row['user_phone_no']}</td>";
        echo "<td contenteditable='true' onBlur=".'"'."saveUserChanges(this, 'user_email', '{$row['user_ID']}')".';"'.">{$row['user_email']}</td>";
        echo "<td contenteditable='true' onBlur=".'"'."saveUserChanges(this, 'user_role', '{$row['user_ID']}')".';"'.">{$row['user_role']}</td>";
        echo "</tr>";
    }
?>
                                </tbody>
                            </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<script type="text/javascript">
    function saveUserChanges(editableObj, column, id) {
        $(editableObj).css('background', '#FFF url(../images/ajax-loader.gif) no-repeat right');
        $.ajax({
            url: 'functions/saveUserEdit.php',
            type: 'POST',
            data: 'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
            success: function(data){
                $(editableObj).css('background','#FDFDFD');
            }
        });
    }
</script>
<?php include "includes/a_footer.php"; ?>