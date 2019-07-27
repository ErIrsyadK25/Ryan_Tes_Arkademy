<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <center>
    <?php
    function cetak_gambar($panjang){
            echo '<center>---Panjang---</center>';
            for ($i=1; $i <=$panjang ; $i++) {
            for ($j=1; $j <=$panjang ; $j++) { 
                if($i==($panjang/2+0.5) || $j==1 || $j==$panjang){
                    echo "&nbsp&nbsp&nbsp&nbsp&nbsp*";
                }
                else{
                    echo "&nbsp&nbsp&nbsp&nbsp&nbsp=";
                }
             } 
                echo "<br />";
            }
        }

    cetak_gambar(5);
    ?>
    </center>
</body>
</html>
    
