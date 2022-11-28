<?php
require_once './include/header_deasboard.php';// include header section
require_once '../database/env.php';
//Fetch all data 
$query = "SELECT * FROM banners ";
$selectQuery = mysqli_query($connection, $query);
$fetch = mysqli_fetch_all($selectQuery,1);
// var_dump($fetch);
// exit();
?>

<?php
  if(isset($_SESSION['post_success_msg'])){
    ?>
    <!-- Add success tost notification -->
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" >
      <div class="toast-header">
        <img src="./assets/images/yes_check_circle.svg" style="width:40px;">
        <strong class="me-auto ml-3">POST STATUS:</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-white bg-success">
        <?= $_SESSION['post_success_msg'] ?>
      </div>
    </div>
  <?php
  }
  ?>

<?php
  if(isset($_SESSION['no_success_msg'])){
    ?>
    <!-- Add delete tost notification -->
    <div class="toast show bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true" >
      <div class="toast-header bg-danger text-white">
        <strong class="me-auto ml-3">POST STATUS:</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-danger bg-white">
        <?= $_SESSION['no_success_msg'] ?>
      </div>
    </div>
  <?php
  }
  ?>

<!-- Form starting hare -->
<div class="continer">
  <div class="col-lg-12 mx-auto mt-0">
      <h4 class="mx-4">All Banners</h4>
    <div class="card">
      <div class="card-header bg-primary text-light">
        <strong>All Banners</strong>
      </div>
      <div class="card-body">
      <table class="table table-striped table-responsibe">
  <thead>
    <tr>
      <th class="fw-bold" scope="col">Image</th>
      <th class="fw-bold" scope="col">Title</th>
      <th class="fw-bold" scope="col">Detiles</th>
      <th class="fw-bold" scope="col">Btn_one</th>
      <th class="fw-bold" scope="col">Btn_link</th>
      <th class="fw-bold" scope="col">Btn_video</th>
      <th class="fw-bold" scope="col">Video_link</th>
      <th class="fw-bold" scope="col">Stats</th>
      <th class="fw-bold" scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($fetch as $key => $data){
            // var_dump($data['id']);
        ?>
        <tr>
            <td></td>
            <td><?= $data['title'] ?></td>
            <td><?php
                if(strlen($data['detiles']) > 30){
                   echo substr($data['detiles'], 0, 30) . " <a href='#' class='text-decoration-none '>more</a>";
                }
            ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="<?= ($data['status'] == '1') ? 'text-success' : 'text-danger' ?>">
            <?= ($data['status'] == '1') ? 'Active' : 'De-Active' ?> </td>
            <td>
                <span class="btn-group">
                <a href="./view_post.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-secondary btn-sm">View</button></a>
                <a href="./edit_post.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-info btn-sm">Edit</button></a>
                <a href="./controller/status_backend.php?id=<?= $data['id'] ?>&status=<?= $data['status'] ?>"><button type="button" class="btn btn-<?= ($data['status'] == '0') ? 'success' : 'warning' ?> btn-sm"><?= ($data['status'] == '0') ? 'Active' : 'De-Active' ?></button></a>
                <a href="./controller/delect_backend.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                </span>
            </td>
        </tr>
        <?php
        }
    ?>
    <?php
      if(mysqli_num_rows($selectQuery) == 0){
        ?>
        <tr class="text-center">
          <td colspan="5"> <img  src="./assets/images/no-data-icon.png" style="width:200px ; opacity: .5;"></td>
        </tr>
      <?php
      }
    ?>
  </tbody>
</table>
      </div>
    </div>
  </div>
</div>
<?php
require_once './include/footer_deshboard.php';// include footer section
?>
