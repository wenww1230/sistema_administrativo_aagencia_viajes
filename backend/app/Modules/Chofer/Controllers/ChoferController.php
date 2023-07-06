<?php

namespace App\Modules\Chofer\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Chofer\Contracts\IChoferes;
class ChoferController extends Controller
{

  //ya no se llama al repositorio, sino a su interface
   protected $IChofer;

    public function __construct( IChoferes $IChofer)
    {
        
        $this->IChofer = $IChofer;
    }



    public function index()
    {
        $choferes = $this->IChofer->getChoferes();
        return response()->json($choferes);
    }

    public function store(Request $request)
    {
        //esto ponerlo en los request
        $data = $request->validate([
            'nombre' => 'required', 
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'dni' => 'required',
            'numero_licencia' => 'required'
        ]);

        $chofer = $this->IChofer->insertarChofer($data);

        if ($chofer) {
            return response()->json(['success' => true, 'message' => 'Chofer creado exitosamente'], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'No se pudo crear el chofer'], 400);
        }
    }

    public function show(string $id)
    {
        $chofer = $this->IChofer->buscarChofer($id);

        if ($chofer) {
            return response()->json($chofer);
        } else {
            return response()->json(['success' => false, 'message' => 'Chofer no encontrado'], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $chofer= $this->IChofer->buscarChofer($id);

        $chofer = $this->IChofer->actualizarChofer($chofer, $request->all());

        if ($chofer) {
            return response()->json(['success' => true, 'message' => 'Chofer actualizado exitosamente']);
        } else {
            return response()->json(['success' => false, 'message' => 'Chofer no encontrado'], 404);
        }
    }

    public function destroy(string $id)
    {
        $chofer= $this->IChofer->buscarChofer($id);
        if(!is_null($chofer)){
            
            $resultado = $this->IChofer->eliminarChofer($chofer);
            return response()->json([
                'success' => true,
                'id' =>$chofer->id,
                'message' => 'chofer eliminado correctamente'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Ha ocurrido un error al tratar de eliminar a chofer'
        ]);
        
        

    } 
}
