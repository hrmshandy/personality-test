@extends('layouts.app')

@section('content')
    <div class="container text-center pt-3">
        <h5 class="mb-3" style="text-transform: uppercase;">Your Personality Type is:</h5>
        <img src="{{ asset('images/'.$result->type->code.'.png') }}" alt="">
        
        <div class="row align-items-center justify-content-center mt-3 mb-3">
            <div class="col-6">
                @foreach(json_decode($result->results) as $dimension)
                    <div class="progress mb-2" style="height: 2rem;">
                        @foreach($dimension as $preference)
                            <div class="progress-bar @if($loop->first) bg-info @endif"
                                 role="progressbar"
                                 style="
                                         width: {{ $preference->percentage }}%;
                                         padding: 0 15px;
                                         justify-content: {{ $loop->last ? 'flex-end' : 'flex-start' }};"
                                 aria-valuenow="{{ $preference->percentage }}"
                                 aria-valuemin="0" aria-valuemax="100">
                                @if($loop->first)
                                    <span class="badge badge-light">{{ round($preference->percentage) }}%</span>
                                @endif
                                <span style="text-transform: uppercase; display: inline-block;">&nbsp;{{ $preference->name }}&nbsp;</span>
                                @if($loop->last)
                                    <span class="badge badge-light">{{ round($preference->percentage) }}%</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <a href="{{ url('/') }}" class="btn btn-primary">Retake The Test</a>
    </div>
@endsection