@extends('frontend.master')
@section('title')
    আমাদের শর্তাবলী এবং নীতিমালা
@endsection

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12 well mt">
                <p class="text-justify extra-info">Ghoreyboshe.com একটি অনলাইন মার্কেটপ্লেস যেখানে কেউই প্রায় সব কিছু বিক্রি বা কিনতে পারে। ওয়েব সাইটে ব্যবহারকারীদের একটি শক্তিশালী সম্প্রদায় রয়েছে যা সফটওয়্যার,বুক, কার,মোটর সাইকেল,ব ইলেকট্রনিক্স, ক্যামেরা, ফোন, কম্পিউটার, সিডি, মোবাইল, ফ্যাশন আনুষাঙ্গিক, সঙ্গীত, এবং ভ্রমণ সহ বিভিন্ন ধরণের আইটেম  ইত্যাদি পন্যের উপরে নানা অফার ও আকর্ষনীয় ডিসকাউন্ট প্রদান করে থাকে। বেশিরভাগ পন্যের ক্ষেত্রে ক্রেতারা বাসায় বসে মুল্য পরিশোধ করে বাসায় পন্য গ্রহন করতে পারে।</p>
                <p>
                    {!! $footer !!}
                </p>



                <h2 class="text-center">বিজ্ঞাপনদাতার জন্য সার্ভিস চার্জ</h2>
                <P class="mt mb"></P>
                <div class="col-md-offset-3 col-md-5 col-md-offset-4">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th class="text-danger">আপনার পছন্দের আইটেম	</th>
                            <th class="text-danger">আইটেম সার্ভিস চার্জ (%)</th>
                        </tr>
                        <tr>
                            <td class="text-info">মোবাইল ফোন / ট্যাব /ইলেকট্রনিক্স</td>
                            <td class="text-info">৫%</td>
                        </tr>
                        <tr>
                            <td  class="text-info">পোশাক, স্বাস্থ্য/খেলাধুলা/শিশু আইটেম/ ফ্যাশান /লেডিস আইটেম/</td>
                            <td  class="text-info">৯%</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-12">
                <p class="text-center">সার্ভিস চার্জ ৫০ টাকা থেকে ৩২০০ টাকা পর্যন্ত।</p>
                <p class="text-center"><strong>GhoreyBoshe.com এ খুব সহজে কিছু বিক্রি বা কিনতে পারেন । এটি বাংলাদেশের সবচেয়ে বড় অনলাইন মার্কেট।</strong></p>



                <p class="text-center"><button class="btn extra-info"><strong> আপানার আর ও কিছু  তথ্য জানার আছে ? <br />০১৭১৭-৬৮৬৯৮৮</strong></button></p>
                </div>
            </div>
        </div>
    </div>
@endsection