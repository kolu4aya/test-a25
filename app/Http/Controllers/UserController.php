<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function store(Request $request)
    {

        $input = $request->all();

        $validator = Validator::make($input, [
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if($validator->fails()){
            $response = [
                'success' => false, 
                'message' => 'incorrect data'
            ];
            return response()->json($response, 200);         
        }

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $response = [
            'success' => true,
            'data' => $user
        ];

        return response()->json($response, 200);
    }

    public function accept_transaction(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'employee_id' => 'required|integer',
            'hours' => 'required|decimal:0,4|max:24'
        ]);

        if($validator->fails()){
            $response = [
                'success' => false, 
                'message' => 'incorrect data'
            ];
            return response()->json($response, 200);         
        }

        $transaction = Transaction::create([
            'employee_id' => $request->employee_id,
            'hours' => $request->hours,
        ]);

        $response = [
            'success' => true,
            'data' => $transaction
        ];
        
        return response()->json($response, 200);
    }

    public function get_amount()
    {
        $price_hour = 200;
        $amount =  Transaction::select('employee_id', DB::raw("SUM(hours)*{$price_hour} as hours"))
        ->groupBy('employee_id')
        ->get();
       
        $result = [];
        foreach ($amount as $item) {
            $result[][$item['employee_id']] = $item['hours'];
        }

        return response()->json($result, 200);
    }

    public function payment()
    {
        $transaction = Transaction::where('paid_out', 0)->update(['paid_out' => 1]);
        
        $response = [
            'success' => true,
            'count' => $transaction
        ];

        return response()->json($response, 200);
    }


}
