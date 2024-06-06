<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | RWGram</title>
    <link rel="icon" href="/favicon.svg" type="image/x-icon">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>


  
<style>
   
      input::-ms-reveal,
      input::-ms-clear {
        display: none !important;
      }
    

      input:focus {
    outline: none !important;
    outline-width: 0 !important;
    box-shadow: none !important;
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
}

</style>



<body class="bg-dodger-blue-50">
<div class="min-h-screen flex items-center justify-center">
        <div class="w-full flex items-center flex-col max-w-md ">




            <form
                class="bg-white md:h-[550px] md:w-[450px] w=[200px]  min-[350px]:w-[350px] flex flex-col justify-between  drop-shadow-card rounded-3xl px-8 pt-6 pb-8 md:pt-12 md:pb-12 mb-4"
                action="{{ url('/login') }}" method="POST">
                @csrf
                @method('POST')

                <div class="logo flex items-center flex-col ">
                    <img class="max-w-20 mb-3   " src="https://res.cloudinary.com/dtzlizlrs/image/upload/v1717481970/ioxdtp815fvw1w3smkcc.png" alt="">
                    <p href="#" class="text-dodger-blue-950 font-body font-bold text-2xl "> <span
                            class="text-dodger-blue-700">RW</span>GRAM</p>
                </div>


                <div class="input mt-10">
                    <div class="mb-6">
                        <h1 class="mb-1 text-neutral-10">Username</h1>
                        <div class="">
                            <input
                                class="appearance-none outline-none border-neutral-04 rounded-lg py-3 px-4 w-full  text-neutral-10 focus:outline-none focus:shadow-outline @error('username') is-invalid @enderror"
                                id="username" name="username" type="text" placeholder="Masukkan Username">
                        </div>
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="mb-6">
                        <h1 class="mb-1 text-neutral-10">Password</h1>
                        <div class="flex flex-row relative">
                            <input
                                class="w-full focus:outline-none border-neutral-04 rounded-lg py-3 px-4 pr-12 items-center focus:shadow-outline @error('password') is-invalid @enderror"
                                id="password" type="password" name="password" placeholder="Masukkan Password">

                            <button type="button" id="icon_reveal"> <img src="{{ asset('asset/icon/Eye.svg') }} "id="eye"
                                    class="absolute inset-y-3 right-0 flex items-center pr-3"></button>

                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="text-neutral-01 bg-neutral-05 w-full text-center px-8 py-3 text-base font-medium rounded-full"
                        id="button_login">Masuk</button>
                    {{-- <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
              Forgot Password?
            </a> --}}
                </div>
            </form>

        </div>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>
