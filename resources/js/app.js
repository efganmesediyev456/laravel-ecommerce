require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener("livewire:load", function(event) {
    window.livewire.on('toggleFormModal', function(){
        $('#modal-default').modal('toggle');
});
});


