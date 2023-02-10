<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
			<a href="{{ route('dashboard') }}" class="btn btn-danger" style="background-color: #85586F ; border: none;">Return</a>
    
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
                       

						<div class="d-flex">
							<form action="{{route('storeAdmin')}}" method="post">
								<div class="mb-3">
									@csrf
									@method('PUT')
								<label for="gender">SELECT A USER</label>
								</div>
								<div class="mb-3">

								<select name="id">
									@foreach ($data as $item)
									<option value="{{$item->id}}">{{$item->name}}</option>
								
								@endforeach
									
								</select>
								</div>
								<div class="mb-3">

								<button class="btn btn-primary btn-sm">MAKE ADMIN</button>
								</div>
								</form>
						</div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
