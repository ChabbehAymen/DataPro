
@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Confirmed Baskets</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Confirmed Baskets List</h3>
                </div>

                <!-- Card Body -->
                <div class="card-body table-responsive p-0">
                    @if($confirmedBaskets->isEmpty())
                        <div class="alert alert-warning text-center m-3">No confirmed baskets found.</div>
                    @else
                        <table class="table table-hover text-nowrap">
                            <thead >
                                <tr>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Order Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($confirmedBaskets as $basket)
                                    <tr>
                                        <td>{{ optional($basket->user)->full_name }}</td>
                                        <td>{{ optional($basket->product)->title }}</td>
                                        <td>{{ $basket->quantity }}</td>
                                        <td>{{ $basket->date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
