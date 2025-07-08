@extends('backendLayout')

@section('backend_contains')
    <!-- CSRF token for AJAX -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="mb-4">Edit Product</h4>

        <form id="editForm" enctype="multipart/form-data">
            @csrf

            <input type="text" name="name" class="form-control p-3 my-2" placeholder="Product Name"
                value="{{ $product->name }}" required>

            <input type="text" name="slug" class="form-control p-3 my-2" placeholder="Slug"
                value="{{ $product->slug }}" required>

            <input type="number" name="price" class="form-control p-3 my-2" placeholder="Price" step="0.01"
                value="{{ $product->price }}" required>

            <input type="number" name="discount" class="form-control p-3 my-2" placeholder="Discount (optional)"
                step="0.01" value="{{ $product->discount }}">

            <select name="stock_status" class="form-control p-3 my-2" required>
                <option value="1" {{ $product->stock_status ? 'selected' : '' }}>In Stock</option>
                <option value="0" {{ !$product->stock_status ? 'selected' : '' }}>Out of Stock</option>
            </select>

            <textarea name="details" class="form-control p-3 my-2" placeholder="Product Details"
                required>{{ $product->details }}</textarea>

            <label class="mt-2">Upload Product Images</label>
            <input type="file" id="imageInput" class="form-control p-3 mb-2" multiple>
            <div id="imagePreview" class="d-flex flex-wrap mt-2"></div>

            <div id="faqSection" class="mt-3">
                <label>FAQs</label>
                @if (is_array($product->faqs) && count($product->faqs))
                    @foreach ($product->faqs as $key => $faq)
                        <div class="faq-group mb-3 position-relative border p-2 rounded bg-light">
                            <input type="text" name="faqs[{{ $key }}][question]" class="form-control p-3 mb-2"
                                placeholder="Question" value="{{ $faq['question'] }}">
                            <input type="text" name="faqs[{{ $key }}][answer]" class="form-control p-3 mb-2"
                                placeholder="Answer" value="{{ $faq['answer'] }}">
                            <button type="button" class="btn btn-sm btn-danger remove-faq"
                                style="position:absolute; top:5px; right:5px;">❌</button>
                        </div>
                    @endforeach
                @else
                    <div class="faq-group mb-2">
                        <input type="text" name="faqs[0][question]" class="form-control p-3 mb-1"
                            placeholder="Question">
                        <input type="text" name="faqs[0][answer]" class="form-control p-3"
                            placeholder="Answer">
                    </div>
                @endif
            </div>
            <button type="button" id="addFaqBtn" class="btn btn-sm btn-secondary my-2">Add More FAQ</button>

            <br>
            <button type="submit" class="w-25 btn btn-primary mt-2">Update Product</button>
        </form>
    </div>
@endsection

@push('backend_js')
    <!-- jQuery, SweetAlert, Toastr -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let faqIndex = {{ is_array($product->faqs) ? count($product->faqs) : 1 }};
        let selectedImages = [];

        // Load existing images into array on page load
        @if (is_array($product->images))
            @foreach ($product->images as $img)
                selectedImages.push({
                    existing: true,
                    url: "{{ asset('uploads/products/' . $img) }}",
                    name: "{{ $img }}"
                });
            @endforeach
        @endif

        refreshImagePreview();

        // Add FAQ dynamically
        $('#addFaqBtn').click(function() {
            $('#faqSection').append(`
                <div class="faq-group mb-3 position-relative border p-2 rounded bg-light">
                    <input type="text" name="faqs[${faqIndex}][question]" class="form-control p-3 mb-2" placeholder="Question">
                    <input type="text" name="faqs[${faqIndex}][answer]" class="form-control p-3 mb-2" placeholder="Answer">
                    <button type="button" class="btn btn-sm btn-danger remove-faq" style="position:absolute; top:5px; right:5px;">❌</button>
                </div>
            `);
            faqIndex++;
        });

        $(document).on('click', '.remove-faq', function() {
            $(this).closest('.faq-group').remove();
        });

        // Image file selection
        $('#imageInput').on('change', function(e) {
            const newFiles = Array.from(e.target.files);
            newFiles.forEach(file => {
                selectedImages.push({
                    existing: false,
                    file: file
                });
            });
            $(this).val('');
            refreshImagePreview();
        });

        function refreshImagePreview() {
            $('#imagePreview').html('');
            selectedImages.forEach((item, index) => {
                if (item.existing) {
                    $('#imagePreview').append(`
                        <div style="position: relative; margin-right:10px; margin-bottom:10px;">
                            <img src="${item.url}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 6px; border:1px solid #ddd;" />
                            <button type="button" class="btn btn-sm btn-danger remove-image" data-index="${index}" style="position: absolute; top: -8px; right: -8px; border-radius: 50%; padding: 2px 6px;">&times;</button>
                        </div>
                    `);
                } else {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').append(`
                            <div style="position: relative; margin-right:10px; margin-bottom:10px;">
                                <img src="${e.target.result}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 6px; border:1px solid #ddd;" />
                                <button type="button" class="btn btn-sm btn-danger remove-image" data-index="${index}" style="position: absolute; top: -8px; right: -8px; border-radius: 50%; padding: 2px 6px;">&times;</button>
                            </div>
                        `);
                    };
                    reader.readAsDataURL(item.file);
                }
            });
        }

        $(document).on('click', '.remove-image', function() {
            const index = $(this).data('index');
            selectedImages.splice(index, 1);
            refreshImagePreview();
        });

        $('#editForm').submit(function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            // Append new images
            selectedImages.forEach(item => {
                if (!item.existing) {
                    formData.append('images[]', item.file);
                }
            });

            // Collect names of retained images
            let retainedImages = selectedImages.filter(item => item.existing).map(item => item.name);
            formData.append('retained_images', JSON.stringify(retainedImages));

            $.ajax({
                url: "{{ route('product.update', $product->id) }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    Swal.fire({
                        title: 'Success!',
                        text: res.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = "{{ route('product.records') }}";
                    });
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        toastr.error("An error occurred!");
                    }
                }
            });
        });
    </script>
@endpush
