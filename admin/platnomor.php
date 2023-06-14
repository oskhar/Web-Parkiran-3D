<link rel="stylesheet" href="style/plat_nomor.css">
<!-- BAGIAN LATAR -->
<div class="latarBlkng">

    <!-- BAGIAN TABEL -->
    <div id="tabel_1">
        <table>
            <tr style="font-weight:bold;">
                <td>ID</td>
                <td>PLAT NOMOR</td>
                <td>STATUS</td>
                <td>LOKASI</td>
                <td colspan="2">AKSI</td>
            </tr>
            <!-- <?php $i = ($page_tabel*15+1); while ($data = mysqli_fetch_assoc($result)): ?> -->
                <tr>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><?= $i; ?></td>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><?= $data['username'] ?></td>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><?= $data['password'] ?></td>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><a href="">edit</a></td>
                    <td style="border-right:1px solid rgba(128, 128, 128, 0.5);"><a href="">hapus</a></td>
                </tr>
            <!-- <?php $i++; endwhile; ?> -->
        </table>
        <div id="pagination">
            <button><</button>
            <!-- <?php for($i = 0; $i < $pembagian; $i++): ?> -->
                <!-- <a href="?limit=<?= $i ?>&search=<?php if (isset($_GET['search'])) echo $_GET['search'] ?>"><button <?php if($page_tabel == $i) echo "id='paginSelected'"; ?>><?= $i+1 ?></button></a> -->
            <!-- <?php endfor; ?> -->
            <button>></button>
        </div>
    </div>

    <div id="tambahan">
        <!-- BAGIAN MENAMBAHKAN PLAT -->
        <div class="TambahPlat">
	        <div class="platMotor">
	        	<input type="username">
		        	<div class="tombolPlat">
			        	<button>Terurut</button>
			        	<select name="country">
							<option value="indonesia">Indonesia</option>
							<option value="malaysia">Malaysia</option>
							<option value="filipina">Filipina</option>
							<option value="vietnam">Vietnam</option>
						</select>
					</div>
			</div>
        </div>

        <!-- BAGIAN EDIT LOKASI -->
        <div id="PlatMtr">
            <h3>B 2367 YUI</h3>
            	<div class="name">
            		<input type="username">
            	</div>
            	<br><br><br>
            	<div class="radio">
		            <input type="radio" id="html" name="fav_language" value="HTML">
					<label for="html">AKTIF</label>
		            <input type="radio" id="html" name="fav_language" value="HTML">
					<label for="html">NON AKTIF</label>
            </div>
        </div>
    </div>
</div>