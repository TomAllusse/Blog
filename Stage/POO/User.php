<?php
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
        
        public function __construct(int $user_id, string $user_firstname,string $user_name,string $user_birth,string $user_mail,string $user_phone,string $user_pass,string $user_role,string $user_picture){
            $this->user_id = $user_id;
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
            return $this->user_phone;
        }
        public function getMail(){
            return $this->user_mail;
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
            return $prep->fetch();
        }
        
        public function UpdateUser(string $user_firstname,string $user_name,string $user_birth,string $user_mail, string $user_mailOLD,string $user_phone,string $user_picture){
            $bdd = connexionBDD();
            
            if($user_firstname != ''){
                $prep = $bdd->prepare("UPDATE `users` SET  `FirstName` = :prenom WHERE `E_mail` = :email;");
                $prep->bindValue(":email", $user_mailOLD);
                $prep->bindValue(":prenom", $user_firstname);
                $this->user_firstname = $user_firstname;
                $prep->execute();
            }
            if($user_name != ''){
                $prep = $bdd->prepare("UPDATE `users` SET  `Name_User` = :nom WHERE `E_mail` = :email;");
                $prep->bindValue(":email", $user_mailOLD);
                $prep->bindValue(":nom", $user_name);
                $this->user_name = $user_name;
                $prep->execute();
            }
            if($user_birth != ''){
                $prep = $bdd->prepare("UPDATE `users` SET `Date_Of_Birth` = :date WHERE `E_mail` = :email;");
                $prep->bindValue(":email", $user_mailOLD);
                $prep->bindValue(":date", $user_birth);
                $this->user_birth = $user_birth;
                $prep->execute();
            }
            if($user_mail != ''){
                $prep = $bdd->prepare("UPDATE `users` SET `E_mail` = :email WHERE `E_mail` = :emailOLD;");
                $prep->bindValue(":emailOLD", $user_mailOLD);
                $prep->bindValue(":email", $user_mail);
                $this->user_mail = $user_mail;
                $prep->execute();
            }
            if($user_phone != ''){
                $prep = $bdd->prepare("UPDATE `users` SET `Phone` = :numero WHERE `E_mail` = :email;");
                $prep->bindValue(":email", $user_mailOLD);
                $prep->bindValue(":numero", $user_phone);
                $this->user_phone = $user_phone;
                $prep->execute();
            }
            if($user_picture != ''){
                $prep = $bdd->prepare("UPDATE `users` SET `Picture_User` = :image WHERE `E_mail` = :email;");
                $prep->bindValue(":email", $user_mailOLD);
                $prep->bindValue(":image", $user_picture);
                $this->user_picture = $user_picture;
                $prep->execute();
            }
        }

        public function NomPrenom () {

            return $this->user_firstname.' '.$this->user_name;
    
        }

        public function MaxUserID(){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT MAX(Id_User) FROM `users`");
            $prep->execute();
            return $prep->fetchColumn();
        }

        public function DisplayUser(int $min, int $max){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT * FROM `users` WHERE `Id_User`> $min AND `Id_User`<= $max");
            $prep->execute();
            return $prep->fetchall();
        }

        public function DeleteImageUser(int $idUser){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT * FROM `users` WHERE `Id_User`=:id");
            $prep->bindValue(':id',$idUser);
            $prep->execute();
            $img = $prep->fetch();

            if('../'.$img['Picture_User'] != '../images/account.png'){
                unlink($img['Picture_User']);
            }
        }

        public function DeleteUser($user_id){
            $bdd = connexionBDD();

            $prep = $bdd->prepare("DELETE FROM `users` WHERE `Id_User`=:id");
            $prep->bindValue(":id", $user_id);
            $prep->execute();
        }
    }
?>