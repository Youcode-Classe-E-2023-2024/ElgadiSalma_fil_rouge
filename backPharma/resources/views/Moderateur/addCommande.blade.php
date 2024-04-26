@extends('Moderateur.moderateurLayout')
@section('moderateurContent')
<div class="content-header sty-one">
    <h1>Commande</h1>
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><i class="fa fa-angle-right"></i> Dashboard 4</li>
        
    </ol>
</div>

    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <form method="POST" action="{{ route('commande.add') }}">
                    @csrf

                    <div id="commandesContainer" class="  ">
                        <div class=" w-100 " style="border: 1px solid gray; padding:10px; ">
                            <div class="form-group">
                                <label for="medicament_id_0">Médicament</label>
                                <select name="commandes[0][medicament_id]" id="medicament_id_0" class="form-control">
                                    @foreach ($medicines as $medicine)
                                        <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                    @endforeach
                                </select>
                                @error('commandes.0.medicament_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="number_0">Nombre</label>
                                <input type="number" name="commandes[0][number]" id="number_0" class="form-control" min="1">
                                @error('commandes.0.number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="dateExpiration_0">Date d'expiration</label>
                                <input type="date" name="commandes[0][dateExpiration]" id="dateExpiration_0" class="form-control">
                                @error('commandes.0.dateExpiration')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="dateDepart_0">Date de départ</label>
                                <input type="date" name="commandes[0][dateDepart]" id="dateDepart_0" class="form-control">
                                @error('commandes.0.dateDepart')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="dateArrive_0">Date d'arrivée</label>
                                <input type="date" name="commandes[0][dateArrive]" id="dateArrive_0" class="form-control">
                                @error('commandes.0.dateArrive')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            
                        </div>

                        <div id="newContainer"></div>
                        <div class="form-group w-100 mt-2">
                            <button type="button" class="btn btn-primary" id="addCommande">Ajouter une commande</button>
                            <button type="submit" class="btn btn-primary">Enregistrer les commandes</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const medicines = @json($medicines);

        document.addEventListener('DOMContentLoaded', function() {
            let commandeIndex = 1;

            function generateMedicamentOptions() {
                let options = '';
                medicines.forEach(medicine => {
                    options += `<option value="${medicine.id}">${medicine.name}</option>`;
                });
                return options;
            }

            document.getElementById('addCommande').addEventListener('click', function() {
                const newContainer = document.getElementById('newContainer');
                const newCommande = `
                    <div class=" w-100r" style="border: 1px solid gray; padding:10px; margin-top: 1rem; ">
                        <div class="form-group">
                            <label for="medicament_id_${commandeIndex}">Médicament</label>
                            <select name="commandes[${commandeIndex}][medicament_id]" id="medicament_id_${commandeIndex}" class="form-control">
                                ${generateMedicamentOptions()}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="number_${commandeIndex}">Nombre</label>
                            <input type="number" name="commandes[${commandeIndex}][number]" id="number_${commandeIndex}" class="form-control" min="1">
                        </div>
                        <div class="form-group">
                            <label for="dateExpiration_${commandeIndex}">Date d'expiration</label>
                            <input type="date" name="commandes[${commandeIndex}][dateExpiration]" id="dateExpiration_${commandeIndex}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="dateDepart_${commandeIndex}">Date de départ</label>
                            <input type="date" name="commandes[${commandeIndex}][dateDepart]" id="dateDepart_${commandeIndex}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="dateArrive_${commandeIndex}">Date d'arrivée</label>
                            <input type="date" name="commandes[${commandeIndex}][dateArrive]" id="dateArrive_${commandeIndex}" class="form-control">
                        </div>
                    </div>
                `;
                newContainer.insertAdjacentHTML('beforeend', newCommande);
                commandeIndex++;
            });
        });
    </script>

    
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
