@extends('layouts.app')

@section('content')

@if(count($users))
<div>
    @foreach($users as $user)
        <article style='margin-top:2%; margin-bottom:2%;'>
        <p class="lead">
            {{$user->name}}: {{$user->role}}
        </p>
        </article>
    @endforeach
</div>
@endif

@stop