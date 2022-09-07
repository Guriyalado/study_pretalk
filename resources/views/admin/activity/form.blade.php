
<div class="modal-body">
  <div class="form-row mb-4">
     <div class="form-group col-md-12">
         {!! Form::label('Title:') !!}
         {!! Form::text('title', $activity->title ?? '', ['class' => 'form-control']) !!}
         <span class="md-line" id="name_error"></span>
     </div>
     <div class="form-group col-md-12">
        {{ Form::label('Descreption: *', null, ['class' => 'label text-black']) }}
        {!! Form::text('descreption', $activity->descreption?? '', ['class' => 'form-control', 'name' => 'descreption', 'id' => 'descreption']) !!}

    </div>
    <div class="form-group col-md-12">
        {{ Form::label('Time: *', null, ['class' => 'label text-black']) }}
        {!! Form::time('time', $activity->time?? '', ['class' => 'form-control', 'name' => 'time', 'id' => 'time']) !!}

    </div>
    


    </div>
    </div>
 <div class="modal-footer">
     <button type="button" class="btn btn-secondary waves-effect " data-bs-dismiss="modal">Close</button>
     <button class="btn btn-primary" type="submit">Save</button>
 </div>

