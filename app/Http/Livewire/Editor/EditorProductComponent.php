<?php

namespace App\Http\Livewire\Editor;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class EditorProductComponent extends Component
{
    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        session()->flash('message','Product deleted');
        return redirect()->route('editor.products');
    }

    public function render()
    {
        $product = Product::paginate(10);
        return view('livewire.editor.editor-product-component',['products'=>$product])->layout('layouts.base');
    }
}
