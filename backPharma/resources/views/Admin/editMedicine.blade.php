@extends('Admin.adminLayout')
@section('adminContent')


    <form action="{{ route('medicine.edit', ['id' => $medicine->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row mx-5 d-flex justify-content-center">
            <div class="col-lg-3">
                <fieldset class="form-group">
                    <label>Nom</label>
                    <input class="form-control" name="name" id="placeholderInput" placeholder="Veuillez entrez le nom" value="{{ old('name', $medicine->name) }}" >
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </fieldset>
            </div>
            <div class="col-lg-4">
                <fieldset class="form-group">
                    <label>Prix</label>
                    <input class="form-control" id="placeholderInput" type="number" name="price" placeholder="Veuillez entrez le prix" value="{{ old('price', $medicine->price) }}" >
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </fieldset>
            </div>
            <div class="col-lg-4">
                <fieldset class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category" id="">
                        <option disabled>Trouvez une category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category', $medicine->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </fieldset>
            </div>
            <div class="col-lg-4">
                <fieldset class="form-group">
                    <label>Image</label>
                    <input class="form-control" type="file" name="image" placeholder="Veuillez entrer l'image" accept="image/*">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
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
                        <span class="text-danger">{{ $message }}</span>
                    @enderror                           
                </fieldset>
            </div>

            <div class="col-lg-5">
                <fieldset class="form-group">
                    <label>Veuillez entrez la description</label>
                    <textarea class="form-control" name="description" placeholder="Description" id="basicTextarea" rows="3">{{ old('description', $medicine->description) }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </fieldset>
            </div>
        </div>

        <button type="submit" class="SubmitAddMedicine btn-shine">
            <span>Submit</span>
        </button>
    </form>
@endsection
