<?php


$apis = [
    '/articles'         => ['controller' => 'ArticleController', 'method' => 'getAllArticles'], 
    '/delete_articles'         => ['controller' => 'ArticleController', 'method' => 'deleteAllArticles'],
    '/articles/create'         => ['controller' => 'ArticleController', 'method' => 'createArticle'], 
    '/articles/get/{id}'           => ['controller' => 'ArticleController', 'method' => 'getArticleById'],
    '/articles/update/{id}'         => ['controller' => 'ArticleController', 'method' => 'updateArticleById'],
    '/articles/delete/{id}'            => ['controller' => 'ArticleController', 'method' => 'deleteArticleById'], 
    '/article/category/{id}'            =>['controller' => 'ArticleController', ',method' => 'getArticleByCategoryId'],

    '/categories'         => ['controller' => 'categoryController', 'method' => 'getAllCategories'],
    '/delete_categories'         => ['controller' => 'categoryController', 'method' => 'deleteAllCategories'],
    '/categories/create'         => ['controller' => 'categoryController', 'method' => 'createCategories'],         
    '/categories/get/{id}'           => ['controller' => 'categoryController', 'method' => 'getCategoryById'], 
    '/categories/update/{id}'         => ['controller' => 'categoryController', 'method' => 'updateCategoryById'], 
    '/categories/delete/{id}'            => ['controller' => 'categoryController', 'method' => 'deleteCategoryById'], 
    '/category/article/{id}'            =>['controller' => 'categoryController', ',method' => 'getCategoryByArticleId']
];