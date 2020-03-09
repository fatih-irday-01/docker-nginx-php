<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $db = new PDO("mysql:host=mysql;dbname=fatih", "fatih", "XjQ6lPre5q");
    $db->query("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    print $e->getMessage();
}

$varmi = $db->query("show tables like 'name'")->fetchAll(PDO::FETCH_NAMED);

if( count($varmi) == 0 ){
    $db->query("CREATE TABLE name (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50)
    )");
}


if(isset($_REQUEST['truncate'])){
    $db->query("truncate TABLE name;");
}

if(isset($_REQUEST['ekle'])){
    $db->prepare("insert into name (firstname,lastname,email) values (?,?,?)")
        ->execute(['fatih', 'irday', 'fatihirday@gmail.com']);
}

$getir = $db->query('select * from name')
    ->fetchAll(PDO::FETCH_NAMED);


?>
<div>
    <div class="table-block">
        <table id="customers">
            <thead>
                <tr>
                    <th>İsim</th>
                    <th>Soyisim</th>
                    <th>e-Posta</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getir as $item) { ?>
                    <tr>
                        <td><?= $item['firstname'] ?></td>
                        <td><?= $item['lastname'] ?></td>
                        <td><?= $item['email'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="button-block">
        <ul>
            <li><a href="mysql.php?ekle=true">Ekle</a></li>
            <li><a href="mysql.php?truncate=true">Temizle</a></li>
        </ul>
    </div>
</div>



<style>

    body{
        padding: 10px;
    }

    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers tr:first-child th{
        border-top: none;
    }

    #customers th:first-child {
        border-left: none;
        border-top-left-radius: 10px;
    }

    #customers th:last-child {
        border-right: none;
        border-top-right-radius: 10px;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }


    .table-block{
        float: left;
        width: 50%;
    }
    .button-block{
        float: right;
        width: 50%;
        text-align: right;
    }
    .button-block ul{
        width: 100%;
        float: right;
        margin: 0;
        padding: 0;
        text-align: right;
        list-style: none;
    }
    .button-block ul li{
        margin: 10px;
    }
    .button-block ul li a{
        display: block;
        width: 20%;
        border-radius: 10px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        font-weight: bold;
        padding: 5px;
        text-decoration: none;
        border: 1px solid #ddd;
    }

</style>