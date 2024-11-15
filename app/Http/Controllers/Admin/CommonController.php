<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    public function updateStatus($table_name, $column, $id, $value){
        try{
            DB::table($table_name)->where('id', hashid_decode($id))->update([
                $column => $value,
            ]);
            return response()->json(['success'  => 'Status updated successfully']);
        }catch(Exception $e){
            // dd($e->getMessage());
            return response()->json(['error'  => 'some error occured']);
        }
    }
}
