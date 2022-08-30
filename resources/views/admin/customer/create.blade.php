<div class="modal-dialog modal-s" role="document">
    <div class="modal-content bg-secondary rounded h-100 p-4">
        <div class="modal-header bg-secondary">
            <h4 class="modal-title">Add Customer</h4>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                <!-- <span aria-hidden="true">&times;</span> -->
            </button>
        </div>
        {!! Form::open(['url' => action('\App\Http\Controllers\Admin\Customer\CustomerController@store'), 'id' => 'ajax_form', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @include('admin.customer.form')
        {!! Form::close() !!}
    </div>
</div>
