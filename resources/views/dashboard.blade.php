<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('create') }}" class="btn btn-primary" style="background-color: #85586F;border: none;">ADD FOOD</a>
            <a href="{{ route('addadmin') }}" class="btn btn-primary" style="background-color: #c84185;border: none;">ADD ADMIN</a>
            <a href="{{ route('days') }}" class="btn btn-primary" style="background-color: #807279;border: none;">Du Jour Menu</a>
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
                        <table class="table">
                            <thead >
                              <tr>
                                <th scope="col">picture</th>
                                <th scope="col">name</th>
                                <th scope="col">type</th>
                                <th scope="col">price</th>
                                <th scope="col">actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($data as $item)
                              <tr>
                                <th scope="row"><img src="/images/{{ $item->image }}" width="100px"> </th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->type}}</td>
                                <td>{{$item->price}}</td>
                                <td>
                                    <div>
                                        
                                        <a href="{{route('show',$item->id)}}" class="btn btn-primary btn-sm" style="background-color: #85586F ; border: none;">View</a>
                                        <a href="{{route('edit',$item->id)}}" class="btn btn-warning btn-sm text-white" style="background-color: #856174a7 ; border: none;">Edit</a>
                                        <a href="{{route('destroy' , $item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
                                </td>
                              </tr>
                              @endforeach
                             
                            </tbody>
                          </table>
                          {{  $data->links()  }}
                    </div>
                   
                    <hr class="mb-4 mt-5 bg-danger border border-mute border-3 opacity-75">
                   <center>
                    <div class="days w-75">
                        <table class="table">
                            <thead >
                              <tr>
                                <th scope="col">Days</th>
                                <th scope="col">Foods</th>
                              
                              </tr>
                            </thead>
                            <tbody>
                             @foreach ($days as $item)
                             <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->foods}}</td>

                             </tr>
                             @endforeach

                            </tbody>
                          </table>
                    </div>
                </center>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
