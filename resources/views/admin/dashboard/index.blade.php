@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')

<div class="page-header">
    <h1 class="page-title">Dashboard</h1>
    <span class="td-muted" style="font-size:12px;">{{ \Carbon\Carbon::parse($today)->format('d M Y, l') }}</span>
</div>

{{-- KPI row --}}
<div class="kpi-grid" style="margin-bottom:16px;">

    <div class="kpi-card">
        <div class="kpi-label">Revenue today</div>
        <div class="kpi-value">{{ number_format($todayRevenue, 0, '.', ' ') }}</div>
        <div class="kpi-sub">
            @if($revenueDelta !== null)
                <span class="{{ $revenueDelta >= 0 ? 'kpi-good' : 'kpi-bad' }}">
                    {{ $revenueDelta >= 0 ? '▲' : '▼' }} {{ abs($revenueDelta) }}% vs yesterday
                </span>
            @else
                <span class="td-muted">no data yesterday</span>
            @endif
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-label">Receipts today</div>
        <div class="kpi-value">{{ number_format($todayCount) }}</div>
        <div class="kpi-sub">
            @if($countDelta !== null)
                <span class="{{ $countDelta >= 0 ? 'kpi-good' : 'kpi-bad' }}">
                    {{ $countDelta >= 0 ? '▲' : '▼' }} {{ abs($countDelta) }}% vs yesterday
                </span>
                @if($cancelledToday > 0)
                    &nbsp;·&nbsp;<span class="kpi-bad">{{ $cancelledToday }} cancelled</span>
                @endif
            @elseif($cancelledToday > 0)
                <span class="kpi-bad">{{ $cancelledToday }} cancelled</span>
            @else
                <span class="td-muted">—</span>
            @endif
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-label">Avg basket</div>
        <div class="kpi-value">{{ number_format($avgBasket, 0, '.', ' ') }}</div>
        <div class="kpi-sub">
            @if($avgBasketDelta !== null)
                <span class="{{ $avgBasketDelta >= 0 ? 'kpi-good' : 'kpi-bad' }}">
                    {{ $avgBasketDelta >= 0 ? '▲' : '▼' }} {{ abs($avgBasketDelta) }}% vs yesterday
                </span>
            @else
                <span class="td-muted">—</span>
            @endif
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-label">Cash / Card</div>
        <div class="kpi-value" style="font-size:18px;">{{ $cashPct }}% · {{ $cardPct }}%</div>
        <div style="margin-top:8px;height:5px;border-radius:3px;background:#e0e8f0;overflow:hidden;">
            <div style="height:100%;width:{{ $cashPct }}%;background:#378add;border-radius:3px;"></div>
        </div>
        <div style="display:flex;justify-content:space-between;font-size:10px;color:#aaa;margin-top:3px;">
            <span>cash {{ number_format($paymentSplit->get('cash', 0), 0, '.', ' ') }}</span>
            <span>card {{ number_format($paymentSplit->get('card', 0), 0, '.', ' ') }}</span>
        </div>
    </div>

</div>

{{-- Hourly revenue chart --}}
<div class="full-card" style="margin-bottom:14px;padding:16px 20px 12px;">
    <div style="font-size:11px;color:#888;font-weight:500;margin-bottom:10px;">REVENUE BY HOUR — TODAY</div>
    <div class="mini-chart" style="height:80px;">
        @foreach($hourly as $h)
        <div class="chart-col {{ $h['hour'] === $currentHour ? 'highlight' : '' }}"
             style="height:{{ $hourlyMax > 0 ? max(2, round($h['revenue'] / $hourlyMax * 100)) : 2 }}%;
                    {{ $h['cnt'] === 0 ? 'opacity:0.3;' : '' }}"
             title="{{ sprintf('%02d:00', $h['hour']) }} — {{ number_format($h['revenue'], 0, '.', ' ') }} ({{ $h['cnt'] }} receipts)">
        </div>
        @endforeach
    </div>
    <div class="chart-labels">
        @foreach($hourly as $h)
        <span>{{ sprintf('%02d', $h['hour']) }}</span>
        @endforeach
    </div>
</div>

{{-- Bottom: Top 10 items + right panel --}}
<div class="row-2-1" style="align-items:flex-start;">

    {{-- Top 10 items --}}
    <div class="full-card" style="margin-bottom:0;padding:0;overflow:hidden;">
        <div style="padding:14px 16px 8px;font-size:11px;color:#888;font-weight:500;">TOP 10 ITEMS BY REVENUE — TODAY</div>
        <table>
            <thead>
                <tr>
                    <th style="width:28px;">#</th>
                    <th>Item</th>
                    <th style="text-align:right;">Qty sold</th>
                    <th style="text-align:right;">Revenue</th>
                    <th style="text-align:right;">Share</th>
                </tr>
            </thead>
            <tbody>
                @forelse($topItems as $i => $line)
                <tr>
                    <td class="td-muted">{{ $i + 1 }}</td>
                    <td class="td-strong">{{ $line->item->name ?? 'Item #'.$line->item_id }}</td>
                    <td style="text-align:right;">{{ number_format($line->qty_sold, 0) }}</td>
                    <td style="text-align:right;">{{ number_format($line->revenue, 0, '.', ' ') }}</td>
                    <td style="text-align:right;" class="td-muted">
                        {{ round($line->revenue / $topItemsTotal * 100) }}%
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;color:#aaa;padding:32px;">No sales recorded today yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Right panel --}}
    <div style="display:flex;flex-direction:column;gap:14px;">

        {{-- 7-day trend --}}
        <div class="full-card" style="padding:16px;">
            <div style="font-size:11px;color:#888;font-weight:500;margin-bottom:10px;">7-DAY REVENUE TREND</div>
            <div class="mini-chart" style="height:60px;">
                @foreach($last7 as $day)
                <div class="chart-col {{ $day['today'] ? 'highlight' : '' }}"
                     style="height:{{ $last7Max > 0 ? max(2, round($day['revenue'] / $last7Max * 100)) : 2 }}%;"
                     title="{{ $day['label'] }}: {{ number_format($day['revenue'], 0, '.', ' ') }}">
                </div>
                @endforeach
            </div>
            <div class="chart-labels">
                @foreach($last7 as $day)<span>{{ $day['label'] }}</span>@endforeach
            </div>
            <div style="margin-top:10px;font-size:11px;color:#888;">
                7-day total:
                <span style="font-weight:600;color:#1a1a1a;">
                    {{ number_format($last7->sum('revenue'), 0, '.', ' ') }}
                </span>
            </div>
        </div>

        {{-- Today at a glance --}}
        <div class="full-card" style="padding:16px;">
            <div style="font-size:11px;color:#888;font-weight:500;margin-bottom:10px;">TODAY AT A GLANCE</div>
            <div class="detail-list">
                <div class="detail-row">
                    <span class="detail-key">Cancellation rate</span>
                    <span style="font-weight:600;color:{{ $cancellationRate > 5 ? '#a32d2d' : '#3b6d11' }};">
                        {{ $cancellationRate }}%
                    </span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Cancelled receipts</span>
                    <span>{{ $cancelledToday }}</span>
                </div>
                <div class="detail-row" style="margin-top:6px;">
                    <span class="detail-key">Yesterday revenue</span>
                    <span>{{ number_format($yesterdayRevenue, 0, '.', ' ') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Yesterday receipts</span>
                    <span>{{ $yesterdayCount }}</span>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
