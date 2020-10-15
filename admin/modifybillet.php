
<div class="jumbotron ">
    <div class="container bg-light my-5">
    
        <table class="table table-striped table-bordered">
        <tr><h3 class=" h4 text-center t"> Liste des billets</h3></tr>
       
            <tr class="text-center">
                <td>Titre du billet</td>
                <td>Description du billet</td>
                <td>Date</td>
                <td>Editer</td>
                <td> Supprimer</td>
            </tr>
           
            
            <?php
            $req2 = $bd->prepare('SELECT * FROM billet');
            $req2->execute();
           while ($billet = $req2->fetchObject())
           {echo '<tr class="">
                      <td>'.$billet->titre.'</td>
                       <td>'.$billet->contenu.'</td>
                        <td>'.$billet->date.'</td>
                        <td><a href="?action=edit&amp;id='.$billet->id.'" class="btn btn-success">Editer</a> <td>
                        <td><a href="?action=suppr&amp;id='.$billet->id.'" class="btn btn-danger">suppr</a></td><td>

                    </tr>';

           }?>

        </table>
        <a href="?action=add" class="btn btn-warning">Ajouter +</a>
        <br>    
    </div>

</div>

