<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Receipt;
use App\Models\Shop;
use Carbon\Carbon;

class ReceiptTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $date        = '';
    public string $cashier     = '';
    public string $paymentType = '';
    public string $status      = '';
    public int    $shopId      = 0;
    public int    $perPage     = 20;

    public ?int $selectedId = null;

    public function mount(): void
    {
        $this->date = Carbon::now('Asia/Tashkent')->toDateString();
    }

    public function updatedDate(): void        { $this->resetPage(); }
    public function updatedCashier(): void     { $this->resetPage(); }
    public function updatedPaymentType(): void { $this->resetPage(); }
    public function updatedStatus(): void      { $this->resetPage(); }
    public function updatedShopId(): void      { $this->resetPage(); }
    public function updatedPerPage(): void     { $this->resetPage(); }

    public function openReceipt(int $id): void
    {
        $this->selectedId = $id;
    }

    public function closeModal(): void
    {
        $this->selectedId = null;
    }

    public function clearFilters(): void
    {
        $this->date        = Carbon::now('Asia/Tashkent')->toDateString();
        $this->cashier     = '';
        $this->paymentType = '';
        $this->status      = '';
        $this->shopId      = 0;
        $this->resetPage();
    }

    public function render()
    {
        $query = Receipt::withCount('items')
            ->with('payments')
            ->when($this->date,        fn($q, $v) => $q->whereDate('receipt_date', $v))
            ->when($this->cashier,     fn($q, $v) => $q->where('cashier', $v))
            ->when($this->paymentType, fn($q, $v) => $q->whereHas('payments', fn($q) => $q->where('type', $v)))
            ->when($this->shopId,                fn($q, $v) => $q->where('shop_id', $v))
            ->when($this->status !== '', fn($q)       => $q->where('status', (bool) $this->status))
            ->latest('receipt_date');

        $summary = [
            'total'   => (clone $query)->count(),
            'revenue' => (clone $query)->sum('total'),
        ];

        $selected = $this->selectedId
            ? Receipt::with(['items.item', 'payments'])->find($this->selectedId)
            : null;

        $cashiers = Receipt::whereDate('receipt_date', $this->date)
            ->distinct()->orderBy('cashier')->pluck('cashier')->filter()->values();

        $shops = Shop::orderBy('name')->get(['id', 'name']);

        return view('livewire.admin.receipt-table', [
            'receipts' => $query->paginate($this->perPage),
            'summary'  => $summary,
            'selected' => $selected,
            'cashiers' => $cashiers,
            'shops'    => $shops,
        ]);
    }
}
