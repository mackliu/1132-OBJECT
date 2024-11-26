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
     * 1. 整張資料表
     * 2. 有條件
     * 3. 其他SQL功能
     */
    function all(...$arg){
        $sql="SELECT * FROM $this->table ";
        if(!empty($arg[0])){
            if(is_array($arg[0])){

                $where=$this->a2s($arg[0]);
                $sql=$sql . " WHERE ". join(" && ",$where);
            }else{
                //$sql=$sql.$arg[0];
                $sql .= $arg[0];

            }
        }



        return $this->fetchAll($sql);
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
$dept=$DEPT->all(['id'=>3]);

dd($dept);

