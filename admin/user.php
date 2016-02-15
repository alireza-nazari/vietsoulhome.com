<?php include "includes/a_header.php"; ?>

        <!-- Navigation -->
<?php include "includes/a_navigation.php"; ?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="span12">
        <h1 class="page-header">
          User Management
          <small>Control user's priviledges</small>
        </h1>
      </div>
      <div class="span12">
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

        // Query to output options for user_role
        $query = "SELECT * FROM user_roles WHERE user_role_ID = {$row['user_role']};";
        $user_role_query = mysqli_query($connection, $query);
        $find_user_role = mysqli_fetch_assoc($user_role_query);
        echo '<td><div class="dropup"><button class="btn btn-default dropdown-toggle" type="button" id="user_role" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'.$find_user_role['user_role'].' <span class="caret"></span></button>';
        echo '<ul class="dropdown-menu" aria-labelledby="user_role">';
        $query = "SELECT * FROM user_roles;";
        $user_role_query = mysqli_query($connection, $query);
        while ($row_dropdown = mysqli_fetch_assoc($user_role_query)){
            echo "<li><a href='functions/changeUserRole.php?user_ID={$row['user_ID']}&role_ID={$row_dropdown['user_role_ID']}'>{$row_dropdown['user_role']}</li>";
        }
        echo "</ul></div></td>";        
        echo "</tr>";
    }
?>
          </tbody>
        </table>
      </div>
    </div> <!-- /.container -->
  </div> <!-- /. main-inner -->
</div>

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