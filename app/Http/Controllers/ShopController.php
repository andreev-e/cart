<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tovar;
use App\Cart;
use Auth;

class ShopController extends Controller
{
    public function __construct()
    {

    }

    public function list()
    {
        $tovary = Tovar::all();
        return view('list', ['tovary' => $tovary]);
    }

    public function add(Request $request)
    {
        $cartitem = Cart::firstOrNew([
            'user_id' => Auth::user()->id,
            'tovar_id' => $request->input('id'),
        ]);
        $cartitem->quantity = $cartitem->quantity + $request->input('quantity');
        $cartitem->save();
        return redirect('/cart');
    }

    public function delete(Request $request)
    {
        $cartitem = Cart::where('user_id', Auth::user()->id)
            ->where('id', $request->input('id'))->first();
        if (is_object($cartitem)) {
            $cartitem->delete();
        }
        return redirect('/cart');
    }

    public function update(Request $request)
    {
        $cartitem = Cart::where('user_id', Auth::user()->id)
            ->where('id', $request->input('id'))->first();
        if (is_object($cartitem)) {
            $cartitem->quantity = $request->input('quantity');
            $cartitem->save();
        }
        return redirect('/cart');
    }

    public function cart()
    {
        $tovary = Cart::where('user_id', Auth::user()->id)
            ->with('tovar')->get();
        return view('cart', ['tovary' => $tovary]);
    }
}
