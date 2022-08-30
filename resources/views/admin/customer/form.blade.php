
<div class="modal-body">
  <div class="form-row mb-4">
     <div class="form-group col-md-12">
         {!! Form::label('Name:') !!}
         {!! Form::text('name', $customer->name ?? '', ['class' => 'form-control']) !!}
         <span class="md-line" id="name_error"></span>
     </div>
     <div class="form-group col-md-12">
        {{ Form::label('Email: *', null, ['class' => 'label text-black']) }}
        {!! Form::text('email', $customer->email?? '', ['class' => 'form-control', 'name' => 'email', 'id' => 'email']) !!}

    </div>
    <div class="form-group col-md-12">
        {{ Form::label('Phone: *', null, ['class' => 'label text-black']) }}
        {!! Form::text('phone', $customer->phone?? '', ['class' => 'form-control', 'name' => 'phone', 'id' => 'phone']) !!}

    </div>
     <div class="form-group col-md-12">
         {!! Form::label('City:') !!}
         {!! Form::text('city', $customer->city ?? '', ['class' => 'form-control']) !!}

     </div>


     <div class="form-group col-md-12">
          {!! Form::label('State') !!}
         {!! Form::text('state', $customer->state ?? '', ['class' => 'form-control']) !!}
         <span class="md-line" id="caption_error"></span>
     </div>
     <div class="form-group col-md-12">
          {!! Form::label('Address:') !!}
         {!! Form::text('address', $customer->address ?? '', ['class' => 'form-control']) !!}
         <span class="md-line" id="caption_error"></span>
     </div>

    </div>
    </div>
 <div class="modal-footer">
     <button type="button" class="btn btn-secondary waves-effect " data-bs-dismiss="modal">Close</button>
     <button class="btn btn-primary" type="submit">Save</button>
 </div>

