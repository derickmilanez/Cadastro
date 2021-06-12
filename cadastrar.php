<html>
<head>
<title> DATABASE </title>
</head>
<body>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "aluno";
$ra   = $_POST["ra"];
$nome = $_POST["nome"];
$conn = mysqli_connect($hostname,$username,$password,$database);
if(isset($_POST["insert"]))
{
$sql = "insert into alunos_cadastrados values ('$ra','$nome')";
mysqli_query($conn,$sql);
echo "<center>
<h1> DADOS REGISTRADOS. </h1>
</center>";
}
else if(isset($_POST["select"]))
{
	$sql = "select * from alunos_cadastrados";
	$result = mysqli_query($conn,$sql);
	while ($row=mysqli_fetch_assoc($result))
	{
		echo $row["ra"]." - ".$row["nome"]."<br>";
	}
}
else if(isset($_POST["update"]))
{
	$sql = "update alunos_cadastrados set nome='$nome' where ra='$ra'";
	mysqli_query($conn,$sql);
}
else if(isset($_POST["delete"]))
{
	$sql = "delete from alunos_cadastrados";
	mysqli_query($conn,$sql);
}
mysqli_close($conn);
?>
</body>
</html>