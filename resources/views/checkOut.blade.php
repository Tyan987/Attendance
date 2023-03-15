<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Check Out Page</title>
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

          
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
              <div class="collapse navbar-collapse" id="navbarDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{Auth::user()->username}}
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
    <h3 class="mb-3 text-center fs-1" style="padding-top: 2vh; color: white">Check Out</h3>
    <div class="card-deck d-flex justify-content-center w-100 flex-wrap">
      <div id="time" style="margin-top: 9vh; padding: 3vh; color: #456268; font-size: 40px; background-color: #D0E8F2; border-radius:25px"> </div>
    </div>   
    <div class="row mb-3">
      <div class="col-sm-5"></div>
      <div class="card-deck d-flex justify-content-center w-100 flex-wrap">
        <a href="/checkOutClick" class="btn btn-primary" style="margin-top: 9vh; background-color: #456268; border-color: #456268; border-radius:15px; font-size: 20px;">Check Out</a>
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