<?php

namespace App\Http\Livewire\Editor;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class EditorAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
    }

    public function addCategory(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);

        $category = new Category();
        $category->name= $this->name;
        $category->slug= $this->slug;
        $category->save();
        session()->flash('message','Category added');
    }

    public function render()
    {
        return view('livewire.editor.editor-add-category-component')->layout('layouts.base');
    }
}
