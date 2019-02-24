@extends('layouts.app')

@inject('myController', 'App\Http\Controllers\Controller')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $name }}&nbsp;さんの{{ $year }}年{{ $month }}月の予定を変更します</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{ route('update') }}" enctype='multipart/form-data'>
                      {{ csrf_field() }}
                      {{ method_field('patch') }}
                      <input type="hidden" name="year" value="{{ $year }}">
                      <input type="hidden" name="month" value="{{ $month }}">
                      <input type="hidden" name="n_act" value="{{ $n_act }}">
                      <input type="hidden" name="aid" value="{{ $aid }}">
                      <input type="hidden" name="name" value="{{ $name }}">
                      <p>
                        <label for="part">パート: </label>
                        <select name="part" class="form-control">
                          @foreach ($parts as $part)
                            <option value="{{ $part->id }}"
                              @if ($part_id == $part->id)
                              selected
                              @endif
                              >{{ $part->part }}</option>
                          @endforeach
                        </select>
                      </p>

                      <p>


                      <hr>
                      @foreach ($attendances as $attendance)
                        <div class="form_atten">
                        <p>

                          <label for="atten{{$attendance->attendance_id}}">{{ $attendance->activity->act_at }} {{ $myController->get_youbi($attendance->activity->act_at) }} &nbsp; </label>{{ $attendance->activity->time->jikan }} {{ $attendance->activity->place->place }}
                          @if (strlen($attendance->activity->note)) <span>&nbsp; {{ $attendance->activity->note }}</span>@endif
                          <select name="atten{{$attendance->attendance_id}}" class="form-control">
                              <option value="0"
                                @if ($errors->any())
                                  @if(old("atten$attendance->attendance_id") == "0") selected @endif
                                @else
                                  @if ($attendance->attendance == 0)
                                    selected
                                  @endif
                                @endif
                              >- （未定）</option>
                              <option value="3"
                              @if ($errors->any())
                                @if(old("atten$attendance->attendance_id") == "3") selected @endif
                              @else
                                @if ($attendance->attendance == 3)
                                  selected
                                @endif
                              @endif
                              >○ （参加）</option>
                              <option value="1"
                              @if ($errors->any())
                                @if(old("atten$attendance->attendance_id") == "1") selected @endif
                              @else
                                @if ($attendance->attendance == 1)
                                  selected
                                @endif
                              @endif
                              >× （欠席）</option>
                          </select>

                        </p>


                        <p>
                          <label for="comment{{$attendance->attendance_id}}">コメント: </label>
                          <input type="text" name="comment{{$attendance->attendance_id}}"
                          value=
                            @if ($errors->any())
                              "{{ old("comment$attendance->attendance_id") }}"
                            @else
                              "{{ $attendance->comment }}"
                            @endif
                           class="form-control">
                          @if ($errors->has("comment$attendance->attendance_id"))
                            <span class="error">{{ $errors->first("comment$attendance->attendance_id") }}</span>
                          @endif
                        </p>
                        </div>
                      @endforeach

                      <hr>
                      <p>
                        <input type="submit" value="　　　予定を変更　　　" class="form-control submit_button">
                      </p>
                    </form>

                </div>
                <div  class="card-footer">
                  <p>
                    <a href="{{ action('HomeController@show', [$year, $month]) }}">戻る</a>
                  </p>
                  <div class="pull-right">
                    <form action="{{ url('/home/confirm_delete') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="year" value="{{ $year }}">
                        <input type="hidden" name="month" value="{{ $month }}">
                        <input type="hidden" name="name" value="{{ $name }}">
                        <input type="hidden" name="aid" value="{{ $aid }}">

                        @foreach ($attendances as $attendance)
                          <input type="hidden" name="attens[]" value="{{ $attendance->id }}">
                        @endforeach
                      <button>予定を削除</button>
                     </form>
                  </div>
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
