<!-- Vertical Steppers -->
<div class="row m-t-1">
    <div class="col-md-12">

        <!-- Stepers Wrapper -->
        <ul class="stepper stepper-vertical object">

            <!-- First Step -->
            <li class="active" data-step="1">
                <a data-to-step="1">
                    <span class="circle">1</span>
                    <h4 class="label">
                        Тип и контактная информация
                    </h4>
                </a>

                @include('object.partials.first')

            </li>

            <!-- Second Step -->
            <li data-step="2">

                <!--Section Title -->
                <a data-to-step="2">
                    <span class="circle">2</span>
                    <h4 class="label">
                        Режим работы
                    </h4>
                </a>

                @include('object.partials.second')

            </li>

            <!-- Third Step -->
            <li data-step="3">
                <a data-to-step="3">
                    <span class="circle">3</span>
                    <h4 class="label">Услуги</h4>
                </a>

                @include('object.partials.third')

            </li>

            <!-- Fourth Step -->
            <li data-step="4">
                <a data-to-step="4">
                    <span class="circle">4</span>
                    <h4 class="label">Реквизиты</h4>
                </a>

                @include('object.partials.four')

            </li>

        </ul>
        <!-- /.Stepers Wrapper -->

    </div>
</div>
