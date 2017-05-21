<div class="modal fade" id="modallogin" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <div class="modal-content">
            <div class="modal-header light-blue darken-3 white-text">
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="title">
                    <i class="fa fa-pencil"></i>
                    Авторизация
                </h4>
            </div>
            <div class="modal-body mb-0">
                {!! Form::open(['method' => 'POST', 'route' => 'post.login', 'ajax']) !!}
                <div class="md-form form-sm">
                    <i class="fa fa-phone prefix"></i>
                    {!! Form::input('tel', 'phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
                    <label for="phone">
                        Ваш телефон
                    </label>
                </div>
                <div class="md-form form-sm">
                    <i class="fa fa-lock prefix"></i>
                    {!! Form::password('password', null, ['class' => 'form-control', 'id' => 'password']) !!}
                    <label for="password">Ваш пароль</label>
                </div>
                <div class="text-center mt-1-half">
                    <button type="submit" class="btn btn-info mb-2">
                        Login
                        <i class="fa fa-arrow-right ml-1"></i>
                    </button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
