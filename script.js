
// TOGGLE MENU
$(document).ready(function() {

// function menu() {
    $('#menu-icon-shape').on('click', function () {
        $('#menu-icon-shape').toggleClass('active');
        $('#top, #middle, #bottom').toggleClass('active');
        $('#overlay-nav').toggleClass('active');
    });
// }

// TOGGLE ABOUT


    $(".about-button").click(function () {

        $(this).next(".about-toggle-content").stop().toggle(300);

    });

    $(".full-screen-toggle").click(function () {
        console.log("help");
        $(".content-container").toggle(300);

    });
//
//     const trigger = document.querySelector('.primary');
//     const container = document.querySelector('#button-group');
//
//     trigger.addEventListener('click', () => {
//         container.classList.toggle('active');
// });


});

