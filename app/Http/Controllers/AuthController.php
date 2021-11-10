<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostAdmin;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Registro de usuario admin
     *
     * @param PostAdmin $request
     * @return void
     */
    public function  signup(PostAdmin $request){
        try {
            DB::beginTransaction();
            $data = $request->all();
            dd($data);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
