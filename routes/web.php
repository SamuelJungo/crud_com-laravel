<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Candidato;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/cadastrar-candidato', function (Request $request) {
    Candidato::create([
        'nome' => $request->nome_candidato,
        'telefone' => $request->telefone_candidato
    ]);
    echo'candidato criado com sucesso';
    
});
Route::get('/listar-candidatos{id_candidato}', function ($id_candidato) {
   $candidato =Candidato::findOrfail($id_candidato);
   echo $candidato->nome;
   echo '<br/>';
   echo $candidato->telefone;

});

Route::get('/editar-candidatos{id_candidato}', function ($id_candidato) {
    $candidato = Candidato::findOrfail($id_candidato);
    return view('editar',['candidato'=>$candidato]);
    });
Route :: put('/atualizar-candidatos{id_candidato}', function (Request $request, $id_candidato) {
    $candidato = Candidato::findOrfail($id_candidato);
    $candidato->nome = $request->nome_candidato;
    $candidato->telefone = $request->telefone_candidato;
    $candidato->save();
    echo 'candidato editado com sucesso';
});
Route :: get('excluir-candidato/{id_candidato}', function ($id_candidato) {
    $candidato = Candidato::findOrfail($id_candidato);
    $candidato->delete();
    echo 'candidato excluido com sucesso';
});