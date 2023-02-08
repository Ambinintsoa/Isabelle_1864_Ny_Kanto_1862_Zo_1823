
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/lien.css'); ?>">

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                   
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Add Object</h3>
                            </div>
                        </div>
                        <form action="<?php echo base_url('insertObj')?>" class="signin-form" method="post">
                        <input name="iduser" type="hidden" value="<?php echo  $this->session->iduser;?>" vaclass="form-control" required>
                            <div class="form-group mt-3">
                                <input name="name" type="text" class="form-control" required>
                                <label class="form-control-placeholder" for="username">name</label>
                            </div>
                            <div class="form-group mt-3">
                                <textarea name="descri" type="text" class="form-control" rows="3" required></textarea>
                                <label class="form-control-placeholder" for="username">description</label>
                            </div>
                            <div class="form-group mt-3">
                                <input name="prix" type="number" class="form-control" required>
                                <label class="form-control-placeholder" for="username">Price</label>
                            </div>
                            <div class="form-group mt-3">
                            <p> <?Php foreach($cat as $categorie){ ?>
                                 <input type="checkbox" name="categorie[]" value="<?php echo $categorie['id']?>">
                                 <ab>
                                    <?php echo $categorie['name']?>
                                 </ab>
                                <?php } ?>
                            </div>
                            </p>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3" style="background-color:rgb(255,195,0);">Submit</button>
                            </div>
                        </form>
                        <a href="<?php echo base_url('Upload')?>">UPLOAD IMAGE</a>
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

