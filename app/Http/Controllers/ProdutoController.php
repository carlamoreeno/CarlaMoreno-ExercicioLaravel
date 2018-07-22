<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
  // Função Criar Produto
  public function criarProduto(Request $request){
    $novoProduto = new Produto;

    $novoProduto->codigo = $request->codigo;
    $novoProduto->nome = $request->nome;
    $novoProduto->preco = $request->preco;
    $novoProduto->cod_categoria = $request->cod_categoria;

    $novoProduto->save();

    return response()->json(['O produto foi criado com sucesso!']);
  }

// Função Consultar(get) Produto
  public function getProduto($id){
    $produto = Produto::findorfail($id);

    return response()->json([$produto]);

    return response()->json(['Dados do produto solicitado: '.$produto.'.']);
  }

  // Função Atualizar Produto
    public function atualizarProduto(Request $request,$id){
      $produto = Produto::findorfail($id);

      if($request->codigo){
        $produto->codigo = $request->codigo;
      }
      if($request->nome){
        $produto->nome = $request->nome;
      }
      if($request->preco){
        $produto->preco = $request->preco;
      }
      if($request->cod_categoria){
        $produto->cod_categoria = $request->cod_categoria;
      }

      $produto->save();

      return response()->json(['O produto foi atualizado com sucesso!']);
    }

// Função Deletar Produto
    public function deletarProduto($id){
      Produto::destroy($id);

      return response()->json(['O produto foi deletado com sucesso!']);
    }

}
