<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Import the Controller class

class testController extends Controller
{
    public function generate(Request $request)
    {
        // Check if the request is a POST request
        if ($request->isMethod('post')) {
            // Segitiga
            if ($request->input('action') === "generateSegitiga") {
                $number = (int)$request->input('number');
                $result = '';
                for ($i = 1; $i <= $number; $i++) {
                    $result .= str_repeat($i, $i) . "<br>";
                }
                return $result;
                //test
            }
            // Bilangan Ganjil
            if ($request->input('action') === "generateGanjil") {
                $number = (int)$request->input('number');
                $result = '';
                for ($i = 1; $i <= $number; $i += 2) {
                    $result .= $i . "<br>";
                }
                return $result;
            }
            // Bilangan Prima
            if ($request->input('action') === "generatePrima") {
                $number = (int)$request->input('number');
                $result = '';

                for ($i = 2; $i <= $number; $i++) {
                    $isPrime = true;
                    for ($j = 2; $j < $i; $j++) {
                        if ($i % $j === 0) {
                            $isPrime = false;
                            break;
                        }
                    }
                    if ($isPrime) {
                        $result .= $i . "<br>";
                    }
                }
                return view('segitiga', ['result' => $result]);
            }
        }
    }
}
