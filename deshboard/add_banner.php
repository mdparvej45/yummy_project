<?php
require_once './include/header_deasboard.php';// include header section
?>
<h4 class="mx-4">Add Banner</h4>
<div class="card mx-4">
    <div class="card-header bg-primary text-light">
        <h6>Add Banner</h6>
    </div>
    <form action="../controllers/add_banner_backend.php" method="POST" enctype="multipart/form-data">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 mt-3">
                <label for="banner_image">
                    <img src="./img/black_image_placeholder.png" class="imagePlaceHolder" style="width: 300px; height: 210px;">
                    <input type="file" name="image" class="d-none bannerInputImage" id="banner_image">
                </label>
                <span class="text-danger">
                    <?php
                        if(isset($_SESSION['errors']['image_error'])){
                            echo $_SESSION['errors']['image_error'];
                        }
                    ?>
                </span>
                <br>
                <a href="#" class="btn btn-sm btn-primary w-30">Change</a>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="title" class="w-100">Title:
                        <input type="text" name="title" placeholder="input a title..." id="title" class="form-control bg-light border-1 w-100">
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
                        <label for="button_name" class="w-100">Button:
                        <input type="text" name="button" placeholder="input a button name..." id="button_name" class="form-control bg-light border-1 w-100">
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
                        <label for="button_link" class="w-100">Link:
                        <input type="text" name="button_link" placeholder="input button name..." id="button_link" class="form-control bg-light border-1 w-100 ">
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
                        <label for="video_button_name" class="w-100">Button:
                        <input type="text" name="video_button" placeholder="input video button name..." id="video_button_name" class="form-control bg-light border-1 w-100">
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
                        <label for="video_link" class="w-100">Link:
                        <input type="text" name="video_button_link" placeholder="input video link..." id="video_link" class="form-control bg-light border-1 w-100 ">
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
                    <textarea type="text" name="detiles" placeholder="input detiles..." id="detilts" cols="40" rows="2" class="form-control bg-light border-1 w-100 "></textarea>
                    </label>
                    <span class="text-danger">
                    <?php
                        if(isset($_SESSION['errors']['detiles_error'])){
                            echo $_SESSION['errors']['detiles_error'];
                        }
                    ?>
                </span>
                </div>
                <button type="submit" name="post" class="btn btn-primary w-100 mt-3">Post</button>
            </div>
        </div>
    </div>
    </form>
</div>

<?php
require_once './include/footer_deshboard.php';// include footer section
?>