<div class="row" style="background-color: #F8FBF0">
    <div class="col-md-8 card">
        <div class="card p-4 m-4" style="background-color: #FF60561A">
            <h5 class="text-bold"> ভিক্টিম সাদিয়া খাতুন এর জন্য জরুরি ভিত্তিতে বেবস্থা নেয়ার নির্দেশ।</h5>
            <p>
                {{ $application->{'title_details_' . app()->getLocale()} }}
            </p>

            <a href="#" class="bg-transparent text-danger" style="color: red">
                বিস্তারিত দেখুন
            </a>
            <hr class="w-100">
            <div class="row">
                <div class="col-md-2">
                    <img class="rounded-circle" style="max-width: 150px;max-height: 80px" alt="avatar1"
                         src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" />
                </div>
                <div class="col-md-10 pt-2">
                    <span class="text-bold">আমিনুল আহসান</span>
                    <p> সদস্য সচিব,  কিশোর কিশোরীদের সাইবার অপরাধ প্রতিরোধ কেন্দ্রীয় কমিটি। <br>
                        পরিচালক (উপ সচিব),  ডিজিটাল নিরাপত্তা এজেন্সি।
                    </p>
                </div>
            </div>
        </div>

        <div class="m-2 p-2">
            <i class="ri-corner-down-right-line text-secondary" style="font-size: 24px "></i>
            <span class="text-secondary" >ওয়ার্কিং গ্রুপ মেম্বারঃ </span>
            <span style="border: 1px solid #6E4798;color: #6E4798" class="p-1 mx-1 text-bold">
        <i class="ri-map-pin-user-line px-1"></i>
        group member names with loops
    </span>
        </div>
        <div class="card p-4 m-4" style="background-color: #6E47981A">
            <h5 class="text-bold"> উপরোক্ত তথ্য অনুসারে পদক্ষেপ গ্রহণ করা হচ্ছে।</h5>
            <p>
                জরুরি ভিত্তিতে উপরোক্ত পদক্ষেপ গুলো গ্রহণ করা হচ্ছে।
            </p>
            <hr class="w-100">
            <div class="row">
                <div class="col-md-2">
                    <img class="rounded-circle" style="max-width: 150px;max-height: 80px" alt="avatar1"
                         src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" />
                </div>
                <div class="col-md-10 pt-2">
                    <span class="text-bold">আমিনুল আহসান</span>
                    <p> সদস্য সচিব,  কিশোর কিশোরীদের সাইবার অপরাধ প্রতিরোধ কেন্দ্রীয় কমিটি। <br>
                        পরিচালক (উপ সচিব),  ডিজিটাল নিরাপত্তা এজেন্সি।
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-4">
        @include('admin.caseincomplete.rightsidebar')
    </div>
</div>
