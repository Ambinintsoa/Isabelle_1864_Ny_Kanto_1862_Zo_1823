<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/liste.css'); ?>">
<section id="folders">
  <?php foreach ($cat as $listcat) { ?>
    <article > <a  href="<?php echo base_url('/liste/listObjectByCategory/'. $listcat['id']); ?>" style="text-decoration:none;color:#fff;"><?php echo $listcat['name'];?></a></article>
  <?php } ?>
</section>