<?php

class CV {

    private $db;
    public function __construct() {
        $this->db = new Database();
    }

    public function insert($data = [])
    {
        $this->db->query("INSERT INTO cvs (UserID, title, content) VALUES (:UserID, :title, :content);");
        $this->db->bind(':UserID', $data['UserID']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function update($data = [])
    {
        $this->db->query("UPDATE cvs SET title = :title, content = :content WHERE ID = :id");
        $this->db->bind(":title", $data['title']);
        $this->db->bind(":content", $data['content']);
        $this->db->bind(":id", $data['miniCvId']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM cvs WHERE ID = :id");
        $this->db->bind(":id", $id);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getMiniCVs($id, $page = '')
    {
        $this->db->query('SELECT * FROM cvs WHERE UserID = :UserID');
        $this->db->bind(':UserID', $id);
        $row = $this->db->resultSet();
        return $row;
    }

    public function isEditable($userId, $miniCvId)
    {
        $this->db->query("SELECT * FROM cvs WHERE ID = :ID");
        $this->db->bind(":ID", $miniCvId);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            if($row->UserID == $userId){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getMiniCvById($id)
    {
        $this->db->query("SELECT * FROM cvs WHERE ID = :ID");
        $this->db->bind(":ID", $id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            return $row;
        } else {
            return false;
        }
    }

    
}

?>