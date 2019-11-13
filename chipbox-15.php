<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>ChipBox-15</title>
    <style>
      #tablo {
        background: #999999;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        border: 4pt solid #777777;
        box-shadow: inset 0 0 7px 5px #555555;
        padding: 4px;
      }
      #texttablo{
        color:#ff;
        text-align: left;
        font-size: 14px;
        font-weight: bold; 
        margin: 4px;
      }
      #buttonChip {
        color:#aaaaaa;
        width:90px;
        height:90px;
        border:1px solid grey;
        margin:1px;
        font-size:36px;
        font-weight: bold; 
        vertical-align: center;
      }
      img[src$=".jpg"]:hover {
        cursor:pointer;
        filter:brightness(75%);
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-12">
        </div>
      </div>
      <div class="row">
        <div class="col-1">
          <span></span>
        </div>
        <div class="col-3" id="tablo">
          <button class="btn btn-primary btn-lg btn-block" onclick="goPlay()">
            <div>
              <span>ДАВАЙ ПОИГРАЕМ</br></span>
            </div>
          </button>
          <div id="texttablo">
            <span>РЕЗУЛЬТАТЫ</br></span>
            <span>ТЕКУЩИЙ: 00 (00:00:00)</br></span>
            <span>ЛУЧШИЙ: 00 (00:00:00)</br></span>
          </div>
        </div>
        <div class="col-4">
          <div class="row">
            <div class="col-3">
              <img src="/img/01.jpg" alt="01" id="buttonChip">
            </div>  
            <div class="col-3">
              <img src="/img/02.jpg" alt="02" id="buttonChip">
            </div>  
            <div class="col-3">
              <img src="/img/03.jpg" alt="03" id="buttonChip">
            </div>
            <div class="col-3">
              <img src="/img/04.jpg" alt="04" id="buttonChip">
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <img src="/img/05.jpg" alt="05" id="buttonChip">
            </div>  
            <div class="col-3">
              <img src="/img/06.jpg" alt="06" id="buttonChip">
            </div>  
            <div class="col-3">
              <img src="/img/07.jpg" alt="07" id="buttonChip">
            </div>
            <div class="col-3">
              <img src="/img/08.jpg" alt="08" id="buttonChip">
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <img src="/img/09.jpg" alt="09" id="buttonChip">
            </div>  
            <div class="col-3">
              <img src="/img/10.jpg" alt="10" id="buttonChip">
            </div>  
            <div class="col-3">
              <img src="/img/11.jpg" alt="11" id="buttonChip">
            </div>
            <div class="col-3">
              <img src="/img/12.jpg" alt="12" id="buttonChip">
            </div>
          </div>
          <div class="row">
            <div class="col-3">
              <img src="/img/13.jpg" alt="13" id="buttonChip">
            </div>  
            <div class="col-3">
              <img src="/img/14.jpg" alt="14" id="buttonChip">
            </div>  
            <div class="col-3">
              <img src="/img/15.jpg" alt="15" id="buttonChip">
            </div>
            <div class="col-3" >
              <img src="/img/00.jpg" alt="16" id="buttonChip">
            </div>
          </div>
        </div>
        <div class="col-4">
          <span></span>
        </div>
      </div>
    </div>
    <script>
      let arrchips=document.querySelectorAll('img');
      document.onclick = function(event){
        try {
          if (!event.target.src.endsWith(".jpg")) return;
        }catch(error){
          return;
        }
        let chip=event.target;
        let chiptouch=+chip.alt;
        let chiptarget=1;
        let srcbuf="";
//        alert(chiptouch+"-"+chiptarget+"-"+arrchips[chiptarget-1].src);
        while (chiptarget<=16 & !arrchips[chiptarget-1].src.endsWith("00.jpg")) chiptarget++;
        if (chiptarget<=16) {
//          alert(chiptouch%4+"-"+chiptarget+"-"+arrchips[chiptarget-1].src);
          if (chiptouch==chiptarget-1 && (chiptouch%4)!=0 || 
              chiptouch==chiptarget+1 && ((chiptouch-1)%4)!=0 ||
              chiptouch==chiptarget-4 && Math.floor((chiptarget-1)/4)!=0 ||
              chiptouch==chiptarget+4 && Math.floor((chiptarget-1)/4)<3) {
            srcbuf=arrchips[chiptarget-1].src;
            arrchips[chiptarget-1].src=arrchips[chiptouch-1].src;
            arrchips[chiptouch-1].src=srcbuf;
          }    
//              alert(chiptouch+"-"+chiptarget);
        }
      }
      function goPlay() {
        let i, n;
        let srcbuf;
        // Первичное заполнение
        for(i=0;i<16;i++)
          arrchips[i].src="/img/"+(String(i).length==1?"0"+String(i):String(i))+".jpg";
        // Перемешивание фишек
        for(i=0;i<16;i++) {
          n=Math.floor(Math.random()*16);
          if (i!=n) {
            srcbuf=arrchips[i].src;
            arrchips[i].src=arrchips[n].src;
            arrchips[n].src=srcbuf;
          }
        }
      }
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
  </body>
</html>
