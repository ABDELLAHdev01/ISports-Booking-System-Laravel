<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{route('dashboard')}}" class="btn btn-primary" style="background-color: #85586F ; border: none;">Return</a>
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="hnaanktb">
                        {{--  --}}
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                              <div class="col-md-4">
                                <img src="/images/{{$data->image}}" class="img-fluid rounded-start" alt="...">
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">{{$data->name}}</h5>
                                  <p class="card-text">{{$data->description}}.</p>
                                  <p class="card-text">{{$data->price}}.</p>
                                  <p class="card-text"><small class="text-muted">{{$data->type}}</small></p>
                                </div>
                              </div>
                            </div>
                          </div>
                    {{--  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
