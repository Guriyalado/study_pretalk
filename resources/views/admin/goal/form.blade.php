
<div class="modal-body">
  <div class="form-row mb-4">
     <div class="form-group col-md-12">
         {!! Form::label('Title:') !!}
         {!! Form::text('title', $goal->title ?? '', ['class' => 'form-control']) !!}
         <span class="md-line" id="name_error"></span>
     </div>
     <div class="form-group col-md-12">
        {{ Form::label('Body: *', null, ['class' => 'label text-black']) }}
        {!! Form::text('body', $goal->body?? '', ['class' => 'form-control', 'name' => 'body', 'id' => 'body']) !!}

    </div>
    <div class="form-group col-md-12">
            {!! Form::label('Subject Name :') !!}
            {!! Form::select('subject_name', $subject,$goal->subject_name ?? '', ['class' => 'form-control']) !!}
            <span class="md-line" id="name_error"></span>
        </div>
    <div class="form-group col-md-12">
        {{ Form::label('Time: *', null, ['class' => 'label text-black']) }}
        {!! Form::time('time', $time->time?? '', ['class' => 'form-control', 'name' => 'time', 'id' => 'time']) !!}

    </div>
    <div class="form-group col-md-12">
            {!! Form::label('Credit :') !!}
            {!! Form::select('Credit', $subject,$goal->credit ?? '', ['class' => 'form-control']) !!}
            <span class="md-line" id="name_error"></span>
        </div>
    


    </div>
    </div>
 <div class="modal-footer">
     <button type="button" class="btn btn-secondary waves-effect " data-bs-dismiss="modal">Close</button>
     <button class="btn btn-primary" type="submit">Save</button>
 </div>

