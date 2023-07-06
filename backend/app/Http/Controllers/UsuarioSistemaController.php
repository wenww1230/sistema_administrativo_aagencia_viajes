<?php

namespace App\Http\Controllers;

use App\Repository\UsuarioSistema\UsuarioSistemaRepository;
use Illuminate\Http\Request;

class UsuarioSistemaController extends Controller
{
    //metodo contructor
    protected $userSysRepo;
    
    public function __construct(UsuarioSistemaRepository $usuarioSistemaRepository)
    {
        $this->userSysRepo = $usuarioSistemaRepository;
        
    }
    public function index()
    {
        $choferes = $this->userSysRepo->getAll();
        return response()->json($choferes);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required', 
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'dni' => 'required',
            'numero_licencia' => 'required'
        ]);

        $chofer = $this->userSysRepo->insertar($data);

        if ($chofer) {
            return response()->json(['success' => true, 'message' => 'Chofer creado exitosamente'], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'No se pudo crear el chofer'], 400);
        }
    }

    public function show(string $id)
    {
        $chofer = $this->userSysRepo->find($id);

        if ($chofer) {
            return response()->json($chofer);
        } else {
            return response()->json(['success' => false, 'message' => 'Chofer no encontrado'], 404);
        }
    }

    public function update(Request $request, string $id)
    {
        $chofer= $this->userSysRepo->find($id);

        $chofer = $this->userSysRepo->actualizar($chofer, $request->all());

        if ($chofer) {
            return response()->json(['success' => true, 'message' => 'Chofer actualizado exitosamente']);
        } else {
            return response()->json(['success' => false, 'message' => 'Chofer no encontrado'], 404);
        }
    }

    public function destroy(string $id)
    {
        $chofer= $this->userSysRepo->find($id);
        if(!is_null($chofer)){
            
            $resultado = $this->userSysRepo->eliminar($chofer);
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
