@if(isset($services['custom']) && sizeof($services['custom']))
    @foreach($services['custom'] as $key => $custom)
        @php($name = $model->services->where('id', $key)->first()->name)
        <div class="row" data-service-row="{!! $key !!}">
            <div class="col-12 col-md-3">
                <div class="md-form form-group" style="margin-top: 34px">
                    {!! Form::text("services[custom][$key][name]", $name, ['class' => "form-control", 'id' => 'custom_name_' . $key]) !!}
                    <label for="custom_name_{!! $key !!}" data-error="wrong" data-success="right">Название услуги</label>
                </div>
            </div>
            @foreach($custom as $class => $item)
                <div class="col-12 col-md-2">
                    <h4>
                        Класс {!! $class !!}
                    </h4>
                    <div class="md-form form-group">
                        {!! Form::text("services[custom][$key][$class]", $item->pivot->price, ['class' => "form-control", 'id' => 'custom_1_' . $key . '_' . $class]) !!}
                        <label for="custom_1_{!! $key !!}_{!! $class !!}" data-error="wrong" data-success="right">Цена</label>
                    </div>
                </div>
            @endforeach
            <div class="col-12 text-center col-md-1">
                <span class="text-danger" style="font-size: 64px;" data-remove="{!! $item->id !!}">&times;</span>
            </div>
        </div>
    @endforeach
@endif
<div class="col-12 text-center">
    <a class="text-primary" style="display: block; width: auto;" data-toggle="modal" data-target="#createServiceModal" data-add-service>
        + Добавить услугу
    </a>
</div>