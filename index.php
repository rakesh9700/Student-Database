<!DOCTYPE html>
<html>
<head>
	<title>Search Student</title>
	<style>
        body{
            background-color:white;
        }
        input[type=text]{
            width:25%;
            height:5%;
            border: 1px;
            border-radius:05px;
            padding:8px 15px 8px 15px;
            margin: 10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1px grey;
        }
		input[type=submit]{
			width:7%;
			height:3%;
			border: 1px;
            border-radius:05px;
            padding:8px 15px 8px 15px;
            margin: 10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1px grey;
		}
		table{
			width:80%;
			margin: 10px 0px 15px 0px;
  			border: 1px solid black;
			border-collapse: collapse;
		}
		th{
			background-color: #4CAF50;
			color: white;
			border: 1px solid black;
			padding: 5px;
			text-align:center;
		}
		tr{
			border: 1px solid black;
			padding: 5px;
			text-align:center;
		}
		td{
			border: 1px solid black;
			padding: 5px;
			text-align:center;
		}
		button {
    		border: 0;
    		padding: 0;
    		display: inline;
    		background: none;
    		text-decoration: underline;
    		color: blue;
		}
		button:hover {
    		cursor: pointer;
		}
    </style>
</head>

<body>
<center>

<h3>Enter the Details below</h3>

<form action="" method="post">
	<input type="text" name="search" placeholder="Enter Name or Phone or Marks"><br>
	Input Type: 
	<select name="column">
		<option value="Name">Name</option>
		<option value="Phone">Phone</option>
		<option value="Email">Email</option>
		<option value="Total_Marks">Marks</option>
	</select><br>
	<input type ="submit" name="submit" value="Submit">
</form>

</body>
<?php if(isset($_POST['search']) && isset($_POST['column'])): ?>
<?php
$search = $_POST['search'];
$column = $_POST['column'];

$servername = "localhost";
$username = "studentadmin";
$password = "studentpassword";
$db = "studentdb";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

if($column != "Total_Marks"){
	$sql = "SELECT * from studentdbtable WHERE $column LIKE '%$search%'";
	$result = $conn->query($sql);

	?>

	<table id="student">
		<tr>
    	<th>Name</th>
		<th>Phone</th>
    	<th>Email</th>
		<th>Marks I</th>
		<th>Marks II</th>
		<th>Marks III</th>
		<th>Marks IV</th>
		<th>Marks V</th>
		<th>Total Marks</th>
	</tr>

<?php
if ($result->num_rows > 0){
while($row = mysqli_fetch_array($result)){
?>
	<tr>
	<?php
	echo '<td>'.$row['Name'].'</td>';
	echo '<td>'.$row['Phone'].'</td>';
	echo '<td>'.$row['Email'].'</td>';
	echo '<td>'.$row['Marks I'].'</td>';
	echo '<td>'.$row['Marks II'].'</td>';
	echo '<td>'.$row['Marks III'].'</td>';
	echo '<td>'.$row['Marks IV'].'</td>';
	echo '<td>'.$row['Marks V'].'</td>';
	echo '<td>'.$row['Total_Marks'].'</td>';
	?>
	</tr>
	<?php
}
?>
	</table>

<input type="button" id="btnExport" value="Export" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        $("body").on("click", "#btnExport", function () {
            html2canvas($('#student')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("student-details.pdf");
                }
            });
        });
    </script>

<?php
}

else if($result->num_rows <= 0){
	echo "Invalid Entry";
}

}

//For Part 3
else{
	$sql = "SELECT * from studentdbtable WHERE $column > '$search'";
	$result = $conn->query($sql);
	echo '<h3>'.'List of students who got greater than '.$search.' marks'.'</h3>'
	?>

	<table>
		<tr>
    		<th>Name</th>
			<th>Total Marks</th>
		</tr>

<?php
if ($result->num_rows > 0){
while($row = mysqli_fetch_array($result)){
	?>
	<tr>
	<td>
		<form action="" method="post">
    		<input type="hidden" name = search value="<?php echo $row['Name']; ?>" column="Name" />
			<input type="hidden" name = column value="Name" />
			<?php echo '<button>'.$row['Name'].'</button>'; ?>
		</form>
	</td>
	<?php echo '<td>'.$row['Total_Marks'].'</td>';?>
	</tr>
	<?php
}
?>
</table>

<?php
}
else if($result->num_rows <= 0){
	echo "Invalid Entry";
}
}

$conn->close();
?>
<?php endif; ?>
</center>
</html>