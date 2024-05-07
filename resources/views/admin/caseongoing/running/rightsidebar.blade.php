<div class="card">
    <ul class="list-group text-bold" style="font-size: 14px">
        <li title="{{ $application->{'cperson_name_' . app()->getLocale()} }}" class="list-group-item">{{ __('admin.caseongoing.supporting_contact') }}
            <span style="float:right; border: 1px solid #DEDEDE" class="p-1 rounded-pill">
                {{-- {{ $application->{'cperson_name_' . app()->getLocale()} }} --}}
                <i class="ri-phone-line" style="color: #61C877"></i>
                {{(app()->getLocale() == 'en') ? @$application->cperson_no : engToBnHlp($application->cperson_no)}}
            </span>
        </li>
        <li class="list-group-item">{{ __('admin.caseongoing.case_category') }} :
            <span style="float:right;font-weight: normal!important;border: 1px solid purple" class="p-1">
                <i class="fa fa-map-pin px-1" style="color:#6E4798 "></i>
            {{ $application->caseCategory->{'title_' . app()->getLocale()} }}
            </span>
        </li>
        <li class="list-group-item">{{ __('admin.caseongoing.case_type') }} :
            <span style="float:right;" class="{{ isset($application->caseType) ?
                ($application->caseType->id === 1 ? 'btn btn-outline-danger' :
                ($application->caseType->id === 2 ? 'btn btn-outline-warning' :
                ($application->caseType->id === 3 ? 'btn btn-outline-primary' : 'btn btn-outline-secondary'))): '' }}">
                <i class="ri-error-warning-line"></i>
                {{ @$application->caseType->{'title_' . app()->getLocale()} }}
              </span>
        </li>
        <li class="list-group-item">{{ __('admin.caseongoing.case_status') }} :
            {{-- <span style="float:right" class="{{ isset($application->caseStatus) ?
                                        ($application->caseStatus->id === 1 ? 'btn btn-outline-secondary' :
                                        ($application->caseStatus->id === 2 ? 'btn btn-outline-warning' :
                                        ($application->caseStatus->id === 3 ? 'btn btn-outline-danger' :
                                        ($application->caseStatus->id === 4 ? 'btn btn-outline-primary' :
                                        ($application->caseStatus->id === 5 ? 'btn btn-outline-info' :
                                        ($application->caseStatus->id === 6 ? 'btn btn-outline-success' :
                                         'btn btn-outline-secondary'))))))
                                        : '' }}"> --}}
                {{-- {{ $application->caseStatus->{'title_' . app()->getLocale()} ?? '-' }} --}}

            </span>

            <div class="form-group" style="width: 50%; float:right;">
                <select style="cursor: pointer;"  class="form-control select2" id="caseStatus">
                    @foreach($case_statuses as $key => $item)
                        <option value="{{ $item->id }}" {{ ($application->case_status_id == $item->id) ? 'selected' : '' }}>{{ $item->{'title_'. app()->getLocale()} }}</option>
                    @endforeach
                </select>
            </div>
        </li>
        <li class="list-group-item">{{ __('admin.caseongoing.risk') }} :
            <span style="float:right" class="btn btn-outline-warning">
                {{ @$application->risk->{'title_' . app()->getLocale()} ?? '-' }}
            </span>
        </li>
    </ul>
    <ul class="list-group m-2 p-2">
        <span class="text-bold pb-1" >{{ __('admin.common.case_members') }}</span>
        @foreach ($admins as $item)
            <li class="list-group-item"  style="font-size: 14px">
                <div class="row">
                    <div class="col-md-3">
                        <img class="rounded-circle" alt="avatar1" style="max-width: 60px" src="{{ asset('assets/dist/img/avatar.png') }}" />
                    </div>
                    <div class="col-md-7">
                        <span style="font-size: 14px" class="text-bold">
                            {{$item->{'title_'. app()->getLocale()} }}
                        </span>
                        <br>
                        <span style="font-size: 12px" class="text-secondary">
                            {{$item->designation->{'title_'. app()->getLocale()} }}
                        </span>
                    </div>
                    <div class="col-md-2 text-right">
                        <i class="ri-phone-line rounded-circle p-2" style="background-color: #6E4798;color: white;font-size: 32px" ></i>
                    </div>
                </div>
            </li>
        @endforeach

        <div class="row justify-content-center pt-3">
            <button class="px-5 rounded-pill add-member-button" data-toggle="modal" data-target="#addMember">
                {{ __('admin.common.add_member') }}
                <i class="ri-add-line text-bold" style="font-size: 22px"></i>
            </button>
        </div>
    </ul>
    <hr>
        <div class="card p-2 m-3" style="background-color: #6E479814">
            <div class="card-title text-bold p-2">
                {{ __('admin.application.victim_info') }}
            </div>
            <hr style="width: 100px;border:2px solid #6E4798 " class="my-0 ml-2">
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >{{ __('admin.caseongoing.name') }} </span>
                        </div>
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >: {{ $application->{'name_' . app()->getLocale()} }} </span>
                        </div>
                    </div>
                    <div class="form-row pt-1">
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >{{ __('admin.caseongoing.age') }} </span>
                        </div>
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >
                                :  {{(app()->getLocale() == 'en') ? ageCal($application->dob) : dateFormatEnglishToBanglaHlp(ageCal($application->dob))}}
                            </span>
                        </div>
                    </div>
                    <div class="form-row pt-1">
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >{{ __('admin.caseongoing.address') }} </span>
                        </div>
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >: {{ $application->{'address_' . app()->getLocale()} }} </span>
                        </div>
                    </div>
                </form>

                {{-- <div class="row justify-content-center pt-3">
                    <button class="px-5 rounded-pill add-member-button" data-toggle="modal" data-target="#addMember">
                        {{ __('admin.common.add_member') }}
                        <i class="ri-add-line text-bold" style="font-size: 22px"></i>
                    </button>
                </div> --}}

                <div class="row justify-content-center pt-3">
                    <button class="px-5 rounded-pill add-member-button" data-toggle="modal" data-target="#addStep">
                        {{ __('admin.application.step_info') }}
                        <i class="ri-add-line text-bold" style="font-size: 22px"></i>
                    </button>
                </div>


                <!-- Modal for File -->
                <div class="modal fade" id="addMember" tabindex="-1" role="dialog" aria-labelledby="addMemberLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addMemberLabel">{{ __('admin.common.add_member') }}</h5>
                                <!-- Close Icon -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="ri-close-circle-line"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-edit-add" application="form" id="application_entry_form1"
                                      action="{{ route('admin.casepending.update_addmember_info', $application->id) }} }}"
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
                                                            <h3 class="card-title text-info">{{ __('admin.casepending.addmember_info') }}</h3>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    @if ($edit)
                                                                        <div class="form-group">


                                                                            <label for="district_id"> {{ __('admin.admin.district') }} {{ __('admin.casepending.committee') }}  <!--<span style="color: red"> * </span>--></label>
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
                                                                            <label for="district_id"> {{ __('admin.admin.district') }} {{ __('admin.casepending.committee') }}  <!--<span style="color: red"> * </span>--></label>
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
                                                                            <label for="upazila_id"> {{ __('admin.admin.upazila') }} {{ __('admin.casepending.committee') }} <!--<span style="color: red"> * </span>--></label>
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
                                                                            <label for="upazila_id"> {{ __('admin.admin.upazila') }} {{ __('admin.casepending.committee') }} <!--<span style="color: red"> * </span>--></label>
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
                                                                            <label for="admin_id"> {{ __('admin.casepending.walking') }} <!--<span style="color: red"> * </span>--></label>
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
                                                                            <label for="admin_id"> {{ __('admin.casepending.walking') }} <!--<span style="color: red"> * </span>--></label>
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
                    </div>
                </div>

                <div class="modal fade" id="addStep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <form class="form-edit-add" application="form" id="application_entry_form2"
                                  action="{{ route('admin.casepending.update_step_info', $application->id) }} }}"
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
                                                        <h3 class="card-title text-info">{{ __('admin.caseongoing.step_info') }}</h3>
                                                    </div>
                    
                                                    <div class="card-body">
                                                        @if ($edit)
                                                            @if (count($application->step) > 0 )
                                                                @foreach ($application->step as $key=>$step)
                                                                <input type="hidden" name="arraydata[step{{$key+1}}][id]" value="{{$step->id}}">
                    
                    
                                                                <div class="row">
                    
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="step_details_en">{{ __('admin.caseongoing.step_details_en') }}</label>
                                                                            <textarea rows="1" class="form-control"
                                                                                placeholder="{{ __('admin.caseongoing.step_details_en') }}"
                                                                                name="arraydata[step{{$key+1}}][step_details_en]" required>{{$step->step_details_en}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="step_details_bn">{{ __('admin.caseongoing.step_details_bn') }}</label>
                                                                            <textarea rows="1" class="form-control"
                                                                                placeholder="{{ __('admin.caseongoing.step_details_bn') }}"
                                                                                name="arraydata[step{{$key+1}}][step_details_bn]" required>{{$step->step_details_bn}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="users">{{ __('admin.caseongoing.users') }}</label>
                                                                            <select class="form-control select2" name="arraydata[step{{$key+1}}][users]">
                                                                                <option value="">{{ __('admin.common.select') }}</option>
                                                                                @foreach ($admins as $key => $item)
                                                                                <option value="{{ $item->id }}" @if (@$application->users)
                                                                                                    {{(in_array(@$item->id, json_decode(@$application->users))) ? 'selected' : ''}}
                                                                                                    @endif >{{ $item->officeDesignation->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                    
                    
                                                                    <div class="col-md-1">
                                                                        <div class="form-group">
                                                                            <label for="step_details_bn" style="visibility: hidden">NONE</label> <br>
                                                                            <a style="margin-top: 7px;" href="{{ route('admin.caseongoing.delete_step_info', $step->id) }}" href1="{{ route('admin.caseongoing.delete_step_info', [$step->id,1]) }}" class="btn btn-xs btn-danger deletes"><i class="fas fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </div>
                    
                                                                    <div class="col-md-12"><hr></div>
                    
                                                                </div>
                    
                    
                                                                @endforeach
                                                            @else
                                                            <div class="row">
                    
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="step_details_en">{{ __('admin.caseongoing.step_details_en') }}</label>
                                                                        <textarea rows="1" class="form-control"
                                                                            placeholder="{{ __('admin.caseongoing.step_details_en') }}"
                                                                            name="arraydata[step1][step_details_en]" required></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="step_details_bn">{{ __('admin.caseongoing.step_details_bn') }}</label>
                                                                        <textarea rows="1" class="form-control"
                                                                            placeholder="{{ __('admin.caseongoing.step_details_bn') }}"
                                                                            name="arraydata[step1][step_details_bn]" required></textarea>
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="users">{{ __('admin.caseongoing.users') }}</label>
                                                                        <select class="form-control select2" name="arraydata[step1][users]">
                                                                            <option value="">{{ __('admin.common.select') }}</option>
                                                                            @foreach ($admins as $key => $item)
                                                                            <option value="{{ $item->id }}">{{ $item->officeDesignation->{'title_'. app()->getLocale()} }} - {{ $item->code }}</option>
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
                                                                    <label for="step_details_en">{{ __('admin.caseongoing.step_details_en') }}</label>
                                                                    <textarea rows="1" class="form-control"
                                                                        placeholder="{{ __('admin.caseongoing.step_details_en') }}"
                                                                        name="arraydata[step1][step_details_en]" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="step_details_bn">{{ __('admin.caseongoing.step_details_bn') }}</label>
                                                                    <textarea rows="1" class="form-control"
                                                                        placeholder="{{ __('admin.caseongoing.step_details_bn') }}"
                                                                        name="arraydata[step1][step_details_bn]" required></textarea>
                                                                </div>
                                                            </div>
                    
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="users">{{ __('admin.caseongoing.users') }}</label>
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
                                                        <h3 class="card-title text-info">{{ __('admin.caseongoing.step_info') }}</h3>
                                                    </div>
                    
                                                    <div class="card-body">
                                                        <div class="row">
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="step_date">{{ __('admin.caseongoing.step_date') }} </label>
                                                                    <input type="text" name="step_date" id="step_date"
                                                                        placeholder="{{ __('admin.caseongoing.step_date') }}"
                                                                        value="{{ ($edit)? $application->step_date : '' }}"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                    
                                                            {{-- <div class="col-md-4">
                                                                @if($edit)
                                                                    <div class="form-group">
                                                                        <label for="risk_id">{{ __('admin.caseongoing.risk') }}</label>
                                                                        <select class="form-control select2" name="risk_id" id="risk_id" required>
                                                                            <option value="">{{ __('admin.common.select') }}</option>
                                                                            @foreach($risks as $key => $item)
                                                                                <option value="{{ $item->id }}" {{ ($application->risk_id == $item->id) ? 'selected' : '' }}>{{ $item->{'title_'. app()->getLocale()} }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                @else
                                                                    <div class="form-group">
                                                                        <label for="risk_id">{{ __('admin.caseongoing.risk') }} </label>
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
                                                                        <label for="case_status_id">{{ __('admin.caseongoing.case_status') }}</label>
                                                                        <select class="form-control select2" name="case_status_id" id="case_status_id" required>
                                                                            <option value="">{{ __('admin.common.select') }}</option>
                                                                            @foreach($case_statuses as $key => $item)
                                                                                <option value="{{ $item->id }}" {{ ($application->case_status_id == $item->id) ? 'selected' : '' }}>{{ $item->{'title_'. app()->getLocale()} }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                @else
                                                                    <div class="form-group">
                                                                        <label for="case_status_id">{{ __('admin.caseongoing.case_status') }}</label>
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
                                                            </div> --}}

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="step_date" style="visibility: hidden">{{ __('admin.caseongoing.step_date') }} </label>
                                                                    <button type="submit" class="btn btn-info btn-sm form-control save">
                                                                        <i class="fas fa-save"></i> {{ __('admin.common.save') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                    
                                                    </div>
                    
                                                </div>
                                                <!-- card start -->
                                            </div>
                                            <!-- col end -->
                    
                                            
                                            <!-- col start -->
                                            {{-- <div class="col-md-12">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </section>
                            </form>
                        </div>
                    </div>
                </div>


                <div style="text-align: center;">
                <hr class="my-2" style=" border: 1px solid #6E4798; margin: 0 auto;">
            </div>
                <div class="row justify-content-center ">
                    <a target="_blank" href="{{ route('admin.caseongoing.pdf_case_info', $application->id) }}" class="btn py-3 px-5 download-pdf-btn w-100">
                        {{__('admin.case.download_pdf')}}
                        <i class="ri-download-line"></i>
                    </a>
                    {{-- <button class="btn py-3 px-5 download-pdf-btn w-100">
                        {{__('admin.case.download_pdf')}}
                        <i class="ri-download-line"></i>
                    </button> --}}
                </div>
                {{-- <div class="row justify-content-center pt-3 ">
                    <button class="add-member-button p-3 w-100">
                        {{ __('admin.caseongoing.victim_info') }}
                        <i class="ri-arrow-right-line"></i>
                    </button>
                </div> --}}
            <div style="text-align: center;">
                <hr class="my-3" style=" border: 1px solid #6E4798; margin: 0 auto;">
            </div>
                <div class="d-flex justify-content-center">
                    <span class="p-1 border border-secondary font-weight-bold " style="color: #05003A">
                        <i class="fas fa-hourglass-half" style="color:#6E4798 "></i>
                        {{ (app()->getLocale() == 'en') ?
                        findTimer(@$application->step_date,app()->getLocale())  :
                        dateFormatEnglishToBanglaHlp( findTimer(@$application->step_date,app()->getLocale())) }}
                    </span>
                </div>
            </div>
        </div>
</div>
