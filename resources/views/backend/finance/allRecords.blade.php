@extends('backendLayout')

@section('backend_contains')
@push('backend_css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">All Finance Records</h4>

    <a href="{{ route('finance.index') }}" class="btn btn-primary mb-3">Add New Record</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Author</th>
                    <th>Amount</th>
                    <th>Attachment</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($allFinanceRecords as $index => $record)
                <tr>
                    <td>{{ $allFinanceRecords->firstItem() + $index }}</td>
                    <td>{{ $record->title }}</td>
                    <td>{{ Str::limit($record->description, 50) }}</td>
                    <td>{{ $record->author_name }}</td>
                    <td>${{ number_format($record->amount, 2) }}</td>
                    <td>
                        @if($record->attach_file)
                            <a href="{{ $record->attach_file }}" target="_blank" class="btn btn-sm btn-info">View</a>
                        @else
                            <span class="text-muted">No file</span>
                        @endif
                    </td>
                    <td>{{ $record->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        <a href="{{ route('finance.edit.finance', $record->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>

                        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $record->id }}">Delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No finance records found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $allFinanceRecords->links() }}
    </div>
</div>
@endsection

@push('backend_js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This will permanently delete the record!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`{{ url('finance/delete') }}/${id}`, {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                            },
                        })
                        .then(response => {
                            if (!response.ok) throw new Error('Network response was not ok');
                            return response.json();
                        })
                        .then(data => {
                            Swal.fire(
                                'Deleted!',
                                data.success,
                                'success'
                            ).then(() => {
                                // Remove deleted row from DOM
                                const row = button.closest('tr');
                                if (row) row.remove();

                                // If no rows left, show "No finance records found."
                                if (document.querySelectorAll('tbody tr').length === 0) {
                                    document.querySelector('tbody').innerHTML = '<tr><td colspan="8" class="text-center">No finance records found.</td></tr>';
                                }
                            });
                        })
                        .catch(() => {
                            Swal.fire('Error', 'Failed to delete.', 'error');
                        });
                    }
                });
            });
        });
    });
</script>
@endpush
