<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" class="btn btn-danger" style="background-color: #85586F ; border: none;">Return</a>
        </h2>
    </x-slot>

    <div class="py-8 mb-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="hnaanktb">
                        <form action="{{ route('store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Name</label>
                              <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                           
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Type</label>
                              <input name="type" type="text" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Price</label>
                                <input name="price" type="number" class="form-control" id="exampleInputPassword1">
                              </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Description</label>

                                <textarea name="description" id="" cols="128" rows="10"></textarea>
                            </div>
                            <div class="mb-3">
                                
                                <label for="exampleInputPassword1" class="form-label">Picture</label>
                                <input name="image" type="file" class="form-control" id="exampleInputPassword1">
                              </div>
                            <button class="btn btn-primary" style="background-color: #6e485c ; border: none;">Submit</button>
                          </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
