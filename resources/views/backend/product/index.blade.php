@extends('backendLayout')
@section('backend_contains')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form id="productForm" enctype="multipart/form-data">
            @csrf

            <input type="text" name="name" class="form-control p-3 my-2" placeholder="Product Name" required>
            <input type="text" name="slug" class="form-control p-3 my-2" placeholder="Slug" required>
            <input type="number" name="price" class="form-control p-3 my-2" placeholder="Price" step="0.01" required>
            <input type="number" name="discount" class="form-control p-3 my-2" placeholder="Discount (optional)"
                step="0.01">

            <select name="stock_status" class="form-control p-3 my-2" required>
                <option value="1">In Stock</option>
                <option value="0">Out of Stock</option>
            </select>

            <textarea name="details" class="form-control p-3 my-2" placeholder="Product Details" required></textarea>

            <label class="mt-2">Upload Product Images</label>
            <input type="file" id="imageInput" class="form-control p-3 mb-2" multiple>
            <div id="imagePreview" class="d-flex flex-wrap mt-2"></div>

            <div id="faqSection" class="mt-3">
                <label>FAQs</label>
                <div class="faq-group mb-2">
                    <input type="text" name="faqs[0][question]" class="form-control p-3 mb-1" placeholder="Question">
                    <input type="text" name="faqs[0][answer]" class="form-control p-3" placeholder="Answer">
                </div>
            </div>
            <button type="button" id="addFaqBtn" class="btn btn-sm btn-secondary my-2">Add More FAQ</button>

            <br>
            <button type="submit" class="w-25 btn btn-primary mt-2">Submit</button>
        </form>
    </div>
@endsection

@push('backend_js')
    <!-- jQuery + Toastr -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        let faqIndex = 1;
        let selectedImages = [];

        // Add FAQ with Cancel Button
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

        // Remove FAQ on Cancel
        $(document).on('click', '.remove-faq', function() {
            $(this).closest('.faq-group').remove();
        });

        // Image Selection + Preview
        $('#imageInput').on('change', function(e) {
            const newFiles = Array.from(e.target.files);
            selectedImages = [...selectedImages, ...newFiles];
            $(this).val('');
            refreshImagePreview();
        });

        // Refresh Image Previews
        function refreshImagePreview() {
            $('#imagePreview').html('');
            selectedImages.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').append(`
                <div style="position: relative; margin-right:10px; margin-bottom:10px;">
                    <img src="${e.target.result}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 6px; border:1px solid #ddd;" />
                    <button type="button" class="btn btn-sm btn-danger remove-image" data-index="${index}" style="position: absolute; top: -8px; right: -8px; border-radius: 50%; padding: 2px 6px;">&times;</button>
                </div>
            `);
                };
                reader.readAsDataURL(file);
            });
        }

        // Remove Image
        $(document).on('click', '.remove-image', function() {
            const index = $(this).data('index');
            selectedImages.splice(index, 1);
            refreshImagePreview();
        });

        // Ajax Form Submit
        $('#productForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            selectedImages.forEach(file => {
                formData.append('images[]', file);
            });

            $.ajax({
                url: "{{ route('product.store') }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(res) {
                    toastr.success(res.message);
                    $('#productForm')[0].reset();
                    $('#faqSection').html(`
                <div class="faq-group mb-2">
                    <input type="text" name="faqs[0][question]" class="form-control p-3 mb-1" placeholder="Question">
                    <input type="text" name="faqs[0][answer]" class="form-control p-3" placeholder="Answer">
                </div>
            `);
                    $('#imagePreview').html('');
                    faqIndex = 1;
                    selectedImages = [];
                },
                error: function(xhr) {
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        toastr.error(value[0]);
                    });
                }
            });
        });
    </script>
@endpush
