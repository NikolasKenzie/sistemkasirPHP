const inputSearch = document.getElementById("inputSearch");
const suggestionBox = document.getElementById("suggestionBox");

inputSearch.addEventListener("keyup", function () {
  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      suggestionBox.innerHTML = xhr.responseText;
      const keyword = inputSearch.value.trim();
      
      const items = suggestionBox.querySelectorAll(".suggestion-item");
      items.forEach(function (item) {
        item.addEventListener("click", function () {
          inputSearch.value = this.textContent.trim();
          suggestionBox.innerHTML = "";
        });
      });
    }
    suggestionBox.onmouseover = function() {
      suggestionBox.style.cursor = 'pointer'
    }
  };

  xhr.open("GET","kasirSearch.php?key=" + encodeURIComponent(inputSearch.value),true);  
  xhr.send();
});

