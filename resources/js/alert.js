import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', function () {
    const flashMessage = document.getElementById('flash-message');

    if (flashMessage) {
        const type = flashMessage.dataset.type;
        const message = flashMessage.dataset.message;

        Swal.fire({
            icon: type,
            title: message,
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    }
});
