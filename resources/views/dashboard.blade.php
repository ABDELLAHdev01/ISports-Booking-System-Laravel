<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('create') }}" class="btn btn-primary" style="background-color: #85586F;border: none;">ADD NEW</a>
        </h2>
    </x-slot>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
