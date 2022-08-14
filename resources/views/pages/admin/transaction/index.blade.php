@extends('layouts.admin')

@section('title')
    Transaction
@endsection

@section('stylesheet')
    <style>
        .bg-header-custom {
            background:
                linear-gradient(rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.5)),
                url('https://dm.fujiyantov.id/storage/assets/villages/images/1657983079.jpeg');
            /* height: 100%; */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endsection

@section('container')
    <main>
        <header class="page-header page-header-dark pb-10 bg-header-custom">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i data-feather="file-text"></i>
                                </div>
                                Transaction
                            </h1>
                            <div class="page-header-subtitle">List Transactions</div>
                        </div>
                    </div>
                    <nav class="mt-4 rounded" aria-label="breadcrumb">
                        <ol class="breadcrumb px-3 py-2 rounded mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Transaction</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-header-actions mb-4">
                        <div class="card-header">
                            List Transaction
                        </div>
                        <div class="card-body">
                            {{-- Alert --}}
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            {{-- List Data --}}
                            <table class="table table-striped table-hover table-sm" id="crudTable">
                                <thead>
                                    <tr>
                                        <th width="10">No.</th>
                                        {{-- <th>Image</th> --}}
                                        <th>Created At</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone</th>
                                        <th>Type</th>
                                        <th>Product</th>
                                        <th>Total</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- Modal Update --}}
    @foreach ($collections as $item)
        @php
            $id = $item->id;
            $date = $item->created_at->format('Y-m-d H:i:s');
            
            if ($item->type == 'produk') {
                $title = $item->product->name;
            } else {
                $title = $item->trip->name;
            }
            
            $grand_total = number_format($item->grand_total);
        @endphp
        <div class="modal fade" id="updateModal{{ $id }}" role="dialog" aria-labelledby="createModal"
            aria-hidden="true" style="overflow:hidden;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModal{{ $id }}">Update Status</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('transactions.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td>:</td>
                                        <td>{{ $date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer Name</th>
                                        <td>:</td>
                                        <td>{{ $item->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer Phone</th>
                                        <td>:</td>
                                        <td>{{ $item->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product</th>
                                        <td>:</td>
                                        <td>{{ $title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Pembayaran</th>
                                        <td>:</td>
                                        <td><strong>Rp {{ $grand_total }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-md-12">
                                <label for="post_id">Bukti Pembayaran</label>
                                <input type="file" name="file" class="form-control" placeholder="Choose file">
                            </div>
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <label for="post_id">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="0" @if ($item->status == 0) selected @endif>Pending
                                        </option>
                                        <option value="1" @if ($item->status == 1) selected @endif>Complete
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary" type="submit"><i data-feather="upload"></i> &nbsp;
                                Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('addon-script')
    <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    "data": 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                /* {
                    data: 'image',
                    name: 'image'
                }, */
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'type',
                    name: 'type'
                },
                {
                    data: 'product',
                    name: 'product'
                },
                {
                    data: 'grand_total',
                    name: 'grand_total'
                },
                {
                    data: 'file',
                    name: 'file'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush
