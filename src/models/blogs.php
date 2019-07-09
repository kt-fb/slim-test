<?php

function get_blog_by_id($id){
    GLOBAL $PDO;
    $stmt = $PDO->prepare('SELECT * FROM blog WHERE blog_id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function get_blog_list($args){
    GLOBAL $PDO;
    $page_number = (int)$args['page_number'];
    $entry_per_page = $args['entry_per_page'];
    $start_limit = $entry_per_page*($page_number - 1) + 1;
    $stmt = $PDO->prepare('SELECT * FROM `blog` WHERE status = 1 ORDER BY `blog`.`date`  DESC LIMIT ?,?');
    $stmt->execute([ $start_limit , $entry_per_page ]);
    
    $blogs = $stmt->fetchAll();
    $total_entries = count($blogs);

    return [
        'total_entries' => $total_entries,
        'page_number' => $page_number,
        'blogs' => $blogs
    ];
}

function get_all_blog_category(){
    GLOBAL $PDO;
    $stmt = $PDO->query('SELECT * FROM blog_category');
    return $stmt->fetchAll();
}

function get_blog_list_by_cat_id($cat_id,$args){
    GLOBAL $PDO;
    $page_number = (int)$args['page_number'];
    $entry_per_page = $args['entry_per_page'];
    $start_limit = $entry_per_page*($page_number - 1) + 1;
    $stmt = $PDO->prepare('SELECT * FROM `blog`  WHERE 	blog_category = ? ORDER BY `blog`.`date` DESC LIMIT ?,?');
    $stmt->execute([ $cat_id, $start_limit , $entry_per_page ]);
    $blogs = $stmt->fetchAll();
    $total_entries = count($blogs);
    return [
        'total_entries' => $total_entries,
        'page_number' => $page_number,
        'blogs' => $blogs
    ];
}
