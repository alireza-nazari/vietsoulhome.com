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
              <table class="table table-striped table-bordered tablesorter" id="customerRank">
                <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Total orders made</th>
                  <th>Ranking by Order</th>
                </thead>
                <tbody>


<?php
$arrayRanking = array();
$query = 'SELECT * FROM users WHERE user_role = 3;';
$result = mysqli_query($connection, $query);
while ($user_result = mysqli_fetch_assoc($result)) {
	$more_result = mysqli_query($connection, "SELECT * FROM orders WHERE user_ID = {$user_result['user_ID']};");
	$totalContribution = 0;
	$payment =
	$totalOrderMade = mysqli_num_rows($more_result);
	array_push($arrayRanking, array('id' => $user_result['user_ID'], 'orderMade' => $totalOrderMade));
}
$orderedRanking = $arrayRanking;
rsort($orderedRanking);
$i = 0;
foreach ($arrayRanking as $key => $value) {
	foreach ($orderedRanking as $ordered_key => $ordered_value) {
		if ($value === $ordered_value) {
			$key = $ordered_key;
			break;
		}
	}
	array_splice($arrayRanking, $i - 1, 1, array(array('id' => $value['id'], 'orderMade' => $value['orderMade'], 'orderRank' => ((int) $key + 1))));
	$i++;
}
unset($orderedRanking);
foreach ($arrayRanking as $key => $value) {
	echo '<tr><td>' . $value['id'] . '</td><td>';
	$user_result = mysqli_query($connection, "SELECT * FROM users WHERE user_ID = {$value['id']};");
	$user_result = mysqli_fetch_assoc($user_result);
	echo $user_result['user_firstname'] . ' ' . $user_result['user_lastname'];
	echo '</td><td>' . $value['orderMade'] . '</td><td>' . $value['orderRank'] . '</td>';
	echo '</tr>';
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