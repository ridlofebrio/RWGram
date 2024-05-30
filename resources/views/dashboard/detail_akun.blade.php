@extends('dashboard.template')

@section('content')
    <div class="text-sm relative min-h-screen  px-5 py-8 font-medium  rounded-xl w-full bg-white  text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
       <h1 class="text-2xl font-bold mb-5 text-black">Setting Akun</h1>
        <div class=" space-x-5 flex items-center  mb-5">
            <img  class="w-52" src="{{Auth::user()->foto_profil}}" alt="">
          
           <div>
            <form  action="{{ route('umkm.penduduk.store') }}" method="POST" enctype="multipart/form-data">
            <input type="file" name="" id="">

           </form>
           <button  class="text-neutral-01 bg-blue-main hover:bg-dodger-blue-800   px-8 py-2 text-base font-medium rounded-full">Change</button>
            <button  class="hover:border-none   px-8 py-2  before:absolute text-blue-main bg-dodger-blue-50 hover:bg-dodger-blue-100  text-base font-medium rounded-full  " >Remove</button>
           </div>
        </div>
     
        <hr class="drop-shadow-button mb-5">
        <form class="p-4 md:p-5">
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2 sm:col-span-1">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$user->username}}"  required="">
                </div>     
                <div class=" col-span-2 sm:col-span-1">
                    <br>
                    <br>
                    <button><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 2H9C4 2 2 4 2 9v6c0 5 2 7 7 7h6c5 0 7-2 7-7v-2"/>
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M16.04 3.02 8.16 10.9c-.3.3-.6.89-.66 1.32l-.43 3.01c-.16 1.09.61 1.85 1.7 1.7l3.01-.43c.42-.06 1.01-.36 1.32-.66l7.88-7.88c1.36-1.36 2-2.94 0-4.94-2-2-3.58-1.36-4.94 0Z"/>
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M14.91 4.15a7.144 7.144 0 0 0 4.94 4.94"/>
                      </svg></button>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama user</label>
                    <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$user->nama_user}}"  required="">
                </div>  
                <div class=" col-span-2 sm:col-span-1">
                    <br>
                    <br>
                    <button><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 2H9C4 2 2 4 2 9v6c0 5 2 7 7 7h6c5 0 7-2 7-7v-2"/>
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M16.04 3.02 8.16 10.9c-.3.3-.6.89-.66 1.32l-.43 3.01c-.16 1.09.61 1.85 1.7 1.7l3.01-.43c.42-.06 1.01-.36 1.32-.66l7.88-7.88c1.36-1.36 2-2.94 0-4.94-2-2-3.58-1.36-4.94 0Z"/>
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M14.91 4.15a7.144 7.144 0 0 0 4.94 4.94"/>
                      </svg></button>
                </div>
                <div class=" col-span-2 sm:col-span-1">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 2H9C4 2 2 4 2 9v6c0 5 2 7 7 7h6c5 0 7-2 7-7v-2"/>
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M16.04 3.02 8.16 10.9c-.3.3-.6.89-.66 1.32l-.43 3.01c-.16 1.09.61 1.85 1.7 1.7l3.01-.43c.42-.06 1.01-.36 1.32-.66l7.88-7.88c1.36-1.36 2-2.94 0-4.94-2-2-3.58-1.36-4.94 0Z"/>
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M14.91 4.15a7.144 7.144 0 0 0 4.94 4.94"/>
                      </svg></label>
                    <input readonly type="password" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="**********"  required="">
            
                </div>  
                <div class=" col-span-2 sm:col-span-1">
                    <br>
                    <br>
                    <button><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 2H9C4 2 2 4 2 9v6c0 5 2 7 7 7h6c5 0 7-2 7-7v-2"/>
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M16.04 3.02 8.16 10.9c-.3.3-.6.89-.66 1.32l-.43 3.01c-.16 1.09.61 1.85 1.7 1.7l3.01-.43c.42-.06 1.01-.36 1.32-.66l7.88-7.88c1.36-1.36 2-2.94 0-4.94-2-2-3.58-1.36-4.94 0Z"/>
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M14.91 4.15a7.144 7.144 0 0 0 4.94 4.94"/>
                      </svg></button>
                </div>
                <div class=" col-span-2 sm:col-span-1">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                    <input readonly type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" value="{{$user->role->nama_role}}"  required="">
                </div>
                <div class="fle col-span-2 sm:col-span-1">
                    <br>
                    <br>
                    <button><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 2H9C4 2 2 4 2 9v6c0 5 2 7 7 7h6c5 0 7-2 7-7v-2"/>
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M16.04 3.02 8.16 10.9c-.3.3-.6.89-.66 1.32l-.43 3.01c-.16 1.09.61 1.85 1.7 1.7l3.01-.43c.42-.06 1.01-.36 1.32-.66l7.88-7.88c1.36-1.36 2-2.94 0-4.94-2-2-3.58-1.36-4.94 0Z"/>
                        <path stroke="#1B1B1B" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" d="M14.91 4.15a7.144 7.144 0 0 0 4.94 4.94"/>
                      </svg></button>
                </div>
            </div>
            </form>
            
    </div>
@endsection