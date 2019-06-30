<?php

function get_business_by_id($id){
    GLOBAL $PDO;
    $stmt = $PDO->prepare('SELECT * FROM business WHERE business_id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function get_all_businesses($args){
    GLOBAL $PDO;
    $page_number = (int)$args['page_number'];
    $entry_per_page = $args['entry_per_page'];
    $start_limit = $entry_per_page*($page_number - 1) + 1;
    $stmt = $PDO->prepare('SELECT * FROM `businesses` LIMIT ?,?');
    $stmt->execute([ $start_limit , $entry_per_page ]);
    $businesses = $stmt->fetchAll();
    $total_entries = count($businesses);
    return [
        'total_entries' => $total_entries,
        'page_number' => $page_number,
        'businesses' => $businesses
    ];
}

function get_all_business_categories($args){
    GLOBAL $PDO;
    $page_number = (int)$args['page_number'];
    $entry_per_page = $args['entry_per_page'];
    $start_limit = $entry_per_page*($page_number - 1) + 1;
    $stmt = $PDO->query('SELECT * FROM business_category LIMIT ?,?');
    $stmt->execute([ $start_limit , $entry_per_page ]);
    $categories = $stmt->fetchAll();
    return [
        'total_entries' => $total_entries,
        'page_number' => $page_number,
        'categories' => $categories
    ];
}

function get_businesses_by_category_id($id, $args){
    $page_number = (int)$args['page_number'];
    $entry_per_page = $args['entry_per_page'];
    $start_limit = $entry_per_page*($page_number - 1) + 1;

    // $stmt = $PDO->query(' your query with limits ');
    // $stmt->execute([ $id , $start_limit , $entry_per_page ]);
    // $businesses = $stmt->fetchAll();

    return [];
}

function get_business_subcategories_by_category_id($cat_id,$args){
    GLOBAL $PDO;
    $page_number = (int)$args['page_number'];
    $entry_per_page = $args['entry_per_page'];
    $start_limit = $entry_per_page*($page_number - 1) + 1;
    // $stmt = $PDO->prepare('SELECT * FROM `blog`  WHERE 	blog_category = ? ORDER BY `blog`.`date` DESC LIMIT ?,?');
    // $stmt->execute([ $cat_id, $start_limit , $entry_per_page ]);
    // $subcategories = $stmt->fetchAll();
    // $total_entries = count($subcategories);
    return [
        'total_entries' => 0,
        'page_number' => $page_number,
        'subcategories' => []
    ];
}
function get_all_business_subcategories($args){
    GLOBAL $PDO;
    $page_number = (int)$args['page_number'];
    $entry_per_page = $args['entry_per_page'];
    $start_limit = $entry_per_page*($page_number - 1) + 1;
    // $stmt = $PDO->prepare('SELECT * FROM `blog`  WHERE 	blog_category = ? ORDER BY `blog`.`date` DESC LIMIT ?,?');
    // $stmt->execute([ $cat_id, $start_limit , $entry_per_page ]);
    // $subcategories = $stmt->fetchAll();
    // $total_entries = count($subcategories);
    return [
        'total_entries' => 0,
        'page_number' => $page_number,
        'subcategories' => []
    ];
}

function get_all_businesses_by_subcategory_id($sub_cat_id,$args){
    GLOBAL $PDO;
    $page_number = (int)$args['page_number'];
    $entry_per_page = $args['entry_per_page'];
    $start_limit = $entry_per_page*($page_number - 1) + 1;
    // $stmt = $PDO->prepare('SELECT * FROM `blog`  WHERE 	blog_category = ? ORDER BY `blog`.`date` DESC LIMIT ?,?');
    // $stmt->execute([ $cat_id, $start_limit , $entry_per_page ]);
    // $subcategories = $stmt->fetchAll();
    // $total_entries = count($subcategories);
    return [
        'total_entries' => 0,
        'page_number' => $page_number,
        'subcategories' => []
    ];
}



function get_all_business_cities($args){
    GLOBAL $PDO;
    $page_number = (int)$args['page_number'];
    $entry_per_page = $args['entry_per_page'];
    $start_limit = $entry_per_page*($page_number - 1) + 1;
    // $stmt = $PDO->prepare('SELECT * FROM `blog`  WHERE 	blog_category = ? ORDER BY `blog`.`date` DESC LIMIT ?,?');
    // $stmt->execute([ $cat_id, $start_limit , $entry_per_page ]);
    // $subcategories = $stmt->fetchAll();
    // $total_entries = count($subcategories);
    return [
        'total_entries' => 0,
        'page_number' => $page_number,
        'subcategories' => []
    ];
}

function get_all_businesses_by_city_id($city_id, $args){
    GLOBAL $PDO;
    $page_number = (int)$args['page_number'];
    $entry_per_page = $args['entry_per_page'];
    $start_limit = $entry_per_page*($page_number - 1) + 1;
    // $stmt = $PDO->prepare('SELECT * FROM `blog`  WHERE 	blog_category = ? ORDER BY `blog`.`date` DESC LIMIT ?,?');
    // $stmt->execute([ $cat_id, $start_limit , $entry_per_page ]);
    // $businesses = $stmt->fetchAll();
    // $total_entries = count($businesses);
    return [
        'total_entries' => 0,
        'page_number' => $page_number,
        'businesses' => []
    ];
}