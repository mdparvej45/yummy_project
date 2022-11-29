<?php
require_once './include/header_deasboard.php';// include header section
require_once '../database/env.php';//include database
$id = $_GET['id']; //catch id from all banners page
$query = "SELECT * FROM banners WHERE id = '$id'";
$selectQuery = mysqli_query($connection, $query);
$fetch = mysqli_fetch_assoc($selectQuery);
?>
<h4 class="mx-4">View Banner</h4>
<div class="card mx-4 ml-5 col-lg-10">
    <div class="card-header bg-primary w-100 text-light">
        <h6 class="w-100">View Banner
            <span class="row" style="justify-content: end;">
            <a href="./all_banners.php" class="btn btn-dark btn-sm">Back</a>
            <a href="./edit_banner.php?id=<?= $id ?>" class="btn btn-danger btn-sm">Edit</a>
            </span>
        </h6>
    </div>
    <div class="card-body col-lg-12" style="border: 1px dotted gray ;">
        <div class="row">
            <div class="col-lg-7 mt-3">
                    <img src="../uploads/banners/<?= $fetch['images'] ?>" style="width:100%; height: 270px;">
            </div>
            <div class="col-lg-5 mt-5" >
                <h3 class="mt-5">Title:</h3>
                <h5 style="width: 100%;"><?= $fetch['title'] ?> </h5>
            </div>
        </div>
            <div class="col-lg-12" >
                    <h5 class="mb-0 pb-0" >Detiles:</h5>
                    <p style="width: 100%;"><?= $fetch['detiles'] ?> </p>
                    <hr style="border-bottom: 1px dotted gray ;">
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 >Button Name:</h5>
                        <p style="width: 100%;"> <?= $fetch['button_name1']  ?></p>
                        <hr style="border-bottom: 1px dotted gray ;">
                    </div>
                    <div class="col-lg-6">
                        <h5 >Video Button Name:</h5>
                        <p style="width: 100%;"> <?= $fetch['button_video']  ?></p>
                        <hr style="border-bottom: 1px dotted gray ;">
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                    <h5 >Button Link:</h5>
                    <p style="width: 100%;"> <?= $fetch['button_link1']  ?> </p>
                    <hr style="border-bottom: 1px dotted gray ;">
            </div>
            <div class="col-lg-12">
                    <h5 >Video Button Link:</h5>
                    <p style="width: 100%;">  <?= $fetch['button_video_link']  ?> </p>
                    <hr style="border-bottom: 1px dotted gray ;">
            </div>
    </div>
    <div class="card-header bg-secondary w-100">
    </div>
</div>
<?php
require_once './include/footer_deshboard.php';// include footer section
?>