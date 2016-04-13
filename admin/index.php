<?php include "includes/a_header.php";?>

        <!-- Navigation -->
<?php include "includes/a_navigation.php";?>

<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Today's Stats</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  <div id="big_stats" class="cf">
                    <div class="stat">Total Users <br/><span class="value">
                      <?php $result = mysqli_query($connection, 'SELECT * FROM users;');
echo mysqli_num_rows($result);?>
                    </span> </div>
                    <!-- .stat -->

                    <div class="stat"> Total Orders <br/><span class="value">
                      <?php $result = mysqli_query($connection, 'SELECT * FROM orders;');
echo mysqli_num_rows($result);?>
                    </span> </div>
                    <!-- .stat -->

                    <div class="stat"> Total Products <br/><span class="value">
                      <?php $result = mysqli_query($connection, 'SELECT * FROM products;');
echo mysqli_num_rows($result);?>
                    </span> </div>
                    <!-- .stat -->

                  </div>
                </div>
                <!-- /widget-content -->
              </div>
            </div>
          </div>
          <!-- /widget -->
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-bar-chart"></i>
              <h3> Customers Ranking</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <th>Rank</th>
                  <th>User</th>
                  <th>Total orders made</th>
                </thead>
                <tbody>


<?php
$result = mysqli_query($connection, 'SELECT * FROM users WHERE user_role = 3;');
while ($user_result = mysqli_fetch_assoc($result)) {
	echo '<tr><td>1</td><td>';
	echo $user_result['user_firstname'] . ' ' . $user_result['user_lastname'];
	echo '</td><td>';
	$more_result = mysqli_query($connection, "SELECT * FROM orders WHERE user_ID = {$user_result['user_ID']};");
	echo mysqli_num_rows($more_result);
	echo '</td></tr>';
}
?>
                </tbody>
              </table>
            </div>
            <!-- /widget-content -->
          </div>
          <!-- /widget -->

        </div>
        <!-- /span6 -->
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-barcode"></i>
              <h3> Products Ranking</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <canvas id="pie-chart" class="chart-holder" height="250" width="538"> </canvas>
            </div>
            <!-- /widget-content -->
          </div>
          <!-- /widget -->

          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-signal"></i>
              <h3> Earnings</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <canvas id="area-chart" class="chart-holder" width="538" height="250">
              </canvas>
            </div>
            <!-- /widget-content -->
          </div>
          <!-- /widget -->
        </div>
        <!-- /span6 -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /main-inner -->
</div>
<!-- /main -->

<?php include "includes/a_footer.php";?>