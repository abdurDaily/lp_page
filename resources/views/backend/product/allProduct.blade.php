@extends('backendLayout')

@section('backend_contains')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="mb-4">All Products</h4>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Stock</th>
                    <th>Details</th>
                    <th>Images</th>
                    <th>FAQs</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="productTableBody">
                @forelse ($products as $index => $product)
                    <tr id="productRow-{{ $product->id }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount ?? '-' }}</td>
                        <td>
                            @if ($product->stock_status)
                                <span class="badge bg-success">In Stock</span>
                            @else
                                <span class="badge bg-danger">Out of Stock</span>
                            @endif
                        </td>
                        <td>{{ Str::limit($product->details, 50) }}</td>
                        <td>
                            @if ($product->images && is_array($product->images))
                                <div class="d-flex flex-wrap" style="gap: 5px;">
                                    @foreach ($product->images as $img)
                                        <img src="{{ asset('uploads/products/' . $img) }}" width="60" height="60" style="object-fit: cover; border-radius: 5px;">
                                    @endforeach
                                </div>
                            @endif
                        </td>
                        <td>
                            @if ($product->faqs && is_array($product->faqs))
                                <ul style="padding-left: 16px;">
                                    @foreach ($product->faqs as $faq)
                                        <li>
                                            <strong>Q:</strong> {{ $faq['question'] }}<br>
                                            <strong>A:</strong> {{ $faq['answer'] }}
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <em>No FAQ</em>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary mb-1">Edit</a>
                            <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $product->id }}">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('backend_js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });

    $(document).on('click', '.btn-delete', function () {
        const productId = $(this).data('id');
        const deleteUrl = "{{ route('product.destroy', ':id') }}".replace(':id', productId);

        Swal.fire({
            title: 'Are you sure?',
            text: "This product will be deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    success: function (res) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: res.message,
                            timer: 1500,
                            showConfirmButton: false
                        });

                        $('#productRow-' + productId).fadeOut(300, function () {
                            $(this).remove();
                        });
                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong!'
                        });
                    }
                });
            }
        });
    });
</script>
@endpush
