const questions = document.querySelectorAll(".faq__row--question");

questions.forEach((question) => {
    question.addEventListener("click", (event) => {
        const row = event.currentTarget.parentNode;
        const answer = row.querySelector(".faq__row--answer");

        answer.classList.toggle("faq__answer--open");
    });
});

//pricing

document.addEventListener("DOMContentLoaded", function () {
    let toggle = document.querySelector("#togglePeriod");
    let prices = document.querySelectorAll(".price");

    toggle.addEventListener("change", function () {
        if (toggle.checked) {
            prices.forEach((price) => {
                let monthlyPrice = parseFloat(
                    price.innerText.match(/[\d\.]+/)[0]
                );
                let annualPrice = Math.round(monthlyPrice * 0.6);

                price.innerHTML = "$" + annualPrice;
            });
        } else {
            prices.forEach((price) => {
                let annualPrice = parseFloat(
                    price.innerText.match(/[\d\.]+/)[0]
                );
                let monthlylPrice = Math.round(annualPrice / 0.6);

                price.innerHTML = "$" + monthlylPrice;
            });
        }
    });
});
