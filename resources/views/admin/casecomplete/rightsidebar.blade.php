<div class="card">
    <ul class="list-group text-bold">
        <li class="list-group-item">{{ __('admin.casecomplete.supporting_contact') }} :
            <span style="float:right">{{ __('admin.casecomplete.supporting_contact_no') }}  </span>
        </li>
        <li class="list-group-item">{{ __('admin.casecomplete.case_category') }} :
            <span style="float:right;font-weight: normal!important;border: 1px solid purple">
            {{ $application->caseCategory->{'title_' . app()->getLocale()} }}
            </span>
        </li>
        <li class="list-group-item">{{ __('admin.casecomplete.case_type') }} :
            <span style="float:right;" class="{{ isset($application->caseType) ?
                ($application->caseType->id === 1 ? 'text-warning' :
                ($application->caseType->id === 2 ? 'text-primary' :
                ($application->caseType->id === 3 ? 'text-success' : 'text-secondary'))): '' }}">
                {{ @$application->caseType->{'title_' . app()->getLocale()} }}
              </span>
        </li>
        <li class="list-group-item">{{ __('admin.casecomplete.case_status') }} :
            <span style="float:right" class="{{ isset($application->caseStatus) ?
                                        ($application->caseStatus->id === 1 ? 'text-warning' :
                                        ($application->caseStatus->id === 2 ? 'text-primary' :
                                        ($application->caseStatus->id === 3 ? 'text-success' : 'text-secondary')))
                                        : '' }}">
                {{ $application->caseStatus->{'title_' . app()->getLocale()} ?? '-' }}
            </span>
        </li>
    </ul>
    <ul class="list-group m-2 p-2">
        <span class="text-bold">কেস মেম্বার</span>
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-3">
                    <img class="rounded-circle" alt="avatar1" style="max-width: 60px" src="https://mdbcdn.b-cdn.net/img/new/avatars/9.webp" />
                </div>
                <div class="col-md-7">
                    Name <br> position
                </div>
                <div class="col-md-2 text-right">Icon</div>
            </div>
        </li>
    </ul>
    <hr>
        <div class="card p-2 m-3" style="background-color: #6E479814">
            <div class="card-title text-bold p-2">
                ভিক্টিমের তথ্যাদি
            </div>
            <hr style="width: 100px;border:2px  solid #6E4798">
            <div class="card-body">

                <form>
                    <div class="form-row">
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >{{ __('admin.casecomplete.name') }} </span>
                        </div>
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >: সাদিয়া খাতুন </span>
                        </div>
                    </div>
                    <div class="form-row pt-1">
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >{{ __('admin.casecomplete.age') }} </span>
                        </div>
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >: ১৩ বছর </span>
                        </div>
                    </div>
                    <div class="form-row pt-1">
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >zilla </span>
                        </div>
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >: zilla </span>
                        </div>
                    </div>
                    <div class="form-row pt-1">
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >thana </span>
                        </div>
                        <div class="col">
                            <span type="text" class="form-control bg-transparent" >: thana </span>
                        </div>
                    </div>
                </form>
                <hr style="width: 200px;border:2px  solid #6E4798">

                <div class="row justify-content-center">
                    <button class="btn btn-primary px-5">
                        PDF ডাউনলোড করুন
                    </button>
                </div>
                <div class="row justify-content-center pt-3">
                    <button class="btn btn-outline-primary px-5">
                        ভিক্টিমের তথ্যাদি
                    </button>
                </div>

                <hr style="width: 200px;border:2px  solid #6E4798">

                <div class="d-flex justify-content-center">
                    <span class="p-1 border border-secondary font-weight-bold " style="color: #05003A">
                        <i class="fas fa-hourglass-half" style="color:#6E4798 "></i>
                        {{ (app()->getLocale() == 'en') ?
                        findTimer($application->created_at,app()->getLocale())  :
                        dateFormatEnglishToBanglaHlp( findTimer($application->created_at,app()->getLocale())) }}
                    </span>
                </div>


            </div>
        </div>

</div>
