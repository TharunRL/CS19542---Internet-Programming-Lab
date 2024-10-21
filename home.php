<?php
session_start();

if (!isset($_SESSION['userid'])) {

    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatapp</title>
    <link rel="stylesheet" href="./style/public.css">
    <link rel="stylesheet" href="./style/bootstrap.min.css">
    <style>
           .mask-custom {
    background: rgba(24, 24, 16, .2);
    border-radius: 2em;
    backdrop-filter: blur(15px);
    border: 2px solid rgba(255, 255, 255, 0.05);
    background-clip: padding-box;
    box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
    }
    </style>
    <script src="./script/jquery.min.js"></script>
</head>
<body >
    <header class="p-3 text-bg-dark">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <img src="./static/chat-unread-svgrepo-com.svg" height="40px">
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="#" class="nav-link px-2 text-white">Home</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
              <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
              <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>
    
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
              <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>
    
            <div class="text-end">
              <button type="button" class="btn btn-warning" onclick="window.location.href='logout.php';">Log Out</button>
            </div>
          </div>
        </div>
      </header>
      <section class="gradient-custom">
        <div class="container py-5">
      
          <div class="row">
      
            <div class="col-md-6 col-lg-5 col-xl-5 mb-4 mb-md-0">
      
              <h5 class="font-weight-bold mb-3 text-center text-white">Chat</h5>
      
              <div class="card mask-custom">
                <div class="card-body">
      
                  <ul class="list-unstyled mb-0 usercard">
                    <li class="p-2 border-bottom" style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                      <a class="d-flex justify-content-between link-light">
                        <div class="d-flex flex-row">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar"
                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                          <div class="pt-1">
                            <p class="fw-bold mb-0">John Doe</p>
                            <p class="small text-white">Hello, Are you there?</p>
                          </div>
                        </div>
                        <div class="pt-1">
                          <p class="small text-white mb-1">Just now</p>
                          <span class="badge bg-danger float-end">1</span>
                        </div>
                      </a>
                    </li>
                    <li class="p-2 border-bottom" style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                      <a href="#!" class="d-flex justify-content-between link-light">
                        <div class="d-flex flex-row">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-1.webp" alt="avatar"
                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                          <div class="pt-1">
                            <p class="fw-bold mb-0">Danny Smith</p>
                            <p class="small text-white">Lorem ipsum dolor sit.</p>
                          </div>
                        </div>
                        <div class="pt-1">
                          <p class="small text-white mb-1">5 mins ago</p>
                        </div>
                      </a>
                    </li>
                    <li class="p-2 border-bottom" style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                      <a href="#!" class="d-flex justify-content-between link-light">
                        <div class="d-flex flex-row">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-2.webp" alt="avatar"
                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                          <div class="pt-1">
                            <p class="fw-bold mb-0">Alex Steward</p>
                            <p class="small text-white">Lorem ipsum dolor sit.</p>
                          </div>
                        </div>
                        <div class="pt-1">
                          <p class="small text-white mb-1">Yesterday</p>
                        </div>
                      </a>
                    </li>
                    <li class="p-2 border-bottom" style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                      <a href="#!" class="d-flex justify-content-between link-light">
                        <div class="d-flex flex-row">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-3.webp" alt="avatar"
                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                          <div class="pt-1">
                            <p class="fw-bold mb-0">Ashley Olsen</p>
                            <p class="small text-white">Lorem ipsum dolor sit.</p>
                          </div>
                        </div>
                        <div class="pt-1">
                          <p class="small text-white mb-1">Yesterday</p>
                        </div>
                      </a>
                    </li>
                    <li class="p-2 border-bottom" style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                      <a href="#!" class="d-flex justify-content-between link-light">
                        <div class="d-flex flex-row">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-4.webp" alt="avatar"
                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                          <div class="pt-1">
                            <p class="fw-bold mb-0">Kate Moss</p>
                            <p class="small text-white">Lorem ipsum dolor sit.</p>
                          </div>
                        </div>
                        <div class="pt-1">
                          <p class="small text-white mb-1">Yesterday</p>
                        </div>
                      </a>
                    </li>
                    <li class="p-2 border-bottom" style="border-bottom: 1px solid rgba(255,255,255,.3) !important;">
                      <a href="#!" class="d-flex justify-content-between link-light">
                        <div class="d-flex flex-row">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                          <div class="pt-1">
                            <p class="fw-bold mb-0">Lara Croft</p>
                            <p class="small text-white">Lorem ipsum dolor sit.</p>
                          </div>
                        </div>
                        <div class="pt-1">
                          <p class="small text-white mb-1">Yesterday</p>
                        </div>
                      </a>
                    </li>
                    <li class="p-2">
                      <a href="#!" class="d-flex justify-content-between link-light">
                        <div class="d-flex flex-row">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                            class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                          <div class="pt-1">
                            <p class="fw-bold mb-0">Brad Pitt</p>
                            <p class="small text-white">Lorem ipsum dolor sit.</p>
                          </div>
                        </div>
                        <div class="pt-1">
                          <p class="small text-white mb-1">5 mins ago</p>
                          <span class="text-white float-end"><i class="fas fa-check" aria-hidden="true"></i></span>
                        </div>
                      </a>
                    </li>
                    
                  </ul>
      
                </div>
              </div>
      
            </div>
      
            <div class="col-md-6 col-lg-7 col-xl-7">
      
              <ul class="list-unstyled text-white chat">
                <li class="d-flex justify-content-between mb-4">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                    class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                  <div class="card mask-custom">
                    <div class="card-header d-flex justify-content-between p-3"
                      style="border-bottom: 1px solid rgba(255,255,255,.3);">
                      <p class="fw-bold mb-0">Brad Pitt</p>
                      <p class="text-light small mb-0"><i class="far fa-clock"></i> 12 mins ago</p>
                    </div>
                    <div class="card-body">
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                      </p>
                    </div>
                  </div>
                </li>
                <li class="d-flex justify-content-between mb-4">
                  <div class="card mask-custom w-100">
                    <div class="card-header d-flex justify-content-between p-3"
                      style="border-bottom: 1px solid rgba(255,255,255,.3);">
                      <p class="fw-bold mb-0">Lara Croft</p>
                      <p class="text-light small mb-0"><i class="far fa-clock"></i> 13 mins ago</p>
                    </div>
                    <div class="card-body">
                      <p class="mb-0">
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium.
                      </p>
                    </div>
                  </div>
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-5.webp" alt="avatar"
                    class="rounded-circle d-flex align-self-start ms-3 shadow-1-strong" width="60">
                </li>
                <li class="d-flex justify-content-between mb-4">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
                    class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
                  <div class="card mask-custom">
                    <div class="card-header d-flex justify-content-between p-3"
                      style="border-bottom: 1px solid rgba(255,255,255,.3);">
                      <p class="fw-bold mb-0">Brad Pitt</p>
                      <p class="text-light small mb-0"><i class="far fa-clock"></i> 10 mins ago</p>
                    </div>
                    <div class="card-body">
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                      </p>
                    </div>
                  </div>
                </li>
                
              </ul>
              <form action="insertchat.php" method="post" id="chatForm" name="chatForm" >
              <div class="mb-3">
                  <div data-mdb-input-init class="form-outline form-white f1">
                    <textarea class="form-control bg-transparent" name="msg" rows="4" placeholder="Message"></textarea>
                    
                  </div>
              </div>
                <button  type="submit"  data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg btn-rounded float-end">Send</button>
                </form>
            </div>
      
          </div>
      
        </div>
      </section>
<script src="./script/bootstrap.min.js"></script>
<script src="./script/main.js"></script>

</body>
</html>