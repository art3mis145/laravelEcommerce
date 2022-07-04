<?php

namespace App\Http\Livewire\Editor;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EditorOrderComponent extends Component
{
    public function updateOrderStatus($order_id, $status)
    {
        $order = Order::find($order_id);
        $order->status = $status;
        if ($status == "delivered") {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        } else if ($status == "canceled") {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message', 'Order status updated');
    }

    public function render()
    {
        $order = Order::orderby('created_at', 'DESC')->paginate(12);
        return view('livewire.editor.editor-order-component', ['orders' => $order])->layout('layouts.base');
    }
}
