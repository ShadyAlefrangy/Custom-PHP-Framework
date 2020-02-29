<?php

class QueryBuilder {
    
    protected $pdo;
    public function __construct($pdo)
	{
        $this->pdo = $pdo;
	}
    
    
    public function selectAll($table)
    {
        $statemnt = $this->pdo->prepare("select * from $table");
        $statemnt->execute();
        return $statemnt->fetchAll(PDO::FETCH_CLASS);

    }

    public function insert ($table, $parameters)
    {
        // $arr = ['one', 'two', 'three'];
        // implode(', ', $arr); // result one, two, three
        // insert into %s (:name) values (name)

        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        try {

            $statemnt = $this->pdo->prepare($sql);
            $statemnt->execute($parameters);
        } catch (Exception $e) {
            
            die('Whoops, Something went wrong');
        }
        
    }
}