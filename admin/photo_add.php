<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("INSERT INTO photo_album (photo) values (:photo)");
			$stmt->execute(['photo'=>$filename]);
			$_SESSION['success'] = 'Phto uploaded successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();

	}
	else{
		$_SESSION['error'] = 'Something went rong!';
	}

	header('location: photo_album.php');
?>