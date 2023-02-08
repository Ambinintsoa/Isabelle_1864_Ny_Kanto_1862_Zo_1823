
<main>
  <?php foreach ($cat as $listcat) { ?>
    <figure style="background-image: url(<?php echo base_url().'assets/img/fondlist.avif'?>)">
    <figcaption><?php echo $listcat['name'];?></figcaption>
    <figcaption1><a href="<?php echo site_url('DetailObject/det/'.$listcat['id'])?>">Details</a></figcaption1>
  </figure>
  <?php } ?>
</main>
<footer></footer>
