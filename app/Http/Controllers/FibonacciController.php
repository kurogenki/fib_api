<?php

namespace App\Http\Controllers;

use Brick\Math\BigInteger;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FibonacciController extends Controller
{
 /**
    * 対象のフィボナッチ数列を求める
    *@param Request $request
    * @return JsonResponse
    */
    public function researchFibonacci(Request $request): JsonResponse
    {
        $requestNumber = (int)$request['n'];
        $fibonacci = [];

        // 数値に変換できる値（数値、数値文字列）かつ、数値が0以上の場合
        if (is_numeric($request['n']) && $requestNumber > -1) {
            $i = 2;
            while (true) {
                $fibonacci[0] = 0;
                $fibonacci[1] = 1;
                $temp = BigInteger::of($fibonacci[$i - 2])->plus($fibonacci[$i - 1]);
                if ($i > $requestNumber) {
                    break;
                }
                $fibonacci[$i] = $temp->toBigInteger();
                $i++;
            }

            return response()->json(['result' => $fibonacci[$requestNumber]]);
        }
        else {
            return response()->json(['status' => 400,'message' => 'Bad request'], 400);
        }
    }
}
