<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesa;
use App\Models\User;

class despesaController extends Controller
{
    public function index(){
        $user = auth()->user();
        $userid = $user->id;
        $despesas = Despesa::where('user_id', $userid)->get();
        return view('Site/Despesas/showAll', ['despesas' => $despesas]);
    }
    public function create(){
        return view('Site/Despesas/new');
    }
    public function show($id){
        $despesa = Despesa::findOrFail($id);

        return view('Site/Despesas/show', ['despesa' => $despesa]);
    }
    public function edit($id){
        $despesa = Despesa::findOrFail($id);
        return view('Site/Despesas/update', ['despesa' => $despesa]);
    }
    public function update(Request $request){
        $despesaAntiga = Despesa::findOrFail($request->id);
        // Atualizo meu dados em uma variavel
        $despesa = $request->all();
        //Upload de imagem
        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
    
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            
            $requestImage = $request->imagem;
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
    
            // Recupera a extensão do arquivo
            $extension = $request->imagem->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
            
            $requestImage->move(public_path('img/Despesas'), $nameFile);
            // apos update de imagem apago a antiga no meu repositorio
            $nomeImagem = $despesaAntiga->imagem; // Recebe o nome da imagem antiga
            $path = public_path()."/img/Despesas/".$nomeImagem; // Busca o caminho da imagem

            if(file_exists($path)){ //Verificação para ver se há arquivo no amarzenamento
                unlink($path); // Deleta minha imagem no diretorio repassado
            }
            //salvo novo nome de imagem
            $despesa['imagem'] = $nameFile;
    
        }
        
        // Atualizo no BD
        Despesa::findOrFail($request->id)->update($despesa);
        //Retorno da função
        return redirect('/Despesa/showAll')-> with('msg','Despesa editada com sucesso!');
    }
    public function destroy($id){
        $despesa = Despesa::findOrFail($id); // Encontra a despesa no BD
        $nomeImagem = $despesa->imagem; // Recebe o nome da imagem
        $path = public_path()."/img/Despesas/".$nomeImagem; // Busca o caminho da imagem

        if(file_exists($path)){ //Verificação para ver se há arquivo no amarzenamento
            unlink($path); // Deleta minha imagem no diretorio repassado
        }
        
        Despesa::findOrFail($id)->delete(); // Apaga dado no BD

        // Retorno de ação delete
        return redirect('/Despesa/showAll')-> with('msg','Despesa excluida com sucesso!');

    }
    public function store(Request $request){
        $despesa = new Despesa;
        $despesa->descricao = $request->descricao;
        $despesa->date = $request->date;
        $despesa->valor = '55.99';

        //Upload de imagem
        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
    
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            
            $requestImage = $request->imagem;
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
    
            // Recupera a extensão do arquivo
            $extension = $request->imagem->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
            
            $requestImage->move(public_path('img/Despesas'), $nameFile);
            $despesa->imagem = $nameFile;
    
        }
        $user = auth()->user();
        $despesa->user_id = $user->id;

        $despesa->save();

        return redirect('/Despesa/showAll')-> with('msg','Despesa criada com sucesso');
    }

}
