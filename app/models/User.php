<?php
class User {

    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findUserById($id)
    {
        $this->db->query("SELECT users.*, countries.country_name AS country FROM users
                        INNER JOIN countries ON users.nationality = countries.id
                        WHERE users.ID = :id");
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        //Check Rows
        if($this->db->rowCount() > 0){
            return $row;
        } else {
            return false;
        }
    }

    public function findUserByEmail ($email) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //Check Rows
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function findUserByUsername ($username) {
        $this->db->query("SELECT * FROM users WHERE username = :username");
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        //Check Rows
        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function register($data = [])
    {
        $this->db->query("INSERT INTO users(username, password, fullname ,email)
                        VALUES(:username, :password, :fullname, :email)");
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':fullname', $data['fullname']);
        $this->db->bind(':email'   , $data['email']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($data = [])
    {
        $userEmail = $data['email'];
        $userPassword = $data['password'];
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email'   , $userEmail);
        $row = $this->db->single();
        if($this->db->rowCount() < 1){
            return false;
        } else {
            $hashedUserPassword = $row->password;
            if(password_verify($userPassword, $hashedUserPassword)){
                return $row;
            } else {
                return false;
            }
        }
    }

    public function getCountries()
    {
        $this->db->query("SELECT * FROM countries");
        $row = $this->db->resultSet();
        return $row;
    }
}
?>