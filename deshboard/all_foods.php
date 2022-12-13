<?php
require_once './include/header_deasboard.php';// include header section
require_once '../database/env.php';
//Fetch all data 
$query = "SELECT * FROM foods";
$select_query = mysqli_query($connection, $query);
$fetch = mysqli_fetch_all($select_query, 1);

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
      <h4 class="mx-4">All Foods</h4>
      <table class="table table-striped table-responsibe">
      <thead>
        <tr>
          <th class="fw-bold" scope="col">Image</th>
          <th class="fw-bold" scope="col">Catagory</th>
          <th class="fw-bold" scope="col">Title</th>
          <th class="fw-bold" scope="col">Rate</th>
          <th class="fw-bold" scope="col">Status</th>
          <th class="fw-bold" scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($fetch as $data){
          ?>
          <tr>
            <td> <img src="../uploads/foods/<?= $data['image'] ?>" style="width: 120px; height: 80px; border-radius: 10px;"> </td>
            <td><?php
              if($data['catagory_id'] == 14){
                echo 'Cake';
              }elseif($data['catagory_id'] == 15){
                echo 'Starters';
              }elseif($data['catagory_id'] == 16){
                echo 'Dinner';
              }elseif($data['catagory_id'] == 17){
                echo 'Breakfast';
              }else{
                echo 'Lunch';
              }
            ?> </td>
            <td><?= $data['title'] ?></td>
            <td><?= $data['rate'] ?></td>
            <td><?= $data['status'] == 0 ? 'De-active' : 'Active' ?></td>
            <td>
              <div class="row">
                  <span class="btn-group">
                      <a href="./view_banner.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-secondary btn-sm"><img src="./img/view.svg" alt=""></button></a>
                      <a href="./view_banner.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-info btn-sm"><img src="./img/edit.svg" alt=""></button></a>
                  </span>
                  <span class="btn-group">
                      <a href="../controllers/status_banner_backend.php?id=<?= $data['id'] ?> & status=<?= $data['status'] ?>"><button type="button" class="btn btn-<?= ($data['status'] == '0') ? 'success' : 'warning' ?> btn-sm"><img src="<?= ($data['status'] == '0') ? './img/active.svg' : './img/de-active.svg' ?>" alt=""></button></a>

                      <a href="./view_banner.php?id=<?= $data['id'] ?>"><button type="button" class="btn btn-danger btn-sm"><img src="./img/trash.svg" alt=""></button></a>
                </span>
              </div>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
      </table>
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
