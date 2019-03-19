@extends('layouts.app')

@section('content')


@if(count($users))
<form action={{url('users')}} method="POST">
    {{ csrf_field() }}
<div id="" style="overflow:scroll; height:200px;">
    <span>
        @foreach($users as $user)
            <article style='margin-top:2%; margin-bottom:2%;'>
            {{-- <input type="hidden" name="id_{{$user->id}}" value={{$user->id}}> --}}
            <p class="lead">
                {{$user->name}}, {{$user->email}}, {{$user->birthday}},  {{$user->educationfield}}:
            <select name="{{$user->id}}" the_id={{$user->id}}>
                    <option @if($user->role=='visitor') selected @endif value="visitor">visitor</option>
                    <option @if($user->role=='subscriber') selected @endif value="subscriber">subscriber</option>
                    <option @if($user->role=='admin') selected @endif value="admin">admin</option>
                </select>
            </p>
            </article>
        @endforeach
    </span>
</div>
    <input type=submit value="Confirm" class = 'btn btn-primary form-control' style='margin-top:1%; margin-bottom:1%'>
</form>

<div id="" style="overflow:scroll; height:200px;">
        <span>
            @foreach($users as $user)
                <article style='margin-top:2%; margin-bottom:2%;'>
                {{-- <input type="hidden" name="id_{{$user->id}}" value={{$user->id}}> --}}
                <p class="lead">
                    {{$user->name}}, {{$user->email}}, {{$user->birthday}},  {{$user->educationfield}}:
                <select name="{{$user->id}}" the_id={{$user->id}}>
                        <option @if($user->role=='visitor') selected @endif value="visitor">visitor</option>
                        <option @if($user->role=='subscriber') selected @endif value="subscriber">subscriber</option>
                        <option @if($user->role=='admin') selected @endif value="admin">admin</option>
                    </select>
                </p>
                </article>
            @endforeach
        </span>
    </div>
        <input type=submit value="Confirm" class = 'btn btn-primary form-control' style='margin-top:1%; margin-bottom:1%'>
    </form>

@endif

@stop

