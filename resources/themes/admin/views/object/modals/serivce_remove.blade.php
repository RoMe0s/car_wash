<!-- Central Modal Medium Danger -->
<div class="modal fade" id="removeServiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content">
            {!! Form::open(['method' => 'POST', 'ajax', 'postAjax' => 'object-service-removed']) !!}
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">
                    Удаление услуги
                </p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <i class="fa fa-check fa-4x mb-1 animated rotateIn"></i>
                    <p>
                        Вы уверены?
                    </p>
                </div>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <button type="submit" class="btn btn-primary-modal">
                    Удалить
                </button>
                <button type="button" class="btn btn-outline-secondary-modal waves-effect" data-dismiss="modal">
                    Отмена
                </button>
            </div>
            {!! Form::close() !!}
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Central Modal Medium Danger-->