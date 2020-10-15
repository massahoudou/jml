<?php
 $req4 = $bd->query('SELECT * FROM notifiation ');
?>
<div class="jumbotron ">
    <div class=" container ">
        <h2 class="display-4 text-center">Bienvenu admin : </h2>
        <div class="">
            <a href="" class="btn btn-danger ">Deconnexion</a>
        </div>
 

       
           
<div class="jumbotron">
<div class="container bg-light shadow-sm ">
    <table class="table table-striped table-bordered">
        <tr><h3 class=" h4 text-center t">Contactants récent </h3></tr>
       
        <tr>
            <td class="text-danger"> <i class="la la-paypal"></i> Pseudo</td>
            <td class="text-warning"><i class="la la-phone"></i> Numero</td>
            <td class="text-success"><i class="la la-envelope"></i> Email</td>
            <td class="text-primary "><i class="la la-connectdevelop"></i> Message</td>
            <td class="text-secondary">Supprimer</td>
        </tr>
        <?php  while($fetch =$req4->fetchObject())
        {?>
        <tr>

            <td><?php  echo $fetch->nom ?></td>
            <td><?php  echo $fetch->tel ?></td>
            <td><?php  echo $fetch->email ?></td>
            <td><?php echo $fetch->message ?></td>
            <td> <a class="btn btn-danger" href="?action=suppr2&amp;id=<?php echo $fetch->id ;?>">supp</a> </td>
        </tr>
        <?php }?>
      
    </table>
    <br>
</div>
        


</div>


</div>