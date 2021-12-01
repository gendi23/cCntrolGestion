<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;


use App\Models\Barco;
use App\Models\Oficina;
use App\Models\BarcoOficina;

class BarcoService{
    /** 
     * Obtener todos los barcos
     * @return object 
    */  

    public function getBarcosService(){
        try {
            $barcos = Barco::select('*')
            ->with('oficinas')->get();
            return $barcos;
        } catch (\Throwable $th) {
            return[
                'danger' => true,
                'mesagge' => $th->getMessage()
            ];
        }
    }

     /** 
     * insertar datos de  barcos
     * @param [type] $data
     * @return Array 
    */  

    public function postBarcoService($data){
        try {
            DB::beginTransaction();
            
            $barcoCreated = Barco::create([
                "nome" => $data['nome'],
                "numero_IMO" => $data['numero_IMO'],
                "armador" => $data['armador'],
                "numero_registro"=> $data['numero_registro'],
                "indicativo_chamada" => $data['indicativo_chamada'],
                "ano_construcao"=> $data['ano_construcao'],
                "numero_construcao"=> $data['numero_construcao'],
                "estaleiro"=> $data['estaleiro'],
                "tipo_barco"=> $data['tipo_barco'],
                "navegacao"=> $data['navegacao'],
                "servico"=> $data['servico'],
                "n_p_a"=> $data['n_p_a'],
                "cpmto_total"=> $data['cpmto_total'],
                "cpmto_perpendicular"=> $data['cpmto_perpendicular'],
                "manga"=> $data['manga'],
                "strut" => $data['strut'],
                "tonelagem_bruta"=> $data['tonelagem_bruta'],
                "tonelagem_líquida"=> $data['tonelagem_líquida'],
                "transporte_bruto"=> $data['transporte_bruto'],
                "motor_ignicao"=> $data['motor_ignicao'],
                "qantidade"=> $data['qantidade'],
                "marca"=> $data['marca'],
                "modelo"=> $data['modelo'],
                "potencia/velocidade"=>$data['potencia'],
            ]);

            if($data['oficina']){
                $date = Carbon::now();
                $year = substr($date->year , 2);
           
                $oficina =Oficina::firstOrCreate(['id' => $data['oficina']]);
                $barcoCreated->oficinas()->attach(false,
                [
                    'barco_id' => $barcoCreated->id,
                    'oficina_id' => $oficina->id,
                    'numero_orden' => $oficina->nome."-".$barcoCreated->id.$year
                ]);
            }

            DB::commit();

            return [
                'message' => 'Registrado con exito'
            ];
        } catch (\Throwable $th) {
            return[
                'danger' => true,
                'mesagge' => $th->getMessage()
            ];
        }
    }

    /** 
     * Actualizar datos de  barcos
     * @param [type] $id
     * @param [type] $data
     * @return Array 
    */  

    public function updatedBarco($id , $data){
        try {
            DB::beginTransaction();
            
            $barco = Barco::find($id);
            $barcoUpdated = Barco::find($id);
            
            $barcoUpdated->update([
                "nome" => $data['nome'] ?  $data['nome'] : $barco['nome'],
                "numero_IMO" => $data['numero_IMO']? $data['numero_IMO']: $barco['numero_IMO'],
                "armador" => $data['armador'] ? $data['armador'] : $barco['armador'],
                "numero_registro"=> $data['numero_registro'] ? $data['numero_registro'] : $barco['numero_registro'],
                "indicativo_chamada" => $data['indicativo_chamada']?  $data['indicativo_chamada'] :  $barco['indicativo_chamada'],
                "ano_construcao"=> $data['ano_construcao'] ? $data['ano_construcao'] : $barco['ano_construcao'],
                "numero_construcao"=> $data['numero_construcao'] ? $data['numero_construcao'] : $barco['numero_construcao'],
                "estaleiro"=> $data['estaleiro'] ? $data['estaleiro'] : $barco['estaleiro'],
                "tipo_barco"=> $data['tipo_barco'] ? $data['tipo_barco']: $barco['tipo_barco'],
                "navegacao"=> $data['navegacao'] ? $data['navegacao'] : $barco['navegacao'],
                "servico"=> $data['servico'] ? $data['servico'] : $barco['servico'],
                "n_p_a"=> $data['n_p_a'] ? $data['n_p_a'] : $barco['n_p_a'],
                "cpmto_total"=> $data['cpmto_total'] ? $data['cpmto_total'] : $barco['cpmto_total'],
                "cpmto_perpendicular"=> $data['cpmto_perpendicular'] ? $data['cpmto_perpendicular'] : $barco['cpmto_perpendicular'],
                "manga"=> $data['manga'] ? $data['manga'] : $barco['manga'],
                "strut" => $data['strut'] ? $data['strut'] : $barco['strut'],
                "tonelagem_bruta"=> $data['tonelagem_bruta'] ? $data['tonelagem_bruta'] : $barco['tonelagem_bruta'],
                "tonelagem_líquida"=> $data['tonelagem_líquida'] ? $data['tonelagem_líquida'] : $barco['tonelagem_líquida'],
                "transporte_bruto"=> $data['transporte_bruto'] ? $data['transporte_bruto'] : $barco['transporte_bruto'],
                "motor_ignicao"=> $data['motor_ignicao'] ? $data['motor_ignicao'] : $barco['motor_ignicao'],
                "qantidade"=> $data['qantidade'] ? $data['qantidade'] : $barco['qantidade'],
                "marca"=> $data['marca'] ? $data['marca'] : $barco['marca'],
                "modelo"=> $data['modelo'] ? $data['modelo'] : $barco['modelo'],
                "potencia/velocidade"=>$data['potencia/velocidade'] ? $data['potencia/velocidade'] : $barco['potencia/velocidade'],
            ]);

            $barcoUpdated->save();
        
            DB::commit();

            return [
                'barcoUpdated' => $barcoUpdated,
                'message' => 'Actualizado  con exito'
            ];
        } catch (\Throwable $th) {
            return[
                'danger' => true,
                'mesagge' => $th->getMessage()
            ];
        }
    }

     /** 
     * Eliminar datos de  barcos
     * @param [type] $id
     * @return Array 
    */  

    public function destroyBarco($id){
        try {
            
            $barco = Barco::findOrFail($id);
            $barco->delete();
            return [
                'message' => 'Eliminado  con exito'
            ];
        } catch (\Throwable $th) {
            return[
                'danger' => true,
                'mesagge' => $th->getMessage()
            ];
        }
    }

    /** 
     * insertar datos de  barcos
     * @param [type] $data
     * @return Array 
    */  

    public function postOrdenService($data){
        try {

            $date = Carbon::now();
            $year = substr($date->year , 2);
            $oficina =Oficina::firstOrCreate(['id' => $data['oficina_id']]);

            $OrdenCreated = BarcoOficina::create([
                "barco_id" => $data['barco_id'],
                "oficina_id" =>  $data['oficina_id'],
                "numero_orden" => $oficina->nome."-".$data['barco_id'].$year,
                "nome"=> $data['nome'],
                "status_id" => $data['status_id'],
                "nome_documento"=> "prueba",
                "url_documento"=> $data['documento'],
                
            ]);

            $OrdenCreated->save();

            return [
                'message' => 'Registrado con exito'
            ];
        } catch (\Throwable $th) {
            return[
                'danger' => true,
                'mesagge' => $th->getMessage()
            ];
        }
    }
}
?>