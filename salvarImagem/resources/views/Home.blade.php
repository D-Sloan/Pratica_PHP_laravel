<!DOCTYPE html>
<html>
<head>
    <title>  Envio De Imagens  </title>
</head>
<body>
<h1>Envio de Imagem</h1>
<br>
<br>
<form action="/api/envioImagem" method="post" name="formulario" enctype="multipart/form-data" >
    Nome: <input type="text" id="Nome" placeholder="Nome" name="Nome" required autofocus>
    <br>
    <br>
    Email: <input type="email" id="Email" placeholder="Email" name="Email" required autofocus>
    <br>
    <br>
    <input type="file" name="Imagem">
    <br>
    <button type="submit">Salvar</button>
</form>
</body>
</html>