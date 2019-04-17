<?php
session_start();
?>

<?php
$userID = "aclarks";
$userPw = "2904286806";
$mysql = new mysqli(
    "acad.itpwebdev.com",
    $userID,
    $userPw,
    "aclarks_spotify");
?>








<script type="text/javascript" src="jquery-3.2.1.js"></script>
<script>
    $(document).ready(function(){
        $("#popdiv").hide();
        $("#pop").on("click",function(){
            $("#popdiv").slideToggle();
                });
        $("#rapdiv").hide();
        $("#rap").on("click",function(){
            $("#rapdiv").slideToggle();
        });
        $("#rockdiv").hide();
        $("#rock").on("click",function(){
            $("#rockdiv").slideToggle();
        });
        $("#latindiv").hide();
        $("#latin").on("click",function(){
            $("#latindiv").slideToggle();
        });
        $("#electronicdiv").hide();
        $("#electronic").on("click",function(){
            $("#electronicdiv").slideToggle();
        });
        $("#hiphopdiv").hide();
        $("#hiphop").on("click",function(){
            $("#hiphopdiv").slideToggle();
        });
        $("#rbdiv").hide();
        $("#rb").on("click",function(){
            $("#rbdiv").slideToggle();
        });
        $("#countrydiv").hide();
        $("#country").on("click",function(){
            $("#countrydiv").slideToggle();
        });
        $("#housediv").hide();
        $("#house").on("click",function(){
            $("#housediv").slideToggle();
        });
        $("#trapdiv").hide();
        $("#trap").on("click",function(){
            $("#trapdiv").slideToggle();
        });
        $("#reggaetondiv").hide();
        $("#reggaeton").on("click",function(){
            $("#reggaetondiv").slideToggle();
        });
        $("#jazzbluesdiv").hide();
        $("#jazzblues").on("click",function(){
            $("#jazzbluesdiv").slideToggle();
        });
        $("#metaldiv").hide();
        $("#metal").on("click",function(){
            $("#metaldiv").slideToggle();
        });
        $("#indiediv").hide();
        $("#indie").on("click",function(){
            $("#indiediv").slideToggle();
        });
        $("#worshipdiv").hide();
        $("#worship").on("click",function(){
            $("#worshipdiv").slideToggle();
        });
        $("#otherdiv").hide();
        $("#other").on("click",function(){
            $("#otherdiv").slideToggle();
        });
    });
</script>

<html>
<form action="accountdetails.php">
    First Name: <input type="text" name="fname"><br>
    Last Name: <input type="text" name="lname"><br>
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    Re-type Password: <input type="password" name="repass"><br>
    Admin?:
    <input type="radio" name="admin" value="admin">Yes
    <input type="radio" name="admin" value="normal">No<br>
    <hr>
    What Do You Listen To?<br><br>
    <a href="#" id="pop">Pop</a><br>
    <div id="popdiv">
    <?php
    $sql = "SELECT * FROM genreView1 WHERE main_genres = 'pop'";
    $results =  $mysql->query($sql);
    while($currentrow = $results->fetch_assoc()){
       echo "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres']). "'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'" . "name='genre" . $currentrow['all_genre_id'] . "'><br>"
    ;}
    ?>
    </div>
    <a href="#" id="rap">Rap</a><br>
    <div id="rapdiv">
    <?php
    $sql = "SELECT * FROM genreView1 WHERE main_genres = 'rap'";
    $results =  $mysql->query($sql);
    while($currentrow = $results->fetch_assoc()){
        echo "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
       . "name='genre" . $currentrow['all_genre_id'] . "'><br>"        ;}
    ?>
    </div>
    <a href="#" id="rock">Rock</a><br>
    <div id="rockdiv">
    <?php
    $sql = "SELECT * FROM genreView1 WHERE main_genres = 'rock'";
    $results =  $mysql->query($sql);
    while($currentrow = $results->fetch_assoc()){
        echo "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
    . "name='genre" . $currentrow['all_genre_id'] . "'><br>"        ;}
    ?>
    </div>

    <a href="#" id="latin">Latin</a><br>
    <div id="latindiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'latin'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
           echo "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
            . "name='genre" . $currentrow['all_genre_id'] . "'><br>"            ;}
        ?>
    </div>

    <a href="#" id="electronic">Electronic</a><br>
    <div id="electronicdiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'electronic'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
          echo  "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
         . "name='genre" . $currentrow['all_genre_id'] . "'><br>"            ;}
        ?>
    </div>

    <a href="#" id="hiphop">Hip Hop</a><br>
    <div id="hiphopdiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'hip hop'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
           . "name='genre" . $currentrow['all_genre_id'] . "'><br>"            ;}
        ?>
    </div>

    <a href="#" id="rb">R&B</a><br>
    <div id="rbdiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'r&b'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
         echo   "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
          . "name='genre" . $currentrow['all_genre_id'] . "'><br>"            ;}
        ?>
    </div>

    <a href="#" id="country">Country</a><br>
    <div id="countrydiv">
        <?php
        $sql = "SELECT * FROM genreView1 WHERE main_genres = 'country'";
        $results =  $mysql->query($sql);
        while($currentrow = $results->fetch_assoc()){
            echo "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
           . "name='genre" . $currentrow['all_genre_id'] . "'><br>"            ;}
        ?>
    </div>

    <a href="#" id="house">House</a><br>
        <div id="housediv">
            <?php
            $sql = "SELECT * FROM genreView1 WHERE main_genres = 'house'";
            $results =  $mysql->query($sql);
            while($currentrow = $results->fetch_assoc()){
                echo "<a href='https://open.spotify.com/search/results/genre%3A" .str_replace(' ','',$currentrow['all_genres']).$currentrow['all_genres']."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
                . "name='genre" . $currentrow['all_genre_id'] . "'><br>"                ;}
            ?>
        </div>
            <a href="#" id="trap">Trap</a><br>
            <div id="trapdiv">
                <?php
                $sql = "SELECT * FROM genreView1 WHERE main_genres = 'trap'";
                $results =  $mysql->query($sql);
                while($currentrow = $results->fetch_assoc()){
                   echo "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
                 . "name='genre" . $currentrow['all_genre_id'] . "'><br>"                    ;}
                ?>
            </div>

            <a href="#" id="reggaeton">Reggaeton</a><br>
            <div id="reggaetondiv">
                <?php
                $sql = "SELECT * FROM genreView1 WHERE main_genres = 'reggaeton'";
                $results =  $mysql->query($sql);
                while($currentrow = $results->fetch_assoc()){
                  echo  "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes"
                 . "name='genre" . $currentrow['all_genre_id'] . "'><br>"                    ;}
                ?>
            </div>

            <a href="#" id="jazzblues">Jazz/Blues</a><br>
            <div id="jazzbluesdiv">
                <?php
                $sql = "SELECT * FROM genreView1 WHERE main_genres = 'jazz blues'";
                $results =  $mysql->query($sql);
                while($currentrow = $results->fetch_assoc()){
                    echo "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
                  . "name='genre" . $currentrow['all_genre_id'] . "'><br>"                    ;}
                ?>
            </div>

            <a href="#" id="metal">Metal</a><br>
            <div id="metaldiv">
                <?php
                $sql = "SELECT * FROM genreView1 WHERE main_genres = 'metal'";
                $results =  $mysql->query($sql);
                while($currentrow = $results->fetch_assoc()){
                   echo "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
                  . "name='genre" . $currentrow['all_genre_id'] . "'><br>"                    ;}
                ?>
            </div>

            <a href="#" id="indie">Indie</a><br>
            <div id="indiediv">
                <?php
                $sql = "SELECT * FROM genreView1 WHERE main_genres = 'indie'";
                $results =  $mysql->query($sql);
                while($currentrow = $results->fetch_assoc()){
                   echo "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
                 . "name='genre" . $currentrow['all_genre_id'] . "'><br>"                    ;}
                ?>
            </div>

            <a href="#" id="worship">Worship</a><br>
            <div id="worshipdiv">
                <?php
                $sql = "SELECT * FROM genreView1 WHERE main_genres = 'worship'";
                $results =  $mysql->query($sql);
                while($currentrow = $results->fetch_assoc()){
                  echo  "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
                  . "name='genre" . $currentrow['all_genre_id'] . "'><br>"                    ;}
                ?>
            </div>

            <a href="#" id="other">Other</a><br>
            <div id="otherdiv">
                <?php
                $sql = "SELECT * FROM genreView1 WHERE main_genres = 'other'";
                $results =  $mysql->query($sql);
                while($currentrow = $results->fetch_assoc()){
                   echo "<a href='https://open.spotify.com/search/results/genre%3A" . str_replace(' ','',$currentrow['all_genres'])."'>".$currentrow['all_genres']."</a><input type='checkbox' value='yes'"
                  . "name='genre" . $currentrow['all_genre_id'] . "'><br>"                    ;}
                ?>
            </div>

<hr>

    What's Your Favorite Genre Right Now? <br>
    <select name="favgenre">
    <?php
    $sql = "SELECT * FROM genreView1 WHERE all_genres != ''";
    $results =  $mysql->query($sql);
    while($currentrow = $results->fetch_assoc()){
        echo "<option value='" . $currentrow['all_genre_id'] . "'>".$currentrow["all_genres"]."</option>";
    }
    ?>

    </select>
<hr>
    <br><input type="submit" value="Create Account">
</form>




</html>
