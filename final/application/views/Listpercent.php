<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<div style="width: 800px; margin:auto">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($obj as $listobj) {; ?>
                <tr>
                    <th scope="col"><?php echo $listobj['name']; ?></th>
                    <th scope="col"><?php echo $listobj['price']; ?></th>
                    <th scope="col"><a href="<?php echo site_url("proposition/pvalidate/" . $a . "/" . $listobj['id']); ?>">Echanger</a></th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>