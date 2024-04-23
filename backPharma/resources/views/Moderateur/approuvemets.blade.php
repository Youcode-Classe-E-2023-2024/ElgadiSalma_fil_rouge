@extends('Moderateur.moderateurLayout')
@section('moderateurContent')

@forelse ($commandes as $commande)
    <div class="row bg-white rounded-xl shadow-lg mb-3">
        <div class="col-md-6 d-flex justify-content-center">
            <div class="w-100 h-100 bg-white d-flex flex-column shadow-lg rounded-xl p-4 justify-content-center align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-14 h-14 text-primary">
                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                </svg>
                <h1 class="text-lg font-bold text-gray-700 pt-2">salma</h1>
            </div>
        </div>

        <form action="" class="col-md-6 d-flex align-items-center" method="POST">
            @csrf
            <div class="bg-white shadow-lg rounded-md p-4 hover-bg-red-50 w-100">
                <input class="font-weight-bold h4 form-control mb-4" placeholder="{{$commande['title']}}" value="{{$commande['title']}}" name="title"/>
                <input placeholder="{{$commande['description']}}" value="{{$commande['description']}}" name="description" class="form-control"/>   
            </div>

            {{-- edit --}}
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="w-100 h-100 bg-white d-flex flex-column shadow-lg rounded-xl p-4 justify-content-center align-items-center">
                        <button class="btn btn-success btn-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                    </div>
                </div>

        </form>
    
        {{-- delete --}}
            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="w-100 h-100 bg-white d-flex flex-column shadow-lg rounded-xl p-4 justify-content-center align-items-center">
                        <button class="btn btn-danger btn-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        
    </div>
    @empty
        <p>No commandes Found</p>
    @endforelse


@endsection