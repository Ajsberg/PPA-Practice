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
    <div class="content">
    <div class="prawy">
        <div class="konfabulacja">Sprawdź swoje BMI</div>
        <img src="wzor.png" alt="Wzór na BMI">
        <form method="POST">
            <label>Podaj wagę:</label>
            <input type="number" name="waga" class="pt" placeholder="waga"><br>
            <label>Podaj wzrost(cm):</label>
            <input type="number" name="wzrost" class="pt" placeholder="wzrost"><br>
            <input type="submit" value="OBLICZ" class="pt">
        </form>
    </div>
    <?php

        $conn = mysqli_connect('localhost', 'root', '', 'bmi');
        $ofertaQuery = "SELECT nazwa, cena FROM uslugi ORDER BY cena ASC;";
        $ofertaWynik = mysqli_query($conn, $ofertaQuery);
        echo "<div class='cennik'>";
        echo "<table>";
        echo "<th>Usługa</th><th>Cena</th>";
        while($row = mysqli_fetch_array($ofertaWynik)){
            echo "<tr>";
            echo "<td>".$row[0]."</td>";
            echo "<td>".$row[1]."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";

        echo "<div class='kalk'>";

        $waga = $_POST['waga'];
        $wzrost = $_POST['wzrost'];
        $wzrostWm = $wzrost / 100;

        $bmi = intval($waga/( $wzrostWm*$wzrostWm ));
        $data = date('Y-m-d');
        $bmi_id = 0;

        if($bmi < 19){
            $bmi_id = 1;
            $bmi_tekst = " Masz niedowagę.";
        } elseif ($bmi >= 19 && $bmi <= 25){
            $bmi_id = 2;
            $bmi_tekst = " Twoja waga jest prawidłowa.";
        } elseif ($bmi >= 26 && $bmi <= 30){
            $bmi_id = 3;
            $bmi_tekst = " Masz nadwagę.";
        } elseif ($bmi >= 31){
            $bmi_id = 4;
            $bmi_tekst = " Masz otyłość";
        }
        $bmiQuery = "INSERT INTO wynik (bmi_id, data_pomiaru, wynik) VALUES ('$bmi_id', '$data', '$bmi');";

        mysqli_query($conn, $bmiQuery);

        echo "<div class='Dol'>Twoje BMI wynosi: ".$bmi.$bmi_tekst."</div>";
        echo "</div>";
    ?>
    </div>
</body>
</html>