<?php
require_once './include/header_deasboard.php';// include header section
require_once '../database/env.php'; //Include database
$id = $_GET['id'];
$query = "SELECT * FROM banners WHERE id = '$id'";
$selectQuery = mysqli_query($connection, $query);
$fetch = mysqli_fetch_assoc($selectQuery);
?>
<h4 class="mx-4">Edit Banner</h4>
<div class="card mx-4">
    <div class="card-header bg-primary text-light">
        <h6>Edit Banner</h6>
    </div>
    <form action="../controllers/edit_banner_backend.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 mt-3">
                <label for="banner_image">
                    <img src="../uploads/banners/<?= $fetch['images']?>" class="imagePlaceHolder" style="width: 300px; height: 210px;">
                    <input type="file" name="image" class="d-none bannerInputImage" id="banner_image">
                    <span class="text-danger">
                        <?php
                            if(isset($_SESSION['errors']['image_error'])){
                                echo $_SESSION['errors']['image_error'];
                            }
                        ?>
                    </span>
                    <br>
                    <p>Click on the photo for change.</p>
                </label>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="title" class="w-100">Title:
                        <input type="text" name="title" value="<?= $fetch['title'] ?>" id="title" class="form-control bg-light border-1 w-100">
                        </label>
                        <span class="text-danger">
                    <?php
                        if(isset($_SESSION['errors']['title_error'])){
                            echo $_SESSION['errors']['title_error'];
                        }
                    ?>
                </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="button_name" class="w-100">Button Name:
                        <input type="text" name="button" value="<?= $fetch['button_name1'] ?>" id="button_name" class="form-control bg-light border-1 w-100">
                        </label>
                        <span class="text-danger">
                    <?php
                        if(isset($_SESSION['errors']['buttton_name1_error'])){
                            echo $_SESSION['errors']['buttton_name1_error'];
                        }
                    ?>
                </span>
                    </div>
                    <div class="col-lg-6">
                        <label for="button_link" class="w-100">Button Link:
                        <input type="text" name="button_link" value="<?= $fetch['button_link1']  ?>" id="button_link" class="form-control bg-light border-1 w-100 ">
                        </label>
                        <span class="text-danger">
                    <?php
                        if(isset($_SESSION['errors']['button_link1_error'])){
                            echo $_SESSION['errors']['button_link1_error'];
                        }
                    ?>
                </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="video_button_name" class="w-100">Video Button:
                        <input type="text" name="video_button" value="<?= $fetch['button_video']  ?>" id="video_button_name" class="form-control bg-light border-1 w-100">
                        </label>
                        <span class="text-danger">
                    <?php
                        if(isset($_SESSION['errors']['button_video_error'])){
                            echo $_SESSION['errors']['button_video_error'];
                        }
                    ?>
                </span>
                    </div>
                    <div class="col-lg-6">
                        <label for="video_link" class="w-100">Video Button Link:
                        <input type="text" name="video_button_link" value="<?= $fetch['button_video_link']  ?>" id="video_link" class="form-control bg-light border-1 w-100 ">
                        </label>
                        <span class="text-danger">
                    <?php
                        if(isset($_SESSION['errors']['button_video_link_error'])){
                            echo $_SESSION['errors']['button_video_link_error'];
                        }
                    ?>
                </span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label for="detilts" class="w-100">Detiles:
                    <textarea type="text" name="detiles" id="detilts" cols="40" rows="2" class="form-control bg-light border-1 w-100 "><?= $fetch['detiles'] ?></textarea>
                    </label>
                    <span class="text-danger">
                    <?php
                        if(isset($_SESSION['errors']['detiles_error'])){
                            echo $_SESSION['errors']['detiles_error'];
                        }
                    ?>
                </span>
                </div>
                <button type="submit" name="save_change" class="btn btn-primary w-100 mt-3">Save Change</button>
            </div>
        </div>
    </div>
    </form>
</div>

<?php
require_once './include/footer_deshboard.php';// include footer section
?>