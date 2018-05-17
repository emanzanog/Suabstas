<?php
if(isset($_FILES['file'])){
	$target = "../media/img/";
	$imgs = $_FILES['file'];
	$nombres = [];
	for ($i=0; $i < count($imgs['name']) ; $i++) { 
		$inicial = $target . basename($imgs["name"][$i]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($inicial,PATHINFO_EXTENSION));
		//$nombre = str_replace(".".$imageFileType,"",$imgs["name"][$i]);
		$target_file = random_string($target,16,$imageFileType);
		$check = getimagesize($imgs["tmp_name"][$i]);
		if($check !== false) {
	        // echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        // echo "File is not an image.";
	        echo "1-";
	        $uploadOk = 0;
	    }
	    if (file_exists($target_file)) {
		    // echo "Sorry, file already exists.";
		    // echo "2-";
		    $uploadOk = 0;
		}
		if ($imgs["size"][$i] > 2000000) {
		    // echo "Sorry, your file is too large.";
		    echo "3-";
		    $uploadOk = 0;
		}
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
		    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    echo "4-";
		    $uploadOk = 0;
		}

		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		    break;
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($imgs["tmp_name"][$i], $target_file)) {
		    	$aux = str_replace("..",".",$target_file);
		        $nombres[] = $aux;
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		        break;
		    }
		}

	}
	echo json_encode($nombres, JSON_FORCE_OBJECT);
}else{
	echo "ERROR";
}

function random_string($path,$length,$extension) {
   	
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'), range('A','Z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    $final = $path . $key . "." . $extension;
    if(file_exists($final)){
    	$final = random_string($path,$length,$extension);
    }
    return $final;
}

?>