<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = ["cenoura", "batata", "picles", "pepino"];
        return $produtos; // ele printa arrays como jason por padrão
    }
    public function show($id){
        return "produto n° {$id}";
    }
    public function create(){ 
        return "exibiria um formulario de cadastro para o produto";
    }
    public function edit($id){ 
        return "exibiria um formulario para editar o produto n°{$id}";
    }
    public function store(){ 
        return "cadastra um novo produto";
    }
    public function update($id){ 
        return "editando o produto n°{$id}";
    }
    public function destroy($id){ 
        return "editando o produto n°{$id}";
    }
}
