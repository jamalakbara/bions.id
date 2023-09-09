    <style>
    .page-title-area{
        height: 300px;
        background-size: 100% 100%;
        position: relative;
        z-index: 10;
    }

    .row-container {display: table; empty-cells: show; border-collapse: collapse; width: 100%; height: 100%;}
    .second-row {display: table-row; min-height: 1200px; overflow: hidden }
    .second-row iframe {width: 100%; min-height: 1200px; border: none; margin: 0; padding: 0; display: block;}
    
@media (max-width: 767px){

    .page-title-area.bg_cover{
        background-position :center;
        padding-bottom:0px;
         height: 300px;
    }

    .second-row {min-height: 500px;  }
    .second-row iframe{min-height: 500px;  }
}
    </style>

    <!--====== PAGE TITLE PART START ======-->
    
    <div class="page-title-area bg_cover" style="background-image: url(<?=base_url('assets/home/'.$config->template.'/')?>images/banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-content">
                        <span>Pemesanan</span>
                        <h3 class="title">IPO Bukalapak</h3>
                    </div>
                </div>
               
            </div>
        </div>
        
    </div>
    
    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG PART START ======-->
    
    <section class="faq-area">
        <div class="container">
        <div class="row-container">
            <div class="second-row">
            <iframe 
           
            src="https://ipobukabnis.paperform.co/"
            >
            </iframe>
            </div>
        </div>

        </div>
        </section>
    
    <!--====== BLOG PART ENDS ======-->
