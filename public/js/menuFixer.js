"use strict";

function jsFix(menu) {
    for (const item in menu) {
        let parent_class = "." + item;
        let parent_container = document.querySelector(parent_class);
        let children_class = "." + item + "__item";
        let children_container = document.querySelectorAll(children_class);

        // let parent_container_children = document.querySelectorAll(parent_class+ " li");

        // parent_container_children.forEach(
        //     function(currentValue, currentIndex, listObj) {
        //         if (!listObj[currentIndex].classList.contains('.jsFixExtension')) {
        //                     listObj[currentIndex].parentNode.removeChild(listObj[currentIndex]);
        //         }
        //     }
        // )

        children_container.forEach(
            function(currentValue, currentIndex, listObj) {
                parent_container.appendChild(listObj[currentIndex]);
            }
        )

    }

}



function jsFix2 (menu) {

        for (const item in menu) {
        let parent_class = ".dropdown-" + item + "-parent";
        let parent_container = document.querySelector(parent_class);
        let children_class = ".dropdown-" + item + "__item";
        let children_container = document.querySelectorAll(children_class);

        // let parent_container_children = document.querySelectorAll(parent_class+ " li");

        // parent_container_children.forEach(
        //     function(currentValue, currentIndex, listObj) {
        //         if (!listObj[currentIndex].classList.contains('.jsFixExtension')) {
        //                     listObj[currentIndex].parentNode.removeChild(listObj[currentIndex]);
        //         }
        //     }
        // )

        children_container.forEach(
            function(currentValue, currentIndex, listObj) {
                parent_container.appendChild(listObj[currentIndex]);
            }
        )

    }
}
