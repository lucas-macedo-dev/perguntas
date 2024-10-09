<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Task3Controller extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $step = session('step', 1);
        return view('task-3.resolution', compact('step'));
    }

    public function progress(Request $request): \Illuminate\Http\RedirectResponse
    {
        if ($request->step == 1) {
            $request->validate(['cep' => 'required']);
            session(['cep' => $request->cep]);
        } elseif ($request->step == 2) {
            $cep = session('cep');
            $response = file_get_contents("https://viacep.com.br/ws/{$cep}/json/");
            $data = json_decode($response, true);

            // aqui eu poderia adicionar qualquer tratativa para atender a necessidade do projeto
        }

        $step = (int) $request->step + 1;
        session(['step' => $step]);

        return redirect()->route('task-3.resolution');
    }

    public function reset(): \Illuminate\Http\RedirectResponse
    {
        session(['step' => 1, 'cep' => null]);
        return redirect()->route('task-3.resolution');
    }
}
