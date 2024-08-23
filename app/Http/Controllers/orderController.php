<?php
namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        $user = Order::where('users_id', auth()->user()->id)->get();
        return view('order.order', ['user' => $user]);
        //  $order = Order::with(['status'])->get();
        // return view('admin.lihat_order',['order'=>$order]);
    }

    public function nambah()
    {
        $produk = Produk::get();
        return view('order.addorder', ['produk' => $produk]);
    }

    public function makanan(Request $request)
    {
        $validateData = $request->validate([
            'paket' => 'required',
            'alamat_tujuan' => 'required',
            'tanggal' => 'required',
            'harga' => 'required',
            'pilih_pembayaran' => 'required',
            'deskripsi_order' => 'required',
            'image' => 'image|file|max:5000',
        ]);

        if ($request->file('image')) {
            // Store the file in the 'uploads' directory and get the full path
            $path = $request->file('image')->store('uploads');

            // Extract the filename from the path
            $filename = basename($path);

            // Save only the filename in the database
            $validateData['image'] = $filename;
        }

        $validateData['users_id'] = auth()->user()->id;
        Order::create($validateData);

        return redirect('/order');
    }


    public function cetak($id)
    {
        $order = Order::with('gege')->findOrFail($id);
        return view('order.cetak_order', ['order' => $order]);
    }
}
