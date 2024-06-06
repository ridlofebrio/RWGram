

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ ucfirst($active) }} | {{Auth::user()->role_id == 5 ? 'RW Admin' : 'RT Admin'}}</title>
    <link rel="icon" href="/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/e6bc1ebaee.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}

</head>
@vite(['resources/css/app.css','resources/js/app.js'])
@stack('css')
<style>
     .loader {

width: 90px;
height: 14px;
--c:#0096FF 92%,white;
background: 
  radial-gradient(circle 7px at bottom,var(--c)) 0 0,
  radial-gradient(circle 7px at top   ,var(--c)) 0 100%;
background-size: calc(100%/4) 50%;
background-repeat: repeat-x;
animation: l11 1s infinite;
}
@keyframes l11 {
  80%,100% {background-position: calc(100%/3) 0,calc(100%/-3) 100%}
}

input:focus{
      outline:none !important;
      outline-width: 0 !important;
      box-shadow: none !important;
      -moz-box-shadow: none!important;
      -webkit-box-shadow: none!important;
    }
   
</style>


<body class="font-main">
   
    @include('component.flashcard')
    @include('dashboard.navbar')
    @include('dashboard.sidebar')
    <div class="p-4 md:ml-64 min-h-screen bg-neutral-03">
        <div class="w-full">
           <div class="grid gap-4 mb-4">
            <div style="z-index: 99999" id="loading-image" class="fixed top-1/2 left-1/2 flex justify-center items-center -translate-x-1/2 -translate-y-1/2  w-screen h-screen bg-white opacity-70" style="display: none;" ><div class="  loader " ></div></div>
    @yield('content')
           </div>
        </div>
    </div>



@stack('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script>
  if('{{$active}}' != 'pengajuan'){
    $(document).ready(function () {
    setTimeout(() => {
     

        $("#loading-image").css("display", "none");
    }, 1000);
});

  }
</script>
</body>
</html>
