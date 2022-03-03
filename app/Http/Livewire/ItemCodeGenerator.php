<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Livewire\Component;

class ItemCodeGenerator extends Component
{
    public $categories;
    public $selectedCategoryId;
    public $defaultCategoryId;
    public $itemCode;
    public $defaultCode;

    public function mount(){
        $this->selectedCategoryId = $this->defaultCategoryId??'';
        $this->itemCode = $this->defaultCode??'';
    }

    public function render()
    {
        return view('livewire.item-code-generator');
    }

    public function onChangeCategory()
    {

        $maxItemId = Item::where('category_id', $this->selectedCategoryId)->withTrashed()->max('id');

        $this->itemCode = 'RISER-' . sprintf('%03d', $this->selectedCategoryId) . '-' . sprintf('%03d', $maxItemId + 1);
    }
}
