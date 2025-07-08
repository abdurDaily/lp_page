@extends('backendLayout')

@section('backend_contains')

@push('backend_css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div
            class="card-header bg-light shadow mb-4 d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Edit Finance Record</h4>
            <a href="{{ route('finance.get.finance') }}" class="btn btn-primary">All Records</a>
        </div>
        <div class="card-body">
            <form id="editFinanceForm" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-xl-6 mb-3">
                        <label for="cost_title">Title <span>*</span></label>
                        <input type="text" name="cost_title" id="cost_title" class="form-control" 
                            value="{{ old('cost_title', $editFinance->title) }}" required>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <label for="cost_amount">Amount <span>*</span></label>
                        <input type="number" name="cost_amount" id="cost_amount" class="form-control" step="0.01"
                            value="{{ old('cost_amount', $editFinance->amount) }}" required>
                    </div>

                    <div class="col-xl-12 mb-3">
                        <label for="cost_details">Description</label>
                        <textarea name="cost_details" id="cost_details" rows="4" class="form-control">{{ old('cost_details', $editFinance->description) }}</textarea>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <label for="attach_file">Attach File</label>
                        <input type="file" name="attach_file" id="attach_file" class="form-control">
                        @if($editFinance->attach_file)
                            <small>Current File: 
                                <a href="{{ $editFinance->attach_file }}" target="_blank">View</a>
                            </small>
                        @endif
                    </div>

                    <div class="col-xl-6 d-flex align-items-end mb-3">
                        <button type="submit" id="updateFinanceBtn" class="btn btn-success w-100">Update</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('backend_js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function(){
        $('#editFinanceForm').submit(function(e){
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('finance.update.finance', $editFinance->id) }}",
                method: "POST", // Laravel expects POST with _method=PUT
                data: formData,
                processData: false,
                contentType: false,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function(res){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: res.success,
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = "{{ route('finance.get.finance') }}";
                    });
                },
                error: function(xhr){
                    let errMsg = 'Something went wrong.';
                    if(xhr.responseJSON && xhr.responseJSON.errors){
                        errMsg = '';
                        $.each(xhr.responseJSON.errors, function(key, val){
                            errMsg += val[0] + '\n';
                        });
                    }
                    Swal.fire('Error', errMsg, 'error');
                }
            });
        });
    });
</script>
@endpush
