<?php
include 'fetchmusic.php';
class Musicplayer{

    function player($musicurl,$id,$musicname){
        $playerHTML = '<ul><li data-url="'.$musicurl.'">'.$musicname.'</li></ul>';
        echo $playerHTML;
    }
}

$player  = new Musicplayer();


?>