@extends('Moderateur.moderateurLayout')
@section('moderateurContent')
<div class="content-header sty-one">
    <h1>Users</h1>
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard 4</li>
    </ol>
</div>


    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <form method="POST" action="{{ route('user.add') }}" enctype="multipart/form-data">
                    @csrf

                    <div id="usersContainer" class="">
                        <div class=" w-100 " style="border: 1px solid gray; padding:10px; ">
                            <div class="form-group">
                                <label for="name_0">Nom de l'utilisateur</label>
                                <input name="name" id="name_0" class="form-control" placeholder="Nom de l'utilisateur">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email_0">Email de l'utilisateur</label>
                                <input type="email" name="email" id="email_0" class="form-control" min="1" placeholder="Email de l'utilisateur">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_0">Mot de passe de l'utilisateur</label>
                                <input type="password" name="password" id="password_0" class="form-control" placeholder="Mot de passe de l'utilisateur">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="photo_0">Photo de profil de l'utilisateur</label>
                                <input type="file" name="photo" id="photo_0" class="form-control" accept="image/*" placeholder="Photo de profil de l'utilisateur">
                                @error('photo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div id="newContainer"></div>
                        <div class="form-group w-100 mt-2">
                            <button type="submit" class="btn btn-primary">Enregistrer l'utilisateur</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let error = "{{ session('error') }}";
        let success = "{{ session('success') }}";
    
        if (error) {
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: error
            });
        } else if (success) {
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: success
            });
        }
    </script>
@endsection
