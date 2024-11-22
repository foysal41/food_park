
{{-- পাসওয়ার্ড চেঞ্জ করার এই সমস্ত কোড আলাদা একটা ফাইল থেকে লোড করাচ্ছি --}}

<div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
aria-labelledby="v-pills-settings-tab">
<div class="fp_dashboard_body fp__change_password">
    <div class="fp__review_input">
        <h3>change password</h3>
        <div class="comment_input pt-0">
            <form method="POST" action="{{ route('profile.password.update') }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-6">
                        <div class="fp__comment_imput_single">
                            <label>Current Password</label>
                            <input type="password" placeholder="Current Password" name="current_password">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="fp__comment_imput_single">
                            <label>New Password</label>
                            <input type="password" placeholder="New Password" name="password">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="fp__comment_imput_single">
                            <label>confirm Password</label>
                            <input type="password" placeholder="Confirm Password" name="password_confirmation">
                            {{-- সবার name add করা হলে route এ চলে যাব form handel করার জন্য --}}
                        </div>
                        <button type="submit"
                            class="common_btn mt_20">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


