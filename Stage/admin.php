<?php

    require_once 'BDD/connexionBDD.php';

    $bdd = connexionBDD();    

    session_start();

    $role = $_SESSION['user']['role'];
    if ( $role != 'ROLE_ADMIN') {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/admin.css">
    <!--Boostrap CSS-->
    <link href="bootstrap-5.2.2-dist/css/bootstrap.css" rel="stylesheet">
    <title>Accueil</title>
</head>
<body id="corps">
    <?php
        require_once('layouts/nav-bar-admin.php');
    ?>
    <main>
        <table class="TableResponsive">
            <thead>
                <tr>
                    <th colspan="9">Tous les utilisateurs</th>
                <tr>
                </tr>
                    <th>ID</th>
                    <th>FirstName</th>
                    <th>Name</th>
                    <th>Date Of Birth</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Passwords</th>
                    <th>Roles</th>
                    <th>Picture</th>
                </tr>
            </thead>    
            <tbody>
                <?php
                    $prep = $bdd->prepare("SELECT * FROM `users`");
                    $prep->execute();
                    $users= $prep->fetchall();
                    foreach($users as $user){
                        echo '
                        <tr>
                            <td data-label="ID">' .$user['Id_User']. '</td>
                            <td data-label="FirstName">' .$user['FirstName']. '</td>
                            <td data-label="Name">' .$user['Name_User']. '</td>
                            <td data-label="Date Of Birth">' .$user['Date_Of_Birth']. '</td>
                            <td data-label="Email">' .$user['E_mail']. '</td>
                            <td data-label="Phone">' .$user['Phone'].  '</td>
                            <td data-label="Passwords">' .$user['Passwords'].  '</td>
                            <td data-label="Roles">' .$user['Roles']. '</td>
                            <td data-label="Picture">' .$user['Picture_User'].  '</td>
                        </tr>';
                    }
                 ?>
            </tbody>
        </table>
        <!--<div>
            <table>
                <thead>
                    <tr>
                        <th  colspan="6">Article liées aux utilisateurs</th>
                    </tr>
                    <tr>
                        <th class="Title">FirstName</th>
                        <th class="Title">Name</th>
                        <th class="Title">Title</th>
                        <th class="Title">Picture</th>
                        <th class="Title">Contained</th>
                        <th class="Title">Created at</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php
                        $prep = $bdd->prepare("SELECT * FROM `users` u INNER JOIN `post` p WHERE u.Id_Post=p.Id_Post;");
                        $prep->execute();
                        $users= $prep->fetchall();
                        foreach($users as $user){
                            echo '
                            <tr>
                                <td class="AffichageUser">' .$user['FirstName']. '</td>
                                <td class="AffichageUser">' .$user['Name_User']. '</td>
                                <td class="AffichageUser">' .$user['Title'].  '</td>
                                <td class="AffichageUser">' .$user['Picture'].  '</td>
                                <td class="AffichageUser">' .$user['Contained'].  '</td>
                                <td class="AffichageUser">' .$user['Created_at'].  '</td>
                            </tr>';
                        }
                     ?>
                </tbody>
            </table>   
        </div>-->
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>