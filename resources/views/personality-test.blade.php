@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('test') }}" class="take-a-test" method="post">
            {{ csrf_field() }}

            @foreach($question_groups as $group)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            @foreach($group->questions as $question)
                                <div class="col-6 @if($loop->first) text-right @endif">
                                    <label class="custom-control custom-radio @if($loop->first) custom-control--rtl @endif">
                                        <input id="q{{ $question->id }}"
                                               name="results[{{ $question->preference->dimension_id }}][{{ $group->id }}]"
                                               value="{{ $question->preference->code }}"
                                               type="radio"
                                               class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{ $question->question }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            <button class="btn btn-primary" type="submit">Get Result</button>
        </form>

    </div>
@endsection