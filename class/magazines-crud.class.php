<?php

include_once('db.class.php');
include_once('../models/magazine.class.php');
class MagazineCrud {

    private $conn; 

    function __construct() {
        $this->conn = new DbConnection();
    }

    public function getAll() {
        $query = $this->conn->connection->query('SELECT * FROM magazines');
        $rows = $query->fetchAll();
        return $this->fillMagazine($rows);
    }

    public function getById($id) {
        $query = $this->conn->connection->query('SELECT * FROM magazines WHERE category_id = ' . $id);
        $rows = $query->fetchAll();
        return $this->fillMagazine($rows);
    }

    public function save() {
        $this->creation_date = date('Y-m-d');
        $query = $this->conn->connection->query(
            "INSERT INTO magazines (name, description, category_id, creation_date, relevant_month, enabled) 
            values ('$this->name','$this->description', '$this->category_id', '$this->creation_date', '$this->relevant_month','$this->enabled')"
        );
        $rows = $query->fetchAll();

        return $rows;
    }

    private function fillMagazine($rows) {
        $magazineList = [];
        $magazineObj = new Magazine();
        foreach($rows as $magazine) {
            $magazineObj->setName($magazine['name']);
            $magazineObj->setDescription($magazine['description']);
            $magazineObj->setLink($magazine['link']);
            $magazineObj->setCategoryId($magazine['category_id']);
            $magazineObj->setEnabled($magazine['enabled']);
            $magazineObj->setRelevantMonth($magazine['relevant_month']);
            $magazineObj->setCreationDate(date('Y-m-d'));

            array_push($magazineList, $magazine);
        }
        return $magazineList;
    }
}

?>