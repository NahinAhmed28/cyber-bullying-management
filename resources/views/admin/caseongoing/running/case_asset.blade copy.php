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
                <div class="row">
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
{{--                                        <img src="{{ asset('storage/' . $f->thumb) }}" class="card-img-top " data-toggle="modal" data-target="#fileModal{{ $f->id }}"> --}}
                                        <i class="card-img-top ri-image-fill display-4" data-toggle="modal" data-target="#fileModal{{ $f->id }}"> </i>
                                    @elseif (in_array($fileExtension, ['mp4', 'avi', 'mov']))
                                        <!-- Video Preview with Modal Trigger -->
{{--                                        <img src="{{ asset('storage/' . $f->thumb) }}" class="card-img-top " data-toggle="modal" data-target="#fileModal{{ $f->id }}"> --}}
                                        <i class="card-img-top ri-video-fill display-4" data-toggle="modal" data-target="#fileModal{{ $f->id }}"> </i>
                                    @else
                                        <!-- Generic File Preview with Modal Trigger -->
{{--                                        <img src="{{ asset('storage/' . $f->thumb) }}" class="card-img-top " data-toggle="modal" data-target="#fileModal{{ $f->id }}"> --}}
                                        <i class="card-img-top ri-file-fill display-4" data-toggle="modal" data-target="#fileModal{{ $f->id }}"> </i>
                                    @endif
                                </div>
                                <!-- Card Text -->
                                <span class="card-text text-bold">{{ $f->{'title_' . app()->getLocale()} ?? 'No Title Found' }}</span>
                            </div>

                            <!-- Modal for File -->
                            <div class="modal fade" id="fileModal{{ $f->id }}" tabindex="-1" role="dialog" aria-labelledby="fileModal{{ $f->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="fileModal{{ $f->id }}Label">{{ $f->name }}</h5>
                                            <!-- Download Icon -->
                                            <a href="#" >
                                                <button type="button" class="close">
                                                    <i class="ri-download-2-line" ></i>
                                                </button>
                                            </a>
                                            <!-- Close Icon -->
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                <!-- Image Preview -->
                                                <img class="img-fluid w-100" src="{{ asset('storage/' . $f->thumb) }}" alt="{{ $f->name }}">
                                            @elseif (in_array($fileExtension, ['mp4', 'avi', 'mov']))
                                                <!-- Video Preview -->
                                                <video class="img-fluid w-100" controls>
                                                    <source src="{{ asset('storage/' . $f->thumb) }}" type="video/{{ $fileExtension }}">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <!-- Generic File Preview -->
                                                <!-- Add a link to download the file -->
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
{{--        <div id="home2" class="tab-pane fade">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    @foreach ($application->file as $f)--}}

{{--                        @php--}}
{{--                            $fileExtension = pathinfo($f->thumb, PATHINFO_EXTENSION);--}}
{{--                        @endphp--}}
{{--                        <div class="col-md-4 mb-4">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-body text-center">--}}
{{--                                    <!-- Extract file extension from thumbs column -->--}}

{{--                                    <!-- Determine the appropriate icon and modal content based on the file extension -->--}}
{{--                                    @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))--}}
{{--                                        <!-- Image Preview with Modal Trigger -->--}}
{{--                                        <i class="ri-image-fill display-4" data-toggle="modal" data-target="#fileModal{{ $f->id }}"></i> <!-- Remix Image icon -->--}}
{{--                                    @elseif (in_array($fileExtension, ['mp4', 'avi', 'mov']))--}}
{{--                                        <!-- Video Preview with Modal Trigger -->--}}
{{--                                        <i class="ri-video-fill display-4" data-toggle="modal" data-target="#fileModal{{ $f->id }}"></i> <!-- Remix Video icon -->--}}
{{--                                    @else--}}
{{--                                        <!-- Generic File Preview with Modal Trigger -->--}}
{{--                                        <i class="ri-file-fill display-4" data-toggle="modal" data-target="#fileModal{{ $f->id }}"></i> <!-- Remix File icon -->--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Modal for File -->--}}
{{--                            <div class="modal fade" id="fileModal{{ $f->id }}" tabindex="-1" role="dialog" aria-labelledby="fileModal{{ $f->id }}Label" aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-lg" role="document">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title" id="fileModal{{ $f->id }}Label">{{ $f->name }}</h5>--}}
{{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                <span aria-hidden="true">&times;</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))--}}
{{--                                                <!-- Image Preview -->--}}
{{--                                                <img class="img-fluid" src="{{ asset('storage/' . $f->thumb) }}" alt="{{ $f->name }}">--}}
{{--                                            @elseif (in_array($fileExtension, ['mp4', 'avi', 'mov']))--}}
{{--                                                <!-- Video Preview -->--}}
{{--                                                <video class="img-fluid" controls>--}}
{{--                                                    <source src="{{ asset('storage/' . $f->thumb) }}" type="video/{{ $fileExtension }}">--}}
{{--                                                    Your browser does not support the video tag.--}}
{{--                                                </video>--}}
{{--                                            @else--}}
{{--                                                <!-- Generic File Preview -->--}}
{{--                                                <!-- Add a link to download the file -->--}}
{{--                                                <a href="{{ asset('storage/' . $f->path) }}" target="_blank">{{ $f->name }}</a>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>

