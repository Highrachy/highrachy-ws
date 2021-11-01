<?php $dashboard = true; $title = "dashboard_tenants";?>
<?php
include('includes/config.inc.php');
require(DB);
require('functions/database.class.php');
require('functions/createFormInput.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_GET['id'])){
  $tenant_id = $_GET['id'];
}

//Fetch All rows to view the recent content
$query = "SELECT * FROM tenants WHERE id=". $tenant_id;
$row = $db->fetch_first_row($query);
?>
<?php include('includes/header.inc.php'); ?>
</div>
<!--End of Top Container-->

<section>
  <div id="dashboard" class="container">
    <div id="content" class="row">
      <?php include('includes/breadcrumb.inc.php'); ?>
      <div class="maincontent">
        <div id="tab-one">
          <?php include('includes/dash-nav.inc.php'); ?>
          <div class="list-wrap">
            <h2><?php echo $row['tenant_full_name'] ?> Information</h2>
            <div class="center">
              <img src='<?php echo BASE_URL."img/tenants/".$row['tenant_picture'] ?>'' alt=' Tenant Picture'
                style='width:180px;' />
            </div>
            <?php alert() ?>
            <table class="table table-striped table-bordered">

              <?php foreach ($row as $key => $value) {
                               if ($key == 'id') {
                                 continue;
                               }
                              ?>

              <tr>
                <td class="text-left"><strong
                    class="font-weight-bolder text-left"><?php echo ucwords(str_replace('_', ' ', $key)) ?></strong>
                </td>
                <td class="text-left"><?php echo empty($value) ? '-' : $value ?></td>
              </tr>
              <?php } ?>
            </table>
          </div>
          <!-- END List Wrap -->
          <div class="list-wrap-bottom"></div>
        </div>
        <!-- END Tab One -->
      </div>
      <!-- End of Main Content -->
    </div>
  </div>
</section>

<?php include('includes/footer.inc.php'); ?>
</body>

</html>