@extends('Admin.adminLayout')
@section('adminContent')
    <form action="{{ route('medicine.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mx-5 d-flex justify-content-center">
            <div class="col-lg-3">
                <fieldset class="form-group">
                    <label>Nom</label>
                    <input class="form-control" name="name" id="placeholderInput" placeholder="Veuillez entrez le nom" >
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </fieldset>
            </div>
            <div class="col-lg-4">
                <fieldset class="form-group">
                    <label>Prix</label>
                    <input class="form-control" id="placeholderInput" type="number" name="price" placeholder="Veuillez entrez le prix" >
                    @error('price')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </fieldset>
            </div>
            <div class="col-lg-4">
                <fieldset class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category" id="">
                        <option disabled>Trouvez une category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </fieldset>
            </div>
            <div class="col-lg-4">
                <fieldset class="form-group">
                    <label>Image</label>
                    <input class="form-control" type="file" name="image" placeholder="Veuillez entrer l'image" accept="image/*">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </fieldset>
            </div>
            <div class="col-lg-4">
                <fieldset class="form-group">
                    <label>Duree d'expiration</label>
                    <select class="form-control" name="expiration" id="duree-expiration">
                        <option disabled selected>Trouvez une durée</option>
                        <option value="Moins de 15 jrs">Moins de 15 jrs</option>
                        <option value="Moins de 1 MOIS">Moins de 1 MOIS</option>
                        <option value="Moins de 3 MOIS">Moins de 3 MOIS</option>
                        <option value="Moins de 6 MOIS">Moins de 6 MOIS</option>
                        <option value="Moins de 9 MOIS">Moins de 9 MOIS</option>
                        <option value="Moins de 1 ANS">Moins de 1 ANS</option>
                        <option value="Moins de 1 ANS et 6 MOIS">Moins de 1 ANS et 6 MOIS</option>
                        <option value="Moins de 2 ANS">Moins de 2 ANS</option>
                        <option value="Moins de 3 ANS">Moins de 3 ANS</option>
                        <option value="Moins de 4 ANS">Moins de 4 ANS</option>
                    </select>
                    @error('expiration')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </fieldset>
            </div>

            <div class="col-lg-5">
                <fieldset class="form-group">
                    <label>Veuillez entrez la description</label>
                    <textarea class="form-control" name="description" placeholder="Description" id="basicTextarea" rows="3"></textarea>
                    @error('description')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </fieldset>
            </div>
        </div>

        <button type="submit" class="SubmitAddMedicine btn-shine">
            <span>Submit</span>
        </button>
    </form>

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
