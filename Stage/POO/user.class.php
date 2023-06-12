<?php
    require_once '../BDD/connexionBDD.php';

    class user{
        private $user_id;
        private $user_firstname;
        private $user_name;
        private $user_birth;
        private $user_mail;
        private $user_phone;
        private $user_pass;
        private $user_role;
        private $user_picture;
        
        public function __construct($firstname, $name, $birth, $mail, $phone, $pass, $role, $picture){
            $this->user_firstname = $firstname;
            $this->user_name = $name;
            $this->user_birth = $birth;
            $this->user_mail = $mail;
            $this->user_phone = $phone;
            $this->user_pass = $pass;
            $this->user_role = $role;
            $this->user_picture = $picture;
        }
        
        /*GET*/

        public function getID(){
            return $this->user_id;
        }
        public function getFirstname(){
            return $this->user_firstname;
        }
        public function getName(){
            return $this->user_name;
        }
        public function getBirth(){
            return $this->user_birth;
        }
        public function getPhone(){
            return $this->user_mail;
        }
        public function getMail(){
            return $this->user_phone;
        }
        public function getPass(){
            return $this->user_pass;
        }
        public function getRole(){
            return $this->user_role;
        }
        public function getPicture(){
            return $this->user_picture;
        }

        /*SET*/

        public function setID($new_user_id){
            $this->user_id = $new_user_id;
        }
        public function setFirstname($new_user_firstname){
            $this->user_firstname = $new_user_firstname;
        }
        public function setName($new_user_name){
            $this->user_name = $new_user_name;
        }
        public function setBirth($new_user_birth){
            $this->user_birth = $new_user_birth;
        }
        public function setPhone($new_user_mail){
            $this->user_mail = $new_user_mail;
        }
        public function setMail($new_user_phone){
            $this->user_phone = $new_user_phone;
        }
        public function setPass($new_user_pass){
            $this->user_pass = $new_user_pass;
        }
        public function setRole($new_user_role){
            $this->user_role = $new_user_role;
        }
        public function setPicture($new_user_picture){
            $this->user_picture = $new_user_picture;
        }

        public function CreationUser(){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("INSERT INTO users (E_mail, Passwords, Roles) VALUES (:email, :passwords, :role)");
            $prep->bindValue(":email", $this->user_mail);
            $prep->bindValue(":passwords", $this->user_pass);
            $prep->bindValue(":role", 'ROLE_USER');
            $prep->execute();
        }

        public function ConnexionUser(){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT * FROM `users` where E_mail=:identifiant and Passwords=:passwords");
            $prep->bindValue(":identifiant", $this->user_mail);
            $prep->bindValue(":passwords", $this->user_pass);
            $prep->execute();
        }
        
        /*
        public function UpdateUser(){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("UPDATE `users` SET  `Phone` = :numero WHERE `E_mail` = :email;");
            $prep->bindValue(":email", $this->user_mail);
            $prep->bindValue(":numero", $this->user_phone);
            $prep->execute();
        }
        */

    }
?>