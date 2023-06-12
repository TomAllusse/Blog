<?php
    require_once '../BDD/connexionBDD.php';

    class User{
        private int $user_id;
        private string $user_firstname;
        private string $user_name;
        private string $user_birth;
        private string $user_mail;
        private string $user_phone;
        private string $user_pass;
        private string $user_role;
        private string $user_picture;
        
        public function __construct(string $user_firstname,string $user_name,string $user_birth,string $user_mail,string $user_phone,string $user_pass,string $user_role,string $user_picture){
            $this->user_firstname = $user_firstname;
            $this->user_name = $user_name;
            $this->user_birth = $user_birth;
            $this->user_mail = $user_mail;
            $this->user_phone = $user_phone;
            $this->user_pass = $user_pass;
            $this->user_role = $user_role;
            $this->user_picture = $user_picture;
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

        public function setID(int $new_user_id){
            $this->user_id = $new_user_id;
        }
        public function setFirstname(string $new_user_firstname){
            $this->user_firstname = $new_user_firstname;
        }
        public function setName(string $new_user_name){
            $this->user_name = $new_user_name;
        }
        public function setBirth(string $new_user_birth){
            $this->user_birth = $new_user_birth;
        }
        public function setPhone(string $new_user_mail){
            $this->user_mail = $new_user_mail;
        }
        public function setMail(string $new_user_phone){
            $this->user_phone = $new_user_phone;
        }
        public function setPass(string $new_user_pass){
            $this->user_pass = $new_user_pass;
        }
        public function setRole(string $new_user_role){
            $this->user_role = $new_user_role;
        }
        public function setPicture(string $new_user_picture){
            $this->user_picture = $new_user_picture;
        }

        public function CreationUser(string $mail, string $pass){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("INSERT INTO users (E_mail, Passwords, Roles) VALUES (:email, :passwords, :role)");
            $prep->bindValue(":email", $mail);
            $prep->bindValue(":passwords", $pass);
            $prep->bindValue(":role", 'ROLE_USER');
            $prep->execute();
        }

        public function ConnexionUser(string $mail, string $pass){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT * FROM `users` where E_mail=:identifiant and Passwords=:passwords");
            $prep->bindValue(":identifiant", $mail);
            $prep->bindValue(":passwords", $pass);
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