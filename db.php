<?php

class DB{
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db99";
    protected $pdo;
    protected $table;

    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    /**
     * 撈出全部資料
     * 
     */
    function all(){
        return $this->q("SELECT * FROM $this->table");
    }

    
    /**
     * 把陣列轉成條件字串陣列
     */
    function a2s($array){
        $tmp=[];
        foreach($array as $key => $value){
            $tmp[]="`$key`='$value'";
        }
        return $tmp;
    }


    function fetchOne($sql){
        //echo $sql;
        return $this->pdo->query($sql)->fetch();
    }
    
    function fetchAll($sql){
        //echo $sql;
        return $this->pdo->query($sql)->fetchAll();
    }
    
}

/* function q($sql){
    return $this->pdo->query($sql)->fetchAll();
} */

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


$DEPT=new DB('dept');

//$dept=$DEPT->q("SELECT * FROM dept");
$dept=$DEPT->all();

dd($dept);

