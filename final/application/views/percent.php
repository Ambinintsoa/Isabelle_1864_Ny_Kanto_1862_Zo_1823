<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<div class="text-center" style="width:500px;margin:auto;margin-top:150px">
    <main class="form-signin w-100 m-auto">
        <?php $pourcentage = ($obj2[0]['price'] / $obj1[0]['price']) * 100;
        $pourcentage = $pourcentage - 100; ?>
        <h1 class="h3 mb-3 fw-normal">VOUS AVEZ CREE UNE PROPOSITION AVEC UNE PRIX PRODUIT <?php echo number_format($pourcentage,2); ?>% PAR RAPPORT A LA VOTRE</h1>
        <a href="<?php echo base_url("liste"); ?>">Retour</a>
    </main>
</div>