$(document).ready(function() {
    $('.popUpBedroom').hide();

    function openPopUpBedroom(){
        $('.popUpBedroom').show();
    }
    function closePopUpBedroom(){
        $('.popUpBedroom').hide();
    }

    window.openPopUpBedroom = openPopUpBedroom;
    window.closePopUpBedroom = closePopUpBedroom;
});

document.querySelectorAll('.formLabelRadio input[type="radio"]').forEach((radio) => {
    radio.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            radio.checked = true; // sélectionne le bouton radio
        }
    });
});
