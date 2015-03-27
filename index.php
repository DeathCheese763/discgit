<?php include("header.php") ?>
       <div class="band">
          <h2 class="logo">train</h2>
          <h2 class="logo"> What is it?</h2>
            <p >Train is an American pop rock band from San Francisco, California. The band currently consists of a core trio of Pat Monahan, Jimmy Stafford, and Scott Underwood. (1)</p>
            <img src="images/musicCropBlack.png" class="music" alt="musical notes">
            <p>At the turn of the 21st century, songs like "Calling All Angels" and "Drops of Jupiter" made the San Francisco residents some of America's most popular balladeers. The group found real success in the pop/rock world, where Train straddled the line between adult contemporary and family-friendly alternative rock.</p>
                <img src="images/musicCropBlack.png" class="music" alt="musical notes">
             <p>The hits began drying up after 2003, but Train returned to the charts in 2010, when the single "Hey, Soul Sister" became a surprise Top 10 hit! (2)
            </p>
            <img src="images/musicCropBlack.png" class="music" alt="musical notes">
            </div><!--end of band--> 
        </div><!--end of row 2: the band-->
<?php include("album_list.php") ?>
    <div class="row"><!--row 4-->
        <section id="meet-guys">
          
            <div class="row"><!--interior row-->
            <div class="guy col-lg-4" id="pat">
                <h4>PATRICK MONAHAN</h4>
                  <img src="images/patinjacket.jpg" alt="Pat Monahan on stage" TITLE="Pat Monahan" class="portrait"/>
                    <p>&quot;Best known as the lead singer for the rock band Train, Pat Monahan is a longtime performer in his own right. Born in Erie, PA, in 1969, Monahan moved to California in 1993 and began singing in coffeehouses around San Francisco with guitarist Rob Hotchkiss. The duo added members, named themselves Train, and eventually found success with the 2001 album Drops of Jupiter. In 2006, Train decided to take a break from touring and recording and Monahan accepted an offer to write music with British singer/songwriter and producer Guy Chambers for a Tina Turner project. The creative partnership stuck, and soon Monahan was writing music with Chambers and others with an eye on his own album. He released Last of Seven on Sony in 2007.&quot; (2)</p>
            </div><!--end of guy: pat-->
            
            <div class="guy col-lg-4" id="jimmy">
            <h4>Jimmy Stafford</h4>
            <img src="images/sidejimmystafford.jpg" alt="Jimmy Stafford on stage" TITLE="Jimmy Stafford"/>
            <p>Jimmy Stafford is the lead guitarist and founding member of the Grammy award winning band Train. Born in Morris, Illinois on April 26th 1964, Jimmy is the proud father of a young daughter. He resides in Las Vegas and Chicago. (3)</p>
            <p>Prior to joining Train, Stafford was a member of the band The Apostles along with former Train members Charlie Colin and Rob Hotchkiss. The group released a self titled album in 1992.
            Stafford has also written his first book, a novel, titled "The Guitar on the Wall" that is due to be released after the completion of Train's tour for the album Save Me, San Francisco 
            Filmography:
            "Train: Midnight Moon" Himself, 
            "CSI:NY - Second Chances" Guitarist (4)
            </p>
        </div><!--end of guy: jimmy-->

            <div class="guy col-lg-4" id="scott">
            <h4>Scott Underwood</h4>
            <img src="images/closeupscott.jpg" alt="Scott Underwood on stage" TITLE="Scott Underwood"/>
            <p>Scott Underwood has been a member of Train since 1994 when the rock/pop rock band originally formed. He started playing drums at the age of 11 and has been a musician ever since. An active learner Underwood has been taking Berklee’s online classes while on tour. In addition, Underwood and bass player Charlie Colin recently formed the new eclectic group Foodpill. (5)</p>
            <p> Scott grew up in Saratoga Springs, New York. "Not being heavily instructed, I developed my own approach to drumming that might not be technically profound, but I believe in a drummer developing his or her own style. Pat is so good at song writing that it became a challenge for me to come up with just the right part to fit these songs that had perfect verses, perfect choruses. That was what made it interesting." (6)</p>
        </div><!--end of guy: scott-->
        </div><!--end of interior row-->
        </section><!--end of meet-guys-->
    </div><!--end of row 4-->

    <div class="row">
        <div id="latest">
            <h4>Train's Latest Hit!</h4>
            <?php
                $q="SELECT detail_1,detail_2,youtubelink FROM latest_hit WHERE current='true';";
                $result=@mysqli_query($dprv,$q);
                if(@mysqli_num_rows($result)==1){
                    $insert=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    echo'
                    <h4>'.$insert["detail_1"].'</h4>
                    <h4>'.$insert["detail_2"].'</h4>
                    <div class="video">
                    <iframe src="'.$insert["youtubelink"].'" allowfullscreen></iframe></div><!--end of video-->';
                }else{
                    echo"<h4>Error</h4>
                    <h4>Unable to display Latest Hit</h4>";
                }
                mysqli_close($dprv);
            ?>
        <img src="images/musicCropBlack.png" class="music" alt="musical notes">
        </div><!--end of latest-->
<?php include("footer.php") ?>