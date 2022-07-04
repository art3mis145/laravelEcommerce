<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartComponent extends Component
{
    public function increaseQty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
    }

    public function decreaseQty($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
    }

    public function delete($rowId)
    {

        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message', 'Product has been remove');
    }

    public function deleteAll()
    {
        Cart::instance('cart')->destroy();
    }

    public function checkout()
    {
        if (Auth::check()) {
            return redirect()->route('checkout');
        } else {
            return redirect()->route('login');
        }
//        return redirect()->route('checkout');
    }

    public function setAmountForCheckout()
    {
        if (!Cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            return;
        }
        session()->put('checkout', [
            'discount' => 0,
            'subtotal' => Cart::instance('cart')->subtotal(),
            'tax' => Cart::instance('cart')->tax(),
            'total' => Cart::instance('cart')->total()
        ]);

    }

    public function render()
    {
        $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
