//类绘制多组星星
var starObj = function(){
	this.x;
	this.y;

	this.picNo;
	this.timer;

	this.xs;//初始速度
	this.ys;
}
starObj.prototype.init = function(){
	this.x = Math.random()*600 + 100;
	this.y = Math.random()*300 + 150;

	this.picNo = 0;
	this.timer = 0;

	this.xs = Math.random()*3-1.5;//-1.5到1.5左右移动
	this.ys = Math.random()*3-1.5;
}
starObj.prototype.update = function(){
	this.x += this.xs*deltatime*0.004;
	this.y += this.ys*deltatime*0.004;

	//超过范围重新初始化
	if(this.x < 100||this.x > 700){
		this.init();
		return;
	}
	if(this.y < 150 || this.y > 450){
		this.init();
		return;
	}

	this.timer += deltatime;
	if(this.timer > 50){
		this.picNo +=1;
		this.picNo %=7;
		this.timer = 0;
	}
}
starObj.prototype.draw = function(){
	//全局透明度--canvas--save()/restore()
	ctx.save();
	
	ctx.globalAlpha = life;
	//绘制星星的位置
	ctx.drawImage(starPic, this.picNo*7, 0, 7, 7, this.x, this.y, 7, 7);

	ctx.restore();
}
//绘制所有星星
function drawStars(){
	for(var i = 0;i < num;i ++){
		stars[i].update();
		stars[i].draw();
	}
}
//stars--show--hide
function alive(){
	if(s){
		//show
		life += 0.03 *deltatime*0.05;
		if(life > 1){
			life = 1;
		}
	}else{
		//hide
		life -= 0.03 *deltatime*0.05;
		if(life < 0){
			life = 0;
		}
	}
}