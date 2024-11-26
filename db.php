<?php

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db99";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }


    function q($sql){
        return $this->pdo->query($sql)->fetchAll();
    }


}


function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


$DEPT=new DB('dept');

$dept=$DEPT->q("SELECT * FROM dept");

dd($dept);

