<?php
    function verifEmail($email){
        /*if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = 0;
        }else{
            $emailErr = 1;
        }
        return $emailErr;*/
        $regex = '/^[^\W][a-zA-Z0-9]+([\-\._]?[a-zA-Z0-9]+)*[^\W]@[^\W][a-zA-Z0-9\-\._]+[^\W]\.[a-zA-Z]{2,6}$/';
        if(preg_match($regex, $email)) {
            return TRUE;
        }
        return FALSE;
    }
?>