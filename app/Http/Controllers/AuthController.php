<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Registro de usuario admin
     *
     * @param Request $request
     * @return void
     */
    public function  signup(Request $request){
        try {
            DB::beginTransaction();
            $data = $request->all();

            /* crear empresa */
            $empresa = Empresa::create([
                'name' => $data['empresa'],
                'email' => $data['email'],
                'address' => $data['endereco']
            ]);

            /* crear usuario */
            $permitted_chars = '123456789abcdefghijklmnopqrstuvwxyz';
            $token = substr(str_shuffle($permitted_chars), 0 ,50);

            $user = User::create([
                'empresa_id' => $empresa->id,
                'role_id' => User::ADMIN,
                'name' => $data['nome'],
                'password' => Hash::make($data['senha']),
                'is_active' => true,
                'is_primary' => true,
                'is_verified' => true,
                'notifications' => 1,
                'token_email' => $token

            ]);

            DB::commit();

            return response()->json([
                'message' => "Usuario creado con exito",
                'User' => $user->id,
            ],200);
            
        } catch (\Throwable $th) {

            DB::rollBack();
            return response()->json([
                'danger' => true,
                'message' => $th->getMessage(),
            ],500);
        }
    }
}
