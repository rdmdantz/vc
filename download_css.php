<?php
error_reporting(0);


		//create DB connection
		$servername = "localhost";
		$username = "root";
		$password = "";
		$conn = new mysqli($servername, $username, $password);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		 

	$select	=	'SELECT MAX(ID) AS ID FROM `CMS`.`html_css`';
					$result	=	$conn->query($select);
					$row=mysqli_fetch_assoc($result);
					$index	=	$row['ID'];
					//echo $index;
	$select_data	=	"SELECT * FROM `CMS`.`html_css` WHERE ID	= $index";
					$result	=	$conn->query($select_data);
					
					while($row=mysqli_fetch_assoc($result)){
					$file	=	$row['CLASS'];
					}
					//print_r($file);
			//$myfile = fopen($file, "w");
			
			/*$current = file_get_contents($file);*/
			//file_put_contents($file, $current);					
			//echo	$row['CLASS'];
			$file = 'dummy/'.$file.'.css';

			
			
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}
?>