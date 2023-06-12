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

                    function before() {
                        $_SESSION['max'] = $_SESSION['max'] - 10;
                        $_SESSION['min'] = $_SESSION['min'] - 10;
                    }
                    function after() {
                        $_SESSION['max'] = $_SESSION['max'] + 10;
                        $_SESSION['min'] = $_SESSION['min'] + 10;
                    }

                    $prep = $bdd->prepare("SELECT MAX(Id_User) FROM `users`");
                    $prep->execute();
                    $id= $prep->fetchColumn();
                    
                    if(isset($_GET['before'])){
                        before();
                    }else if (isset($_GET['after'])){
                        after();
                    }
                    
                    if(empty($_SESSION['max'])){
                        $_SESSION['max'] = 10;
                        $_SESSION['min'] = 0;
                    }
                    if($_SESSION['max'] <=0 || $_SESSION['max'] >= $id && ($id % 10) == 0 || $_SESSION['max'] >= ($id + 10)) {
                        $_SESSION['max'] = 10;
                        $_SESSION['min'] = 0;
                    }
                    $max = $_SESSION['max'];
                    $min = $_SESSION['min'];
                    if($max <= $id){
                        $prep = $bdd->prepare("SELECT * FROM `users` WHERE `Id_User`> $min AND `Id_User`<= $max");
                    }else{
                        $prep = $bdd->prepare("SELECT * FROM `users` WHERE `Id_User`> $min AND `Id_User`<= $id");
                    }
                    $prep->execute();
                    $users= $prep->fetchall();
                    foreach($users as $user){
                        echo '
                        <tr>
                            <td data-label="ID" class="top">' .$user['Id_User']. '</td>
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
        <div class="button2"> 
                <a href="admin.php?beforeArticle=true">
                    <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path class="arrow" d="M13.75 8.25C12.1879 9.8121 11.3121 10.6879 9.75 12.25L13.75 16.25" stroke="#F6F1F1" stroke-width="1.00088"/>
                        </g>
                    </svg>
                </a>
                <a href="admin.php?afterArticle=true">
                    <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path class="arrow2" d="M10.25 8.25C11.8121 9.8121 12.6879 10.6879 14.25 12.25L10.25 16.25" stroke="#F6F1F1"stroke-width="1.00088" stroke-linejoin="round"/>
                        </g>
                    </svg>
                </a>
            </div> 
        <div>
            <table  class="TableResponsive">
                <thead>
                    <tr>
                        <th  colspan="7">Article liées aux utilisateurs</th>
                    </tr>
                    <tr>
                        <th>ID Post</th>
                        <th>FirstName</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Picture</th>
                        <th>Contained</th>
                        <th>Created at</th>
                    </tr>
                </thead>   
                <tbody>
                <?php
                    function beforeArticle() {
                        $_SESSION['maxArticle'] = $_SESSION['maxArticle'] - 5;
                        $_SESSION['minArticle'] = $_SESSION['minArticle'] - 5;
                    }
                    function afterArticle() {
                        $_SESSION['maxArticle'] = $_SESSION['maxArticle'] + 5;
                        $_SESSION['minArticle'] = $_SESSION['minArticle'] + 5;
                    }

                    if(isset($_GET['beforeArticle'])){
                        beforeArticle();
                    }else if (isset($_GET['afterArticle'])){
                        afterArticle();
                    }

                    if(empty($_SESSION['maxArticle'])){
                        $_SESSION['maxArticle'] = 5;
                        $_SESSION['minArticle'] = 0;
                    }

                    if($_SESSION['maxArticle'] <=0 || $_SESSION['maxArticle'] >= $id && ($id % 5) == 0 || $_SESSION['maxArticle'] >= ($id + 5)) {
                        $_SESSION['maxArticle'] = 5;
                        $_SESSION['minArticle'] = 0;
                    }

                    $maxArticle = $_SESSION['maxArticle'];
                    $minArticle = $_SESSION['minArticle'];

                    $prep = $bdd->prepare("SELECT MAX(Id_Post) FROM `post`");
                    $prep->execute();
                    $idArticle= $prep->fetchColumn();
                    if($idArticle == 0){
                        $prep = $bdd->prepare("SELECT * FROM `post`");
                    }else if($maxArticle <= $idArticle){
                        $prep = $bdd->prepare("SELECT * FROM `users` u INNER JOIN `post` p WHERE u.Id_User=p.Id_User AND p.Id_Post > $minArticle AND p.Id_Post<= $maxArticle");
                    }else{
                        $prep = $bdd->prepare("SELECT * FROM `users` u INNER JOIN `post` p WHERE u.Id_User=p.Id_User AND p.Id_Post > $minArticle AND p.Id_Post <= $idArticle");
                    }

                    $prep->execute();
                    $users= $prep->fetchall();
                    foreach($users as $user){
                        echo '
                        <tr>
                            <td data-label="ID Post" class="top">' .$user['Id_Post']. '</td>
                            <td data-label="FirstName">' .$user['FirstName']. '</td>
                            <td data-label="Name">' .$user['Name_User']. '</td>
                            <td data-label="Title" class="contenue">' .$user['Title'].  '</td>
                            <td data-label="Picture" class="contenue">' .$user['Picture'].  '</td>
                            <td data-label="Contained" class="contenue">' .$user['Contained'].  '</td>
                            <td data-label="Created at" class="contenue">' .$user['Created_at'].  '</td>
                        </tr>';
                    }
                ?>
                </tbody>
            </table>
            <div class="button2"> 
                <a href="admin.php?beforeArticle=true">
                    <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path class="arrow" d="M13.75 8.25C12.1879 9.8121 11.3121 10.6879 9.75 12.25L13.75 16.25" stroke="#F6F1F1" stroke-width="1.00088"/>
                        </g>
                    </svg>
                </a>
                <a href="admin.php?afterArticle=true">
                    <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path class="arrow2" d="M10.25 8.25C11.8121 9.8121 12.6879 10.6879 14.25 12.25L10.25 16.25" stroke="#F6F1F1"stroke-width="1.00088" stroke-linejoin="round"/>
                        </g>
                    </svg>
                </a>
            </div> 
        </div>
    </main>
    <?php
        require_once('layouts/footer.php');
    ?>
</body>
<script src="js/javascript.js"></script>
</html>