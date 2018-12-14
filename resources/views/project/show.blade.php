@extends('layouts.porject')

@section('content')
    <div class="container">
              <div class="box">
                {{$project->title}}
                {{$project->description}}
                <time datetime="2016-1-1">{{$project->created_at}}</time>
              </div><!-- /.box -->

              @if ($project->tasks->count())
                <div class="box">
                  <h2 class="title">Tasks</h2>
                    @foreach ($project->tasks as $task)
                     <form action="/tasks/{{$task->id}}" method="POST">
                      @csrf
                      @method('PATCH')
                       <label for="completed" class=" {{$task->completed ? 'is-completed' : ''}}">
                         <input type="checkbox" {{$task->completed ? 'checked' : ''}} name="completed" onchange="this.form.submit()" />
                         {{$task->description}}
                       </label>
                     </form>
                    @endforeach
                </div>
              @endif
                <form action="/projects/{{$project->id}}/task" method="POST" class="box">
                  @csrf
                  <div class="field">
                    <label class="label" for="description">
                      description
                    </label>
                    <div class="control">
                      <input type="text"  class="input" name="description" value="{{old('description')}}" />
                    </div>
                  </div><!-- /.field -->
                  <div class="field">
                    <div class="control">
                      <button class="button is-link"> Add Task</button>
                    </div>
                  </div><!-- /.field -->
                  @include('errors')
                </form>

            <div class="box">
              <a href="/projects/{{$project->id}}/edit" class="">Edit</a>
              <form action="/projects/{{$project->id}}" method="post">
                  @csrf
                  @method('delete')
                  <button  class="button is-danger">Delete</button>
              </form>
            </div><!-- /.box -->

    </div>
@endsection
