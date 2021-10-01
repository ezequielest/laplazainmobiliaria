<?php
class CrudMagazine {

    private $conn; 

    function __construct() {
        $this->conn = new DbConnection();
    }

    public function getAll() {
        $query = $this->conn->connection->query('SELECT * FROM magazines');
        $rows = $query->fetchAll();
        return $rows;
    }

    public function getById($id) {
        $query = $this->conn->connection->query('SELECT * FROM magazines WHERE category_id = ' . $id);
        $rows = $query->fetchAll();
        return $rows;
    }

    public function save() {
        $this->creation_date = date('Y-m-d');
        $query = $this->conn->connection->query(
            "INSERT INTO magazines (name, description, category_id, creation_date, relevant_month, enabled) 
            values ('$this->name','$this->description', '$this->category_id', '$this->creation_date', '$this->relevant_month','$this->enabled')"
        );
        $rows = $query->fetchAll();
        echo json_encode($rows);
        return $rows;
    }
}

?>