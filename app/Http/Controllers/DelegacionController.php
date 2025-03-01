<?php

namespace App\Http\Controllers;

use App\Models\Delegacion;
use Illuminate\Http\Request;

/**
 * Class DelegacionController
 * @package App\Http\Controllers
 */
class DelegacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delegacions = Delegacion::paginate();

        return view('delegacion.index', compact('delegacions'))
            ->with('i', (request()->input('page', 1) - 1) * $delegacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $delegacion = new Delegacion();
        return view('delegacion.create', compact('delegacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Delegacion::$rules);

        $delegacion = Delegacion::create($request->all());

        return redirect()->route('delegacions.index')
            ->with('success', 'Delegacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $delegacion = Delegacion::find($id);

        return view('delegacion.show', compact('delegacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $delegacion = Delegacion::find($id);

        return view('delegacion.edit', compact('delegacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Delegacion $delegacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delegacion $delegacion)
    {
        request()->validate(Delegacion::$rules);

        $delegacion->update($request->all());

        return redirect()->route('delegacions.index')
            ->with('success', 'Delegacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $delegacion = Delegacion::find($id)->delete();

        return redirect()->route('delegacions.index')
            ->with('success', 'Delegacion deleted successfully');
    }
}
