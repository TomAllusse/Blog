<?php
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
                    <th>Tous les utilisateurs</th>
                </tr>
            </thead>    
            <tbody>
                <tr>
                    <?php
                        $prep = $bdd->prepare("SELECT * FROM `users`");
                        $prep->execute();
                        $users= $prep->fetchall();
                        foreach($users as $user){
                            echo '
                            <td>' .$user['FirstName']. '</td>
                            <td>' .$user['Name_User']. '</td>
                            <td>' .$user['Date_Of_Birth'].  '</td>
                            <td>' .$user['E_mail']. '</td>
                            <td>' .$user['Phone'].  '</td>
                            <td>' .$user['Passwords'].  '</td>
                            <td>' .$user['Roles'].  '</td>
                            <td>' .$user['Picture_User'].  '</td>';
                        }
                    ?>
                </tr>
            </tbody>
        </table>  
        <table id="Tab2">
            <thead>
                <tr>
                    <th>Article liées aux utilisateurs</th>
                </tr>
            </thead>   
            <tbody>
                
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