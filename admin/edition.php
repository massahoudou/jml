<?php

$id = $_GET['id'];
$req9 = $bd->prepare('SELECT * FROM BILLET WHERE  id = ?');
$req9->execute([
   $id
]);
$billet = $req9->fetchobject();

if (isset($_POST) && !empty($_POST))
{
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);

     $img = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];

    if (!empty($img_tmp)) {
        $image = explode('.', $img);
                $image_ext = end($image);
        if ((in_array(strtolower($image_ext), array('png', 'jpg', 'jpeg')) === false)) {
                echo 'veuiller rentrer un image ayant pour extension ';
        }
    else 
    {
    $image_size = getimagesize($img_tmp);
    if ($image_size['mime'] == 'image/jpeg') {
        $image_src = imagecreatefromjpeg($img_tmp);
    } elseif ($image_size['mime'] == 'image/png') {
        $image_src = imagecreatefrompng($img_tmp);

    } else {
        $image_src = false;
        echo ' veuiller entre une image valide';
    }
    if ($image_src !== false) {

        $image_finale = $image_src;

        //  imagecopyresampled($image_finale, $image_src, 0, 0, 0, 0, $new_width[0], $new_height[1], $image_size[0], $image_size[1]);

        imagejpeg($image_finale, '../imgs/' . $titre . '.jpg');
    }
    
    
        $update = $bd->prepare('UPDATE billet set titre = ? , contenu = ? , idadmin= ? ,date= now()  WHERE id = ?');
        $update->execute([
                $titre,
                $description,
                $_SESSION['admin']['id'],
                $id ]);

                header('location: adminPage.php?action=modify');
                

        }
       
        }
   
}

else
{

echo ' il c\'est produit une erreur ';
}
?>
<div class="jumbotron modify_form w-100 h-100">
 <div class=" container">

 <form action="" class=" card my-5 text-center form_add col-md-8" method="post" enctype="multipart/form-data">
 <h4 class=" text-center h4 "  >Ajouter un billet </h4> 

        <div class="container-fluid">
            <label class="">Titre  :</label>
            <input type="text" value="<?php echo $billet->titre ;?>" name="titre"  required class="form-control">
            <br>
          <label class="">Description :</label>
            <textarea type="text"rows="8"name="description" required class="form-control "><?php echo $billet->contenu ;?></textarea>

            <input type="file" class="custom-file" name="img" required >

            <input type="submit" value="Valider " class="btn btn-warning col-md-4">
        </div>

    </form>
 </div>
    
</div>
<?php

   

?>

