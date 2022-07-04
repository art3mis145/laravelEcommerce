<?php

namespace App\Http\Livewire\Editor;

use App\Models\Order;
use Livewire\Component;

class EditorOrderDetailsComponent extends Component
{
    public $order_is;

    public function mount($order_id){
        $this->order_is = $order_id;
    }

    public function render()
    {
        $order = Order::find($this->order_is);
        return view('livewire.editor.editor-order-details-component',['order'=>$order])->layout('layouts.base');
    }
}
