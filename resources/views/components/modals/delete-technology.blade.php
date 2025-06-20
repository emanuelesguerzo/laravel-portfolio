@props(['technology'])

<div class="modal fade" id="destroyModal-{{ $technology->id }}" tabindex="-1"
    aria-labelledby="destroyModalLabel-{{ $technology->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="destroyModalLabel-{{ $technology->id }}">Elimina il Tipo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vuoi davvero eliminare il tipo <strong>{{ $technology->name }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('technologies.destroy', $technology) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Elimina">
                </form>
            </div>
        </div>
    </div>
</div>