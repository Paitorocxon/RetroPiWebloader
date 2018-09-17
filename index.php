<!DOCTYPE html>
<html>
    <head>
        <title>OrangePi Upload</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css" media="screen" />
    </head>
    <body>
        <center>
            <?php
                
                function shortText($string,$lenght) {
                    if(strlen($string) > $lenght) {
                        $string = substr($string,0,$lenght)."...";
                        $string_ende = strrchr($string, " ");
                        $string = str_replace($string_ende," ...", $string);
                    }
                    return $string;
                }
            ?>
        </center>
            <div class="formDieDenScheissHochladenSoll">
            <form enctype="multipart/form-data" action="index.php" method="POST">
                <p>Retropi Upload</p>
                <center><input class="inputScheisse" type="file" name="uploaded_file"/><input class="inputScheisse"  type="submit" value="Upload" /></center>
            </form>
            <?PHP
            
            
            function endsWith($haystack, $needle)
            {
                $length = strlen($needle);
                if ($length == 0) {
                    return true;
                }

                return (substr($haystack, -$length) === $needle);
            }
            
            
            
              if(!empty($_FILES['uploaded_file'])){
                
                if (pathinfo($_FILES['uploaded_file']['name'], PATHINFO_EXTENSION) == 'smc') {
                    $path = '/home/pi/RetroPie/roms/snes/';
                }elseif (pathinfo($_FILES['uploaded_file']['name'], PATHINFO_EXTENSION) == 'z64') {
                    $path = '/home/pi/RetroPie/roms/n64/';
                }elseif (pathinfo($_FILES['uploaded_file']['name'], PATHINFO_EXTENSION) == 'gba') {
                    $path = '/home/pi/RetroPie/roms/gameboy/';
                }
                
                $path = $path . basename($_FILES['uploaded_file']['name']);
                if (!empty($_FILES['uploaded_file']['tmp_name'])) {
                    try {
                        move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path);
                    }catch (Exception $e) {
                        die($e);
                    }
                    
                    die('Uploaded!');
                    
                    /*
                        if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {

                                echo $_FILES['uploaded_file']['name']. " wurde erfolgreich hochgeladen!";
                                
                        } else{
                            echo "Fehlerverhalten! Bitte melde es den Developern! Die Datei konnte nicht hochgeladen werden.";
                        }*/
                        
                        
                }
            }
            ?>
        </div>
    </body>
</html>
