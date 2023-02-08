<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<div class="text-center" style="width:500px;margin:auto;margin-top:150px">
    <main class="form-signin w-100 m-auto">
        <form>
            <img class="mb-4" src="<?php echo base_url('assets/img/troc.png') ?>" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">WHAT DO YOU WANT TO SEE ?</h1>

            <div class="d-flex">
                <button class="mr-5 btn btn-primary" style="width: 500px; "><a href="<?php echo base_url('/listobjectadmin'); ?>" style="color:#fff;">Liste des objets</a></button>
                <button class="mr-5 btn btn-primary" style="width: 500px;"><a href="<?php echo base_url('/listusers'); ?>" style="color:#fff;">Liste des inscrits</a></button>
                <button class="mr-5 btn btn-primary" style="width: 500px;"><a href="<?php echo base_url('/listechange'); ?>" style="color:#fff;">Liste de proposition effectuee</a></button>
            </div>

            <p class="mt-5 mb-3 text-muted">&copy;2023-2024</p>
        </form>
    </main>
</div>