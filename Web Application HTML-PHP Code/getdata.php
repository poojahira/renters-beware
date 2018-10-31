<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = strval($_GET['q']);
$v = strval($_GET['v']);
$b = intval($_GET['b']);

if ($b == 1) {
        $b = "manhattan";
}else if ($b == 2){
        $b = "bronx";
}else if ($b == 3){
        $b = "brooklyn";
}else if ($b == 4){
        $b = "queens";
}else{
        $b = "staten-island";
}
$con = mysqli_connect('localhost','root','root','mysql');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"mysql");
$sql="SELECT * FROM buildingdata WHERE ".$q;
$result = mysqli_query($con,$sql);

//echo "$sql";
echo "<table>
<tr>
<th>HouseNumber</th>
<th>StreetName</th>
<th>BoroID</th>
<th>Neighborhood</th>
<th>Safety_Score</th>
<th>Quality_of_life_score</th>
<th>Investment_or_Gentrification_score</th>
<th>Overall_Neighborhood_Score</th>
<th>All_311_Complaints</th>
<th>311_Housing_Complaints</th>
<th>311_Noise_Complaints</th>
<th>311_Rodent_Complaints</th>
<th>311_Garbage_Complaints</th>
<th>311_Air_Water_Complaints</th>
<th>311_Street_Sidewalk_Complaints</th>
<th>311_Graffiti_Complaints</th>
<th>311_Public_Drinking_Complaints</th>
<th>Total_Housing_Violations</th>
<th>Elevator_Violations</th>
<th>No_Inspection_on_boiler_Violations</th>
<th>Low_pressure_boiler_Violations</th>
<th>Construction_Violations</th>
<th>Extremely_Hazardous_Violations</th>
<th>Housing_Preservation_and_Development_Department_Violations</th>
<th>All_Crimes</th>
<th>Grand_Larceny</th>
<th>Fraud_and_Theft</th>
<th>Rape_and_other_Sex_Crimes</th>
<th>Murder_and_Manslaughter</th>
<th>Burglary</th>
<th>Harassment</th>
<th>Arson</th>
<th>StreetEasy Link</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['HouseNumber'] . "</td>";
    echo "<td>" . $row['StreetName'] . "</td>";
    echo "<td>" . $row['BoroID'] . "</td>";
    echo "<td>" . $row['NTA'] . "</td>";
    echo "<td>" . $row['Safety_Score'] . "</td>";
    echo "<td>" . $row['Quality_of_life_score'] . "</td>";
    echo "<td>" . $row['Investment_Gentrification_score'] . "</td>";
    echo "<td>" . $row['Overall_Neighborhood_Score'] . "</td>";
    echo "<td>" . $row['All_Complaints'] . "</td>";
    echo "<td>" . $row['Housing_Complaints'] . "</td>";
    echo "<td>" . $row['Noise_Complaints'] . "</td>";
    echo "<td>" . $row['Rodent_Complaints'] . "</td>";
    echo "<td>" . $row['Garbage_Complaints'] . "</td>";
    echo "<td>" . $row['Air_Water_Complaints'] . "</td>";
    echo "<td>" . $row['Street_Sidewalk_Complaints'] . "</td>";
    echo "<td>" . $row['Graffiti_Complaints'] . "</td>";
    echo "<td>" . $row['Public_Drinking_Complaints'] . "</td>";
    echo "<td>" . $row['Total_Violation'] . "</td>";
    echo "<td>" . $row['Elevator_Violation'] . "</td>";
    echo "<td>" . $row['No_Inspection_on_boiler_Violation'] . "</td>";
    echo "<td>" . $row['Low_pressure_boiler_Violation'] . "</td>";
    echo "<td>" . $row['Construction_Violation'] . "</td>";
    echo "<td>" . $row['Administration_Violation'] . "</td>";
    echo "<td>" . $row['House_prevention_and_development_Violation'] . "</td>";
    echo "<td>" . $row['TOTAL_CRIMES'] . "</td>";
    echo "<td>" . $row['GRAND_LARCENY'] . "</td>";
    echo "<td>" . $row['FRAUD_AND_THEFT'] . "</td>";
    echo "<td>" . $row['RAPE_AND_OTHER_SEX_CRIMES'] . "</td>";
    echo "<td>" . $row['MURDER_AND_MANSLAUGHTER'] . "</td>";
    echo "<td>" . $row['BURGLARY'] . "</td>";
    echo "<td>" . $row['HARRASSMENT'] . "</td>";
    echo "<td>" . $row['ARSON'] . "</td>";
    echo '<td><a href="https://streeteasy.com/building/' . $v . "-" . $b . '">StreetEasy Link</a></td>';
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>