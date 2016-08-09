<head>
<title>Extract Emails From Websites</title>
<style>
html, body {
       background-color:#000000;
       color:#00FF00;
       font-family:monospace;
       height: 100%;
       text-decoration:  none;
}
 
 
textarea,input {
       resize:none;
       color: #1975FF ;
       border:1px solid #1975FF ;
       border-left: 4px solid #1975FF ;
}
input {
       color: ##33CCFF;
       border:1px dotted #33CCFF;
}
</style>
</head>
<body>
  <center> <br>
  <h1>Extract Emails From Websites</h1>
  </br>

      <form  method="post" action="">
     <textarea name="urls" cols="111" rows="15" placeholder="Enter Url Line By Line"></textarea> <br>
     <input type="submit" name="extract" value="Extract Emails only"/>
      </form>
<br>
  </center>
</body>
</html>
<?php
set_time_limit(0);
error_reporting(0);

  if(isset($_POST['extract'])){

    $url=explode("\n",$_POST['urls']);
    foreach ($url as $key) {
      $key=trim($key);

      if (false === strpos($key, '://')) {
    $key = 'http://' . $key;
    $homepage = file_get_contents($key);
    }
    else{
      $homepage = file_get_contents($key);
    }
    preg_match_all('#[A-Z0-9a-z._%+-]+@[A-Za-z0-9.+-]+#',$homepage,$matches);
    $h4t3d=array_unique($matches[0]);
    foreach ($h4t3d as $ul){
      static $counter;
      $counter++;
    echo $counter." , ".$ul."<br>";
    flush();
    @ob_flush();
    }


    }
        

  }

?>