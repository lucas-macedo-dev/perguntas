<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cep_address;
use Illuminate\Http\Request;

class Task1Controller extends Controller
{
    public function registerCep(Request $request): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validate([
            'cep'         => 'required',
            'uf'          => 'required',
            'localidade'  => 'required',
            'ibge'        => 'required',
            'logradouro'  => 'required',
            'complemento' => 'string|nullable',
            'bairro'      => 'required'
        ]);


        $newRegister = Cep_address::create([
                'cep'         => $validatedData['cep'],
                'uf'          => $validatedData['uf'],
                'localidade'  => $validatedData['localidade'],
                'ibge'        => $validatedData['ibge'],
                'logradouro'  => $validatedData['logradouro'],
                'complemento' => $validatedData['complemento'],
                'bairro'      => $validatedData['bairro']
        ]);

        return response()->json(
            [
                'message' => 'Cep criado com sucesso',
                'data'    => $newRegister
            ]
        );
    }
}
