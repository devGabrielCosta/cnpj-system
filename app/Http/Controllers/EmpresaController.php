<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\EmpresaResource;

class EmpresaController extends Controller
{
    public function show($cnpj){

        Validator::make([ 'cnpj' => $cnpj ], [
            'cnpj' => 'required|int|digits:14'
        ])->validate();

        $endpoint = "https://brasilapi.com.br/api/cnpj/v1/{$cnpj}";

        $response = json_decode(Http::get($endpoint)->body());

        if(isset($response->cnpj)){
            return response([
                'success' => true,
                'response' => new EmpresaResource($response),
            ], 200);
        }
        
        return response([
            'success' => false,
            'message' => "CNPJ inválido",
        ], 404);
    }
}
