@extends('Admin.adminLayout')
@section('adminContent')
    <form action="{{ route('category.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mx-5 d-flex justify-content-center">
            <div class="col-lg-5">
                <fieldset class="form-group">
                    <label>Nom </label>
                    <input class="form-control" name="name" id="placeholderInput" placeholder="Veuillez entrez le nom">
                </fieldset>
            </div>
            
        </div>

        <button type="submit" class="SubmitAddMedicine btn-shine">
            <span>Submit</span>
        </button>
    </form>
@endsection
