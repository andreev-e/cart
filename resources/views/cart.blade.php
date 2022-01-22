@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Корзина</h1>
        <table class="table table-striped">
            @if (count ($tovary) > 0)
                <tr>
                    <td>Название
                    <td>Артикул
                    <td>Размер
                    <td>Цена
                    <td>Количество
                    <td>Удалить
                </tr>
                @php
                    $total = 0
                @endphp
                @foreach ($tovary as $tovar)
                    <tr>
                        <td>{{ $tovar->tovar->name }}</td>
                        <td>{{ $tovar->tovar->art }}</td>
                        <td>{{ $tovar->tovar->size }}</td>
                        <td>{{ number_format($tovar->tovar->price, 2, '.', ' ') }} руб.</td>
                        <form method="post" action="{{ route('cart_update') }}">
                            <td>
                                <input type="number" name="quantity" value="{{ $tovar->quantity }}">
                                <input type="hidden" name="id" value="{{ $tovar->id }}" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <button class="btn"><i class="fas fa-save pointer"></i></button>
                            </td>
                        </form>
                        <form method="post" action="{{ route('cart_delete') }}">
                            <td>
                                <input type="hidden" name="id" value="{{ $tovar->id }}" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <button class="btn"><i class="fas fa-ban pointer"></i></button>
                            </td>
                        </form>
                    @php
                        $total = $total + $tovar->quantity * $tovar->tovar->price
                    @endphp
                @endforeach
                <tr>
                    <td>
                    <td>
                    <td>
                    <td>
                    <td>Итого
                    <td><b>{{ number_format($total, 2, '.', ' ') }} руб.</b>
                </tr>
            @else
                Товаров пока не добавлено. <a href="{{ route('list') }}">Перейти к списку</a>
            @endif
        </table>
    </div>
@endsection
