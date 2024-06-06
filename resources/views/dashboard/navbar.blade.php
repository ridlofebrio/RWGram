    @php($i= array ( 1 =>    'Senin',
    'Selasa',
    'Rabu',
    'Kamis',
    'Jumat',
    'Sabtu',
    'Minggu'
    ))
    @php($num = date('N', strtotime(now())))

<div class="h-[100px] bg-white w-full px-5">
    <div class="flex items-center h-full justify-between">
        <button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
         <div class=" ml-0 md:ml-72 flex-col hidden md:flex    font-main">
             <h1 class="text-neutral-07 text-base font-medium">{{$i[$num]}}, {{date('d F Y',strtotime(now()))}}</h1>
            <h1 class="font-bold text-xl text-neutral-10" >{{ucwords($active)}}</h1>
         </div>


        <div class="flex gap-5 justify-end items-center h-full">

            <div x-cloak x-data="{ open: false }">
                <button @click="open = ! open" class="notif relative bg-neutral-03 hover:bg-blue-main hover:text-white px-3 py-2 rounded-full">
                   <div style="display:none;" id="dotred" class="p-1 bg-red-500 rounded-full absolute top-2 right-2"></div>
                    <i class="fa-regular fa-bell"></i>
                </button>

                <div x-show="open" @click.outside="open = false" class="relative"  id="notif">

                </div>
            </div>


                <div class="user flex gap-3 items-center">
                    <div class="w-10 h-10 rounded-full">
                        <img src="{{Auth::user()->foto_profil == null ? 'https://res.cloudinary.com/dtzlizlrs/image/upload/v1716898016/mcdjouvceefyfpoujo87.png' :Auth::user()->foto_profil}}"  class="w-full h-full object-cover rounded-full" alt="">
                    </div>

                    <div class="info flex justify-center items-center gap-3">
                        <div class="hidden md:block detail">
                            <h1 class=" font-medium text-base text-neutral-10">{{Auth::user()->nama_user}}</h1>
                            <h2 class=" font-medium text-xs text-neutral-07">{{Auth::user()->role_id == 5 ? 'RW Admin' : 'RT Admin'}}</h2>
                        </div>
                        <a href="{{url('dashboard/detail-akun')}}" class="text-blue-main flex items-center hover:bg-blue-main hover:text-white text-2xl px-2 py-2 rounded-full" ><i class="fa-solid fa-gear"></i></a>

                </div>
            </div>
        </div>

    </div>

</div>

<script>

    $(document).ready(function () {
        $.ajax({
                        url: "{{url('data/notif')}}",

           success:function(data){
            $('#notif').html(data)
           },


                    })

                    $.ajax({
                        url: "{{url('data/notifcount')}}",

                        success:function(data){

                         if(data != 0){
                                $('#dotred').css('display','block');
                         }
                        },
                    })
    })

</script>
