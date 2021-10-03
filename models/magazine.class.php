<?php
class Magazine {
    private $id;
    private $name;
    private $description;
    private $link;
    private $categoryId;
    private $creationDate;
    private $relevantMonth;
    private $enabled;

    function __construct() {}

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setLink($link) {
        $this->link = $link;
    }

    public function getLink() {
        return $this->link;
    }

    public function setCategoryId($categoryId) {
        $this->categoryId = $categoryId;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    public function setRelevantMonth($relevantMonth) {
        $this->relevantMonth = $relevantMonth;
    }

    public function getRelevantMonth() {
        return $this->relevantMonth;
    }

    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setEnabled($enabled) {
        $this->enabled = intval($enabled);
    }

    public function getEnabled() {
        return $this->enabled;
    }
}

?>