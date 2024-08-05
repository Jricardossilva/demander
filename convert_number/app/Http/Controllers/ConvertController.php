<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function convert(Request $request) {
        
        #Verifica se o valor solicitado é um número
        if (is_numeric($request -> num) and ($request -> num) > 0 and ($request -> num) < 4000) {
            $valor = $request -> num;
            $resultado = $this ->convert_romanos((int)$valor);
            return view('convert')->with(['resultado' => $resultado, 'valor' => $valor]);

        #Verifica se o valor solicitado é um algarismo romano
        } elseif(preg_match("/^M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/", $request -> num)){
            $valor = $request -> num;
            $resultado = $this->convert_real($request -> num);
            return view('convert')->with(['resultado' => $resultado, 'valor' => $valor]);
        } else {
            $error = 'Valor Inválido';
            return view('convert')->with(['error' => $error]);
        }
    }

    #Base de algarismo romanos
    public $base_romanos = ['M' => 1000,'CM' => 900,'D' => 500,'CD' => 400,'C' => 100,'XC' => 90,'L' => 50,'XL' => 40,'X' => 10,'IX' => 9,'V' => 5,'IV' => 4,'I' => 1];

    #Método para converter para numeros romanos
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

    #Método para converter para numeros reais
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
