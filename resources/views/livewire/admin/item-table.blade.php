<div>
    {{-- Toolbar --}}
    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
        <div style="display:flex;align-items:center;gap:8px;">
            <span style="font-size:12px;color:#888;">Per page:</span>
            <select wire:model.live="perPage" style="padding:4px 8px;border:1px solid #d0d0ce;border-radius:6px;font-size:12px;font-family:inherit;background:#fff;cursor:pointer;">
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <div style="display:flex;align-items:center;gap:10px;">
            @if($this->hasActiveFilters())
            <button wire:click="clearFilters" style="font-size:11px;color:#a32d2d;background:none;border:none;cursor:pointer;padding:0;font-family:inherit;">
                ✕ Clear filters
            </button>
            @endif
            <span style="font-size:12px;color:#888;">{{ $items->total() }} items</span>
        </div>
    </div>

    {{-- Table --}}
    <div class="full-card" style="margin-bottom:0;padding:0;overflow:hidden;">
        <table>
            <thead>
                <tr>
                    {{-- ID — filterable + sortable --}}
                    <th style="width:70px;">
                        <div style="display:flex;align-items:center;gap:4px;">
                            <div class="th-filter {{ $activeFilter === 'id' ? 'th-filter-open' : '' }}"
                                 wire:click="toggleFilter('id')">
                                ID
                                @if($filters['id'])<span class="th-filter-dot"></span>@endif
                            </div>
                            <button class="th-sort {{ $sortColumn === 'id' ? 'th-sort-active' : '' }}"
                                    wire:click.stop="sort('id')" title="Sort by ID">
                                @if($sortColumn === 'id') {{ $sortDirection === 'asc' ? '↑' : '↓' }} @else ↕ @endif
                            </button>
                        </div>
                        @if($activeFilter === 'id')
                        <input type="number"
                               wire:model.live.debounce.400ms="filters.id"
                               wire:click.stop
                               wire:keydown.escape="toggleFilter('id')"
                               class="th-filter-input"
                               placeholder="ID..."
                               autofocus>
                        @endif
                    </th>

                    {{-- Name — filterable + sortable --}}
                    <th>
                        <div style="display:flex;align-items:center;gap:4px;">
                            <div class="th-filter {{ $activeFilter === 'name' ? 'th-filter-open' : '' }}"
                                 wire:click="toggleFilter('name')">
                                Name
                                @if($filters['name'])<span class="th-filter-dot"></span>@endif
                            </div>
                            <button class="th-sort {{ $sortColumn === 'name' ? 'th-sort-active' : '' }}"
                                    wire:click.stop="sort('name')" title="Sort by name">
                                @if($sortColumn === 'name') {{ $sortDirection === 'asc' ? '↑' : '↓' }} @else ↕ @endif
                            </button>
                        </div>
                        @if($activeFilter === 'name')
                        <input type="text"
                               wire:model.live.debounce.400ms="filters.name"
                               wire:click.stop
                               wire:keydown.escape="toggleFilter('name')"
                               class="th-filter-input"
                               placeholder="Search name..."
                               autofocus>
                        @endif
                    </th>

                    {{-- Category — filterable only --}}
                    <th>
                        <div class="th-filter {{ $activeFilter === 'category' ? 'th-filter-open' : '' }}"
                             wire:click="toggleFilter('category')">
                            Category
                            @if($filters['category'])<span class="th-filter-dot"></span>@endif
                        </div>
                        @if($activeFilter === 'category')
                        <input type="text"
                               wire:model.live.debounce.400ms="filters.category"
                               wire:click.stop
                               wire:keydown.escape="toggleFilter('category')"
                               class="th-filter-input"
                               placeholder="Filter category..."
                               autofocus>
                        @endif
                    </th>

                    {{-- Partner — filterable only --}}
                    <th>
                        <div class="th-filter {{ $activeFilter === 'partner' ? 'th-filter-open' : '' }}"
                             wire:click="toggleFilter('partner')">
                            Partner
                            @if($filters['partner'])<span class="th-filter-dot"></span>@endif
                        </div>
                        @if($activeFilter === 'partner')
                        <input type="text"
                               wire:model.live.debounce.400ms="filters.partner"
                               wire:click.stop
                               wire:keydown.escape="toggleFilter('partner')"
                               class="th-filter-input"
                               placeholder="Filter partner..."
                               autofocus>
                        @endif
                    </th>

                    {{-- Sell price — sortable only --}}
                    <th>
                        <div style="display:flex;align-items:center;gap:4px;">
                            <span>Sell price</span>
                            <button class="th-sort {{ $sortColumn === 'sell_price' ? 'th-sort-active' : '' }}"
                                    wire:click="sort('sell_price')" title="Sort by sell price">
                                @if($sortColumn === 'sell_price') {{ $sortDirection === 'asc' ? '↑' : '↓' }} @else ↕ @endif
                            </button>
                        </div>
                    </th>

                    {{-- Barcodes — filterable + sortable --}}
                    <th>
                        <div style="display:flex;align-items:center;gap:4px;">
                            <div class="th-filter {{ $activeFilter === 'barcode' ? 'th-filter-open' : '' }}"
                                 wire:click="toggleFilter('barcode')">
                                Barcodes
                                @if($filters['barcode'])<span class="th-filter-dot"></span>@endif
                            </div>
                            <button class="th-sort {{ $sortColumn === 'barcodes' ? 'th-sort-active' : '' }}"
                                    wire:click.stop="sort('barcodes')" title="Sort by barcode count">
                                @if($sortColumn === 'barcodes') {{ $sortDirection === 'asc' ? '↑' : '↓' }} @else ↕ @endif
                            </button>
                        </div>
                        @if($activeFilter === 'barcode')
                        <input type="text"
                               wire:model.live.debounce.400ms="filters.barcode"
                               wire:click.stop
                               wire:keydown.escape="toggleFilter('barcode')"
                               class="th-filter-input"
                               placeholder="Barcode ID..."
                               autofocus>
                        @endif
                    </th>

                    {{-- Stock — sortable only --}}
                    <th>
                        <div style="display:flex;align-items:center;gap:4px;">
                            <span>Stock</span>
                            <button class="th-sort {{ $sortColumn === 'stock' ? 'th-sort-active' : '' }}"
                                    wire:click="sort('stock')" title="Sort by stock qty">
                                @if($sortColumn === 'stock') {{ $sortDirection === 'asc' ? '↑' : '↓' }} @else ↕ @endif
                            </button>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                <tr class="tr-clickable" wire:click="openItem({{ $item->id }})">
                    <td class="td-muted">{{ $item->id }}</td>
                    <td class="td-strong">{{ $item->name }}</td>
                    <td>{{ $item->category->name ?? '—' }}</td>
                    <td>{{ $item->partner->name ?? '—' }}</td>
                    <td>{{ $item->sellPrice ? number_format($item->sellPrice->value, 0, '.', ' ') : '—' }}</td>
                    <td>{{ $item->barcodes_count }}</td>
                    <td>{{ $item->currentStock->qty ?? '—' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center;padding:32px;color:#aaa;">No items found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div style="margin-top:14px;">
        {{ $items->links() }}
    </div>

    @livewire('admin.item-modal')
</div>
