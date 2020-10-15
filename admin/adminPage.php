<?php
session_start();
require '../includes/connection.php';
if(isset($_SESSION['admin']))
    
{?>
    


    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Ready Bootstrap Dashboard</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="../assets/css/ready.css">
        <link rel="stylesheet" href="../css/css.css">
        <link rel="stylesheet" href="../assets/css/demo.css">
    </head>
    <body>
    <div class="wrapper">
        <div class="main-header ">
            <div class="logo-header bg-warning">
                <a href="index.html" class="logo ">
                
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg navbar-color ">
                <div class="container-fluid text-center">
                    <span class="h6">JML / Admin</span>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link " href="?action=acceuil"> <i class="la la-home"></i>Acceuil </a>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-list"></i>
                                <span> billets </span>
                            </a>
                            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="?action=add">Ajouter</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?action=modify">Editer/modifier</a>

                            </div>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link " href="?action=notification"> <i class="la la-bell"></i>Notification </a>
                        </li>
                        <li class="nav-item ">
                            <a class="btn btn-warning border-0" href="?action=logout">deconnecte</a>

                        </li>
            </nav>
        </div>

        <?php

        if(!empty($_GET) and isset($_GET))
        {
            if ($_GET['action'] == 'add' )
            {
                require_once 'addbillet.php';
            }

            elseif($_GET['action'] == 'logout')
            {
                session_destroy();
                header("location:index.php");

            }
            elseif ($_GET['action'] == 'notification')

            {
                require_once 'notify.php';
            }
            elseif ($_GET['action'] == 'acceuil')
            {
                require_once('acceuil.php');
             }
            elseif ($_GET['action'] == 'suppr')
            {

                    $id =$_GET['id'];
                    $req8 = $bd->prepare('DELETE   FROM billet WHERE id = ?  ');
                    $req8->execute([
                            $id
                    ]);
                    header('location: adminPage.php?action=modify');
            }
            elseif ($_GET['action'] == 'suppr2') {
                # code...
                $id = $_GET["id"];
                $req9 = $bd->prepare('DELETE  FROM notifiation WHERE id = ?');
                $req9->execute([
                    $id
                ]);
                header('location: adminPage.php?action=notification');

            }
            elseif ($_GET['action'] == 'edit')
            {
                require 'edition.php';
            }
            elseif ($_GET['action'] == 'modify')
            {
                require 'modifybillet.php';
            }
            else
            {
                require_once 'acceuil.php';
            }


        }
            else
            {
                require_once 'acceuil.php';
            }

        ?>

    </body>
    <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugin/chartist/chartist.min.js"></script>
    <script src="../assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <script src="../assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
    <script src="../assets/js/plugin/chart-circle/circles.min.js"></script>
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/js/ready.min.js"></script>
    <script src="../assets/js/demo.js"></script>
    </html>

<?php }
else
{
    echo 'error 404';
  header('location: index.php');
}?>
