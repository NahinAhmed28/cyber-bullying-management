<div class="row" style="background-color: #F8FBF0">
    <div class="col-md-12 card">
        
        <form class="form-edit-add" application="form" id="application_entry_form"
            action="{{ route('admin.caseongoing.update_suspicious_info', $application->id) }} }}"
            method="POST" enctype="multipart/form-data" autocomplete="off">
            <!-- PUT Method if we are editing -->
            @if($edit)
                <input type="hidden" name="id" value="{{ $application->id }}">
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}

            <section class="content" style="margin-top: -10px;">
                <div class="container-fluid">
                    <div class="row">

                        <!-- col start -->
                        <div class="col-md-12">
                            <!-- card start -->
                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-title text-info">{{ __('admin.caseongoing.suspicious_info') }}</h3>
                                </div>

                                <div class="card-body">
                                    @if ($edit)
                                        @if (count($application->suspect) > 0 )
                                            @foreach ($application->suspect as $key=>$suspect)
                                            <input type="hidden" name="arraydata[suspect{{$key+1}}][id]" value="{{$suspect->id}}">

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="suspicious_name_en">{{ __('admin.caseongoing.suspicious_name_en') }}</label>
                                                        <input type="text" name="arraydata[suspect{{$key+1}}][suspicious_name_en]"
                                                            placeholder="{{ __('admin.caseongoing.suspicious_name_en') }}"
                                                            value="{{$suspect->suspicious_name_en}}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="suspicious_name_bn">{{ __('admin.caseongoing.suspicious_name_bn') }}</label>
                                                        <input type="text" name="arraydata[suspect{{$key+1}}][suspicious_name_bn]"
                                                            placeholder="{{ __('admin.caseongoing.suspicious_name_bn') }}"
                                                            value="{{$suspect->suspicious_name_bn}}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="suspicious_details_en">{{ __('admin.caseongoing.suspicious_details_en') }}</label>
                                                        <textarea rows="1" class="form-control"
                                                            placeholder="{{ __('admin.caseongoing.suspicious_details_en') }}"
                                                            name="arraydata[suspect{{$key+1}}][suspicious_details_en]" required>{{$suspect->suspicious_details_en}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="suspicious_details_bn">{{ __('admin.caseongoing.suspicious_details_bn') }}</label>
                                                        <textarea rows="1" class="form-control"
                                                            placeholder="{{ __('admin.caseongoing.suspicious_details_bn') }}"
                                                            name="arraydata[suspect{{$key+1}}][suspicious_details_bn]" required>{{$suspect->suspicious_details_bn}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="suspicious_guardian_en">{{ __('admin.caseongoing.suspicious_guardian_en') }}</label>
                                                        <input type="text" name="arraydata[suspect{{$key+1}}][suspicious_guardian_en]"
                                                            placeholder="{{ __('admin.caseongoing.suspicious_guardian_en') }}"
                                                            value="{{$suspect->suspicious_guardian_en}}"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="suspicious_guardian_bn">{{ __('admin.caseongoing.suspicious_guardian_bn') }}</label>
                                                        <input type="text" name="arraydata[suspect{{$key+1}}][suspicious_guardian_bn]"
                                                            placeholder="{{ __('admin.caseongoing.suspicious_guardian_bn') }}"
                                                            value="{{$suspect->suspicious_guardian_bn}}"
                                                            class="form-control">
                                                    </div>
                                                </div>


                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="suspicious_address_en">{{ __('admin.caseongoing.suspicious_address_en') }}</label>
                                                        <textarea rows="1" class="form-control"
                                                            placeholder="{{ __('admin.caseongoing.suspicious_address_en') }}"
                                                            name="arraydata[suspect{{$key+1}}][suspicious_address_en]" required>{{$suspect->suspicious_address_en}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="suspicious_address_bn">{{ __('admin.caseongoing.suspicious_address_bn') }}</label>
                                                        <textarea rows="1" class="form-control"
                                                            placeholder="{{ __('admin.caseongoing.suspicious_address_bn') }}"
                                                            name="arraydata[suspect{{$key+1}}][suspicious_address_bn]" required>{{$suspect->suspicious_address_bn}}</textarea>
                                                    </div>
                                                </div>


                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="suspicious_contact">{{ __('admin.caseongoing.suspicious_contact') }}</label>
                                                        <input type="number" name="arraydata[suspect{{$key+1}}][suspicious_contact]"
                                                            placeholder="{{ __('admin.caseongoing.suspicious_contact') }}"
                                                            value="{{$suspect->suspicious_contact}}"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="suspicious_guardian_contact">{{ __('admin.caseongoing.suspicious_guardian_contact') }}</label>
                                                        <input type="number" name="arraydata[suspect{{$key+1}}][suspicious_guardian_contact]"
                                                            placeholder="{{ __('admin.caseongoing.suspicious_guardian_contact') }}"
                                                            value="{{$suspect->suspicious_guardian_contact}}"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="suspicious_age">{{ __('admin.caseongoing.suspicious_age') }}</label>
                                                        <input type="number" name="arraydata[suspect{{$key+1}}][suspicious_age]"
                                                            placeholder="{{ __('admin.caseongoing.suspicious_age') }}"
                                                            value="{{$suspect->suspicious_age}}"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="suspicious_photo">{{ __('admin.caseongoing.suspicious_photo') }}</label>
                                                        <input style="padding-top: 4px;" type="file" name="arraydata[suspect{{$key+1}}][ssign]" class="form-control">
                                                        <a target="_blank" href="{{ asset('storage/'.$suspect->ssign) }}">Show</a>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group" style="margin-top: 8px;">
                                                        <label for="title_bn">{{ __('admin.caseongoing.suspicious_gender') }}: </label>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input {{ ($suspect->suspicious_gender) ? 'checked' : '' }} type="radio" class="form-check-input" name="arraydata[suspect{{$key+1}}][suspicious_gender]" value="1">{{ __('admin.caseongoing.suspicious_male') }}
                                                            </label>
                                                        </div>
                                                        <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                                <input {{ (!$suspect->suspicious_gender) ? 'checked' : '' }} type="radio" class="form-check-input" name="arraydata[suspect{{$key+1}}][suspicious_gender]" value="0">{{ __('admin.caseongoing.suspicious_female') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <a style="margin-top: 7px;" href="{{ route('admin.caseongoing.delete_suspicious_info', $suspect->id) }}" href1="{{ route('admin.caseongoing.delete_suspicious_info', [$suspect->id,1]) }}" class="btn btn-xs btn-danger deletes"><i class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-md-12"><hr></div>

                                            </div>


                                            @endforeach
                                        @else
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suspicious_name_en">{{ __('admin.caseongoing.suspicious_name_en') }}</label>
                                                    <input type="text" name="arraydata[suspect1][suspicious_name_en]"
                                                        placeholder="{{ __('admin.caseongoing.suspicious_name_en') }}"
                                                        value=""
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suspicious_name_bn">{{ __('admin.caseongoing.suspicious_name_bn') }}</label>
                                                    <input type="text" name="arraydata[suspect1][suspicious_name_bn]"
                                                        placeholder="{{ __('admin.caseongoing.suspicious_name_bn') }}"
                                                        value=""
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suspicious_details_en">{{ __('admin.caseongoing.suspicious_details_en') }}</label>
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.caseongoing.suspicious_details_en') }}"
                                                        name="arraydata[suspect1][suspicious_details_en]" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suspicious_details_bn">{{ __('admin.caseongoing.suspicious_details_bn') }}</label>
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.caseongoing.suspicious_details_bn') }}"
                                                        name="arraydata[suspect1][suspicious_details_bn]" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suspicious_guardian_en">{{ __('admin.caseongoing.suspicious_guardian_en') }}</label>
                                                    <input type="text" name="arraydata[suspect1][suspicious_guardian_en]"
                                                        placeholder="{{ __('admin.caseongoing.suspicious_guardian_en') }}"
                                                        value=""
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suspicious_guardian_bn">{{ __('admin.caseongoing.suspicious_guardian_bn') }}</label>
                                                    <input type="text" name="arraydata[suspect1][suspicious_guardian_bn]"
                                                        placeholder="{{ __('admin.caseongoing.suspicious_guardian_bn') }}"
                                                        value=""
                                                        class="form-control">
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suspicious_address_en">{{ __('admin.caseongoing.suspicious_address_en') }}</label>
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.caseongoing.suspicious_address_en') }}"
                                                        name="arraydata[suspect1][suspicious_address_en]" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suspicious_address_bn">{{ __('admin.caseongoing.suspicious_address_bn') }}</label>
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.caseongoing.suspicious_address_bn') }}"
                                                        name="arraydata[suspect1][suspicious_address_bn]" required></textarea>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suspicious_contact">{{ __('admin.caseongoing.suspicious_contact') }}</label>
                                                    <input type="number" name="arraydata[suspect1][suspicious_contact]"
                                                        placeholder="{{ __('admin.caseongoing.suspicious_contact') }}"
                                                        value=""
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suspicious_guardian_contact">{{ __('admin.caseongoing.suspicious_guardian_contact') }}</label>
                                                    <input type="number" name="arraydata[suspect1][suspicious_guardian_contact]"
                                                        placeholder="{{ __('admin.caseongoing.suspicious_guardian_contact') }}"
                                                        value=""
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suspicious_age">{{ __('admin.caseongoing.suspicious_age') }}</label>
                                                    <input type="number" name="arraydata[suspect1][suspicious_age]"
                                                        placeholder="{{ __('admin.caseongoing.suspicious_age') }}"
                                                        value=""
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="suspicious_photo">{{ __('admin.caseongoing.suspicious_photo') }}</label>
                                                    <input style="padding-top: 4px;" type="file" name="arraydata[suspect1][ssign]" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group" style="margin-top: 8px;">
                                                    <label for="title_bn">{{ __('admin.caseongoing.suspicious_gender') }}: </label>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="arraydata[suspect1][suspicious_gender]" value="1">{{ __('admin.caseongoing.suspicious_male') }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="arraydata[suspect1][suspicious_gender]" value="0">{{ __('admin.caseongoing.suspicious_female') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button disabled id="delete0" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span> </button>
                                                </div>
                                            </div>

                                            <div class="col-md-12"><hr></div>

                                        </div>
                                        @endif
                                    @else
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="suspicious_name_en">{{ __('admin.caseongoing.suspicious_name_en') }}</label>
                                                <input type="text" name="arraydata[suspect1][suspicious_name_en]"
                                                    placeholder="{{ __('admin.caseongoing.suspicious_name_en') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="suspicious_name_bn">{{ __('admin.caseongoing.suspicious_name_bn') }}</label>
                                                <input type="text" name="arraydata[suspect1][suspicious_name_bn]"
                                                    placeholder="{{ __('admin.caseongoing.suspicious_name_bn') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="suspicious_details_en">{{ __('admin.caseongoing.suspicious_details_en') }}</label>
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.caseongoing.suspicious_details_en') }}"
                                                    name="arraydata[suspect1][suspicious_details_en]" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="suspicious_details_bn">{{ __('admin.caseongoing.suspicious_details_bn') }}</label>
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.caseongoing.suspicious_details_bn') }}"
                                                    name="arraydata[suspect1][suspicious_details_bn]" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="suspicious_guardian_en">{{ __('admin.caseongoing.suspicious_guardian_en') }}</label>
                                                <input type="text" name="arraydata[suspect1][suspicious_guardian_en]"
                                                    placeholder="{{ __('admin.caseongoing.suspicious_guardian_en') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="suspicious_guardian_bn">{{ __('admin.caseongoing.suspicious_guardian_bn') }}</label>
                                                <input type="text" name="arraydata[suspect1][suspicious_guardian_bn]"
                                                    placeholder="{{ __('admin.caseongoing.suspicious_guardian_bn') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="suspicious_address_en">{{ __('admin.caseongoing.suspicious_address_en') }}</label>
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.caseongoing.suspicious_address_en') }}"
                                                    name="arraydata[suspect1][suspicious_address_en]" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="suspicious_address_bn">{{ __('admin.caseongoing.suspicious_address_bn') }}</label>
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.caseongoing.suspicious_address_bn') }}"
                                                    name="arraydata[suspect1][suspicious_address_bn]" required></textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="suspicious_contact">{{ __('admin.caseongoing.suspicious_contact') }}</label>
                                                <input type="number" name="arraydata[suspect1][suspicious_contact]"
                                                    placeholder="{{ __('admin.caseongoing.suspicious_contact') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="suspicious_guardian_contact">{{ __('admin.caseongoing.suspicious_guardian_contact') }}</label>
                                                <input type="number" name="arraydata[suspect1][suspicious_guardian_contact]"
                                                    placeholder="{{ __('admin.caseongoing.suspicious_guardian_contact') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="suspicious_age">{{ __('admin.caseongoing.suspicious_age') }}</label>
                                                <input type="number" name="arraydata[suspect1][suspicious_age]"
                                                    placeholder="{{ __('admin.caseongoing.suspicious_age') }}"
                                                    value=""
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="suspicious_photo">{{ __('admin.caseongoing.suspicious_photo') }}</label>
                                                <input style="padding-top: 4px;" type="file" name="arraydata[suspect1][ssign]" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group" style="margin-top: 8px;">
                                                <label for="title_bn">{{ __('admin.caseongoing.suspicious_gender') }}: </label>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="arraydata[suspect1][suspicious_gender]" value="1">{{ __('admin.caseongoing.suspicious_male') }}
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="arraydata[suspect1][suspicious_gender]" value="0">{{ __('admin.caseongoing.suspicious_female') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button disabled id="delete0" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span> </button>
                                            </div>
                                        </div>

                                        <div class="col-md-12"><hr></div>

                                    </div>
                                    @endif

                                    {{-- <div class="append_area"></div>

                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <a onclick="return false;"
                                                    class="add_form_field btn btn-primary btn-round form-control" href="#">
                                                    {{ __('admin.common.add_more') }} &nbsp; <i
                                                        class="fa fa-plus" aria-hidden="true"></i></a>
                                            </div>
                                        </div>

                                    </div> --}}

                                </div>
                            </div>
                            <!-- card start -->
                        </div>
                        <!-- col end -->
                    </div>
                </div>
            </section>
        </form>

    </div>

</div>
