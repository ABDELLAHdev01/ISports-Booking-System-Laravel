<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- <a href="{{ route('create') }}" class="btn btn-primary" style="background-color: #85586F;border: none;">ADD FOOD</a>
            <a href="{{ route('addadmin') }}" class="btn btn-primary" style="background-color: #807279;border: none;">ADD ADMIN</a>--}}
        </h2> 
    </x-slot>

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

    <div class="py-10 mb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="hnaanktb">
                        <form action="{{route('adddaysandfood')}}" method="post">
                        <div>
                            @csrf
                            @method('PUT')
                            <select name="daysinp" id="">
                                @foreach ($days as $item)
                                    
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>

                                @foreach ($foods as $item)
                                    <div class="mb-4 mt-1">
                                        <input type="checkbox" name="love[]" value="{{$item->name}}" id="love"><label class="ml-2 pt-2">{{$item->name}}</label>

                                    </div>
                                @endforeach
                            <button class="btn btn-primary btn-sm">SUBMITE</button>


                        </div>

                    </form>
                    
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
