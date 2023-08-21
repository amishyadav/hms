<div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="poverview" role="tabpanel">
            <div class="card mb-5 mb-xl-10">
                <div>
                    <div class="card-body  border-top p-9">
                        <div class="row mb-7">
                            <div class="col-md-4 d-flex flex-column mb-md-10 mb-5">
                                <label
                                    class="pb-2 fs-5 text-gray-600">{{ __('messages.document.document_type').(':')  }}</label>
                                <span class="fs-5 text-gray-800">{{ $documentType->name}}</span>
                            </div>
                            <div class="col-md-4 d-flex flex-column mb-md-10 mb-5">
                                <label
                                    class="pb-2 fs-5 text-gray-600">{{ __('messages.common.created_at').(':')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right" title="{{ date('jS M, Y', strtotime($documentType->created_at)) }}">{{ $documentType->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="col-md-4 d-flex flex-column mb-md-10 mb-5">
                                <label class="pb-2 fs-5 text-gray-600">{{ __('messages.common.last_updated').(':')  }}</label>
                                <span class="fs-5 text-gray-800" data-toggle="tooltip" data-placement="right" title="{{ date('jS M, Y', strtotime($documentType->updated_at)) }}">{{ $documentType->updated_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="card mb-5 mb-xl-10">--}}
{{--        <div class="card-header border-0">--}}
{{--            <div class="card-title m-0">--}}
{{--                <h3 class="m-0">{{ __('messages.document.documents') }}</h3>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="card-body border-top p-9">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="table-responsive viewList">--}}
{{--                        <div class="mb-5">--}}
{{--                            @include('layouts.search-component')--}}
{{--                        </div>--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table id="userDocuments" class="table table-striped border-bottom-0">--}}
{{--                                <thead>--}}
{{--                                <tr class="fw-bold fs-6 text-muted text-start">--}}
{{--                                    <th class="d-flex text-center">{{ __('messages.document.attachment') }}</th>--}}
{{--                                    <th>{{ __('messages.document.title') }}</th>--}}
{{--                                    <th>{{ __('messages.document.patient') }}</th>--}}
{{--                                    <th>{{ __('messages.document.uploaded_by') }}</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody class="fw-bold mt-5">--}}
{{--                                @foreach($documents as $document)--}}
{{--                                    <tr>--}}
{{--                                        <td class="d-flex text-center">--}}
{{--                                            <a class="text-decoration-none"--}}
{{--                                               href="{{ url('document-download'.'/'.$document->id) }}">--}}
{{--                                                Download--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $document->title }}</td>--}}
{{--                                        <td>{{ $document->patient->user->full_name }}</td>--}}
{{--                                        <td>{{ $document->user->full_name }}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="fs-5 m-0">{{ __('messages.document.documents') }}</h1>
        </div>
        <livewire:document-type-details-table  documentType="{{$documentType->id}}"/>
    </div>
</div>
