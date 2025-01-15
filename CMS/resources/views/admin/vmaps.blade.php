@include('admin.sidenav');
<section class="home-section" style="width: calc(100% - 58px);overflow:scroll">
        <div class="home-content" style="display:block;font-color:">
        <div class="panel">
          <div class="search-container">
          <input type="text" id="searchBar" placeholder="Search by Occupant Name" onkeyup="searchPlots()">
          </div>
          <div style="color: white" id="alertDiv" class="alert"></div>
            <h1  style=" text-align: left;">Virtual Map</h1><br>
            <hr><br>
    	
        <div class="panel">
          
          <style>
.search-container {
    text-align: center;
    position: fixed;
    top: 50px;
    right: 100px;
    z-index: 1000000; /* Higher than modals */
}

/* Style search input */
.search-container input {
    padding: 8px;
    max-width: 400px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: transparent;
    color: white;
}

/* Ensure alert is on top */
.alert {
    position: fixed; /* Changed from absolute to fixed to ensure it's always visible */
    top: 10px; /* Adjusted for better visibility */
    left: 50%;
    transform: translateX(-50%);
    z-index: 999999; /* Higher than modals */
}

            :root {
              --main-bg-color: #4fd199;
              --hover-bg-color: #eb1010;
              --block-bg-color: #4fd199;
              --square-bg-color: #4fd199;
              --line-bg-color: #413f42 !important;
              --centro-bg-color: #3f3f3f;
            }
            
            .container5 {
              height: 530px;
              width: 1500px;
              background-size: contain;
              padding-left: 30px;
              position: relative;
              background-image: url("{{ asset('storage/map2.png') }}");
              margin-top: 10pc;
            }
  
            .map {
              width: 100%;
            }
  
            .centro {
              background-color: var(--centro-bg-color);
              padding: 5px;
              clip-path: polygon(0 0, 100% 4%, 98.5% 97%, 7% 100%, 0 20%);
              width: 1124px;
              height: 346px;
              position: absolute;
              top: 101px;
              left: 217px;
            }
  
            .block {
              background-color: var(--block-bg-color);
              position: absolute;
              cursor: pointer;
              text-align: center;
              align-items: center;
              display: flex;
              flex-direction: column;
              justify-content: center;
            }
  
            .block:hover {
              background-color: var(--hover-bg-color);
            }
            .square:hover{
        background-color: rgb(168, 52, 52);
    }
    .square1:hover{
        background-color: rgb(168, 52, 52);
    }
    .square2:hover{
        background-color: rgb(168, 52, 52);
    }
    .square3:hover{
        background-color: rgb(168, 52, 52);
    }
  
            .block10 {
              width: 267px;
              height: 153px;
              clip-path: polygon(1% 0, 100% 4%, 97% 100%, 11% 98%, 1% 35%);
              top: 8px;
              left: 8px;
            }
          
  
            .block8 {
              width: 264px;
              height: 153px;
              clip-path: polygon(5% 0, 100% 3%, 98% 100%, 3% 97%);
              top: 14px;
              left: 269px;
            }
  
            .block6 {
              width: 281px;
              height: 153px;
              clip-path: polygon(4% 0, 100% 3%, 98.5% 100%, 2% 97%);
              top: 18px;
              left: 529px;
            }
  
            .block4 {
              width: 305px;
              height: 154px;
              clip-path: polygon(5% 2%, 100% 3%, 98.5% 100%, 3% 99%);
              top: 18px;
              left: 804px;
            }
  
            .block9 {
              width: 240px;
              height: 183px;
              clip-path: polygon(5% 2%, 100% 4%, 97.5% 100%, 24% 100%);
              top: 164px;
              left: 26px;
            }
  
            .block7 {
              width: 264px;
              height: 181px;
              clip-path: polygon(5% 0, 100% 2%, 98% 95%, 1% 97%);
              top: 172px;
              left: 263px;
            }
  
            .block5 {
              width: 282.5px;
              height: 175px;
              clip-path: polygon(5% 2%, 100% 3%, 98% 96.5%, 3% 99%);
              top: 172px;
              left: 521px;
            }
  
            .block3 {
              width: 307px;
              height: 166px;
              clip-path: polygon(5% 2%, 100% 3%, 98% 99%, 3% 99%);
              top: 177px;
              left: 797px;
            }
  
            .line1 {
              position: absolute;
              width: 898px;
              height: 38px;
              background-color: var(--line-bg-color);
              top: 42px;
              left: 50px;
              padding: 2px 3px 5px;
              display: flex;
              justify-content: flex-start;
              gap: 2px;
              tranfrom: rotate(4deg)
            }
  
            .line2 {
              position: absolute;
              width: 206px;
              height: 35px;
              background-color: var(--line-bg-color);
              top: 42px;
              left: 974px;
              padding: 2px 3px 4px;
              display: flex;
              justify-content: flex-start;
              gap: 2px;
              z-index: 1;
            }
  
            .line3 {
              position: absolute;
              width: 919px;
              height: 35px;
              background-color: var(--line-bg-color);
              top: 484px;
              left: 136px;
              padding: 2px 3px 5px;
              display: flex;
              justify-content: flex-start;
              gap: 2px;
            }
  
            .line4 {
              position: absolute;
              width: 77px;
              height: 35px;
              background-color: var(--line-bg-color);
              top: 484px;
              left: 1084px;
              padding: 5px 3px 2px;
              display: flex;
              justify-content: flex-start;
              gap: 2px;
            }
  
            .line5 {
              position: absolute;
              width: 274px;
              height: 35px;
              background-color: var(--line-bg-color);
              top: 302px;
              left: -64px;
              padding: 2px 3px 5px;
              display: flex;
              justify-content: flex-start;
              gap: 2px;
              transform: rotate(255deg);
            }
  
            .line6 {
              position: absolute;
              width: 50px;
              height: 35px;
              background-color: var(--line-bg-color);
              top: 113px;
              left: 10px;
              padding: 2px 3px 5px;
              display: flex;
              justify-content: flex-start;
              gap: 2px;
              transform: rotate(270deg);
              z-index: 1;
            }
  
            .line7 {
              position: absolute;
              width: 58px;
              height: 35px;
              background-color: var(--line-bg-color);
              top: 153px;
              left: 13px;
              padding: 2px 3px 5px;
              display: flex;
              justify-content: flex-start;
              gap: 2px;
              clip-path: polygon(14% -10%, 75.5% 0%, 67% 54%, 69% 100%, 8% 100%, 9% 50%);
              transform: rotate(350deg);
            }
  
            .line8 {
              position: absolute;
              width: 105px;
              height: 35px;
              background-color: var(--line-bg-color);
              top: 65px;
              left: 1px;
              padding: 2px 3px 5px;
              display: flex;
              justify-content: flex-start;
              gap: 2px;
              transform: rotate(270deg);
              z-index: 1;
            }
  
            .line9 {
              position: absolute;
              width: 345px;
              height: 35px;
              background-color: var(--line-bg-color);
              top: 282px;
              left: -75px;
              padding: 2px 3px 5px;
              display: flex;
              justify-content: flex-start;
              gap: 2px;
              transform: rotate(255deg);
            }
            .line10 {
              position: absolute;
              width: 180px;
              height: 38px;
              background-color: var(--line-bg-color);
              top: -1013px;
              left: -46px;
              padding: 2px 3px 5px;
              display: flex;
              justify-content: flex-start;
              gap: 2px;
            }
            .line11 {
              position: absolute;
              width: 145px;
              height: 35px;
              background-color: var(--line-bg-color);
              top: 282px;
              left: -75px;
              padding: 2px 3px 5px;
              display: flex;
              justify-content: flex-start;
              gap: 2px;
              transform: rotate(255deg);
            }
            .line12 {
              position: absolute;
              width: 898px;
              height: 58px;
              background-color: var(--line-bg-color);
              top: 42px;
              left: 50px;
              padding: 2px 3px 5px;
              display: flex;
              justify-content: flex-start;
              gap: 2px;
              clip-path:polygon(0 24%, 100% 1%, 100% 100%, 0 84%);
            }
            .line13 {
              position: absolute;
              width: 898px;
              height: 58px;
              background-color: var(--line-bg-color);
              top: 42px;
              left: 50px;
              padding: 2px 3px 5px;
              display: flex;
              justify-content: flex-start;
              gap: 2px;
              clip-path:polygon(0 24%, 100% 1%, 100% 100%, 0 84%);
            }
             .bottomline {
              position: absolute;
              left: 140px;
              top: -15px;
            }
            .bottomline2 {
              position: absolute;
              left: 140px;
              top: 16px;
            }
            .bottomline3 {
              position: absolute;
              left: 250px;
              top: 510px;
            }
            .bottomline4 {
              position: absolute;
              left: 140px;
              top: 145px;
            }
            .topline{
              position: absolute;
              left: 140px;
              top: 2px;
            }
            .topline-short{
              position: absolute;
              left: 220px;
              top: -45px;
            }
            .topline-short2{
              position: absolute;
              left: 220px;
              top: -88px;
            }
            .topline-short3{
              position: absolute;
              left: 220px;
              top: -120px;
            }
            .topline-short4{
              position: absolute;
              left: 220px;
              top: -175px;
            }
            .topline2{
              position: absolute;
              left: 140px;
              top: -35px;
            }
            .topline3{
              position: absolute;
              left: 140px;
              top: -120px;
            }
            .topline4{
              position: absolute;
              left: 140px;
              top: -180px;
            }
            .topline5{
              position: absolute;
              left: 140px;
              top: -90px;
              transform: rotate(90deg)
            }
            .topline6{
              position: absolute;
              left: 248px;
              top: 546px;
              transform: rotate(90deg)
            }
            .topline7{
              position: absolute;
              left: -940px;
              top: -90px;
              transform: rotate(90deg)
            }
  
  
            .kanto1 {
              position: absolute;
              left: 144px;
              top: -6px;
            }
  
            .kanto2 {
              position: absolute;
              top: 20px;
            }
            .kanto3 {
              position: absolute;
              top: 290px;
              left: 10.9pc;
            }
  

            .square2 {
              width: 35px;
              height: 100%;
            }
  
            .square3 {
              position: absolute;
              width: 45px;
              height: 100%;
              z-index: 1;
              left: 5px;
              transform: rotate(360deg);
            }
            .vmaps{
              left: -50px;
              position: relative;
              top: -10px;
            }
            .twelve{
              transform: rotate(280deg);

            }
            .names1{
              position: absolute;
              top: 464px;
              z-index: 1;
              color: white;
              left: 12pc;
            }
            .entrance {
    position: absolute;
    top: 255px;
    z-index: 1;
    color: white;
    left: 1400px;
}
            .namesSign{
              position: absolute;
              top: 437px;
              z-index: 1;
              color: white;
              left: 700px;
            }
            .namesSign2{
              position: absolute;
              top: 74px;
              z-index: 1;
              color: white;
              left: 700px;
            }
            .namesSign3{
              position: absolute;
              top: 537px;
              z-index: 1;
              color: white;
              left: 700px;
              transform: rotate(-90deg);

            }
            .namesSign4{
              position: absolute;
              top: 300px;
              z-index: 1;
              color: white;
              left: 105px;
              transform: rotate(-104deg);

            }
            .names2{
              position: absolute;
              z-index: 1;
              color: white;
              left: 7pc;
              top: 40px;
            }
            .names3{
              position: absolute;
              z-index: 1;
              color: white;
              transform: rotate(-90deg);
              top: 237px;
              left: 100px;
            }
            .names4{
              position: absolute;
              z-index: 1;
              color: white;
              transform: rotate(-90deg);
              top: 237px;
              left: -21px;
            }
            .names5{
              position: absolute;
              z-index: 1;
              color: white;
              transform: rotate(-90deg);
              top: -57px;
              left: -24px;
            }
            .names6{
              position: absolute;
              z-index: 1;
              color: white;
              transform: rotate(-103deg);
              top: 557px;
              left: 83px;
            }
            .names7{
              position: absolute;
              z-index: 1;
              color: white;
              left: 6.8pc;
              top: 3px;
            }
            .names8{
              position: absolute;
              z-index: 1;
              color: white;
              left: 6.8pc;
              top: -66px;
            }
            .names9{
              position: absolute;
              z-index: 1;
              color: white;
              left: 6.8pc;
              top: -140px;
            }
            .names10{
              position: absolute;
              top: 494px;
              z-index: 1;
              color: white;
              left: 12pc;
            }
            .names11{
              position: absolute;
              top: 558px;
              z-index: 1;
              color: white;
              left: 13pc;
            }
            .names12{
              position: absolute;
              top: 622px;
              z-index: 1;
              color: white;
              left: 12pc;
            }
            .names13{
              position: absolute;
              z-index: 1;
              color: white;
              transform: rotate(-90deg);
              top: -57px;
              left: 1115px;
            }
            .names14{
              position: absolute;
              z-index: 1;
              color: white;
              left: 86.8pc;
              top: -140px;
            }
            .names15{
              position: absolute;
              z-index: 1;
              color: white;
              left: 86.8pc;
              top: -68px;
            }
            .names16{
              position: absolute;
              z-index: 1;
              color: white;
              left: 86.8pc;
              top: -9px;
            }
            .names17{
              position: absolute;
              z-index: 1;
              color: white;
              left: 76.8pc;
              top: 36pc;
              transform: rotate(-90deg)
            }
            .modal {
                        display: none;
                        position: fixed;
                        z-index: 1;
                        left: -50;
                        top: 0;
                        overflow: auto;
                        background-color: rgb(0, 0, 0);
                        background-color: rgba(0, 0, 0, 0.4);
                        padding-top: 20px;
                    }

                    .modal-content-map {
                        background-color: var(--modal-bg-color);
                        padding: 20px;
                        border: 1px solid #888;
                        width: 800px !important;
                        color: white;
                        background-color: #3F3F3F;
                        background-color: #1d1b31;
  margin:2% auto;
  padding: 20px;
  border: 1px solid #888;
height: 930px;
                    }
                    .modal-center {
                        align-items: center;
                        justify-content: center;
                        display: flex;
                        flex-direction: column;
                        width: 100%;
                        position: relative;
                    }
                    .close {
                        color: #aaa;
                        float: right;
                        font-size: 28px;
                        font-weight: bold;
                        z-index: 9999;
                    }

                    .close:hover,
                    .close:focus {
                        color: black;
                        text-decoration: none;
                        cursor: pointer;
                    }
                    .plots_con {
    display: flex;
    flex-direction: column; /* Stack items vertically */
    flex-wrap: wrap;
    width: 575px; /* Adjusted based on cell width */
    height: 582px; /* Adjusted based on the number of items and cell height */
}
.b3{
  height: 630px;
  width: 600px;
}
.b5{
  height: 670px;
  margin-left: 39px;
}
.b6{
  width: 600px !important;
}
.b7{
  height: 703px;
  margin-left: 40px;
}
.b8{
  width: 600px !important;
  margin-left: 20px;

}
.b9{
  height: 750px;
  width: 450px; /* Adjusted based on cell width */
  margin-left: 120px;

}
        .plot {
            width: 30px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            font-size: 10px;
            background-color: rgb(240, 255, 30);
            color: black;
            border: 1px black;
        }
      
        
        .plot:hover{
          background-color: rgb(168, 52, 52);
        }
        .d0{
          background-color: transparent;
          border: none;
          width: 30px;
          height: 20px;
        }

        .rotator{
         transform: rotate(180deg);
        }
        .square, .square1, .square2 {
              width: 38px !important;
              height: 100% !important;
              background-color: var(--square-bg-color);
              cursor: pointer;
              text-align: center;
              align-items: center;
              display: flex;
              flex-direction: column;
              justify-content: center;
            }
            .square3{
        position: absolute;
        width: 40px;
        height: 29px;
        background-color: #4fd198;
        padding: 2px 3px 5px;
        display: flex;
        justify-content: flex-start;
        clip-path: polygon(14% -10%, 75.5% 0%, 67% 54%, 69% 100%, 10% 100%, 9% 50%);
        cursor: pointer;
        text-align: center;
        align-items: center;
        display: flex;
        flex-direction: column;
        justify-content: center;

    }
            .square1 {
              width: 39px;
              height: 100%;
            }
            .active { background-color: red !important; }
        .block.active {
            background-color: red !important;
        }

        .plot.active {
            background-color: red !important;
        }
        .overflower{
    overflow-y: auto;
    height: 1300px;
    }
          </style>
          <div class="overflower">
  <div class="container5">
    <div class="insider" >
    <span class="namesSign4">← 2 TWO WAY TRAFFIC ROAD →</span>

    <span class="namesSign">← 2 TWO WAY TRAFFIC ROAD →</span>
    <span class="namesSign2">← 2 TWO WAY TRAFFIC ROAD →</span>
    <span class="entrance">Entrance</span>
    <span class="names1">Block 1</span>

    <span class="names2">Block 2</span>
    <span class="names3">Block 11</span>
    <span class="names4">Block 12</span>
    <span class="names5">Block 16</span>
    <span class="names6">Block 22</span>
    <span class="names7">Block 14</span>
    <span class="names8">Block 17</span>
    <span class="names9">Block 15</span>
    <span class="names10">Block 20</span>
    <span class="names11">Block 23</span>
    <span class="names12">Block 21</span>
    <span class="names13">Block 13</span>
    <span class="names14">Block 26</span>
    <span class="names15">Block 25</span>
    <span class="names16">Block 24</span>
    <span class="names17">Block 19</span>
    <div class="vmaps">
      <div class="topline">
          <div class="line1">
            <div class="plot square plot-2-30" onclick="showPlotDetails(2, '30')">30</div>
            <div class="plot square plot-2-29" onclick="showPlotDetails(2, '29')">29</div>
            <div class="plot square plot-2-28" onclick="showPlotDetails(2, '28')">28</div>
            <div class="plot square plot-2-27" onclick="showPlotDetails(2, '27')">27</div>
            <div class="plot square plot-2-26" onclick="showPlotDetails(2, '26')">26</div>
            <div class="plot square plot-2-25" onclick="showPlotDetails(2, '25')">25</div>
            <div class="plot square plot-2-24" onclick="showPlotDetails(2, '24')">24</div>
            <div class="plot square plot-2-23" onclick="showPlotDetails(2, '23')">23</div>
            <div class="plot square plot-2-22" onclick="showPlotDetails(2, '22')">22</div>
            <div class="plot square plot-2-21" onclick="showPlotDetails(2, '21')">21</div>
            <div class="plot square plot-2-20" onclick="showPlotDetails(2, '20')">20</div>
            <div class="plot square plot-2-19" onclick="showPlotDetails(2, '19')">19</div>
            <div class="plot square plot-2-18" onclick="showPlotDetails(2, '18')">18</div>
            <div class="plot square plot-2-17" onclick="showPlotDetails(2, '17')">17</div>
            <div class="plot square plot-2-16" onclick="showPlotDetails(2, '16')">16</div>
            <div class="plot square plot-2-15" onclick="showPlotDetails(2, '15')">15</div>
            <div class="plot square plot-2-14" onclick="showPlotDetails(2, '14')">14</div>
            <div class="plot square plot-2-13" onclick="showPlotDetails(2, '13')">13</div>
            <div class="plot square plot-2-12" onclick="showPlotDetails(2, '12')">12</div>
            <div class="plot square plot-2-11" onclick="showPlotDetails(2, '11')">11</div>
            <div class="plot square plot-2-10" onclick="showPlotDetails(2, '10')">10</div>
            <div class="plot square plot-2-9" onclick="showPlotDetails(2, '9')">9</div>
            <div class="plot square plot-2-8" onclick="showPlotDetails(2, '8')">8</div>
            <div class="plot square plot-2-7" onclick="showPlotDetails(2, '7')">7</div>
            <div class="plot square plot-2-6" onclick="showPlotDetails(2, '6')">6</div>
          </div>
          <div class="line2">
            <div class="plot square plot-2-5" onclick="showPlotDetails(2, '5')">5</div>
            <div class="plot square plot-2-4" onclick="showPlotDetails(2, '4')">4</div>
            <div class="plot square plot-2-3" onclick="showPlotDetails(2, '3')">3</div>
            <div class="plot square plot-2-2" onclick="showPlotDetails(2, '2')">2</div>
            <div class="plot square plot-2-1" onclick="showPlotDetails(2, '1')">1</div>
          </div>
      </div>  
      <div class="topline-short">
        <div class="line2">
          <div class="plot square plot-24-8" onclick="showPlotDetails(24, '8')">8</div>
          <div class="plot square plot-24-7" onclick="showPlotDetails(24, '7')">7</div>
          <div class="plot square plot-24-6" onclick="showPlotDetails(24, '6')">6</div>
          <div class="plot square plot-24-5" onclick="showPlotDetails(24, '5')">5</div>
          <div class="plot square plot-24-4" onclick="showPlotDetails(24, '4')">4</div>
          <div class="plot square plot-24-3" onclick="showPlotDetails(24, '3')">3</div>
          <div class="plot square plot-24-2" onclick="showPlotDetails(24, '2')">2</div>
          <div class="plot square plot-24-1" onclick="showPlotDetails(24, '1')">1</div>          
        </div>
    </div>  
    <div class="topline-short2">
      <div class="line2">
        <div class="plot square plot-25-13" onclick="showPlotDetails(25, '13')">13</div>
        <div class="plot square plot-25-11" onclick="showPlotDetails(25, '11')">11</div>
        <div class="plot square plot-25-9" onclick="showPlotDetails(25, '9')">9</div>
        <div class="plot square plot-25-7" onclick="showPlotDetails(25, '7')">7</div>
        <div class="plot square plot-25-5" onclick="showPlotDetails(25, '5')">5</div>
        <div class="plot square plot-25-3" onclick="showPlotDetails(25, '3')">3</div>
        <div class="plot square plot-25-1" onclick="showPlotDetails(25, '1')">1</div>          
      </div>
  </div>  
  <div class="topline-short3">
    <div class="line2">
      <div class="plot square plot-25-14" onclick="showPlotDetails(25, '14')">14</div>
      <div class="plot square plot-25-12" onclick="showPlotDetails(25, '12')">12</div>
      <div class="plot square plot-25-10" onclick="showPlotDetails(25, '10')">10</div>
      <div class="plot square plot-25-8" onclick="showPlotDetails(25, '8')">8</div>
      <div class="plot square plot-25-6" onclick="showPlotDetails(25, '6')">6</div>
      <div class="plot square plot-25-4" onclick="showPlotDetails(25, '4')">4</div>
      <div class="plot square plot-25-2" onclick="showPlotDetails(25, '2')">2</div>         
    </div>
</div>  
<div class="topline-short4">
  <div class="line2">
    <div class="plot square plot-26-8" onclick="showPlotDetails(26, '8')">8</div>
    <div class="plot square plot-26-7" onclick="showPlotDetails(26, '7')">7</div>
    <div class="plot square plot-26-6" onclick="showPlotDetails(26, '6')">6</div>
    <div class="plot square plot-26-5" onclick="showPlotDetails(26, '5')">5</div>
    <div class="plot square plot-26-4" onclick="showPlotDetails(26, '4')">4</div>
    <div class="plot square plot-26-3" onclick="showPlotDetails(26, '3')">3</div>
    <div class="plot square plot-26-2" onclick="showPlotDetails(26, '2')">2</div>
    <div class="plot square plot-26-1" onclick="showPlotDetails(26, '1')">1</div>         
  </div>
</div>  
      <div class="topline2">
        <div class="line1">
          <div class="plot square plot-14-35" onclick="showPlotDetails(14, '35')">35</div>
          <div class="plot square plot-14-34" onclick="showPlotDetails(14, '34')">34</div>
          <div class="plot square plot-14-33" onclick="showPlotDetails(14, '33')">33</div>
          <div class="plot square plot-14-32" onclick="showPlotDetails(14, '32')">32</div>
          <div class="plot square plot-14-31" onclick="showPlotDetails(14, '31')">31</div>
          <div class="plot square plot-14-30" onclick="showPlotDetails(14, '30')">30</div>
          <div class="plot square plot-14-29" onclick="showPlotDetails(14, '29')">29</div>
          <div class="plot square plot-14-28" onclick="showPlotDetails(14, '28')">28</div>
          <div class="plot square plot-14-27" onclick="showPlotDetails(14, '27')">27</div>
          <div class="plot square plot-14-26" onclick="showPlotDetails(14, '26')">26</div>
          <div class="plot square plot-14-25" onclick="showPlotDetails(14, '25')">25</div>
          <div class="plot square plot-14-24" onclick="showPlotDetails(14, '24')">24</div>
          <div class="plot square plot-14-23" onclick="showPlotDetails(14, '23')">23</div>
          <div class="plot square plot-14-22" onclick="showPlotDetails(14, '22')">22</div>
          <div class="plot square plot-14-21" onclick="showPlotDetails(14, '21')">21</div>
          <div class="plot square plot-14-20" onclick="showPlotDetails(14, '20')">20</div>
          <div class="plot square plot-14-19" onclick="showPlotDetails(14, '19')">19</div>
          <div class="plot square plot-14-18" onclick="showPlotDetails(14, '18')">18</div>
          <div class="plot square plot-14-17" onclick="showPlotDetails(14, '17')">17</div>
          <div class="plot square plot-14-16" onclick="showPlotDetails(14, '16')">16</div>
          <div class="plot square plot-14-15" onclick="showPlotDetails(14, '15')">15</div>
          <div class="plot square plot-14-14" onclick="showPlotDetails(14, '14')">14</div>
          <div class="plot square plot-14-13" onclick="showPlotDetails(14, '13')">13</div>
          <div class="plot square plot-14-12" onclick="showPlotDetails(14, '12')">12</div>
          <div class="plot square plot-14-11" onclick="showPlotDetails(14, '11')">11</div>
          <div class="plot square plot-14-10" onclick="showPlotDetails(14, '10')">10</div>
          <div class="plot square plot-14-9" onclick="showPlotDetails(14, '9')">9</div>
          <div class="plot square plot-14-8" onclick="showPlotDetails(14, '8')">8</div>
          <div class="plot square plot-14-7" onclick="showPlotDetails(14, '7')">7</div>
          <div class="plot square plot-14-6" onclick="showPlotDetails(14, '6')">6</div>
          <div class="plot square plot-14-5" onclick="showPlotDetails(14, '5')">5</div>
          <div class="plot square plot-14-4" onclick="showPlotDetails(14, '4')">4</div>
          <div class="plot square plot-14-3" onclick="showPlotDetails(14, '3')">3</div>
          <div class="plot square plot-14-2" onclick="showPlotDetails(14, '2')">2</div>
          <div class="plot square plot-14-1" onclick="showPlotDetails(14, '1')">1</div>          
        
        </div>
    </div>  
    <div class="topline3">
      <div class="line12">
        <div class="plot square plot-17-34" onclick="showPlotDetails(17, '34')">34</div>
        <div class="plot square plot-17-33" onclick="showPlotDetails(17, '33')">33</div>
        <div class="plot square plot-17-32" onclick="showPlotDetails(17, '32')">32</div>
        <div class="plot square plot-17-31" onclick="showPlotDetails(17, '31')">31</div>
        <div class="plot square plot-17-30" onclick="showPlotDetails(17, '30')">30</div>
        <div class="plot square plot-17-29" onclick="showPlotDetails(17, '29')">29</div>
        <div class="plot square plot-17-28" onclick="showPlotDetails(17, '28')">28</div>
        <div class="plot square plot-17-27" onclick="showPlotDetails(17, '27')">27</div>
        <div class="plot square plot-17-26" onclick="showPlotDetails(17, '26')">26</div>
        <div class="plot square plot-17-25" onclick="showPlotDetails(17, '25')">25</div>
        <div class="plot square plot-17-24" onclick="showPlotDetails(17, '24')">24</div>
        <div class="plot square plot-17-23" onclick="showPlotDetails(17, '23')">23</div>
        <div class="plot square plot-17-22" onclick="showPlotDetails(17, '22')">22</div>
        <div class="plot square plot-17-21" onclick="showPlotDetails(17, '21')">21</div>
        <div class="plot square plot-17-20" onclick="showPlotDetails(17, '20')">20</div>
        <div class="plot square plot-17-19" onclick="showPlotDetails(17, '19')">19</div>
        <div class="plot square plot-17-18" onclick="showPlotDetails(17, '18')">18</div>
        <div class="plot square plot-17-17" onclick="showPlotDetails(17, '17')">17</div>
        <div class="plot square plot-17-16" onclick="showPlotDetails(17, '16')">16</div>
        <div class="plot square plot-17-15" onclick="showPlotDetails(17, '15')">15</div>
        <div class="plot square plot-17-14" onclick="showPlotDetails(17, '14')">14</div>
        <div class="plot square plot-17-13" onclick="showPlotDetails(17, '13')">13</div>
        <div class="plot square plot-17-12" onclick="showPlotDetails(17, '12')">12</div>
        <div class="plot square plot-17-11" onclick="showPlotDetails(17, '11')">11</div>
        <div class="plot square plot-17-10" onclick="showPlotDetails(17, '10')">10</div>
        <div class="plot square plot-17-9" onclick="showPlotDetails(17, '9')">9</div>
        <div class="plot square plot-17-8" onclick="showPlotDetails(17, '8')">8</div>
        <div class="plot square plot-17-7" onclick="showPlotDetails(17, '7')">7</div>
        <div class="plot square plot-17-6" onclick="showPlotDetails(17, '6')">6</div>
        <div class="plot square plot-17-5" onclick="showPlotDetails(17, '5')">5</div>
        <div class="plot square plot-17-4" onclick="showPlotDetails(17, '4')">4</div>
        <div class="plot square plot-17-3" onclick="showPlotDetails(17, '3')">3</div>
        <div class="plot square plot-17-2" onclick="showPlotDetails(17, '2')">2</div>
        <div class="plot square plot-17-1" onclick="showPlotDetails(17, '1')">1</div>
                 
      
      </div>
  </div>  
  <div class="topline4">
    <div class="line1">
      <div class="plot square plot-15-36" onclick="showPlotDetails(15, '36')">36</div>
      <div class="plot square plot-15-35" onclick="showPlotDetails(15, '35')">35</div>
      <div class="plot square plot-15-34" onclick="showPlotDetails(15, '34')">34</div>
      <div class="plot square plot-15-33" onclick="showPlotDetails(15, '33')">33</div>
      <div class="plot square plot-15-32" onclick="showPlotDetails(15, '32')">32</div>
      <div class="plot square plot-15-31" onclick="showPlotDetails(15, '31')">31</div>
      <div class="plot square plot-15-30" onclick="showPlotDetails(15, '30')">30</div>
      <div class="plot square plot-15-29" onclick="showPlotDetails(15, '29')">29</div>
      <div class="plot square plot-15-28" onclick="showPlotDetails(15, '28')">28</div>
      <div class="plot square plot-15-27" onclick="showPlotDetails(15, '27')">27</div>
      <div class="plot square plot-15-26" onclick="showPlotDetails(15, '26')">26</div>
      <div class="plot square plot-15-25" onclick="showPlotDetails(15, '25')">25</div>
      <div class="plot square plot-15-24" onclick="showPlotDetails(15, '24')">24</div>
      <div class="plot square plot-15-23" onclick="showPlotDetails(15, '23')">23</div>
      <div class="plot square plot-15-22" onclick="showPlotDetails(15, '22')">22</div>
      <div class="plot square plot-15-21" onclick="showPlotDetails(15, '21')">21</div>
      <div class="plot square plot-15-20" onclick="showPlotDetails(15, '20')">20</div>
      <div class="plot square plot-15-19" onclick="showPlotDetails(15, '19')">19</div>
      <div class="plot square plot-15-18" onclick="showPlotDetails(15, '18')">18</div>
      <div class="plot square plot-15-17" onclick="showPlotDetails(15, '17')">17</div>
      <div class="plot square plot-15-16" onclick="showPlotDetails(15, '16')">16</div>
      <div class="plot square plot-15-15" onclick="showPlotDetails(15, '15')">15</div>
      <div class="plot square plot-15-14" onclick="showPlotDetails(15, '14')">14</div>
      <div class="plot square plot-15-13" onclick="showPlotDetails(15, '13')">13</div>
      <div class="plot square plot-15-12" onclick="showPlotDetails(15, '12')">12</div>
      <div class="plot square plot-15-11" onclick="showPlotDetails(15, '11')">11</div>
      <div class="plot square plot-15-10" onclick="showPlotDetails(15, '10')">10</div>
      <div class="plot square plot-15-9" onclick="showPlotDetails(15, '9')">9</div>
      <div class="plot square plot-15-8" onclick="showPlotDetails(15, '8')">8</div>
      <div class="plot square plot-15-7" onclick="showPlotDetails(15, '7')">7</div>
      <div class="plot square plot-15-6" onclick="showPlotDetails(15, '6')">6</div>
      <div class="plot square plot-15-5" onclick="showPlotDetails(15, '5')">5</div>
      <div class="plot square plot-15-4" onclick="showPlotDetails(15, '4')">4</div>
      <div class="plot square plot-15-3" onclick="showPlotDetails(15, '3')">3</div>
      <div class="plot square plot-15-2" onclick="showPlotDetails(15, '2')">2</div>
      <div class="plot square plot-15-1" onclick="showPlotDetails(15, '1')">1</div>
      
    </div>
</div>  
<div class="topline5">
  <div class="line10">
    <div class="plot square plot-13-7" onclick="showPlotDetails(13, '7')">7</div>
    <div class="plot square plot-13-6" onclick="showPlotDetails(13, '6')">6</div>
    <div class="plot square plot-13-5" onclick="showPlotDetails(13, '5')">5</div>
    <div class="plot square plot-13-4" onclick="showPlotDetails(13, '4')">4</div>
    <div class="plot square plot-13-3" onclick="showPlotDetails(13, '3')">3</div>
    <div class="plot square plot-13-2" onclick="showPlotDetails(13, '2')">2</div>
    <div class="plot square plot-13-1" onclick="showPlotDetails(13, '1')">1</div>    
  </div>
</div>  
<div class="topline6">
  <div class="line10">
    <div class="plot square plot-19-7" onclick="showPlotDetails(19, '7')">7</div>
    <div class="plot square plot-19-6" onclick="showPlotDetails(19, '6')">6</div>
    <div class="plot square plot-19-5" onclick="showPlotDetails(19, '5')">5</div>
    <div class="plot square plot-19-4" onclick="showPlotDetails(19, '4')">4</div>
    <div class="plot square plot-19-3" onclick="showPlotDetails(19, '3')">3</div>
    <div class="plot square plot-19-2" onclick="showPlotDetails(19, '2')">2</div>
    <div class="plot square plot-19-1" onclick="showPlotDetails(19, '1')">1</div>
    
  </div>
</div>
<div class="topline7">
  <div class="line10">
    <div class="plot square plot-13-7" onclick="showPlotDetails(13, '7')">7</div>
    <div class="plot square plot-13-6" onclick="showPlotDetails(13, '6')">6</div>
    <div class="plot square plot-13-5" onclick="showPlotDetails(13, '5')">5</div>
    <div class="plot square plot-13-4" onclick="showPlotDetails(13, '4')">4</div>
    <div class="plot square plot-13-3" onclick="showPlotDetails(13, '3')">3</div>
    <div class="plot square plot-13-2" onclick="showPlotDetails(13, '2')">2</div>
    <div class="plot square plot-13-1" onclick="showPlotDetails(13, '1')">1</div>    
  </div>
</div>  
      <style>
            .block8 {
              width: 264px;
              height: 153px;
              clip-path: polygon(5% 0, 100% 3%, 98% 100%, 3% 97%);
              top: 14px;
              left: 269px;
            }
  
            .block6 {
              width: 281px;
              height: 153px;
              clip-path: polygon(4% 0, 100% 3%, 98.5% 100%, 2% 97%);
              top: 18px;
              left: 529px;
            }
  
            .block4 {
              width: 305px;
              height: 154px;
              clip-path: polygon(5% 2%, 100% 3%, 98.5% 100%, 3% 99%);
              top: 18px;
              left: 804px;
            }
  
            .block9 {
              width: 240px;
              height: 183px;
              clip-path: polygon(5% 2%, 100% 4%, 97.5% 100%, 24% 100%);
              top: 164px;
              left: 26px;
            }
  
            .block7 {
              width: 264px;
              height: 181px;
              clip-path: polygon(5% 0, 100% 2%, 98% 95%, 1% 97%);
              top: 172px;
              left: 263px;
            }
  
            .block5 {
              width: 282.5px;
              height: 175px;
              clip-path: polygon(5% 2%, 100% 3%, 98% 96.5%, 3% 99%);
              top: 172px;
              left: 521px;
            }
  
            .block3 {
              width: 307px;
              height: 166px;
              clip-path: polygon(5% 2%, 100% 3%, 98% 99%, 3% 99%);
              top: 177px;
              left: 797px;
            }
            .download-div {
            display: none;
        }
            @media only screen and (max-width: 600px) {
            .download-div {
                display: inline-block;
            }
        }
        .download-div{
          background-color: transparent !important;
        }
      </style>
      <div class="centro">
          <div class="block10 block" id="block10" onclick="openBlockModal('block10Modal')">
              <span>Block 10</span>
          </div>
          <div id="div8" class="download-div block10 block" onclick="downloadImage('{{ asset('storage/maps/green-park-block-10.png') }}')"></div>

          <div class="block8 block" id="block8" onclick="openBlockModal('block8Modal')">
              <span>Block 8</span>
          </div>
          <div id="div6" class="download-div block8 block" onclick="downloadImage('{{ asset('storage/maps/green-park-block-8.png') }}')"></div>

          <div class="block6 block" id="block6" onclick="openBlockModal('block6Modal')">
              <span>Block 6</span>
          </div>
          <div id="div4" class="download-div block block6" onclick="downloadImage('{{ asset('storage/maps/green-park-block-6.png') }}')"></div>

          <div class="block4 block" id="block4" onclick="openBlockModal('block4Modal')">
              <span>Block 4</span>
          </div>
          <div id="div2" class="download-div block block4" onclick="downloadImage('{{ asset('storage/maps/green-park-block-4.png') }}')"></div>
          <div class="block9 block" id="block9" onclick="openBlockModal('block9Modal')">
            <span>Block 9</span>
          </div>
          <div id="div7" class="download-div block block9" onclick="downloadImage('{{ asset('storage/maps/green-park-block-9.png') }}')"></div>
          <div class="block7 block" id="block7" onclick="openBlockModal('block7Modal')">
              <span>Block 7</span>
          </div>
          <div id="div5" class="download-div block block7" onclick="downloadImage('{{ asset('storage/maps/green-park-block-7.png') }}')"></div>

          <div class="block5 block" id="block5"  onclick="openBlockModal('block5Modal')">
              <span>Block 5</span>
          </div>
          <div id="div3" class="download-div block block5" onclick="downloadImage('{{ asset('storage/maps/green-park-block-5.png') }}')"></div>
          <div class="block3 block" id="block3" onclick="openBlockModal('block3Modal')">
              <span>Block 3</span>
          </div>
          <div id="div1" class="download-div block block3" onclick="downloadImage('{{ asset('storage/maps/green-park-block-3.png') }}')"></div>
      </div>
      <div class="bottomline">
          <div class="line3" id="">
            <div class="plot square plot-1-28" onclick="showPlotDetails(1, '28')">28</div>
            <div class="plot square plot-1-27" onclick="showPlotDetails(1, '27')">27</div>
            <div class="plot square plot-1-26" onclick="showPlotDetails(1, '26')">26</div>
            <div class="plot square plot-1-25" onclick="showPlotDetails(1, '25')">25</div>
            <div class="plot square plot-1-24" onclick="showPlotDetails(1, '24')">24</div>
            <div class="plot square plot-1-23" onclick="showPlotDetails(1, '23')">23</div>
            <div class="plot square plot-1-22" onclick="showPlotDetails(1, '22')">22</div>
            <div class="plot square plot-1-21" onclick="showPlotDetails(1, '21')">21</div>
            <div class="plot square plot-1-20" onclick="showPlotDetails(1, '20')">20</div>
            <div class="plot square plot-1-19" onclick="showPlotDetails(1, '19')">19</div>
            <div class="plot square plot-1-18" onclick="showPlotDetails(1, '18')">18</div>
            <div class="plot square plot-1-17" onclick="showPlotDetails(1, '17')">17</div>
            <div class="plot square plot-1-16" onclick="showPlotDetails(1, '16')">16</div>
            <div class="plot square plot-1-15" onclick="showPlotDetails(1, '15')">15</div>
            <div class="plot square plot-1-14" onclick="showPlotDetails(1, '14')">14</div>
            <div class="plot square plot-1-13" onclick="showPlotDetails(1, '13')">13</div>
            <div class="plot square plot-1-12" onclick="showPlotDetails(1, '12')">12</div>
            <div class="plot square plot-1-11" onclick="showPlotDetails(1, '11')">11</div>
            <div class="plot square plot-1-10" onclick="showPlotDetails(1, '10')">10</div>
            <div class="plot square plot-1-9" onclick="showPlotDetails(1, '9')">9</div>
            <div class="plot square plot-1-8" onclick="showPlotDetails(1, '8')">8</div>
            <div class="plot square plot-1-7" onclick="showPlotDetails(1, '7')">7</div>
            <div class="plot square plot-1-6" onclick="showPlotDetails(1, '6')">6</div>
            <div class="plot square plot-1-5" onclick="showPlotDetails(1, '5')">5</div>
            <div class="plot square plot-1-4" onclick="showPlotDetails(1, '4')">4</div>
            
          </div>
          <div class="line4">
            <div class="plot square plot-1-2" onclick="showPlotDetails(1, '2')">2</div>
            <div class="plot square plot-1-1" onclick="showPlotDetails(1, '1')">1</div>
          </div>
      </div>
      <div class="bottomline2">
        <div class="line3" id="">
          <div class="plot square plot-20-34" onclick="showPlotDetails(20, '34')">34</div>
          <div class="plot square plot-20-33" onclick="showPlotDetails(20, '33')">33</div>
          <div class="plot square plot-20-32" onclick="showPlotDetails(20, '32')">32</div>
          <div class="plot square plot-20-31" onclick="showPlotDetails(20, '31')">31</div>
          <div class="plot square plot-20-30" onclick="showPlotDetails(20, '30')">30</div>
          <div class="plot square plot-20-29" onclick="showPlotDetails(20, '29')">29</div>
          <div class="plot square plot-20-28" onclick="showPlotDetails(20, '28')">28</div>
          <div class="plot square plot-20-27" onclick="showPlotDetails(20, '27')">27</div>
          <div class="plot square plot-20-26" onclick="showPlotDetails(20, '26')">26</div>
          <div class="plot square plot-20-25" onclick="showPlotDetails(20, '25')">25</div>
          <div class="plot square plot-20-24" onclick="showPlotDetails(20, '24')">24</div>
          <div class="plot square plot-20-23" onclick="showPlotDetails(20, '23')">23</div>
          <div class="plot square plot-20-22" onclick="showPlotDetails(20, '22')">22</div>
          <div class="plot square plot-20-21" onclick="showPlotDetails(20, '21')">21</div>
          <div class="plot square plot-20-20" onclick="showPlotDetails(20, '20')">20</div>
          <div class="plot square plot-20-19" onclick="showPlotDetails(20, '19')">19</div>
          <div class="plot square plot-20-18" onclick="showPlotDetails(20, '18')">18</div>
          <div class="plot square plot-20-17" onclick="showPlotDetails(20, '17')">17</div>
          <div class="plot square plot-20-16" onclick="showPlotDetails(20, '16')">16</div>
          <div class="plot square plot-20-15" onclick="showPlotDetails(20, '15')">15</div>
          <div class="plot square plot-20-14" onclick="showPlotDetails(20, '14')">14</div>
          <div class="plot square plot-20-13" onclick="showPlotDetails(20, '13')">13</div>
          <div class="plot square plot-20-12" onclick="showPlotDetails(20, '12')">12</div>
          <div class="plot square plot-20-11" onclick="showPlotDetails(20, '11')">11</div>
          <div class="plot square plot-20-10" onclick="showPlotDetails(20, '10')">10</div>
          <div class="plot square plot-20-9" onclick="showPlotDetails(20, '9')">9</div>
          <div class="plot square plot-20-8" onclick="showPlotDetails(20, '8')">8</div>
          <div class="plot square plot-20-7" onclick="showPlotDetails(20, '7')">7</div>
          <div class="plot square plot-20-6" onclick="showPlotDetails(20, '6')">6</div>
          <div class="plot square plot-20-5" onclick="showPlotDetails(20, '5')">5</div>
          <div class="plot square plot-20-4" onclick="showPlotDetails(20, '4')">4</div>
          <div class="plot square plot-20-3" onclick="showPlotDetails(20, '3')">3</div>
          <div class="plot square plot-20-2" onclick="showPlotDetails(20, '2')">2</div>
          <div class="plot square plot-20-1" onclick="showPlotDetails(20, '1')">1</div>
          
          
        </div>
    </div>
    <div class="bottomline3">
      <div class="line13" id="">
        <div class="plot square plot-23-32" onclick="showPlotDetails(23, '32')">32</div>
        <div class="plot square plot-23-31" onclick="showPlotDetails(23, '31')">31</div>
        <div class="plot square plot-23-30" onclick="showPlotDetails(23, '30')">30</div>
        <div class="plot square plot-23-29" onclick="showPlotDetails(23, '29')">29</div>
        <div class="plot square plot-23-28" onclick="showPlotDetails(23, '28')">28</div>
        <div class="plot square plot-23-27" onclick="showPlotDetails(23, '27')">27</div>
        <div class="plot square plot-23-26" onclick="showPlotDetails(23, '26')">26</div>
        <div class="plot square plot-23-25" onclick="showPlotDetails(23, '25')">25</div>
        <div class="plot square plot-23-24" onclick="showPlotDetails(23, '24')">24</div>
        <div class="plot square plot-23-23" onclick="showPlotDetails(23, '23')">23</div>
        <div class="plot square plot-23-22" onclick="showPlotDetails(23, '22')">22</div>
        <div class="plot square plot-23-21" onclick="showPlotDetails(23, '21')">21</div>
        <div class="plot square plot-23-20" onclick="showPlotDetails(23, '20')">20</div>
        <div class="plot square plot-23-19" onclick="showPlotDetails(23, '19')">19</div>
        <div class="plot square plot-23-18" onclick="showPlotDetails(23, '18')">18</div>
        <div class="plot square plot-23-17" onclick="showPlotDetails(23, '17')">17</div>
        <div class="plot square plot-23-16" onclick="showPlotDetails(23, '16')">16</div>
        <div class="plot square plot-23-15" onclick="showPlotDetails(23, '15')">15</div>
        <div class="plot square plot-23-14" onclick="showPlotDetails(23, '14')">14</div>
        <div class="plot square plot-23-13" onclick="showPlotDetails(23, '13')">13</div>
        <div class="plot square plot-23-12" onclick="showPlotDetails(23, '12')">12</div>
        <div class="plot square plot-23-11" onclick="showPlotDetails(23, '11')">11</div>
        <div class="plot square plot-23-10" onclick="showPlotDetails(23, '10')">10</div>
        <div class="plot square plot-23-9" onclick="showPlotDetails(23, '9')">9</div>
        <div class="plot square plot-23-8" onclick="showPlotDetails(23, '8')">8</div>
        <div class="plot square plot-23-7" onclick="showPlotDetails(23, '7')">7</div>
        <div class="plot square plot-23-6" onclick="showPlotDetails(23, '6')">6</div>
        <div class="plot square plot-23-5" onclick="showPlotDetails(23, '5')">5</div>
        <div class="plot square plot-23-4" onclick="showPlotDetails(23, '4')">4</div>
        <div class="plot square plot-23-3" onclick="showPlotDetails(23, '3')">3</div>
        <div class="plot square plot-23-2" onclick="showPlotDetails(23, '2')">2</div>
        <div class="plot square plot-23-1" onclick="showPlotDetails(23, '1')">1</div>
        
        
        
      </div>
  </div>
  <div class="bottomline4">
    <div class="line3" id="">
      <div class="plot square plot-21-34" onclick="showPlotDetails(21, '34')">34</div>
      <div class="plot square plot-21-33" onclick="showPlotDetails(21, '33')">33</div>
      <div class="plot square plot-21-32" onclick="showPlotDetails(21, '32')">32</div>
      <div class="plot square plot-21-31" onclick="showPlotDetails(21, '31')">31</div>
      <div class="plot square plot-21-30" onclick="showPlotDetails(21, '30')">30</div>
      <div class="plot square plot-21-29" onclick="showPlotDetails(21, '29')">29</div>
      <div class="plot square plot-21-28" onclick="showPlotDetails(21, '28')">28</div>
      <div class="plot square plot-21-27" onclick="showPlotDetails(21, '27')">27</div>
      <div class="plot square plot-21-26" onclick="showPlotDetails(21, '26')">26</div>
      <div class="plot square plot-21-25" onclick="showPlotDetails(21, '25')">25</div>
      <div class="plot square plot-21-24" onclick="showPlotDetails(21, '24')">24</div>
      <div class="plot square plot-21-23" onclick="showPlotDetails(21, '23')">23</div>
      <div class="plot square plot-21-22" onclick="showPlotDetails(21, '22')">22</div>
      <div class="plot square plot-21-21" onclick="showPlotDetails(21, '21')">21</div>
      <div class="plot square plot-21-20" onclick="showPlotDetails(21, '20')">20</div>
      <div class="plot square plot-21-19" onclick="showPlotDetails(21, '19')">19</div>
      <div class="plot square plot-21-18" onclick="showPlotDetails(21, '18')">18</div>
      <div class="plot square plot-21-17" onclick="showPlotDetails(21, '17')">17</div>
      <div class="plot square plot-21-16" onclick="showPlotDetails(21, '16')">16</div>
      <div class="plot square plot-21-15" onclick="showPlotDetails(21, '15')">15</div>
      <div class="plot square plot-21-14" onclick="showPlotDetails(21, '14')">14</div>
      <div class="plot square plot-21-13" onclick="showPlotDetails(21, '13')">13</div>
      <div class="plot square plot-21-12" onclick="showPlotDetails(21, '12')">12</div>
      <div class="plot square plot-21-11" onclick="showPlotDetails(21, '11')">11</div>
      <div class="plot square plot-21-10" onclick="showPlotDetails(21, '10')">10</div>
      <div class="plot square plot-21-9" onclick="showPlotDetails(21, '9')">9</div>
      <div class="plot square plot-21-8" onclick="showPlotDetails(21, '8')">8</div>
      <div class="plot square plot-21-7" onclick="showPlotDetails(21, '7')">7</div>
      <div class="plot square plot-21-6" onclick="showPlotDetails(21, '6')">6</div>
      <div class="plot square plot-21-5" onclick="showPlotDetails(21, '5')">5</div>
      <div class="plot square plot-21-4" onclick="showPlotDetails(21, '4')">4</div>
      <div class="plot square plot-21-3" onclick="showPlotDetails(21, '3')">3</div>
      <div class="plot square plot-21-2" onclick="showPlotDetails(21, '2')">2</div>
      <div class="plot square plot-21-1" onclick="showPlotDetails(21, '1')">1</div>
      
      
      
      
    </div>
</div>
      <div style="display: none;" class="block11"id="block11"></div>
      <div style="display: none;" class="block1"id="block1"></div>
      <div style="display: none;" class="block2"id="block2"></div>
      <div style="display: none;" class="block12" id="block12"></div>
      <div style="display: none;" class="block13" id="block13"></div>
      <div style="display: none;" class="block14" id="block14"></div>
      <div style="display: none;" class="block15" id="block15"></div>
      <div style="display: none;" class="block16" id="block16"></div>
      <div style="display: none;" class="block17" id="block17"></div>
      <div style="display: none;" class="block18" id="block18"></div>
      <div style="display: none;" class="block19" id="block19"></div>
      <div style="display: none;" class="block20" id="block20"></div>
      <div style="display: none;" class="block21" id="block21"></div>
      <div style="display: none;" class="block22" id="block22"></div>
      <div style="display: none;" class="block23" id="block23"></div>
      <div style="display: none;" class="block24" id="block24"></div>
      <div style="display: none;" class="block25" id="block25"></div>
      <div style="display: none;" class="block26" id="block26"></div>
      <div style="display: none;" class="block27" id="block27"></div>
      <div style="display: none;" class="block28" id="block28"></div>
      <div style="display: none;" class="block29" id="block29"></div>
      <div style="display: none;" class="block30" id="block30"></div>
      
      <div class="kanto1">
          <div class="line5 " >
            <div class="plot square plot-11-1" onclick="showPlotDetails(11, '1')">1</div>
            <div class="plot square plot-11-2" onclick="showPlotDetails(11, '2')">2</div>
            <div class="plot square plot-11-3" onclick="showPlotDetails(11, '3')">3</div>
            <div class="plot square plot-11-4" onclick="showPlotDetails(11, '4')">4</div>
            <div class="plot square plot-11-5" onclick="showPlotDetails(11, '5')">5</div>
            <div class="plot square plot-11-6" onclick="showPlotDetails(11, '6')">6</div>
            <div class="plot square plot-11-7" onclick="showPlotDetails(11, '7')">7</div>
            <div class="plot square plot-11-8" onclick="showPlotDetails(11, '8')">8</div>
            <div class="plot square plot-11-9" onclick="showPlotDetails(11, '9')">9</div>
            <div class="plot square plot-11-10" onclick="showPlotDetails(11, '10')">10</div>
            <div class="plot square plot-11-11" onclick="showPlotDetails(11, '11')">11</div>
          </div>
          <div class="line6 " >
            <div class="plot square plot-11-13" onclick="showPlotDetails(11, '13')">13</div>
            <div class="plot square plot-11-14" onclick="showPlotDetails(11, '14')">14</div>
          </div>
          <div class="line7 ">
              <div class="plot square3 plot-11-12" onclick="showPlotDetails(11, '12')"><span class="twelve" >12</span></div>
          </div>
      </div>
      
      <div class="kanto2">
          <div class="line9 " id="">
            <div class="plot square2 plot-12-1" onclick="showPlotDetails(12, '1')">1</div>

            <div class="plot square2 plot-12-1" onclick="showPlotDetails(12, '1')">1</div>
            <div class="plot square2 plot-12-2" onclick="showPlotDetails(12, '2')">2</div>
            <div class="plot square2 plot-12-3" onclick="showPlotDetails(12, '3')">3</div>
            <div class="plot square2 plot-12-4" onclick="showPlotDetails(12, '4')">4</div>
            <div class="plot square2 plot-12-5" onclick="showPlotDetails(12, '5')">5</div>
            <div class="plot square2 plot-12-6" onclick="showPlotDetails(12, '6')">6</div>
            <div class="plot square2 plot-12-7" onclick="showPlotDetails(12, '7')">7</div>
            <div class="plot square2 plot-12-8" onclick="showPlotDetails(12, '8')">8</div>
            <div class="plot square2 plot-12-9" onclick="showPlotDetails(12, '9')">9</div>
            <div class="plot square2 plot-12-10" onclick="showPlotDetails(12, '10')">10</div>
            <div class="plot square2 plot-12-11" onclick="showPlotDetails(12, '11')">11</div>
            <div class="plot square2 plot-12-12" onclick="showPlotDetails(12, '12')">12</div>
            <div class="plot square2 plot-12-13" onclick="showPlotDetails(12, '13')">13</div>
          </div>
          <div class="line8 " id="">
            <div class="plot square2 plot-12-14" onclick="showPlotDetails(12, '14')">14</div>
            <div class="plot square2 plot-12-15" onclick="showPlotDetails(12, '15')">15</div>
            <div class="plot square2 plot-12-16" onclick="showPlotDetails(12, '16')">16</div>
            <div class="plot square2 plot-12-17" onclick="showPlotDetails(12, '17')">17</div>
          </div>

      </div>
      <div class="kanto3">
        <div class="line11 " id="">
          <div class="plot square2 plot-22-1" onclick="showPlotDetails(22, '1')">1</div>
          <div class="plot square2 plot-22-2" onclick="showPlotDetails(22, '2')">2</div>
          <div class="plot square2 plot-22-3" onclick="showPlotDetails(22, '3')">3</div>
          <div class="plot square2 plot-22-4" onclick="showPlotDetails(22, '4')">4</div>
          <div class="plot square2 plot-22-5" onclick="showPlotDetails(22, '5')">5</div>
          <div class="plot square2 plot-22-6" onclick="showPlotDetails(22, '6')">6</div>          
        </div>

    </div>
  </div>
</div >
</div>
</div>

        </div>

        </div>
        </div>
<!-- Add these inside the container5 div -->

<!-- Modal HTML for Block 10 -->
<div id="block10Modal" class="modal">
  <div class="modal-content-map">
    <span>Block 10 Plots</span> <span class="close" onclick="closeModal('block10Modal')">&times;</span>
    <div class="modal-center">
      <style>
              .road10{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    position: relative;
      }
      </style>
        
      <div class="road10">

      
      </div>
              
    
      <hr style="color: black; width: 79%;" >
      <div class="ped">PEDESTRIAN SIDEWALK</div>
      <hr style="color: black; width: 79%;" >
      <b>GREEN PARK MEMORIAL GARDEN</b>
      <b>BLOCK 10</b>
      <hr style="color: black; width: 79%; margin-top: 40px;" >
      <div class="ped">PEDESTRIAN SIDEWALK</div>
      <hr style="color: black; width: 79%;" >
      <div class="plots_con b10 rotator">
        <div class="plot plot-10-1" onclick="showPlotDetails(10, '1')">1</div>
        <div class="plot plot-10-2" onclick="showPlotDetails(10, '2')">2</div>
        <div class="plot plot-10-3" onclick="showPlotDetails(10, '3')">3</div>
        <div class="plot plot-10-4" onclick="showPlotDetails(10, '4')">4</div>
        <div class="plot plot-10-5" onclick="showPlotDetails(10, '5')">5</div>
        <div class="plot plot-10-6" onclick="showPlotDetails(10, '6')">6</div>
        <div class="plot plot-10-7" onclick="showPlotDetails(10, '7')">7</div>
        <div class="plot plot-10-8" onclick="showPlotDetails(10, '8')">8</div>
        <div class="plot plot-10-9" onclick="showPlotDetails(10, '9')">9</div>
        <div class="plot plot-10-10" onclick="showPlotDetails(10, '10')">10</div>
        <div class="plot plot-10-11" onclick="showPlotDetails(10, '11')">11</div>
        <div class="plot plot-10-12" onclick="showPlotDetails(10, '12')">12</div>
        <div class="plot plot-10-13" onclick="showPlotDetails(10, '13')">13</div>
        <div class="plot plot-10-14" onclick="showPlotDetails(10, '14')">14</div>
        <div class="plot plot-10-15" onclick="showPlotDetails(10, '15')">15</div>
        <div class="plot plot-10-16" onclick="showPlotDetails(10, '16')">16</div>
        <div class="plot plot-10-17" onclick="showPlotDetails(10, '17')">17</div>
        <div class="plot plot-10-18" onclick="showPlotDetails(10, '18')">18</div>
        <div class="plot plot-10-19" onclick="showPlotDetails(10, '19')">19</div>
        <div class="plot plot-10-20" onclick="showPlotDetails(10, '20')">20</div>
        <div class="plot plot-10-21" onclick="showPlotDetails(10, '21')">21</div>
        <div class="plot plot-10-22" onclick="showPlotDetails(10, '22')">22</div>
        <div class="plot plot-10-23" onclick="showPlotDetails(10, '23')">23</div>
        <div class="plot plot-10-24" onclick="showPlotDetails(10, '24')">24</div>
        <div class="plot plot-10-25" onclick="showPlotDetails(10, '25')">25</div>
        <div class="plot plot-10-26" onclick="showPlotDetails(10, '26')">26</div>
        <div class="plot plot-10-27" onclick="showPlotDetails(10, '27')">27</div>
        <div class="plot plot-10-28" onclick="showPlotDetails(10, '28')">28</div>
        <div class="plot plot-10-29" onclick="showPlotDetails(10, '29')">29</div>
        <div class="plot plot-10-30" onclick="showPlotDetails(10, '30')">30</div>
        <div class="plot plot-10-31" onclick="showPlotDetails(10, '31')">31</div>
        <div class="plot plot-10-32" onclick="showPlotDetails(10, '32')">32</div>
        <div class="plot plot-10-33" onclick="showPlotDetails(10, '33')">33</div>
        <div class="plot plot-10-34" onclick="showPlotDetails(10, '34')">34</div>
        <div class="plot plot-10-35" onclick="showPlotDetails(10, '35')">35</div>
        <div class="plot plot-10-36" onclick="showPlotDetails(10, '36')">36</div>
        <div class="plot plot-10-37" onclick="showPlotDetails(10, '37')">37</div>
        <div class="plot plot-10-38" onclick="showPlotDetails(10, '38')">38</div>
        <div class="plot plot-10-39" onclick="showPlotDetails(10, '39')">39</div>
        <div class="plot plot-10-40" onclick="showPlotDetails(10, '40')">40</div>
        <div class="plot plot-10-41" onclick="showPlotDetails(10, '41')">41</div>
        <div class="plot plot-10-42" onclick="showPlotDetails(10, '42')">42</div>
        <div class="plot plot-10-43" onclick="showPlotDetails(10, '43')">43</div>
        <div class="plot plot-10-44" onclick="showPlotDetails(10, '44')">44</div>
        <div class="plot plot-10-45" onclick="showPlotDetails(10, '45')">45</div>
        <div class="plot plot-10-46" onclick="showPlotDetails(10, '46')">46</div>
        <div class="plot plot-10-47" onclick="showPlotDetails(10, '47')">47</div>
        <div class="plot plot-10-48" onclick="showPlotDetails(10, '48')">48</div>
        <div class="plot plot-10-49" onclick="showPlotDetails(10, '49')">49</div>
        <div class="plot plot-10-50" onclick="showPlotDetails(10, '50')">50</div>
        <div class="plot plot-10-51" onclick="showPlotDetails(10, '51')">51</div>
        <div class="plot plot-10-52" onclick="showPlotDetails(10, '52')">52</div>
        <div class="plot plot-10-53" onclick="showPlotDetails(10, '53')">53</div>
        <div class="plot plot-10-54" onclick="showPlotDetails(10, '54')">54</div>
        <div class="plot plot-10-55" onclick="showPlotDetails(10, '55')">55</div>
        <div class="plot plot-10-56" onclick="showPlotDetails(10, '56')">56</div>
        <div class="plot plot-10-57" onclick="showPlotDetails(10, '57')">57</div>
        <div class="plot plot-10-58" onclick="showPlotDetails(10, '58')">58</div>
        <div class="plot plot-10-59" onclick="showPlotDetails(10, '59')">59</div>
        <div class="plot plot-10-60" onclick="showPlotDetails(10, '60')">60</div>
        <div class="plot plot-10-61" onclick="showPlotDetails(10, '61')">61</div>
        <div class="plot plot-10-62" onclick="showPlotDetails(10, '62')">62</div>
        <div class="plot plot-10-63" onclick="showPlotDetails(10, '63')">63</div>
        <div class="plot plot-10-64" onclick="showPlotDetails(10, '64')">64</div>
        <div class="plot plot-10-65" onclick="showPlotDetails(10, '65')">65</div>
        <div class="plot plot-10-66" onclick="showPlotDetails(10, '66')">66</div>
        <div class="plot plot-10-67" onclick="showPlotDetails(10, '67')">67</div>
        <div class="plot plot-10-68" onclick="showPlotDetails(10, '68')">68</div>
        <div class="plot plot-10-69" onclick="showPlotDetails(10, '69')">69</div>
        <div class="plot plot-10-70" onclick="showPlotDetails(10, '70')">70</div>
        <div class="plot plot-10-71" onclick="showPlotDetails(10, '71')">71</div>
        <div class="plot plot-10-72" onclick="showPlotDetails(10, '72')">72</div>
        <div class="plot plot-10-73" onclick="showPlotDetails(10, '73')">73</div>
        <div class="plot plot-10-74" onclick="showPlotDetails(10, '74')">74</div>
        <div class="plot plot-10-75" onclick="showPlotDetails(10, '75')">75</div>
        <div class="plot plot-10-76" onclick="showPlotDetails(10, '76')">76</div>
        <div class="plot plot-10-77" onclick="showPlotDetails(10, '77')">77</div>
        <div class="plot plot-10-78" onclick="showPlotDetails(10, '78')">78</div>
        <div class="plot plot-10-79" onclick="showPlotDetails(10, '79')">79</div>
        <div class="plot plot-10-80" onclick="showPlotDetails(10, '80')">80</div>
        <div class="plot plot-10-81" onclick="showPlotDetails(10, '81')">81</div>
        <div class="plot plot-10-82" onclick="showPlotDetails(10, '82')">82</div>
        <div class="plot plot-10-83" onclick="showPlotDetails(10, '83')">83</div>
        <div class="plot plot-10-84" onclick="showPlotDetails(10, '84')">84</div>
        <div class="plot plot-10-85" onclick="showPlotDetails(10, '85')">85</div>
        <div class="plot plot-10-86" onclick="showPlotDetails(10, '86')">86</div>
        <div class="plot plot-10-87" onclick="showPlotDetails(10, '87')">87</div>
        <div class="plot plot-10-88" onclick="showPlotDetails(10, '88')">88</div>
        <div class="plot plot-10-89" onclick="showPlotDetails(10, '89')">89</div>
        <div class="plot plot-10-90" onclick="showPlotDetails(10, '90')">90</div>
        <div class="plot plot-10-91" onclick="showPlotDetails(10, '91')">91</div>
        <div class="plot plot-10-92" onclick="showPlotDetails(10, '92')">92</div>
        <div class="plot plot-10-93" onclick="showPlotDetails(10, '93')">93</div>
        <div class="plot plot-10-94" onclick="showPlotDetails(10, '94')">94</div>
        <div class="plot plot-10-95" onclick="showPlotDetails(10, '95')">95</div>
        <div class="plot plot-10-96" onclick="showPlotDetails(10, '96')">96</div>
        <div class="plot plot-10-97" onclick="showPlotDetails(10, '97')">97</div>
        <div class="plot plot-10-98" onclick="showPlotDetails(10, '98')">98</div>
        <div class="plot plot-10-99" onclick="showPlotDetails(10, '99')">99</div>
        <div class="plot plot-10-100" onclick="showPlotDetails(10, '100')">100</div>
        <div class="plot plot-10-101" onclick="showPlotDetails(10, '101')">101</div>
        <div class="plot plot-10-102" onclick="showPlotDetails(10, '102')">102</div>
        <div class="plot plot-10-103" onclick="showPlotDetails(10, '103')">103</div>
        <div class="plot plot-10-104" onclick="showPlotDetails(10, '104')">104</div>
        <div class="plot plot-10-105" onclick="showPlotDetails(10, '105')">105</div>
        <div class="plot plot-10-106" onclick="showPlotDetails(10, '106')">106</div>
        <div class="plot plot-10-107" onclick="showPlotDetails(10, '107')">107</div>
        <div class="plot plot-10-108" onclick="showPlotDetails(10, '108')">108</div>
        <div class="plot plot-10-109" onclick="showPlotDetails(10, '109')">109</div>
        <div class="plot plot-10-110" onclick="showPlotDetails(10, '110')">110</div>
        <div class="plot plot-10-111" onclick="showPlotDetails(10, '111')">111</div>
        <div class="plot plot-10-112" onclick="showPlotDetails(10, '112')">112</div>
        <div class="plot plot-10-113" onclick="showPlotDetails(10, '113')">113</div>
        <div class="plot plot-10-114" onclick="showPlotDetails(10, '114')">114</div>
        <div class="plot plot-10-115" onclick="showPlotDetails(10, '115')">115</div>
        <div class="plot plot-10-116" onclick="showPlotDetails(10, '116')">116</div>
        <div class="plot plot-10-117" onclick="showPlotDetails(10, '117')">117</div>
        <div class="plot plot-10-118" onclick="showPlotDetails(10, '118')">118</div>
        <div class="plot plot-10-119" onclick="showPlotDetails(10, '119')">119</div>
        <div class="plot plot-10-120" onclick="showPlotDetails(10, '120')">120</div>
        <div class="plot plot-10-121" onclick="showPlotDetails(10, '121')">121</div>
        <div class="plot plot-10-122" onclick="showPlotDetails(10, '122')">122</div>
        <div class="plot plot-10-123" onclick="showPlotDetails(10, '123')">123</div>
        <div class="plot plot-10-124" onclick="showPlotDetails(10, '124')">124</div>
        <div class="plot plot-10-125" onclick="showPlotDetails(10, '125')">125</div>
        <div class="plot plot-10-126" onclick="showPlotDetails(10, '126')">126</div>
        <div class="plot plot-10-127" onclick="showPlotDetails(10, '127')">127</div>
        <div class="plot plot-10-128" onclick="showPlotDetails(10, '128')">128</div>
        <div class="plot plot-10-129" onclick="showPlotDetails(10, '129')">129</div>
        <div class="plot plot-10-130" onclick="showPlotDetails(10, '130')">130</div>
        <div class="plot plot-10-131" onclick="showPlotDetails(10, '131')">131</div>
        <div class="plot plot-10-132" onclick="showPlotDetails(10, '132')">132</div>
        <div class="plot plot-10-133" onclick="showPlotDetails(10, '133')">133</div>
        <div class="plot plot-10-134" onclick="showPlotDetails(10, '134')">134</div>
        <div class="plot plot-10-135" onclick="showPlotDetails(10, '135')">135</div>
        <div class="plot plot-10-136" onclick="showPlotDetails(10, '136')">136</div>
        <div class="plot plot-10-137" onclick="showPlotDetails(10, '137')">137</div>
        <div class="plot plot-10-138" onclick="showPlotDetails(10, '138')">138</div>
        <div class="plot plot-10-139" onclick="showPlotDetails(10, '139')">139</div>
        <div class="plot plot-10-140" onclick="showPlotDetails(10, '140')">140</div>
        <div class="plot plot-10-141" onclick="showPlotDetails(10, '141')">141</div>
        <div class="plot plot-10-142" onclick="showPlotDetails(10, '142')">142</div>
        <div class="plot plot-10-143" onclick="showPlotDetails(10, '143')">143</div>
        <div class="plot plot-10-144" onclick="showPlotDetails(10, '144')">144</div>
        <div class="plot plot-10-145" onclick="showPlotDetails(10, '145')">145</div>
        <div class="plot plot-10-146" onclick="showPlotDetails(10, '146')">146</div>
        <div class="plot plot-10-147" onclick="showPlotDetails(10, '147')">147</div>
        <div class="plot plot-10-148" onclick="showPlotDetails(10, '148')">148</div>
        <div class="plot plot-10-149" onclick="showPlotDetails(10, '149')">149</div>
        <div class="plot plot-10-150" onclick="showPlotDetails(10, '150')">150</div>
        <div class="plot plot-10-151" onclick="showPlotDetails(10, '151')">151</div>
        <div class="plot plot-10-152" onclick="showPlotDetails(10, '152')">152</div>
        <div class="plot plot-10-153" onclick="showPlotDetails(10, '153')">153</div>
        <div class="plot plot-10-154" onclick="showPlotDetails(10, '154')">154</div>
        <div class="plot plot-10-155" onclick="showPlotDetails(10, '155')">155</div>
        <div class="plot plot-10-156" onclick="showPlotDetails(10, '156')">156</div>
        <div class="plot plot-10-157" onclick="showPlotDetails(10, '157')">157</div>
        <div class="plot plot-10-158" onclick="showPlotDetails(10, '158')">158</div>
        <div class="plot plot-10-159" onclick="showPlotDetails(10, '159')">159</div>
        <div class="plot plot-10-160" onclick="showPlotDetails(10, '160')">160</div>
        <div class="plot plot-10-161" onclick="showPlotDetails(10, '161')">161</div>
        <div class="plot plot-10-162" onclick="showPlotDetails(10, '162')">162</div>
        <div class="plot plot-10-163" onclick="showPlotDetails(10, '163')">163</div>
        <div class="plot plot-10-164" onclick="showPlotDetails(10, '164')">164</div>
        <div class="plot plot-10-165" onclick="showPlotDetails(10, '165')">165</div>
        <div class="plot plot-10-166" onclick="showPlotDetails(10, '166')">166</div>
        <div class="plot plot-10-167" onclick="showPlotDetails(10, '167')">167</div>
        <div class="plot plot-10-168" onclick="showPlotDetails(10, '168')">168</div>
        <div class="plot plot-10-169" onclick="showPlotDetails(10, '169')">169</div>
        <div class="plot plot-10-170" onclick="showPlotDetails(10, '170')">170</div>
        <div class="plot plot-10-171" onclick="showPlotDetails(10, '171')">171</div>
        <div class="plot plot-10-172" onclick="showPlotDetails(10, '172')">172</div>
        <div class="plot plot-10-173" onclick="showPlotDetails(10, '173')">173</div>
        <div class="plot plot-10-174" onclick="showPlotDetails(10, '174')">174</div>
        <div class="plot plot-10-175" onclick="showPlotDetails(10, '175')">175</div>
        <div class="plot plot-10-176" onclick="showPlotDetails(10, '176')">176</div>
        <div class="plot plot-10-177" onclick="showPlotDetails(10, '177')">177</div>
        <div class="plot plot-10-178" onclick="showPlotDetails(10, '178')">178</div>
        <div class="plot plot-10-179" onclick="showPlotDetails(10, '179')">179</div>
        <div class="plot plot-10-180" onclick="showPlotDetails(10, '180')">180</div>
        <div class="plot plot-10-181" onclick="showPlotDetails(10, '181')">181</div>
        <div class="plot plot-10-182" onclick="showPlotDetails(10, '182')">182</div>
        <div class="plot plot-10-183" onclick="showPlotDetails(10, '183')">183</div>
        <div class="plot plot-10-184" onclick="showPlotDetails(10, '184')">184</div>
        <div class="plot plot-10-185" onclick="showPlotDetails(10, '185')">185</div>
        <div class="plot plot-10-186" onclick="showPlotDetails(10, '186')">186</div>
        <div class="plot plot-10-187" onclick="showPlotDetails(10, '187')">187</div>
        <div class="plot plot-10-188" onclick="showPlotDetails(10, '188')">188</div>
        <div class="plot plot-10-189" onclick="showPlotDetails(10, '189')">189</div>
        <div class="plot plot-10-190" onclick="showPlotDetails(10, '190')">190</div>
        <div class="plot plot-10-191" onclick="showPlotDetails(10, '191')">191</div>
        <div class="plot plot-10-192" onclick="showPlotDetails(10, '192')">192</div>
        <div class="plot plot-10-193" onclick="showPlotDetails(10, '193')">193</div>
        <div class="plot plot-10-194" onclick="showPlotDetails(10, '194')">194</div>
        <div class="plot plot-10-195" onclick="showPlotDetails(10, '195')">195</div>
        <div class="plot plot-10-196" onclick="showPlotDetails(10, '196')">196</div>
        <div class="plot plot-10-197" onclick="showPlotDetails(10, '197')">197</div>
        <div class="plot plot-10-198" onclick="showPlotDetails(10, '198')">198</div>
        <div class="plot plot-10-199" onclick="showPlotDetails(10, '199')">199</div>
        <div class="plot plot-10-200" onclick="showPlotDetails(10, '200')">200</div>
        <div class="plot plot-10-201" onclick="showPlotDetails(10, '201')">201</div>
        <div class="plot plot-10-202" onclick="showPlotDetails(10, '202')">202</div>
        <div class="plot plot-10-203" onclick="showPlotDetails(10, '203')">203</div>
        <div class="plot plot-10-204" onclick="showPlotDetails(10, '204')">204</div>
        <div class="plot plot-10-205" onclick="showPlotDetails(10, '205')">205</div>
        <div class="plot plot-10-206" onclick="showPlotDetails(10, '206')">206</div>
        <div class="plot plot-10-207" onclick="showPlotDetails(10, '207')">207</div>
        <div class="plot plot-10-208" onclick="showPlotDetails(10, '208')">208</div>
        <div class="plot plot-10-209" onclick="showPlotDetails(10, '209')">209</div>
        <div class="plot plot-10-210" onclick="showPlotDetails(10, '210')">210</div>
        <div class="plot plot-10-211" onclick="showPlotDetails(10, '211')">211</div>
        <div class="plot plot-10-212" onclick="showPlotDetails(10, '212')">212</div>
        <div class="plot plot-10-213" onclick="showPlotDetails(10, '213')">213</div>
        <div class="plot plot-10-214" onclick="showPlotDetails(10, '214')">214</div>
        <div class="plot plot-10-215" onclick="showPlotDetails(10, '215')">215</div>
        <div class="plot plot-10-216" onclick="showPlotDetails(10, '216')">216</div>
        <div class="plot plot-10-217" onclick="showPlotDetails(10, '217')">217</div>
        <div class="plot plot-10-218" onclick="showPlotDetails(10, '218')">218</div>
        <div class="plot plot-10-219" onclick="showPlotDetails(10, '219')">219</div>
        <div class="plot plot-10-220" onclick="showPlotDetails(10, '220')">220</div>
        <div class="plot plot-10-221" onclick="showPlotDetails(10, '221')">221</div>
        <div class="plot plot-10-222" onclick="showPlotDetails(10, '222')">222</div>
        <div class="plot plot-10-223" onclick="showPlotDetails(10, '223')">223</div>
        <div class="plot plot-10-224" onclick="showPlotDetails(10, '224')">224</div>
        <div class="plot plot-10-225" onclick="showPlotDetails(10, '225')">225</div>
        <div class="plot plot-10-226" onclick="showPlotDetails(10, '226')">226</div>
        <div class="plot plot-10-227" onclick="showPlotDetails(10, '227')">227</div>
        <div class="plot plot-10-228" onclick="showPlotDetails(10, '228')">228</div>
        <div class="plot plot-10-229" onclick="showPlotDetails(10, '229')">229</div>
        <div class="plot plot-10-230" onclick="showPlotDetails(10, '230')">230</div>
        <div class="plot plot-10-231" onclick="showPlotDetails(10, '231')">231</div>
        <div class="plot plot-10-232" onclick="showPlotDetails(10, '232')">232</div>
        <div class="plot plot-10-233" onclick="showPlotDetails(10, '233')">233</div>
        <div class="plot plot-10-234" onclick="showPlotDetails(10, '234')">234</div>
        <div class="plot plot-10-235" onclick="showPlotDetails(10, '235')">235</div>
        <div class="plot plot-10-236" onclick="showPlotDetails(10, '236')">236</div>
        <div class="plot plot-10-237" onclick="showPlotDetails(10, '237')">237</div>
        <div class="plot plot-10-238" onclick="showPlotDetails(10, '238')">238</div>
        <div class="plot plot-10-239" onclick="showPlotDetails(10, '239')">239</div>
        <div class="plot plot-10-240" onclick="showPlotDetails(10, '240')">240</div>
        <div class="plot plot-10-241" onclick="showPlotDetails(10, '241')">241</div>
        <div class="plot plot-10-242" onclick="showPlotDetails(10, '242')">242</div>
        <div class="plot plot-10-243" onclick="showPlotDetails(10, '243')">243</div>
        <div class="plot plot-10-244" onclick="showPlotDetails(10, '244')">244</div>
        <div class="plot plot-10-245" onclick="showPlotDetails(10, '245')">245</div>
        <div class="plot plot-10-246" onclick="showPlotDetails(10, '246')">246</div>
        <div class="plot plot-10-247" onclick="showPlotDetails(10, '247')">247</div>
        <div class="plot plot-10-248" onclick="showPlotDetails(10, '248')">248</div>
        <div class="plot plot-10-249" onclick="showPlotDetails(10, '249')">249</div>
        <div class="plot plot-10-250" onclick="showPlotDetails(10, '250')">250</div>
        <div class="plot plot-10-251" onclick="showPlotDetails(10, '251')">251</div>
        <div class="plot plot-10-252" onclick="showPlotDetails(10, '252')">252</div>
        <div class="plot plot-10-253" onclick="showPlotDetails(10, '253')">253</div>
        <div class="plot plot-10-254" onclick="showPlotDetails(10, '254')">254</div>
        <div class="plot plot-10-255" onclick="showPlotDetails(10, '255')">255</div>
        <div class="plot plot-10-256" onclick="showPlotDetails(10, '256')">256</div>
        <div class="plot plot-10-257" onclick="showPlotDetails(10, '257')">257</div>
        <div class="plot plot-10-258" onclick="showPlotDetails(10, '258')">258</div>
        <div class="plot plot-10-259" onclick="showPlotDetails(10, '259')">259</div>
        <div class="plot plot-10-260" onclick="showPlotDetails(10, '260')">260</div>
        <div class="plot plot-10-261" onclick="showPlotDetails(10, '261')">261</div>
        <div class="plot plot-10-262" onclick="showPlotDetails(10, '262')">262</div>
        <div class="plot plot-10-263" onclick="showPlotDetails(10, '263')">263</div>
        <div class="plot plot-10-264" onclick="showPlotDetails(10, '264')">264</div>
        <div class="plot plot-10-265" onclick="showPlotDetails(10, '265')">265</div>
        <div class="plot plot-10-266" onclick="showPlotDetails(10, '266')">266</div>
        <div class="plot plot-10-267" onclick="showPlotDetails(10, '267')">267</div>
        <div class="plot plot-10-268" onclick="showPlotDetails(10, '268')">268</div>
        <div class="plot plot-10-269" onclick="showPlotDetails(10, '269')">269</div>
        <div class="plot plot-10-270" onclick="showPlotDetails(10, '270')">270</div>
        <div class="plot plot-10-271" onclick="showPlotDetails(10, '271')">271</div>
        <div class="plot plot-10-272" onclick="showPlotDetails(10, '272')">272</div>
        <div class="plot plot-10-273" onclick="showPlotDetails(10, '273')">273</div>
        <div class="plot plot-10-274" onclick="showPlotDetails(10, '274')">274</div>
        <div class="plot plot-10-275" onclick="showPlotDetails(10, '275')">275</div>
        <div class="plot plot-10-276" onclick="showPlotDetails(10, '276')">276</div>
        <div class="plot plot-10-277" onclick="showPlotDetails(10, '277')">277</div>
        <div class="plot plot-10-278" onclick="showPlotDetails(10, '278')">278</div>
        <div class="plot plot-10-279" onclick="showPlotDetails(10, '279')">279</div>
        <div class="plot plot-10-280" onclick="showPlotDetails(10, '280')">280</div>
        <div class="plot plot-10-281" onclick="showPlotDetails(10, '281')">281</div>
        <div class="plot plot-10-282" onclick="showPlotDetails(10, '282')">282</div>
        <div class="plot plot-10-283" onclick="showPlotDetails(10, '283')">283</div>
        <div class="plot plot-10-284" onclick="showPlotDetails(10, '284')">284</div>
        <div class="plot plot-10-285" onclick="showPlotDetails(10, '285')">285</div>
        <div class="plot plot-10-286" onclick="showPlotDetails(10, '286')">286</div>
        <div class="plot plot-10-287" onclick="showPlotDetails(10, '287')">287</div>
        <div class="plot plot-10-288" onclick="showPlotDetails(10, '288')">288</div>
        <div class="plot plot-10-289" onclick="showPlotDetails(10, '289')">289</div>
        <div class="plot plot-10-290" onclick="showPlotDetails(10, '290')">290</div>
        <div class="plot plot-10-291" onclick="showPlotDetails(10, '291')">291</div>
        <div class="plot plot-10-292" onclick="showPlotDetails(10, '292')">292</div>
        <div class="plot plot-10-293" onclick="showPlotDetails(10, '293')">293</div>
        <div class="plot plot-10-294" onclick="showPlotDetails(10, '294')">294</div>
        <div class="plot plot-10-295" onclick="showPlotDetails(10, '295')">295</div>
        <div class="plot plot-10-296" onclick="showPlotDetails(10, '296')">296</div>
        <div class="plot plot-10-297" onclick="showPlotDetails(10, '297')">297</div>
        <div class="plot plot-10-298" onclick="showPlotDetails(10, '298')">298</div>
        <div class="plot plot-10-299" onclick="showPlotDetails(10, '299')">299</div>
        <div class="plot plot-10-300" onclick="showPlotDetails(10, '300')">300</div>
        <div class="plot plot-10-301" onclick="showPlotDetails(10, '301')">301</div>
        <div class="plot plot-10-302" onclick="showPlotDetails(10, '302')">302</div>
        <div class="plot plot-10-303" onclick="showPlotDetails(10, '303')">303</div>
        <div class="plot plot-10-304" onclick="showPlotDetails(10, '304')">304</div>
        <div class="plot plot-10-305" onclick="showPlotDetails(10, '305')">305</div>
        <div class="plot plot-10-306" onclick="showPlotDetails(10, '306')">306</div>
        <div class="plot plot-10-307" onclick="showPlotDetails(10, '307')">307</div>
        <div class="plot plot-10-308" onclick="showPlotDetails(10, '308')">308</div>
        <div class="plot plot-10-309" onclick="showPlotDetails(10, '309')">309</div>
        <div class="plot plot-10-310" onclick="showPlotDetails(10, '310')">310</div>
        <div class="plot plot-10-311" onclick="showPlotDetails(10, '311')">311</div>
        <div class="plot plot-10-312" onclick="showPlotDetails(10, '312')">312</div>
        <div class="plot plot-10-313" onclick="showPlotDetails(10, '313')">313</div>
        <div class="plot plot-10-314" onclick="showPlotDetails(10, '314')">314</div>
        <div class="plot plot-10-315" onclick="showPlotDetails(10, '315')">315</div>
        <div class="plot plot-10-316" onclick="showPlotDetails(10, '316')">316</div>
        <div class="plot plot-10-317" onclick="showPlotDetails(10, '317')">317</div>
        <div class="plot plot-10-318" onclick="showPlotDetails(10, '318')">318</div>
        <div class="plot plot-10-319" onclick="showPlotDetails(10, '319')">319</div>
        <div class="plot plot-10-320" onclick="showPlotDetails(10, '320')">320</div>
        <div class="plot plot-10-321" onclick="showPlotDetails(10, '321')">321</div>
        <div class="plot plot-10-322" onclick="showPlotDetails(10, '322')">322</div>
        <div class="plot plot-10-323" onclick="showPlotDetails(10, '323')">323</div>
        <div class="plot plot-10-324" onclick="showPlotDetails(10, '324')">324</div>
        <div class="plot plot-10-325" onclick="showPlotDetails(10, '325')">325</div>
        <div class="plot plot-10-326" onclick="showPlotDetails(10, '326')">326</div>
        <div class="plot plot-10-327" onclick="showPlotDetails(10, '327')">327</div>
        <div class="plot plot-10-328" onclick="showPlotDetails(10, '328')">328</div>
        <div class="plot plot-10-329" onclick="showPlotDetails(10, '329')">329</div>
        <div class="plot plot-10-330" onclick="showPlotDetails(10, '330')">330</div>
        <div class="plot plot-10-331" onclick="showPlotDetails(10, '331')">331</div>
        <div class="plot plot-10-332" onclick="showPlotDetails(10, '332')">332</div>
        <div class="plot plot-10-333" onclick="showPlotDetails(10, '333')">333</div>
        <div class="plot plot-10-334" onclick="showPlotDetails(10, '334')">334</div>
        <div class="plot plot-10-335" onclick="showPlotDetails(10, '335')">335</div>
        <div class="plot plot-10-336" onclick="showPlotDetails(10, '336')">336</div>
        <div class="plot plot-10-337" onclick="showPlotDetails(10, '337')">337</div>
        <div class="plot plot-10-338" onclick="showPlotDetails(10, '338')">338</div>
        <div class="plot plot-10-339" onclick="showPlotDetails(10, '339')">339</div>
        <div class="plot plot-10-340" onclick="showPlotDetails(10, '340')">340</div>
        <div class="plot plot-10-341" onclick="showPlotDetails(10, '341')">341</div>
        <div class="plot plot-10-342" onclick="showPlotDetails(10, '342')">342</div>
        <div class="plot plot-10-343" onclick="showPlotDetails(10, '343')">343</div>
        <div class="plot plot-10-344" onclick="showPlotDetails(10, '344')">344</div>
        <div class="plot plot-10-345" onclick="showPlotDetails(10, '345')">345</div>
        <div class="plot plot-10-346" onclick="showPlotDetails(10, '346')">346</div>
        <div class="plot plot-10-347" onclick="showPlotDetails(10, '347')">347</div>
        <div class="plot plot-10-348" onclick="showPlotDetails(10, '348')">348</div>
        <div class="plot plot-10-349" onclick="showPlotDetails(10, '349')">349</div>
        <div class="plot plot-10-350" onclick="showPlotDetails(10, '350')">350</div>
        <div class="plot plot-10-351" onclick="showPlotDetails(10, '351')">351</div>
        <div class="plot plot-10-352" onclick="showPlotDetails(10, '352')">352</div>
        <div class="plot plot-10-353" onclick="showPlotDetails(10, '353')">353</div>
        <div class="plot plot-10-354" onclick="showPlotDetails(10, '354')">354</div>
        <div class="plot plot-10-355" onclick="showPlotDetails(10, '355')">355</div>
        <div class="plot plot-10-356" onclick="showPlotDetails(10, '356')">356</div>
        <div class="plot plot-10-357" onclick="showPlotDetails(10, '357')">357</div>
        <div class="plot plot-10-358" onclick="showPlotDetails(10, '358')">358</div>
        <div class="plot plot-10-359" onclick="showPlotDetails(10, '359')">359</div>
        <div class="plot plot-10-360" onclick="showPlotDetails(10, '360')">360</div>
        <div class="plot plot-10-361" onclick="showPlotDetails(10, '361')">361</div>
        <div class="plot plot-10-362" onclick="showPlotDetails(10, '362')">362</div>
        <div class="plot plot-10-363" onclick="showPlotDetails(10, '363')">363</div>
        <div class="plot plot-10-364" onclick="showPlotDetails(10, '364')">364</div>
        <div class="plot plot-10-365" onclick="showPlotDetails(10, '365')">365</div>
        <div class="plot plot-10-366" onclick="showPlotDetails(10, '366')">366</div>
        <div class="plot plot-10-367" onclick="showPlotDetails(10, '367')">367</div>
        <div class="plot plot-10-368" onclick="showPlotDetails(10, '368')">368</div>
        <div class="plot plot-10-369" onclick="showPlotDetails(10, '369')">369</div>
        <div class="plot plot-10-370" onclick="showPlotDetails(10, '370')">370</div>
        <div class="plot plot-10-371" onclick="showPlotDetails(10, '371')">371</div>
        <div class="plot plot-10-372" onclick="showPlotDetails(10, '372')">372</div>
        <div class="plot plot-10-373" onclick="showPlotDetails(10, '373')">373</div>
        <div class="plot plot-10-374" onclick="showPlotDetails(10, '374')">374</div>
        <div class="plot plot-10-375" onclick="showPlotDetails(10, '375')">375</div>
        <div class="plot plot-10-376" onclick="showPlotDetails(10, '376')">376</div>
        <div class="plot plot-10-377" onclick="showPlotDetails(10, '377')">377</div>
        <div class="plot plot-10-378" onclick="showPlotDetails(10, '378')">378</div>
        <div class="plot plot-10-379" onclick="showPlotDetails(10, '379')">379</div>
        <div class="plot plot-10-380" onclick="showPlotDetails(10, '380')">380</div>
        <div class="plot plot-10-381" onclick="showPlotDetails(10, '381')">381</div>
        <div class="plot plot-10-382" onclick="showPlotDetails(10, '382')">382</div>
        <div class="plot plot-10-383" onclick="showPlotDetails(10, '383')">383</div>
        <div class="plot plot-10-384" onclick="showPlotDetails(10, '384')">384</div>
        <div class="plot plot-10-385" onclick="showPlotDetails(10, '385')">385</div>
        <div class="plot plot-10-386" onclick="showPlotDetails(10, '386')">386</div>
        <div class="plot plot-10-387" onclick="showPlotDetails(10, '387')">387</div>
        <div class="plot plot-10-388" onclick="showPlotDetails(10, '388')">388</div>
        <div class="plot plot-10-389" onclick="showPlotDetails(10, '389')">389</div>
        <div class="plot plot-10-390" onclick="showPlotDetails(10, '390')">390</div>
        <div class="plot plot-10-391" onclick="showPlotDetails(10, '391')">391</div>
        <div class="plot plot-10-392" onclick="showPlotDetails(10, '392')">392</div>
        <div class="plot plot-10-393" onclick="showPlotDetails(10, '393')">393</div>
        <div class="plot plot-10-394" onclick="showPlotDetails(10, '394')">394</div>
        <div class="plot plot-10-395" onclick="showPlotDetails(10, '395')">395</div>
        <div class="plot plot-10-396" onclick="showPlotDetails(10, '396')">396</div>
        <div class="plot plot-10-397" onclick="showPlotDetails(10, '397')">397</div>
        <div class="plot plot-10-398" onclick="showPlotDetails(10, '398')">398</div>
        <div class="plot plot-10-399" onclick="showPlotDetails(10, '399')">399</div>
        <div class="plot plot-10-400" onclick="showPlotDetails(10, '400')">400</div>
        <div class="plot plot-10-401" onclick="showPlotDetails(10, '401')">401</div>
<div class="plot plot-10-402" onclick="showPlotDetails(10, '402')">402</div>
<div class="plot plot-10-403" onclick="showPlotDetails(10, '403')">403</div>
<div class="plot plot-10-404" onclick="showPlotDetails(10, '404')">404</div>
<div class="plot plot-10-405" onclick="showPlotDetails(10, '405')">405</div>
<div class="plot plot-10-406" onclick="showPlotDetails(10, '406')">406</div>
<div class="plot plot-10-407" onclick="showPlotDetails(10, '407')">407</div>
<div class="plot plot-10-408" onclick="showPlotDetails(10, '408')">408</div>
<div class="plot plot-10-409" onclick="showPlotDetails(10, '409')">409</div>
<div class="plot plot-10-410" onclick="showPlotDetails(10, '410')">410</div>
<div class="plot plot-10-411" onclick="showPlotDetails(10, '411')">411</div>
<div class="plot plot-10-412" onclick="showPlotDetails(10, '412')">412</div>
<div class="plot plot-10-413" onclick="showPlotDetails(10, '413')">413</div>
<div class="plot plot-10-414" onclick="showPlotDetails(10, '414')">414</div>
<div class="plot plot-10-415" onclick="showPlotDetails(10, '415')">415</div>
<div class="plot plot-10-416" onclick="showPlotDetails(10, '416')">416</div>
<div class="plot plot-10-417" onclick="showPlotDetails(10, '417')">417</div>
<div class="plot plot-10-418" onclick="showPlotDetails(10, '418')">418</div>
<div class="plot plot-10-419" onclick="showPlotDetails(10, '419')">419</div>
<div class="plot plot-10-420" onclick="showPlotDetails(10, '420')">420</div>
<div class="plot plot-10-421" onclick="showPlotDetails(10, '421')">421</div>
<div class="plot plot-10-422" onclick="showPlotDetails(10, '422')">422</div>
<div class="plot plot-10-423" onclick="showPlotDetails(10, '423')">423</div>
<div class="plot plot-10-424" onclick="showPlotDetails(10, '424')">424</div>
<div class="plot plot-10-425" onclick="showPlotDetails(10, '425')">425</div>
<div class="plot plot-10-426" onclick="showPlotDetails(10, '426')">426</div>
<div class="plot plot-10-427" onclick="showPlotDetails(10, '427')">427</div>
<div class="plot plot-10-428" onclick="showPlotDetails(10, '428')">428</div>
<div class="plot plot-10-429" onclick="showPlotDetails(10, '429')">429</div>
<div class="plot plot-10-430" onclick="showPlotDetails(10, '430')">430</div>
<div class="plot plot-10-431" onclick="showPlotDetails(10, '431')">431</div>
<div class="plot plot-10-432" onclick="showPlotDetails(10, '432')">432</div>
<div class="plot plot-10-433" onclick="showPlotDetails(10, '433')">433</div>
<div class="plot plot-10-434" onclick="showPlotDetails(10, '434')">434</div>
<div class="plot plot-10-435" onclick="showPlotDetails(10, '435')">435</div>
<div class="plot plot-10-436" onclick="showPlotDetails(10, '436')">436</div>
<div class="plot plot-10-437" onclick="showPlotDetails(10, '437')">437</div>
<div class="plot plot-10-438" onclick="showPlotDetails(10, '438')">438</div>
<div class="plot plot-10-439" onclick="showPlotDetails(10, '439')">439</div>
<div class="plot plot-10-440" onclick="showPlotDetails(10, '440')">440</div>
<div class="plot plot-10-441" onclick="showPlotDetails(10, '441')">441</div>
<div class="plot plot-10-442" onclick="showPlotDetails(10, '442')">442</div>
<div class="plot plot-10-443" onclick="showPlotDetails(10, '443')">443</div>
<div class="plot plot-10-444" onclick="showPlotDetails(10, '444')">444</div>
<div class="plot plot-10-445" onclick="showPlotDetails(10, '445')">445</div>
<div class="plot plot-10-446" onclick="showPlotDetails(10, '446')">446</div>
<div class="plot plot-10-447" onclick="showPlotDetails(10, '447')">447</div>
<div class="plot plot-10-448" onclick="showPlotDetails(10, '448')">448</div>
<div class="plot plot-10-449" onclick="showPlotDetails(10, '449')">449</div>
<div class="plot plot-10-450" onclick="showPlotDetails(10, '450')">450</div>
<div class="plot plot-10-451" onclick="showPlotDetails(10, '451')">451</div>
<div class="plot plot-10-452" onclick="showPlotDetails(10, '452')">452</div>
<div class="plot plot-10-453" onclick="showPlotDetails(10, '453')">453</div>
<div class="plot plot-10-454" onclick="showPlotDetails(10, '454')">454</div>
<div class="plot plot-10-455" onclick="showPlotDetails(10, '455')">455</div>
<div class="plot plot-10-456" onclick="showPlotDetails(10, '456')">456</div>
<div class="plot plot-10-457" onclick="showPlotDetails(10, '457')">457</div>
<div class="plot plot-10-458" onclick="showPlotDetails(10, '458')">458</div>
<div class="plot plot-10-459" onclick="showPlotDetails(10, '459')">459</div>
<div class="plot plot-10-460" onclick="showPlotDetails(10, '460')">460</div>
<div class="plot plot-10-461" onclick="showPlotDetails(10, '461')">461</div>
<div class="plot plot-10-462" onclick="showPlotDetails(10, '462')">462</div>
<div class="plot plot-10-463" onclick="showPlotDetails(10, '463')">463</div>
<div class="plot plot-10-464" onclick="showPlotDetails(10, '464')">464</div>
<div class="plot plot-10-465" onclick="showPlotDetails(10, '465')">465</div>
<div class="plot plot-10-466" onclick="showPlotDetails(10, '466')">466</div>
<div class="plot plot-10-467" onclick="showPlotDetails(10, '467')">467</div>
<div class="plot plot-10-468" onclick="showPlotDetails(10, '468')">468</div>
<div class="plot plot-10-469" onclick="showPlotDetails(10, '469')">469</div>
<div class="plot plot-10-470" onclick="showPlotDetails(10, '470')">470</div>
<div class="plot plot-10-471" onclick="showPlotDetails(10, '471')">471</div>
<div class="plot plot-10-472" onclick="showPlotDetails(10, '472')">472</div>
<div class="plot plot-10-473" onclick="showPlotDetails(10, '473')">473</div>
<div class="plot plot-10-474" onclick="showPlotDetails(10, '474')">474</div>
<div class="plot plot-10-475" onclick="showPlotDetails(10, '475')">475</div>
<div class="plot plot-10-476" onclick="showPlotDetails(10, '476')">476</div>
<div class="plot plot-10-477" onclick="showPlotDetails(10, '477')">477</div>
<div class="plot plot-10-478" onclick="showPlotDetails(10, '478')">478</div>
<div class="plot plot-10-479" onclick="showPlotDetails(10, '479')">479</div>
<div class="plot plot-10-480" onclick="showPlotDetails(10, '480')">480</div>
<div class="plot plot-10-481" onclick="showPlotDetails(10, '481')">481</div>
<div class="plot plot-10-482" onclick="showPlotDetails(10, '482')">482</div>
<div class="plot plot-10-483" onclick="showPlotDetails(10, '483')">483</div>
<div class="plot plot-10-484" onclick="showPlotDetails(10, '484')">484</div>
<div class="plot plot-10-485" onclick="showPlotDetails(10, '485')">485</div>
<div class="plot plot-10-486" onclick="showPlotDetails(10, '486')">486</div>
<div class="plot plot-10-487" onclick="showPlotDetails(10, '487')">487</div>
<div class="plot plot-10-488" onclick="showPlotDetails(10, '488')">488</div>
<div class="plot plot-10-489" onclick="showPlotDetails(10, '489')">489</div>
<div class="plot plot-10-490" onclick="showPlotDetails(10, '490')">490</div>
<div class="plot plot-10-491" onclick="showPlotDetails(10, '491')">491</div>
<div class="plot plot-10-492" onclick="showPlotDetails(10, '492')">492</div>
<div class="plot plot-10-493" onclick="showPlotDetails(10, '493')">493</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-10-500" onclick="showPlotDetails(10, '500')">500</div>

<div class="plot plot-10-501" onclick="showPlotDetails(10, '501')">501</div>
<div class="plot plot-10-502" onclick="showPlotDetails(10, '502')">502</div>
<div class="plot plot-10-503" onclick="showPlotDetails(10, '503')">503</div>
<div class="plot plot-10-504" onclick="showPlotDetails(10, '504')">504</div>
<div class="plot plot-10-505" onclick="showPlotDetails(10, '505')">505</div>
<div class="plot plot-10-506" onclick="showPlotDetails(10, '506')">506</div>
<div class="plot plot-10-507" onclick="showPlotDetails(10, '507')">507</div>
<div class="plot plot-10-508" onclick="showPlotDetails(10, '508')">508</div>
<div class="plot plot-10-509" onclick="showPlotDetails(10, '509')">509</div>
<div class="plot plot-10-510" onclick="showPlotDetails(10, '510')">510</div>
<div class="plot plot-10-511" onclick="showPlotDetails(10, '511')">511</div>
<div class="plot plot-10-512" onclick="showPlotDetails(10, '512')">512</div>
<div class="plot plot-10-513" onclick="showPlotDetails(10, '513')">513</div>
<div class="plot plot-10-514" onclick="showPlotDetails(10, '514')">514</div>
<div class="plot plot-10-515" onclick="showPlotDetails(10, '515')">515</div>
<div class="plot plot-10-516" onclick="showPlotDetails(10, '516')">516</div>
<div class="plot plot-10-517" onclick="showPlotDetails(10, '517')">517</div>
<div class="plot plot-10-518" onclick="showPlotDetails(10, '518')">518</div>
<div class="plot plot-10-519" onclick="showPlotDetails(10, '519')">519</div>
<div class="plot plot-10-520" onclick="showPlotDetails(10, '520')">520</div>
<div class="plot plot-10-521" onclick="showPlotDetails(10, '521')">521</div>
<div class="plot plot-10-522" onclick="showPlotDetails(10, '522')">522</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-10-537" onclick="showPlotDetails(10, '537')">537</div>
<div class="plot plot-10-538" onclick="showPlotDetails(10, '538')">538</div>
<div class="plot plot-10-539" onclick="showPlotDetails(10, '539')">539</div>
<div class="plot plot-10-540" onclick="showPlotDetails(10, '540')">540</div>
<div class="plot plot-10-541" onclick="showPlotDetails(10, '541')">541</div>
<div class="plot plot-10-542" onclick="showPlotDetails(10, '542')">542</div>
<div class="plot plot-10-543" onclick="showPlotDetails(10, '543')">543</div>
<div class="plot plot-10-544" onclick="showPlotDetails(10, '544')">544</div>
<div class="plot plot-10-545" onclick="showPlotDetails(10, '545')">545</div>
<div class="plot plot-10-546" onclick="showPlotDetails(10, '546')">546</div>
<div class="plot plot-10-547" onclick="showPlotDetails(10, '547')">547</div>
<div class="plot plot-10-548" onclick="showPlotDetails(10, '548')">548</div>
<div class="plot plot-10-549" onclick="showPlotDetails(10, '549')">549</div>
<div class="plot plot-10-550" onclick="showPlotDetails(10, '550')">550</div>
<div class="plot plot-10-551" onclick="showPlotDetails(10, '551')">551</div>
</div>   
<b class="">2.00 M. WIDE PATHWALK</b>

<style>
  .b10w{
    bottom: 48.5pc !important;
  }
  </style>     
<b class="pathwalk walk1 " >2.00 M. WIDE PATHWALK</b>
        <b class="pathwalk walk2 ">2.00 M. WIDE PATHWALK</b>
        <div class="two-way-traffic-sign b10w">
          <div class="arrow-container">
              <div class="arrow left"></div>
          </div>
          <div class="text">TWO WAY TRAFFIC ROAD</div>
          <div class="arrow-container">
              <div class="arrow right"></div>
          </div>
        </div>   
    </div>
  </div>
</div>

<!-- Modal HTML for Block 8 -->
<div id="block8Modal" class="modal">
  <div class="modal-content-map">
    <span>Block 8 Plots</span><span class="close" onclick="closeModal('block8Modal')">&times;</span>
    <div class="modal-center">
      <hr style="color: black; width: 79%;" >
      <div class="ped">PEDESTRIAN SIDEWALK</div>
      <hr style="color: black; width: 79%;" >
      <b>GREEN PARK MEMORIAL GARDEN</b>
      <b>BLOCK 8</b>
      <hr style="color: black; width: 79%; margin-top: 40px;" >
      <div class="ped">PEDESTRIAN SIDEWALK</div>
      <hr style="color: black; width: 79%;" >

            <div class="plots_con rotator b8">
        <div class="plot plot-8-1" onclick="showPlotDetails(8, '1')">1</div>
        <div class="plot plot-8-2" onclick="showPlotDetails(8, '2')">2</div>
        <div class="plot plot-8-3" onclick="showPlotDetails(8, '3')">3</div>
        <div class="plot plot-8-4" onclick="showPlotDetails(8, '4')">4</div>
        <div class="plot plot-8-5" onclick="showPlotDetails(8, '5')">5</div>
        <div class="plot plot-8-6" onclick="showPlotDetails(8, '6')">6</div>
        <div class="plot plot-8-7" onclick="showPlotDetails(8, '7')">7</div>
        <div class="plot plot-8-8" onclick="showPlotDetails(8, '8')">8</div>
        <div class="plot plot-8-9" onclick="showPlotDetails(8, '9')">9</div>
        <div class="plot plot-8-10" onclick="showPlotDetails(8, '10')">10</div>
        <div class="plot plot-8-11" onclick="showPlotDetails(8, '11')">11</div>
        <div class="plot plot-8-12" onclick="showPlotDetails(8, '12')">12</div>
        <div class="plot plot-8-13" onclick="showPlotDetails(8, '13')">13</div>
        <div class="plot plot-8-14" onclick="showPlotDetails(8, '14')">14</div>
        <div class="plot plot-8-15" onclick="showPlotDetails(8, '15')">15</div>
        <div class="plot plot-8-16" onclick="showPlotDetails(8, '16')">16</div>
        <div class="plot plot-8-17" onclick="showPlotDetails(8, '17')">17</div>
        <div class="plot plot-8-18" onclick="showPlotDetails(8, '18')">18</div>
        <div class="plot plot-8-19" onclick="showPlotDetails(8, '19')">19</div>
        <div class="plot plot-8-20" onclick="showPlotDetails(8, '20')">20</div>
        <div class="plot plot-8-21" onclick="showPlotDetails(8, '21')">21</div>
        <div class="plot plot-8-22" onclick="showPlotDetails(8, '22')">22</div>
        <div class="plot plot-8-23" onclick="showPlotDetails(8, '23')">23</div>
        <div class="plot plot-8-24" onclick="showPlotDetails(8, '24')">24</div>
        <div class="plot plot-8-25" onclick="showPlotDetails(8, '25')">25</div>
        <div class="plot plot-8-26" onclick="showPlotDetails(8, '26')">26</div>
        <div class="plot plot-8-27" onclick="showPlotDetails(8, '27')">27</div>
        <div class="plot plot-8-28" onclick="showPlotDetails(8, '28')">28</div>
        <div class="plot plot-8-29" onclick="showPlotDetails(8, '29')">29</div>
        <div class="plot plot-8-30" onclick="showPlotDetails(8, '30')">30</div>
        <div class="plot plot-8-31" onclick="showPlotDetails(8, '31')">31</div>
        <div class="plot plot-8-32" onclick="showPlotDetails(8, '32')">32</div>
        <div class="plot plot-8-33" onclick="showPlotDetails(8, '33')">33</div>
        <div class="plot plot-8-34" onclick="showPlotDetails(8, '34')">34</div>
        <div class="plot plot-8-35" onclick="showPlotDetails(8, '35')">35</div>
        <div class="plot plot-8-36" onclick="showPlotDetails(8, '36')">36</div>
        <div class="plot plot-8-37" onclick="showPlotDetails(8, '37')">37</div>
        <div class="plot plot-8-38" onclick="showPlotDetails(8, '38')">38</div>
        <div class="plot plot-8-39" onclick="showPlotDetails(8, '39')">39</div>
        <div class="plot plot-8-40" onclick="showPlotDetails(8, '40')">40</div>
        <div class="plot plot-8-41" onclick="showPlotDetails(8, '41')">41</div>
        <div class="plot plot-8-42" onclick="showPlotDetails(8, '42')">42</div>
        <div class="plot plot-8-43" onclick="showPlotDetails(8, '43')">43</div>
        <div class="plot plot-8-44" onclick="showPlotDetails(8, '44')">44</div>
        <div class="plot plot-8-45" onclick="showPlotDetails(8, '45')">45</div>
        <div class="plot plot-8-46" onclick="showPlotDetails(8, '46')">46</div>
        <div class="plot plot-8-47" onclick="showPlotDetails(8, '47')">47</div>
        <div class="plot plot-8-48" onclick="showPlotDetails(8, '48')">48</div>
        <div class="plot plot-8-49" onclick="showPlotDetails(8, '49')">49</div>
        <div class="plot plot-8-50" onclick="showPlotDetails(8, '50')">50</div>
        <div class="plot plot-8-51" onclick="showPlotDetails(8, '51')">51</div>
        <div class="plot plot-8-52" onclick="showPlotDetails(8, '52')">52</div>
        <div class="plot plot-8-53" onclick="showPlotDetails(8, '53')">53</div>
        <div class="plot plot-8-54" onclick="showPlotDetails(8, '54')">54</div>
        <div class="plot plot-8-55" onclick="showPlotDetails(8, '55')">55</div>
        <div class="plot plot-8-56" onclick="showPlotDetails(8, '56')">56</div>
        <div class="plot plot-8-57" onclick="showPlotDetails(8, '57')">57</div>
        <div class="plot plot-8-58" onclick="showPlotDetails(8, '58')">58</div>
        <div class="plot plot-8-59" onclick="showPlotDetails(8, '59')">59</div>
        <div class="plot plot-8-60" onclick="showPlotDetails(8, '60')">60</div>
        <div class="plot plot-8-61" onclick="showPlotDetails(8, '61')">61</div>
        <div class="plot plot-8-62" onclick="showPlotDetails(8, '62')">62</div>
        <div class="plot plot-8-63" onclick="showPlotDetails(8, '63')">63</div>
        <div class="plot plot-8-64" onclick="showPlotDetails(8, '64')">64</div>
        <div class="plot plot-8-65" onclick="showPlotDetails(8, '65')">65</div>
        <div class="plot plot-8-66" onclick="showPlotDetails(8, '66')">66</div>
        <div class="plot plot-8-67" onclick="showPlotDetails(8, '67')">67</div>
        <div class="plot plot-8-68" onclick="showPlotDetails(8, '68')">68</div>
        <div class="plot plot-8-69" onclick="showPlotDetails(8, '69')">69</div>
        <div class="plot plot-8-70" onclick="showPlotDetails(8, '70')">70</div>
        <div class="plot plot-8-71" onclick="showPlotDetails(8, '71')">71</div>
        <div class="plot plot-8-72" onclick="showPlotDetails(8, '72')">72</div>
        <div class="plot plot-8-73" onclick="showPlotDetails(8, '73')">73</div>
        <div class="plot plot-8-74" onclick="showPlotDetails(8, '74')">74</div>
        <div class="plot plot-8-75" onclick="showPlotDetails(8, '75')">75</div>
        <div class="plot plot-8-76" onclick="showPlotDetails(8, '76')">76</div>
        <div class="plot plot-8-77" onclick="showPlotDetails(8, '77')">77</div>
        <div class="plot plot-8-78" onclick="showPlotDetails(8, '78')">78</div>
        <div class="plot plot-8-79" onclick="showPlotDetails(8, '79')">79</div>
        <div class="plot plot-8-80" onclick="showPlotDetails(8, '80')">80</div>
        <div class="plot plot-8-81" onclick="showPlotDetails(8, '81')">81</div>
        <div class="plot plot-8-82" onclick="showPlotDetails(8, '82')">82</div>
        <div class="plot plot-8-83" onclick="showPlotDetails(8, '83')">83</div>
        <div class="plot plot-8-84" onclick="showPlotDetails(8, '84')">84</div>
        <div class="plot plot-8-85" onclick="showPlotDetails(8, '85')">85</div>
        <div class="plot plot-8-86" onclick="showPlotDetails(8, '86')">86</div>
        <div class="plot plot-8-87" onclick="showPlotDetails(8, '87')">87</div>
        <div class="plot plot-8-88" onclick="showPlotDetails(8, '88')">88</div>
        <div class="plot plot-8-89" onclick="showPlotDetails(8, '89')">89</div>
        <div class="plot plot-8-90" onclick="showPlotDetails(8, '90')">90</div>
        <div class="plot plot-8-91" onclick="showPlotDetails(8, '91')">91</div>
        <div class="plot plot-8-92" onclick="showPlotDetails(8, '92')">92</div>
        <div class="plot plot-8-93" onclick="showPlotDetails(8, '93')">93</div>
        <div class="plot plot-8-94" onclick="showPlotDetails(8, '94')">94</div>
        <div class="plot plot-8-95" onclick="showPlotDetails(8, '95')">95</div>
        <div class="plot plot-8-96" onclick="showPlotDetails(8, '96')">96</div>
        <div class="plot plot-8-97" onclick="showPlotDetails(8, '97')">97</div>
        <div class="plot plot-8-98" onclick="showPlotDetails(8, '98')">98</div>
        <div class="plot plot-8-99" onclick="showPlotDetails(8, '99')">99</div>
        <div class="plot plot-8-100" onclick="showPlotDetails(8, '100')">100</div>
        <div class="plot plot-8-101" onclick="showPlotDetails(8, '101')">101</div>
        <div class="plot plot-8-102" onclick="showPlotDetails(8, '102')">102</div>
        <div class="plot plot-8-103" onclick="showPlotDetails(8, '103')">103</div>
        <div class="plot plot-8-104" onclick="showPlotDetails(8, '104')">104</div>
        <div class="plot plot-8-105" onclick="showPlotDetails(8, '105')">105</div>
        <div class="plot plot-8-106" onclick="showPlotDetails(8, '106')">106</div>
        <div class="plot plot-8-107" onclick="showPlotDetails(8, '107')">107</div>
        <div class="plot plot-8-108" onclick="showPlotDetails(8, '108')">108</div>
        <div class="plot plot-8-109" onclick="showPlotDetails(8, '109')">109</div>
        <div class="plot plot-8-110" onclick="showPlotDetails(8, '110')">110</div>
        <div class="plot plot-8-111" onclick="showPlotDetails(8, '111')">111</div>
        <div class="plot plot-8-112" onclick="showPlotDetails(8, '112')">112</div>
        <div class="plot plot-8-113" onclick="showPlotDetails(8, '113')">113</div>
        <div class="plot plot-8-114" onclick="showPlotDetails(8, '114')">114</div>
        <div class="plot plot-8-115" onclick="showPlotDetails(8, '115')">115</div>
        <div class="plot plot-8-116" onclick="showPlotDetails(8, '116')">116</div>
        <div class="plot plot-8-117" onclick="showPlotDetails(8, '117')">117</div>
        <div class="plot plot-8-118" onclick="showPlotDetails(8, '118')">118</div>
        <div class="plot plot-8-119" onclick="showPlotDetails(8, '119')">119</div>
        <div class="plot plot-8-120" onclick="showPlotDetails(8, '120')">120</div>
        <div class="plot plot-8-121" onclick="showPlotDetails(8, '121')">121</div>
        <div class="plot plot-8-122" onclick="showPlotDetails(8, '122')">122</div>
        <div class="plot plot-8-123" onclick="showPlotDetails(8, '123')">123</div>
        <div class="plot plot-8-124" onclick="showPlotDetails(8, '124')">124</div>
        <div class="plot plot-8-125" onclick="showPlotDetails(8, '125')">125</div>
        <div class="plot plot-8-126" onclick="showPlotDetails(8, '126')">126</div>
        <div class="plot plot-8-127" onclick="showPlotDetails(8, '127')">127</div>
        <div class="plot plot-8-128" onclick="showPlotDetails(8, '128')">128</div>
        <div class="plot plot-8-129" onclick="showPlotDetails(8, '129')">129</div>
        <div class="plot plot-8-130" onclick="showPlotDetails(8, '130')">130</div>
        <div class="plot plot-8-131" onclick="showPlotDetails(8, '131')">131</div>
        <div class="plot plot-8-132" onclick="showPlotDetails(8, '132')">132</div>
        <div class="plot plot-8-133" onclick="showPlotDetails(8, '133')">133</div>
        <div class="plot plot-8-134" onclick="showPlotDetails(8, '134')">134</div>
        <div class="plot plot-8-135" onclick="showPlotDetails(8, '135')">135</div>
        <div class="plot plot-8-136" onclick="showPlotDetails(8, '136')">136</div>
        <div class="plot plot-8-137" onclick="showPlotDetails(8, '137')">137</div>
        <div class="plot plot-8-138" onclick="showPlotDetails(8, '138')">138</div>
        <div class="plot plot-8-139" onclick="showPlotDetails(8, '139')">139</div>
        <div class="plot plot-8-140" onclick="showPlotDetails(8, '140')">140</div>
        <div class="plot plot-8-141" onclick="showPlotDetails(8, '141')">141</div>
        <div class="plot plot-8-142" onclick="showPlotDetails(8, '142')">142</div>
        <div class="plot plot-8-143" onclick="showPlotDetails(8, '143')">143</div>
        <div class="plot plot-8-144" onclick="showPlotDetails(8, '144')">144</div>
        <div class="plot plot-8-145" onclick="showPlotDetails(8, '145')">145</div>
        <div class="plot plot-8-146" onclick="showPlotDetails(8, '146')">146</div>
        <div class="plot plot-8-147" onclick="showPlotDetails(8, '147')">147</div>
        <div class="plot plot-8-148" onclick="showPlotDetails(8, '148')">148</div>
        <div class="plot plot-8-149" onclick="showPlotDetails(8, '149')">149</div>
        <div class="plot plot-8-150" onclick="showPlotDetails(8, '150')">150</div>
        <div class="plot plot-8-151" onclick="showPlotDetails(8, '151')">151</div>
        <div class="plot plot-8-152" onclick="showPlotDetails(8, '152')">152</div>
        <div class="plot plot-8-153" onclick="showPlotDetails(8, '153')">153</div>
        <div class="plot plot-8-154" onclick="showPlotDetails(8, '154')">154</div>
        <div class="plot plot-8-155" onclick="showPlotDetails(8, '155')">155</div>
        <div class="plot plot-8-156" onclick="showPlotDetails(8, '156')">156</div>
        <div class="plot plot-8-157" onclick="showPlotDetails(8, '157')">157</div>
        <div class="plot plot-8-158" onclick="showPlotDetails(8, '158')">158</div>
        <div class="plot plot-8-159" onclick="showPlotDetails(8, '159')">159</div>
        <div class="plot plot-8-160" onclick="showPlotDetails(8, '160')">160</div>
        <div class="plot plot-8-161" onclick="showPlotDetails(8, '161')">161</div>
        <div class="plot plot-8-162" onclick="showPlotDetails(8, '162')">162</div>
        <div class="plot plot-8-163" onclick="showPlotDetails(8, '163')">163</div>
        <div class="plot plot-8-164" onclick="showPlotDetails(8, '164')">164</div>
        <div class="plot plot-8-165" onclick="showPlotDetails(8, '165')">165</div>
        <div class="plot plot-8-166" onclick="showPlotDetails(8, '166')">166</div>
        <div class="plot plot-8-167" onclick="showPlotDetails(8, '167')">167</div>
        <div class="plot plot-8-168" onclick="showPlotDetails(8, '168')">168</div>
        <div class="plot plot-8-169" onclick="showPlotDetails(8, '169')">169</div>
        <div class="plot plot-8-170" onclick="showPlotDetails(8, '170')">170</div>
        <div class="plot plot-8-171" onclick="showPlotDetails(8, '171')">171</div>
        <div class="plot plot-8-172" onclick="showPlotDetails(8, '172')">172</div>
        <div class="plot plot-8-173" onclick="showPlotDetails(8, '173')">173</div>
        <div class="plot plot-8-174" onclick="showPlotDetails(8, '174')">174</div>
        <div class="plot plot-8-175" onclick="showPlotDetails(8, '175')">175</div>
        <div class="plot plot-8-176" onclick="showPlotDetails(8, '176')">176</div>
        <div class="plot plot-8-177" onclick="showPlotDetails(8, '177')">177</div>
        <div class="plot plot-8-178" onclick="showPlotDetails(8, '178')">178</div>
        <div class="plot plot-8-179" onclick="showPlotDetails(8, '179')">179</div>
        <div class="plot plot-8-180" onclick="showPlotDetails(8, '180')">180</div>
        <div class="plot plot-8-181" onclick="showPlotDetails(8, '181')">181</div>
        <div class="plot plot-8-182" onclick="showPlotDetails(8, '182')">182</div>
        <div class="plot plot-8-183" onclick="showPlotDetails(8, '183')">183</div>
        <div class="plot plot-8-184" onclick="showPlotDetails(8, '184')">184</div>
        <div class="plot plot-8-185" onclick="showPlotDetails(8, '185')">185</div>
        <div class="plot plot-8-186" onclick="showPlotDetails(8, '186')">186</div>
        <div class="plot plot-8-187" onclick="showPlotDetails(8, '187')">187</div>
        <div class="plot plot-8-188" onclick="showPlotDetails(8, '188')">188</div>
        <div class="plot plot-8-189" onclick="showPlotDetails(8, '189')">189</div>
        <div class="plot plot-8-190" onclick="showPlotDetails(8, '190')">190</div>
        <div class="plot plot-8-191" onclick="showPlotDetails(8, '191')">191</div>
        <div class="plot plot-8-192" onclick="showPlotDetails(8, '192')">192</div>
        <div class="plot plot-8-193" onclick="showPlotDetails(8, '193')">193</div>
        <div class="plot plot-8-194" onclick="showPlotDetails(8, '194')">194</div>
        <div class="plot plot-8-195" onclick="showPlotDetails(8, '195')">195</div>
        <div class="plot plot-8-196" onclick="showPlotDetails(8, '196')">196</div>
        <div class="plot plot-8-197" onclick="showPlotDetails(8, '197')">197</div>
        <div class="plot plot-8-198" onclick="showPlotDetails(8, '198')">198</div>
        <div class="plot plot-8-199" onclick="showPlotDetails(8, '199')">199</div>
        <div class="plot plot-8-200" onclick="showPlotDetails(8, '200')">200</div>
        <div class="plot plot-8-201" onclick="showPlotDetails(8, '201')">201</div>
<div class="plot plot-8-202" onclick="showPlotDetails(8, '202')">202</div>
<div class="plot plot-8-203" onclick="showPlotDetails(8, '203')">203</div>
<div class="plot plot-8-204" onclick="showPlotDetails(8, '204')">204</div>
<div class="plot plot-8-205" onclick="showPlotDetails(8, '205')">205</div>
<div class="plot plot-8-206" onclick="showPlotDetails(8, '206')">206</div>
<div class="plot plot-8-207" onclick="showPlotDetails(8, '207')">207</div>
<div class="plot plot-8-208" onclick="showPlotDetails(8, '208')">208</div>
<div class="plot plot-8-209" onclick="showPlotDetails(8, '209')">209</div>
<div class="plot plot-8-210" onclick="showPlotDetails(8, '210')">210</div>
<div class="plot plot-8-211" onclick="showPlotDetails(8, '211')">211</div>
<div class="plot plot-8-212" onclick="showPlotDetails(8, '212')">212</div>
<div class="plot plot-8-213" onclick="showPlotDetails(8, '213')">213</div>
<div class="plot plot-8-214" onclick="showPlotDetails(8, '214')">214</div>
<div class="plot plot-8-215" onclick="showPlotDetails(8, '215')">215</div>
<div class="plot plot-8-216" onclick="showPlotDetails(8, '216')">216</div>
<div class="plot plot-8-217" onclick="showPlotDetails(8, '217')">217</div>
<div class="plot plot-8-218" onclick="showPlotDetails(8, '218')">218</div>
<div class="plot plot-8-219" onclick="showPlotDetails(8, '219')">219</div>
<div class="plot plot-8-220" onclick="showPlotDetails(8, '220')">220</div>
<div class="plot plot-8-221" onclick="showPlotDetails(8, '221')">221</div>
<div class="plot plot-8-222" onclick="showPlotDetails(8, '222')">222</div>
<div class="plot plot-8-223" onclick="showPlotDetails(8, '223')">223</div>
<div class="plot plot-8-224" onclick="showPlotDetails(8, '224')">224</div>
<div class="plot plot-8-225" onclick="showPlotDetails(8, '225')">225</div>
<div class="plot plot-8-226" onclick="showPlotDetails(8, '226')">226</div>
<div class="plot plot-8-227" onclick="showPlotDetails(8, '227')">227</div>
<div class="plot plot-8-228" onclick="showPlotDetails(8, '228')">228</div>
<div class="plot plot-8-229" onclick="showPlotDetails(8, '229')">229</div>
<div class="plot plot-8-230" onclick="showPlotDetails(8, '230')">230</div>
<div class="plot plot-8-231" onclick="showPlotDetails(8, '231')">231</div>
<div class="plot plot-8-232" onclick="showPlotDetails(8, '232')">232</div>
<div class="plot plot-8-233" onclick="showPlotDetails(8, '233')">233</div>
<div class="plot plot-8-234" onclick="showPlotDetails(8, '234')">234</div>
<div class="plot plot-8-235" onclick="showPlotDetails(8, '235')">235</div>
<div class="plot plot-8-236" onclick="showPlotDetails(8, '236')">236</div>
<div class="plot plot-8-237" onclick="showPlotDetails(8, '237')">237</div>
<div class="plot plot-8-238" onclick="showPlotDetails(8, '238')">238</div>
<div class="plot plot-8-239" onclick="showPlotDetails(8, '239')">239</div>
<div class="plot plot-8-240" onclick="showPlotDetails(8, '240')">240</div>
<div class="plot plot-8-241" onclick="showPlotDetails(8, '241')">241</div>
<div class="plot plot-8-242" onclick="showPlotDetails(8, '242')">242</div>
<div class="plot plot-8-243" onclick="showPlotDetails(8, '243')">243</div>
<div class="plot plot-8-244" onclick="showPlotDetails(8, '244')">244</div>
<div class="plot plot-8-245" onclick="showPlotDetails(8, '245')">245</div>
<div class="plot plot-8-246" onclick="showPlotDetails(8, '246')">246</div>
<div class="plot plot-8-247" onclick="showPlotDetails(8, '247')">247</div>
<div class="plot plot-8-248" onclick="showPlotDetails(8, '248')">248</div>
<div class="plot plot-8-249" onclick="showPlotDetails(8, '249')">249</div>
<div class="plot plot-8-250" onclick="showPlotDetails(8, '250')">250</div>
<div class="plot plot-8-251" onclick="showPlotDetails(8, '251')">251</div>
<div class="plot plot-8-252" onclick="showPlotDetails(8, '252')">252</div>
<div class="plot plot-8-253" onclick="showPlotDetails(8, '253')">253</div>
<div class="plot plot-8-254" onclick="showPlotDetails(8, '254')">254</div>
<div class="plot plot-8-255" onclick="showPlotDetails(8, '255')">255</div>
<div class="plot plot-8-256" onclick="showPlotDetails(8, '256')">256</div>
<div class="plot plot-8-257" onclick="showPlotDetails(8, '257')">257</div>
<div class="plot plot-8-258" onclick="showPlotDetails(8, '258')">258</div>
<div class="plot plot-8-259" onclick="showPlotDetails(8, '259')">259</div>
<div class="plot plot-8-260" onclick="showPlotDetails(8, '260')">260</div>
<div class="plot plot-8-261" onclick="showPlotDetails(8, '261')">261</div>
<div class="plot plot-8-262" onclick="showPlotDetails(8, '262')">262</div>
<div class="plot plot-8-263" onclick="showPlotDetails(8, '263')">263</div>
<div class="plot plot-8-264" onclick="showPlotDetails(8, '264')">264</div>
<div class="plot plot-8-265" onclick="showPlotDetails(8, '265')">265</div>
<div class="plot plot-8-266" onclick="showPlotDetails(8, '266')">266</div>
<div class="plot plot-8-267" onclick="showPlotDetails(8, '267')">267</div>
<div class="plot plot-8-268" onclick="showPlotDetails(8, '268')">268</div>
<div class="plot plot-8-269" onclick="showPlotDetails(8, '269')">269</div>
<div class="plot plot-8-270" onclick="showPlotDetails(8, '270')">270</div>
<div class="plot plot-8-271" onclick="showPlotDetails(8, '271')">271</div>
<div class="plot plot-8-272" onclick="showPlotDetails(8, '272')">272</div>
<div class="plot plot-8-273" onclick="showPlotDetails(8, '273')">273</div>
<div class="plot plot-8-274" onclick="showPlotDetails(8, '274')">274</div>
<div class="plot plot-8-275" onclick="showPlotDetails(8, '275')">275</div>
<div class="plot plot-8-276" onclick="showPlotDetails(8, '276')">276</div>
<div class="plot plot-8-277" onclick="showPlotDetails(8, '277')">277</div>
<div class="plot plot-8-278" onclick="showPlotDetails(8, '278')">278</div>
<div class="plot plot-8-279" onclick="showPlotDetails(8, '279')">279</div>
<div class="plot plot-8-280" onclick="showPlotDetails(8, '280')">280</div>
<div class="plot plot-8-281" onclick="showPlotDetails(8, '281')">281</div>
<div class="plot plot-8-282" onclick="showPlotDetails(8, '282')">282</div>
<div class="plot plot-8-283" onclick="showPlotDetails(8, '283')">283</div>
<div class="plot plot-8-284" onclick="showPlotDetails(8, '284')">284</div>
<div class="plot plot-8-285" onclick="showPlotDetails(8, '285')">285</div>
<div class="plot plot-8-286" onclick="showPlotDetails(8, '286')">286</div>
<div class="plot plot-8-287" onclick="showPlotDetails(8, '287')">287</div>
<div class="plot plot-8-288" onclick="showPlotDetails(8, '288')">288</div>
<div class="plot plot-8-289" onclick="showPlotDetails(8, '289')">289</div>
<div class="plot plot-8-290" onclick="showPlotDetails(8, '290')">290</div>
<div class="plot plot-8-291" onclick="showPlotDetails(8, '291')">291</div>
<div class="plot plot-8-292" onclick="showPlotDetails(8, '292')">292</div>
<div class="plot plot-8-293" onclick="showPlotDetails(8, '293')">293</div>
<div class="plot plot-8-294" onclick="showPlotDetails(8, '294')">294</div>
<div class="plot plot-8-295" onclick="showPlotDetails(8, '295')">295</div>
<div class="plot plot-8-296" onclick="showPlotDetails(8, '296')">296</div>
<div class="plot plot-8-297" onclick="showPlotDetails(8, '297')">297</div>
<div class="plot plot-8-298" onclick="showPlotDetails(8, '298')">298</div>
<div class="plot plot-8-299" onclick="showPlotDetails(8, '299')">299</div>
<div class="plot plot-8-300" onclick="showPlotDetails(8, '300')">300</div>
<div class="plot plot-8-301" onclick="showPlotDetails(8, '301')">301</div>
<div class="plot plot-8-302" onclick="showPlotDetails(8, '302')">302</div>
<div class="plot plot-8-303" onclick="showPlotDetails(8, '303')">303</div>
<div class="plot plot-8-304" onclick="showPlotDetails(8, '304')">304</div>
<div class="plot plot-8-305" onclick="showPlotDetails(8, '305')">305</div>
<div class="plot plot-8-306" onclick="showPlotDetails(8, '306')">306</div>
<div class="plot plot-8-307" onclick="showPlotDetails(8, '307')">307</div>
<div class="plot plot-8-308" onclick="showPlotDetails(8, '308')">308</div>
<div class="plot plot-8-309" onclick="showPlotDetails(8, '309')">309</div>
<div class="plot plot-8-310" onclick="showPlotDetails(8, '310')">310</div>
<div class="plot plot-8-311" onclick="showPlotDetails(8, '311')">311</div>
<div class="plot plot-8-312" onclick="showPlotDetails(8, '312')">312</div>
<div class="plot plot-8-313" onclick="showPlotDetails(8, '313')">313</div>
<div class="plot plot-8-314" onclick="showPlotDetails(8, '314')">314</div>
<div class="plot plot-8-315" onclick="showPlotDetails(8, '315')">315</div>
<div class="plot plot-8-316" onclick="showPlotDetails(8, '316')">316</div>
<div class="plot plot-8-317" onclick="showPlotDetails(8, '317')">317</div>
<div class="plot plot-8-318" onclick="showPlotDetails(8, '318')">318</div>
<div class="plot plot-8-319" onclick="showPlotDetails(8, '319')">319</div>
<div class="plot plot-8-320" onclick="showPlotDetails(8, '320')">320</div>
<div class="plot plot-8-321" onclick="showPlotDetails(8, '321')">321</div>
<div class="plot plot-8-322" onclick="showPlotDetails(8, '322')">322</div>
<div class="plot plot-8-323" onclick="showPlotDetails(8, '323')">323</div>
<div class="plot plot-8-324" onclick="showPlotDetails(8, '324')">324</div>
<div class="plot plot-8-325" onclick="showPlotDetails(8, '325')">325</div>
<div class="plot plot-8-326" onclick="showPlotDetails(8, '326')">326</div>
<div class="plot plot-8-327" onclick="showPlotDetails(8, '327')">327</div>
<div class="plot plot-8-328" onclick="showPlotDetails(8, '328')">328</div>
<div class="plot plot-8-329" onclick="showPlotDetails(8, '329')">329</div>
<div class="plot plot-8-330" onclick="showPlotDetails(8, '330')">330</div>
<div class="plot plot-8-331" onclick="showPlotDetails(8, '331')">331</div>
<div class="plot plot-8-332" onclick="showPlotDetails(8, '332')">332</div>
<div class="plot plot-8-333" onclick="showPlotDetails(8, '333')">333</div>
<div class="plot plot-8-334" onclick="showPlotDetails(8, '334')">334</div>
<div class="plot plot-8-335" onclick="showPlotDetails(8, '335')">335</div>
<div class="plot plot-8-336" onclick="showPlotDetails(8, '336')">336</div>
<div class="plot plot-8-337" onclick="showPlotDetails(8, '337')">337</div>
<div class="plot plot-8-338" onclick="showPlotDetails(8, '338')">338</div>
<div class="plot plot-8-339" onclick="showPlotDetails(8, '339')">339</div>
<div class="plot plot-8-340" onclick="showPlotDetails(8, '340')">340</div>
<div class="plot plot-8-341" onclick="showPlotDetails(8, '341')">341</div>
<div class="plot plot-8-342" onclick="showPlotDetails(8, '342')">342</div>
<div class="plot plot-8-343" onclick="showPlotDetails(8, '343')">343</div>
<div class="plot plot-8-344" onclick="showPlotDetails(8, '344')">344</div>
<div class="plot plot-8-345" onclick="showPlotDetails(8, '345')">345</div>
<div class="plot plot-8-346" onclick="showPlotDetails(8, '346')">346</div>
<div class="plot plot-8-347" onclick="showPlotDetails(8, '347')">347</div>
<div class="plot plot-8-348" onclick="showPlotDetails(8, '348')">348</div>
<div class="plot plot-8-349" onclick="showPlotDetails(8, '349')">349</div>
<div class="plot plot-8-350" onclick="showPlotDetails(8, '350')">350</div>
<div class="plot plot-8-351" onclick="showPlotDetails(8, '351')">351</div>
<div class="plot plot-8-352" onclick="showPlotDetails(8, '352')">352</div>
<div class="plot plot-8-353" onclick="showPlotDetails(8, '353')">353</div>
<div class="plot plot-8-354" onclick="showPlotDetails(8, '354')">354</div>
<div class="plot plot-8-355" onclick="showPlotDetails(8, '355')">355</div>
<div class="plot plot-8-356" onclick="showPlotDetails(8, '356')">356</div>
<div class="plot plot-8-357" onclick="showPlotDetails(8, '357')">357</div>
<div class="plot plot-8-358" onclick="showPlotDetails(8, '358')">358</div>
<div class="plot plot-8-359" onclick="showPlotDetails(8, '359')">359</div>
<div class="plot plot-8-360" onclick="showPlotDetails(8, '360')">360</div>
<div class="plot plot-8-361" onclick="showPlotDetails(8, '361')">361</div>
<div class="plot plot-8-362" onclick="showPlotDetails(8, '362')">362</div>
<div class="plot plot-8-363" onclick="showPlotDetails(8, '363')">363</div>
<div class="plot plot-8-364" onclick="showPlotDetails(8, '364')">364</div>
<div class="plot plot-8-365" onclick="showPlotDetails(8, '365')">365</div>
<div class="plot plot-8-366" onclick="showPlotDetails(8, '366')">366</div>
<div class="plot plot-8-367" onclick="showPlotDetails(8, '367')">367</div>
<div class="plot plot-8-368" onclick="showPlotDetails(8, '368')">368</div>
<div class="plot plot-8-369" onclick="showPlotDetails(8, '369')">369</div>
<div class="plot plot-8-370" onclick="showPlotDetails(8, '370')">370</div>
<div class="plot plot-8-371" onclick="showPlotDetails(8, '371')">371</div>
<div class="plot plot-8-372" onclick="showPlotDetails(8, '372')">372</div>
<div class="plot plot-8-373" onclick="showPlotDetails(8, '373')">373</div>
<div class="plot plot-8-374" onclick="showPlotDetails(8, '374')">374</div>
<div class="plot plot-8-375" onclick="showPlotDetails(8, '375')">375</div>
<div class="plot plot-8-376" onclick="showPlotDetails(8, '376')">376</div>
<div class="plot plot-8-377" onclick="showPlotDetails(8, '377')">377</div>
<div class="plot plot-8-378" onclick="showPlotDetails(8, '378')">378</div>
<div class="plot plot-8-379" onclick="showPlotDetails(8, '379')">379</div>
<div class="plot plot-8-380" onclick="showPlotDetails(8, '380')">380</div>
<div class="plot plot-8-381" onclick="showPlotDetails(8, '381')">381</div>
<div class="plot plot-8-382" onclick="showPlotDetails(8, '382')">382</div>
<div class="plot plot-8-383" onclick="showPlotDetails(8, '383')">383</div>
<div class="plot plot-8-384" onclick="showPlotDetails(8, '384')">384</div>
<div class="plot plot-8-385" onclick="showPlotDetails(8, '385')">385</div>
<div class="plot plot-8-386" onclick="showPlotDetails(8, '386')">386</div>
<div class="plot plot-8-387" onclick="showPlotDetails(8, '387')">387</div>
<div class="plot plot-8-388" onclick="showPlotDetails(8, '388')">388</div>
<div class="plot plot-8-389" onclick="showPlotDetails(8, '389')">389</div>
<div class="plot plot-8-390" onclick="showPlotDetails(8, '390')">390</div>
<div class="plot plot-8-391" onclick="showPlotDetails(8, '391')">391</div>
<div class="plot plot-8-392" onclick="showPlotDetails(8, '392')">392</div>
<div class="plot plot-8-393" onclick="showPlotDetails(8, '393')">393</div>
<div class="plot plot-8-394" onclick="showPlotDetails(8, '394')">394</div>
<div class="plot plot-8-395" onclick="showPlotDetails(8, '395')">395</div>
<div class="plot plot-8-396" onclick="showPlotDetails(8, '396')">396</div>
<div class="plot plot-8-397" onclick="showPlotDetails(8, '397')">397</div>
<div class="plot plot-8-398" onclick="showPlotDetails(8, '398')">398</div>
<div class="plot plot-8-399" onclick="showPlotDetails(8, '399')">399</div>
<div class="plot plot-8-400" onclick="showPlotDetails(8, '400')">400</div>
<div class="plot plot-8-401" onclick="showPlotDetails(8, '401')">401</div>
<div class="plot plot-8-402" onclick="showPlotDetails(8, '402')">402</div>
<div class="plot plot-8-403" onclick="showPlotDetails(8, '403')">403</div>
<div class="plot plot-8-404" onclick="showPlotDetails(8, '404')">404</div>
<div class="plot plot-8-405" onclick="showPlotDetails(8, '405')">405</div>
<div class="plot plot-8-406" onclick="showPlotDetails(8, '406')">406</div>
<div class="plot plot-8-407" onclick="showPlotDetails(8, '407')">407</div>
<div class="plot plot-8-408" onclick="showPlotDetails(8, '408')">408</div>
<div class="plot plot-8-409" onclick="showPlotDetails(8, '409')">409</div>
<div class="plot plot-8-410" onclick="showPlotDetails(8, '410')">410</div>
<div class="plot plot-8-411" onclick="showPlotDetails(8, '411')">411</div>
<div class="plot plot-8-412" onclick="showPlotDetails(8, '412')">412</div>
<div class="plot plot-8-413" onclick="showPlotDetails(8, '413')">413</div>
<div class="plot plot-8-414" onclick="showPlotDetails(8, '414')">414</div>
<div class="plot plot-8-415" onclick="showPlotDetails(8, '415')">415</div>
<div class="plot plot-8-416" onclick="showPlotDetails(8, '416')">416</div>
<div class="plot plot-8-417" onclick="showPlotDetails(8, '417')">417</div>
<div class="plot plot-8-418" onclick="showPlotDetails(8, '418')">418</div>
<div class="plot plot-8-419" onclick="showPlotDetails(8, '419')">419</div>
<div class="plot plot-8-420" onclick="showPlotDetails(8, '420')">420</div>
<div class="plot plot-8-421" onclick="showPlotDetails(8, '421')">421</div>
<div class="plot plot-8-422" onclick="showPlotDetails(8, '422')">422</div>
<div class="plot plot-8-423" onclick="showPlotDetails(8, '423')">423</div>
<div class="plot plot-8-424" onclick="showPlotDetails(8, '424')">424</div>
<div class="plot plot-8-425" onclick="showPlotDetails(8, '425')">425</div>
<div class="plot plot-8-426" onclick="showPlotDetails(8, '426')">426</div>
<div class="plot plot-8-427" onclick="showPlotDetails(8, '427')">427</div>
<div class="plot plot-8-428" onclick="showPlotDetails(8, '428')">428</div>
<div class="plot plot-8-429" onclick="showPlotDetails(8, '429')">429</div>
<div class="plot plot-8-430" onclick="showPlotDetails(8, '430')">430</div>
<div class="plot plot-8-431" onclick="showPlotDetails(8, '431')">431</div>
<div class="plot plot-8-432" onclick="showPlotDetails(8, '432')">432</div>
<div class="plot plot-8-433" onclick="showPlotDetails(8, '433')">433</div>
<div class="plot plot-8-434" onclick="showPlotDetails(8, '434')">434</div>
<div class="plot plot-8-435" onclick="showPlotDetails(8, '435')">435</div>
<div class="plot plot-8-436" onclick="showPlotDetails(8, '436')">436</div>
<div class="plot plot-8-437" onclick="showPlotDetails(8, '437')">437</div>
<div class="plot plot-8-438" onclick="showPlotDetails(8, '438')">438</div>
<div class="plot plot-8-439" onclick="showPlotDetails(8, '439')">439</div>
<div class="plot plot-8-440" onclick="showPlotDetails(8, '440')">440</div>
<div class="plot plot-8-441" onclick="showPlotDetails(8, '441')">441</div>
<div class="plot plot-8-442" onclick="showPlotDetails(8, '442')">442</div>
<div class="plot plot-8-443" onclick="showPlotDetails(8, '443')">443</div>
<div class="plot plot-8-444" onclick="showPlotDetails(8, '444')">444</div>
<div class="plot plot-8-445" onclick="showPlotDetails(8, '445')">445</div>
<div class="plot plot-8-446" onclick="showPlotDetails(8, '446')">446</div>
<div class="plot plot-8-447" onclick="showPlotDetails(8, '447')">447</div>
<div class="plot plot-8-448" onclick="showPlotDetails(8, '448')">448</div>
<div class="plot plot-8-449" onclick="showPlotDetails(8, '449')">449</div>
<div class="plot plot-8-450" onclick="showPlotDetails(8, '450')">450</div>
<div class="plot plot-8-451" onclick="showPlotDetails(8, '451')">451</div>
<div class="plot plot-8-452" onclick="showPlotDetails(8, '452')">452</div>
<div class="plot plot-8-453" onclick="showPlotDetails(8, '453')">453</div>
<div class="plot plot-8-454" onclick="showPlotDetails(8, '454')">454</div>
<div class="plot plot-8-455" onclick="showPlotDetails(8, '455')">455</div>
<div class="plot plot-8-456" onclick="showPlotDetails(8, '456')">456</div>
<div class="plot plot-8-457" onclick="showPlotDetails(8, '457')">457</div>
<div class="plot plot-8-458" onclick="showPlotDetails(8, '458')">458</div>
<div class="plot plot-8-459" onclick="showPlotDetails(8, '459')">459</div>
<div class="plot plot-8-460" onclick="showPlotDetails(8, '460')">460</div>
<div class="plot plot-8-461" onclick="showPlotDetails(8, '461')">461</div>
<div class="plot plot-8-462" onclick="showPlotDetails(8, '462')">462</div>
<div class="plot plot-8-463" onclick="showPlotDetails(8, '463')">463</div>
<div class="plot plot-8-464" onclick="showPlotDetails(8, '464')">464</div>
<div class="plot plot-8-465" onclick="showPlotDetails(8, '465')">465</div>
<div class="plot plot-8-466" onclick="showPlotDetails(8, '466')">466</div>
<div class="plot plot-8-467" onclick="showPlotDetails(8, '467')">467</div>
<div class="plot plot-8-468" onclick="showPlotDetails(8, '468')">468</div>
<div class="plot plot-8-469" onclick="showPlotDetails(8, '469')">469</div>
<div class="plot plot-8-470" onclick="showPlotDetails(8, '470')">470</div>
<div class="plot plot-8-471" onclick="showPlotDetails(8, '471')">471</div>
<div class="plot plot-8-472" onclick="showPlotDetails(8, '472')">472</div>
<div class="plot plot-8-473" onclick="showPlotDetails(8, '473')">473</div>
<div class="plot plot-8-474" onclick="showPlotDetails(8, '474')">474</div>
<div class="plot plot-8-475" onclick="showPlotDetails(8, '475')">475</div>
<div class="plot plot-8-476" onclick="showPlotDetails(8, '476')">476</div>
<div class="plot plot-8-477" onclick="showPlotDetails(8, '477')">477</div>
<div class="plot plot-8-478" onclick="showPlotDetails(8, '478')">478</div>
<div class="plot plot-8-479" onclick="showPlotDetails(8, '479')">479</div>
<div class="plot plot-8-480" onclick="showPlotDetails(8, '480')">480</div>
<div class="plot plot-8-481" onclick="showPlotDetails(8, '481')">481</div>
<div class="plot plot-8-482" onclick="showPlotDetails(8, '482')">482</div>
<div class="plot plot-8-483" onclick="showPlotDetails(8, '483')">483</div>
<div class="plot plot-8-484" onclick="showPlotDetails(8, '484')">484</div>
<div class="plot plot-8-485" onclick="showPlotDetails(8, '485')">485</div>
<div class="plot plot-8-486" onclick="showPlotDetails(8, '486')">486</div>
<div class="plot plot-8-487" onclick="showPlotDetails(8, '487')">487</div>
<div class="plot plot-8-488" onclick="showPlotDetails(8, '488')">488</div>
<div class="plot plot-8-489" onclick="showPlotDetails(8, '489')">489</div>
<div class="plot plot-8-490" onclick="showPlotDetails(8, '490')">490</div>
<div class="plot plot-8-491" onclick="showPlotDetails(8, '491')">491</div>
<div class="plot plot-8-492" onclick="showPlotDetails(8, '492')">492</div>
<div class="plot plot-8-493" onclick="showPlotDetails(8, '493')">493</div>
<div class="plot plot-8-494" onclick="showPlotDetails(8, '494')">494</div>
<div class="plot plot-8-495" onclick="showPlotDetails(8, '495')">495</div>
<div class="plot plot-8-496" onclick="showPlotDetails(8, '496')">496</div>
<div class="plot plot-8-497" onclick="showPlotDetails(8, '497')">497</div>
<div class="plot plot-8-498" onclick="showPlotDetails(8, '498')">498</div>
<div class="plot plot-8-499" onclick="showPlotDetails(8, '499')">499</div>
<div class="plot plot-8-500" onclick="showPlotDetails(8, '500')">500</div>

        <div class="plot plot-8-501" onclick="showPlotDetails(8, '501')">501</div>
<div class="plot plot-8-502" onclick="showPlotDetails(8, '502')">502</div>
<div class="plot plot-8-503" onclick="showPlotDetails(8, '503')">503</div>
<div class="plot plot-8-504" onclick="showPlotDetails(8, '504')">504</div>
<div class="plot plot-8-505" onclick="showPlotDetails(8, '505')">505</div>
<div class="plot plot-8-506" onclick="showPlotDetails(8, '506')">506</div>
<div class="plot plot-8-507" onclick="showPlotDetails(8, '507')">507</div>
<div class="plot plot-8-508" onclick="showPlotDetails(8, '508')">508</div>
<div class="plot plot-8-509" onclick="showPlotDetails(8, '509')">509</div>
<div class="plot plot-8-510" onclick="showPlotDetails(8, '510')">510</div>
<div class="plot plot-8-511" onclick="showPlotDetails(8, '511')">511</div>
<div class="plot plot-8-512" onclick="showPlotDetails(8, '512')">512</div>
<div class="plot plot-8-513" onclick="showPlotDetails(8, '513')">513</div>
<div class="plot plot-8-514" onclick="showPlotDetails(8, '514')">514</div>
<div class="plot plot-8-515" onclick="showPlotDetails(8, '515')">515</div>
<div class="plot plot-8-516" onclick="showPlotDetails(8, '516')">516</div>
<div class="plot plot-8-517" onclick="showPlotDetails(8, '517')">517</div>
<div class="plot plot-8-518" onclick="showPlotDetails(8, '518')">518</div>
<div class="plot plot-8-519" onclick="showPlotDetails(8, '519')">519</div>
<div class="plot plot-8-520" onclick="showPlotDetails(8, '520')">520</div>
<div class="plot plot-8-521" onclick="showPlotDetails(8, '521')">521</div>
<div class="plot plot-8-522" onclick="showPlotDetails(8, '522')">522</div>
<div class="plot plot-8-523" onclick="showPlotDetails(8, '523')">523</div>
<div class="plot plot-8-524" onclick="showPlotDetails(8, '524')">524</div>
<div class="plot plot-8-525" onclick="showPlotDetails(8, '525')">525</div>
<div class="plot plot-8-526" onclick="showPlotDetails(8, '526')">526</div>
<div class="plot plot-8-527" onclick="showPlotDetails(8, '527')">527</div>
<div class="plot plot-8-528" onclick="showPlotDetails(8, '528')">528</div>
<div class="plot plot-8-529" onclick="showPlotDetails(8, '529')">529</div>
<div class="plot plot-8-530" onclick="showPlotDetails(8, '530')">530</div>
<div class="plot plot-8-531" onclick="showPlotDetails(8, '531')">531</div>
<div class="plot plot-8-532" onclick="showPlotDetails(8, '532')">532</div>
<div class="plot plot-8-533" onclick="showPlotDetails(8, '533')">533</div>
<div class="plot plot-8-534" onclick="showPlotDetails(8, '534')">534</div>
<div class="plot plot-8-535" onclick="showPlotDetails(8, '535')">535</div>
<div class="plot plot-8-536" onclick="showPlotDetails(8, '536')">536</div>
<div class="plot plot-8-537" onclick="showPlotDetails(8, '537')">537</div>
<div class="plot plot-8-538" onclick="showPlotDetails(8, '538')">538</div>
<div class="plot plot-8-539" onclick="showPlotDetails(8, '539')">539</div>
<div class="plot plot-8-540" onclick="showPlotDetails(8, '540')">540</div>
<div class="plot plot-8-541" onclick="showPlotDetails(8, '541')">541</div>
<div class="plot plot-8-542" onclick="showPlotDetails(8, '542')">542</div>
<div class="plot plot-8-543" onclick="showPlotDetails(8, '543')">543</div>
<div class="plot plot-8-544" onclick="showPlotDetails(8, '544')">544</div>
<div class="plot plot-8-545" onclick="showPlotDetails(8, '545')">545</div>
<div class="plot plot-8-546" onclick="showPlotDetails(8, '546')">546</div>
<div class="plot plot-8-547" onclick="showPlotDetails(8, '547')">547</div>
<div class="plot plot-8-548" onclick="showPlotDetails(8, '548')">548</div>
<div class="plot plot-8-549" onclick="showPlotDetails(8, '549')">549</div>
<div class="plot plot-8-550" onclick="showPlotDetails(8, '550')">550</div>
<div class="plot plot-8-551" onclick="showPlotDetails(8, '551')">551</div>
<div class="plot plot-8-552" onclick="showPlotDetails(8, '552')">552</div>
<div class="plot plot-8-553" onclick="showPlotDetails(8, '553')">553</div>
<div class="plot plot-8-554" onclick="showPlotDetails(8, '554')">554</div>
<div class="plot plot-8-555" onclick="showPlotDetails(8, '555')">555</div>
<div class="plot plot-8-556" onclick="showPlotDetails(8, '556')">556</div>
<div class="plot plot-8-557" onclick="showPlotDetails(8, '557')">557</div>
<div class="plot plot-8-558" onclick="showPlotDetails(8, '558')">558</div>
<div class="plot plot-8-559" onclick="showPlotDetails(8, '559')">559</div>
<div class="plot plot-8-560" onclick="showPlotDetails(8, '560')">560</div>
<div class="plot plot-8-561" onclick="showPlotDetails(8, '561')">561</div>
<div class="plot plot-8-562" onclick="showPlotDetails(8, '562')">562</div>
<div class="plot plot-8-563" onclick="showPlotDetails(8, '563')">563</div>
<div class="plot plot-8-564" onclick="showPlotDetails(8, '564')">564</div>
<div class="plot plot-8-565" onclick="showPlotDetails(8, '565')">565</div>
<div class="plot plot-8-566" onclick="showPlotDetails(8, '566')">566</div>
<div class="plot plot-8-567" onclick="showPlotDetails(8, '567')">567</div>
<div class="plot plot-8-568" onclick="showPlotDetails(8, '568')">568</div>
<div class="plot plot-8-569" onclick="showPlotDetails(8, '569')">569</div>
<div class="plot plot-8-570" onclick="showPlotDetails(8, '570')">570</div>
<div class="plot plot-8-571" onclick="showPlotDetails(8, '571')">571</div>
<div class="plot plot-8-572" onclick="showPlotDetails(8, '572')">572</div>
<div class="plot plot-8-573" onclick="showPlotDetails(8, '573')">573</div>
<div class="plot plot-8-574" onclick="showPlotDetails(8, '574')">574</div>
<div class="plot plot-8-575" onclick="showPlotDetails(8, '575')">575</div>
<div class="plot plot-8-576" onclick="showPlotDetails(8, '576')">576</div>
<div class="plot plot-8-577" onclick="showPlotDetails(8, '577')">577</div>
<div class="plot plot-8-578" onclick="showPlotDetails(8, '578')">578</div>
<div class="plot plot-8-579" onclick="showPlotDetails(8, '579')">579</div>
<div class="plot plot-8-580" onclick="showPlotDetails(8, '580')">580</div>
</div>
<style>
  .ped{
    font-size: 12px;
  }
  .two-way-traffic-sign {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px 20px;
    right: -16pc;
    bottom: 10.8pc;
    position: relative;
}

.arrow-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 10px 0;
}

.arrow {
    width: 70px;
    height: 7px;
    border: 2px solid #ffffff;
    position: relative;
    background-color: white;
}

.arrow.left::before {
    content: '';
    position: absolute;
    top: 50%;
    left: -20px;
    transform: translateY(-50%);
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-right: 20px solid #ffffff;
}

.arrow.right::before {
    content: '';
    position: absolute;
    top: 50%;
    right: -20px;
    transform: translateY(-50%);
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 20px solid #ffffff;
}

.text {
    font-size: 10px;
    font-weight: bold;
    margin: 10px 0;
}
.pathwalk{
  position: relative;
  transform: rotate(90deg)
}
.walk1{
  bottom: 300px;
  right: 300px;

}
.walk2{
  bottom: 300px;
  left: 326px;
}
.b8w{
  bottom: 47pc !important;
}
</style>

<b class="pathwalk walk1" >2.00 M. WIDE PATHWALK</b>
<b class="pathwalk walk2">2.00 M. WIDE PATHWALK</b>
<div class="two-way-traffic-sign b8w">
  <div class="arrow-container">
      <div class="arrow left"></div>
  </div>
  <div class="text">TWO WAY TRAFFIC ROAD</div>
  <div class="arrow-container">
      <div class="arrow right"></div>
  </div>
</div>

</div>

  </div>
</div>
<div id="block2Modal" class="modal">
  <div class="modal-content-map">
      <span>Block 8 Plots</span><span class="close" onclick="closeModal('block2Modal')">&times;</span>
      <div>
          <div class="plot plot-2-1" onclick="showPlotDetails(2, '1')">Plot 1</div>
          <div class="plot plot-2-2" onclick="showPlotDetails(2, '2')">Plot 2</div>
          <div class="plot plot-2-3" onclick="showPlotDetails(2, '3')">Plot 3</div>
      </div>
  </div>
</div>


<!-- Modal HTML for Block 6 -->
<div id="block6Modal" class="modal">
  <div class="modal-content-map">
    <span>Block 6 Plots</span><span class="close" onclick="closeModal('block6Modal')">&times;</span>
    <div class="modal-center">
      <hr style="color: black; width: 79%;" >
      <div class="ped">PEDESTRIAN SIDEWALK</div>
      <hr style="color: black; width: 79%;" >
      <b>GREEN PARK MEMORIAL GARDEN</b>
      <b>BLOCK 6</b>
      <hr style="color: black; width: 79%; margin-top: 40px;" >
      <div class="ped">PEDESTRIAN SIDEWALK</div>
      <hr style="color: black; width: 79%;" >
    <div class="plots_con rotator b6">
      <div class="plot plot-6-1" onclick="showPlotDetails(6, '1')">1</div>
<div class="plot plot-6-2" onclick="showPlotDetails(6, '2')">2</div>
<div class="plot plot-6-3" onclick="showPlotDetails(6, '3')">3</div>
<div class="plot plot-6-4" onclick="showPlotDetails(6, '4')">4</div>
<div class="plot plot-6-5" onclick="showPlotDetails(6, '5')">5</div>
<div class="plot plot-6-6" onclick="showPlotDetails(6, '6')">6</div>
<div class="plot plot-6-7" onclick="showPlotDetails(6, '7')">7</div>
<div class="plot plot-6-8" onclick="showPlotDetails(6, '8')">8</div>
<div class="plot plot-6-9" onclick="showPlotDetails(6, '9')">9</div>
<div class="plot plot-6-10" onclick="showPlotDetails(6, '10')">10</div>
<div class="plot plot-6-11" onclick="showPlotDetails(6, '11')">11</div>
<div class="plot plot-6-12" onclick="showPlotDetails(6, '12')">12</div>
<div class="plot plot-6-13" onclick="showPlotDetails(6, '13')">13</div>
<div class="plot plot-6-14" onclick="showPlotDetails(6, '14')">14</div>
<div class="plot plot-6-15" onclick="showPlotDetails(6, '15')">15</div>
<div class="plot plot-6-16" onclick="showPlotDetails(6, '16')">16</div>
<div class="plot plot-6-17" onclick="showPlotDetails(6, '17')">17</div>
<div class="plot plot-6-18" onclick="showPlotDetails(6, '18')">18</div>
<div class="plot plot-6-19" onclick="showPlotDetails(6, '19')">19</div>
<div class="plot plot-6-20" onclick="showPlotDetails(6, '20')">20</div>
<div class="plot plot-6-21" onclick="showPlotDetails(6, '21')">21</div>
<div class="plot plot-6-22" onclick="showPlotDetails(6, '22')">22</div>
<div class="plot plot-6-23" onclick="showPlotDetails(6, '23')">23</div>
<div class="plot plot-6-24" onclick="showPlotDetails(6, '24')">24</div>
<div class="plot plot-6-25" onclick="showPlotDetails(6, '25')">25</div>
<div class="plot plot-6-26" onclick="showPlotDetails(6, '26')">26</div>
<div class="plot plot-6-27" onclick="showPlotDetails(6, '27')">27</div>
<div class="plot plot-6-28" onclick="showPlotDetails(6, '28')">28</div>
<div class="plot plot-6-29" onclick="showPlotDetails(6, '29')">29</div>
<div class="plot plot-6-30" onclick="showPlotDetails(6, '30')">30</div>
<div class="plot plot-6-31" onclick="showPlotDetails(6, '31')">31</div>
<div class="plot plot-6-32" onclick="showPlotDetails(6, '32')">32</div>
<div class="plot plot-6-33" onclick="showPlotDetails(6, '33')">33</div>
<div class="plot plot-6-34" onclick="showPlotDetails(6, '34')">34</div>
<div class="plot plot-6-35" onclick="showPlotDetails(6, '35')">35</div>
<div class="plot plot-6-36" onclick="showPlotDetails(6, '36')">36</div>
<div class="plot plot-6-37" onclick="showPlotDetails(6, '37')">37</div>
<div class="plot plot-6-38" onclick="showPlotDetails(6, '38')">38</div>
<div class="plot plot-6-39" onclick="showPlotDetails(6, '39')">39</div>
<div class="plot plot-6-40" onclick="showPlotDetails(6, '40')">40</div>
<div class="plot plot-6-41" onclick="showPlotDetails(6, '41')">41</div>
<div class="plot plot-6-42" onclick="showPlotDetails(6, '42')">42</div>
<div class="plot plot-6-43" onclick="showPlotDetails(6, '43')">43</div>
<div class="plot plot-6-44" onclick="showPlotDetails(6, '44')">44</div>
<div class="plot plot-6-45" onclick="showPlotDetails(6, '45')">45</div>
<div class="plot plot-6-46" onclick="showPlotDetails(6, '46')">46</div>
<div class="plot plot-6-47" onclick="showPlotDetails(6, '47')">47</div>
<div class="plot plot-6-48" onclick="showPlotDetails(6, '48')">48</div>
<div class="plot plot-6-49" onclick="showPlotDetails(6, '49')">49</div>
<div class="plot plot-6-50" onclick="showPlotDetails(6, '50')">50</div>
<div class="plot plot-6-51" onclick="showPlotDetails(6, '51')">51</div>
<div class="plot plot-6-52" onclick="showPlotDetails(6, '52')">52</div>
<div class="plot plot-6-53" onclick="showPlotDetails(6, '53')">53</div>
<div class="plot plot-6-54" onclick="showPlotDetails(6, '54')">54</div>
<div class="plot plot-6-55" onclick="showPlotDetails(6, '55')">55</div>
<div class="plot plot-6-56" onclick="showPlotDetails(6, '56')">56</div>
<div class="plot plot-6-57" onclick="showPlotDetails(6, '57')">57</div>
<div class="plot plot-6-58" onclick="showPlotDetails(6, '58')">58</div>
<div class="plot plot-6-59" onclick="showPlotDetails(6, '59')">59</div>
<div class="plot plot-6-60" onclick="showPlotDetails(6, '60')">60</div>
<div class="plot plot-6-61" onclick="showPlotDetails(6, '61')">61</div>
<div class="plot plot-6-62" onclick="showPlotDetails(6, '62')">62</div>
<div class="plot plot-6-63" onclick="showPlotDetails(6, '63')">63</div>
<div class="plot plot-6-64" onclick="showPlotDetails(6, '64')">64</div>
<div class="plot plot-6-65" onclick="showPlotDetails(6, '65')">65</div>
<div class="plot plot-6-66" onclick="showPlotDetails(6, '66')">66</div>
<div class="plot plot-6-67" onclick="showPlotDetails(6, '67')">67</div>
<div class="plot plot-6-68" onclick="showPlotDetails(6, '68')">68</div>
<div class="plot plot-6-69" onclick="showPlotDetails(6, '69')">69</div>
<div class="plot plot-6-70" onclick="showPlotDetails(6, '70')">70</div>
<div class="plot plot-6-71" onclick="showPlotDetails(6, '71')">71</div>
<div class="plot plot-6-72" onclick="showPlotDetails(6, '72')">72</div>
<div class="plot plot-6-73" onclick="showPlotDetails(6, '73')">73</div>
<div class="plot plot-6-74" onclick="showPlotDetails(6, '74')">74</div>
<div class="plot plot-6-75" onclick="showPlotDetails(6, '75')">75</div>
<div class="plot plot-6-76" onclick="showPlotDetails(6, '76')">76</div>
<div class="plot plot-6-77" onclick="showPlotDetails(6, '77')">77</div>
<div class="plot plot-6-78" onclick="showPlotDetails(6, '78')">78</div>
<div class="plot plot-6-79" onclick="showPlotDetails(6, '79')">79</div>
<div class="plot plot-6-80" onclick="showPlotDetails(6, '80')">80</div>
<div class="plot plot-6-81" onclick="showPlotDetails(6, '81')">81</div>
<div class="plot plot-6-82" onclick="showPlotDetails(6, '82')">82</div>
<div class="plot plot-6-83" onclick="showPlotDetails(6, '83')">83</div>
<div class="plot plot-6-84" onclick="showPlotDetails(6, '84')">84</div>
<div class="plot plot-6-85" onclick="showPlotDetails(6, '85')">85</div>
<div class="plot plot-6-86" onclick="showPlotDetails(6, '86')">86</div>
<div class="plot plot-6-87" onclick="showPlotDetails(6, '87')">87</div>
<div class="plot plot-6-88" onclick="showPlotDetails(6, '88')">88</div>
<div class="plot plot-6-89" onclick="showPlotDetails(6, '89')">89</div>
<div class="plot plot-6-90" onclick="showPlotDetails(6, '90')">90</div>
<div class="plot plot-6-91" onclick="showPlotDetails(6, '91')">91</div>
<div class="plot plot-6-92" onclick="showPlotDetails(6, '92')">92</div>
<div class="plot plot-6-93" onclick="showPlotDetails(6, '93')">93</div>
<div class="plot plot-6-94" onclick="showPlotDetails(6, '94')">94</div>
<div class="plot plot-6-95" onclick="showPlotDetails(6, '95')">95</div>
<div class="plot plot-6-96" onclick="showPlotDetails(6, '96')">96</div>
<div class="plot plot-6-97" onclick="showPlotDetails(6, '97')">97</div>
<div class="plot plot-6-98" onclick="showPlotDetails(6, '98')">98</div>
<div class="plot plot-6-99" onclick="showPlotDetails(6, '99')">99</div>
<div class="plot plot-6-100" onclick="showPlotDetails(6, '100')">100</div>
<div class="plot plot-6-101" onclick="showPlotDetails(6, '101')">101</div>
<div class="plot plot-6-102" onclick="showPlotDetails(6, '102')">102</div>
<div class="plot plot-6-103" onclick="showPlotDetails(6, '103')">103</div>
<div class="plot plot-6-104" onclick="showPlotDetails(6, '104')">104</div>
<div class="plot plot-6-105" onclick="showPlotDetails(6, '105')">105</div>
<div class="plot plot-6-106" onclick="showPlotDetails(6, '106')">106</div>
<div class="plot plot-6-107" onclick="showPlotDetails(6, '107')">107</div>
<div class="plot plot-6-108" onclick="showPlotDetails(6, '108')">108</div>
<div class="plot plot-6-109" onclick="showPlotDetails(6, '109')">109</div>
<div class="plot plot-6-110" onclick="showPlotDetails(6, '110')">110</div>
<div class="plot plot-6-111" onclick="showPlotDetails(6, '111')">111</div>
<div class="plot plot-6-112" onclick="showPlotDetails(6, '112')">112</div>
<div class="plot plot-6-113" onclick="showPlotDetails(6, '113')">113</div>
<div class="plot plot-6-114" onclick="showPlotDetails(6, '114')">114</div>
<div class="plot plot-6-115" onclick="showPlotDetails(6, '115')">115</div>
<div class="plot plot-6-116" onclick="showPlotDetails(6, '116')">116</div>
<div class="plot plot-6-117" onclick="showPlotDetails(6, '117')">117</div>
<div class="plot plot-6-118" onclick="showPlotDetails(6, '118')">118</div>
<div class="plot plot-6-119" onclick="showPlotDetails(6, '119')">119</div>
<div class="plot plot-6-120" onclick="showPlotDetails(6, '120')">120</div>
<div class="plot plot-6-121" onclick="showPlotDetails(6, '121')">121</div>
<div class="plot plot-6-122" onclick="showPlotDetails(6, '122')">122</div>
<div class="plot plot-6-123" onclick="showPlotDetails(6, '123')">123</div>
<div class="plot plot-6-124" onclick="showPlotDetails(6, '124')">124</div>
<div class="plot plot-6-125" onclick="showPlotDetails(6, '125')">125</div>
<div class="plot plot-6-126" onclick="showPlotDetails(6, '126')">126</div>
<div class="plot plot-6-127" onclick="showPlotDetails(6, '127')">127</div>
<div class="plot plot-6-128" onclick="showPlotDetails(6, '128')">128</div>
<div class="plot plot-6-129" onclick="showPlotDetails(6, '129')">129</div>
<div class="plot plot-6-130" onclick="showPlotDetails(6, '130')">130</div>
<div class="plot plot-6-131" onclick="showPlotDetails(6, '131')">131</div>
<div class="plot plot-6-132" onclick="showPlotDetails(6, '132')">132</div>
<div class="plot plot-6-133" onclick="showPlotDetails(6, '133')">133</div>
<div class="plot plot-6-134" onclick="showPlotDetails(6, '134')">134</div>
<div class="plot plot-6-135" onclick="showPlotDetails(6, '135')">135</div>
<div class="plot plot-6-136" onclick="showPlotDetails(6, '136')">136</div>
<div class="plot plot-6-137" onclick="showPlotDetails(6, '137')">137</div>
<div class="plot plot-6-138" onclick="showPlotDetails(6, '138')">138</div>
<div class="plot plot-6-139" onclick="showPlotDetails(6, '139')">139</div>
<div class="plot plot-6-140" onclick="showPlotDetails(6, '140')">140</div>
<div class="plot plot-6-141" onclick="showPlotDetails(6, '141')">141</div>
<div class="plot plot-6-142" onclick="showPlotDetails(6, '142')">142</div>
<div class="plot plot-6-143" onclick="showPlotDetails(6, '143')">143</div>
<div class="plot plot-6-144" onclick="showPlotDetails(6, '144')">144</div>
<div class="plot plot-6-145" onclick="showPlotDetails(6, '145')">145</div>
<div class="plot plot-6-146" onclick="showPlotDetails(6, '146')">146</div>
<div class="plot plot-6-147" onclick="showPlotDetails(6, '147')">147</div>
<div class="plot plot-6-148" onclick="showPlotDetails(6, '148')">148</div>
<div class="plot plot-6-149" onclick="showPlotDetails(6, '149')">149</div>
<div class="plot plot-6-150" onclick="showPlotDetails(6, '150')">150</div>
<div class="plot plot-6-151" onclick="showPlotDetails(6, '151')">151</div>
<div class="plot plot-6-152" onclick="showPlotDetails(6, '152')">152</div>
<div class="plot plot-6-153" onclick="showPlotDetails(6, '153')">153</div>
<div class="plot plot-6-154" onclick="showPlotDetails(6, '154')">154</div>
<div class="plot plot-6-155" onclick="showPlotDetails(6, '155')">155</div>
<div class="plot plot-6-156" onclick="showPlotDetails(6, '156')">156</div>
<div class="plot plot-6-157" onclick="showPlotDetails(6, '157')">157</div>
<div class="plot plot-6-158" onclick="showPlotDetails(6, '158')">158</div>
<div class="plot plot-6-159" onclick="showPlotDetails(6, '159')">159</div>
<div class="plot plot-6-160" onclick="showPlotDetails(6, '160')">160</div>
<div class="plot plot-6-161" onclick="showPlotDetails(6, '161')">161</div>
<div class="plot plot-6-162" onclick="showPlotDetails(6, '162')">162</div>
<div class="plot plot-6-163" onclick="showPlotDetails(6, '163')">163</div>
<div class="plot plot-6-164" onclick="showPlotDetails(6, '164')">164</div>
<div class="plot plot-6-165" onclick="showPlotDetails(6, '165')">165</div>
<div class="plot plot-6-166" onclick="showPlotDetails(6, '166')">166</div>
<div class="plot plot-6-167" onclick="showPlotDetails(6, '167')">167</div>
<div class="plot plot-6-168" onclick="showPlotDetails(6, '168')">168</div>
<div class="plot plot-6-169" onclick="showPlotDetails(6, '169')">169</div>
<div class="plot plot-6-170" onclick="showPlotDetails(6, '170')">170</div>
<div class="plot plot-6-171" onclick="showPlotDetails(6, '171')">171</div>
<div class="plot plot-6-172" onclick="showPlotDetails(6, '172')">172</div>
<div class="plot plot-6-173" onclick="showPlotDetails(6, '173')">173</div>
<div class="plot plot-6-174" onclick="showPlotDetails(6, '174')">174</div>
<div class="plot plot-6-175" onclick="showPlotDetails(6, '175')">175</div>
<div class="plot plot-6-176" onclick="showPlotDetails(6, '176')">176</div>
<div class="plot plot-6-177" onclick="showPlotDetails(6, '177')">177</div>
<div class="plot plot-6-178" onclick="showPlotDetails(6, '178')">178</div>
<div class="plot plot-6-179" onclick="showPlotDetails(6, '179')">179</div>
<div class="plot plot-6-180" onclick="showPlotDetails(6, '180')">180</div>
<div class="plot plot-6-181" onclick="showPlotDetails(6, '181')">181</div>
<div class="plot plot-6-182" onclick="showPlotDetails(6, '182')">182</div>
<div class="plot plot-6-183" onclick="showPlotDetails(6, '183')">183</div>
<div class="plot plot-6-184" onclick="showPlotDetails(6, '184')">184</div>
<div class="plot plot-6-185" onclick="showPlotDetails(6, '185')">185</div>
<div class="plot plot-6-186" onclick="showPlotDetails(6, '186')">186</div>
<div class="plot plot-6-187" onclick="showPlotDetails(6, '187')">187</div>
<div class="plot plot-6-188" onclick="showPlotDetails(6, '188')">188</div>
<div class="plot plot-6-189" onclick="showPlotDetails(6, '189')">189</div>
<div class="plot plot-6-190" onclick="showPlotDetails(6, '190')">190</div>
<div class="plot plot-6-191" onclick="showPlotDetails(6, '191')">191</div>
<div class="plot plot-6-192" onclick="showPlotDetails(6, '192')">192</div>
<div class="plot plot-6-193" onclick="showPlotDetails(6, '193')">193</div>
<div class="plot plot-6-194" onclick="showPlotDetails(6, '194')">194</div>
<div class="plot plot-6-195" onclick="showPlotDetails(6, '195')">195</div>
<div class="plot plot-6-196" onclick="showPlotDetails(6, '196')">196</div>
<div class="plot plot-6-197" onclick="showPlotDetails(6, '197')">197</div>
<div class="plot plot-6-198" onclick="showPlotDetails(6, '198')">198</div>
<div class="plot plot-6-199" onclick="showPlotDetails(6, '199')">199</div>
<div class="plot plot-6-200" onclick="showPlotDetails(6, '200')">200</div>
<div class="plot plot-6-201" onclick="showPlotDetails(6, '201')">201</div>
<div class="plot plot-6-202" onclick="showPlotDetails(6, '202')">202</div>
<div class="plot plot-6-203" onclick="showPlotDetails(6, '203')">203</div>
<div class="plot plot-6-204" onclick="showPlotDetails(6, '204')">204</div>
<div class="plot plot-6-205" onclick="showPlotDetails(6, '205')">205</div>
<div class="plot plot-6-206" onclick="showPlotDetails(6, '206')">206</div>
<div class="plot plot-6-207" onclick="showPlotDetails(6, '207')">207</div>
<div class="plot plot-6-208" onclick="showPlotDetails(6, '208')">208</div>
<div class="plot plot-6-209" onclick="showPlotDetails(6, '209')">209</div>
<div class="plot plot-6-210" onclick="showPlotDetails(6, '210')">210</div>
<div class="plot plot-6-211" onclick="showPlotDetails(6, '211')">211</div>
<div class="plot plot-6-212" onclick="showPlotDetails(6, '212')">212</div>
<div class="plot plot-6-213" onclick="showPlotDetails(6, '213')">213</div>
<div class="plot plot-6-214" onclick="showPlotDetails(6, '214')">214</div>
<div class="plot plot-6-215" onclick="showPlotDetails(6, '215')">215</div>
<div class="plot plot-6-216" onclick="showPlotDetails(6, '216')">216</div>
<div class="plot plot-6-217" onclick="showPlotDetails(6, '217')">217</div>
<div class="plot plot-6-218" onclick="showPlotDetails(6, '218')">218</div>
<div class="plot plot-6-219" onclick="showPlotDetails(6, '219')">219</div>
<div class="plot plot-6-220" onclick="showPlotDetails(6, '220')">220</div>
<div class="plot plot-6-221" onclick="showPlotDetails(6, '221')">221</div>
<div class="plot plot-6-222" onclick="showPlotDetails(6, '222')">222</div>
<div class="plot plot-6-223" onclick="showPlotDetails(6, '223')">223</div>
<div class="plot plot-6-224" onclick="showPlotDetails(6, '224')">224</div>
<div class="plot plot-6-225" onclick="showPlotDetails(6, '225')">225</div>
<div class="plot plot-6-226" onclick="showPlotDetails(6, '226')">226</div>
<div class="plot plot-6-227" onclick="showPlotDetails(6, '227')">227</div>
<div class="plot plot-6-228" onclick="showPlotDetails(6, '228')">228</div>
<div class="plot plot-6-229" onclick="showPlotDetails(6, '229')">229</div>
<div class="plot plot-6-230" onclick="showPlotDetails(6, '230')">230</div>
<div class="plot plot-6-231" onclick="showPlotDetails(6, '231')">231</div>
<div class="plot plot-6-232" onclick="showPlotDetails(6, '232')">232</div>
<div class="plot plot-6-233" onclick="showPlotDetails(6, '233')">233</div>
<div class="plot plot-6-234" onclick="showPlotDetails(6, '234')">234</div>
<div class="plot plot-6-235" onclick="showPlotDetails(6, '235')">235</div>
<div class="plot plot-6-236" onclick="showPlotDetails(6, '236')">236</div>
<div class="plot plot-6-237" onclick="showPlotDetails(6, '237')">237</div>
<div class="plot plot-6-238" onclick="showPlotDetails(6, '238')">238</div>
<div class="plot plot-6-239" onclick="showPlotDetails(6, '239')">239</div>
<div class="plot plot-6-240" onclick="showPlotDetails(6, '240')">240</div>
<div class="plot plot-6-241" onclick="showPlotDetails(6, '241')">241</div>
<div class="plot plot-6-242" onclick="showPlotDetails(6, '242')">242</div>
<div class="plot plot-6-243" onclick="showPlotDetails(6, '243')">243</div>
<div class="plot plot-6-244" onclick="showPlotDetails(6, '244')">244</div>
<div class="plot plot-6-245" onclick="showPlotDetails(6, '245')">245</div>
<div class="plot plot-6-246" onclick="showPlotDetails(6, '246')">246</div>
<div class="plot plot-6-247" onclick="showPlotDetails(6, '247')">247</div>
<div class="plot plot-6-248" onclick="showPlotDetails(6, '248')">248</div>
<div class="plot plot-6-249" onclick="showPlotDetails(6, '249')">249</div>
<div class="plot plot-6-250" onclick="showPlotDetails(6, '250')">250</div>
<div class="plot plot-6-251" onclick="showPlotDetails(6, '251')">251</div>
<div class="plot plot-6-252" onclick="showPlotDetails(6, '252')">252</div>
<div class="plot plot-6-253" onclick="showPlotDetails(6, '253')">253</div>
<div class="plot plot-6-254" onclick="showPlotDetails(6, '254')">254</div>
<div class="plot plot-6-255" onclick="showPlotDetails(6, '255')">255</div>
<div class="plot plot-6-256" onclick="showPlotDetails(6, '256')">256</div>
<div class="plot plot-6-257" onclick="showPlotDetails(6, '257')">257</div>
<div class="plot plot-6-258" onclick="showPlotDetails(6, '258')">258</div>
<div class="plot plot-6-259" onclick="showPlotDetails(6, '259')">259</div>
<div class="plot plot-6-260" onclick="showPlotDetails(6, '260')">260</div>
<div class="plot plot-6-261" onclick="showPlotDetails(6, '261')">261</div>
<div class="plot plot-6-262" onclick="showPlotDetails(6, '262')">262</div>
<div class="plot plot-6-263" onclick="showPlotDetails(6, '263')">263</div>
<div class="plot plot-6-264" onclick="showPlotDetails(6, '264')">264</div>
<div class="plot plot-6-265" onclick="showPlotDetails(6, '265')">265</div>
<div class="plot plot-6-266" onclick="showPlotDetails(6, '266')">266</div>
<div class="plot plot-6-267" onclick="showPlotDetails(6, '267')">267</div>
<div class="plot plot-6-268" onclick="showPlotDetails(6, '268')">268</div>
<div class="plot plot-6-269" onclick="showPlotDetails(6, '269')">269</div>
<div class="plot plot-6-270" onclick="showPlotDetails(6, '270')">270</div>
<div class="plot plot-6-271" onclick="showPlotDetails(6, '271')">271</div>
<div class="plot plot-6-272" onclick="showPlotDetails(6, '272')">272</div>
<div class="plot plot-6-273" onclick="showPlotDetails(6, '273')">273</div>
<div class="plot plot-6-274" onclick="showPlotDetails(6, '274')">274</div>
<div class="plot plot-6-275" onclick="showPlotDetails(6, '275')">275</div>
<div class="plot plot-6-276" onclick="showPlotDetails(6, '276')">276</div>
<div class="plot plot-6-277" onclick="showPlotDetails(6, '277')">277</div>
<div class="plot plot-6-278" onclick="showPlotDetails(6, '278')">278</div>
<div class="plot plot-6-279" onclick="showPlotDetails(6, '279')">279</div>
<div class="plot plot-6-280" onclick="showPlotDetails(6, '280')">280</div>
<div class="plot plot-6-281" onclick="showPlotDetails(6, '281')">281</div>
<div class="plot plot-6-282" onclick="showPlotDetails(6, '282')">282</div>
<div class="plot plot-6-283" onclick="showPlotDetails(6, '283')">283</div>
<div class="plot plot-6-284" onclick="showPlotDetails(6, '284')">284</div>
<div class="plot plot-6-285" onclick="showPlotDetails(6, '285')">285</div>
<div class="plot plot-6-286" onclick="showPlotDetails(6, '286')">286</div>
<div class="plot plot-6-287" onclick="showPlotDetails(6, '287')">287</div>
<div class="plot plot-6-288" onclick="showPlotDetails(6, '288')">288</div>
<div class="plot plot-6-289" onclick="showPlotDetails(6, '289')">289</div>
<div class="plot plot-6-290" onclick="showPlotDetails(6, '290')">290</div>
<div class="plot plot-6-291" onclick="showPlotDetails(6, '291')">291</div>
<div class="plot plot-6-292" onclick="showPlotDetails(6, '292')">292</div>
<div class="plot plot-6-293" onclick="showPlotDetails(6, '293')">293</div>
<div class="plot plot-6-294" onclick="showPlotDetails(6, '294')">294</div>
<div class="plot plot-6-295" onclick="showPlotDetails(6, '295')">295</div>
<div class="plot plot-6-296" onclick="showPlotDetails(6, '296')">296</div>
<div class="plot plot-6-297" onclick="showPlotDetails(6, '297')">297</div>
<div class="plot plot-6-298" onclick="showPlotDetails(6, '298')">298</div>
<div class="plot plot-6-299" onclick="showPlotDetails(6, '299')">299</div>
<div class="plot plot-6-300" onclick="showPlotDetails(6, '300')">300</div>
<div class="plot plot-6-301" onclick="showPlotDetails(6, '301')">301</div>
<div class="plot plot-6-302" onclick="showPlotDetails(6, '302')">302</div>
<div class="plot plot-6-303" onclick="showPlotDetails(6, '303')">303</div>
<div class="plot plot-6-304" onclick="showPlotDetails(6, '304')">304</div>
<div class="plot plot-6-305" onclick="showPlotDetails(6, '305')">305</div>
<div class="plot plot-6-306" onclick="showPlotDetails(6, '306')">306</div>
<div class="plot plot-6-307" onclick="showPlotDetails(6, '307')">307</div>
<div class="plot plot-6-308" onclick="showPlotDetails(6, '308')">308</div>
<div class="plot plot-6-309" onclick="showPlotDetails(6, '309')">309</div>
<div class="plot plot-6-310" onclick="showPlotDetails(6, '310')">310</div>
<div class="plot plot-6-311" onclick="showPlotDetails(6, '311')">311</div>
<div class="plot plot-6-312" onclick="showPlotDetails(6, '312')">312</div>
<div class="plot plot-6-313" onclick="showPlotDetails(6, '313')">313</div>
<div class="plot plot-6-314" onclick="showPlotDetails(6, '314')">314</div>
<div class="plot plot-6-315" onclick="showPlotDetails(6, '315')">315</div>
<div class="plot plot-6-316" onclick="showPlotDetails(6, '316')">316</div>
<div class="plot plot-6-317" onclick="showPlotDetails(6, '317')">317</div>
<div class="plot plot-6-318" onclick="showPlotDetails(6, '318')">318</div>
<div class="plot plot-6-319" onclick="showPlotDetails(6, '319')">319</div>
<div class="plot plot-6-320" onclick="showPlotDetails(6, '320')">320</div>
<div class="plot plot-6-321" onclick="showPlotDetails(6, '321')">321</div>
<div class="plot plot-6-322" onclick="showPlotDetails(6, '322')">322</div>
<div class="plot plot-6-323" onclick="showPlotDetails(6, '323')">323</div>
<div class="plot plot-6-324" onclick="showPlotDetails(6, '324')">324</div>
<div class="plot plot-6-325" onclick="showPlotDetails(6, '325')">325</div>
<div class="plot plot-6-326" onclick="showPlotDetails(6, '326')">326</div>
<div class="plot plot-6-327" onclick="showPlotDetails(6, '327')">327</div>
<div class="plot plot-6-328" onclick="showPlotDetails(6, '328')">328</div>
<div class="plot plot-6-329" onclick="showPlotDetails(6, '329')">329</div>
<div class="plot plot-6-330" onclick="showPlotDetails(6, '330')">330</div>
<div class="plot plot-6-331" onclick="showPlotDetails(6, '331')">331</div>
<div class="plot plot-6-332" onclick="showPlotDetails(6, '332')">332</div>
<div class="plot plot-6-333" onclick="showPlotDetails(6, '333')">333</div>
<div class="plot plot-6-334" onclick="showPlotDetails(6, '334')">334</div>
<div class="plot plot-6-335" onclick="showPlotDetails(6, '335')">335</div>
<div class="plot plot-6-336" onclick="showPlotDetails(6, '336')">336</div>
<div class="plot plot-6-337" onclick="showPlotDetails(6, '337')">337</div>
<div class="plot plot-6-338" onclick="showPlotDetails(6, '338')">338</div>
<div class="plot plot-6-339" onclick="showPlotDetails(6, '339')">339</div>
<div class="plot plot-6-340" onclick="showPlotDetails(6, '340')">340</div>
<div class="plot plot-6-341" onclick="showPlotDetails(6, '341')">341</div>
<div class="plot plot-6-342" onclick="showPlotDetails(6, '342')">342</div>
<div class="plot plot-6-343" onclick="showPlotDetails(6, '343')">343</div>
<div class="plot plot-6-344" onclick="showPlotDetails(6, '344')">344</div>
<div class="plot plot-6-345" onclick="showPlotDetails(6, '345')">345</div>
<div class="plot plot-6-346" onclick="showPlotDetails(6, '346')">346</div>
<div class="plot plot-6-347" onclick="showPlotDetails(6, '347')">347</div>
<div class="plot plot-6-348" onclick="showPlotDetails(6, '348')">348</div>
<div class="plot plot-6-349" onclick="showPlotDetails(6, '349')">349</div>
<div class="plot plot-6-350" onclick="showPlotDetails(6, '350')">350</div>
<div class="plot plot-6-351" onclick="showPlotDetails(6, '351')">351</div>
<div class="plot plot-6-352" onclick="showPlotDetails(6, '352')">352</div>
<div class="plot plot-6-353" onclick="showPlotDetails(6, '353')">353</div>
<div class="plot plot-6-354" onclick="showPlotDetails(6, '354')">354</div>
<div class="plot plot-6-355" onclick="showPlotDetails(6, '355')">355</div>
<div class="plot plot-6-356" onclick="showPlotDetails(6, '356')">356</div>
<div class="plot plot-6-357" onclick="showPlotDetails(6, '357')">357</div>
<div class="plot plot-6-358" onclick="showPlotDetails(6, '358')">358</div>
<div class="plot plot-6-359" onclick="showPlotDetails(6, '359')">359</div>
<div class="plot plot-6-360" onclick="showPlotDetails(6, '360')">360</div>
<div class="plot plot-6-361" onclick="showPlotDetails(6, '361')">361</div>
<div class="plot plot-6-362" onclick="showPlotDetails(6, '362')">362</div>
<div class="plot plot-6-363" onclick="showPlotDetails(6, '363')">363</div>
<div class="plot plot-6-364" onclick="showPlotDetails(6, '364')">364</div>
<div class="plot plot-6-365" onclick="showPlotDetails(6, '365')">365</div>
<div class="plot plot-6-366" onclick="showPlotDetails(6, '366')">366</div>
<div class="plot plot-6-367" onclick="showPlotDetails(6, '367')">367</div>
<div class="plot plot-6-368" onclick="showPlotDetails(6, '368')">368</div>
<div class="plot plot-6-369" onclick="showPlotDetails(6, '369')">369</div>
<div class="plot plot-6-370" onclick="showPlotDetails(6, '370')">370</div>
<div class="plot plot-6-371" onclick="showPlotDetails(6, '371')">371</div>
<div class="plot plot-6-372" onclick="showPlotDetails(6, '372')">372</div>
<div class="plot plot-6-373" onclick="showPlotDetails(6, '373')">373</div>
<div class="plot plot-6-374" onclick="showPlotDetails(6, '374')">374</div>
<div class="plot plot-6-375" onclick="showPlotDetails(6, '375')">375</div>
<div class="plot plot-6-376" onclick="showPlotDetails(6, '376')">376</div>
<div class="plot plot-6-377" onclick="showPlotDetails(6, '377')">377</div>
<div class="plot plot-6-378" onclick="showPlotDetails(6, '378')">378</div>
<div class="plot plot-6-379" onclick="showPlotDetails(6, '379')">379</div>
<div class="plot plot-6-380" onclick="showPlotDetails(6, '380')">380</div>
<div class="plot plot-6-381" onclick="showPlotDetails(6, '381')">381</div>
<div class="plot plot-6-382" onclick="showPlotDetails(6, '382')">382</div>
<div class="plot plot-6-383" onclick="showPlotDetails(6, '383')">383</div>
<div class="plot plot-6-384" onclick="showPlotDetails(6, '384')">384</div>
<div class="plot plot-6-385" onclick="showPlotDetails(6, '385')">385</div>
<div class="plot plot-6-386" onclick="showPlotDetails(6, '386')">386</div>
<div class="plot plot-6-387" onclick="showPlotDetails(6, '387')">387</div>
<div class="plot plot-6-388" onclick="showPlotDetails(6, '388')">388</div>
<div class="plot plot-6-389" onclick="showPlotDetails(6, '389')">389</div>
<div class="plot plot-6-390" onclick="showPlotDetails(6, '390')">390</div>
<div class="plot plot-6-391" onclick="showPlotDetails(6, '391')">391</div>
<div class="plot plot-6-392" onclick="showPlotDetails(6, '392')">392</div>
<div class="plot plot-6-393" onclick="showPlotDetails(6, '393')">393</div>
<div class="plot plot-6-394" onclick="showPlotDetails(6, '394')">394</div>
<div class="plot plot-6-395" onclick="showPlotDetails(6, '395')">395</div>
<div class="plot plot-6-396" onclick="showPlotDetails(6, '396')">396</div>
<div class="plot plot-6-397" onclick="showPlotDetails(6, '397')">397</div>
<div class="plot plot-6-398" onclick="showPlotDetails(6, '398')">398</div>
<div class="plot plot-6-399" onclick="showPlotDetails(6, '399')">399</div>
<div class="plot plot-6-400" onclick="showPlotDetails(6, '400')">400</div>
<div class="plot plot-6-401" onclick="showPlotDetails(6, '401')">401</div>
<div class="plot plot-6-402" onclick="showPlotDetails(6, '402')">402</div>
<div class="plot plot-6-403" onclick="showPlotDetails(6, '403')">403</div>
<div class="plot plot-6-404" onclick="showPlotDetails(6, '404')">404</div>
<div class="plot plot-6-405" onclick="showPlotDetails(6, '405')">405</div>
<div class="plot plot-6-406" onclick="showPlotDetails(6, '406')">406</div>
<div class="plot plot-6-407" onclick="showPlotDetails(6, '407')">407</div>
<div class="plot plot-6-408" onclick="showPlotDetails(6, '408')">408</div>
<div class="plot plot-6-409" onclick="showPlotDetails(6, '409')">409</div>
<div class="plot plot-6-410" onclick="showPlotDetails(6, '410')">410</div>
<div class="plot plot-6-411" onclick="showPlotDetails(6, '411')">411</div>
<div class="plot plot-6-412" onclick="showPlotDetails(6, '412')">412</div>
<div class="plot plot-6-413" onclick="showPlotDetails(6, '413')">413</div>
<div class="plot plot-6-414" onclick="showPlotDetails(6, '414')">414</div>
<div class="plot plot-6-415" onclick="showPlotDetails(6, '415')">415</div>
<div class="plot plot-6-416" onclick="showPlotDetails(6, '416')">416</div>
<div class="plot plot-6-417" onclick="showPlotDetails(6, '417')">417</div>
<div class="plot plot-6-418" onclick="showPlotDetails(6, '418')">418</div>
<div class="plot plot-6-419" onclick="showPlotDetails(6, '419')">419</div>
<div class="plot plot-6-420" onclick="showPlotDetails(6, '420')">420</div>
<div class="plot plot-6-421" onclick="showPlotDetails(6, '421')">421</div>
<div class="plot plot-6-422" onclick="showPlotDetails(6, '422')">422</div>
<div class="plot plot-6-423" onclick="showPlotDetails(6, '423')">423</div>
<div class="plot plot-6-424" onclick="showPlotDetails(6, '424')">424</div>
<div class="plot plot-6-425" onclick="showPlotDetails(6, '425')">425</div>
<div class="plot plot-6-426" onclick="showPlotDetails(6, '426')">426</div>
<div class="plot plot-6-427" onclick="showPlotDetails(6, '427')">427</div>
<div class="plot plot-6-428" onclick="showPlotDetails(6, '428')">428</div>
<div class="plot plot-6-429" onclick="showPlotDetails(6, '429')">429</div>
<div class="plot plot-6-430" onclick="showPlotDetails(6, '430')">430</div>
<div class="plot plot-6-431" onclick="showPlotDetails(6, '431')">431</div>
<div class="plot plot-6-432" onclick="showPlotDetails(6, '432')">432</div>
<div class="plot plot-6-433" onclick="showPlotDetails(6, '433')">433</div>
<div class="plot plot-6-434" onclick="showPlotDetails(6, '434')">434</div>
<div class="plot plot-6-435" onclick="showPlotDetails(6, '435')">435</div>
<div class="plot plot-6-436" onclick="showPlotDetails(6, '436')">436</div>
<div class="plot plot-6-437" onclick="showPlotDetails(6, '437')">437</div>
<div class="plot plot-6-438" onclick="showPlotDetails(6, '438')">438</div>
<div class="plot plot-6-439" onclick="showPlotDetails(6, '439')">439</div>
<div class="plot plot-6-440" onclick="showPlotDetails(6, '440')">440</div>
<div class="plot plot-6-441" onclick="showPlotDetails(6, '441')">441</div>
<div class="plot plot-6-442" onclick="showPlotDetails(6, '442')">442</div>
<div class="plot plot-6-443" onclick="showPlotDetails(6, '443')">443</div>
<div class="plot plot-6-444" onclick="showPlotDetails(6, '444')">444</div>
<div class="plot plot-6-445" onclick="showPlotDetails(6, '445')">445</div>
<div class="plot plot-6-446" onclick="showPlotDetails(6, '446')">446</div>
<div class="plot plot-6-447" onclick="showPlotDetails(6, '447')">447</div>
<div class="plot plot-6-448" onclick="showPlotDetails(6, '448')">448</div>
<div class="plot plot-6-449" onclick="showPlotDetails(6, '449')">449</div>
<div class="plot plot-6-450" onclick="showPlotDetails(6, '450')">450</div>
<div class="plot plot-6-451" onclick="showPlotDetails(6, '451')">451</div>
<div class="plot plot-6-452" onclick="showPlotDetails(6, '452')">452</div>
<div class="plot plot-6-453" onclick="showPlotDetails(6, '453')">453</div>
<div class="plot plot-6-454" onclick="showPlotDetails(6, '454')">454</div>
<div class="plot plot-6-455" onclick="showPlotDetails(6, '455')">455</div>
<div class="plot plot-6-456" onclick="showPlotDetails(6, '456')">456</div>
<div class="plot plot-6-457" onclick="showPlotDetails(6, '457')">457</div>
<div class="plot plot-6-458" onclick="showPlotDetails(6, '458')">458</div>
<div class="plot plot-6-459" onclick="showPlotDetails(6, '459')">459</div>
<div class="plot plot-6-460" onclick="showPlotDetails(6, '460')">460</div>
<div class="plot plot-6-461" onclick="showPlotDetails(6, '461')">461</div>
<div class="plot plot-6-462" onclick="showPlotDetails(6, '462')">462</div>
<div class="plot plot-6-463" onclick="showPlotDetails(6, '463')">463</div>
<div class="plot plot-6-464" onclick="showPlotDetails(6, '464')">464</div>
<div class="plot plot-6-465" onclick="showPlotDetails(6, '465')">465</div>
<div class="plot plot-6-466" onclick="showPlotDetails(6, '466')">466</div>
<div class="plot plot-6-467" onclick="showPlotDetails(6, '467')">467</div>
<div class="plot plot-6-468" onclick="showPlotDetails(6, '468')">468</div>
<div class="plot plot-6-469" onclick="showPlotDetails(6, '469')">469</div>
<div class="plot plot-6-470" onclick="showPlotDetails(6, '470')">470</div>
<div class="plot plot-6-471" onclick="showPlotDetails(6, '471')">471</div>
<div class="plot plot-6-472" onclick="showPlotDetails(6, '472')">472</div>
<div class="plot plot-6-473" onclick="showPlotDetails(6, '473')">473</div>
<div class="plot plot-6-474" onclick="showPlotDetails(6, '474')">474</div>
<div class="plot plot-6-475" onclick="showPlotDetails(6, '475')">475</div>
<div class="plot plot-6-476" onclick="showPlotDetails(6, '476')">476</div>
<div class="plot plot-6-477" onclick="showPlotDetails(6, '477')">477</div>
<div class="plot plot-6-478" onclick="showPlotDetails(6, '478')">478</div>
<div class="plot plot-6-479" onclick="showPlotDetails(6, '479')">479</div>
<div class="plot plot-6-480" onclick="showPlotDetails(6, '480')">480</div>
<div class="plot plot-6-481" onclick="showPlotDetails(6, '481')">481</div>
<div class="plot plot-6-482" onclick="showPlotDetails(6, '482')">482</div>
<div class="plot plot-6-483" onclick="showPlotDetails(6, '483')">483</div>
<div class="plot plot-6-484" onclick="showPlotDetails(6, '484')">484</div>
<div class="plot plot-6-485" onclick="showPlotDetails(6, '485')">485</div>
<div class="plot plot-6-486" onclick="showPlotDetails(6, '486')">486</div>
<div class="plot plot-6-487" onclick="showPlotDetails(6, '487')">487</div>
<div class="plot plot-6-488" onclick="showPlotDetails(6, '488')">488</div>
<div class="plot plot-6-489" onclick="showPlotDetails(6, '489')">489</div>
<div class="plot plot-6-490" onclick="showPlotDetails(6, '490')">490</div>
<div class="plot plot-6-491" onclick="showPlotDetails(6, '491')">491</div>
<div class="plot plot-6-492" onclick="showPlotDetails(6, '492')">492</div>
<div class="plot plot-6-493" onclick="showPlotDetails(6, '493')">493</div>
<div class="plot plot-6-494" onclick="showPlotDetails(6, '494')">494</div>
<div class="plot plot-6-495" onclick="showPlotDetails(6, '495')">495</div>
<div class="plot plot-6-496" onclick="showPlotDetails(6, '496')">496</div>
<div class="plot plot-6-497" onclick="showPlotDetails(6, '497')">497</div>
<div class="plot plot-6-498" onclick="showPlotDetails(6, '498')">498</div>
<div class="plot plot-6-499" onclick="showPlotDetails(6, '499')">499</div>
<div class="plot plot-6-500" onclick="showPlotDetails(6, '500')">500</div>
<div class="plot plot-6-501" onclick="showPlotDetails(6, '501')">501</div>
<div class="plot plot-6-502" onclick="showPlotDetails(6, '502')">502</div>
<div class="plot plot-6-503" onclick="showPlotDetails(6, '503')">503</div>
<div class="plot plot-6-504" onclick="showPlotDetails(6, '504')">504</div>
<div class="plot plot-6-505" onclick="showPlotDetails(6, '505')">505</div>
<div class="plot plot-6-506" onclick="showPlotDetails(6, '506')">506</div>
<div class="plot plot-6-507" onclick="showPlotDetails(6, '507')">507</div>
<div class="plot plot-6-508" onclick="showPlotDetails(6, '508')">508</div>
<div class="plot plot-6-509" onclick="showPlotDetails(6, '509')">509</div>
<div class="plot plot-6-510" onclick="showPlotDetails(6, '510')">510</div>
<div class="plot plot-6-511" onclick="showPlotDetails(6, '511')">511</div>
<div class="plot plot-6-512" onclick="showPlotDetails(6, '512')">512</div>
<div class="plot plot-6-513" onclick="showPlotDetails(6, '513')">513</div>
<div class="plot plot-6-514" onclick="showPlotDetails(6, '514')">514</div>
<div class="plot plot-6-515" onclick="showPlotDetails(6, '515')">515</div>
<div class="plot plot-6-516" onclick="showPlotDetails(6, '516')">516</div>
<div class="plot plot-6-517" onclick="showPlotDetails(6, '517')">517</div>
<div class="plot plot-6-518" onclick="showPlotDetails(6, '518')">518</div>
<div class="plot plot-6-519" onclick="showPlotDetails(6, '519')">519</div>
<div class="plot plot-6-520" onclick="showPlotDetails(6, '520')">520</div>
<div class="plot plot-6-521" onclick="showPlotDetails(6, '521')">521</div>
<div class="plot plot-6-522" onclick="showPlotDetails(6, '522')">522</div>
<div class="plot plot-6-523" onclick="showPlotDetails(6, '523')">523</div>
<div class="plot plot-6-524" onclick="showPlotDetails(6, '524')">524</div>
<div class="plot plot-6-525" onclick="showPlotDetails(6, '525')">525</div>
<div class="plot plot-6-526" onclick="showPlotDetails(6, '526')">526</div>
<div class="plot plot-6-527" onclick="showPlotDetails(6, '527')">527</div>
<div class="plot plot-6-528" onclick="showPlotDetails(6, '528')">528</div>
<div class="plot plot-6-529" onclick="showPlotDetails(6, '529')">529</div>
<div class="plot plot-6-530" onclick="showPlotDetails(6, '530')">530</div>
<div class="plot plot-6-531" onclick="showPlotDetails(6, '531')">531</div>
<div class="plot plot-6-532" onclick="showPlotDetails(6, '532')">532</div>
<div class="plot plot-6-533" onclick="showPlotDetails(6, '533')">533</div>
<div class="plot plot-6-534" onclick="showPlotDetails(6, '534')">534</div>
<div class="plot plot-6-535" onclick="showPlotDetails(6, '535')">535</div>
<div class="plot plot-6-536" onclick="showPlotDetails(6, '536')">536</div>
<div class="plot plot-6-537" onclick="showPlotDetails(6, '537')">537</div>
<div class="plot plot-6-538" onclick="showPlotDetails(6, '538')">538</div>
<div class="plot plot-6-539" onclick="showPlotDetails(6, '539')">539</div>
<div class="plot plot-6-540" onclick="showPlotDetails(6, '540')">540</div>
<div class="plot plot-6-541" onclick="showPlotDetails(6, '541')">541</div>
<div class="plot plot-6-542" onclick="showPlotDetails(6, '542')">542</div>
<div class="plot plot-6-543" onclick="showPlotDetails(6, '543')">543</div>
<div class="plot plot-6-544" onclick="showPlotDetails(6, '544')">544</div>
<div class="plot plot-6-545" onclick="showPlotDetails(6, '545')">545</div>
<div class="plot plot-6-546" onclick="showPlotDetails(6, '546')">546</div>
<div class="plot plot-6-547" onclick="showPlotDetails(6, '547')">547</div>
<div class="plot plot-6-548" onclick="showPlotDetails(6, '548')">548</div>
<div class="plot plot-6-549" onclick="showPlotDetails(6, '549')">549</div>
<div class="plot plot-6-550" onclick="showPlotDetails(6, '550')">550</div>
<div class="plot plot-6-551" onclick="showPlotDetails(6, '551')">551</div>
<div class="plot plot-6-552" onclick="showPlotDetails(6, '552')">552</div>
<div class="plot plot-6-553" onclick="showPlotDetails(6, '553')">553</div>
<div class="plot plot-6-554" onclick="showPlotDetails(6, '554')">554</div>
<div class="plot plot-6-555" onclick="showPlotDetails(6, '555')">555</div>
<div class="plot plot-6-556" onclick="showPlotDetails(6, '556')">556</div>
<div class="plot plot-6-557" onclick="showPlotDetails(6, '557')">557</div>
<div class="plot plot-6-558" onclick="showPlotDetails(6, '558')">558</div>
<div class="plot plot-6-559" onclick="showPlotDetails(6, '559')">559</div>
<div class="plot plot-6-560" onclick="showPlotDetails(6, '560')">560</div>
<div class="plot plot-6-561" onclick="showPlotDetails(6, '561')">561</div>
<div class="plot plot-6-562" onclick="showPlotDetails(6, '562')">562</div>
<div class="plot plot-6-563" onclick="showPlotDetails(6, '563')">563</div>
<div class="plot plot-6-564" onclick="showPlotDetails(6, '564')">564</div>
<div class="plot plot-6-565" onclick="showPlotDetails(6, '565')">565</div>
<div class="plot plot-6-566" onclick="showPlotDetails(6, '566')">566</div>
<div class="plot plot-6-567" onclick="showPlotDetails(6, '567')">567</div>
<div class="plot plot-6-568" onclick="showPlotDetails(6, '568')">568</div>
<div class="plot plot-6-569" onclick="showPlotDetails(6, '569')">569</div>
<div class="plot plot-6-570" onclick="showPlotDetails(6, '570')">570</div>
<div class="plot plot-6-571" onclick="showPlotDetails(6, '571')">571</div>
<div class="plot plot-6-572" onclick="showPlotDetails(6, '572')">572</div>
<div class="plot plot-6-573" onclick="showPlotDetails(6, '573')">573</div>
<div class="plot plot-6-574" onclick="showPlotDetails(6, '574')">574</div>
<div class="plot plot-6-575" onclick="showPlotDetails(6, '575')">575</div>
<div class="plot plot-6-576" onclick="showPlotDetails(6, '576')">576</div>
<div class="plot plot-6-577" onclick="showPlotDetails(6, '577')">577</div>
<div class="plot plot-6-578" onclick="showPlotDetails(6, '578')">578</div>
<div class="plot plot-6-579" onclick="showPlotDetails(6, '579')">579</div>
<div class="plot plot-6-580" onclick="showPlotDetails(6, '580')">580</div>
</div>
<b class="">2.00 M. WIDE PATHWALK</b>
<style>
  .b6w{
    bottom: 48.8pc !important;
  }
  .walk6 {
    bottom: 300px;
    right: 315px;
}
.walk7 {
    bottom: 300px;
    left: 310px;
}
  </style>     
<b class="pathwalk walk6 " >2.00 M. WIDE PATHWALK</b>
        <b class="pathwalk walk7 ">2.00 M. WIDE PATHWALK</b>
        <div class="two-way-traffic-sign b6w">
          <div class="arrow-container">
              <div class="arrow left"></div>
          </div>
          <div class="text">TWO WAY TRAFFIC ROAD</div>
          <div class="arrow-container">
              <div class="arrow right"></div>
          </div>
        </div>   
    </div>
  </div>
</div>
    </div>
    </div>
</div>

<!-- Modal HTML for Block 4 -->
<div id="block4Modal" class="modal">
  <div class="modal-content-map">
    <span>Block 4 Plots</span><span class="close" onclick="closeModal('block4Modal')">&times;</span>
    <div class="modal-center">
      <hr style="color: black; width: 79%;" >
      <div class="ped">PEDESTRIAN SIDEWALK</div>
      <hr style="color: black; width: 79%;" >
      <b>GREEN PARK MEMORIAL GARDEN</b>
      <b>BLOCK 4</b>
      <hr style="color: black; width: 79%; margin-top: 40px;" >
      <div class="ped">PEDESTRIAN SIDEWALK</div>
      <hr style="color: black; width: 79%;" >
    <div class="plots_con b3 rotator">
      
      <div class="d0"></div>
      <div class="d0"></div>
      <div class="plot plot-4-1" onclick="showPlotDetails(4, '1')">1</div>
<div class="plot plot-4-2" onclick="showPlotDetails(4, '2')">2</div>
<div class="plot plot-4-3" onclick="showPlotDetails(4, '3')">3</div>
<div class="plot plot-4-4" onclick="showPlotDetails(4, '4')">4</div>
<div class="plot plot-4-5" onclick="showPlotDetails(4, '5')">5</div>
<div class="plot plot-4-6" onclick="showPlotDetails(4, '6')">6</div>
<div class="plot plot-4-7" onclick="showPlotDetails(4, '7')">7</div>
<div class="plot plot-4-8" onclick="showPlotDetails(4, '8')">8</div>
<div class="plot plot-4-9" onclick="showPlotDetails(4, '9')">9</div>
<div class="plot plot-4-10" onclick="showPlotDetails(4, '10')">10</div>
<div class="plot plot-4-11" onclick="showPlotDetails(4, '11')">11</div>
<div class="plot plot-4-12" onclick="showPlotDetails(4, '12')">12</div>
<div class="plot plot-4-13" onclick="showPlotDetails(4, '13')">13</div>
<div class="plot plot-4-14" onclick="showPlotDetails(4, '14')">14</div>
<div class="plot plot-4-15" onclick="showPlotDetails(4, '15')">15</div>
<div class="plot plot-4-16" onclick="showPlotDetails(4, '16')">16</div>
<div class="plot plot-4-17" onclick="showPlotDetails(4, '17')">17</div>
<div class="plot plot-4-18" onclick="showPlotDetails(4, '18')">18</div>
<div class="plot plot-4-19" onclick="showPlotDetails(4, '19')">19</div>
<div class="plot plot-4-20" onclick="showPlotDetails(4, '20')">20</div>
<div class="plot plot-4-21" onclick="showPlotDetails(4, '21')">21</div>
<div class="plot plot-4-22" onclick="showPlotDetails(4, '22')">22</div>
<div class="plot plot-4-23" onclick="showPlotDetails(4, '23')">23</div>
<div class="plot plot-4-24" onclick="showPlotDetails(4, '24')">24</div>
<div class="plot plot-4-25" onclick="showPlotDetails(4, '25')">25</div>
<div class="plot plot-4-26" onclick="showPlotDetails(4, '26')">26</div>
<div class="plot plot-4-27" onclick="showPlotDetails(4, '27')">27</div>
<div class="plot plot-4-28" onclick="showPlotDetails(4, '28')">28</div>
<div class="plot plot-4-29" onclick="showPlotDetails(4, '29')">29</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-4-30" onclick="showPlotDetails(4, '30')">30</div>
<div class="plot plot-4-31" onclick="showPlotDetails(4, '31')">31</div>
<div class="plot plot-4-32" onclick="showPlotDetails(4, '32')">32</div>
<div class="plot plot-4-33" onclick="showPlotDetails(4, '33')">33</div>
<div class="plot plot-4-34" onclick="showPlotDetails(4, '34')">34</div>
<div class="plot plot-4-35" onclick="showPlotDetails(4, '35')">35</div>
<div class="plot plot-4-36" onclick="showPlotDetails(4, '36')">36</div>
<div class="plot plot-4-37" onclick="showPlotDetails(4, '37')">37</div>
<div class="plot plot-4-38" onclick="showPlotDetails(4, '38')">38</div>
<div class="plot plot-4-39" onclick="showPlotDetails(4, '39')">39</div>
<div class="plot plot-4-40" onclick="showPlotDetails(4, '40')">40</div>
<div class="plot plot-4-41" onclick="showPlotDetails(4, '41')">41</div>
<div class="plot plot-4-42" onclick="showPlotDetails(4, '42')">42</div>
<div class="plot plot-4-43" onclick="showPlotDetails(4, '43')">43</div>
<div class="plot plot-4-44" onclick="showPlotDetails(4, '44')">44</div>
<div class="plot plot-4-45" onclick="showPlotDetails(4, '45')">45</div>
<div class="plot plot-4-46" onclick="showPlotDetails(4, '46')">46</div>
<div class="plot plot-4-47" onclick="showPlotDetails(4, '47')">47</div>
<div class="plot plot-4-48" onclick="showPlotDetails(4, '48')">48</div>
<div class="plot plot-4-49" onclick="showPlotDetails(4, '49')">49</div>
<div class="plot plot-4-50" onclick="showPlotDetails(4, '50')">50</div>
<div class="plot plot-4-51" onclick="showPlotDetails(4, '51')">51</div>
<div class="plot plot-4-52" onclick="showPlotDetails(4, '52')">52</div>
<div class="plot plot-4-53" onclick="showPlotDetails(4, '53')">53</div>
<div class="plot plot-4-54" onclick="showPlotDetails(4, '54')">54</div>
<div class="plot plot-4-55" onclick="showPlotDetails(4, '55')">55</div>
<div class="plot plot-4-56" onclick="showPlotDetails(4, '56')">56</div>
<div class="plot plot-4-57" onclick="showPlotDetails(4, '57')">57</div>
<div class="plot plot-4-58" onclick="showPlotDetails(4, '58')">58</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-4-60" onclick="showPlotDetails(4, '60')">60</div>
<div class="plot plot-4-61" onclick="showPlotDetails(4, '61')">61</div>
<div class="plot plot-4-62" onclick="showPlotDetails(4, '62')">62</div>
<div class="plot plot-4-63" onclick="showPlotDetails(4, '63')">63</div>
<div class="plot plot-4-64" onclick="showPlotDetails(4, '64')">64</div>
<div class="plot plot-4-65" onclick="showPlotDetails(4, '65')">65</div>
<div class="plot plot-4-66" onclick="showPlotDetails(4, '66')">66</div>
<div class="plot plot-4-67" onclick="showPlotDetails(4, '67')">67</div>
<div class="plot plot-4-68" onclick="showPlotDetails(4, '68')">68</div>
<div class="plot plot-4-69" onclick="showPlotDetails(4, '69')">69</div>
<div class="plot plot-4-70" onclick="showPlotDetails(4, '70')">70</div>
<div class="plot plot-4-71" onclick="showPlotDetails(4, '71')">71</div>
<div class="plot plot-4-72" onclick="showPlotDetails(4, '72')">72</div>
<div class="plot plot-4-73" onclick="showPlotDetails(4, '73')">73</div>
<div class="plot plot-4-74" onclick="showPlotDetails(4, '74')">74</div>
<div class="plot plot-4-75" onclick="showPlotDetails(4, '75')">75</div>
<div class="plot plot-4-76" onclick="showPlotDetails(4, '76')">76</div>
<div class="plot plot-4-77" onclick="showPlotDetails(4, '77')">77</div>
<div class="plot plot-4-78" onclick="showPlotDetails(4, '78')">78</div>
<div class="plot plot-4-79" onclick="showPlotDetails(4, '79')">79</div>
<div class="plot plot-4-80" onclick="showPlotDetails(4, '80')">80</div>
<div class="plot plot-4-81" onclick="showPlotDetails(4, '81')">81</div>
<div class="plot plot-4-82" onclick="showPlotDetails(4, '82')">82</div>
<div class="plot plot-4-83" onclick="showPlotDetails(4, '83')">83</div>
<div class="plot plot-4-84" onclick="showPlotDetails(4, '84')">84</div>
<div class="plot plot-4-85" onclick="showPlotDetails(4, '85')">85</div>
<div class="plot plot-4-86" onclick="showPlotDetails(4, '86')">86</div>
<div class="plot plot-4-87" onclick="showPlotDetails(4, '87')">87</div>
<div class="plot plot-4-88" onclick="showPlotDetails(4, '88')">88</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-4-89" onclick="showPlotDetails(4, '89')">89</div>
<div class="plot plot-4-90" onclick="showPlotDetails(4, '90')">90</div>
<div class="plot plot-4-91" onclick="showPlotDetails(4, '91')">91</div>
<div class="plot plot-4-92" onclick="showPlotDetails(4, '92')">92</div>
<div class="plot plot-4-93" onclick="showPlotDetails(4, '93')">93</div>
<div class="plot plot-4-94" onclick="showPlotDetails(4, '94')">94</div>
<div class="plot plot-4-95" onclick="showPlotDetails(4, '95')">95</div>
<div class="plot plot-4-96" onclick="showPlotDetails(4, '96')">96</div>
<div class="plot plot-4-97" onclick="showPlotDetails(4, '97')">97</div>
<div class="plot plot-4-98" onclick="showPlotDetails(4, '98')">98</div>
<div class="plot plot-4-99" onclick="showPlotDetails(4, '99')">99</div>
<div class="plot plot-4-100" onclick="showPlotDetails(4, '100')">100</div>
<div class="plot plot-4-101" onclick="showPlotDetails(4, '101')">101</div>
<div class="plot plot-4-102" onclick="showPlotDetails(4, '102')">102</div>
<div class="plot plot-4-103" onclick="showPlotDetails(4, '103')">103</div>
<div class="plot plot-4-104" onclick="showPlotDetails(4, '104')">104</div>
<div class="plot plot-4-105" onclick="showPlotDetails(4, '105')">105</div>
<div class="plot plot-4-106" onclick="showPlotDetails(4, '106')">106</div>
<div class="plot plot-4-107" onclick="showPlotDetails(4, '107')">107</div>
<div class="plot plot-4-108" onclick="showPlotDetails(4, '108')">108</div>
<div class="plot plot-4-109" onclick="showPlotDetails(4, '109')">109</div>
<div class="plot plot-4-110" onclick="showPlotDetails(4, '110')">110</div>
<div class="plot plot-4-111" onclick="showPlotDetails(4, '111')">111</div>
<div class="plot plot-4-112" onclick="showPlotDetails(4, '112')">112</div>
<div class="plot plot-4-113" onclick="showPlotDetails(4, '113')">113</div>
<div class="plot plot-4-114" onclick="showPlotDetails(4, '114')">114</div>
<div class="plot plot-4-115" onclick="showPlotDetails(4, '115')">115</div>
<div class="plot plot-4-116" onclick="showPlotDetails(4, '116')">116</div>
<div class="plot plot-4-117" onclick="showPlotDetails(4, '117')">117</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-4-118" onclick="showPlotDetails(4, '118')">118</div>
<div class="plot plot-4-119" onclick="showPlotDetails(4, '119')">119</div>
<div class="plot plot-4-120" onclick="showPlotDetails(4, '120')">120</div>
<div class="plot plot-4-121" onclick="showPlotDetails(4, '121')">121</div>
<div class="plot plot-4-122" onclick="showPlotDetails(4, '122')">122</div>
<div class="plot plot-4-123" onclick="showPlotDetails(4, '123')">123</div>
<div class="plot plot-4-124" onclick="showPlotDetails(4, '124')">124</div>
<div class="plot plot-4-125" onclick="showPlotDetails(4, '125')">125</div>
<div class="plot plot-4-126" onclick="showPlotDetails(4, '126')">126</div>
<div class="plot plot-4-127" onclick="showPlotDetails(4, '127')">127</div>
<div class="plot plot-4-128" onclick="showPlotDetails(4, '128')">128</div>
<div class="plot plot-4-129" onclick="showPlotDetails(4, '129')">129</div>
<div class="plot plot-4-130" onclick="showPlotDetails(4, '130')">130</div>
<div class="plot plot-4-131" onclick="showPlotDetails(4, '131')">131</div>
<div class="plot plot-4-132" onclick="showPlotDetails(4, '132')">132</div>
<div class="plot plot-4-133" onclick="showPlotDetails(4, '133')">133</div>
<div class="plot plot-4-134" onclick="showPlotDetails(4, '134')">134</div>
<div class="plot plot-4-135" onclick="showPlotDetails(4, '135')">135</div>
<div class="plot plot-4-136" onclick="showPlotDetails(4, '136')">136</div>
<div class="plot plot-4-137" onclick="showPlotDetails(4, '137')">137</div>
<div class="plot plot-4-138" onclick="showPlotDetails(4, '138')">138</div>
<div class="plot plot-4-139" onclick="showPlotDetails(4, '139')">139</div>
<div class="plot plot-4-140" onclick="showPlotDetails(4, '140')">140</div>
<div class="plot plot-4-141" onclick="showPlotDetails(4, '141')">141</div>
<div class="plot plot-4-142" onclick="showPlotDetails(4, '142')">142</div>
<div class="plot plot-4-143" onclick="showPlotDetails(4, '143')">143</div>
<div class="plot plot-4-144" onclick="showPlotDetails(4, '144')">144</div>
<div class="plot plot-4-145" onclick="showPlotDetails(4, '145')">145</div>
<div class="plot plot-4-146" onclick="showPlotDetails(4, '146')">146</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-4-147" onclick="showPlotDetails(4, '147')">147</div>
<div class="plot plot-4-148" onclick="showPlotDetails(4, '148')">148</div>
<div class="plot plot-4-149" onclick="showPlotDetails(4, '149')">149</div>
<div class="plot plot-4-150" onclick="showPlotDetails(4, '150')">150</div>
<div class="plot plot-4-151" onclick="showPlotDetails(4, '151')">151</div>
<div class="plot plot-4-152" onclick="showPlotDetails(4, '152')">152</div>
<div class="plot plot-4-153" onclick="showPlotDetails(4, '153')">153</div>
<div class="plot plot-4-154" onclick="showPlotDetails(4, '154')">154</div>
<div class="plot plot-4-155" onclick="showPlotDetails(4, '155')">155</div>
<div class="plot plot-4-156" onclick="showPlotDetails(4, '156')">156</div>
<div class="plot plot-4-157" onclick="showPlotDetails(4, '157')">157</div>
<div class="plot plot-4-158" onclick="showPlotDetails(4, '158')">158</div>
<div class="plot plot-4-159" onclick="showPlotDetails(4, '159')">159</div>
<div class="plot plot-4-160" onclick="showPlotDetails(4, '160')">160</div>
<div class="plot plot-4-161" onclick="showPlotDetails(4, '161')">161</div>
<div class="plot plot-4-162" onclick="showPlotDetails(4, '162')">162</div>
<div class="plot plot-4-163" onclick="showPlotDetails(4, '163')">163</div>
<div class="plot plot-4-164" onclick="showPlotDetails(4, '164')">164</div>
<div class="plot plot-4-165" onclick="showPlotDetails(4, '165')">165</div>
<div class="plot plot-4-166" onclick="showPlotDetails(4, '166')">166</div>
<div class="plot plot-4-167" onclick="showPlotDetails(4, '167')">167</div>
<div class="plot plot-4-168" onclick="showPlotDetails(4, '168')">168</div>
<div class="plot plot-4-169" onclick="showPlotDetails(4, '169')">169</div>
<div class="plot plot-4-170" onclick="showPlotDetails(4, '170')">170</div>
<div class="plot plot-4-171" onclick="showPlotDetails(4, '171')">171</div>
<div class="plot plot-4-172" onclick="showPlotDetails(4, '172')">172</div>
<div class="plot plot-4-173" onclick="showPlotDetails(4, '173')">173</div>
<div class="plot plot-4-174" onclick="showPlotDetails(4, '174')">174</div>
<div class="plot plot-4-175" onclick="showPlotDetails(4, '175')">175</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-4-176" onclick="showPlotDetails(4, '176')">176</div>
<div class="plot plot-4-177" onclick="showPlotDetails(4, '177')">177</div>
<div class="plot plot-4-178" onclick="showPlotDetails(4, '178')">178</div>
<div class="plot plot-4-179" onclick="showPlotDetails(4, '179')">179</div>
<div class="plot plot-4-180" onclick="showPlotDetails(4, '180')">180</div>
<div class="plot plot-4-181" onclick="showPlotDetails(4, '181')">181</div>
<div class="plot plot-4-182" onclick="showPlotDetails(4, '182')">182</div>
<div class="plot plot-4-183" onclick="showPlotDetails(4, '183')">183</div>
<div class="plot plot-4-184" onclick="showPlotDetails(4, '184')">184</div>
<div class="plot plot-4-185" onclick="showPlotDetails(4, '185')">185</div>
<div class="plot plot-4-186" onclick="showPlotDetails(4, '186')">186</div>
<div class="plot plot-4-187" onclick="showPlotDetails(4, '187')">187</div>
<div class="plot plot-4-188" onclick="showPlotDetails(4, '188')">188</div>
<div class="plot plot-4-189" onclick="showPlotDetails(4, '189')">189</div>
<div class="plot plot-4-190" onclick="showPlotDetails(4, '190')">190</div>
<div class="plot plot-4-191" onclick="showPlotDetails(4, '191')">191</div>
<div class="plot plot-4-192" onclick="showPlotDetails(4, '192')">192</div>
<div class="plot plot-4-193" onclick="showPlotDetails(4, '193')">193</div>
<div class="plot plot-4-194" onclick="showPlotDetails(4, '194')">194</div>
<div class="plot plot-4-195" onclick="showPlotDetails(4, '195')">195</div>
<div class="plot plot-4-196" onclick="showPlotDetails(4, '196')">196</div>
<div class="plot plot-4-197" onclick="showPlotDetails(4, '197')">197</div>
<div class="plot plot-4-198" onclick="showPlotDetails(4, '198')">198</div>
<div class="plot plot-4-199" onclick="showPlotDetails(4, '199')">199</div>
<div class="plot plot-4-200" onclick="showPlotDetails(4, '200')">200</div>
<div class="plot plot-4-201" onclick="showPlotDetails(4, '201')">201</div>
<div class="plot plot-4-202" onclick="showPlotDetails(4, '202')">202</div>
<div class="plot plot-4-203" onclick="showPlotDetails(4, '203')">203</div>
<div class="plot plot-4-204" onclick="showPlotDetails(4, '204')">204</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-4-205" onclick="showPlotDetails(4, '205')">205</div>
<div class="plot plot-4-206" onclick="showPlotDetails(4, '206')">206</div>
<div class="plot plot-4-207" onclick="showPlotDetails(4, '207')">207</div>
<div class="plot plot-4-208" onclick="showPlotDetails(4, '208')">208</div>
<div class="plot plot-4-209" onclick="showPlotDetails(4, '209')">209</div>
<div class="plot plot-4-210" onclick="showPlotDetails(4, '210')">210</div>
<div class="plot plot-4-211" onclick="showPlotDetails(4, '211')">211</div>
<div class="plot plot-4-212" onclick="showPlotDetails(4, '212')">212</div>
<div class="plot plot-4-213" onclick="showPlotDetails(4, '213')">213</div>
<div class="plot plot-4-214" onclick="showPlotDetails(4, '214')">214</div>
<div class="plot plot-4-215" onclick="showPlotDetails(4, '215')">215</div>
<div class="plot plot-4-216" onclick="showPlotDetails(4, '216')">216</div>
<div class="plot plot-4-217" onclick="showPlotDetails(4, '217')">217</div>
<div class="plot plot-4-218" onclick="showPlotDetails(4, '218')">218</div>
<div class="plot plot-4-219" onclick="showPlotDetails(4, '219')">219</div>
<div class="plot plot-4-220" onclick="showPlotDetails(4, '220')">220</div>
<div class="plot plot-4-221" onclick="showPlotDetails(4, '221')">221</div>
<div class="plot plot-4-222" onclick="showPlotDetails(4, '222')">222</div>
<div class="plot plot-4-223" onclick="showPlotDetails(4, '223')">223</div>
<div class="plot plot-4-224" onclick="showPlotDetails(4, '224')">224</div>
<div class="plot plot-4-225" onclick="showPlotDetails(4, '225')">225</div>
<div class="plot plot-4-226" onclick="showPlotDetails(4, '226')">226</div>
<div class="plot plot-4-227" onclick="showPlotDetails(4, '227')">227</div>
<div class="plot plot-4-228" onclick="showPlotDetails(4, '228')">228</div>
<div class="plot plot-4-229" onclick="showPlotDetails(4, '229')">229</div>
<div class="plot plot-4-230" onclick="showPlotDetails(4, '230')">230</div>
<div class="plot plot-4-231" onclick="showPlotDetails(4, '231')">231</div>
<div class="plot plot-4-232" onclick="showPlotDetails(4, '232')">232</div>
<div class="plot plot-4-233" onclick="showPlotDetails(4, '233')">233</div>
<div class="d0"></div>
<div class="plot plot-4-234" onclick="showPlotDetails(4, '234')">234</div>
<div class="plot plot-4-235" onclick="showPlotDetails(4, '235')">235</div>
<div class="plot plot-4-236" onclick="showPlotDetails(4, '236')">236</div>
<div class="plot plot-4-237" onclick="showPlotDetails(4, '237')">237</div>
<div class="plot plot-4-238" onclick="showPlotDetails(4, '238')">238</div>
<div class="plot plot-4-239" onclick="showPlotDetails(4, '239')">239</div>
<div class="plot plot-4-240" onclick="showPlotDetails(4, '240')">240</div>
<div class="plot plot-4-241" onclick="showPlotDetails(4, '241')">241</div>
<div class="plot plot-4-242" onclick="showPlotDetails(4, '242')">242</div>
<div class="plot plot-4-243" onclick="showPlotDetails(4, '243')">243</div>
<div class="plot plot-4-244" onclick="showPlotDetails(4, '244')">244</div>
<div class="plot plot-4-245" onclick="showPlotDetails(4, '245')">245</div>
<div class="plot plot-4-246" onclick="showPlotDetails(4, '246')">246</div>
<div class="plot plot-4-247" onclick="showPlotDetails(4, '247')">247</div>
<div class="plot plot-4-248" onclick="showPlotDetails(4, '248')">248</div>
<div class="plot plot-4-249" onclick="showPlotDetails(4, '249')">249</div>
<div class="plot plot-4-250" onclick="showPlotDetails(4, '250')">250</div>
<div class="plot plot-4-251" onclick="showPlotDetails(4, '251')">251</div>
<div class="plot plot-4-252" onclick="showPlotDetails(4, '252')">252</div>
<div class="plot plot-4-253" onclick="showPlotDetails(4, '253')">253</div>
<div class="plot plot-4-254" onclick="showPlotDetails(4, '254')">254</div>
<div class="plot plot-4-255" onclick="showPlotDetails(4, '255')">255</div>
<div class="plot plot-4-256" onclick="showPlotDetails(4, '256')">256</div>
<div class="plot plot-4-257" onclick="showPlotDetails(4, '257')">257</div>
<div class="plot plot-4-258" onclick="showPlotDetails(4, '258')">258</div>
<div class="plot plot-4-259" onclick="showPlotDetails(4, '259')">259</div>
<div class="plot plot-4-260" onclick="showPlotDetails(4, '260')">260</div>
<div class="plot plot-4-261" onclick="showPlotDetails(4, '261')">261</div>
<div class="plot plot-4-262" onclick="showPlotDetails(4, '262')">262</div>
<div class="plot plot-4-263" onclick="showPlotDetails(4, '263')">263</div>
<div class="d0"></div>
<div class="plot plot-4-264" onclick="showPlotDetails(4, '264')">264</div>
<div class="plot plot-4-265" onclick="showPlotDetails(4, '265')">265</div>
<div class="plot plot-4-266" onclick="showPlotDetails(4, '266')">266</div>
<div class="plot plot-4-267" onclick="showPlotDetails(4, '267')">267</div>
<div class="plot plot-4-268" onclick="showPlotDetails(4, '268')">268</div>
<div class="plot plot-4-269" onclick="showPlotDetails(4, '269')">269</div>
<div class="plot plot-4-270" onclick="showPlotDetails(4, '270')">270</div>
<div class="plot plot-4-271" onclick="showPlotDetails(4, '271')">271</div>
<div class="plot plot-4-272" onclick="showPlotDetails(4, '272')">272</div>
<div class="plot plot-4-273" onclick="showPlotDetails(4, '273')">273</div>
<div class="plot plot-4-274" onclick="showPlotDetails(4, '274')">274</div>
<div class="plot plot-4-275" onclick="showPlotDetails(4, '275')">275</div>
<div class="plot plot-4-276" onclick="showPlotDetails(4, '276')">276</div>
<div class="plot plot-4-277" onclick="showPlotDetails(4, '277')">277</div>
<div class="plot plot-4-278" onclick="showPlotDetails(4, '278')">278</div>
<div class="plot plot-4-279" onclick="showPlotDetails(4, '279')">279</div>
<div class="plot plot-4-280" onclick="showPlotDetails(4, '280')">280</div>
<div class="plot plot-4-281" onclick="showPlotDetails(4, '281')">281</div>
<div class="plot plot-4-282" onclick="showPlotDetails(4, '282')">282</div>
<div class="plot plot-4-283" onclick="showPlotDetails(4, '283')">283</div>
<div class="plot plot-4-284" onclick="showPlotDetails(4, '284')">284</div>
<div class="plot plot-4-285" onclick="showPlotDetails(4, '285')">285</div>
<div class="plot plot-4-286" onclick="showPlotDetails(4, '286')">286</div>
<div class="plot plot-4-287" onclick="showPlotDetails(4, '287')">287</div>
<div class="plot plot-4-288" onclick="showPlotDetails(4, '288')">288</div>
<div class="plot plot-4-289" onclick="showPlotDetails(4, '289')">289</div>
<div class="plot plot-4-290" onclick="showPlotDetails(4, '290')">290</div>
<div class="plot plot-4-291" onclick="showPlotDetails(4, '291')">291</div>
<div class="plot plot-4-292" onclick="showPlotDetails(4, '292')">292</div>
<div class="plot plot-4-293" onclick="showPlotDetails(4, '293')">293</div>
<div class="d0"></div>
<div class="plot plot-4-294" onclick="showPlotDetails(4, '294')">294</div>
<div class="plot plot-4-295" onclick="showPlotDetails(4, '295')">295</div>
<div class="plot plot-4-296" onclick="showPlotDetails(4, '296')">296</div>
<div class="plot plot-4-297" onclick="showPlotDetails(4, '297')">297</div>
<div class="plot plot-4-298" onclick="showPlotDetails(4, '298')">298</div>
<div class="plot plot-4-299" onclick="showPlotDetails(4, '299')">299</div>
<div class="plot plot-4-300" onclick="showPlotDetails(4, '300')">300</div>
<div class="plot plot-4-301" onclick="showPlotDetails(4, '301')">301</div>
<div class="plot plot-4-302" onclick="showPlotDetails(4, '302')">302</div>
<div class="plot plot-4-303" onclick="showPlotDetails(4, '303')">303</div>
<div class="plot plot-4-304" onclick="showPlotDetails(4, '304')">304</div>
<div class="plot plot-4-305" onclick="showPlotDetails(4, '305')">305</div>
<div class="plot plot-4-306" onclick="showPlotDetails(4, '306')">306</div>
<div class="plot plot-4-307" onclick="showPlotDetails(4, '307')">307</div>
<div class="plot plot-4-308" onclick="showPlotDetails(4, '308')">308</div>
<div class="plot plot-4-309" onclick="showPlotDetails(4, '309')">309</div>
<div class="plot plot-4-310" onclick="showPlotDetails(4, '310')">310</div>
<div class="plot plot-4-311" onclick="showPlotDetails(4, '311')">311</div>
<div class="plot plot-4-312" onclick="showPlotDetails(4, '312')">312</div>
<div class="plot plot-4-313" onclick="showPlotDetails(4, '313')">313</div>
<div class="plot plot-4-314" onclick="showPlotDetails(4, '314')">314</div>
<div class="plot plot-4-315" onclick="showPlotDetails(4, '315')">315</div>
<div class="plot plot-4-316" onclick="showPlotDetails(4, '316')">316</div>
<div class="plot plot-4-317" onclick="showPlotDetails(4, '317')">317</div>
<div class="plot plot-4-318" onclick="showPlotDetails(4, '318')">318</div>
<div class="plot plot-4-319" onclick="showPlotDetails(4, '319')">319</div>
<div class="plot plot-4-320" onclick="showPlotDetails(4, '320')">320</div>
<div class="plot plot-4-321" onclick="showPlotDetails(4, '321')">321</div>
<div class="plot plot-4-322" onclick="showPlotDetails(4, '322')">322</div>
<div class="plot plot-4-323" onclick="showPlotDetails(4, '323')">323</div>
<div class="d0"></div>
<div class="plot plot-4-324" onclick="showPlotDetails(4, '324')">324</div>
<div class="plot plot-4-325" onclick="showPlotDetails(4, '325')">325</div>
<div class="plot plot-4-326" onclick="showPlotDetails(4, '326')">326</div>
<div class="plot plot-4-327" onclick="showPlotDetails(4, '327')">327</div>
<div class="plot plot-4-328" onclick="showPlotDetails(4, '328')">328</div>
<div class="plot plot-4-329" onclick="showPlotDetails(4, '329')">329</div>
<div class="plot plot-4-330" onclick="showPlotDetails(4, '330')">330</div>
<div class="plot plot-4-331" onclick="showPlotDetails(4, '331')">331</div>
<div class="plot plot-4-332" onclick="showPlotDetails(4, '332')">332</div>
<div class="plot plot-4-333" onclick="showPlotDetails(4, '333')">333</div>
<div class="plot plot-4-334" onclick="showPlotDetails(4, '334')">334</div>
<div class="plot plot-4-335" onclick="showPlotDetails(4, '335')">335</div>
<div class="plot plot-4-336" onclick="showPlotDetails(4, '336')">336</div>
<div class="plot plot-4-337" onclick="showPlotDetails(4, '337')">337</div>
<div class="plot plot-4-338" onclick="showPlotDetails(4, '338')">338</div>
<div class="plot plot-4-339" onclick="showPlotDetails(4, '339')">339</div>
<div class="plot plot-4-340" onclick="showPlotDetails(4, '340')">340</div>
<div class="plot plot-4-341" onclick="showPlotDetails(4, '341')">341</div>
<div class="plot plot-4-342" onclick="showPlotDetails(4, '342')">342</div>
<div class="plot plot-4-343" onclick="showPlotDetails(4, '343')">343</div>
<div class="plot plot-4-344" onclick="showPlotDetails(4, '344')">344</div>
<div class="plot plot-4-345" onclick="showPlotDetails(4, '345')">345</div>
<div class="plot plot-4-346" onclick="showPlotDetails(4, '346')">346</div>
<div class="plot plot-4-347" onclick="showPlotDetails(4, '347')">347</div>
<div class="plot plot-4-348" onclick="showPlotDetails(4, '348')">348</div>
<div class="plot plot-4-349" onclick="showPlotDetails(4, '349')">349</div>
<div class="plot plot-4-350" onclick="showPlotDetails(4, '350')">350</div>
<div class="plot plot-4-351" onclick="showPlotDetails(4, '351')">351</div>
<div class="plot plot-4-352" onclick="showPlotDetails(4, '352')">352</div>
<div class="plot plot-4-353" onclick="showPlotDetails(4, '353')">353</div>
<div class="d0"></div>
<div class="plot plot-4-354" onclick="showPlotDetails(4, '354')">354</div>
<div class="plot plot-4-355" onclick="showPlotDetails(4, '355')">355</div>
<div class="plot plot-4-356" onclick="showPlotDetails(4, '356')">356</div>
<div class="plot plot-4-357" onclick="showPlotDetails(4, '357')">357</div>
<div class="plot plot-4-358" onclick="showPlotDetails(4, '358')">358</div>
<div class="plot plot-4-359" onclick="showPlotDetails(4, '359')">359</div>
<div class="plot plot-4-360" onclick="showPlotDetails(4, '360')">360</div>
<div class="plot plot-4-361" onclick="showPlotDetails(4, '361')">361</div>
<div class="plot plot-4-362" onclick="showPlotDetails(4, '362')">362</div>
<div class="plot plot-4-363" onclick="showPlotDetails(4, '363')">363</div>
<div class="plot plot-4-364" onclick="showPlotDetails(4, '364')">364</div>
<div class="plot plot-4-365" onclick="showPlotDetails(4, '365')">365</div>
<div class="plot plot-4-366" onclick="showPlotDetails(4, '366')">366</div>
<div class="plot plot-4-367" onclick="showPlotDetails(4, '367')">367</div>
<div class="plot plot-4-368" onclick="showPlotDetails(4, '368')">368</div>
<div class="plot plot-4-369" onclick="showPlotDetails(4, '369')">369</div>
<div class="plot plot-4-370" onclick="showPlotDetails(4, '370')">370</div>
<div class="plot plot-4-371" onclick="showPlotDetails(4, '371')">371</div>
<div class="plot plot-4-372" onclick="showPlotDetails(4, '372')">372</div>
<div class="plot plot-4-373" onclick="showPlotDetails(4, '373')">373</div>
<div class="plot plot-4-374" onclick="showPlotDetails(4, '374')">374</div>
<div class="plot plot-4-375" onclick="showPlotDetails(4, '375')">375</div>
<div class="plot plot-4-376" onclick="showPlotDetails(4, '376')">376</div>
<div class="plot plot-4-377" onclick="showPlotDetails(4, '377')">377</div>
<div class="plot plot-4-378" onclick="showPlotDetails(4, '378')">378</div>
<div class="plot plot-4-379" onclick="showPlotDetails(4, '379')">379</div>
<div class="plot plot-4-380" onclick="showPlotDetails(4, '380')">380</div>
<div class="plot plot-4-381" onclick="showPlotDetails(4, '381')">381</div>
<div class="plot plot-4-382" onclick="showPlotDetails(4, '382')">382</div>
<div class="plot plot-4-383" onclick="showPlotDetails(4, '383')">383</div>
<div class="d0"></div>
<div class="plot plot-4-384" onclick="showPlotDetails(4, '384')">384</div>
<div class="plot plot-4-385" onclick="showPlotDetails(4, '385')">385</div>
<div class="plot plot-4-386" onclick="showPlotDetails(4, '386')">386</div>
<div class="plot plot-4-387" onclick="showPlotDetails(4, '387')">387</div>
<div class="plot plot-4-388" onclick="showPlotDetails(4, '388')">388</div>
<div class="plot plot-4-389" onclick="showPlotDetails(4, '389')">389</div>
<div class="plot plot-4-390" onclick="showPlotDetails(4, '390')">390</div>
<div class="plot plot-4-391" onclick="showPlotDetails(4, '391')">391</div>
<div class="plot plot-4-392" onclick="showPlotDetails(4, '392')">392</div>
<div class="plot plot-4-393" onclick="showPlotDetails(4, '393')">393</div>
<div class="plot plot-4-394" onclick="showPlotDetails(4, '394')">394</div>
<div class="plot plot-4-395" onclick="showPlotDetails(4, '395')">395</div>
<div class="plot plot-4-396" onclick="showPlotDetails(4, '396')">396</div>
<div class="plot plot-4-397" onclick="showPlotDetails(4, '397')">397</div>
<div class="plot plot-4-398" onclick="showPlotDetails(4, '398')">398</div>
<div class="plot plot-4-399" onclick="showPlotDetails(4, '399')">399</div>
<div class="plot plot-4-400" onclick="showPlotDetails(4, '400')">400</div>
<div class="plot plot-4-401" onclick="showPlotDetails(4, '401')">401</div>
<div class="plot plot-4-402" onclick="showPlotDetails(4, '402')">402</div>
<div class="plot plot-4-403" onclick="showPlotDetails(4, '403')">403</div>
<div class="plot plot-4-404" onclick="showPlotDetails(4, '404')">404</div>
<div class="plot plot-4-405" onclick="showPlotDetails(4, '405')">405</div>
<div class="plot plot-4-406" onclick="showPlotDetails(4, '406')">406</div>
<div class="plot plot-4-407" onclick="showPlotDetails(4, '407')">407</div>
<div class="plot plot-4-408" onclick="showPlotDetails(4, '408')">408</div>
<div class="plot plot-4-409" onclick="showPlotDetails(4, '409')">409</div>
<div class="plot plot-4-410" onclick="showPlotDetails(4, '410')">410</div>
<div class="plot plot-4-411" onclick="showPlotDetails(4, '411')">411</div>
<div class="plot plot-4-412" onclick="showPlotDetails(4, '412')">412</div>
<div class="plot plot-4-413" onclick="showPlotDetails(4, '413')">413</div>
<div class="d0"></div>
<div class="plot plot-4-414" onclick="showPlotDetails(4, '414')">414</div>
<div class="plot plot-4-415" onclick="showPlotDetails(4, '415')">415</div>
<div class="plot plot-4-416" onclick="showPlotDetails(4, '416')">416</div>
<div class="plot plot-4-417" onclick="showPlotDetails(4, '417')">417</div>
<div class="plot plot-4-418" onclick="showPlotDetails(4, '418')">418</div>
<div class="plot plot-4-419" onclick="showPlotDetails(4, '419')">419</div>
<div class="plot plot-4-420" onclick="showPlotDetails(4, '420')">420</div>
<div class="plot plot-4-421" onclick="showPlotDetails(4, '421')">421</div>
<div class="plot plot-4-422" onclick="showPlotDetails(4, '422')">422</div>
<div class="plot plot-4-423" onclick="showPlotDetails(4, '423')">423</div>
<div class="plot plot-4-424" onclick="showPlotDetails(4, '424')">424</div>
<div class="plot plot-4-425" onclick="showPlotDetails(4, '425')">425</div>
<div class="plot plot-4-426" onclick="showPlotDetails(4, '426')">426</div>
<div class="plot plot-4-427" onclick="showPlotDetails(4, '427')">427</div>
<div class="plot plot-4-428" onclick="showPlotDetails(4, '428')">428</div>
<div class="plot plot-4-429" onclick="showPlotDetails(4, '429')">429</div>
<div class="plot plot-4-430" onclick="showPlotDetails(4, '430')">430</div>
<div class="plot plot-4-431" onclick="showPlotDetails(4, '431')">431</div>
<div class="plot plot-4-432" onclick="showPlotDetails(4, '432')">432</div>
<div class="plot plot-4-433" onclick="showPlotDetails(4, '433')">433</div>
<div class="plot plot-4-434" onclick="showPlotDetails(4, '434')">434</div>
<div class="plot plot-4-435" onclick="showPlotDetails(4, '435')">435</div>
<div class="plot plot-4-436" onclick="showPlotDetails(4, '436')">436</div>
<div class="plot plot-4-437" onclick="showPlotDetails(4, '437')">437</div>
<div class="plot plot-4-438" onclick="showPlotDetails(4, '438')">438</div>
<div class="plot plot-4-439" onclick="showPlotDetails(4, '439')">439</div>
<div class="plot plot-4-440" onclick="showPlotDetails(4, '440')">440</div>
<div class="plot plot-4-441" onclick="showPlotDetails(4, '441')">441</div>
<div class="plot plot-4-442" onclick="showPlotDetails(4, '442')">442</div>
<div class="plot plot-4-443" onclick="showPlotDetails(4, '443')">443</div>
<div class="d0"></div>
<div class="plot plot-4-444" onclick="showPlotDetails(4, '444')">444</div>
<div class="plot plot-4-445" onclick="showPlotDetails(4, '445')">445</div>
<div class="plot plot-4-446" onclick="showPlotDetails(4, '446')">446</div>
<div class="plot plot-4-447" onclick="showPlotDetails(4, '447')">447</div>
<div class="plot plot-4-448" onclick="showPlotDetails(4, '448')">448</div>
<div class="plot plot-4-449" onclick="showPlotDetails(4, '449')">449</div>
<div class="plot plot-4-450" onclick="showPlotDetails(4, '450')">450</div>
<div class="plot plot-4-451" onclick="showPlotDetails(4, '451')">451</div>
<div class="plot plot-4-452" onclick="showPlotDetails(4, '452')">452</div>
<div class="plot plot-4-453" onclick="showPlotDetails(4, '453')">453</div>
<div class="plot plot-4-454" onclick="showPlotDetails(4, '454')">454</div>
<div class="plot plot-4-455" onclick="showPlotDetails(4, '455')">455</div>
<div class="plot plot-4-456" onclick="showPlotDetails(4, '456')">456</div>
<div class="plot plot-4-457" onclick="showPlotDetails(4, '457')">457</div>
<div class="plot plot-4-458" onclick="showPlotDetails(4, '458')">458</div>
<div class="plot plot-4-459" onclick="showPlotDetails(4, '459')">459</div>
<div class="plot plot-4-460" onclick="showPlotDetails(4, '460')">460</div>
<div class="plot plot-4-461" onclick="showPlotDetails(4, '461')">461</div>
<div class="plot plot-4-462" onclick="showPlotDetails(4, '462')">462</div>
<div class="plot plot-4-463" onclick="showPlotDetails(4, '463')">463</div>
<div class="plot plot-4-464" onclick="showPlotDetails(4, '464')">464</div>
<div class="plot plot-4-465" onclick="showPlotDetails(4, '465')">465</div>
<div class="plot plot-4-466" onclick="showPlotDetails(4, '466')">466</div>
<div class="plot plot-4-467" onclick="showPlotDetails(4, '467')">467</div>
<div class="plot plot-4-468" onclick="showPlotDetails(4, '468')">468</div>
<div class="plot plot-4-469" onclick="showPlotDetails(4, '469')">469</div>
<div class="plot plot-4-470" onclick="showPlotDetails(4, '470')">470</div>
<div class="plot plot-4-471" onclick="showPlotDetails(4, '471')">471</div>
<div class="plot plot-4-472" onclick="showPlotDetails(4, '472')">472</div>
<div class="plot plot-4-473" onclick="showPlotDetails(4, '473')">473</div>
<div class="d0"></div>
<div class="plot plot-4-474" onclick="showPlotDetails(4, '474')">474</div>
<div class="plot plot-4-475" onclick="showPlotDetails(4, '475')">475</div>
<div class="plot plot-4-476" onclick="showPlotDetails(4, '476')">476</div>
<div class="plot plot-4-477" onclick="showPlotDetails(4, '477')">477</div>
<div class="plot plot-4-478" onclick="showPlotDetails(4, '478')">478</div>
<div class="plot plot-4-479" onclick="showPlotDetails(4, '479')">479</div>
<div class="plot plot-4-480" onclick="showPlotDetails(4, '480')">480</div>
<div class="plot plot-4-481" onclick="showPlotDetails(4, '481')">481</div>
<div class="plot plot-4-482" onclick="showPlotDetails(4, '482')">482</div>
<div class="plot plot-4-483" onclick="showPlotDetails(4, '483')">483</div>
<div class="plot plot-4-484" onclick="showPlotDetails(4, '484')">484</div>
<div class="plot plot-4-485" onclick="showPlotDetails(4, '485')">485</div>
<div class="plot plot-4-486" onclick="showPlotDetails(4, '486')">486</div>
<div class="plot plot-4-487" onclick="showPlotDetails(4, '487')">487</div>
<div class="plot plot-4-488" onclick="showPlotDetails(4, '488')">488</div>
<div class="plot plot-4-489" onclick="showPlotDetails(4, '489')">489</div>
<div class="plot plot-4-490" onclick="showPlotDetails(4, '490')">490</div>
<div class="plot plot-4-491" onclick="showPlotDetails(4, '491')">491</div>
<div class="plot plot-4-492" onclick="showPlotDetails(4, '492')">492</div>
<div class="plot plot-4-493" onclick="showPlotDetails(4, '493')">493</div>
<div class="plot plot-4-494" onclick="showPlotDetails(4, '494')">494</div>
<div class="plot plot-4-495" onclick="showPlotDetails(4, '495')">495</div>
<div class="plot plot-4-496" onclick="showPlotDetails(4, '496')">496</div>
<div class="plot plot-4-497" onclick="showPlotDetails(4, '497')">497</div>
<div class="plot plot-4-498" onclick="showPlotDetails(4, '498')">498</div>
<div class="plot plot-4-499" onclick="showPlotDetails(4, '499')">499</div>
<div class="plot plot-4-500" onclick="showPlotDetails(4, '500')">500</div>
<div class="plot plot-4-501" onclick="showPlotDetails(4, '501')">501</div>
<div class="plot plot-4-502" onclick="showPlotDetails(4, '502')">502</div>
<div class="plot plot-4-503" onclick="showPlotDetails(4, '503')">503</div>
<div class="d0"></div>
<div class="plot plot-4-504" onclick="showPlotDetails(4, '504')">504</div>
<div class="plot plot-4-505" onclick="showPlotDetails(4, '505')">505</div>
<div class="plot plot-4-506" onclick="showPlotDetails(4, '506')">506</div>
<div class="plot plot-4-507" onclick="showPlotDetails(4, '507')">507</div>
<div class="plot plot-4-508" onclick="showPlotDetails(4, '508')">508</div>
<div class="plot plot-4-509" onclick="showPlotDetails(4, '509')">509</div>
<div class="plot plot-4-510" onclick="showPlotDetails(4, '510')">510</div>
<div class="plot plot-4-511" onclick="showPlotDetails(4, '511')">511</div>
<div class="plot plot-4-512" onclick="showPlotDetails(4, '512')">512</div>
<div class="plot plot-4-513" onclick="showPlotDetails(4, '513')">513</div>
<div class="plot plot-4-514" onclick="showPlotDetails(4, '514')">514</div>
<div class="plot plot-4-515" onclick="showPlotDetails(4, '515')">515</div>
<div class="plot plot-4-516" onclick="showPlotDetails(4, '516')">516</div>
<div class="plot plot-4-517" onclick="showPlotDetails(4, '517')">517</div>
<div class="plot plot-4-518" onclick="showPlotDetails(4, '518')">518</div>
<div class="plot plot-4-519" onclick="showPlotDetails(4, '519')">519</div>
<div class="plot plot-4-520" onclick="showPlotDetails(4, '520')">520</div>
<div class="plot plot-4-521" onclick="showPlotDetails(4, '521')">521</div>
<div class="plot plot-4-522" onclick="showPlotDetails(4, '522')">522</div>
<div class="plot plot-4-523" onclick="showPlotDetails(4, '523')">523</div>
<div class="plot plot-4-524" onclick="showPlotDetails(4, '524')">524</div>
<div class="plot plot-4-525" onclick="showPlotDetails(4, '525')">525</div>
<div class="plot plot-4-526" onclick="showPlotDetails(4, '526')">526</div>
<div class="plot plot-4-527" onclick="showPlotDetails(4, '527')">527</div>
<div class="plot plot-4-528" onclick="showPlotDetails(4, '528')">528</div>
<div class="plot plot-4-529" onclick="showPlotDetails(4, '529')">529</div>
<div class="plot plot-4-530" onclick="showPlotDetails(4, '530')">530</div>
<div class="plot plot-4-531" onclick="showPlotDetails(4, '531')">531</div>
<div class="plot plot-4-532" onclick="showPlotDetails(4, '532')">532</div>
<div class="plot plot-4-533" onclick="showPlotDetails(4, '533')">533</div>
<div class="d0"></div>
<div class="plot plot-4-534" onclick="showPlotDetails(4, '534')">534</div>
<div class="plot plot-4-535" onclick="showPlotDetails(4, '535')">535</div>
<div class="plot plot-4-536" onclick="showPlotDetails(4, '536')">536</div>
<div class="plot plot-4-537" onclick="showPlotDetails(4, '537')">537</div>
<div class="plot plot-4-538" onclick="showPlotDetails(4, '538')">538</div>
<div class="plot plot-4-539" onclick="showPlotDetails(4, '539')">539</div>
<div class="plot plot-4-540" onclick="showPlotDetails(4, '540')">540</div>
<div class="plot plot-4-541" onclick="showPlotDetails(4, '541')">541</div>
<div class="plot plot-4-542" onclick="showPlotDetails(4, '542')">542</div>
<div class="plot plot-4-543" onclick="showPlotDetails(4, '543')">543</div>
<div class="plot plot-4-544" onclick="showPlotDetails(4, '544')">544</div>
<div class="plot plot-4-545" onclick="showPlotDetails(4, '545')">545</div>
<div class="plot plot-4-546" onclick="showPlotDetails(4, '546')">546</div>
<div class="plot plot-4-547" onclick="showPlotDetails(4, '547')">547</div>
<div class="plot plot-4-548" onclick="showPlotDetails(4, '548')">548</div>
<div class="plot plot-4-549" onclick="showPlotDetails(4, '549')">549</div>
<div class="plot plot-4-550" onclick="showPlotDetails(4, '550')">550</div>
<div class="plot plot-4-551" onclick="showPlotDetails(4, '551')">551</div>
<div class="plot plot-4-552" onclick="showPlotDetails(4, '552')">552</div>
<div class="plot plot-4-553" onclick="showPlotDetails(4, '553')">553</div>
<div class="plot plot-4-554" onclick="showPlotDetails(4, '554')">554</div>
<div class="plot plot-4-555" onclick="showPlotDetails(4, '555')">555</div>
<div class="plot plot-4-556" onclick="showPlotDetails(4, '556')">556</div>
<div class="plot plot-4-557" onclick="showPlotDetails(4, '557')">557</div>
<div class="plot plot-4-558" onclick="showPlotDetails(4, '558')">558</div>
<div class="plot plot-4-559" onclick="showPlotDetails(4, '559')">559</div>
<div class="plot plot-4-560" onclick="showPlotDetails(4, '560')">560</div>
<div class="plot plot-4-561" onclick="showPlotDetails(4, '561')">561</div>
<div class="plot plot-4-562" onclick="showPlotDetails(4, '562')">562</div>
<div class="plot plot-4-563" onclick="showPlotDetails(4, '563')">563</div>
<div class="plot plot-4-564" onclick="showPlotDetails(4, '564')">564</div>
<div class="plot plot-4-565" onclick="showPlotDetails(4, '565')">565</div>
<div class="plot plot-4-566" onclick="showPlotDetails(4, '566')">566</div>
<div class="plot plot-4-567" onclick="showPlotDetails(4, '567')">567</div>
<div class="plot plot-4-568" onclick="showPlotDetails(4, '568')">568</div>
<div class="plot plot-4-569" onclick="showPlotDetails(4, '569')">569</div>
<div class="plot plot-4-570" onclick="showPlotDetails(4, '570')">570</div>
<div class="plot plot-4-571" onclick="showPlotDetails(4, '571')">571</div>
<div class="plot plot-4-572" onclick="showPlotDetails(4, '572')">572</div>
<div class="plot plot-4-573" onclick="showPlotDetails(4, '573')">573</div>
<div class="plot plot-4-574" onclick="showPlotDetails(4, '574')">574</div>
<div class="plot plot-4-575" onclick="showPlotDetails(4, '575')">575</div>
<div class="plot plot-4-576" onclick="showPlotDetails(4, '576')">576</div>
<div class="plot plot-4-577" onclick="showPlotDetails(4, '577')">577</div>
<div class="plot plot-4-578" onclick="showPlotDetails(4, '578')">578</div>
<div class="plot plot-4-579" onclick="showPlotDetails(4, '579')">579</div>
<div class="plot plot-4-580" onclick="showPlotDetails(4, '580')">580</div>
<div class="plot plot-4-581" onclick="showPlotDetails(4, '581')">581</div>
<div class="plot plot-4-582" onclick="showPlotDetails(4, '582')">582</div>
<div class="plot plot-4-583" onclick="showPlotDetails(4, '583')">583</div>
<div class="plot plot-4-584" onclick="showPlotDetails(4, '584')">584</div>
<div class="plot plot-4-585" onclick="showPlotDetails(4, '585')">585</div>
<div class="plot plot-4-586" onclick="showPlotDetails(4, '586')">586</div>
<div class="plot plot-4-587" onclick="showPlotDetails(4, '587')">587</div>
<div class="plot plot-4-588" onclick="showPlotDetails(4, '588')">588</div>
<div class="plot plot-4-589" onclick="showPlotDetails(4, '589')">589</div>
<div class="plot plot-4-590" onclick="showPlotDetails(4, '590')">590</div>
<div class="plot plot-4-591" onclick="showPlotDetails(4, '591')">591</div>
<div class="plot plot-4-592" onclick="showPlotDetails(4, '592')">592</div>
<div class="plot plot-4-593" onclick="showPlotDetails(4, '593')">593</div>
<div class="plot plot-4-594" onclick="showPlotDetails(4, '594')">594</div>
</div>
<b class="">2.00 M. WIDE PATHWALK</b>
<style>
  .b4w{
    bottom:51.6pc !important;
  }
  .walk6 {
    bottom: 300px;
    right: 315px;
}
.walk7 {
    bottom: 300px;
    left: 310px;
}
  </style>     
<b class="pathwalk walk6 " >2.00 M. WIDE PATHWALK</b>
        <b class="pathwalk walk7 ">2.00 M. WIDE PATHWALK</b>
        <div class="two-way-traffic-sign b4w">
          <div class="arrow-container">
              <div class="arrow left"></div>
          </div>
          <div class="text">TWO WAY TRAFFIC ROAD</div>
          <div class="arrow-container">
              <div class="arrow right"></div>
          </div>
        </div>  
</div>
  </div>
</div>

<!-- Modal HTML for Block 9 -->
<div id="block9Modal" class="modal">
  <div class="modal-content-map">
    <span>Block 9 Plots</span> <span class="close" onclick="closeModal('block9Modal')">&times;</span>
    <div class="modal-center">
      <b class="">2.00 M. WIDE PATHWALK</b>
    <div class="plots_con b9 rotator">
      <div class="d0"></div>
      <div class="d0"></div>
      <div class="plot plot-9-1" onclick="showPlotDetails(9, '1')">1</div>
<div class="plot plot-9-2" onclick="showPlotDetails(9, '2')">2</div>
<div class="plot plot-9-3" onclick="showPlotDetails(9, '3')">3</div>
<div class="plot plot-9-4" onclick="showPlotDetails(9, '4')">4</div>
<div class="plot plot-9-5" onclick="showPlotDetails(9, '5')">5</div>
<div class="plot plot-9-6" onclick="showPlotDetails(9, '6')">6</div>
<div class="plot plot-9-7" onclick="showPlotDetails(9, '7')">7</div>
<div class="plot plot-9-8" onclick="showPlotDetails(9, '8')">8</div>
<div class="plot plot-9-9" onclick="showPlotDetails(9, '9')">9</div>
<div class="plot plot-9-10" onclick="showPlotDetails(9, '10')">10</div>
<div class="plot plot-9-11" onclick="showPlotDetails(9, '11')">11</div>
<div class="plot plot-9-12" onclick="showPlotDetails(9, '12')">12</div>
<div class="plot plot-9-13" onclick="showPlotDetails(9, '13')">13</div>
<div class="plot plot-9-14" onclick="showPlotDetails(9, '14')">14</div>
<div class="plot plot-9-15" onclick="showPlotDetails(9, '15')">15</div>
<div class="plot plot-9-16" onclick="showPlotDetails(9, '16')">16</div>
<div class="plot plot-9-17" onclick="showPlotDetails(9, '17')">17</div>
<div class="plot plot-9-18" onclick="showPlotDetails(9, '18')">18</div>
<div class="plot plot-9-19" onclick="showPlotDetails(9, '19')">19</div>
<div class="plot plot-9-20" onclick="showPlotDetails(9, '20')">20</div>
<div class="plot plot-9-21" onclick="showPlotDetails(9, '21')">21</div>
<div class="plot plot-9-22" onclick="showPlotDetails(9, '22')">22</div>
<div class="plot plot-9-23" onclick="showPlotDetails(9, '23')">23</div>
<div class="plot plot-9-24" onclick="showPlotDetails(9, '24')">24</div>
<div class="plot plot-9-25" onclick="showPlotDetails(9, '25')">25</div>
<div class="plot plot-9-26" onclick="showPlotDetails(9, '26')">26</div>
<div class="plot plot-9-27" onclick="showPlotDetails(9, '27')">27</div>
<div class="plot plot-9-28" onclick="showPlotDetails(9, '28')">28</div>
<div class="plot plot-9-29" onclick="showPlotDetails(9, '29')">29</div>
<div class="plot plot-9-30" onclick="showPlotDetails(9, '30')">30</div>
<div class="plot plot-9-31" onclick="showPlotDetails(9, '31')">31</div>
<div class="plot plot-9-32" onclick="showPlotDetails(9, '32')">32</div>
<div class="plot plot-9-33" onclick="showPlotDetails(9, '33')">33</div>
<div class="plot plot-9-34" onclick="showPlotDetails(9, '34')">34</div>
<div class="plot plot-9-35" onclick="showPlotDetails(9, '35')">35</div>
<div class="d0"></div>
<div class="plot plot-9-36" onclick="showPlotDetails(9, '36')">36</div>
<div class="plot plot-9-37" onclick="showPlotDetails(9, '37')">37</div>
<div class="plot plot-9-38" onclick="showPlotDetails(9, '38')">38</div>
<div class="plot plot-9-39" onclick="showPlotDetails(9, '39')">39</div>
<div class="plot plot-9-40" onclick="showPlotDetails(9, '40')">40</div>
<div class="plot plot-9-41" onclick="showPlotDetails(9, '41')">41</div>
<div class="plot plot-9-42" onclick="showPlotDetails(9, '42')">42</div>
<div class="plot plot-9-43" onclick="showPlotDetails(9, '43')">43</div>
<div class="plot plot-9-44" onclick="showPlotDetails(9, '44')">44</div>
<div class="plot plot-9-45" onclick="showPlotDetails(9, '45')">45</div>
<div class="plot plot-9-46" onclick="showPlotDetails(9, '46')">46</div>
<div class="plot plot-9-47" onclick="showPlotDetails(9, '47')">47</div>
<div class="plot plot-9-48" onclick="showPlotDetails(9, '48')">48</div>
<div class="plot plot-9-49" onclick="showPlotDetails(9, '49')">49</div>
<div class="plot plot-9-50" onclick="showPlotDetails(9, '50')">50</div>
<div class="plot plot-9-51" onclick="showPlotDetails(9, '51')">51</div>
<div class="plot plot-9-52" onclick="showPlotDetails(9, '52')">52</div>
<div class="plot plot-9-53" onclick="showPlotDetails(9, '53')">53</div>
<div class="plot plot-9-54" onclick="showPlotDetails(9, '54')">54</div>
<div class="plot plot-9-55" onclick="showPlotDetails(9, '55')">55</div>
<div class="plot plot-9-56" onclick="showPlotDetails(9, '56')">56</div>
<div class="plot plot-9-57" onclick="showPlotDetails(9, '57')">57</div>
<div class="plot plot-9-58" onclick="showPlotDetails(9, '58')">58</div>
<div class="plot plot-9-59" onclick="showPlotDetails(9, '59')">59</div>
<div class="plot plot-9-60" onclick="showPlotDetails(9, '60')">60</div>
<div class="plot plot-9-61" onclick="showPlotDetails(9, '61')">61</div>
<div class="plot plot-9-62" onclick="showPlotDetails(9, '62')">62</div>
<div class="plot plot-9-63" onclick="showPlotDetails(9, '63')">63</div>
<div class="plot plot-9-64" onclick="showPlotDetails(9, '64')">64</div>
<div class="plot plot-9-65" onclick="showPlotDetails(9, '65')">65</div>
<div class="plot plot-9-66" onclick="showPlotDetails(9, '66')">66</div>
<div class="plot plot-9-67" onclick="showPlotDetails(9, '67')">67</div>
<div class="plot plot-9-68" onclick="showPlotDetails(9, '68')">68</div>
<div class="plot plot-9-69" onclick="showPlotDetails(9, '69')">69</div>
<div class="plot plot-9-70" onclick="showPlotDetails(9, '70')">70</div>
<div class="plot plot-9-71" onclick="showPlotDetails(9, '71')">71</div>
<div class="d0"></div>
<div class="plot plot-9-72" onclick="showPlotDetails(9, '72')">72</div>
<div class="plot plot-9-73" onclick="showPlotDetails(9, '73')">73</div>
<div class="plot plot-9-74" onclick="showPlotDetails(9, '74')">74</div>
<div class="plot plot-9-75" onclick="showPlotDetails(9, '75')">75</div>
<div class="plot plot-9-76" onclick="showPlotDetails(9, '76')">76</div>
<div class="plot plot-9-77" onclick="showPlotDetails(9, '77')">77</div>
<div class="plot plot-9-78" onclick="showPlotDetails(9, '78')">78</div>
<div class="plot plot-9-79" onclick="showPlotDetails(9, '79')">79</div>
<div class="plot plot-9-80" onclick="showPlotDetails(9, '80')">80</div>
<div class="plot plot-9-81" onclick="showPlotDetails(9, '81')">81</div>
<div class="plot plot-9-82" onclick="showPlotDetails(9, '82')">82</div>
<div class="plot plot-9-83" onclick="showPlotDetails(9, '83')">83</div>
<div class="plot plot-9-84" onclick="showPlotDetails(9, '84')">84</div>
<div class="plot plot-9-85" onclick="showPlotDetails(9, '85')">85</div>
<div class="plot plot-9-86" onclick="showPlotDetails(9, '86')">86</div>
<div class="plot plot-9-87" onclick="showPlotDetails(9, '87')">87</div>
<div class="plot plot-9-88" onclick="showPlotDetails(9, '88')">88</div>
<div class="plot plot-9-89" onclick="showPlotDetails(9, '89')">89</div>
<div class="plot plot-9-90" onclick="showPlotDetails(9, '90')">90</div>
<div class="plot plot-9-91" onclick="showPlotDetails(9, '91')">91</div>
<div class="plot plot-9-92" onclick="showPlotDetails(9, '92')">92</div>
<div class="plot plot-9-93" onclick="showPlotDetails(9, '93')">93</div>
<div class="plot plot-9-94" onclick="showPlotDetails(9, '94')">94</div>
<div class="plot plot-9-95" onclick="showPlotDetails(9, '95')">95</div>
<div class="plot plot-9-96" onclick="showPlotDetails(9, '96')">96</div>
<div class="plot plot-9-97" onclick="showPlotDetails(9, '97')">97</div>
<div class="plot plot-9-98" onclick="showPlotDetails(9, '98')">98</div>
<div class="plot plot-9-99" onclick="showPlotDetails(9, '99')">99</div>
<div class="plot plot-9-100" onclick="showPlotDetails(9, '100')">100</div>
<div class="plot plot-9-101" onclick="showPlotDetails(9, '101')">101</div>
<div class="plot plot-9-102" onclick="showPlotDetails(9, '102')">102</div>
<div class="plot plot-9-103" onclick="showPlotDetails(9, '103')">103</div>
<div class="plot plot-9-104" onclick="showPlotDetails(9, '104')">104</div>
<div class="plot plot-9-105" onclick="showPlotDetails(9, '105')">105</div>
<div class="plot plot-9-106" onclick="showPlotDetails(9, '106')">106</div>
<div class="plot plot-9-107" onclick="showPlotDetails(9, '107')">107</div>
<div class="d0"></div>
<div class="plot plot-9-108" onclick="showPlotDetails(9, '108')">108</div>
<div class="plot plot-9-109" onclick="showPlotDetails(9, '109')">109</div>
<div class="plot plot-9-110" onclick="showPlotDetails(9, '110')">110</div>
<div class="plot plot-9-111" onclick="showPlotDetails(9, '111')">111</div>
<div class="plot plot-9-112" onclick="showPlotDetails(9, '112')">112</div>
<div class="plot plot-9-113" onclick="showPlotDetails(9, '113')">113</div>
<div class="plot plot-9-114" onclick="showPlotDetails(9, '114')">114</div>
<div class="plot plot-9-115" onclick="showPlotDetails(9, '115')">115</div>
<div class="plot plot-9-116" onclick="showPlotDetails(9, '116')">116</div>
<div class="plot plot-9-117" onclick="showPlotDetails(9, '117')">117</div>
<div class="plot plot-9-118" onclick="showPlotDetails(9, '118')">118</div>
<div class="plot plot-9-119" onclick="showPlotDetails(9, '119')">119</div>
<div class="plot plot-9-120" onclick="showPlotDetails(9, '120')">120</div>
<div class="plot plot-9-121" onclick="showPlotDetails(9, '121')">121</div>
<div class="plot plot-9-122" onclick="showPlotDetails(9, '122')">122</div>
<div class="plot plot-9-123" onclick="showPlotDetails(9, '123')">123</div>
<div class="plot plot-9-124" onclick="showPlotDetails(9, '124')">124</div>
<div class="plot plot-9-125" onclick="showPlotDetails(9, '125')">125</div>
<div class="plot plot-9-126" onclick="showPlotDetails(9, '126')">126</div>
<div class="plot plot-9-127" onclick="showPlotDetails(9, '127')">127</div>
<div class="plot plot-9-128" onclick="showPlotDetails(9, '128')">128</div>
<div class="plot plot-9-129" onclick="showPlotDetails(9, '129')">129</div>
<div class="plot plot-9-130" onclick="showPlotDetails(9, '130')">130</div>
<div class="plot plot-9-131" onclick="showPlotDetails(9, '131')">131</div>
<div class="plot plot-9-132" onclick="showPlotDetails(9, '132')">132</div>
<div class="plot plot-9-133" onclick="showPlotDetails(9, '133')">133</div>
<div class="plot plot-9-134" onclick="showPlotDetails(9, '134')">134</div>
<div class="plot plot-9-135" onclick="showPlotDetails(9, '135')">135</div>
<div class="plot plot-9-136" onclick="showPlotDetails(9, '136')">136</div>
<div class="plot plot-9-137" onclick="showPlotDetails(9, '137')">137</div>
<div class="plot plot-9-138" onclick="showPlotDetails(9, '138')">138</div>
<div class="plot plot-9-139" onclick="showPlotDetails(9, '139')">139</div>
<div class="plot plot-9-140" onclick="showPlotDetails(9, '140')">140</div>
<div class="plot plot-9-141" onclick="showPlotDetails(9, '141')">141</div>
<div class="plot plot-9-142" onclick="showPlotDetails(9, '142')">142</div>
<div class="plot plot-9-143" onclick="showPlotDetails(9, '143')">143</div>
<div class="d0"></div>
<div class="plot plot-9-144" onclick="showPlotDetails(9, '144')">144</div>
<div class="plot plot-9-145" onclick="showPlotDetails(9, '145')">145</div>
<div class="plot plot-9-146" onclick="showPlotDetails(9, '146')">146</div>
<div class="plot plot-9-147" onclick="showPlotDetails(9, '147')">147</div>
<div class="plot plot-9-148" onclick="showPlotDetails(9, '148')">148</div>
<div class="plot plot-9-149" onclick="showPlotDetails(9, '149')">149</div>
<div class="plot plot-9-150" onclick="showPlotDetails(9, '150')">150</div>
<div class="plot plot-9-151" onclick="showPlotDetails(9, '151')">151</div>
<div class="plot plot-9-152" onclick="showPlotDetails(9, '152')">152</div>
<div class="plot plot-9-153" onclick="showPlotDetails(9, '153')">153</div>
<div class="plot plot-9-154" onclick="showPlotDetails(9, '154')">154</div>
<div class="plot plot-9-155" onclick="showPlotDetails(9, '155')">155</div>
<div class="plot plot-9-156" onclick="showPlotDetails(9, '156')">156</div>
<div class="plot plot-9-157" onclick="showPlotDetails(9, '157')">157</div>
<div class="plot plot-9-158" onclick="showPlotDetails(9, '158')">158</div>
<div class="plot plot-9-159" onclick="showPlotDetails(9, '159')">159</div>
<div class="plot plot-9-160" onclick="showPlotDetails(9, '160')">160</div>
<div class="plot plot-9-161" onclick="showPlotDetails(9, '161')">161</div>
<div class="plot plot-9-162" onclick="showPlotDetails(9, '162')">162</div>
<div class="plot plot-9-163" onclick="showPlotDetails(9, '163')">163</div>
<div class="plot plot-9-164" onclick="showPlotDetails(9, '164')">164</div>
<div class="plot plot-9-165" onclick="showPlotDetails(9, '165')">165</div>
<div class="plot plot-9-166" onclick="showPlotDetails(9, '166')">166</div>
<div class="plot plot-9-167" onclick="showPlotDetails(9, '167')">167</div>
<div class="plot plot-9-168" onclick="showPlotDetails(9, '168')">168</div>
<div class="plot plot-9-169" onclick="showPlotDetails(9, '169')">169</div>
<div class="plot plot-9-170" onclick="showPlotDetails(9, '170')">170</div>
<div class="plot plot-9-171" onclick="showPlotDetails(9, '171')">171</div>
<div class="plot plot-9-172" onclick="showPlotDetails(9, '172')">172</div>
<div class="plot plot-9-173" onclick="showPlotDetails(9, '173')">173</div>
<div class="plot plot-9-174" onclick="showPlotDetails(9, '174')">174</div>
<div class="plot plot-9-175" onclick="showPlotDetails(9, '175')">175</div>
<div class="plot plot-9-176" onclick="showPlotDetails(9, '176')">176</div>
<div class="plot plot-9-177" onclick="showPlotDetails(9, '177')">177</div>
<div class="plot plot-9-178" onclick="showPlotDetails(9, '178')">178</div>
<div class="plot plot-9-179" onclick="showPlotDetails(9, '179')">179</div>
<div class="d0"></div>
<div class="plot plot-9-180" onclick="showPlotDetails(9, '180')">180</div>
<div class="plot plot-9-181" onclick="showPlotDetails(9, '181')">181</div>
<div class="plot plot-9-182" onclick="showPlotDetails(9, '182')">182</div>
<div class="plot plot-9-183" onclick="showPlotDetails(9, '183')">183</div>
<div class="plot plot-9-184" onclick="showPlotDetails(9, '184')">184</div>
<div class="plot plot-9-185" onclick="showPlotDetails(9, '185')">185</div>
<div class="plot plot-9-186" onclick="showPlotDetails(9, '186')">186</div>
<div class="plot plot-9-187" onclick="showPlotDetails(9, '187')">187</div>
<div class="plot plot-9-188" onclick="showPlotDetails(9, '188')">188</div>
<div class="plot plot-9-189" onclick="showPlotDetails(9, '189')">189</div>
<div class="plot plot-9-190" onclick="showPlotDetails(9, '190')">190</div>
<div class="plot plot-9-191" onclick="showPlotDetails(9, '191')">191</div>
<div class="plot plot-9-192" onclick="showPlotDetails(9, '192')">192</div>
<div class="plot plot-9-193" onclick="showPlotDetails(9, '193')">193</div>
<div class="plot plot-9-194" onclick="showPlotDetails(9, '194')">194</div>
<div class="plot plot-9-195" onclick="showPlotDetails(9, '195')">195</div>
<div class="plot plot-9-196" onclick="showPlotDetails(9, '196')">196</div>
<div class="plot plot-9-197" onclick="showPlotDetails(9, '197')">197</div>
<div class="plot plot-9-198" onclick="showPlotDetails(9, '198')">198</div>
<div class="plot plot-9-199" onclick="showPlotDetails(9, '199')">199</div>
<div class="plot plot-9-200" onclick="showPlotDetails(9, '200')">200</div>
<div class="plot plot-9-201" onclick="showPlotDetails(9, '201')">201</div>
<div class="plot plot-9-202" onclick="showPlotDetails(9, '202')">202</div>
<div class="plot plot-9-203" onclick="showPlotDetails(9, '203')">203</div>
<div class="plot plot-9-204" onclick="showPlotDetails(9, '204')">204</div>
<div class="plot plot-9-205" onclick="showPlotDetails(9, '205')">205</div>
<div class="plot plot-9-206" onclick="showPlotDetails(9, '206')">206</div>
<div class="plot plot-9-207" onclick="showPlotDetails(9, '207')">207</div>
<div class="plot plot-9-208" onclick="showPlotDetails(9, '208')">208</div>
<div class="plot plot-9-209" onclick="showPlotDetails(9, '209')">209</div>
<div class="plot plot-9-210" onclick="showPlotDetails(9, '210')">210</div>
<div class="plot plot-9-211" onclick="showPlotDetails(9, '211')">211</div>
<div class="plot plot-9-212" onclick="showPlotDetails(9, '212')">212</div>
<div class="plot plot-9-213" onclick="showPlotDetails(9, '213')">213</div>
<div class="plot plot-9-214" onclick="showPlotDetails(9, '214')">214</div>
<div class="plot plot-9-215" onclick="showPlotDetails(9, '215')">215</div>
<div class="d0"></div>
<div class="plot plot-9-216" onclick="showPlotDetails(9, '216')">216</div>
<div class="plot plot-9-217" onclick="showPlotDetails(9, '217')">217</div>
<div class="plot plot-9-218" onclick="showPlotDetails(9, '218')">218</div>
<div class="plot plot-9-219" onclick="showPlotDetails(9, '219')">219</div>
<div class="plot plot-9-220" onclick="showPlotDetails(9, '220')">220</div>
<div class="plot plot-9-221" onclick="showPlotDetails(9, '221')">221</div>
<div class="plot plot-9-222" onclick="showPlotDetails(9, '222')">222</div>
<div class="plot plot-9-223" onclick="showPlotDetails(9, '223')">223</div>
<div class="plot plot-9-224" onclick="showPlotDetails(9, '224')">224</div>
<div class="plot plot-9-225" onclick="showPlotDetails(9, '225')">225</div>
<div class="plot plot-9-226" onclick="showPlotDetails(9, '226')">226</div>
<div class="plot plot-9-227" onclick="showPlotDetails(9, '227')">227</div>
<div class="plot plot-9-228" onclick="showPlotDetails(9, '228')">228</div>
<div class="plot plot-9-229" onclick="showPlotDetails(9, '229')">229</div>
<div class="plot plot-9-230" onclick="showPlotDetails(9, '230')">230</div>
<div class="plot plot-9-231" onclick="showPlotDetails(9, '231')">231</div>
<div class="plot plot-9-232" onclick="showPlotDetails(9, '232')">232</div>
<div class="plot plot-9-233" onclick="showPlotDetails(9, '233')">233</div>
<div class="plot plot-9-234" onclick="showPlotDetails(9, '234')">234</div>
<div class="plot plot-9-235" onclick="showPlotDetails(9, '235')">235</div>
<div class="plot plot-9-236" onclick="showPlotDetails(9, '236')">236</div>
<div class="plot plot-9-237" onclick="showPlotDetails(9, '237')">237</div>
<div class="plot plot-9-238" onclick="showPlotDetails(9, '238')">238</div>
<div class="plot plot-9-239" onclick="showPlotDetails(9, '239')">239</div>
<div class="plot plot-9-240" onclick="showPlotDetails(9, '240')">240</div>
<div class="plot plot-9-241" onclick="showPlotDetails(9, '241')">241</div>
<div class="plot plot-9-242" onclick="showPlotDetails(9, '242')">242</div>
<div class="plot plot-9-243" onclick="showPlotDetails(9, '243')">243</div>
<div class="plot plot-9-244" onclick="showPlotDetails(9, '244')">244</div>
<div class="plot plot-9-245" onclick="showPlotDetails(9, '245')">245</div>
<div class="plot plot-9-246" onclick="showPlotDetails(9, '246')">246</div>
<div class="plot plot-9-247" onclick="showPlotDetails(9, '247')">247</div>
<div class="plot plot-9-248" onclick="showPlotDetails(9, '248')">248</div>
<div class="plot plot-9-249" onclick="showPlotDetails(9, '249')">249</div>
<div class="plot plot-9-250" onclick="showPlotDetails(9, '250')">250</div>
<div class="plot plot-9-251" onclick="showPlotDetails(9, '251')">251</div>
<div class="d0"></div>
<div class="plot plot-9-252" onclick="showPlotDetails(9, '252')">252</div>
<div class="plot plot-9-253" onclick="showPlotDetails(9, '253')">253</div>
<div class="plot plot-9-254" onclick="showPlotDetails(9, '254')">254</div>
<div class="plot plot-9-255" onclick="showPlotDetails(9, '255')">255</div>
<div class="plot plot-9-256" onclick="showPlotDetails(9, '256')">256</div>
<div class="plot plot-9-257" onclick="showPlotDetails(9, '257')">257</div>
<div class="plot plot-9-258" onclick="showPlotDetails(9, '258')">258</div>
<div class="plot plot-9-259" onclick="showPlotDetails(9, '259')">259</div>
<div class="plot plot-9-260" onclick="showPlotDetails(9, '260')">260</div>
<div class="plot plot-9-261" onclick="showPlotDetails(9, '261')">261</div>
<div class="plot plot-9-262" onclick="showPlotDetails(9, '262')">262</div>
<div class="plot plot-9-263" onclick="showPlotDetails(9, '263')">263</div>
<div class="plot plot-9-264" onclick="showPlotDetails(9, '264')">264</div>
<div class="plot plot-9-265" onclick="showPlotDetails(9, '265')">265</div>
<div class="plot plot-9-266" onclick="showPlotDetails(9, '266')">266</div>
<div class="plot plot-9-267" onclick="showPlotDetails(9, '267')">267</div>
<div class="plot plot-9-268" onclick="showPlotDetails(9, '268')">268</div>
<div class="plot plot-9-269" onclick="showPlotDetails(9, '269')">269</div>
<div class="plot plot-9-270" onclick="showPlotDetails(9, '270')">270</div>
<div class="plot plot-9-271" onclick="showPlotDetails(9, '271')">271</div>
<div class="plot plot-9-272" onclick="showPlotDetails(9, '272')">272</div>
<div class="plot plot-9-273" onclick="showPlotDetails(9, '273')">273</div>
<div class="plot plot-9-274" onclick="showPlotDetails(9, '274')">274</div>
<div class="plot plot-9-275" onclick="showPlotDetails(9, '275')">275</div>
<div class="plot plot-9-276" onclick="showPlotDetails(9, '276')">276</div>
<div class="plot plot-9-277" onclick="showPlotDetails(9, '277')">277</div>
<div class="plot plot-9-278" onclick="showPlotDetails(9, '278')">278</div>
<div class="plot plot-9-279" onclick="showPlotDetails(9, '279')">279</div>
<div class="plot plot-9-280" onclick="showPlotDetails(9, '280')">280</div>
<div class="plot plot-9-281" onclick="showPlotDetails(9, '281')">281</div>
<div class="plot plot-9-282" onclick="showPlotDetails(9, '282')">282</div>
<div class="plot plot-9-283" onclick="showPlotDetails(9, '283')">283</div>
<div class="plot plot-9-284" onclick="showPlotDetails(9, '284')">284</div>
<div class="plot plot-9-285" onclick="showPlotDetails(9, '285')">285</div>
<div class="plot plot-9-286" onclick="showPlotDetails(9, '286')">286</div>
<div class="plot plot-9-287" onclick="showPlotDetails(9, '287')">287</div>
<div class="d0"></div>
<div class="plot plot-9-288" onclick="showPlotDetails(9, '288')">288</div>
<div class="plot plot-9-289" onclick="showPlotDetails(9, '289')">289</div>
<div class="plot plot-9-290" onclick="showPlotDetails(9, '290')">290</div>
<div class="plot plot-9-291" onclick="showPlotDetails(9, '291')">291</div>
<div class="plot plot-9-292" onclick="showPlotDetails(9, '292')">292</div>
<div class="plot plot-9-293" onclick="showPlotDetails(9, '293')">293</div>
<div class="plot plot-9-294" onclick="showPlotDetails(9, '294')">294</div>
<div class="plot plot-9-295" onclick="showPlotDetails(9, '295')">295</div>
<div class="plot plot-9-296" onclick="showPlotDetails(9, '296')">296</div>
<div class="plot plot-9-297" onclick="showPlotDetails(9, '297')">297</div>
<div class="plot plot-9-298" onclick="showPlotDetails(9, '298')">298</div>
<div class="plot plot-9-299" onclick="showPlotDetails(9, '299')">299</div>
<div class="plot plot-9-300" onclick="showPlotDetails(9, '300')">300</div>
<div class="plot plot-9-301" onclick="showPlotDetails(9, '301')">301</div>
<div class="plot plot-9-302" onclick="showPlotDetails(9, '302')">302</div>
<div class="plot plot-9-303" onclick="showPlotDetails(9, '303')">303</div>
<div class="plot plot-9-304" onclick="showPlotDetails(9, '304')">304</div>
<div class="plot plot-9-305" onclick="showPlotDetails(9, '305')">305</div>
<div class="plot plot-9-306" onclick="showPlotDetails(9, '306')">306</div>
<div class="plot plot-9-307" onclick="showPlotDetails(9, '307')">307</div>
<div class="plot plot-9-308" onclick="showPlotDetails(9, '308')">308</div>
<div class="plot plot-9-309" onclick="showPlotDetails(9, '309')">309</div>
<div class="plot plot-9-310" onclick="showPlotDetails(9, '310')">310</div>
<div class="plot plot-9-311" onclick="showPlotDetails(9, '311')">311</div>
<div class="plot plot-9-312" onclick="showPlotDetails(9, '312')">312</div>
<div class="plot plot-9-313" onclick="showPlotDetails(9, '313')">313</div>
<div class="plot plot-9-314" onclick="showPlotDetails(9, '314')">314</div>
<div class="plot plot-9-315" onclick="showPlotDetails(9, '315')">315</div>
<div class="plot plot-9-316" onclick="showPlotDetails(9, '316')">316</div>
<div class="plot plot-9-317" onclick="showPlotDetails(9, '317')">317</div>
<div class="plot plot-9-318" onclick="showPlotDetails(9, '318')">318</div>
<div class="plot plot-9-319" onclick="showPlotDetails(9, '319')">319</div>
<div class="plot plot-9-320" onclick="showPlotDetails(9, '320')">320</div>
<div class="plot plot-9-321" onclick="showPlotDetails(9, '321')">321</div>
<div class="plot plot-9-322" onclick="showPlotDetails(9, '322')">322</div>
<div class="plot plot-9-323" onclick="showPlotDetails(9, '323')">323</div>
<div class="plot plot-9-324" onclick="showPlotDetails(9, '324')">324</div>
<div class="plot plot-9-325" onclick="showPlotDetails(9, '325')">325</div>
<div class="plot plot-9-326" onclick="showPlotDetails(9, '326')">326</div>
<div class="plot plot-9-327" onclick="showPlotDetails(9, '327')">327</div>
<div class="plot plot-9-328" onclick="showPlotDetails(9, '328')">328</div>
<div class="plot plot-9-329" onclick="showPlotDetails(9, '329')">329</div>
<div class="plot plot-9-330" onclick="showPlotDetails(9, '330')">330</div>
<div class="plot plot-9-331" onclick="showPlotDetails(9, '331')">331</div>
<div class="plot plot-9-332" onclick="showPlotDetails(9, '332')">332</div>
<div class="plot plot-9-333" onclick="showPlotDetails(9, '333')">333</div>
<div class="plot plot-9-334" onclick="showPlotDetails(9, '334')">334</div>
<div class="plot plot-9-335" onclick="showPlotDetails(9, '335')">335</div>
<div class="plot plot-9-336" onclick="showPlotDetails(9, '336')">336</div>
<div class="plot plot-9-337" onclick="showPlotDetails(9, '337')">337</div>
<div class="plot plot-9-338" onclick="showPlotDetails(9, '338')">338</div>
<div class="plot plot-9-339" onclick="showPlotDetails(9, '339')">339</div>
<div class="plot plot-9-340" onclick="showPlotDetails(9, '340')">340</div>
<div class="plot plot-9-341" onclick="showPlotDetails(9, '341')">341</div>
<div class="plot plot-9-342" onclick="showPlotDetails(9, '342')">342</div>
<div class="plot plot-9-343" onclick="showPlotDetails(9, '343')">343</div>
<div class="plot plot-9-344" onclick="showPlotDetails(9, '344')">344</div>
<div class="plot plot-9-345" onclick="showPlotDetails(9, '345')">345</div>
<div class="plot plot-9-346" onclick="showPlotDetails(9, '346')">346</div>
<div class="plot plot-9-347" onclick="showPlotDetails(9, '347')">347</div>
<div class="plot plot-9-348" onclick="showPlotDetails(9, '348')">348</div>
<div class="plot plot-9-349" onclick="showPlotDetails(9, '349')">349</div>
<div class="plot plot-9-350" onclick="showPlotDetails(9, '350')">350</div>
<div class="plot plot-9-351" onclick="showPlotDetails(9, '351')">351</div>
<div class="plot plot-9-352" onclick="showPlotDetails(9, '352')">352</div>
<div class="plot plot-9-353" onclick="showPlotDetails(9, '353')">353</div>
<div class="plot plot-9-354" onclick="showPlotDetails(9, '354')">354</div>
<div class="plot plot-9-355" onclick="showPlotDetails(9, '355')">355</div>
<div class="plot plot-9-356" onclick="showPlotDetails(9, '356')">356</div>
<div class="plot plot-9-357" onclick="showPlotDetails(9, '357')">357</div>
<div class="plot plot-9-358" onclick="showPlotDetails(9, '358')">358</div>
<div class="plot plot-9-359" onclick="showPlotDetails(9, '359')">359</div>
<div class="plot plot-9-360" onclick="showPlotDetails(9, '360')">360</div>
<div class="plot plot-9-361" onclick="showPlotDetails(9, '361')">361</div>
<div class="plot plot-9-362" onclick="showPlotDetails(9, '362')">362</div>
<div class="plot plot-9-363" onclick="showPlotDetails(9, '363')">363</div>
<div class="plot plot-9-364" onclick="showPlotDetails(9, '364')">364</div>
<div class="plot plot-9-365" onclick="showPlotDetails(9, '365')">365</div>
<div class="plot plot-9-366" onclick="showPlotDetails(9, '366')">366</div>
<div class="plot plot-9-367" onclick="showPlotDetails(9, '367')">367</div>
<div class="plot plot-9-368" onclick="showPlotDetails(9, '368')">368</div>
<div class="plot plot-9-369" onclick="showPlotDetails(9, '369')">369</div>
<div class="plot plot-9-370" onclick="showPlotDetails(9, '370')">370</div>
<div class="plot plot-9-371" onclick="showPlotDetails(9, '371')">371</div>
<div class="plot plot-9-372" onclick="showPlotDetails(9, '372')">372</div>
<div class="plot plot-9-373" onclick="showPlotDetails(9, '373')">373</div>
<div class="plot plot-9-374" onclick="showPlotDetails(9, '374')">374</div>
<div class="plot plot-9-375" onclick="showPlotDetails(9, '375')">375</div>
<div class="plot plot-9-376" onclick="showPlotDetails(9, '376')">376</div>
<div class="plot plot-9-377" onclick="showPlotDetails(9, '377')">377</div>
<div class="plot plot-9-378" onclick="showPlotDetails(9, '378')">378</div>
<div class="plot plot-9-379" onclick="showPlotDetails(9, '379')">379</div>
<div class="plot plot-9-380" onclick="showPlotDetails(9, '380')">380</div>
<div class="plot plot-9-381" onclick="showPlotDetails(9, '381')">381</div>
<div class="plot plot-9-382" onclick="showPlotDetails(9, '382')">382</div>
<div class="plot plot-9-383" onclick="showPlotDetails(9, '383')">383</div>
<div class="plot plot-9-384" onclick="showPlotDetails(9, '384')">384</div>
<div class="plot plot-9-385" onclick="showPlotDetails(9, '385')">385</div>
<div class="plot plot-9-386" onclick="showPlotDetails(9, '386')">386</div>
<div class="plot plot-9-387" onclick="showPlotDetails(9, '387')">387</div>
<div class="plot plot-9-388" onclick="showPlotDetails(9, '388')">388</div>
<div class="plot plot-9-389" onclick="showPlotDetails(9, '389')">389</div>
<div class="plot plot-9-390" onclick="showPlotDetails(9, '390')">390</div>
<div class="plot plot-9-391" onclick="showPlotDetails(9, '391')">391</div>
<div class="plot plot-9-392" onclick="showPlotDetails(9, '392')">392</div>
<div class="plot plot-9-393" onclick="showPlotDetails(9, '393')">393</div>
<div class="plot plot-9-394" onclick="showPlotDetails(9, '394')">394</div>
<div class="plot plot-9-395" onclick="showPlotDetails(9, '395')">395</div>
<div class="plot plot-9-396" onclick="showPlotDetails(9, '396')">396</div>
<div class="plot plot-9-397" onclick="showPlotDetails(9, '397')">397</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-9-398" onclick="showPlotDetails(9, '398')">398</div>
<div class="plot plot-9-399" onclick="showPlotDetails(9, '399')">399</div>
<div class="plot plot-9-400" onclick="showPlotDetails(9, '400')">400</div>
<div class="plot plot-9-401" onclick="showPlotDetails(9, '401')">401</div>
<div class="plot plot-9-402" onclick="showPlotDetails(9, '402')">402</div>
<div class="plot plot-9-403" onclick="showPlotDetails(9, '403')">403</div>
<div class="plot plot-9-404" onclick="showPlotDetails(9, '404')">404</div>
<div class="plot plot-9-405" onclick="showPlotDetails(9, '405')">405</div>
<div class="plot plot-9-406" onclick="showPlotDetails(9, '406')">406</div>
<div class="plot plot-9-407" onclick="showPlotDetails(9, '407')">407</div>
<div class="plot plot-9-408" onclick="showPlotDetails(9, '408')">408</div>
<div class="plot plot-9-409" onclick="showPlotDetails(9, '409')">409</div>
<div class="plot plot-9-410" onclick="showPlotDetails(9, '410')">410</div>
<div class="plot plot-9-411" onclick="showPlotDetails(9, '411')">411</div>
<div class="plot plot-9-412" onclick="showPlotDetails(9, '412')">412</div>
<div class="plot plot-9-413" onclick="showPlotDetails(9, '413')">413</div>
<div class="plot plot-9-414" onclick="showPlotDetails(9, '414')">414</div>
<div class="plot plot-9-415" onclick="showPlotDetails(9, '415')">415</div>
<div class="plot plot-9-416" onclick="showPlotDetails(9, '416')">416</div>
<div class="plot plot-9-417" onclick="showPlotDetails(9, '417')">417</div>
<div class="plot plot-9-418" onclick="showPlotDetails(9, '418')">418</div>
<div class="plot plot-9-419" onclick="showPlotDetails(9, '419')">419</div>
<div class="plot plot-9-420" onclick="showPlotDetails(9, '420')">420</div>
<div class="plot plot-9-421" onclick="showPlotDetails(9, '421')">421</div>
<div class="plot plot-9-422" onclick="showPlotDetails(9, '422')">422</div>
<div class="plot plot-9-423" onclick="showPlotDetails(9, '423')">423</div>
<div class="plot plot-9-424" onclick="showPlotDetails(9, '424')">424</div>
<div class="plot plot-9-425" onclick="showPlotDetails(9, '425')">425</div>
<div class="plot plot-9-426" onclick="showPlotDetails(9, '426')">426</div>
<div class="plot plot-9-427" onclick="showPlotDetails(9, '427')">427</div>
<div class="plot plot-9-428" onclick="showPlotDetails(9, '428')">428</div>
<div class="plot plot-9-429" onclick="showPlotDetails(9, '429')">429</div>
<div class="plot plot-9-430" onclick="showPlotDetails(9, '430')">430</div>
<div class="plot plot-9-431" onclick="showPlotDetails(9, '431')">431</div>
<div class="d0"></div>

<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>

<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>

<div class="d0"></div>

<div class="plot plot-9-432" onclick="showPlotDetails(9, '432')">432</div>
<div class="plot plot-9-433" onclick="showPlotDetails(9, '433')">433</div>
<div class="plot plot-9-434" onclick="showPlotDetails(9, '434')">434</div>
<div class="plot plot-9-435" onclick="showPlotDetails(9, '435')">435</div>
<div class="plot plot-9-436" onclick="showPlotDetails(9, '436')">436</div>
<div class="plot plot-9-437" onclick="showPlotDetails(9, '437')">437</div>
<div class="plot plot-9-438" onclick="showPlotDetails(9, '438')">438</div>
<div class="plot plot-9-439" onclick="showPlotDetails(9, '439')">439</div>
<div class="plot plot-9-440" onclick="showPlotDetails(9, '440')">440</div>
<div class="plot plot-9-441" onclick="showPlotDetails(9, '441')">441</div>
<div class="plot plot-9-442" onclick="showPlotDetails(9, '442')">442</div>
<div class="plot plot-9-443" onclick="showPlotDetails(9, '443')">443</div>
<div class="plot plot-9-444" onclick="showPlotDetails(9, '444')">444</div>
<div class="plot plot-9-445" onclick="showPlotDetails(9, '445')">445</div>
<div class="plot plot-9-446" onclick="showPlotDetails(9, '446')">446</div>
<div class="plot plot-9-447" onclick="showPlotDetails(9, '447')">447</div>
<div class="plot plot-9-448" onclick="showPlotDetails(9, '448')">448</div>
<div class="plot plot-9-449" onclick="showPlotDetails(9, '449')">449</div>
<div class="plot plot-9-450" onclick="showPlotDetails(9, '450')">450</div>
<div class="plot plot-9-451" onclick="showPlotDetails(9, '451')">451</div>
<div class="plot plot-9-452" onclick="showPlotDetails(9, '452')">452</div>
<div class="plot plot-9-453" onclick="showPlotDetails(9, '453')">453</div>
<div class="plot plot-9-454" onclick="showPlotDetails(9, '454')">454</div>
<div class="plot plot-9-455" onclick="showPlotDetails(9, '455')">455</div>
<div class="plot plot-9-456" onclick="showPlotDetails(9, '456')">456</div>
<div class="plot plot-9-457" onclick="showPlotDetails(9, '457')">457</div>
<div class="d0"></div>

<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>

<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>

<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>

<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>

<div class="d0"></div>
<div class="plot plot-9-458" onclick="showPlotDetails(9, '458')">458</div>
<div class="plot plot-9-459" onclick="showPlotDetails(9, '459')">459</div>
<div class="plot plot-9-460" onclick="showPlotDetails(9, '460')">460</div>
<div class="plot plot-9-461" onclick="showPlotDetails(9, '461')">461</div>
<div class="plot plot-9-462" onclick="showPlotDetails(9, '462')">462</div>
<div class="plot plot-9-463" onclick="showPlotDetails(9, '463')">463</div>
<div class="plot plot-9-464" onclick="showPlotDetails(9, '464')">464</div>
<div class="plot plot-9-465" onclick="showPlotDetails(9, '465')">465</div>
<div class="plot plot-9-466" onclick="showPlotDetails(9, '466')">466</div>
<div class="plot plot-9-467" onclick="showPlotDetails(9, '467')">467</div>
<div class="plot plot-9-468" onclick="showPlotDetails(9, '468')">468</div>
<div class="plot plot-9-469" onclick="showPlotDetails(9, '469')">469</div>
<div class="plot plot-9-470" onclick="showPlotDetails(9, '470')">470</div>
<div class="plot plot-9-471" onclick="showPlotDetails(9, '471')">471</div>
<div class="plot plot-9-472" onclick="showPlotDetails(9, '472')">472</div>
<div class="plot plot-9-473" onclick="showPlotDetails(9, '473')">473</div>
<div class="plot plot-9-474" onclick="showPlotDetails(9, '474')">474</div>
<div class="plot plot-9-475" onclick="showPlotDetails(9, '475')">475</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>

<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>

<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>

<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>

<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>

<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>

<div class="d0"></div>
<div class="d0"></div>
<div class="d0"></div>

<div class="d0"></div>
<div class="plot plot-9-476" onclick="showPlotDetails(9, '476')">476</div>
<div class="plot plot-9-477" onclick="showPlotDetails(9, '477')">477</div>
<div class="plot plot-9-478" onclick="showPlotDetails(9, '478')">478</div>
<div class="plot plot-9-479" onclick="showPlotDetails(9, '479')">479</div>
<div class="plot plot-9-480" onclick="showPlotDetails(9, '480')">480</div>
<div class="plot plot-9-481" onclick="showPlotDetails(9, '481')">481</div>
<div class="plot plot-9-482" onclick="showPlotDetails(9, '482')">482</div>
<div class="plot plot-9-483" onclick="showPlotDetails(9, '483')">483</div>
<div class="plot plot-9-484" onclick="showPlotDetails(9, '484')">484</div>

    </div>
    <style>
      .b9t{
        right: -14pc;
        bottom: 7pc;
      }
      .hrrot{
        position: relative;
    transform: rotate(80deg);
    bottom: 23.2pc;
    right: 14.5pc;
      }
      .hrrot2{
        position: relative;
    transform: rotate(80deg);
    bottom: 23.2pc;
    right: 8.5pc;
      }
      .road9{
    width: 120%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin-left: 9.3pc;
      }
    </style>
          <hr class="hrrot" style="style=color: black; width: 105%;" >
          <hr class="hrrot2" style="style=color: black; width: 105%;" >
    <div class="road9">

  <hr style="style=color: black; width: 45%; margin-left: 130px;" >
  <div class="ped">PEDESTRIAN SIDEWALK</div>
  <hr style="style=color: black; width: 45%; margin-left: 130px;" >
  <b>GREEN PARK MEMORIAL GARDEN</b>
  <b>BLOCK 9</b>
  <hr style="style=color: black; width: 45%; margin-left: 130px;" >
  <div class="ped">PEDESTRIAN SIDEWALK</div>
  <hr style="style=color: black; width: 45%; margin-left: 130px;" >
    </div>
    <style>
      .two-way-traffic-sign2 {
       display: flex;
       flex-direction: column;
       align-items: center;
       padding: 10px 20px;
       right: -16pc;
       bottom: 5.7pc;
       position: relative;
   }
   
   .arrow-container2 {
       display: flex;
       justify-content: center;
       align-items: center;
       margin: 10px 0;
   }
   
   .arrow2 {
    width: 40px;
    height: 3px;
    border: 2px solid #ffffff;
    position: relative;
    background-color: white;
   }
   
   .arrow2.left2::before {
       content: '';
       position: absolute;
       top: 50%;
       left: -20px;
       transform: translateY(-50%);
       border-top: 10px solid transparent;
       border-bottom: 10px solid transparent;
       border-right: 20px solid #ffffff;
   }
   
   .arrow2.right2::before {
       content: '';
       position: absolute;
       top: 50%;
       right: -20px;
       transform: translateY(-50%);
       border-top: 10px solid transparent;
       border-bottom: 10px solid transparent;
       border-left: 20px solid #ffffff;
   }
   .text2 {
       font-size: 5px;
       font-weight: bold;
       margin: 5px 0;
   }
   
   </style>
   <div class="two-way-traffic-sign2">
     <div class="arrow-container2">
         <div class="arrow2 left2"></div>
     </div>
     <div class="text2">TWO WAY TRAFFIC ROAD</div>
     <div class="arrow-container2">
         <div class="arrow2 right2"></div>
     </div>
   </div>
  </div>
</div>
</div>

<!-- Modal HTML for Block 7 -->
<div id="block7Modal" class="modal">
  <div class="modal-content-map">
    <span>Block 7 Plots</span> <span class="close" onclick="closeModal('block7Modal')">&times;</span>
    <div class="modal-center">
      <b class="">2.00 M. WIDE PATHWALK</b>
    <div class="plots_con b7 rotator">
      <div class="d0"></div>
      <div class="d0"></div>
      <div class="plot plot-7-1" onclick="showPlotDetails(7, '1')">1</div>
<div class="plot plot-7-2" onclick="showPlotDetails(7, '2')">2</div>
<div class="plot plot-7-3" onclick="showPlotDetails(7, '3')">3</div>
<div class="plot plot-7-4" onclick="showPlotDetails(7, '4')">4</div>
<div class="plot plot-7-5" onclick="showPlotDetails(7, '5')">5</div>
<div class="plot plot-7-6" onclick="showPlotDetails(7, '6')">6</div>
<div class="plot plot-7-7" onclick="showPlotDetails(7, '7')">7</div>
<div class="plot plot-7-8" onclick="showPlotDetails(7, '8')">8</div>
<div class="plot plot-7-9" onclick="showPlotDetails(7, '9')">9</div>
<div class="plot plot-7-10" onclick="showPlotDetails(7, '10')">10</div>
<div class="plot plot-7-11" onclick="showPlotDetails(7, '11')">11</div>
<div class="plot plot-7-12" onclick="showPlotDetails(7, '12')">12</div>
<div class="plot plot-7-13" onclick="showPlotDetails(7, '13')">13</div>
<div class="plot plot-7-14" onclick="showPlotDetails(7, '14')">14</div>
<div class="plot plot-7-15" onclick="showPlotDetails(7, '15')">15</div>
<div class="plot plot-7-16" onclick="showPlotDetails(7, '16')">16</div>
<div class="plot plot-7-17" onclick="showPlotDetails(7, '17')">17</div>
<div class="plot plot-7-18" onclick="showPlotDetails(7, '18')">18</div>
<div class="plot plot-7-19" onclick="showPlotDetails(7, '19')">19</div>
<div class="plot plot-7-20" onclick="showPlotDetails(7, '20')">20</div>
<div class="plot plot-7-21" onclick="showPlotDetails(7, '21')">21</div>
<div class="plot plot-7-22" onclick="showPlotDetails(7, '22')">22</div>
<div class="plot plot-7-23" onclick="showPlotDetails(7, '23')">23</div>
<div class="plot plot-7-24" onclick="showPlotDetails(7, '24')">24</div>
<div class="plot plot-7-25" onclick="showPlotDetails(7, '25')">25</div>
<div class="plot plot-7-26" onclick="showPlotDetails(7, '26')">26</div>
<div class="plot plot-7-27" onclick="showPlotDetails(7, '27')">27</div>
<div class="plot plot-7-28" onclick="showPlotDetails(7, '28')">28</div>
<div class="plot plot-7-29" onclick="showPlotDetails(7, '29')">29</div>
<div class="plot plot-7-30" onclick="showPlotDetails(7, '30')">30</div>
<div class="plot plot-7-31" onclick="showPlotDetails(7, '31')">31</div>
<div class="plot plot-7-32" onclick="showPlotDetails(7, '32')">32</div>
<div class="plot plot-7-33" onclick="showPlotDetails(7, '33')">33</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-7-34" onclick="showPlotDetails(7, '34')">34</div>
<div class="plot plot-7-35" onclick="showPlotDetails(7, '35')">35</div>
<div class="plot plot-7-36" onclick="showPlotDetails(7, '36')">36</div>
<div class="plot plot-7-37" onclick="showPlotDetails(7, '37')">37</div>
<div class="plot plot-7-38" onclick="showPlotDetails(7, '38')">38</div>
<div class="plot plot-7-39" onclick="showPlotDetails(7, '39')">39</div>
<div class="plot plot-7-40" onclick="showPlotDetails(7, '40')">40</div>
<div class="plot plot-7-41" onclick="showPlotDetails(7, '41')">41</div>
<div class="plot plot-7-42" onclick="showPlotDetails(7, '42')">42</div>
<div class="plot plot-7-43" onclick="showPlotDetails(7, '43')">43</div>
<div class="plot plot-7-44" onclick="showPlotDetails(7, '44')">44</div>
<div class="plot plot-7-45" onclick="showPlotDetails(7, '45')">45</div>
<div class="plot plot-7-46" onclick="showPlotDetails(7, '46')">46</div>
<div class="plot plot-7-47" onclick="showPlotDetails(7, '47')">47</div>
<div class="plot plot-7-48" onclick="showPlotDetails(7, '48')">48</div>
<div class="plot plot-7-49" onclick="showPlotDetails(7, '49')">49</div>
<div class="plot plot-7-50" onclick="showPlotDetails(7, '50')">50</div>
<div class="plot plot-7-51" onclick="showPlotDetails(7, '51')">51</div>
<div class="plot plot-7-52" onclick="showPlotDetails(7, '52')">52</div>
<div class="plot plot-7-53" onclick="showPlotDetails(7, '53')">53</div>
<div class="plot plot-7-54" onclick="showPlotDetails(7, '54')">54</div>
<div class="plot plot-7-55" onclick="showPlotDetails(7, '55')">55</div>
<div class="plot plot-7-56" onclick="showPlotDetails(7, '56')">56</div>
<div class="plot plot-7-57" onclick="showPlotDetails(7, '57')">57</div>
<div class="plot plot-7-58" onclick="showPlotDetails(7, '58')">58</div>
<div class="plot plot-7-59" onclick="showPlotDetails(7, '59')">59</div>
<div class="plot plot-7-60" onclick="showPlotDetails(7, '60')">60</div>
<div class="plot plot-7-61" onclick="showPlotDetails(7, '61')">61</div>
<div class="plot plot-7-62" onclick="showPlotDetails(7, '62')">62</div>
<div class="plot plot-7-63" onclick="showPlotDetails(7, '63')">63</div>
<div class="plot plot-7-64" onclick="showPlotDetails(7, '64')">64</div>
<div class="plot plot-7-65" onclick="showPlotDetails(7, '65')">65</div>
<div class="plot plot-7-66" onclick="showPlotDetails(7, '66')">66</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-7-67" onclick="showPlotDetails(7, '67')">67</div>
<div class="plot plot-7-68" onclick="showPlotDetails(7, '68')">68</div>
<div class="plot plot-7-69" onclick="showPlotDetails(7, '69')">69</div>
<div class="plot plot-7-70" onclick="showPlotDetails(7, '70')">70</div>
<div class="plot plot-7-71" onclick="showPlotDetails(7, '71')">71</div>
<div class="plot plot-7-72" onclick="showPlotDetails(7, '72')">72</div>
<div class="plot plot-7-73" onclick="showPlotDetails(7, '73')">73</div>
<div class="plot plot-7-74" onclick="showPlotDetails(7, '74')">74</div>
<div class="plot plot-7-75" onclick="showPlotDetails(7, '75')">75</div>
<div class="plot plot-7-76" onclick="showPlotDetails(7, '76')">76</div>
<div class="plot plot-7-77" onclick="showPlotDetails(7, '77')">77</div>
<div class="plot plot-7-78" onclick="showPlotDetails(7, '78')">78</div>
<div class="plot plot-7-79" onclick="showPlotDetails(7, '79')">79</div>
<div class="plot plot-7-80" onclick="showPlotDetails(7, '80')">80</div>
<div class="plot plot-7-81" onclick="showPlotDetails(7, '81')">81</div>
<div class="plot plot-7-82" onclick="showPlotDetails(7, '82')">82</div>
<div class="plot plot-7-83" onclick="showPlotDetails(7, '83')">83</div>
<div class="plot plot-7-84" onclick="showPlotDetails(7, '84')">84</div>
<div class="plot plot-7-85" onclick="showPlotDetails(7, '85')">85</div>
<div class="plot plot-7-86" onclick="showPlotDetails(7, '86')">86</div>
<div class="plot plot-7-87" onclick="showPlotDetails(7, '87')">87</div>
<div class="plot plot-7-88" onclick="showPlotDetails(7, '88')">88</div>
<div class="plot plot-7-89" onclick="showPlotDetails(7, '89')">89</div>
<div class="plot plot-7-90" onclick="showPlotDetails(7, '90')">90</div>
<div class="plot plot-7-91" onclick="showPlotDetails(7, '91')">91</div>
<div class="plot plot-7-92" onclick="showPlotDetails(7, '92')">92</div>
<div class="plot plot-7-93" onclick="showPlotDetails(7, '93')">93</div>
<div class="plot plot-7-94" onclick="showPlotDetails(7, '94')">94</div>
<div class="plot plot-7-95" onclick="showPlotDetails(7, '95')">95</div>
<div class="plot plot-7-96" onclick="showPlotDetails(7, '96')">96</div>
<div class="plot plot-7-97" onclick="showPlotDetails(7, '97')">97</div>
<div class="plot plot-7-98" onclick="showPlotDetails(7, '98')">98</div>
<div class="plot plot-7-99" onclick="showPlotDetails(7, '99')">99</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-7-100" onclick="showPlotDetails(7, '100')">100</div>
<div class="plot plot-7-101" onclick="showPlotDetails(7, '101')">101</div>
<div class="plot plot-7-102" onclick="showPlotDetails(7, '102')">102</div>
<div class="plot plot-7-103" onclick="showPlotDetails(7, '103')">103</div>
<div class="plot plot-7-104" onclick="showPlotDetails(7, '104')">104</div>
<div class="plot plot-7-105" onclick="showPlotDetails(7, '105')">105</div>
<div class="plot plot-7-106" onclick="showPlotDetails(7, '106')">106</div>
<div class="plot plot-7-107" onclick="showPlotDetails(7, '107')">107</div>
<div class="plot plot-7-108" onclick="showPlotDetails(7, '108')">108</div>
<div class="plot plot-7-109" onclick="showPlotDetails(7, '109')">109</div>
<div class="plot plot-7-110" onclick="showPlotDetails(7, '110')">110</div>
<div class="plot plot-7-111" onclick="showPlotDetails(7, '111')">111</div>
<div class="plot plot-7-112" onclick="showPlotDetails(7, '112')">112</div>
<div class="plot plot-7-113" onclick="showPlotDetails(7, '113')">113</div>
<div class="plot plot-7-114" onclick="showPlotDetails(7, '114')">114</div>
<div class="plot plot-7-115" onclick="showPlotDetails(7, '115')">115</div>
<div class="plot plot-7-116" onclick="showPlotDetails(7, '116')">116</div>
<div class="plot plot-7-117" onclick="showPlotDetails(7, '117')">117</div>
<div class="plot plot-7-118" onclick="showPlotDetails(7, '118')">118</div>
<div class="plot plot-7-119" onclick="showPlotDetails(7, '119')">119</div>
<div class="plot plot-7-120" onclick="showPlotDetails(7, '120')">120</div>
<div class="plot plot-7-121" onclick="showPlotDetails(7, '121')">121</div>
<div class="plot plot-7-122" onclick="showPlotDetails(7, '122')">122</div>
<div class="plot plot-7-123" onclick="showPlotDetails(7, '123')">123</div>
<div class="plot plot-7-124" onclick="showPlotDetails(7, '124')">124</div>
<div class="plot plot-7-125" onclick="showPlotDetails(7, '125')">125</div>
<div class="plot plot-7-126" onclick="showPlotDetails(7, '126')">126</div>
<div class="plot plot-7-127" onclick="showPlotDetails(7, '127')">127</div>
<div class="plot plot-7-128" onclick="showPlotDetails(7, '128')">128</div>
<div class="plot plot-7-129" onclick="showPlotDetails(7, '129')">129</div>
<div class="plot plot-7-130" onclick="showPlotDetails(7, '130')">130</div>
<div class="plot plot-7-131" onclick="showPlotDetails(7, '131')">131</div>
<div class="plot plot-7-132" onclick="showPlotDetails(7, '132')">132</div>
<div class="d0"></div>
<div class="plot plot-7-133" onclick="showPlotDetails(7, '133')">133</div>
<div class="plot plot-7-134" onclick="showPlotDetails(7, '134')">134</div>
<div class="plot plot-7-135" onclick="showPlotDetails(7, '135')">135</div>
<div class="plot plot-7-136" onclick="showPlotDetails(7, '136')">136</div>
<div class="plot plot-7-137" onclick="showPlotDetails(7, '137')">137</div>
<div class="plot plot-7-138" onclick="showPlotDetails(7, '138')">138</div>
<div class="plot plot-7-139" onclick="showPlotDetails(7, '139')">139</div>
<div class="plot plot-7-140" onclick="showPlotDetails(7, '140')">140</div>
<div class="plot plot-7-141" onclick="showPlotDetails(7, '141')">141</div>
<div class="plot plot-7-142" onclick="showPlotDetails(7, '142')">142</div>
<div class="plot plot-7-143" onclick="showPlotDetails(7, '143')">143</div>
<div class="plot plot-7-144" onclick="showPlotDetails(7, '144')">144</div>
<div class="plot plot-7-145" onclick="showPlotDetails(7, '145')">145</div>
<div class="plot plot-7-146" onclick="showPlotDetails(7, '146')">146</div>
<div class="plot plot-7-147" onclick="showPlotDetails(7, '147')">147</div>
<div class="plot plot-7-148" onclick="showPlotDetails(7, '148')">148</div>
<div class="plot plot-7-149" onclick="showPlotDetails(7, '149')">149</div>
<div class="plot plot-7-150" onclick="showPlotDetails(7, '150')">150</div>
<div class="plot plot-7-151" onclick="showPlotDetails(7, '151')">151</div>
<div class="plot plot-7-152" onclick="showPlotDetails(7, '152')">152</div>
<div class="plot plot-7-153" onclick="showPlotDetails(7, '153')">153</div>
<div class="plot plot-7-154" onclick="showPlotDetails(7, '154')">154</div>
<div class="plot plot-7-155" onclick="showPlotDetails(7, '155')">155</div>
<div class="plot plot-7-156" onclick="showPlotDetails(7, '156')">156</div>
<div class="plot plot-7-157" onclick="showPlotDetails(7, '157')">157</div>
<div class="plot plot-7-158" onclick="showPlotDetails(7, '158')">158</div>
<div class="plot plot-7-159" onclick="showPlotDetails(7, '159')">159</div>
<div class="plot plot-7-160" onclick="showPlotDetails(7, '160')">160</div>
<div class="plot plot-7-161" onclick="showPlotDetails(7, '161')">161</div>
<div class="plot plot-7-162" onclick="showPlotDetails(7, '162')">162</div>
<div class="plot plot-7-163" onclick="showPlotDetails(7, '163')">163</div>
<div class="plot plot-7-164" onclick="showPlotDetails(7, '164')">164</div>
<div class="plot plot-7-165" onclick="showPlotDetails(7, '165')">165</div>
<div class="plot plot-7-166" onclick="showPlotDetails(7, '166')">166</div>
<div class="d0"></div>
<div class="plot plot-7-167" onclick="showPlotDetails(7, '167')">167</div>
<div class="plot plot-7-168" onclick="showPlotDetails(7, '168')">168</div>
<div class="plot plot-7-169" onclick="showPlotDetails(7, '169')">169</div>
<div class="plot plot-7-170" onclick="showPlotDetails(7, '170')">170</div>
<div class="plot plot-7-171" onclick="showPlotDetails(7, '171')">171</div>
<div class="plot plot-7-172" onclick="showPlotDetails(7, '172')">172</div>
<div class="plot plot-7-173" onclick="showPlotDetails(7, '173')">173</div>
<div class="plot plot-7-174" onclick="showPlotDetails(7, '174')">174</div>
<div class="plot plot-7-175" onclick="showPlotDetails(7, '175')">175</div>
<div class="plot plot-7-176" onclick="showPlotDetails(7, '176')">176</div>
<div class="plot plot-7-177" onclick="showPlotDetails(7, '177')">177</div>
<div class="plot plot-7-178" onclick="showPlotDetails(7, '178')">178</div>
<div class="plot plot-7-179" onclick="showPlotDetails(7, '179')">179</div>
<div class="plot plot-7-180" onclick="showPlotDetails(7, '180')">180</div>
<div class="plot plot-7-181" onclick="showPlotDetails(7, '181')">181</div>
<div class="plot plot-7-182" onclick="showPlotDetails(7, '182')">182</div>
<div class="plot plot-7-183" onclick="showPlotDetails(7, '183')">183</div>
<div class="plot plot-7-184" onclick="showPlotDetails(7, '184')">184</div>
<div class="plot plot-7-185" onclick="showPlotDetails(7, '185')">185</div>
<div class="plot plot-7-186" onclick="showPlotDetails(7, '186')">186</div>
<div class="plot plot-7-187" onclick="showPlotDetails(7, '187')">187</div>
<div class="plot plot-7-188" onclick="showPlotDetails(7, '188')">188</div>
<div class="plot plot-7-189" onclick="showPlotDetails(7, '189')">189</div>
<div class="plot plot-7-190" onclick="showPlotDetails(7, '190')">190</div>
<div class="plot plot-7-191" onclick="showPlotDetails(7, '191')">191</div>
<div class="plot plot-7-192" onclick="showPlotDetails(7, '192')">192</div>
<div class="plot plot-7-193" onclick="showPlotDetails(7, '193')">193</div>
<div class="plot plot-7-194" onclick="showPlotDetails(7, '194')">194</div>
<div class="plot plot-7-195" onclick="showPlotDetails(7, '195')">195</div>
<div class="plot plot-7-196" onclick="showPlotDetails(7, '196')">196</div>
<div class="plot plot-7-197" onclick="showPlotDetails(7, '197')">197</div>
<div class="plot plot-7-198" onclick="showPlotDetails(7, '198')">198</div>
<div class="plot plot-7-199" onclick="showPlotDetails(7, '199')">199</div>
<div class="plot plot-7-200" onclick="showPlotDetails(7, '200')">200</div>
<div class="d0"></div>
<div class="plot plot-7-201" onclick="showPlotDetails(7, '201')">201</div>
<div class="plot plot-7-202" onclick="showPlotDetails(7, '202')">202</div>
<div class="plot plot-7-203" onclick="showPlotDetails(7, '203')">203</div>
<div class="plot plot-7-204" onclick="showPlotDetails(7, '204')">204</div>
<div class="plot plot-7-205" onclick="showPlotDetails(7, '205')">205</div>
<div class="plot plot-7-206" onclick="showPlotDetails(7, '206')">206</div>
<div class="plot plot-7-207" onclick="showPlotDetails(7, '207')">207</div>
<div class="plot plot-7-208" onclick="showPlotDetails(7, '208')">208</div>
<div class="plot plot-7-209" onclick="showPlotDetails(7, '209')">209</div>
<div class="plot plot-7-210" onclick="showPlotDetails(7, '210')">210</div>
<div class="plot plot-7-211" onclick="showPlotDetails(7, '211')">211</div>
<div class="plot plot-7-212" onclick="showPlotDetails(7, '212')">212</div>
<div class="plot plot-7-213" onclick="showPlotDetails(7, '213')">213</div>
<div class="plot plot-7-214" onclick="showPlotDetails(7, '214')">214</div>
<div class="plot plot-7-215" onclick="showPlotDetails(7, '215')">215</div>
<div class="plot plot-7-216" onclick="showPlotDetails(7, '216')">216</div>
<div class="plot plot-7-217" onclick="showPlotDetails(7, '217')">217</div>
<div class="plot plot-7-218" onclick="showPlotDetails(7, '218')">218</div>
<div class="plot plot-7-219" onclick="showPlotDetails(7, '219')">219</div>
<div class="plot plot-7-220" onclick="showPlotDetails(7, '220')">220</div>
<div class="plot plot-7-221" onclick="showPlotDetails(7, '221')">221</div>
<div class="plot plot-7-222" onclick="showPlotDetails(7, '222')">222</div>
<div class="plot plot-7-223" onclick="showPlotDetails(7, '223')">223</div>
<div class="plot plot-7-224" onclick="showPlotDetails(7, '224')">224</div>
<div class="plot plot-7-225" onclick="showPlotDetails(7, '225')">225</div>
<div class="plot plot-7-226" onclick="showPlotDetails(7, '226')">226</div>
<div class="plot plot-7-227" onclick="showPlotDetails(7, '227')">227</div>
<div class="plot plot-7-228" onclick="showPlotDetails(7, '228')">228</div>
<div class="plot plot-7-229" onclick="showPlotDetails(7, '229')">229</div>
<div class="plot plot-7-230" onclick="showPlotDetails(7, '230')">230</div>
<div class="plot plot-7-231" onclick="showPlotDetails(7, '231')">231</div>
<div class="plot plot-7-232" onclick="showPlotDetails(7, '232')">232</div>
<div class="plot plot-7-233" onclick="showPlotDetails(7, '233')">233</div>
<div class="plot plot-7-234" onclick="showPlotDetails(7, '234')">234</div>
<div class="d0"></div>
<div class="plot plot-7-235" onclick="showPlotDetails(7, '235')">235</div>
<div class="plot plot-7-236" onclick="showPlotDetails(7, '236')">236</div>
<div class="plot plot-7-237" onclick="showPlotDetails(7, '237')">237</div>
<div class="plot plot-7-238" onclick="showPlotDetails(7, '238')">238</div>
<div class="plot plot-7-239" onclick="showPlotDetails(7, '239')">239</div>
<div class="plot plot-7-240" onclick="showPlotDetails(7, '240')">240</div>
<div class="plot plot-7-241" onclick="showPlotDetails(7, '241')">241</div>
<div class="plot plot-7-242" onclick="showPlotDetails(7, '242')">242</div>
<div class="plot plot-7-243" onclick="showPlotDetails(7, '243')">243</div>
<div class="plot plot-7-244" onclick="showPlotDetails(7, '244')">244</div>
<div class="plot plot-7-245" onclick="showPlotDetails(7, '245')">245</div>
<div class="plot plot-7-246" onclick="showPlotDetails(7, '246')">246</div>
<div class="plot plot-7-247" onclick="showPlotDetails(7, '247')">247</div>
<div class="plot plot-7-248" onclick="showPlotDetails(7, '248')">248</div>
<div class="plot plot-7-249" onclick="showPlotDetails(7, '249')">249</div>
<div class="plot plot-7-250" onclick="showPlotDetails(7, '250')">250</div>
<div class="plot plot-7-251" onclick="showPlotDetails(7, '251')">251</div>
<div class="plot plot-7-252" onclick="showPlotDetails(7, '252')">252</div>
<div class="plot plot-7-253" onclick="showPlotDetails(7, '253')">253</div>
<div class="plot plot-7-254" onclick="showPlotDetails(7, '254')">254</div>
<div class="plot plot-7-255" onclick="showPlotDetails(7, '255')">255</div>
<div class="plot plot-7-256" onclick="showPlotDetails(7, '256')">256</div>
<div class="plot plot-7-257" onclick="showPlotDetails(7, '257')">257</div>
<div class="plot plot-7-258" onclick="showPlotDetails(7, '258')">258</div>
<div class="plot plot-7-259" onclick="showPlotDetails(7, '259')">259</div>
<div class="plot plot-7-260" onclick="showPlotDetails(7, '260')">260</div>
<div class="plot plot-7-261" onclick="showPlotDetails(7, '261')">261</div>
<div class="plot plot-7-262" onclick="showPlotDetails(7, '262')">262</div>
<div class="plot plot-7-263" onclick="showPlotDetails(7, '263')">263</div>
<div class="plot plot-7-264" onclick="showPlotDetails(7, '264')">264</div>
<div class="plot plot-7-265" onclick="showPlotDetails(7, '265')">265</div>
<div class="plot plot-7-266" onclick="showPlotDetails(7, '266')">266</div>
<div class="plot plot-7-267" onclick="showPlotDetails(7, '267')">267</div>
<div class="plot plot-7-268" onclick="showPlotDetails(7, '268')">268</div>
<div class="d0"></div>
<div class="plot plot-7-269" onclick="showPlotDetails(7, '269')">269</div>
<div class="plot plot-7-270" onclick="showPlotDetails(7, '270')">270</div>
<div class="plot plot-7-271" onclick="showPlotDetails(7, '271')">271</div>
<div class="plot plot-7-272" onclick="showPlotDetails(7, '272')">272</div>
<div class="plot plot-7-273" onclick="showPlotDetails(7, '273')">273</div>
<div class="plot plot-7-274" onclick="showPlotDetails(7, '274')">274</div>
<div class="plot plot-7-275" onclick="showPlotDetails(7, '275')">275</div>
<div class="plot plot-7-276" onclick="showPlotDetails(7, '276')">276</div>
<div class="plot plot-7-277" onclick="showPlotDetails(7, '277')">277</div>
<div class="plot plot-7-278" onclick="showPlotDetails(7, '278')">278</div>
<div class="plot plot-7-279" onclick="showPlotDetails(7, '279')">279</div>
<div class="plot plot-7-280" onclick="showPlotDetails(7, '280')">280</div>
<div class="plot plot-7-281" onclick="showPlotDetails(7, '281')">281</div>
<div class="plot plot-7-282" onclick="showPlotDetails(7, '282')">282</div>
<div class="plot plot-7-283" onclick="showPlotDetails(7, '283')">283</div>
<div class="plot plot-7-284" onclick="showPlotDetails(7, '284')">284</div>
<div class="plot plot-7-285" onclick="showPlotDetails(7, '285')">285</div>
<div class="plot plot-7-286" onclick="showPlotDetails(7, '286')">286</div>
<div class="plot plot-7-287" onclick="showPlotDetails(7, '287')">287</div>
<div class="plot plot-7-288" onclick="showPlotDetails(7, '288')">288</div>
<div class="plot plot-7-289" onclick="showPlotDetails(7, '289')">289</div>
<div class="plot plot-7-290" onclick="showPlotDetails(7, '290')">290</div>
<div class="plot plot-7-291" onclick="showPlotDetails(7, '291')">291</div>
<div class="plot plot-7-292" onclick="showPlotDetails(7, '292')">292</div>
<div class="plot plot-7-293" onclick="showPlotDetails(7, '293')">293</div>
<div class="plot plot-7-294" onclick="showPlotDetails(7, '294')">294</div>
<div class="plot plot-7-295" onclick="showPlotDetails(7, '295')">295</div>
<div class="plot plot-7-296" onclick="showPlotDetails(7, '296')">296</div>
<div class="plot plot-7-297" onclick="showPlotDetails(7, '297')">297</div>
<div class="plot plot-7-298" onclick="showPlotDetails(7, '298')">298</div>
<div class="plot plot-7-299" onclick="showPlotDetails(7, '299')">299</div>
<div class="plot plot-7-300" onclick="showPlotDetails(7, '300')">300</div>
<div class="plot plot-7-301" onclick="showPlotDetails(7, '301')">301</div>
<div class="plot plot-7-302" onclick="showPlotDetails(7, '302')">302</div>
<div class="d0"></div>
<div class="plot plot-7-303" onclick="showPlotDetails(7, '303')">303</div>
<div class="plot plot-7-304" onclick="showPlotDetails(7, '304')">304</div>
<div class="plot plot-7-305" onclick="showPlotDetails(7, '305')">305</div>
<div class="plot plot-7-306" onclick="showPlotDetails(7, '306')">306</div>
<div class="plot plot-7-307" onclick="showPlotDetails(7, '307')">307</div>
<div class="plot plot-7-308" onclick="showPlotDetails(7, '308')">308</div>
<div class="plot plot-7-309" onclick="showPlotDetails(7, '309')">309</div>
<div class="plot plot-7-310" onclick="showPlotDetails(7, '310')">310</div>
<div class="plot plot-7-311" onclick="showPlotDetails(7, '311')">311</div>
<div class="plot plot-7-312" onclick="showPlotDetails(7, '312')">312</div>
<div class="plot plot-7-313" onclick="showPlotDetails(7, '313')">313</div>
<div class="plot plot-7-314" onclick="showPlotDetails(7, '314')">314</div>
<div class="plot plot-7-315" onclick="showPlotDetails(7, '315')">315</div>
<div class="plot plot-7-316" onclick="showPlotDetails(7, '316')">316</div>
<div class="plot plot-7-317" onclick="showPlotDetails(7, '317')">317</div>
<div class="plot plot-7-318" onclick="showPlotDetails(7, '318')">318</div>
<div class="plot plot-7-319" onclick="showPlotDetails(7, '319')">319</div>
<div class="plot plot-7-320" onclick="showPlotDetails(7, '320')">320</div>
<div class="plot plot-7-321" onclick="showPlotDetails(7, '321')">321</div>
<div class="plot plot-7-322" onclick="showPlotDetails(7, '322')">322</div>
<div class="plot plot-7-323" onclick="showPlotDetails(7, '323')">323</div>
<div class="plot plot-7-324" onclick="showPlotDetails(7, '324')">324</div>
<div class="plot plot-7-325" onclick="showPlotDetails(7, '325')">325</div>
<div class="plot plot-7-326" onclick="showPlotDetails(7, '326')">326</div>
<div class="plot plot-7-327" onclick="showPlotDetails(7, '327')">327</div>
<div class="plot plot-7-328" onclick="showPlotDetails(7, '328')">328</div>
<div class="plot plot-7-329" onclick="showPlotDetails(7, '329')">329</div>
<div class="plot plot-7-330" onclick="showPlotDetails(7, '330')">330</div>
<div class="plot plot-7-331" onclick="showPlotDetails(7, '331')">331</div>
<div class="plot plot-7-332" onclick="showPlotDetails(7, '332')">332</div>
<div class="plot plot-7-333" onclick="showPlotDetails(7, '333')">333</div>
<div class="plot plot-7-334" onclick="showPlotDetails(7, '334')">334</div>
<div class="plot plot-7-335" onclick="showPlotDetails(7, '335')">335</div>
<div class="plot plot-7-336" onclick="showPlotDetails(7, '336')">336</div>
<div class="d0"></div>
<div class="plot plot-7-337" onclick="showPlotDetails(7, '337')">337</div>
<div class="plot plot-7-338" onclick="showPlotDetails(7, '338')">338</div>
<div class="plot plot-7-339" onclick="showPlotDetails(7, '339')">339</div>
<div class="plot plot-7-340" onclick="showPlotDetails(7, '340')">340</div>
<div class="plot plot-7-341" onclick="showPlotDetails(7, '341')">341</div>
<div class="plot plot-7-342" onclick="showPlotDetails(7, '342')">342</div>
<div class="plot plot-7-343" onclick="showPlotDetails(7, '343')">343</div>
<div class="plot plot-7-344" onclick="showPlotDetails(7, '344')">344</div>
<div class="plot plot-7-345" onclick="showPlotDetails(7, '345')">345</div>
<div class="plot plot-7-346" onclick="showPlotDetails(7, '346')">346</div>
<div class="plot plot-7-347" onclick="showPlotDetails(7, '347')">347</div>
<div class="plot plot-7-348" onclick="showPlotDetails(7, '348')">348</div>
<div class="plot plot-7-349" onclick="showPlotDetails(7, '349')">349</div>
<div class="plot plot-7-350" onclick="showPlotDetails(7, '350')">350</div>
<div class="plot plot-7-351" onclick="showPlotDetails(7, '351')">351</div>
<div class="plot plot-7-352" onclick="showPlotDetails(7, '352')">352</div>
<div class="plot plot-7-353" onclick="showPlotDetails(7, '353')">353</div>
<div class="plot plot-7-354" onclick="showPlotDetails(7, '354')">354</div>
<div class="plot plot-7-355" onclick="showPlotDetails(7, '355')">355</div>
<div class="plot plot-7-356" onclick="showPlotDetails(7, '356')">356</div>
<div class="plot plot-7-357" onclick="showPlotDetails(7, '357')">357</div>
<div class="plot plot-7-358" onclick="showPlotDetails(7, '358')">358</div>
<div class="plot plot-7-359" onclick="showPlotDetails(7, '359')">359</div>
<div class="plot plot-7-360" onclick="showPlotDetails(7, '360')">360</div>
<div class="plot plot-7-361" onclick="showPlotDetails(7, '361')">361</div>
<div class="plot plot-7-362" onclick="showPlotDetails(7, '362')">362</div>
<div class="plot plot-7-363" onclick="showPlotDetails(7, '363')">363</div>
<div class="plot plot-7-364" onclick="showPlotDetails(7, '364')">364</div>
<div class="plot plot-7-365" onclick="showPlotDetails(7, '365')">365</div>
<div class="plot plot-7-366" onclick="showPlotDetails(7, '366')">366</div>
<div class="plot plot-7-367" onclick="showPlotDetails(7, '367')">367</div>
<div class="plot plot-7-368" onclick="showPlotDetails(7, '368')">368</div>
<div class="plot plot-7-369" onclick="showPlotDetails(7, '369')">369</div>
<div class="plot plot-7-370" onclick="showPlotDetails(7, '370')">370</div>
<div class="d0"></div>
<div class="plot plot-7-371" onclick="showPlotDetails(7, '371')">371</div>
<div class="plot plot-7-372" onclick="showPlotDetails(7, '372')">372</div>
<div class="plot plot-7-373" onclick="showPlotDetails(7, '373')">373</div>
<div class="plot plot-7-374" onclick="showPlotDetails(7, '374')">374</div>
<div class="plot plot-7-375" onclick="showPlotDetails(7, '375')">375</div>
<div class="plot plot-7-376" onclick="showPlotDetails(7, '376')">376</div>
<div class="plot plot-7-377" onclick="showPlotDetails(7, '377')">377</div>
<div class="plot plot-7-378" onclick="showPlotDetails(7, '378')">378</div>
<div class="plot plot-7-379" onclick="showPlotDetails(7, '379')">379</div>
<div class="plot plot-7-380" onclick="showPlotDetails(7, '380')">380</div>
<div class="plot plot-7-381" onclick="showPlotDetails(7, '381')">381</div>
<div class="plot plot-7-382" onclick="showPlotDetails(7, '382')">382</div>
<div class="plot plot-7-383" onclick="showPlotDetails(7, '383')">383</div>
<div class="plot plot-7-384" onclick="showPlotDetails(7, '384')">384</div>
<div class="plot plot-7-385" onclick="showPlotDetails(7, '385')">385</div>
<div class="plot plot-7-386" onclick="showPlotDetails(7, '386')">386</div>
<div class="plot plot-7-387" onclick="showPlotDetails(7, '387')">387</div>
<div class="plot plot-7-388" onclick="showPlotDetails(7, '388')">388</div>
<div class="plot plot-7-389" onclick="showPlotDetails(7, '389')">389</div>
<div class="plot plot-7-390" onclick="showPlotDetails(7, '390')">390</div>
<div class="plot plot-7-391" onclick="showPlotDetails(7, '391')">391</div>
<div class="plot plot-7-392" onclick="showPlotDetails(7, '392')">392</div>
<div class="plot plot-7-393" onclick="showPlotDetails(7, '393')">393</div>
<div class="plot plot-7-394" onclick="showPlotDetails(7, '394')">394</div>
<div class="plot plot-7-395" onclick="showPlotDetails(7, '395')">395</div>
<div class="plot plot-7-396" onclick="showPlotDetails(7, '396')">396</div>
<div class="plot plot-7-397" onclick="showPlotDetails(7, '397')">397</div>
<div class="plot plot-7-398" onclick="showPlotDetails(7, '398')">398</div>
<div class="plot plot-7-399" onclick="showPlotDetails(7, '399')">399</div>
<div class="plot plot-7-400" onclick="showPlotDetails(7, '400')">400</div>
<div class="plot plot-7-401" onclick="showPlotDetails(7, '401')">401</div>
<div class="plot plot-7-402" onclick="showPlotDetails(7, '402')">402</div>
<div class="plot plot-7-403" onclick="showPlotDetails(7, '403')">403</div>
<div class="plot plot-7-404" onclick="showPlotDetails(7, '404')">404</div>
<div class="d0"></div>
<div class="plot plot-7-405" onclick="showPlotDetails(7, '405')">405</div>
<div class="plot plot-7-406" onclick="showPlotDetails(7, '406')">406</div>
<div class="plot plot-7-407" onclick="showPlotDetails(7, '407')">407</div>
<div class="plot plot-7-408" onclick="showPlotDetails(7, '408')">408</div>
<div class="plot plot-7-409" onclick="showPlotDetails(7, '409')">409</div>
<div class="plot plot-7-410" onclick="showPlotDetails(7, '410')">410</div>
<div class="plot plot-7-411" onclick="showPlotDetails(7, '411')">411</div>
<div class="plot plot-7-412" onclick="showPlotDetails(7, '412')">412</div>
<div class="plot plot-7-413" onclick="showPlotDetails(7, '413')">413</div>
<div class="plot plot-7-414" onclick="showPlotDetails(7, '414')">414</div>
<div class="plot plot-7-415" onclick="showPlotDetails(7, '415')">415</div>
<div class="plot plot-7-416" onclick="showPlotDetails(7, '416')">416</div>
<div class="plot plot-7-417" onclick="showPlotDetails(7, '417')">417</div>
<div class="plot plot-7-418" onclick="showPlotDetails(7, '418')">418</div>
<div class="plot plot-7-419" onclick="showPlotDetails(7, '419')">419</div>
<div class="plot plot-7-420" onclick="showPlotDetails(7, '420')">420</div>
<div class="plot plot-7-421" onclick="showPlotDetails(7, '421')">421</div>
<div class="plot plot-7-422" onclick="showPlotDetails(7, '422')">422</div>
<div class="plot plot-7-423" onclick="showPlotDetails(7, '423')">423</div>
<div class="plot plot-7-424" onclick="showPlotDetails(7, '424')">424</div>
<div class="plot plot-7-425" onclick="showPlotDetails(7, '425')">425</div>
<div class="plot plot-7-426" onclick="showPlotDetails(7, '426')">426</div>
<div class="plot plot-7-427" onclick="showPlotDetails(7, '427')">427</div>
<div class="plot plot-7-428" onclick="showPlotDetails(7, '428')">428</div>
<div class="plot plot-7-429" onclick="showPlotDetails(7, '429')">429</div>
<div class="plot plot-7-430" onclick="showPlotDetails(7, '430')">430</div>
<div class="plot plot-7-431" onclick="showPlotDetails(7, '431')">431</div>
<div class="plot plot-7-432" onclick="showPlotDetails(7, '432')">432</div>
<div class="plot plot-7-433" onclick="showPlotDetails(7, '433')">433</div>
<div class="plot plot-7-434" onclick="showPlotDetails(7, '434')">434</div>
<div class="plot plot-7-435" onclick="showPlotDetails(7, '435')">435</div>
<div class="plot plot-7-436" onclick="showPlotDetails(7, '436')">436</div>
<div class="plot plot-7-437" onclick="showPlotDetails(7, '437')">437</div>
<div class="plot plot-7-438" onclick="showPlotDetails(7, '438')">438</div>

<div class="plot plot-7-439" onclick="showPlotDetails(7, '439')">439</div>
<div class="plot plot-7-440" onclick="showPlotDetails(7, '440')">440</div>
<div class="plot plot-7-441" onclick="showPlotDetails(7, '441')">441</div>
<div class="plot plot-7-442" onclick="showPlotDetails(7, '442')">442</div>
<div class="plot plot-7-443" onclick="showPlotDetails(7, '443')">443</div>
<div class="plot plot-7-444" onclick="showPlotDetails(7, '444')">444</div>
<div class="plot plot-7-445" onclick="showPlotDetails(7, '445')">445</div>
<div class="plot plot-7-446" onclick="showPlotDetails(7, '446')">446</div>
<div class="plot plot-7-447" onclick="showPlotDetails(7, '447')">447</div>
<div class="plot plot-7-448" onclick="showPlotDetails(7, '448')">448</div>
<div class="plot plot-7-449" onclick="showPlotDetails(7, '449')">449</div>
<div class="plot plot-7-450" onclick="showPlotDetails(7, '450')">450</div>
<div class="plot plot-7-451" onclick="showPlotDetails(7, '451')">451</div>
<div class="plot plot-7-452" onclick="showPlotDetails(7, '452')">452</div>
<div class="plot plot-7-453" onclick="showPlotDetails(7, '453')">453</div>
<div class="plot plot-7-454" onclick="showPlotDetails(7, '454')">454</div>
<div class="plot plot-7-455" onclick="showPlotDetails(7, '455')">455</div>
<div class="plot plot-7-456" onclick="showPlotDetails(7, '456')">456</div>
<div class="plot plot-7-457" onclick="showPlotDetails(7, '457')">457</div>
<div class="plot plot-7-458" onclick="showPlotDetails(7, '458')">458</div>
<div class="plot plot-7-459" onclick="showPlotDetails(7, '459')">459</div>
<div class="plot plot-7-460" onclick="showPlotDetails(7, '460')">460</div>
<div class="plot plot-7-461" onclick="showPlotDetails(7, '461')">461</div>
<div class="plot plot-7-462" onclick="showPlotDetails(7, '462')">462</div>
<div class="plot plot-7-463" onclick="showPlotDetails(7, '463')">463</div>
<div class="plot plot-7-464" onclick="showPlotDetails(7, '464')">464</div>
<div class="plot plot-7-465" onclick="showPlotDetails(7, '465')">465</div>
<div class="plot plot-7-466" onclick="showPlotDetails(7, '466')">466</div>
<div class="plot plot-7-467" onclick="showPlotDetails(7, '467')">467</div>
<div class="plot plot-7-468" onclick="showPlotDetails(7, '468')">468</div>
<div class="plot plot-7-469" onclick="showPlotDetails(7, '469')">469</div>
<div class="plot plot-7-470" onclick="showPlotDetails(7, '470')">470</div>
<div class="plot plot-7-471" onclick="showPlotDetails(7, '471')">471</div>
<div class="plot plot-7-472" onclick="showPlotDetails(7, '472')">472</div>
<div class="plot plot-7-473" onclick="showPlotDetails(7, '473')">473</div>
<div class="plot plot-7-474" onclick="showPlotDetails(7, '474')">474</div>
<div class="plot plot-7-475" onclick="showPlotDetails(7, '475')">475</div>
<div class="plot plot-7-476" onclick="showPlotDetails(7, '476')">476</div>
<div class="plot plot-7-477" onclick="showPlotDetails(7, '477')">477</div>
<div class="plot plot-7-478" onclick="showPlotDetails(7, '478')">478</div>
<div class="plot plot-7-479" onclick="showPlotDetails(7, '479')">479</div>
<div class="plot plot-7-480" onclick="showPlotDetails(7, '480')">480</div>
<div class="plot plot-7-481" onclick="showPlotDetails(7, '481')">481</div>
<div class="plot plot-7-482" onclick="showPlotDetails(7, '482')">482</div>
<div class="plot plot-7-483" onclick="showPlotDetails(7, '483')">483</div>
<div class="plot plot-7-484" onclick="showPlotDetails(7, '484')">484</div>
<div class="plot plot-7-485" onclick="showPlotDetails(7, '485')">485</div>
<div class="plot plot-7-486" onclick="showPlotDetails(7, '486')">486</div>
<div class="plot plot-7-487" onclick="showPlotDetails(7, '487')">487</div>
<div class="plot plot-7-488" onclick="showPlotDetails(7, '488')">488</div>
<div class="plot plot-7-489" onclick="showPlotDetails(7, '489')">489</div>
<div class="plot plot-7-490" onclick="showPlotDetails(7, '490')">490</div>
<div class="plot plot-7-491" onclick="showPlotDetails(7, '491')">491</div>
<div class="plot plot-7-492" onclick="showPlotDetails(7, '492')">492</div>
<div class="plot plot-7-493" onclick="showPlotDetails(7, '493')">493</div>
<div class="plot plot-7-494" onclick="showPlotDetails(7, '494')">494</div>
<div class="plot plot-7-495" onclick="showPlotDetails(7, '495')">495</div>
<div class="plot plot-7-496" onclick="showPlotDetails(7, '496')">496</div>
<div class="plot plot-7-497" onclick="showPlotDetails(7, '497')">497</div>
<div class="plot plot-7-498" onclick="showPlotDetails(7, '498')">498</div>
<div class="plot plot-7-499" onclick="showPlotDetails(7, '499')">499</div>
<div class="plot plot-7-500" onclick="showPlotDetails(7, '500')">500</div>
<div class="plot plot-7-501" onclick="showPlotDetails(7, '501')">501</div>
<div class="plot plot-7-502" onclick="showPlotDetails(7, '502')">502</div>
<div class="plot plot-7-503" onclick="showPlotDetails(7, '503')">503</div>
<div class="plot plot-7-504" onclick="showPlotDetails(7, '504')">504</div>
<div class="plot plot-7-505" onclick="showPlotDetails(7, '505')">505</div>
<div class="plot plot-7-506" onclick="showPlotDetails(7, '506')">506</div>
<div class="plot plot-7-507" onclick="showPlotDetails(7, '507')">507</div>
<div class="plot plot-7-508" onclick="showPlotDetails(7, '508')">508</div>
<div class="plot plot-7-509" onclick="showPlotDetails(7, '509')">509</div>
<div class="plot plot-7-510" onclick="showPlotDetails(7, '510')">510</div>
<div class="plot plot-7-511" onclick="showPlotDetails(7, '511')">511</div>
<div class="plot plot-7-512" onclick="showPlotDetails(7, '512')">512</div>
<div class="plot plot-7-513" onclick="showPlotDetails(7, '513')">513</div>
<div class="plot plot-7-514" onclick="showPlotDetails(7, '514')">514</div>
<div class="plot plot-7-515" onclick="showPlotDetails(7, '515')">515</div>
<div class="plot plot-7-516" onclick="showPlotDetails(7, '516')">516</div>
<div class="plot plot-7-517" onclick="showPlotDetails(7, '517')">517</div>
<div class="plot plot-7-518" onclick="showPlotDetails(7, '518')">518</div>
<div class="plot plot-7-519" onclick="showPlotDetails(7, '519')">519</div>
<div class="plot plot-7-520" onclick="showPlotDetails(7, '520')">520</div>
<div class="plot plot-7-521" onclick="showPlotDetails(7, '521')">521</div>
<div class="plot plot-7-522" onclick="showPlotDetails(7, '522')">522</div>
<div class="plot plot-7-523" onclick="showPlotDetails(7, '523')">523</div>
<div class="plot plot-7-524" onclick="showPlotDetails(7, '524')">524</div>
<div class="plot plot-7-525" onclick="showPlotDetails(7, '525')">525</div>
<div class="plot plot-7-526" onclick="showPlotDetails(7, '526')">526</div>
<div class="plot plot-7-527" onclick="showPlotDetails(7, '527')">527</div>
<div class="plot plot-7-528" onclick="showPlotDetails(7, '528')">528</div>
<div class="plot plot-7-529" onclick="showPlotDetails(7, '529')">529</div>
<div class="plot plot-7-530" onclick="showPlotDetails(7, '530')">530</div>
<div class="plot plot-7-531" onclick="showPlotDetails(7, '531')">531</div>
<div class="plot plot-7-532" onclick="showPlotDetails(7, '532')">532</div>
<div class="plot plot-7-533" onclick="showPlotDetails(7, '533')">533</div>
<div class="plot plot-7-534" onclick="showPlotDetails(7, '534')">534</div>
<div class="plot plot-7-535" onclick="showPlotDetails(7, '535')">535</div>
<div class="plot plot-7-536" onclick="showPlotDetails(7, '536')">536</div>
<div class="plot plot-7-537" onclick="showPlotDetails(7, '537')">537</div>
<div class="plot plot-7-538" onclick="showPlotDetails(7, '538')">538</div>
<div class="plot plot-7-539" onclick="showPlotDetails(7, '539')">539</div>
<div class="plot plot-7-540" onclick="showPlotDetails(7, '540')">540</div>
<div class="plot plot-7-541" onclick="showPlotDetails(7, '541')">541</div>
<div class="plot plot-7-542" onclick="showPlotDetails(7, '542')">542</div>
<div class="plot plot-7-543" onclick="showPlotDetails(7, '543')">543</div>
<div class="plot plot-7-544" onclick="showPlotDetails(7, '544')">544</div>
<div class="plot plot-7-545" onclick="showPlotDetails(7, '545')">545</div>
<div class="plot plot-7-546" onclick="showPlotDetails(7, '546')">546</div>
<div class="plot plot-7-547" onclick="showPlotDetails(7, '547')">547</div>
<div class="plot plot-7-548" onclick="showPlotDetails(7, '548')">548</div>
<div class="plot plot-7-549" onclick="showPlotDetails(7, '549')">549</div>
<div class="plot plot-7-550" onclick="showPlotDetails(7, '550')">550</div>
<div class="plot plot-7-551" onclick="showPlotDetails(7, '551')">551</div>
<div class="plot plot-7-552" onclick="showPlotDetails(7, '552')">552</div>
<div class="plot plot-7-553" onclick="showPlotDetails(7, '553')">553</div>
<div class="plot plot-7-554" onclick="showPlotDetails(7, '554')">554</div>
<div class="plot plot-7-555" onclick="showPlotDetails(7, '555')">555</div>
<div class="plot plot-7-556" onclick="showPlotDetails(7, '556')">556</div>
<div class="plot plot-7-557" onclick="showPlotDetails(7, '557')">557</div>
<div class="plot plot-7-558" onclick="showPlotDetails(7, '558')">558</div>
<div class="plot plot-7-559" onclick="showPlotDetails(7, '559')">559</div>
<div class="plot plot-7-560" onclick="showPlotDetails(7, '560')">560</div>
<div class="plot plot-7-561" onclick="showPlotDetails(7, '561')">561</div>
<div class="plot plot-7-562" onclick="showPlotDetails(7, '562')">562</div>
<div class="plot plot-7-563" onclick="showPlotDetails(7, '563')">563</div>
<div class="plot plot-7-564" onclick="showPlotDetails(7, '564')">564</div>
<div class="plot plot-7-565" onclick="showPlotDetails(7, '565')">565</div>
<div class="plot plot-7-566" onclick="showPlotDetails(7, '566')">566</div>
<div class="plot plot-7-567" onclick="showPlotDetails(7, '567')">567</div>
<div class="plot plot-7-568" onclick="showPlotDetails(7, '568')">568</div>
<div class="plot plot-7-569" onclick="showPlotDetails(7, '569')">569</div>
<div class="plot plot-7-570" onclick="showPlotDetails(7, '570')">570</div>
<div class="plot plot-7-571" onclick="showPlotDetails(7, '571')">571</div>
<div class="plot plot-7-572" onclick="showPlotDetails(7, '572')">572</div>
<div class="plot plot-7-573" onclick="showPlotDetails(7, '573')">573</div>
<div class="plot plot-7-574" onclick="showPlotDetails(7, '574')">574</div>
<div class="plot plot-7-575" onclick="showPlotDetails(7, '575')">575</div>
<div class="plot plot-7-576" onclick="showPlotDetails(7, '576')">576</div>
<div class="plot plot-7-577" onclick="showPlotDetails(7, '577')">577</div>
<div class="plot plot-7-578" onclick="showPlotDetails(7, '578')">578</div>
<div class="plot plot-7-579" onclick="showPlotDetails(7, '579')">579</div>
<div class="plot plot-7-580" onclick="showPlotDetails(7, '580')">580</div>
<div class="plot plot-7-581" onclick="showPlotDetails(7, '581')">581</div>
<div class="plot plot-7-582" onclick="showPlotDetails(7, '582')">582</div>
<div class="plot plot-7-583" onclick="showPlotDetails(7, '583')">583</div>
<div class="plot plot-7-584" onclick="showPlotDetails(7, '584')">584</div>
<div class="plot plot-7-585" onclick="showPlotDetails(7, '585')">585</div>
<div class="plot plot-7-586" onclick="showPlotDetails(7, '586')">586</div>
<div class="plot plot-7-587" onclick="showPlotDetails(7, '587')">587</div>
<div class="plot plot-7-588" onclick="showPlotDetails(7, '588')">588</div>
<div class="plot plot-7-589" onclick="showPlotDetails(7, '589')">589</div>
<div class="plot plot-7-590" onclick="showPlotDetails(7, '590')">590</div>
<div class="plot plot-7-591" onclick="showPlotDetails(7, '591')">591</div>
<div class="plot plot-7-592" onclick="showPlotDetails(7, '592')">592</div>
<div class="plot plot-7-593" onclick="showPlotDetails(7, '593')">593</div>
<div class="plot plot-7-594" onclick="showPlotDetails(7, '594')">594</div>
<div class="plot plot-7-595" onclick="showPlotDetails(7, '595')">595</div>
<div class="plot plot-7-596" onclick="showPlotDetails(7, '596')">596</div>
<div class="plot plot-7-597" onclick="showPlotDetails(7, '597')">597</div>
<div class="plot plot-7-598" onclick="showPlotDetails(7, '598')">598</div>
<div class="plot plot-7-599" onclick="showPlotDetails(7, '599')">599</div>
<div class="plot plot-7-600" onclick="showPlotDetails(7, '600')">600</div>
<div class="plot plot-7-601" onclick="showPlotDetails(7, '601')">601</div>
<div class="plot plot-7-602" onclick="showPlotDetails(7, '602')">602</div>
<div class="plot plot-7-603" onclick="showPlotDetails(7, '603')">603</div>
<div class="plot plot-7-604" onclick="showPlotDetails(7, '604')">604</div>
<div class="plot plot-7-605" onclick="showPlotDetails(7, '605')">605</div>
<div class="plot plot-7-606" onclick="showPlotDetails(7, '606')">606</div>
<div class="plot plot-7-607" onclick="showPlotDetails(7, '607')">607</div>
<div class="plot plot-7-608" onclick="showPlotDetails(7, '608')">608</div>
<div class="plot plot-7-609" onclick="showPlotDetails(7, '609')">609</div>
<div class="plot plot-7-610" onclick="showPlotDetails(7, '610')">610</div>
<div class="plot plot-7-611" onclick="showPlotDetails(7, '611')">611</div>
<div class="plot plot-7-612" onclick="showPlotDetails(7, '612')">612</div>
<div class="plot plot-7-613" onclick="showPlotDetails(7, '613')">613</div>
<div class="plot plot-7-614" onclick="showPlotDetails(7, '614')">614</div>
<div class="plot plot-7-615" onclick="showPlotDetails(7, '615')">615</div>
<div class="plot plot-7-616" onclick="showPlotDetails(7, '616')">616</div>
<div class="plot plot-7-617" onclick="showPlotDetails(7, '617')">617</div>
<div class="plot plot-7-618" onclick="showPlotDetails(7, '618')">618</div>
<div class="plot plot-7-619" onclick="showPlotDetails(7, '619')">619</div>
<div class="plot plot-7-620" onclick="showPlotDetails(7, '620')">620</div>
<div class="plot plot-7-621" onclick="showPlotDetails(7, '621')">621</div>
<div class="plot plot-7-622" onclick="showPlotDetails(7, '622')">622</div>
<div class="plot plot-7-623" onclick="showPlotDetails(7, '623')">623</div>
<div class="plot plot-7-624" onclick="showPlotDetails(7, '624')">624</div>
<div class="plot plot-7-625" onclick="showPlotDetails(7, '625')">625</div>
<div class="plot plot-7-626" onclick="showPlotDetails(7, '626')">626</div>
<div class="plot plot-7-627" onclick="showPlotDetails(7, '627')">627</div>
<div class="plot plot-7-628" onclick="showPlotDetails(7, '628')">628</div>
<div class="plot plot-7-629" onclick="showPlotDetails(7, '629')">629</div>
<div class="plot plot-7-630" onclick="showPlotDetails(7, '630')">630</div>
<div class="plot plot-7-631" onclick="showPlotDetails(7, '631')">631</div>
<div class="plot plot-7-632" onclick="showPlotDetails(7, '632')">632</div>
<div class="plot plot-7-633" onclick="showPlotDetails(7, '633')">633</div>
<div class="plot plot-7-634" onclick="showPlotDetails(7, '634')">634</div>
<div class="plot plot-7-635" onclick="showPlotDetails(7, '635')">635</div>
<div class="plot plot-7-636" onclick="showPlotDetails(7, '636')">636</div>
<div class="plot plot-7-637" onclick="showPlotDetails(7, '637')">637</div>
<div class="plot plot-7-638" onclick="showPlotDetails(7, '638')">638</div>
<div class="plot plot-7-639" onclick="showPlotDetails(7, '639')">639</div>
<div class="plot plot-7-640" onclick="showPlotDetails(7, '640')">640</div>
<div class="plot plot-7-641" onclick="showPlotDetails(7, '641')">641</div>
<div class="plot plot-7-642" onclick="showPlotDetails(7, '642')">642</div>
<div class="plot plot-7-643" onclick="showPlotDetails(7, '643')">643</div>
<div class="plot plot-7-644" onclick="showPlotDetails(7, '644')">644</div>
<div class="plot plot-7-645" onclick="showPlotDetails(7, '645')">645</div>
<div class="plot plot-7-646" onclick="showPlotDetails(7, '646')">646</div>
<div class="plot plot-7-647" onclick="showPlotDetails(7, '647')">647</div>
<div class="plot plot-7-648" onclick="showPlotDetails(7, '648')">648</div>
<div class="plot plot-7-649" onclick="showPlotDetails(7, '649')">649</div>
<div class="plot plot-7-650" onclick="showPlotDetails(7, '650')">650</div>
<div class="plot plot-7-651" onclick="showPlotDetails(7, '651')">651</div>
<div class="plot plot-7-652" onclick="showPlotDetails(7, '652')">652</div>
<div class="plot plot-7-653" onclick="showPlotDetails(7, '653')">653</div>
<div class="plot plot-7-654" onclick="showPlotDetails(7, '654')">654</div>
<div class="plot plot-7-655" onclick="showPlotDetails(7, '655')">655</div>
<div class="plot plot-7-656" onclick="showPlotDetails(7, '656')">656</div>
<div class="plot plot-7-657" onclick="showPlotDetails(7, '657')">657</div>
<div class="plot plot-7-658" onclick="showPlotDetails(7, '658')">658</div>
<div class="plot plot-7-659" onclick="showPlotDetails(7, '659')">659</div>
<div class="plot plot-7-660" onclick="showPlotDetails(7, '660')">660</div>
<div class="plot plot-7-661" onclick="showPlotDetails(7, '661')">661</div>
<div class="plot plot-7-662" onclick="showPlotDetails(7, '662')">662</div>
<div class="plot plot-7-663" onclick="showPlotDetails(7, '663')">663</div>
<div class="plot plot-7-664" onclick="showPlotDetails(7, '664')">664</div>
<div class="plot plot-7-665" onclick="showPlotDetails(7, '665')">665</div>
<div class="plot plot-7-666" onclick="showPlotDetails(7, '666')">666</div>
<div class="plot plot-7-667" onclick="showPlotDetails(7, '667')">667</div>
<div class="plot plot-7-668" onclick="showPlotDetails(7, '668')">668</div>
<div class="plot plot-7-669" onclick="showPlotDetails(7, '669')">669</div>
<div class="plot plot-7-670" onclick="showPlotDetails(7, '670')">670</div>
<div class="plot plot-7-671" onclick="showPlotDetails(7, '671')">671</div>
<div class="plot plot-7-672" onclick="showPlotDetails(7, '672')">672</div>
<div class="plot plot-7-673" onclick="showPlotDetails(7, '673')">673</div>
<div class="plot plot-7-674" onclick="showPlotDetails(7, '674')">674</div>
<div class="plot plot-7-675" onclick="showPlotDetails(7, '675')">675</div>
<div class="plot plot-7-676" onclick="showPlotDetails(7, '676')">676</div>
<div class="plot plot-7-677" onclick="showPlotDetails(7, '677')">677</div>
<div class="plot plot-7-678" onclick="showPlotDetails(7, '678')">678</div>
<div class="plot plot-7-679" onclick="showPlotDetails(7, '679')">679</div>
<div class="plot plot-7-680" onclick="showPlotDetails(7, '680')">680</div>
<div class="plot plot-7-681" onclick="showPlotDetails(7, '681')">681</div>
<div class="plot plot-7-682" onclick="showPlotDetails(7, '682')">682</div>
<div class="plot plot-7-683" onclick="showPlotDetails(7, '683')">683</div>
    </div>
    <style>
      .road{
        transform: rotate(-2deg);
    width: 120%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
      }
      .rot{
        transform: rotate(92deg);
            }
            .rot2{
        transform: rotate(92deg);
            }
            .b7w1{
              right: 293px;
                        }
    </style>
    <div class="road">
      <hr style="color: black; width: 79%;" >
      <div class="ped">PEDESTRIAN SIDEWALK</div>
      <hr style="color: black; width: 79%;" >
      <b>GREEN PARK MEMORIAL GARDEN</b>
      <b>BLOCK 7</b>
      <hr style="color: black; width: 79%; margin-top: 28px;" >
      <div class="ped">PEDESTRIAN SIDEWALK</div>
      <hr style="color: black; width: 79%;" >
      <b class="pathwalk walk1 b7w1 rot" >2.00 M. WIDE PATHWALK</b>
      <b class="pathwalk walk2 b3w2 rot2">2.00 M. WIDE PATHWALK</b>
      
      <div class="two-way-traffic-sign b3t">
        <div class="arrow-container">
            <div class="arrow left"></div>
        </div>
        <div class="text">TWO WAY TRAFFIC ROAD</div>
        <div class="arrow-container">
            <div class="arrow right"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Modal HTML for Block 5 -->
<div id="block5Modal" class="modal">
  <div class="modal-content-map">
    <span>Block 5 Plots</span> <span class="close" onclick="closeModal('block5Modal')">&times;</span>
    <div class="modal-center">
      <b class="">2.00 M. WIDE PATHWALK</b>
      <div class="plots_con b5 rotator">
        <div class="d0"></div>
        <div class="d0"></div>
        <div class="plot plot-5-1" onclick="showPlotDetails(5, '1')">1</div>
<div class="plot plot-5-2" onclick="showPlotDetails(5, '2')">2</div>
<div class="plot plot-5-3" onclick="showPlotDetails(5, '3')">3</div>
<div class="plot plot-5-4" onclick="showPlotDetails(5, '4')">4</div>
<div class="plot plot-5-5" onclick="showPlotDetails(5, '5')">5</div>
<div class="plot plot-5-6" onclick="showPlotDetails(5, '6')">6</div>
<div class="plot plot-5-7" onclick="showPlotDetails(5, '7')">7</div>
<div class="plot plot-5-8" onclick="showPlotDetails(5, '8')">8</div>
<div class="plot plot-5-9" onclick="showPlotDetails(5, '9')">9</div>
<div class="plot plot-5-10" onclick="showPlotDetails(5, '10')">10</div>
<div class="plot plot-5-11" onclick="showPlotDetails(5, '11')">11</div>
<div class="plot plot-5-12" onclick="showPlotDetails(5, '12')">12</div>
<div class="plot plot-5-13" onclick="showPlotDetails(5, '13')">13</div>
<div class="plot plot-5-14" onclick="showPlotDetails(5, '14')">14</div>
<div class="plot plot-5-15" onclick="showPlotDetails(5, '15')">15</div>
<div class="plot plot-5-16" onclick="showPlotDetails(5, '16')">16</div>
<div class="plot plot-5-17" onclick="showPlotDetails(5, '17')">17</div>
<div class="plot plot-5-18" onclick="showPlotDetails(5, '18')">18</div>
<div class="plot plot-5-19" onclick="showPlotDetails(5, '19')">19</div>
<div class="plot plot-5-20" onclick="showPlotDetails(5, '20')">20</div>
<div class="plot plot-5-21" onclick="showPlotDetails(5, '21')">21</div>
<div class="plot plot-5-22" onclick="showPlotDetails(5, '22')">22</div>
<div class="plot plot-5-23" onclick="showPlotDetails(5, '23')">23</div>
<div class="plot plot-5-24" onclick="showPlotDetails(5, '24')">24</div>
<div class="plot plot-5-25" onclick="showPlotDetails(5, '25')">25</div>
<div class="plot plot-5-26" onclick="showPlotDetails(5, '26')">26</div>
<div class="plot plot-5-27" onclick="showPlotDetails(5, '27')">27</div>
<div class="plot plot-5-28" onclick="showPlotDetails(5, '28')">28</div>
<div class="plot plot-5-29" onclick="showPlotDetails(5, '29')">29</div>
<div class="plot plot-5-30" onclick="showPlotDetails(5, '30')">30</div>
<div class="plot plot-5-31" onclick="showPlotDetails(5, '31')">31</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-5-32" onclick="showPlotDetails(5, '32')">32</div>
<div class="plot plot-5-33" onclick="showPlotDetails(5, '33')">33</div>
<div class="plot plot-5-34" onclick="showPlotDetails(5, '34')">34</div>
<div class="plot plot-5-35" onclick="showPlotDetails(5, '35')">35</div>
<div class="plot plot-5-36" onclick="showPlotDetails(5, '36')">36</div>
<div class="plot plot-5-37" onclick="showPlotDetails(5, '37')">37</div>
<div class="plot plot-5-38" onclick="showPlotDetails(5, '38')">38</div>
<div class="plot plot-5-39" onclick="showPlotDetails(5, '39')">39</div>
<div class="plot plot-5-40" onclick="showPlotDetails(5, '40')">40</div>
<div class="plot plot-5-41" onclick="showPlotDetails(5, '41')">41</div>
<div class="plot plot-5-42" onclick="showPlotDetails(5, '42')">42</div>
<div class="plot plot-5-43" onclick="showPlotDetails(5, '43')">43</div>
<div class="plot plot-5-44" onclick="showPlotDetails(5, '44')">44</div>
<div class="plot plot-5-45" onclick="showPlotDetails(5, '45')">45</div>
<div class="plot plot-5-46" onclick="showPlotDetails(5, '46')">46</div>
<div class="plot plot-5-47" onclick="showPlotDetails(5, '47')">47</div>
<div class="plot plot-5-48" onclick="showPlotDetails(5, '48')">48</div>
<div class="plot plot-5-49" onclick="showPlotDetails(5, '49')">49</div>
<div class="plot plot-5-50" onclick="showPlotDetails(5, '50')">50</div>
<div class="plot plot-5-51" onclick="showPlotDetails(5, '51')">51</div>
<div class="plot plot-5-52" onclick="showPlotDetails(5, '52')">52</div>
<div class="plot plot-5-53" onclick="showPlotDetails(5, '53')">53</div>
<div class="plot plot-5-54" onclick="showPlotDetails(5, '54')">54</div>
<div class="plot plot-5-55" onclick="showPlotDetails(5, '55')">55</div>
<div class="plot plot-5-56" onclick="showPlotDetails(5, '56')">56</div>
<div class="plot plot-5-57" onclick="showPlotDetails(5, '57')">57</div>
<div class="plot plot-5-58" onclick="showPlotDetails(5, '58')">58</div>
<div class="plot plot-5-59" onclick="showPlotDetails(5, '59')">59</div>
<div class="plot plot-5-60" onclick="showPlotDetails(5, '60')">60</div>
<div class="plot plot-5-61" onclick="showPlotDetails(5, '61')">61</div>
<div class="plot plot-5-62" onclick="showPlotDetails(5, '62')">62</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-5-63" onclick="showPlotDetails(5, '63')">63</div>
<div class="plot plot-5-64" onclick="showPlotDetails(5, '64')">64</div>
<div class="plot plot-5-65" onclick="showPlotDetails(5, '65')">65</div>
<div class="plot plot-5-66" onclick="showPlotDetails(5, '66')">66</div>
<div class="plot plot-5-67" onclick="showPlotDetails(5, '67')">67</div>
<div class="plot plot-5-68" onclick="showPlotDetails(5, '68')">68</div>
<div class="plot plot-5-69" onclick="showPlotDetails(5, '69')">69</div>
<div class="plot plot-5-70" onclick="showPlotDetails(5, '70')">70</div>
<div class="plot plot-5-71" onclick="showPlotDetails(5, '71')">71</div>
<div class="plot plot-5-72" onclick="showPlotDetails(5, '72')">72</div>
<div class="plot plot-5-73" onclick="showPlotDetails(5, '73')">73</div>
<div class="plot plot-5-74" onclick="showPlotDetails(5, '74')">74</div>
<div class="plot plot-5-75" onclick="showPlotDetails(5, '75')">75</div>
<div class="plot plot-5-76" onclick="showPlotDetails(5, '76')">76</div>
<div class="plot plot-5-77" onclick="showPlotDetails(5, '77')">77</div>
<div class="plot plot-5-78" onclick="showPlotDetails(5, '78')">78</div>
<div class="plot plot-5-79" onclick="showPlotDetails(5, '79')">79</div>
<div class="plot plot-5-80" onclick="showPlotDetails(5, '80')">80</div>
<div class="plot plot-5-81" onclick="showPlotDetails(5, '81')">81</div>
<div class="plot plot-5-82" onclick="showPlotDetails(5, '82')">82</div>
<div class="plot plot-5-83" onclick="showPlotDetails(5, '83')">83</div>
<div class="plot plot-5-84" onclick="showPlotDetails(5, '84')">84</div>
<div class="plot plot-5-85" onclick="showPlotDetails(5, '85')">85</div>
<div class="plot plot-5-86" onclick="showPlotDetails(5, '86')">86</div>
<div class="plot plot-5-87" onclick="showPlotDetails(5, '87')">87</div>
<div class="plot plot-5-88" onclick="showPlotDetails(5, '88')">88</div>
<div class="plot plot-5-89" onclick="showPlotDetails(5, '89')">89</div>
<div class="plot plot-5-90" onclick="showPlotDetails(5, '90')">90</div>
<div class="plot plot-5-91" onclick="showPlotDetails(5, '91')">91</div>
<div class="plot plot-5-92" onclick="showPlotDetails(5, '92')">92</div>
<div class="plot plot-5-93" onclick="showPlotDetails(5, '93')">93</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-5-94" onclick="showPlotDetails(5, '94')">94</div>
<div class="plot plot-5-95" onclick="showPlotDetails(5, '95')">95</div>
<div class="plot plot-5-96" onclick="showPlotDetails(5, '96')">96</div>
<div class="plot plot-5-97" onclick="showPlotDetails(5, '97')">97</div>
<div class="plot plot-5-98" onclick="showPlotDetails(5, '98')">98</div>
<div class="plot plot-5-99" onclick="showPlotDetails(5, '99')">99</div>
<div class="plot plot-5-100" onclick="showPlotDetails(5, '100')">100</div>
<div class="plot plot-5-101" onclick="showPlotDetails(5, '101')">101</div>
<div class="plot plot-5-102" onclick="showPlotDetails(5, '102')">102</div>
<div class="plot plot-5-103" onclick="showPlotDetails(5, '103')">103</div>
<div class="plot plot-5-104" onclick="showPlotDetails(5, '104')">104</div>
<div class="plot plot-5-105" onclick="showPlotDetails(5, '105')">105</div>
<div class="plot plot-5-106" onclick="showPlotDetails(5, '106')">106</div>
<div class="plot plot-5-107" onclick="showPlotDetails(5, '107')">107</div>
<div class="plot plot-5-108" onclick="showPlotDetails(5, '108')">108</div>
<div class="plot plot-5-109" onclick="showPlotDetails(5, '109')">109</div>
<div class="plot plot-5-110" onclick="showPlotDetails(5, '110')">110</div>
<div class="plot plot-5-111" onclick="showPlotDetails(5, '111')">111</div>
<div class="plot plot-5-112" onclick="showPlotDetails(5, '112')">112</div>
<div class="plot plot-5-113" onclick="showPlotDetails(5, '113')">113</div>
<div class="plot plot-5-114" onclick="showPlotDetails(5, '114')">114</div>
<div class="plot plot-5-115" onclick="showPlotDetails(5, '115')">115</div>
<div class="plot plot-5-116" onclick="showPlotDetails(5, '116')">116</div>
<div class="plot plot-5-117" onclick="showPlotDetails(5, '117')">117</div>
<div class="plot plot-5-118" onclick="showPlotDetails(5, '118')">118</div>
<div class="plot plot-5-119" onclick="showPlotDetails(5, '119')">119</div>
<div class="plot plot-5-120" onclick="showPlotDetails(5, '120')">120</div>
<div class="plot plot-5-121" onclick="showPlotDetails(5, '121')">121</div>
<div class="plot plot-5-122" onclick="showPlotDetails(5, '122')">122</div>
<div class="plot plot-5-123" onclick="showPlotDetails(5, '123')">123</div>
<div class="plot plot-5-124" onclick="showPlotDetails(5, '124')">124</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-5-125" onclick="showPlotDetails(5, '125')">125</div>
<div class="plot plot-5-126" onclick="showPlotDetails(5, '126')">126</div>
<div class="plot plot-5-127" onclick="showPlotDetails(5, '127')">127</div>
<div class="plot plot-5-128" onclick="showPlotDetails(5, '128')">128</div>
<div class="plot plot-5-129" onclick="showPlotDetails(5, '129')">129</div>
<div class="plot plot-5-130" onclick="showPlotDetails(5, '130')">130</div>
<div class="plot plot-5-131" onclick="showPlotDetails(5, '131')">131</div>
<div class="plot plot-5-132" onclick="showPlotDetails(5, '132')">132</div>
<div class="plot plot-5-133" onclick="showPlotDetails(5, '133')">133</div>
<div class="plot plot-5-134" onclick="showPlotDetails(5, '134')">134</div>
<div class="plot plot-5-135" onclick="showPlotDetails(5, '135')">135</div>
<div class="plot plot-5-136" onclick="showPlotDetails(5, '136')">136</div>
<div class="plot plot-5-137" onclick="showPlotDetails(5, '137')">137</div>
<div class="plot plot-5-138" onclick="showPlotDetails(5, '138')">138</div>
<div class="plot plot-5-139" onclick="showPlotDetails(5, '139')">139</div>
<div class="plot plot-5-140" onclick="showPlotDetails(5, '140')">140</div>
<div class="plot plot-5-141" onclick="showPlotDetails(5, '141')">141</div>
<div class="plot plot-5-142" onclick="showPlotDetails(5, '142')">142</div>
<div class="plot plot-5-143" onclick="showPlotDetails(5, '143')">143</div>
<div class="plot plot-5-144" onclick="showPlotDetails(5, '144')">144</div>
<div class="plot plot-5-145" onclick="showPlotDetails(5, '145')">145</div>
<div class="plot plot-5-146" onclick="showPlotDetails(5, '146')">146</div>
<div class="plot plot-5-147" onclick="showPlotDetails(5, '147')">147</div>
<div class="plot plot-5-148" onclick="showPlotDetails(5, '148')">148</div>
<div class="plot plot-5-149" onclick="showPlotDetails(5, '149')">149</div>
<div class="plot plot-5-150" onclick="showPlotDetails(5, '150')">150</div>
<div class="plot plot-5-151" onclick="showPlotDetails(5, '151')">151</div>
<div class="plot plot-5-152" onclick="showPlotDetails(5, '152')">152</div>
<div class="plot plot-5-153" onclick="showPlotDetails(5, '153')">153</div>
<div class="plot plot-5-154" onclick="showPlotDetails(5, '154')">154</div>
<div class="plot plot-5-155" onclick="showPlotDetails(5, '155')">155</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-5-156" onclick="showPlotDetails(5, '156')">156</div>
<div class="plot plot-5-157" onclick="showPlotDetails(5, '157')">157</div>
<div class="plot plot-5-158" onclick="showPlotDetails(5, '158')">158</div>
<div class="plot plot-5-159" onclick="showPlotDetails(5, '159')">159</div>
<div class="plot plot-5-160" onclick="showPlotDetails(5, '160')">160</div>
<div class="plot plot-5-161" onclick="showPlotDetails(5, '161')">161</div>
<div class="plot plot-5-162" onclick="showPlotDetails(5, '162')">162</div>
<div class="plot plot-5-163" onclick="showPlotDetails(5, '163')">163</div>
<div class="plot plot-5-164" onclick="showPlotDetails(5, '164')">164</div>
<div class="plot plot-5-165" onclick="showPlotDetails(5, '165')">165</div>
<div class="plot plot-5-166" onclick="showPlotDetails(5, '166')">166</div>
<div class="plot plot-5-167" onclick="showPlotDetails(5, '167')">167</div>
<div class="plot plot-5-168" onclick="showPlotDetails(5, '168')">168</div>
<div class="plot plot-5-169" onclick="showPlotDetails(5, '169')">169</div>
<div class="plot plot-5-170" onclick="showPlotDetails(5, '170')">170</div>
<div class="plot plot-5-171" onclick="showPlotDetails(5, '171')">171</div>
<div class="plot plot-5-172" onclick="showPlotDetails(5, '172')">172</div>
<div class="plot plot-5-173" onclick="showPlotDetails(5, '173')">173</div>
<div class="plot plot-5-174" onclick="showPlotDetails(5, '174')">174</div>
<div class="plot plot-5-175" onclick="showPlotDetails(5, '175')">175</div>
<div class="plot plot-5-176" onclick="showPlotDetails(5, '176')">176</div>
<div class="plot plot-5-177" onclick="showPlotDetails(5, '177')">177</div>
<div class="plot plot-5-178" onclick="showPlotDetails(5, '178')">178</div>
<div class="plot plot-5-179" onclick="showPlotDetails(5, '179')">179</div>
<div class="plot plot-5-180" onclick="showPlotDetails(5, '180')">180</div>
<div class="plot plot-5-181" onclick="showPlotDetails(5, '181')">181</div>
<div class="plot plot-5-182" onclick="showPlotDetails(5, '182')">182</div>
<div class="plot plot-5-183" onclick="showPlotDetails(5, '183')">183</div>
<div class="plot plot-5-184" onclick="showPlotDetails(5, '184')">184</div>
<div class="plot plot-5-185" onclick="showPlotDetails(5, '185')">185</div>
<div class="plot plot-5-186" onclick="showPlotDetails(5, '186')">186</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-5-187" onclick="showPlotDetails(5, '187')">187</div>
<div class="plot plot-5-188" onclick="showPlotDetails(5, '188')">188</div>
<div class="plot plot-5-189" onclick="showPlotDetails(5, '189')">189</div>
<div class="plot plot-5-190" onclick="showPlotDetails(5, '190')">190</div>
<div class="plot plot-5-191" onclick="showPlotDetails(5, '191')">191</div>
<div class="plot plot-5-192" onclick="showPlotDetails(5, '192')">192</div>
<div class="plot plot-5-193" onclick="showPlotDetails(5, '193')">193</div>
<div class="plot plot-5-194" onclick="showPlotDetails(5, '194')">194</div>
<div class="plot plot-5-195" onclick="showPlotDetails(5, '195')">195</div>
<div class="plot plot-5-196" onclick="showPlotDetails(5, '196')">196</div>
<div class="plot plot-5-197" onclick="showPlotDetails(5, '197')">197</div>
<div class="plot plot-5-198" onclick="showPlotDetails(5, '198')">198</div>
<div class="plot plot-5-199" onclick="showPlotDetails(5, '199')">199</div>
<div class="plot plot-5-200" onclick="showPlotDetails(5, '200')">200</div>
<div class="plot plot-5-201" onclick="showPlotDetails(5, '201')">201</div>
<div class="plot plot-5-202" onclick="showPlotDetails(5, '202')">202</div>
<div class="plot plot-5-203" onclick="showPlotDetails(5, '203')">203</div>
<div class="plot plot-5-204" onclick="showPlotDetails(5, '204')">204</div>
<div class="plot plot-5-205" onclick="showPlotDetails(5, '205')">205</div>
<div class="plot plot-5-206" onclick="showPlotDetails(5, '206')">206</div>
<div class="plot plot-5-207" onclick="showPlotDetails(5, '207')">207</div>
<div class="plot plot-5-208" onclick="showPlotDetails(5, '208')">208</div>
<div class="plot plot-5-209" onclick="showPlotDetails(5, '209')">209</div>
<div class="plot plot-5-210" onclick="showPlotDetails(5, '210')">210</div>
<div class="plot plot-5-211" onclick="showPlotDetails(5, '211')">211</div>
<div class="plot plot-5-212" onclick="showPlotDetails(5, '212')">212</div>
<div class="plot plot-5-213" onclick="showPlotDetails(5, '213')">213</div>
<div class="plot plot-5-214" onclick="showPlotDetails(5, '214')">214</div>
<div class="plot plot-5-215" onclick="showPlotDetails(5, '215')">215</div>
<div class="plot plot-5-216" onclick="showPlotDetails(5, '216')">216</div>
<div class="plot plot-5-217" onclick="showPlotDetails(5, '217')">217</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-5-218" onclick="showPlotDetails(5, '218')">218</div>
<div class="plot plot-5-219" onclick="showPlotDetails(5, '219')">219</div>
<div class="plot plot-5-220" onclick="showPlotDetails(5, '220')">220</div>
<div class="plot plot-5-221" onclick="showPlotDetails(5, '221')">221</div>
<div class="plot plot-5-222" onclick="showPlotDetails(5, '222')">222</div>
<div class="plot plot-5-223" onclick="showPlotDetails(5, '223')">223</div>
<div class="plot plot-5-224" onclick="showPlotDetails(5, '224')">224</div>
<div class="plot plot-5-225" onclick="showPlotDetails(5, '225')">225</div>
<div class="plot plot-5-226" onclick="showPlotDetails(5, '226')">226</div>
<div class="plot plot-5-227" onclick="showPlotDetails(5, '227')">227</div>
<div class="plot plot-5-228" onclick="showPlotDetails(5, '228')">228</div>
<div class="plot plot-5-229" onclick="showPlotDetails(5, '229')">229</div>
<div class="plot plot-5-230" onclick="showPlotDetails(5, '230')">230</div>
<div class="plot plot-5-231" onclick="showPlotDetails(5, '231')">231</div>
<div class="plot plot-5-232" onclick="showPlotDetails(5, '232')">232</div>
<div class="plot plot-5-233" onclick="showPlotDetails(5, '233')">233</div>
<div class="plot plot-5-234" onclick="showPlotDetails(5, '234')">234</div>
<div class="plot plot-5-235" onclick="showPlotDetails(5, '235')">235</div>
<div class="plot plot-5-236" onclick="showPlotDetails(5, '236')">236</div>
<div class="plot plot-5-237" onclick="showPlotDetails(5, '237')">237</div>
<div class="plot plot-5-238" onclick="showPlotDetails(5, '238')">238</div>
<div class="plot plot-5-239" onclick="showPlotDetails(5, '239')">239</div>
<div class="plot plot-5-240" onclick="showPlotDetails(5, '240')">240</div>
<div class="plot plot-5-241" onclick="showPlotDetails(5, '241')">241</div>
<div class="plot plot-5-242" onclick="showPlotDetails(5, '242')">242</div>
<div class="plot plot-5-243" onclick="showPlotDetails(5, '243')">243</div>
<div class="plot plot-5-244" onclick="showPlotDetails(5, '244')">244</div>
<div class="plot plot-5-245" onclick="showPlotDetails(5, '245')">245</div>
<div class="plot plot-5-246" onclick="showPlotDetails(5, '246')">246</div>
<div class="plot plot-5-247" onclick="showPlotDetails(5, '247')">247</div>
<div class="plot plot-5-248" onclick="showPlotDetails(5, '248')">248</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-5-249" onclick="showPlotDetails(5, '249')">249</div>
<div class="plot plot-5-250" onclick="showPlotDetails(5, '250')">250</div>
<div class="plot plot-5-251" onclick="showPlotDetails(5, '251')">251</div>
<div class="plot plot-5-252" onclick="showPlotDetails(5, '252')">252</div>
<div class="plot plot-5-253" onclick="showPlotDetails(5, '253')">253</div>
<div class="plot plot-5-254" onclick="showPlotDetails(5, '254')">254</div>
<div class="plot plot-5-255" onclick="showPlotDetails(5, '255')">255</div>
<div class="plot plot-5-256" onclick="showPlotDetails(5, '256')">256</div>
<div class="plot plot-5-257" onclick="showPlotDetails(5, '257')">257</div>
<div class="plot plot-5-258" onclick="showPlotDetails(5, '258')">258</div>
<div class="plot plot-5-259" onclick="showPlotDetails(5, '259')">259</div>
<div class="plot plot-5-260" onclick="showPlotDetails(5, '260')">260</div>
<div class="plot plot-5-261" onclick="showPlotDetails(5, '261')">261</div>
<div class="plot plot-5-262" onclick="showPlotDetails(5, '262')">262</div>
<div class="plot plot-5-263" onclick="showPlotDetails(5, '263')">263</div>
<div class="plot plot-5-264" onclick="showPlotDetails(5, '264')">264</div>
<div class="plot plot-5-265" onclick="showPlotDetails(5, '265')">265</div>
<div class="plot plot-5-266" onclick="showPlotDetails(5, '266')">266</div>
<div class="plot plot-5-267" onclick="showPlotDetails(5, '267')">267</div>
<div class="plot plot-5-268" onclick="showPlotDetails(5, '268')">268</div>
<div class="plot plot-5-269" onclick="showPlotDetails(5, '269')">269</div>
<div class="plot plot-5-270" onclick="showPlotDetails(5, '270')">270</div>
<div class="plot plot-5-271" onclick="showPlotDetails(5, '271')">271</div>
<div class="plot plot-5-272" onclick="showPlotDetails(5, '272')">272</div>
<div class="plot plot-5-273" onclick="showPlotDetails(5, '273')">273</div>
<div class="plot plot-5-274" onclick="showPlotDetails(5, '274')">274</div>
<div class="plot plot-5-275" onclick="showPlotDetails(5, '275')">275</div>
<div class="plot plot-5-276" onclick="showPlotDetails(5, '276')">276</div>
<div class="plot plot-5-277" onclick="showPlotDetails(5, '277')">277</div>
<div class="plot plot-5-278" onclick="showPlotDetails(5, '278')">278</div>
<div class="plot plot-5-279" onclick="showPlotDetails(5, '279')">279</div>
<div class="d0"></div>
<div class="d0"></div>
<div class="plot plot-5-280" onclick="showPlotDetails(5, '280')">280</div>
<div class="plot plot-5-281" onclick="showPlotDetails(5, '281')">281</div>
<div class="plot plot-5-282" onclick="showPlotDetails(5, '282')">282</div>
<div class="plot plot-5-283" onclick="showPlotDetails(5, '283')">283</div>
<div class="plot plot-5-284" onclick="showPlotDetails(5, '284')">284</div>
<div class="plot plot-5-285" onclick="showPlotDetails(5, '285')">285</div>
<div class="plot plot-5-286" onclick="showPlotDetails(5, '286')">286</div>
<div class="plot plot-5-287" onclick="showPlotDetails(5, '287')">287</div>
<div class="plot plot-5-288" onclick="showPlotDetails(5, '288')">288</div>
<div class="plot plot-5-289" onclick="showPlotDetails(5, '289')">289</div>
<div class="plot plot-5-290" onclick="showPlotDetails(5, '290')">290</div>
<div class="plot plot-5-291" onclick="showPlotDetails(5, '291')">291</div>
<div class="plot plot-5-292" onclick="showPlotDetails(5, '292')">292</div>
<div class="plot plot-5-293" onclick="showPlotDetails(5, '293')">293</div>
<div class="plot plot-5-294" onclick="showPlotDetails(5, '294')">294</div>
<div class="plot plot-5-295" onclick="showPlotDetails(5, '295')">295</div>
<div class="plot plot-5-296" onclick="showPlotDetails(5, '296')">296</div>
<div class="plot plot-5-297" onclick="showPlotDetails(5, '297')">297</div>
<div class="plot plot-5-298" onclick="showPlotDetails(5, '298')">298</div>
<div class="plot plot-5-299" onclick="showPlotDetails(5, '299')">299</div>
<div class="plot plot-5-300" onclick="showPlotDetails(5, '300')">300</div>
<div class="plot plot-5-301" onclick="showPlotDetails(5, '301')">301</div>
<div class="plot plot-5-302" onclick="showPlotDetails(5, '302')">302</div>
<div class="plot plot-5-303" onclick="showPlotDetails(5, '303')">303</div>
<div class="plot plot-5-304" onclick="showPlotDetails(5, '304')">304</div>
<div class="plot plot-5-305" onclick="showPlotDetails(5, '305')">305</div>
<div class="plot plot-5-306" onclick="showPlotDetails(5, '306')">306</div>
<div class="plot plot-5-307" onclick="showPlotDetails(5, '307')">307</div>
<div class="plot plot-5-308" onclick="showPlotDetails(5, '308')">308</div>
<div class="plot plot-5-309" onclick="showPlotDetails(5, '309')">309</div>
<div class="plot plot-5-310" onclick="showPlotDetails(5, '310')">310</div>
<div class="d0"></div>
<div class="plot plot-5-311" onclick="showPlotDetails(5, '311')">311</div>
<div class="plot plot-5-312" onclick="showPlotDetails(5, '312')">312</div>
<div class="plot plot-5-313" onclick="showPlotDetails(5, '313')">313</div>
<div class="plot plot-5-314" onclick="showPlotDetails(5, '314')">314</div>
<div class="plot plot-5-315" onclick="showPlotDetails(5, '315')">315</div>
<div class="plot plot-5-316" onclick="showPlotDetails(5, '316')">316</div>
<div class="plot plot-5-317" onclick="showPlotDetails(5, '317')">317</div>
<div class="plot plot-5-318" onclick="showPlotDetails(5, '318')">318</div>
<div class="plot plot-5-319" onclick="showPlotDetails(5, '319')">319</div>
<div class="plot plot-5-320" onclick="showPlotDetails(5, '320')">320</div>
<div class="plot plot-5-321" onclick="showPlotDetails(5, '321')">321</div>
<div class="plot plot-5-322" onclick="showPlotDetails(5, '322')">322</div>
<div class="plot plot-5-323" onclick="showPlotDetails(5, '323')">323</div>
<div class="plot plot-5-324" onclick="showPlotDetails(5, '324')">324</div>
<div class="plot plot-5-325" onclick="showPlotDetails(5, '325')">325</div>
<div class="plot plot-5-326" onclick="showPlotDetails(5, '326')">326</div>
<div class="plot plot-5-327" onclick="showPlotDetails(5, '327')">327</div>
<div class="plot plot-5-328" onclick="showPlotDetails(5, '328')">328</div>
<div class="plot plot-5-329" onclick="showPlotDetails(5, '329')">329</div>
<div class="plot plot-5-330" onclick="showPlotDetails(5, '330')">330</div>
<div class="plot plot-5-331" onclick="showPlotDetails(5, '331')">331</div>
<div class="plot plot-5-332" onclick="showPlotDetails(5, '332')">332</div>
<div class="plot plot-5-333" onclick="showPlotDetails(5, '333')">333</div>
<div class="plot plot-5-334" onclick="showPlotDetails(5, '334')">334</div>
<div class="plot plot-5-335" onclick="showPlotDetails(5, '335')">335</div>
<div class="plot plot-5-336" onclick="showPlotDetails(5, '336')">336</div>
<div class="plot plot-5-337" onclick="showPlotDetails(5, '337')">337</div>
<div class="plot plot-5-338" onclick="showPlotDetails(5, '338')">338</div>
<div class="plot plot-5-339" onclick="showPlotDetails(5, '339')">339</div>
<div class="plot plot-5-340" onclick="showPlotDetails(5, '340')">340</div>
<div class="plot plot-5-341" onclick="showPlotDetails(5, '341')">341</div>
<div class="plot plot-5-342" onclick="showPlotDetails(5, '342')">342</div>
<div class="d0"></div>
<div class="plot plot-5-343" onclick="showPlotDetails(5, '343')">343</div>
<div class="plot plot-5-344" onclick="showPlotDetails(5, '344')">344</div>
<div class="plot plot-5-345" onclick="showPlotDetails(5, '345')">345</div>
<div class="plot plot-5-346" onclick="showPlotDetails(5, '346')">346</div>
<div class="plot plot-5-347" onclick="showPlotDetails(5, '347')">347</div>
<div class="plot plot-5-348" onclick="showPlotDetails(5, '348')">348</div>
<div class="plot plot-5-349" onclick="showPlotDetails(5, '349')">349</div>
<div class="plot plot-5-350" onclick="showPlotDetails(5, '350')">350</div>
<div class="plot plot-5-351" onclick="showPlotDetails(5, '351')">351</div>
<div class="plot plot-5-352" onclick="showPlotDetails(5, '352')">352</div>
<div class="plot plot-5-353" onclick="showPlotDetails(5, '353')">353</div>
<div class="plot plot-5-354" onclick="showPlotDetails(5, '354')">354</div>
<div class="plot plot-5-355" onclick="showPlotDetails(5, '355')">355</div>
<div class="plot plot-5-356" onclick="showPlotDetails(5, '356')">356</div>
<div class="plot plot-5-357" onclick="showPlotDetails(5, '357')">357</div>
<div class="plot plot-5-358" onclick="showPlotDetails(5, '358')">358</div>
<div class="plot plot-5-359" onclick="showPlotDetails(5, '359')">359</div>
<div class="plot plot-5-360" onclick="showPlotDetails(5, '360')">360</div>
<div class="plot plot-5-361" onclick="showPlotDetails(5, '361')">361</div>
<div class="plot plot-5-362" onclick="showPlotDetails(5, '362')">362</div>
<div class="plot plot-5-363" onclick="showPlotDetails(5, '363')">363</div>
<div class="plot plot-5-364" onclick="showPlotDetails(5, '364')">364</div>
<div class="plot plot-5-365" onclick="showPlotDetails(5, '365')">365</div>
<div class="plot plot-5-366" onclick="showPlotDetails(5, '366')">366</div>
<div class="plot plot-5-367" onclick="showPlotDetails(5, '367')">367</div>
<div class="plot plot-5-368" onclick="showPlotDetails(5, '368')">368</div>
<div class="plot plot-5-369" onclick="showPlotDetails(5, '369')">369</div>
<div class="plot plot-5-370" onclick="showPlotDetails(5, '370')">370</div>
<div class="plot plot-5-371" onclick="showPlotDetails(5, '371')">371</div>
<div class="plot plot-5-372" onclick="showPlotDetails(5, '372')">372</div>
<div class="plot plot-5-373" onclick="showPlotDetails(5, '373')">373</div>
<div class="plot plot-5-374" onclick="showPlotDetails(5, '374')">374</div>
<div class="d0"></div>
<div class="plot plot-5-375" onclick="showPlotDetails(5, '375')">375</div>
<div class="plot plot-5-376" onclick="showPlotDetails(5, '376')">376</div>
<div class="plot plot-5-377" onclick="showPlotDetails(5, '377')">377</div>
<div class="plot plot-5-378" onclick="showPlotDetails(5, '378')">378</div>
<div class="plot plot-5-379" onclick="showPlotDetails(5, '379')">379</div>
<div class="plot plot-5-380" onclick="showPlotDetails(5, '380')">380</div>
<div class="plot plot-5-381" onclick="showPlotDetails(5, '381')">381</div>
<div class="plot plot-5-382" onclick="showPlotDetails(5, '382')">382</div>
<div class="plot plot-5-383" onclick="showPlotDetails(5, '383')">383</div>
<div class="plot plot-5-384" onclick="showPlotDetails(5, '384')">384</div>
<div class="plot plot-5-385" onclick="showPlotDetails(5, '385')">385</div>
<div class="plot plot-5-386" onclick="showPlotDetails(5, '386')">386</div>
<div class="plot plot-5-387" onclick="showPlotDetails(5, '387')">387</div>
<div class="plot plot-5-388" onclick="showPlotDetails(5, '388')">388</div>
<div class="plot plot-5-389" onclick="showPlotDetails(5, '389')">389</div>
<div class="plot plot-5-390" onclick="showPlotDetails(5, '390')">390</div>
<div class="plot plot-5-391" onclick="showPlotDetails(5, '391')">391</div>
<div class="plot plot-5-392" onclick="showPlotDetails(5, '392')">392</div>
<div class="plot plot-5-393" onclick="showPlotDetails(5, '393')">393</div>
<div class="plot plot-5-394" onclick="showPlotDetails(5, '394')">394</div>
<div class="plot plot-5-395" onclick="showPlotDetails(5, '395')">395</div>
<div class="plot plot-5-396" onclick="showPlotDetails(5, '396')">396</div>
<div class="plot plot-5-397" onclick="showPlotDetails(5, '397')">397</div>
<div class="plot plot-5-398" onclick="showPlotDetails(5, '398')">398</div>
<div class="plot plot-5-399" onclick="showPlotDetails(5, '399')">399</div>
<div class="plot plot-5-400" onclick="showPlotDetails(5, '400')">400</div>
<div class="plot plot-5-401" onclick="showPlotDetails(5, '401')">401</div>
<div class="plot plot-5-402" onclick="showPlotDetails(5, '402')">402</div>
<div class="plot plot-5-403" onclick="showPlotDetails(5, '403')">403</div>
<div class="plot plot-5-404" onclick="showPlotDetails(5, '404')">404</div>
<div class="plot plot-5-405" onclick="showPlotDetails(5, '405')">405</div>
<div class="plot plot-5-406" onclick="showPlotDetails(5, '406')">406</div>
<div class="d0"></div>
<div class="plot plot-5-407" onclick="showPlotDetails(5, '407')">407</div>
<div class="plot plot-5-408" onclick="showPlotDetails(5, '408')">408</div>
<div class="plot plot-5-409" onclick="showPlotDetails(5, '409')">409</div>
<div class="plot plot-5-410" onclick="showPlotDetails(5, '410')">410</div>
<div class="plot plot-5-411" onclick="showPlotDetails(5, '411')">411</div>
<div class="plot plot-5-412" onclick="showPlotDetails(5, '412')">412</div>
<div class="plot plot-5-413" onclick="showPlotDetails(5, '413')">413</div>
<div class="plot plot-5-414" onclick="showPlotDetails(5, '414')">414</div>
<div class="plot plot-5-415" onclick="showPlotDetails(5, '415')">415</div>
<div class="plot plot-5-416" onclick="showPlotDetails(5, '416')">416</div>
<div class="plot plot-5-417" onclick="showPlotDetails(5, '417')">417</div>
<div class="plot plot-5-418" onclick="showPlotDetails(5, '418')">418</div>
<div class="plot plot-5-419" onclick="showPlotDetails(5, '419')">419</div>
<div class="plot plot-5-420" onclick="showPlotDetails(5, '420')">420</div>
<div class="plot plot-5-421" onclick="showPlotDetails(5, '421')">421</div>
<div class="plot plot-5-422" onclick="showPlotDetails(5, '422')">422</div>
<div class="plot plot-5-423" onclick="showPlotDetails(5, '423')">423</div>
<div class="plot plot-5-424" onclick="showPlotDetails(5, '424')">424</div>
<div class="plot plot-5-425" onclick="showPlotDetails(5, '425')">425</div>
<div class="plot plot-5-426" onclick="showPlotDetails(5, '426')">426</div>
<div class="plot plot-5-427" onclick="showPlotDetails(5, '427')">427</div>
<div class="plot plot-5-428" onclick="showPlotDetails(5, '428')">428</div>
<div class="plot plot-5-429" onclick="showPlotDetails(5, '429')">429</div>
<div class="plot plot-5-430" onclick="showPlotDetails(5, '430')">430</div>
<div class="plot plot-5-431" onclick="showPlotDetails(5, '431')">431</div>
<div class="plot plot-5-432" onclick="showPlotDetails(5, '432')">432</div>
<div class="plot plot-5-433" onclick="showPlotDetails(5, '433')">433</div>
<div class="plot plot-5-434" onclick="showPlotDetails(5, '434')">434</div>
<div class="plot plot-5-435" onclick="showPlotDetails(5, '435')">435</div>
<div class="plot plot-5-436" onclick="showPlotDetails(5, '436')">436</div>
<div class="plot plot-5-437" onclick="showPlotDetails(5, '437')">437</div>
<div class="plot plot-5-438" onclick="showPlotDetails(5, '438')">438</div>
<div class="d0"></div>
<div class="plot plot-5-439" onclick="showPlotDetails(5, '439')">439</div>
<div class="plot plot-5-440" onclick="showPlotDetails(5, '440')">440</div>
<div class="plot plot-5-441" onclick="showPlotDetails(5, '441')">441</div>
<div class="plot plot-5-442" onclick="showPlotDetails(5, '442')">442</div>
<div class="plot plot-5-443" onclick="showPlotDetails(5, '443')">443</div>
<div class="plot plot-5-444" onclick="showPlotDetails(5, '444')">444</div>
<div class="plot plot-5-445" onclick="showPlotDetails(5, '445')">445</div>
<div class="plot plot-5-446" onclick="showPlotDetails(5, '446')">446</div>
<div class="plot plot-5-447" onclick="showPlotDetails(5, '447')">447</div>
<div class="plot plot-5-448" onclick="showPlotDetails(5, '448')">448</div>
<div class="plot plot-5-449" onclick="showPlotDetails(5, '449')">449</div>
<div class="plot plot-5-450" onclick="showPlotDetails(5, '450')">450</div>
<div class="plot plot-5-451" onclick="showPlotDetails(5, '451')">451</div>
<div class="plot plot-5-452" onclick="showPlotDetails(5, '452')">452</div>
<div class="plot plot-5-453" onclick="showPlotDetails(5, '453')">453</div>
<div class="plot plot-5-454" onclick="showPlotDetails(5, '454')">454</div>
<div class="plot plot-5-455" onclick="showPlotDetails(5, '455')">455</div>
<div class="plot plot-5-456" onclick="showPlotDetails(5, '456')">456</div>
<div class="plot plot-5-457" onclick="showPlotDetails(5, '457')">457</div>
<div class="plot plot-5-458" onclick="showPlotDetails(5, '458')">458</div>
<div class="plot plot-5-459" onclick="showPlotDetails(5, '459')">459</div>
<div class="plot plot-5-460" onclick="showPlotDetails(5, '460')">460</div>
<div class="plot plot-5-461" onclick="showPlotDetails(5, '461')">461</div>
<div class="plot plot-5-462" onclick="showPlotDetails(5, '462')">462</div>
<div class="plot plot-5-463" onclick="showPlotDetails(5, '463')">463</div>
<div class="plot plot-5-464" onclick="showPlotDetails(5, '464')">464</div>
<div class="plot plot-5-465" onclick="showPlotDetails(5, '465')">465</div>
<div class="plot plot-5-466" onclick="showPlotDetails(5, '466')">466</div>
<div class="plot plot-5-467" onclick="showPlotDetails(5, '467')">467</div>
<div class="plot plot-5-468" onclick="showPlotDetails(5, '468')">468</div>
<div class="plot plot-5-469" onclick="showPlotDetails(5, '469')">469</div>
<div class="plot plot-5-470" onclick="showPlotDetails(5, '470')">470</div>
<div class="d0"></div>

<div class="plot plot-5-471" onclick="showPlotDetails(5, '471')">471</div>
<div class="plot plot-5-472" onclick="showPlotDetails(5, '472')">472</div>
<div class="plot plot-5-473" onclick="showPlotDetails(5, '473')">473</div>
<div class="plot plot-5-474" onclick="showPlotDetails(5, '474')">474</div>
<div class="plot plot-5-475" onclick="showPlotDetails(5, '475')">475</div>
<div class="plot plot-5-476" onclick="showPlotDetails(5, '476')">476</div>
<div class="plot plot-5-477" onclick="showPlotDetails(5, '477')">477</div>
<div class="plot plot-5-478" onclick="showPlotDetails(5, '478')">478</div>
<div class="plot plot-5-479" onclick="showPlotDetails(5, '479')">479</div>
<div class="plot plot-5-480" onclick="showPlotDetails(5, '478')">480</div>
<div class="plot plot-5-481" onclick="showPlotDetails(5, '481')">481</div>
<div class="plot plot-5-482" onclick="showPlotDetails(5, '482')">482</div>
<div class="plot plot-5-483" onclick="showPlotDetails(5, '483')">483</div>
<div class="plot plot-5-484" onclick="showPlotDetails(5, '484')">484</div>
<div class="plot plot-5-485" onclick="showPlotDetails(5, '485')">485</div>
<div class="plot plot-5-486" onclick="showPlotDetails(5, '486')">486</div>
<div class="plot plot-5-487" onclick="showPlotDetails(5, '487')">487</div>
<div class="plot plot-5-488" onclick="showPlotDetails(5, '488')">488</div>
<div class="plot plot-5-489" onclick="showPlotDetails(5, '489')">489</div>
<div class="plot plot-5-490" onclick="showPlotDetails(5, '490')">490</div>
<div class="plot plot-5-491" onclick="showPlotDetails(5, '491')">491</div>
<div class="plot plot-5-492" onclick="showPlotDetails(5, '492')">492</div>
<div class="plot plot-5-493" onclick="showPlotDetails(5, '493')">493</div>
<div class="plot plot-5-494" onclick="showPlotDetails(5, '494')">494</div>
<div class="plot plot-5-495" onclick="showPlotDetails(5, '495')">495</div>
<div class="plot plot-5-496" onclick="showPlotDetails(5, '496')">496</div>
<div class="plot plot-5-497" onclick="showPlotDetails(5, '497')">497</div>
<div class="plot plot-5-498" onclick="showPlotDetails(5, '498')">498</div>
<div class="plot plot-5-499" onclick="showPlotDetails(5, '499')">499</div>
<div class="plot plot-5-500" onclick="showPlotDetails(5, '500')">500</div>
<div class="plot plot-5-501" onclick="showPlotDetails(5, '501')">501</div>
<div class="plot plot-5-502" onclick="showPlotDetails(5, '502')">502</div>
<div class="plot plot-5-503" onclick="showPlotDetails(5, '503')">503</div>
<div class="plot plot-5-504" onclick="showPlotDetails(5, '504')">504</div>
<div class="plot plot-5-505" onclick="showPlotDetails(5, '505')">505</div>
<div class="plot plot-5-506" onclick="showPlotDetails(5, '506')">506</div>
<div class="plot plot-5-507" onclick="showPlotDetails(5, '507')">507</div>
<div class="plot plot-5-508" onclick="showPlotDetails(5, '508')">508</div>
<div class="plot plot-5-509" onclick="showPlotDetails(5, '509')">509</div>
<div class="plot plot-5-510" onclick="showPlotDetails(5, '510')">510</div>
<div class="plot plot-5-511" onclick="showPlotDetails(5, '511')">511</div>
<div class="plot plot-5-512" onclick="showPlotDetails(5, '512')">512</div>
<div class="plot plot-5-513" onclick="showPlotDetails(5, '513')">513</div>
<div class="plot plot-5-514" onclick="showPlotDetails(5, '514')">514</div>
<div class="plot plot-5-515" onclick="showPlotDetails(5, '515')">515</div>
<div class="plot plot-5-516" onclick="showPlotDetails(5, '516')">516</div>
<div class="plot plot-5-517" onclick="showPlotDetails(5, '517')">517</div>
<div class="plot plot-5-518" onclick="showPlotDetails(5, '518')">518</div>
<div class="plot plot-5-519" onclick="showPlotDetails(5, '519')">519</div>
<div class="plot plot-5-520" onclick="showPlotDetails(5, '520')">520</div>
<div class="plot plot-5-521" onclick="showPlotDetails(5, '521')">521</div>
<div class="plot plot-5-522" onclick="showPlotDetails(5, '522')">522</div>
<div class="plot plot-5-523" onclick="showPlotDetails(5, '523')">523</div>
<div class="plot plot-5-524" onclick="showPlotDetails(5, '524')">524</div>
<div class="plot plot-5-525" onclick="showPlotDetails(5, '525')">525</div>
<div class="plot plot-5-526" onclick="showPlotDetails(5, '526')">526</div>
<div class="plot plot-5-527" onclick="showPlotDetails(5, '527')">527</div>
<div class="plot plot-5-528" onclick="showPlotDetails(5, '528')">528</div>
<div class="plot plot-5-529" onclick="showPlotDetails(5, '529')">529</div>
<div class="plot plot-5-530" onclick="showPlotDetails(5, '530')">530</div>
<div class="plot plot-5-531" onclick="showPlotDetails(5, '531')">531</div>
<div class="plot plot-5-532" onclick="showPlotDetails(5, '532')">532</div>
<div class="plot plot-5-533" onclick="showPlotDetails(5, '533')">533</div>
<div class="plot plot-5-534" onclick="showPlotDetails(5, '534')">534</div>
<div class="plot plot-5-535" onclick="showPlotDetails(5, '535')">535</div>

<div class="plot plot-5-536" onclick="showPlotDetails(5, '536')">536</div>
<div class="plot plot-5-537" onclick="showPlotDetails(5, '537')">537</div>
<div class="plot plot-5-538" onclick="showPlotDetails(5, '538')">538</div>
<div class="plot plot-5-539" onclick="showPlotDetails(5, '539')">539</div>
<div class="plot plot-5-540" onclick="showPlotDetails(5, '540')">540</div>
<div class="plot plot-5-541" onclick="showPlotDetails(5, '541')">541</div>
<div class="plot plot-5-542" onclick="showPlotDetails(5, '542')">542</div>
<div class="plot plot-5-543" onclick="showPlotDetails(5, '543')">543</div>
<div class="plot plot-5-544" onclick="showPlotDetails(5, '544')">544</div>
<div class="plot plot-5-545" onclick="showPlotDetails(5, '545')">545</div>
<div class="plot plot-5-546" onclick="showPlotDetails(5, '546')">546</div>
<div class="plot plot-5-547" onclick="showPlotDetails(5, '547')">547</div>
<div class="plot plot-5-548" onclick="showPlotDetails(5, '548')">548</div>
<div class="plot plot-5-549" onclick="showPlotDetails(5, '549')">549</div>
<div class="plot plot-5-550" onclick="showPlotDetails(5, '550')">550</div>
<div class="plot plot-5-551" onclick="showPlotDetails(5, '551')">551</div>
<div class="plot plot-5-552" onclick="showPlotDetails(5, '552')">552</div>
<div class="plot plot-5-553" onclick="showPlotDetails(5, '553')">553</div>
<div class="plot plot-5-554" onclick="showPlotDetails(5, '554')">554</div>
<div class="plot plot-5-555" onclick="showPlotDetails(5, '555')">555</div>
<div class="plot plot-5-556" onclick="showPlotDetails(5, '556')">556</div>
<div class="plot plot-5-557" onclick="showPlotDetails(5, '557')">557</div>
<div class="plot plot-5-558" onclick="showPlotDetails(5, '558')">558</div>
<div class="plot plot-5-559" onclick="showPlotDetails(5, '559')">559</div>
<div class="plot plot-5-560" onclick="showPlotDetails(5, '560')">560</div>
<div class="plot plot-5-561" onclick="showPlotDetails(5, '561')">561</div>
<div class="plot plot-5-562" onclick="showPlotDetails(5, '562')">562</div>
<div class="plot plot-5-563" onclick="showPlotDetails(5, '563')">563</div>
<div class="plot plot-5-564" onclick="showPlotDetails(5, '564')">564</div>
<div class="plot plot-5-565" onclick="showPlotDetails(5, '565')">565</div>
<div class="plot plot-5-566" onclick="showPlotDetails(5, '566')">566</div>
<div class="plot plot-5-567" onclick="showPlotDetails(5, '567')">567</div>
<div class="plot plot-5-568" onclick="showPlotDetails(5, '568')">568</div>
<div class="plot plot-5-569" onclick="showPlotDetails(5, '569')">569</div>
<div class="plot plot-5-570" onclick="showPlotDetails(5, '570')">570</div>
<div class="plot plot-5-571" onclick="showPlotDetails(5, '571')">571</div>
<div class="plot plot-5-572" onclick="showPlotDetails(5, '572')">572</div>
<div class="plot plot-5-573" onclick="showPlotDetails(5, '573')">573</div>
<div class="plot plot-5-574" onclick="showPlotDetails(5, '574')">574</div>
<div class="plot plot-5-575" onclick="showPlotDetails(5, '575')">575</div>
<div class="plot plot-5-576" onclick="showPlotDetails(5, '576')">576</div>
<div class="plot plot-5-577" onclick="showPlotDetails(5, '577')">577</div>
<div class="plot plot-5-578" onclick="showPlotDetails(5, '578')">578</div>
<div class="plot plot-5-579" onclick="showPlotDetails(5, '579')">579</div>
<div class="plot plot-5-580" onclick="showPlotDetails(5, '580')">580</div>
<div class="plot plot-5-581" onclick="showPlotDetails(5, '581')">581</div>
<div class="plot plot-5-582" onclick="showPlotDetails(5, '582')">582</div>
<div class="plot plot-5-583" onclick="showPlotDetails(5, '583')">583</div>
<div class="plot plot-5-584" onclick="showPlotDetails(5, '584')">584</div>
<div class="plot plot-5-585" onclick="showPlotDetails(5, '585')">585</div>
<div class="plot plot-5-586" onclick="showPlotDetails(5, '586')">586</div>
<div class="plot plot-5-587" onclick="showPlotDetails(5, '587')">587</div>
<div class="plot plot-5-588" onclick="showPlotDetails(5, '588')">588</div>
<div class="plot plot-5-589" onclick="showPlotDetails(5, '589')">589</div>
<div class="plot plot-5-590" onclick="showPlotDetails(5, '590')">590</div>
<div class="plot plot-5-591" onclick="showPlotDetails(5, '591')">591</div>
<div class="plot plot-5-592" onclick="showPlotDetails(5, '592')">592</div>
<div class="plot plot-5-593" onclick="showPlotDetails(5, '593')">593</div>
<div class="plot plot-5-594" onclick="showPlotDetails(5, '594')">594</div>
<div class="plot plot-5-595" onclick="showPlotDetails(5, '595')">595</div>
<div class="plot plot-5-596" onclick="showPlotDetails(5, '596')">596</div>
<div class="plot plot-5-597" onclick="showPlotDetails(5, '597')">597</div>
<div class="plot plot-5-598" onclick="showPlotDetails(5, '598')">598</div>
<div class="plot plot-5-599" onclick="showPlotDetails(5, '599')">599</div>
<div class="plot plot-5-600" onclick="showPlotDetails(5, '600')">600</div>
<div class="plot plot-5-601" onclick="showPlotDetails(5, '601')">601</div>
<div class="plot plot-5-602" onclick="showPlotDetails(5, '602')">602</div>
<div class="plot plot-5-603" onclick="showPlotDetails(5, '603')">603</div>
<div class="plot plot-5-604" onclick="showPlotDetails(5, '604')">604</div>
<div class="plot plot-5-605" onclick="showPlotDetails(5, '605')">605</div>
<div class="plot plot-5-606" onclick="showPlotDetails(5, '606')">606</div>
<div class="plot plot-5-607" onclick="showPlotDetails(5, '607')">607</div>
<div class="plot plot-5-608" onclick="showPlotDetails(5, '608')">608</div>
<div class="plot plot-5-609" onclick="showPlotDetails(5, '609')">609</div>
<div class="plot plot-5-610" onclick="showPlotDetails(5, '610')">610</div>
<div class="plot plot-5-611" onclick="showPlotDetails(5, '611')">611</div>
<div class="plot plot-5-612" onclick="showPlotDetails(5, '612')">612</div>
<div class="plot plot-5-613" onclick="showPlotDetails(5, '613')">613</div>
<div class="plot plot-5-614" onclick="showPlotDetails(5, '614')">614</div>
<div class="plot plot-5-615" onclick="showPlotDetails(5, '615')">615</div>
<div class="plot plot-5-616" onclick="showPlotDetails(5, '616')">616</div>
<div class="plot plot-5-617" onclick="showPlotDetails(5, '617')">617</div>
<div class="plot plot-5-618" onclick="showPlotDetails(5, '618')">618</div>
<div class="plot plot-5-619" onclick="showPlotDetails(5, '619')">619</div>
<div class="plot plot-5-620" onclick="showPlotDetails(5, '620')">620</div>
<div class="plot plot-5-621" onclick="showPlotDetails(5, '621')">621</div>
<div class="plot plot-5-622" onclick="showPlotDetails(5, '622')">622</div>
<div class="plot plot-5-623" onclick="showPlotDetails(5, '623')">623</div>
<div class="plot plot-5-624" onclick="showPlotDetails(5, '624')">624</div>
<div class="plot plot-5-625" onclick="showPlotDetails(5, '625')">625</div>
<div class="plot plot-5-626" onclick="showPlotDetails(5, '626')">626</div>
<div class="plot plot-5-627" onclick="showPlotDetails(5, '627')">627</div>
<div class="plot plot-5-628" onclick="showPlotDetails(5, '628')">628</div>
<div class="plot plot-5-629" onclick="showPlotDetails(5, '629')">629</div>
<div class="plot plot-5-630" onclick="showPlotDetails(5, '630')">630</div>
<div class="plot plot-5-631" onclick="showPlotDetails(5, '631')">631</div>
<div class="plot plot-5-632" onclick="showPlotDetails(5, '632')">632</div>
<div class="plot plot-5-633" onclick="showPlotDetails(5, '633')">633</div>
<div class="plot plot-5-634" onclick="showPlotDetails(5, '634')">634</div>

      </div>
      <style>
        .road{
          transform: rotate(-2deg);
      width: 120%;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
        }
        .rot{
          transform: rotate(92deg);
              }
              .rot2{
          transform: rotate(92deg);
              }
              .b7w1{
                right: 293px;
                          }
      </style>
      <div class="road">
        <hr style="color: black; width: 79%;" >
        <div class="ped">PEDESTRIAN SIDEWALK</div>
        <hr style="color: black; width: 79%;" >
        <b>GREEN PARK MEMORIAL GARDEN</b>
        <b>BLOCK 5</b>
        <hr style="color: black; width: 79%; margin-top: 28px;" >
        <div class="ped">PEDESTRIAN SIDEWALK</div>
        <hr style="color: black; width: 79%;" >
        <b class="pathwalk walk1 b7w1 rot" >2.00 M. WIDE PATHWALK</b>
        <b class="pathwalk walk2 b3w2 rot2">2.00 M. WIDE PATHWALK</b>
        
        <div class="two-way-traffic-sign b3t">
          <div class="arrow-container">
              <div class="arrow left"></div>
          </div>
          <div class="text">TWO WAY TRAFFIC ROAD</div>
          <div class="arrow-container">
              <div class="arrow right"></div>
          </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Modal HTML for Block 3 -->
<div id="block3Modal" class="modal">
  <div class="modal-content-map">
     <span>Block 3 Plots</span> <span class="close"onclick="closeModal('block3Modal')">&times;</span>
     <div class="modal-center">
      <b class="">2.00 M. WIDE PATHWALK</b>
      <div class="plots_con b3 rotator">
        <div class="d0"></div>
        <div class="d0"></div>
        <div style="transform: rotate(180deg);" class="plot plot-3-1" onclick="showPlotDetails(3, '1')">1</div>
        <div class="plot plot-3-2" onclick="showPlotDetails(3, '2')">2</div>
        <div class="plot plot-3-3" onclick="showPlotDetails(3, '3')">3</div>
        <div class="plot plot-3-4" onclick="showPlotDetails(3, '4')">4</div>
        <div class="plot plot-3-5" onclick="showPlotDetails(3, '5')">5</div>
        <div class="plot plot-3-6" onclick="showPlotDetails(3, '6')">6</div>
        <div class="plot plot-3-7" onclick="showPlotDetails(3, '7')">7</div>
        <div class="plot plot-3-8" onclick="showPlotDetails(3, '8')">8</div>
        <div class="plot plot-3-9" onclick="showPlotDetails(3, '9')">9</div>
        <div class="plot plot-3-10" onclick="showPlotDetails(3, '10')">10</div>
        <div class="plot plot-3-11" onclick="showPlotDetails(3, '11')">11</div>
        <div class="plot plot-3-12" onclick="showPlotDetails(3, '12')">12</div>
        <div class="plot plot-3-13" onclick="showPlotDetails(3, '13')">13</div>
        <div class="plot plot-3-14" onclick="showPlotDetails(3, '14')">14</div>
        <div class="plot plot-3-15" onclick="showPlotDetails(3, '15')">15</div>
        <div class="plot plot-3-16" onclick="showPlotDetails(3, '16')">16</div>
        <div class="plot plot-3-17" onclick="showPlotDetails(3, '17')">17</div>
        <div class="plot plot-3-18" onclick="showPlotDetails(3, '18')">18</div>
        <div class="plot plot-3-19" onclick="showPlotDetails(3, '19')">19</div>
        <div class="plot plot-3-20" onclick="showPlotDetails(3, '20')">20</div>
        <div class="plot plot-3-21" onclick="showPlotDetails(3, '21')">21</div>
        <div class="plot plot-3-22" onclick="showPlotDetails(3, '22')">22</div>
        <div class="plot plot-3-23" onclick="showPlotDetails(3, '23')">23</div>
        <div class="plot plot-3-24" onclick="showPlotDetails(3, '24')">24</div>
        <div class="plot plot-3-25" onclick="showPlotDetails(3, '25')">25</div>
        <div class="plot plot-3-26" onclick="showPlotDetails(3, '26')">26</div>
        <div class="plot plot-3-27" onclick="showPlotDetails(3, '27')">27</div>
        <div class="plot plot-3-28" onclick="showPlotDetails(3, '28')">28</div>
        <div class="plot plot-3-29" onclick="showPlotDetails(3, '29')">29</div>
        <div class="d0"></div>
        <div class="d0"></div>
        <div class="plot plot-3-30" onclick="showPlotDetails(3, '30')">30</div>
        <div class="plot plot-3-31" onclick="showPlotDetails(3, '31')">31</div>
        <div class="plot plot-3-32" onclick="showPlotDetails(3, '32')">32</div>
        <div class="plot plot-3-33" onclick="showPlotDetails(3, '33')">33</div>
        <div class="plot plot-3-34" onclick="showPlotDetails(3, '34')">34</div>
        <div class="plot plot-3-35" onclick="showPlotDetails(3, '35')">35</div>
        <div class="plot plot-3-36" onclick="showPlotDetails(3, '36')">36</div>
        <div class="plot plot-3-37" onclick="showPlotDetails(3, '37')">37</div>
        <div class="plot plot-3-38" onclick="showPlotDetails(3, '38')">38</div>
        <div class="plot plot-3-39" onclick="showPlotDetails(3, '39')">39</div>
        <div class="plot plot-3-40" onclick="showPlotDetails(3, '40')">40</div>
        <div class="plot plot-3-41" onclick="showPlotDetails(3, '41')">41</div>
        <div class="plot plot-3-42" onclick="showPlotDetails(3, '42')">42</div>
        <div class="plot plot-3-43" onclick="showPlotDetails(3, '43')">43</div>
        <div class="plot plot-3-44" onclick="showPlotDetails(3, '44')">44</div>
        <div class="plot plot-3-45" onclick="showPlotDetails(3, '45')">45</div>
        <div class="plot plot-3-46" onclick="showPlotDetails(3, '46')">46</div>
        <div class="plot plot-3-47" onclick="showPlotDetails(3, '47')">47</div>
        <div class="plot plot-3-48" onclick="showPlotDetails(3, '48')">48</div>
        <div class="plot plot-3-49" onclick="showPlotDetails(3, '49')">49</div>
        <div class="plot plot-3-50" onclick="showPlotDetails(3, '50')">50</div>
        <div class="plot plot-3-51" onclick="showPlotDetails(3, '51')">51</div>
        <div class="plot plot-3-52" onclick="showPlotDetails(3, '52')">52</div>
        <div class="plot plot-3-53" onclick="showPlotDetails(3, '53')">53</div>
        <div class="plot plot-3-54" onclick="showPlotDetails(3, '54')">54</div>
        <div class="plot plot-3-55" onclick="showPlotDetails(3, '55')">55</div>
        <div class="plot plot-3-56" onclick="showPlotDetails(3, '56')">56</div>
        <div class="plot plot-3-57" onclick="showPlotDetails(3, '57')">57</div>
        <div class="plot plot-3-58" onclick="showPlotDetails(3, '58')">58</div>
        <div class="d0"></div>
        <div class="d0"></div>
        <div class="plot plot-3-60" onclick="showPlotDetails(3, '60')">60</div>
        <div class="plot plot-3-61" onclick="showPlotDetails(3, '61')">61</div>
        <div class="plot plot-3-62" onclick="showPlotDetails(3, '62')">62</div>
        <div class="plot plot-3-63" onclick="showPlotDetails(3, '63')">63</div>
        <div class="plot plot-3-64" onclick="showPlotDetails(3, '64')">64</div>
        <div class="plot plot-3-65" onclick="showPlotDetails(3, '65')">65</div>
        <div class="plot plot-3-66" onclick="showPlotDetails(3, '66')">66</div>
        <div class="plot plot-3-67" onclick="showPlotDetails(3, '67')">67</div>
        <div class="plot plot-3-68" onclick="showPlotDetails(3, '68')">68</div>
        <div class="plot plot-3-69" onclick="showPlotDetails(3, '69')">69</div>
        <div class="plot plot-3-70" onclick="showPlotDetails(3, '70')">70</div>
        <div class="plot plot-3-71" onclick="showPlotDetails(3, '71')">71</div>
        <div class="plot plot-3-72" onclick="showPlotDetails(3, '72')">72</div>
        <div class="plot plot-3-73" onclick="showPlotDetails(3, '73')">73</div>
        <div class="plot plot-3-74" onclick="showPlotDetails(3, '74')">74</div>
        <div class="plot plot-3-75" onclick="showPlotDetails(3, '75')">75</div>
        <div class="plot plot-3-76" onclick="showPlotDetails(3, '76')">76</div>
        <div class="plot plot-3-77" onclick="showPlotDetails(3, '77')">77</div>
        <div class="plot plot-3-78" onclick="showPlotDetails(3, '78')">78</div>
        <div class="plot plot-3-79" onclick="showPlotDetails(3, '79')">79</div>
        <div class="plot plot-3-80" onclick="showPlotDetails(3, '80')">80</div>
        <div class="plot plot-3-81" onclick="showPlotDetails(3, '81')">81</div>
        <div class="plot plot-3-82" onclick="showPlotDetails(3, '82')">82</div>
        <div class="plot plot-3-83" onclick="showPlotDetails(3, '83')">83</div>
        <div class="plot plot-3-84" onclick="showPlotDetails(3, '84')">84</div>
        <div class="plot plot-3-85" onclick="showPlotDetails(3, '85')">85</div>
        <div class="plot plot-3-86" onclick="showPlotDetails(3, '86')">86</div>
        <div class="plot plot-3-87" onclick="showPlotDetails(3, '87')">87</div>
        <div class="plot plot-3-88" onclick="showPlotDetails(3, '88')">88</div>
        <div class="d0"></div>
        <div class="d0"></div>
        <div class="plot plot-3-89" onclick="showPlotDetails(3, '89')">89</div>
        <div class="plot plot-3-90" onclick="showPlotDetails(3, '90')">90</div>
        <div class="plot plot-3-91" onclick="showPlotDetails(3, '91')">91</div>
        <div class="plot plot-3-92" onclick="showPlotDetails(3, '92')">92</div>
        <div class="plot plot-3-93" onclick="showPlotDetails(3, '93')">93</div>
        <div class="plot plot-3-94" onclick="showPlotDetails(3, '94')">94</div>
        <div class="plot plot-3-95" onclick="showPlotDetails(3, '95')">95</div>
        <div class="plot plot-3-96" onclick="showPlotDetails(3, '96')">96</div>
        <div class="plot plot-3-97" onclick="showPlotDetails(3, '97')">97</div>
        <div class="plot plot-3-98" onclick="showPlotDetails(3, '98')">98</div>
        <div class="plot plot-3-99" onclick="showPlotDetails(3, '99')">99</div>
        <div class="plot plot-3-100" onclick="showPlotDetails(3, '100')">100</div>
        <div class="plot plot-3-101" onclick="showPlotDetails(3, '101')">101</div>
        <div class="plot plot-3-102" onclick="showPlotDetails(3, '102')">102</div>
        <div class="plot plot-3-103" onclick="showPlotDetails(3, '103')">103</div>
        <div class="plot plot-3-104" onclick="showPlotDetails(3, '104')">104</div>
        <div class="plot plot-3-105" onclick="showPlotDetails(3, '105')">105</div>
        <div class="plot plot-3-106" onclick="showPlotDetails(3, '106')">106</div>
        <div class="plot plot-3-107" onclick="showPlotDetails(3, '107')">107</div>
        <div class="plot plot-3-108" onclick="showPlotDetails(3, '108')">108</div>
        <div class="plot plot-3-109" onclick="showPlotDetails(3, '109')">109</div>
        <div class="plot plot-3-110" onclick="showPlotDetails(3, '110')">110</div>
        <div class="plot plot-3-111" onclick="showPlotDetails(3, '111')">111</div>
        <div class="plot plot-3-112" onclick="showPlotDetails(3, '112')">112</div>
        <div class="plot plot-3-113" onclick="showPlotDetails(3, '113')">113</div>
        <div class="plot plot-3-114" onclick="showPlotDetails(3, '114')">114</div>
        <div class="plot plot-3-115" onclick="showPlotDetails(3, '115')">115</div>
        <div class="plot plot-3-116" onclick="showPlotDetails(3, '116')">116</div>
        <div class="plot plot-3-117" onclick="showPlotDetails(3, '117')">117</div>
        
        
        <div class="d0"></div>
        <div class="d0"></div>
        <div class="plot plot-3-118" onclick="showPlotDetails(3, '118')">118</div>
        <div class="plot plot-3-119" onclick="showPlotDetails(3, '119')">119</div>
        <div class="plot plot-3-120" onclick="showPlotDetails(3, '120')">120</div>
        <div class="plot plot-3-121" onclick="showPlotDetails(3, '121')">121</div>
        <div class="plot plot-3-122" onclick="showPlotDetails(3, '122')">122</div>
        <div class="plot plot-3-123" onclick="showPlotDetails(3, '123')">123</div>
        <div class="plot plot-3-124" onclick="showPlotDetails(3, '124')">124</div>
        <div class="plot plot-3-125" onclick="showPlotDetails(3, '125')">125</div>
        <div class="plot plot-3-126" onclick="showPlotDetails(3, '126')">126</div>
        <div class="plot plot-3-127" onclick="showPlotDetails(3, '127')">127</div>
        <div class="plot plot-3-128" onclick="showPlotDetails(3, '128')">128</div>
        <div class="plot plot-3-129" onclick="showPlotDetails(3, '129')">129</div>
        <div class="plot plot-3-130" onclick="showPlotDetails(3, '130')">130</div>
        <div class="plot plot-3-131" onclick="showPlotDetails(3, '131')">131</div>
        <div class="plot plot-3-132" onclick="showPlotDetails(3, '132')">132</div>
        <div class="plot plot-3-133" onclick="showPlotDetails(3, '133')">133</div>
        <div class="plot plot-3-134" onclick="showPlotDetails(3, '134')">134</div>
        <div class="plot plot-3-135" onclick="showPlotDetails(3, '135')">135</div>
        <div class="plot plot-3-136" onclick="showPlotDetails(3, '136')">136</div>
        <div class="plot plot-3-137" onclick="showPlotDetails(3, '137')">137</div>
        <div class="plot plot-3-138" onclick="showPlotDetails(3, '138')">138</div>
        <div class="plot plot-3-139" onclick="showPlotDetails(3, '139')">139</div>
        <div class="plot plot-3-140" onclick="showPlotDetails(3, '140')">140</div>
        <div class="plot plot-3-141" onclick="showPlotDetails(3, '141')">141</div>
        <div class="plot plot-3-142" onclick="showPlotDetails(3, '142')">142</div>
        <div class="plot plot-3-143" onclick="showPlotDetails(3, '143')">143</div>
        <div class="plot plot-3-144" onclick="showPlotDetails(3, '144')">144</div>
        <div class="plot plot-3-145" onclick="showPlotDetails(3, '145')">145</div>
        <div class="plot plot-3-146" onclick="showPlotDetails(3, '146')">146</div>
        
        <div class="d0"></div>
        <div class="d0"></div>
        <div class="plot plot-3-147" onclick="showPlotDetails(3, '147')">147</div>
        <div class="plot plot-3-148" onclick="showPlotDetails(3, '148')">148</div>
        <div class="plot plot-3-149" onclick="showPlotDetails(3, '149')">149</div>
        <div class="plot plot-3-150" onclick="showPlotDetails(3, '150')">150</div>
        <div class="plot plot-3-151" onclick="showPlotDetails(3, '151')">151</div>
        <div class="plot plot-3-152" onclick="showPlotDetails(3, '152')">152</div>
        <div class="plot plot-3-153" onclick="showPlotDetails(3, '153')">153</div>
        <div class="plot plot-3-154" onclick="showPlotDetails(3, '154')">154</div>
        <div class="plot plot-3-155" onclick="showPlotDetails(3, '155')">155</div>
        <div class="plot plot-3-156" onclick="showPlotDetails(3, '156')">156</div>
        <div class="plot plot-3-157" onclick="showPlotDetails(3, '157')">157</div>
        <div class="plot plot-3-158" onclick="showPlotDetails(3, '158')">158</div>
        <div class="plot plot-3-159" onclick="showPlotDetails(3, '159')">159</div>
        <div class="plot plot-3-160" onclick="showPlotDetails(3, '160')">160</div>
        <div class="plot plot-3-161" onclick="showPlotDetails(3, '161')">161</div>
        <div class="plot plot-3-162" onclick="showPlotDetails(3, '162')">162</div>
        <div class="plot plot-3-163" onclick="showPlotDetails(3, '163')">163</div>
        <div class="plot plot-3-164" onclick="showPlotDetails(3, '164')">164</div>
        <div class="plot plot-3-165" onclick="showPlotDetails(3, '165')">165</div>
        <div class="plot plot-3-166" onclick="showPlotDetails(3, '166')">166</div>
        <div class="plot plot-3-167" onclick="showPlotDetails(3, '167')">167</div>
        <div class="plot plot-3-168" onclick="showPlotDetails(3, '168')">168</div>
        <div class="plot plot-3-169" onclick="showPlotDetails(3, '169')">169</div>
        <div class="plot plot-3-170" onclick="showPlotDetails(3, '170')">170</div>
        <div class="plot plot-3-171" onclick="showPlotDetails(3, '171')">171</div>
        <div class="plot plot-3-172" onclick="showPlotDetails(3, '172')">172</div>
        <div class="plot plot-3-173" onclick="showPlotDetails(3, '173')">173</div>
        <div class="plot plot-3-174" onclick="showPlotDetails(3, '174')">174</div>
        <div class="plot plot-3-175" onclick="showPlotDetails(3, '175')">175</div>
        
        <div class="d0"></div>
        <div class="d0"></div>
        <div class="plot plot-3-176" onclick="showPlotDetails(3, '176')">176</div>
        <div class="plot plot-3-177" onclick="showPlotDetails(3, '177')">177</div>
        <div class="plot plot-3-178" onclick="showPlotDetails(3, '178')">178</div>
        <div class="plot plot-3-179" onclick="showPlotDetails(3, '179')">179</div>
        <div class="plot plot-3-180" onclick="showPlotDetails(3, '180')">180</div>
        <div class="plot plot-3-181" onclick="showPlotDetails(3, '181')">181</div>
        <div class="plot plot-3-182" onclick="showPlotDetails(3, '182')">182</div>
        <div class="plot plot-3-183" onclick="showPlotDetails(3, '183')">183</div>
        <div class="plot plot-3-184" onclick="showPlotDetails(3, '184')">184</div>
        <div class="plot plot-3-185" onclick="showPlotDetails(3, '185')">185</div>
        <div class="plot plot-3-186" onclick="showPlotDetails(3, '186')">186</div>
        <div class="plot plot-3-187" onclick="showPlotDetails(3, '187')">187</div>
        <div class="plot plot-3-188" onclick="showPlotDetails(3, '188')">188</div>
        <div class="plot plot-3-189" onclick="showPlotDetails(3, '189')">189</div>
        <div class="plot plot-3-190" onclick="showPlotDetails(3, '190')">190</div>
        <div class="plot plot-3-191" onclick="showPlotDetails(3, '191')">191</div>
        <div class="plot plot-3-192" onclick="showPlotDetails(3, '192')">192</div>
        <div class="plot plot-3-193" onclick="showPlotDetails(3, '193')">193</div>
        <div class="plot plot-3-194" onclick="showPlotDetails(3, '194')">194</div>
        <div class="plot plot-3-195" onclick="showPlotDetails(3, '195')">195</div>
        <div class="plot plot-3-196" onclick="showPlotDetails(3, '196')">196</div>
        <div class="plot plot-3-197" onclick="showPlotDetails(3, '197')">197</div>
        <div class="plot plot-3-198" onclick="showPlotDetails(3, '198')">198</div>
        <div class="plot plot-3-199" onclick="showPlotDetails(3, '199')">199</div>
        <div class="plot plot-3-200" onclick="showPlotDetails(3, '200')">200</div>
        <div class="plot plot-3-201" onclick="showPlotDetails(3, '201')">201</div>
        <div class="plot plot-3-202" onclick="showPlotDetails(3, '202')">202</div>
        <div class="plot plot-3-203" onclick="showPlotDetails(3, '203')">203</div>
        <div class="plot plot-3-204" onclick="showPlotDetails(3, '204')">204</div>
        
        <div class="d0"></div>
        <div class="d0"></div>
        <div class="plot plot-3-205" onclick="showPlotDetails(3, '205')">205</div>
        <div class="plot plot-3-206" onclick="showPlotDetails(3, '206')">206</div>
        <div class="plot plot-3-207" onclick="showPlotDetails(3, '207')">207</div>
        <div class="plot plot-3-208" onclick="showPlotDetails(3, '208')">208</div>
        <div class="plot plot-3-209" onclick="showPlotDetails(3, '209')">209</div>
        <div class="plot plot-3-210" onclick="showPlotDetails(3, '210')">210</div>
        <div class="plot plot-3-211" onclick="showPlotDetails(3, '211')">211</div>
        <div class="plot plot-3-212" onclick="showPlotDetails(3, '212')">212</div>
        <div class="plot plot-3-213" onclick="showPlotDetails(3, '213')">213</div>
        <div class="plot plot-3-214" onclick="showPlotDetails(3, '214')">214</div>
        <div class="plot plot-3-215" onclick="showPlotDetails(3, '215')">215</div>
        <div class="plot plot-3-216" onclick="showPlotDetails(3, '216')">216</div>
        <div class="plot plot-3-217" onclick="showPlotDetails(3, '217')">217</div>
        <div class="plot plot-3-218" onclick="showPlotDetails(3, '218')">218</div>
        <div class="plot plot-3-219" onclick="showPlotDetails(3, '219')">219</div>
        <div class="plot plot-3-220" onclick="showPlotDetails(3, '220')">220</div>
        <div class="plot plot-3-221" onclick="showPlotDetails(3, '221')">221</div>
        <div class="plot plot-3-222" onclick="showPlotDetails(3, '222')">222</div>
        <div class="plot plot-3-223" onclick="showPlotDetails(3, '223')">223</div>
        <div class="plot plot-3-224" onclick="showPlotDetails(3, '224')">224</div>
        <div class="plot plot-3-225" onclick="showPlotDetails(3, '225')">225</div>
        <div class="plot plot-3-226" onclick="showPlotDetails(3, '226')">226</div>
        <div class="plot plot-3-227" onclick="showPlotDetails(3, '227')">227</div>
        <div class="plot plot-3-228" onclick="showPlotDetails(3, '228')">228</div>
        <div class="plot plot-3-229" onclick="showPlotDetails(3, '229')">229</div>
        <div class="plot plot-3-230" onclick="showPlotDetails(3, '230')">230</div>
        <div class="plot plot-3-231" onclick="showPlotDetails(3, '231')">231</div>
        <div class="plot plot-3-232" onclick="showPlotDetails(3, '232')">232</div>
        <div class="plot plot-3-233" onclick="showPlotDetails(3, '233')">233</div>
        
        <div class="d0"></div>
        <div class="plot plot-3-234" onclick="showPlotDetails(3, '234')">234</div>
        <div class="plot plot-3-235" onclick="showPlotDetails(3, '235')">235</div>
        <div class="plot plot-3-236" onclick="showPlotDetails(3, '236')">236</div>
        <div class="plot plot-3-237" onclick="showPlotDetails(3, '237')">237</div>
        <div class="plot plot-3-238" onclick="showPlotDetails(3, '238')">238</div>
        <div class="plot plot-3-239" onclick="showPlotDetails(3, '239')">239</div>
        <div class="plot plot-3-240" onclick="showPlotDetails(3, '240')">240</div>
        <div class="plot plot-3-241" onclick="showPlotDetails(3, '241')">241</div>
        <div class="plot plot-3-242" onclick="showPlotDetails(3, '242')">242</div>
        <div class="plot plot-3-243" onclick="showPlotDetails(3, '243')">243</div>
        <div class="plot plot-3-244" onclick="showPlotDetails(3, '244')">244</div>
        <div class="plot plot-3-245" onclick="showPlotDetails(3, '245')">245</div>
        <div class="plot plot-3-246" onclick="showPlotDetails(3, '246')">246</div>
        <div class="plot plot-3-247" onclick="showPlotDetails(3, '247')">247</div>
        <div class="plot plot-3-248" onclick="showPlotDetails(3, '248')">248</div>
        <div class="plot plot-3-249" onclick="showPlotDetails(3, '249')">249</div>
        <div class="plot plot-3-250" onclick="showPlotDetails(3, '250')">250</div>
        <div class="plot plot-3-251" onclick="showPlotDetails(3, '251')">251</div>
        <div class="plot plot-3-252" onclick="showPlotDetails(3, '252')">252</div>
        <div class="plot plot-3-253" onclick="showPlotDetails(3, '253')">253</div>
        <div class="plot plot-3-254" onclick="showPlotDetails(3, '254')">254</div>
        <div class="plot plot-3-255" onclick="showPlotDetails(3, '255')">255</div>
        <div class="plot plot-3-256" onclick="showPlotDetails(3, '256')">256</div>
        <div class="plot plot-3-257" onclick="showPlotDetails(3, '257')">257</div>
        <div class="plot plot-3-258" onclick="showPlotDetails(3, '258')">258</div>
        <div class="plot plot-3-259" onclick="showPlotDetails(3, '259')">259</div>
        <div class="plot plot-3-260" onclick="showPlotDetails(3, '260')">260</div>
        <div class="plot plot-3-261" onclick="showPlotDetails(3, '261')">261</div>
        <div class="plot plot-3-262" onclick="showPlotDetails(3, '262')">262</div>
        <div class="plot plot-3-263" onclick="showPlotDetails(3, '263')">263</div>
        
        <div class="d0"></div>
        <div class="plot plot-3-264" onclick="showPlotDetails(3, '264')">264</div>
        <div class="plot plot-3-265" onclick="showPlotDetails(3, '265')">265</div>
        <div class="plot plot-3-266" onclick="showPlotDetails(3, '266')">266</div>
        <div class="plot plot-3-267" onclick="showPlotDetails(3, '267')">267</div>
        <div class="plot plot-3-268" onclick="showPlotDetails(3, '268')">268</div>
        <div class="plot plot-3-269" onclick="showPlotDetails(3, '269')">269</div>
        <div class="plot plot-3-270" onclick="showPlotDetails(3, '270')">270</div>
        <div class="plot plot-3-271" onclick="showPlotDetails(3, '271')">271</div>
        <div class="plot plot-3-272" onclick="showPlotDetails(3, '272')">272</div>
        <div class="plot plot-3-273" onclick="showPlotDetails(3, '273')">273</div>
        <div class="plot plot-3-274" onclick="showPlotDetails(3, '274')">274</div>
        <div class="plot plot-3-275" onclick="showPlotDetails(3, '275')">275</div>
        <div class="plot plot-3-276" onclick="showPlotDetails(3, '276')">276</div>
        <div class="plot plot-3-277" onclick="showPlotDetails(3, '277')">277</div>
        <div class="plot plot-3-278" onclick="showPlotDetails(3, '278')">278</div>
        <div class="plot plot-3-279" onclick="showPlotDetails(3, '279')">279</div>
        <div class="plot plot-3-280" onclick="showPlotDetails(3, '280')">280</div>
        <div class="plot plot-3-281" onclick="showPlotDetails(3, '281')">281</div>
        <div class="plot plot-3-282" onclick="showPlotDetails(3, '282')">282</div>
        <div class="plot plot-3-283" onclick="showPlotDetails(3, '283')">283</div>
        <div class="plot plot-3-284" onclick="showPlotDetails(3, '284')">284</div>
        <div class="plot plot-3-285" onclick="showPlotDetails(3, '285')">285</div>
        <div class="plot plot-3-286" onclick="showPlotDetails(3, '286')">286</div>
        <div class="plot plot-3-287" onclick="showPlotDetails(3, '287')">287</div>
        <div class="plot plot-3-288" onclick="showPlotDetails(3, '288')">288</div>
        <div class="plot plot-3-289" onclick="showPlotDetails(3, '289')">289</div>
        <div class="plot plot-3-290" onclick="showPlotDetails(3, '290')">290</div>
        <div class="plot plot-3-291" onclick="showPlotDetails(3, '291')">291</div>
        <div class="plot plot-3-292" onclick="showPlotDetails(3, '292')">292</div>
        <div class="plot plot-3-293" onclick="showPlotDetails(3, '293')">293</div>
        
        <div class="d0"></div>
        <div class="plot plot-3-294" onclick="showPlotDetails(3, '294')">294</div>
        <div class="plot plot-3-295" onclick="showPlotDetails(3, '295')">295</div>
        <div class="plot plot-3-296" onclick="showPlotDetails(3, '296')">296</div>
        <div class="plot plot-3-297" onclick="showPlotDetails(3, '297')">297</div>
        <div class="plot plot-3-298" onclick="showPlotDetails(3, '298')">298</div>
        <div class="plot plot-3-299" onclick="showPlotDetails(3, '299')">299</div>
        <div class="plot plot-3-300" onclick="showPlotDetails(3, '300')">300</div>
        <div class="plot plot-3-301" onclick="showPlotDetails(3, '301')">301</div>
        <div class="plot plot-3-302" onclick="showPlotDetails(3, '302')">302</div>
        <div class="plot plot-3-303" onclick="showPlotDetails(3, '303')">303</div>
        <div class="plot plot-3-304" onclick="showPlotDetails(3, '304')">304</div>
        <div class="plot plot-3-305" onclick="showPlotDetails(3, '305')">305</div>
        <div class="plot plot-3-306" onclick="showPlotDetails(3, '306')">306</div>
        <div class="plot plot-3-307" onclick="showPlotDetails(3, '307')">307</div>
        <div class="plot plot-3-308" onclick="showPlotDetails(3, '308')">308</div>
        <div class="plot plot-3-309" onclick="showPlotDetails(3, '309')">309</div>
        <div class="plot plot-3-310" onclick="showPlotDetails(3, '310')">310</div>
        <div class="plot plot-3-311" onclick="showPlotDetails(3, '311')">311</div>
        <div class="plot plot-3-312" onclick="showPlotDetails(3, '312')">312</div>
        <div class="plot plot-3-313" onclick="showPlotDetails(3, '313')">313</div>
        <div class="plot plot-3-314" onclick="showPlotDetails(3, '314')">314</div>
        <div class="plot plot-3-315" onclick="showPlotDetails(3, '315')">315</div>
        <div class="plot plot-3-316" onclick="showPlotDetails(3, '316')">316</div>
        <div class="plot plot-3-317" onclick="showPlotDetails(3, '317')">317</div>
        <div class="plot plot-3-318" onclick="showPlotDetails(3, '318')">318</div>
        <div class="plot plot-3-319" onclick="showPlotDetails(3, '319')">319</div>
        <div class="plot plot-3-320" onclick="showPlotDetails(3, '320')">320</div>
        <div class="plot plot-3-321" onclick="showPlotDetails(3, '321')">321</div>
        <div class="plot plot-3-322" onclick="showPlotDetails(3, '322')">322</div>
        <div class="plot plot-3-323" onclick="showPlotDetails(3, '323')">323</div>
        <div class="d0"></div>
        <div class="plot plot-3-324" onclick="showPlotDetails(3, '324')">324</div>
        <div class="plot plot-3-325" onclick="showPlotDetails(3, '325')">325</div>
        <div class="plot plot-3-326" onclick="showPlotDetails(3, '326')">326</div>
        <div class="plot plot-3-327" onclick="showPlotDetails(3, '327')">327</div>
        <div class="plot plot-3-328" onclick="showPlotDetails(3, '328')">328</div>
        <div class="plot plot-3-329" onclick="showPlotDetails(3, '329')">329</div>
        <div class="plot plot-3-330" onclick="showPlotDetails(3, '330')">330</div>
        <div class="plot plot-3-331" onclick="showPlotDetails(3, '331')">331</div>
        <div class="plot plot-3-332" onclick="showPlotDetails(3, '332')">332</div>
        <div class="plot plot-3-333" onclick="showPlotDetails(3, '333')">333</div>
        <div class="plot plot-3-334" onclick="showPlotDetails(3, '334')">334</div>
        <div class="plot plot-3-335" onclick="showPlotDetails(3, '335')">335</div>
        <div class="plot plot-3-336" onclick="showPlotDetails(3, '336')">336</div>
        <div class="plot plot-3-337" onclick="showPlotDetails(3, '337')">337</div>
        <div class="plot plot-3-338" onclick="showPlotDetails(3, '338')">338</div>
        <div class="plot plot-3-339" onclick="showPlotDetails(3, '339')">339</div>
        <div class="plot plot-3-340" onclick="showPlotDetails(3, '340')">340</div>
        <div class="plot plot-3-341" onclick="showPlotDetails(3, '341')">341</div>
        <div class="plot plot-3-342" onclick="showPlotDetails(3, '342')">342</div>
        <div class="plot plot-3-343" onclick="showPlotDetails(3, '343')">343</div>
        <div class="plot plot-3-344" onclick="showPlotDetails(3, '344')">344</div>
        <div class="plot plot-3-345" onclick="showPlotDetails(3, '345')">345</div>
        <div class="plot plot-3-346" onclick="showPlotDetails(3, '346')">346</div>
        <div class="plot plot-3-347" onclick="showPlotDetails(3, '347')">347</div>
        <div class="plot plot-3-348" onclick="showPlotDetails(3, '348')">348</div>
        <div class="plot plot-3-349" onclick="showPlotDetails(3, '349')">349</div>
        <div class="plot plot-3-350" onclick="showPlotDetails(3, '350')">350</div>
        <div class="plot plot-3-351" onclick="showPlotDetails(3, '351')">351</div>
        <div class="plot plot-3-352" onclick="showPlotDetails(3, '352')">352</div>
        <div class="plot plot-3-353" onclick="showPlotDetails(3, '353')">353</div>
        <div class="d0"></div>
        <div class="plot plot-3-354" onclick="showPlotDetails(3, '354')">354</div>
        <div class="plot plot-3-355" onclick="showPlotDetails(3, '355')">355</div>
        <div class="plot plot-3-356" onclick="showPlotDetails(3, '356')">356</div>
        <div class="plot plot-3-357" onclick="showPlotDetails(3, '357')">357</div>
        <div class="plot plot-3-358" onclick="showPlotDetails(3, '358')">358</div>
        <div class="plot plot-3-359" onclick="showPlotDetails(3, '359')">359</div>
        <div class="plot plot-3-360" onclick="showPlotDetails(3, '360')">360</div>
        <div class="plot plot-3-361" onclick="showPlotDetails(3, '361')">361</div>
        <div class="plot plot-3-362" onclick="showPlotDetails(3, '362')">362</div>
        <div class="plot plot-3-363" onclick="showPlotDetails(3, '363')">363</div>
        <div class="plot plot-3-364" onclick="showPlotDetails(3, '364')">364</div>
        <div class="plot plot-3-365" onclick="showPlotDetails(3, '365')">365</div>
        <div class="plot plot-3-366" onclick="showPlotDetails(3, '366')">366</div>
        <div class="plot plot-3-367" onclick="showPlotDetails(3, '367')">367</div>
        <div class="plot plot-3-368" onclick="showPlotDetails(3, '368')">368</div>
        <div class="plot plot-3-369" onclick="showPlotDetails(3, '369')">369</div>
        <div class="plot plot-3-370" onclick="showPlotDetails(3, '370')">370</div>
        <div class="plot plot-3-371" onclick="showPlotDetails(3, '371')">371</div>
        <div class="plot plot-3-372" onclick="showPlotDetails(3, '372')">372</div>
        <div class="plot plot-3-373" onclick="showPlotDetails(3, '373')">373</div>
        <div class="plot plot-3-374" onclick="showPlotDetails(3, '374')">374</div>
        <div class="plot plot-3-375" onclick="showPlotDetails(3, '375')">375</div>
        <div class="plot plot-3-376" onclick="showPlotDetails(3, '376')">376</div>
        <div class="plot plot-3-377" onclick="showPlotDetails(3, '377')">377</div>
        <div class="plot plot-3-378" onclick="showPlotDetails(3, '378')">378</div>
        <div class="plot plot-3-379" onclick="showPlotDetails(3, '379')">379</div>
        <div class="plot plot-3-380" onclick="showPlotDetails(3, '380')">380</div>
        <div class="plot plot-3-381" onclick="showPlotDetails(3, '381')">381</div>
        <div class="plot plot-3-382" onclick="showPlotDetails(3, '382')">382</div>
        <div class="plot plot-3-383" onclick="showPlotDetails(3, '383')">383</div>
        <div class="d0"></div>

        <div class="plot plot-3-384" onclick="showPlotDetails(3, '384')">384</div>
        <div class="plot plot-3-385" onclick="showPlotDetails(3, '385')">385</div>
        <div class="plot plot-3-386" onclick="showPlotDetails(3, '386')">386</div>
        <div class="plot plot-3-387" onclick="showPlotDetails(3, '387')">387</div>
        <div class="plot plot-3-388" onclick="showPlotDetails(3, '388')">388</div>
        <div class="plot plot-3-389" onclick="showPlotDetails(3, '389')">389</div>
        <div class="plot plot-3-390" onclick="showPlotDetails(3, '390')">390</div>
        <div class="plot plot-3-391" onclick="showPlotDetails(3, '391')">391</div>
        <div class="plot plot-3-392" onclick="showPlotDetails(3, '392')">392</div>
        <div class="plot plot-3-393" onclick="showPlotDetails(3, '393')">393</div>
        <div class="plot plot-3-394" onclick="showPlotDetails(3, '394')">394</div>
        <div class="plot plot-3-395" onclick="showPlotDetails(3, '395')">395</div>
        <div class="plot plot-3-396" onclick="showPlotDetails(3, '396')">396</div>
        <div class="plot plot-3-397" onclick="showPlotDetails(3, '397')">397</div>
        <div class="plot plot-3-398" onclick="showPlotDetails(3, '398')">398</div>
        <div class="plot plot-3-399" onclick="showPlotDetails(3, '399')">399</div>
        <div class="plot plot-3-400" onclick="showPlotDetails(3, '400')">400</div>
        <div class="plot plot-3-401" onclick="showPlotDetails(3, '401')">401</div>
        <div class="plot plot-3-402" onclick="showPlotDetails(3, '402')">402</div>
        <div class="plot plot-3-403" onclick="showPlotDetails(3, '403')">403</div>
        <div class="plot plot-3-404" onclick="showPlotDetails(3, '404')">404</div>
        <div class="plot plot-3-405" onclick="showPlotDetails(3, '405')">405</div>
        <div class="plot plot-3-406" onclick="showPlotDetails(3, '406')">406</div>
        <div class="plot plot-3-407" onclick="showPlotDetails(3, '407')">407</div>
        <div class="plot plot-3-408" onclick="showPlotDetails(3, '408')">408</div>
        <div class="plot plot-3-409" onclick="showPlotDetails(3, '409')">409</div>
        <div class="plot plot-3-410" onclick="showPlotDetails(3, '410')">410</div>
        <div class="plot plot-3-411" onclick="showPlotDetails(3, '411')">411</div>
        <div class="plot plot-3-412" onclick="showPlotDetails(3, '412')">412</div>
        <div class="plot plot-3-413" onclick="showPlotDetails(3, '413')">413</div>
        <div class="d0"></div>
        <div class="plot plot-3-414" onclick="showPlotDetails(3, '414')">414</div>
        <div class="plot plot-3-415" onclick="showPlotDetails(3, '415')">415</div>
        <div class="plot plot-3-416" onclick="showPlotDetails(3, '416')">416</div>
        <div class="plot plot-3-417" onclick="showPlotDetails(3, '417')">417</div>
        <div class="plot plot-3-418" onclick="showPlotDetails(3, '418')">418</div>
        <div class="plot plot-3-419" onclick="showPlotDetails(3, '419')">419</div>
        <div class="plot plot-3-420" onclick="showPlotDetails(3, '420')">420</div>
        <div class="plot plot-3-421" onclick="showPlotDetails(3, '421')">421</div>
        <div class="plot plot-3-422" onclick="showPlotDetails(3, '422')">422</div>
        <div class="plot plot-3-423" onclick="showPlotDetails(3, '423')">423</div>
        <div class="plot plot-3-424" onclick="showPlotDetails(3, '424')">424</div>
        <div class="plot plot-3-425" onclick="showPlotDetails(3, '425')">425</div>
        <div class="plot plot-3-426" onclick="showPlotDetails(3, '426')">426</div>
        <div class="plot plot-3-427" onclick="showPlotDetails(3, '427')">427</div>
        <div class="plot plot-3-428" onclick="showPlotDetails(3, '428')">428</div>
        <div class="plot plot-3-429" onclick="showPlotDetails(3, '429')">429</div>
        <div class="plot plot-3-430" onclick="showPlotDetails(3, '430')">430</div>
        <div class="plot plot-3-431" onclick="showPlotDetails(3, '431')">431</div>
        <div class="plot plot-3-432" onclick="showPlotDetails(3, '432')">432</div>
        <div class="plot plot-3-433" onclick="showPlotDetails(3, '433')">433</div>
        <div class="plot plot-3-434" onclick="showPlotDetails(3, '434')">434</div>
        <div class="plot plot-3-435" onclick="showPlotDetails(3, '435')">435</div>
        <div class="plot plot-3-436" onclick="showPlotDetails(3, '436')">436</div>
        <div class="plot plot-3-437" onclick="showPlotDetails(3, '437')">437</div>
        <div class="plot plot-3-438" onclick="showPlotDetails(3, '438')">438</div>
        <div class="plot plot-3-439" onclick="showPlotDetails(3, '439')">439</div>
        <div class="plot plot-3-440" onclick="showPlotDetails(3, '440')">440</div>
        <div class="plot plot-3-441" onclick="showPlotDetails(3, '441')">441</div>
        <div class="plot plot-3-442" onclick="showPlotDetails(3, '442')">442</div>
        <div class="plot plot-3-443" onclick="showPlotDetails(3, '443')">443</div>
        <div class="d0"></div>

        <div class="plot plot-3-444" onclick="showPlotDetails(3, '444')">444</div>
        <div class="plot plot-3-445" onclick="showPlotDetails(3, '445')">445</div>
        <div class="plot plot-3-446" onclick="showPlotDetails(3, '446')">446</div>
        <div class="plot plot-3-447" onclick="showPlotDetails(3, '447')">447</div>
        <div class="plot plot-3-448" onclick="showPlotDetails(3, '448')">448</div>
        <div class="plot plot-3-449" onclick="showPlotDetails(3, '449')">449</div>
        <div class="plot plot-3-450" onclick="showPlotDetails(3, '450')">450</div>
        <div class="plot plot-3-451" onclick="showPlotDetails(3, '451')">451</div>
        <div class="plot plot-3-452" onclick="showPlotDetails(3, '452')">452</div>
        <div class="plot plot-3-453" onclick="showPlotDetails(3, '453')">453</div>
        <div class="plot plot-3-454" onclick="showPlotDetails(3, '454')">454</div>
        <div class="plot plot-3-455" onclick="showPlotDetails(3, '455')">455</div>
        <div class="plot plot-3-456" onclick="showPlotDetails(3, '456')">456</div>
        <div class="plot plot-3-457" onclick="showPlotDetails(3, '457')">457</div>
        <div class="plot plot-3-458" onclick="showPlotDetails(3, '458')">458</div>
        <div class="plot plot-3-459" onclick="showPlotDetails(3, '459')">459</div>
        <div class="plot plot-3-460" onclick="showPlotDetails(3, '460')">460</div>
        <div class="plot plot-3-461" onclick="showPlotDetails(3, '461')">461</div>
        <div class="plot plot-3-462" onclick="showPlotDetails(3, '462')">462</div>
        <div class="plot plot-3-463" onclick="showPlotDetails(3, '463')">463</div>
        <div class="plot plot-3-464" onclick="showPlotDetails(3, '464')">464</div>
        <div class="plot plot-3-465" onclick="showPlotDetails(3, '465')">465</div>
        <div class="plot plot-3-466" onclick="showPlotDetails(3, '466')">466</div>
        <div class="plot plot-3-467" onclick="showPlotDetails(3, '467')">467</div>
        <div class="plot plot-3-468" onclick="showPlotDetails(3, '468')">468</div>
        <div class="plot plot-3-469" onclick="showPlotDetails(3, '469')">469</div>
        <div class="plot plot-3-470" onclick="showPlotDetails(3, '470')">470</div>
        <div class="plot plot-3-471" onclick="showPlotDetails(3, '471')">471</div>
        <div class="plot plot-3-472" onclick="showPlotDetails(3, '472')">472</div>
        <div class="plot plot-3-473" onclick="showPlotDetails(3, '473')">473</div>
        <div class="d0"></div>
        <div class="plot plot-3-474" onclick="showPlotDetails(3, '474')">474</div>
        <div class="plot plot-3-475" onclick="showPlotDetails(3, '475')">475</div>
        <div class="plot plot-3-476" onclick="showPlotDetails(3, '476')">476</div>
        <div class="plot plot-3-477" onclick="showPlotDetails(3, '477')">477</div>
        <div class="plot plot-3-478" onclick="showPlotDetails(3, '478')">478</div>
        <div class="plot plot-3-479" onclick="showPlotDetails(3, '479')">479</div>
        <div class="plot plot-3-480" onclick="showPlotDetails(3, '480')">480</div>
        <div class="plot plot-3-481" onclick="showPlotDetails(3, '481')">481</div>
        <div class="plot plot-3-482" onclick="showPlotDetails(3, '482')">482</div>
        <div class="plot plot-3-483" onclick="showPlotDetails(3, '483')">483</div>
        <div class="plot plot-3-484" onclick="showPlotDetails(3, '484')">484</div>
        <div class="plot plot-3-485" onclick="showPlotDetails(3, '485')">485</div>
        <div class="plot plot-3-486" onclick="showPlotDetails(3, '486')">486</div>
        <div class="plot plot-3-487" onclick="showPlotDetails(3, '487')">487</div>
        <div class="plot plot-3-488" onclick="showPlotDetails(3, '488')">488</div>
        <div class="plot plot-3-489" onclick="showPlotDetails(3, '489')">489</div>
        <div class="plot plot-3-490" onclick="showPlotDetails(3, '490')">490</div>
        <div class="plot plot-3-491" onclick="showPlotDetails(3, '491')">491</div>
        <div class="plot plot-3-492" onclick="showPlotDetails(3, '492')">492</div>
        <div class="plot plot-3-493" onclick="showPlotDetails(3, '493')">493</div>
        <div class="plot plot-3-494" onclick="showPlotDetails(3, '494')">494</div>
        <div class="plot plot-3-495" onclick="showPlotDetails(3, '495')">495</div>
        <div class="plot plot-3-496" onclick="showPlotDetails(3, '496')">496</div>
        <div class="plot plot-3-497" onclick="showPlotDetails(3, '497')">497</div>
        <div class="plot plot-3-498" onclick="showPlotDetails(3, '498')">498</div>
        <div class="plot plot-3-499" onclick="showPlotDetails(3, '499')">499</div>
        <div class="plot plot-3-500" onclick="showPlotDetails(3, '500')">500</div>
        <div class="plot plot-3-501" onclick="showPlotDetails(3, '501')">501</div>
        <div class="plot plot-3-502" onclick="showPlotDetails(3, '502')">502</div>
        <div class="plot plot-3-503" onclick="showPlotDetails(3, '503')">503</div>
        <div class="d0"></div>

        <div class="plot plot-3-504" onclick="showPlotDetails(3, '504')">504</div>
        <div class="plot plot-3-505" onclick="showPlotDetails(3, '505')">505</div>
        <div class="plot plot-3-506" onclick="showPlotDetails(3, '506')">506</div>
        <div class="plot plot-3-507" onclick="showPlotDetails(3, '507')">507</div>
        <div class="plot plot-3-508" onclick="showPlotDetails(3, '508')">508</div>
        <div class="plot plot-3-509" onclick="showPlotDetails(3, '509')">509</div>
        <div class="plot plot-3-510" onclick="showPlotDetails(3, '510')">510</div>
        <div class="plot plot-3-511" onclick="showPlotDetails(3, '511')">511</div>
        <div class="plot plot-3-512" onclick="showPlotDetails(3, '512')">512</div>
        <div class="plot plot-3-513" onclick="showPlotDetails(3, '513')">513</div>
        <div class="plot plot-3-514" onclick="showPlotDetails(3, '514')">514</div>
        <div class="plot plot-3-515" onclick="showPlotDetails(3, '515')">515</div>
        <div class="plot plot-3-516" onclick="showPlotDetails(3, '516')">516</div>
        <div class="plot plot-3-517" onclick="showPlotDetails(3, '517')">517</div>
        <div class="plot plot-3-518" onclick="showPlotDetails(3, '518')">518</div>
        <div class="plot plot-3-519" onclick="showPlotDetails(3, '519')">519</div>
        <div class="plot plot-3-520" onclick="showPlotDetails(3, '520')">520</div>
        <div class="plot plot-3-521" onclick="showPlotDetails(3, '521')">521</div>
        <div class="plot plot-3-522" onclick="showPlotDetails(3, '522')">522</div>
        <div class="plot plot-3-523" onclick="showPlotDetails(3, '523')">523</div>
        <div class="plot plot-3-524" onclick="showPlotDetails(3, '524')">524</div>
        <div class="plot plot-3-525" onclick="showPlotDetails(3, '525')">525</div>
        <div class="plot plot-3-526" onclick="showPlotDetails(3, '526')">526</div>
        <div class="plot plot-3-527" onclick="showPlotDetails(3, '527')">527</div>
        <div class="plot plot-3-528" onclick="showPlotDetails(3, '528')">528</div>
        <div class="plot plot-3-529" onclick="showPlotDetails(3, '529')">529</div>
        <div class="plot plot-3-530" onclick="showPlotDetails(3, '530')">530</div>
        <div class="plot plot-3-531" onclick="showPlotDetails(3, '531')">531</div>
        <div class="plot plot-3-532" onclick="showPlotDetails(3, '532')">532</div>
        <div class="plot plot-3-533" onclick="showPlotDetails(3, '533')">533</div>
        <div class="d0"></div>
        <div class="plot plot-3-534" onclick="showPlotDetails(3, '534')">534</div>
        <div class="plot plot-3-535" onclick="showPlotDetails(3, '535')">535</div>
        <div class="plot plot-3-536" onclick="showPlotDetails(3, '536')">536</div>
        <div class="plot plot-3-537" onclick="showPlotDetails(3, '537')">537</div>
        <div class="plot plot-3-538" onclick="showPlotDetails(3, '538')">538</div>
        <div class="plot plot-3-539" onclick="showPlotDetails(3, '539')">539</div>
        <div class="plot plot-3-540" onclick="showPlotDetails(3, '540')">540</div>
        <div class="plot plot-3-541" onclick="showPlotDetails(3, '541')">541</div>
        <div class="plot plot-3-542" onclick="showPlotDetails(3, '542')">542</div>
        <div class="plot plot-3-543" onclick="showPlotDetails(3, '543')">543</div>
        <div class="plot plot-3-544" onclick="showPlotDetails(3, '544')">544</div>
        <div class="plot plot-3-545" onclick="showPlotDetails(3, '545')">545</div>
        <div class="plot plot-3-546" onclick="showPlotDetails(3, '546')">546</div>
        <div class="plot plot-3-547" onclick="showPlotDetails(3, '547')">547</div>
        <div class="plot plot-3-548" onclick="showPlotDetails(3, '548')">548</div>
        <div class="plot plot-3-549" onclick="showPlotDetails(3, '549')">549</div>
        <div class="plot plot-3-550" onclick="showPlotDetails(3, '550')">550</div>
        <div class="plot plot-3-551" onclick="showPlotDetails(3, '551')">551</div>
        <div class="plot plot-3-552" onclick="showPlotDetails(3, '552')">552</div>
        <div class="plot plot-3-553" onclick="showPlotDetails(3, '553')">553</div>
        <div class="plot plot-3-554" onclick="showPlotDetails(3, '554')">554</div>
        <div class="plot plot-3-555" onclick="showPlotDetails(3, '555')">555</div>
        <div class="plot plot-3-556" onclick="showPlotDetails(3, '556')">556</div>
        <div class="plot plot-3-557" onclick="showPlotDetails(3, '557')">557</div>
        <div class="plot plot-3-558" onclick="showPlotDetails(3, '558')">558</div>
        <div class="plot plot-3-559" onclick="showPlotDetails(3, '559')">559</div>
        <div class="plot plot-3-560" onclick="showPlotDetails(3, '560')">560</div>
        <div class="plot plot-3-561" onclick="showPlotDetails(3, '561')">561</div>
        <div class="plot plot-3-562" onclick="showPlotDetails(3, '562')">562</div>
        <div class="plot plot-3-563" onclick="showPlotDetails(3, '563')">563</div>
        <div class="plot plot-3-564" onclick="showPlotDetails(3, '564')">564</div>
        <div class="plot plot-3-565" onclick="showPlotDetails(3, '565')">565</div>
        <div class="plot plot-3-566" onclick="showPlotDetails(3, '566')">566</div>
        <div class="plot plot-3-567" onclick="showPlotDetails(3, '567')">567</div>
        <div class="plot plot-3-568" onclick="showPlotDetails(3, '568')">568</div>
        <div class="plot plot-3-569" onclick="showPlotDetails(3, '569')">569</div>
        <div class="plot plot-3-570" onclick="showPlotDetails(3, '570')">570</div>
        <div class="plot plot-3-571" onclick="showPlotDetails(3, '571')">571</div>
        <div class="plot plot-3-572" onclick="showPlotDetails(3, '572')">572</div>
        <div class="plot plot-3-573" onclick="showPlotDetails(3, '573')">573</div>
        <div class="plot plot-3-574" onclick="showPlotDetails(3, '574')">574</div>
        <div class="plot plot-3-575" onclick="showPlotDetails(3, '575')">575</div>
        <div class="plot plot-3-576" onclick="showPlotDetails(3, '576')">576</div>
        <div class="plot plot-3-577" onclick="showPlotDetails(3, '577')">577</div>
        <div class="plot plot-3-578" onclick="showPlotDetails(3, '578')">578</div>
        <div class="plot plot-3-579" onclick="showPlotDetails(3, '579')">579</div>
        <div class="plot plot-3-580" onclick="showPlotDetails(3, '580')">580</div>
        <div class="plot plot-3-581" onclick="showPlotDetails(3, '581')">581</div>
        <div class="plot plot-3-582" onclick="showPlotDetails(3, '582')">582</div>
        <div class="plot plot-3-583" onclick="showPlotDetails(3, '583')">583</div>
        <div class="plot plot-3-584" onclick="showPlotDetails(3, '584')">584</div>
        <div class="plot plot-3-585" onclick="showPlotDetails(3, '585')">585</div>
        <div class="plot plot-3-586" onclick="showPlotDetails(3, '586')">586</div>
        <div class="plot plot-3-587" onclick="showPlotDetails(3, '587')">587</div>
        <div class="plot plot-3-588" onclick="showPlotDetails(3, '588')">588</div>
        <div class="plot plot-3-589" onclick="showPlotDetails(3, '589')">589</div>
        <div class="plot plot-3-590" onclick="showPlotDetails(3, '590')">590</div>
        <div class="plot plot-3-591" onclick="showPlotDetails(3, '591')">591</div>
        <div class="plot plot-3-592" onclick="showPlotDetails(3, '592')">592</div>
        <div class="plot plot-3-593" onclick="showPlotDetails(3, '593')">593</div>
        <div class="plot plot-3-594" onclick="showPlotDetails(3, '594')">594</div>
                        
      </div>
      <style>
        .b3w1{
          right: 312px;
        }
        .b3w2{
          right: 308px;
        }
        .b3t{
          right: -14pc;
        }
      </style>
      <hr style="color: black; width: 79%;" >
<div class="ped">PEDESTRIAN SIDEWALK</div>
<hr style="color: black; width: 79%;" >
<b>GREEN PARK MEMORIAL GARDEN</b>
<b>BLOCK 3</b>
<hr style="color: black; width: 79%; margin-top: 40px;" >
<div class="ped">PEDESTRIAN SIDEWALK</div>
<hr style="color: black; width: 79%;" >
<b class="pathwalk walk1 b3w1" >2.00 M. WIDE PATHWALK</b>
<b class="pathwalk walk2 b3w2">2.00 M. WIDE PATHWALK</b>

<div class="two-way-traffic-sign b3t">
  <div class="arrow-container">
      <div class="arrow left"></div>
  </div>
  <div class="text">TWO WAY TRAFFIC ROAD</div>
  <div class="arrow-container">
      <div class="arrow right"></div>
  </div>
</div>

    </div>
  </div>
</div>
<style>
  .plotdetail{
    width: 250px !important;
    height: 300px;
    margin-top: 300px;
    border-radius: 20px;

  }
  .detail{
    width: 100%;
    height: 200px;
    border: 1px solid black;
  }
  .detail img{
    width: 100%;
    height: 100%;
  }
  .closer{
    margin-top: -25px;
    margin-right: -12px !important;
  }
</style>
<div id="plotDetailsModal" class="modal">
  <div class="modal-content-map plotdetail">
      <span class="close closer" onclick="closeModal('plotDetailsModal')">&times;</span>
      <div id="plotDetails">
          <div class="plot-details">
            <b><span id="detailsOccupantName"></span></b>
              <span id="detailsBlockNo"></span>
              <span id="detailsPlotNo"></span>
              <div class="detail" >
                <img id="detailsImage" class="plot-image" alt="Plot Image">
              </div>
          </div>
      </div>
  </div>
</div>
<script>
  function openBlockModal(modalId) {
      // Close all other modals
      document.querySelectorAll('.modal').forEach(m => {
          if (m.id !== modalId && m.id !== 'plotDetailsModal') {
              m.style.display = 'none';
          }
      });
      // Deactivate all blocks
      document.querySelectorAll('.block').forEach(b => b.classList.remove('active'));
      // Show the selected block modal
      document.getElementById(modalId).style.display = 'flex';
      // Activate the corresponding block
      document.querySelector(`.${modalId.replace('Modal', '')}`).classList.add('active');
  }

  function openPlotDetailsModal() {
      document.getElementById('plotDetailsModal').style.display = 'flex';
  }

  function closeModal(modalId) {
      document.getElementById(modalId).style.display = 'none';
      // Deactivate the corresponding block if block modal is closed
      if (modalId.startsWith('block')) {
          document.querySelector(`.${modalId.replace('Modal', '')}`).classList.remove('active');
      }
  }

  function showPlotDetails(blockNumber, plotNumber) {
      fetch(`/admin/get-plot-details/${blockNumber}/${plotNumber}`)
          .then(response => response.json())
          .then(data => {
              if (data.error) {
                  showAlert('Plot not found');
              } else {
                  document.getElementById('detailsBlockNo').textContent = 'Block ' + data.block_no;
                  document.getElementById('detailsPlotNo').textContent = ', Plot ' + data.plot_number;
                  document.getElementById('detailsOccupantName').textContent = '' + data.occupant_name;
                  document.getElementById('detailsImage').src = `/storage/${data.image}`;
                  openPlotDetailsModal();
              }
          })
          .catch(error => {
              console.error('Error:', error);
              showAlert('Empty');
          });
  }

  function searchPlots() {
    const occupantName = document.getElementById('searchBar').value;

    // If the search bar is empty, reset highlights and return
    if (!occupantName.trim()) {
        resetHighlights();
        return;
    }

    fetch(`/admin/search-plots?occupant_name=${encodeURIComponent(occupantName)}`)
        .then(response => response.json())
        .then(data => {
            console.log('Search results:', data);
            resetHighlights(); // Clear previous highlights

            if (data.error) {
                showAlert('No plots found');
            } else {
                data.forEach(plot => {
                    console.log('Processing plot:', plot);
                    // Add active class to the block
                    document.querySelector(`.block${plot.block_no}`).classList.add('active');

                    // Add active class to the plot
                    document.querySelector(`.plot-${plot.block_no}-${plot.plot_number}`).classList.add('active');
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('Typing...');
        });
}

function resetHighlights() {
    document.querySelectorAll('.block').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.plot').forEach(p => p.classList.remove('active'));
}

function showAlert(message) {
    const alertDiv = document.getElementById('alertDiv');
    alertDiv.textContent = message;
    alertDiv.style.display = 'block';
    setTimeout(() => {
        alertDiv.style.display = 'none';
    }, 5000); // Hide after 5 seconds
}

  // Function to rotate elements with class names starting with 'plot-3-'
  function rotatePlot3Elements() {
      // Get all elements with class names starting with 'plot-3-'
      const elements = document.querySelectorAll('.plot[class*="plot-3-"], .plot[class*="plot-5-"], .plot[class*="plot-7-"], .plot[class*="plot-10-"], .plot[class*="plot-6-"], .plot[class*="plot-4-"], .plot[class*="plot-8-"]');
      
      // Debugging: Log the elements to check if they're selected
      console.log('Selected elements:', elements);
      
      // Apply rotation style to each element
      elements.forEach(element => {
          console.log('Applying rotation to:', element); // Debugging
          element.style.transform = 'rotate(180deg)';
          element.style.transition = 'transform 0.3s ease'; // Optional: for smooth rotation
      });
  }

  // Call the function to rotate the elements
  rotatePlot3Elements();
</script>
<script>
  function downloadImage(imagePath) {
      const link = document.createElement('a');
      link.href = imagePath;
      link.download = imagePath.split('/').pop(); // Extracts filename from path
      link.click();
  }
</script>
</body>
