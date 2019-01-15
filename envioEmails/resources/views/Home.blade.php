<!DOCTYPE html>
<html>
<head>
    <title>  Envio de Emails  </title>
</head>
<body>
<h1>Envio de Emails</h1>
<br>

<form nome="formulario" action = "/enviarEmails" method="post"  enctype="multipart/form-data">
    @csrf
    Arquivo:<input type="file" name="arquivo"  required autofocus>
    <br>
    <br>
    <button type="submit">Enviar</button>
</form>
</body>
</html>