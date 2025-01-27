{{-- <div class="row">
    <div class="col-md-3 ml-4">
        <span class="text-secondary" style="font-size: 10px"> কেস তৈরি করা হল - ২ জুলাই ২০২৩ - ০২ঃ২০ এ, এম</span>
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
{{-- <div class="card mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#home1">{{__('admin.service.info')}}</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6" >
                <form class="form-inline" action="#">
                    <input class="form-control mr-sm-2" type="text" placeholder="{{ __('admin.common.search') }}">
                    <button class="btn btn-outline-secondary text-success" type="submit">
                        <i class="ri-search-eye-line"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<div class="card">
    <div class="tab-content">
        <div id="home1" class="tab-pane fade show active">
            <div class="container">
                <p class="text-info text-bold mt-2">
                    {{(app()->getLocale() == 'en') ? "All documents" : "সমস্ত নথি সমূহ "}}
                </p>
                <hr>
                <div class="row mt-2">
                    
                    @foreach ($application->file as $f)

                        @php
                            $fileExtension = pathinfo($f->thumb, PATHINFO_EXTENSION);
                        @endphp
                        <div class="col-md-2 mb-4">
                            <div class="card text-center">
                                <div class="card-body">
                                    <!-- Determine the appropriate icon and modal content based on the file extension -->
                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                        <!-- Image Preview with Modal Trigger -->
                                        <a target="_blank" href="{{ asset('storage/'.$f->thumb) }}" data-toggle="modal1" data-target="#fileModal{{ $f->id }}">
                                            <i class="card-img-top ri-image-fill display-4"> </i>
                                        </a>
                                    @elseif (in_array($fileExtension, ['mp4', 'avi', 'mov']))
                                        <!-- Video Preview with Modal Trigger -->
                                        <a target="_blank" href="{{ asset('storage/'.$f->thumb) }}" data-toggle="modal1" data-target="#fileModal{{ $f->id }}">
                                            <i class="card-img-top ri-video-fill display-4"> </i>
                                        </a>
                                    @else
                                        <!-- Generic File Preview with Modal Trigger -->
                                        <a target="_blank" href="{{ asset('storage/'.$f->thumb) }}" data-toggle="modal1" data-target="#fileModal{{ $f->id }}">
                                            <i class="card-img-top ri-file-fill display-4"> </i>
                                        </a>
                                    @endif
                                </div>
                                <span  class="card-text text-bold">{{ @$f->{'title_' . app()->getLocale()} ?? 'No Title Found' }}</span>
                                <!-- Card Text -->
                            </div>

                            <!-- Modal for File -->
                            <div class="modal fade" id="fileModal{{ $f->id }}" tabindex="-1" role="dialog" aria-labelledby="fileModal{{ $f->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="fileModal{{ $f->id }}Label">{{ $f->name }}</h5>
                                            <a href="#" >
                                                <button type="button" class="close">
                                                    <i class="ri-download-2-line" ></i>
                                                </button>
                                            </a>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                <img class="img-fluid w-100" src="{{ asset('storage/' . $f->thumb) }}" alt="{{ $f->name }}">
                                            @elseif (in_array($fileExtension, ['mp4', 'avi', 'mov']))
                                                <video class="img-fluid w-100" controls>
                                                    <source src="{{ asset('storage/' . $f->thumb) }}" type="video/{{ $fileExtension }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <a href="{{ asset('storage/' . $f->path) }}" target="_blank">{{ $f->name }}</a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

