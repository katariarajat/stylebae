var btn_hair = document.getElementById('btn-hair');
var btn_nail = document.getElementById('btn-nail');
var btn_face = document.getElementById('btn-face');
var btn_makeup = document.getElementById('btn-makeup');
var table_hair = document.getElementById('table-hair');
var table_nail = document.getElementById('table-nail');
var table_face = document.getElementById('table-face');
var table_makeup = document.getElementById('table-makeup');

btn_hair.addEventListener('click',function(){
    table_hair.style.display = 'block';
    table_nail.style.display = 'none';
    table_face.style.display = 'none';
    table_makeup.style.display = 'none';

});
btn_nail.addEventListener('click',function(){
    table_hair.style.display = 'none';
    table_nail.style.display = 'block';
    table_face.style.display = 'none';
    table_makeup.style.display = 'none';

});
btn_face.addEventListener('click',function(){
    table_hair.style.display = 'none';
    table_nail.style.display = 'none';
    table_face.style.display = 'block';
    table_makeup.style.display = 'none';

});
btn_makeup.addEventListener('click',function(){
    table_hair.style.display = 'none';
    table_nail.style.display = 'none';
    table_face.style.display = 'none';
    table_makeup.style.display = 'block';

});
