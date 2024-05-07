<div class="row" style="background-color: #F8FBF0">
    <div class="col-md-12 card">
        
        <form class="form-edit-add" application="form" id="application_entry_form"
            action="{{ !$edit ? route('admin.casedeclined.store') : route('admin.casedeclined.update', $application->id) }}"
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
                        <div class="col-md-4">
                            <!-- card start -->
                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-title text-info">{{ __('admin.casedeclined.victim_info') }}</h3>
                                </div>

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="name_en">{{ __('admin.casedeclined.name_en') }}</label>
                                        <input type="text" name="name_en" id="name_en"
                                            placeholder="{{ __('admin.casedeclined.name_en') }}"
                                            value="{{ $edit?$application->name_en:old('name_en') }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="name_bn">{{ __('admin.casedeclined.name_bn') }}</label>
                                        <input type="text" name="name_bn" id="name_bn"
                                            placeholder="{{ __('admin.casedeclined.name_bn') }}"
                                            value="{{ $edit?$application->name_bn:old('name_bn') }}"
                                            class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label for="dob">{{ __('admin.casedeclined.dob') }} </label>
                                        <input type="text" name="dob" id="dob"
                                            placeholder="{{ __('admin.casedeclined.dob') }}"
                                            value="{{ ($edit)? $application->dob : '' }}"
                                            class="form-control">
                                    </div>

                                    @if ($edit)
                                        <div class="form-group">
                                        <label for="division_id">{{ __('admin.casedeclined.victim') }} {{ __('admin.admin.division') }} <!--<span style="color: red"> * </span>--></label>
                                        <select class="form-control select2" name="division_id" id="division_id">
                                            <option value="">{{ __('admin.common.select') }}</option>
                                            @foreach ($divisions as $key => $item)
                                            <option value="{{ $item->id }}" {{($application->division_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->bbs_code }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    @else
                                        <div class="form-group">
                                        <label for="division_id">{{ __('admin.casedeclined.victim') }} {{ __('admin.admin.division') }} <!--<span style="color: red"> * </span>--></label>
                                        <select class="form-control select2" name="division_id" id="division_id">
                                            <option value="">{{ __('admin.common.select') }}</option>
                                            @foreach ($divisions as $key => $item)
                                            <option value="{{ $item->id }}" {{(old('division_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} </option>
                                            @endforeach
                                        </select>
                                        </div>
                                    @endif


                                    @if ($edit)
                                        <div class="form-group">
                                        <label for="district_id">{{ __('admin.casedeclined.victim') }} {{ __('admin.admin.district') }} <!--<span style="color: red"> * </span>--></label>
                                        <select class="form-control select2" name="district_id" id="district_id">
                                            <option value="">{{ __('admin.common.select') }}</option>
                                            @foreach ($districts as $key => $item)
                                            <option value="{{ $item->id }}" {{($application->district_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->bbs_code }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    @else
                                        <div class="form-group">
                                        <label for="district_id">{{ __('admin.casedeclined.victim') }} {{ __('admin.admin.district') }} <!--<span style="color: red"> * </span>--></label>
                                        <select class="form-control select2" name="district_id" id="district_id">
                                            <option value="">{{ __('admin.common.select') }}</option>
                                            @foreach ($districts as $key => $item)
                                            <option value="{{ $item->id }}" {{(old('district_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} </option>
                                            @endforeach
                                        </select>
                                        </div>
                                    @endif


                                    @if ($edit)
                                        <div class="form-group">
                                        <label for="upazila_id">{{ __('admin.casedeclined.victim') }} {{ __('admin.admin.upazila') }} <!--<span style="color: red"> * </span>--></label>
                                        <select class="form-control select2" name="upazila_id" id="upazila_id">
                                            <option value="">{{ __('admin.common.select') }}</option>
                                            @foreach ($upazilas as $key => $item)
                                            <option value="{{ $item->id }}" {{($application->upazila_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->bbs_code }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    @else
                                        <div class="form-group">
                                        <label for="upazila_id">{{ __('admin.casedeclined.victim') }} {{ __('admin.admin.upazila') }} <!--<span style="color: red"> * </span>--></label>
                                        <select class="form-control select2" name="upazila_id" id="upazila_id">
                                            <option value="">{{ __('admin.common.select') }}</option>
                                            @foreach ($upazilas as $key => $item)
                                            <option value="{{ $item->id }}" {{(old('upazila_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} </option>
                                            @endforeach
                                        </select>
                                        </div>
                                    @endif

                                    @if ($edit)
                                        <div class="form-group">
                                        <label for="thana_id">{{ __('admin.casedeclined.victim') }} {{ __('admin.admin.thana') }}</label>
                                        <select class="form-control select2" name="thana_id" id="thana_id">
                                            <option value="">{{ __('admin.common.select') }}</option>
                                            @foreach ($thanas as $key => $item)
                                            <option value="{{ $item->id }}" {{($application->thana_id == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->bbs_code }} </option>
                                            @endforeach
                                        </select>
                                        </div>
                                    @else
                                        <div class="form-group">
                                        <label for="thana_id">{{ __('admin.casedeclined.victim') }} {{ __('admin.admin.thana') }}</label>
                                        <select class="form-control select2" name="thana_id" id="thana_id">
                                            <option value="">{{ __('admin.common.select') }}</option>

                                            {{-- @foreach ($thanas as $key => $item)
                                            <option value="{{ $item->id }}" {{(old('thana_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }}  - {{ $item->code }} </option>
                                            @endforeach --}}
                                        </select>
                                        </div>
                                    @endif


                                </div>

                            </div>
                            <!-- card start -->
                        </div>
                        <!-- col end -->

                        <!-- col start -->
                        <div class="col-md-4">
                            <!-- card start -->
                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-title text-info">{{ __('admin.casedeclined.victim_info') }}</h3>
                                </div>

                                <div class="card-body">


                                    <div class="form-group">
                                        <label for="title_bn"
                                            style="padding-right:20%;padding-top: 3%;">{{ __('admin.casedeclined.gender') }}
                                            : </label> <br>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" value="1"
                                                    {{ ($edit && ($application->gender)) ? 'checked' : '' }}>{{ __('admin.casedeclined.male') }}
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="gender" value="0"
                                                    {{ ($edit && (!$application->gender)) ? 'checked' : '' }}>{{ __('admin.casedeclined.female') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="class_en">{{ __('admin.casedeclined.class_en') }}</label>
                                        <input type="text" name="class_en" id="class_en"
                                            placeholder="{{ __('admin.casedeclined.class_en') }}"
                                            value="{{ $edit?$application->class_en:old('class_en') }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="class_bn">{{ __('admin.casedeclined.class_bn') }}</label>
                                        <input type="text" name="class_bn" id="class_bn"
                                            placeholder="{{ __('admin.casedeclined.class_bn') }}"
                                            value="{{ $edit?$application->class_bn:old('class_bn') }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="school_en">{{ __('admin.casedeclined.school_en') }}</label>
                                        <input type="text" name="school_en" id="school_en"
                                            placeholder="{{ __('admin.casedeclined.school_en') }}"
                                            value="{{ $edit?$application->school_en:old('school_en') }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="school_bn">{{ __('admin.casedeclined.school_bn') }}</label>
                                        <input type="text" name="school_bn" id="school_bn"
                                            placeholder="{{ __('admin.casedeclined.school_bn') }}"
                                            value="{{ $edit?$application->school_bn:old('school_bn') }}"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label
                                            for="address_en">{{ __('admin.casedeclined.address_en') }}</label>
                                        <textarea rows="1" id="address_en" class="form-control"
                                            placeholder="{{ __('admin.casedeclined.address_en') }}"
                                            name="address_en"
                                            required>{{ $edit?$application->address_en:old('address_en') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label
                                            for="address_bn">{{ __('admin.casedeclined.address_bn') }}</label>
                                        <textarea rows="1" id="address_bn" class="form-control"
                                            placeholder="{{ __('admin.casedeclined.address_bn') }}"
                                            name="address_bn"
                                            required>{{ $edit?$application->address_bn:old('address_bn') }}</textarea>
                                    </div>

                                </div>

                            </div>
                            <!-- card start -->
                        </div>
                        <!-- col end -->


                        <!-- col start -->
                        <div class="col-md-4">
                            <!-- card start -->
                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-title text-info">{{ __('admin.casedeclined.victim_info') }}</h3>
                                </div>

                                <div class="card-body">


                                    <div class="form-group">
                                        <label
                                            for="guardian_en">{{ __('admin.casedeclined.guardian_en') }}</label>
                                        <input type="text" name="guardian_en" id="guardian_en"
                                            placeholder="{{ __('admin.casedeclined.guardian_en') }}"
                                            value="{{ $edit?$application->guardian_en:old('guardian_en') }}"
                                            class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label
                                            for="guardian_bn">{{ __('admin.casedeclined.guardian_bn') }}</label>
                                        <input type="text" name="guardian_bn" id="guardian_bn"
                                            placeholder="{{ __('admin.casedeclined.guardian_bn') }}"
                                            value="{{ $edit?$application->guardian_bn:old('guardian_bn') }}"
                                            class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label
                                            for="guardian_contact">{{ __('admin.casedeclined.guardian_contact') }}</label>
                                        <input type="text" name="guardian_contact" id="guardian_contact"
                                            placeholder="{{ __('admin.casedeclined.guardian_contact') }}"
                                            value="{{ $edit?$application->guardian_contact:old('guardian_contact') }}"
                                            class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label
                                            for="contact">{{ __('admin.casedeclined.contact') }}</label>
                                        <input type="text" name="contact" id="contact"
                                            placeholder="{{ __('admin.casedeclined.contact') }}"
                                            value="{{ $edit?$application->contact:old('contact') }}"
                                            class="form-control" required>
                                    </div>

                                    {{-- <div class="form-group">
                                        <label
                                            for="spouse_en">{{ __('admin.casedeclined.spouse_en') }}</label>
                                        <input type="text" name="spouse_en" id="spouse_en"
                                            placeholder="{{ __('admin.casedeclined.spouse_en') }}"
                                            value="{{ $edit?$application->spouse_en:old('spouse_en') }}"
                                            class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label
                                            for="spouse_bn">{{ __('admin.casedeclined.spouse_bn') }}</label>
                                        <input type="text" name="spouse_bn" id="spouse_bn"
                                            placeholder="{{ __('admin.casedeclined.spouse_bn') }}"
                                            value="{{ $edit?$application->spouse_bn:old('spouse_bn') }}"
                                            class="form-control" required>
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="dsign">
                                            {{ __('admin.casedeclined.dsign') }} <span
                                                class="text-warning">
                                                ({{ __('admin.common.file_size_100') }})</span>
                                        </label>
                                        <input style="padding-top: 4px;" type="file" name="dsign" id="dsign"
                                            class="form-control">
                                        @if($edit && $application->dsign)
                                            <a target="_blank"
                                                href="{{ asset('storage/'.$application->dsign) }}">Show</a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <!-- card start -->
                        </div>
                        <!-- col end -->




                        <!-- col start -->
                        <div class="col-md-3">
                            <!-- card start -->
                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-title text-info">{{ __('admin.casedeclined.application_info') }}</h3>
                                </div>

                                <div class="card-body">


                                    <div class="form-group">
                                        <label
                                            for="title_en">{{ __('admin.casedeclined.title_en') }}</label>
                                        <textarea rows="1" id="title_en" class="form-control"
                                            placeholder="{{ __('admin.casedeclined.title_en') }}"
                                            name="title_en"
                                            required>{{ $edit?$application->title_en:old('title_en') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label
                                            for="title_bn">{{ __('admin.casedeclined.title_bn') }}</label>
                                        <textarea rows="1" id="title_bn" class="form-control"
                                            placeholder="{{ __('admin.casedeclined.title_bn') }}"
                                            name="title_bn"
                                            required>{{ $edit?$application->title_bn:old('title_bn') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label
                                            for="title_details_en">{{ __('admin.casedeclined.title_details_en') }}</label>
                                        <textarea rows="1" id="title_details_en" class="form-control"
                                            placeholder="{{ __('admin.casedeclined.title_details_en') }}"
                                            name="title_details_en"
                                            required>{{ $edit?$application->title_details_en:old('title_details_en') }}</textarea>
                                    </div>

                                </div>

                            </div>
                            <!-- card start -->
                        </div>
                        <!-- col end -->

                        <!-- col start -->
                        <div class="col-md-3">
                            <!-- card start -->
                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-title text-info">{{ __('admin.casedeclined.application_info') }}</h3>
                                </div>

                                <div class="card-body">

                                    <div class="form-group">
                                        <label
                                            for="title_details_bn">{{ __('admin.casedeclined.title_details_bn') }}</label>
                                        <textarea rows="1" id="title_details_bn" class="form-control"
                                            placeholder="{{ __('admin.casedeclined.title_details_bn') }}"
                                            name="title_details_bn"
                                            required>{{ $edit?$application->title_details_bn:old('title_details_bn') }}</textarea>
                                    </div>

                                    @if($edit)
                                        <div class="form-group">
                                            <label for="case_type_id">{{ __('admin.casedeclined.case_type') }}<!--<span style="color: red"> * </span>--></label>
                                            <select class="form-control select2" name="case_type_id" id="case_type_id" required>
                                                <option value="">{{ __('admin.common.select') }}</option>


                                                @foreach($case_types as $key => $item)
                                                    <option value="{{ $item->id }}" {{ ($application->case_type_id == $item->id) ? 'selected' : '' }}>{{ $item->{'title_'. app()->getLocale()} }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="case_type_id">{{ __('admin.casedeclined.case_type') }} <!--<span style="color: red"> * </span>--></label>
                                            <select class="form-control select2" name="case_type_id" id="case_type_id" required>
                                                <option value="">{{ __('admin.common.select') }}</option>
                                                @foreach($case_types as $key => $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ (old('case_type_id') == $item->id) ? 'selected' : '' }}>
                                                        {{ $item->{'title_'. app()->getLocale()} }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if($edit)
                                        <div class="form-group">
                                            <label for="case_category_id">{{ __('admin.casedeclined.case_category') }}<!--<span style="color: red"> * </span>--></label>
                                            <select class="form-control select2" name="case_category_id" id="case_category_id" required>
                                                <option value="">{{ __('admin.common.select') }}</option>
                                                @foreach($case_categories as $key => $item)
                                                    <option value="{{ $item->id }}" {{ ($application->case_category_id == $item->id) ? 'selected' : '' }}>{{ $item->{'title_'. app()->getLocale()} }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label for="case_category_id">{{ __('admin.casedeclined.case_category') }} <!--<span style="color: red"> * </span>--></label>
                                            <select class="form-control select2" name="case_category_id" id="case_category_id" required>
                                                <option value="">{{ __('admin.common.select') }}</option>
                                                @foreach($case_categories as $key => $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ (old('case_category_id') == $item->id) ? 'selected' : '' }}>
                                                        {{ $item->{'title_'. app()->getLocale()} }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                </div>

                            </div>
                            <!-- card start -->
                        </div>
                        <!-- col end -->


                        <!-- col start -->
                        <div class="col-md-6">
                            <!-- card start -->
                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-title text-info">{{ __('admin.casedeclined.documents_info') }}</h3>
                                </div>

                                <div class="card-body">
                                    @if ($edit)
                                        @if (count($application->file) > 0 )
                                            @foreach ($application->file as $key=>$file)
                                            <input type="hidden" name="arraydata[file{{$key+1}}][id]" value="{{$file->id}}">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="arraydata[file{{$key+1}}][title_en]" id="title_en{{$key+1}}" placeholder="{{ __('admin.casedeclined.file_title_en') }}" value="{{@$file->title_en}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="arraydata[file{{$key+1}}][title_bn]" id="title_bn{{$key+1}}" placeholder="{{ __('admin.casedeclined.file_title_bn') }}" value="{{@$file->title_bn}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input style="padding-top: 4px;" type="file" name="arraydata[file{{$key+1}}][thumb]" id="thumb{{$key+1}}" class="form-control">
                                                        <a target="_blank" href="{{ asset('storage/'.$file->thumb) }}">Show</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    @can('delete_single_file', app('App\Models\Casedeclined'))
                                                    <div class="form-group">
                                                        <a style="margin-top: 7px;" href="{{ route('admin.application_file.delete', $file->id) }}" href1="{{ route('admin.application_file.delete', [$file->id,1]) }}" class="btn btn-xs btn-danger deletes"><i class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                    @endcan
                                                </div>
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="arraydata[file1][title_en]" id="title_en" placeholder="{{ __('admin.casedeclined.file_title_en') }}" value="{{@$file->title_en}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input type="text" name="arraydata[file1][title_bn]" id="title_bn" placeholder="{{ __('admin.casedeclined.file_title_bn') }}" value="{{@$file->title_bn}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input style="padding-top: 4px;" type="file" name="arraydata[file1][thumb]" id="thumb" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <button disabled id="delete0" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="arraydata[file1][title_en]" id="title_en" placeholder="{{ __('admin.casedeclined.file_title_en') }}" value="{{@$file->title_en}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="text" name="arraydata[file1][title_bn]" id="title_bn" placeholder="{{ __('admin.casedeclined.file_title_bn') }}" value="{{@$file->title_bn}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input style="padding-top: 4px;" type="file" name="arraydata[file1][thumb]" id="thumb" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <button disabled id="delete0" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span> </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- @can('update_evidence_files', app('App\Models\Casedeclined'))
                                    <div class="append_area"></div>
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

                                    </div>
                                    @endcan --}}

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
