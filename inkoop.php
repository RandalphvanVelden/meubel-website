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


    <div class = "gegevens">
        <form action = "inkoop.php" method = "post">
            Formaat van de Grondstof
            <div class="form-group">
                <label for="formGroupExampleInput">lente hout cm.</label>
                <input type="number" class="form-control" id="formGroupExampleInput" name = "lengteHout" value = "<?php if (isset($_POST['lengteHout'])) echo $_POST['lengteHout']; ?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">breedte hout cm.</label>
                <input type="number" class="form-control" id="formGroupExampleInput" name = "breedteHout" value = "<?php if (isset($_POST['breedteHout'])) echo $_POST['breedteHout']; ?>">
            </div>
        bestelling
            <div class="form-group">
                <label for="formGroupExampleInput">aantal tafels</label>
                <input type="number" class="form-control" id="formGroupExampleInput" name = "aantal" value = "<?php if (isset($_POST['aantal'])) echo $_POST['aantal'];?>">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">lengte in cm.</label>
                <input type="number" class="form-control" id="formGroupExampleInput" name = "lengte" value = "<?php if (isset($_POST['lengte'])) echo $_POST['lengte'];?>" max = <?php if (isset($_POST['lengteHout'])) echo $_POST['lengteHout']; ?>>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">breedte in cm.</label>
                <input type="number" class="form-control" id="formGroupExampleInput" name = "breedte" value = "<?php if (isset($_POST['breedte'])) echo $_POST['breedte']; ?>" max = "<?php if (isset($_POST['breedteHout'])) echo $_POST['breedteHout']; ?>">
            </div>
        
            <button type="bestelling" class="btn btn-primary btn-lg">bestelling</button>  
        </form>

         <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                    $aantal = $_POST["aantal"];
                    $lengteHout = $_POST["lengteHout"];
                    $breedteHout= $_POST["breedteHout"];
                    $lengte = $_POST["lengte"];
                    $breedte = $_POST["breedte"];
                    $hoogte = $_POST["hoogte"];
                    $lengte = $_POST["lengte"];
                    $breedte = $_POST["breedte"];
                    $aantalPlaten = 0;
                    $lengteTotaal = $aantal * $lengte;
                    $breedteTotaal = $aantal * $breedte;
                   

                    if ($lengteTotaal<=$lengteHout && $breedteTotaal<=$breedteHout && $aantal !=0 ){
                       $aantalPlaten = $aantalPlaten + 1;
                    }
                    else{
                        $aantalPlaten = $aantalPlaten+1;
                        while ($lengteTotaal > $lengteHout or $breedteTotaal > $breedteHout ){
                            $aantalPlaten = $aantalPlaten + 1;
                            $lengteTotaal = $lengteTotaal - $lengteHout;
                            $breedteTotaal = $breedteTotaal - $breedteHout;
                        }
                    }      
            }
            
            echo "<div class = 'aantalP'><p>aantal platen nodig</p>".$aantalPlaten. "</div>";
            ?>
    </div>


    <script src="formulier.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
    </body>
</html>