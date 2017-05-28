<div class="row" data-service-row="{!! $service->id !!}">
    <div class="col-12 col-md-3">
        <div class="md-form form-group" style="margin-top: 34px">
            {!! Form::text("services[custom][{$service->id}][name]", $service->name, ['class' => "form-control", 'id' => 'custom_name_' . $service->id]) !!}
            <label for='custom_name_{!! $service->id !!}'>Название услуги</label>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <h4>
            Класс I
        </h4>
        <div class="md-form form-group">
            {!! Form::text("services[custom]{$service->id}][1]", null, ['class' => "form-control", 'id' => 'custom_1_' . $service->id]) !!}
            <label for="custom_1_{!! $service->id !!}">Цена</label>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <h4>
            Класс II
        </h4>
        <div class="md-form form-group">
            {!! Form::text("services[custom]{$service->id}][2]", null, ['class' => "form-control", 'id' => 'custom_1_' . $service->id]) !!}
            <label for="custom_2_{!! $service->id !!}">Цена</label>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <h4>
            Класс III
        </h4>
        <div class="md-form form-group">
            {!! Form::text("services[custom][{$service->id}][3]", null, ['class' => "form-control", 'id' => 'custom_3_' . $service->id]) !!}
            <label for="custom_3_replace_me" data-error="wrong" data-success="right">Цена</label>
        </div>
    </div>
    <div class="col-12 col-md-2">
        <h4>
            Класс IV
        </h4>
        <div class="md-form form-group">
            {!! Form::text("services[custom][{$service->id}][4]", null, ['class' => "form-control", 'id' => 'custom_4_' . $service->id]) !!}
            <label for="custom_4_{!! $service->id !!}" data-error="wrong" data-success="right">Цена</label>
        </div>
    </div>
    <div class="col-12 text-center col-md-1">
        <span class="text-danger" style="font-size: 64px;" data-remove>&times;</span>
    </div>
</div>