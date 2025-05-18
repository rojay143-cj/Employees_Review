$(document).ready(function () {
    const $buttons = $('.menu-btn');

    $buttons.on('click', function () {
        $buttons.removeClass('bg-blue-500 text-white').addClass('hover:text-blue-300');
        $(this).addClass('bg-blue-500 text-white').removeClass('hover:text-blue-300');
    });

    // Optional: Set default selected (e.g., "dashboard")
    const $defaultBtn = $('.menu-btn[data-id="dashboard"]');
    $defaultBtn.addClass('bg-blue-500 text-white').removeClass('hover:text-blue-300');
});

$(document).ready(function () {
    $('.openEmployee').on('click', function () {
        $('.add_employeeModal').fadeIn();
        $('.add_employeeForm')
            .removeClass('hidden translate-y-[-100%]')
            .addClass('translate-y-[0]')
            .fadeIn();
    });

    $('.closeAddEmployee').on('click', function () {
        $('.add_employeeForm')
            .removeClass('translate-y-[0]')
            .addClass('translate-y-[-100%]')
            .fadeOut(function () {
                $(this).addClass('hidden');
            });

        $('.add_employeeModal').fadeOut();
    });
});

$(document).ready(function () {
    $(".search_employee_input").on("keyup", function () {
        var searchValue = $(this).val().toLowerCase();

        $(".employees_card > div").each(function () {
            var cardText = $(this).text().toLowerCase();
            if (cardText.includes(searchValue)) {
                $(this).stop(true, true).fadeIn(200).css("transform", "translateX(0)");
            } else {
                $(this).stop(true, true).fadeOut(200).css("transform", "translateX(-100%)");
            }
        });
    });
});

$(document).ready(function () {
    // Function for EMPLOYEE/REVIEWS handling
    function toggleEmployeeSection(section) {
        $(".EMPLOYEE_DIV, .REVIEWS_DIV, .EMPLOYEE_REVIEWS_DIV").hide();
        localStorage.setItem("EMPLOYEE_DIV", "false");
        localStorage.setItem("REVIEWS_DIV", "false");
        localStorage.setItem("EMPLOYEE_REVIEWS_DIV", "false");

        if (section) {
            $(section).toggle();
            localStorage.setItem(
                section.replace(".", "").toUpperCase(),
                $(section).is(":visible")
            );
        }
    }

    $(".EMPLOYEE_DIV").toggle(localStorage.getItem("EMPLOYEE_DIV") === "true");
    $(".REVIEWS_DIV").toggle(localStorage.getItem("REVIEWS_DIV") === "true");
    $(".EMPLOYEE_REVIEWS_DIV").toggle(localStorage.getItem("EMPLOYEE_REVIEWS_DIV") === "true");

    // Button handlers for EMPLOYEE/REVIEWS
    $(".EMPLOYEE").on("click", function () {
        toggleEmployeeSection(".EMPLOYEE_DIV");
    });

    $(".REVIEWS").on("click", function () {
        toggleEmployeeSection(".REVIEWS_DIV");
    });

    $(".EMPLOYEE_REVIEWS").on("click", function () {
        toggleEmployeeSection(".EMPLOYEE_REVIEWS_DIV");
    });

    
});
