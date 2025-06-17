const searchKeyword = document.getElementById("keywordMenu")
const containerMenu = document.getElementById("container-menu")

searchKeyword.addEventListener("keyup", function() {

    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            containerMenu.innerHTML = xhr.responseText; 
        }
    }
    xhr.open("GET", "getmenu.php?keyword=" + encodeURIComponent(searchKeyword.value), true);
    xhr.send()
})