    let bannerInputImage = document.querySelector('.bannerInputImage');
    let imagePlaceHolder = document.querySelector('.imagePlaceHolder');
    bannerInputImage.addEventListener('change', function(event){
    let objectUrl = window.URL.createObjectURL(event.target.files[0]);
    imagePlaceHolder.src = objectUrl;
})