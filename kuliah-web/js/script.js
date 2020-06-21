const findData = document.querySelector(".findData");
const keyword = document.querySelector(".keyword");
const container = document.querySelector(".container");

// hide findData button
findData.style.display = 'none';

// add event listener on keyword text
keyword.addEventListener("keyup", function () {
  // use XmlHttpRequest
  // const xhr = new XMLHttpRequest();
  // xhr.onreadystatechange = function () {
  //     if (xhr.readyState == 4 && xhr.status == 200) {
  //         container.innerHTML = xhr.responseText;
  //     }
  // }
  // xhr.open("GET", "ajax/ajax_find.php?keyword=" + keyword.value, true);
  // xhr.send();

  // use fetch
  fetch("ajax/ajax_find.php?keyword=" + keyword.value)
    .then((response) => response.text())
    .then((response) => (container.innerHTML = response));
});

function previewImage() {
  const image = document.querySelector('.image');
  const imgPreview = document.querySelector('.imgPreview');

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result;
  };
}