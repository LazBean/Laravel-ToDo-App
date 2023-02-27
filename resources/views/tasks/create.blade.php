
@extends('layouts.app')


@section('content')

<h1>New Task</h1>

<!-- Check for errors -->
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<ul class="list-group list-group-vertical rounded-0 bg-transparent" style="margin-top: 30px">

<!-- Create task -->
<form action="/tasks" method="POST" >
    @csrf

    <!-- Description -->
    <div class="list-group-item border-0 bg-transparent">
        <div class="form-group">
            <label for="description">Task Description:</label>
            <input class="form-control" type="text" id="description" name="description">
        </div>
    </div>




    <!-- Due datetime -->
    <div class="list-group-item border-0 bg-transparent">
        <div class="form-group">
            <label for="due_at">Due Date:</label>
            <input type="datetime-local" id="due_at"
                name="due_at" 
                value=""
            >
        </div>
    </div>


    <!-- Submit button -->
    <div class="list-group-item border-0 bg-transparent">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </div>
    
</form>

</ul>


@endsection