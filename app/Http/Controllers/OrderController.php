<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function isi_data(Request $request){
        $order = new Order;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->qty = $request->qty;
        $pricePerItem = 200000;
        $order->total_price = $pricePerItem * $order->qty;
        $order->status = 'Unpaid';
        $order->save();
        Alert::success('Success', 'Order Created successfully');
        return redirect('/riwayat');
    }
    public function checkout(Request $request, $id) {
        $order = Order::find($id);
        return view('home.checkout', compact('order'));
    }
    
    public function checkout_2(Request $request, $id) {
        $order = Order::find($id);
        return view('home.checkout', compact('order'));
    }
}