function img(){var width = 20;
    var height = 20;
    var c = document.createElement("canvas");
    c.width = width << 3;
    c.height = height << 3;
    var o = c.getContext("2d");
    var x, y;
    //o.fillStyle = "#000";
    //o.fillRect(0, 0, width << 3, height << 3);
    o.strokeStyle = "#999";
    for(y = 0; y < width; y++){
        for(x = 0; x < height; x++){
            o.beginPath();
            if(Math.random() < .5){
                o.moveTo(x << 3, y << 3);
                o.lineTo(x + 1 << 3, y + 1 << 3);
                
            } else{
                o.moveTo(x + 1 << 3, y << 3);
                o.lineTo(x << 3, y + 1 << 3);
            }
            o.stroke();
            
        }
    }
               
    var img = c.toDataURL ();
    document.body.style.backgroundImage = "url(\"" + img + "\")" ;          
               
}

img();