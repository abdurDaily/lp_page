@extends('backendLayout')
@push('backend_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
  integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('backend_contains')
<div class="content-wrapper">

  <div class="container-xxl flex-grow-1 container-p-y ">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
          type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
          type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile image</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
          type="button" role="tab" aria-controls="pills-contact" aria-selected="false">password update</button>
      </li>
    </ul>
    <div class="tab-content px-0" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
        tabindex="0">







        <div class="row">
          <div class="col-md-12">

            <div class="card mb-4">
              <h5 class="card-header">Profile Details</h5>
              <!-- Account -->

              <hr class="my-0">
              <div class="card-body ">
                <form id="formAccountSettings" method="POST" onsubmit="return false">

                  @csrf

                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="firstName" class="form-label">First Name</label>
                      <input value="{{ $userData->name }}" class="form-control" type="text" id="firstName" name="name"
                        value="John" autofocus="">
                    </div>


                    <div class="mb-3 col-md-6">
                      <label for="lastName" class="form-label">Last Name</label>
                      <input value="{{ $userData->email }}" class="form-control" type="text" name="email" id="lastName"
                        value="Doe">
                    </div>

                  </div>


                  <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2 userInfo">Save changes</button>
                  </div>


                </form>


              </div>
              <!-- /Account -->
            </div>
          </div>
        </div>






      </div>



      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">


        <div class="card-body bg-light shadow-sm">
          <div class="d-flex align-items-start align-items-sm-center gap-4">
            <img class="preview_img"
              src="{{ Auth::user()->profile_image ?  Auth::user()->profile_image : '../assets/img/avatars/1.png'}}"
              alt="user-avatar" class="d-block rounded" width="100" id="uploadedAvatar">



            <form id="profileForm" enctype="multipart/form-data">
              @csrf
              <div class="button-wrapper">
                <div class="row">
                  <div class="col-8">
                    <label for="upload" class="btn btn-outline-primary me-2 mb-4" tabindex="0">
                      <span class="d-none d-sm-block upload_btn">Upload new photo</span>
                      <i class="bx bx-upload d-block d-sm-none"></i>
                      <input name="profile_img" type="file" id="upload" class="account-file-input" hidden
                        accept=".png,.jpg,.webp,.jpeg">
                    </label>
                    <span class="text-danger" id="uploadError"></span>
                  </div>

                  <div class="col-4">
                    <button class="btn btn-outline-primary" type="button" id="uploadBtn">Upload</button>
                  </div>
                </div>

                <p class="text-muted mb-0">Allowed JPG, GIF, PNG. Max size of 800KB</p>

                <!-- Preview Image -->
                {{-- <img src="" class="preview_img mt-3" width="120" style="display:none;" /> --}}
              </div>
            </form>




          </div>
        </div>


      </div>


      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">


        <div class="tab-content px-0" id="pills-tabContent">
          <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
            tabindex="0">







            <div class="row">
              <div class="col-md-12">

                <div class="card mb-4">
                  <h5 class="card-header">Password update</h5>
                  <!-- Account -->

                  <hr class="my-0">
                  <div class="card-body ">

                    <form action="{{ route('pass.update') }}" method="post">
                      @csrf
                      <label for="old_password">Old Password</label>
                      <input placeholder="current password" type="password" name="old_password"
                        class="form-control mb-3 ">

                      <label for="new_password">New Password</label>
                      <input placeholder="old password" type="password" name="new_password" class="form-control mb-3 ">

                      <label for="new_password_confirmation">Confirm Password</label>
                      <input placeholder="confirm password" type="password" name="new_password_confirmation"
                        class=" mb-3 form-control">

                      <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>


                  </div>
                  <!-- /Account -->
                </div>
              </div>
            </div>






          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
            tabindex="0">


            <div class="card-body bg-light shadow-sm">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded" height="100"
                  width="100" id="uploadedAvatar">
                <div class="button-wrapper">
                  <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                    <span class="d-none d-sm-block">Upload new photo</span>
                    <i class="bx bx-upload d-block d-sm-none"></i>
                    <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                  </label>

                  <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                </div>
              </div>
            </div>


          </div>


          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
            tabindex="0">


            <div class="card-body bg-light shadow-sm">
              <div class="d-flex align-items-start align-items-sm-center gap-4">



              </div>
            </div>
          </div>


        </div>
      </div>


    </div>


  </div>
</div>

<div class="content-backdrop fade"></div>
</div>
@endsection

@push('backend_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
  integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function () {
  // Image preview
  $('#upload').on('change', function (event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        $('.preview_img').attr('src', e.target.result).show();
      };
      reader.readAsDataURL(file);
    }
  });

  // AJAX Upload
  $('#uploadBtn').on('click', function (e) {
    e.preventDefault();

    let formData = new FormData($('#profileForm')[0]);

    $.ajax({
      url: "{{ route('profile.store') }}",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
       headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
          ,
      success: function (response) {
        
        $('.preview_img').attr('src', response.url).show(); // Set new image URL
        location.reload();
      },
      error: function (xhr) {
        let error = xhr.responseJSON?.errors?.profile_img?.[0] || "Upload failed!";
        $('#uploadError').text(error);
      }
    });
  });



  // USER INFORMATION UPDATE 
  $('.userInfo').on('click', function(e){
    e.preventDefault();

    let userInfoForm = new FormData($('#formAccountSettings')[0]);

    $.ajax({
      url: `{{ route('profile.info') }}`,
      method: 'POST',
      data: userInfoForm,
      processData:false,
      contentType:false,
       headers:{ 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      success: function(response){
       toastr.success('Have fun storming the castle!', 'Miracle Max Says');
        setTimeout(() => {
          location.reload();
        }, 1500);
      },
      error: function(xhr){
        console.log(xhr);
      }
    })
  })
});



</script>


@endpush