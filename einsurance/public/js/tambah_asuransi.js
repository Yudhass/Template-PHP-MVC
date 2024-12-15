document.addEventListener('DOMContentLoaded', function () {
    // Call Center
    const callCenterContainer = document.getElementById('call-center-container');
    const addCallCenterButton = document.getElementById('add-call-center');

    callCenterContainer.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-call-center')) {
            event.target.closest('.input-group').remove();
        }
    });

    addCallCenterButton.addEventListener('click', function () {
        const wrapper = document.createElement('div');
        wrapper.classList.add('input-group', 'mb-2');

        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'call_center[]';
        input.classList.add('form-control');
        input.placeholder = 'Masukkan nomor Call Center';

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('btn', 'btn-danger', 'remove-call-center');
        removeButton.innerText = 'Hapus';

        wrapper.appendChild(input);
        wrapper.appendChild(removeButton);

        callCenterContainer.appendChild(wrapper);
    });

    // Produk
    const produkContainer = document.getElementById('produk-container');
    const addProdukButton = document.getElementById('add-produk');

    produkContainer.addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-produk')) {
            event.target.closest('.input-group').remove();
        }
    });

    addProdukButton.addEventListener('click', function () {
        const wrapper = document.createElement('div');
        wrapper.classList.add('input-group', 'mb-2');

        const input = document.createElement('input');
        input.type = 'text';
        input.name = 'produk[]';
        input.classList.add('form-control');
        input.placeholder = 'Masukkan produk';

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('btn', 'btn-danger', 'remove-produk');
        removeButton.innerText = 'Hapus';

        wrapper.appendChild(input);
        wrapper.appendChild(removeButton);

        produkContainer.appendChild(wrapper);
    });
});
