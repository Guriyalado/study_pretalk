
<div class="modal-body">
  <div class="form-row mb-4">
     <div class="form-group col-md-12">
         {!! Form::label('Name:') !!}
         {!! Form::text('name', $mentor->name ?? '', ['class' => 'form-control']) !!}
         <span class="md-line" id="name_error"></span>
     </div>
     <div class="form-group col-md-12">
        {{ Form::label('Email: *', null, ['class' => 'label text-black']) }}
        {!! Form::text('email', $mentor->email?? '', ['class' => 'form-control', 'name' => 'email', 'id' => 'email']) !!}

    </div>
    <div class="form-group col-md-12">
        {{ Form::label('Password: *', null, ['class' => 'label text-black']) }}
        {!! Form::text('password', $mentor->password?? '', ['class' => 'form-control', 'name' => 'password', 'id' => 'password']) !!}

    </div>
    <div class="form-group col-md-12">
        {{ Form::label('Phone: *', null, ['class' => 'label text-black']) }}
        {!! Form::text('phone_no', $mentor->phone_no?? '', ['class' => 'form-control', 'name' => 'phone_no', 'id' => 'phone_no']) !!}

    </div>
     <div class="form-group col-md-12">
        {{ Form::label('Experience: *', null, ['class' => 'label text-black']) }}
        {!! Form::text('experience', $mentor->experience?? '', ['class' => 'form-control', 'name' => 'experience', 'id' => 'experience']) !!}

    </div>
      <div class="form-group col-md-12">
          {!! Form::label('Address:') !!}
         {!! Form::text('address', $mentor->address ?? '', ['class' => 'form-control']) !!}
         <span class="md-line" id="caption_error"></span>
     </div>
     <div class="form-group col-md-12">
         {!! Form::label('City:') !!}
         {!! Form::text('city', $mentor->city ?? '', ['class' => 'form-control']) !!}

     </div>
     <div class="form-group col-md-12">
      {{ Form::label('Type: *', null, ['class' => 'label text-black']) }}
        {!! Form::select('type', ['offline' => 'Offline', 'online' => 'Online'], $mentor->type ?? '', ['placeholder' => __('messages.please_select'), 'class' => 'form-control select2', 'id' => 'type']) !!}
        <span class="md-line" id="consent_error"></span>

     </div>


    </div>
    </div>
 <div class="modal-footer">
     <button type="button" class="btn btn-secondary waves-effect " data-bs-dismiss="modal">Close</button>
     <button class="btn btn-primary" type="submit">Save</button>
 </div>

