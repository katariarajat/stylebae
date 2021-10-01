




var service1 = document.getElementById("service1");
var service2 = document.getElementById("service2");
var service3 = document.getElementById("service3");
var service4 = document.getElementById("service4");
var serviceBackdrop1 =document.getElementById("service-backdrop1");
var serviceBackdrop2 =document.getElementById("service-backdrop2");
var serviceBackdrop3 =document.getElementById("service-backdrop3");
var serviceBackdrop4 =document.getElementById("service-backdrop4");




service1.addEventListener('mouseover',function(){
    serviceBackdrop1.style.display = "block";
    serviceBackdrop1.style.opacity = 0.8;
   /* serviceBackdrop1.style.transform = "translatex(50%)";*/
    serviceBackdrop1.style.transition = "0.5s";
});
service1.addEventListener('mouseleave',function(){
    serviceBackdrop1.style = "none";
    /*serviceBackdrop1.style.transform = "translatex(0%)";*/
    serviceBackdrop1.style.transition = "0.5s";
    
});

service2.addEventListener('mouseover',function(){
    serviceBackdrop2.style.display = "block";
    serviceBackdrop2.style.opacity = 0.8;
    // serviceBackdrop2.style.transform = "translateY(-112%)";
    serviceBackdrop2.style.transition = "0.5s";
});
service2.addEventListener('mouseleave',function(){
    serviceBackdrop2.style = "none";
   // serviceBackdrop2.style.transform = "translateY(0%)";
    serviceBackdrop2.style.transition = "0.5s";
    
});

service3.addEventListener('mouseover',function(){
    serviceBackdrop3.style.display = "block";
    serviceBackdrop3.style.opacity = 1;
   // serviceBackdrop3.style.transform = "translateY(-112%)";
    serviceBackdrop3.style.transition = "0.5s";
});
service3.addEventListener('mouseleave',function(){
    serviceBackdrop3.style = "none";
   // serviceBackdrop3.style.transform = "translateY(0%)";
    serviceBackdrop3.style.transition = "0.5s";
    
});

service4.addEventListener('mouseover',function(){
    serviceBackdrop4.style.display = "block";
    serviceBackdrop4.style.opacity = 1;
   // serviceBackdrop4.style.transform = "translateY(-112%)";
    serviceBackdrop4.style.transition = "0.5s";
});
service4.addEventListener('mouseleave',function(){
    serviceBackdrop4.style = "none";
   // serviceBackdrop4.style.transform = "translateY(0%)";
    serviceBackdrop4.style.transition = "0.5s";
    
});