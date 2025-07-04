<?php 

require(__DIR__ . "/../models/Article.php");
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/ArticleService.php");


class ArticleController{
    
    public function getAllArticles(){
        global $mysqli;
    try{
        if(!isset($_GET["id"])){
            $articles = Article::all($mysqli);
            $articles_array = ArticleService::articlesToArray($articles); 
            echo $this->success($articles_array);
            return;
        }
        
        $id = $_GET["id"];
        $article = Article::find($mysqli, $id)->toArray();
        if(!$article) {
            echo $this->error("Article not found");
            return;
        }else{
            echo $this->success($articles->toArray());
            return;
        }
    }catch (Exception $e){
        echo $this->error("server error: " . $e->getMessage(), 500);
    }
    }

    public function deleteAllArticles(){
        try{
            echo $this->success("All articles deleted");
        }catch(Exception $e){
            echo $this->error("Failed to delete articles", 500);
        }
    }
}
