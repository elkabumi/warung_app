<script type="text/javascript">

 


function find_menu(keyword){
	//alert(keyword);
	window.find(keyword);
}

function CurrencyFormat(number)
{
   var decimalplaces = 0;
   var decimalcharacter = "";
   var thousandseparater = ",";
   number = parseFloat(number);
   var sign = number < 0 ? "-" : "";
   var formatted = new String(number.toFixed(decimalplaces));
   if( decimalcharacter.length && decimalcharacter != "." ) { formatted = formatted.replace(/\./,decimalcharacter); }
   var integer = "";
   var fraction = "";
   var strnumber = new String(formatted);
   var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : -1;
   if( dotpos > -1 )
   {
      if( dotpos ) { integer = strnumber.substr(0,dotpos); }
      fraction = strnumber.substr(dotpos+1);
   }
   else { integer = strnumber; }
   if( integer ) { integer = String(Math.abs(integer)); }
   while( fraction.length < decimalplaces ) { fraction += "0"; }
   temparray = new Array();
   while( integer.length > 3 )
   {
      temparray.unshift(integer.substr(-3));
      integer = integer.substr(0,integer.length-3);
   }
   temparray.unshift(integer);
   integer = temparray.join(thousandseparater);
   return sign + integer + decimalcharacter + fraction;
}



function add_menu(id)
{
	
	var jumlah = document.getElementById("i_jumlah_"+id).value;
	
	jumlah++;
	
	document.getElementById("i_jumlah_"+id).value = jumlah;
	get_total_price();
	// $("#table_treatment").load('treatment.php?page=form_add_treatment&planting_process_id='+id); 
}

function edit_menu(id)
{
	
	var jumlah = document.getElementById("i_jumlah_"+id).value;
	
	document.getElementById("i_jumlah_"+id).value = jumlah;
	get_total_price();
	// $("#table_treatment").load('treatment.php?page=form_add_treatment&planting_process_id='+id); 
}

function get_total_price(){
	
	var total_harga = 0;
	<?php
	while($row2 = mysql_fetch_array($query2)){
	?>
	var jumlah = document.getElementById("i_jumlah_"+<?= $row2['menu_id']?>).value; 
	var harga = document.getElementById("i_harga_"+<?= $row2['menu_id']?>).value; 
	
	var total = jumlah * harga;
	total_harga = total_harga + total;
	<?php
	}
	?>
	document.getElementById("i_total_harga").value = total_harga;
	document.getElementById("i_total_harga_rupiah").value = CurrencyFormat(total_harga);
}

</script>
	
                <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Edit Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Delete Berhasil
                </div>
           
                </section>
                <?php
                }
                ?>
       
        
      
                
 <form action="<?= $action ?>" method="post" enctype="multipart/form-data" role="form">
                <!-- Main content -->
                <section class="content">
                  
                  
<div class="container">
			<!-- Top Navigation -->
			<div class="codrops-top clearfix">
				
			</div>
			<header>
				<h1>Transaksi<span>Penjualan</span></h1>	
			</header>
			
			<section class="color-2">
            <div class="row">
            <div class="col-xs-6">
            <div class="form-group">
             <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required class="form-control pull-right" id="date_picker1" name="i_date" value="<?= $date ?>"/>
                                           
                                        </div><!-- /.input group -->
            </div>
            </div>
            
           
            
            </div><br />
               <div class="row">
				<p>
                 
                 <?php
                                           $no = 1;
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                         
                     <div class="col-xs-3">
                     
					<button type="button" class="btn_click btn-new btn-2new" onClick="add_menu(<?= $row['menu_id']?>)"><div class="title_menu" id="title_menu_<?= $row['menu_id']?>"><?= $row['menu_name'] ?></div>
                    <div class="img_menu"><img src="../img/menu/<?= $row['menu_img'] ?>" id="i_click_<?= $row['menu_id'] ?>" /></div>
					<div class="price_menu">
					<span>Rp. </span><?= number_format($row['menu_price'], 0) ?>
                   </div>
                    </button>
                  	  <input required type="text" name="i_jumlah_<?= $row['menu_id'] ?>" id="i_jumlah_<?= $row['menu_id'] ?>" class="form-control text_menu" value="0" onchange="edit_menu(<?= $row['menu_id'] ?>)"/>
                       <input type="hidden" name="i_harga_<?= $row['menu_id'] ?>" id="i_harga_<?= $row['menu_id'] ?>" class="form-control text_menu" value="<?= $row['menu_price'] ?>"/>
                      
                      </div>
                    <?php
											$no++;
                                            }
                                            ?>
                                            
				</p>
				 </div>
                
			</section>
			
		</div><!-- /container -->
  <div style="height:100px; width:100%;"></div>
                
                
                
               
               
                </section><!-- /.content -->
                 <section class="content_checkout">
                 <div class="row">
                
                 
                   <div class="col-md-6">
                   
                 <div class="col-xs-8">
                   <div class="form-group">
                  <input required type="hidden" readonly="readonly" name="i_total_harga" id="i_total_harga" class="form-control total_checkout" value="0"/>
                   <input required type="text" readonly="readonly" name="i_total_harga_rupiah" id="i_total_harga_rupiah" class="form-control total_checkout" value="0"/>
                   </div>
                </div>
                 <div class="col-xs-4">
                   <div class="form-group">
                  <input class="btn btn-warning button_checkout" type="submit" value="SIMPAN"/>
                </div>
            </div>
                </div>
                
                 <div class="col-md-6">
                
                 <div class="col-xs-8">
               
                 <div class="form-group">
                   <input type="text" name="i_cari_checkout" id="i_cari_checkout" class="form-control cari_checkout" value="" placeholder="Cari menu disini"/>
                 </div>
                 </div>
                  <div class="col-xs-4">
                   <div class="form-group">
                   <a id="button_search_checkout" class="btn btn-primary button_checkout"><i class="fa  fa-search" style="font-size:1em; padding-top:10px;"></i></a>
                   </div>
                </div>
                
                  </div>
               
                </div>
                
               
                
              </section>
              
              </form>
              
              
             