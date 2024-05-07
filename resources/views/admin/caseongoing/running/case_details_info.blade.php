@php
    $sarok_no = \Carbon\Carbon::parse($application->created_at)->format('d.m.Y') .".". @$application->district->bbs_code .".". @$application->upazila->bbs_code .".". @$application->caseCategory->code .".". $application->code;
@endphp

<div class="container-fluid pl-3 pt-2 " style="background-color: #F8FBF0" >
    <div class="row d-flex align-items-center py-4">
        <div class="col-md-6">
            <h5 class="text-bold">
                {{ (app()->getLocale() == 'en') ? "Order to take {$application->caseType->title_en}  action for the victim $application->name_en" : "ভিক্টিম $application->name_bn এর জন্য {$application->caseType->title_bn} ভিত্তিতে বেবস্থা নেয়ার নির্দেশ।" }}
            </h5>
        </div>
        <div class="col-md-6 text-right">
            <a target="_blank" href="{{ route('admin.caseongoing.pdf_case_info', $application->id) }}" class="text-white rounded-pill px-3 py-2 mr-4" style="background-color: #6E4798">
                {{__('admin.case.download_pdf')}} <i class="ri-download-2-line"></i>
            </a>
        </div>
    </div>
    <form>
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="serial">{{__('admin.common.memorial_no')}}:</label>
                    </div>
                    <div class="col-md-10">
                        <span id="serial">:
                            {{(app()->getLocale() == 'en') ? $sarok_no : engToBnHlp($sarok_no)}}
                        </span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="name">{{ __('admin.caseongoing.name') }}</label>
                    </div>
                    <div class="col-md-10">
                        <span id="name">: {{ $application->{'name_' . app()->getLocale()} }}</span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="age">{{ __('admin.caseongoing.age') }}</label>
                    </div>
                    <div class="col-md-10">
                        <span id="age">: {{(app()->getLocale() == 'en') ? ageCal($application->dob) : dateFormatEnglishToBanglaHlp(ageCal($application->dob))}}</span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="address">{{ __('admin.caseongoing.address') }}</label>
                    </div>
                    <div class="col-md-10">
                        <span id="address">: {{ $application->{'address_' . app()->getLocale()} }}</span>
                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="case_category">{{ __('admin.caseongoing.case_category') }}</label>
                    </div>
                    <div class="col-md-10">
                        <span id="case_category">: {{ $application->caseCategory->{'title_' . app()->getLocale()} }}</span>
                    </div>
                </div>
            </li>
            {{-- <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="gd_tracking_no">{{__('admin.common.gd_tracking_no')}}</label>
                    </div>
                    <div class="col-md-10">
                        <span id="gd_tracking_no">: {{(app()->getLocale() == 'en') ? $application->code : dateFormatEnglishToBanglaHlp($application->code)}} </span>
                    </div>
                </div>
            </li> --}}
            {{-- <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="gd_date">{{__('admin.common.gd_date')}}</label>
                    </div>
                    <div class="col-md-10">
                        <span id="gd_date">: - </span>
                    </div>
                </div>
            </li> --}}
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        <label for="created_at"> {{__('admin.service.created_at')}}</label>
                    </div>
                    <div class="col-md-10">
                        <span id="created_at">:
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
        {{-- <div class="row pt-2">
            <div class="col-md-12 text-center">
                <p class="text-info text-bold">
                    {{(app()->getLocale() == 'en') ? "(The following discussion is a detailed discussion of steps and cases)" : "(নিম্নক্ত আলোচনাই পদক্ষেপ এবং কেসের বিস্তারিত আলোচনা)"}}
                </p>
            </div>
        </div> --}}
        <div class="card-body">
        {{-- <p>
            জিডি এখনো করা হয়নি।  কিশোরীর পরিবার বিষয়টা জানেনা এবং কিশোরীটি বের হতে পারছেনা বাসা থেকে। <br>

            সমস্যার বিবরণীঃ সাদিয়া ৭ম শ্রেণির ছাত্রী ফেসবুকে একটি ভুয়া পেইজে তাকে নিয়ে নানা সময় বিভ্রান্তী কর তথ্য পোস্ট করা করছে ১ পেইজে। যে তাকে মানুসিক ভাবে কষ্ট দিচ্ছে। এবং সে বিভিন্ন জায়গা বুলিং এর সম্মুখীন হচ্ছে। <br>

            ওয়ার্কিং গ্রুপ মেম্বারঃ  বিশেষ পুলিশ সুপার (সাইবার ক্রাইম) পুলিশ হেডকোয়ার্টার।,  মহাপরিচালক BTRC , মনোবিজ্ঞানী সাইবার টিনস ফাউন্ডেশন। <br>

            জেলা কমিটিঃ কুষ্টিয়া জেলা <br>

            নির্দেশনাঃ <br>
        </p> --}}

        <p class="text-info text-bold">
            {{(app()->getLocale() == 'en') ? "The following discussion is a detailed discussion of steps and cases" : "নিম্নক্ত আলোচনাই পদক্ষেপ এবং কেসের বিস্তারিত আলোচনা"}}
        </p>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10%;">{{(app()->getLocale() == 'en') ? "Serial No" : "ক্রমিক নং"}}</th>
                    <th style="width: 90%;">{{(app()->getLocale() == 'en') ? "All Steps" : "পদক্ষেপ সমূহ"}}</th>
                </tr>
                </thead>
                <tbody>

                @foreach (@$application->step as $key=>$item)
                <tr>
                    <td>{{(app()->getLocale() == 'en') ? $key+1 : engToBnHlp($key+1)}}</td>
                    <td>{{@$item->{'step_details_'. app()->getLocale()} }}
                        <br> <span class="text-info"><i class="fa fa-user" aria-hidden="true"></i> ({{ @$item->admin->{'title_'. app()->getLocale()} }} , {{ @$item->admin->designation->{'title_'. app()->getLocale()} }})</span>
                    </td>
                </tr>
                @endforeach
                {{-- <tr>
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
                </tr> --}}
                </tbody>
            </table>
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10%;">{{(app()->getLocale() == 'en') ? "Serial No" : "ক্রমিক নং"}}</th>
                    <th style="width: 90%;">{{(app()->getLocale() == 'en') ? "All Feedbacks" : "ফিডব্যাক সমূহ"}}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach (@$application->stepfeed as $key=>$item)
                    <tr>
                        <td>{{(app()->getLocale() == 'en') ? $key+1 : engToBnHlp($key+1)}}</td>
                        <td>{!! @$item->{'feedback_details_'. app()->getLocale()} !!}
                            <span class="text-info"><i class="fa fa-user" aria-hidden="true"></i> ({{ @$item->admin->{'title_'. app()->getLocale()} }} , {{ @$item->admin->designation->{'title_'. app()->getLocale()} }})</span>
                            <br>
                            @if($item->fbfiles)
                                @php
                                    $files = json_decode($item->fbfiles);
                                @endphp
                                @foreach ($files as $file)
                                    <a target="_blank"
                                    href="{{ asset('storage/'.$file) }}"><i class="card-img-top ri-image-fill display-4"> </i></a>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    </div>

    <div class="row d-flex align-items-center py-4 pl-4">
        <div class="col-md-6">
            <h5 class="text-bold"> {{ __('admin.caseongoing.victim') }}: ( {{ $application->{'name_' . app()->getLocale()} }} )
                {{ __('admin.caseongoing.detail') }} </h5>
        </div>
        <div class="col-md-6 text-right">
            <a target="_blank" href="{{ route('admin.caseongoing.pdf_suspicious_info', $application->id) }}" class="text-white rounded-pill px-3 py-2 mr-4" style="background-color: #6E4798">
                {{__('admin.case.download_pdf')}} <i class="ri-download-2-line"></i>
            </a>
        </div>
    </div>

    <form>
        <div class="row bg-white py-2">
            <div class="col-md-9">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="serial">{{__('admin.common.memorial_no')}}</label>
                            </div>
                            <div class="col-md-9">
                                : {{(app()->getLocale() == 'en') ? $sarok_no : engToBnHlp($sarok_no)}}
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
                                <label for="class">{{ __('admin.caseongoing.class') }}</label>
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
                                <label for="school">{{ __('admin.caseongoing.school') }}</label>
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
                                <label for="address">{{ __('admin.caseongoing.address') }}</label>
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
                                <label for="contact">{{ __('admin.caseongoing.contact') }}</label>
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
                                <label for="guardian">{{ __('admin.caseongoing.guardian') }}</label>
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
                                <label for="guardian_contact">{{ __('admin.caseongoing.guardian_contact') }}</label>
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
                                <label for="guardian">{{__('admin.application.risk')}}</label>
                            </div>
                            <div class="col-md-9">:
                                <span id="guardian" class="btn btn-outline-danger">
                                    {{@$application->risk->{'title_'. app()->getLocale()} }}

                                </span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 text-bold">
                ভিক্টিমের ছবিঃ <br><br>
                @if (@$application->dsign)
                    <img src="{{ asset('storage/'.@$application->dsign) }}" alt="Your Image" class="img-fluid rounded" />
                @else
                    <img src="{{ asset('assets/dist/img/avatar.png') }}" alt="Your Image" class="img-fluid rounded" />
                @endif
            </div>
        </div>
    </form>

{{--suspicious  info--}}

    @foreach(@$application->suspect as $suspect)

        <div class="row d-flex align-items-center py-4 pl-4">
            <div class="col-md-6">
                <h5 class="text-bold">{{ __('admin.application.suspicious_details') }} </h5>
            </div>
            <div class="col-md-6 text-right">
                <a target="_blank" href="{{ route('admin.caseongoing.pdf_suspicious_info', $application->id) }}" class="text-white rounded-pill px-3 py-2 mr-4" style="background-color: #6E4798">
                    {{__('admin.case.download_pdf')}} <i class="ri-download-2-line"></i>
                </a>
            </div>
        </div>

        <form>
            <div class="row bg-white py-2">
                <div class="col-md-9">
                    <ul class="list-group">
                        {{-- <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="serial">{{__('admin.common.memorial_no')}}</label>
                                </div>
                                <div class="col-md-9">
                                    :{{(app()->getLocale() == 'en') ? $sarok_no : engToBnHlp($sarok_no)}}
                                </div>
                            </div>
                        </li> --}}
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="suspicious_name">{{ __('admin.application.suspicious_name') }}</label>
                                </div>
                                <div class="col-md-9">
                                    <span id="suspicious_name">:
                                    {{ $suspect->{'suspicious_name_' . app()->getLocale()} }}
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="suspicious_age">{{ __('admin.application.suspicious_age') }}</label>
                                </div>
                                <div class="col-md-9">
                                    <span id="suspicious_age">: {{(app()->getLocale() == 'en') ? ageCal($suspect->suspicious_age) : dateFormatEnglishToBanglaHlp(ageCal($suspect->suspicious_age))}}
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
                                    {{ (app()->getLocale() == 'en') ? (($suspect->suspicious_gender == 1) ? 'Male' : 'Female') : (($suspect->suspicious_gender == 1) ? 'পুরুষ' : ' নারী') }}
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
                                        {{ $suspect->{'suspicious_address_' . app()->getLocale()} }}
                                    </span>
                                </div>
                            </div>
                        </li>
                        {{-- <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="suspicious_class">{{ __('admin.application.suspicious_class') }}</label>
                                </div>
                                <div class="col-md-9">
                                    <span id="suspicious_address">:
                                        {{ $suspect->{'suspicious_class_' . app()->getLocale()} }}
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="suspicious_school">{{ __('admin.application.suspicious_school') }}</label>
                                </div>
                                <div class="col-md-9">
                                    <span id="suspicious_address">:
                                        {{ $suspect->{'suspicious_school_' . app()->getLocale()} }}
                                    </span>
                                </div>
                            </div>
                        </li> --}}
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="suspicious_contact">{{ __('admin.application.suspicious_contact') }}</label>
                                </div>
                                <div class="col-md-9">
                                    <span id="suspicious_contact">:
                                        @if (@$suspect->suspicious_contact)
                                            {{(app()->getLocale() == 'en') ? @$suspect->suspicious_contact : engToBnHlp(@$suspect->suspicious_contact)}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="suspicious_guardian_en">{{ __('admin.application.suspicious_guardian') }}</label>
                                </div>
                                <div class="col-md-9">
                                    <span id="suspicious_address">:
                                        {{ $suspect->{'suspicious_guardian_' . app()->getLocale()} }}
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="suspicious_guardian_contact">{{ __('admin.application.suspicious_guardian_contact') }}</label>
                                </div>
                                <div class="col-md-9">
                                    <span id="suspicious_address">:
                                        @if (@$suspect->suspicious_guardian_contact)
                                            {{(app()->getLocale() == 'en') ? @$suspect->suspicious_guardian_contact : engToBnHlp(@$suspect->suspicious_guardian_contact)}}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 text-bold">
                    {{ __('admin.caseongoing.suspicious_image') }} : <br>

                    @if (@$suspect->ssign)
                        <img src="{{ asset('storage/'.@$suspect->ssign) }}" alt="Your Image" class="img-fluid rounded" />
                    @else
                        <img src="{{ asset('assets/dist/img/avatar.png') }}" alt="Your Image" class="img-fluid rounded" />
                    @endif
                </div>
            </div>
        </form>

    @endforeach
</div>
