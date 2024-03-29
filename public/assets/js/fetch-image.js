const dropAreaProfile = document.getElementById("drop-area");
const chooseFileProfile = document.getElementById("foto");
const imgPreviewProfile = document.getElementById("background-image");

chooseFileProfile.addEventListener("change", function () {
  getImgDataProfile();
});

function displayImage(url) {
  var imgPreviewProfile = document.getElementById("background-image");
  imgPreviewProfile.style.display = "block";
  imgPreviewProfile.innerHTML = '<img src="' + url + '" draggable="false" />';
}

function getImgDataProfile() {
  const files = chooseFileProfile.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener("load", function () {
      imgPreviewProfile.style.display = "block";
      imgPreviewProfile.innerHTML = '<img src="' + this.result + '" draggable="false" />';
    });
  }
}

function deletePreviewProfile() {
  imgPreviewProfile.style.display = "none";
  chooseFileProfile.value = "";
}

dropAreaProfile.addEventListener("dragover", function (e) {
  e.preventDefault();
});
dropAreaProfile.addEventListener("drop", function (e) {
  e.preventDefault();
  chooseFileProfile.files = e.dataTransfer.files;
  getImgDataProfile();
});
