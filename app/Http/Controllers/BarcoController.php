<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barco;
use App\Models\Oficina;
use Illuminate\Support\Facades\DB;
use App\Http\Services\BarcoService;

class BarcoController extends Controller
{
    /**
     * Obtiene todos los barcos
     * @return object
    */
    public function getBarcos(){
        try {
            $barcos= (new BarcoService())->getBarcosService();
            return response()->json($barcos , 201);
        } catch (\Throwable $th) {
            return response()->json([
                'danger' => true,
                'message' => $th->getMessage(),
            ],500);
        }
    }

    /**
     * Insertar datos de barco
     * @param Request $request
     * @return object
     */
    public function potsBarco(Request $request){
        try {
          
            $data = $request->all();
            $barcoCreated = (new BarcoService())->postBarcoService($data);
            return response()->json($barcoCreated , 201);
        } catch (\Throwable $th) {
            return response()->json([
                'danger' => true,
                'message' => $th->getMessage(),
            ],500);
        }
    }

    /**
     * Actualizar datos de barco
     * @param Request $request
     * @param [type] $id
     * @return object
     */
    public function updatedBarco(Request $request , $id){
        try {
            $data = [
                "id"=> 1,
                "nome" => "Registro editado",
                "numero_IMO" => 1234,
                "armador" => "juan",
                "numero_registro"=> 464646,
                "indicativo_chamada" => "activa",
                "ano_construcao"=> "2021-11-20",
                "numero_construcao"=> "1313",
                "estaleiro"=> "mario",
                "tipo_barco"=> "jate2",
                "navegacao"=> "new",
                "servico"=> "mantenimiento",
                "n_p_a"=> 20,
                "cpmto_total"=> 79,
                "cpmto_perpendicular"=> 80,
                "manga"=> "no se",
                "strut" =>"esmeralda",
                "tonelagem_bruta"=> "10",
                "tonelagem_líquida"=> "20",
                "transporte_bruto"=> "ese bruto",
                "motor_ignicao"=> "modelo TYE",
                "qantidade"=> 100,
                "marca"=> "full stack",
                "modelo"=> "RQTY",
                "potencia/velocidade"=>"2000k/h",
                "oficina" => 2
            ];
            $id = 1;
            $barcoUpdate = (new BarcoService())->updatedBarco($id , $data);
            return response()->json($barcoUpdate , 201);
        } catch (\Throwable $th) {
            return response()->json([
                'danger' => true,
                'message' => $th->getMessage(),
            ],500);
        }
    }
    
    /**
     * eliminar datos de barco
     * @param Request $request
     * @param [type] $id
     * @return object
     */
    public function destroyBarco($id){
        try {
        
            $barcoUpdate = (new BarcoService())->destroyBarco($id);
            return response()->json($barcoUpdate , 201);
        } catch (\Throwable $th) {
            return response()->json([
                'danger' => true,
                'message' => $th->getMessage(),
            ],500);
        }
    }
    
     /**
     * Obtiene listado de oficinas
     * @return object
    */
    public function getOficinas(){
        try {
            $oficinas = Oficina::select('id' , 'nome')->get();
            return response()->json($oficinas , 201);
        } catch (\Throwable $th) {
            return response()->json([
                'danger' => true,
                'message' => $th->getMessage(),
            ],500);
        }
    }

    /**
     * Generar orden 
     * @param Request $request
     * @return object
     */
    public function potsOrden(Request $request){
        try {
          
            $data = $request->all();
            $ordenCreated = (new BarcoService())->postOrdenService($data);
            return response()->json($ordenCreated , 201);
        } catch (\Throwable $th) {
            return response()->json([
                'danger' => true,
                'message' => $th->getMessage(),
            ],500);
        }
    }
}
