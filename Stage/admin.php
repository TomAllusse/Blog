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
        <table id="Tab1">
            <thead>
                <tr>
                    <th colspan="8">Tous les utilisateurs</th>
                </tr>
            </thead>    
            <tbody>
                <tr>
                    <td class="AffichageUser">FirstName</td>
                    <td class="AffichageUser">Name</td>
                    <td class="AffichageUser">Date Of Birth</td>
                    <td class="AffichageUser">Email</td>
                    <td class="AffichageUser">Phone</td>
                    <td class="AffichageUser">Passwords</td>
                    <td class="AffichageUser">Roles</td>
                    <td class="AffichageUser">Picture</td>
                </tr>
                <?php
                    $prep = $bdd->prepare("SELECT * FROM `users`");
                    $prep->execute();
                    $users= $prep->fetchall();
                    foreach($users as $user){
                        echo '
                        <tr>
                            <td class="AffichageUser">' .$user['FirstName']. '</td>
                            <td class="AffichageUser">' .$user['Name_User']. '</td>
                            <td class="AffichageUser">' .$user['Date_Of_Birth'].  '</td>
                            <td class="AffichageUser">' .$user['E_mail']. '</td>
                            <td class="AffichageUser">' .$user['Phone'].  '</td>
                            <td class="AffichageUser">' .$user['Passwords'].  '</td>
                            <td class="AffichageUser">' .$user['Roles'].  '</td>
                            <td class="AffichageUser">' .$user['Picture_User'].  '</td>
                        </tr>';
                    }
                 ?>
            </tbody>
        </table>  
        <table id="Tab2">
            <thead>
                <tr>
                    <th  colspan="6">Article liées aux utilisateurs</th>
                </tr>
            </thead>   
            <tbody>
                <tr>
                    <td class="AffichageUser">FirstName</td>
                    <td class="AffichageUser">Name</td>
                    <td class="AffichageUser">Title</td>
                    <td class="AffichageUser">Picture</td>
                    <td class="AffichageUser">Contained</td>
                    <td class="AffichageUser">Created at</td>
                </tr>
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
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<?php
    require_once('layouts/footer.php');
?>
<script src="js/javascript.js"></script>
</html>