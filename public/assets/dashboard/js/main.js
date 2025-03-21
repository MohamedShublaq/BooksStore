//For reset button in filter forms in index pages
function resetFilters() {
    window.location.href = window.location.pathname;
}

//Sweet alert for delete one row
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault();
        const publisherId = this.getAttribute('data-id');
        const deleteForm = document.getElementById(`delete-form-${publisherId}`);

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: translations.actions.are_you_sure,
            text: translations.actions.revert_warning,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: translations.actions.yes_delete_it,
            cancelButtonText: translations.actions.no_cancel,
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                deleteForm.submit();
            }
        });
    });
});

//Delete selected rows
const selectAll =document.getElementById('select-all');
if(selectAll){
    const rowCheckboxes = document.querySelectorAll('.row-checkbox');
    rowCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateButtonState);
    });
    handleSelectAllToDelete();
    handleDeleteSelected();
}
function handleSelectAllToDelete(){
    selectAll.addEventListener('change', function (event) {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        updateButtonState(event);
    });
}
function handleDeleteSelected(){
    const deleteSelected = document.getElementById('delete-selected');
    deleteSelected.addEventListener('click', function (event) {
        const selectedIds = Array.from(document.querySelectorAll('.row-checkbox:checked'))
            .map(checkbox => checkbox.value);

        if (selectedIds.length === 0) {
            Swal.fire(translations.actions.no_items_selected, translations.actions.select_at_least_one, 'warning');
            return;
        }

        Swal.fire({
            title: translations.actions.are_you_sure,
            text: translations.actions.revert_selected_warning,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: translations.actions.yes_delete_them,
            cancelButtonText: translations.actions.no_cancel,
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('/admin/dashboard/bulkDelete', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ ids: selectedIds, model: event.target.dataset.model })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire(translations.actions.deleted, data.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire(translations.actions.error, data.message, 'error');
                    }
                })
                .catch(error => {
                    Swal.fire(translations.actions.error, translations.actions.something_wrong, 'error');
                });
            }
        });
    });
}
function updateButtonState(event) {
    const deleteButton = document.getElementById('delete-selected');
    deleteButton.disabled = !event.target.checked;
}
