<?php
$id = $this->session->userdata('iduser');
$myobj = $this->Object->getObj_by_id($id);
?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/lien.css'); ?>">


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Proposition</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="wrap">
                    <div class="img" style="background-image: url(images/bg-1.jpg);"></div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Proposition</h3>
                            </div>
                        </div>
                        <form action="<?php echo base_url("proposition/validate"); ?>" class="signin-form" method="GET">
                            <div class="form-group mt-3">
                                <input name="obj1" type="hidden" value="<?php echo $object; ?>">
                            </div>
                            <div class="form-group mt-3">
                                    <?php foreach ($myobj as $listobj) { ?>
                                        <input type="checkbox" name="obj2[]" value="<?php echo $listobj['id']; ?>">
                                 <ab>
                                 <?php echo $listobj['name']; ?>
                                 </ab>
                                    <?php } ?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3" style="background-color:rgb(255,195,0);">Exchange</button>
                            </div>
                        </form>
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