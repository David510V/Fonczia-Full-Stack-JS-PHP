var ctx = document.getElementById("myChart");
var myChart=new Chart(ctx,{});
document.getElementById('first').style.display='block'
document.getElementById('second').style.display='none'

$('#form1').on('submit',function(e){
  e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: $('#form1').attr('action'),
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(){
         console.log("wwww") 
        },
        error:function(){
          console.log("eeerrrorr")
        }

    })
})


function typeOf(x){
  
  if(x===0){
    document.getElementById('first').style.display='block'
    document.getElementById('second').style.display='none'
  }
  else{
    document.getElementById('second').style.display='block'
    document.getElementById('first').style.display='none'
  }
}


function callChartFirst(){
  $('#form1').on('submit',function(e){
    e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
          type:'POST',
          url: $('#form1').attr('action'),
          data:formData,
          cache:false,
          contentType: false,
          processData: false,
          success:function(){
           console.log("wwww") 
          },
          error:function(){
            console.log("eeerrrorr")
          }
  
      })
  })
// Parmeters
var aString=document.getElementById("a").value
var bString=document.getElementById("b").value
var cString=document.getElementById("c").value
var dString=document.getElementById("d").value

//POWS 
var pow1String=document.getElementById("pow1").value
var pow2String=document.getElementById("pow2").value
var pow3String=document.getElementById("pow3").value

var aNum=Number(aString)
var bNum=Number(bString)
var cNum=Number(cString)
var dNum=Number(dString)

var pow1=Number(pow1String)
var pow2=Number(pow2String)
var pow3=Number(pow3String)


if (myChart) myChart.destroy();

function ourFn(x){

return aNum*Math.pow(x,pow1) +bNum*Math.pow(x,pow2) + dNum*Math.pow(x,pow3) +cNum
}




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

var extremeY=[]
var UpToY=[]
var DownToY=[]


        function CheckExtremeDots(arr){
          var i=0
          var j=1
          var k=2

          while(i<j && j<k && k<arr.length){
            if(arr[i]< arr[j] && arr[j]>arr[k]){ // max Dot
              extremeY.push(arr[j])
              UpToY.push(arr[j])
              
            }

            if(arr[i]>arr[j]&& arr[j]<arr[k]){  // min Dot
              extremeY.push(arr[j])
              DownToY.push(arr[j])
              
            }

            i++
            j++
            k++
           

          }
         
          
        }

       
        
          CheckExtremeDots(collectY)
        
          

        var extremeDots=[]

        for(var i=0;i<data.length;i++){
          var k=0
              if(extremeY[k]===data[i].y){
                extremeDots.push(data[i])
                
                k++
              }
              if(k===extremeY.length){
                break;
              }
        }


        // UP TO X extreme // 
        var UpToX=[]
        for(var t=0;t<data.length;t++){
          
          var k=0
          if(UpToY[k]===data[t].y){
            UpToX.push(data[t].x)
            k++
          }
          if(k===UpToY.length){
            break;
          }
        }

        
        /// DOWN TO X extreme/// 
        var DownToX=[]
        for(var i=0;i<data.length;i++){
          
          var k=0
          if(DownToY[k]===data[i].y){
            DownToX.push(data[i].x)
            k++
          }
          if(k===DownToY.length)
          {
            break;
          }
        }

        console.log(DownToX)
        console.log(UpToX)
          /// EXTREME DOTS /// 
          var div='' // taking a Var and putting an HTML code in it in order to get a table in my HTML template//
          div +=`<div>`
          for(i in extremeDots){
          div +=`<b>X:</b><span >${extremeDots[i].x}</span><br><b>Y:</b><span id="forY">${extremeDots[i].y}</span><br><hr>`
          }
          div+=`</div>`

          document.getElementById("extremeDots").innerHTML=div
          //////////////////////
      
         /// CUT WITH Y /// 
          var div5='' // taking a Var and putting an HTML code in it in order to get a table in my HTML template//
          div5 +=`<div>`
          for(i in cutWithY){
          div5 +=`<b>X:</b><span >0</span><br><b>Y:</b><span id="forY">${cutWithY[i]}</span><br><hr>`
          }
          div5+=`</div>`

          document.getElementById("cutPoints").innerHTML=div5
          //////////////////////

          /// Up To X
          var div2='';
          div2 +=`<div>`
          for(i in extremeDots){
            if(UpToX[i]===undefined){break;}
          div2 +=`<span > X < ${UpToX[i]}</span><br>`
          }
          for(i in extremeDots){
            if(DownToX[i]===undefined){break;}
          div2 +=`<span > X > ${DownToX[i]}</span><br>`
          }
          div2+=`</div>`
          document.getElementById("UpDown").innerHTML=div2
          ///////////////////////////////////

          /// Down To X
          var div3='';
          div3 +=`<div>`
          for(i in extremeDots){
            if(UpToX[i]===undefined){break;}
          div3 +=`<span > X > ${UpToX[i]}</span><br>`
          }
          for(i in extremeDots){
            if(DownToX[i]===undefined){break;}
          div3 +=`<span > X < ${DownToX[i]}</span><br>`
          }
          div3+=`</div>`
          document.getElementById("DownToUp").innerHTML=div3
          ///////////////////////////////////
          
          
          ////////////////////////////////
          /// DEFINE GENDER ///
          var div4=``;
          div4+=`<div>`
            if(gender.length===0){
              div4+=`<span>כל X</span><br>`
            }
            else{
            for(i in gender){
              div4 +=`<span> X ≠ ${gender}</span><br>`
            }
            }
          document.getElementById("gender").innerHTML= div4
}




function callChartSecond(){

  
// Parmeters
var aString=document.getElementById("a").value
var bString=document.getElementById("b").value
var cString=document.getElementById("c").value
var dString=document.getElementById("d").value

//top bottom
var a1String=document.getElementById("a1").value
var b1String=document.getElementById("b1").value
var c1String=document.getElementById("c1").value
var d1String=document.getElementById("d1").value

// t bottom
var a2String=document.getElementById("a2").value
var b2String=document.getElementById("b2").value
var c2String=document.getElementById("c2").value
var d2String=document.getElementById("d2").value

//POWS //
var pow1String=document.getElementById("pow1").value
var pow2String=document.getElementById("pow2").value
var pow3String=document.getElementById("pow3").value

//top bottom
var pow1aString=document.getElementById("pow1a").value
var pow2aString=document.getElementById("pow2a").value
var pow3aString=document.getElementById("pow3a").value


// bottom
var pow1bString=document.getElementById("pow1b").value
var pow2bString=document.getElementById("pow2b").value
var pow3bString=document.getElementById("pow3b").value


/// T O P /////

// regular
var aNum=Number(aString)
var bNum=Number(bString)
var cNum=Number(cString)
var dNum=Number(dString)

var pow1=Number(pow1String)
var pow2=Number(pow2String)
var pow3=Number(pow3String)

//top-bottom
var a1Num=Number(a1String)
var b1Num=Number(b1String)
var c1Num=Number(c1String)
var d1Num=Number(d1String)

var pow1a=Number(pow1aString)
var pow2a=Number(pow2aString)
var pow3a=Number(pow3aString)

// B O T O M //
var a2Num=Number(a2String)
var b2Num=Number(b2String)
var c2Num=Number(c2String)
var d2Num=Number(d2String)

var pow1b=Number(pow1bString)
var pow2b=Number(pow2bString)
var pow3b=Number(pow3bString)

if (myChart) myChart.destroy();


function ourFn(x){
return (a1Num*Math.pow(x,pow1a) +b1Num*Math.pow(x,pow2a) + d1Num*Math.pow(x,pow3a) +c1Num) / (a2Num*Math.pow(x,pow1b) +b2Num*Math.pow(x,pow2b) + d2Num*Math.pow(x,pow3b) +c2Num)
}



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
        fixedStepSize: 11,
      }
    }]
  }
  
}
});



var extremeY=[]
var UpToY=[]
var DownToY=[]


        function CheckExtremeDots(arr){
          var i=0
          var j=1
          var k=2

          while(i<j && j<k && k<arr.length){
            if(arr[i]< arr[j] && arr[j]>arr[k]){ // max Dot
              extremeY.push(arr[j])
              UpToY.push(arr[j])
              i++
              j++
              k++
            }

            if(arr[i]>arr[j]&& arr[j]<arr[k]){  // min Dot
              extremeY.push(arr[j])
              DownToY.push(arr[j])
              i++
              j++
              k++
            }

            i++
            j++
            k++
           

          }
         
          
        }

       
        
          CheckExtremeDots(collectY)
        
          

        var extremeDots=[]

        for(var i=0;i<data.length;i++){
          var k=0
              if(extremeY[k]===data[i].y){
                extremeDots.push(data[i])
                
                k++
              }
              if(k===extremeY.length){
                break;
              }
        }


        // UP TO X extreme // 
        var UpToX=[]
        for(var t=0;t<data.length;t++){
          
          var k=0
          if(UpToY[k]===data[t].y){
            UpToX.push(data[t].x)
            k++
          }
          if(k===UpToY.length){
            break;
          }
        }

        
        /// DOWN TO X extreme/// 
        var DownToX=[]
        for(var i=0;i<data.length;i++){
          
          var k=0
          if(DownToY[k]===data[i].y){
            DownToX.push(data[i].x)
            k++
          }
          if(k===DownToY.length)
          {
            break;
          }
        }
          /// CUT WITH Y /// 
          var div='' // taking a Var and putting an HTML code in it in order to get a table in my HTML template//
          div +=`<div>`
          for(i in cutWithY){
            console.log(cutWithY)
            if(cutWithY[i]===NaN){
              cutWithY[i]='-'
            }
          div +=`<b>X:</b><span >0</span><br><b>Y:</b><span id="forY">${cutWithY[i]}</span><br><hr>`
          }
          div+=`</div>`

          document.getElementById("cutPoints1").innerHTML=div
          //////////////////////
      
         ///  EXTREME DOTS/// 
          var div5='' // taking a Var and putting an HTML code in it in order to get a table in my HTML template//
          div5 +=`<div>`
          for(i in extremeDots){
          div5 +=`<b>X:</b><span >${extremeDots[i].x}</span><br><b>Y:</b><span id="forY">${extremeDots[i].y}</span><br><hr>`
          }
          div5+=`</div>`

          document.getElementById("extremeDots1").innerHTML=div5
          //////////////////////

          /// Up To Down
          var div2='';
          div2 +=`<div>`
          for(i in extremeDots){
            if(UpToX[i]===undefined){break;}
          div2 +=`<span > X < ${UpToX[i]}</span><br>`
          }
          for(i in extremeDots){
            if(DownToX[i]===undefined){break;}
          div2 +=`<span > X > ${DownToX[i]}</span><br>`
          }
          div2+=`</div>`
          document.getElementById("UpDown1").innerHTML=div2
          ///////////////////////////////////

          /// Down To Up
          var div3='';
          div3 +=`<div>`
          for(i in extremeDots){
            if(UpToX[i]===undefined){break;}
          div3 +=`<span > X > ${UpToX[i]}</span><br>`
          }
          for(i in extremeDots){
            if(DownToX[i]===undefined){break;}
          div3 +=`<span > X < ${DownToX[i]}</span><br>`
          }
          div3+=`</div>`
          document.getElementById("DownToUp1").innerHTML=div3
          ///////////////////////////////////
          
          
          ////////////////////////////////
           /// DEFINE GENDER ///
           var div4=``;
          div4+=`<div>`
            if(gender.length===0){
              div4+=`<span>כל X</span><br>`
            }
            else{
            for(i in gender){
              div4 +=`<span> X ≠ ${gender}</span><br>`
            }
            }
          document.getElementById("gender1").innerHTML= div4



}

