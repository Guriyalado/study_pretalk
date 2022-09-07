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
                        {{ Form::label('Title :', null, ['class' => 'label text-white']) }}
                        <span>{{ $goal->title}}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Body :', null, ['class' => 'label text-white']) }}
                        <span>{{$goal->body}}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Subject :', null, ['class' => 'label text-white']) }}
                        <span>{{$goal->subject_name}}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Time :', null, ['class' => 'label text-white']) }}
                        <span>{{$goal->time}}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Credit :', null, ['class' => 'label text-white']) }}
                        <span>{{$goal->Credit}}</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
