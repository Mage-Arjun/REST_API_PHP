<?php

class post {
    //db things
    private $conn;
    private $table = 'posts';

    //post properties
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $create;

    //constuctor with db connection
    public function __construct($db){
        $this -> conn = $db;
    }
        public function read() {
            // Create query
            $query = 'SELECT 
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at
            FROM posts p
            LEFT JOIN categories c ON p.category_id = c.id
            ORDER BY p.created_at DESC';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            // Return statement
            return $stmt;
        }
        public function read_single(){
            $query = 'SELECT 
            c.name as category_name,
            p.id,
            p.category_id,
            p.title,
            p.body,
            p.author,
            p.created_at
            FROM posts p
            LEFT JOIN categories c ON p.category_id = c.id
            WHERE p.id = ? LIMIT 1';

         $stmt = $this->conn->prepare($query);
         //BINDING PARAM
         $stmt->bindParam(1,$this->id);
        //edxecute the query
         $stmt->execute();

         $row = $stmt->fetch(PDO::FETCH_ASSOC);

         $this->title = $row['title'];
         $this->body = $row['body'];
         $this->author = $row['author'];
         $this->category_id = $row['category_id'];
         $this->category_name = $row['category_name'];
         $this->created_at = $row['created_at'];
        }

        public function create(){

        //create query
        $query = 'INSERT INTO ' . $this->table . ' SET title = :title, body = :body, author = :author, category_id = :category_id'; 
        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data 
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));

        //binding of param
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category_id', $this->category_id);

        //execute query
        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    //update post
    public function update(){
        //update query
        $query = 'UPDATE ' . $this->table . ' SET title = :title, body = :body, author = :author, category_id = :category_id
        WHERE id = :id';

        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data 
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->body = htmlspecialchars(strip_tags($this->body));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        //binding of param
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':author', $this->author);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

        //execute query
        if($stmt->execute()){
            return true;
        }
        printf("Error: %s.\n", $stmt->error);
        return false;
    }
    //delete post
    public function delete(){
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
?>