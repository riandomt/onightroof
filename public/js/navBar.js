$(document).ready(function () {
    $(".submenu").hide();
    $("#menu-text").hide();

    // Au clic sur le bouton menu
    $("#menu-btn").click(function () {
        $(".navbar").toggle();
    });

    // Au clic sur le sous-menu
    $("#submenu-link").click(function () {
        $(".submenu").toggle();
    });

    // Gérer le redimensionnement de l'écran pour réinitialiser le menu
    $(window).resize(function () {
        if ($(window).width() > 720) {
            $(".navbar").show(); // Afficher la navbar en mode bureau
            $("#menu-text").hide();
        } else {
            $(".navbar").hide(); // Cacher la navbar en mode mobile
            $("#menu-text").show();
        }
    }).resize(); // Trigger le redimensionnement au chargement de la page
});