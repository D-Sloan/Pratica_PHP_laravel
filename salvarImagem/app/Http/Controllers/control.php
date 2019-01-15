<?php

namespace App\Http\Controllers;

use App\usuario;
use Illuminate\Http\Request;

class control extends Controller
{
    public function index(){
        return view('Home');
    }

    public function salvarImagem(Request $request)
    {
        $this->validate($request, [
            'Nome' => 'required',
            'Email' => 'required',
            'Imagem' => 'image|nullable|max:1999'
        ]);
        //verifica se há imagem para salvar
        if($request->hasFile('Imagem')){
            //aqui separamos nome da extensão para poder criar uma imagem com um nome único
            $nomeArq = $request->file('Imagem')->getClientOriginalName();
            $nome = pathinfo($nomeArq, PATHINFO_FILENAME);
            $extensao = $request->file('Imagem')->getClientOriginalExtension();
            //nome da imagem com tempo de envio para que não hajam repetições de imagens e erros ao buscar as mesmas
            $nomeFinal= $nome.'_'.time().'.'.$extensao;
            //Aqui ele salva no diretorio storage/app/public/imagens, só foi possivel após linkar o storage
            $path = $request->file('Imagem')->storeAs('public/Imagens', $nomeFinal);

            ?>
            <script>
                alert("Dados salvos com sucesso!");
            </script>
            <?php

        }else{
            ?>
            <script>
                alert("Nenhuma imagem selecionada!" +
                    "Dados salvos!");

            </script>
            <?php
            $nomeFinal="null";
        }
        //aqui salvamos no banco os dados para uma futura busca
        $temp = new usuario();
        $temp->Nome = $request->input('Nome');
        $temp->Email = $request->input('Email');
        $temp->NomeImagem = $nomeFinal;
        $temp->save();



        return view('Home');
    }

}
