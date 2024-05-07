{{-- <div class="row">
    <div class="col-md-3 ml-4">
        <span class="text-secondary" style="font-size: 10px"> {{__('admin.common.case_created')}} -
            {{(app()->getLocale() == 'en') ? $application->created_at->format('d/m/Y :  h:i A') : dateFormatEnglishToBanglaHlp($application->created_at->format('d/m/Y :  h:i A')) }}
        </span>
    </div>
    <div class="col-md-5">
        <span> {{ __('admin.case.case_category') }} : </span>
        <span class="p-1 border border-secondary font-weight-bold" style="color: #05003A">
            <i class="fa fa-map-pin" style="color:#6E4798 "></i>
            {{ $application->caseCategory->{'title_' . app()->getLocale()} }}
        </span>
    </div>
    <div class="col-md-3" >
        {{ __('admin.case.case_status') }} :
        <span class=" {{ isset($application->caseType) ?
                ($application->caseType->id === 1 ? 'btn btn-outline-danger' :
                ($application->caseType->id === 2 ? 'btn btn-outline-warning' :
                ($application->caseType->id === 3 ? 'btn btn-outline-primary' : 'btn btn-outline-secondary'))): '' }}">

            <i class="ri-error-warning-line"></i>
            {{ @$application->caseType->{'title_' . app()->getLocale()} }}
       </span>
    </div>
</div> --}}

<div class="container-fluid" style="background-color: #F8FBF0">
    <div class="card">
        <div class="card-header">
            <p class="text-info text-bold">
                {{(app()->getLocale() == 'en') ? "All documents" : "সমস্ত নথি সমূহ "}}
            </p>
        </div>
        
        <ul class="list-unstyled">
            @foreach ($admins as $item)
                <li class="nav-item border-bottom border-top">
                    <div class="row pt-1">
                        <div class="col-md-1 text-center">
                            <i class="ri-user-line p-2 rounded-circle" style="font-size: 40px; color: #6E4798;background-color: #6E47982B"></i>
                        </div>
                        <div class="col-md-7 pt-2">
                            <span class="text-bold"> {{$item->{'title_'. app()->getLocale()} }}</span>
                            <p> {{$item->designation->{'title_'. app()->getLocale()} }}
                            </p>
                        </div>
                        <div class="col-md-4 d-flex align-items-center" style="float: right" >
                            <span class="text-secondary text-bold mr-2"> যোগাযোগ নাম্বারঃ </span>
                            <span class="p-1 ml-2 border text-center border-secondary text-primary text-bold rounded" style="width: 160px">
                                <i class="ri-phone-line" style="color: #61C877"></i>
                                {{$item->contact}}
                            </span>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
