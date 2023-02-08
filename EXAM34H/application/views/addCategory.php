<?php
$allCat = $this->Category->getCategory();
?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Add Category</h3>
                            </div>
                        </div>
                        <form action="<?php echo base_url("EditCat/added"); ?>" class="signin-form" method="POST">
                            <div class="form-group mt-3">
                                <input name="id" type="hidden" class="form-control" value="<?php echo $id; ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <input name="cat1" type="hidden" class="form-control" value="<?php echo $cat; ?>" required>
                            </div>

                            <div class="form-group mt-3">
                                <select name="cat2" id="" class="form-control" required>
                                    <option value=""></option>
                                    <?php for ($i = 0; $i < count($allCat); $i++) { ?>
                                        <option value="<?php echo $allCat[$i]['id']; ?>"><?php echo $allCat[$i]['name']; ?></option>
                                    <?php } ?>
                                </select>
                                <label class="form-control-placeholder" for="username">Category</label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3" style="background-color:rgb(255,195,0);">Add</button>
                            </div>
                        </form>
                        <p class="text-center">Already registered ? <a data-toggle="tab" href="<?php echo base_url('/Redirect_login'); ?>">Log In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>