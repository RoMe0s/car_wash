<!-- Section Description -->
<div class="step-content container">
    <div class="form-inline">
        <fieldset class="form-group">
            {!! Form::input('radio', 'type', 'wash', ['id' => 'type.wash', isset($model) && $model->type == "wash" ? "checked" : ""]) !!}
            <label for="type.wash">Автомойка</label>
        </fieldset>
        <fieldset class="form-group">
            {!! Form::input('radio', 'type', 'service', ['id' => 'type.service', isset($model) && $model->type == "service" ? "checked" : ""]) !!}
            <label for="type.service">Шиномонтаж</label>
        </fieldset>
    </div>
    <br/>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="md-form">
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
                <label for="name">Название объекта</label>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="md-form">
                {!! Form::input('email', 'email', null, ['class' => 'form-control', 'id' => 'email']) !!}
                <label for="email">Контактный Email</label>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="md-form">
                {!! Form::input('tel', 'phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
                <label for="phone">Контактный телефон</label>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col text-center">
            <div id="map" style="height: 480px;" data-target="#location"></div>
        </div>
        {!! Form::hidden('location', null, ['id' => "location"]) !!}
    </div>
    <br/>
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="md-form">
                {!! Form::text('city', null, ['class' => 'form-control', 'id' => 'city']) !!}
                <label for="city">Город</label>
            </div>
        </div>
        <div class="col-12 offset-md-1 col-md-8">
            <div class="md-form">
                {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address']) !!}
                <label for="address">Адрес</label>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="md-form">
                {!! Form::textarea('description', null, ['class' => 'md-textarea', 'id' => 'description']) !!}
                <label for="description">Короткое описание</label>
            </div>
        </div>
        <div class="col-md-4 col-12 text-center">
            <input type="file" name="image" data-image-preview data-target="#select-image" style="display: none;" id="image" />
            <img src="{!! isset($model) && !empty($model->image) ? $model->image : Theme::asset('images/icons/upload.png') !!}" data-target="#image" height="92" id="select-image" />
            <br/>
            <b>
                Фотография фасада
            </b>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <button type="button" class="btn btn-primary col-12 col-md-4" data-to-step="2">
                Далее
            </button>
        </div>
    </div>
</div>
