<?php
	if($user_id == false){
		$_SESSION["proses_pesanan"] = true;
		
		header("location: ".BASE_URL."index.php?page=login");
		exit;
	}
?>

	<div class="site-section">
    <div class="container">	
			<div class="row">
				<div class="col-md-6 mb-5 mb-md-0">
					<h2 class="h3 mb-3 text-black">Alamat Pengiriman</h2>
						<div class="p-3 p-lg-5 border">
							<form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">
								
								<div class="form-group row">
									<div class="col-md-6">
										<label class="text-black">Nama Penerima <span class="text-danger">*</span></label>
										<span><input type="text" name="nama_penerima" class="form-control" /></span>
									</div>		

									<div class="col-md-6">
										<label class="text-black">Nomor Telepon <span class="text-danger">*</span></label>
										<span><input type="text" name="nomor_telepon" class="form-control" /></span>
									</div>	
								</div>
						
									<div class="form-group row">
										<div class="col-md-12">
											<label class="text-black">Alamat Pengiriman <span class="text-danger">*</span></label>
												<span><textarea name="alamat" class="form-control" ></textarea></span>
										</div>	
									</div>		
						
									<div class="form-group">
										<label class="text-black">Kota <span class="text-danger">*</span></label>
										<span>
											<select class="form-control" name="kota">
												<?php
													$query = mysqli_query($link, "SELECT * FROM kota");
																										
													while($row=mysqli_fetch_assoc($query)){
													echo "<option value='$row[kota_id]'>$row[kota] (".rupiah($row["tarif"]).")</option>";
														}
												?>
											</select>
										</span>
									</div>			

									<div class="form-group row">
										<div class="col-md-4">
											<span><input type="submit" value="submit" class="btn btn-primary btn-sm" /></span>
										</div>		
									</div>	
						
							</form>
						</div>
				</div>

				<div class="col-md-6">
					<div class="row mb-5">
						<div class="col-md-12">
							<h2 class="h3 mb-3 text-black">Detail Pemesanan</h2>
								<div class="p-3 p-lg-5 border">
									<table class="table site-block-order-table mb-5">
										<tr>
											<th>Nama Barang</th>
											<th>Qty</th>
											<th>Total</th>
											</tr>
														
											<?php
												$subtotal = 0;
													foreach($keranjang AS $key => $value){
																
													$barang_id = $key;
																
													$nama_barang = $value['nama_barang'];
													$harga = $value['harga'];
													$quantity = $value['quantity'];
																
													$total = $quantity * $harga;
													$subtotal = $subtotal + $total;
											?>
												<tr>
													<td class="text-black font-weight-bold"><?php echo $nama_barang; ?></td>
														<td class="text-black font-weight-bold"><?php echo $quantity; ?></td>
														<td class="text-black font-weight-bold"><?php echo rupiah($harga) ?></td>
												</tr>
											<?php } ?>
												<tr>
													<td></td>
													<td class="text-black font-weight-bold"><b>Sub Total</b></td>
													<td class="text-black font-weight-bold"><b><?php echo rupiah($subtotal); ?></b></td>
												</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>