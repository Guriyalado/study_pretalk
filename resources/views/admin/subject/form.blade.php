
<div class="modal-body">
  <div class="form-row mb-4">
     <div class="form-group col-md-12">
         {!! Form::label('Subject Name:') !!}
         {!! Form::text('subject_name', $subject->subject_name ?? '', ['class' => 'form-control']) !!}
         <span class="md-line" id="name_error"></span>
     </div>
     <div class="form-group col-md-12">
        {{ Form::label('Credit: *', null, ['class' => 'label text-black']) }}
        {!! Form::text('Credit', $subject->Credit?? '', ['class' => 'form-control', 'name' => 'Credit', 'id' => 'Credit']) !!}

    </div>
    <div class="form-group col-md-12">
        {{ Form::label('Passing Marks: *', null, ['class' => 'label text-black']) }}
        {!! Form::text('passing_marks', $subject->passing_marks?? '', ['class' => 'form-control', 'name' => 'passing_marks', 'id' => 'passing_marks']) !!}

    </div>
    


    </div>
    </div>
 <div class="modal-footer">
     <button type="button" class="btn btn-secondary waves-effect " data-bs-dismiss="modal">Close</button>
     <button class="btn btn-primary" type="submit">Save</button>
 </div>

