<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>VietAnime</title>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    <?php
        $urlPhimMoi = "http://animetvn.com/danh-sach/phim-moi.html";

        $listPhimArray = array();
        //     $item = array();

        include_once 'simple_html_dom.php';
        include_once 'image_resize_crop.php';
        include_once 'define/define.php';

        $agent = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);
        curl_setopt($ch, CURLOPT_URL, $urlPhimMoi);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);

        $html = str_get_html($result);

        $listPhim = str_get_html($html->find(".list_movie", 0)->innertext);

        //     echo $result;
        foreach ($listPhim->find('.items') as $it) {
            //         $item1 = array();
            $item1['title'] = $it->find('.data a', 0)->title;

            // Xu ly anh
            $item1['image'] = $it->find('img', 0)->src;
        //          $url = $it->find('img', 0)->src;
        //          $imgTitle = str_replace(" ", "_",$item1['title']);
        //          $img = 'image/img'.$imgTitle.'.jpg';

        //          file_put_contents($img, file_get_contents($url));
        //          resize_crop_image(101, 121, $img, $img);
//                  $item1['image'] = 'https://parser-phuanh004.c9users.io/'.$img;


            $item1['ep'] = $it->find('.time', 0)->innertext;
            $link = $it->find('.data a', 0)->href;


            curl_setopt($ch, CURLOPT_USERAGENT, $agent);
            curl_setopt($ch, CURLOPT_URL, $link);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);

            $html = str_get_html($result);
            $item1['description'] = str_replace("<br>","\n",$html->find('#noidungphim', 0)->innertext);
            $item1['link'] = $html->find('.play_info', 0)->href;

            //      $item['details'] = $article->find('div.details', 0)->plaintext;
            array_push($listPhimArray, $item1);
            // echo $count;
        }

        curl_close($ch);

        $myfile = fopen($websiteInitURL, "w") or die("Unable to open file!");
        fwrite($myfile, json_encode(array_values($listPhimArray)));
        echo '<a href="https://vietanime.com">Success click here to back</a>';
        fclose($myfile);
        //       for ($i = 0; $i < count($listPhimArray); $i++) {
        //           echo $listPhimArray[$i]['title'];
        //           echo '<img src="' . $listPhimArray[$i]['image'] . '" />';
        //       }


        // echo json_encode($listPhimArray[0]['title']);
    ?>
    </body>
</html>