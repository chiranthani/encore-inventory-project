@extends('layouts.app')

@section('title', 'Inventory')

@stack('styles')
<style>
    /* color circle */
    .color-circle {
        display: inline-block;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        margin-right: 6px;
        vertical-align: middle;
    }

    /* table mobile responsive */
    @media (max-width: 768px) {

        table thead {
            display: none;
        }

        table tbody tr {
            display: block;
            margin-bottom: 1rem;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 0.5rem;
        }

        table tbody tr td {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border: none;
        }

        table tbody tr td::before {
            content: attr(data-label);
            font-weight: bold;
            color: #6c757d;
        }

        td img {
            display: block;
            margin: 0 auto;
        }

    }


    /* search bar with icon */
    .search-bar {
        flex: 0 0 250px;
        position: relative;
    }

    .search-bar input {
        padding-left: 32px;
    }

    .search-bar::before {
        content: "\f002";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #7d7d7d;
        font-size: 14px;
    }


    /* --- Pagination styles Overrides --- */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        margin: 20px 0;
    }

    .pagination .page-item {
        list-style: none;
    }

    .pagination .page-link {
        border: none !important;
        padding: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6c757d !important;
        font-weight: 400;
    }

    .pagination .page-link:hover {
        color: #333 !important;
        transform: scale(1.1);
    }

    .pagination .page-item.active .page-link {
        background-color: #fff !important;
        color: #333 !important;
    }

    .pagination .page-item.disabled .page-link {
        opacity: 0.4;
        pointer-events: none;
    }

    .pagination .page-item:first-child .page-link::before {
        content: "\f104";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        font-size: 16px;
        color: #333;
    }

    .pagination .page-item:first-child .page-link {
        font-size: 0;
    }

    .pagination .page-item:last-child .page-link::before {
        content: "\f105";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        font-size: 16px;
        color: #333;
    }

    .pagination .page-item:last-child .page-link {
        font-size: 0;
    }

    /* filter selections */
    .filter-select {
        position: relative;
        display: flex;
        align-items: center;
        border: 1px solid #e1e4e8;
        border-radius: 50px;
        padding: 6px 12px;
        height: 35px;
    }

    .filter-label {
        font-size: 0.8rem;
        color: #7d7d7d;
        white-space: nowrap;
        margin-right: 6px;
        border-right: 1px solid #ccc;
        padding-right: 8px;
    }

    .filter-dropdown {
        border: none !important;
        background: transparent !important;
        color: #333;
        font-weight: 500;
        box-shadow: none !important;
        padding: 0 4px;
        width: auto;
    }

    .dropdown-icon {
        position: absolute;
        right: 16px;
        color: #666;
        font-size: 0.9rem;
        pointer-events: none;
    }


    .filter-select:hover {
        box-shadow: 0 0 4px rgba(0, 123, 255, 0.3);
    }

    .filter-dropdown:focus {
        outline: none !important;
        box-shadow: none !important;
    }
</style>
@section('content')
<div class="container py-4">
    <div class="card border-0 rounded-0 p-3 mb-3">
        <div class="filter-toolbar d-flex align-items-center justify-content-between flex-wrap gap-2">

            <!-- Left Filters -->
            <div class="d-flex align-items-center flex-wrap gap-2 flex-grow-1">

                <div class="filter-select">
                    <label class="filter-label">Number of Product</label>
                    <select class="form-select filter-dropdown">
                        <option value="">All</option>
                    </select>
                    <i class="fa-solid fa-angle-down dropdown-icon"></i>
                </div>


                <div class="filter-select">
                    <label class="filter-label">Total Product</label>
                    <select class="form-select filter-dropdown">
                        <option value="">All</option>

                    </select>
                    <i class="fa-solid fa-angle-down dropdown-icon"></i>
                </div>

            </div>


            <div class="search-bar">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </div>


    </div>

    <div class="card border-0 rounded-0">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center p-3">

            <div class="mb-2 mb-md-0" aria-label="Status filter">
                <button type="button" class="btn btn-light active" data-status="All">All</button>
                <button type="button" class="btn btn-light" data-status="Active">Active</button>
                <button type="button" class="btn btn-light" data-status="Draft">Draft</button>
                <button type="button" class="btn btn-light" data-status="Achieved">Achieved</button>
            </div>

            <div class="d-flex flex-wrap align-items-center gap-2">
                <button class="btn btn-light border rounded-pill px-3">Export</button>
                <button class="btn btn-light border rounded-pill px-3">Import</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-secondary">
                    <tr>
                        <th> <input type="checkbox" class="form-check-input"></th>
                        <th></th>
                        <th>Product</th>
                        <th>Status</th>
                        <th>Inventory</th>
                        <th>Sales Channels</th>
                        <th>Markets</th>
                        <th>Category</th>
                        <th>Vendor</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventory as $item)
                    <tr>
                        <td><input type="checkbox" class="form-check-input"></td>
                        <td class="text-center">
                            <img src="{{ asset('images/dummy_image.jpg') }}" class="img-thumbnail" style="padding:0;width: 60px; height: 60px; object-fit: cover;" alt="Product Image" />
                        </td>
                        <td class="text-center text-md-start text-lg-start text-sm-center">
                            <div class="d-flex flex-column">
                                <span class="fw-semibold text-dark">{{ $item['product'] }}</span>
                                @if (!empty($item['description']))
                                <span class="text-muted small">{{ $item['description'] }}</span>
                                @endif
                            </div>
                        </td>
                        <td data-label="Status">
                            <span class="badge bg-{{ $item['status'] == 'Active' ? 'success' : 'info' }}">
                                {{ $item['status'] }}
                            </span>
                        </td>
                        <td data-label="Inventory">
                            <div class="d-flex flex-column">
                                <div class="fw-semibold text-dark">
                                    {{ $item['inventory'] }} In Stock
                                    @if(count($item['variants']) > 0)
                                    <span class="text-muted">for {{ count($item['variants']) }} variant{{ count($item['variants']) > 1 ? 's' : '' }}</span>
                                    @endif
                                </div>
                                @if (!empty($item['last_update']))
                                <div class="text-muted small mt-1">
                                    Last update:
                                    <span class="fw-bold text-uppercase text-info">
                                        {{ \Carbon\Carbon::parse($item['last_update'])->format('d M y') }}
                                    </span>
                                </div>
                                @endif
                            </div>
                        </td>

                        <td data-label="Sales Channels">{{ $item['sales_channels'] }}</td>
                        <td data-label="Markets">{{ $item['markets'] }}</td>
                        <td data-label="Category">{{ $item['category'] }}</td>
                        <td data-label="Vendor">{{ $item['vendor'] }}</td>
                        <td>
                            @if(count($item['variants']) > 0)
                            <a data-bs-toggle="collapse" href="#variants-{{ $item['id'] }}" role="button" aria-expanded="false" aria-controls="variants-{{ $item['id'] }}">
                                <i class="bi bi-eye text-muted"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @if(count($item['variants']) > 0)
                    <tr class="collapse" id="variants-{{ $item['id'] }}">
                        <td colspan="10" class="p-0">
                            <div class="table-responsive w-100">
                                <table class="table mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th></th>
                                            <th>Variants</th>
                                            <th>Size</th>
                                            <th>Stock</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($item['variants'] as $variant)
                                        <tr>
                                            <td></td>
                                            <td data-label="Color">
                                                <div class="d-flex">
                                                    @php
                                                    $color = strtolower($variant['color']);
                                                    $borderStyle = $color === 'white' ? 'border: 1px solid #ccc;' : '';
                                                    @endphp
                                                    <span class="color-circle" style="background-color: {{ $color }}; {{ $borderStyle }}"></span>
                                                    {{ $variant['color'] }}
                                                </div>
                                            </td>
                                            <td data-label="Size">{{ $variant['size'] }}</td>
                                            <td data-label="Stock">{{ $variant['stock'] }}</td>
                                            <td data-label="Price">{{\App\Constants\AppConstants::DEFAULT_CURRENCY_CODE}}{{ number_format($variant['price'], 2) }}</td>
                                            <td data-label="Discount">
                                                {{ $variant['discount'] }} {{ $variant['discount'] > 0 ? '%' : '' }}
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>

            </table>
            <div class="p-3">
                {{ $inventory->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection