<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ambachtelijke meubels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="formulier.css" >
</head>
<body>
    <img src="tafel.jpg">
    <div class = "gegevens">
        <form action = "index.php" method = "post">
            <div class="form-group">
                <label for="formGroupExampleInput">lengte in cm.</label>
                <input type="number" class="form-control" id="formGroupExampleInput" name = "lengte" value = "<?php if (isset($_POST['lengte'])) echo $_POST['lengte'];?>" min = 50 max = 244>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">breedte in cm.</label>
                <input type="number" class="form-control" id="formGroupExampleInput" name = "breedte" value = "<?php if (isset($_POST['breedte'])) echo $_POST['breedte']; ?>"min = 50 max = 122>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">hoogte in cm.</label>
                <input type="number" class="form-control" id="formGroupExampleInput" name = "hoogte" value = "<?php if (isset($_POST['hoogte'])) echo $_POST['hoogte']; ?>"min = 40 max = 180>
            </div>

            <input name = "bouwen" type = "radio" value = "bouwen" <?php if(isset($_POST['bouwen']) && ($_POST['bouwen'] == 'bouwen')) echo 'checked="checked" ';?>>laten bouwen<br>
            <input name = "bouwen" type = "radio" value = "ongebouwd" <?php if(isset($_POST['bouwen']) && ($_POST['bouwen'] == 'ongebouwd')) echo 'checked="checked" ';?>>zelf bouwen<br><br>
            <input name = "verf" type = "radio" value = "geverfd" <?php if(isset($_POST['verf']) && ($_POST['verf'] == 'geverfd')) echo 'checked="checked" ';?>>geverfd<br>
            <input name = "verf" type = "radio" value = "ongeverfd" <?php if(isset($_POST['verf']) && ($_POST['verf'] == 'ongeverfd')) echo 'checked="checked" ';?>>zelf verven<br>
            <br>kleur<br>
            <input name = "kleur" type = "radio" value = "1" <?php if(isset($_POST['kleur']) && ($_POST['kleur'] == '1')) echo 'checked="checked" ';?>>lakken
            <input name = "kleur" type = "radio" value = "2" <?php if(isset($_POST['kleur']) && ($_POST['kleur'] == '2')) echo 'checked="checked" ';?>>rood
            <input name = "kleur" type = "radio" value = "3" <?php if(isset($_POST['kleur']) && ($_POST['kleur'] == '3')) echo 'checked="checked" ';?>>blauw
            <input name = "kleur" type = "radio" value = "4" <?php if(isset($_POST['kleur']) && ($_POST['kleur'] == '4')) echo 'checked="checked" ';?>>groen
            <input name = "kleur" type = "radio" value = "5" <?php if(isset($_POST['kleur']) && ($_POST['kleur'] == '5')) echo 'checked="checked" ';?>>geel
            <input name = "kleur" type = "radio" value = "6" <?php if(isset($_POST['kleur']) && ($_POST['kleur'] == '6')) echo 'checked="checked" ';?>>wit
            <input name = "kleur" type = "radio" value = "7" <?php if(isset($_POST['kleur']) && ($_POST['kleur'] == '7')) echo 'checked="checked" ';?>>zwart<br>
            <br>
            <button type="prijs" class="btn btn-primary btn-lg">Price</button>  
        </form>


        <?php
            // prijs berekenen. 
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    $lengteTotaal = $_POST["lengte"] + 2 *10;
                    $breedteTotaal = $_POST["breedte"] + 2*10;
                    $hoogte = $_POST["hoogte"];
                    $lengte = $_POST["lengte"];
                    $verf = $_POST['verf'];
                    $bouwen = $_POST['bouwen'];
                    $prijs = 0;
                    $lengtePlaat = 244;
                    $breedtePlaat = 122;
                    $kostenPlaat = 50;
                    $kostenZagen = 40;
                    $lengteBalk = 180;
                    $kostenBalk = 10;
                    $oppervlakBalk = $hoogteBalk * 5 * 4 * 4;
                    $kostenBouwen = 40;
                    $kostenSchilderen = 10;
                    $kostenSchilderenPoten = $kostenSchilderen + ($kostenSchilderen * 0.1);
                    $winstMarge = 50;
                    $btw = 21;

                    if ($lengteTotaal<=$lengtePlaat && $breedteTotaal<=$breedtePlaat){
                        $prijs = $prijs + $kostenPlaat;
                    }
                    else{
                        $prijs = $prijs + (2*$kostenPlaat);
                    }

                    if(($hoogte * 2) <=$lengteBalk){
                        if(($hoogte * 3) <= $lengteBalk){
                            if(($hoogte * 4) <= $lengteBalk){
                                $prijs = $prijs + $kostenBalk;
                            }
                            else
                            $prijs = $prijs + ($kostenBalk * 2);
                        }
                        else
                        $prijs = $prijs + ($kostenBalk * 2);
                    }
                    else
                    $prijs = $prijs + ($kostenBalk * 4); 
                    $prijs = $prijs + $kostenZagen;

                if ($bouwen == "bouwen"){
                    $prijs = $prijs + $kostenBouwen;
                }

                if($verf == "geverfd"){
                    $prijs = $prijs + ($lengteTotaal * $breedteTotaal * $kostenSchilderen / 10000) + ($oppervlakBalk * $kostenSchilderenPoten/10000 );
                }

                $prijs = $prijs + ($prijs * $winstMarge/100);

                $prijs = ($prijs + $prijs * $btw/100);
            }

            echo "<div class ='eindprijs'>&euro; ".(round($prijs,2,PHP_ROUND_HALF_UP))." <p> inclusief B.T.W.</p></div>"
            ?>
    </div>


    <script src="formulier.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
    </body>
</html>


