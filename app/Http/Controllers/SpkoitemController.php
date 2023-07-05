<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spko_item;

class SpkoitemController extends Controller
{
    public function editSpkoItem(Request $request, $id_spko, $id)
    {
        $spko_item = Spko_item::where('id',$id)->update(['qty'=>$request['qty']]);

        $return_url = "/spko/" . $id_spko;

        return redirect($return_url);
    }
}
