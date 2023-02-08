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
                <th scope="col"></th>
                <th scope="col"></th>
                
                </tr>
            </thead>
            <tbody>

            <?php 
            $id= 0;
            $count=1;
            foreach ($echange as $echanges) { 
            if($id!= $echanges['id1']){
                $id= $echanges['id1']; ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>PROPOSITION <?php ECHO $count; $count++;?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php }
            ?>  <tr>
                <td><?php echo $echanges['hiredate'];?></td>
                <td><?php echo $echanges['nomobject1'];?></td>
                <td><?php echo $echanges['lastname1'];?></td>
                <td><?php echo $echanges['nomobject2'];?></td>
                <td><?php echo $echanges['lastname2'];?></td>
                </tr>
                <?Php 
            } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
<?php if(isset($echanges)){?>                
    <td><a href="<?php  echo base_url('ListEchange/accept/'.$echanges['idobject1'].'/'.$echanges['id1'])?>">accepter</a></td>
    <td><a href="<?php echo base_url('ListEchange/refuse/'.$echanges['idobject1'].'/'.$echanges['id1'])?>">refuser</a></td>

<?php } ?>

                </tr>
                <tr>
                <td>TOTAL :</td>
                <td><?php echo $count-1?></td>
                </tr>
            </tbody>
        </table>
       
    </div>
    <div class="mt-5 mb-5"> <a href="<?php echo base_url('ListUsers')?>">USERS</a></div>
</center>