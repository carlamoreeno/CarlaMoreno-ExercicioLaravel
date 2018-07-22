<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class CategoriaController extends Controller
{
  // Função Criar Categoria
  public function criarCategoria(Request $request){
    $novoCategoria = new Categoria;

    $novoCategoria->codigo = $request->codigo;
    $novoCategoria->nome = $request->nome;

    $novoCategoria->save();

    return response()->json(['A categoria foi criada com sucesso!']);
  }

  // Função Consultar(get) Categoria
  public function getCategoria($id){
    $categoria = Categoria::findorfail($id);

    return response()->json(['Dados da categoria solicitada: '.$categoria.'.']);
  }

  // Função Atualizar Categoria
  public function atualizarCategoria(Request $request,$id){
    $categoria = Categoria::findorfail($id);

    if($request->codigo){
      $categoria->codigo = $request->codigo;
    }
    if($request->nome){
      $categoria->nome = $request->nome;
    }

    $categoria->save();

    return response()->json(['A categoria foi atualizada com sucesso!']);
  }

// Função Deletar Categoria
  public function deletarCategoria($id){
    Categoria::destroy($id);

        return response()->json(['A categoria foi deletada com sucesso!']);
  }
}
