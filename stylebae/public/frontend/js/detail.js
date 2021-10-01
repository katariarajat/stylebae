var btn_desc = document.getElementById('btn_desc');
var btn_rev = document.getElementById('btn_rev');
var description = document.getElementById('desc');
var review = document.getElementById('rev');
var multi_img = document.querySelectorAll('multi');
var mainImg = document.getElementById('mainImg');



btn_desc.addEventListener('click', function(){
    description.style.display = 'block';
    review.style.display = 'none';
});
btn_rev.addEventListener('click', function(){
    description.style.display = 'none';
    review.style.display = 'block';
});