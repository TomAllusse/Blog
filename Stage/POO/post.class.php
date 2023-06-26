<?php
    class post{
        private int $post_id;
        private string $post_title;
        private string $post_picture;
        private string $post_contained;
        private string $post_created_at;
        private int $post_user_id;
        
        public function __construct(string $title,string $picture,string $contained,int $id){
            $this->post_title = $title;
            $this->post_picture = $picture;
            $this->post_contained = $contained;
            $this->post_user_id = $id;
        }
        
        /*GET*/

        public function getID(){
            return $this->post_id;
        }
        public function getTitle(){
            return $this->post_title;
        }
        public function getPicture(){
            return $this->post_picture;
        }
        public function getContained(){
            return $this->post_contained;
        }
        public function getCreatedAt(){
            return $this->post_created_at;
        }
        public function getUserID(){
            return $this->post_user_id;
        }

        /*SET*/

        public function setID(int $new_post_id){
            $this->post_id = $new_post_id;
        }
        public function setTitle(string $new_post_title){
            $this->post_title = $new_post_title;
        }
        public function setPicture(string $new_post_picture){
            $this->post_picture = $new_post_picture;
        }
        public function setContained(string $new_post_contained){
            $this->post_contained = $new_post_contained;
        }
        public function setCreatedAt(string $new_post_created_at){
            $this->post_created_at = $new_post_created_at;
        }
        public function setUserID(string $new_post_user_id){
            $this->post_user_id = $new_post_user_id;
        }

        public function CreationPost(){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("INSERT INTO post (Title, Picture, Contained, Created_at, Id_User) VALUES (:title, :images, :Contained, now(),:id_user)");
            $prep->bindValue(":id_user", $this->post_user_id);
            $prep->bindValue(":title", $this->post_title);
            $prep->bindValue(":Contained", $this->post_contained);
            $prep->bindValue(":images", $this->post_picture);
            $prep->execute();
        }

        public function AffichagePost(){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT * FROM `post` where E_mail=:identifiant");
            $prep->bindValue(":identifiant", $this->post_id);
            $prep->execute();
        }
    }
?>