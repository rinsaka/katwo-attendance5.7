@extends('layouts.app-jquery')

@inject('myController', 'App\Http\Controllers\Controller')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $this_year }}年{{ $this_month }}月の予定</div>

                <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  <div class="link_container">
                      <table border="0" width="100%" cellspacing="0" cellpadding="5" bordercolor="#333333">
                        <tr>
                          <td width="30%" align="center">
                            <span class="next_prev link_left" ontouchstart="">
                              <a href="{{ action('HomeController@show', [$prev_year, $prev_month]) }}">
                                <i class="fas fa-angle-double-left fa-2x my-white"></i> &nbsp;
                                {{ $prev_month }}月
                              </a>
                            </span>
                          </td>
                          <td align="center">
                            <span class="next_prev link_center" ontouchstart="">
                              <a href="{{ action('HomeController@index') }}">
                                <i class="fas fa-home fa-2x my-white"></i> &nbsp;
                                今月
                              </a>
                            </span>
                          </td>
                          <td width="30%" align="center">
                            <span class="next_prev link_right" ontouchstart="">
                              <a href="{{ action('HomeController@show', [$next_year, $next_month]) }}">
                                {{ $next_month }}月 &nbsp;
                                <i class="fas fa-angle-double-right fa-2x my-white"></i>
                              </a>
                            </span>
                          </td>
                        </tr>
                      </table>
                    </div>

                    @if (count($activities) > 0)
                      <div class="create_link" ontouchstart="">
                        <p>
                          <a href="{{ action('HomeController@create', [$this_year, $this_month]) }}">
                            <i class="fas fa-plus-circle fa-2x"></i>
                            {{ $this_year }}年{{ $this_month }}月の<br>自分の予定を登録
                          </a>
                        </p>
                      </div>
                    @endif

                    <div>
                      @forelse ($activities as $activity)
                        <h3 class="act_at">{{ $activity->act_at }} {{ $myController->get_youbi($activity->act_at) }} @if (strlen($activity->note)) <span class="note">&nbsp; {{ $activity->note }}</span>@endif</h3>
                          <div class="detail">
                            <p class="time_place">
                              {{ $activity->time->jikan }}
                              {{ $activity->place->place }}
                            </p>
                            <p class="results">
                              参加： <span class="n_attendance">{{ $activity->n_atten[3] }}</span><span class="total_attendance">/{{ $activity->n_atten[4] }}</span>, &nbsp;
                              欠席： <span class="n_attendance">{{ $activity->n_atten[1] }}</span><span class="total_attendance">/{{ $activity->n_atten[4] }}</span>, &nbsp;
                              未定： <span class="n_attendance">{{ $activity->n_atten[0] }}</span><span class="total_attendance">/{{ $activity->n_atten[4] }} </span>&nbsp;
                            </p>
                            <p class="{{ $activity->class_attendance }} vertical" ontouchstart="">
                              <span class="{{ $activity->class_expansion_link }}">詳細の表示／非表示</span><br>
                              @foreach ($activity->parts as $part)
                                <span class="atten_part">
                                {{ $part->s_part }}： o <span class="n_attendance">{{ $part->n_atten[3] }}</span>，&nbsp; × <span class="n_attendance">{{ $part->n_atten[1] }}</span>，&nbsp; − <span class="n_attendance">{{ $part->n_atten[0] }}</span></span><br>
                                @foreach ($part->attendances as $attendance)
                                  <span class="atten_detail">
                                  @if ($attendance->new) <span class="new">新規</span> @endif
                                  @if ($attendance->update) <span class="update">更新</span> @endif
                                  <a href="{{ action('HomeController@edit', [$this_year, $this_month, $attendance->id]) }}" ontouchstart="">
                                    {{ $attendance->name }} &nbsp;
                                    @if ($attendance->attendance == 3)
                                      o
                                    @elseif ($attendance->attendance == 1)
                                      ×
                                    @else
                                      -
                                    @endif
                                    @if ($attendance->comment) &emsp;<span class="comment">{{  $attendance->comment }}</span> @endif
                                  </a>
                                  </span>
                                  <br>

                                @endforeach
                              @endforeach
                            </p>
                        </div>
                      @empty
                      <p>活動予定がまだ登録されていません!</p>
                      @endforelse
                    </div>

                    @if (count($activities) > 0)
                      <div class="create_link" ontouchstart="">
                        <p>
                          <a href="{{ action('HomeController@create', [$this_year, $this_month]) }}">
                            <i class="fas fa-plus-circle fa-2x"></i>
                            {{ $this_year }}年{{ $this_month }}月の<br>自分の予定を登録
                          </a>
                        </p>
                      </div>
                    @endif

                    @if (count($activities) > 0)
                    <div class="link_container">
                      <table border="0" width="100%" cellspacing="0" cellpadding="5" bordercolor="#333333">
                        <tr>
                          <td width="30%" align="center">
                            <span class="next_prev link_left" ontouchstart="">
                              <a href="{{ action('HomeController@show', [$prev_year, $prev_month]) }}">
                                <i class="fas fa-angle-double-left fa-2x my-white"></i> &nbsp;
                                {{ $prev_month }}月
                              </a>
                            </span>
                          </td>
                          <td align="center">
                            <span class="next_prev link_center" ontouchstart="">
                              <a href="{{ action('HomeController@index') }}">
                                <i class="fas fa-home fa-2x my-white"></i> &nbsp;
                                今月
                              </a>
                            </span>
                          </td>
                          <td width="30%" align="center">
                            <span class="next_prev link_right" ontouchstart="">
                              <a href="{{ action('HomeController@show', [$next_year, $next_month]) }}">
                                {{ $next_month }}月 &nbsp;
                                <i class="fas fa-angle-double-right fa-2x my-white"></i>
                              </a>
                            </span>
                          </td>
                        </tr>
                      </table>
                    </div>
                    @endif

                </div>
                <div  class="card-footer">
                  <p>
                    This system is developed with <a href="https://laravel.com/">Laravel</a>, <a href="https://aws.amazon.com/jp/">AWS</a> and <a href="https://github.com/rinsaka/katwo-attendance5.7">GitHub</a>.
                  </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
