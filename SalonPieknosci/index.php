<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon piękności</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="banner">
        <div class="logo">
            Piękni i młodzi
        </div>
        <div class="podlogo">
            Salon piękności/dietetyk
        </div>
    </div>
    <div class="lewy">
        <div class="konfabulacja">Nasza oferta:</div>
        <?php
        $conn = mysqli_connect('localhost', 'root', '', 'bmi_mrowiec');
        $ofertaQuery = "SELECT nazwa, cena FROM uslugi ORDER BY cena ASC;";
        $ofertaWynik = mysqli_query($conn, $ofertaQuery);

        echo "<table>";
        echo "<th>Usługa</th><th>Cena</th>";
        while($row = mysqli_fetch_array($ofertaWynik)){
            echo "<tr>";
            echo "<td>".$row[0]."</td>";
            echo "<td>".$row[1]."</td>";
            echo "</tr>";
        }
        ?>
    </div>
    <div class="prawy">
        <div class="konfabulacja">Sprawdź swoje BMI</div>
        <img src="wzor.png" alt="Wzór na BMI">
        <form action="pomiar.php" method="POST">
            <label>Podaj wagę:</label>
            <input type="number" name="waga" class="pt" placeholder="waga"><br>
            <label>Podaj wzrost(cm):</label>
            <input type="number" name="wzrost" class="pt" placeholder="wzrost"><br>
            <input type="submit" value="OBLICZ" class="pt">
        </form>
    </div>
</body>
</html>