<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Editable Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">
		
            <textarea id="address">shoes store
Bogor - 17530
Jawa Barat - Indonesia
www.shoesstore.com

Telp: 0856 949 848 03</textarea>

            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="100" value="" /><br />
                (max width: 600px, max height: 30px)
              </div>
              <img id="image" src="images/shoesstore.jpg" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <textarea id="customer-title">shoes store</textarea>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea>000123</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Tanggal</td>
                    <td><textarea id="date">December 15, 2009</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Total</td>
                    <td><div class="due">Rp. 225.000.00</div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Deskripsi</th>
		      <th>Unit Harga</th>
		      <th>Qty</th>
		      <th>Total</th>
		  </tr>
		  
		  <tr class="item-row">
		      
		  </tr>
		  
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Tambah Item</a></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal">Rp. 225.000.00</div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total">Rp. 225.000.00</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Pembayaran </td>

		      <td class="total-value"><textarea id="paid">Rp. 0.00</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Total Tagihan</td>
		      <td class="total-value balance"><div class="due">Rp. 225.000.00</div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Syarat dan Ketentuan</h5>
		  <textarea>Pembayaran maksimal 10 Hari setelah invoice diterima</textarea>
		</div>
	
	</div>
	
</body>

</html>