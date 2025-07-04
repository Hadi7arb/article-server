<?php


require_once("Model.php");

class Category extends Model{

    private int $category_id; 
    private string $name;  
    
    protected static string $table = "categories";

    public function __construct(array $data){
        $this->categoryId = $data["category_id"];
        $this->name = $data["name"];
    }

    public function getId(): int {
        return $this->category_id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function toArray(){
        return [$this->category_id, $this->name];
    }
    
}
