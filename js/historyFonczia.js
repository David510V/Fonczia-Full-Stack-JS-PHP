function callFunction(){
  var id1=document.currentScript.getAttribute('id')
var aString=document.currentScript.getAttribute('a')
var bString=document.currentScript.getAttribute('b')
var cString=document.currentScript.getAttribute('c')
var dString=document.currentScript.getAttribute('d')

//POWS 
var pow1String=document.currentScript.getAttribute('pow1')
var pow2String=document.currentScript.getAttribute('pow2')
var pow3String=document.currentScript.getAttribute('pow3')

var aNum=Number(aString)
var bNum=Number(bString)
var cNum=Number(cString)
var dNum=Number(dString)

var pow1=Number(pow1String)
var pow2=Number(pow2String)
var pow3=Number(pow3String)

console.log(id1 )



var ctx = document.getElementById(`${id1}`);

function ourFn(x){

return aNum*Math.pow(x,pow1) +bNum*Math.pow(x,pow2) + dNum*Math.pow(x,pow3) +cNum
}



// <div>
//                   <canvas id='.$_SESSION['userId'].'></canvas>
//                   </div>
//                   <script src="js/historyFonczia.js" 
//                   id='.$_SESSION['userId'].' 
//                   a='.$row['a'].' b='.$row['b'].' c='.$row['c'].' d='.$row['d'].'
//                   pow1='.$row['pow1'].' pow2='.$row['pow2'].' pow3='.$row['pow3'].'
//                   ></script>

var data=[]
var collectY=[]
var cutWithY=[];
var gender=[]
  for(var i=-5;i<=5;i+=0.5){
      data.push({
          x:i,
          y:ourFn(i)
      })
      if(i===0){
        cutWithY.push(ourFn(i))
      }

      if(ourFn(i)===Infinity || ourFn(i)===undefined){
        gender.push(i)
      }
      collectY.push(ourFn(i))
  }




myChart = new Chart(ctx, {
type: 'line',

data: {
  datasets: [{
    fill:true,
    label: 'f(x)',
    showLine: true,
    data: data,
    borderColor: 'black',
    borderWidth: 1,
    pointRadius: 5,
    pointBorderColor: 'black',
    pointBackgroundColor:'rgba(123, 83, 252, 0.8)'
  }],
  
},
options: {
  responsive:true,
  onResize:function(){
    this.scales.xAxes.ticks={
      min:-5,
      max:5
    }
    this.scales.yAxes.ticks={
      min:-5,
      max:5
    }
  },
  scales: {
      borderWidth: 100,
    xAxes: [{
      type: 'linear',
      position: 'bottom',
      gridLines: {
      lineWidth: 2,
      zeroLineWidth: 2,
      zeroLineColor: "black",
      drawTicks: true,
      tickMarkLength: 3
    },
      ticks: {
          
        min: -6,
        max: 6,
        stepSize: 1,
        fixedStepSize: 1,
      },
      
    }],
    yAxes: [{
      gridLines: {
     
      lineWidth: 2,
      zeroLineWidth: 2,
      zeroLineColor: "black",
      drawTicks: true,
      tickMarkLength: 3
    },
      ticks: {
        min: -6,
        max: 6,
        stepSize: 1,
        fixedStepSize: 1,
      }
    }]
  }
  
}
});
// if (myChart) myChart.destroy();
{/* <script src="js/historyFonczia.js" 
                  id='.$_SESSION['userId'].' 
                  a='.$row['a'].' b='.$row['b'].' c='.$row['c'].' d='.$row['d'].'
                  pow1='.$row['pow1'].' pow2='.$row['pow2'].' pow3='.$row['pow3'].'
                  ></script> */}
}

callFunction();