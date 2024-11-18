<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-social/bootstrap-social.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.min.css') }}">

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

    {{-- এই পেজে আমরা অ্যাডমিন লগইন ফর্ম নিয়ে কাজ শুরু করব। মূলত, ইউজার এবং অ্যাডমিনের জন্য একই অথেনটিকেশন সিস্টেম ব্যবহার করছি, তাই সাধারণ ইউজার এবং অ্যাডমিন উভয়ই একই লগইন পেজ ব্যবহার করতে পারে। তবে, অ্যাডমিনের জন্য আলাদা একটি লগইন পেজ তৈরি করতে চাই যাতে আলাদা ডিজাইনের মাধ্যমে এটি আলাদা ভাবে উপস্থাপন করা যায়।

প্রথমে, আমরা resources/views/admin ফোল্ডারের মধ্যে একটি নতুন auth ফোল্ডার তৈরি করব এবং সেখানে অ্যাডমিনের login পেজ তৈরি করব। এরপর resources/routes/admin.php নামে একটি route তৈরি করব এবং এই রুটে নতুন অ্যাডমিন লগইন পেজটি দেখাব।

এখানে কন্ট্রোলারে index মেথডের মাধ্যমে এই পেজটি রিটার্ন করব। যেহেতু এই রুটে সাধারণ অথেনটিকেশন মিডলওয়্যার সমস্যা সৃষ্টি করতে পারে, তাই এই রুটটি web.php তে নিয়ে আসব যাতে auth ছাড়া অ্যাক্সেস করা যায়।

এভাবে অ্যাডমিনের জন্য আলাদা একটি লগইন পেজ থাকবে যা একই অথেনটিকেশন সিস্টেম ব্যবহার করবে। --}}
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="assets/img/stisla-fill.svg" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                                
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="1" required autofocus value="{{ old('email') }}">
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="auth-forgot-password.html" class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>

                        {{-- অপ্রয়োজনীয় উপাদান সরানো: লগইন পেজ থেকে সোশ্যাল আইকন এবং "Create an account" টেক্সট বাদ দেওয়া হয়েছে, কারণ অ্যাডমিন প্যানেলে রেজিস্ট্রেশনের প্রয়োজন নেই।  --}}
                        <div class="simple-footer">
                            Copyright Foysal Jaman 2024
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>

    <!-- JS Libraries -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/toastr.min.js') }}"></script>


    <script>
        toastr.options.progressBar = true;
        @if($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}');
            @endforeach
        @endif
    </script>
</body>

</html>
