<?php
    require 'define/connect_db.php';
    require 'define/define.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Viet Anime</title>
        <link href="css/icon.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    </head>
    <body>
        <nav class="white" role="navigation">
            <div class="nav-wrapper container">
<!--                <a href="#" data-activates="slide-out" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>-->
                <a id="logo-container" href="#" class="brand-logo teal-text">Viet Anime</a>
                
                <ul class="right hide-on-med-and-down">
                    <li><a href="init.php" class="teal-text">Upload</a></li>
                    <li><a class="waves-effect waves-light btn">Sign in</a></li>
                </ul>
                <!--<ul class="right hide-on-large">-->
                <!--    <li><a href="sass.html"><i class="material-icons teal-text">search</i></a></li>-->
                <!--    <li><a href="badges.html"><i class="material-icons teal-text">view_module</i></a></li>-->
                <!--    <li><a href="mobile.html"><i class="material-icons teal-text">more_vert</i></a></li>-->
                <!--</ul>-->
            </div>
        </nav>
        
        <div class="container">
            <div class="row">
                <?php
                    $json_data = file_get_contents($websiteInitURL);
                    $json = json_decode($json_data, true);
                for ($i=0; $i<count($json); $i++) {
                    echo '<div class="col s12 m4 l3">
                        <div class="col s12 m11 l11">
                            <div class="card hoverable">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <div class="thumbnail">
                                        <img src="' . $json[$i]['image'] . '" class="responsive-img activator" alt="Image" />
                                    </div>
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">' . $json[$i]['title'] . '</span>
                                    <p><a href="' . $json[$i]['link'] . '">Xem phim</a></p>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">' . $json[$i]['title'] . '<i class="material-icons right">close</i></span>
                                    <p>' . $json[$i]['description'] . '</p>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                 ?>
            </div>
        </div>
        
        <ul id="slide-out" class="side-nav">
            <li><a href="#!">First Sidebar Link</a></li>
            <li><a href="#!">Second Sidebar Link</a></li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header">Dropdown<i class="mdi-navigation-arrow-drop-down"></i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="#!">First</a></li>
                                <li><a href="#!">Second</a></li>
                                <li><a href="#!">Third</a></li>
                                <li><a href="#!">Fourth</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <!--<video class="afterglow" id="myvideo" width="1280" height="720" data-autoresize="fit" data-skin="dark">-->
        <!--    <source type="video/mp4" src="https://video-sit4-1.xx.fbcdn.net/v/t43.1792-2/12675636_203990453299469_1831762985_n.mp4?efg=eyJybHIiOjE1MDAsInJsYSI6NDA5NiwidmVuY29kZV90YWciOiJzdmVfaGQifQ%3D%3D&rl=1500&vabr=602&oh=e62a540c68e4cc2a22b2f75f2e73bbea&oe=57304F36" data-quality="hd"/>-->
        <!--    <source type="video/mp4" src="https://video-sit4-1.xx.fbcdn.net/v/t42.1790-2/12846914_834329666693664_269052571_n.mp4?efg=eyJybHIiOjMwMCwicmxhIjozNzc4LCJ2ZW5jb2RlX3RhZyI6InN2ZV9zZCJ9&rl=300&vabr=146&oh=56eb91f0a1d7b2fd6269b2b6b8668bef&oe=5730490A" />-->
        <!--</video>-->
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script src="js/afterglow.min.js"></script>
    </body>
</html>