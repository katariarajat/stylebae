var main_im = document.querySelector('.main_img')
var image_con = document.querySelectorAll('.img');
var image1 = image_con[0]
var image2 = image_con[1]
var image3 = image_con[2]
var image4 = image_con[3]


image1.addEventListener("click", function(){
    main_im.src=image1.src
})
image2.addEventListener("click", function(){
    main_im.src=image2.src
})
image3.addEventListener("click", function(){
    main_im.src=image3.src
})
image4.addEventListener("click", function(){
    main_im.src=image4.src
})


var service1 = document.getElementById("service1");
var service2 = document.getElementById("service2");
var service3 = document.getElementById("service3");
var serviceBackdrop1 =document.getElementById("service-backdrop1");
var serviceBackdrop2 =document.getElementById("service-backdrop2");
var serviceBackdrop3 =document.getElementById("service-backdrop3");
var i, myservice, mybackdrop;



service1.addEventListener('mouseover',function(){
    serviceBackdrop1.style.display = "block";
    serviceBackdrop1.style.opacity = 1;
    serviceBackdrop1.style.transform = "translateY(-100%)";
    serviceBackdrop1.style.transition = "0.5s";
});
service1.addEventListener('mouseleave',function(){
    serviceBackdrop1.style = "none";
    serviceBackdrop1.style.transform = "translateY(100%)";
    serviceBackdrop1.style.transition = "0.5s";
    
});
service2.addEventListener('mouseover',function(){
    serviceBackdrop2.style.display = "block";
    serviceBackdrop2.style.opacity = 1;
    serviceBackdrop2.style.transform = "translateY(-100%)";
    serviceBackdrop2.style.transition = "0.5s";
});
service2.addEventListener('mouseleave',function(){
    serviceBackdrop2.style = "none";
    serviceBackdrop2.style.transform = "translateY(100%)";
    serviceBackdrop2.style.transition = "0.5s";
    
});
service3.addEventListener('mouseover',function(){
    serviceBackdrop3.style.display = "block";
    serviceBackdrop3.style.opacity = 1;
    serviceBackdrop3.style.transform = "translateY(-100%)";
    serviceBackdrop3.style.transition = "0.5s";
});
service3.addEventListener('mouseleave',function(){
    serviceBackdrop3.style = "none";
    serviceBackdrop3.style.transform = "translateY(100%)";
    serviceBackdrop3.style.transition = "0.5s";
    
});