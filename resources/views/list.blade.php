@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Список товаров</h1>
        <table class="table table-striped">
            @if (count ($tovary) > 0)
                <tr>
                <td>Название
                <td>Артикул
                <td>Размер
                <td>Цена
                <td>Количество
                <td>В корзину
                @foreach ($tovary as $tovar)
                    <tr>
                        <td>{{ $tovar->name }}</td>
                        <td>{{ $tovar->art }}</td>
                        <td>{{ $tovar->size }}</td>
                        <td>{{ number_format($tovar->price) }} руб.</td>
                        <form method="post" action="{{ route('cart_add') }}">
                            <td><input type="number" name="quantity" value="1"></td>
                            <td>
                                <input type="hidden" name="id" value="{{ $tovar->id }}" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <button class="btn"><i class="fas fa-shopping-cart pointer"></i></button>
                            </td>
                        </form>
                @endforeach
            @else
                Товаров нет, пожалуйста запустите сидер <b>php artisan db:seed</b>
            @endif
        </table>
    </div>
@endsection
