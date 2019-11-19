<?php $data = json_decode($response, true) ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="row">
                        <h5 class="card-title">
                            Menu Pembayaran
                        </h5>
                    </div>
                </div>

                <div class="card-body p-0">
                    <style type="text/css">
                        [style*="--aspect-ratio"] > :first-child {
                          width: 100%;
                        }
                        [style*="--aspect-ratio"] > img {  
                          height: 100%;
                        } 
                        @supports (--custom:property) {
                          [style*="--aspect-ratio"] {
                            position: relative;
                          }
                          [style*="--aspect-ratio"]::before {
                            content: "";
                            display: block;
                            padding-bottom: calc(100% / (var(--aspect-ratio)));
                          }  
                          [style*="--aspect-ratio"] > :first-child {
                            position: absolute;
                            top: 0;
                            left: 0;
                            height: 100%;
                          }  
                        }
                    </style>
                    <div style="--aspect-ratio: 16/9;">
                      <iframe 
                        src="<?php echo $data['url']; ?>"
                        width="100%"
                        height="100%"
                        frameborder="0"
                      >
                      </iframe>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</div>

