const inputSearch = document.querySelector("#inputSearch")
const container = document.querySelector(".table-body")

inputSearch.addEventListener('keyup', function() {
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }
    xhr.open("GET", "searchRiwayatTransaksi.php?keyword=" + encodeURIComponent(inputSearch.value), true);
    xhr.send();
})