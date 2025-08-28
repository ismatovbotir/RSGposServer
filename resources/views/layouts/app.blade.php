<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Dashboard | CRM | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="./assets/css/dashlite.css?ver=2.9.1">
    <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=2.9.1">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            @auth
            @include('layouts.sidebar')
            @endauth
            <!-- sidebar @e -->
            <!-- wrap @s -->
           
            <div class="nk-wrap ">
             
            <!-- main header @s -->
                @include('layouts.header')
                <!-- main header @e -->
                <!-- content @s -->
                @section('content')   
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                           
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">CRM Dashboard</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Welcome to CRM Dashboard.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li>
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Last 30 Days</span></a></li>
                                                                        <li><a href="#"><span>Last 6 Months</span></a></li>
                                                                        <li><a href="#"><span>Last 1 Years</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="nk-block-tools-opt"><a href="#" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div>
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-md-6 col-lg-5">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group align-start pb-3 g-2">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">Sales Revenue</h6>
                                                            <p>In last 30 days revenue from subscription.</p>
                                                        </div>
                                                        <div class="card-tools">
                                                            <em class="card-hint icon ni ni-help" data-toggle="tooltip" data-placement="left" title="Customer of this month"></em>
                                                        </div>
                                                    </div>
                                                    <div class="analytic-au">
                                                        <div class="analytic-data-group analytic-au-group g-3">
                                                            <div class="analytic-data analytic-au-data">
                                                                <div class="title">Monthly</div>
                                                                <div class="amount">9.28K</div>
                                                                <div class="change up"><em class="icon ni ni-arrow-long-up"></em>4.63%</div>
                                                            </div>
                                                            <div class="analytic-data analytic-au-data">
                                                                <div class="title">Weekly</div>
                                                                <div class="amount">2.69K</div>
                                                                <div class="change down"><em class="icon ni ni-arrow-long-down"></em>1.92%</div>
                                                            </div>
                                                            <div class="analytic-data analytic-au-data">
                                                                <div class="title">Daily (Avg)</div>
                                                                <div class="amount">0.94K</div>
                                                                <div class="change up"><em class="icon ni ni-arrow-long-up"></em>3.45%</div>
                                                            </div>
                                                        </div>
                                                        <div class="analytic-au-ck">
                                                            <canvas class="analytics-au-chart" id="analyticAuData"></canvas>
                                                        </div>
                                                        <div class="chart-label-group">
                                                            <div class="chart-label">01 Feb, 2021</div>
                                                            <div class="chart-label">30 Feb, 2021</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-6 col-lg-7">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group pb-3 g-2">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">Import & Expense Report Statistics</h6>
                                                            <p>Report Comparison</p>
                                                        </div>
                                                        <div class="card-tools shrink-0 d-none d-sm-block">
                                                            <ul class="nav nav-switch-s2 nav-tabs bg-white">
                                                                <li class="nav-item"><a href="#" class="nav-link">7 D</a></li>
                                                                <li class="nav-item"><a href="#" class="nav-link active">1 M</a></li>
                                                                <li class="nav-item"><a href="#" class="nav-link">3 M</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="analytic-ov">
                                                        <div class="analytic-data-group analytic-ov-group g-3">
                                                            <div class="analytic-data analytic-ov-data">
                                                                <div class="title">Yearly</div>
                                                                <div class="amount">2.57K</div>
                                                                <div class="change up"><em class="icon ni ni-arrow-long-up"></em>12.37%</div>
                                                            </div>
                                                            <div class="analytic-data analytic-ov-data">
                                                                <div class="title">Monothly</div>
                                                                <div class="amount">3.98K</div>
                                                                <div class="change up"><em class="icon ni ni-arrow-long-up"></em>47.74%</div>
                                                            </div>
                                                            <div class="analytic-data analytic-ov-data">
                                                                <div class="title">Weekly</div>
                                                                <div class="amount">28.49%</div>
                                                                <div class="change down"><em class="icon ni ni-arrow-long-down"></em>12.37%</div>
                                                            </div>
                                                            <div class="analytic-data analytic-ov-data">
                                                                <div class="title">Daily</div>
                                                                <div class="amount">5.95%</div>
                                                                <div class="change up"><em class="icon ni ni-arrow-long-up"></em>9.35%</div>
                                                            </div>
                                                        </div>
                                                        <div class="analytic-ov-ck">
                                                            <canvas class="analytics-line-large" id="analyticOvData"></canvas>
                                                        </div>
                                                        <div class="chart-label-group ml-5">
                                                            <div class="chart-label">01 Jan, 2021</div>
                                                            <div class="chart-label d-none d-sm-block">15 Jan, 2021</div>
                                                            <div class="chart-label">30 Jan, 2021</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-7 col-xxl-4">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner mb-n2">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">Lead</h6>
                                                            <p>Lead Statictics</p>
                                                        </div>
                                                        <div class="card-tools">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-toggle="dropdown">30 Days</a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>7 Days</span></a></li>
                                                                        <li><a href="#"><span>15 Days</span></a></li>
                                                                        <li><a href="#"><span>30 Days</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-list is-loose traffic-channel-table">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col"><span>Duration</span></div>
                                                        <div class="nk-tb-col"><span>Count</span></div>
                                                        <div class="nk-tb-col"><span>Prev Count</span></div>
                                                        <div class="nk-tb-col"><span>Change</span></div>
                                                        <div class="nk-tb-col tb-col-sm text-right"><span>Statistics</span></div>
                                                    </div><!-- .nk-tb-head -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">Yearly</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"><span>4,305</span></span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"><span>4,129</span></span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span>4.29%</span> <span class="change up"><em class="icon ni ni-arrow-long-up"></em></span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <div class="traffic-channel-ck ml-auto">
                                                                <canvas class="analytics-line-small" id="OrganicSearchData"></canvas>
                                                            </div>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">Monthly</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"><span>859</span></span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"><span>936</span></span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span>15.8%</span> <span class="change down"><em class="icon ni ni-arrow-long-down"></em></span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <div class="traffic-channel-ck ml-auto">
                                                                <canvas class="analytics-line-small" id="SocialMediaData"></canvas>
                                                            </div>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">Weekly</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"><span>482</span></span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"><span>793</span></span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span>41.3%</span> <span class="change down"><em class="icon ni ni-arrow-long-down"></em></span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <div class="traffic-channel-ck ml-auto">
                                                                <canvas class="analytics-line-small" id="ReferralsData"></canvas>
                                                            </div>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                    <div class="nk-tb-item">
                                                        <div class="nk-tb-col">
                                                            <span class="tb-lead">Daily</span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"><span>138</span></span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub tb-amount"><span>97</span></span>
                                                        </div>
                                                        <div class="nk-tb-col">
                                                            <span class="tb-sub"><span>12.6%</span> <span class="change up"><em class="icon ni ni-arrow-long-up"></em></span></span>
                                                        </div>
                                                        <div class="nk-tb-col text-right">
                                                            <div class="traffic-channel-ck ml-auto">
                                                                <canvas class="analytics-line-small" id="OthersData"></canvas>
                                                            </div>
                                                        </div>
                                                    </div><!-- .nk-tb-item -->
                                                </div><!-- .nk-tb-list -->
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-5">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner-group">
                                                    <div class="card-inner">
                                                        <div class="card-title-group">
                                                            <div class="card-title">
                                                                <h6 class="title">Recent Sale</h6>
                                                            </div>
                                                            <div class="card-tools">
                                                                <a href="html/crm/recent-sale.html" class="link">View All</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner p-0">
                                                        <table class="nk-tb-list nk-tb-ulist">
                                                            <thead>
                                                                <tr class="nk-tb-item nk-tb-head">
                                                                    <th class="nk-tb-col"><span class="sub-text">ID</span></th>
                                                                    <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                                                    <th class="nk-tb-col"><span class="sub-text">Price</span></th>
                                                                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></th>
                                                                    <th class="nk-tb-col nk-tb-col-tools text-right">
                                                                        <div class="dropdown">
                                                                            <a href="#" class="btn btn-xs btn-trigger btn-icon dropdown-toggle mr-n1" data-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-more-h"></em></a>
                                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                                <ul class="link-list-opt no-bdr">
                                                                                    <li><a href="#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a></li>
                                                                                    <li><a href="#"><em class="icon ni ni-archive"></em><span>Mark As Archive</span></a></li>
                                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Tasks</span></a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                </tr><!-- .nk-tb-item -->
                                                            </thead>
                                                            <tbody>
                                                                <tr class="nk-tb-item">
                                                                    <td class="nk-tb-col">
                                                                        <span>P-78</span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>Mackbook<span class="dot dot-success d-lg-none ml-1"></span></span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>$999.00</span>
                                                                    </td>
                                                                    <td class="nk-tb-col tb-col-lg">
                                                                        <span class="badge badge-dot badge-dot-xs badge-success">Available</span>
                                                                    </td>
                                                                    <td class="nk-tb-col nk-tb-col-tools">
                                                                        <ul class="nk-tb-actions">
                                                                            <li>
                                                                                <div class="dropdown">
                                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                                        <ul class="link-list-opt no-bdr">
                                                                                            <li><a href="#" data-toggle="modal" data-target="#editDataDash"><em class="icon ni ni-edit"></em><span>Edit Info</span></a></li>
                                                                                            <li><a href="#" data-toggle="modal" data-target="#deleteData"><em class="icon ni ni-trash"></em><span>Trash</span></a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr><!-- .nk-tb-item -->
                                                                <tr class="nk-tb-item">
                                                                    <td class="nk-tb-col">
                                                                        <span>P-56</span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>iPhone<span class="dot dot-danger d-lg-none ml-1"></span></span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>$700.00</span>
                                                                    </td>
                                                                    <td class="nk-tb-col tb-col-lg">
                                                                        <span class="badge badge-dot badge-dot-xs badge-danger">Out of Stock</span>
                                                                    </td>
                                                                    <td class="nk-tb-col nk-tb-col-tools">
                                                                        <ul class="nk-tb-actions">
                                                                            <li>
                                                                                <div class="dropdown">
                                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                                        <ul class="link-list-opt no-bdr">
                                                                                            <li><a href="#" data-toggle="modal" data-target="#editDataDash"><em class="icon ni ni-edit"></em><span>Edit Info</span></a></li>
                                                                                            <li><a href="#" data-toggle="modal" data-target="#deleteData"><em class="icon ni ni-trash"></em><span>Trash</span></a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr><!-- .nk-tb-item -->
                                                                <tr class="nk-tb-item">
                                                                    <td class="nk-tb-col">
                                                                        <span>P-68</span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>Watch<span class="dot dot-success d-lg-none ml-1"></span></span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>$260.00</span>
                                                                    </td>
                                                                    <td class="nk-tb-col tb-col-lg">
                                                                        <span class="badge badge-dot badge-dot-xs badge-success">Available</span>
                                                                    </td>
                                                                    <td class="nk-tb-col nk-tb-col-tools">
                                                                        <ul class="nk-tb-actions">
                                                                            <li>
                                                                                <div class="dropdown">
                                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                                        <ul class="link-list-opt no-bdr">
                                                                                            <li><a href="#" data-toggle="modal" data-target="#editDataDash"><em class="icon ni ni-edit"></em><span>Edit Info</span></a></li>
                                                                                            <li><a href="#" data-toggle="modal" data-target="#deleteData"><em class="icon ni ni-trash"></em><span>Trash</span></a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr><!-- .nk-tb-item -->
                                                                <tr class="nk-tb-item">
                                                                    <td class="nk-tb-col">
                                                                        <span>P-56</span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>Earbuds<span class="dot dot-warning d-lg-none ml-1"></span></span>
                                                                    </td>
                                                                    <td class="nk-tb-col">
                                                                        <span>$180.00</span>
                                                                    </td>
                                                                    <td class="nk-tb-col tb-col-lg">
                                                                        <span class="badge badge-dot badge-dot-xs badge-warning">Low Stock</span>
                                                                    </td>
                                                                    <td class="nk-tb-col nk-tb-col-tools">
                                                                        <ul class="nk-tb-actions">
                                                                            <li>
                                                                                <div class="dropdown">
                                                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                                        <ul class="link-list-opt no-bdr">
                                                                                            <li><a href="#" data-toggle="modal" data-target="#editDataDash"><em class="icon ni ni-edit"></em><span>Edit Info</span></a></li>
                                                                                            <li><a href="#" data-toggle="modal" data-target="#deleteData"><em class="icon ni ni-trash"></em><span>Trash</span></a></li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr><!-- .nk-tb-item -->
                                                            </tbody>
                                                        </table><!-- .nk-tb-list -->
                                                    </div><!-- .card-inner -->
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-5 col-sm-6 col-xxl-3">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group mb-5">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">Client Payment Status</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-toggle="dropdown">30 Days</a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>7 Days</span></a></li>
                                                                        <li><a href="#"><span>15 Days</span></a></li>
                                                                        <li><a href="#"><span>30 Days</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="payment-status">
                                                        <div class="nk-ck-md">
                                                            <canvas class="polar-chart" id="polarChartData"></canvas>
                                                        </div>
                                                        <ul class="traffic-channel-group mt-3 pl-4">
                                                            <li class="m-1">
                                                                <div class="title">
                                                                    <span class="dot dot-lg sq" data-bg="#9cabff"></span>
                                                                    <span>Started</span>
                                                                </div>
                                                            </li>
                                                            <li class="m-1">
                                                                <div class="title">
                                                                    <span class="dot dot-lg sq" data-bg="#f4aaa4"></span>
                                                                    <span>Inprogress</span>
                                                                </div>
                                                            </li>
                                                            <li class="m-1">
                                                                <div class="title">
                                                                    <span class="dot dot-lg sq" data-bg="#9785FF"></span>
                                                                    <span>Completed</span>
                                                                </div>
                                                            </li>
                                                            <li class="m-1">
                                                                <div class="title">
                                                                    <span class="dot dot-lg sq" data-bg="#E85347"></span>
                                                                    <span>Cencel</span>
                                                                </div>
                                                            </li>
                                                            <li class="m-1">
                                                                <div class="title">
                                                                    <span class="dot dot-lg sq" data-bg="#8feac5"></span>
                                                                    <span>Success</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                        <div class="col-md-7 col-sm-6 col-xxl-4">
                                            <div class="card card-bordered card-full">
                                                <div class="card-inner d-flex flex-column h-100">
                                                    <div class="card-title-group mb-3">
                                                        <div class="card-title">
                                                            <h6 class="title">Running Projects</h6>
                                                            <p>In last 30 days top projects.</p>
                                                        </div>
                                                        <div class="card-tools mt-n4 mr-n1">
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>15 Days</span></a></li>
                                                                        <li><a href="#" class="active"><span>30 Days</span></a></li>
                                                                        <li><a href="#"><span>3 Months</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="progress-list gy-3">
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">IT Solution</div>
                                                                <div class="progress-amount">78%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar" data-progress="78"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Internet configuration</div>
                                                                <div class="progress-amount">48.49%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-orange" data-progress="48.49"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Database Management</div>
                                                                <div class="progress-amount">29%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-teal" data-progress="29"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Design tool</div>
                                                                <div class="progress-amount">56%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-pink" data-progress="56"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">Banner completation</div>
                                                                <div class="progress-amount">33%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-azure" data-progress="33"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-wrap">
                                                            <div class="progress-text">
                                                                <div class="progress-label">SEO Marketing</div>
                                                                <div class="progress-amount">65%</div>
                                                            </div>
                                                            <div class="progress progress-md">
                                                                <div class="progress-bar bg-info" data-progress="65"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-md-6 col-xxl-5">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner border-bottom">
                                                    <div class="card-title-group">
                                                        <div class="card-title">
                                                            <h6 class="title">Support Requests</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <a href="#" class="link">All Requests</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="nk-support">
                                                    <li class="nk-support-item">
                                                        <div class="user-avatar">
                                                            <img src="./images/avatar/a-sm.jpg" alt="">
                                                        </div>
                                                        <div class="nk-support-content">
                                                            <div class="title">
                                                                <span>Vincent Lopez</span>
                                                                <div class="status delivered">
                                                                    <em class="icon ni ni-check-circle-fill"></em>
                                                                </div>
                                                            </div>
                                                            <p>Thanks for contact us with your issues...</p>
                                                            <span class="time">6 min ago</span>
                                                        </div>
                                                    </li>
                                                    <li class="nk-support-item">
                                                        <div class="user-avatar bg-purple-dim">
                                                            <span>DM</span>
                                                        </div>
                                                        <div class="nk-support-content ">
                                                            <div class="title">
                                                                <span>Daniel Moore</span>
                                                                <div class="status unread">
                                                                    <em class="icon ni ni-bullet-fill"></em>
                                                                </div>
                                                            </div>
                                                            <p>Thanks for contact us with your issues...</p>
                                                            <span class="time">2 Hours ago</span>
                                                        </div>
                                                    </li>
                                                    <li class="nk-support-item">
                                                        <div class="user-avatar">
                                                            <img src="./images/avatar/b-sm.jpg" alt="">
                                                        </div>
                                                        <div class="nk-support-content">
                                                            <div class="title">
                                                                <span>Larry Henry</span>
                                                                <div class="status sent">
                                                                    <em class="icon ni ni-check-circle"></em>
                                                                </div>
                                                            </div>
                                                            <p>Thanks for contact us with your issues...</p>
                                                            <span class="time">3 Hours ago</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-md-6 col-xxl-3">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-title-group">
                                                        <div class="card-title card-title-sm">
                                                            <h6 class="title">Traffic Channel</h6>
                                                        </div>
                                                        <div class="card-tools">
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-toggle="dropdown">30 Days</a>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>7 Days</span></a></li>
                                                                        <li><a href="#"><span>15 Days</span></a></li>
                                                                        <li><a href="#"><span>30 Days</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="traffic-channel">
                                                        <div class="traffic-channel-doughnut-ck">
                                                            <canvas class="analytics-doughnut" id="TrafficChannelDoughnutData"></canvas>
                                                        </div>
                                                        <div class="traffic-channel-group g-2">
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#9cabff"></span><span>Organic Search</span></div>
                                                                <div class="amount">4,305 <small>58.63%</small></div>
                                                            </div>
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#b8acff"></span><span>Social Media</span></div>
                                                                <div class="amount">859 <small>23.94%</small></div>
                                                            </div>
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#ffa9ce"></span><span>Referrals</span></div>
                                                                <div class="amount">482 <small>12.94%</small></div>
                                                            </div>
                                                            <div class="traffic-channel-data">
                                                                <div class="title"><span class="dot dot-lg sq" data-bg="#f9db7b"></span><span>Others</span></div>
                                                                <div class="amount">138 <small>4.49%</small></div>
                                                            </div>
                                                        </div><!-- .traffic-channel-group -->
                                                    </div><!-- .traffic-channel -->
                                                </div>
                                            </div><!-- .card -->
                                        </div><!-- .col -->
                                    </div><!-- .row -->
                                </div><!-- .nk-block -->
                            </div>
                        
                        </div>
                    </div>
                </div>
                @show
                <!-- content @e -->
                <!-- footer @s -->
                @include('layouts.footer')
                <!-- footer @e -->
              @show    
            </div>
            
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- select region modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="region">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <h5 class="title mb-4">Select Your Country</h5>
                    <div class="nk-country-region">
                        <ul class="country-list text-center gy-2">
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/arg.png" alt="" class="country-flag">
                                    <span class="country-name">Argentina</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/aus.png" alt="" class="country-flag">
                                    <span class="country-name">Australia</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/bangladesh.png" alt="" class="country-flag">
                                    <span class="country-name">Bangladesh</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/canada.png" alt="" class="country-flag">
                                    <span class="country-name">Canada <small>(English)</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">Centrafricaine</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/china.png" alt="" class="country-flag">
                                    <span class="country-name">China</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/french.png" alt="" class="country-flag">
                                    <span class="country-name">France</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/germany.png" alt="" class="country-flag">
                                    <span class="country-name">Germany</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/iran.png" alt="" class="country-flag">
                                    <span class="country-name">Iran</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/italy.png" alt="" class="country-flag">
                                    <span class="country-name">Italy</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/mexico.png" alt="" class="country-flag">
                                    <span class="country-name">México</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/philipine.png" alt="" class="country-flag">
                                    <span class="country-name">Philippines</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/portugal.png" alt="" class="country-flag">
                                    <span class="country-name">Portugal</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/s-africa.png" alt="" class="country-flag">
                                    <span class="country-name">South Africa</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/spanish.png" alt="" class="country-flag">
                                    <span class="country-name">Spain</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/switzerland.png" alt="" class="country-flag">
                                    <span class="country-name">Switzerland</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/uk.png" alt="" class="country-flag">
                                    <span class="country-name">United Kingdom</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="country-item">
                                    <img src="./images/flags/english.png" alt="" class="country-flag">
                                    <span class="country-name">United State</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div><!-- .modal -->
    <!-- Department -->
    <div class="modal fade" id="addData">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Add Employee</h5>
                    <form action="#" class="mt-2">
                        <div class="row g-gs">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name"> Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" placeholder="Abu Bin Istiak">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="email"> Email</label>
                                    <div class="form-control-wrap">
                                        <input type="email" class="form-control" id="email" placeholder="info@softnio.com">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Department</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select">
                                            <option value="default_option">Select Department</option>
                                            <option value="bangladesh">Information Technology</option>
                                            <option value="canada">Finance</option>
                                            <option value="england">Marketing</option>
                                            <option value="pakistan">Human Resource</option>
                                            <option value="usa">Graphics</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="code">Designation</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="code" placeholder="Software developer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Phone</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="phone" placeholder="+124 394-1787">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Address(Lane)</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select">
                                            <option value="default_option">Select Address</option>
                                            <option value="dhaka">House 165, Lane No 3, Mohakhali DOHS,Dhaka</option>
                                            <option value="london">199 Bishopsgate, London</option>
                                            <option value="mumbai">Narottam Morarji Marg, Mumbai</option>
                                            <option value="kualalampur">Ipoh, Johor Bahru, Kualalampur</option>
                                            <option value="spain">Gran Vía, Madrid.</option>
                                            <option value="usa">182/A Y-ra, Boston</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Varified</label>
                                    <div class="form-control-wrap">
                                        <ul class="custom-control-group g-3 align-center flex-wrap">
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="Check1">
                                                    <label class="custom-control-label" for="Check1">Email</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="Check2">
                                                    <label class="custom-control-label" for="Check2">KYC</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button data-dismiss="modal" type="submit" class="btn btn-primary">Add Employee</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .Edit Modal-Content -->
    <div class="modal fade" id="editData">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Edit Employee</h5>
                    <form action="#" class="mt-2">
                        <div class="row g-gs">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-name"> Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="edit-name" value="Abu Bin Istiak">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-email"> Email</label>
                                    <div class="form-control-wrap">
                                        <input type="email" class="form-control" id="edit-email" value="info@softnio.com">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="dept">Department</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="dept">
                                            <option value="default_option">Select Department</option>
                                            <option value="bangladesh">Information Technology</option>
                                            <option value="canada">Finance</option>
                                            <option value="england">Marketing</option>
                                            <option value="pakistan">Human Resource</option>
                                            <option value="usa">Graphics</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-code">Designation</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="edit-code" value="Software developer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="edit-phone">Phone</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="edit-phone" value="+124 394-1787">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Address(Lane)</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select">
                                            <option value="default_option">Select Address</option>
                                            <option value="dhaka">House 165, Lane No 3, Mohakhali DOHS,Dhaka</option>
                                            <option value="london">199 Bishopsgate, London</option>
                                            <option value="mumbai">Narottam Morarji Marg, Mumbai</option>
                                            <option value="kualalampur">Ipoh, Johor Bahru, Kualalampur</option>
                                            <option value="spain">Gran Vía, Madrid.</option>
                                            <option value="usa">182/A Y-ra, Boston</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Varified</label>
                                    <div class="form-control-wrap">
                                        <ul class="custom-control-group g-3 align-center flex-wrap">
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Email</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">KYC</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button data-dismiss="modal" type="submit" class="btn btn-primary">Update Employee</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .Edit Modal-Content -->
    <div class="modal fade" id="deleteData">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                <div class="modal-body modal-body-sm text-center">
                    <div class="nk-modal py-4">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                        <h4 class="nk-modal-title">Are You Sure ?</h4>
                        <div class="nk-modal-text mt-n2">
                            <p class="text-soft">This item will be removed permanently.</p>
                        </div>
                        <ul class="d-flex justify-content-center gx-4 mt-4">
                            <li>
                                <button data-dismiss="modal" id="deleteEvent" class="btn btn-success">Yes, Delete it</button>
                            </li>
                            <li>
                                <button data-dismiss="modal" data-toggle="modal" data-target="#editEventPopup" class="btn btn-danger btn-dim">Cancel</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .Delete Modal-content -->
    <!-- Dashboard -->
    <div class="modal fade" id="editDataDash">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Edit Information</h5>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                            <label class="form-label" for="dept-name">Dept. Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="dept-name" value="Finance">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="author-name">Author Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="author-name" value="Abu Bin Istiak">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="designtn">Designation</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="designtn" value="Admin">
                            </div>
                        </div>
                        <div class="form-group">
                            <button data-dismiss="modal" type="submit" class="btn btn-primary">Save Informations</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .Edit Modal-Content -->
    <!-- JavaScript -->
    <script src="./assets/js/bundle.js?ver=2.9.1"></script>
    <script src="./assets/js/scripts.js?ver=2.9.1"></script>
    <script src="./assets/js/charts/chart-crm.js?ver=2.9.1"></script>
</body>

</html>