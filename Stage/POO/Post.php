<?php
    class Post{
        private int $post_id;
        private string $post_title;
        private string $post_picture;
        private string $post_contained;
        private string $post_created_at;
        private int $post_user_id;
        
        public function __construct(string $post_title,string $post_picture,string $post_contained,int $post_user_id){
            $this->post_title = $post_title;
            $this->post_picture = $post_picture;
            $this->post_contained = $post_contained;
            $this->post_user_id = $post_user_id;
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

        public function CreationPost(int $id, string $title, string $contained, string $picture){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("INSERT INTO post (Title, Picture, Contained, Created_at, Id_User) VALUES (:title, :images, :Contained, now(),:id_user)");
            $prep->bindValue(":id_user", $id);
            $prep->bindValue(":title", $title);
            $prep->bindValue(":Contained", $contained);
            $prep->bindValue(":images", $picture);
            $prep->execute();
        }

        public function AffichagePost(int $id){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT * FROM `post` where E_mail=:identifiant");
            $prep->bindValue(":identifiant", $id);
            $prep->execute();
        }

        public function MaxPostID(){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT MAX(Id_Post) FROM `post`");
            $prep->execute();
            return $prep->fetchColumn();
        }

        public function DisplayPost(int $min, int $max){
            $bdd = connexionBDD();
            
            $prep = $bdd->prepare("SELECT * FROM `users` u INNER JOIN `post` p WHERE u.Id_User=p.Id_User AND p.Id_Post > $min AND p.Id_Post<= $max");
            $prep->execute();
            return $prep->fetchall();
        }
    }
?>