<?php
use yii\data\ActiveDataProvider;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
<?
$rows = (new \yii\db\Query())
        ->from(['product']);

$provider = new ActiveDataProvider([
     'query' => $rows,
 ]);
  
 // возвращает массив объектов Post
 $posts = $provider->getModels();
    
  
         
 foreach($posts as $key)
 { 
     
        $rows1= (new \yii\db\Query())
        ->from(['images'])
         ->where(['id' => $key['id']]);
     
        $provider1 = new ActiveDataProvider([
            'query' => $rows1,
        ]);
  
 // возвращает массив объектов Post
    $posts = $provider1->getModels();
        foreach($posts as $key1)
        { 
          echo "<div class = \"im\"><img src = \"".$key1['name']."\"  id = \"new\" width = \"200\" height = \"300\">";
          break;
        }

     
        foreach($posts as $key1)
        { 
            echo " <label class= \"cha\">";
            echo " <input type=\"radio\" value = \"".$key1['name']."\" name = \"dsadsa\"  id = \"dsadsa\">";
            echo " <img id = \"vse\" src = \"".$key1['name']."\" width = \"70\" height = \"90\" id = \"new\"  onclick = \"javascript:colorr(src)\">";
            echo "</label>";
        } 
        
     
     echo $key['name'];
     echo $key['articul'];
     echo $key['price'];
} 

?>
<script>
function colorr(src){

var a = src;
var img = document.createElement("IMG"); 
img.src = a;



img.setAttribute("id", "new");img.setAttribute("width", "200");img.setAttribute("height", "300");

// создаем ссылку на существующий элемент который будем заменять
var sp2 = document.getElementById("new");
var parentDiv = sp2.parentNode;

// заменяем существующий элемент sp2 на созданный нами img
parentDiv.replaceChild(img, sp2);

}
</script>
<style>
label > input{ /* HIDE RADIO */
          visibility: hidden; /* Makes input not-clickable */
          position: absolute; /* Remove input from document flow */
        }
    label > input + img{ /* IMAGE STYLES */
                  cursor:pointer;
                  border:2px solid transparent;
        }
    label > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
              border:5px solid #f00;
        border-radius: 5px;
    }
    .cha > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
              border:5px solid gray;
        border-radius: 5px;
    }</style>