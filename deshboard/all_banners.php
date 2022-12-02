<?php
require_once './include/header_deasboard.php';// include header section
require_once '../database/env.php';
//Fetch all data 
$query = "SELECT * FROM banners ORDER BY id DESC";
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
        <span class="row" style="justify-content: end;">
            <a href="./index.php" class="btn btn-dark btn-sm">Back</a>
            </span>
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
            <td><img src="../uploads/banners/<?= $data['images'] ?>" style="width:180px; height:100px; border: 1px dotted gray"></td>
            <td><?= $data['title'] ?></td>
            <td><?php
                if(strlen($data['detiles']) > 20){
                   echo substr($data['detiles'], 0, 20) . " <a href='#' class='text-decoration-none '>more</a>";
                }else{
                  echo $data['detiles'];
                }
            ?></td>
            <td><?= $data['button_name1'] ?></td>
            <td><?php 
              if(strlen($data['button_link1']) > 7){
                echo substr($data['button_link1'], 0, 7) . " <a href='#' class='text-decoration-none '>more</a>";
             }else{
               echo $data['button_link1'];
             }
            ?></td>
            <td><?= $data['button_video'] ?></td>
            <td><?php 
            if(strlen($data['button_video_link']) > 7){
                echo substr($data['button_video_link'], 0, 7) . " <a href='#' class='text-decoration-none '>more</a>";
             }else{
               echo $data['button_video_link'];
             }
            ?></td>
            <td class="<?= ($data['status'] == '1') ? 'text-success' : 'text-danger' ?>">
            <?= ($data['status'] == '1') ? 'Active' : 'De-Active' ?> </td>
            <td>
              <div class="row">
                  <span class="btn-group">
                      <a href="./view_banner.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-secondary btn-sm"><img src="./img/view.svg" alt=""></button></a>
                      <a href="./view_banner.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-info btn-sm"><img src="./img/edit.svg" alt=""></button></a>
                  </span>
                  <span class="btn-group">
                      <a href="../controllers/status_banner_backend.php?id=<?= $data['id'] ?> & status=<?= $data['status'] ?>"><button type="button" class="btn btn-<?= ($data['status'] == '0') ? 'success' : 'warning' ?> btn-sm"><img src="<?= ($data['status'] == '0') ? './img/active.svg' : './img/de-active.svg' ?>" alt=""></button></a>

                      <a href="../controllers/delete_banner_backend.php?id=<?= $data['id'] ?>" class="bannerDelete btn btn-sm btn-danger">Delete</a>
                </span>
              </div>

            </td>
        </tr>
        <?php
        }
    ?>
    <?php
      if(mysqli_num_rows($selectQuery) == 0){
        ?>
        <tr class="text-center">
          <td colspan="9"> <h5>No data Found</h5></td>
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
<script>
  let bannerDeleteButton = document.querySelectorAll(".bannerDelete")
      for(i = 0; i < bannerDeleteButton.length; i++){
        bannerDeleteButton[i].addEventListener('click', function(e){
          e.preventDefault();
          let url = e.target.href
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = url
            }
          })
        })
      }

</script>
