
@extends('layouts.app')

@section('content')



<h1>Edit</h1>

<?php
    //echo $task;
?>

<ul class="list-group list-group-vertical rounded-0 bg-transparent" style="margin-top: 30px">

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

<!-- Edit task -->
<form action="/tasks/{{ $task->id }}/update" method="POST">
    @csrf
    @method('PUT')

    <!-- Completed checkbox -->
    <div class="list-group-item border-0 bg-transparent">
        <div class="form-group">     
            <input class="form-check-input" type="checkbox" value="{{$task->completed}}" id="updated_completed" name="updated_completed">
            <label for="description">Task is Completed</label>
        </div>
    </div>
    

    <!-- Description -->
    <div class="list-group-item border-0 bg-transparent">
        <div class="form-group">
            <label for="description">Task Description:</label>
            <input class="form-control" name="updated_description" type="text" id="updated_description" value="{{$task->description}}">
        </div>
    </div>

    <!-- Due datetime -->
    <div class="list-group-item border-0 bg-transparent">
        <div class="form-group">
            <label for="due_at">Due Date:</label>
            <input type="datetime-local" id="updated_due_at"
                name="updated_due_at" 
                value="<?php 
                    if($task->due_at !== null)
                        echo date("Y-m-d\TH:i:s", strtotime($task->due_at));
                    //$datetime = new DateTime('tomorrow');
                    //echo $datetime->format('Y-m-d H:i:s');
                ?>"
            >
        </div>
    </div>

    <!-- Update Button -->
    <button class="btn btn-primary btn-lg btn-block" type="submit"  style="margin-top: 30px">Update</button>

</form>

</ul>

@endsection