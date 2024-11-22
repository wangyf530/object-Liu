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
    // 抽象化
    // 物件宣告大寫開頭 不是具體單一個體 統稱是概念 like 門(可以有很多種)
    class Animal{
        // 只有 $type 缺少封裝
        // 用 public / private (只會在這，繼承不會過去) / const(常數無法在被改變) / protected(要繼承關係才能使用) 進行封裝
        // 通常這些都不會公開
        protected $type = 'animal';
        protected $name = 'John';
        public $hair_color = 'black';
        private $feet = ['front-left','front-right','back-left','back-right'];
        
        // function 前面也可以封裝 不寫的話默認 public
        function __construct($type, $name, $hair_color){
            // this = Animal type要用傳進來的變數 也可以不要
            $this -> type = $type;
            $this -> name = $name;
            $this -> hair_color = $hair_color;
        }
        
        function run(){
            echo $this -> name.' is running.';
        }
        
        function speed(){
            echo $this -> name. 'is running at 20km/h.';
        }
    
        // function 本身就是變數 把name的值傳給getName
        // 有因為是public，所以從protected變公開了
        public function getName(){
            // 把裡面的name丟出來
            return $this-> name;
        }

        public function setName($name){
            //
            $this-> name = $name;
        }
    
    }

    // instance實例化 把instance變成object
    $cat = new Animal('cat','Kitty','white');

    // 取用 cat 裡面的type
    // $type 的話 這個是變數會有值 但如果要帶值 會變得很複雜
    // -> 物件 => array

    // 因為 type 是 protected 所以不能直接用
    // echo $cat -> type."<br>";

    // echo $cat -> name."<br>";
    echo $cat -> getName()."<br>";
    echo $cat -> hair_color."<br>";
    echo $cat -> run()."<br>";
    // print_r($cat -> feet)."<br>";

    // 直接改
    // $cat -> name = "Joson";
    // echo $cat -> getName();
    
    // 通過function改名
    $cat -> setName("Mary");
    echo $cat -> getName();
?>


<h1>繼承</h1>
<?php
    // extends -> 擴充 aka 繼承
    // class Cat extends Animal{
    // implements 才會去看 Behavior 裡的東西是否都有存在
    class Cat extends Animal implements Behavior{
        // 要繼承的話 同一個變數的類型要一樣 ex. 下面的 $type 是 protected，那上面的 Animal 的 $type 也要是 protected 
        protected $type = 'cat';
        protected $name = 'Judy';

        function __construct($hair_color){
            // name 不需要了，因為上面已經protected Judy了
            // $this -> name = $name;
            $this -> hair_color = $hair_color;
        }

        function jump(){
            echo $this -> name. " jumps 2m.";
        }

        function getFeet(){
            return $this -> feet;
        }
    }

    // 可以用來看裡面有哪些方法
    // 在哪裡都可以
    Interface Behavior{
        public function run();
        public function speed();
        public function jump();
    }

    // 確認是否有完成繼承
    $myCat = new Cat('white');
    echo $myCat -> getName();
    echo "<br>";
    echo $myCat -> run();
    echo "<br>";
    echo $myCat -> speed();
    echo "<br>";
    $myCat -> setName("Judy");
    echo $myCat -> getName();
    echo "<br>";
    echo $myCat ->jump();
    echo "<br>";
    echo $myCat -> getFeet();

?>


<h1>try dog</h1>
<?php
    class Dogg extends Animal{
        // 要繼承的話 同一個變數的類型要一樣 ex. 下面的 $type 是 protected，那上面的 Animal 的 $type 也要是 protected 
        protected $type = 'dog';
        
        function __construct($name, $hair_color){
            $this -> name = $name;
            $this -> hair_color = $hair_color;
        }
    }

    $dog = new Dogg('Bob','brown');
    echo $dog -> getName();
?>


<h1>靜態宣告</h1>
<?php
    class Dog extends Animal implements Behavior{
        protected $type = 'dog';
        protected $name = 'Bob';

        static $count = 0;
        function __construct($hair_color){
            $this -> hair_color = $hair_color;
            self::$count++;
        }

        function bark(){
            echo $this -> name . " is barking";
        }

        function getFeet(){
            return $this -> $feet;
        }

        function jump(){
            echo $this -> name . " jumps 1m.";
        }

        // 不用 new 就能得到 count
        static function getCount(){
            return self::$count;
        }

        // static function getCount(){
        //     return $this -> count;
        // }
    }

    echo Dog::getCount() . "<br>";
    // echo $dog -> getCount();
    
    $dog1 = new Dog('brown');
    echo $dog1->getName()  . "<br>";
    $dog2 = new Dog('black');
    echo $dog2->getName()  . "<br>";
    $dog3 = new Dog('orange');
    echo $dog3->getName()  . "<br>";
    $dog4 = new Dog('white');
    echo $dog4->getName()  . "<br>";
    echo Dog::getCount() . "<br>";
    

?>
</body>
</html>