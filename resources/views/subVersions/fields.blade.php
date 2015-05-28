<!--- Version Id Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('version_id', 'Version Id:') !!}
    {!! Form::text('version_id', null, ['class' => 'form-control']) !!}
</div>

<!--- Name Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!--- Notes Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::text('notes', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
