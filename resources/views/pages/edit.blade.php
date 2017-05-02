@extends('layouts.main')
@section('content')
    <div class="container pb-5">
        <h1 class="text-center pb-5">
            Редактирование страницы
        </h1>
        <form method="POST" action="/pages/{{ $page->id }}" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $page->id }}">

            <div class="form-group row">
                <label for="url" class="col-xl-3 col-md-3 col-12 col-form-label">
                    Адрес сайта
                </label>
                <div class="col-xl-9 col-md-9 col-12">
                    <p class="form-control-static" id="url"><a href="/pages/{{ $page->id }}" target="_blank">/pages/{{ $page->id }}</a></p>
                </div>
            </div>
            <div class="form-group row">
                <label for="company_name" class="col-xl-3 col-form-label">
                    Имя компании
                </label>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="company_name" placeholder="LPKIT" name="company_name" value="{{ $page->company_name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-xl-3 col-form-label">
                    Дескриптор
                </label>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="description" placeholder="Генератор landing page" name="description" value="{{ $page->description }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-xl-3 col-form-label">
                    Телефон
                </label>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="phone" placeholder="+7 929 116 85 65" name="phone" value="{{ $page->phone }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-xl-3 col-form-label">
                    Email
                </label>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="email" placeholder="info@lpkit.ru" name="email" value="{{ $page->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-xl-3 col-form-label">
                    Адрес
                </label>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="address" placeholder="Адрес" name="address" value="{{ $page->address }}">
                </div>
            </div>

            <br>
            <br>

            <div class="form-group row">
                <label for="offer" class="col-xl-3 col-form-label">
                    Оффер
                </label>
                <div class="col-xl-9">
                    <textarea class="form-control textarea" id="offer" rows="3" name="offer" placeholder="8 октября. Бесплатный Мастер-класс Продажи фитнес тренера х2. Вживую в Москве и Онлайн по РФ и СНГ.">{{ $page->offer }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="bullets" class="col-xl-3 col-form-label">
                    Буллеты
                </label>
                <div class="col-xl-9">
                     <textarea class="form-control textarea" id="bullets" rows="3" name="bullets" placeholder="Для тех, кто хочет стать или уже является фитнес тренером.<br> Как заработать первые 50000 рублей за 30 дней.<br> Как удвоить продажи.<br> Как перестать жить в фитнес-зале.">{{ $page->bullets }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="video" class="col-xl-3 col-form-label">
                    Ссылка на youtube видео
                </label>
                <div class="col-xl-6">
                    <input type="text" class="form-control" id="video" placeholder="https://www.youtube.com/embed/LwKl8pN3i5o" name="video" value="{{ $page->video }}">
                </div>
                <div class="col-xl-3">
                    <div class="embed-responsive embed-responsive-16by9 sw">
                        <iframe class="embed-responsive-item" src="{{ $page->video }}?rel=0&showinfo=0" allowfullscreen id="video_iframe"></iframe>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <div class="form-group row">
                <label for="lead_magnet" class="col-xl-3 col-form-label">
                    Лид-магнит
                </label>
                <div class="col-xl-9">
                    <textarea class="form-control textarea" id="lead_magnet" rows="3" name="lead_magnet" placeholder="Зарегистрируйтесь сейчас на Мастер-класс и уже сейчас мы отправим 5 полезных видео по фитнесу">{{ $page->lead_magnet }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="name_form_enabled" class="col-xl-3">
                    Поле "Имя"
                </label>
                <div class="col-xl-9">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="name_form_enabled" {{ isset($page->name_form_enabled) ? 'checked' : ''}}> Отобразить поле "Имя"
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="email_form_enabled" class="col-xl-3">
                    Поле "Email"
                </label>
                <div class="col-xl-9">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="email_form_enabled" {{ isset($page->email_form_enabled) ? 'checked' : ''}}> Отобразить поле "Email"
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="phone_form_enabled" class="col-xl-3">
                    Поле "Телефон"
                </label>
                <div class="col-xl-9">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="phone_form_enabled" {{ isset($page->phone_form_enabled) ? 'checked' : ''}}> Отобразить поле "Телефон"
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="call_to_action" class="col-xl-3 col-form-label">
                    Кнопка призыв к действию
                </label>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="call_to_action" placeholder="Отправить заявку" name="call_to_action" value="{{ $page->call_to_action }}">
                </div>
            </div>

            <br>
            <br>

            <div class="form-group row">
                <label for="background_image" class="col-xl-3 col-form-label">
                    Фоновая картинка
                </label>
                <div class="col-xl-6">
                    <label class="custom-file">
                        <input type="file" id="background_image" class="custom-file-input" name="background_image">
                        <span class="custom-file-control"></span>
                    </label>
                </div>
                <div class="col-xl-3">
                    @if (isset($page->background_image))
                        <img id="bg-img" src="/files/{{ $page->id }}/{{ $page->background_image }}" class="img-fluid">
                    @else
                        <img id="bg-img" src="" class="img-fluid">
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="legal_information" class="col-xl-3 col-form-label">
                    Юридическая информация
                </label>
                <div class="col-xl-9">
                     <textarea class="form-control textarea" id="legal" rows="3" name="legal_information" placeholder="© 2017 lpkit.ru Все права защищены">{{ $page->legal_information }}</textarea>
                </div>
            </div>

            <br>
            <br>

            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Примеры работ
                            </a>
                        </h5>
                    </div>
                    @if ($page->case_enabled)
                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                    @else
                        <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                    @endif
                        <div class="card-block">
                            <div class="form-group row">
                                <label for="case_enabled" class="col-xl-3">
                                    Примеры работ (Кейсы)
                                </label>
                                <div class="col-xl-9">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="case_enabled" {{ isset($page->case_enabled) ? 'checked' : ''}}> Включить блок примеров работ
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_title" class="col-xl-3 col-form-label">
                                    Заголовок блока с кейсами
                                </label>
                                <div class="col-xl-9">
                                    <input type="text" class="form-control" id="case_title" placeholder="Посмотрите примеры наших работ" name="case_title" value="{{ $page->case_title }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_video_1" class="col-xl-3 col-form-label">
                                    Ссылка на youtube видео кейс 1
                                </label>
                                <div class="col-xl-9">
                                    <input type="text" class="form-control" id="case_video_1" placeholder="https://www.youtube.com/embed/LwKl8pN3i5o" name="case_video_1" value="{{ $page->case_video_1 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_text_1" class="col-xl-3 col-form-label">
                                    Описание к видео кейсу 1
                                </label>
                                <div class="col-xl-9">
                                     <textarea class="form-control textarea" id="case_text_1" rows="3" name="case_text_1" placeholder="Стоимость рабост составила 11 500 рублей">{{ $page->case_text_1 }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_video_2" class="col-xl-3 col-form-label">
                                    Ссылка на youtube видео кейс 2
                                </label>
                                <div class="col-xl-9">
                                    <input type="text" class="form-control" id="case_video_2" placeholder="https://www.youtube.com/embed/LwKl8pN3i5o" name="case_video_2" value="{{ $page->case_video_2 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_text_2" class="col-xl-3 col-form-label">
                                    Описание к видео кейсу 2
                                </label>
                                <div class="col-xl-9">
                                     <textarea class="form-control textarea" id="case_text_2" rows="3" name="case_text_2" placeholder="Стоимость рабост составила 11 500 рублей">{{ $page->case_text_2 }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_video_3" class="col-xl-3 col-form-label">
                                    Ссылка на youtube видео кейс 3
                                </label>
                                <div class="col-xl-9">
                                    <input type="text" class="form-control" id="case_video_3" placeholder="https://www.youtube.com/embed/LwKl8pN3i5o" name="case_video_3" value="{{ $page->case_video_3 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_text_3" class="col-xl-3 col-form-label">
                                    Описание к видео кейсу 3
                                </label>
                                <div class="col-xl-9">
                                     <textarea class="form-control textarea" id="case_text_3" rows="3" name="case_text_3" placeholder="Стоимость рабост составила 11 500 рублей">{{ $page->case_text_3 }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_video_4" class="col-xl-3 col-form-label">
                                    Ссылка на youtube видео кейс 4
                                </label>
                                <div class="col-xl-9">
                                    <input type="text" class="form-control" id="case_video_4" placeholder="https://www.youtube.com/embed/LwKl8pN3i5o" name="case_video_4" value="{{ $page->case_video_4 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_text_4" class="col-xl-3 col-form-label">
                                    Описание к видео кейсу 4
                                </label>
                                <div class="col-xl-9">
                                     <textarea class="form-control textarea" id="case_text_4" rows="3" name="case_text_4" placeholder="Стоимость рабост составила 11 500 рублей">{{ $page->case_text_4 }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_video_5" class="col-xl-3 col-form-label">
                                    Ссылка на youtube видео кейс 5
                                </label>
                                <div class="col-xl-9">
                                    <input type="text" class="form-control" id="case_video_5" placeholder="https://www.youtube.com/embed/LwKl8pN3i5o" name="case_video_5" value="{{ $page->case_video_5 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_text_5" class="col-xl-3 col-form-label">
                                    Описание к видео кейсу 5
                                </label>
                                <div class="col-xl-9">
                                     <textarea class="form-control textarea" id="case_text_5" rows="3" name="case_text_5" placeholder="Стоимость рабост составила 11 500 рублей">{{ $page->case_text_5 }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_video_6" class="col-xl-3 col-form-label">
                                    Ссылка на youtube видео кейс 6
                                </label>
                                <div class="col-xl-9">
                                    <input type="text" class="form-control" id="case_video_6" placeholder="https://www.youtube.com/embed/LwKl8pN3i5o" name="case_video_6" value="{{ $page->case_video_6 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_text_6" class="col-xl-3 col-form-label">
                                    Описание к видео кейсу 6
                                </label>
                                <div class="col-xl-9">
                                     <textarea class="form-control textarea" id="case_text_6" rows="3" name="case_text_6" placeholder="Стоимость рабост составила 11 500 рублей">{{ $page->case_text_6 }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_video_7" class="col-xl-3 col-form-label">
                                    Ссылка на youtube видео кейс 7
                                </label>
                                <div class="col-xl-9">
                                    <input type="text" class="form-control" id="case_video_7" placeholder="https://www.youtube.com/embed/LwKl8pN3i5o" name="case_video_7" value="{{ $page->case_video_7 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_text_7" class="col-xl-3 col-form-label">
                                    Описание к видео кейсу 7
                                </label>
                                <div class="col-xl-9">
                                     <textarea class="form-control textarea" id="case_text_7" rows="3" name="case_text_7" placeholder="Стоимость рабост составила 11 500 рублей">{{ $page->case_text_7 }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_video_8" class="col-xl-3 col-form-label">
                                    Ссылка на youtube видео кейс 8
                                </label>
                                <div class="col-xl-9">
                                    <input type="text" class="form-control" id="case_video_8" placeholder="https://www.youtube.com/embed/LwKl8pN3i5o" name="case_video_8" value="{{ $page->case_video_8 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_text_8" class="col-xl-3 col-form-label">
                                    Описание к видео кейсу 8
                                </label>
                                <div class="col-xl-9">
                                     <textarea class="form-control textarea" id="case_text_8" rows="3" name="case_text_8" placeholder="Стоимость рабост составила 11 500 рублей">{{ $page->case_text_8 }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_video_9" class="col-xl-3 col-form-label">
                                    Ссылка на youtube видео кейс 9
                                </label>
                                <div class="col-xl-9">
                                    <input type="text" class="form-control" id="case_video_9" placeholder="https://www.youtube.com/embed/LwKl8pN3i5o" name="case_video_9" value="{{ $page->case_video_9 }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="case_text_9" class="col-xl-3 col-form-label">
                                    Описание к видео кейсу 9
                                </label>
                                <div class="col-xl-9">
                                     <textarea class="form-control textarea" id="case_text_9" rows="3" name="case_text_9" placeholder="Стоимость рабост составила 11 500 рублей">{{ $page->case_text_9 }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div id="slides-accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header" role="tab" id="slides-heading">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" data-parent="#slides-accordion" href="#slide-collapse" aria-expanded="true" aria-controls="slide-collapse">
                                Слайды
                            </a>
                        </h5>
                    </div>
                    @if ($page->slides_number or $page->slided_number > 0)
                        <div id="slide-collapse" class="collapse show" role="tabpanel" aria-labelledby="slides-heading">
                    @else
                        <div id="slide-collapse" class="collapse" role="tabpanel" aria-labelledby="slides-heading">
                    @endif
                        <div class="card-block">
                            <div class="form-group row">
                                <label for="slides_number" class="col-xl-3 col-form-label">
                                    Число слайдов
                                </label>
                                <div class="col-xl-9">
                                    <input type="number" class="form-control" id="slides_number" placeholder="" name="slides_number" value="{{ $page->slides_number or '' }}" min="0">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-xl-3 col-xl-9">
                                    <button type="submit" class="btn btn-primary" role="button">Сохранить</button>
                                </div>
                            </div>

                            <br>

                            @for ($i = 1; $i <= $page->slides_number; $i++)
                                <input type="hidden" name="slide_id_{{ $i }}" value="{{ $page->slides[$i - 1]->id or ''}}">
                                <div class="form-group row">
                                    <label for="slide_priority_{{ $i }}" class="col-xl-3 col-form-label">
                                        Очередность
                                    </label>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" id="slide_priority_{{ $i }}" placeholder="" name="slide_priority_{{ $i }}" value="{{ $page->slides[$i - 1]->priority or ''}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="slide_bg_color_{{ $i }}" class="col-xl-3">
                                        Цвет фона слайда
                                    </label>
                                    <div class="col-xl-9">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                @if ($page->slides[$i - 1]->bg_color == 'white')
                                                    <input class="form-check-input" type="radio" name="slide_bg_color_{{ $i }}" id="slide_bg_color_{{ $i }}" value="white" checked>
                                                @else
                                                    <input class="form-check-input" type="radio" name="slide_bg_color_{{ $i }}" id="slide_bg_color_{{ $i }}" value="white">
                                                @endif
                                                Белый
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                @if ($page->slides[$i - 1]->bg_color == 'bg-faded')
                                                    <input class="form-check-input" type="radio" name="slide_bg_color_{{ $i }}" id="slide_bg_color_{{ $i }}" value="bg-faded" checked>
                                                @else
                                                    <input class="form-check-input" type="radio" name="slide_bg_color_{{ $i }}" id="slide_bg_color_{{ $i }}" value="bg-faded">
                                                @endif
                                                Серый
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="slide_title_{{ $i }}" class="col-xl-3 col-form-label">
                                        Заголовок
                                    </label>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" id="slide_title_{{ $i }}" placeholder="" name="slide_title_{{ $i }}" value="{{ $page->slides[$i - 1]->title }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="slide_image_{{ $i }}" class="col-xl-3 col-form-label">
                                        Изображение
                                    </label>
                                    <div class="col-xl-6">
                                        <label class="custom-file">
                                            <input type="file" id="slide_image_{{ $i }}" class="custom-file-input" name="slide_image_{{ $i }}">
                                            <span class="custom-file-control"></span>
                                        </label>
                                    </div>
                                    <div class="col-xl-3">
                                        @if (isset($page->slides[$i - 1]->image))
                                            <img id="slide_image_{{ $i }}" src="/files/{{ $page->id }}/{{ $page->slides[$i - 1]->image }}" class="img-fluid">
                                        @else
                                            <img id="slide_image_1" src="" class="img-fluid">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="slide_subtitle_{{ $i }}" class="col-xl-3 col-form-label">
                                        Подзаголовок
                                    </label>
                                    <div class="col-xl-9">
                                        <input type="text" class="form-control" id="slide_subtitle_{{ $i }}" placeholder="" name="slide_subtitle_{{ $i }}" value="{{ $page->slides[$i - 1]->subtitle }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="slide_text_{{ $i }}" class="col-xl-3 col-form-label">
                                        Текст
                                    </label>
                                    <div class="col-xl-9">
                                        <textarea class="form-control textarea" id="slide_text_{{ $i }}" rows="3" name="slide_text_{{ $i }}" placeholder="">{{ $page->slides[$i - 1]->text }}</textarea>
                                    </div>
                                </div>
                                @if ($i != $page->slides_number)
                                    <br>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <div class="form-group row">
                <label for="comments_enabled" class="col-xl-3">
                    Комментирование
                </label>
                <div class="col-xl-9">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="comments_enabled" {{ isset($page->comments_enabled) ? 'checked' : ''}}> Включить блок комментариев Cackle
                        </label>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <div class="form-group row">
                <label for="lead_magnet_file" class="col-xl-3 col-form-label">
                    Файл лид-магнит
                </label>
                <div class="col-xl-6">
                    <label class="custom-file">
                        <input type="file" id="lead_magnet_file" class="custom-file-input" name="lead_magnet_file">
                        <span class="custom-file-control"></span>
                    </label>
                </div>
            </div>
            <div class="form-group row">
                <label for="domain" class="col-xl-3 col-md-3 col-12 col-form-label">
                    Домен
                </label>
                <div class="col-xl-9 col-md-9 col-12">
                    <input type="text" class="form-control" id="domain" placeholder="domain" name="domain" value="{{ $page->domain }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="subdomain" class="col-xl-3 col-md-3 col-12 col-form-label">
                    Субдомен
                </label>
                <div class="col-xl-9 col-md-9 col-12">
                    <input type="text" class="form-control" id="subdomain" placeholder="subdomain" name="subdomain" value="{{ $page->subdomain }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-xl-3 col-form-label">
                    Title
                </label>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="title" placeholder="Кроссовки оптом" name="title" value="{{ $page->title }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="redirect" class="col-xl-3 col-form-label">
                    Адрес следующего сайта
                </label>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="redirect" placeholder="http://krossovkioptprice.lpkit.com" name="redirect" value="{{ $page->redirect }}">
                </div>
            </div>

            <br>
            <br>

            <div class="form-group row">
                <label for="google" class="col-xl-3 col-form-label">
                    Goolge Analytics
                </label>
                <div class="col-xl-9">
                     <textarea class="form-control textarea" id="google" rows="3" name="google" placeholder="">{{ $page->google }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="yandex" class="col-xl-3 col-form-label">
                    Яндекс Метрика
                </label>
                <div class="col-xl-9">
                     <textarea class="form-control textarea" id="yandex" rows="3" name="yandex" placeholder="">{{ $page->yandex }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="google" class="col-xl-3 col-form-label">
                    Цель на кнопку
                </label>
                <div class="col-xl-9">
                     <textarea class="form-control textarea" id="yandex_target_button" rows="3" name="yandex_target_button" placeholder="">{{ $page->yandex_target_button }}</textarea>
                </div>
            </div>

            <br>
            <br>

            <div class="form-group row">
                <label for="mailchimp_api_key" class="col-xl-3 col-form-label">
                    Mailchimp api key
                </label>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="mailchimp_api_key" placeholder="aeb1391031954768639c82b75a9fdc30-us11" name="mailchimp_api_key" value="{{ $page->mailchimp_api_key }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="mailchimp_list_id" class="col-xl-3 col-form-label">
                    Mailchimp list id
                </label>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="mailchimp_list_id" placeholder="f315a1ed5c" name="mailchimp_list_id" value="{{ $page->mailchimp_list_id }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-xl-3 col-xl-9">
                    <button type="submit" class="btn btn-primary" role="button">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
@endsection
