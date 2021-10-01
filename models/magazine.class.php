<?php
class Magazine {
    private $name;
    private $description;
    private $category_id;
    private $creation_date;
    private $relevant_month;
    private $enabled;

    function __construct() {}

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name();
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function setRelevantMonth($relevant_month) {
        $this->relevant_month = $relevant_month;
    }

    public function getRelevantMonth() {
        $this->getRelevantMonth;
    }

    public function setEnabled($enabled) {
        $this->enabled = intval($enabled);
    }

    public function getEnabled() {
        return $this->enabled;
    }
}

?>