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
                    <input type="text" class="form-control" id="company_name" placeholder="Nejron" name="company_name" value="{{ $page->company_name }}">
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
                    <input type="text" class="form-control" id="email" placeholder="support@nejron.com" name="email" value="{{ $page->email }}">
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
                     <textarea class="form-control textarea" id="legal" rows="3" name="legal_information" placeholder="© 2017 nejron.com Все права защищены">{{ $page->legal_information }}</textarea>
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

                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="card-block">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                  </div>
                </div>
              </div>

            </div>

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
                    <input type="text" class="form-control" id="redirect" placeholder="http://krossovkioptprice.nejron.com" name="redirect" value="{{ $page->redirect }}">
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
