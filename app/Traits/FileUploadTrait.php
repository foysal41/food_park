<?php

/*
    এই প্রক্রিয়াটি ইমেজ আপলোড হ্যান্ডলিং করার জন্য ব্যবহৃত হয়েছে। বাংলায় এর কাজ সহজভাবে ব্যাখ্যা করা হলো:

1. প্রোফাইল আপডেট লজিক:

admin>ProfileController-এ একটি updateProfile মেথড রয়েছে, যা প্রোফাইল আপডেট করার জন্য ব্যবহৃত হচ্ছে।
এই মেথডের মধ্যে ইমেজ আপলোড লজিক সরাসরি যুক্ত না করে, এটি আলাদা একটি ট্রেট (Trait) ফাইলে রাখা হবে।

2. ইমেজ আপলোড প্রক্রিয়া:

ইমেজ ফাইলটি স্টোরেজে সংরক্ষণ করা হবে।
ইমেজ সংরক্ষণের পাথ (path) ডাটাবেসে সেভ করা হবে।

3. ট্রেট ফাইল তৈরি করা:

app ফোল্ডারের মধ্যে একটি নতুন ফোল্ডার তৈরি করা হয়েছে, যার নাম Traits।
এর মধ্যে একটি নতুন ফাইল তৈরি করা হয়েছে, যার নাম FileUploads.php।
এই ফাইলটি ইমেজ আপলোড লজিক সংরক্ষণের জন্য ব্যবহৃত হবে।


4. Upload Image Method তৈরি:

একটি uploadImage নামের মেথড তৈরি করা হয়েছে, যেখানে ইমেজ আপলোড লজিক থাকবে।
প্যারামিটার (parameters):
Request - ইনপুট ডেটা ক্যাপচার করার জন্য।
Input Name - ইনপুট ফিল্ডের নাম (যেমন: avatar)।
Path - ইমেজ স্টোরেজের ডিফল্ট পাথ (যেমন: public/uploads)।


*/
namespace App\Traits;
use Illuminate\Http\Request;
use File;
use PhpParser\Node\Stmt\Return_;

trait FileUploadTrait{

    /* function updateImage(Request $request, $inputName, $path = "/uploads"){
        1. ইমেজ আপলোড লোকেশন:
ইমেজ ফাইল আপলোড হলে সরাসরি public/uploads ফোল্ডারে যাবে। এটি ডিফল্ট পাথ হিসেবে সেট করা হয়েছে।

2. দুইটি প্রয়োজনীয় প্যারামিটার:

uploadImage মেথডে দুইটি প্যারামিটার পাস করতে হবে:
Request:
ফর্মের ডেটা বা ইনপুট পেতে ব্যবহার হবে। এটি ইমেজ ইনপুট ফিল্ড থেকে ফাইল নেওয়ার জন্য।
Input Name: ইমেজ ইনপুট ফিল্ডের নাম (যেমন: avatar) পাস করতে হবে। এটি নিশ্চিত করবে কোন ফিল্ড থেকে ডেটা নেওয়া হবে।
    */

    function uploadImage(Request $request, $inputName, $oldPath=NULL, $path = "/uploads"){

        /*
         if($request->hasFile($inputName)){

        ইমেজ আপলোডের জন্য মেথডে Request ইনস্ট্যান্স পাস করা হবে। এর মাধ্যমে পুরো রিকোয়েস্ট ডেটা অ্যাক্সেস করা যাবে।

         রিকোয়েস্টে নির্দিষ্ট ইমেজ ফাইল আছে কিনা তা চেক করার জন্য hasFile() মেথড ব্যবহার করা হবে।

        ইনপুট ফিল্ডের নাম ডায়নামিক রাখা হয়েছে, কারণ প্রতিটি ফর্মের ক্ষেত্রে এটি আলাদা হতে পারে।*/

        if($request->hasFile($inputName)){


            //একটি ভ্যারিয়েবল $image ডিক্লেয়ার করি, যা রিকোয়েস্ট থেকে ফাইল গ্রহণ করবে।
            $image = $request->{$inputName};

            /*
                $image হলো আমাদের ইনপুট ফাইলের অবজেক্ট।
                 getClientOriginalExtension() মেথডটি ফাইলের অরিজিনাল এক্সটেনশন রিটার্ন করে (যেমন: jpg, png, ইত্যাদি)।
                $ext ভ্যারিয়েবলে সেই এক্সটেনশনটি সংরক্ষণ করা হয়।
            */
            $ext  = $image->getClientOriginalExtension();
            // generate new file name
            $imageName = 'media_'.uniqid().'.'.$ext;

            //এবার image store  এ  সেভ  করবো
            $image->move(public_path($path) , $imageName);

            //delete old iamge
            if($oldPath &&File::exists(public_path($oldPath))){
                File::delete(public_path($oldPath));
            }

            //আমি বর্তমান পথটি return করবো যেখানে আমরা আমাদের curren path।  where আমারা ইমেজ টা সেভ করেছি।
            return $path.'/'.$imageName;

            //এভার database এ সেভ করব
        }

        return NULL;
    }


    function removeImage(string $path) : void{
        if(File::exists(public_path($path))){
            File::delete(public_path($path));
        }
    }
}
