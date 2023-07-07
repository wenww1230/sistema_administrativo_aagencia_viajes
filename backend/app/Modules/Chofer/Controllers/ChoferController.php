<?php 
namespace App\Modules\Chofer\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Chofer\Contracts\IChoferes;
use Illuminate\Support\Facades\Log;

class ChoferController extends Controller
{
    protected $IChofer;

    public function __construct(IChoferes $IChofer)
    {
        $this->IChofer = $IChofer;
    }

    public function test()
    {
        return 1;
    }

    public function index()
    {
        log::debug('Mensaje de prueba en el index');
        try {
            $choferes = $this->IChofer->getChoferes();
            return response()->json($choferes);
        } catch (\Exception $e) { //excepcion de tipo 'Exception'. En PHP, el tipo de base 'Exception' es una clase base para todas las excepciones de este tipo
            log::debug($e->getMessage());//mostrara el mensaje de error
            
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        log::debug('Mensaje de prueba en el store');
        try {
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
        } catch (\Exception $e) {
            log::debug($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error al crear el chofer'], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $chofer = $this->IChofer->buscarChofer($id);

            if ($chofer) {
                return response()->json($chofer);
            } else {
                return response()->json(['success' => false, 'message' => 'Chofer no encontrado'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al obtener el chofer'], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $chofer = $this->IChofer->buscarChoferParaActualizar($id);

            if ($chofer) {
                $datos = $request->all();
                $chofer->fill($datos);
                $chofer->save();

                return response()->json(['success' => true, 'message' => 'Chofer actualizado exitosamente']);
            } else {
                return response()->json(['success' => false, 'message' => 'Chofer no encontrado'], 404);
            }
        } catch (\Exception $e) {
            log::debug($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error al actualizar el chofer'], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $chofer = $this->IChofer->buscarChofer($id);

            if (!$chofer->isEmpty()) {
                $chofer = $chofer->first();
                $resultado = $this->IChofer->eliminarChofer($chofer->id_chofer);

                return response()->json([
                    'success' => true,
                    'id' => $chofer->id,
                    'message' => 'Chofer eliminado correctamente'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'No se encontró el chofer con el ID especificado'
            ]);
        } catch (\Exception $e) {
            log::debug($e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error al eliminar el chofer'], 500);
        }
    }
}
?>