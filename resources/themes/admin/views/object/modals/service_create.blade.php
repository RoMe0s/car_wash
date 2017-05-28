<div class="modal fade left" id="createServiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-full-height modal-left" role="document">
        <!--Content-->
        <div class="modal-content">
            {!! Form::open(['method' => 'POST', 'route' => array('api.object.services', $model), 'ajax', 'postAjax' => 'object-service-added']) !!}
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title w-100" id="myModalLabel">
                    Добавление услуги
                </h4>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="md-form form-group">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Название услуги']) !!}
                </div>
                <br />
                <h4 class="text-center">
                    <b>
                        Настройки цены
                    </b>
                </h4>
                <div class="md-form form-group">
                    {!! Form::text('price[1]', null, ['class' => 'form-control', 'placeholder' => 'Класс I']) !!}
                </div>

                <div class="md-form form-group">
                    {!! Form::text('price[2]', null, ['class' => 'form-control', 'placeholder' => 'Класс II']) !!}
                </div>

                <div class="md-form form-group">
                    {!! Form::text('price[3]', null, ['class' => 'form-control', 'placeholder' => 'Класс III']) !!}
                </div>

                <div class="md-form form-group">
                    {!! Form::text('price[4]', null, ['class' => 'form-control', 'placeholder' => 'Класс IV']) !!}
                </div>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">
                    Отмена
                </button>
                <button type="submit" class="btn btn-success waves-effect waves-light">
                    Сохранить
                </button>
            </div>
            {!! Form::close() !!}
        </div>
        <!--/.Content-->
    </div>
</div>