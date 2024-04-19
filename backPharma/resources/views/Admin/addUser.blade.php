@extends('Admin.adminLayout')
@section('adminContent')
    <form action="{{ route('user.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mx-5 d-flex justify-content-center">
            <div class="col-lg-5">
                <fieldset class="form-group">
                    <label>Nom d'utilisateur</label>
                    <input class="form-control" name="name" id="placeholderInput" placeholder="Veuillez entrez le nom">
                </fieldset>
            </div>
            <div class="col-lg-5">
                <fieldset class="form-group">
                    <label>Email</label>
                    <input class="form-control" id="placeholderInput" name="email"
                        placeholder="Veuillez entrez l'email" type="email">
                </fieldset>
            </div>
            <div class="col-lg-5">
                <fieldset class="form-group">
                    <label>Password</label>
                    <input class="form-control" id="placeholderInput" type="password" name="password"
                        placeholder="Veuillez entrez le mot de passe ">
                </fieldset>
            </div>
            <div class="col-lg-5">
                <fieldset class="form-group">
                    <label>Photo</label>
                    <input class="form-control" type="file" name="photo" placeholder="Veuillez entrer la photo de profil"
                        accept="image/*">
                </fieldset>
            </div>

        </div>

        <button type="submit" class="SubmitAddMedicine btn-shine">
            <span>Submit</span>
        </button>
    </form>
@endsection
