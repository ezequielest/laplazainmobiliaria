<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

require_once 'db.class.php';
//require '../../models/magazine.class.php';
require_once $root . '\laplazainmobiliaria\models\magazine.class.php';
class MagazineCrud {
    
    private $conn; 

    function __construct() {
        $this->conn = new DbConnection();
    }

    public function getAll() {
        $query = $this->conn->connection->query('SELECT * FROM magazines ORDER BY id DESC LIMIT 10');
        $rows = $query->fetchAll();
        return $this->fillMagazine($rows);
    }

    public function getById($id) {
        $query = $this->conn->connection->query('SELECT * FROM magazines WHERE id = ' . $id . ' ORDER BY id DESC LIMIT 10');
        $row = $query->fetch();

        $magazineObj = new Magazine();

        $magazineObj->setId($row['id']);
        $magazineObj->setName($row['name']);
        $magazineObj->setDescription($row['description']);
        $magazineObj->setLink($row['link']);
        $magazineObj->setCategoryId($row['category_id']);
        $magazineObj->setEnabled($row['enabled']);
        $magazineObj->setRelevantMonth($row['relevant_month']);
        $magazineObj->setCreationDate(date('Y-m-d'));
  
        return $magazineObj;
    }

    public function getByCategoryId($id) {
        $query = $this->conn->connection->query('SELECT * FROM magazines WHERE category_id = ' . $id . 'ORDER BY id DESC');
        $rows = $query->fetchAll();
        return $this->fillMagazine($rows);
    }

    public function save($magazine) {
        $this->creation_date = date('Y-m-d');
        $query = $this->conn->connection->prepare(
            'INSERT INTO magazines (name, description, link, category_id, creation_date, relevant_month, enabled) 
            values (:name,:description,:link,:categoryId,:creationDate,:relevantMonth,:enabled)'
        );

        $query->bindValue('name', $magazine->getName());
        $query->bindValue('description', $magazine->getDescription());
        $query->bindValue('link', $magazine->getLink());
        $query->bindValue('categoryId', $magazine->getCategoryId());
        $query->bindValue('creationDate',  $this->creation_date);
        $query->bindValue('relevantMonth', $magazine->getRelevantMonth());
        $query->bindValue('enabled', $magazine->getEnabled());

        $query->execute();
    }

    public function update($magazine) {
        $query = $this->conn->connection->prepare(
            'UPDATE magazines 
            SET 
                name = :name, 
                description        = :description, 
                link               = :link, 
                category_id        = :categoryId,
                relevant_month     = :relevantMonth,
                enabled            = :enabled
            WHERE id = :id'
        );

        $query->bindValue('name', $magazine->getName());
        $query->bindValue('description', $magazine->getDescription());
        $query->bindValue('link', $magazine->getLink());
        $query->bindValue('categoryId', $magazine->getCategoryId());
        $query->bindValue('relevantMonth', $magazine->getRelevantMonth());
        $query->bindValue('enabled', $magazine->getEnabled());
        $query->bindValue('id', $magazine->getId());

        $query->execute();
    }

    public function deleteById($id) {
        $query = $this->conn->connection->prepare('DELETE FROM magazines WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
    }

    private function fillMagazine($rows) {
        $magazineList = [];
        $magazineObj = new Magazine();
        foreach($rows as $magazine) {
            $magazineObj->setId($magazine['id']);
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

    public function getCurrentMagazine($categoryId) {
        $currentMonth = date('m');
        $currentYear= date('Y');
        $cantOfDaysInMonth = date('t');

        $query = $this->conn->connection->query("
            SELECT * FROM magazines WHERE category_id = ' . $categoryId . ' 
            AND enabled =  1 
            AND relevant_month >= '$currentYear-$currentMonth-1' 
            AND relevant_month <= '$currentYear-$currentMonth-$cantOfDaysInMonth'
            LIMIT 1"
        );

        $row = $query->fetch();

        if ($row == null) {
            $query = $this->conn->connection->query("SELECT * FROM magazines WHERE category_id = $categoryId AND enabled = 1 LIMIT 1");
            $row = $query->fetch();
        }

        if ($row) {
            $magazineObj = new Magazine();

            $magazineObj->setId($row['id']);
            $magazineObj->setName($row['name']);
            $magazineObj->setDescription($row['description']);
            $magazineObj->setLink($row['link']);
            $magazineObj->setCategoryId($row['category_id']);
            $magazineObj->setEnabled($row['enabled']);
            $magazineObj->setRelevantMonth($row['relevant_month']);
            $magazineObj->setCreationDate(date('Y-m-d'));
    
            return $magazineObj;
        }

        
    }
}

?>