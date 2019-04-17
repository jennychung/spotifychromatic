<head>  <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110079659-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('set', {'user_id': 'USER_ID'}); // Set the user ID using signed-in user_id.

        gtag('config', 'UA-110079659-1');
    </script>

<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:100,300,400,500');
    body{
        background-color: #343434;
        color:white;
        font-family: Avenir;
    }
    .thumb{
        width: 40px;
        height: 40px;

    }
    #resultsdiv{
        margin: auto;
        width: 800px;
        background-color: yellowgreen;
    }
    #classtable{
        font-size:24pt;
        text-align: center;
        font-family: "Poppins", sans-serif;
        font-weight:300;
        border-collapse: collapse;
        border: 1px solid transparent;
    }
    td{
        height:80px;
        width: 10%;
        margin-bottom: 50px;
    }
    #info{
        font-size:40pt;
        font-family: "Poppins", sans-serif;
        font-weight:100;
        opacity: .4;
    }
</style>
</head>
<?php



$userID = "aclarks";
$userPw = "2904286806";
$mysql = new mysqli(
    "acad.itpwebdev.com",
    $userID,
    $userPw,
    "aclarks_spotify");

$sql = "SELECT * FROM genreView1
WHERE all_genres LIKE  '%" . $_REQUEST["genre"] . "%'" ;




$results =  $mysql->query($sql);

if(!$results) {
    echo "SQL error: ". $mysql->error;
    exit();
}

echo "<div id='info'>Results: ".
    $results->num_rows."<br>
    Search: '". $_REQUEST['genre']."'</div><br>";

echo "<table id='classtable'>
   <tr>
        
        <th>Genre</th>
        <th>Subgenre</th>
        <th>Color</th>
    </tr>";
echo "<div id='resultsdiv'>";
while($currentrow = $results->fetch_assoc())
//$onerow = $results->fetch_assoc();
{
    echo
    "<tr id='tr".$currentrow["all_genres"]."' style='background-color:" .$currentrow["hexcode"].";'>
    "."<td>".$currentrow["main_genres"]."</td>
    "."<td>" .$currentrow["all_genres"]."</td>"."
    "."<td>" .$currentrow["color_list"]."</td>"."
    
</tr>";

echo "</div>";
}
