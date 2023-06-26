<?php
    require_once '../BDD/connexionBDD.php';
    require_once '../POO/User.php';
    session_start();
                
    $userRole = new User(0,'','','','','','','','');
    if (isset($_GET["role"])) {
        $userRole->UpdateUserRole($_SESSION['user']['mail'],$_GET["role"]);
        $_SESSION['user']['role']=$_GET["role"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main><!--
        <div id="button">
            <svg width="196" height="7" viewPort="0 0 196 70" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <text class="check" x="96" y="40" font-family="Montserrat" font-size="22" fill-opacity="1" text-anchor="middle" fill=#181717>
                SUBMIT
                </text>
                <text class="checkNode" x="96" y="40" font-family="Montserrat" font-size="22" fill-opacity="1" text-anchor="middle" fill=#181717>
                    ✔
                </text> 
            </svg>
        </div>
        <button class="btn" type="submit"><span>Submit</span><img src="https://i.cloudup.com/2ZAX3hVsBE-3000x3000.png" height="62" width="62"></button> <?php 
                /*require_once '../BDD/connexionBDD.php';
                require_once '../POO/Post.php';
                
                $post = new Post(2,'','','','','',0);
                
                $idUser = $post->DisplayUserID(8);
                $UserId = $idUser['Id_User'];

                $bdd = connexionBDD();

                $prep = $bdd->prepare("DELETE FROM `to_have` WHERE `Id_Post`=:idPost");
                $prep->bindValue(":idPost", 8);
                $prep->execute();

                $post->DeleteImagePost(8);
                $post->DeletePost(8);

                var_dump($idUser);
                var_dump($idUser['Id_User']);
                var_dump($UserId);

                $img = $post->LinkPicture();

                if('../'.$img['Picture'] != '../images/account.png'){
                    if (file_exists('../'.$img['Picture'])) {
                        echo "Le fichier ". $img['Picture'] ." existe.";
                    } else {
                        echo "Le fichier ". $img['Picture'] ." n'existe pas.";
                    }
                }*/
            ?>-->
            <?php
                $role = 1;
                echo $_GET['role'].' + '.$_GET['userID'];
                if($_SESSION['user']['role'] == "ROLE_USER"){
                    echo '<input id="ok" type="submit" onclick="myRole2(this,'.$role.')" value="ROLE_USER" style="background-color:green">';
                }
                if($_SESSION['user']['role'] == "ROLE_ADMIN"){
                    echo '<input id="ok" type="submit" onclick="myRole2(this,'.$role.')" value="ROLE_ADMIN" style="background-color:orange">';
                }
            ?>
    </main>
    <script src="../js/role.js"></script>
</body>
</html>