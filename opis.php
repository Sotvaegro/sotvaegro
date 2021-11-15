<?php
if (!isset ($_GET['grupa'])) {$grupa=1;}
else {$grupa=$_GET['grupa'];}


require("conf.php");
$nr= $_GET["nr"];
$wynik = mysqli_query($conn, "SELECT * FROM ksiazki, gatunki, wyd, okladka WHERE ksiazki.gatunek = gatunki.lp AND ksiazki.wydawnictwo = wyd.idwyd AND ksiazki.okladka = okladka.idokl AND id=$nr");
$wiersz = mysqli_fetch_array($wynik);
echo '<div id="opis">';
echo '<img style="margin: 10px;" src="img/'.  $wiersz["id"] . '.jpg" height="350px" class="ksiazkaimg"/>';
echo '<div class="imgside"><h1>'.  $wiersz["tyt_pol"] . '<br>('.  $wiersz["tyt_org"] .')</h1>
<h2>Autor: '.  $wiersz["autor"] .'</h2>
<h2>Gatunek: '.  $wiersz["gat"] .'</h2>
<h2>Wydawnictwo: '.  $wiersz["wyd"] .'</h2>
<h2>Oprawa: '.  $wiersz["okl"] .'</h2>
<button>'. $wiersz["cena"] .' zł Kup teraz</button>';

if (($_SESSION['zalogowany'])== TRUE )
{
    echo'<a href="index.php?plik=usun&nr=' . $nr . '"><button><i class="fas fa-trash-alt"></i></button></a>';
    echo' <a href="index.php?plik=edycja&nr=' . $nr . '"><button type="button"><i class="fas fa-edit"></i></button></a>';
}

echo'</div>';

echo '<div class="opis">'.  $wiersz["opis"] .'</div>';
?>
</div>

