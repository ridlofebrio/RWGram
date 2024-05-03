@isset($flash)
    <div id="flash" class="fixed  z-50 top-24 transition-transform left-1/2 -translate-x-1/2" x-data="{data :'{{$flash[0]}}'}" >
        <div >
            <div class="w-[278px] drop-shadow-card bg-white text h-[48] text-center p-2 rounded-full ">
                @if($flash[0] == "error")
                <i class="fa-solid fa-circle-xmark text-red-500"></i>
                @else
                <i class="fa-solid text-green-500 fa-circle-check"></i>
                @endif
                {{$flash[1]}}
            </div>
        </div>
    </div>


    <script>
        setTimeout(() => {
            
            $('#flash').css('top','-100px')
        }, 3000);
    </script>
@endisset