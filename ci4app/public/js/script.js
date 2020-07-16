function previewImg() {
    const cover = document.querySelector('#cover');
    const coverLabel = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');
    
    coverLabel.textContent = cover.files[0].name;
    
    const coverFile = new FileReader();
    coverFile.readAsDataURL(cover.files[0]);
    
    coverFile.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}
