$(document).ready(function() {
    $('.popUp').hide();

    function openPopUp(){
        $('.popUp').show();
    }
    function closePopUp(){
        $('.popUp').hide();
    }

    window.openPopUp = openPopUp;
    window.closePopUp = closePopUp;
});


