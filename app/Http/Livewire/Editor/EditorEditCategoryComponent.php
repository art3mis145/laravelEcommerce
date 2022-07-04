<?php

namespace App\Http\Livewire\Editor;

use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;

class EditorEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
        $category = Category::where('slug', $category_slug)->first();
        $this->category_id = $category->id;
        $this->name = $category -> name;
        $this->slug = $category->slug;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
    }

    public function updateCategory(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message','Updated category');
    }

    public function render()
    {
        return view('livewire.editor.editor-edit-category-component')->layout('layouts.base');
    }
}
