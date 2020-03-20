<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="input.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="post">
            <div class="input yellow" id="input">
                <input name="site" type="text" required/>
                <label>Dienst- bzw. Websitenname</label>
            </div>
            <div class="input green" id="input">
                <input name="username" type="text" required/>
                <label>Benutzername</label>
            </div>
            <div class="input green" id="input">
                <input name="inp_txt" type="password" required/>
                <label>Passwort</label>
            </div>
            <div class="input red" id="input">
                <input name="key" type="password" required/>
                <label>key</label>
            </div>
            <button type="Submit" id="send">Hinzufügen</button>
        </form>
        <div id="output">
            <?php

                require("database.php");
                require("strbin.php");

                $dataMgr = new Database("_raw.ext");
                $dataMgr->read();

                if( $_SERVER["REQUEST_METHOD"] == "POST" )
                {
                    $site = $_POST["site"];
                    $usrn = $_POST["username"];
                    $pwrd = $_POST["inp_txt"];
                    $keys = $_POST["key"];
                    
                    array_push( $dataMgr->data, [
                        "site" => $site,
                        "usrn" => StrBinConverter::str2bin_xor( $usrn,$keys ),
                        "pwrd" => StrBinConverter::str2bin_xor( $pwrd,$keys )
                    ]);
                    
                    $dataMgr->save();
                }
            
            ?>
        </div>
    </body>
</html>
