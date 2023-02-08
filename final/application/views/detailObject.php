<?php
defined('BASEPATH') or exit('No direct script access allowed');
$img = $this->Object->getImg($id);
?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <div class="row">
                    <div class="float-start mt">
                        <?php for ($i = 0; $i < count($img); $i++) { ?>
                            <img class="" style="margin-top: 5px;" src="<?php echo base_url('assets/img/' . $img[$i]['src']); ?>" width="300px" alt="..." />
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: BST-498</div>
                <h1 class="display-5 fw-bolder"><?php echo $img[0]['name']; ?></h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through"><?php echo $img[0]['price']; ?> Ar</span>
                    <span>FREE</span>
                </div>
                <p class="lead"><?php echo $img[0]['descri']; ?></p>
                <div class="d-flex">
                    <a href="<?php echo site_url('proposition/prop/'.$img[0]['iduser'] .'/'.$img[0]['idobject']); ?>">
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Proposition
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>