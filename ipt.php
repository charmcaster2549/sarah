<?php

class Cat{
    public $name;

    public function meow(){
        echo "it's " .$this->name ." meowwwww";

    }
}

$cat = new Cat();
$name = $_GET['cat'];
$cat->name=$name;


    if($name=="cat"){
        $cat->meow();
    }
    else{
        echo"wrong name. try again";
    }