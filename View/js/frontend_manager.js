var menu_element=document.getElementsByClassName("menu_element");
var content= document.getElementsByClassName("content");
for ( let j=0; j<menu_element.length;j++) {
    menu_element[j].onclick = function () {
        for (let i = 0; i < content.length; i++){
            content[i].style.display = "none";
            menu_element[i].style.background= "transparent";
        }
        menu_element[j].style.background= "rgba(240,240,240,.2)";
        content[j].style.display = "block";
    };
};

