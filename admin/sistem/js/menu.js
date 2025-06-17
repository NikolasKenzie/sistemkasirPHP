const searchKeyword = document.getElementById("searchMenu")
const containerTable = document.getElementById("container-table")

searchKeyword.addEventListener('keyup', function() {

    //object ajax
    const xhr = new XMLHttpRequest();

    //cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            containerTable.innerHTML = xhr.responseText;

            
        }
    }

    //eksekusi 
    //parameternya (method, sumber data, asyn(ture) atau syn(false))
    xhr.open('GET', 'searchMenu.php?keyword=' + encodeURIComponent(searchKeyword.value), true);
    xhr.send();
})