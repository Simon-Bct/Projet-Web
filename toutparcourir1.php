<?php

echo "<meta charset=\"utf-8\">";

$database = "inscription";

$db_handle = mysqli_connect('localhost', 'root', 'root');
$db_found = mysqli_select_db($db_handle, $database);

$choice = $_POST['choix'];
//$choice = isset($_POST["choix"])? $_POST["choix"] : "";

$choice = (int)$choice;
$sql = "";

if ($db_found) {

//code MySQL. $sql est basé sur le choix de l’utilisateur
	switch ($choice) {

            case 1:
			$sql = "SELECT * FROM items";
			break;

       		case 2:
			$sql = "SELECT * FROM items WHERE Categorie = '1' ";
            break;

        	case 3:
			$sql = "SELECT * FROM items WHERE Categorie = '0' ";
            break;

        	case 4:
			$sql = "SELECT * FROM items WHERE Categorie = '2' ";
            break;

			default:
			$sql = "SELECT * FROM items";
			break;                

}
			

}

$result = mysqli_query($db_handle, $sql);

echo "<table border=\"1\">";
echo "<tr>";
echo "<th>" . "ID_Items" . "</th>";
echo "<th>" . "Nom" . "</th>";
echo "<th>" . "Descrition" . "</th>";
echo "<th>" . "Prix" . "</th>";
echo "<th>" . "Image" . "</th>";
echo "</tr>";


while ($data = mysqli_fetch_assoc($result)) { 
	echo "<tr>";
	echo "<td>" . $data['ID_Item'] . "</td>";
	echo "<td>" . $data['Nom'] . "</td>";
    echo "<td>" . $data['Description'];
    echo "<td>" . $data['Prix'] . "</td>";
    $image = $data['Image'];
	echo "<td>" . "<img src='$image' height='120' width='100'>" . "<td>";
	echo "</tr>";
}
echo "</table>"; 


mysqli_close($db_handle);

?>