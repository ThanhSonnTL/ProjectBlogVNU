//Sự kiện onScroll
let logo = document.querySelector(".logo >a");
let btnScrollTop = document.querySelector("#btnScrollTop");
let header = document.querySelector(".header");

window.onscroll = function () {
    if (
        document.body.scrollTop > 50 ||
        document.documentElement.scrollTop > 50
    ) {
        header.style.position = "fixed";
        logo.style.width = "125px";
        logo.style.height = "100px";
        btnScrollTop.style.display = "block";
    } else {
        header.style.position = "relative";
        logo.style.width = "161px";
        logo.style.height = "161px";
        btnScrollTop.style.display = "none";
    }
};

btnScrollTop.addEventListener("click", function () {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});
