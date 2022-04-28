<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">Sistem Informasi Evaluasi Pembelajaran</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  {{-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                --}}
                  <li class="nav-item">
                    <a class="nav-link" href="/informasi">Informasi</a>
                  </li> 
                  {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                  </li> --}}
                </ul>
                <span class="navbar-text">
                    <a class="nav-link" href="/login">
                        Login
                    </a>
                </span>
              </div>
            </div>
          </nav>
        <div style="padding: 20px">
            @yield('usersection')
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script>
        window.onload = function(){
            var totalNumberOfproblems = 11;
            for(var i=2; i<=totalNumberOfproblems; i++){
                if (document.getElementById('problemAns'+i)) {
                    document.getElementById('problemAns'+i).style.display='none';
                }
            }
        }
        function toggleDivAns(id,pagingId){
                var totalNumberOfproblems = 11;
                for(var i=1; i<=totalNumberOfproblems; i++){
                    if (document.getElementById('problemAns'+i)) {
                        document.getElementById('problemAns'+i).style.display='none';
                    }
                }
                if (document.getElementById('problemAns'+id)) {
                    document.getElementById('problemAns'+id).style.display='block';
                }
                // clear all class active
                for(var i=1; i<=totalNumberOfproblems; i++){
                    var el = document.getElementById('pageProbAns'+i);
                    el.classList.remove('active');
                }
                // add active to clicked 
                var element = document.getElementById(pagingId);
                element.classList.add("active");
        }
    </script>
</html>
