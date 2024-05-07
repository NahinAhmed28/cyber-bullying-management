<div class="row">
    <div class="col-md-3">
        <span class="text-secondary" style="font-size: 10px"> কেস তৈরি করা হল - ২ জুলাই ২০২৩ - ০২ঃ২০ এ, এম</span>
    </div>
    <div class="col-md-6">
        <span> {{ __('admin.caseincomplete.case_category') }} : </span>
        <span class="p-1 border border-secondary font-weight-bold" style="color: #05003A">
            <i class="fa fa-map-pin" style="color:#6E4798 "></i>
            {{ $application->caseCategory->{'title_' . app()->getLocale()} }}
        </span>
    </div>
    <div class="col-md-3">
        {{ __('admin.caseincomplete.case_status') }} :
       <span class="{{ isset($application->caseType) ?
                                        ($application->caseType->id === 1 ? 'text-warning' :
                                        ($application->caseType->id === 2 ? 'text-primary' :
                                        ($application->caseType->id === 3 ? 'text-success' : 'text-secondary')))
                                        : '' }}">
                   {{ @$application->caseType->{'title_' . app()->getLocale()} }}
       </span>
    </div>
</div>
<div class="card mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <span>তথ্য প্রমাণ</span>
                <span>অফিসিয়াল ডকুমেন্ট</span>
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
</div>

<div class="container">
    <div class="row">
        @foreach ($application->file as $f)

            @php
                $fileExtension = pathinfo($f->thumb, PATHINFO_EXTENSION);
            @endphp
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body text-center">
                        <!-- Extract file extension from thumbs column -->

                            <!-- Determine the appropriate icon and modal content based on the file extension -->
                        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                            <!-- Image Preview with Modal Trigger -->
                            <i class="ri-image-fill display-4" data-toggle="modal" data-target="#fileModal{{ $f->id }}"></i> <!-- Remix Image icon -->
                        @elseif (in_array($fileExtension, ['mp4', 'avi', 'mov']))
                            <!-- Video Preview with Modal Trigger -->
                            <i class="ri-video-fill display-4" data-toggle="modal" data-target="#fileModal{{ $f->id }}"></i> <!-- Remix Video icon -->
                        @else
                            <!-- Generic File Preview with Modal Trigger -->
                            <i class="ri-file-fill display-4" data-toggle="modal" data-target="#fileModal{{ $f->id }}"></i> <!-- Remix File icon -->
                        @endif
                    </div>
                </div>
                <!-- Modal for File -->
                <div class="modal fade" id="fileModal{{ $f->id }}" tabindex="-1" role="dialog" aria-labelledby="fileModal{{ $f->id }}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="fileModal{{ $f->id }}Label">{{ $f->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                    <!-- Image Preview -->
                                    <img class="img-fluid" src="{{ asset('storage/' . $f->thumb) }}" alt="{{ $f->name }}">
                                @elseif (in_array($fileExtension, ['mp4', 'avi', 'mov']))
                                    <!-- Video Preview -->
                                    <video class="img-fluid" controls>
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
