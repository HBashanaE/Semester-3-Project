<?php
class Advertisement{

    private $id ;
    private $discription;
    private $title;
    private $image;
    private $location;

    public function __construct(){
        echo "this class " . __CLASS__ . " created<br>";
    }
    public function getId(){
      return $this->id ;
    }
    public function getDescription(){
        return $this->discription ;
    }
    public function getTitle(){
        return $this->title ;
    }public function getImage(){
        return $this->image;
    }
    public function getLocation(){
        return $this->location ;
    }
    public function setId($id){
        $this->id = $id ;
      }
      public function setDescription($des){
        $this->discription = $des ;
      }
      public function setTitle($title){
        $this->title = $title;
      }public function setImage($image){
          $this->image = $image;
      }
      public function setLocation($loc){
          $this->location = $loc ;
      }

}
?>