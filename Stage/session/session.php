<?php
    session_start();
    
    if(empty($id) && empty($nom) && empty($role) && empty($hash)){
        $_SESSION['Identifiant'] = 'Aucun';
        $_SESSION['Name'] = 'Inviter';
        $_SESSION['Role'] = 'ROLE_READER';
    }
    else
    {
        $_SESSION['Identifiant'] = $id;
        $_SESSION['Name'] = $nom;
        $_SESSION['Role'] = $role;
        $_SESSION['Password'] = $hash;

        $id_session = session_id();

        /*echo '<br> ID = '.$ID.' <br> PASSWORD = ' .$NOM. ' <br> Role = ' .$ROLE. '<br>';

        if($id_session){
            echo '<br>ID de session : ' .$id_session. '<br>';
        }*/
    }
?>