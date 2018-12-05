@extends('layouts.porject')

@section('content')
<div class="container is-full">
    <div class="">
        @foreach ($projects as $project)
            <ul class="menu-list">
                <li>
                    <a href="/projects/{{$project->id}}">
                        {{$project->title}}
                    </a>
                </li>
            </ul>
        @endforeach
    </div>
</div>
@endsection
