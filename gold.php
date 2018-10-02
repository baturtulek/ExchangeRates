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
            #tab{margin: 0px auto;margin-bottom: 50px;}
            td,th{text-align: center;width:150px;height: 50px;}
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
    $url = "https://www.doviz.com/api/v1/golds/all/latest";
    $data = file_get_contents($url);
    $decode = json_decode($data);

    echo "<table class = 'table-striped' id = 'tab' >";
    echo "<tr><th> </th><th>Alış</th><th>Satış</th><th> % </th></tr>";
    for ($k = 0; $k < 7; $k++) {
        echo "<tr>";
        $upperName = strtoupper($decode[$k]->name);
        echo "<td id = 'nameCol'>{$upperName}</td>";
        $buying = number_format($decode[$k]->buying, 2);
        echo "<td>{$buying}</td>";
        $selling = number_format($decode[$k]->selling, 2);
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
