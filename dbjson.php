 <?

   /*connect to DB*/
    $servername = "hostname";
    $database = "database";
    $username = "username";
    $password = "password";
    
  // Create connection

    $con = mysqli_connect($servername, $username, $password, $database);

    #("uvds365.active24.cz" , "previewaczmartin", "4cu4BsDASC");  
    #($bd_host, $bd_user, $bd_password);
   /*control connection*/
   if (!$con) {

    die("Connection failed: " . mysqli_connect_error());

}
   /*select databese name*/
   mysqli_select_db($con, "previewaczmartin" );
   #($database, $con); 
   /*set encode to utf-8*/
   #mysqli_query('SET NAMES utf8');
   /**/

    $jsondata = file_get_contents('http://my.adamapp.com/export/6490.json');
    #if(is_wp_error($jsondata)) {
    #          return false;
    $body = json_decode($jsondata, true);
    //convert json object to php associative array
    
    echo $neco=$body['result']['status'];
    echo $neco1=$body['result']['hash'];
    foreach($body as $article) {
    /*print_r($data);*/

    #echo 'TIME DATE  '.$date.'<br>';

    #echo '<table style="width:100%"><tr><td>time stamp</td><td>data</td></tr>';
    
    echo '<tr><td>';
    print_r($article[0]);
    echo '</td><td>';
    print_r($article[1]);
    echo '</td></tr>';


            /*insert in db but you will have big quantity of queryes*/

            #$sql = "INSERT INTO tbl_power(date, data) VALUES('$array[0]',$array[1])";
            #mysql_query($sql,$con);
            $sql = "INSERT INTO wp_posts (post_content, post_title) VALUES('$article[0]',$article[1])";
            mysqli_query( $con , $sql );

                  }
    echo '</table>';
    ?>  
