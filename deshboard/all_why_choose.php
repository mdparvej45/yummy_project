<?php
require_once './include/header_deasboard.php';// include header section
require_once '../database/env.php';
//Fetch all data 
$query = "SELECT * FROM why_choose ORDER BY id DESC";
$selectQuery = mysqli_query($connection, $query);
$fetchData = mysqli_fetch_all($selectQuery,1);

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
      <h4 class="mx-4">All Why Choose</h4>
       <div class="card">
           <div class="card-body">
            <span class="row" style="justify-content: end;">
                <a href="./index.php" class="btn btn-dark btn-sm">Back</a>
            </span>
            <table class="table table-striped table-responsibe">
                <thead>
                    <tr>
                    <th class="fw-bold" scope="col">Image</th>
                    <th class="fw-bold" scope="col">Title</th>
                    <th class="fw-bold" scope="col">Detiles</th>
                    <th class="fw-bold" scope="col">Btn_Name</th>
                    <th class="fw-bold" scope="col">Btn_link</th>
                    <th class="fw-bold" scope="col">Catagory</th>
                    <th class="fw-bold" scope="col">Catagory_Title</th>
                    <th class="fw-bold" scope="col">Catagory_Detiles</th>
                    <th class="fw-bold" scope="col">Status</th>
                    <th class="fw-bold" scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            foreach($fetchData as $key => $data){
                                ?>
                                <tr>
                                <td> <?= ++$key ?> </td>
                                <td> <?= $data['title'] ?> </td>
                                <td> <?php 
                                    if(strlen($data['detiles']) > 15){
                                        echo $data['detiles'] . "<a href='#'>see more</a>";
                                    }else{
                                        echo $data['detiles'];
                                    }
                                ?> </td>
                                <td> <?= $data['button_name'] ?> </td>
                                <td> <?php 
                                    if(strlen($data['button_link']) > 5){
                                        echo $data['button_link'] . "<a href='#'>see more</a>";
                                    }else{
                                        echo $data['button_link'];
                                    }
                                ?> </td>
                                <td> <?php 
                                    if($data['catagory'] == 'bi bi-clipboard-data'){
                                        echo 'Pride';
                                    }elseif($data['catagory'] == 'bi bi-gem'){
                                        echo 'Achieved';
                                    }elseif($data['catagory'] == 'bi bi-inboxes'){
                                        echo 'Fast Delevery';
                                    }elseif($data['catagory'] == 'bi bi-clipboard-data'){
                                        echo 'Healthy';
                                    }else{
                                        echo 'Tastey';
                                    }
                                ?> </td>
                                <td> <?= $data['catagory_title'] ?> </td>
                                <td> <?php 
                                    if(strlen($data['catagory_detiles']) > 5){
                                        echo $data['catagory_detiles'];
                                    }
                                ?> </td>
                                <td> <?= ($data['status'] == 1) ? 'Active' : 'De-Active'?> </td>
                                <td> <?php  ?> </td>
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
      bannerDeleteButton.addEventListener('click', function(e){
        e.preventDefault()
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
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
      })

</script>
