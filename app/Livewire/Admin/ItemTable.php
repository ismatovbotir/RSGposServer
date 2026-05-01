<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\Item;
use App\Models\PriceData;
use App\Models\Stock;

class ItemTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public array $filters = [
        'id'       => '',
        'name'     => '',
        'category' => '',
        'partner'  => '',
        'barcode'  => '',
    ];

    public string $activeFilter   = '';
    public string $sortColumn     = 'id';
    public string $sortDirection  = 'desc';
    public int    $perPage        = 20;

    public function updatedFilters(): void
    {
        $this->resetPage();
    }

    public function updatedPerPage(): void
    {
        $this->resetPage();
    }

    public function toggleFilter(string $column): void
    {
        $this->activeFilter = $this->activeFilter === $column ? '' : $column;
    }

    public function sort(string $column): void
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortColumn    = $column;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->filters      = ['id' => '', 'name' => '', 'category' => '', 'partner' => '', 'barcode' => ''];
        $this->activeFilter = '';
        $this->resetPage();
    }

    public function openItem(int $id): void
    {
        $this->dispatch('openItemModal', id: $id);
    }

    #[On('item-updated')]
    public function onItemUpdated(): void {}

    public function hasActiveFilters(): bool
    {
        return collect($this->filters)->some(fn($v) => $v !== '');
    }

    public function render()
    {
        $query = Item::with(['category', 'partner', 'sellPrice', 'currentStock'])
            ->withCount('barcodes')
            ->when($this->filters['id'],       fn($q, $v) => $q->where('id', $v))
            ->when($this->filters['name'],     fn($q, $v) => $q->where('name', 'like', "%{$v}%"))
            ->when($this->filters['category'], fn($q, $v) => $q->whereHas('category', fn($q) => $q->where('name', 'like', "%{$v}%")))
            ->when($this->filters['partner'],  fn($q, $v) => $q->whereHas('partner',  fn($q) => $q->where('name', 'like', "%{$v}%")))
            ->when($this->filters['barcode'],  fn($q, $v) => $q->whereHas('barcodes', fn($q) => $q->where('id', $v)));

        match ($this->sortColumn) {
            'name'       => $query->orderBy('name', $this->sortDirection),
            'sell_price' => $query->orderBy(
                PriceData::select('value')
                    ->whereColumn('item_id', 'items.id')
                    ->where('price_id', 2)
                    ->limit(1),
                $this->sortDirection
            ),
            'barcodes'   => $query->orderBy('barcodes_count', $this->sortDirection),
            'stock'      => $query->orderBy(
                Stock::select('qty')
                    ->whereColumn('item_id', 'items.id')
                    ->where('shop_id', env('SHOP', 1))
                    ->latest('stock_date')
                    ->limit(1),
                $this->sortDirection
            ),
            default      => $query->orderBy('id', $this->sortDirection),
        };

        return view('livewire.admin.item-table', [
            'items' => $query->paginate($this->perPage),
        ]);
    }
}
