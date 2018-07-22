<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class PedidoController extends Controller
{
  // Função Criar Pedido
  public function criarPedido(Request $request){
    $novoPedido = new Pedido;

    $novoPedido->numero = $request->numero;
    $novoPedido->data = $request->data;
    $novoPedido->cod_cliente = $request->cod_cliente;

    $novoPedido->save();

    return response()->json(['O pedido foi criado com sucesso!']);
  }

// Função Consultar(get) Pedido
  public function getPedido($id){
    $pedido = Pedido::findorfail($id);

    return response()->json([$pedido]);

    return response()->json(['Dados do pedido solicitado: '.$pedido.'.']);
  }

  // Função Atualizar Pedido
  public function atualizarPedido(Request $request,$id){
    $pedido = Pedido::findorfail($id);

    if($request->numero){
      $pedido->numero = $request->numero;
    }
    if($request->data){
      $pedido->data = $request->data;
    }
    if($request->cod_cliente){
      $pedido->cod_cliente = $request->cod_cliente;
    }

    $pedido->save();

    return response()->json(['O pedido foi atualizado com sucesso!']);
  }

// Função Deletar Pedido
  public function deletarPedido($id){
    Pedido::destroy($id);
  }
}
