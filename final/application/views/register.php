<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Registre</h3>
                            </div>
                            <div class="w-100">
                                <p class="social-media d-flex justify-content-end">
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fab fa-facebook"></span></a>
                                    <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fab fa-twitter"></span></a>
                                </p>
                            </div>
                        </div>
                        <form action="<?php echo base_url("register/validate"); ?>" class="signin-form" method="POST">
                            <div class="form-group mt-3">
                                <input name="fname" type="text" class="form-control" required>
                                <label class="form-control-placeholder" for="username">firstname</label>
                            </div>
                            <div class="form-group mt-3">
                                <input name="lname" type="text" class="form-control" required>
                                <label class="form-control-placeholder" for="username">lastname</label>
                            </div>
                            <div class="form-group mt-3">
                                <input name="mail" type="mail" class="form-control" required>
                                <label class="form-control-placeholder" for="username">Email</label>
                            </div>
                            <div class="form-group">
                                <input name="pswrd" id="password-field" type="password" class="form-control" required>
                                <label class="form-control-placeholder" for="password">Password</label>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3" style="background-color:rgb(255,195,0);">Register</button>
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