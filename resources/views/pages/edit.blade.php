@extends('layouts.main')
@section('content')
    <div class="container pb-5">
        <h1 class="text-center py-5">
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
                <label for="subdomain" class="col-xl-3 col-md-3 col-12 col-form-label">
                    Субдомен
                </label>
                <div class="col-xl-9 col-md-9 col-12">
                    <input type="text" class="form-control" id="subdomain" placeholder="subdomain" name="subdomain" value="{{ $page->subdomain }}">
                </div>
            </div>

            <br>
            <br>

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
                    <textarea class="form-control" id="offer" rows="3" name="offer" placeholder="8 октября. Бесплатный Мастер-класс Продажи фитнес тренера х2. Вживую в Москве и Онлайн по РФ и СНГ.">{{ $page->offer }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="bullets" class="col-xl-3 col-form-label">
                    Буллеты
                </label>
                <div class="col-xl-9">
                     <textarea class="form-control" id="bullets" rows="3" name="bullets" placeholder="Для тех, кто хочет стать или уже является фитнес тренером.<br> Как заработать первые 50000 рублей за 30 дней.<br> Как удвоить продажи.<br> Как перестать жить в фитнес-зале.">{{ $page->bullets }}</textarea>
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
                    <textarea class="form-control" id="lead_magnet" rows="3" name="lead_magnet" placeholder="Зарегистрируйтесь сейчас на Мастер-класс и уже сейчас мы отправим 5 полезных видео по фитнесу">{{ $page->lead_magnet }}</textarea>
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
                     <textarea class="form-control" id="legal" rows="3" name="legal_information" placeholder="© 2017 nejron.com Все права защищены">{{ $page->legal_information }}</textarea>
                </div>
            </div>

            <br>
            <br>

            <div class="form-group row">
                <label for="redirect" class="col-xl-3 col-form-label">
                    Адрес следующего сайта
                </label>
                <div class="col-xl-9">
                    <input type="text" class="form-control" id="redirect" placeholder="http://krossovkioptprice.nejron.com" name="redirect" value="{{ $page->redirect }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-xl-3 col-xl-9">
                    <button type="submit" class="btn btn-primary" role="button">Создать страницу</button>
                </div>
            </div>
        </form>
    </div>
@endsection
