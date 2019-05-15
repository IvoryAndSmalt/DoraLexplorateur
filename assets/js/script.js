var tondeuse = document.getElementById('toggleRight');
var switcher = 1;

tondeuse.addEventListener('animationiteration', function(){
    switcher = switcher * -1;
    tondeuse.style.transform= "scaleX("+switcher+")";  
});
