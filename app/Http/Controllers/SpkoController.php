<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spko;
use App\Models\Spko_item;
use App\Models\Employee;
use App\Models\Product;




class SpkoController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $employees = Employee::all();
        $spkos = Spko::with('employees')->get();
        $process = ['Cor','Brush','Bombling','Slep'];
        return view('spko', ['spkos'=>$spkos, 'products'=>$products, 'employees'=>$employees, 'process'=>$process]);
    }

    public function detailSpko($id_spko)
    {
        $employees = Employee::all();
        $spko = Spko::with('employees','spko_items.products')->where('id_spko',$id_spko)->get();
        return view('detail_spko', ['spko'=>$spko[0], 'employees'=>$employees]);
    }

    public function createSpko(Request $request)
    {
        $params = $request->all();
        $items = array();
        foreach ($params as $key =>$value) {
            if (strpos($key, 'product_') !== false){
                $id_product = explode("_",$key);
                $product = [$id_product[1]=>$value];
                array_push($items,$product);
            }
        }
        if (count($items) == 0) {
            return redirect('/');
        }

         // Mendapatkan nomor urut terakhir dari tabel Spko untuk bulan ini 
        $year = date("y");
        $month = date("m");
        $lastSpko = Spko::whereRaw("DATE_FORMAT(trans_date, '%y%m') = ?", [$year . $month])
                        ->orderBy('id_spko', 'desc')
                        ->first();
        $sequence = $lastSpko ? intval(substr($lastSpko->sw, -3)) + 1 : 1;
        
        $sw = "SPKO" . $year . $month . str_pad($sequence, 3, '0', STR_PAD_LEFT);

        $date_now = date("Y-m-d");
        // create spko
        $spko = new Spko;
        $spko['remarks'] = $request['remarks'];
        $spko['employee'] = $request['employee'];
        $spko['trans_date'] = $date_now;
        $spko['process'] = $request['process'];
        $spko['sw'] = $sw;
        $spko->save();

        // get current spko id
        $id_spko = Spko::where('sw',$sw)->first();
        $id_spko = $id_spko['id_spko'];
        
        // Insert items in spko_items
        foreach ($items as $item) {
            foreach ($item as $id_product => $qty) {
                $spko_item = new Spko_Item;
                $spko_item['ordinal'] = $id_spko;
                $spko_item['id_product'] = $id_product;
                $spko_item['qty'] = $qty;
                $spko_item->save();
            }
            
        }
        
        return redirect('/');
    }

    public function detailSpkoPrint($id_spko)
    {
        $employees = Employee::all();
        $spko = Spko::with('employees','spko_items.products')->where('id_spko',$id_spko)->get();
        // dd($spko->all());
        return view('print_detail_spko', ['spko'=>$spko[0], 'employees'=>$employees]);
    }

    public function editSpko(Request $request, $id_spko)
    {
        // Get Spko
        $spko = Spko::where('id_spko', $id_spko)->update(['employee'=>$request['employee'], 'trans_date' => $request['tanggal_transaksi'] ]);
        
        $return_url = '/spko/' . $id_spko;

        return redirect($return_url);
    }

    public function deleteSpko($id_spko)
    {
        // Delete spko_items first
        $spko_item = Spko_Item::where('ordinal', $id_spko)->delete();

        // Then delete the spko
        $spko = Spko::where('id_spko',$id_spko)->delete();
        return redirect('/');
    }
}
