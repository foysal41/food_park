<?php
/*
--------------------|143. 1_General Settings - Creating Necessary Files and Designs |----------------

১. General Settings Module তৈরির প্রয়োজনীয়তা:
    কারেন্সি সিম্বলের মতো স্ট্যাটিক ফিচার ডাইনামিক করতে হবে, যেমন ডলার সাইনকে ইউরো সাইনে পরিবর্তন।
    সাইটের নাম, লোগো, এবং থিম কালার পরিবর্তন করার ব্যবস্থা থাকবে।


২. General Settings Module তৈরির স্টেপস:
 -সাইডবারে নতুন Settings অপশন যোগ করা:
    কোডে sidebar.blade.php এ নতুন আইটেম যোগ করা।
    সেটিংস রুট তৈরি করা এবং ফ্রন্টএন্ডে দেখানো।

 -মডেল, মাইগ্রেশন এবং কন্ট্রোলার তৈরি:

    php artisan make:model Setting -m দিয়ে মডেল এবং মাইগ্রেশন তৈরি।
    php artisan make:controller Admin/SettingController দিয়ে কন্ট্রোলার তৈরি।
    ডিফল্ট ডেটার জন্য php artisan make:seeder SettingSeeder তৈরি।

-রাউট সেটআপ এবং ভিউ ফাইল তৈরি:

    admin.php ফাইলে setting.index রুট তৈরি।
    SettingController এ index() মেথড তৈরি এবং admin/settings/index.blade.php ভিউ লিংক করা।
    slider index code copy করে setting এর মদ্ধে রাখব। এই খানে কন ডাটাটেবিল তৈরি করা লাগবে না।

সেটিংস পেজ ডিজাইন করা:

HTML টেমপ্লেট থেকে একটি ট্যাব ডিজাইন ব্যবহার করা।
 ট্যাব ব্যবহার করে সেটিংস বিভিন্ন ক্যাটাগরিতে বিভক্ত (যেমন: জেনারেল সেটিংস, থিম সেটিংস)।

৩. ডাইনামিক ফিচার তৈরির পরিকল্পনা:
    ট্যাব অনুযায়ী বিভিন্ন সেটিংস view দেখানোর জন্য ট্যাব ডিজাইনের ID ব্যবহার।

    ভবিষ্যতে প্রতিটি ট্যাবের মধ্যে ফর্ম যোগ করা হবে, যেখানে অ্যাডমিন সাইটের বিভিন্ন সেটিংস ডাইনামিকভাবে পরিবর্তন করতে পারবেন।

৪. পরবর্তী কাজ:
জেনারেল সেটিংস ফর্ম তৈরি করা।
কারেন্সি, নাম, এবং অন্যান্য ফিচার ডাইনামিক করার কোড লেখা।

*/



/*
--------------------|144. 2_General Settings - Working with Update Form (Part - 1) |----------------

ট্যাবের কন্টেন্ট পরিবর্তন করা:
    ট্যাব বাটনে ক্লিক করলে নির্দিষ্ট ডিভের কন্টেন্ট পরিবর্তন হয়। এজন্য id ব্যবহার করা হয় এবং সেই id ডিভেও সংযুক্ত করতে হয়।

জেনারেল সেটিংস ফর্ম তৈরি:
    ফর্ম তৈরি করতে card এবং form-group ব্যবহার করা হয়েছে। প্রতিটি ইনপুটের জন্য লেবেল এবং ইনপুট ফিল্ড তৈরি করা হয়েছে।
    যেমন:-
    সাইটের নামের জন্য text ইনপুট।
    ডিফল্ট কারেন্সির জন্য select ইনপুট।
    কারেন্সি আইকন এবং পজিশনের জন্য row এবং col-md-6 ব্যবহার।


বাটন এবং ফর্ম কাঠামো:
    বাটনের type="submit" ব্যবহার করা হয়েছে এবং ক্লাস btn-primary দিয়ে ডিজাইন করা হয়েছে।
    ফর্মের ভেতরে থাকা ইনপুটগুলোকে সুনির্দিষ্ট নাম (name attributes) দেওয়া হয়েছে, যেমন: site_name, site_currency_icon

রুট তৈরি এবং সাবমিশন:
    ফর্ম সাবমিট করার জন্য PUT মেথড ব্যবহার করা হয়েছে এবং রুটের URL তৈরি করা হয়েছে, যেমন: /general-setting.
    রুটে অ্যাকশনের জন্য updateGeneralSetting মেথড ডিফাইন করা হয়েছে।


updateOrCreate মেথড (updateGeneralSetting):
   SettingController.php এর মদ্ধে dd করে check করা হয়েছে।  ফর্ম সাবমিট করার পর ডেটা প্রিন্ট করে ($request->all()) চেক করা হয়েছে যে, ইনপুট সঠিকভাবে পাঠানো হচ্ছে কিনা।


*/


/*
--------------------|145. 3_General Settings - Working with Update Form (Part - 2)|----------------

১. ফর্ম ডেটা ভ্যালিডেশন
    ভ্যালিডেশন করা: validate মেথড ব্যবহার করে ফর্ম ডেটা যাচাই করা হয়েছে।
    -name ফিল্ড: required, max: 255।
    -default_currency ফিল্ড: required, max: 4 (যেমন: USD)।
    -currency_icon ফিল্ড: required, এক অক্ষরের জন্য (যেমন: $)।
    -position ফিল্ড: required, max: 255।


২. ডেটাবেজ টেবিল আপডেট করা
    টেবিল তৈরি: settings নামে একটি টেবিল রয়েছে।
    -এতে key এবং value নামে দুটি কলাম আছে।
    -key: ইনপুট ফিল্ডের নাম স্টোর হবে।
    -value: ইনপুট ফিল্ডের ভ্যালু স্টোর হবে।
    -value ফিল্ডকে nullable করা হয়েছে, কারণ কিছু ক্ষেত্রে এটি খালি থাকতে পারে।
    php artisan migrate



৩. ডেটা সেভ করার প্রক্রিয়া
    ভ্যালিড ডেটা validated_data ভ্যারিয়েবলে রাখা হয়েছে।
    loop চালিয়ে: প্রতিটি কীর জন্য updateOrCreate মেথড ব্যবহার করা হয়েছে:
    - যদি key আগে থেকে থাকে: তার মান আপডেট করা হবে।
    - যদি key না থাকে: নতুন এন্ট্রি তৈরি করা হবে।
বিসারিতঃ https://docs.google.com/document/d/14rgoxthxChWnU9Ix4bqWO8QFgHn7fTcvyQFCfSO--L4/edit?usp=sharing

৪. setting model এর মদ্ধে table er column $fillable করতে হবে। না হলে Field key doesn't have a default value error আসতে পারে।

*/




/*
--------------------|146. 4_General Settings - Accessing Settings Globally in Project (Part - 1)|----------------

১. সেটিংস ডেটা গ্লোবালি অ্যাক্সেসযোগ্য করা
    Laravel প্রজেক্টের যেকোনো জায়গা থেকে সেটিংস টেবিলের ডেটা অ্যাক্সেস করা দরকার হবে।
    এজন্য সেটিংস টেবিলের ডেটাকে গ্লোবালি অ্যাক্সেসযোগ্য করতে হবে।
    এটি গুরুত্বপূর্ণ কারণ এতে ডেটা বারবার ফেচ না করে ক্যাশ থেকে ব্যবহার করা যাবে।


২. Laravel Debugbar প্যাকেজ ইনস্টল
    Laravel Debugbar প্যাকেজ ডিবাগিং সহজ করে।
    এটি কোয়েরি, ভিউ, মেমোরি কনজাম্পশন, এবং লোড টাইম চেক করতে সহায়তা করে।
    ইনস্টলেশন শেষে ডিবাগবার নিচের অংশে প্রদর্শিত হয়।
    composer require barryvdh/laravel-debugbar --dev


৩. সার্ভিস ক্লাস তৈরি করা
    App/Services/SettingsService.php নামে একটি ক্লাস তৈরি করা হয়েছে।
    এই ক্লাসে গুরুত্বপূর্ণ মেথডগুলো ডিফাইন করা হয়েছে যা প্রজেক্টের বিভিন্ন জায়গায় ব্যবহার করা যাবে।
    setting er ডাটা cache e save করবো। পরবর্তীতে ইউজার যখন রিকোয়েস্ট করবে তখন cache থেকে ডাটা গুলো তুলে দিব


4. ক্যাশ ব্যবহার করা getSettings() মেথড:  setting  > settingService.php
Details: https://docs.google.com/document/d/1k2MeW8Bkou7PuPtVkgNvEOShLatN8kB5CEe3fVI6kkw/edit?usp=sharing
    ডেটাবেস থেকে সেটিংস ডেটা ফেচ করে একটি অ্যারে ফরম্যাটে রিটার্ন করে।
    ক্যাশ ব্যবহার করা হয়েছে যাতে ডেটা বারবার ডেটাবেস থেকে না ফেচ হয়।

    rememberForever মেথড:
        ডেটা ক্যাশে স্থায়ীভাবে সংরক্ষণ করে।
        নতুন ডেটা যোগ বা আপডেট করার সময় পুরানো ক্যাশ ক্লিয়ার করতে হবে।


5. গ্লোবাল সেটিংস সংরক্ষণ করা setGlobalSettings() মেথড:
    অ্যাপ্লিকেশন কনফিগারেশনে (config) সেটিংস ডেটা সংরক্ষণ করে।
    এটি ব্যবহার করে গ্লোবালি যেকোনো জায়গায় ডেটা অ্যাক্সেস করা সম্ভব।


6. ক্যাশ ডেটা মুছে ফেলা clearCachedSettings() মেথড:
    পুরানো ক্যাশ ডেটা মুছে ফেলে।
    এটি তখনই দরকার হয় যখন ডেটা আপডেট বা পরিবর্তন করা হয়।
*/

/*
--------------------|147. 5_General Settings - Accessing Settings Globally in Project (Part - 2)|----------------


1. **Type Hinting (ধরন উল্লেখ করা)**
   - `clearCachedSettings()` এবং `getGlobalSetting()` মেথডে `void` টাইপ হিন্ট দেওয়া হয়েছে।

2. **Service Provider তৈরি করা**
   - `php artisan make:provider SettingsServiceProvider` কমান্ড চালিয়ে নতুন একটি সার্ভিস প্রোভাইডার তৈরি করা হয়েছে।
   - প্রোভাইডারটি `app/Providers` ফোল্ডারে থাকে।

3. **Register Method (সার্ভিস নিবন্ধন করা)**
   - `register()` মেথডে `app()->singleton()` ব্যবহার করে সার্ভিস (`SettingsService`) নিবন্ধন করা হয়েছে।
   - এই মেথডটি সার্ভিসকে একবার তৈরি করে অ্যাপ্লিকেশনের জন্য সংরক্ষণ করে।

4. **Boot Method (সার্ভিস চালু করা)**
   - `boot()` মেথডে `app()->make()` দিয়ে সার্ভিস ইনস্ট্যান্স তৈরি করা হয়েছে।
   - `setGlobalSettings()` মেথড কল করে কনফিগে সেটিংস ডেটা সংরক্ষণ করা হয়েছে।

5. **Config Helper ব্যবহার করা**
   - `config('settings.key_name')` ব্যবহার করে অ্যাপ্লিকেশনের যেকোনো স্থানে সেটিংস ডেটা অ্যাক্সেস করা যায়।
   - যেমনঃ `config('settings.site_name')` দিয়ে ডেটাবেজের `site_name` ভ্যালু পাওয়া গেছে।

6. **Cache ব্যবহার করা**
   - `cache()->get('settings')` দিয়ে ক্যাশে সংরক্ষিত সেটিংস ডেটা চেক করা হয়েছে।
   - ক্যাশে ডেটা সংরক্ষণ করা হলে সেটিংস টেবিল থেকে প্রতি রিকোয়েস্টে কোয়েরি চালানোর প্রয়োজন হয় না।

7. **Service Provider রেজিস্ট্রেশন**
   - `config/app.php` ফাইলের `providers` অ্যারের মধ্যে `SettingsServiceProvider` যোগ করা হয়েছে।

8. **Working Example (কাজ করছে কিনা পরীক্ষা)**
   - `PHP Artisan Tinker`-এ গিয়ে `config('settings.site_name')` ও `cache()->get('settings')` দিয়ে ডেটা রিটার্ন হচ্ছে কিনা পরীক্ষা করা হয়েছে।

*/


/*
--------------------|148. 6_General Settings - Showing Data at Settings Form|----------------
১. General Settings Form এ ডেটা দেখানো:ডাটাবেস থেকে স্টোর করা ডেটা General Settings ফর্মে দেখানো হবে।
    ডেটা config হেল্পার ফাংশন দিয়ে এক্সেস করা হচ্ছে, যেমন config('settings.site_name')।

২. ডাটাবেস থেকে ফিল্ডে ডেটা দেখানো:
    Site Name:
    -value অ্যাট্রিবিউটের মাধ্যমে settings.site_name ডেটা দেখানো হয়েছে। value="{{ config('settings.site_name') }}"
    Currency Icon:
    -value অ্যাট্রিবিউটের মাধ্যমে settings.site_currency_icon ডেটা দেখানো হয়েছে।
    Currency Position:
    -right বা left এর জন্য ডায়নামিকভাবে selected অ্যাট্রিবিউট যুক্ত করা হয়েছে।

৩. ডেটা আপডেট প্রসেস:
Save বাটনে ক্লিক করার পর ডেটা ডাটাবেসে আপডেট হয়।
ডাটাবেসে নতুন ডেটা সঠিকভাবে সেভ হচ্ছে, যেমন Food Park, $, এবং left।

৪. ক্যাশিং সমস্যা:
ডেটা আপডেট করার পরেও ফ্রন্টএন্ডে নতুন ডেটা দেখাচ্ছে না।
এর কারণ হলো, ডেটা ক্যাশ থেকে ফেচ হচ্ছে, এবং ক্যাশ আপডেট হয়নি।

৫. ক্যাশ ম্যানেজমেন্ট:
PHP Artisan Tinker ব্যবহার করে then \Cache::get('settings') ক্যাশ চেক করা হয়েছে।



*/



/*
--------------------|149. 7_General Settings - Forgetting Setting Cache|----------------

ইস্যু:
    ফর্ম আপডেট করলে ডাটাবেসে নতুন ডাটা আপডেট হচ্ছে। কিন্তু ফর্মের ইনপুট ফিল্ডে পুরানো ডাটা দেখাচ্ছে।
    এর কারণ হলো ক্যাশে মেমোরিতে পুরানো ডাটা সংরক্ষিত রয়েছে। আমারা জানি config key ব্যবহার করে  ডাটা তুকে input এ দেহাচ্ছি।

ক্যাশের ব্যবহার:
    SettingService.php-এ getSettings মেথডে ডাটা ক্যাশে মেমোরিতে সংরক্ষিত হচ্ছে। এই মেথডটি rememberForever ব্যবহার করে ডাটা চিরস্থায়ীভাবে ক্যাশে রাখছে।

ইস্যু সমাধান পদ্ধতি:
ফর্ম আপডেট করার সময়  পুরানো ক্যাশ ডাটা মুছে ফেলা হবে। then আপডেট মেথডে clearSettingsCache কল করা হবে।
clearSettingsCache মেথডটি Cache::forget('settings') ব্যবহার করে ক্যাশ ডাটা মুছে দেয়।

কাজের প্রক্রিয়া:
admin> settingController.php, এই মদ্ধে
        $settingsServices = app(SettingsService::class);
        $settingsServices->clearCachedSettings();

*/
