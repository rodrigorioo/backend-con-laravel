<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditarCompraRequest;
use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compra::all();

        return view('admin.compras.index', [
            'compras' => $compras,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        return $this->edit($compra);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        return view('admin.compras.edit', [
            'compra' => $compra,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditarCompraRequest $request, Compra $compra)
    {
        $compra->pagado = $request->input('pagado');
        $compra->save();

        return Redirect::action([CompraController::class, 'index'])->with([
            'succcess' => 'La compra fue modificada con éxito',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();

        return Redirect::action([CompraController::class, 'index'])->with([
            'succcess' => 'La compra fue eliminada con éxito',
        ]);
    }
}
