<div class="container-fluid pl-3 pt-2 " style="background-color: #F8FBF0" >
    <div class="row d-flex align-items-center py-4">
        <div class="col-md-6">
            <h5 class="text-bold"> ভিক্টিম সাদিয়া খাতুন এর জন্য জরুরি ভিত্তিতে বেবস্থা নেয়ার নির্দেশনা। </h5>
        </div>
        <div class="col-md-6 text-right">
            <a href="#" class="text-white rounded-pill p-4 mr-4" style="background-color: #6E4798">PDF ডাউনলোড করুন </a>
        </div>
    </div>
    <form>
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="name">স্বারক নং</label>
                    </div>
                    <div class="col-md-10">
                        <span id="name">:  1407.2023.34.03.Bullying.17352</span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="name">{{ __('admin.casecomplete.name') }}</label>
                    </div>
                    <div class="col-md-10">
                        <span id="name">: {{ $application->{'name_' . app()->getLocale()} }}</span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="email">{{ __('admin.casecomplete.age') }}</label>
                    </div>
                    <div class="col-md-10">
                        <span id="email">: {{(app()->getLocale() == 'en') ? ageCal($application->dob) : dateFormatEnglishToBanglaHlp(ageCal($application->dob))}}</span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="message">{{ __('admin.casecomplete.address') }}</label>
                    </div>
                    <div class="col-md-10">
                        <span id="message">: {{ $application->{'address_' . app()->getLocale()} }}</span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="message">{{ __('admin.casecomplete.case_category') }}</label>
                    </div>
                    <div class="col-md-10">
                        <span id="message">: {{ $application->caseCategory->{'title_' . app()->getLocale()} }}</span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="message">জিডি ট্রাকিং নং</label>
                    </div>
                    <div class="col-md-10">
                        <span id="message">: - </span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="message">জিডি তারিখ</label>
                    </div>
                    <div class="col-md-10">
                        <span id="message">: - </span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="message"> তারিখ</label>
                    </div>
                    <div class="col-md-10">
                        <span id="message">:
                            {{ (app()->getLocale() == 'en') ?
                             $application->created_at->format('d/m/Y')   :
                             dateFormatEnglishToBanglaHlp( $application->created_at->format('d/m/Y')) }}
                        </span>
                    </div>
                </div>
            </li>
        </ul>
    </form>
    <div class="card">
        <div class="row pt-2">
            <div class="col-md-12 text-center">
                (নিম্নক্ত আলোচনাই পদক্ষেপ এবং কেসের বিস্তারিত আলোচনা)
            </div>
        </div>
        <div class="card-body">
        <p>
            জিডি এখনো করা হয়নি।  কিশোরীর পরিবার বিষয়টা জানেনা এবং কিশোরীটি বের হতে পারছেনা বাসা থেকে। <br>

            সমস্যার বিবরণীঃ সাদিয়া ৭ম শ্রেণির ছাত্রী ফেসবুকে একটি ভুয়া পেইজে তাকে নিয়ে নানা সময় বিভ্রান্তী কর তথ্য পোস্ট করা করছে ১ পেইজে। যে তাকে মানুসিক ভাবে কষ্ট দিচ্ছে। এবং সে বিভিন্ন জায়গা বুলিং এর সম্মুখীন হচ্ছে। <br>

            ওয়ার্কিং গ্রুপ মেম্বারঃ  বিশেষ পুলিশ সুপার (সাইবার ক্রাইম) পুলিশ হেডকোয়ার্টার।,  মহাপরিচালক BTRC , মনোবিজ্ঞানী সাইবার টিনস ফাউন্ডেশন। <br>

            জেলা কমিটিঃ কুষ্টিয়া জেলা <br>

            নির্দেশনাঃ <br>
        </p>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 7%;">ক্রমিক</th>
                    <th style="width: 93%;">পদক্ষেপ সমূহ</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>০১</td>
                    <td>দ্রুত সম্বব ফেসবুক থেকে পোস্ট ডিলেট করার ব্যবস্খা। গ্রুহণ করা প্রয়োজন। (BTRC প্রয়োজনীয় পদক্ষেপ গ্রহণ করবে)</td>
                </tr>
                <tr>
                    <td>০২</td>
                    <td>সাদিয়াকে মানুসিক সাপোর্ট প্রদান করা প্রয়োজন। (সাইবার টিনস এর সাইকোলিস্ট কাউন্সিলিং প্রদান করবে)</td>
                </tr>
                <tr>
                    <td>০৩</td>
                    <td>সাগর আহমেদ সজল এর ভিডিও টি অনলাইন মাদ্ধন থেকে অতিদ্রুত রিমুভ করার বেবস্থা নিতে হবে। </td>
                </tr>
                <tr>
                    <td>০৪</td>
                    <td>উক্ত পেইজের আ্যডমিন কে শনাক্ত প্রয়োজন ( BTRC, Police Headquarters যৌথ ভাবে কাজ করবে)</td>
                </tr>
                <tr>
                    <td>০৫</td>
                    <td>সাদিয়া যেন স্কুল ও আসে পাশ থেকে বুলিং এর শিকার না হয় সেবিষয় নিচ্চিত করতে হবে। পেইজ শনাক্ত করা করে আইনি পদক্ষেপ মামলা করা যেতে পারে( জেলা কমিটি কুষ্টিয়া) </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

    </div>

    <div class="row d-flex align-items-center py-4 pl-4">
        <div class="col-md-6">
            <h5 class="text-bold"> {{ __('admin.casecomplete.victim') }}: ( {{ $application->{'name_' . app()->getLocale()} }} )
                {{ __('admin.casecomplete.detail') }} </h5>
        </div>
        <div class="col-md-6 text-right">
            <a href="#" class="text-white rounded-pill p-4 mr-4" style="background-color: #6E4798">PDF ডাউনলোড করুন </a>
        </div>
    </div>

    <form>
        <div class="row bg-white py-2">
            <div class="col-md-9">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="serial">স্মারক নং</label>
                            </div>
                            <div class="col-md-9">
                                <span id="serial">:  1407.2023.Bullying.1278.34.03</span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="name">{{ __('admin.application.name') }}</label>
                            </div>
                            <div class="col-md-9">
                                <span id="name">: {{ $application->{'name_' . app()->getLocale()} }}</span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="age">{{ __('admin.application.age') }}</label>
                            </div>
                            <div class="col-md-9">
                                <span id="age">: {{ (app()->getLocale() == 'en') ?
                             $application->created_at->format('d/m/Y')   :
                             dateFormatEnglishToBanglaHlp( $application->created_at->format('d/m/Y')) }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="gender">{{ __('admin.application.gender') }}</label>
                            </div>
                            <div class="col-md-9">
                                <span id="gender">:
                                    {{ (app()->getLocale() == 'en') ? ($application->gender ==1 ? 'Male':'Female') : ($application->gender ==1 ? 'পুরুষ':'নারী') }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="class">{{ __('admin.casecomplete.class') }}</label>
                            </div>
                            <div class="col-md-9">
                                <span id="class">:
                                     {{ $application->{'class_' . app()->getLocale()} }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="school">{{ __('admin.casecomplete.school') }}</label>
                            </div>
                            <div class="col-md-9">
                                <span id="school">:
                                     {{ $application->{'school_' . app()->getLocale()} }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="address">{{ __('admin.casecomplete.address') }}</label>
                            </div>
                            <div class="col-md-9">
                                <span id="address">:
                                     {{ $application->{'address_' . app()->getLocale()} }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="contact">{{ __('admin.casecomplete.contact') }}</label>
                            </div>
                            <div class="col-md-9">
                                <span id="contact">:
                                     {{ (app()->getLocale() == 'en') ?
                             $application->contact   :
                             dateFormatEnglishToBanglaHlp( $application->contact) }}
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="guardian">{{ __('admin.casecomplete.guardian') }}</label>
                            </div>
                            <div class="col-md-9">
                                <span id="guardian">: {{ $application->{'guardian_' . app()->getLocale()} }}

                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="guardian_contact">{{ __('admin.casecomplete.guardian_contact') }}</label>
                            </div>
                            <div class="col-md-9">
                                <span id="guardian_contact">: {{ (app()->getLocale() == 'en') ?
                             $application->guardian_contact   :
                             dateFormatEnglishToBanglaHlp( $application->guardian_contact) }}

                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="guardian">ভিক্টিমের ঝুঁকি</label>
                            </div>
                            <div class="col-md-9">:
                                <span id="guardian" class="btn btn-outline-danger"> মানসিক ঝুঁকি

                                </span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 text-bold">
                ভিক্টিমের ছবিঃ <br>
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" alt="Your Image" class="img-fluid rounded" />
            </div>
        </div>
    </form>

{{--    suspicious  info--}}

    <div class="row d-flex align-items-center py-4 pl-4">
        <div class="col-md-6">
            <h5 class="text-bold">{{ __('admin.application.suspicious_details') }} </h5>
        </div>
        <div class="col-md-6 text-right">
            <a href="#" class="text-white rounded-pill p-4 mr-4" style="background-color: #6E4798">PDF ডাউনলোড করুন </a>
        </div>
    </div>

    <form>
        <div class="row bg-white py-2">
            <div class="col-md-9">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="serial">স্মারক নং</label>
                            </div>
                            <div class="col-md-9">
                                <span id="serial">:  1407.2023.Bullying.1278.34.03</span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="suspicious_name">{{ __('admin.application.suspicious_name') }}</label>
                            </div>
                            <div class="col-md-9">
                                <span id="suspicious_name">: suspicious_name</span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="suspicious_age">{{ __('admin.application.suspicious_age') }}</label>
                            </div>
                            <div class="col-md-9">
                                <span id="suspicious_age">: suspicious_age
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="suspicious_gender">{{ __('admin.application.suspicious_gender') }}</label>
                            </div>
                            <div class="col-md-9">
                                <span id="suspicious_gender">:
                                    suspicious_gender
                                </span>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="suspicious_address">{{ __('admin.application.suspicious_address') }}</label>
                            </div>
                            <div class="col-md-9">
                                <span id="suspicious_address">:
                                    suspicious_address
                                </span>
                            </div>
                        </div>
                    </li>


                </ul>
            </div>
            <div class="col-md-3 text-bold">
                {{ __('admin.casecomplete.suspicious_image') }} : <br>
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" alt="Your Image" class="img-fluid rounded" />
            </div>
        </div>
    </form>
</div>
