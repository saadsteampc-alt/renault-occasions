@csrf

<div class="row mb-3">
    <div class="col-md-6">
        <label for="nom" class="form-label">Nom de l'entreprise <span class="text-danger">*</span></label>
        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" 
               value="{{ old('nom', $entreprise->nom ?? '') }}" required>
        @error('nom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="col-md-6">
        <label for="siret" class="form-label">SIRET</label>
        <input type="text" class="form-control @error('siret') is-invalid @enderror" id="siret" name="siret" 
               value="{{ old('siret', $entreprise->siret ?? '') }}" maxlength="14">
        @error('siret')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="adresse_physique" class="form-label">Adresse <span class="text-danger">*</span></label>
        <textarea class="form-control @error('adresse_physique') is-invalid @enderror" id="adresse_physique" 
                  name="adresse_physique" rows="2" required>{{ old('adresse_physique', $entreprise->adresse_physique ?? '') }}</textarea>
        @error('adresse_physique')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="col-md-6">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" 
                  name="description" rows="2">{{ old('description', $entreprise->description ?? '') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label for="code_postal" class="form-label">Code postal</label>
        <input type="text" class="form-control @error('code_postal') is-invalid @enderror" id="code_postal" 
               name="code_postal" value="{{ old('code_postal', $entreprise->code_postal ?? '') }}" maxlength="10">
        @error('code_postal')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="col-md-4">
        <label for="ville" class="form-label">Ville</label>
        <input type="text" class="form-control @error('ville') is-invalid @enderror" id="ville" 
               name="ville" value="{{ old('ville', $entreprise->ville ?? '') }}">
        @error('ville')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="col-md-4">
        <label for="pays" class="form-label">Pays</label>
        <select class="form-select @error('pays') is-invalid @enderror" id="pays" name="pays">
            <option value="France" {{ (old('pays', $entreprise->pays ?? '') == 'France') ? 'selected' : '' }}>France</option>
            <option value="Belgique" {{ (old('pays', $entreprise->pays ?? '') == 'Belgique') ? 'selected' : '' }}>Belgique</option>
            <option value="Suisse" {{ (old('pays', $entreprise->pays ?? '') == 'Suisse') ? 'selected' : '' }}>Suisse</option>
            <option value="Luxembourg" {{ (old('pays', $entreprise->pays ?? '') == 'Luxembourg') ? 'selected' : '' }}>Luxembourg</option>
            <option value="Autre" {{ (old('pays', $entreprise->pays ?? '') == 'Autre') ? 'selected' : '' }}>Autre</option>
        </select>
        @error('pays')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-4">
        <label for="telephone" class="form-label">Téléphone</label>
        <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone" 
               name="telephone" value="{{ old('telephone', $entreprise->telephone ?? '') }}">
        @error('telephone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="col-md-4">
        <label for="adresse_email" class="form-label">Email</label>
        <input type="email" class="form-control @error('adresse_email') is-invalid @enderror" id="adresse_email" 
               name="adresse_email" value="{{ old('adresse_email', $entreprise->adresse_email ?? '') }}">
        @error('adresse_email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="col-md-4">
        <label for="site_web" class="form-label">Site web</label>
        <div class="input-group">
            <span class="input-group-text">https://</span>
            <input type="text" class="form-control @error('site_web') is-invalid @enderror" id="site_web" 
                   name="site_web" value="{{ old('site_web', $entreprise->site_web ?? '') }}">
            @error('site_web')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <label for="logo" class="form-label">Logo</label>
        <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo">
        @error('logo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        
        @if(isset($entreprise) && $entreprise->logo)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $entreprise->logo) }}" alt="Logo {{ $entreprise->nom }}" class="img-thumbnail" style="max-width: 200px;">
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" id="supprimer_logo" name="supprimer_logo">
                    <label class="form-check-label" for="supprimer_logo">
                        Supprimer le logo actuel
                    </label>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{ route('admin.entreprises.index') }}" class="btn btn-secondary me-md-2">Annuler</a>
    <button type="submit" class="btn btn-primary">
        {{ isset($entreprise) ? 'Mettre à jour' : 'Créer' }} l'entreprise
    </button>
</div>
