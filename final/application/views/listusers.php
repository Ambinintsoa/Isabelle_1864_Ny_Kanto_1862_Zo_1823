<head>
    <link rel="stylesheet" href=<?php echo base_url('assets/css/lien.css')?>>
</head>
<center>
    <div style="width:50rem" >
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($user as $users) { ?>
                <tr>
                <td><?php echo $users['firstname'];?></td>
                <td><?php echo $users['lastname'];?></td>
                </tr>
                <?Php } ?>
                <tr>
                <td>TOTAL :</td>
                <td><?php echo count($user)?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-5 mb-5"> <a href="<?php echo base_url('ListEchange')?>">ECHANGES</a></div>
</center>
