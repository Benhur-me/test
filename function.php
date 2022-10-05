<?php
session_start();

class Connection{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "reglog";
    public $conn;

    public function_construct(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->reglog);

    }
}

class Register extends Connection{
    public function registration($name, $username, $email, $password, $confirmpassword){
        $duplicate = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
        if($mysqli_num_rows($duplicate) > 0){
            return 10;

            //USERNAME OR EMAIL HAS ALREADY TAKEN
        }
        else{
            if($password == $confirmpassword){
                $query == "INSERT INTO tb_user VALUES('', '$name', '$username', '$email', '$password')";
                $mysqli_query($this->conn, $query);
                return 1;
                //REGISTRATION SUCCESSFUL

            }
            else{
                return 100;
                //PASSWORD DOES NOT MATCH
            }
        }
    }
}
?>
