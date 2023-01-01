<?php


class crud{

    public static function connect(){
        try{

        $con=new PDO('mysql:localhost=localhost;dbname=brighteyes','root','');

       
        return $con;

    }catch(PDOException $error){

        echo 'the error ' . $error->getMessage();


    }

    
   
}
// function user table
public static function selectDataUser(){
    $data = array();
    $con=crud::connect()->prepare("SELECT * FROM users");
    $con->execute();
    $data= $con->fetchAll(PDO::FETCH_ASSOC);
    return    $data;
}
public static function deleteUser(){
    $con=crud::connect()->prepare("UPDATE users SET IsDeleted = '1' WHERE id = :id");
    return    $con;
}

// function category table
public static function deleteCategory(){
    $con=crud::connect()->prepare("DELETE FROM category WHERE category_id = :id");
    return    $con;
}
public static function selectDataCategort(){
    $data = array();
    $con=crud::connect()->prepare("SELECT * FROM category");
    $con->execute();
    $data= $con->fetchAll(PDO::FETCH_ASSOC);
    return    $data;
}

// function orders table
public static function selectorder(){
    $data = array();
    $con=crud::connect()->prepare("SELECT orders.order_id,users.id ,users.FullName, orders.order_date,orders.total_price
    FROM orders
    INNER JOIN users ON orders.user_id=users.id;");
    $con->execute();
    $data= $con->fetchAll(PDO::FETCH_ASSOC);
    return  $data;
}

// function products table
public static function delete(){
    $con=crud::connect()->prepare("UPDATE products SET is_deleted = '1' WHERE id = :id");
    return    $con;
}

public static function selectProduct(){
    $data = array();
    $con=crud::connect()->prepare("SELECT * FROM products");
    $con->execute();
    $data= $con->fetchAll(PDO::FETCH_ASSOC);
    return  $data;
}

public static function deleteProduct($id){

    $con=crud::connect()->prepare("DELETE FROM products WHERE id = :id");
    $con->bindValue(':id', $id);
    $con->execute();

}
 

}


