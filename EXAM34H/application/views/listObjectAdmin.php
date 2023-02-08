<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<div style="width: 800px; margin:auto">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($obj as $listobj) { ; ?>
                <tr>
                    <th scope="col"><?php echo $listobj['name']; ?></th>
                    <th scope="col"><?php echo $listobj['price']; ?></th>
                    <th scope="col"><?php echo $listobj['nomcategory']; ?></th>
                    <th scope="col"><a href="<?php echo site_url('Editcat/add/'.$listobj['idobject']."/".$listobj['idcategory']); ?>">Add</a></th>
                    <th scope="col"><a href="<?php echo site_url('Editcat/edit/'. $listobj['idobject']."/".$listobj['idcategory']); ?>">Edit</a></th>
                    <th scope="col"><a href="<?php echo site_url('Editcat/delete/'. $listobj['idobject']."/".$listobj['idcategory']); ?>">Delete</a></th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>