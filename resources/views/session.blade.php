@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Film sessions</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(count($sessions))
                            @foreach($sessions as $session)
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $session->film->name }} ({{ $session->film->rating }})</h5>
                                        <p class="card-text"><strong>Длительность:</strong> {{ $session->film->length }}</p>
                                        <p class="card-text"><strong>Возрастное ограничение:</strong> {{ $session->film->age_limit }}</p>
                                        <p class="card-text"><strong>Сеанс:</strong> {{ \Carbon\Carbon::parse($session->date)->format('F j. H:i') }}</p>
                                        @auth
                                            <a href="{{ route('sessions', ['id' => $session->id]) }}" class="btn btn-primary">Купить билеты</a>
                                        @endauth
                                        @guest
                                            Войдите, чтобы купить билет
                                        @endguest
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if(isset($session) && isset($seats))
                            <div class="card" style="width: 18rem;">
                                <form method="POST" action="{{ route('ticket') }}" class="card-body">
                                    @csrf
                                    <h5 class="card-title">{{ $session->film->name }}</h5>
                                    <p class="card-text"><strong>Сеанс:</strong> {{ \Carbon\Carbon::parse($session->date)->format('F j. H:i') }}</p>
                                    <select name="seat" title="Выберите место" required>
                                        @foreach($seats as $seat)
                                            <option value="{{ $seat->id }}"> Ряд {{ $seat->row->number }}, Место {{ $seat->number }}, Цена: {{ $seat->price * $session->coefficient }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="session" value="{{ $session->id }}">
                                    <button type="submit" class="btn btn-primary">Купить</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection