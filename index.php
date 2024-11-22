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
        public $type = 'animal';
        public $name = 'John';
        public $hair_color = 'black';
        
        // function 前面也可以封裝 不寫的話默認 public
        function __construct($type, $name, $hair_color){
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
    }

    // instance實例化 把instance變成object
    // 
    $cat = new Animal('cat','Kitty','white');

    // 取用 cat 裡面的type
    // $type 的話 這個是變數會有值 但如果要帶值 會變得很複雜
    echo $cat -> type."<br>";
    echo $cat -> name."<br>";
    echo $cat -> hair_color."<br>";
    echo $cat -> run()."<br>";

?>
</body>
</html>