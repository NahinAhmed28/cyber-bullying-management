<div class="row" style="background-color: #F8FBF0">
    <div class="col-md-12 card">
        
        <form class="form-edit-add" application="form" id="application_entry_form"
            action="{{ route('admin.caseincomplete.update_step_info', $application->id) }} }}"
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
                                    <h3 class="card-title text-info">{{ __('admin.caseincomplete.step_info') }}</h3>
                                </div>

                                <div class="card-body">
                                    @if ($edit)
                                        @if (count($application->step) > 0 )
                                            @foreach ($application->step as $key=>$step)
                                            <input type="hidden" name="arraydata[step{{$key+1}}][id]" value="{{$step->id}}">


                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="step_details_en">{{ __('admin.caseincomplete.step_details_en') }}</label>
                                                        <textarea rows="1" class="form-control"
                                                            placeholder="{{ __('admin.caseincomplete.step_details_en') }}"
                                                            name="arraydata[step{{$key+1}}][step_details_en]" required>{{$step->step_details_en}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="step_details_bn">{{ __('admin.caseincomplete.step_details_bn') }}</label>
                                                        <textarea rows="1" class="form-control"
                                                            placeholder="{{ __('admin.caseincomplete.step_details_bn') }}"
                                                            name="arraydata[step{{$key+1}}][step_details_bn]" required>{{$step->step_details_bn}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="users">{{ __('admin.caseincomplete.users') }}</label>
                                                        <select class="form-control select2" name="arraydata[step{{$key+1}}][users]">
                                                            <option value="">{{ __('admin.common.select') }}</option>
                                                            @foreach ($admins as $key => $item)
                                                            <option value="{{ $item->id }}" @if (@$application->users)
                                                                                {{(in_array(@$item->id, json_decode(@$application->users))) ? 'selected' : ''}}
                                                                                @endif >{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label for="step_details_bn" style="visibility: hidden">NONE</label> <br>
                                                        <a style="margin-top: 7px;" href="{{ route('admin.caseincomplete.delete_step_info', $step->id) }}" href1="{{ route('admin.caseincomplete.delete_step_info', [$step->id,1]) }}" class="btn btn-xs btn-danger deletes"><i class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                </div>

                                                <div class="col-md-12"><hr></div>

                                            </div>


                                            @endforeach
                                        @else
                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="step_details_en">{{ __('admin.caseincomplete.step_details_en') }}</label>
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.caseincomplete.step_details_en') }}"
                                                        name="arraydata[step1][step_details_en]" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="step_details_bn">{{ __('admin.caseincomplete.step_details_bn') }}</label>
                                                    <textarea rows="1" class="form-control"
                                                        placeholder="{{ __('admin.caseincomplete.step_details_bn') }}"
                                                        name="arraydata[step1][step_details_bn]" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="users">{{ __('admin.caseincomplete.users') }}</label>
                                                    <select class="form-control select2" name="arraydata[step1][users]">
                                                        <option value="">{{ __('admin.common.select') }}</option>
                                                        @foreach ($admins as $key => $item)
                                                        <option value="{{ $item->id }}">{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <button style="margin-top:32px" disabled id="delete0" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span> </button>
                                                </div>
                                            </div>

                                            <div class="col-md-12"><hr></div>

                                        </div>
                                        @endif
                                    @else
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="step_details_en">{{ __('admin.caseincomplete.step_details_en') }}</label>
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.caseincomplete.step_details_en') }}"
                                                    name="arraydata[step1][step_details_en]" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="step_details_bn">{{ __('admin.caseincomplete.step_details_bn') }}</label>
                                                <textarea rows="1" class="form-control"
                                                    placeholder="{{ __('admin.caseincomplete.step_details_bn') }}"
                                                    name="arraydata[step1][step_details_bn]" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="users">{{ __('admin.caseincomplete.users') }}</label>
                                                <select class="form-control select2" name="arraydata[step1][users]">
                                                    <option value="">{{ __('admin.common.select') }}</option>
                                                    @foreach ($admins as $key => $item)
                                                    <option value="{{ $item->id }}">{{ $item->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <button disabled id="delete0" class="delete btn btn-danger btn-round form-control"><span> <i class="fa fa-minus" aria-hidden="true"></i></span> </button>
                                            </div>
                                        </div>

                                        <div class="col-md-12"><hr></div>

                                    </div>
                                    @endif

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
                                    <h3 class="card-title text-info">{{ __('admin.caseincomplete.step_info') }}</h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="step_date">{{ __('admin.caseincomplete.step_date') }} </label>
                                                <input type="text" name="step_date" id="step_date"
                                                    placeholder="{{ __('admin.caseincomplete.step_date') }}"
                                                    value="{{ ($edit)? $application->step_date : '' }}"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            @if($edit)
                                                <div class="form-group">
                                                    <label for="risk_id">{{ __('admin.caseincomplete.risk') }}<!--<span style="color: red"> * </span>--></label>
                                                    <select class="form-control select2" name="risk_id" id="risk_id" required>
                                                        <option value="">{{ __('admin.common.select') }}</option>
                                                        @foreach($risks as $key => $item)
                                                            <option value="{{ $item->id }}" {{ ($application->risk_id == $item->id) ? 'selected' : '' }}>{{ $item->{'title_'. app()->getLocale()} }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <label for="risk_id">{{ __('admin.caseincomplete.risk') }} <!--<span style="color: red"> * </span>--></label>
                                                    <select class="form-control select2" name="risk_id" id="risk_id" required>
                                                        <option value="">{{ __('admin.common.select') }}</option>
                                                        @foreach($risks as $key => $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ (old('risk_id') == $item->id) ? 'selected' : '' }}>
                                                                {{ $item->{'title_'. app()->getLocale()} }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-4">
                                            @if($edit)
                                                <div class="form-group">
                                                    <label for="case_status_id">{{ __('admin.caseincomplete.case_status') }}<!--<span style="color: red"> * </span>--></label>
                                                    <select class="form-control select2" name="case_status_id" id="case_status_id" required>
                                                        <option value="">{{ __('admin.common.select') }}</option>
                                                        @foreach($case_statuses as $key => $item)
                                                            <option value="{{ $item->id }}" {{ ($application->case_status_id == $item->id) ? 'selected' : '' }}>{{ $item->{'title_'. app()->getLocale()} }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @else
                                                <div class="form-group">
                                                    <label for="case_status_id">{{ __('admin.caseincomplete.case_status') }} <!--<span style="color: red"> * </span>--></label>
                                                    <select class="form-control select2" name="case_status_id" id="case_status_id" required>
                                                        <option value="">{{ __('admin.common.select') }}</option>
                                                        @foreach($case_statuses as $key => $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ (old('case_status_id') == $item->id) ? 'selected' : '' }}>
                                                                {{ $item->{'title_'. app()->getLocale()} }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                        </div>
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

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info btn-sm form-control save">
                                                    <i class="fas fa-save"></i> {{ __('admin.common.save') }}
                                                </button>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <button onclick="return flase" type="submit" class="btn btn-primary btn-sm form-control">
                                                    <i class="fas fa-save"></i> {{ __('admin.common.approve') }}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-warning btn-sm form-control">
                                                    <i class="fas fa-save"></i> {{ __('admin.common.declined') }}
                                                </button>
                                            </div>
                                        </div> --}}
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
