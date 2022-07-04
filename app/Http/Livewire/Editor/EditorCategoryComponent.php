<?php

namespace App\Http\Livewire\Editor;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class EditorCategoryComponent extends Component

{
    use WithPagination;

    public function deleteCategory($id){
    $category = Category::find($id);
    $category->delete();
    session()->flash('message','Category deleted');
    }

    public function render()
    {
        $categories = Category::paginate(5);
        return view('livewire.editor.editor-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
