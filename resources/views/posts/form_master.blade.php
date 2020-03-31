<div class="row">
  <div class="col-sm-2">
    {!! form::label('post_title','Titre') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('post_title') ? 'has-error' : "" }}">
      {{ Form::text('post_title',NULL, ['class'=>'form-control', 'id'=>'post_title', 'placeholder'=>'Titre...']) }}
      {{ $errors->first('post_title', '<p class="help-block">:message</p>') }}
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-2">
    {!! form::label('post_content','Contenu') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('post_content') ? 'has-error' : "" }}">
      {{ Form::text('post_content',NULL, ['class'=>'form-control', 'id'=>'post_content', 'placeholder'=>'Contenu...']) }}
      {{ $errors->first('post_content', '<p class="help-block">:message</p>') }}
    </div>
  </div>
</div>

<div class="form-group">
  {{ Form::button(isset($model)? 'Update' : 'save' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>
