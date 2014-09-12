<?php 

include('../common/common.php');

$headline = $_POST['headline'];
$price = $_POST['price'];
$description = $_POST['description'];
$image01 = $_POST['image01'];
$image02 = $_POST['image02'];
$image03 = $_POST['image03'];
$image04 = $_POST['image04'];
$id = $_POST['userid'];


$sanitized_price = preg_replace('/[^0-9]/', '', $price);


$query_params = array(
      ":headline" => $headline,
      ":price" => $sanitized_price,
      ":image01" => $image01,
      ":image02" => $image02,
      ":image03" => $image03,
      ":image04" => $image04,
      "description" => $description,
      ":id" => $id      
    );


  $query = " 
          INSERT INTO pants_table
          SET headline = :headline, price = :price, image01 = :image01, image02 = :image02, image03 = :image03, image04 = :image04, owner_id = :id, description = :description
   	";


   	try 
 	{ 
    	$stmt = $db->prepare($query);
    	$result = $stmt->execute($query_params);
	} 
	catch(PDOException $ex)
	{die("Failed to run query: " . $ex->getMessage());}

  $img = resize_image($image01, 200, 200);
  imagepng($img, $image01);



  header("location: ../new_pants.php");

	function resize_image($file, $w, $h, $crop=FALSE) {
      list($width, $height) = getimagesize($file);
      $r = $width / $height;
      if ($crop) {
          if ($width > $height) {
              $width = ceil($width-($width*abs($r-$w/$h)));
          } else {
              $height = ceil($height-($height*abs($r-$w/$h)));
          }
          $newwidth = $w;
          $newheight = $h;
      } else {
          if ($w/$h > $r) {
              $newwidth = $h*$r;
              $newheight = $h;
          } else {
              $newheight = $w/$r;
              $newwidth = $w;
          }
      }
      $src = imagecreatefromjpeg($file);
      $dst = imagecreatetruecolor($newwidth, $newheight);
      imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

      return $dst;
  }

    ?>

