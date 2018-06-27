<style type="text/css">
.container .groupp{text-align:center;}
.container .groupp div{padding:2px 0; }
.container .groupp div:nth-child(odd){}
.container .groupp div:nth-child(even){}
.container .groupp  .onehalf{
 width: 48.46625766871166%;
 display: inline-block;
 float: left;
 
 list-style: none;
 box-sizing: border-box;
 margin: 0 0 0 1.067485%;
 margin-bottom: 20px
 
 
}
        /*.container .groupp  .onehalf img{
        width:100%;
            height: auto;
        
            }*/
            
            
            .parahis{
              color: #666666;
              font-size: 18px;
              
              line-height: 40px;
              text-align: right;}
              .pblack{
                text-align: center;
                font-size: 18px;
                font-weight: bold;
                margin-right: 0px
              }
              
              @media screen and (min-width:180px) and (max-width:900px) {
               .container .groupp div{margin-bottom:10;}
             }
       /* @media screen and (min-width:180px) and (max-width:480px){
            .container .groupp .onehalf {
             width: 373px;
                margin-right: auto;
                margin-left: auto;
                }
                }*/
                @media screen and (max-width: 750px) and (min-width: 180px)
                .groupp .onehalf {
                  display: block;
                  float: none;
                  width: auto;
                  margin: 0 0 30px 0;
                  padding: 0;
                  
                }
                
              </style>
              <div class="wrapper row3">
                <div class="rounded">
                  <main class="container clear"> 
                    <!-- main body --> 
                    <!-- ################################################################################################ -->
                    <div id="portfolio">
                      <div class="head"><?php echo $party->party_title;?>       
                    </div>
                    <div class="line" ></div>
                  </div>
                  <div class="groupp">
                    <div class="onehalf first" >
                      <?php echo $party->party_description;?>
                    </div>
                    <div class="onehalf"><img src="<?php echo base_url();?>assets/images/<?php echo $party->party_images;?>" ></div>
                  </div>
                  
                  <!-- ################################################################################################ --> 
                  <!-- / main body -->
                  <div class="clear"></div>
                </main>
              </div>
            </div>