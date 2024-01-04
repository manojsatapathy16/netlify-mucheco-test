
    
    //===== Sticky

    window.addEventListener("scroll", (event) => {
        var scroll = window.scrollY;
        // console.log(scroll);
        if (scroll < 10) {
            document.querySelector(".header-navigation").classList.remove("sticky");
        } else {
            document.querySelector(".header-navigation").classList.add("sticky");
        }
    });
    // service readmore button start

   




