@extends('layouts.admin')

@inject('myController', 'App\Http\Controllers\Controller')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">活動予定一覧（管理者モード）</div>

                <div class="card-body">
                    {{-- フラッシュメッセージの表示 --}}
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-info">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                      @forelse ($activities as $activity)
                        <p>
                          <a href="{{ action('Admin\HomeController@edit', [$activity->id]) }}">
                            {{ $activity->act_at }} {{ $myController->get_youbi($activity->act_at) }} &nbsp; {{ $activity->time->jikan }} &nbsp; {{ $activity->place->place }}
                            @if (strlen($activity->note)) <span>&nbsp; {{ $activity->note }}</span>@endif
                          </a>
                        </p>
                      @empty
                      @endforelse

                    </div>

                </div>
                <div  class="card-footer">
                  <p>
                    <a href="{{ action('Admin\HomeController@create') }}">
                      活動予定を新規登録
                    </a>
                  </p>
                  <p>&nbsp;</p>
                  <p>
                    This system is developed with <a href="https://laravel.com/">Laravel</a>, <a href="https://aws.amazon.com/jp/">AWS</a> and <a href="https://github.com/rinsaka/katwo-attendance5.7">GitHub</a>.
                  </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
