{
    function tabFunc(headerParentID){

        let headerParentElement = document.querySelector('#'+headerParentID)
        let tabContentParent = document.querySelector('#'+headerParentID + '-content')

        let tabButton = document.querySelectorAll(`#${headerParentID} .tabButton`);
        let allTab = document.querySelectorAll(`#${headerParentID}-content .tab`);

        let prevTab

        if(allTab){
            prevTab = allTab[[...tabButton].indexOf(headerParentElement.querySelector(".tabButton.active"))]
        }

        prevTab?.classList.add('active')

        tabButton.forEach(function (el, ind) {
            el.addEventListener("click", function () {

                headerParentElement.querySelector(".tabButton.active")?.classList.remove('active')
                tabContentParent.querySelector(".tab.active")?.classList.remove('active')

                allTab[ind]?.classList.add("active");

                tabButton[ind]?.classList.add("active");
            });
        });
    }
}
