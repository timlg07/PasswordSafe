<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="input.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?id=".$_GET["id"];?>' method="post">
            <div class="input red" id="input">
                <input name="key" type="password" required/>
                <label>key</label>
            </div>
            <button type="Submit" id="send">Anzeigen</button>
        </form>
        <div id="output">
            <?php

                require("database.php");
                require("strbin.php");

                $dataMgr = new Database("_raw.ext");
                $dataMgr->read();
            
                $id = intval( $_GET["id"] );

                if( $_SERVER["REQUEST_METHOD"] == "POST" )
                {
                    $keys = $_POST["key"];
                    $data = $dataMgr->data[$id];
                    $site = $data["site"];
                    $usrn = StrBinConverter::bin2str_xor( $data["usrn"],$keys );
                    $pwrd = StrBinConverter::bin2str_xor( $data["pwrd"],$keys );
                    
                    echo "Logindaten für $site: <br>\nBenutzername: $usrn<br>\nPasswort: $pwrd";
                }
            
            ?>
        </div>
    </body>
</html>
