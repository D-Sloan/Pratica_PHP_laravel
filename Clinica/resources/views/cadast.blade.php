<!DOCTYPE html>
<html>
<head>
    <title>
        Atividade 1
    </title>


</head>


<script type="text/javascript">

    //criei essa função para verificação na tela de usuário, mas ela não está funcionando, então criei uma verificação dentro do controller

    function verificador(){
        let hora1 = formulario.horaInicio.value.replace(":","");
        let hora2 = formulario.horaFim.value.replace(":","");
        if(hora1 > hora2){
            alert("Hora de inicio deve ser menor que a hora de fim");
            return false;
        }
        if(hora2-hora1<=400){
            alert("Hora de expediente deve ser superior a 4 horas");
            return false;
        }

        return true;
    }

</script>


<body>
<div class="container">
    <h1> Clínica Dentária</h1>
    <li>
        <a href="/">Home
        </a>
    </li>
    <br>
    <h2> Cadastro </h2>

        <form nome="formulario" onsubmit="return verificador()" action ="/cadastrar" method="get">

            Nome: <input type="text" id="NomeRegistro" placeholder="Nome" name="NomeRegistro" required autofocus>
            <br>
            <br>
            Clinica: <input type="radio" name="Clinica" id="Matriz" value="1" required autofocus>
            <label>
                Matriz
            </label>
            <input type="radio" name="Clinica" id="Filial" value="2">
            <label>
                Filial
            </label>
            <br>
            <br>
            <input type="checkbox" name="D1" value="Segunda" > Segunda<br>
            <input type="checkbox" name="D2" value="Terça"> Terça<br>
            <input type="checkbox" name="D3" value="Quarta" > Quarta<br>
            <input type="checkbox" name="D4" value="Quinta"> Quinta<br>
            <input type="checkbox" name="D5" value="Sexta"> Sexta<br>
            <br>
            <br>
            Início do expediente:<select name="horaInicio" >
                <option value="7:00">7:00</option>
                <option value="8:00">8:00</option>
                <option value="9:00">9:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
            </select>
            <br>
            Fim do expediente:<select name="horaFim">
                <option value="7:00">7:00</option>
                <option value="8:00">8:00</option>
                <option value="9:00">9:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
            </select>
            <br>
            <br>
            <button type = "submit" >Finalizar Cadastro</button>





    </form>


</div>
</body>
</html>