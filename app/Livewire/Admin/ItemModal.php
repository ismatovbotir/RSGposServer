<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Item;

class ItemModal extends Component
{
    public bool   $show      = false;
    public string $activeTab = 'main';
    public ?Item  $item      = null;

    #[On('openItemModal')]
    public function open(int $id): void
    {
        $this->item      = Item::with(['category', 'partner', 'prices.price', 'barcodes', 'currentStock'])->findOrFail($id);
        $this->activeTab = 'main';
        $this->show      = true;
    }

    public function close(): void
    {
        $this->show = false;
        $this->item = null;
    }

    public function setTab(string $tab): void
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.admin.item-modal');
    }
}
