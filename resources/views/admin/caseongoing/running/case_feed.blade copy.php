<div class="row" style="background-color: #F8FBF0">
    <div class="col-md-8 card">
        <div class="card p-4 m-4" style="background-color: #FF60561A">
            <h5 class="text-bold">

                {{ (app()->getLocale() == 'en') ? "Order to take {$application->caseType->title_en}  action for the victim $application->name_en" : "ভিক্টিম $application->name_bn এর জন্য {$application->caseType->title_bn} ভিত্তিতে বেবস্থা নেয়ার নির্দেশ।" }}

            </h5>
            <p>
                {{ $application->{'title_details_' . app()->getLocale()} }}
            </p>

            <a href="#" class="bg-transparent text-danger" style="color: red">
                {{ __('admin.common.see_details') }}
            </a>
            <hr class="w-100">
            <div class="row">
                <div class="col-md-2">
                    @if ($centraladmin && $centraladmin->thumb)

                        <img class="rounded-circle" style="max-width: 150px; max-height: 80px" alt="avatar1"
                             src="{{ asset('storage/'.$centraladmin->thumb) }}" />

                    @else

                        <img class="rounded-circle" style="max-width: 150px; max-height: 80px" alt="avatar1"
                             src="{{ asset('assets/dist/img/avatar.png') }}" />

                    @endif
                </div>
                <div class="col-md-10 pt-2">
                    @if ($centraladmin)
                    <span class="text-bold">{{$centraladmin->{'title_'. app()->getLocale()} }}</span>
                    {{-- <p> {{ (app()->getLocale() == 'en') ? " {$centraladmin->designation->title_en} Juvenile Cyber Crime Prevention Central Committee." : " {$centraladmin->designation->title_bn}  কিশোর কিশোরীদের সাইবার অপরাধ প্রতিরোধ কেন্দ্রীয় কমিটি।" }} <br>
                        {{ (app()->getLocale() == 'en') ? "Director ( {$centraladmin->officeDesignation->title_en} ), Digital Security Agency." : "পরিচালক ( {$centraladmin->officeDesignation->title_bn} ), ডিজিটাল নিরাপত্তা এজেন্সি।" }}
                    </p> --}}

                    <p> {{@$centraladmin->designation->{'title_'. app()->getLocale()} }},  {{(app()->getLocale() == 'en') ? "Juvenile Cyber Crime Prevention Committee." : "কিশোর কিশোরীদের সাইবার অপরাধ প্রতিরোধ কমিটি।"}} <br>
                        {{@$centraladmin->designation->{'title_'. app()->getLocale()} }},  {{(app()->getLocale() == 'en') ? "Digital Security Agency." : "ডিজিটাল নিরাপত্তা এজেন্সি।"}}
                    </p>
                    @else
                        <span class="text-bold">{{(app()->getLocale() == 'en') ? "Name" : "নাম"}}</span>
                        <p> {{ (app()->getLocale() == 'en') ? "  Juvenile Cyber Crime Prevention Committee." : "  কিশোর কিশোরীদের সাইবার অপরাধ প্রতিরোধ কমিটি।" }} <br>
                            {{ (app()->getLocale() == 'en') ? "Director , Digital Security Agency." : "পরিচালক , ডিজিটাল নিরাপত্তা এজেন্সি।" }}
                        </p>
                    @endif
                </div>
            </div>
        </div>

        <div class="m-2 p-2">
            <i class="ri-corner-down-right-line text-secondary" style="font-size: 24px "></i>
            <span class="text-secondary" >{{ (app()->getLocale() == 'en') ? "Working Group Member:" : "ওয়ার্কিং গ্রুপ মেম্বারঃ" }} </span>
            @foreach ($admins as $item)
                <span style="border: 1px solid #6E4798" class="p-1 mx-1 text-bold">
                    <i class="ri-map-pin-user-line px-1" style="color: #6E4798;"></i>
                    {{--{{$item->{'title_'. app()->getLocale()} }} ,--}}
                    {{$item->designation->{'title_'. app()->getLocale()} }}
                </span>
            @endforeach

        </div>

        
        <div class="card p-4 m-4" style="background-color: #6E47981A">
            <h5 class="text-bold"> 
                {{(app()->getLocale() == 'en') ? "Action is being taken as per above information." : "উপরোক্ত তথ্য অনুসারে পদক্ষেপ গ্রহণ করা হচ্ছে।"}}
            </h5>
        </div>

        @foreach (@$application->stepfeed as $item)
        <div class="card p-4 m-4" style="background-color: #6E47981A">
            <p>
                {!! @$item->{'feedback_details_'. app()->getLocale()} !!}
            </p>
            <hr class="w-100">
            <div class="row">
                <div class="col-md-2">
                    {{-- <img class="rounded-circle" style="max-width: 150px;max-height: 80px" alt="avatar1"
                         src="{{ asset('assets/dist/img/avatar.png') }}" /> --}}

                    @if (@$item->admin->thumb)
                        <img class="rounded-circle" style="max-width: 150px; max-height: 80px" alt="avatar1"
                        src="{{ asset('storage/'.@$item->admin->thumb) }}" />
 
                     @else
                         <img class="rounded-circle" style="max-width: 150px; max-height: 80px" alt="avatar1"
                              src="{{ asset('assets/dist/img/avatar.png') }}" />
 
                     @endif

                </div>
                <div class="col-md-10 pt-2">
                    <span class="text-bold">{{@$item->admin->{'title_'. app()->getLocale()} }}</span>
                    <p> {{@$item->admin->designation->{'title_'. app()->getLocale()} }},  {{(app()->getLocale() == 'en') ? "Juvenile Cyber Crime Prevention Central Committee." : "কিশোর কিশোরীদের সাইবার অপরাধ প্রতিরোধ কমিটি।"}} <br>
                        {{@$item->admin->designation->{'title_'. app()->getLocale()} }},  {{(app()->getLocale() == 'en') ? "Digital Security Agency." : "ডিজিটাল নিরাপত্তা এজেন্সি।"}}
                    </p>

                    @if($item->fbfiles)
                        @php
                            $files = json_decode($item->fbfiles);
                        @endphp
                        @foreach ($files as $file)
                            <a target="_blank"
                            href="{{ asset('storage/'.$file) }}"><i class="card-img-top ri-image-fill display-4"> </i></a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        

        <button type="button" class="btn mt-2 w-100 text-bold" data-toggle="modal" data-target="#myModal" style="border: 1px solid #6E4798;background-color:#6E4798;color: #E1E8EE">
            <i class="ri-add-box-line"></i> {{__('admin.common.writeYourMessage')}}
        </button>

        <!-- The modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-edit-add" application="form" id="application_entry_form"
                        action="{{ route('admin.caseongoing.update_feedback_info', $application->id) }} }}"
                        method="POST" enctype="multipart/form-data" autocomplete="off">
                        <!-- PUT Method if we are editing -->
                        @if($edit)
                            <input type="hidden" name="id" value="{{ $application->id }}">
                            {{ method_field("PUT") }}
                        @endif
                        {{ csrf_field() }}


                        <div class="modal-body">
                            <div class="row m-4 p-4">
                                <p class="text-info">
                                    {{(app()->getLocale() == 'en') ? "Give feedback on according your work here." : "এখানে আপনার কাজ অনুযায়ী প্রতিক্রিয়া দিন।"}}
                                </p>
                                <hr>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="feedback_details_en">{{ __('admin.caseongoing.feedback_details_en') }}</label>
                                        <textarea id="summernote_en" rows="3" class="form-control"
                                            placeholder="{{ __('admin.caseongoing.feedback_details_en') }}"
                                            name="feedback_details_en"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="feedback_details_bn">{{ __('admin.caseongoing.feedback_details_bn') }}</label>
                                        <textarea id="summernote_bn" rows="3" class="form-control"
                                            placeholder="{{ __('admin.caseongoing.feedback_details_bn') }}"
                                            name="feedback_details_bn" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fbfile">
                                            {{ __('admin.caseongoing.fbfile') }} <span
                                                class="text-warning">
                                                ({{ __('admin.common.file_size_100') }})</span>
                                        </label>
                                        <input style="padding-top: 4px;" multiple type="file" name="fbfiles[]" id="fbfile"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info btn-sm form-control save">
                                          <i class="fas fa-save"></i> {{ __('admin.common.save') }}
                                        </button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-4">
        @include('admin.caseongoing.running.rightsidebar')
    </div>
</div>
