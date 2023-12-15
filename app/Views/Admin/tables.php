<?php
include('header.php');
$session      = session();
$length       = 6;
$randomString = substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);

?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Table</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <?= $session->getFlashdata('delete'); ?>
      <?= $session->getFlashdata('create'); ?>
      <?= $session->getFlashdata('update'); ?>
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="row card-header">
              <div class="col-md-10 col-10">
                <div class="">
                  <h3 class="card-title">Tables</h3>
                </div>
              </div>
              <div class="col-md-2 col-2">
                <div class="float-right">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertform">
                    Add Tables
                  </button>
                </div>
              </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead class="text-center">
                  <tr>
                    <th>Action</th>
                    <th>Restaurent Name</th>
                    <th>Franchise Name</th>
                    <th>Table Number</th>
                    <th>Number of Customers</th>
                    <th>QR Code</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php foreach ($tables as $value) { ?>
                    <tr>
                      <td><a href="javascript:void(0)" onclick="edittables('<?= $value->table_id; ?>')">
                          <i class="fa fa-pencil-square-o text-success" aria-hidden="true"></i>
                        </a>
                        | <a href="<?= base_url('delete-table/' . $value->table_id); ?>"
                          onclick="return confirm('Are you sure want to Remove Table?');">
                          <i class="fa fa-trash text-danger" aria-hidden="true"></i>

                        </a>
                      </td>
                      <td>
                        <?= $value->restaurent_name; ?>
                      </td>
                      <td>
                        <?= $value->franchise_name; ?>
                      </td>
                      <td>
                        <?= $value->table_number; ?>
                      </td>
                      <td>
                        <?= $value->num_customer; ?>
                      </td>
                      <td>
                        <img src="<?= base_url('uploads/' . $value->photo); ?>" height="100px" alt="">
                      </td>

                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot class="text-center">
                  <tr>
                    <th>Action</th>
                    <th>Restaurent Name</th>
                    <th>Franchise Name</th>
                    <th>Table Number</th>
                    <th>Number of Customers</th>
                    <th>QR Code</th>

                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="insertform" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="form-group col-6">
              <label for="restaurent">Choose Restaurant</label>
              <select name="restaurent_id" class="form-control" onchange="getStates(this.value)" id="restaurent">
                <option value="" selected disabled>Select Restaurent</option>
                <?php foreach ($restaurent as $value) { ?>
                  <option value="<?= $value->restaurent_id; ?>">
                    <?= $value->restaurent_name; ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group col-6">
              <label for="franchisename">Franchise Name</label>
              <select class="form-control" name="franchise_id" id="franchise">
                <option value="" selected disabled>Select Franchise</option>
              </select>
            </div>

            <div class="form-group col-6">
              <label for="ownername">Select Table</label>
              <select name="table_number" class="form-control" id="tablenumber">
                <option value="" selected disabled>Select Table</option>
                <option value="T-1">T-01</option>
                <option value="T-2">T-02</option>
                <option value="T-3">T-03</option>
                <option value="T-4">T-04</option>
                <option value="T-5">T-05</option>
                <option value="T-6">T-06</option>
                <option value="T-7">T-07</option>
                <option value="T-8">T-08</option>
                <option value="T-9">T-09</option>
                <option value="T-10">T-10</option>
              </select>
            </div>

            <div class="form-group col-6">
              <label for="numofcustomers">Number of Customers</label>
              <input type="text" id="numofcustomers" class="form-control" placeholder="Number of Customers"
                name="num_customer">
            </div>

            <div class="form-group col-6">
              <label for="createddate">Created Date</label>
              <input type="date" id="createddate" class="form-control" placeholder="Ente Amount" name="created_date">
            </div>

            <div class="form-group col-6">
              <label for="updateddate">Updated Date</label>
              <input type="date" id="updateddate" class="form-control" name="updated_date">
            </div>

            <div class="form-group col-12">
              <div class="float-left items-center mb-4">
                <input type="file" id="qr-code" class="d-none" name="photo[]" src="" alt="QR code">
                <canvas id="qr-canvas" width="200" height="200" name="photo[]" class="ml-4 mb-5"></canvas>
              </div>
            </div>
          </div>
      </div>

      <div class="modal-footer">
        <button type="button" id="btnRefresh" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" id="download-button" class="btn btn-success btn-sm" onclick="insertdata()">Add
          Table</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>




<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="edittables_modal" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Table</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="form-data">

      </div>
    </div>
  </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    var alertElem = document.getElementById('sessionAlert');
    if (alertElem) {
      setTimeout(function () {
        alertElem.style.display = 'none';
      }, 2000);
    }
  });


  const refreshBtn = document.getElementById("btnRefresh");
  function handleClick() {
    window.location.reload();
  }
  refreshBtn.addEventListener("click", handleClick);


  function getStates(restaurent_id) {

    $.ajax({
      url: '<?= base_url('get-franchise/'); ?>' + restaurent_id,
      success: function (result) {
        $('#franchise').html(result);

      }

    });

  }



  const inputField1 = document.getElementById('restaurent');
  const inputField2 = document.getElementById('franchise');
  const inputField3 = document.getElementById('tablenumber');
  const inputField4 = document.getElementById('numofcustomers');
  const inputField5 = document.getElementById('createddate');
  const inputField6 = document.getElementById('updateddate');

  const qrCode = document.getElementById('qr-code');
  const qrCanvas = document.getElementById('qr-canvas');
  const downloadButton = document.getElementById('download-button');

  function updateQRCode() {
    const restaurent = encodeURIComponent(inputField1.value);
    const franchise = encodeURIComponent(inputField2.value);
    const tablenumber = encodeURIComponent(inputField3.value);
    const numofcustomers = encodeURIComponent(inputField4.value);
    const createddate = encodeURIComponent(inputField5.value);
    const updateddate = encodeURIComponent(inputField6.value);

    const combinedUrl = ` ${restaurent},
                          ${franchise},
                          ${tablenumber},
                          ${numofcustomers},
                          ${createddate},
                          ${updateddate}`;

    const imageUrl = `https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=${combinedUrl}`;
    qrCode.src = imageUrl;

    // Draw QR code on canvas
    const context = qrCanvas.getContext('2d');
    const image = new Image();
    image.crossOrigin = "anonymous";
    image.src = imageUrl;
    image.onload = function () {
      context.drawImage(image, 0, 0);
    }
  }

  inputField1.addEventListener('input', updateQRCode);
  inputField2.addEventListener('input', updateQRCode);
  inputField3.addEventListener('input', updateQRCode);
  inputField4.addEventListener('input', updateQRCode);
  inputField5.addEventListener('input', updateQRCode);
  inputField6.addEventListener('input', updateQRCode);

  downloadButton.addEventListener('click', function () {

    const restaurent = inputField1.value.trim();
    const franchise = inputField2.value.trim();
    const tablenumber = inputField3.value.trim();
    const numofcustomers = inputField4.value.trim();
    const createddate = inputField5.value.trim();
    const updateddate = inputField6.value.trim();



    const filename = `QR_${tablenumber}_${franchise}.png`;
    const downloadLink = document.createElement('a');
    downloadLink.setAttribute('download', filename);
    qrCanvas.toBlob(function (blob) {
      const url = URL.createObjectURL(blob);
      downloadLink.setAttribute('href', url);
      downloadLink.click();
    });
  });

  updateQRCode();





</script>
<?php
include('footer.php');
?>