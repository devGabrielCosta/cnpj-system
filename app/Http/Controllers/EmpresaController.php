<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Resources\EmpresaResource;

class EmpresaController extends Controller
{
    public function show(Request $request){

        $validated = $request->validate([
            'cnpj' => 'required|int|digits:14',
        ]);

        $endpoint = "https://brasilapi.com.br/api/cnpj/v1/{$request->cnpj}";

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
