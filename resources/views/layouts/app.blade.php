<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  

    <style>

        body {
            
        }
        .card {
            box-shadow: 0 1px 20px 0 rgba(0,0,0,.1);
            
        }

        .card:hover {
            box-shadow: 0 1px 20px 0 rgba(0,0,0,.15);
        }

        .btn{
            z-index: 10;
        }

        .btn.btn-outline-primary{
            opacity: 0.05;
            position: absolute;
        }

        .btn.btn-outline-danger{
            opacity: 0.05;
        }

        .card:hover *{ 
            opacity: 1;
        }

        .card:hover .badge.text-bg-danger{ 
            opacity: 0;
        }

        .card:hover .badge.text-bg-primary{ 
            opacity: 0;
        }

        .badge{
            opacity: 0.5;
            -moz-user-select: none;  
            -webkit-user-select: none;  
            -ms-user-select: none;  
            -o-user-select: none;  
            user-select: none;
        }
        

    </style>
</head>
<body>

    
    <div class="flex vh-100 d-flex flex-row">
        <div class="d-flex flex-column flex-shrink-3 p-3 text-white bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">ToDo App</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                <a href="/" class="nav-link text-white" aria-current="page">   
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="/"></use></svg>
                    Tasks
                </a>
            </li>
            <li>
                <a href="/tasks/create" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16"><use xlink:href="/tasks/create"></use></svg>
                    New Task
                </a>
            </li>
            
            </ul>
            <hr>
        </div>

        <div class="container-fluid justify-content-center align-items-top" style="margin: 20px">
            <div class="" style="width: 85%; height: 100%">
      
                @yield('content')
                
            </div>
        </div>
    </div>

</body>
</html>