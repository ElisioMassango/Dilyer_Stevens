<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$slug = slugify($name);
		$category = $_POST['category'];
		$link = $_POST['link'];
		$video_link = $_POST['vi_link'];
		$description = $_POST['description'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE songs SET name=:name, slug=:slug, category_id=:category, link=:link,video=:video_link, description=:description WHERE id=:id");
			$stmt->execute(['name'=>$name, 'slug'=>$slug, 'category'=>$category, 'link'=>$link,'video_link'=>$video_link, 'description'=>$description, 'id'=>$id]);
			$_SESSION['success'] = 'Song updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit song form first';
	}

	header('location: music.php');

?>