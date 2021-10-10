<?php
include 'dbconfig.php';
if($_REQUEST["flag"]=='search'){
    $q = $_REQUEST["q"];//fetch songid from requestmade
//Fetch all the data for the music
$query= $database->query("SELECT * FROM `musiclibrary` WHERE `songname`='$q'");//WHERE id=$q
$queryResult=mysqli_fetch_assoc($query);
echo json_encode($queryResult);//encodes the result in a json obect.
}
else if($_REQUEST['flag']=='filter'){
    $q = $_REQUEST["q"];
    $f = $_REQUEST["f"];
//Fetch all the data for the music
if($q=='' || $f==''){
    $query= $database->query("SELECT * FROM `musiclibrary`");
if(mysqli_num_rows($query)>0){
    while($row=mysqli_fetch_assoc($query)){
        echo '<li class="list-data" data-url="'.$row['musicurl'].'"><img style="border:1px solid;border-radius:10px;width:fit-content;" src="'.$row['artwork'].'" height="50px" width="50px"></img><div style="width:100%;margin-left:10px;"><div>'.$row['songname'].'</div><div style="font-weight:lighter;font-size:medium">'.$row['artist'].'<span style="float:right;">'.$row['duration'].'</span></div></div></li>';
    }
}
}
else{
    $query= $database->query("SELECT * FROM `musiclibrary` WHERE `gener`='$q' and `language`='$f'");
if(mysqli_num_rows($query)>0){
    while($row=mysqli_fetch_assoc($query)){
        echo '<li class="list-data" data-url="'.$row['musicurl'].'"><img style="border:1px solid;border-radius:10px;width:fit-content;" src="'.$row['artwork'].'" height="50px" width="50px"></img><div style="width:100%;margin-left:10px;"><div>'.$row['songname'].'</div><div style="font-weight:lighter;font-size:medium">'.$row['artist'].'<span style="float:right;">'.$row['duration'].'</span></div></div></li>';
    }
}
else{
    echo "<li><h3>No matching song found!</h3></li>";
}
}

}
else{
    //$q= $_REQUEST["q"];
    $data=array();
    $query= $database->query("SELECT * FROM `musiclibrary`");//WHERE id=$q
    if(mysqli_num_rows($query)>0){
        while($row=mysqli_fetch_object($query)){
            $data[]=$row;
        }
    }
echo json_encode($data);//encodes the result in a json object.
}

?>
