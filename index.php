<?php
include 'dbconfig.php'; //including the database file.
$database->connectionCheck();//Checks the connection with the database.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="musicplayer.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c56f65a834.js" crossorigin="anonymous"></script>
    <title>Final project|MusicPlayer</title>
</head>
<body>
<Header id="header">
    <div class="navbar">
    <img style="margin:10px;" src="favicon.ico" alt="Musicstream" height="37px" width="37px" >
        <div class="navbar-left"><ul>
            <li id="home"><a href="">Home<a/></li>
            <li id="aboutUs"><a href="aboutUs">About us</a> </li>
        </ul>
        <div class="searchbar">
            <button class="inputbox">
            <svg width="18" height="18" viewBox="0 0 25 25"><path class="svg_color" fill="#000" fill-rule="evenodd" d="M10.5 2A6.5 6.5 0 0 1 17 8.5c0 1.6-.6 3.1-1.56 4.23l.27.27h.8l5 5-1.5 1.5-5-5v-.8l-.27-.27C13.55 14.447 12.05 15 10.5 15a6.5 6.5 0 1 1 0-13zm0 2A4.48 4.48 0 0 0 6 8.5a4.48 4.48 0 0 0 4.5 4.5A4.48 4.48 0 0 0 15 8.5 4.48 4.48 0 0 0 10.5 4z"></path></svg>
            <span>Search Artists, Songs, Albums</span>
            </button>
        <section class="searchwrap">
        <input type="search" placeholder="Search song..." name="searchsong" id="searchsong" onkeyup="fetchmusic(this.value)">
        <div  class="searchresult"><ul style='padding:0;' id="searchresult" class="playlistdata">search...</ul></div>
        </section>
        </div>
        <div class="navbar-right">
            <ul><li class="themeswitch" id="themeswitch"></li></ul>
        </div>
    </div>
    </Header>
    <main>
        <section id='playlist'>
            <div id="plalistselector">
                <form onchange="fetchplaylist(this.gener.value,this.language.value)"  id="playlistsearch" enctype="multipart/form-data" method="get">
                    <label for="gener">Gener:</label>
                    <select name="gener" id="gener">
                        <option value=''>select</option>
                        <?php
                            $query=$database->query('SELECT DISTINCT `gener` from `musiclibrary`');
                            if(mysqli_num_rows($query)>0){
                                while($row=mysqli_fetch_assoc($query)){
                                    echo '<option value='.$row["gener"].'>'.$row['gener'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    <label for="Language">Language:</label>
                    <select name="language" id="language">
                        <option value=''>Select</option>
                        <?php
                            $query=$database->query('SELECT DISTINCT `language` from `musiclibrary`');
                            if(mysqli_num_rows($query)>0){
                                while($row=mysqli_fetch_assoc($query)){
                                    echo '<option value='.$row["language"].'>'.$row['language'].'</option>';
                                }
                            }
                        ?>
                        
                    </select>
                </form>
            </div>
            <div id="playlist">
            <h2>Click below song list to play that song.</h2>
            <ul id="playlistdata" class="playlistdata">
            </ul>
            </div>
        </section>
    </main>
    <aside class="aside_player">
        <div class='musicplayer'>
                <img id="artwork" class="music-logo" src="" alt="sdfds" height="40px" width="40px">
            <aside class='seekbar'>
            <div class="progress_div" id="progress_div">
                        <div class="progress" id="progress"></div>
                    </div>
            </aside>
            <div id="musicinfo">
                <div class="songmetadata"><h4 style="margin:0" id="songname"></h4>
                <h5  id="artist"></h5>
                <span id="author" style="display: none;"></span></div>
                <div class="songtimer"><span class="duration">
                    <span id="current_time">0:00</span>|
                    <span id="duration">4:14</span>
                </span></div>
            </div>
            <!--MUSIC PLAYER CONTROLS-->
        <i id="previous" class="fas fa-step-backward"></i>
        <span id="songstatus"><i id="play" class="fas fa-play"></i></span>
        <i id="next" class="fas fa-step-forward"></i>
        </div>
    <audio src="" id="audio" ></audio>
    </aside>
    
    <script src="index.js"></script>
    <script src="searchdata.js"></script>
    <script type="module" src="musicplayer.js"></script>
    <script src="navbar.js"></script>
</body>
</html>