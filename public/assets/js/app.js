// const filterCompany = document.getElementById("filter_company_id");

// const deleteContactElement = document.querySelectorAll(".btn-delete");

// const deleteModelElement = document.getElementById("deleteModal");
// if (filterCompany) {
//     filterCompany.addEventListener("change", function () {
//         let companyId = this.value || this.options[this.selectedIndex].value;
//         window.location.href =
//             window.location.href.split("?")[0] + "?company_id=" + companyId;
//     });
// }

// if (deleteContactElement) {
//     deleteContactElement.forEach((button) => {
//         button.addEventListener("click", function (e) {
//             e.preventDefault();

//             let action = this.getAttribute("href");
//             let form = document.getElementById("form-delete");
//             form.setAttribute("action", action);
//             $("#deleteModal").modal("show");
//         });
//     });
// }


// const btnClear = document.getElementById("btn-clear");

// if (btnClear) {
//     btnClear.addEventListener("click", () => {
//         let input = document.getElementById("search");
//         let select = document.getElementById("filter_company_id");

//        if(input) input.value = "";
//         if(select) select.selectedIndex = 0;

//         // Optionally, redirect to the page without search/filter parameters
//         window.location.href = window.location.href.split("?")[0];
//     });
// }


// const toggleClearButton = () => {
//     let query = location.search,
//         pattern = /[?%]search=/,
//         button = document.getElementById("btn-clear");

//     if (pattern.test(query)) {
//         button.style.display = "block";
//     } else {
//         button.style.display = "none";
//     }
// };

// toggleClearButton();

document.addEventListener("DOMContentLoaded", function () {
    const filterCompany = document.getElementById("filter_company_id");
    const deleteContactElements = document.querySelectorAll(".btn-delete");
    const deleteModelElement = document.getElementById("deleteModal");
    const btnClear = document.getElementById("btn-clear");

    if (filterCompany) {
        filterCompany.addEventListener("change", function () {
            let companyId = this.value || this.options[this.selectedIndex].value;
            window.location.href = `${window.location.href.split("?")[0]}?company_id=${companyId}`;
        });
    }

    if (deleteContactElements) {
        deleteContactElements.forEach((button) => {
            button.addEventListener("click", function (e) {
                e.preventDefault();

                let action = this.getAttribute("href");
                let form = document.getElementById("form-delete");
                form.setAttribute("action", action);
                $("#deleteModal").modal("show");
            });
        });
    }

    if (btnClear) {
        btnClear.addEventListener("click", () => {
            let input = document.getElementById("search");
            let select = document.getElementById("filter_company_id");

            if (input) input.value = "";
            if (select) select.selectedIndex = 0;

            // Optionally, redirect to the page without search/filter parameters
            window.location.href = window.location.href.split("?")[0];
        });
    }

    const toggleClearButton = () => {
        let query = location.search,
            pattern = /[?%]search=/,
            button = document.getElementById("btn-clear");

        if (pattern.test(query)) {
            button.style.display = "block";
        } else {
            button.style.display = "none";
        }
    };

    toggleClearButton();
});
