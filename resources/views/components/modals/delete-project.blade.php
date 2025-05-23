@props(['project'])

<div class="modal fade" id="destroyModal-{{ $project->id }}" tabindex="-1" aria-labelledby="destroyModalLabel-{{ $project->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="destroyModalLabel-{{ $project->id }}">Elimina il Progetto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Vuoi davvero eliminare il progetto <strong>{{ $project->title }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Elimina">
                </form>
            </div>
        </div>
    </div>
</div>
