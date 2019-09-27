<html> 

<head> 

<meta charset="utf-8"> 

</head> 

<body> 

<h1>Hello World!</h1> 

<?php
	$data = $_POST['data'];

	echo $data;
?>

</body> 

<script> 
	var val = "<?php echo $data; ?>"; 
</script> 

</html>
