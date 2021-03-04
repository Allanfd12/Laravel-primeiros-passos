<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::delete('/produtos/{idProduto}', 'ProdutoController@destroy' )->name('product.destroy');// a ? apos o nome do parmetro torna ele opcional
Route::put('/produtos/{idProduto}', 'ProdutoController@update' )->name('product.update');// a ? apos o nome do parmetro torna ele opcional
Route::get('/produtos/{idProduto}/edit', 'ProdutoController@edit' )->name('product.edit');// a ? apos o nome do parmetro torna ele opcional
Route::get("/produtos/criar",'ProdutoController@create')->name('product.create');
Route::get('/produtos/{idProduto}', 'ProdutoController@show' )->name('product.show');// a ? apos o nome do parmetro torna ele opcional
Route::get("/produtos",'ProdutoController@index')->name('product.index');
Route::post("/produtos",'ProdutoController@store')->name('product.store'); // adiciona novos produtos


Route::get("/login", function () {
    return "login";
})->name('login');

/*
Route::middleware([])->group(function () { // impede o acesso a essas rotas sem o login
    Route::prefix('admin')->group(function () { // define um prefixo pra todas as rotas dentro do grupo
        Route::namespace("Admin")->group(function () { // simplifica Admin\TeteController@teste para apenas TeteController@teste
            // TeteController@teste permite um tratamento logico antes de retornar uma view
            Route::name("admin.")->group(function () { // todas as rotas tem o nome começado por admin.
                Route::get("/dashboard", 'TeteController@teste')->name('dashboard');
                Route::get("/financeiro", 'TeteController@teste')->name('financeiro');
                Route::get("/Produtos", 'TeteController@teste')->name('produtos');
                Route::get("/", function () {
                    return redirect()->route('admin.dashboard');
                })->name('home');
            });
        });
    });
});
*/
// faz o mesmo que o codigo acima, mas com menos texto
Route::group([
    'middleware' => [], // auth por exemplo
    'prefix' => 'admin',
    'namespace' => 'Admin',
    //'name' => 'admin.' nome não funciona !?? :C
], function () {
    Route::name("admin.")->group(function () { // todas as rotas tem o nome começado por admin.
        Route::get("/dashboard", 'TeteController@teste')->name('dashboard');
        Route::get("/financeiro", 'TeteController@teste')->name('financeiro');
        Route::get("/Produtos", 'TeteController@teste')->name('produtos');
        Route::get("/", function () {
            return redirect()->route('admin.dashboard');
        })->name('home');
    });
});

//CRIAR O CONTROLLER >>> php artisan make:controller Admin\TeteController
//LISTA TODAS AS ROTAS CRIADAS >>> php artisan route:list
//LIMPAR ROTAS EM CACHE >>> php artisan route:cache
// MOSTRA TODOS O COMANDOS DISPONIVEIS DO ARTISAN >>> php artisan
Route::get("/redirect3", function () {
    return redirect()->route('url.name'); // redireciona para a rota, baseado no nome interno dela
});

Route::get("/nome-url", function () {
    return "batata";
})->name('url.name'); // atribui um nome interno para a rota
// o nome interno evita que redirecionamentos quebrem, caso a url da rota seja alterada

// ['id' => 'teste'] passa uma varivel id com valor teste, para a view
Route::view("/view", "subpasta.new_welcome", ['id' => 'teste']); // retorna uma view, pagina estatica
// o "." serve como indicação de pasta, logo a vie 'new_welcome' esta na pasta 'subpasta'

//por algum motivo, não funciona. ele retorna localhost/redirect2 invez da rota redirect2
Route::redirect("/redirect1-b", "/redirect2"); // redireciona o trafego para outra rota

Route::get("/redirect1-a", function () {
    return redirect("/redirect2"); // redireciona o trafego para outra rota
});
Route::get("/redirect2", function () {
    return "Rota 02";
});

Route::get('/categorias/{variavel}/posts', function ($variavel) {
    return "Postas presentes na Categoria: {$variavel}";
});
Route::get('/categorias/{variavel}', function ($variavel) {
    return "você esta em Categorias/{$variavel}";
});
Route::match(['get', 'post'], '/match', function () {
    return "tipo match permite escolher que tipo de verbo http é permitido";
});
Route::any('/any', function () {
    return "any permite qualquer tipo de verbo http";
});
Route::post('/post', function () {
    return "post";
});
Route::get('/contato', function () {
    return "contato";
});
Route::get('/', function () {
    return view('welcome');
});
