<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControllerAutoGe extends Controller
{ // classe controller auto gerada para conter os metodos que correspondem ao resourse


    protected $request, $user;
    public function __construct(Request $request)
    {
       // dd($request); // request apresenta todos os dados advindos da requisição do usuario
        $this->request = $request;
        // tem como aplicar middleare diretamente nos controllers por meio de:
        //$this->middleware('auth'); // em todo o controller
        //$this->middleware('auth')->only(['create', 'index']); // somente nos metodos especificados
        $this->middleware('auth')->except('index'); // em todo o controller exceto em index
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
