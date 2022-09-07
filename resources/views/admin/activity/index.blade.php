@extends('admin.layouts.admin')
@section('title')
    {{ 'study - Activity' }}
@endsection
@section('body')
<div class="container-fluid pt-4 px-4">
    <div class="row page-titles">
    {{-- <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Activity</h4>
        </div>--}}
        <div class="col-md-12 align-self-end text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Activity</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="card-header modal-header d-flex align-items-center justify-content-between">
                    <h3 class="mb-0">Activity</h3>

                    <button type="button" class="btn btn-primary btn-modal waves-effect waves-light"
                        data-href="{{ action('App\Http\Controllers\Admin\Activity\ActivityController@create') }}"
                        data-container="">
                        <i class="fa fa-plus"></i> Add
                    </button>

                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="data_table" class="table table-dark table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th id="name">Title</th>
                                    <th id="name">Descreption</th>
                                    
                                    <th id="name">Time</th>
                                    


                                    <th id="action">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ajax_modal" tabindex="-1" role="dialog"></div>
        </div>
    </div>
</div>

@endsection
@section('custom_js')
<script>
           var columns= [
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'descreption',
                    name: 'descreption'
                },
                {
                    data: 'time',
                    name: 'time'
                },

                 {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                 },


            ];
</script>
@include('admin.layouts.partials.common-js');
@endsection
