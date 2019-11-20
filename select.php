<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="input.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <ul>
            <?php

                require("database.php");
                $dataMgr = new Database("_raw.ext");
                $dataMgr->read();
            
                if( count($dataMgr->data) == 0 ){
                    echo "Keine Einträge.";
                }

                foreach( $dataMgr->data as $i=>$di )
                {
                    echo "<li><a href=\"read.php?id=".$i."\">".$di["site"]."</a></li>";
                }
            ?>
        </ul>
    </body>
</html>
