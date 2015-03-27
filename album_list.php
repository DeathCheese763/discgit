<?php
require('database_connect.php');
$q="SELECT title,year,info FROM album ORDER BY year ASC";
$album=@mysqli_query($dprv,$q);
if($album){
    echo '<div class="row"><!-- row 3: accordion panels with album covers and info --><div class="panel-group" id="accordion">';
    while ($row = mysqli_fetch_array($album, MYSQLI_ASSOC)){
        echo'
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#'.$row['year'].'" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">
                    <img src="images/'.$row['title'].'.png" width="240" height="240" alt="Picture of cover" TITLE="Album: '.$row['title'].'"/>
                    </a><!--end of accordion-toggle-->
                </div><!--panel-heading-->
                <div id="'.$row['year'].'" class="panel-collapse collapse">
                    <div class="panel-body">
                        <h4>'.$row['title'].' ('.$row['year'].'):</h4>
                        <p>'.$row['info'].'</p>
                        <h5>Track List</h5>';
        $at=mysqli_real_escape_string($dprv,$row['title']);
        $q="SELECT album.title,track.title as songtitle FROM album LEFT JOIN track on track.album_id=album.album_id WHERE album.title='$at' ORDER BY track_id ASC";
        $track=@mysqli_query($dprv,$q);
        if($track){
            echo "<ol>";
            while($row1 = mysqli_fetch_array($track, MYSQLI_ASSOC)){
                echo '<li>"'. $row1['songtitle'] . '"</li>';
            }
            echo "</ol>";
        }else{
            echo '<p class="error">The track list for this album could not be retrived. We apologize for any inconvenience.</p>';
        }
        echo "          </div><!--panel-body-->
                    </div><!-- nation panel-collapse-->
                </div><!--panel panel-default-->";
    }
    echo'
        </div><!--end of panel-group & accordion-->
        </div><!--end of row 3-->';
}else{
    echo'<p class="error">The album list could not be retrived. We apologize for any inconvenience.</p>';
}
?>