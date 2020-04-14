<div class="row">
  <div class="col-sm-2">
    {!! form::label('post_title','Titre') !!}
  </div>
  <div class="col-sm-10">
    <div class="form-group {{ $errors->has('post_title') ? 'has-error' : "" }}">
      {{ Form::text('post_title',NULL, ['class'=>'form-control', 'id'=>'post_title', 'placeholder'=>'Définissez un titre à votre article...']) }}
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
      {{ Form::textarea('post_content',NULL, ['class'=>'form-control', 'id'=>'post_content', 'placeholder'=>'Rédigez le contenu de votre article...', 'cols'=>10]) }}
      {{ $errors->first('post_content', '<p class="help-block">:message</p>') }}
    </div>
  </div>
</div>



<div class="form-group">
        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="validatedCustomFile">
            <label class="custom-file-label" for="validatedCustomFile">Choisir une image...</label>
            @error('image')
            <div class="invalid-feedback">{{ $errors->first('image')}}</div>
            @enderror
         </div>
    </div>    




<div class="form-group">
  {{ Form::button(isset($model)? 'Update' : 'Enregistrer' , ['class'=>'btn btn-success', 'type'=>'submit']) }}
</div>
