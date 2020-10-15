<?php
if (isset($_POST)) {
    if (!empty($_POST['motdepasse']) AND !empty($_POST['identifiant'])) {
        $username = $_POST['identifiant'];
        $password = $_POST['motdepasse'];
        require_once '../includes/connection.php';
        $req = $bd->prepare('SELECT * FROM admin WHERE identifiant = :identifiant and motdepasse = :motdepasse');
        $req->execute([
            'identifiant' => $username,
            'motdepasse' => $password
        ]);
        $user = $req->fetch();

        if ($user) {
            session_start();
            $_SESSION['admin']['name'] = $user['identifiant'];
            $_SESSION['admin']['name'] = $user['motdepasse'];
            $_SESSION['admin']['id']  =   $user['id'];
            header("location: adminPage.php?action=d");
        } else {
            $erreur = 'Acces refusuer';
        }
    }
}

require_once '../includes/top_header.php';
?>
<div class="bg">
    <form action="" method="post" class=" mt-5 bg-primary form">
        <div class="">
            <h3 class="text-center text-secondary  titre">Admin login </h3>
            <hr>
            <div class="">
                <?php if (isset($erreur)) {?>
                <div class="alert alert-danger"><?php echo $erreur ; }?></div>
                <label class="text-light"> Idnetifiant :
                </label><br>
                <input class="form-control " type="text" name="identifiant" required placeholder="Identifiant...." >
                <br>

                <label class="text-light">
                    Mot de passe :
                </label><br>
                <input class="form-control " type="password"required name="motdepasse" placeholder="Mot de passe..." >
                <br><hr>
                <input type="submit" value="valider" class="btn btn-success border-0 shadow">   <a href="../index.php">fermer</a>
            </div>
        </div>
    </form>
</div>

