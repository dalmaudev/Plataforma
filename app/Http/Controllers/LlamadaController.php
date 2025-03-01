<?php

namespace App\Http\Controllers;

use App\Models\Llamada;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Provincia;
use App\Models\Documento;
use App\Models\Estadocivil;
use App\Models\Pais;
use App\Models\Sexo;
use App\Models\Localidad;
use App\Models\File;
use App\Models\Docuproceso;

class LlamadaController extends Controller
{
    public function index()
    {
        return view('llamada.index');
    }

    public function crearllamada($crearllamada)
    {
        $querys = Cliente::find($crearllamada);
        return view('llamada.create',compact('querys'));
    }

    public function store(Request $request)
    {
        if(empty($request->control)){
           $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'consulta' => 'required',   
        ]);
        
        Cliente::create($request->all());
        $user = Cliente::all()->last();
        
        $llamada = new Llamada();
        $llamada->cliente_id = $user->id;
        $llamada->telefono = $request->telefono;
        $llamada->consulta = $request->consulta;
        $llamada->fecllam = date(now());
        
        $llamada->save(); 
        $request->control = $user->id;


        }else{
            $request->validate([
                'consulta' => 'required',      
            ]);
            $llamada = new Llamada();
            $llamada->cliente_id = $request->control;
            $llamada->consulta = $request->consulta;
            $llamada->fecllam = date(now());
            $llamada->save();
        }
        

        return redirect()->route('llamada.show',$request->control)->with('info','Registro agregado satisfactoriamente!!');
    }

    public function ver($ver)
    {
        $llamada = Llamada::find($ver);
        $cliente = Cliente::find($llamada->cliente_id);
        return view('llamada.ver',compact('llamada','cliente'));
    }

    public function show(cliente $llamada)
    {
        $llam = Llamada::where('cliente_id',$llamada->id)->orderBy('fecllam', 'ASC')->get();
       
        return view('llamada.show',compact('llamada','llam'));
    }

    public function edit(Llamada $llamada)
    {
       
        $querys = Cliente::find($llamada->cliente_id);
        return view('llamada.edit',compact('llamada','querys'));
    }

    public function update(Request $request, Llamada $llamada)
    {
        
        $request->validate([
            'consulta' => 'required',
            'fecllam' => 'date',
        ]);

        $llamada->update($request->all());

        return redirect()->route('llamada.show',$llamada->cliente_id)->with('info','Registro actualizado satisfactoriamente!!');
    }

    public function destroy(Cliente $llamada)
    {
        $llamada->delete();

        return redirect()->route('llamada.index')->with('info','Registro eliminado satisfactoriamente!!');
    }

    public function cursos(Request $request){
        $term = $request->get('term');

        $querys = Cliente::where('nombre','LIKE', '%'. $term . '%')->get();
        // $querys = Cliente::where('nombre','LIKE', '%'. $term . '%')->where('tipo','=',1)->get();
        if($querys->isEmpty()){
            // $querys = Cliente::where('telefono','LIKE', '%'. $term . '%')->where('tipo','=',1)->get();
            $querys = Cliente::where('telefono','LIKE', '%'. $term . '%')->get();
        }
        $data = [];
        
        foreach ($querys as $query) {
            $data[] = [
                'label' => $query->id.' - '.$query->nombre.' '. $query->apellido,
            ];
        }
        return $data;
    }

    public function crearcliente($id){  
        $cliente = Cliente::find($id);
        $cliente->tipo = 2;
        $cliente->cliente = 1;
        $cliente->save();
        return redirect()->route('cliente.edit',$id);

    }

    public function crearafiliado($id){  
        $cliente = Cliente::find($id);
        $cliente->tipo = 2;
        $cliente->afiliado = 1;
        $cliente->fecafiliado = date(now());
        $cliente->save();
        return redirect()->route('cliente.edit',$id);

    }
    

    public function bajaafiliado($id){  
        $cliente = Cliente::find($id);
        $cliente->tipo = 2;
        $cliente->afiliado = null;
        $cliente->fecafiliado = null;
        $cliente->save();
        return redirect()->route('cliente.edit',$id);

    }
}
