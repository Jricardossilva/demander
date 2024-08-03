<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function convert(Request $request) {
        
        $valor = $request -> num;
        if (is_numeric($valor)) {
            $resultado = $this ->convert_romanos((int)$valor);
            return view('convert')->with(['resultado' => $resultado]);
        } else {
            $resultado = $this->convert_real($valor);
            return view('convert')->with(['resultado' => $resultado]);
        }
    }

    public $base_romanos = ['M' => 1000,'CM' => 900,'D' => 500,'CD' => 400,'C' => 100,'XC' => 90,'L' => 50,'XL' => 40,'X' => 10,'IX' => 9,'V' => 5,'IV' => 4,'I' => 1];

    public function convert_romanos($numero) {
        $resultado = '';
        foreach ($this -> base_romanos as $romano => $value) {
            while ($numero >= $value) {
                $resultado .= $romano;
                $numero -= $value;
            }
        }
        return $resultado;
    }
    public function convert_real($numero) {
        $resultado = 0;
        $romano = strtoupper($numero);
        $i = 0;
        while ($i < strlen($romano)) {
            $caracter_romano = $romano[$i];
            $proximo = ($i + 1 < strlen($romano)) ? $romano[$i + 1] : null;
            if ($proximo && isset($this->base_romanos[$caracter_romano . $proximo])) {
                $resultado += $this->base_romanos[$caracter_romano . $proximo];
                $i += 2;
            } else {
                $resultado += $this->base_romanos[$caracter_romano];
                $i++;
            }
        }
        return $resultado;
    }

    public function index() {
        return view('convert');
    }

    
}
