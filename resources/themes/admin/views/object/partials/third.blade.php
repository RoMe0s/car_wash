<div class="step-content container" data-model-id="{!! $model->id !!}" data-token="{!! csrf_token() !!}">
    <div class="row text-center">
        <h3 class="col-12 text-left clearfix">
            Базовые услуги
        </h3>
    </div>
    <br/>
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th>Класс I</th>
                    <th>Класс II</th>
                    <th>Класс III</th>
                    <th>Класс IV</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($services['basic'] as $name => $basic)
                        <tr>
                            <th scope="row">
                                {{$name}}
                            </th>
                            @foreach($basic as $item)
                                <td>
                                    <div class="md-form">
                                        {!! Form::text("services[{$item->type}][{$item->id}][{$item->pivot->class}]", $item->pivot->price, ['class' => "form-control", "id" => "{$item->type}_{$item->id}"]) !!}
                                        <label for="{!! $item->type . "_" . $item->id !!}">Цена</label>
                                    </div>
                                </td>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <div class="row">
        <h3 class="col-12">
            Дополнительные услуги
        </h3>
    </div>
    <br/>
    <div class="row">
        @foreach($services['additional'] as $name => $items)
            @foreach($items as $item)
                <div class="col-12 col-md-4">
                    <p>
                        <b>
                            {{$name}}
                        </b>
                    </p>
                    <div class="md-form">
                        {!! Form::text("services[{$item->type}][{$item->id}]", $item->pivot->price, ['class' => "form-control", "id" => "{$item->type}_{$item->id}"]) !!}
                        <label for="{!! $item->type . "_" . $item->id !!}">Цена</label>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
    <br/>
    <div class="row">
        <h3 class="col-12">
            Полный перечень
        </h3>
    </div>
    <br/>
    @include('object.partials.custom')
    <div class="col-12 text-center">
        <button type="button" class="btn btn-primary col-md-4 col-12" data-to-step="4">
            Далее
        </button>
    </div>
</div>
