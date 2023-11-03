<a href="{{ route('details.edit', $obj->id) }}" class="btn btn-success btn-sm">
    <i class="bi-pencil"></i> Edit
</a>
<button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">
    <i class="bi-trash"></i> Delete
</button>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $obj->name }}
            </div>
            <div class="modal-footer">
                <form action="{{ route('details.destroy', $obj->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>