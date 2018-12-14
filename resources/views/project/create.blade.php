@extends('layouts.porject')

@section('content')
    <div class="container">
        <form action="/projects" method="post">
            @csrf
            <div class="field">
              <label class="label">title</label>
              <div class="control">
                <input class="input {{$errors->has('title') ? 'is-danger' : ''}}" name="title" type="text" value="{{old('title')}}" placeholder="Text input">
              </div>
            </div>
            <div class="field">
              <label class="label">Username</label>
              <div class="control has-icons-left has-icons-right">
                    <textarea name="description"  class="textarea {{$errors->has('description') ? 'is-danger' : ''}}" placeholder="Textarea" >{{old('description')}}</textarea>
              </div>
            </div>
            <div class="field is-grouped is-grouped-centered">
              <div class="control">
                <button class="button is-link">Submit</button>
              </div>
              <div class="control">
                <button class="button is-text">Cancel</button>
              </div>
            </div>
        </form>
        @include('errors')

    </div>
@endsection
