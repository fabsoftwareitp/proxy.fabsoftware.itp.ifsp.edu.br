<?php

function checkStringConnection($stringToFind) {
    return strpos($stringToFind, "IP address already in use") 
    || strpos($stringToFind, "Login succeeded") || strpos($stringToFind, "Conectado");
}

function isOnline() {
    $curlHandle = curl_init('http://10.112.70.1');
    //curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $postParameter);
    curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);

    $curlResponse = curl_exec($curlHandle);
    curl_close($curlHandle);

    return checkStringConnection($curlResponse);
}
?>

<?php if(isOnline()): ?>
    <h1>Online</h1>
    <a href="/logout.php" title="Sair" name="header:sg_logout_button">Logout</a>
<?php else: ?>
    <h1>Offline</h1>

    <form method="POST" action="proxy-connect.php">

        <input type="text" name="login" placeholder="prontuario">
        <input type="password" name="password" placeholder="senha">
        <input type="submit" value="Enviar">

    </form>
<?php endif ?>


