<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>物件導向</title>
</head>
<body>
<h1>物件的宣告</h1>
<?php

class Animal{
protected $type='animal';
protected $name='John';
protected $hair_color='black';
private $feet=['front-left','front-right','back-left','back-right'];

  function __construct($type,$name,$hair_color){
    $this->type=$type;
    $this->name=$name;
    $this->hair_color=$hair_color;
  }

    function run(){
    echo $this->name.' is running';
  }
  
  public function speed(){
    echo $this->name.' is running at 20km/h';
  }

  public function getName(){
    return $this->name;
  } 

  public function setName($name){
        $this->name=$name;
  } 
  function getFeet(){
    return $this->feet;
}

}

//實例化(instance)
$cat=new Animal('cat','Kitty','white');
print_r($cat->getFeet());
//echo $cat->type;
echo $cat->getName();
//echo $cat->hair_color;
echo $cat->run();
echo $cat->speed();
//print_r($cat->feet);

echo $cat->setName('Mary');
echo $cat->getName();


?>

<h1>繼承</h1>
<?php

class Cat extends Animal implements Behavior{
    protected $type='cat';
    protected $name='Kitty';
    function __construct($hair_color){
        $this->hair_color=$hair_color;
    }

    function jump(){
        echo $this->name . " jumpping 2m";
    }

/*     function getFeet(){
        return $this->feet;
    } */
}


Interface Behavior{
    public function run();
    public function speed();
    public function jump();
}



$mycat=new Cat('white');

print_r($mycat->getFeet());

echo $mycat->getName();
echo "<br>";
echo $mycat->run();
echo "<br>";
echo $mycat->speed();
echo "<br>";
$mycat->setName("judy");

echo $mycat->getName();
echo "<br>";
echo $mycat->jump();

//echo Cat::name;
?>

<H1>靜態宣告</H1>
<?php

class Dog extends Animal implements Behavior{
    protected $type='dog';
    protected $name='Doggy';
    protected static  $count=0;
    //static $count=0;

    function __construct($hair_color){
        $this->hair_color=$hair_color;
        self::$count++;
    }

    function bark(){
        echo $this->name . " is barking";
    }

    function getFeet(){
        return $this->feet;
    }

    static function getCount(){
        return self::$count;
    }

    function jump(){
        echo $this->name . " jumpping 1m";
    }
}

echo Dog::getCount();

$dog1=new Dog('brown');
$dog2=new Dog('black');
$dog3=new Dog('orange');
$dog4=new Dog('white');
$dog5=new Dog('white');


echo Dog::getCount();
?>
</body>
</html>