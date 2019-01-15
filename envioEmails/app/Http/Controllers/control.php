<?php

namespace App\Http\Controllers;

use App\contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class control extends Controller
{

    public function enviarEmails(){

        $arq = $_FILES['arquivo']['tmp_name'];
        $nome = $_FILES['arquivo']['name'];
        $extensao = explode(".","$nome");
        $tipo = end($extensao);


        //Verifica se o tivo do arquivo é realmente csv
        if($tipo == "csv"){
            $informacoes = fopen($arq,'r');

            //Aqui inserimos no banco somente os contatos que estão com o formato de email válido
            while(($infos = fgetcsv($informacoes, 1000,";"))!== FALSE){

                $nome = utf8_encode($infos[0]);
                $email = utf8_encode($infos[1]);

                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $temp = new contato();
                    $temp->nome = $nome;
                    $temp->email= $email;
                    $temp->save();

                } else {

                }
            }
        }
        else{
            ?>
            <script>
                alert('Tipo de arquivo invalido!');
            </script>
            <?php
            return view("Home");
        }
        $regulamentador = array('nome' => "teste");
        //Aqui é onde acontece o envio dos email para os respctivos destinatarios que estão salvos no banco anteriormente
        Mail::send('Email',$regulamentador, function($message){
            $dados= contato::all();
            foreach ($dados as $contato) {

                $message->from('teste@teste', 'Teste Atividades');
                $message->to($contato['email'])->subject('Teste De Envio');

            }
        });
        //aqui deletamos todos os registros do banco para que quando não haver repetição na próxima utilização, mas também poderia deixar os contatos salvos para reuso.
        $registros = contato::all();
        foreach ($registros as $resg){
            $resg->delete();
        }
        ?>
        <script>
            alert('Emails enviados com sucesso!\nSo foram enviados emails para os emails validos da lista!');
        </script>
        <?php

        return view("Home");

    }


}
