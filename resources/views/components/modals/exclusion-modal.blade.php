<div class="modal fade" id="deletionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">{{ __('Are you sure?') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('This action is irreversible, be careful...') }}</p>
            </div>
            <div class="modal-footer">
                <form id="exclusionModalForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('exclusion.modal.script')
    <script>
        var exclusionForm = document.getElementById('exclusionModalForm');
        function openExclusionModal(formAction) {
            if (exclusionForm && formAction) {
                exclusionForm.setAttribute('action', formAction);
            }
        }
    </script>
@endsection
