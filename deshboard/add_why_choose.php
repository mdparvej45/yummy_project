<?php
require_once './include/header_deasboard.php';// include header section
?>

<?php
  if(isset($_SESSION['success_msg'])){
    ?>
    <!-- Add success tost notification -->
    <div class="toast show" style="position: relative; bottom:5px; right:5px;" role="alert" aria-live="assertive" aria-atomic="true" >
      <div class="toast-header">
        <img src="./assets/images/yes_check_circle.svg" style="width:40px;">
        <strong class="me-auto ml-3">POST STATUS:</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body text-white bg-success">
        <?= $_SESSION['success_msg'] ?>
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

<h4 class="mx-4">Add Why-Choose</h4>
<div class="card mx-4">
    <form action="../controllers/add_why_choose_title_backend.php" method="POST" >
    <div class="card-body" style="border:1px solid black ;">
        <span class="row" style="justify-content: end;">
            <a href="./all_why_choose.php" class="btn btn-danger btn-sm">Back</a>
        </span>
        <div class="row">
            <div class="col-lg-11 mx-auto">
                <form action="../controllers/add_why_choose_title_backend.php" method="POST">
                    <div class="row" id="catagory_title" style="border:1px dotted blue ;">
                        <!-- Title input -->
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
                        <!-- Detiles input -->
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
                        <button type="submit" name="title_post" class="btn btn-info w-100 mt-3">Post</button>
                    </div>
                </form>
                <form action="../controllers/addwhychoose_backend.php" method="POST">
                    <div id="catagory_detiles">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="button_name" class="w-100">Button:
                            <input type="text" name="button" placeholder="input a button name..." id="button_name" class="form-control bg-light border-1 w-100">
                            </label>
                            <span class="text-danger">
                        <?php
                            if(isset($_SESSION['errors']['button_error'])){
                                echo $_SESSION['errors']['button_error'];
                            }
                        ?>
                    </span>
                        </div>
                        <div class="col-lg-6">
                            <label for="button_link" class="w-100">Link:
                            <input type="text" name="button_link" placeholder="input button link..." id="button_link" class="form-control bg-light border-1 w-100 ">
                            </label>
                            <span class="text-danger">
                        <?php
                            if(isset($_SESSION['errors']['button_link_error'])){
                                echo $_SESSION['errors']['button_link_error'];
                            }
                        ?>
                        </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="catagory" class="w-100">Catagory Logo:
                            <select name="catagory" id="catagory" class="form-control">
                                <option value="bi bi-clipboard-data">Pride</option>
                                <option value="bi bi-gem">Achieved</option>
                                <option value="bi bi-inboxes">Fast Delevery</option>
                                <option value="bi bi-clipboard-data">Healthy</option>
                                <option value="bi bi-clipboard-data">Tastey</option>
                            </select>
                            </label>
                            <span class="text-danger">
                        <?php
                            if(isset($_SESSION['errors']['catagory_error'])){
                                echo $_SESSION['errors']['catagory_error'];
                            }
                        ?>
                    </span>
                        </div>
                        <div class="col-lg-6">
                            <label for="catagory_title" class="w-100">Catagory Title:
                            <input type="text" name="catagory_title" placeholder="input catagory title..." id="video_link" class="form-control bg-light border-1 w-100 ">
                            </label>
                            <span class="text-danger">
                        <?php
                            if(isset($_SESSION['errors']['catagory_error'])){
                                echo $_SESSION['errors']['catagory_error'];
                            }
                        ?>
                    </span>
                        </div>
                        <div class="col-lg-12">
                            <label for="detilts" class="w-100">Catagory Detiles:
                            <textarea type="text" name="catagory_detiles" placeholder="input catagory detiles..." id="detilts" cols="40" rows="2" class="form-control bg-light border-1 w-100 "></textarea>
                            </label>
                            <span class="text-danger">
                            <?php
                                if(isset($_SESSION['errors']['detiles_error'])){
                                    echo $_SESSION['errors']['detiles_error'];
                                }
                            ?>
                            </span>
                        </div>
                    </div>
                    <button type="submit" name="post" class="btn btn-primary w-100 mt-3">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </form>
</div>

<?php
require_once './include/footer_deshboard.php';// include footer section

?>