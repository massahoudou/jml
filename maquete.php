<?php
require_once ('includes/header.php');
require_once ('includes/connection.php');
$id = 0 ;
?>

<section class=" jumbotron section3">
    <div class=" col-md-4 section2_titre">
        visionner
        <h3 size="" class="">MAQUETTE</h3>
        <?php

        if(isset($_GET['id']) and !empty($_GET['id']))
            {
                  $id = $_GET['id'];
                $req6 = $bd->prepare('SELECT * FROM billet WHERE id = :id ' );
                $req6->execute([
                    'id' => $id
                    ]) ;
                $billets = $req6->fetchAll();
                 foreach($billets as $billet )
                    {?>
                        <div class="card-title"><?php echo $billet->titre ?></div>

                   <?php }

            }
