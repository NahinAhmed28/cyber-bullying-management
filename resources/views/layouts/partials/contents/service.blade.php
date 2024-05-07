<section class="about py-3 my-3 bg-light">
    <div class="container ">
        <h3 class="text-center" style="color: #145A32">{{ __('site.service.title') }}</h3>

        <div class="row">

            @forelse($services as $service)
                <div class="col-md-4 py-3">
                    <div class="card " id="myCard" data-toggle="modal" data-target="#myModal">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1"><i data-feather="arrow-right-circle" style="color: #184b07" class="feather"></i></div>
                                <div class="col-10">  <h5 class="card-title font-weight-normal" style="color: #229924;font-size: 15px">{{ $service->{'title_'. app()->getLocale()} }} </h5></div>
                            </div>

                            <p class="card-text">{{ $service->serviceType->{'title_'. app()->getLocale()} }}</p>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">{{ $service->{'title_'. app()->getLocale()} }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"  id="closeBtn1">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                <ul class="list-group">
                                    <li class="list-group-item">{{ __('site.service.cost') }} : {{(app()->getLocale() == 'en') ? $service->govt_charge : engToBnHlp($service->govt_charge)}}</li>
                                    <li class="list-group-item">{{ __('site.service.tax') }} : {{(app()->getLocale() == 'en') ? $service->service_charge : engToBnHlp($service->service_charge)}}</li>
                                    <li class="list-group-item">{{ __('site.service.totalCost') }} : {{(app()->getLocale() == 'en') ? $service->total_charge : engToBnHlp($service->total_charge)}} </li>
                                </ul>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>

            @empty
                No Services found
            @endforelse


        </div>
    </div>
</section>
