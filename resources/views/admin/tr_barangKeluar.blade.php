@extends('admIndex')

@section('content')
    <!-- BEGIN: Page Main-->
            <div class="section">
    <div class="card">
        <div class="card-content">
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">book</i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Kode Transaksi</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">people</i>
          <input id="icon_telephone" type="tel" class="validate">
          <label for="icon_telephone">Member</label>
        </div>
      </div>
    </form>
  </div>
  
        </div>
    </div>
</div>
            <div class="seaction">
  <!--Invoice-->

  <div class="row">

    <div class="col s12 m12 l12">

      <div id="basic-tabs" class="card card card-default scrollspy">
 <a href="#" class="waves-effect waves-light btn gradient-45deg-amber-amber gradient-shadow mt-2">CARI BARANG<i class="material-icons right">search</i></a>
        <div class="card-content pt-3 pr-3 pb-3 pl-3">

          <div id="invoice">

            <div class="invoice-table">
              <div class="row">
                <div class="col s12 m12 l12">
                  <table class="highlight responsive-table">
                    <thead>
                      <tr>
                        <th data-field="no">No</th>
                        <th data-field="item">Nama</th>
                        <th data-field="uprice">Ukuran</th>
                        <th data-field="price">Jumlah</th>
                        <th data-field="price">Harga</th>
                        <th data-field="price">Sub Harga</th>

                        <th data-field="price">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.</td>
                        <td>Mobile App</td>
                        <td>$ 500.00</td>
                        <td>2</td>
                        <td>$ 1,000.00</td>
                        <td>$ 1,000.00</td>

                        <td>Edit | Delete</td>

                      </tr>
 
                      <tr class="border-none">
                        <td>Sub Total:</td>
                        <td>$ 5,290.00</td>

                      </tr>
                      <tr class="border-none">
                        <td>Service Tax</td>
                        <td>11.00%</td>
                      </tr>
                      <tr class="border-none">
                        <td class="cyan white-text pl-1">Grand Total</td>
                        <td class="cyan strong white-text">$ 5,871.90</td>
                        <td></td>
                        <td></td>
                        <td></td>
	                   <td></td>
<td>                <a href="#" class="mb-6 btn btn-large waves-effect waves-light btn gradient-45deg-deep-purple-blue mt-2">PROSES TRANSAKSI</a>
</td>
                      </tr>
                    </tbody>
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



@endsection