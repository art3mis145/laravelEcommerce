<?php

namespace App\Http\Livewire\Editor;

use Livewire\Component;

class EditorDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.editor.editor-dashboard-component')->layout('layouts.base');
    }
}
