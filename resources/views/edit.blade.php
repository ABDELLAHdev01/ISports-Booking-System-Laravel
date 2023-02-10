<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" class="btn btn-danger" style="background-color: #85586F ; border: none;">Cancel</a>
        </h2>
    </x-slot>

    <div class="py-8 mb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="hnaanktb">
                        <form action="{{ route('update', $data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                           
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label" value="">Name</label>
                              <input value="{{$data->name}}"  name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                           
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Type</label>
                              <input value="{{$data->type}}" name="type" type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Price</label>
                                <input name="price" value="{{$data->price}}" type="number" class="form-control" id="exampleInputPassword1">
                              </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Description</label>

                                <textarea name="description"  id="" cols="128" rows="10">{{$data->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                
                                <label for="exampleInputPassword1" class="form-label">Picture</label>
                                <input name="image"  type="file" class="form-control" id="exampleInputPassword1">
                              </div>
                            <button class="btn btn-primary" style="background-color: #85586F ; border: none;">Submit</button>
                          </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
