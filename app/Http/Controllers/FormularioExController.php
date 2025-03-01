<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FormularioExController extends Controller
{
    public function mostrarFormulario($clienteId)
    {
        $cliente = Cliente::findOrFail($clienteId);
        $pdfs = $this->obtenerFormulariosDisponibles();
        
        return view('cliente.formulario-ex', compact('cliente', 'pdfs'));
    }
    
    private function obtenerFormulariosDisponibles()
    {
        $directorio = storage_path('app/public/pdfs');
        return array_filter(scandir($directorio), function($archivo) {
            return strpos($archivo, '.pdf') !== false;
        });
    }

    //codigo en la maquina del cliente ya que no funcinaba la ruta de acceso a los pdfs
//     private function obtenerFormulariosDisponibles()
// {
//     try {
//         // Hardcodear la ruta de Windows
//         $directorio = 'F:\\xampp\\htdocs\\Plataforma\\public\\pdf_templates';
        
//         // Log en el archivo de Laravel
//         \Log::info('Intentando acceder al directorio: ' . $directorio);
        
//         // Verificaciones con mensajes
//         if (!file_exists($directorio)) {
//             \Log::error('El directorio no existe: ' . $directorio);
//             echo "<script>console.log('El directorio no existe: " . $directorio . "');</script>";
//             return [];
//         }

//         if (!is_dir($directorio)) {
//             \Log::error('La ruta no es un directorio: ' . $directorio);
//             echo "<script>console.log('La ruta no es un directorio: " . $directorio . "');</script>";
//             return [];
//         }

//         $archivos = scandir($directorio);
//         \Log::info('Archivos encontrados: ', $archivos);
//         echo "<script>console.log('Archivos encontrados: " . json_encode($archivos) . "');</script>";

//         return array_filter($archivos, function($archivo) {
//             return strpos($archivo, '.pdf') !== false;
//         });

//     } catch (\Exception $e) {
//         // Log del error
//         \Log::error('Error al obtener formularios: ' . $e->getMessage());
//         // Mensaje en consola del navegador
//         echo "<script>console.error('Error al obtener formularios: " . $e->getMessage() . "');</script>";
//         // Mensaje visible en la página
//         echo '<div style="background: #fee; padding: 10px; margin: 10px; border: 1px solid #f00;">
//                 Error al obtener formularios: ' . $e->getMessage() . 
//              '</div>';
//         return [];
//     }
// }

    public function rellenarFormulario(Request $request, $clienteId)
    {
        try {
            $cliente = Cliente::findOrFail($clienteId);
            $templatePath = public_path('pdf_templates/' . $request->formulario);

            // Por ahora, solo mostrar el PDF original
            if (!file_exists($templatePath)) {
                throw new \Exception("El archivo PDF template no existe en: " . $templatePath);
            }

            // Verificar si el archivo es legible
            if (!is_readable($templatePath)) {
                throw new \Exception("El archivo PDF no se puede leer");
            }

            // Devolver el PDF original mientras investigamos una solución
            return response(file_get_contents($templatePath), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $request->formulario . '"'
            ]);

        } catch (\Exception $e) {
            Log::error('Error al procesar el PDF: ' . $e->getMessage(), [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'error' => 'Error al procesar el PDF',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function servirPDF($nombreArchivo)
    {
        try {
            $rutaPDF = storage_path('app/public/pdfs/' . $nombreArchivo);
            
            Log::info('Intentando servir PDF:', [
                'nombreArchivo' => $nombreArchivo,
                'rutaCompleta' => $rutaPDF,
                'existe' => file_exists($rutaPDF)
            ]);
    
            if (!file_exists($rutaPDF)) {
                return response()->json(['error' => 'PDF no encontrado'], 404);
            }
    
            return response()->file($rutaPDF);
            
        } catch (\Exception $e) {
            Log::error('Error:', $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
