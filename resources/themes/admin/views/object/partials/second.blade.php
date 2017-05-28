<!-- Section Description -->
<div class="step-content container">
    <div class="row">
        <div class="col-md-3 col-12">
            <div class="md-form">
                <div class="switch">
                    <label>
                        <input type="checkbox" id="select-all-days">
                        <span class="lever"></span>
                        Круглосуточно
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="md-form">
                {!! Form::text('posts', null, ['class' => 'form-control', 'id' => 'posts']) !!}
                <label for="posts">Количество постов</label>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-bordered table-sm schedule-table">
                <thead>
                    <tr>
                        <th class="text-center bg-success" style="line-height: 50px;">Часы\дни</th>
                        <th class="text-center">
                            Понедельник<br/>
                            <small class="text-primary" data-day="1">Выбрать все</small>
                        </th>
                        <th class="text-center">
                            Вторник<br />
                            <small class="text-primary" data-day="2">Выбрать все</small>
                        </th>
                        <th class="text-center">
                            Среда<br />
                            <small class="text-primary" data-day="3">Выбрать все</small>
                        </th>
                        <th class="text-center">
                            Четверг<br />
                            <small class="text-primary" data-day="4">Выбрать все</small>
                        </th>
                        <th class="text-center">
                            Пятница<br />
                            <small class="text-primary" data-day="5">Выбрать все</small>
                        </th>
                        <th class="text-center">
                            Суббота<br />
                            <small class="text-primary" data-day="6">Выбрать все</small>
                        </th>
                        <th class="text-center">
                            Воскресенье<br />
                            <small class="text-primary" data-day="7">Выбрать все</small>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @php($time = \Carbon\Carbon::createFromTime(0))
                @foreach(range(1,24) as $hour)
                    @php($show_time = $time->format("H") . ":00 - " . $time->addHours(1)->format("H") . ":00")
                    <tr>
                        <th scope="row" class="text-center">
                            {!! $show_time !!}
                        </th>
                        @foreach(range(1,7) as $day)
                            <td class="text-center" data-day="{!! $day !!}">
                                <fieldset class="form-group">
                                    <input name="schedule[{!! $day !!}][{!! $show_time !!}]" type="checkbox" class="filled-in"
                                           id="day_checkbox_{!! $day !!}_{!! $hour !!}" @if(isset($model) && $model->schedules->where('day', $day)->where('time', $show_time)->first() !== NULL) checked @endif>
                                    <label for="day_checkbox_{!! $day !!}_{!! $hour !!}"></label>
                                </fieldset>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-12 text-center">
            <button type="button" class="btn btn-primary col-md-4 col-12" data-to-step="3">
                Далее
            </button>
        </div>
    </div>
</div>
