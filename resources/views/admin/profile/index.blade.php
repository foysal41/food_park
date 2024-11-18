@extends('admin.layouts.master');

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update User Setting</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    {{--

                    প্লেসহোল্ডার ইমেজ দেখানো:

                    - পেজ লোড হওয়ার সময় একটি ডাইনামিক প্লেসহোল্ডার ইমেজ দেখানো হবে।
                    - প্লাগইনটি ডিফল্ট ইমেজ সেট করার অপশন না দেওয়ায়, এটি আমরা জাভাস্ক্রিপ্ট দিয়ে ম্যানুয়ালি সেট করবো।
                    স্ক্রিপ্ট অ্যাড করা:

                    - admin layout master.blade.php-এ বডি ট্যাগের আগে একটি stack ডিরেক্টিভ যোগ করা হবে।
                    এখানে আমরা "scripts" নামে একটি কী ব্যবহার করবো, যাতে ডাইনামিক স্ক্রিপ্টগুলো লোড হয়।
                    ইনডেক্স ফাইল আপডেট:

                    - index.blade.php-এ একটি push ডিরেক্টিভ ব্যবহার করা হবে, যেখানে "scripts" কী যোগ করা হবে।

        --}}

                  <div class="form-group">
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="avatar" id="image-upload" />
                    </div>
                  </div>



                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="{{ auth()->user()->email }}">
                    </div>

                    <button class="btn btn-primary" type="submit"> Save Change </button>
                </form>

            </div>
        </div>


        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Password</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" name="current_password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>New Password </label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <button class="btn btn-primary" type="submit"> Save Change </button>
                </form>

            </div>
        </div>
    </section>
@endsection

@push('scripts')

{{--  কোডটি ডাইনামিক ইমেজ সেটআপ করার জন্য ব্যবহৃত হয়েছে। এখানে যা হচ্ছে তা সহজভাবে:

ইমেজ প্রিভিউ ক্লাস সিলেক্ট করা:

জাভাস্ক্রিপ্ট ব্যবহার করে .image-preview ক্লাস সিলেক্ট করা হয়েছে। এটি সেই div যেখানে ইমেজ থাম্বনেইল দেখা যাবে।
ব্যাকগ্রাউন্ড ইমেজ সেট করা:

css() ফাংশন ব্যবহার করে .image-preview-এর ব্যাকগ্রাউন্ড ইমেজ সেট করা হয়েছে।
ডাইনামিক ইমেজ ইউআরএল যোগ করা:

ইমেজ ইউআরএল ডাইনামিক ভাবে তৈরি করা হয়েছে। auth()->user()->avatar ফাংশন ব্যবহার করে লগ ইন করা ইউজারের অ্যাভাটার ইমেজের পাথ পাওয়া হয়েছে।
এই পাথ asset() ফাংশনের মাধ্যমে পূর্ণ ইউআরএল এ রূপান্তরিত করা হয়েছে।

    Extra of auth()->user()->avatar  details expained
     auth() ফাংশন: এটি Laravel এর একটি ফাংশন, যা বর্তমান লগ ইন করা ইউজারের তথ্য পেতে ব্যবহৃত হয়।

    user() মেথড: auth()->user() এর মাধ্যমে আপনি বর্তমানে লগ ইন করা ইউজারের সম্পূর্ণ তথ্য (যেমন নাম, ইমেইল, প্রোফাইল ইমেজ, ইত্যাদি) পাবেন।

    avatar প্রপার্টি: auth()->user()->avatar ব্যবহার করে আপনি সেই ইউজারের প্রোফাইল ইমেজ বা অ্যাভাটার পাথ পাবেন। এটি সাধারণত ডাটাবেসে সংরক্ষিত ইউজারের ইমেজ ফাইলের লোকেশন।

    উদাহরণ:
    ধরি, ডাটাবেসে ইউজারের avatar কলামে একটি মান আছে images/avatar1.jpg।
    তাহলে auth()->user()->avatar এই মানটি ফিরিয়ে দেবে: images/avatar1.jpg।



--}}
    <script>
        $(document).ready(function(){
            $('.image-preview').css(
                'background-image' : 'url({{ asset(auth()->user()->avatar) }})',
                'background-size' :'cover',
                'background-position': 'center center'
            )
        })
    </script>

@endpush
