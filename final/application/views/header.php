<?php
if (!$this->session->has_userdata('iduser')) {
  redirect('http://testa.rf.gd');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=<?php echo base_url('assets/css/header.css')?>>
    <link rel="stylesheet" href=<?php echo base_url('assets/css/footer.css')?>>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css'); ?>">
</head>
<body>
    
<div id="blurry-filter"></div>
<header>
  <div>
    <article id="title"><span class="parent">TAKALO-TAKALO</span><br/><span class="name">PRODUCTS</span></article>
    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="get" action="<?php echo base_url('liste/listObjectSearch')?>">
    <article id="reference">
    <input type="search" class="form-control " placeholder="Search..." aria-label="Search" style="margin-right:1rem" name="indice">
   <select name="category" class="form-select" style=" width:10rem;margin-right:0.6rem;color:#8f9296;font-size:0.75rem;">
   <option  value="0" style="text-transform:uppercase; font-size:0.75rem;">CATEGORIES</option>
   <?php foreach ($cat as $listcat) { ?>
    <option value="<?php echo $listcat['id'] ?>" style="text-transform:uppercase; font-size:0.75rem;"><?php echo $listcat['name'];?></option>
  <?php } ?>
   </select>
    <a href="https://dribbble.com/shots/3956995-Apple-OS-MacOS-Finder-UI-motion" target="_blank" rel="noopener">
    <input type="submit" value="search"class="btn" style="background-color:#292c2f;color:#fff;">
</a></article>
</form>  
        <a href="<?php echo site_url('Login/logout')?>"><button class="btn btn-secondary">Deconnexion</button></a>
        </div>

</header>