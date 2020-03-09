<html>
    <header>
        <title>Fatih</title>
    </header>
    <body>

        <div class="button-block">
            <ul>
                <?php foreach (glob('./test/*.php') as $item) { ?>
                    <?php $name = pathinfo(basename($item), PATHINFO_FILENAME); ?>
                    <li><a href="<?= $item ?>"><?= ucwords($name) ?> Test</a></li>
                <?php } ?>

            </ul>
        </div>
    </body>
<style>

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
</html>