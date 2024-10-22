<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" @click="showModal">
            Launch static backdrop modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                modalInstance: null,
            };
        },
        methods: {
            // Show the modal
            showModal() {
                if (this.modalInstance) {
                    this.modalInstance.show();
                }
            },
            // Hide the modal
            hideModal() {
                if (this.modalInstance) {
                    this.modalInstance.hide();
                }
            },
        },
        mounted() {
            // Initialize the Bootstrap modal after the DOM has loaded
            this.modalInstance = new bootstrap.Modal(document.getElementById("staticBackdrop"), {
                keyboard: false,
            });
        },
    };
</script>
