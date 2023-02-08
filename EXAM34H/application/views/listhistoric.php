<head>
    <link rel="stylesheet" href=<?php echo base_url('assets/css/lien.css') ?>>
</head>
<center>
    <div style="width:50rem">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">IDOBJECT</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">PRIX</th>
                    <th scope="col">IDUSER</th>
                    <th scope="col">DATE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($histo as $hists) { ?>
                    <tr>
                        <td><?php echo $hists['idobject']; ?></td>
                        <td><?php echo $hists['descri']; ?></td>
                        <td><?php echo $hists['price']; ?></td>
                        <td><?php echo $hists['iduser']; ?></td>
                        <td><?php echo $hists['hiredate']; ?></td>
                    </tr>
                <?Php } ?>
            </tbody>
        </table>

    </div>
    <div class="mt-5 mb-5"> <a href="<?php echo base_url('ListUsers') ?>">USERS</a></div>
</center>