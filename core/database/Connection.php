<?php

class Connection {
    public static function make ($config) {
        try {
            //return new PDO('mysql:host=127.0.0.1;port=3308;dbname=mytodo', 'root', '');
            return new PDO(
               $config['connection'].';dbname='.$config['name'],
               $config['username'],
               $config['password'],
               $config['options'] 
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}


// when use public function just you want to do that to use function
// 1- create new instance : $connection = new Connection();
// 2- then call method make : $connection->make();

// when use public static function you can do just
// Connection::make(); just really fantastic