<head>
    <link rel="stylesheet" href=<?php echo base_url('assets/css/lien.css')?>>
</head>
<center>
    <div style="width:50rem" >
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">DATE</th>
                <th scope="col">OBJECT 1</th>
                <th scope="col">PERSONNE 1</th>
                <th scope="col">OBJETC 2</th>
                <th scope="col">PERSONNE 2</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($echange as $echanges) { ?>
                <tr>
                <td><?php echo $echanges['hiredate'];?></td>
                <td><?php echo $echanges['nomobject1'];?></td>
                <td><?php echo $echanges['lastname1'];?></td>
                <td><?php echo $echanges['nomobject2'];?></td>
                <td><?php echo $echanges['lastname2'];?></td>
                </tr>
                <?Php } ?>
                <tr>
                <td>TOTAL :</td>
                <td><?php echo count($echange)?></td>
                </tr>
            </tbody>
        </table>
       
    </div>
    <div class="mt-5 mb-5"> <a href="<?php echo base_url('ListUsers')?>">USERS</a></div>
</center>