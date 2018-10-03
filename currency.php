<!DOCTYPE html>

<html>
     <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library --> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
        <style>
            body{font-family: 'Open Sans', sans-serif;}
            h1{text-align: center;font-size: 34px;margin:50px;}
            #tab{margin: 0px auto; margin-bottom: 50px;width:1000px;}
            td,th{text-align: center;width:150px;height: 50px;}
            #tab1:hover{cursor: pointer;background-color: #ccc;}
            th{font-size: 25px;}
            #nameCol{width: 200px;}
            ul{text-align: center;margin-bottom: 40px;}
            li{display: inline;}
            img{width: 30px;height: 30px;margin-left: 15px;}
        </style>
    </head>
<body>
    <h1>Current Exchange Rates</h1>
    <ul>
        <li><a href = "currency.php"><button type="button" class="btn btn-primary btn-lg" style = "width:150px">Döviz</button></a></li>
        <li><a href = "gold.php"><button type="button" class="btn btn-primary btn-lg" style = "width:150px">Altın</button></a></li>
        <li><button type="button" class="btn btn-primary btn-lg" style = "width:150px">Çapraz Kur</button></li>
        <li><a href = "cryptoCurrency.php"><button type="button" class="btn btn-primary btn-lg" style = "width:150px">Kripto Paralar</button></a></li>
        
    </ul>
    <?php
        
    //Doviz.com API
    $url = "https://www.doviz.com/api/v1/currencies/all/latest";
    $data = file_get_contents($url);
    $decode = json_decode($data);

    
    echo "<table class = 'table-striped' id = 'tab' >";
    echo "<tr><th> </th><th> </th><th>Alış ₺</th><th>Satış ₺</th><th>%</th></tr>";
    for ($k = 0; $k < 10; $k++){
        echo "<tr id='tab1'>";
        $upperName = strtoupper($decode[$k]->name);
        echo "<td id = 'nameCol'><a href='detail.php?code={$decode[$k]->code}'>{$upperName}</a></td>";
        echo "<td>{$decode[$k]->code}</td>";
        $buying = number_format($decode[$k]->buying, 3);
        echo "<td>{$buying}</td>";
        $selling = number_format($decode[$k]->selling, 3);
        echo "<td>{$selling}</td>";  
        $change = number_format($decode[$k]->change_rate, 3);
        echo "<td>{$change}";
        if($change > 0){
            echo "<img src = 'up.png'></td>";
        }else{
            echo "<img src = 'down.jpeg'></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    
    ?>
</body>
</html>
