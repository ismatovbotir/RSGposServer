<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Receipt;
use App\Models\ReceiptItem;
use App\Models\ReceiptPayment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $tz        = 'Asia/Tashkent';
        $today     = Carbon::now($tz)->toDateString();
        $yesterday = Carbon::now($tz)->subDay()->toDateString();

        // Revenue & counts
        $todayRevenue     = (float) Receipt::whereDate('receipt_date', $today)->where('status', true)->sum('total');
        $yesterdayRevenue = (float) Receipt::whereDate('receipt_date', $yesterday)->where('status', true)->sum('total');
        $todayCount       = Receipt::whereDate('receipt_date', $today)->where('status', true)->count();
        $yesterdayCount   = Receipt::whereDate('receipt_date', $yesterday)->where('status', true)->count();
        $cancelledToday   = Receipt::whereDate('receipt_date', $today)->where('status', false)->count();

        $revenueDelta = $yesterdayRevenue > 0
            ? round(($todayRevenue - $yesterdayRevenue) / $yesterdayRevenue * 100, 1)
            : null;

        $countDelta = $yesterdayCount > 0
            ? round(($todayCount - $yesterdayCount) / $yesterdayCount * 100, 1)
            : null;

        $avgBasket          = $todayCount > 0 ? $todayRevenue / $todayCount : 0;
        $avgBasketYesterday = $yesterdayCount > 0 ? $yesterdayRevenue / $yesterdayCount : 0;
        $avgBasketDelta     = $avgBasketYesterday > 0
            ? round(($avgBasket - $avgBasketYesterday) / $avgBasketYesterday * 100, 1)
            : null;

        $totalAll         = $todayCount + $cancelledToday;
        $cancellationRate = $totalAll > 0 ? round($cancelledToday / $totalAll * 100, 1) : 0;

        // Payment split (cash / card)
        $paymentSplit = ReceiptPayment::whereHas(
                'receipt', fn($q) => $q->whereDate('receipt_date', $today)->where('status', true)
            )
            ->select('type', DB::raw('SUM(value) as total'))
            ->groupBy('type')
            ->pluck('total', 'type')
            ->map(fn($v) => (float) $v);

        $paymentTotal = $paymentSplit->sum() ?: 1;
        $cashPct      = round($paymentSplit->get('cash', 0) / $paymentTotal * 100);
        $cardPct      = 100 - $cashPct;

        // Hourly revenue (receipt_h stores the hour 0-23)
        $hourlyRaw = Receipt::whereDate('receipt_date', $today)
            ->where('status', true)
            ->whereNotNull('receipt_h')
            ->select('receipt_h', DB::raw('SUM(total) as revenue'), DB::raw('COUNT(*) as cnt'))
            ->groupBy('receipt_h')
            ->get()
            ->keyBy('receipt_h');

        $hourly = collect(range(6, 23))->map(fn($h) => [
            'hour'    => $h,
            'revenue' => (float) ($hourlyRaw->get($h)?->revenue ?? 0),
            'cnt'     => (int)   ($hourlyRaw->get($h)?->cnt ?? 0),
        ]);
        $hourlyMax = $hourly->max('revenue') ?: 1;

        // Top 10 items today by revenue
        $topItems = ReceiptItem::whereHas(
                'receipt', fn($q) => $q->whereDate('receipt_date', $today)->where('status', true)
            )
            ->select('item_id', DB::raw('SUM(total) as revenue'), DB::raw('SUM(qty) as qty_sold'))
            ->groupBy('item_id')
            ->orderByDesc('revenue')
            ->with('item:id,name')
            ->limit(10)
            ->get();

        $topItemsTotal = $topItems->sum('revenue') ?: 1;

        // Last 7 days revenue trend
        $last7 = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date    = Carbon::now($tz)->subDays($i)->toDateString();
            $revenue = (float) Receipt::whereDate('receipt_date', $date)->where('status', true)->sum('total');
            $last7->push([
                'label'   => $i === 0 ? 'Today' : Carbon::parse($date)->format('D'),
                'revenue' => $revenue,
                'today'   => $i === 0,
            ]);
        }
        $last7Max = $last7->max('revenue') ?: 1;

        $currentHour = Carbon::now($tz)->hour;

        return view('admin.dashboard.index', compact(
            'today',
            'todayRevenue', 'yesterdayRevenue', 'revenueDelta',
            'todayCount', 'yesterdayCount', 'countDelta',
            'cancelledToday', 'cancellationRate',
            'avgBasket', 'avgBasketDelta',
            'cashPct', 'cardPct', 'paymentSplit', 'paymentTotal',
            'hourly', 'hourlyMax', 'currentHour',
            'topItems', 'topItemsTotal',
            'last7', 'last7Max'
        ));
    }
}
