<?php
    require('User.php');

    $user_test = new User(0,'','','','','','','','');
    
    $user = $user_test->ConnexionUser('tomallusse453@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$MnY2YjRMYW5uZ1JKbzdCVA$1o0BQnp9K5JW9zhUOsd3tNA8kJ4RXZmD5azgAyPqlj0');
    $user_test = new User($user['Id_User'], $user['FirstName'], $user['Name_User'], $user['Date_Of_Birth'], $user['E_mail'], $user['Phone'], $user['Passwords'], $user['Roles'], $user['Picture_User']);
    echo '<br>';
    echo '<br>';
    echo $user_test->getID().'/'.$user_test->getFirstname().'/'.$user_test->getName().'/'.$user_test->getBirth().'/'.$user_test->getPhone().'/'.$user_test->getMail().'/'.$user_test->getPass().'/'.$user_test->getRole().'/'.$user_test->getPicture();
    echo '<br>';
    echo '<br>';
    echo $user_test->NomPrenom();
?>