<?php

    require_once 'BDD/connexionBDD.php';

    $bdd = connexionBDD();    

    session_start();

    $role = $_SESSION['user']['role'];
    if ( $role != 'ROLE_ADMIN') {
        header('Location: index.php');
        exit();
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
    <link rel="stylesheet" href="test.css">
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
                    <th>Roles</th>
                    <th>Picture</th>
                </tr>
            </thead>    
            <tbody>
                <?php
                    if (isset($_POST['button'])) {
                        echo $_POST['button'];
                    }
                    $prep = $bdd->prepare("SELECT MAX(Id_User) FROM `users`");
                    $prep->execute();
                    $id= $prep->fetchColumn();
                    if(!empty($_SESSION['max'])){
                        $_SESSION['max'] = 10;
                        $_SESSION['min'] = 0;
                        $max = $_SESSION['max'];
                        $min = $_SESSION['min'];
                    }if(isset($_SESSION['Button']) && $_SESSION['Button'] == 'before'){
                        $_SESSION['max'] = $_SESSION['max'] - 10;
                        $_SESSION['min'] = $_SESSION['min'] - 10;
                        $max = $_SESSION['max'];
                        $min = $_SESSION['min'];
                        if($_SESSION['max'] <=0) {
                            $_SESSION['max'] = 10;
                            $_SESSION['min'] = 0;
                            $max = $_SESSION['max'];
                            $min = $_SESSION['min'];
                        }
                    }else if(isset($_SESSION['Button']) && $_SESSION['Button'] == 'after'){
                        echo $_SESSION['max'].'-'. $_SESSION['min'].'<br>';
                        $_SESSION['max'] = $_SESSION['max'] + 10;
                        $_SESSION['min'] = $_SESSION['min'] + 10;
                        $max = $_SESSION['max'];
                        $min = $_SESSION['min'];
                        echo $_SESSION['max'].'-'. $_SESSION['min'].'<br>';
                        var_dump($_SESSION['max'] >= $id, $id%10 == 0, $_SESSION['max'] >= $id+10);
                        /*if($_SESSION['max'] >= $id && $id%10 == 0 || $_SESSION['max'] >= $id+10) {
                            $_SESSION['max'] = 10;
                            $_SESSION['min'] = 0;
                            $max = $_SESSION['max'];
                            $min = $_SESSION['min'];
                        }*/
                    }

                    if($max <= $id){
                        echo $max.'-x-'. $min.'<br>';
                        $prep = $bdd->prepare("SELECT * FROM `users` WHERE `Id_User`> $min AND `Id_User`<= $max");
                    }else{
                        echo $id.'x'. $min.'<br>';
                        $prep = $bdd->prepare("SELECT * FROM `users` WHERE `Id_User`> $min AND `Id_User`<= $id");
                    }
                    $prep->execute();
                    $users= $prep->fetchall();
                    foreach($users as $user){
                        echo '
                        <tr>
                            <td data-label="ID" id="top">' .$user['Id_User']. '</td>
                            <td data-label="FirstName">' .$user['FirstName']. '</td>
                            <td data-label="Name">' .$user['Name_User']. '</td>
                            <td data-label="Date Of Birth">' .$user['Date_Of_Birth']. '</td>
                            <td data-label="Email">' .$user['E_mail']. '</td>
                            <td data-label="Phone">' .$user['Phone'].  '</td>
                            <td data-label="Roles">' .$user['Roles']. '</td>
                            <td data-label="Picture">' .$user['Picture_User'].  '</td>
                        </tr>';
                    }
                 ?>
            </tbody>
        </table>
        <form action="admin.php" method="post">
            <div id="button2"> 
                <button class="svg-button" type="submit" name="button" value="before"></button>
                    <svg class="arrow-svg" width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path class="arrow" d="M12.25 8.25C10.6879 9.8121 9.8121 10.6879 8.25 12.25L12.25 16.25" stroke="#F6F1F1" stroke-width="1.00088" />
                        </g>
                    </svg>
                </button>
            </div>
            <div id="button2"> 
                <button class="svg-button" type="submit" name="button" value="after"></button>
                    <svg class="arrow2-svg"width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path class="arrow2" d="M11.75 8.25C13.3121 9.8121 14.1879 10.6879 15.75 12.25L11.75 16.25" stroke="#F6F1F1" stroke-width="1.00088"/>
                        </g>
                    </svg>
            </div>
        </form>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>

</body>
<script src="js/javascript.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var svgButtons = document.getElementsByClassName('svg-button');
        
        for (var i = 0; i < svgButtons.length; i++) {
            svgButtons[i].addEventListener('click', handleButtonClick);
        }
        
        function handleButtonClick(event) {
            // Votre code pour gérer le clic sur le bouton SVG ici
            event.preventDefault(); // Empêche le formulaire de se soumettre si nécessaire
            console.log('Bouton SVG cliqué');
            // Effectuez les actions souhaitées ici
        }
    });
</script>
</html>

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
                <?php /*
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
                        }*/
                     ?>
                </tbody>
            </table>   
        </div>-->