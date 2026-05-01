<div>
    {{-- KPI row --}}
    <div class="kpi-grid kpi-grid-3" style="margin-bottom:16px;">
        <div class="kpi-card">
            <div class="kpi-label">Receipts</div>
            <div class="kpi-value">{{ number_format($summary['total']) }}</div>
        </div>
        <div class="kpi-card">
            <div class="kpi-label">Revenue</div>
            <div class="kpi-value">{{ number_format($summary['revenue'], 0, '.', ' ') }}</div>
        </div>
        <div class="kpi-card">
            <div class="kpi-label">Avg receipt</div>
            <div class="kpi-value">
                {{ $summary['total'] > 0 ? number_format($summary['revenue'] / $summary['total'], 0, '.', ' ') : '—' }}
            </div>
        </div>
    </div>

    {{-- Filters --}}
    <div class="filter-row" style="margin-bottom:14px;flex-wrap:wrap;">
        <input type="date" wire:model.live="date">

        <select wire:model.live="cashier">
            <option value="">All cashiers</option>
            @foreach($cashiers as $name)
                <option value="{{ $name }}">{{ $name }}</option>
            @endforeach
        </select>

        <select wire:model.live="shopId">
            <option value="0">All shops</option>
            @foreach($shops as $shop)
                <option value="{{ $shop->id }}">{{ $shop->name }}</option>
            @endforeach
        </select>

        <select wire:model.live="status">
            <option value="">All statuses</option>
            <option value="1">Completed</option>
            <option value="0">Cancelled</option>
        </select>

        <select wire:model.live="paymentType">
            <option value="">All payments</option>
            <option value="cash">Cash</option>
            <option value="card">Card</option>
        </select>

        <select wire:model.live="perPage" style="width:auto;">
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>

        @if($cashier || $paymentType || $shopId)
        <button wire:click="clearFilters" style="font-size:11px;color:#a32d2d;background:none;border:none;cursor:pointer;font-family:inherit;white-space:nowrap;">
            ✕ Clear
        </button>
        @endif
    </div>

    {{-- Table --}}
    <div class="full-card" style="margin-bottom:0;padding:0;overflow:hidden;">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date / Time</th>
                    <th>Cashier</th>
                    <th>Shop</th>
                    <th>Items</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Fiscal</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($receipts as $receipt)
                <tr wire:click="openReceipt({{ $receipt->id }})" class="tr-clickable">
                    <td class="td-strong">#{{ $receipt->no }}</td>
                    <td class="td-muted">{{ \Carbon\Carbon::parse($receipt->receipt_date)->format('d.m.Y H:i') }}</td>
                    <td>{{ $receipt->cashier ?? '—' }}</td>
                    <td class="td-muted">{{ $receipt->shop_id }}</td>
                    <td>{{ $receipt->items_count }}</td>
                    <td>{{ number_format($receipt->total, 0, '.', ' ') }}</td>
                    <td>
                        @foreach($receipt->payments as $payment)
                            <span class="pill pill-info" style="margin-right:2px;">{{ $payment->type }}</span>
                        @endforeach
                    </td>
                    <td>
                        @if($receipt->status)
                            <span class="pill pill-done">completed</span>
                        @else
                            <span class="pill pill-cancelled">cancelled</span>
                        @endif
                    </td>
                    <td>
                        @if($receipt->fiscal)
                            <span class="pill pill-done">yes</span>
                        @else
                            <span class="td-muted">—</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" style="text-align:center;padding:32px;color:#aaa;">No receipts found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:14px;">
        {{ $receipts->links() }}
    </div>

    {{-- Modal --}}
    @if($selected)
    <div class="modal-overlay" wire:click.self="closeModal" @keydown.escape.window="$wire.closeModal()">
        <div class="modal-box">

            {{-- Modal header --}}
            <div class="modal-header">
                <div>
                    <span class="modal-title">Receipt #{{ $selected->no }}</span>
                    <span class="td-muted" style="font-size:11px;margin-left:10px;">
                        {{ \Carbon\Carbon::parse($selected->receipt_date)->format('d.m.Y  H:i:s') }}
                    </span>
                </div>
                <button wire:click="closeModal" class="modal-close">✕</button>
            </div>

            {{-- Meta row --}}
            <div class="modal-meta">
                <div class="modal-meta-item">
                    <span class="modal-meta-label">Cashier</span>
                    <span>{{ $selected->cashier ?? '—' }}</span>
                </div>
                <div class="modal-meta-item">
                    <span class="modal-meta-label">Shift</span>
                    <span>{{ $selected->shift ?? '—' }}</span>
                </div>
                <div class="modal-meta-item">
                    <span class="modal-meta-label">Shop</span>
                    <span>{{ $selected->shop_id }}</span>
                </div>
                <div class="modal-meta-item">
                    <span class="modal-meta-label">Status</span>
                    @if($selected->status)
                        <span class="pill pill-done">completed</span>
                    @else
                        <span class="pill pill-cancelled">cancelled</span>
                    @endif
                </div>
                <div class="modal-meta-item">
                    <span class="modal-meta-label">Fiscal</span>
                    @if($selected->fiscal)
                        <span class="pill pill-done">yes</span>
                    @else
                        <span class="td-muted">—</span>
                    @endif
                </div>
            </div>

            {{-- Items table --}}
            <div style="margin-top:14px;">
                <div style="font-size:11px;color:#888;font-weight:500;margin-bottom:6px;">ITEMS</div>
                <table>
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th style="text-align:right;">Qty</th>
                            <th style="text-align:right;">Price</th>
                            <th style="text-align:right;">Discount</th>
                            <th style="text-align:right;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($selected->items as $line)
                        <tr>
                            <td class="td-strong">{{ $line->item->name ?? 'Item #'.$line->item_id }}</td>
                            <td style="text-align:right;">{{ $line->qty }}</td>
                            <td style="text-align:right;">{{ number_format($line->price, 0, '.', ' ') }}</td>
                            <td style="text-align:right;">
                                {{ $line->discount ? number_format($line->discount, 0, '.', ' ') : '—' }}
                            </td>
                            <td style="text-align:right;" class="td-strong">{{ number_format($line->total, 0, '.', ' ') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Payments + totals footer --}}
            <div class="modal-footer">
                <div>
                    <div style="font-size:11px;color:#888;font-weight:500;margin-bottom:6px;">PAYMENT</div>
                    @foreach($selected->payments as $payment)
                    <div style="display:flex;gap:8px;align-items:center;margin-bottom:4px;">
                        <span class="pill pill-info">{{ $payment->type }}</span>
                        <span style="font-size:13px;font-weight:600;">{{ number_format($payment->value, 0, '.', ' ') }}</span>
                    </div>
                    @endforeach
                </div>
                <div style="text-align:right;">
                    <div style="font-size:11px;color:#888;">Sub-total</div>
                    <div style="font-size:13px;">{{ number_format($selected->sub_total, 0, '.', ' ') }}</div>
                    @if($selected->discount)
                    <div style="font-size:11px;color:#888;margin-top:4px;">Discount</div>
                    <div style="font-size:13px;color:#a32d2d;">− {{ number_format($selected->discount, 0, '.', ' ') }}</div>
                    @endif
                    <div style="font-size:11px;color:#888;margin-top:8px;">Total</div>
                    <div style="font-size:20px;font-weight:700;color:#1a1a1a;">{{ number_format($selected->total, 0, '.', ' ') }}</div>
                </div>
            </div>

        </div>
    </div>
    @endif
</div>
