

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

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive" style="padding:20px; text-align:center;">
                                   <h2>Selamat Datang</h2>
                                  <h4>SIDESI Bojonegoro</h4>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        
                    </div>


<div class="container">
			<!-- Top Navigation -->
			<div class="codrops-top clearfix">
				
			</div>
			<header>
				<h1>Creative Button Styles <span>Modern and subtle styles &amp; effects for buttons (hover and click)</span></h1>	
			</header>
			
			<section class="color-2">
				<p>
					<button class="btn btn-2 btn-2a">Button</button>
					<button class="btn btn-2 btn-2b">Button</button>
				</p>
				<p>
					<button class="btn btn-2 btn-2c">Button</button>
					<button class="btn btn-2 btn-2d">Button</button>
				</p>
				<p>
					<button class="btn btn-2 btn-2e">Button</button>
					<button class="btn btn-2 btn-2f">Button</button>
				</p>
				<p>
					<button class="btn btn-2 btn-2g">Button</button>
					<button class="btn btn-2 btn-2h">Button</button>
				</p>
				<p>
					<button class="btn btn-2 btn-2i">Yes</button>
					<button class="btn btn-2 btn-2j">No</button>
				</p>
			</section>
			
		</div><!-- /container -->


                </section><!-- /.content -->
                
                
        <script>
			var buttons7Click = Array.prototype.slice.call( document.querySelectorAll( '#btn-click button' ) ),
				buttons9Click = Array.prototype.slice.call( document.querySelectorAll( 'button.btn-8g' ) ),
				totalButtons7Click = buttons7Click.length,
				totalButtons9Click = buttons9Click.length;

			buttons7Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );
			buttons9Click.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );

			function activate() {
				var self = this, activatedClass = 'btn-activated';

				if( classie.has( this, 'btn-7h' ) ) {
					// if it is the first of the two btn-7h then activatedClass = 'btn-error';
					// if it is the second then activatedClass = 'btn-success'
					activatedClass = buttons7Click.indexOf( this ) === totalButtons7Click-2 ? 'btn-error' : 'btn-success';
				}
				else if( classie.has( this, 'btn-8g' ) ) {
					// if it is the first of the two btn-8g then activatedClass = 'btn-success3d';
					// if it is the second then activatedClass = 'btn-error3d'
					activatedClass = buttons9Click.indexOf( this ) === totalButtons9Click-2 ? 'btn-success3d' : 'btn-error3d';
				}

				if( !classie.has( this, activatedClass ) ) {
					classie.add( this, activatedClass );
					setTimeout( function() { classie.remove( self, activatedClass ) }, 1000 );
				}
			}

			document.querySelector( '.btn-7i' ).addEventListener( 'click', function() {
				classie.add( document.querySelector( '#trash-effect' ), 'trash-effect-active' );
			}, false );
		</script>