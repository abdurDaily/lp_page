<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>commone links</title>


    <link rel="stylesheet" href="{{ asset('frontend/assets/style/nice-select2.css') }}">
    <!-- FONT STYLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />

    <!-- FAV ICON -->
    <link rel="shortcut icon" href="./assets/images/fav.png" type="image/x-icon" />
    <!-- SLICK -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/slick.css') }}" />
    <!-- BOOTSTRAP 5 -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/bootstrap.min.css') }}" />
    <!-- FONT-AWSOME -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/all.min.css') }}" />
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/style.css') }}" />
    <!-- RESPONSIVE CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/style/responsive.css') }}" />

    <!-- SWEETALERT2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* OMITTED: Your original styles stay here unchanged */

        /* Make selects look like Bootstrap 4 inside SweetAlert2 */
        .swal2-popup .form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            margin-bottom: 1rem;
        }

        /* Error message style inside SweetAlert2 */
        .swal2-popup .text-danger {
            font-size: 0.875em;
            margin-top: -0.75rem;
            margin-bottom: 1rem;
            display: block;
        }

        /* Labels spacing */
        .swal2-popup label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        /* Button spacing */
        .swal2-popup .btn {
            margin-top: 1.5rem;
            width: 100%;
        }

        #order .btn-decrement,
        #order .btn-increment {
            background: transparent;
            outline: 1px solid #00000092;
            color: #000;
            border-radius: 0;
            /* outline: none; */
            border: none;
            display: flex;
            align-items: center;
            /* font-size: 25px; */
        }

        #order .package-checkbox {
            outline: 1px solid #00000092;

        }

        #order {
            margin-top: 50px;
        }

        #order .quantity-group input {
            text-align: center;

            outline: 1px solid #00000092;
        }

        #order form input {
            padding: 10px;
            border-radius: 0;

        }

        #order form button {
            border-radius: 0;
        }

        #order .nice-select.open .nice-select-dropdown {
            width: 100%;
        }

        #order .nice-select:after {
            display: none !important;
        }

        .nice-select.form-select {
            padding: 0.75rem 1rem;
            min-height: 45px;
            height: auto;
            border-radius: 0.375rem;
            border: 1px solid #ced4da75;
            background-color: #fff;
            width: 100%;
            font-size: 1rem;
            box-shadow: none;
        }

        .nice-select.form-select .current {
            line-height: normal;
        }

        .nice-select.form-select .list {
            width: 100%;
        }

        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 0;
            padding: 1.5rem;
            text-align: center;
            /* background: #f8f9fa; */
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.05); */
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            border-radius: 0.5rem;
            box-shadow: 0 10px 20px rgba(217, 209, 209, 0.15);
        }

        .product-list li {
            display: none;
            text-align: left;
            margin-bottom: 5px;
        }

        .product-list li.visible {
            display: block;
        }

        .toggle-btn {
            color: #007bff;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            background: transparent;
        }

        @media (max-width: 576px) {
            .product-list {
                font-size: 0.9rem;
            }
        }

        .product-list {
            padding-left: 0;
            margin: 0;
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 6px;
            /* spacing between list items */
        }

        .product-list li {
            display: none;
            /* default hidden */
            width: 100%;
            text-align: left;
            padding: 10px 14px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1rem;
        }

        .product-list li.visible {
            display: block;
        }

        .product-inline-list {
            font-size: 1rem;
            color: #333;
            padding: 10px 0;
            line-height: 1.7;
            text-align: center;
        }

        .daraz-quantity {
            width: 120px;
            border: 1px solid #ddd;
            border-radius: 6px;
            overflow: hidden;
            height: 36px;
            margin-top: 10px;
        }

        .daraz-quantity .btn-qty {
            width: 36px;
            height: 100%;
            font-size: 18px;
            background-color: #f8f8f8;
            border: none;
            outline: none;
            padding: 0;
            line-height: 1;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .daraz-quantity .btn-qty:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .daraz-quantity .qty-input {
            width: 48px;
            border: none;
            padding: 0;
            height: 100%;
            font-size: 16px;
            text-align: center;
            box-shadow: none;
        }

        .daraz-quantity .qty-input:disabled {
            background-color: #fff;
        }
    </style>
</head>

<body>

    <!-- HERO -->
    <section id="hero" style="background: url({{ asset('frontend/assets/images/hero.png') }})">
        <div class="container">
            <img style="width: 150px" src="https://raafidan.com/images/raafidan.png" alt="" />
            <h1>
                প্রিমিয়াম প্রডাক্টের সংকলন <br />
                আপনার পছন্দে বিশেষ ঘ্রাণ
            </h1>
            <p>
                বিশ্বস্ত সুগন্ধির অভিজ্ঞতা এখন এক সেটেই উপহার কিংবা নিজের ব্যবহারের
                জন্য উপযুক্ত।
            </p>
            <div>
                <a href="#product" class="purchase">প্যাকেজ পছন্দ করুন</a>
            </div>
        </div>
    </section>
    <!-- HERO END -->


    <!-- product -->
    <section id="product">
        <div class="container">
            <div class="header text-center">
                <h4>আমাদের প্যাকেজ সমূহ</h4>
                <p>
                    আপনার পছন্দের জন্য বেছে নেওয়া জনপ্রিয় আতরের সংগ্রহ। প্রতিটি ঘ্রাণই <br />
                    আলাদা আবেশ ও অনুভূতি নিয়ে আসবে।
                </p>
            </div>

            <div class="row justify-content-center mt-5">
                <!-- Product 1 -->
                <div class="col-xl-4 col-md-6 mb-4 product_cart  p-0">
                    <div class="product-card ">
                        <div class="img">
                            <img class="img-fluid" src="{{ asset('frontend/assets/images/package/13.jpg') }}"
                                alt="Product 1" />
                        </div>
                        <div class="contains mt-3">
                            <h4>৫ টি আতরের প্যাকেজ</h4>
                            {{-- <p>আমাদের নির্বাচিত বিশেষ আতরের সমন্বয়ে তৈরি এই প্যাকেজটি প্রতিটি মুহূর্তকে করে তুলবে
                                স্মরণীয়।</p> --}}

                            <p class="product-inline-list ">
                                আমির আল উদ | এহসাস আল এরাবিয়া | কুল ওয়াটার ব্লু | ডানহিল ডিজায়ার | হোয়াইট উদ
                            </p>

                            <div class="retting mt-3 d-flex justify-content-center ">
                                <span>রেটিং:</span>
                                <ul class="p-0 d-flex justify-content-center">
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18">
                                        </iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18">
                                        </iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18">
                                        </iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18">
                                        </iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="proicons:star" width="18" height="18"></iconify-icon>
                                    </li>
                                </ul>
                                <span>(১৮)</span>
                            </div>

                            <div class="d-flex justify-content-between pricing align-items-center mt-2">
                                <span>৳ ৩৯০</span>
                                <a href="#order" class="buy-now-btn" data-product-id="product_aroma">এই প্যাকেজটি
                                    কিনুন</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="col-xl-4 col-md-6 mb-4 product_cart p-0 ">
                    <div class="product-card ">
                        <div class="img">
                            <img class="img-fluid" src="{{ asset('frontend/assets/images/package/12.jpg') }}"
                                alt="Product 2" />
                        </div>
                        <div class="contains mt-3">
                            <h4>১০ টি আতরের প্যাকেজ</h4>
                            {{-- <p>এই প্রিমিয়াম প্যাকেজে রয়েছে বিশ্ববিখ্যাত আতরের এক চমৎকার সমাহার যা আপনাকে দিবে রাজকীয়
                                সুবাসের অভিজ্ঞতা।</p> --}}

                            <p class="product-inline-list ">
                                সিকে ওয়ান | সিলভার স্টোন | ফ্যান্টাসি | ভ্যাম্পায়ার ব্লাড | রয়েল বাখুর | জান্নাতুল
                                ফেরদৌস | জোপি | সুলতান | প্যারিস হিলটন | বাকারাত রোজ
                            </p>

                            <div class="retting mt-3 d-flex justify-content-center ">
                                <span>রেটিং:</span>
                                <ul class="p-0 d-inline-flex">
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18">
                                        </iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18">
                                        </iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18">
                                        </iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="material-symbols:star-rounded" width="18"
                                            height="18">
                                        </iconify-icon>
                                    </li>
                                    <li>
                                        <iconify-icon icon="proicons:star" width="18" height="18"></iconify-icon>
                                    </li>
                                </ul>
                                <span>(১৮)</span>
                            </div>

                            <div class="d-flex justify-content-between pricing align-items-center mt-2">
                                <span>৳ ৫৯০</span>
                                <a href="#order" class="buy-now-btn" data-product-id="product_arabia">এই প্যাকেজটি
                                    কিনুন</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- review -->
    <section id="review">
        <div class="container">
            <div class="header">
                <h4>আমাদের ক্রেতারা যা বলেছেন</h4>
                <p>
                    আপনার পছন্দের জন্য বেছে নেওয়া জনপ্রিয় আতরের সংগ্রহ। প্রতিটি ঘ্রাণই
                    <br />
                    আলাদা আবেশ ও অনুভূতি নিয়ে আসবে।
                </p>
            </div>
            <div class="sliders mt-4">
                <div class="slider">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/review/1.jpg') }}" alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/review/2.jpg') }}"
                        alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/review/3.jpg') }}"
                        alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/review/4.jpg') }}"
                        alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/review/5.jpg') }}"
                        alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/review/6.jpg') }}"
                        alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/review/7.jpg') }}"
                        alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/review/8.jpg') }}"
                        alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/review/9.jpg') }}"
                        alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/review/10.jpg') }}"
                        alt="" />
                </div>
                <div class="slider">
                    <img class="img-fluid" src="{{ asset('frontend/assets/images/review/11.jpg') }}"
                        alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- review end -->



    <!-- characteristics start -->
    <section id="characteristics">
        <div class="container">
            <div class="header">
                <h4>আমাদের বৈশিষ্ট্য সমুহ</h4>
                <p>১০০% অ্যালকোহল মুক্ত পারফিউম</p>
            </div>

            <div class="row g-5">
                <div class=" col-6 characteristics_box">
                    <div>
                        <span>
                            <iconify-icon icon="mdi:smell" width="50" height="50"></iconify-icon>
                        </span>
                        <h4>দীর্ঘস্থায়ী ঘ্রাণ</h4>
                    </div>
                </div>

                <div class=" col-6 characteristics_box">
                    <div>
                        <span>
                            <iconify-icon icon="ic:baseline-mosque" width="50" height="50"></iconify-icon>
                        </span>
                        <h4>নামায ও ইসলামী অনুষ্ঠানে উপযোগী</h4>
                    </div>
                </div>

                <div class=" col-6 characteristics_box">
                    <div>
                        <span>
                            <iconify-icon icon="mdi:gift" width="50" height="50"></iconify-icon>
                        </span>
                        <h4>উপহার দেওয়ার জন্য দারুণ প্যাকেজিং</h4>
                    </div>
                </div>

                <div class=" col-6 characteristics_box">
                    <div>
                        <span>
                            <iconify-icon icon="material-symbols:editor-choice-rounded" width="50"
                                height="50">
                            </iconify-icon>
                        </span>
                        <h4>আপনার পছন্দমতো আতর নির্বাচন করার সুবিধা</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- characteristics end -->




    {{-- ORDER --}}
    <!-- ORDER -->
    <section id="order">
        <div class="container">
            <form action="" method="POST" class="shadow-sm p-4 bg-white rounded">
                @csrf
                <div class="row justify-content-center">

                    <!-- Package Selection -->
                    <div class="col-12 mb-4">
                        <h5 class="text-center mb-3 order_heading">আপনার প্যাকেজ নির্বাচন করুন</h5>
                        <div class="row g-3 justify-content-center">

                            <!-- Product Aroma -->
                            <div class="col-md-6 col-lg-5">
                                <div class="product-card p-3  border check_pack">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="form-check d-flex align-items-center">
                                            <!-- Arrow icon before checkbox -->
                                            {{-- <img src="{{ asset('frontend/assets/images/review/arrow-top.png') }}"
                                                alt="Click Here Arrow" class="inline-arrow me-2"> --}}

                                            <input class="form-check-input package-checkbox" type="checkbox"
                                                id="product_aroma" data-price="390"
                                                data-name="এ্যারোমা জেনেসিস ৫ টির প্যাকেজ।">
                                            <label class="form-check-label fw-bold ms-3" for="product_aroma">
                                                ৫ টি আতরের প্যাকেজ
                                            </label>
                                        </div>
                                        <span class="badge bg-success fs-6">৳ ৩৯০</span>
                                    </div>

                                    <div class="daraz-quantity d-flex align-items-center justify-content-between">
                                        <button type="button" class="btn-qty btn-decrement" disabled>
                                            <span>
                                                <iconify-icon icon="ic:round-minus" width="30" height="30">
                                                </iconify-icon>
                                            </span>
                                        </button>
                                        <input type="number" class="qty-input" id="qty_aroma" value="1"
                                            min="1" disabled>
                                        <button type="button" class="btn-qty btn-increment" disabled>
                                            <span>
                                                <iconify-icon icon="ic:round-plus" width="30" height="30">
                                                </iconify-icon>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Arabia -->
                            <div class="col-md-6 col-lg-5">
                                <div class="product-card p-3  border check_pack">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div class="form-check d-flex align-items-center">
                                            {{-- <img src="{{ asset('frontend/assets/images/review/arrow-top.png') }}"
                                                alt="Click Here Arrow" class="inline-arrow me-2"> --}}
                                            <input class="form-check-input package-checkbox" type="checkbox"
                                                id="product_arabia" data-price="590"
                                                data-name="এহেসাস আল আরাবিয়া ১০ টির প্যাকেজ।">
                                            <label class="form-check-label fw-bold ms-3" for="product_arabia">
                                                ১০ টি আতরের প্যাকেজ
                                            </label>
                                        </div>
                                        <span class="badge bg-success fs-6">৳ ৫৯০</span>
                                    </div>

                                    <div class="daraz-quantity d-flex align-items-center justify-content-between">
                                        <button type="button" class="btn-qty btn-decrement" disabled>
                                            <span>
                                                <iconify-icon icon="ic:round-minus" width="30" height="30">
                                                </iconify-icon>
                                            </span>
                                        </button>
                                        <input type="number" class="qty-input" id="qty_arabia" value="1"
                                            min="1" disabled>
                                        <button type="button" class="btn-qty btn-increment" disabled>
                                            <span>
                                                <iconify-icon icon="ic:round-plus" width="30" height="30">
                                                </iconify-icon>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="text-center mt-4">
                            <h3 class="text-primary text-dark fw-bold">
                                মোট মূল্য: <span id="total_price">৳ ০</span>
                            </h3>
                        </div>
                        <div class="text-danger small mt-2" id="error-packages"></div>
                    </div>

                    <!-- Client Info -->
                    <div class="col-xl-5 p-3">
                        <label for="client_name">আপনার নাম লিখুন</label>
                        <input type="text" name="client_name" id="client_name" class="form-control mb-3"
                            placeholder="নাম">
                        <div class="text-danger small mb-2" id="error-client_name"></div>

                        <label for="client_phone">মোবাইল নাম্বার লিখুন:</label>
                        <input type="number" name="client_phone" id="client_phone" class="form-control mb-3"
                            placeholder="মোবাইল নাম্বার">
                        <div class="text-danger small mb-2" id="error-client_phone"></div>

                        <label for="client_address">আপনার ঠিকানা লিখুন ( যেখান থেকে আপনি পণ্যটি গ্রহণ করবেন ):</label>
                        <textarea name="client_address" id="client_address" cols="30" rows="5" class="form-control mb-1"
                            placeholder="আপনার ঠিকানা..."></textarea>
                        <div class="text-danger small mb-2" id="error-client_address"></div>
                    </div>

                    <!-- Address Fields -->
                    <div class="col-xl-5 p-3">
                        <label for="division">আপনার বিভাগ নির্বাচন করুন</label>
                        <select name="division_id" id="division" class="form-control mb-1">
                            <option value="" disabled selected>-- বিভাগ নির্বাচন করুন --</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division['id'] }}">{{ $division['name'] }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger small " id="error-division_id"></div>

                        <label for="district" class="mt-3">আপনার জেলা নির্বাচন করুন</label>
                        <select name="district_id" id="district" class="form-control">
                            <option value="" disabled selected>-- জেলা নির্বাচন করুন --</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district['id'] }}">{{ $district['name'] }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger small mb-2" id="error-district_id"></div>

                        {{-- <label for="upazilla">Upazilla</label>
                        <select name="upazilla_id" id="upazilla" class="form-control mb-1">
                            <option value="" disabled selected>-- select upazilla --</option>
                            @foreach ($upazillas as $upazilla)
                            <option value="{{ $upazilla['id'] }}">{{ $upazilla['name'] }}</option>
                            @endforeach
                        </select>
                        <div class="text-danger small mb-2" id="error-upazilla_id"></div> --}}

                        <button type="submit" class="submit_order btn btn-primary w-100 mt-3">
                            অর্ডার কনফার্ম করুন
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    {{-- ORDER END --}}




    <!-- FAQ -->
    <section id="faq">
        <div class="container">


            <div class="header">
                <h4 class="text-center">আপনাদের কিছু প্রশ্ন এবং উত্তর</h4>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="accordion shadow-sm" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    প্রশ্ন ০১ঃ আতর লাগানোর পর কতক্ষণ পর্যন্ত ঘ্রাণ থাকে?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>সাধারণত সুতি কাপড়ে ব্যবহার করলে ঘ্রাণ ৩ থেকে ৮ ঘণ্টা পর্যন্ত স্থায়ী হয়
                                        ইনশাআল্লাহ্। তবে প্রতিবার কমপক্ষে ০.২৫–০.৩০ মিলি পরিমাণ আতর ব্যবহার করাই উত্তম
                                        ফলাফল দেয়।</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    প্রশ্ন ০২ঃ  আতরের ঘ্রাণ আশপাশে কতটুকু ছড়ায়?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p> যদি সঠিকভাবে ও পরিমিত আতর ব্যবহার করা হয়, তবে সাধারণত ৩ থেকে ৫ ফুট দূর পর্যন্ত
                                        এর মনোমুগ্ধকর ঘ্রাণ ছড়িয়ে পড়ে ইনশাআল্লাহ্।</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    প্রশ্ন ৩ঃ আতর ব্যবহারে কি জামায় দাগ পড়ার ঝুঁকি থাকে?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>না ইনশাআল্লাহ্‌। যদি সরাসরি কাপড়ে না দিয়ে আগে হাতের তালুতে নিয়ে তারপর জামায়
                                        লাগানো হয়, তবে দাগ পড়ার আশঙ্কা থাকে না। সঠিকভাবে ব্যবহার করলেই কাপড় থাকে
                                        দাগমুক্ত।</p>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    প্রশ্ন ০৪ঃ আতরের বোতল কিভাবে সংরক্ষণ করলে ঘ্রাণ ভালো থাকবে?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>আতরের ঘ্রাণ দীর্ঘদিন ধরে ভালো রাখতে হলে বোতলটি সরাসরি রোদ ও অতিরিক্ত তাপ থেকে
                                        দূরে রাখতে হবে। ঠান্ডা ও শুকনো স্থানে সংরক্ষণ করলেই ঘ্রাণ বজায় থাকবে ২–৩ বছর
                                        পর্যন্ত ইনশাআল্লাহ্।</p>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                {{-- <div class="col-xl-5">
                    <img style="height: 340px;" class="img-fluid" src="./assets/images/faq.png" alt="" />
                </div> --}}
            </div>
        </div>
    </section>
    <!-- FAQ END -->


    <!-- FOOTER -->
    <footer id="footer" style="background:#000; color:#eee; padding: 40px 0; font-family: 'Roboto', sans-serif;">
        <div class="container">
            <div class="row gy-4 justify-content-between align-items-center">

                <!-- Logo & Description -->
                <div class="col-md-4 text-center text-md-start"
                    style="text-align: center !important;
    display: flex
;
    flex-direction: column;
    justify-content: center;
    text-align: center;
    align-items: center;">
                    <img src="https://raafidan.com/images/raafidan.png  " alt="Brand Logo"
                        style="width: 100px; filter: brightness(0) invert(1);" />
                    <p style="margin-top: 15px; font-size: 1rem; max-width: 280px; ">
                        প্রিমিয়াম ঘ্রাণ এবং আতরের সংকলন যা আপনার প্রতিদিনের মুহূর্তকে করে তোলে বিশেষ।
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-4 text-center text-md-start">
                    <h5 style="font-weight: 700; margin-bottom: 15px;">দ্রুত লিঙ্কসমূহ</h5>
                    <ul style="list-style: none; padding: 0; line-height: 2;">
                        <li><a href="#product"
                                style="color: #eee; text-decoration: none; transition: color 0.3s;">প্যাকেজ
                                সমূহ</a></li>
                        <li><a href="#order"
                                style="color: #eee; text-decoration: none; transition: color 0.3s;">অর্ডার
                                করুন</a>
                        </li>
                        <li><a href="#faq"
                                style="color: #eee; text-decoration: none; transition: color 0.3s;">প্রশ্ন ও
                                উত্তর</a></li>
                        <li><a href="#review"
                                style="color: #eee; text-decoration: none; transition: color 0.3s;">ক্রেতাদের
                                মতামত</a></li>
                    </ul>
                </div>

                <!-- Contact & Social -->
                <div class="col-md-3 text-center text-md-start">
                    <h5 style="font-weight: 700; margin-bottom: 15px;">যোগাযোগ করুন</h5>
                    <p style="margin: 0 0 10px;">
                        📞 ফোন:
                        <a href="tel:+01775333625" style="color: #eee; text-decoration: none;">
                            ০১৭৭৫-৩৩৩৬২৫
                        </a>
                    </p>
                    <p style="margin: 0 0 10px;">
                        ✉️ ইমেইল:
                        <a href="mailto:raafidan@gmail.com" style="color: #eee; text-decoration: none;">
                            raafidan@gmail.com
                        </a>
                    </p>
                    <div style="margin-top: 10px;">
                        <a target="_blank" href="https://www.facebook.com/RaafidanStore"
                            style="color: #eee; margin-right: 15px; font-size: 1.5rem; transition: color 0.3s; text-decoration: none;">
                            <iconify-icon icon="mdi:facebook" width="24" height="24"></iconify-icon>
                        </a>
                        <a target="_blank" href="https://wa.me/8801775333625"
                            style="color: #eee; font-size: 1.5rem; transition: color 0.3s; text-decoration: none;">
                            <iconify-icon icon="mdi:whatsapp" width="24" height="24"></iconify-icon>
                        </a>
                    </div>
                </div>

            </div>

            <hr style="border-color: #222; margin: 30px 0;" />

            <div class="text-center" style="font-size: 0.9rem; color: #666;">
                &copy; ২০২৫ রাফিদান | সর্বস্বত্ব সংরক্ষিত
            </div>
        </div>
    </footer>

    {{-- FOOTER END --}}

    <!-- JS Files -->
    <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="./assets/js/font-awsome.js"></script>
    <script src="./assets/js/slick.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/assets/js/nice-select2.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/3.0.0/iconify-icon.min.js"></script>
    <script src="./assets/js/app.js"></script>



<script>
    /**
     * Convert English numbers to Bangla numbers
     */
    function convertToBanglaNumber(num) {
        const enToBn = {
            "0": "০",
            "1": "১",
            "2": "২",
            "3": "৩",
            "4": "৪",
            "5": "৫",
            "6": "৬",
            "7": "৭",
            "8": "৮",
            "9": "৯",
            ".": "."
        };
        return num
            .toString()
            .split("")
            .map(c => enToBn[c] !== undefined ? enToBn[c] : c)
            .join("");
    }

    /**
     * Convert Bangla numbers back to English numbers
     */
    function convertToEnglishNumber(bnNumberStr) {
        const bnToEn = {
            "০": "0",
            "১": "1",
            "২": "2",
            "৩": "3",
            "৪": "4",
            "৫": "5",
            "৬": "6",
            "৭": "7",
            "৮": "8",
            "৯": "9",
            ".": "."
        };
        return bnNumberStr
            .split("")
            .map(c => bnToEn[c] !== undefined ? bnToEn[c] : c)
            .join("");
    }

    $(document).ready(function() {
        var options = {
            searchable: true,
            placeholder: 'select',
            searchtext: 'খুঁজুন',
            selectedtext: 'নির্বাচিত'
        };

        if ($("#division").length) {
            NiceSelect.bind(document.getElementById("division"), options);
        }
        if ($("#district").length) {
            NiceSelect.bind(document.getElementById("district"), options);
        }
        if ($("#upazilla").length) {
            NiceSelect.bind(document.getElementById("upazilla"), options);
        }

        $(".package-checkbox").on("change", function() {
            let checked = $(this).is(":checked");
            let productCard = $(this).closest(".product-card");
            let qtyInput = productCard.find(".qty-input");
            let btnIncrement = productCard.find(".btn-increment");
            let btnDecrement = productCard.find(".btn-decrement");

            qtyInput.prop("disabled", !checked);
            btnIncrement.prop("disabled", !checked);
            btnDecrement.prop("disabled", !checked);

            if (!checked) {
                qtyInput.val(1);
            }
            calculateTotal();
        });

        $(".btn-increment").on("click", function() {
            let input = $(this).siblings(".qty-input");
            let currentVal = parseInt(input.val()) || 1;
            input.val(currentVal + 1).trigger("input");
        });

        $(".btn-decrement").on("click", function() {
            let input = $(this).siblings(".qty-input");
            let currentVal = parseInt(input.val()) || 1;
            if (currentVal > 1) {
                input.val(currentVal - 1).trigger("input");
            }
        });

        $(".qty-input").on("input", function() {
            let val = parseInt($(this).val());
            if (isNaN(val) || val < 1) {
                $(this).val(1);
            }
            calculateTotal();
        });

        function calculateTotal() {
            let total = 0;
            $(".package-checkbox:checked").each(function() {
                let price = parseFloat($(this).data("price")) || 0;
                let qty = parseInt($(this).closest(".product-card").find(".qty-input").val()) || 1;
                total += price * qty;
            });
            $("#total_price").text("৳ " + convertToBanglaNumber(total.toFixed(2)));
        }

        $("form").on("submit", function(e) {
            e.preventDefault();

            $(".text-danger").html('');
            $(".form-control").removeClass('is-invalid');

            let name = $("#client_name").val().trim();
            let phone = $("#client_phone").val().trim();
            let address = $("#client_address").val().trim();
            let division = $("#division").val();
            let district = $("#district").val();
            let upazilla = $("#upazilla").val();

            if (!name) {
                $("#error-client_name").text("নাম আবশ্যক।");
                $("#client_name").addClass("is-invalid");
            }
            if (!phone) {
                $("#error-client_phone").text("ফোন নম্বর আবশ্যক।");
                $("#client_phone").addClass("is-invalid");
            }
            if (!address) {
                $("#error-client_address").text("ঠিকানা আবশ্যক।");
                $("#client_address").addClass("is-invalid");
            }
            if (!division) {
                $("#error-division_id").text("বিভাগ নির্বাচন করুন।");
                $("#division").addClass("is-invalid");
            }
            if (!district) {
                $("#error-district_id").text("জেলা নির্বাচন করুন।");
                $("#district").addClass("is-invalid");
            }

            if (!name || !phone || !address || !division || !district) {
                Swal.fire({
                    icon: 'warning',
                    title: 'সমস্যা',
                    text: 'দয়া করে সব আবশ্যক তথ্য পূরণ করুন।'
                });
                return;
            }

            let packages = [];
            $(".package-checkbox:checked").each(function() {
                let pname = $(this).data("name");
                let price = parseFloat($(this).data("price"));
                let qty = parseInt($(this).closest(".product-card").find(".qty-input").val());
                packages.push({
                    name: pname,
                    price: price,
                    qty: qty
                });
            });

            if (packages.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'প্যাকেজ নির্বাচন করুন',
                    text: 'অন্তত একটি প্যাকেজ নির্বাচন করুন।',
                });
                return;
            }

            // ✅ Convert Bangla numerals back to English before parsing
            let totalPriceText = $("#total_price").text().replace(/[^\u09E6-\u09EF.]/g, '');
            let totalPriceEn = convertToEnglishNumber(totalPriceText);
            let totalPrice = parseFloat(totalPriceEn);

            const btn = $(this).find("button[type='submit']");
            btn.prop("disabled", true).text("অপেক্ষা করুন...");

            $.ajax({
                url: "{{ route('frontend.order.store') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    client_name: name,
                    client_phone: phone,
                    client_address: address,
                    division_id: division,
                    district_id: district,
                    upazilla_id: upazilla,
                    packages: packages,
                    total_price: totalPrice
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'অর্ডার সম্পন্ন!',
                        text: response.message
                    }).then(() => {
                        window.location.href =
                            "{{ route('frontend.order.index') }}";
                    });
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors;
                    if (errors) {
                        $.each(errors, function(key, value) {
                            let errorSelector = "#error-" + key;
                            if ($(errorSelector).length) {
                                $(errorSelector).html(value[0]);
                                $("#" + key).addClass("is-invalid");
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'ত্রুটি!',
                            text: 'আবার চেষ্টা করুন।'
                        });
                    }
                },
                complete: function() {
                    btn.prop("disabled", false).text("Submit Order");
                }
            });
        });

        $(".buy-now-btn").on("click", function(e) {
            e.preventDefault();

            let productId = $(this).data("product-id");
            let targetCheckbox = $("#" + productId);

            $('html, body').animate({
                scrollTop: $("#order").offset().top - 50
            }, 500);

            if (!targetCheckbox.prop("checked")) {
                targetCheckbox.prop("checked", true).trigger("change");
            }
        });
    });

    $(".product-list").each(function() {
        $(this).children("li").show();
        $(this).children("li:gt(1)").hide();
    });

    $(".toggle-btn").on("click", function(e) {
        e.preventDefault();

        let targetId = $(this).data("target");
        let $list = $(targetId);
        let $hiddenItems = $list.children("li:gt(1)");

        if ($hiddenItems.is(":visible")) {
            $hiddenItems.slideUp();
            $(this).text("আরও দেখুন");
        } else {
            $hiddenItems.slideDown();
            $(this).text("কম দেখুন");
        }
    });
</script>






</body>

</html>
