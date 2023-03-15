<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Home Page</title>
</head>
<body style="background-color: #79A3B1">
  <header class="w-100">
    <nav class="navbar navbar-light navbar-expand-lg w-100" style="background-color: #456268">
      <div class="container-fluid">
      <a class="navbar-brand ms-5 fs-4 text-white fw-bold" href="/">KEYPEDIA</a>
        <div class="d-flex align-items-center me-5 text-white">

          @if (!Auth::check())
            <a class="nav-link text-decoration-none text-white" href="/login">Login</a>
            <a class="nav-link text-decoration-none text-white" href="/register">Register</a>

          @else   
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
              <div class="collapse navbar-collapse" id="navbarDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{Auth::user()->name}} 
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #FCF8EC">
                      <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                  </li>
                </ul>
            </div>
          @endif 
          {{ date('D, d-M-Y') }}
        </div>
      </div>
    </nav>
  </header>

    <div style="margin-top: 9vh; margin-left: 26.5vh" class="w-75 h-75">
      <h3 class="mb-3 text-center fs-1" style="padding-top: 2vh; color: white">Welcome to Attendance Website</h3>
      <div class="card-deck d-flex justify-content-center w-100 flex-wrap">
        <div class="card mb-3 m-3 text-center fs-4" style="background-color: #D0E8F2; width:30%; border-radius: 25px">
          <a href="/checkIn" style="text-decoration: none">
            <div class="card-header" style="color: #456268">Check In</div>
            <div class="card-body">
              <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/512/1389/1389008.png" alt="IMG not found" style="width:200px; height:200px; margin: 40px 0px">
            </div>
          </a>
        </div>

        <div class="card mb-3 m-3 text-center fs-4" style="background-color: #D0E8F2; width:30%; border-radius: 25px">
          <a href="/checkOut" style="text-decoration: none">
            <div class="card-header" style="color: #456268">Check Out</div>
            <div class="card-body">
              <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/512/4159/4159736.png" alt="IMG not found" style="width:200px; height:200px; margin: 40px 0px">
            </div>
          </a>
        </div>

        <div class="card mb-3 m-3 text-center fs-4" style="background-color: #D0E8F2; width:30%; border-radius: 25px">
          <a href="/viewAttendance" style="text-decoration: none">
            <div class="card-header" style="color: #456268">View Attendance</div>
            <div class="card-body">
              <img class="card-img-top" src="https://cdn-icons-png.flaticon.com/512/8901/8901307.png" alt="IMG not found" style="width:200px; height:200px; margin: 40px 0px">
            </div>
          </a>
        </div>
      </div>   
    </div>

    <footer class="text-center text-lg-start position-absolute bottom-0 start-50 w-100 translate-middle-x">
      <div class="text-center text-white-50 py-3" style="background-color: #456268">
          Made By Sulistyan Hadinata - 2023
      </div>
    </footer>

</body>
</html>

<script type="text/javascript">
  function showTime() {
    var date = new Date(),
        utc = new Date(Date.UTC(
          date.getFullYear(),
          date.getMonth(),
          date.getDate(),
          date.getHours()-7,
          date.getMinutes(),
          date.getSeconds()
        ));

    document.getElementById('time').innerHTML = utc.toLocaleString();
  }

  setInterval(showTime, 1000);
</script>