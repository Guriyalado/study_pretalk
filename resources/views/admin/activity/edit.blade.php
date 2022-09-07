<div class="modal-dialog modal-s" role="document">
    <div class="modal-content bg-secondary rounded h-100 p-4">
        <div class="modal-header bg-secondary">
            <h4 class="modal-title">Edit</h4>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

            {!! Form::open(['url' => action('App\Http\Controllers\Admin\Activity\ActivityController@update', [$activity->id]), 'method' => 'PUT', 'id' => 'ajax_form',  'enctype' => 'multipart/form-data' ]) !!}
            @php
                    $form = 'edit';
                @endphp
                @include('admin.activity.form')
            {!! Form::close() !!}
        </div>
    </div>


