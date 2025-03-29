@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Baskets</h1>
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
                    <h3 class="card-title">Baskets List</h3>
                </div>

                <!-- Card Body -->
                <div class="card-body table-responsive p-0">
                    @if($baskets->isEmpty())
                        <div class="alert alert-warning text-center m-3">No baskets found.</div>
                    @else
                        <table class="table table-hover text-nowrap">
                            <thead >
                                <tr>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Order Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($baskets as $basket)
                                    <tr>
                                        <td>{{ optional($basket->user)->full_name }}</td>
                                        <td>{{ optional($basket->product)->title }}</td>
                                        <td>{{ $basket->quantity }}</td>
                                        <td>{{ $basket->date }}</td>
                                        <td>
                                            @if(!$basket->confirmed)
                                                <a href="{{ route('baskets.confirm', $basket->id) }}" 
                                                   class="btn btn-success btn-sm" title="Confirm Order">
                                                    <i class="fas fa-check"></i> Confirm
                                                </a>
                                            @else
                                                <span class="badge bg-success">Confirmed</span>
                                            @endif

                                            @if($basket->confirmed && !$basket->completed)
                                                <a href="{{ route('baskets.complete', $basket->id) }}" 
                                                   class="btn btn-primary btn-sm" title="Mark as Completed">
                                                    <i class="fas fa-check-circle"></i> Complete
                                                </a>
                                            @elseif($basket->completed)
                                                <span class="badge bg-primary">Completed</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {{ $baskets->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection
