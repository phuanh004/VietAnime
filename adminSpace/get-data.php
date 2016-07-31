<?php
    require '../define/define.php';
    require '../define/connect_db.php';
    require '../image_resize_crop.php';
    $status = "";

    $json_data = file_get_contents($websiteInitURL);
    $json = json_decode($json_data, true);

    $id = $_GET["id"];

    $title = $json[$id]["title"];
    $link = $json[$id]["link"];
    $image = $json[$id]["image"];
    $description = $json[$id]["description"];
    $ep = $json[$id]["ep"];

//    echo $image;
    $imgTitle = trim(str_replace(" ", "_",$title));
    $img = $websiteImageURL . 'img'.$imgTitle.'.jpg';
//
    file_put_contents($img, file_get_contents($image));
//    resize_crop_image(101, 121, $img, $img);
    resize_crop_image(208, 297, $img, $img);
    $image = $websiteURL .'/image/img'.$imgTitle.'.jpg';


    $sql = "INSERT INTO anime (id, title, link, image, description, ep) VALUES (NULL, '".$title."', '".$link."','".$image."', '".$description."', '".$ep."');";
//echo $sql;
//    $db->query($sql);

    if (mysqli_query($db, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
    }

    $sql2 = "SELECT * FROM anime";
    $result = mysqli_query($db, $sql2) or die("Error in Selecting " . mysqli_error($db));
    $animeArray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $animeArray[] = $row;
    }

    $myfile = fopen($websiteNewURL, "w") or die("Unable to open file!");
    fwrite($myfile, json_encode($animeArray));
    fclose($myfile);

    mysqli_close($db);

    echo $status;
?>