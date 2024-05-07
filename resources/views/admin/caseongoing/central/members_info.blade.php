<div class="row" style="background-color: #F8FBF0">
    <div class="col-md-12 card">
        
        <form class="form-edit-add" application="form" id="application_entry_form"
            action="{{ route('admin.caseongoing.update_addmember_info', $application->id) }} }}"
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
                                    <h3 class="card-title text-info">{{ __('admin.caseongoing.addmember_info') }}</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            @if ($edit)
                                                <div class="form-group">


                                                    <label for="district_id"> {{ __('admin.admin.district') }} {{ __('admin.caseongoing.committee') }}  <!--<span style="color: red"> * </span>--></label>
                                                    <select multiple="multiple" class="form-control select2bs4" name="districts[]" id="district_id">
                                                        <option value="">{{ __('admin.common.select') }}</option>
                                                        @foreach ($districts as $key => $item)
                                                            <option value="{{ $item->id }}" @if (@$application->districts)
                                                                {{(in_array(@$item->id, json_decode(@$application->districts))) ? 'selected' : ''}}
                                                                @endif >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->bbs_code }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @else
                                                <div class="form-group">
                                                    <label for="district_id"> {{ __('admin.admin.district') }} {{ __('admin.caseongoing.committee') }}  <!--<span style="color: red"> * </span>--></label>
                                                    <select multiple="multiple" class="form-control select2bs4" name="districts[]" id="district_id">
                                                        <option value="">{{ __('admin.common.select') }}</option>
                                                        @foreach ($districts as $key => $item)
                                                            <option value="{{ $item->id }}" {{(old('district_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                        </div>

                                        <div class="col-md-4">
                                            @if ($edit)
                                                <div class="form-group">
                                                    <label for="upazila_id"> {{ __('admin.admin.upazila') }} {{ __('admin.caseongoing.committee') }} <!--<span style="color: red"> * </span>--></label>
                                                    <select multiple="multiple" class="form-control select2bs4" name="upazilas[]" id="upazila_id">
                                                        <option value="">{{ __('admin.common.select') }}</option>
                                                        @foreach ($upazilas as $key => $item)
                                                            <option value="{{ $item->id }}" @if (@$application->upazilas)
                                                                {{(in_array(@$item->id, json_decode(@$application->upazilas))) ? 'selected' : ''}}
                                                                @endif >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->bbs_code }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @else
                                                <div class="form-group">
                                                    <label for="upazila_id"> {{ __('admin.admin.upazila') }} {{ __('admin.caseongoing.committee') }} <!--<span style="color: red"> * </span>--></label>
                                                    <select multiple="multiple" class="form-control select2bs4" name="upazilas[]" id="upazila_id">
                                                        <option value="">{{ __('admin.common.select') }}</option>
                                                        @foreach ($upazilas as $key => $item)
                                                            <option value="{{ $item->id }}" {{(old('upazila_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                        </div>

                                        <div class="col-md-4">
                                            @if ($edit)
                                                <div class="form-group">
                                                    <label for="admin_id"> {{ __('admin.caseongoing.walking') }} <!--<span style="color: red"> * </span>--></label>
                                                    <select multiple="multiple" class="form-control select2bs4" name="wusers[]" id="admin_id">
                                                        <option value="">{{ __('admin.common.select') }}</option>
                                                        @foreach ($walkings as $key => $item)
                                                        
                                                            <option value="{{ $item->id }}" @if (@$application->wusers)
                                                                {{(in_array(@$item->id, json_decode(@$application->wusers))) ? 'selected' : ''}}
                                                                @endif  >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->bbs_code }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @else
                                                <div class="form-group">
                                                    <label for="admin_id"> {{ __('admin.caseongoing.walking') }} <!--<span style="color: red"> * </span>--></label>
                                                    <select multiple="multiple" class="form-control select2bs4" name="wusers[]" id="admin_id">
                                                        <option value="">{{ __('admin.common.select') }}</option>
                                                        @foreach ($walkings as $key => $item)
                                                            <option value="{{ $item->id }}" {{(old('admin_id') == $item->id) ? 'selected' : ''}} >{{ $item->{'title_'. app()->getLocale()} }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                        </div>


                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Multiple </label>
                                                <select class="select2bs4" multiple="multiple" data-placeholder="Select a State"
                                                        style="width: 100%;">
                                                <option>Alabama</option>
                                                <option>Alaska</option>
                                                <option>California</option>
                                                <option>Delaware</option>
                                                <option>Tennessee</option>
                                                <option>Texas</option>
                                                <option>Washington</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>

                                </div>

                            </div>
                            <!-- card start -->
                        </div>
                        <!-- col end -->



                        <!-- col start -->
                        <div class="col-md-12">
                            <!-- card start -->
                            <div class="card">

                                <div class="card-header">
                                    <h3 class="card-title text-info">{{ __('admin.common.save_it') }}</h3>
                                </div>

                                <div class="card-body">

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info btn-sm form-control save">
                                            <i class="fas fa-save"></i> {{ __('admin.common.save') }}
                                        </button>
                                    </div>


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