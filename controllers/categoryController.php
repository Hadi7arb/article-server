<?php 

require(__DIR__ . "/../models/Category.php");
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/CategoryService.php");


class CategoryController{
    
    public function getAllCategories(){
        global $mysqli;
    try{
        if(!isset($_GET["id"])){
            $categories = Category::all($mysqli);
            $articles_array = CategoryService::categoriesToArray($categories); 
            echo $this->success($categories_array);
            return;
        }
        
        $id = $_GET["id"];
        $category = Category::find($mysqli, $id)->toArray();
        if(!$article) {
            echo $this->error("Article not found");
            return;
        }else{
            echo $this->success($category->toArray());
            return;
        }
    }catch (Exception $e){
        echo $this->error("server error: " . $e->getMessage(), 500);
    }
    }

    public function deleteAllCategories(){
        try{
            echo $this->success("All categories deleted");
        }catch(Exception $e){
            echo $this->error("Failed to delete categories", 500);
        }
    }
}
