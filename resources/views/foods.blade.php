<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <h1>👋 Welcome <span style="color: #85586F;"> {{ Auth::user()->name }}</span> to Mahlabaty</h1>
        </h2>
    </x-slot>

    <div class="">
        <script>
            @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                  "positionClass": "toast-top-center",
    
    
                "progressBar" : true
            }
                    toastr.success("{{ session('message') }}");
            @endif
    
            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.error("{{ session('error') }}");
            @endif
    
            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.info("{{ session('info') }}");
            @endif
    
            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.warning("{{ session('warning') }}");
            @endif
          </script>  
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden  sm:rounded-lg" style="background-color: #D0B8A8;">
                <div class="p-6 text-gray-900">
                    <div class="hnaanktb row">
                        @foreach ($data as $item)
                        <div class="col-12 col-lg-3 col-md-4 col-sm-6 mb-4">
                            <a href="{{route('showw',$item->id)}}">
                            <div class="card" >
                                <img class="card-img-top" src="/images/{{$item->image }}" alt="Card image cap">
                                <div class="card-body">
                                  <p class="card-text">{{$item->name }}</p>
                                  <p class="card-text text-success text-sm">{{$item->price }}DH</p>
                                </div>
                              </div>
                            </a>
                        </div>
                        @endforeach

                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
