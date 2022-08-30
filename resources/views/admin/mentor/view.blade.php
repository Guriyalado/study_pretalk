<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content bg-secondary rounded h-100 p-4">
        <div class="modal-header bg-secondary">
            <h4 class="modal-title">View</h4>
            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Name :', null, ['class' => 'label text-white']) }}
                        <span>{{ $mentor->name}}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Email :', null, ['class' => 'label text-white']) }}
                        <span>{{$mentor->email}}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Password :', null, ['class' => 'label text-white']) }}
                        <span>{{$mentor->password}}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('M.No :', null, ['class' => 'label text-white']) }}
                        <span>{{ $mentor->phone_no}}</span>
                    </div>
                </div>

               
               

                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Address :', null, ['class' => 'label text-white']) }}
                         <span>{{ $mentor->address}}</span>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('City :', null, ['class' => 'label text-white']) }}
                            <span>{{ $mentor->city}}</span>
                    </div>
                </div>
                 <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Type :', null, ['class' => 'label text-white']) }}
                            <span>{{ $mentor->type}}</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
