<?php
include_once('Session.php');
include('Database.php');

class  User{
    private $db;
    public function __construct(){
       $this->db = new Database();
    }
    
    
    //Function for registration
    public function userRegistration($data){
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        
        $check_email = $this->emailCheck($email);
        
        if($name == "" OR $username == "" OR $email == "" OR $password == ""){
            $msg = "<div class='alert alert-danger'><strong>Error! </br> </strong>Field must not be Empty</div>";
            return $msg;
        }

        if(strlen($password) < 4){
            $msg = "<div class='alert alert-danger'><strong>Error! </br> </strong>Password too weak!</div>";
            return $msg;
        }
        
        if(strlen($username) < 3){
            $msg = "<div class = 'alert alert-danger'><strong>Error! </br></strong>Username is too short!</div>";
            return $msg;
        }elseif(preg_match('/[^a-z0-9_-]+/i',$username)){
            $msg = "<div class = 'alert alert-danger'><strong>Error! </br></strong>Username must only contain alphanumerical, dashes and underscores!</div>";
        }
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $msg = "<div class = 'alert alert-danger'><strong>Error!</br></strong>The email address is not valid!</div>";
            return $msg;
        }
        
        if($check_email == true){
            $msg = "<div class = 'alert alert-danger'><strong>Error! </br></strong>The email address already exists!</div>";
            return $msg;
        }
        
    
    $password = md5($data['password']);
    $sql = "INSERT INTO tbl_user(name, username, email, password) VALUES(:name, :username, :email, :password)";
    
    $query = $this->db->pdo->prepare($sql);
    $query->bindValue(':name', $name);
    $query->bindValue(':username', $username);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);
    $result = $query->execute();
    
    if($result){
        $msg = "<div class ='alert alert-success'><strong>Success! </strong>Thank you, you have been registered!</div>";
        return $msg;
    }else{
        $msg = "<div class ='alert alert-danger'><strong>Error! </strong>Sorry, there has been problem inserting your details!</div>";
        return $msg;
 
    }
    
}
    
    
    //Function for email check
    private function emailCheck($email){
        $sql = "SELECT email FROM tbl_user WHERE email = :email";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->execute();
        if($query->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    
    //user login function
    public function getLoginUser($email, $password){
         $sql = "SELECT * FROM tbl_user WHERE email = :email AND password = :password LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $password);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    
   
    //user login process function
   public function userLogin($data){
        $email = $data['email'];
        $password = md5($data['password']);
        $check_email = $this->emailCheck($email);
        
        if($email == "" OR $password == ""){
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be Empty</div>";
            return $msg;
        } 
       
       if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $msg = "<div class = 'alert alert-danger'><strong>Error!</strong>The email address is not valid!</div>";
            return $msg;
        }
        
        if($check_email == false){
            $msg = "<div class = 'alert alert-danger'><strong>Error!</br></strong>The email address does not exist!</div>";
            return $msg;
        }
       
       $result = $this->getLoginUser($email, $password);
       
       if($result){
           Session::init();
           Session::set("login", true);
           Session::set("id", $result->id);
           Session::set("name", $result->name);
           Session::set("username", $result->username);
           Session::set("loginmsg", "<div class='alert alert-success'><p><strong>You are logged in successfully!</strong></p></div>");
           
           header('Location: index.php');

       }else{
           $msg = "<div class='alert alert-danger'><strong>Error! </br></strong>Data not found!</div>";
           return $msg;
       }
   } 
    
    //to show all users data 
    public function getUserData(){
        $sql = "SELECT * FROM tbl_user ORDER BY id DESC";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
    
    //to show profile by id
    public function getUserByid($id){
        $sql = "SELECT * FROM tbl_user WHERE id = :id LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    
    
    //To update profile by id
    public function UpdateUserData($userid, $data){
        $id = $userid;
       $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        
        if($name == "" OR $username == "" OR $email == ""){
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be Empty</div>";
            return $msg;
        }
        
        if(strlen($username) < 3){
            $msg = "<div class = 'alert alert-danger'><strong>Error!</strong>Username is too short!</div>";
            return $msg;
        }elseif(preg_match('/[^a-z0-9_-]+/i',$username)){
            $msg = "<div class = 'alert alert-danger'><strong>Error!</strong>Username must only contain alphanumerical, dashes and underscores!</div>";
        }
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $msg = "<div class = 'alert alert-danger'><strong>Error!</strong>The email address is not valid!</div>";
            return $msg;
        }
        
    
    $sql = "UPDATE tbl_user SET 
    name = :name,
    username = :username,
    email = :email WHERE id = :id";
    
    $query = $this->db->pdo->prepare($sql);
    $query->bindValue(':name', $name);
    $query->bindValue(':username', $username);
    $query->bindValue(':email', $email);
    $query->bindValue(':id', $id);    
    $result = $query->execute();
    
    if($result){
        $msg = "<div class ='alert alert-success'><strong>Your profile has been successfully updated!</strong></div>";
        return $msg;
    }else{
        $msg = "<div class ='alert alert-danger'><strong>Error! </strong>Sorry, there has been problem updating your details!</div>";
        return $msg;
 
    } 
    }


    //Check whether password matches with database
    private function checkPassword($id, $old_pass){
        $password = md5($old_pass);
        $sql = "SELECT password FROM tbl_user WHERE id = :id AND password = :password";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id', $id);
        $query->bindValue(':password', $password);
        $query->execute();

        if($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    //Fucntion to update password
    public function updatePassword($id, $data){
        $old_pass = $data['old_password'];
        $new_pass = $data['password'];

        if($old_pass === "" OR $new_pass === "") {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> </br> Password must not be empty! </div>";

            return $msg;
        }

        $checkPass = $this->checkPassword($id, $old_pass);
        if($checkPass === false) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> </br>Old password does not match! </div>";
            return $msg;
        }

        if(strlen($new_pass) < 4) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> </br>New password is too weak. Use at least 4 chracters.</div>";
            return $msg;
        }

        $password = md5($new_pass);
        $sql = "UPDATE tbl_user set 
                password = :password
                WHERE id = :id";
        $query = $this->db->pdo->prepare($sql);
        
        $query->bindValue(':password', $password);
        $query->bindValue(':id', $id);
        $result = $query->execute();

        if($result) {
            $msg = "<div class='alert alert-success'><strong>Your password updated successfully!</strong></div>";
            return $msg;
        }else {
            $msg = "<div class='alert alert-success'><strong>Error!</strong>Your password not updated!</div>";
            return $msg;
        }        
    }
    
    
}
?>