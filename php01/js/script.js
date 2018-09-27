    // canvas base

    // canvasを機能させるのに絶対に必要

    const can = $("#canvas")[0];
    const ctx = can.getContext("2d");

// ctx.fillRect(300, 150, 1000, 600);

var distanceX = 3.0;
var distanceY = 4.3;
var currentX = 0;
var currentY = can.height/2;


// 蚊蚊蚊蚊蚊蚊蚊蚊蚊蚊蚊蚊蚊蚊蚊蚊蚊蚊

function mosqFly(){

    currentX += distanceX;
    currentY += distanceY;

    if(currentX < 0 || currentX > 1552){
        distanceX *= -1;
    }

    if(currentY < 0 || currentY > 852){
    distanceY *= -1;
    }
   

    const mosq = {
        posX:currentX,
        posY:currentY,
        flag:false,
        img:"images/cursor2.png"
    };
    
    const mosqDraw = function(){
        const newImage = $("<img>").attr("src",mosq.img);
        newImage.on("load",function(){
            mosq.img = this; //mosqオブジェクトに画像データ追加
            mosq.width = this.width; //mosqオブジェクトに画像幅追加
            mosq.height = this.height; //mosqオブジェクトに画像高追加
            ctx.clearRect(mosq.posX,mosq.posY,mosq.width,mosq.height);
            ctx.drawImage(this,mosq.posX,mosq.posY); 
        });
    };
    mosqDraw();

}
setInterval(mosqFly, 5);



