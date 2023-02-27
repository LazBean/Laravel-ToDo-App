@extends('layouts.app')

@section('content')
    
<h1>Todo List</h1>

<?php
    $completed_amount = 0;
    foreach ($tasks as $task){
        if($task->isCompleted()){
            $completed_amount++;
        }
    }
    $completed_percent = (count($tasks) == 0)? 0 : $completed_amount/count($tasks) * 100;  
?>


<div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar" style="width: <?php echo $completed_percent;?>%"></div>
    <small class="justify-content-center d-flex position-absolute " style="width: 70%;">{{$completed_amount}} / {{count($tasks)}}</small>
</div>


<ul class="list-group list-group-vertical rounded-0 bg-transparent" style="margin-top: 30px">

    

    @foreach ($tasks as $task)


    <!-- Check if a task is expired -->
    <?php
        $isExpired = false;
        $hasDeadline = $task->due_at !== null;
        
        $now = strtotime(now());
        $numberDays = 0;
        $numberHours = 0;
        $numberMin = 0;


        if(!$task->completed and $hasDeadline){

            $due = strtotime($task->due_at);

            $timeDiff = ($due - $now);

            if($timeDiff < 0) $isExpired = true;

            $numberMin = abs($timeDiff/60);
            $numberHours = abs($numberMin/60);
            $numberDays = abs($numberHours/24);

            //echo $numberMin;
        }
    ?>

    
    <div class="card @if($isExpired) border-danger @else @if($task->isCompleted()) border-success @endif @endif" style="margin: 10px; @if($task->isCompleted()) opacity: 0.7 @endif">
        
        <ul class="list-group list-group-horizontal rounded-0 border-0 bg-transparent">

            
            <!-- Complete Section -->
            <li class="list-group-item align-items-center" style="width: 130px">

                @if (!$task->isCompleted())

                    <form action="/tasks/{{ $task->id }}" method="POST">

                        @method('PATCH')
                        @csrf
                        <button class="btn btn-outline-primary "  input="submit"> Complete </button>    

                    </form>

                    @if($isExpired)
                        <h5><span class="badge text-bg-danger " > &nbsp;&nbsp;Expired&nbsp;&nbsp;&nbsp;</span></h5>
                    @else
                        <h5><span class="badge text-bg-primary " > InProgress</span></h5>
                    @endif
                    
                @else

                    

                    @if ($task->isCompleted())
                        <h5><span class="badge text-bg-success " >Completed</span></h5>
                    @endif
                    
                @endif

            </li>

            <!-- Description Section -->
            <li class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                <p class="lead fw-normal mb-0"> {{ $task->description }} </p>

                
            </li>


            
            <!-- Timeframe Section -->
            <li class="list-group-item align-items-center rounded-0 border-0 bg-transparent" style="width: 200px">
                
                <div class="text-end text-muted">
                    <a href="#" class="text-muted" data-mdb-toggle="tooltip" title="Due {{$task->due_at}}">
                <p class="small mb-0"> 
                    @if($hasDeadline and !$task->completed)
                        @if($isExpired) Overdue 
                            @if(intval($numberDays) !== 0)  {{intval($numberDays)}} days 
                            @else {{intval($numberHours)}} hours 
                            @endif ago                      
                        @else
                            Deadline in
                            @if(intval($numberDays) !== 0)  {{intval($numberDays)}} days 
                            @else {{intval($numberHours)}} hours 
                            @endif   
                        @endif
                    @endif 
                </p>

                
                    
                        
                    </a>
                </div>
                
            </li>


            <!-- Right Buttons Section -->
            <li class="list-group-item align-items-center rounded-0 border-0 bg-transparent" style="width: 90px">

                <form action="/tasks/{{ $task->id }}" method="POST">
                    
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-outline-danger" input="submit"> Delete</button>

                </form>
                
            </li>

            <li class="list-group-item align-items-center rounded-0 border-0 bg-transparent" style="width: 90px">

                <form action="/tasks/{{ $task->id }}/edit" method="GET">
                    
                    <button class="btn btn-outline-primary" input="submit"> Edit</button>

                </form>

            </li>

        </ul>
    </div>

    @endforeach


    <!-- Task Create -->
    <a href="/tasks/create" class="btn btn-primary btn-lg btn-block" type="button"  style="margin-top: 30px">New Task</a>
</ul>


@endsection
