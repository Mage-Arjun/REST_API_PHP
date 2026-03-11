<?php

class Category{

    private $conn;
    private $table = 'categories';  
    
    public $id;
    public $name;
    public $create_at;


    public function __construct($db){
        $this -> conn = $db;
    }

    public function read() {
        // Create query
        $query = 'SELECT 
        id,
        name,
        create_at
        FROM ' . $this->table . '
        ORDER BY id DESC';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        // Return statement
        return $stmt;
    }
    public function create_category(){

        //create query
        $query = 'INSERT INTO ' . $this->table . ' SET name = :name'; 
        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data 
        $this->name = htmlspecialchars(strip_tags($this->name));

        //binding of param
        $stmt->bindParam(':name', $this->name);

        //execute query
        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
    //update category
    public function update_category(){
        //update query
        $query = 'UPDATE ' . $this->table . ' SET name = :name
        WHERE id = :id';

        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data 
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->id = htmlspecialchars(strip_tags($this->id));

        //binding of param
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':id', $this->id);

        //execute query
        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
        //delete category
    public function delete_category(){
        //delete query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data 
        $this->id = htmlspecialchars(strip_tags($this->id));

        //binding of param
        $stmt->bindParam(':id', $this->id);

        //execute query
        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
}