<div>
@if($show && $item)
<div class="modal-overlay" wire:click.self="close">
    <div class="modal-box" style="max-width:580px;">

        {{-- Header --}}
        <div class="modal-header">
            <div>
                <div class="modal-title">{{ $item->name }}</div>
                <div style="font-size:12px;color:#888;margin-top:2px;">
                    #{{ $item->id }}
                    @if($item->mark)
                    · <span>{{ $item->mark }}</span>
                    @endif
                </div>
            </div>
            <button class="modal-close" wire:click="close" title="Close">✕</button>
        </div>

        {{-- Tabs --}}
        <div style="display:flex;margin-bottom:20px;border-bottom:2px solid #e8e8e6;">
            @foreach([['main','Main'],['prices','Prices'],['stock','Stock'],['barcodes','Barcodes']] as [$tab,$label])
            <button wire:click="setTab('{{ $tab }}')" class="modal-tab {{ $activeTab === $tab ? 'active' : '' }}">
                {{ $label }}
            </button>
            @endforeach
        </div>

        {{-- ── MAIN TAB ── --}}
        @if($activeTab === 'main')
        <div class="detail-list">
            <div class="detail-row">
                <span class="detail-key">Name</span>
                <span class="detail-val">{{ $item->name }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Mark / Brand</span>
                <span class="detail-val">{{ $item->mark ?: '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Unit</span>
                <span class="detail-val">{{ $item->unit }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Category</span>
                <span class="detail-val">{{ $item->category->name ?? '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Partner</span>
                <span class="detail-val">{{ $item->partner->name ?? '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Class code (MXIK)</span>
                <span class="detail-val td-mono">{{ $item->class_code ?: '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Package code</span>
                <span class="detail-val">{{ $item->package_code ?: '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Asl belgi</span>
                <span class="detail-val">
                    @if($item->aslbelgi)
                    <span class="pill pill-ok">Yes</span>
                    @else
                    <span style="color:#aaa;">No</span>
                    @endif
                </span>
            </div>
        </div>
        @endif

        {{-- ── PRICES TAB ── --}}
        @if($activeTab === 'prices')
        @if($item->prices->isEmpty())
        <p style="color:#aaa;font-size:13px;text-align:center;padding:32px 0;">No prices defined.</p>
        @else
        <table>
            <thead>
                <tr>
                    <th>Price type</th>
                    <th style="text-align:right;">Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach($item->prices as $pd)
                <tr>
                    <td>
                        {{ $pd->price->name ?? '#'.$pd->price_id }}
                        @if($pd->price_id == 2)
                        <span class="pill pill-ok" style="margin-left:6px;">Sell</span>
                        @endif
                    </td>
                    <td style="text-align:right;font-weight:600;">
                        {{ number_format($pd->value, 2, '.', ' ') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        @endif

        {{-- ── STOCK TAB ── --}}
        @if($activeTab === 'stock')
        @if(!$item->currentStock)
        <p style="color:#aaa;font-size:13px;text-align:center;padding:32px 0;">
            No stock record for shop #{{ env('SHOP', 1) }}.
        </p>
        @else
        @php $stock = $item->currentStock; @endphp
        <div class="kpi-grid" style="grid-template-columns:repeat(3,1fr);margin-bottom:20px;">
            <div class="kpi-card">
                <div class="kpi-label">Quantity</div>
                <div class="kpi-value {{ $stock->qty > 0 ? 'kpi-good' : 'kpi-bad' }}">
                    {{ number_format($stock->qty, 3) }}
                </div>
            </div>
            <div class="kpi-card">
                <div class="kpi-label">Cost price</div>
                <div class="kpi-value">{{ number_format($stock->cost, 2, '.', ' ') }}</div>
            </div>
            <div class="kpi-card">
                <div class="kpi-label">Last date</div>
                <div class="kpi-value" style="font-size:14px;">{{ $stock->stock_date }}</div>
            </div>
        </div>
        <div class="detail-list">
            <div class="detail-row">
                <span class="detail-key">Shop</span>
                <span class="detail-val">#{{ env('SHOP', 1) }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Total value</span>
                <span class="detail-val">{{ number_format($stock->qty * $stock->cost, 2, '.', ' ') }}</span>
            </div>
        </div>
        @endif
        @endif

        {{-- ── BARCODES TAB ── --}}
        @if($activeTab === 'barcodes')
        @if($item->barcodes->isEmpty())
        <p style="color:#aaa;font-size:13px;text-align:center;padding:32px 0;">No barcodes.</p>
        @else
        <table>
            <thead>
                <tr>
                    <th>Barcode</th>
                    <th style="width:80px;">Qty</th>
                    <th style="width:80px;text-align:center;">Active</th>
                </tr>
            </thead>
            <tbody>
                @foreach($item->barcodes as $b)
                <tr>
                    <td class="td-mono">{{ $b->id }}</td>
                    <td>{{ $b->qty }}</td>
                    <td style="text-align:center;">
                        @if($b->active)
                        <span class="pill pill-ok">Yes</span>
                        @else
                        <span class="pill pill-danger">No</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        @endif

    </div>
</div>
@endif
</div>
