<?php

namespace App\Http\Controllers;

use App\ClinicaFilial;
use App\ClinicaMatriz;
use Illuminate\Http\Request;

class control extends Controller
{



    public function index()
    {
        //aqui enviamos os dados salvos para que sejam exibidos na página inicial
        $dadosFilial = ClinicaFilial::all();
        $dadosMatriz = ClinicaMatriz::all();
        return view('Home')->with($info = ['dadosMatriz' => $dadosMatriz,'dadosFilial' => $dadosFilial]);
    }


    public function cadastro()
    {
        // Tive problemas com o erro 419 ao usar o método POST, então migrei para o método GET, mesmo não sendo recomendado para o envio de dados.
        $nome = $_GET['NomeRegistro'];
        $horarioInicio = $_GET['horaInicio'];
        $horarioFim = $_GET['horaFim'];
        $clinica = $_GET['Clinica'];
        $dias[0] = '';
        $cont = 0;
        for ($i = 0; $i < 5; $i++) {
            $contador = $i + 1;
            //Verifica se o usuário selecionou o dia da semana em questão
            if (isset($_GET['D' . $contador])) {
                $dias[$cont] = $_GET['D' . $contador];
                $cont++;
            }
        }
        if($cont == 0){
            ?>
            <script>
                alert("Vc deve selecionar pelo menos 1 dia da semana no formulário");
                location = "cadastro";
            </script>
            <?php
        }
        //aqui retirei os : das horas para facilitar as verificações que vem a seguir.
        $horario = '';
        $verificarHora1 = str_replace(':', '', $horarioInicio);
        $verificarHora2 = str_replace(':', '', $horarioFim);

        /*Essas condicionais são para verificar o horário como o dentista tem pausa para almoço, tomei a liberdade de diminuir a carga horaria
          caso suas horas de trabalho excedam o horario de almoço, reajustando as horas, também coloquei uma verificação de se as horas são
          válidas, tem uma verificação semelhante na página do cliente feita em javascript.
        */

        if($verificarHora1<1200 && $verificarHora2>1400){
            $temp = $horarioInicio."-12:00/14:00-".$horarioFim;
            $horario = $temp;
        }
        else if($verificarHora2<$verificarHora1 || $verificarHora2-$verificarHora1 < 400){
            ?>
            <script>
                alert("O minimo de horas aceitas sao 4 horas! por favor informe os dados corretamente");
                location = "cadastro";
            </script>
            <?php
        }
        else if($verificarHora1>1200 && $verificarHora1<1400){
            $horarioInicio="14:00";
            $horario = $horarioInicio . "-" . $horarioFim;
        }
        else if($verificarHora2<1400 && $verificarHora2>1200){
            $horarioFim="12:00";
            $horario = $horarioInicio . "-" . $horarioFim;
        }else{
            $horario = $horarioInicio . "-" . $horarioFim;
        }

        //ele verifica a clínica que será inserido os dados e adiciona um registro para cada dia que o dentista trabalha.
        if ($clinica == 2) {

            for ($repetidor = 0; $repetidor < sizeof($dias); $repetidor++) {
                $this->inserirDadosFil($horario, $dias[$repetidor], $nome);
            }
            ?>
            <script>
                alert("Cadastrado com sucesso!");
            </script>

            <?php
        }
        elseif ($clinica == 1) {
            for ($repetidor = 0; $repetidor < sizeof($dias); $repetidor++) {
                $this->inserirDadosMat($horario, $dias[$repetidor], $nome);

            }
            ?>
            <script>
                alert("Cadastrado com sucesso!");
            </script>

            <?php
        }
        //aqui ele retorna para a tela de cadastro
        return view('cadast');

    }

    public function inserirDadosMat($horario, $diaSemana, $nomeDentista)
    {
        $temp = new ClinicaMatriz();
        $temp->dia = $diaSemana;
        $temp->horario = $horario;
        $temp->nomeDentista = $nomeDentista;
        $insert = $temp->save();
        if ($insert) {

        } else {
            //esse alert de falha é mais pra um teste de caso dê algum erro ao inserir
            ?>
            <script>
                alert("Falha ao cadastrar!");
            </script>


            <?php
        }
    }

    public function inserirDadosFil($horario, $diaSemana, $nomeDentista)
    {
        $temp = new ClinicaFilial();
        $temp->dia = $diaSemana;
        $temp->horario = $horario;
        $temp->nomeDentista = $nomeDentista;
        $insert = $temp->save();
        if ($insert) {

        } else {
            ?>
            <script>
                alert("Falha ao cadastrar!");
            </script>

            <?php
        }
    }
}
