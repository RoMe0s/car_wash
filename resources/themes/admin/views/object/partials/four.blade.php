<div class="step-content container">
    <div class="form-inline">
        <fieldset class="form-group">
            {!! Form::input('radio', 'requisites', 'individual', ['id' => 'requisites.individual', isset($model) && $model->requisites == "individual" ? "checked" : ""]) !!}
            <label for="requisites.individual">Индивидуальный предприниматель</label>
        </fieldset>
        <fieldset class="form-group">
            {!! Form::input('radio', 'requisites', 'community', ['id' => 'requisites.community', isset($model) && $model->requisites == "community" ? "checked" : ""]) !!}
            <label for="requisites.community">Общество с ограниченной ответственностью</label>
        </fieldset>
    </div>
</div>
