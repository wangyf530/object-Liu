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
        // 用 public / private / const(常數無法在被改變) / protected(要繼承關係才能使用) 進行封裝
        // 通常這些都不會公開
        protected $type = 'animal';
        protected $name = 'John';
        protected $hair_color = 'black';
        protected $feet = ['front-left','front-right','back-left','back-right'];
        
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
    echo $cat -> type."<br>";

    // echo $cat -> name."<br>";
    echo $cat -> getName()."<br>";
    echo $cat -> hair_color."<br>";
    echo $cat -> run()."<br>";
    print_r($cat -> feet);

    // 直接改
    // $cat -> name = "Joson";
    // echo $cat -> getName();
    
    // 通過function改名
    $cat -> setName("Mary");
    echo $cat -> getName();
?>
</body>
</html>