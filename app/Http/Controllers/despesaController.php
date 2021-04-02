<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Despesa;
use App\Models\User;
use Date;
use DateTime;

class DespesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = auth()->user();
        $despesas = Despesa::where('user_id', $user->id)->get();
        return view('Site.Despesas.showAll', ['despesas' => $despesas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('Site.Despesas.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $despesa = new Despesa;
        $despesa->descricao = $request->descricao;
        $despesa->valor = (double)$request->valor;
        $despesa->date = date('Y-m-d',strtotime($request->date));

        //Upload de imagem
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            
            $requestImage = $request->imagem;
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
    
            // Recupera a extensão do arquivo
            $extension = $request->imagem->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
            
            $requestImage->move(public_path('/storage/img/Despesas'), $nameFile);
            $despesa->imagem = $nameFile;
    
        }else{
            // Define o valor default para a variável que contém o nome da imagem 
            $nameFile = 'null';
            $extension = 'png';
            $nameFile = "{$nameFile}.{$extension}";
            $despesa->imagem = $nameFile;
        }
        $user = auth()->user();
        $despesa->user_id = $user->id;

        $despesa->save();

        return redirect('/Despesa')-> with('msg','Despesa criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $despesa = Despesa::findOrFail($id);

        return view('Site.Despesas.show', ['despesa' => $despesa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $despesa = Despesa::findOrFail($id);
        return view('Site.Despesas.update', ['despesa' => $despesa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        // Pego os dados antigos
        $despesaAntiga = Despesa::findOrFail($request->id);
        // Atualizo meu dados em uma variavel
        $despesa = $request->all();
        //Upload de imagem
        // Verifica se informou o arquivo e se é válido
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            
            $requestImage = $request->imagem;
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
    
            // Recupera a extensão do arquivo
            $extension = $request->imagem->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
            
            $requestImage->move(public_path('storage/img/Despesas'), $nameFile);
            // apos update de imagem apago a antiga no meu repositorio
            $nomeImagem = $despesaAntiga->imagem; // Recebe o nome da imagem antiga
            if($nomeImagem != 'null.png'){ // Caso seja o exemplo de imagem null não apago do meu caminho
                $path = public_path()."storage/img/Despesas/".$nomeImagem; // Busca o caminho da imagem
                if(file_exists($path)){ //Verificação para ver se há arquivo no amarzenamento
                    unlink($path); // Deleta minha imagem no diretorio repassado
                }
            }
            //salvo novo nome de imagem
            $despesa['imagem'] = $nameFile;
        }
        // Converto para date
        $despesa['date'] = date('Y-m-d',strtotime($request->date));
        // Atualizo no BD
        Despesa::findOrFail($request->id)->update($despesa);
        //Retorno da função
        return redirect('/Despesa')-> with('msg','Despesa editada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $despesa = Despesa::findOrFail($id); // Encontra a despesa no BD
        $nomeImagem = $despesa->imagem; // Recebe o nome da imagem
        if($nomeImagem != 'null.png'){ // Caso seja o exemplo de imagem null não apago do meu caminho
            $path = public_path()."/storage/img/Despesas/".$nomeImagem; // Busca o caminho da imagem

            if(file_exists($path)){ //Verificação para ver se há arquivo no amarzenamento
                unlink($path); // Deleta minha imagem no diretorio repassado
            }
        }
        
        
        Despesa::findOrFail($id)->delete(); // Apaga dado no BD

        // Retorno de ação delete
        return redirect('/Despesa')-> with('msg','Despesa excluida com sucesso!');

    }
}
