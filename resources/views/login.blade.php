
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>


  
<style>
   
      input::-ms-reveal,
      input::-ms-clear {
        display: none !important;
      }
    
</style>

<body class="bg-dodger-blue-50" >  
<div class="min-h-screen flex items-center justify-center">
    <div class="w-full flex items-center flex-col max-w-md ">
       
      


        <form class="bg-white md:h-[550px] md:w-[450px] w=[200px]  min-[350px]:w-[350px] flex flex-col justify-between  drop-shadow-card rounded-2xl px-8 pt-6 pb-8 md:pt-12 md:pb-12 mb-4" action="{{url('/login')}}" method="POST">
            @csrf
            @method('POST')

            <div class="logo flex items-center flex-col ">
                <img class="max-w-20 mb-3   " src="{{asset('asset/images/logo/Logo.png')}}" alt="">
                <p href="#" class="text-dodger-blue-950 font-body font-bold text-2xl " > <span class="text-dodger-blue-700" >RW</span>GRAM</p>
            </div>
            

            <div class="input mt-10">
                <div class="mb-6">
                  <div class="flex  appearance-none border rounded-md w-full py-3 px-4 text-gray-700 mb-3 leading-tight ">
                    <input  class=" appearance-none outline-none border-none   w-full  text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('username') is-invalid @enderror" id="username" name="username" type="text" placeholder="Masukkan Username" >
                  </div>
                  @error('username')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                   
                  </div>
                  <div class="mb-6">
                    <div class="flex  appearance-none border rounded-md w-full py-3 px-4 text-gray-700 mb-3 leading-tight " >
                        <input class="w-full focus:outline-none  border-none focus:shadow-outline @error('password') is-invalid @enderror"  id="password" type="password" name="password" placeholder="Masukkan Password">
                        <button id="button_reveal" ><i id="eye" class="fa fa-eye"></i></button>
                    </div>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                                 
                  </div>
            </div>
         
          <div class="flex items-center justify-between">
            <button type="submit" class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800  w-full text-center px-8 py-3 text-base font-medium rounded-full drop-shadow-button ">Masuk</button>
            {{-- <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
              Forgot Password?
            </a> --}}
          </div>
        </form>
      
      </div>
</div>

<script src="{{asset('js/login.js')}}"></script>
</body>
</html>