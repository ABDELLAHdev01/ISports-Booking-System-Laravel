<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1>👋 Welcome <span style="color: #85586F;"> {{ Auth::user()->name }}</span> to Mahlabaty</h1>
        </h2>
    </x-slot>

    <div class="mb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden  sm:rounded-lg" style="background-color: #D0B8A8;">
                <div class="p-6 text-gray-900">
                    <div class="hnaanktb row">
                    <center>
                        <h1 class="mb-4">{{$data->name}}</h1>
                         <img src="/images/{{$data->image}}" alt="" width="500" class="rounded class="mb-4""> 
                         <h4class="mb-4">{{$data->type}}</h4class=>
                        <p>{{$data->description}}</p>
                        </center>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
