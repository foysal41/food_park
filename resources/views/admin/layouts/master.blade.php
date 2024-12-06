<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>General Dashboard &mdash; Foysal</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/toastr.min.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.css') }}">



    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('admin.layouts.sidebar');

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2025 <div class="bullet"></div> Design By <a href="https://foysaljaman.com/">Foysal
                        Jaman</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>


    <!-- JS Libraries -->
    <script src="{{ asset('admin/assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Page Specific JS File -->

    <!-- Template JS Files -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>






    <!-- Show dynamic validation message -->

    <script>
        toastr.options.progressBar = true;

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>

    {{-- এই কোড টুকু public>admin>js>page>features-post
features-post-create>fretures-post-create.js  থেকে কপি করে আনতে হবে --}}
    <script>
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });


        // Set csrf at ajax header
        /*$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });*/

        // check করলাম csrf token কাজ করছে কিনা। console এ যেয়ে প্রিন্ট করলাম।
        //console.log($.ajaxSetup().headers);

        $(document).ready(function() {

            $('body').on('click', '.delete-item', function(e) {
                e.preventDefault();
                //আমারা  href attribute কে variable এর মদ্ধে store করলাম
                let url = $(this).attr('href');
                //console.log(url);
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {_token: "{{ csrf_token() }}"},
                            success: function(response) {
                                if (response.status == 'success') {
                                    toastr.success(response.message);

                                    //$('#slider-table').DataTable().ajax.reload();
                                    window.location.reload();

                                } else if (response.status == 'error') {
                                    toastr.error(response.message);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(
                                error);
                            }
                        });



                    }
                });
            })

        });


    </script>

    @stack('scripts')


    {{--
  -----------------   Admin - Login Page Mastering (Part 2)------------------
এই নির্দেশনায় একটি অ্যাডমিন লগইন ফর্ম তৈরি এবং এর ত্রুটিসমূহ সমাধানের ধারাবাহিক পদক্ষেপগুলো বর্ণনা করা হয়েছে। সংক্ষেপে বলতে গেলে, এখানে কয়েকটি মূল কাজ করা হয়েছে যা নিচে ব্যাখ্যা করা হলো:

ইনপুট সেটআপ: এখানে প্রথমে ইমেইল এবং পাসওয়ার্ড ইনপুট সেট করা হয়েছে। ইমেইল ইনপুটের জন্য name="email" এবং পাসওয়ার্ড ইনপুটের জন্য type="password" এবং name="password" ব্যবহার করা হয়েছে।

অপ্রয়োজনীয় উপাদান সরানো: লগইন পেজ থেকে সোশ্যাল আইকন এবং "Create an account" টেক্সট বাদ দেওয়া হয়েছে, কারণ অ্যাডমিন প্যানেলে রেজিস্ট্রেশনের প্রয়োজন নেই। কপিরাইট অংশেও নিজের কোম্পানির নাম যোগ করা হয়েছে।

টোস্টার (Toaster) আলার্ট সংযোজন: ভুল ইমেইল বা পাসওয়ার্ড দিলে একটি টোস্টার (Toaster) নোটিফিকেশন দেখানোর জন্য CSS ও JavaScript ফাইল যোগ করা হয়েছে। এই ফাইলগুলোকে সঠিকভাবে অ্যাডমিন পেজে সংযুক্ত করার মাধ্যমে ত্রুটি বার্তা প্রদর্শনের ফাংশনালিটি যোগ করা হয়েছে।

রুট কনফ্লিক্ট সমাধান: ইউজার ও অ্যাডমিন উভয়ের জন্য আলাদা ড্যাশবোর্ড থাকার কারণে রুট কনফ্লিক্ট দেখা দেয়। এক্ষেত্রে, সঠিক রুট ফাইল ও পাথ সঠিকভাবে পুনঃস্থাপন করে কনফ্লিক্ট সমাধান করা হয়েছে।

লগইন ফাংশন টেস্ট: ভুল এবং সঠিক অ্যাডমিন ক্রেডেনশিয়াল দিয়ে টেস্ট করে দেখা হয়েছে যে লগইন সিস্টেমটি কাজ করছে কিনা। সফল লগইন হলে ইউজারকে অ্যাডমিন প্যানেলে নিয়ে যাওয়া হয়, যা সফলভাবে সম্পন্ন হয়েছে।

সহজ করে:
এই লেখাটিতে, অ্যাডমিন লগইন পেজটি তৈরি করার জন্য বিভিন্ন ইনপুট এবং টোস্টার আলার্ট যুক্ত করা হয়েছে। অতিরিক্ত টেক্সট বাদ দেওয়া হয়েছে এবং ভুল রুট সমস্যাগুলো ঠিক করা হয়েছে। অবশেষে, সঠিক অ্যাডমিন ক্রেডেনশিয়াল দিয়ে লগইন করলে অ্যাডমিন ড্যাশবোর্ডে নিয়ে যাওয়া হচ্ছে যা সফলভাবে কাজ করছে। --}}

</body>

</html>
