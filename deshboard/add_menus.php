<?php
require_once './include/header_deasboard.php';// include header section
?>

    <!-- Add Succesfully notifacation -->
    <?php
    if(isset($_SESSION['errors']['success_msg'])){
        ?>
        <div class="toast-show" role="alert" aria-live="assertive" aria-atomic="true" >
        <div class="toast-header">
        <img src="./img/yes_check_circle.svg" style="width:40px;">
        <strong class="me-auto">POST STATUS:</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-white bg-success">
        <?= $_SESSION['errors']['success_msg'] ?>
        </div>
    </div>
    <?php
    }
    ?>

<!-- Add denided notifacation -->
<?php
if(isset($_SESSION['errors']['no_success_msg'])){
    ?>
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" >
    <div class="toast-header">
    <img src="./img/no_check_circle.png" style="width:40px;">
      <strong class="me-auto">POST STATUS:</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-white bg-danger">
      <?= $_SESSION['errors']['no_success_msg'] ?>
    </div>
  </div>
  <?php
  }
?>




<div class="card col-lg-11 mx-4">
    <div class="card-header bg-primary text-light">
        <h3 style="text-align: center;">Add Menus...</h3>
    </div>
    <form action="../controllers/add_menus_backend.php" method="POST">
        <div class="row mt-3 mx-3">
            <div class="col-lg-9">
                <label for="catagory" class="w-100">Catagory:
                        <input type="text" name="catagory" class="form-control" id="catagory">
                </label>
            </div>
            <div class="col-lg-3 mt-4">
            <button type="submit" name="submit_catagory" class="btn btn-primary w-100">Submit Catagory</button>
            </div>
        </div>
    </form>
    <hr class="bg-primary">
    <form action="../controllers/add_foods_backend.php" method="POST" enctype="multipart/form-data">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 mt-1">
                <label for="banner_image">
                    <img src="./img/black_image_placeholder.png" class="imagePlaceHolder" style="width: 300px; height: 210px;">
                    <input type="file" name="image" class="d-none bannerInputImage" id="banner_image">
                </label>
                <br>
                <a href="#" class="btn btn-sm btn-primary w-30">Change</a>
            </div>
            <div class="col-lg-8">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                        <label for="food_catagory" class="w-100">Select Catagory:
                            <select name="food_catagory" id="food_catagory" class="form-control">
                                <option value="">One</option>
                                <option value="">One</option>
                                <option value="">One</option>
                            </select>
                        </label>
                        </div>
                        <div class="col-lg-6">
                        <label for="title" class="w-100">Title:
                            <input type="text" name="title" id="title" placeholder="input title..." class="form-control">
                        </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                    <div class="col-lg-6">
                        <label for="rate" class="w-100">Rate:
                            <input type="number" name="rate" id="rate" placeholder="input rate..." class="form-control">
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <label for="detiles" class="w-100">Detiles:
                        <textarea  name="detiles" id="detiles" placeholder="input detiles..." class="form-control" cols="30" rows="3"></textarea>
                        </label>
                    </div>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100 mt-3">Submit</button>
            </div>
        </div>
    </div>
    </form>
</div>

<?php
require_once './include/footer_deshboard.php';// include footer section
?>