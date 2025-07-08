@extends('backendLayout')

@section('backend_contains')
@push('backend_css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header bg-light shadow mb-4 d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Add your personal cost</h4>
            <a href="{{ route('finance.get.finance') }}" class="btn btn-primary">All Records</a>
        </div>
        <div class="card-body">
            <form class="p-3" id="form_data" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-xl-6">
                        <label for="title">Add title for cost <span class="text-danger">*</span></label>
                        <input name="cost_title" id="title" type="text" class="form-control py-3"
                            placeholder="cost title">
                    </div>

                    <div class="col-xl-6">
                        <label for="cost_amount">Add cost amount <span class="text-danger">*</span></label>
                        <input name="cost_amount" id="cost_amount" type="number" class="form-control py-3"
                            placeholder="cost amount">
                    </div>

                    <div class="col-xl-12 mt-3">
                        <label for="cost_details">Add Description</label>
                        <textarea class="form-control" name="cost_details" id="cost_details" cols="30" rows="5"
                            placeholder="cost details"></textarea>
                    </div>

                    <div class="col-xl-6 mt-3">
                        <label for="attach_file">Attach file</label>
                        <input name="attach_file" id="attach_file" type="file" class="form-control py-3">
                    </div>

                    <div class="col-xl-6 d-flex align-items-end mt-3">
                        <button id="financeBtn" class="btn btn-primary py-3 w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('backend_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#financeBtn').on('click', function(e){
            e.preventDefault();

            let formData = new FormData($('#form_data')[0]);

            $.ajax({
                url: `{{ route('finance.store') }}`,
                method: `POST`,
                processData: false,
                contentType: false,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: formData,
                success: function(res){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: res.success,
                        timer: 2000,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = `{{ route('finance.get.finance') }}`;
                    });
                    $('#form_data')[0].reset();
                },
                error: function(xhr){
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        let errorMessages = '';
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorMessages += `<div>${value[0]}</div>`;
                        });

                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error!',
                            html: errorMessages
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong. Please try again.'
                        });
                    }
                }
            });
        });
    </script>
@endpush
