@extends('backendLayout')
@section('backend_contains')
    @push('backend_css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
            integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
        <style>
            /* Make Packages column wider with wrap */
            table#ordersTable td:nth-child(8) {
                min-width: 300px;
                max-width: 600px;
                white-space: pre-wrap;
                word-wrap: break-word;
                vertical-align: top;
            }

            /* Left align all table data */
            table#ordersTable td,
            table#ordersTable th {
                text-align: left !important;
                vertical-align: middle;
            }

            /* Packages column style */
            table#ordersTable td:nth-child(8)>div {
                margin-bottom: 10px;
                padding-bottom: 5px;
                border-bottom: 1px solid #ddd;
                /* replaces hr for better control */
            }

            table#ordersTable td:nth-child(8) strong {
                display: block;
                margin-bottom: 4px;
                font-weight: 600;
            }

            table#ordersTable td:nth-child(8) div:last-child {
                border-bottom: none;
                margin-bottom: 0;
                padding-bottom: 0;
            }

            /* Zebra striping - override bootstrap if any */
            #ordersTable tbody tr:nth-child(odd) {
                background-color: #202121b4 !important;
                color: #ddd !important;
            }

            #ordersTable tbody tr:nth-child(even) {
                background-color: #ffffff !important;
            }
        </style>
    @endpush

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card shadow">
            <div class="card-body table-responsive">
                <!-- Removed table-striped class to disable Bootstrap striping -->
                <table class="table table-bordered" id="ordersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Division</th>
                            <th>District</th>
                            <th>Upazilla</th>
                            <th>Packages</th>
                            <th>Total Price</th>
                            <th>Created At</th>
                            <th>Action</th> {{-- Button column last --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->client_name }}</td>
                                <td>{{ $order->client_phone }}</td>
                                <td>{{ $order->client_address }}</td>
                                <td>{{ collect($divisions)->where('id', $order->division_id)->first()['name'] ?? '-' }}</td>
                                <td>{{ collect($districts)->where('id', $order->district_id)->first()['name'] ?? '-' }}</td>
                                <td>{{ collect($upazillas)->where('id', $order->upazilla_id)->first()['name'] ?? '-' }}</td>
                                <td>
                                    @foreach ($order->packages as $package)
                                        <div>
                                            <strong>{{ $package['name'] }}</strong><br>
                                            Qty: {{ $package['qty'] }}<br>
                                            Price: ৳{{ $package['price'] }}
                                        </div>
                                    @endforeach
                                </td>
                                <td>৳ {{ number_format($order->total_price, 2) }}</td>
                                <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                                <td>
                                    <form method="POST" action="{{ route('backend.order.toggle-status', $order->id) }}"
                                        class="status-toggle-form">
                                        @csrf
                                        @if ($order->action == 0)
                                            <button type="submit" class="btn btn-sm btn-primary status-toggle-btn"
                                                data-status="confirm">
                                                 Pending
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-sm btn-success status-toggle-btn"
                                                data-status="pending">
                                                Confirmed 
                                            </button>
                                        @endif

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('backend_js')
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#ordersTable').DataTable({
                pageLength: 10,
                responsive: true,
                order: [
                    [0, 'desc']
                ],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    zeroRecords: "No orders found.",
                    info: "Showing _START_ to _END_ of _TOTAL_ orders",
                    infoEmpty: "No orders available.",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                }
            });

            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            // SweetAlert2 confirmation for status toggle
            $('.status-toggle-form').on('submit', function(e) {
                e.preventDefault(); // Prevent default submit
                let form = this;
                let status = $(this).find('.status-toggle-btn').data('status');
                let confirmText = status === 'confirm' ?
                    'Are you sure you want to confirm this order?' :
                    'Are you sure you want to mark this order as pending?';

                Swal.fire({
                    title: 'Confirm Action',
                    text: confirmText,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, proceed',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
