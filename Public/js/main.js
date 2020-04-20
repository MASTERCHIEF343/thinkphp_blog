var can;
var ctx;
//canvas宽高
var w;
var h;
//女孩
var girlPic = new Image();
var starPic = new Image();

var num = 60;
var stars = [];

var lasttime;
var deltatime;

var life = 0;

//判断鼠标是否在范围内
var s = false;

function init(){
	can = document.getElementById("canvas");
	ctx = can.getContext("2d");

	w = can.width;
	h = can.height;

	girlPic.src = "__ROOT__/Public/images/girl.jpg";
	starPic.src = "__ROOT__/Public/images/star.png";

	//添加鼠标事件
	document.addEventListener("mousemove",mousmove,false);

	for(var i = 0;i < num;i ++){
		var obj = new starObj();
		stars.push(obj);
		stars[i].init();
	}

	lasttime = Date.now();//当前时间
	gameloop();
}

document.body.onload = init;//运行js

//刷新画布
function gameloop(){
	//循环调用,commonjs里是它的兼容封装函数
	//刷新建个随机
	window.requestAnimFrame(gameloop);

	var now = Date.now();
	deltatime = now - lasttime;
	lasttime = now;//获取时间间隔
	darwbackground();
	drawgirl();
	drawStars();
	alive();
}

//绘制背景
function darwbackground(){
	ctx.fillStyle = "#393550";//背景颜色
	ctx.fillRect(0,0,w,h);//填充的路径
}

//绘制女孩
function drawgirl(){
	//drawIamge(img,x,y),(0,0)在左上角
	ctx.drawImage(girlPic,100,150,600,300);
}

//鼠标事件
function mousmove(e){
	if(e.offsetX || e.layerX){
		var px = e.offsetX == undefined ? e.layerX:e.offsetX;
		var py = e.offsetY == undefined ? e.layerY:e.offsetY;
		//在范围内--true
		if(px > 100 && px < 700 && py > 150 && py < 450){
			s = true;
		}else{
			s = false;
		}
	}
}
